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


$items = mysqli_fetch_all(mysqli_query($conn, "select * from Users"), MYSQLI_ASSOC);

if(isset($_GET["id"])){
    $id = $_GET["id"];
    mysqli_query($conn,"UPDATE `Users` SET `status_user`='Активен' WHERE id_user = $id and role = 'user'");
}
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
    <div class="row g-0 container mx-auto mt-3">
        <h4>Пользователи</h4>
        <?php
        $temp = 0;
         foreach ($items as $item):     $temp++;?>
              <div class="card p-2 mb-3" style="animation: show <?=$temp * 0.15?>s ease-in;">
        <h5 class="card-title"><?= $item["email"] ?></h5>
        <div class="d-flex">
            <?php if($item["status_user"] == "Удален"):?>
                <p class="link-danger me-2"><?= $item["status_user"] ?></p>
                <a href="?id=<?=$item["id_user"] ?>">Восстановить аккаунт</a>
                <?php else:?>
                    <p class="link-success"><?= $item["status_user"] ?></p>
                <?php endif;?>
        </div>

    </div>
    <?php endforeach; ?>
        <!-- <table>
            <tr>
                <td>id</td>
                <td>Почта</td>
                <td>Пароль</td>
                <td>Номер телефона</td>
                <td>Статус</td>
                <td>Имя</td>
                <td>Фамилия</td>
                <td>Отчество</td>
                <td>Редактировать</td>
            </tr>
                <tr>
                    <td><?= $item["id_user"] ?></td>
                    <td><?= $item["email"] ?></td>
                    <td><?= $item["password_user"] ?></td>
                    <td><?= $item["phone"] ?></td>
                    <td><?= $item["status_user"] ?></td>
                    <td><?= $item["name"] ?></td>
                    <td><?= $item["surname"] ?></td>
                    <td><?= $item["patronymic"] ?></td>
                    <td><a href="users-edit.php?id=<?= $item["id_user"] ?>">Редактировать</a></td>
                </tr>
        </table> -->
    </div>
</body>

</html>