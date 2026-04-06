<?php
require "../connect-db.php";

$name = $_POST["name"] ?? false;
$sql = "INSERT INTO `Categories`(`name_category`) VALUES ('$name')";

$query = mysqli_query($conn, $sql);
?>