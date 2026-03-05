<?php
    require "connect-db.php";

    $item = $_GET["item"] ?? false;
    $user = $_COOKIE["saveLogin"] ?? false;

    
    if(isset($user)){

        $getUser = mysqli_fetch_assoc(mysqli_query($conn, "Select * from Users where email = '$user'"))["id_user"];
        $sql = "insert into `Basket`(`id_item`,`id_user`) values($item,$getUser)";
        echo $sql;
        $result = mysqli_query($conn,$sql);
    }

?>