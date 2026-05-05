<?php
require "../connect-db.php";
session_start();
$user = $_SESSION['id'] ?? false;

if (!$user) {
    echo "<script>
    alert(\"Войдите в профиль\");
    location.href='authorization.php';
    </script>";
}
$sql = "select * from Basket join Item on Basket.id_item = Item.id_item join Categories on Categories.id_category = Item.id_category  where  id_user = $user";
$result = mysqli_query($conn, $sql);
$countquery = mysqli_fetch_array(mysqli_query($conn, "select sum(item_count) from Basket where id_user = $user"))[0];
$sum = 0;
$count = mysqli_num_rows(mysqli_query($conn, "select * from Basket where id_user = $user"));
$basket = mysqli_fetch_all($result, MYSQLI_ASSOC);
foreach ($basket as $item) {
    $sum += $item["price_item"] * $item["item_count"];
}

$adresses = mysqli_fetch_all(mysqli_query($conn,"select * from Addresses where id_user = $user"));
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
            <p id="path">Главная / <span>Оформление заказа</span></p>
            <form method="post" action="../order-db.php" class="mb-3">
                <h4>Оформление заказа</h4>
                <h5>К оплате <?= $sum ?>₽</h5>
                <input type="number" hidden value="<?= $sum ?>" name="price">
                <div class="mb-3"> 
                    <label for="address" class="form-label">Адрес доставки</label>
                    <input type="text" class="form-control" name="address" required>
                </div>
                <div class="mb-3">
                    <label for="fio" class="form-label">Дата</label>
                    <input type="date" class="form-control" id="fio" required name="date">
                </div>
                <label class="mb-3" for="">Способ оплаты</label>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="pay" id="radioDefault1" checked value="СБП" required>
                    <label class="form-check-label" for="radioDefault1">
                        СБП
                    </label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="pay" id="radioDefault2" value="По карте" required>
                    <label class="form-check-label" for="radioDefault2">
                        По карте
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Оформить заказ</button>
            </form>
        </div>
    </main>
    <?php include "../components/footer.php" ?>
</body>

</html>