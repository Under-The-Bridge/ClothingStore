<?php
require "connect-db.php";

$items = mysqli_fetch_all(mysqli_query($conn,"select * from Item join Categories on Categories.id_category = Item.id_category"),MYSQLI_ASSOC);
$categories = mysqli_fetch_all(mysqli_query($conn,"select * from Categories"));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/style.css">
    <title>Document</title>
</head>

<body>
    <?php include "components/header3.php" ?>

    <main>
        <div id="panel">
            <div id="canvas">
                <div id="canvas-padding">
                    <div id="inner-panel">
                        <div id="panel-text">
                            <div id="panel-text-h1">Широкий ассортимент Одежды</div>
                            <div id="panel-text-h2">Одежда от известные брендов у нас в каталоге. Только качественные
                                вещи.</div>
                            <a href="pages/catalog.php" id="panel-text-btn">Перейти в каталог <p>❯</p>
</a>
                        </div>
                        <div id="arrows">
                            <div>❮</div>
                            <div>❯</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="items">
            <div class="item-show-elem">
                <div>
                    <div class="item-show-text">
                        <h2>Обувь</h2>
                        <a href="pages/catalog.php">больше товаров <p>❯</p></a>
                    </div>
                    <div class="items-to-show">
                        <?php $temp = 0;
                        foreach($items as $item):
                        if($item["id_category"] != $categories[0][0]) continue;
                        $temp++;
                        if($temp == 5) break;?>
                        <a class="item-card" href="pages/product.php?item=<?=$item['id_item']?>">
                            <p class="star">☆</p>
                            <img src="../images/<?= $item["img_item"] ?>" alt>
                            <div class="item-card-text">
                                <p><?=$item["name_item"]?></p>
                                <p><?=$item["price_item"]?></p>
                            </div>
                        </a>
                        <?php endforeach;?>
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
            <div class="item-show-elem">
                <div>
                    <div class="item-show-text">
                        <h2>Обувь</h2>
                        <a href="pages/catalog.php">больше товаров <p>❯</p></a>
                    </div>
                    <div class="items-to-show">
                        <?php $temp = 0;
                        foreach($items as $item):
                        if($item["id_category"] != $categories[1][0]) continue;
                        $temp++;
                        if($temp == 5) break;?>
                        <a class="item-card" href="pages/product.php?item=<?=$item['id_item']?>">
                            <p class="star">☆</p>
                            <img src="../images/<?= $item["img_item"] ?>" alt>
                            <div class="item-card-text">
                                <p>Nike Court Zoom Cage 2</p>
                                <p>от 4 699 ₽</p>
                            </div>
                        </a>
                        <?php endforeach;?>
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
            <div class="item-show-elem">
                <div>
                    <div class="item-show-text">
                        <h2>Обувь</h2>
                        <a href="pages/catalog.php">больше товаров <p>❯</p></a>
                    </div>
                    <div class="items-to-show">
                        <?php $temp = 0;
                        foreach($items as $item):
                        if($item["id_category"] != $categories[2][0]) continue;
                        $temp++;
                        if($temp == 5) break;?>
                        <a class="item-card" href="pages/product.php?item=<?=$item['id_item']?>">
                            <p class="star">☆</p>
                            <img src="../images/<?= $item["img_item"] ?>" alt>
                            <div class="item-card-text">
                                <p>Nike Court Zoom Cage 2</p>
                                <p>от 4 699 ₽</p>
                            </div>
                        </a>
                        <?php endforeach;?>
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
        <div id="panel-two">
            <div id="canvas-two">
                <div id="canvas-padding">
                    <div id="inner-panel">
                        <div id="panel-text">
                            <div id="panel-text-h1">Рассчитать стоимость</div>
                            <div id="panel-text-h2">Если вам не удалось найти то, что искали, вы всегда можете
                                воспользоваться автоматическим расчетом стоимость заказа на маркетплейсе Poizon, включая
                                комиссию сервиса и доставку.</div>
                            <div id="panel-text-h3">
                                <div class="panel-numbers">
                                    <div>1</div>
                                    <div>Подробная, пошаговая статья о том, как установить приложение Poizon</div>
                                </div>
                                <div class="panel-numbers">
                                    <div>2</div>
                                    <div>Напишите нам в Telegram или WhatsApp какую вещь хотите купить</div>
                                </div>
                            </div>
                            <div id="panel-text-btn">Рассчитать стоимость<p>❯</p>
                            </div>
                        </div>
                    </div>
                    <div id="phone"><img src="images/iphone.png" alt=""></div>
                </div>
            </div>
        </div>
        <div id="back-panel">
            <div id="panel-Xwear">
                <div id="chat-logo">
                    <div></div>
                </div>
                <div id="bgXwear">
                    <div id="bgPadding">
                        <div id="info-text">
                            <div id="text-h1">О интернет-магазине xwear</div>
                            <div class="text-h2">Команда XWEAR предоставляет услугу доставки только оригинальных товаров
                                c
                                крупнейшего китайского маркетплейса Poizon, чтобы наши клиенты экономили более 40% на
                                каждой
                                покупке.
                            </div>
                            <div class="text-h2">Работаем без посредников, благодаря чему можем предоставлять лучшую
                                цену.
                                Быстрая,
                                бесплатная доставка.</div>
                            <div class="text-h2">Сайт, на котором можно будет удобно оформить покупку, не скачивая
                                китайское
                                мобильное
                                приложение Poizon, с удобной фильтрацией огромного количества товаров, а так же с
                                возможностью сразу увидеть окончательную цену товара.</div>
                        </div>
                        <div id="info-panel">
                            <div id="panel">
                                <div>
                                    <div class="info-panel-text">
                                        <div id="logo-info-1" class="logo-info"></div>
                                        <div id="text">
                                            <div><span class="underline">Бесплатная</span> доставка до России</div>
                                            <div>Доставим вам заказ абсолютно бесплатно до России</div>
                                        </div>
                                    </div>
                                    <div class="info-panel-text">
                                        <div id="logo-info-2" class="logo-info"></div>
                                        <div id="text">
                                            <div><span class="underline">мы работаем</span> без посредников</div>
                                            <div>Между нами и клиентом нет третьего лишнего</div>
                                        </div>
                                    </div>
                                    <div class="info-panel-text">
                                        <div id="logo-info-3" class="logo-info"></div>
                                        <div id="text">
                                            <div><span class="underline">простота</span> в заказе и использовании</div>
                                            <div>Для заказа с Poizon не нужно никаких приложений</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="blog">
            <div class="item-show-elem">
                <div>
                    <div class="item-show-text">
                        <h2>Наш блог</h2>
                        <span>больше статей <p>❯</p></span>
                    </div>
                    <div id="items-blog">
                        <div class="item-blog">
                            <img src="images/blog1.png">
                            <div class="item-blog-text">
                                <p>Делаем скидки на всю женскую одежду осеннего сезона </p>
                                <p>Мы запускаем акцию. Готовься к осени с лета. На протяжении всего лета покупайте
                                    женские осенние вещи со скидками.</p>
                                <div>
                                    <p><span class="underline">Узнать по</span>дробнее</p>
                                    <p>16 июня 2023</p>
                                </div>
                            </div>
                        </div>
                        <div class="item-blog">
                            <img src="images/blog2.png">
                            <div class="item-blog-text">
                                <p>Делаем скидки на всю женскую одежду осеннего сезона </p>
                                <p>Мы запускаем акцию. Готовься к осени с лета. На протяжении всего лета покупайте
                                    женские осенние вещи со скидками.</p>
                                <div>
                                    <p><span class="underline">Узнать по</span>дробнее</p>
                                    <p>16 июня 2023</p>
                                </div>
                            </div>
                        </div>
                        <div class="item-blog">
                            <img src="images/blog3.png">
                            <div class="item-blog-text">
                                <p>Делаем скидки на всю женскую одежду осеннего сезона </p>
                                <p>Мы запускаем акцию. Готовься к осени с лета. На протяжении всего лета покупайте
                                    женские осенние вещи со скидками.</p>
                                <div>
                                    <p><span class="underline">Узнать по</span>дробнее</p>
                                    <p>16 июня 2023</p>
                                </div>
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