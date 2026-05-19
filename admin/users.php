<?php
require "../connect-db.php";
session_start();
if (!isset($_SESSION['id'])) {
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




if (isset($_GET["id"])) {
    $id = $_GET["id"];
    if (isset($_GET["ban"])) {
        $status = $_GET["ban"];
        mysqli_query($conn, "UPDATE `Users` SET `status_user`='$status' WHERE id_user = $id and role = 'user'");
    } else {
        mysqli_query($conn, "UPDATE `Users` SET `status_user`='Активен' WHERE id_user = $id and role = 'user'");
    }
}

$users = mysqli_fetch_all(mysqli_query($conn, "select * from Users where role = 'user'"), MYSQLI_ASSOC);
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
            foreach ($users as $user):
                $temp++; ?>
                <div class="card p-2 mb-3" style="animation: show <?= $temp * 0.15 ?>s ease-in;">
                    <h5 class="card-title"><?= $user["email"] ?></h5>
                    <div class="d-flex">
                        <?php if ($user["status_user"] == "Удален"): ?>
                            <p class="link-danger me-2"><?= $user["status_user"] ?></p>
                            <a href="?id=<?= $user["id_user"] ?>">Восстановить аккаунт</a>
                        <?php elseif ($user["status_user"] == "Заблокирован"): ?>
                            <p class="link-danger me-2"><?= $user["status_user"] ?></p>
                            <a class="link-success" href="?id=<?= $user["id_user"] ?>&ban=Активен">Снять блокировку</a>
                        <?php else: ?>
                            <p class="link-success"><?= $user["status_user"] ?></p>
                            <a class="link-danger mx-3" href="?id=<?= $user["id_user"] ?>&ban=Заблокирован">Заблокировать</a>
                        <?php endif; ?>
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
                    <td><?= $user["id_user"] ?></td>
                    <td><?= $user["email"] ?></td>
                    <td><?= $user["password_user"] ?></td>
                    <td><?= $user["phone"] ?></td>
                    <td><?= $user["status_user"] ?></td>
                    <td><?= $user["name"] ?></td>
                    <td><?= $user["surname"] ?></td>
                    <td><?= $user["patronymic"] ?></td>
                    <td><a href="users-edit.php?id=<?= $user["id_user"] ?>">Редактировать</a></td>
                </tr>
        </table> -->
        </div>
</body>

</html>