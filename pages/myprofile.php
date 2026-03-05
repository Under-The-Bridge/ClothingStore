<?php
    require "../connect-db.php";
    if(isset($_COOKIE['saveLogin'])){
        $loginUser = $_COOKIE['saveLogin'];
        $queryUser = mysqli_query($conn, "Select * from Users where email = '$loginUser'");
        if(mysqli_num_rows($queryUser)>0){
            $user = mysqli_fetch_assoc($queryUser);
        }else{
            echo "<script>
            alert(\"Нет такого пользователя\");
            location.href='authorization.php';
            </script>";
        }
    }else{
        echo "<script>
        alert(\"Войдите в профиль\");
        location.href='authorization.php';
        </script>";
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
    <link rel="stylesheet" href="../styles/styleProfile.css">
    <title>Document</title>
</head>

<body>
    <header>
        <div id="header-items">
            <a id="header-logo" href="../index.php"></a>
            <div id="header-btns">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Одежда
                    </button>
                    <ul class="dropdown-menu">
                        <li><button class="dropdown-item" type="button">Action</button></li>
                        <li><button class="dropdown-item" type="button">Another action</button></li>
                        <li><button class="dropdown-item" type="button">Something else here</button></li>
                    </ul>
                </div>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Обувь
                    </button>
                    <ul class="dropdown-menu">
                        <li><button class="dropdown-item" type="button">Action</button></li>
                        <li><button class="dropdown-item" type="button">Another action</button></li>
                        <li><button class="dropdown-item" type="button">Something else here</button></li>
                    </ul>
                </div>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Аксессуары
                    </button>
                    <ul class="dropdown-menu">
                        <li><button class="dropdown-item" type="button">Action</button></li>
                        <li><button class="dropdown-item" type="button">Another action</button></li>
                        <li><button class="dropdown-item" type="button">Something else here</button></li>
                    </ul>
                </div>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Бренды
                    </button>
                    <ul class="dropdown-menu">
                        <li><button class="dropdown-item" type="button">Action</button></li>
                        <li><button class="dropdown-item" type="button">Another action</button></li>
                        <li><button class="dropdown-item" type="button">Something else here</button></li>
                    </ul>
                </div>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Расчет стоимости
                    </button>
                    <ul class="dropdown-menu">
                        <li><button class="dropdown-item" type="button">Action</button></li>
                        <li><button class="dropdown-item" type="button">Another action</button></li>
                        <li><button class="dropdown-item" type="button">Something else here</button></li>
                    </ul>
                </div>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Информация
                    </button>
                    <ul class="dropdown-menu">
                        <li><button class="dropdown-item" type="button">Наш блог</button></li>
                        <li><button class="dropdown-item" type="button">Наши контакты</button></li>
                        <li><button class="dropdown-item" type="button">Доставка</button></li>
                        <li><button class="dropdown-item" type="button">Оплата</button></li>
                        <li><button class="dropdown-item" type="button">FAQ</button></li>
                    </ul>
                </div>
                <!-- <div class="header-btn">Одежда<p>ᐯ</p>
                </div>
                <div class="header-btn">Обувь<p>ᐯ</p>
                </div>
                <div class="header-btn">Аксессуары<p>ᐯ</p>
                </div>
                <div class="header-btn">Бренды<p>ᐯ</p>
                </div>
                <div class="header-btn">Расчет стоимости<p>ᐯ</p>
                </div>
                <div class="header-btn">Информация<p>ᐯ</p>
                </div> -->
            </div>
            <div id="header-profile-items">
                <div class="header-profile-item"></div>
                <div class="header-profile-item"></div>
                <a class="header-profile-item" href="authorization.php"></a>
                <a class="header-profile-item" href="catalog.php"></a>
            </div>
        </div>
    </header>
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
                        <div class="KabinetBtn">
                            <img src="../images/lineDotsLogo.svg" alt="">
                            <p>Мои заказы</p>
                        </div>
                        <div class="KabinetBtn">
                            <img src="../images/pointerLogo.svg" alt="">
                            <p>Адреса</p>
                        </div>
                        <div class="KabinetBtn">
                            <img src="../images/adressLogo.svg" alt="">
                            <p>Редактировать адреса</p>
                        </div>
                        <div class="KabinetBtn">
                            <img src="../images/lockLogo.svg" alt="">
                            <p>Пароль</p>
                        </div>
                        <div class="KabinetBtn">
                            <img src="../images/exitLogo.svg" alt="">
                            <p>Выход</p>
                        </div>
                    </div>
                    <div id="data">
                        <h4>Приведствуем, NAME</h4>
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
                            <div id="table">
                                <table>
                                    <tr>
                                        <td>НОМЕР</td>
                                        <td>ДАТА</td>
                                        <td>СТАТУС</td>
                                        <td>ИТОГ</td>
                                    </tr>
                                    <tr>
                                        <td>#1234</td>
                                        <td>17/02/2026</td>
                                        <td>В обработке</td>
                                        <td>6 769p</td>
                                    </tr>
                                    <tr>
                                        <td>#1234</td>
                                        <td>17/02/2026</td>
                                        <td>В обработке</td>
                                        <td>6 769p</td>
                                    </tr>
                                    <tr>
                                        <td>#1234</td>
                                        <td>17/02/2026</td>
                                        <td>В обработке</td>
                                        <td>6 769p</td>
                                    </tr>
                                    <tr>
                                        <td>#1234</td>
                                        <td>17/02/2026</td>
                                        <td>В обработке</td>
                                        <td>6 769p</td>
                                    </tr>
                                    <tr>
                                        <td>#1234</td>
                                        <td>17/02/2026</td>
                                        <td>В обработке</td>
                                        <td>6 769p</td>
                                    </tr>
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