<?php
require "../connect-db.php";
session_start();
$id = $_GET['id'];
$sql = "select * from Order_Item join Item on Order_Item.id_item = Item.id_item join Categories on Categories.id_category = Item.id_category  where  id_order = $id";
$result = mysqli_query($conn, $sql);
$countquery = mysqli_fetch_array(mysqli_query($conn, "select sum(count) from Orders join Order_Item on Orders.id_order = Order_Item.id_order where Orders.id_order = $id"))[0];
$sum = 0;
$orders = mysqli_fetch_all($result, MYSQLI_ASSOC);
$order = mysqli_fetch_assoc(mysqli_query($conn,"select * from Orders where id_order = $id"));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/styleBasket.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <?php include "../components/header1.php" ?>
    <main>
        <div id="container">
            <p id="path">Главная / <span>Заказ</span></p>
            <div class="content">
                <div class="items">
                        <?php foreach ($orders as $item):
                            $sum += $item["price_item"] * $item["count"];
                            ?>
                            <div class="item-card">
                                <div>
                                    <a href="product.php?item=<?= $item["id_item"] ?>">
                                        <img src="../images/<?= $item["img_item"] ?>" alt="<?= $item["name_item"] ?>">
                                    </a>
                                    <div class="item-card-text">
                                        <div>
                                            <p class="mb-3"><?= $item["name_item"] ?></p>
                                            <p class="mb-3"><?= $item["price_item"] ?> ₽ x <?= $item["count"] ?>шт. = <?= $item["price_item"] * $item["count"] ?> ₽</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                </div>
                <div class="order_info">
                    <p>
                        Товары, <?= $countquery ?>шт.
                    </p>
                    <h4>Итого <?= $sum ?>₽</h4>
                    <p>Статус</p>
                    <h4 class="link-danger"><?=$order["status"]?></h4>
                </div>
            </div>
        </div>
    </main>
    <?php include "../components/footer.php" ?>
</body>

</html>