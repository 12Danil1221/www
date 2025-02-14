<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Кабинет пользователя</title>
    <link rel="stylesheet" href="../www/css/main.css">
    <style>
    .feedback form {
        width: 250px;
    }
    </style>
</head>

<body>
    <?php require_once "blocks/header.php" ?>


    <div class="feedback">
        <div class="container">
            <h2>Корзина</h2>

            <div class="container trending">
                <div class="games">
                    <?php
                //DB
                require_once "./func/db.php";

                //SQL
                $sql = 'SELECT * FROM cart ORDER BY id DESC';
                $query = $pdo->prepare($sql);
                $query->execute();
                $games = $query->fetchAll(PDO::FETCH_OBJ);
                foreach($games as $el)

                echo '
                <form method="post" action="./func/delete-cart.php">
                <div class="block">
                <img src="img/'.$el->image.'" alt="">
                <span><img src="./img/fire.svg" alt=""> '.$el->followers.' Followers</span>
                <span>'.$el->content.'</span>
                <input type="hidden" name="image" value="'.$el->image.'"/>
                <input type="hidden" name="followers" value="'.$el->followers.'"/>
                <input type="hidden" name="content" value="'.$el->content.'"/>
                <input style="margin-top:50px" type="text" name="quantity" value="'.$el->quantity.'" />
                <button style="padding:2%; margin-right:40px" type="submit">Удалить товар из корзины</button>
                
                </div><br>
                </form>';
                
                ?>
                </div>
                <div class="container" style="width:1400px; text-align: center; font-weight: 400; font-size:20px;">
                    <button style="background-color:none; padding:0.5%;" type="submit">Оформление заказа</button>
                    <br>
                    <br>
                    <a style="color:white;di-text:center;" href="./trending.php">Вернутся в галлерею товаров</a>
                </div>

            </div>


        </div>
    </div>


    <?php require_once "blocks/footer.php" ?>
</body>

</html>