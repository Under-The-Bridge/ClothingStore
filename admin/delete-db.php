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


$id = $_GET["id"] ?? false;
$table = $_GET["table"] ?? false;
$idField = $_GET["idField"] ?? false;

$query = mysqli_query($conn, "Delete from `$table` where `$idField` = $id");
header("Location: /crud");
?>