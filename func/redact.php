<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$id = htmlspecialchars($_POST['id']);
$followers = htmlspecialchars($_POST['followers']);
$content = htmlspecialchars($_POST['content']);
}
//DB
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактировать товар</title>
</head>

<body>
    <form action="../trending.php" method="POST">
        <input type="hidden" name="id" value="<?= $id?>">
        <input type="text" name="followers" value="<?= $followers ?>">
        <input type="text" name="content" value="<?= $content ?>">

        <button type="submit">Редактировать</button>
    </form>
</body>

</html>