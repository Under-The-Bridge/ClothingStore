<?php
    require "../connect-db.php";

    $items = mysqli_fetch_all(mysqli_query($conn,"select * from Users"),MYSQLI_ASSOC);
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
    <title>Document</title>
    <style>
        table, tr, td{
            border:1px solid black;
            padding:3px;
        }
    </style>
</head>
<body>
        <a href="/crud">Вернуться</a>
    <h1>Пользователи</h1>
    <div id="container">
                <?php include "../components/adminHeader.php"?>
        <table>
            <tr>
                <td>id</td>
                <td>Почта</td>
                <td>Пароль</td>
                <td>Номер телефона</td>
                <td>Статус</td>
                <td>Имя</td>
                <td>Фамилия</td>
                <td>Отчество</td>
            </tr>
            <?foreach($items as $item):?>
            <tr>
                <td><?=$item["id_user"]?></td>
                <td><?=$item["email"]?></td>
                <td><?=$item["password_user"]?></td>
                <td><?=$item["phone"]?></td>
                <td><?=$item["status_user"]?></td>
                <td><?=$item["name"]?></td>
                <td><?=$item["surname"]?></td>
                <td><?=$item["patronymic"]?></td>
            </tr>
            <?endforeach;?>
        </table>
        <div id="addPanel">
        <form method="post" action="users-db.php" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label" for="email">Почта</label>
                <input class="form-control" id="email" name="email" type="email" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="pass">Пароль</label>
                <input class="form-control" id="pass" name="pass" type="password" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="tel">номер телефона</label>
                <input class="form-control" id="tel" name="tel" type="tel" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="status">Статус</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="Активен">Активен</option>
                    <option value="Удален">Удален</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="name">Имя</label>
                <input class="form-control" id="name" name="name" type="name" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="sur">Фамилия</label>
                <input class="form-control" id="sur" name="sur" type="sur" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="pat">Отчество</label>
                <input class="form-control" id="pat" name="pat" type="pat" required>
            </div>
            <button>Добавить</button>
        </form>
        </div>
    </div>
</body>
</html>