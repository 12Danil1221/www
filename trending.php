<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Website</title>
    <link rel="stylesheet" href="../www/css/main.css">
</head>

<body>
    <div class="wrapper">
        <?php require_once "blocks/header.php" ?>

        <div class="container trending">
            <h3>Currently Trending Games</h3>


            <div class="games">
                <?php
                // Подключение к базе данных
                require_once "./func/db.php";
                
                // Запрос к базе данных
                $sql = 'SELECT * FROM trending ORDER BY id DESC';
                $query = $pdo->prepare($sql);
                $query->execute();
                $games = $query->fetchAll(PDO::FETCH_OBJ);
                
                // Проверка наличия данных в бд
                if($games){
                    foreach($games as $el) {
                    $image = htmlspecialchars($el->image, ENT_QUOTES, 'UTF-8');
                    $followers = htmlspecialchars($el->followers, ENT_QUOTES, 'UTF-8');
                    $content = htmlspecialchars($el->content, ENT_QUOTES, 'UTF-8');
                        echo '
                        <div class="block">
                            <img class="game-image" src="img/'.$image.'" alt="">
                            <span><img src="./img/fire.svg" alt=""> '.$followers.' Followers</span>
                            <span>'.$content.'</span>

                            <a href="./show.php/'.$el->id.'">Подробнее</a>
                            <form method="post" action="./func/add-cart.php">
                            <input type="hidden" class="one-line" name="image" value="'.$el->image.'">
                            <input type="hidden" class="one-line" name="followers" value="'.$el->followers.'">
                            <input type="hidden" class="one-line" name="content" value="'.$el->content.'">
                            
                            <button class="add-to-cart" type="submit">Добавить в корзину</button>
                        ';
                        if($_SERVER['REQUEST_METHOD']=='POST'){
                            $id = $_POST['id'];
                            $followers = $_POST['followers'];
                            $content = $_POST['content'];

                            $sql = 'UPDATE trending SET followers = :followers, content = :content WHERE id = :id';
                            $query = $pdo->prepare($sql);
                            $query->execute([':id' => $id, ':followers' => $followers, ':content' => $content]);
                        }

                        echo '
                            </form>
                            <form action="./func/redact.php" method="POST">
                            <input type="hidden" name="id" value="'.$el->id.'">
                            <input type="hidden" name="followers" value="'.$el->followers.'">
                            <input type="hidden" name="content" value="'.$el->content.'">
                            
                            <button class="redact" type="submit">Редактировать</button>
                            </form>
                        </div>';
                    }
                }else{
                    echo "Нет доступных данных об товарах";
                }
                ?>
            </div>
        </div>

        <?php require_once "blocks/footer.php" ?>

        <script>
        function checkEmail() {
            let email = document.querySelector('#emailField').value;
            if (!email.includes('@')) alert('Нет символа @');
            else if (!email.includes('.')) alert('Нет символа .');
            else alert('Все отлично!');
        }
        </script>
</body>

</html>