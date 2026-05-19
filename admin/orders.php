<?php
require "../connect-db.php";
session_start();
$user = $_SESSION['id'] ?? false;

if (!$user) {
    echo "<script>
    alert(\"Войдите в профиль\");
    location.href='authorization.php';
    </script>";
}

if (isset($_GET["id"])) {
    mysqli_query($conn, "UPDATE `Orders` SET `status`='Подтвержден' WHERE id_order = " . $_GET["id"]);
}

$sql = "select * from Orders join Order_Item on Order_Item.id_order = Orders.id_order join Item on Order_Item.id_item = Item.id_item join Users on Users.id_user = Orders.id_user";
$sql = "select * from Order_Item join Item on Order_Item.id_item = Item.id_item";
$sql = "select * from Orders join Users on Users.id_user = Orders.id_user order by id_order DESC";
$result = mysqli_query($conn, $sql);
$countquery = mysqli_fetch_array(mysqli_query($conn, "select sum(item_count) from Basket where id_user = $user"))[0];
$sum = 0;
$count = mysqli_num_rows(mysqli_query($conn, "select * from Basket where id_user = $user"));
$orders = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/styleBasket.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .item-card {
            height: 125px;

            img {
                width: 100%;
                height: 100%;
            }
        }

        .item-card-text {
            align-self: center;
        }

        input {
            width: 100%;
        }
    </style>
</head>

<body>
    <?php include "../components/adminHeader.php" ?>
    <main>
        <div id="container">
            <div class="content">
                <div class="items">
                    <div class="mt-3">
                        <label for="user">Поиск по пользователю</label>
                        <input type="text" id="user">
                    </div>
                    <?php if ($count != 0): ?>
                        <?php foreach ($orders as $order):
                            $items = mysqli_fetch_all(mysqli_query($conn, "select * from Order_Item join Item on Order_Item.id_item = Item.id_item where id_order = " . $order["id_order"]), MYSQLI_ASSOC); ?>
                            <div>
                                <div class="d-flex mt-4">
                                    <h4 class="mx-2 email"><?= $order['email'] ?></h4>
                                    <h4 class="mx-2"><?= $order['status'] ?></h4>
                                    <?php if ($order['status'] == 'В обработке'): ?>
                                        <a href="?id=<?= $order['id_order'] ?>">Подтвердить заказ</a>
                                    <?php endif; ?>
                                </div>
                                <?php foreach ($items as $item):
                                    $sum += $item["price_item"] * $item["count"];
                                    ?>
                                    <div class="item-card">
                                        <div>
                                            <a href="../pages/product.php?item=<?= $item["id_item"] ?>">
                                                <img src="../images/<?= $item["img_item"] ?>" alt="<?= $item["name_item"] ?>">
                                            </a>
                                            <div class="item-card-text">
                                                <div>
                                                    <p class="mb-3"><?= $item["name_item"] ?></p>
                                                    <p class="mb-3"><?= $item["price_item"] ?> ₽ x <?= $item["count"] ?>шт. =
                                                        <?= $item["price_item"] * $item["count"] ?> ₽
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endforeach ?>
                    <?php else: ?>
                        <h1>Тут пусто :(</h1>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>
    <script>
        let search = document.querySelector("#user");
        search.addEventListener("input", () => {
            let users = document.querySelectorAll(".email");
            users.forEach(element => {
                let str = element.innerHTML.toLocaleLowerCase();
                console.log(str);
                if (!str.includes(search.value.toLocaleLowerCase())) {
                    element.parentNode.parentNode.style.display = "none";
                } else {
                    element.parentNode.parentNode.style.display = "";
                }
            });
        })
    </script>
</body>

</html>