<?php
    require "../connect-db.php";

    $items = mysqli_fetch_all(mysqli_query($conn,"select * from Item join Categories on Item.id_category = Categories.id_category"),MYSQLI_ASSOC);

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
        img{
            height: 100px;
            aspect-ratio:1/1;
        }
        table, tr, td{
            border:1px solid black;
            padding:3px;
        }
        form{
            width: 25%;
            display: flex;
            flex-direction:column;
            input, select{
                margin-bottom:3%;
            }
        }
    </style>
</head>
<body>
        <a href="/crud">Вернуться</a>
    <h1>Товары</h1>
    <div id="container">
        <?php include "../components/adminHeader.php"?>
        <table>
        <tr>
            <td>id</td>
            <td>Название</td>
            <td>Цена</td>
            <td>Изображение</td>
            <td>Описание</td>
            <td>Статус</td>
            <td>Категория</td>
            <td>Редактировать</td>
        </tr>
        <?foreach($items as $item):?>
        <tr>
            <td><?=$item["id_item"]?></td>
            <td><?=$item["name_item"]?></td>
            <td><?=$item["price_item"]?></td>
            <td><img src="../images/<?=$item["name_category"]?>/<?=$item["img_item"]?>" alt=""></td>
            <td><?=$item["description_item"]?></td>
            <td><?=$item["status_item"]?></td>
            <td><?=$item["name_category"]?></td>
            <td><a href="items-edit.php?id=<?=$item["id_item"]?>">Редактировать</a></td>
        </tr>
        <?endforeach;?>
    </table>
    <div id="addPanel">
        <form method="post" action="items-db.php" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label" for="name">Название</label>
                <input class="form-control" id="name" name="name" type="text" require>
            </div>
            <div class="mb-3">
            <label class="form-label" for="price">Цена</label>
            <input class="form-control" id="price" name="price" type="number" require>
            </div>
                        <div class="mb-3">
            <label class="form-label" for="image">Фотка</label>
            <input class="form-control" id="image" name="image" type="file" require>
        </div>
                    <div class="mb-3">
            <label class="form-label" for="desc">Описание</label>
            <input class="form-control" id="desc" name="desc" type="text" require>
        </div>
                    <div class="mb-3">
            <label class="form-label" for="category">Категория</label>
            <select class="form-control" id="category" name="category" type="text" require>
                <?foreach($categories as $category):?>
                    <option value="<?=$category["id_category"]?>"><?=$category["name_category"]?></option>
                    <?endforeach;?>
                </select>
            </div>
                <button name="btnAdd" type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>
</body>
    </div>

</html>