<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/www/css/main.css">
    <style>

    </style>
</head>
<?php 
//DB
require './func/db.php';
$query = new db();
$id = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_NUMBER_INT);

$game = $query->setSelectQuery('SELECT * FROM trending WHERE id = ?', [$id]);
// Проверяем, существует ли игра
if (!$game) {
    echo "Игра не найдена.";
} 
?>

<header class="container">
    <span class="logo">logo</span>
    <nav>
        <ul>
            <li class="active"><a href="../index.php">Home</a></li>
            <li><a href="../about.php">About us</a></li>

            <?php
            if(isset($_COOKIE['login']))
            
        echo '<li><a href="../user.php">Кабинет пользователя</a></li>
        <li><a href="../cart.php">Корзину</a></li>
        <li><a href="../func/logout.php">Выход</a></li>
        ';
            else
            echo '<li><a href="../reg.php">Регистрация</a></li>
            <li><a href="../auth.php">Авторизация</a></li>';
            ?>


            <li class="btn"><a href="./contacts.php">Contacts</a></li>
        </ul>
    </nav>
</header>

<body>
    <?php  
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $trending_id = trim($_POST['trending_id']);
    $otziv = htmlspecialchars(trim($_POST['otziv']));    

        $result = $query->setInsertQuery('INSERT IGNORE INTO game_otzivs(trending_id, otziv) VALUE(?,?)',[$trending_id, $otziv]);
        $result = $query->setSelectQuery('SELECT * FROM game_otzivs', null);
    
    }
    ?>
    <div class="card">
        <div class="card-body">
            <img src="../<?= $game[0]->image ?>" alt="" width="250" height="250">
            <h5 class="card-title">Количество подписчиков: <?= $game[0]->followers ?></h5>
            <p class="card-text">Описание: <?= $game[0]->content ?></p>
        </div>
    </div>
    <form class="feedback-block-content" action="#" method="post">
        <label>
            <h1 class="feedback--title">Оставь отзыв об этой игре:</h1>
        </label><br>

        <label for="trending_id">Название товара:</label>
        <select name="trending_id" id="trending_id">
            <option value="<?= $game[0]->id ?>"><?= $game[0]->id ?></option>
        </select>

        <label for="otziv">Оставить отзыв:</label>
        <textarea name="otziv" id="otziv" rows="5"></textarea>

        <button type="submit">Отправить отзыв</button>
    </form>

    <hr>

    <div class="feedback-all-block-content">
        <h1 class="feedback--title--otzivs">Все отзывы об этом товаре:</h1>
        <?php
        $tovar_id = $game[0]->id;
        $result = $query->setSelectQuery('SELECT * FROM game_otzivs WHERE trending_id = ?',[$tovar_id]);
        if(isset($result[0])){
        ?>
        <h2><?=$result[0]->otziv?></h2>
        <?php
        }else{
            ?>
        <h2>Отзывов пока нету</h2>
        <?php
        }
        ?>

    </div>
</body>

</html>

<?php require_once "include/footer.php" ?>