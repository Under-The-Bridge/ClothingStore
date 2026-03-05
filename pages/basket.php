<?php
require "../connect-db.php";

$user = $_COOKIE["saveLogin"] ?? false;
$getUser = mysqli_fetch_assoc(mysqli_query($conn, "Select * from Users where email = '$user'"))["id_user"];
$sql = "select * from Basket where id_user = $getUser";
$basket = mysqli_fetch_all(mysqli_query($conn,$sql));
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
    <?php include "../components/header.php"?>
    <main>
        <div id="container">
            <p id="path">Главная / <span>Корзина</span></p>
            <?php foreach($basket as $item):?>
            <div class="item">
                <div><img src="../images/shoes/Air Force 1 Ultra Flyknit.svg" alt=""></div>
                <div class="item-desc">
                    <h1>NIKE NIKE</h1>
                    <p></p>
                    <p></p>
                </div>
            </div>
            <?php endforeach?>
        </div>
    </main>
    <?php include "../components/footer.php"?>
</body>
</html>