<?php
require "../connect-db.php";

$name = $_POST["name"] ?? false;
$price = $_POST["price"] ?? false;
$image = $_FILES["image"] ?? false;
$desc = $_POST["desc"] ?? false;
$category = $_POST["category"] ?? false;
$imagename = $image["name"];

$sql = "INSERT INTO `Item`(`name_item`, `price_item`, `img_item`, `description_item`, `id_category`) VALUES ('$name','$price','$imagename','$desc','$category')";
$path_category = mysqli_fetch_array(mysqli_query($conn,"select * from Categories where id_category = $category"))[1];
echo $sql;

$query = mysqli_query($conn, $sql);
if($query){
    $path = "../images/$path_category/$imagename";

    $temp = $image["tmp_name"];

    move_uploaded_file($temp,$path);
}
?>