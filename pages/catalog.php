<?php
require "../connect-db.php";

$minprice = $_GET["min-price"] ?? 0;
$maxprice = $_GET["max-price"] ?? 10000;
$category = $_GET["category"] ?? false;
$sort = $_GET["sort"] ?? 0;


$sql = "select * from Item";

$sql .= " where price_item between $minprice and $maxprice";

if(isset($_GET["search"])){
    $search_value = $_GET["search-value"];
    $sql .= " and name_item like '%$search_value%'";
}else{
    if($category){
        for($i = 0; $i < count($category); $i++){
            $temp = $category[$i];
            if($i == 0){
                $sql .= " and id_category = $temp";
            }else{
                $sql .= " or id_category = $temp";      
            }
        }
    }
    if($sort != 0){
        $sql .= " order by price_item $sort";
    }
}
$query = mysqli_query($conn, $sql);

$categories = mysqli_fetch_all(mysqli_query($conn, "Select * from Categories"),MYSQLI_ASSOC);


$Items = mysqli_fetch_all($query,MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styleCatalog.css">
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
            <a id="header-logo" href="#"></a>
            <div id="header-div">
                <form id="header-btns">
                    <input id="SearchInput" type="text" placeholder="Поиск по каталогу товаров" name="search-value">
                    <button id="SearchLogo" class="header-profile-item btn" name="search"></button>
                </form>
                <div id="header-profile-items">
                    <div class="header-profile-item" hidden></div>
                    <div class="header-profile-item"></div>
                    <a class="header-profile-item" href="authorization.php"></a>
                    <a class="header-profile-item" href="catalog.php"></a>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div id="container">
            <p id="path">Главная / Личный кабинет/<span>Каталог</span></p>
            <div id="catalog">
                <form id="filterPanel">
                    <div class="filter">
                        
                        <div class="filterTitle">
                            <p>Категории</p>
                            <p>v</p>
                        </div>
                        <?php foreach($categories as $category):?>
                            <p>
                                <label for="checkbox"><?=$category["name_category"]?></label>
                                <input id="checkbox" type="checkbox" value="<?=$category["id_category"]?>" name="category[]">
                            </p>
                        <?php endforeach;?>
                    </div>
                    <div class="filter">
                        <div class="filterTitle">
                            <p>Фильтр по цене</p>
                            <p>v</p>
                        </div>
                        <div class="wrapper">
                            <div class="price-input" style="">
                                <div class="field">
                                    <label for="min">Мин цена</label>
                                    <input id="min"type="number" class="input-min" value="<?=$minprice?>" name="min-price">
                                </div>
                                <div class="separator">-</div>
                                <div class="field">
                                    <label for="max">Макс цена</label>
                                    <input id="max" type="number" class="input-max" value="<?=$maxprice?>" name="max-price">
                                </div>
                            </div>
                            <div class="slider">
                                <div class="progress"></div>
                            </div>
                            <div class="range-input">
                                <input type="range" class="range-min" min="0" max="10000" value="<?=$minprice?>" step="100">
                                <input type="range" class="range-max" min="0" max="10000" value="<?=$maxprice?>" step="100">
                            </div>
                        </div>
                        <!-- <p id="filterPrice">
                            <input type="number">
                            <span>-</span>
                            <input type="number">
                        </p>
                        <p>
                            <input type="range" name="" id="">
                        </p> -->
                    </div>
                    <div class="filter">
                        <label for="sort">Сортировка</label>
                        <select name="sort" id="sort">
                            <option value="0" <?=$sort == "0"?"checked":""?>>Не выбрано</option>
                            <option value="ASC" <?=$sort == "ASC"?"checked":""?>>по возрастанию</option>
                            <option value="DESC" <?=$sort == "DESC"?"checked":""?>>по убыванию</option>
                        </select>
                    </div>
                    <div class="filter">
                        <div class="filterTitle">
                            <p>Размер (EU)</p>
                            <p>v</p>
                        </div>
                        <div id="sizeGrid">
                            <div>36</div>
                            <div>36,5</div>
                            <div>37</div>
                            <div>36</div>
                            <div>36,5</div>
                            <div>37</div>
                            <div>36</div>
                            <div>36,5</div>
                            <div>37</div>
                            <div>36</div>
                            <div>36,5</div>
                            <div>37</div>
                            <div>36</div>
                            <div>36,5</div>
                            <div>37</div>
                            <div>36</div>
                            <div>36,5</div>
                            <div>37</div>
                        </div>
                    </div>
                    <div class="filter">
                        <div class="filterTitle">
                            <p>Бренды</p>
                            <p>v</p>
                        </div>
                        <div id="brands">
                            <div><input type="checkbox" name="" id="">
                                <p>Adidas</p>
                            </div>
                            <div><input type="checkbox" name="" id="">
                                <p>Adidas</p>
                            </div>
                            <div><input type="checkbox" name="" id="">
                                <p>Adidas</p>
                            </div>
                            <div><input type="checkbox" name="" id="">
                                <p>Adidas</p>
                            </div>
                            <div><input type="checkbox" name="" id="">
                                <p>Adidas</p>
                            </div>
                            <div><input type="checkbox" name="" id="">
                                <p>Adidas</p>
                            </div>
                            <div><input type="checkbox" name="" id="">
                                <p>Adidas</p>
                            </div>
                            <div><input type="checkbox" name="" id="">
                                <p>Adidas</p>
                            </div>
                            <div><input type="checkbox" name="" id="">
                                <p>Adidas</p>
                            </div>
                            <div><input type="checkbox" name="" id="">
                                <p>Adidas</p>
                            </div>
                            <div><input type="checkbox" name="" id="">
                                <p>Adidas</p>
                            </div>
                            <div><input type="checkbox" name="" id="">
                                <p>Adidas</p>
                            </div>
                            <div><input type="checkbox" name="" id="">
                                <p>Adidas</p>
                            </div>
                            <div><input type="checkbox" name="" id="">
                                <p>Adidas</p>
                            </div>
                            <div><input type="checkbox" name="" id="">
                                <p>Adidas</p>
                            </div>
                            <div><input type="checkbox" name="" id="">
                                <p>Adidas</p>
                            </div>
                            <div><input type="checkbox" name="" id="">
                                <p>Adidas</p>
                            </div>
                            <div><input type="checkbox" name="" id="">
                                <p>Adidas</p>
                            </div>
                            <div><input type="checkbox" name="" id="">
                                <p>Adidas</p>
                            </div>
                            <div><input type="checkbox" name="" id="">
                                <p>Adidas</p>
                            </div>
                            <div><input type="checkbox" name="" id="">
                                <p>Adidas</p>
                            </div>
                            <div><input type="checkbox" name="" id="">
                                <p>Adidas</p>
                            </div>
                            <div><input type="checkbox" name="" id="">
                                <p>Adidas</p>
                            </div>
                            <div><input type="checkbox" name="" id="">
                                <p>Adidas</p>
                            </div>
                        </div>
                    </div>
                    <div class="filter">
                        <div class="filterTitle">
                            <p>Модель</p>
                            <p>v</p>
                        </div>
                        <div id="model">
                            <div><input type="checkbox" name="" id="">
                                <p>Air Force 1 High</p>
                            </div>
                            <div><input type="checkbox" name="" id="">
                                <p>Air Force 1 High</p>
                            </div>
                            <div><input type="checkbox" name="" id="">
                                <p>Air Force 1 High</p>
                            </div>
                            <div><input type="checkbox" name="" id="">
                                <p>Air Force 1 High</p>
                            </div>
                            <div><input type="checkbox" name="" id="">
                                <p>Air Force 1 High</p>
                            </div>
                            <div><input type="checkbox" name="" id="">
                                <p>Air Force 1 High</p>
                            </div>
                            <div><input type="checkbox" name="" id="">
                                <p>Air Force 1 High</p>
                            </div>
                            <div><input type="checkbox" name="" id="">
                                <p>Air Force 1 High</p>
                            </div>
                            <div><input type="checkbox" name="" id="">
                                <p>Air Force 1 High</p>
                            </div>
                            <div><input type="checkbox" name="" id="">
                                <p>Air Force 1 High</p>
                            </div>
                            <div><input type="checkbox" name="" id="">
                                <p>Air Force 1 High</p>
                            </div>
                            <div><input type="checkbox" name="" id="">
                                <p>Air Force 1 High</p>
                            </div>
                            <div><input type="checkbox" name="" id="">
                                <p>Air Force 1 High</p>
                            </div>
                            <div><input type="checkbox" name="" id="">
                                <p>Air Force 1 High</p>
                            </div>
                            <div><input type="checkbox" name="" id="">
                                <p>Air Force 1 High</p>
                            </div>
                            <div><input type="checkbox" name="" id="">
                                <p>Air Force 1 High</p>
                            </div>
                            <div><input type="checkbox" name="" id="">
                                <p>Air Force 1 High</p>
                            </div>
                            <div><input type="checkbox" name="" id="">
                                <p>Air Force 1 High</p>
                            </div>
                            <div><input type="checkbox" name="" id="">
                                <p>Air Force 1 High</p>
                            </div>
                            <div><input type="checkbox" name="" id="">
                                <p>Air Force 1 High</p>
                            </div>
                            <div><input type="checkbox" name="" id="">
                                <p>Air Force 1 High</p>
                            </div>
                            <div><input type="checkbox" name="" id="">
                                <p>Air Force 1 High</p>
                            </div>
                            <div><input type="checkbox" name="" id="">
                                <p>Air Force 1 High</p>
                            </div>
                            <div><input type="checkbox" name="" id="">
                                <p>Air Force 1 High</p>
                            </div>
                        </div>
                    </div>
                    <div class="filter">
                        <div class="filterTitle">
                            <p>Цвет</p>
                            <p>v</p>
                        </div>
                        <div id="colorGrid">
                            <div>
                                <div></div>
                                <p>Цвет</p>
                            </div>
                            <div>
                                <div></div>
                                <p>Цвет</p>
                            </div>
                            <div>
                                <div></div>
                                <p>Цвет</p>
                            </div>
                            <div>
                                <div></div>
                                <p>Цвет</p>
                            </div>
                            <div>
                                <div></div>
                                <p>Цвет</p>
                            </div>
                            <div>
                                <div></div>
                                <p>Цвет</p>
                            </div>
                            <div>
                                <div></div>
                                <p>Цвет</p>
                            </div>
                            <div>
                                <div></div>
                                <p>Цвет</p>
                            </div>
                            <div>
                                <div></div>
                                <p>Цвет</p>
                            </div>
                            <div>
                                <div></div>
                                <p>Цвет</p>
                            </div>
                            <div>
                                <div></div>
                                <p>Цвет</p>
                            </div>
                            <div>
                                <div></div>
                                <p>Цвет</p>
                            </div>
                            <div>
                                <div></div>
                                <p>Цвет</p>
                            </div>
                            <div>
                                <div></div>
                                <p>Цвет</p>
                            </div>
                            <div>
                                <div></div>
                                <p>Цвет</p>
                            </div>
                            <div>
                                <div></div>
                                <p>Цвет</p>
                            </div>
                            <div>
                                <div></div>
                                <p>Цвет</p>
                            </div>
                        </div>
                    </div>
                    <div class="filter">
                        <div class="filterTitle">
                            <p>x</p>
                            <p>СБРОСИТЬ ВСЕ ФИЛЬТРЫ</p>
                        </div>
                    </div>
                    <button class="filter" style="background:#49d0ff; color: white;">
                        <div class="filterTitle">
                            <p>x</p>
                            <p>ПРИМЕНИТЬ ФИЛЬТРЫ</p>
                        </div>
                    </button>
                    <div class="ad">
                        <div>
                            <h4>Спортивная одежда</h4>
                            <br>
                            <h4>перейти</h4>
                        </div>
                    </div>
                </form>
                <div id="catalogItems">
                    <h1>Каталог</h1>
                    <p><?=mysqli_num_rows($query)?> товаров</p>
                    <div id="items">
                        <?php foreach($Items as $Item):?>
                        <div class="item-card">
                            <a href="product.php?item=<?=$Item["id_item"]?>" class="item-card">
                                <p class="star">☆</p>
                                <img src="../images/shoes/<?=$Item["img_item"]?>.svg" alt="<?=$Item["name_item"]?>">
                                <div class="item-card-text">
                                    <p><?=$Item["name_item"]?></p>
                                    <p>от <?=$Item["price_item"]?> ₽</p>
                                </div>
                            </a>
                            <a href="../basket-db.php?item=<?=$Item["id_item"]?>" class="btn btn-primary">Добавить в корзину</a>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
            <div id="pagination">
                <div>
                    <div>←</div>
                    <div>1</div>
                    <div>2</div>
                    <div>3</div>
                    <div>4</div>
                    <div>5</div>
                    <div>...</div>
                    <div>128</div>
                    <div>→</div>
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
<script>
    const rangeInput = document.querySelectorAll(".range-input input"),
        priceInput = document.querySelectorAll(".price-input input"),
        range = document.querySelector(".slider .progress");
    let priceGap = 1000;
    priceInput.forEach(input => {
        input.addEventListener("input", e => {
            let minPrice = parseInt(priceInput[0].value),
                maxPrice = parseInt(priceInput[1].value);

            if ((maxPrice - minPrice >= priceGap) && maxPrice <= rangeInput[1].max) {
                if (e.target.className === "input-min") {
                    rangeInput[0].value = minPrice;
                    range.style.left = ((minPrice / rangeInput[0].max) * 100) + "%";
                } else {
                    rangeInput[1].value = maxPrice;
                    range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
                }
            }
        });
    });
    rangeInput.forEach(input => {
        input.addEventListener("input", e => {
            let minVal = parseInt(rangeInput[0].value),
                maxVal = parseInt(rangeInput[1].value);
            if ((maxVal - minVal) < priceGap) {
                if (e.target.className === "range-min") {
                    rangeInput[0].value = maxVal - priceGap
                } else {
                    rangeInput[1].value = minVal + priceGap;
                }
            } else {
                priceInput[0].value = minVal;
                priceInput[1].value = maxVal;
                range.style.left = ((minVal / rangeInput[0].max) * 100) + "%";
                range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
            }
        });
    });
</script>

</html>