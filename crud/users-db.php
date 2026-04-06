<?php
require "../connect-db.php";

$email = $_POST["email"] ?? false;
$password = $_POST["pass"] ?? false;
$tel = $_POST["tel"] ?? false;
$status = $_POST["status"] ?? false;
$name = $_POST["name"] ?? false;
$sur = $_POST["sur"] ?? false;
$pat = $_POST["pat"] ?? false;

if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `Users` WHERE `email` = '$email'")) > 0){
    echo "email занят";
}else{
    $sql = "INSERT INTO `Users`(`email`,`password_user`, `phone`, `status_user`, `name`, `surname`, `patronymic`) VALUES ('$email','$password','$tel','$status','$name','$sur','$pat')";
    
    echo $sql;
    
    $query = mysqli_query($conn, $sql);
}

?>