<?php
//почта ramazanikbaev@mail.ru
//пароль F36GiDYsyEqccOLakeAP

require "../connect-db.php";

if(isset($_POST['email'])){
    $email = $_POST["email"] ?? false;
    if (mysqli_num_rows(mysqli_query($conn, "select * from Users where email = '$email'")) == 1) {
    
        if (isset($_POST["email"])) {
    
            $letters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    
            $password = '';
    
    
            for ($i = 0; $i < 12; $i++) {
                $password .= $letters[random_int(0, strlen($letters) - 1)];
            }
            $hash = password_hash($password,PASSWORD_DEFAULT);
            $sql = "UPDATE `Users` SET `password_user`='$hash' WHERE email = '$email'";
            mysqli_query($conn, $sql);
    
            $to = $_POST["email"];
            $subject = "XWEAR";
    
$message = '
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
   
</head>

<body style="margin: 0;padding: 0;background: #f5f5f5;font-family: Arial, sans-serif;color: #222222;display: flex;justify-content: center;">
    <main style="width: 100%;background: #f5f5f5;padding: 40px 0;">
        <div style="width: 600px;background: #ffffff;border: 1px solid #eeeeee; margin: 0 auto">
            <header style="background: #111113;padding: 24px;text-align: center;">
                <div style="font-size: 28px;font-weight: bold;color: #ffffff;">
                    <span style="color: #2ecbff;">X</span>WEAR
                </div>
            </header>
            <div style="padding: 40px 45px;">
                <h1 style="font-size: 24px;color: #222222;">Восстановление пароля</h1>
                <p style="font-size: 15px;line-height: 1.6;">Привет! Мы получили запрос на восстановление пароля для вашего аккаунта XWEAR.</p>
                <p style="font-size: 15px;line-height: 1.6;">Мы сгенерировали для вас временный пароль.</p>
                <div style="text-align: center;">
                    <p style="display: inline-block;background: #111113;color: #ffffff;text-decoration: none;padding: 16px 42px;font-size: 13px;font-weight: bold;border-radius: 3px;">'.$password.'</p>
                </div>
                <p style="font-size: 15px;line-height: 1.6;">Если вы не запрашивали восстановление пароля, просто проигнорируйте это письмо.</p>
            </div>
            <footer style="background: #111113;padding: 22px;text-align: center;color: #ffffff;font-size: 12px;">© XWEAR. Все права защищены.</footer>
        </div>
    </main>
</body>

</html>
';
            $headers = "Content-type: text/html; charset=UTF-8\r\n";
    
            mail($to, $subject, $message, $headers);
        }
    }else{
        echo "<script>alert('Такого email нет')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/styleAuthorization.css">
    <title>Document</title>
</head>

<body>
    <?php include "../components/header1.php" ?>
    <main>
        <div id="container">
            <p id="path">Главная / <span>Личный кабинет</span></p>
            <div id="forms-elem">
                <h1>АККАУНТ</h1>
                <div id="forms">
                    <form method="POST" style="width:100%">
                        <h3>Введите почту для восстановления пароля</h3>
                        <div class="input-group has-validation">
                            <div class="form-floating is-invalid">
                                <input name="email" type="email" class="form-control" id="floatingInputGroup2"
                                    placeholder="Username" required>
                                <label for="floatingInputGroup2">Email адрес:</label>
                            </div>
                        </div>
                        <div class="submitDiv">
                            <button name="btnAuth" type="submit" class="submitButton btn">Войти</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <div id="footer-panel">
            <div class="footer-column">
                <ul>
                    <li>Каталог</li>
                    <li>Одежда</li>
                    <li>Обувь</li>
                    <li>Аксессуары</li>
                    <li>Расчет стоимости</li>
                </ul>
                <div id="footer-logo"></div>
            </div>
            <div class="footer-column">
                <ul>
                    <li>Информация</li>
                    <li>Блог</li>
                    <li>Контакты</li>
                    <li>Доставка</li>
                    <li>Оплата</li>
                    <li>FAQ</li>
                </ul>
                <div id="logo-site"></div>
            </div>
            <div class="footer-column">
                <ul>
                    <li>Контакты</li>
                    <li>info@xwear.info</li>
                    <li>+7 993 608 38 85</li>
                    <li>Мессенджеры</li>
                    <li>
                        <img src="../images/telegram.png" alt="">
                        <img src="../images/whatsapp.png" alt="">
                    </li>
                    <li>Наши соц.сети</li>
                    <li>
                        <img src="../images/vk.png" alt="">
                    </li>
                </ul>
            </div>
            <div class="footer-column">
                <ul>
                    <li>Подписка на новости</li>
                    <li>Будьте в курсе скидок и новостей</li>
                    <li>
                        <div>
                            <input type="email" placeholder="Ваш email">
                            <button type="submit">❯</button>
                        </div>
                    </li>
                    <li>Подписываясь на рассылку вы соглашатесь с обработкой персональных данных</li>
                </ul>
                <div>
                    <p>Политика конфиденциальности</p>
                    <p>Пользовательское соглашение</p>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>