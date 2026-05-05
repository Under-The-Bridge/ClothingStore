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

    if (mysqli_num_rows(mysqli_query($conn, "select * from Users where email = '$email'")) != 0) {
        echo "<script>
        alert(\"Почта уже занята!\");
        location.href='pages/editprofile.php';
        </script>";
    } else {
        // print_r($_COOKIE["saveLogin"]);
        $sql = "UPDATE `Users` SET `email`='$email',`phone`='$phone',`name`='$name',`surname`='$surname',`patronymic`='$patronymic' WHERE `id_user` = '$user'";

        $query = mysqli_query($conn, $sql);
        if ($query) {
            echo "<script>
                alert(\"Успешно изменено!\");
                location.href='pages/editprofile.php';
                </script>";
        }
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
} else if (isset($_POST['btnPass'])) {
    $oldPass = $_POST["oldPass"];
    $newPass = $_POST["newPass"];
    $user = mysqli_fetch_assoc(mysqli_query($conn, "Select * from Users where id_user = $user"));
    if (password_verify($oldPass, $user["password_user"])) {
        $hash = password_hash($newPass,PASSWORD_DEFAULT);
        mysqli_query($conn,"UPDATE `Users` SET `password_user`='$hash' WHERE id_user = ".$user["id_user"]);
        echo "<script>
        alert('Пароль изменен!');
                location.href='pages/password.php';
            </script>";
    } else {
        echo "<script>
        alert('Неправильный пароль!');
                location.href='pages/password.php';
            </script>";
    }
} else {
    echo "<script>
        alert(\"Как вы сюда попали?!\");
        location.href='/';
        </script>";
}
?>