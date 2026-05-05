<?php
session_start();
require "../connect-db.php";
$email = $_POST["email"] ?? false;
$sql = "select * from Users where email = '$email'";
echo $sql;
if(mysqli_num_rows(mysqli_query($conn,$sql)) == 0){
echo '<script>
alert("Такой почты нет");
location.href = "forgotpass.php";
</script>';
}else{
    $_SESSION["time"] = time();
    echo '<script>
    alert("Письмо отправлено на почту, страница доступна одну минуту");
    window.open("resetpass.php?email='.$email.'");
    location.href = "authorization.php";
    </script>';
}

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;
// require '../vendor/autoload.php';

// $mail = new PHPMailer(true);

// try {
//     // Настройки сервера Gmail
//     $mail->isSMTP();
//     $mail->Host       = 'smtp.mail.ru';
//     $mail->SMTPAuth   = true;
//     $mail->Username   = 'ramazanikbaev@mail.ru';    // Твой Gmail
//     $mail->Password   = '2MmWd8S8mk1iAy0QKudf';        // Твой 16-значный ПАРОЛЬ ПРИЛОЖЕНИЯ
//     $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // TLS тоже можно, но SMTPS надежнее
//     $mail->Port       = 587;                    // Порт для SMTPSS
//     $mail->CharSet    = 'UTF-8';

//     $mail->SMTPOptions = array(
//         'ssl' => array(
//             'verify_peer' => false,
//             'verify_peer_name' => false,
//             'allow_self_signed' => true
//         )
//     );

//     // От кого и кому
//     $mail->setFrom('ramazanikbaev@mail.ru', 'ramazanikbaev@mail.ru');
//     $mail->addAddress($_POST["email"]);    // Куда придет письмо

//     // Контент
//     $mail->isHTML(true);
//     $mail->Subject = 'Сообщение о займе';
//     $mail->Body    = 'Светлана здравствуйте! Вы оформили микрозайм на сайте vasobmanylsin.ru! Перейдите по ссылке чтобы его отменить https://vasobmanyli.haha';

//     $mail->send();
//     echo 'Письмо успешно отправлено!';
// } catch (Exception $e) {
//     echo "Ошибка отправки: {$mail->ErrorInfo}";
// }

?>