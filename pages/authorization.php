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
                    <form action="../authReg-db.php" method="POST">
                        <h3>Войти</h3>
                        <div class="input-group has-validation">
                            <div class="form-floating is-invalid">
                                <input name="emailForm" type="email" class="form-control" id="floatingInputGroup2" placeholder="Username"
                                    required>
                                <label for="floatingInputGroup2">Email адрес:</label>
                            </div>
                        </div>
                        <div class="input-group has-validation">
                            <div class="form-floating is-invalid">
                                <input name="passwordForm" type="password" class="form-control" id="floatingInputGroup2"
                                    placeholder="Username" required>
                                <label for="floatingInputGroup2">Пароль:</label>
                            </div>
                        </div>
                        <div id="checkbox">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="checkDefault">
                                <label class="form-check-label" for="checkDefault">
                                    Запомнить меня
                                </label>
                            </div>
                            <a class="link-secondary" href="email.php">Забыли пароль?</a>
                        </div>
                        <div class="submitDiv">
                            <button name="btnAuth" type="submit" class="submitButton btn">Войти</button>
                        </div>
                    </form>
                    <form action="../authReg-db.php" method="POST">
                        <h3>Регистрация</h3>
                        <div class="input-group has-validation">
                            <div class="form-floating is-invalid">
                                <input name="emailForm" type="email" class="form-control" id="floatingInputGroup2" placeholder="Username"
                                    required>
                                <label for="floatingInputGroup2">Email адрес:</label>
                            </div>
                        </div>
                        <div class="input-group has-validation">
                            <div class="form-floating is-invalid">
                                <input name="passwordForm" type="password" class="form-control" id="floatingInputGroup2"
                                    placeholder="Username" required>
                                <label for="floatingInputGroup2">Пароль:</label>
                            </div>
                        </div>
                        <div class="input-group has-validation">
                            <div class="form-floating is-invalid">
                                <input name="passwordCheckForm" type="password" class="form-control" id="floatingInputGroup2"
                                    placeholder="Username" required>
                                <label for="floatingInputGroup2">Повторите пароль:</label>
                            </div>
                        </div>
                        <div class="submitDiv">
                            <button name="btnReg" id="regist" type="submit" class="submitButton btn">Зарегистрироваться</button>
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