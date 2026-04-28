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
            <form method="post" action="server/reg-db.php">
                <div class="mb-3">
                    <label for="login" class="form-label">Логин</label>
                    <input type="text" class="form-control" id="login" name="login" required minlength="6">
                </div>
                <div class="mb-3">
                    <label for="fio" class="form-label">ФИО</label>
                    <input type="text" class="form-control" id="fio" name="fio" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Телефон</label>
                    <input type="tel" class="form-control" id="phone" name="phone" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Почта</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" class="form-control" id="password" name="password" required minlength="6">
                </div>
                <button type="submit" class="btn btn-primary">Зарегистрировать</button>
            </form>
        </div>
    </main>
    <?php include "../components/footer.php" ?>
</body>

</html>