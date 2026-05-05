<?php
session_start();
unset($_SESSION['id']);
echo "<script>
            alert(\"Вы вышли!\");
            location.href='/';
            </script>";
?>