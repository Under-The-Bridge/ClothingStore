<?php
session_start();
require "../connect-db.php";
if (isset($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $id = mysqli_fetch_assoc(mysqli_query($conn, "Select * from Users where id_user = '$id'"))["id_user"];
    $query = mysqli_fetch_array(mysqli_query($conn, "select sum(item_count) from Basket where id_user = $id"))[0];
}
?>
<header>
    <div id="header-items">
        <a id="header-logo" href="/"></a>
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
            <a class="header-profile-item" href="catalog.php"></a>
            <a class="header-profile-item"></a>
            <? if (!isset($_SESSION["id"])): ?>
                <a class="header-profile-item" href="authorization.php"></a>
            <? else: ?>
                <a class="header-profile-item" href="myprofile.php"></a>
            <? endif; ?>
            <a class="header-profile-item" href="basket.php">
                <p class="count"><?php if (isset($query))
                    echo $query ?></p>
                </a>
            </div>
        </div>
    </header>