<?php
session_start();
require "../connect-db.php";
$loginUser;
if (isset($_SESSION["id"])) {
    $loginUser = $_SESSION["id"];
    $queryUser = mysqli_query($conn, "Select * from Users where id_user = '$loginUser'");
    if (mysqli_num_rows($queryUser) > 0) {
        $user = mysqli_fetch_assoc($queryUser);
    } else {
        echo "<script>
            alert(\"Нет такого пользователя\");
            location.href='authorization.php';
            </script>";
    }
} else {
    echo "<script>
        alert(\"Войдите в профиль\");
        location.href='authorization.php';
        </script>";
}

$adresses = mysqli_fetch_all(mysqli_query($conn, "select * from Addresses where id_user = $loginUser"));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/styleProfile.css">
    <title>Document</title>
</head>

<body>
    <?php include "../components/header1.php" ?>
    <main>
        <div id="container">
            <p id="path">Главная / <span>Личный кабинет</span></p>
            <div id="profilePanel">
                <h1>Личный кабинет</h1>
                <div id="profile">
                    <div id="Kabinet">
                        <a class="KabinetBtn" href="myprofile.php">
                            <img src="../images/profileLogo.svg" alt="">
                            <p>Мой аккаунт</p>
                        </a>
                        <a class="KabinetBtn" href="editprofile.php">
                            <img src="../images/profileSettings.svg" alt="">
                            <p>Редактировать профиль</p>
                        </a>
                        <div class="KabinetBtn">
                            <img src="../images/linesLogo.svg" alt="">
                            <p>История заказов</p>
                        </div>
                        <a href="myorders.php" class="KabinetBtn">
                            <img src="../images/lineDotsLogo.svg" alt="">
                            <p>Мои заказы</p>
                        </a>
                        <a class="KabinetBtn  selected" href="myadress.php">
                            <img src="../images/pointerLogo.svg" alt="">
                            <p>Адреса</p>
                        </a>
                        <div class="KabinetBtn">
                            <img src="../images/adressLogo.svg" alt="">
                            <p>Редактировать адреса</p>
                        </div>
                        <a class="KabinetBtn" href="password.php">
                            <img src="../images/lockLogo.svg" alt="">
                            <p>Пароль</p>
                        </a>
                        <div class="KabinetBtn">
                            <img src="../images/exitLogo.svg" alt="">
                            <p>Выход</p>
                        </div>
                    </div>
                    <div id="data">
                        <div>
                            <h4>Ваши адреса</h4>
                            <form action="../adress-db.php" method="post" class="d-flex" style="width: 1061px;">
                                <div class="input-group has-validation">
                                    <div class="form-floating is-invalid">
                                        <input type="text" class="form-control" id="floatingInputGroup2"
                                            placeholder="adress" name="adress">
                                        <label for="floatingInputGroup2">Добавить адрес</label>
                                    </div>
                                </div>
                                <button name="btnSave" style="width: 200px; height: 58px;"
                                    class="btn-black">Добавить</button>
                            </form>
                        </div>
                        <div id="orderHistory">
                            <h4>Ваши адреса</h4>
                            <div id="table">
                                <table>
                                    <tr>
                                        <td>АДРЕС</td>
                                        <td>...</td>
                                    </tr>
                                    <?php foreach ($adresses as $adress): ?>
                                        <tr>
                                            <td><?= $adress[2] ?></td>
                                            <td><a href="../adress-db.php?id=<?= $adress[0] ?>">Удалить</a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </div>
                    </div>
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