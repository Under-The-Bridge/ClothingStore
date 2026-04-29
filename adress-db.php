<?php
require "connect-db.php";
session_start();

$user = $_SESSION["id"];

if(isset($_GET["id"])){
    $id = $_GET["id"];
    mysqli_query($conn,"DELETE FROM `Addresses` WHERE id_address = $id");
    
    echo "<script>
    alert('Адрес удален');
    location.href='pages/myadress.php';
    </script>";
}else{
    $adress = $_POST["adress"];
    
    $sql = "INSERT INTO `Addresses`(`id_user`, `address`) VALUES ('$user','$adress')";
    mysqli_query($conn,$sql);
    
    if(isset($_POST["order"])){
        echo "<script>
        alert('Адрес добавлен');
        location.href='pages/order.php';
        </script>";
    }
    echo "<script>
    alert('Адрес добавлен');
    location.href='pages/myadress.php';
    </script>";
}
?>