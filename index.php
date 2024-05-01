<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="css/style1.css">
</head>
<body>
<div class="container">
     <div class="row">
        <div class="col-12 index">
            <h1>Страница постов</h1>
        <?php
        if (!isset($_COOKIE['User'])) {
        ?>
            <a href="/registration.php"> Зарегестрируйтесь</a> или <a href="/login.php">войдите</a>!
        <?php
        } else {
            $link = mysqli_connect('db', 'root', 'kali', 'first');
            $sql = "SELECT * FROM posts";
            $res = mysqli_query($link, $sql);
            if (mysqli_num_rows($res) > 0){
                while ($post = mysqli_fetch_array($res)) {
                    echo "<a href='/posts.php?id=" . $post["id"] . "'>" . $post['title'] . "</a><br>";
                }
                } else {
                    echo "Записей пока нет";
                }
        }
        ?>
        </div>
    </div>
    </div>
</body>
</html>
