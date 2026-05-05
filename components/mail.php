<?php
$letters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

$password = '';


for ($i = 0; $i < 12; $i++) {
    $password .= $letters[random_int(0, strlen($letters) - 1)];
}

?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Восстановление пароля</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: #f5f5f5;
            font-family: Arial, sans-serif;
            color: #222222;
        }

        main {
            width: 100%;
            background: #f5f5f5;
            padding: 40px 0;
            display: flex;
            justify-content: center;
        }

        .container {
            width: 600px;
            background: #ffffff;
            border: 1px solid #eeeeee;
        }

        header {
            background: #111113;
            padding: 24px;
            text-align: center;
        }

        .logo {
            font-size: 28px;
            font-weight: bold;
            color: #ffffff;
        }

        .logo span {
            color: #2ecbff;
        }

        .content {
            padding: 40px 45px;
        }

        .content h1 {
            font-size: 24px;
            color: #222;
        }

        p {
            font-size: 15px;
            line-height: 1.6;
        }

        .button {
            text-align: center;
        }

        .password {
            display: inline-block;
            background: #111113;
            color: #ffffff;
            text-decoration: none;
            padding: 16px 42px;
            font-size: 13px;
            font-weight: bold;
            border-radius: 3px;
        }

        footer {
            background: #111113;
            padding: 22px;
            text-align: center;
            color: #ffffff;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <main>
        <div class="container">
            <header>
                <div class="logo">
                    <span>X</span>WEAR
                </div>
            </header>
            <div class="content">
                <h1>Восстановление пароля</h1>
                <p>Привет! Мы получили запрос на восстановление пароля для вашего аккаунта XWEAR.</p>
                <p>Мы сгенерировали для вас временный пароль.</p>
                <div class="button">
                    <p href="" class="password"><?= $password ?></p>
                </div>
                <p>Если вы не запрашивали восстановление пароля, просто проигнорируйте это письмо.</p>
            </div>
            <footer>© XWEAR. Все права защищены.</footer>
        </div>
    </main>
</body>

</html>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
   
</head>

<body style="margin: 0;padding: 0;background: #f5f5f5;font-family: Arial, sans-serif;color: #222222;">
    <main style="width: 100%;background: #f5f5f5;padding: 40px 0;display: flex;justify-content: center;">
        <div style="width: 600px;background: #ffffff;border: 1px solid #eeeeee;">
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
                    <p style="display: inline-block;background: #111113;color: #ffffff;text-decoration: none;padding: 16px 42px;font-size: 13px;font-weight: bold;border-radius: 3px;"><?= $password ?></p>
                </div>
                <p style="font-size: 15px;line-height: 1.6;">Если вы не запрашивали восстановление пароля, просто проигнорируйте это письмо.</p>
            </div>
            <footer style="background: #111113;padding: 22px;text-align: center;color: #ffffff;font-size: 12px;">© XWEAR. Все права защищены.</footer>
        </div>
    </main>
</body>

</html>