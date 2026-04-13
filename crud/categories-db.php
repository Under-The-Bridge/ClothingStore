<?php
require "../connect-db.php";

if(isset($_POST["btnAdd"])){
    $name = $_POST["name"] ?? false;
    $sql = "INSERT INTO `Categories`(`name_category`) VALUES ('$name')";
    
    $query = mysqli_query($conn, $sql);
}else if(isset($_POST["btnEdit"])){
    $id  = $_POST["id"] ?? false;
    $name  = $_POST["name"] ?? false;

    $query = mysqli_query($conn, "UPDATE `Categories` SET `name_category`='$name' WHERE `id_category` = $id");
}
header("Location: /crud/categories.php");
?>