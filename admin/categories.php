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

if(isset($_POST["id"])){
    $cat = trim($_POST["category"]);
    if(empty($cat)){
        echo "<script>
    alert(\"Пустое поле!\");
    </script>";
    }

    mysqli_query($conn,"UPDATE `Categories` SET `name_category`='$cat' WHERE id_category =".$_POST["id"]);
}

$categories = mysqli_fetch_all(mysqli_query($conn, "select * from Categories"), MYSQLI_ASSOC);

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
        <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/adminStyle.css">
    <title>Document</title>
    <style>
        table,
        tr,
        td {
            border: 1px solid black;
            padding: 3px;
        }
    </style>
</head>

<body>
    <div>
        <?php include "../components/adminHeader.php" ?>
                <div class="container mx-auto mt-3">
                    <h4>Категории</h4>
            <form method="post" action="categories-db.php">
                <div class="mb-3">
                    <label for="name" class="form-label">Название категории</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <button name="btnAdd" type="submit" class="btn btn-primary">Добавить</button>
            </form>
        </div>
        <div class="row g-0 container mx-auto mt-3">

            <?php 
            $temp = 0;
            foreach ($categories as $category): $temp++;?>
                  <div class="card p-2 mb-2" style="animation: show <?=$temp * 0.15?>s ease-in;">
            <h5 class="card-title d-flex"><?= $category["name_category"] ?> </h5>
            <form method="post"> 
                <input type="hidden" name="id" value="<?= $category["id_category"] ?>">
                <input type="text" name="category">
                <button class="btn btn-primary">Изменить</button>
            </form>
                </div>
        <?php endforeach; ?>
        </div>

    </div>
</body>

</html>