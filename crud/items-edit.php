<?php
    require "../connect-db.php";

    $id = $_GET["id"] ?? false;
    $item = mysqli_fetch_array(mysqli_query($conn,"select * from Item where `id_item` = $id"));

    $categories = mysqli_fetch_all(mysqli_query($conn,"select * from Categories"));
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
        <form method="post" action="items-db.php" enctype="multipart/form-data">
            <input type="hidden" class="form-control" id="name" name="id" value="<?=$item[0]?>">
            <div class="mb-3">
                <label class="form-label" for="name">Название</label>
                <input class="form-control" id="name" name="name" type="text" required value="<?=$item[1]?>">
            </div>
            <div class="mb-3">
            <label class="form-label" for="price">Цена</label>
            <input class="form-control" id="price" name="price" type="number" required value="<?=$item[2]?>">
            </div>
                        <div class="mb-3">
            <label class="form-label" for="image">Фотка</label>
            <input class="form-control" id="image" name="image" type="file" required>
        </div>
                    <div class="mb-3">
            <label class="form-label" for="desc">Описание</label>
            <input class="form-control" id="desc" name="desc" type="text" required value="<?=$item[4]?>">
        </div>
        <div class="mb-3">
            <label class="form-label" for="category">Категория</label>
            <select class="form-control" id="category" name="category" type="text" required value="<?=$item[5]?>">
                <?foreach($categories as $category):?>
                    <option value="<?=$category[0]?>" <?=$item[6] == $categories[0] ? "selected" : ""?>><?=$category[1]?></option>
                    <?endforeach;?>
                </select>
        </div>
        <div class="mb-3">
            <label class="form-label" for="category">Статус</label>
            <select class="form-control" id="category" name="status" type="text" required value="<?=$item[5]?>">
                    <option value="Доступен" <?=$item[6] == "Доступен" ? "selected" : ""?>>Доступен</option>
                    <option value="Не доступен" <?=$item[6] == "Не доступен" ? "selected" : ""?>>Не доступен</option>
            </select>
        </div>
            <button name="btnEdit" type="submit" class="btn btn-primary">Сохранить</button>
            <a href="delete-db.php?id=<?=$id?>&table=Item&idField=id_item" type="submit" class="btn btn-danger">Удалить</a>
        </form>
    </div>
</body>
</html>