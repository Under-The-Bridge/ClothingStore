<?php
require "connect-db.php";
$password = $_POST["password"] ?? false;
$passwordCheck = $_POST["passwordCheck"] ?? false;
$email = $_POST["email"] ?? false;
unset($_SESSION["time"]);

if($password != $passwordCheck){
        echo '<script>
alert("Разные пароли");
window.history.back();
</script>';
}

$sql = "UPDATE `Users` SET `password_user`='$password' WHERE `email` = '$email'";
mysqli_query($conn,$sql);
        echo '<script>
alert("Пароль изменен");
location.href = "pages/authorization.php";
</script>';
?>