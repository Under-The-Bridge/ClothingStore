<?php
require "../connect-db.php";
session_start();
if(!isset($_SESSION['id'])){
        echo "<script>
    alert(\"Нельзя!\");
    location.href='/';
    </script>";
}
$user = $_SESSION['id'] ?? false;
if (mysqli_fetch_assoc(mysqli_query($conn, "select * from Users where id_user = $user"))["role"] != "admin") {
    echo "<script>
    alert(\"Нельзя!\");
    location.href='/';
    </script>";
}
$users = mysqli_num_rows(mysqli_query($conn,"select * from Users where status_user = 'Активен'"));
$items = mysqli_num_rows(mysqli_query($conn,"select * from Item where status_item = 'Доступен'"));
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
        <link rel="stylesheet" href="../styles/adminStyle.css">
        <link rel="stylesheet" href="../styles/style.css">
    <title>Document</title>
</head>

<body>
    <?php include "../components/adminHeader.php"?> 
    <main>
        <div id="container">
            <h4>Статистика сайта</h4>
            <h5>Количество активных пользователей: <?=$users?></h5>
            <h5>Количество доступных товаров: <?=$items?></h5>
        </div>
    </main>
    <?php include "../components/footer.php"?> 
</body>

</html>