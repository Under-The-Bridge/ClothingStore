<?php
    // Авторизация
    require "connect-db.php";

    print_r($_POST);
    if(isset($_POST['btnAuth'])){
        $emailUser = trim($_POST['emailForm']);
        $passwordUser = trim($_POST['passwordForm']);
        $queryUser = mysqli_query($conn, "SELECT * FROM `users` 
        WHERE `email`='$emailUser' AND `password_user`='$passwordUser'");
        if(mysqli_num_rows($queryUser)>0){
           $user = mysqli_fetch_assoc($queryUser);
            //    print_r($user);
            //    var_dump($user);
           if($user['status_user']=='Активен'){
                // Сессия
                // session_start();
                // $_SESSION['saveLogin']=$user['LoginUser']; - сохранение значения под ключом
                // session_destroy(); - уничтожение всей сессии
                // unset($_SESSION['saveLogin']); - удаление из сессии значение под ключом
                // Печеньки
                setcookie('saveLogin', $user['email'], time()+3600);
                // setcookie(ключ/имя, значение, время хранения)
                echo "<script>
                alert(\"Добро пожаловать!\");
                location.href='pages/myprofile.php';
                </script>";
            } 
            else {
                echo "<script>
                alert(\"Пользователь удален!\");
                location.href='pages/authorization.php';
                </script>";
            }
        }  
        else {
            echo "<script>
            alert(\"Пользователь не найден!\");
            location.href='pages/authorization.php';
            </script>";
        }
    }
    // Регистрация
    else{
        // Проверка на пароли
        if($_POST['passwordForm']!=$_POST['passwordCheckForm']){
            echo "<script>
            alert(\"Пароли не совпадают!\");
            location.href='pages/authorization.php';
            </script>";
        }
        // Данные пользователя с формы
        $emailUser = trim($_POST['emailForm']);
        $passwordUser = trim($_POST['passwordForm']);
        // Проверка на уникальность почты/логина
        $queryUser = mysqli_query($conn, "SELECT * FROM `users` WHERE `email`='$emailUser' AND `password_user`='$passwordUser'");
        if(mysqli_num_rows($queryUser)>0){
            echo "<script>
            alert(\"Пользователь с такой почтой/логином уже существует!\");
            location.href='pages/authorization.php';
            </script>";
        }else{
            $queryUser = mysqli_query($conn, "INSERT INTO `Users`(`password_user`, `email`, `phone`, `status_user`, `name`, `surname`, `patronymic`) VALUES ('$passwordUser','$emailUser',NULL,'Активен',NULL,NULL,NULL)");
            if($queryUser){
                setcookie('saveLogin',$emailUser, time()+3600);
                echo "<script>
                alert(\"Вы успешно зарегались\");
                location.href='pages/myprofile.php';
                </script>";
            }
        }
    }

?>