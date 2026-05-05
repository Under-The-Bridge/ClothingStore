<?php 
// mail("d.n1zamov@yandex.ru","ramazanikbaev6@gmail.com","sdsd");  cjnmiljfvjngttpu
// mail("d.n1zamov@yandex.ru","d.n1zamov@yandex.ru","d.n1zamov@yandex.ru");
// mail("motyatrue@yandex.ru");
if(isset($_POST["email"])){
    mail($_POST["email"],$_POST["email"],$_POST["email"]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <input type="email" name="email">
        <button></button>
    </form>
</body>
</html>