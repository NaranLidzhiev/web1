
<!DOCTYPE html>
<html lang="en">
<?php
$link = mysqli_connect('db', 'root', 'kali', 'first');
$id = $_GET['id'];
$sql = "SELECT * FROM posts WHERE id=$id";
$res = mysqli_query($link, $sql);
$rows = mysqli_fetch_array($res);
$title = $rows['title'];
$main_text = $rows['main_text'];
?>
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="css/style1.css">
</head>
<body>
<?php
        echo "<h1> $title </h1>";
        echo "<p> $main_text </p>";
        ?>
</body>

</html>
