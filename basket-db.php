<?php
require "connect-db.php";

$item = $_GET["item"] ?? false;
$user = $_COOKIE["saveLogin"] ?? false;
    if(!$user){
            echo "<script>
        alert(\"Войдите в профиль\");
        location.href='pages/authorization.php';
        </script>";
    }
if (isset($user)) {
    $getUser = mysqli_fetch_assoc(mysqli_query($conn, "Select * from Users where email = '$user'"))["id_user"];
    if (isset($_GET["addbskt"])) {

        $sql = "select * from `Basket` where `id_user` = $getUser and `id_item` = $item";
        $check = mysqli_query($conn, $sql);
        if (mysqli_num_rows($check) > 0) {
            $sql = "update `Basket` set `item_count` = item_count + 1";
            $result = mysqli_query($conn, $sql);
            echo "<script>
            location.href='pages/catalog.php';
            </script>";
        } else {
            $sql = "insert into `Basket`(`id_item`,`id_user`,`item_count`) values($item,$getUser,1)";
            $result = mysqli_query($conn, $sql);
            echo "<script>
            location.href='pages/catalog.php';
            </script>";
        }
    } else if (isset($_GET["inc"])) {
        $sql = "update `Basket` set `item_count` = item_count + 1 where `id_user` = $getUser and `id_item` = $item";
        $result = mysqli_query($conn, $sql);
        echo "<script>
        location.href='pages/basket.php';
        </script>";
    } else if (isset($_GET["decr"])) {
        $check = mysqli_fetch_array(mysqli_query($conn, "select item_count from `Basket` where `id_user` = $getUser and `id_item` = $item"))[0];
        if($check == 1){
            $sql = "delete from `Basket` where `id_user` = $getUser and `id_item` = $item";
            $result = mysqli_query($conn, $sql);
            echo "<script>
            location.href='pages/basket.php';
            </script>";
        }else{
            $sql = "update `Basket` set `item_count` = item_count - 1 where `id_user` = $getUser and `id_item` = $item";
            $result = mysqli_query($conn, $sql);
            echo "<script>
            location.href='pages/basket.php';
            </script>";
        }

    } else {
        echo "<script>
            alert(\"Как вы сюда попали?\");
            location.href='/';
            </script>";
    }
} else {
    echo "<script>
                    alert(\"Войдите в профиль!\");
                    location.href='pages/authorization.php';
                    </script>";
}



?>