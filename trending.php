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
        <?php require_once "include/header.php"; ?>

        <div class="container trending">
            <h3>Currently Trending Games</h3>


            <div class="games">
                <?php
                // Подключение к базе данных
                require_once "./func/db.php";
                $query = new db();
                // Запрос к базе данных
                $games = $query->setSelectQuery('SELECT * FROM trending ORDER BY id DESC', null);
                
                // Проверка наличия данных в бд
                if($games){
                    foreach($games as $el) {
                    $image = htmlspecialchars($el->image, ENT_QUOTES, 'UTF-8');
                    $followers = htmlspecialchars($el->followers, ENT_QUOTES, 'UTF-8');
                    $content = htmlspecialchars($el->content, ENT_QUOTES, 'UTF-8');
                        echo '
                        <div class="block">
                            <img class="game-image" src="'.$image.'" alt="" width="250" height="250">
                            <span><img src="./img/fire.svg" alt=""> '.$followers.' Followers</span>
                            <span>'.$content.'</span>

                            <div class="detail-content-block">
                            <a class="detail-content--text" href="./show.php/'.$el->id.'">Подробнее</a>
                            </div>
                            
                            <div class="block-trending-forms">
                            <form action="./func/redact.php" method="POST">
                            <input type="hidden" name="id" value="'.$el->id.'">
                            <input type="hidden" name="followers" value="'.$el->followers.'">
                            <input type="hidden" name="content" value="'.$el->content.'">
                            
                            '?>
                <?php 
                            $user_login = $_COOKIE['login'];

                            $result = $query->setSelectQuery('SELECT role FROM users WHERE login = ?', [$login]);

                            if(isset($_COOKIE['login']) && $result[0]->role == 'admin'):
                            ?>
                <button class="redact-to-cart" type="submit">Редактировать</button>
                <?php
                            endif;
                            ?>
                <?php '</form>

                            <form action="./func/add-cart.php" method="POST">
                            <input type="hidden" class="one-line" name="image" value="'.$el->image.'">
                            <input type="hidden" class="one-line" name="followers" value="'.$el->followers.'">
                            <input type="hidden" class="one-line" name="content" value="'.$el->content.'">
                            
                            <button class="add-to-cart" type="submit">Добавить в корзину</button>
                        ';
                        if($_SERVER['REQUEST_METHOD']=='POST'){
                            $id = $_POST['id'];
                            $followers = $_POST['followers'];
                            $content = $_POST['content'];

                            $query->setUpdateQuery('UPDATE trending SET followers = :followers, content = :content WHERE id = :id', [':id' => $id, ':followers' => $followers, ':content' => $content]);
                        }

                        echo '
                            </form>
                            </div>
                        </div>';
                    }
                }else{
                    echo "Нет доступных данных об товарах";
                }
                ?>
            </div>
        </div>

        <?php require_once "include/footer.php" ?>

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