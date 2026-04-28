<?php
require "connect-db.php";
session_start();


$user = $_SESSION['id'];


if (isset($_POST['btnSave'])) {
    $name = $_POST["nameForm"] ?? '';
    $surname = $_POST["surnameForm"] ?? '';
    $patronymic = $_POST["patronymicForm"] ?? '';
    $email = $_POST["emailForm"] ?? false;
    $phone = $_POST["phoneForm"] ?? '';

    // print_r($_COOKIE["saveLogin"]);
    $sql = "UPDATE `Users` SET `email`='$email',`phone`='$phone',`name`='$name',`surname`='$surname',`patronymic`='$patronymic' WHERE `id_user` = '$user'";

    $query = mysqli_query($conn, $sql);
    if ($query) {
        if ($email)
        echo "<script>
            alert(\"Успешно изменено!\");
            location.href='pages/editprofile.php';
            </script>";
    }
} elseif (isset($_POST['btnDelete'])) {
    echo "<script>
            if(!confirm(\"Вы уверены?\")){
                location.href='pages/editprofile.php';
            }
            </script>";
    $sql = "UPDATE `Users` SET `status_user`='Удален' WHERE `id_user` = '$user'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        unset($_SESSION['id']);
        echo "<script>
                alert(\"Профиль удален!\");
                location.href='/';
                </script>";
    }

} elseif (isset($_POST['btnExit'])) {
    unset($_SESSION['id']);
    echo "<script>
            alert(\"Вы вышли!\");
            location.href='pages/authorization.php';
            </script>";
} else {
    echo "<script>
        alert(\"Как вы сюда попали?!\");
        location.href='/';
        </script>";
}
?>