<?php
session_start();
require "../connect-db.php";
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
$orders = mysqli_fetch_all(mysqli_query($conn, "select * from Orders where id_user = $loginUser"));
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
                        <a class="KabinetBtn selected" href="myprofile.php">
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
                        <a class="KabinetBtn" href="myadress.php">
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
                        <h4>Приветствуем</h4>
                        <div id="profileNavigation">
                            <a class="nav-btn" href="profile.php">
                                <img src="../images/profileLogo.svg" alt="">
                                <p>Мой профиль</p>
                            </a>
                            <div class="nav-btn">
                                <img src="../images/lineDotsLogo.svg" alt="">
                                <p>Заказы</p>
                            </div>
                            <div class="nav-btn">
                                <img src="../images/pointerLogo.svg" alt="">
                                <p>Мои адреса</p>
                            </div>
                            <div class="nav-btn">
                                <img src="../images/profileSettings.svg" alt="">
                                <p>Редактировать профиль</p>
                            </div>
                            <div class="nav-btn">
                                <img src="../images/star.svg" alt="">
                                <p>Избранные товары</p>
                            </div>
                            <div class="nav-btn">
                                <img src="../images/exitLogo.svg" alt="">
                                <p>Выход</p>
                            </div>
                        </div>
                        <div id="orderHistory">
                            <h4>Текущие заказы</h4>
                            <!-- <div id="orderHistory" style="width: 1061px"> -->
                                <div id="table">
                                    <table>
                                       <tr>
                                        <td>ЗАКАЗ</td>
                                        <td>АДРЕС</td>
                                        <td>СУММА</td>
                                        <td>ДАТА ДОСТАВКИ</td>
                                        <td>СПОСОБ ОПЛАТЫ</td>
                                        <td>СТАТУС</td>
                                    </tr>

                                    <?php foreach ($orders as $order):
                                        $order_id = $order[0] ?>
                                        <tr>
                                            <td><a href="inorder.php?id=<?= $order[0] ?>">Подробнее</a></td>
                                            <td><?= $order[2] ?></td>
                                            <td><?= $order[3] ?></td>
                                            <td><?= $order[5] ?></td>
                                            <td><?= $order[6] ?></td>
                                            <td><?= $order[7] ?></td>
                                        </tr>
                                            <!-- <tr>
                                            <td> <a data-bs-toggle="collapse" href="#q<?= $order_id ?>" role="button"
                                                    aria-expanded="false" aria-controls="q<?= $order_id ?>">
                                                    Расскрыть
                                                </a></td>
                                        </tr> -->
                                            <!-- <tr class="collapse" id="q<?= $order_id ?>">

                                            <td>НАЗВАНИЕ</td>
                                            <td>ЦЕНА</td>
                                            <td>ОПИСАНИЕ</td>
                                            <td>СТАТУС ТОВАРА</td>
                                            <td>ССЫЛКА</td>
                                        </tr> -->

                                            <?php
                                            $items = mysqli_fetch_all(mysqli_query($conn, "select * from Order_Item join Item on Item.id_item = Order_Item.id_item join Categories on Categories.id_category = Item.id_category where id_order = $order_id"), MYSQLI_ASSOC);
                                            foreach ($items as $item): ?>

                                                <!-- <tr class="collapse" id="q<?= $order_id ?>">
                                                <td><img src="../images/<?= $item["img_item"] ?>" alt="<?= $item["name_item"] ?>"
                                                        alt=""></td>
                                                <td><?= $item['name_item'] ?></td>
                                                <td><?= $item['price_item'] ?></td>
                                                <td><?= $item['status_item'] ?></td>
                                                <td><a href="product.php?item=<?= $item['id_item'] ?>">Перейти</a></td>
                                            </tr> -->
                                            <?php endforeach; ?>

                                        <?php endforeach; ?>
                                    </table>
                                </div>
                            <!-- </div> -->
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