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

$id = $_GET["id"];

$query = mysqli_fetch_array(mysqli_query($conn, "select * from Categories where `id_category` = $id"))
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
        <form method="post" action="categories-db.php">
            <input type="hidden" class="form-control" id="name" name="id" value="<?= $query[0] ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Название категории</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= $query[1] ?>">
            </div>
            <button name="btnEdit" type="submit" class="btn btn-primary">Сохранить</button>
            <a href="delete-db.php?id=<?= $id ?>&table=Categories&idField=id_category" type="submit"
                class="btn btn-danger">Удалить</a>
        </form>
    </div>
</body>

</html>