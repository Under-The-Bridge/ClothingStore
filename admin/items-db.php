<?php
require "../connect-db.php";
session_start();
if(!isset($_SESSION['id'])){
        echo "<script>
    alert(\"Нельзя!\");
    location.href='/';
    </script>";
}
$user = $_SESSION['id'] ?? false;
if (mysqli_fetch_assoc(mysqli_query($conn, "select * from Users where id_user = $user"))["role"] != "admin") {
    echo "<script>
    alert(\"Нельзя!\");
    location.href='/';
    </script>";
}


$name = $_POST["name"] ?? false;
$price = $_POST["price"] ?? false;
$image = $_FILES["image"] ?? false;
$desc = $_POST["desc"] ?? false;
$category = $_POST["category"] ?? false;
$imagename = $image["name"];

$id = $_POST["id"] ?? false;
$status = $_POST["status"] ?? false;

print_r($_POST);

if (isset($_POST["btnAdd"])) {
    $sql = "INSERT INTO `Item`(`name_item`, `price_item`, `img_item`, `description_item`, `id_category`) VALUES ('$name','$price','$imagename','$desc','$category')";
    $path_category = mysqli_fetch_array(mysqli_query($conn, "select * from Categories where id_category = $category"))[1];
    echo $sql;

    $query = mysqli_query($conn, $sql);
    if ($query) {
        $path = "../images/$path_category/$imagename";

        $temp = $image["tmp_name"];

        move_uploaded_file($temp, $path);
    }
} else if (isset($_POST["btnEdit"])) {
    $sql = "UPDATE `Item` SET `name_item`='$name',`price_item`='$price',`img_item`='$imagename',`description_item`='$desc',`status_item`='$status',`id_category`='$category' WHERE `id_item` = $id";
    $path_category = mysqli_fetch_array(mysqli_query($conn, "select * from Categories where id_category = $category"))[1];
    echo $sql;

    $query = mysqli_query($conn, $sql);
    if ($query) {
        $path = "../images/$path_category/";
        mkdir($path);
        $path = "../images/$path_category/$imagename";

        $temp = $image["tmp_name"];

        move_uploaded_file($temp, $path);
    }
}
header("Location: /crud/items.php");
?>