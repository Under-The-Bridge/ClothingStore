<?php
require "connect-db.php";
session_start();

$id = $_SESSION["id"];
$address = trim($_POST["address"]);
$price = $_POST["price"];
$date = $_POST["date"];
$pay = $_POST["pay"];

if (empty($address)) {
    echo "<script>
alert('Пустой адрес');
back();
</script>";
}

$sql = "INSERT INTO `Orders`(`id_user`, `address`, `price`, `arrival_data`, `pay_method`) VALUES ('$id','$address','$price','$date','$pay')";
mysqli_query($conn, $sql);

$items = mysqli_fetch_all(mysqli_query($conn, "Select * from Basket join Item on Item.id_item = Basket.id_item where id_user = $id"), MYSQLI_ASSOC);
$order_id = mysqli_fetch_array(mysqli_query($conn, "select * from `Orders` where `id_user` = '$id' and `address` = '$address' and `price` = '$price' and `arrival_data` = '$date' and `pay_method` = '$pay'"))[0];
foreach ($items as $item) {
    $id_item = $item['id_item'];
    $count = $item['item_count'];
    $sql = "INSERT INTO `Order_Item`(`id_item`, `id_order`, `count`) VALUES ('$id_item','$order_id','$count')";
    echo $sql;
    mysqli_query($conn, $sql);
}
$sql = "DELETE FROM `Basket` where id_user = $id";
mysqli_query($conn, $sql);

echo "<script>
alert('Заказ оформлен');
location.href='pages/myprofile.php';
</script>";
?>