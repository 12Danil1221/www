<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/main.css">
    <style>
    .container2 {
        text-align: center;
    }
    </style>
    <?php require_once "./include/header.php" ?>

<body>
    <div class="container2">
        <form class="form1" action="./func/add-game.php" method="post" enctype="multipart/form-data">
            <input type="file" name="image" /><br><br>
            <label for="content">Описание: </label><br>
            <input type="text" name="content" /><br>
            <label for="followers">Количество подписчиков игры: </label><br>
            <input type="text" name="followers" /><br>
            <br>
            <button type="submit">Add game</button>
        </form>
    </div>
</body>

<?php 
require_once "./include/footer.php"
?>