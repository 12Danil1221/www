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
    $trending_id = trim($_POST['id']);
    $otziv = htmlspecialchars(trim($_POST['otziv']));
    

    $stmt = $pdo->prepare('INSERT INTO game_otzivs(trending_id, otziv) VALUE(?,?)');
    if($stmt->execute([$trending_id, $otziv])){
        echo "Отзыв успешно добавлен";
    }else{
        echo "Отзыв не добавлен";
    }
    }

    ?>
    <div class="card">
        <div class="card-body">
            <img src="../<?= $game[0]->image ?>" alt="" width="250" height="250">
            <h5 class="card-title"><?= $game[0]->followers ?></h5>
            <p class="card-text"><?= $game[0]->content ?></p>
        </div>
    </div>
    <form action="show.php" method="post">
        <label>Оставь отзыв об этой игре:</label><br>
        <input type="text" name="trending_id" value="<?php echo htmlspecialchars($trending_id); ?>">
        <input type="text" name="otziv">
        <br>
        <button type="submit">Оставить отзыв</button>
    </form>

    <hr>

    <h2 class="otzivs">Все отзывы об этом товаре:</h2>

</body>

</html>

<?php require_once "include/footer.php" ?>