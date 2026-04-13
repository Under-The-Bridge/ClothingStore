<?php
require "../connect-db.php";

$id = $_GET["id"] ?? false;
$table = $_GET["table"] ?? false;
$idField = $_GET["idField"] ?? false;

$query = mysqli_query($conn, "Delete from `$table` where `$idField` = $id");
header("Location: /crud");
?>