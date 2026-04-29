<?php
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 
require 'vendor/autoload.php'; 
session_start();
require "../connect-db.php";
$mail = new PHPMailer(true);
$user = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM Users WHERE `login_user` = '$_SESSION[login]'"));
$email = $user['email'];
$login = $user['login_user'];
try {
// Настройки сервера Gmail
$mail->isSMTP();
$mail->Host='smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'nizamovdanil2@gmail.com';
$mail->Password = 'auig kuru agxb lmpu';
$mail->SMTPSecure = PHPMailer:: ENCRYPTION_STARTTLS; // TLS TOже MOжH
$mail->Port = 587;
$mail->CharSet = 'UTF-8';
$mail->SMTPOptions = array(
'ssl' => array(
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => true
    )
);
$mail->setFrom('nizamovdanil2@gmail.com', 'NaryshenyamNET'); $mail->addAddress ('ramazanikbaev6@gmail.com'); // Куда придет письмо
// Контент
$mail->isHTML(true);
$mail->Subject = 'Сообшение сайтa NaryshenyamNET';
$mail->Body = 'Привет! Вы заблокированы!';
$mail->send();
echo 'Письмо успешно отправлено!';
}catch (Exception $e) {
// От кого и кому
echo "Oшибка отправки: {$mail->ErrorInfo}";
}