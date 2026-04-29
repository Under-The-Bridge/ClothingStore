<?php
require "connect-db.php";
session_start();

$id = $_SESSION["id"];
$adress = $_POST["adress"];
$price = $_POST["price"];
$date = $_POST["date"];
$pay = $_POST["pay"];

$sql = "INSERT INTO `Orders`(`id_user`, `id_adress`, `price`, `arrival_data`, `pay_method`) VALUES ('$id','$adress','$price','$date','$pay')";
mysqli_query($conn,$sql);

echo "<script>
alert('Заказ оформлен');
location.href='pages/myprofile.php';
</script>";
?>