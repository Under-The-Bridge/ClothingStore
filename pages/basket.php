<?php
require "../connect-db.php";

$user = $_COOKIE["saveLogin"] ?? false;

if(!$user){
        echo "<script>
    alert(\"Войдите в профиль\");
    location.href='authorization.php';
    </script>";
}
$getUser = mysqli_fetch_assoc(mysqli_query($conn, "Select * from Users where email = '$user'"))["id_user"];
$sql = "select * from Basket join Item on Basket.id_item = Item.id_item join Categories on Categories.id_category = Item.id_category  where  id_user = $getUser";
$result = mysqli_query($conn, $sql);
$countquery = mysqli_fetch_array(mysqli_query($conn, "select sum(item_count) from Basket where id_user = $getUser"))[0];
$sum = 0;
$basket = mysqli_fetch_all($result, MYSQLI_ASSOC);
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
            <p id="path">Главная / <span>Корзина</span></p>
            <div class="content">
                <div class="items">
                    <?php foreach ($basket as $item): 
                        $sum += $item["price_item"] * $item["item_count"];
                        ?>
                        <div class="item">
                            <a href="product.php?item=<?=$item["id_item"]?>"><img src="../images/<?=$item["name_category"]?>/<?=$item["img_item"]?>" alt=""></a>
                            <div class="item-desc">
                                <div class="item-name">
                                    <h2><?=$item["name_item"]?></h2>
                                    <div class="item_count">
                                        <a href="/basket-db.php?item=<?=$item["id_item"]?>&decr=1" class="btn btn-primary">-</a>
                                        <span><?=$item["item_count"]?></span>
                                        <a href="/basket-db.php?item=<?=$item["id_item"]?>&inc=1" class="btn btn-primary">+</a>
                                    </div>
                                    <h2>
                                        <?=$item["price_item"]?>
                                        ₽
                                    </h2>
                                </div>
                                <p><?=$item["description_item"]?></p>
                                <p></p>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
                <div class="order_info">
                    <p>
                        Товары, <?=$countquery?>шт.
                    </p>
                    <h4>Итого <?=$sum?>₽</h4>
                </div>
            </div>
        </div>
    </main>
    <?php include "../components/footer.php" ?>
</body>

</html>