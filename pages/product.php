<?php
require "../connect-db.php";
$Item = $_GET["item"];
$query = mysqli_query($conn, "select * from Item join Categories on Item.id_category = Categories.id_category where id_item = $Item");
$Item = mysqli_fetch_assoc($query);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/styleProduct.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
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
            <div>
                <div id="card">
                    <div id="imagePanel">
                        <div>
                            <img src="../images/shoes/<?=$Item["img_item"]?>.svg" alt="">
                        </div>
                        <div>
                            <div>
                                <div class="underImg"><img src="../images/shoes/<?=$Item["img_item"]?>.svg" alt=""></div>
                                <div class="underImg"><img src="../images/shoes/<?=$Item["img_item"]?>.svg" alt=""></div>
                                <div class="underImg"><img src="../images/shoes/<?=$Item["img_item"]?>.svg" alt=""></div>
                            </div>
                        </div>
                    </div>
                    <div id="somePanel">
                        <h1><?=$Item["name_item"]?></h1>
                        <p>EU размеры:</p>
                        <div id="sizes">
                            <div class="sizeElem">
                                <p>36</p>
                                <p>3 699₽</p>
                            </div>
                            <div class="sizeElem">
                                <p>36</p>
                                <p>3 699₽</p>
                            </div>
                            <div class="sizeElem">
                                <p>36</p>
                                <p>3 699₽</p>
                            </div>
                            <div class="sizeElem">
                                <p>36</p>
                                <p>3 699₽</p>
                            </div>
                            <div class="sizeElem">
                                <p>36</p>
                                <p>3 699₽</p>
                            </div>
                            <div class="sizeElem">
                                <p>36</p>
                                <p>3 699₽</p>
                            </div>
                            <div class="sizeElem">
                                <p>36</p>
                                <p>3 699₽</p>
                            </div>
                            <div class="sizeElem">
                                <p>36</p>
                                <p>3 699₽</p>
                            </div>
                            <div class="sizeElem">
                                <p>36</p>
                                <p>3 699₽</p>
                            </div>
                            <div class="sizeElem">
                                <p>36</p>
                                <p>3 699₽</p>
                            </div>
                            <div class="sizeElem">
                                <p>36</p>
                                <p>3 699₽</p>
                            </div>
                            <div class="sizeElem">
                                <p>36</p>
                                <p>3 699₽</p>
                            </div>
                            <div class="sizeElem">
                                <p>36</p>
                                <p>3 699₽</p>
                            </div>
                            <div class="sizeElem">
                                <p>36</p>
                                <p>3 699₽</p>
                            </div>
                            <div class="sizeElem">
                                <p>36</p>
                                <p>3 699₽</p>
                            </div>
                            <div class="sizeElem">
                                <p>36</p>
                                <p>3 699₽</p>
                            </div>
                            <div class="sizeElem">
                                <p>36</p>
                                <p>3 699₽</p>
                            </div>
                        </div>
                        <div id="price">
                            <div>
                                <p><?=$Item["price_item"]?> ₽</p>
                                <p>РАЗМЕР - 40</p>
                            </div>
                            <div class="btn-black">Добавить в корзину ></div>
                        </div>
                    </div>
                </div>
                <div id="description">
                    <div id="btn-description">
                        <div>Детали</div>
                        <div>Доставка</div>
                        <div>Оплата</div>
                        <div>ЧаВо</div>
                    </div>
                    <div id="description-info">
                        <div>
                            <p>Артикул</p>
                            <div>
                                <div></div>
                                <p><?=$Item["id_item"]?></p>
                            </div>
                        </div>
                        <div>
                            <p>Категория</p>
                            <div>
                                <div></div>
                                <p><?=$Item["name_category"]?></p>
                            </div>
                        </div>
                        <div>
                            <p>Бренд</p>
                            <div>
                                <div></div>
                                <p>Nike</p>
                            </div>
                        </div>
                        <div>
                            <p>Модель</p>
                            <div>
                                <div></div>
                                <p>Nike Air Force</p>
                            </div>
                        </div>
                        <div>
                            <p>Цвет</p>
                            <div>
                                <div></div>
                                <p>Голубой</p>
                            </div>
                        </div>
                        <div>
                            <p>Коллаборация</p>
                            <div>
                                <div></div>
                                <p>Nike X OFF-WHITE</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <h1>Интересные предложения</h1>
                    <div class="items-to-show">
                        <div class="item-card">
                            <p class="star">☆</p>
                            <img src="../images/nikecourt.png" alt>
                            <div class="item-card-text">
                                <p>Nike Court Zoom Cage 2</p>
                                <p>от 4 699 ₽</p>
                            </div>
                        </div>
                        <div class="item-card">
                            <p class="star">☆</p>
                            <img src="../images/airforce.png" alt>
                            <div class="item-card-text">
                                <p>Air Force 1 Ultra</p>
                                <p>от 6 789 ₽</p>
                            </div>
                        </div>
                        <div class="item-card">
                            <p class="star">☆</p>
                            <img src="../images/airforcefly.png" alt>
                            <div class="item-card-text">
                                <p>Air Force 1 Ultra Flyknit</p>
                                <p>от 3 129 ₽</p>
                            </div>
                        </div>
                        <div class="item-card">
                            <p class="star">☆</p>
                            <img src="../images/mensoccer.png" alt>
                            <div class="item-card-text">
                                <p>Men’s Soccer Shoes</p>
                                <p>от 2 699 ₽</p>
                            </div>
                        </div>
                    </div>
                    <div class="items-pagination">
                        <div>
                            <div>❮</div>
                            <div class="dots chosen">●</div>
                            <div class="dots">●</div>
                            <div class="dots">●</div>
                            <div class="dots">●</div>
                            <div>❯</div>
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
                        <img src="images/telegram.png" alt="">
                        <img src="images/whatsapp.png" alt="">
                    </li>
                    <li>Наши соц.сети</li>
                    <li>
                        <img src="images/vk.png" alt="">
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