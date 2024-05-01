<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="css/style1.css">
</head>
<body>
<div class="container" id="container">
    <div class="row">
        <div class="col-12">
            <h1>Регистрация </h1>
        </div>
    </div>
    <div class="row">
         <div class="col-12">
            <form method='POST' action='registration.php'>
                <div class="row form_reg"><input class="form" type="email" name="email" placeholder="Email"></div>
                <div class="row form_reg"><input class="form" type="text" name="login" placeholder="Login"></div>
                <div class="row form_reg"><input class="form" type="password" name="password" placeholder="Password"></div>
                <button type="submit" class="btn_reg" name="submit">Продолжить</button>
             </form>
        </div>
    </div>
</div>

</body>
</html>

<?php
require_once('db.php');
$link = mysqli_connect('db', 'root', 'kali', 'first');
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $username = $_POST['login'];
    $pass = $_POST['password'];

    if (!$email || !$username || !$pass) die ('Пожалуйста введите все значения');

    $sql = "INSERT INTO users (email, username, pass) VALUES ('$email', '$username',
    '$pass')";

    if(!mysqli_query($link, $sql)) {
        echo "Не удалось добавить пользователя";
    }
}
?>
