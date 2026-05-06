<?php
session_start();
// Авторизация
require "connect-db.php";

if (isset($_POST['btnAuth'])) {
    $emailUser = trim($_POST['emailForm']);
    $passwordUser = trim($_POST['passwordForm']);
    $queryUser = mysqli_query($conn, "SELECT * FROM `users` 
        WHERE `email`='$emailUser'");
    if (mysqli_num_rows($queryUser) == 0) {
        echo "<script>
            alert(\"Пользователь не найден!\");
            location.href='pages/authorization.php';
            </script>";
    }
    $user = mysqli_fetch_assoc($queryUser);
    if (password_verify($passwordUser, $user["password_user"])) {
        //    print_r($user);
        //    var_dump($user);
        if ($user['status_user'] == 'Активен') {
            $_SESSION['id'] = $user['id_user'];
            // setcookie(ключ/имя, значение, время хранения)
            if($user['role'] == "admin"){
                echo "<script>
                    alert(\"Добро пожаловать!\");
                    location.href='/admin';
                    </script>";
            }else{
                echo "<script>
                    alert(\"Добро пожаловать!\");
                    location.href='pages/myprofile.php';
                    </script>";

            }
        } else {
            echo "<script>
                alert(\"Пользователь удален!\");
                location.href='pages/authorization.php';
                </script>";
        }
    } else {
        echo "<script>
            alert(\"Неверный пароль\");
            location.href='pages/authorization.php';
            </script>";
    }
}
// Регистрация
else {
    // Проверка на пароли
    if ($_POST['passwordForm'] != $_POST['passwordCheckForm']) {
        echo "<script>
            alert(\"Пароли не совпадают!\");
            location.href='pages/authorization.php';
            </script>";
    }
    // Данные пользователя с формы
    $emailUser = trim($_POST['emailForm']);
    $passwordUser = trim($_POST['passwordForm']);
    if(empty($passwordUser) || empty($emailUser)){
                echo "<script>
            alert(\"Пустые поля!\");
            location.href='pages/authorization.php';
            </script>";
    }
    // Проверка на уникальность почты/логина
    $queryUser = mysqli_query($conn, "SELECT * FROM `users` WHERE `email`='$emailUser'");
    if (mysqli_num_rows($queryUser) > 0) {
        echo "<script>
            alert(\"Пользователь с такой почтой/логином уже существует!\");
            location.href='pages/authorization.php';
            </script>";
    } else {
        $hash = password_hash($passwordUser, PASSWORD_DEFAULT);
        $queryUser = mysqli_query($conn, "INSERT INTO `Users`(`password_user`, `email`, `phone`, `status_user`, `name`, `surname`, `patronymic`) VALUES ('$hash','$emailUser',NULL,'Активен',NULL,NULL,NULL)");
        if ($queryUser) {
            setcookie('saveLogin', $emailUser, time() + 3600);
            echo "<script>
                alert(\"Вы успешно зарегались\");
                location.href='pages/authorization.php';
                </script>";
        }
    }
}

?>