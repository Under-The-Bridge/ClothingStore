<?php
    require "../connect-db.php";
    
    $id = $_GET["id"] ?? false;
    $user = mysqli_fetch_array(mysqli_query($conn,"select * from Users where `id_user` = $id"));
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
</head>
<body>
    <div id="addPanel">
        <form method="post" action="users-db.php" enctype="multipart/form-data">
            <input class="form-control" id="email" name="id" type="hidden" required value="<?=$user[0]?>">
            <div class="mb-3">
                <label class="form-label" for="email">Почта</label>
                <input class="form-control" id="email" name="email" type="email" required value="<?=$user[2]?>">
            </div>
            <div class="mb-3">
                <label class="form-label" for="pass">Пароль</label>
                <input class="form-control" id="pass" name="pass" type="password" required value="<?=$user[1]?>">
            </div>
            <div class="mb-3">
                <label class="form-label" for="tel">номер телефона</label>
                <input class="form-control" id="tel" name="tel" type="tel" required value="<?=$user[3]?>">
            </div>
            <div class="mb-3">
                <label class="form-label" for="status">Статус</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="Активен" <?=$user[4] == "Активен" ? "selected" : ""?>>Активен</option>
                    <option value="Удален" <?=$user[4] == "Удален" ? "selected" : ""?>>Удален</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="name">Имя</label>
                <input class="form-control" id="name" name="name" type="name" required value="<?=$user[5]?>">
            </div>
            <div class="mb-3">
                <label class="form-label" for="sur">Фамилия</label>
                <input class="form-control" id="sur" name="sur" type="sur" required value="<?=$user[6]?>">
            </div>
            <div class="mb-3">
                <label class="form-label" for="pat">Отчество</label>
                <input class="form-control" id="pat" name="pat" type="pat" required value="<?=$user[7]?>">
            </div>
           <button name="btnEdit" type="submit" class="btn btn-primary">Сохранить</button>
            <a href="delete-db.php?id=<?=$id?>&table=Item&idField=id_item" type="submit" class="btn btn-danger">Удалить</a>
        </form>
    </div>
</body>
</html>