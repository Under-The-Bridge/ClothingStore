<?php
    require "../connect-db.php";

    $categories = mysqli_fetch_all(mysqli_query($conn,"select * from Categories"),MYSQLI_ASSOC);
    
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
    <h1>Категории</h1>

    <div id="container">
        <?php include "../components/adminHeader.php"?>
        <table>
            <tr>
                <td>id</td>
                <td>Название</td>
                <td>Редактировать</td>
            </tr>
            <?foreach($categories as $category):?>
            <tr>
                <td><?=$category["id_category"]?></td>
                <td><?=$category["name_category"]?></td>
                <td><a href="categories-edit.php?id=<?=$category["id_category"]?>">Редактировать</a></td>
            </tr>
            <?endforeach;?>
        </table>
        <div id="addPanel">
            <form method="post" action="categories-db.php">
                <div class="mb-3">
                    <label for="name" class="form-label">Название категории</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>