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
                    <label for="adress" class="form-label">Адрес доставки</label>
                    <select class="form-select" aria-label="Default select example" name="adress">
                        <?php foreach($adresses as $adress):?>
                            <option value="<?=$adress[0]?>"><?=$adress[2]?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="fio" class="form-label">Дата</label>
                    <input type="date" class="form-control" id="fio" required name="date">
                </div>
                <label for="">Способ оплаты</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="pay" id="radioDefault1" checked value="СБП">
                    <label class="form-check-label" for="radioDefault1">
                        СБП
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="pay" id="radioDefault2" value="По карте">
                    <label class="form-check-label" for="radioDefault2">
                        По карте
                    </label>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Оформить заказ</button>
            </form>
            <h4>Нет адреса?</h4>
                                        <form action="../adress-db.php" method="post" class="d-flex" style="width: 100%;">
                                <div class="input-group has-validation">
                                    <div class="form-floating is-invalid">
                                        <input type="text" class="form-control" id="floatingInputGroup2" placeholder="adress" name="adress">
                                        <label for="floatingInputGroup2">Добавить адрес</label>
                                    </div>
                                </div>
                                <button name="order" style="width: 200px; height: 58px;" class="btn-black">Добавить</button>
                            </form>
        </div>
    </main>
    <?php include "../components/footer.php" ?>
</body>

</html>