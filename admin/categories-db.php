<?php
require "../connect-db.php";
session_start();
if (!isset($_SESSION['id'])) {
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
require "../connect-db.php";

$name = trim($_POST["name"]);
if (empty($name)) {
    echo "<script>
    alert(\"Пустое поле!\");
        location.href='/admin/categories.php';
    </script>";
    exit();
}else{
    if (isset($_POST["btnAdd"])) {
        $sql = "INSERT INTO `Categories`(`name_category`) VALUES ('$name')";
    
        $query = mysqli_query($conn, $sql);
    } else if (isset($_POST["btnEdit"])) {
        $id = $_POST["id"] ?? false;
        $name = $_POST["name"] ?? false;
    
        $query = mysqli_query($conn, "UPDATE `Categories` SET `name_category`='$name' WHERE `id_category` = $id");
        echo $query;
        exit;
        header("Location: /admin/categories.php");
    }
    echo "<script>
                location.href='/admin/categories.php';
            </script>";
}
?>