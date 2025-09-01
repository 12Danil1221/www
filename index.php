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
        <?php require_once "include/header.php" ?>

        <div class="hero container">
            <div class="hero--info">
                <h2>3D game Dev</h2>
                <h1>Work that we produce for our clients</h1>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard.</p>
                <button class="btn">Get more details</button>
            </div>
            <img src="   https://cdn-icons-png.flaticon.com/512/1334/1334203.png " style="top:-30px;" width="556"
                height="556" alt="" title="" class="img-small">
        </div>

        <section class="container trending">
            <?php 
            if(isset($_COOKIE['login'])){
                ?>
            <a href="./trending.php" class="see-all">SEE ALL</a>
            <?php
            }
            ?>
            <h3>Currently Trending Games</h3>

            <div class="games">
                <?php
                //DB
                require_once "./func/db.php";
                $query = new db();
                //SQL
                
                $games = $query->setSelectQuery('SELECT * FROM trending ORDER BY id DESC LIMIT 4', null);
                
                // Проверка наличия товара
                if ($games) {
                    foreach($games as $el){
                        $image = htmlspecialchars($el->image, ENT_QUOTES, 'UTF-8');
                        $followers = htmlspecialchars($el->followers, ENT_QUOTES, 'UTF-8');
                        $content = htmlspecialchars($el->content, ENT_QUOTES, 'UTF-8');
                        echo '
                        <div class="block">
                            <img src="'.$el->image.'" alt="Image" width="250" height="250">
                            <span><img src="./img/fire.svg" alt=""> '.$el->followers.' Followers</span>
                            <span>'.$el->content.'</span>
                        </div>';
                    }
                }else{
                    echo "<p>Нет данных для отображения.</p>";
                }
                ?>
            </div>
        </section>

        <section class="container big-text">
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                <br>
                <?php
                @$login = $_COOKIE['login'];

                 $result = $query->setSelectQuery('SELECT role FROM users WHERE login = ?',[$login]);
                if(@$_COOKIE['login'] && $result[0]->role == 'admin'):
                    ?>
                <a href="./add-game.php" style="color:white">Добавить товар</a>
                <?php
                endif;
                 ?>
            </p>
        </section>

        <section class="container banner">
            <h3>Lorem Ipsum</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s,</p>
            <img src="img/banner.jpeg" alt="Banner" style="border-radius: 50px;">
        </section>
    </div>

    <section class="features">
        <div class="container">
            <h3>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s,</p>
            <div class="info">
                <div class="block">
                    <img src="img/feature1.png" alt="">
                    <p>Mobile Game Development</p>
                    <img src="img/arrow.png" alt="">
                </div>
                <div class="block">
                    <img src="img/feature2.png" alt="">
                    <p>PC Game Development</p>
                    <img src="img/arrow.png" alt="">
                </div>
                <div class="block">
                    <img src="img/feature3.png" alt="">
                    <p>PS4 Game Development</p>
                    <img src="img/arrow.png" alt="">
                </div>
                <div class="block">
                    <img src="img/feature4.png" alt="">
                    <p>AR/VR Solutions</p>
                    <img src="img/arrow.png" alt="">
                </div>
                <div class="block">
                    <img src="img/feature5.png" alt="">
                    <p>AR/ VR design</p>
                    <img src="img/arrow.png" alt="">
                </div>
                <div class="block">
                    <img src="img/feature6.png" alt="">
                    <p>3D Modelings</p>
                    <img src="img/arrow.png" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="wrapper">
        <div class="container projects">
            <h3>Our Recent Projects</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
            <div class="images">
                <img src="img/Project1.png" alt="">
                <img src="img/Project2.png" alt="">
                <img src="img/Project3.png" alt="">
            </div>
            <div class="images">
                <img src="img/Project4.png" alt="">
                <img src="img/Project5.png" alt="">
                <img src="img/Project6.png" alt="">
            </div>
            <?php 
            if(isset($_COOKIE['login'])){
            ?>
            <a href="" class="see-all">SEE ALL</a>
            <?php
            }
            ?>
        </div>

        <div class="container email">
            <h3>Lorem Ipsum</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
            <div class="block">
                <div>
                    <h4>Stay in the loop</h4>
                    <p>Subscribe to receive the latest news and updates about TDA.
                        We promise not to spam you! </p>
                </div>
                <div>
                    <input type="email" id="emailField" placeholder="Enter email address">
                    <button onclick="checkEmail()">Continue</button>
                </div>
            </div>
        </div>
    </section>

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