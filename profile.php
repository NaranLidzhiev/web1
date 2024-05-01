<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="css/style1.css">
</head>
<body>
<div class="container" id="container">
    <div class="logo">
        <img src="images/logo1.jpg" alt="logo">
    </div>
    <div class="about_me">
        ИНФОРМАЦИЯ ОБО МНЕ
    </div>
    <div class="row">
        <div class="text1">
            <p>ВАСИЛИЙ ГИРЯ</p>
            МАСТЕР НА ВСЕ РУКИ, ГОТОВ ВЗЛАМЫВАТЬ И
            ЗАЩИЩАТЬ. МАСТЕР СОЦИАЛЬНОЙ ИНЖЕНЕРИИ,
            ДИПЛОМИРОВАННЫЙ
            КУКЛОВОД. CЕГОДНЯ Я ВЗЛАМЫВАЮ СПУТНИКИ
            ,ЗАВТРА Я РАЗРАБАТЫВАЮ СЗИ ДЛЯ НИХ.
            ПУБЛИКУЮСЬ В ИНТЕРПОЛЕ ПОД 7-Ю РАЗНЫМИ ИМЕНАМИ,
            МЕНЯ ИЩЕТ ПРАВИТЕЛЬСТВО 10 СТРАН И ОДНОГО НЕПРИЗНАННОГО КОРОЛЕВСТВА
            ГОТОВ ВЗЛОМАТЬ НОМЕР ВАШЕЙ БЫВШЕЙ ИЛИ ПООЖИТЬ
            КОМПАНИЮ В КОТОРОЙ ВЫ РАБОТАЕТЕ. КАКИХ-ТО ГРАНИЦ ДЛЯ МЕНЯ
            ВПРИНЦИПЕ НЕТ. РАБОТАЮ ПО ЧАСОВОМУ ТАРИФУ, ПРИНИМАЮ В КАЧЕСТВЕ ОПЛАТЫ
            АЛКОГОЛЬ И АНТИДЕПРИССАНТЫ.
        </div>
        <div class="face"><img src="images/face.jpg" alt="face"></div>
    </div>
    <div class="button" id="button">
        НАЖМИ
    </div>
    <p id="demo"></p>
</div>
<div class="container" id="container">

     <div class="col-12">
         <div class="hi">
            <h1 class="hello">
                Привет <?php echo $_COOKIE['User']; ?>
             </h1>
         </div>
     </div>
     <div class="col-12">
          <form method='POST' action='profile.php' ecntype="multipart/form-data" name="upload">
              <!-- <div class="title">
                   <input type="text" class = "form" type = "text" name="title" placeholder="Заголовок вашего поста">
                  </div>
              <p><textarea name="text" cols="30" rows="10" placeholder="Введите текст вашего поста ..."></textarea> </p>
              <form method='POST' action='profile.php' ecntype="multipart/form-data" name="upload"> -->
              <p><input type="file" name="file"/></p>
              <!-- </form> -->
              <div class="button1" id="button">
                  <button type="submit" class="btn_reg" name="submit">Сохранить пост!</button>
              </div>
      </div>
</div>

<script type="text/javascript" src="js/script1.js"></script>
</body>
</html>

<?php
require_once('db.php');

$link = mysqli_connect('db', 'root', 'kali', 'first');

if (isset($_POST['submit'])) {
    if (!empty($_FILES["file"]))
        {
            if (((@$_FILES["file"]["type"] == "image/gif") || (@$_FILES["file"]["type"] == "image/jpeg")
            || (@$_FILES["file"]["type"] == "image/jpg") || (@$_FILES["file"]["type"] == "image/pjpeg")
            || (@$_FILES["file"]["type"] == "image/x-png") || (@$_FILES["file"]["type"] == "image/png"))
            && (@$_FILES["file"]["size"] < 102400))
            {
                move_uploaded_file($_FILES["file"]["tmp_name"], "Documents/" . $_FILES["file"]
                ["name"]);
                echo "Load in: " . "Documents/" . $_FILES["file"]["name"];
            }
            else{
                echo "upload failed";
            }
        }
    if(!mysqli_query($link, $sql)) die("не удалось добавить пост");
    $title = $_POST['title'];
    $main_text = $_POST['text'];

    if (!$title || !$main_text) die("Заполните все поля");

    $sql = "INSERT INTO posts (title, main_text) VALUES ('$title', '$main_text')";

    if(!mysqli_query($link, $sql)) die("не удалось добавить пост");
}
?>