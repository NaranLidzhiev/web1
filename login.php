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
            <form method='POST' action='login.php'>
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
    $username = $_POST['login'];
    $pass = $_POST['password'];

    if ( !$username || !$pass) die ('Пожалуйста введите все значения');

    $sql = "SELECT * FROM users WHERE username='$username' AND pass='$pass'";

    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) == 1) {
     setcookie("User", $username, time()+7200);
     header('Location: profile.php');
    } else {
      echo "не правильно имя или пароль";
        }
}
?>
