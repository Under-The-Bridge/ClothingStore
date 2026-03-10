<?php
    require "connect-db.php";


    
    $user = $_COOKIE['saveLogin'];
    
    
    if(isset($_POST['btnSave'])){
        $name = $_POST["nameForm"] ?? '';
        $surname = $_POST["surnameForm"] ?? '';
        $patronymic = $_POST["patronymicForm"] ?? '';
        $email = $_POST["emailForm"] ?? '';
        $phone = $_POST["phoneForm"] ?? '';
    
        // print_r($_COOKIE["saveLogin"]);
        $sql = "UPDATE `Users` SET `email`='$email',`phone`='$phone',`name`='$name',`surname`='$surname',`patronymic`='$patronymic' WHERE `email` = '$user'";
        
        $query = mysqli_query($conn, $sql);
        if($query){
            setcookie('saveLogin',$email, time()+3600);
            echo "<script>
            alert(\"Успешно изменено!\");
            location.href='pages/editprofile.php';
            </script>";
        }
    }elseif(isset($_POST['btnDelete'])){
            echo "<script>
            if(!confirm(\"Вы уверены?\")){
                location.href='pages/editprofile.php';
            }
            </script>";
            $sql = "UPDATE `Users` SET `status_user`='Удален' WHERE `email` = '$user'";
            $query = mysqli_query($conn, $sql);
            if($query){
                setcookie('saveLogin',$email, time()-3600);
                echo "<script>
                alert(\"Профиль удален!\");
                location.href='/';
                </script>";
            }

    }elseif(isset($_POST['btnExit'])){
            setcookie('saveLogin',$email, time()-3600);
            echo "<script>
            alert(\"Вы вышли!\");
            location.href='pages/authorization.php';
            </script>";
    }else{
        echo "<script>
        alert(\"Как вы сюда попали?!\");
        location.href='/';
        </script>";
    }
?>