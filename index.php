<div class="wrapper">
    <?php require_once "include/header.php" ?>


    <div class="hero container">
        <div class="hero--info">
            <h2>ТОВАР В ТВОЙ ДОМ</h2>
            <h1>Мы создаём уютную и стильную мебель для вашего дома.</h1>
            <p>Наша работа включает в себя дизайн высокого качества, использование натуральных материалов и
                современных технологий, а также внимание к деталям для обеспечения максимального комфорта и гармонии
                в вашем интерьере.</p>
            <a href="#all-tovars" class="btn">Подробнее</a>
        </div>
        <img src="./img/header-banner.jpg" width="506" height="606" alt="3D Game Icon" title="3D Game Icon"
            class="img-small">
    </div>


    <section class="container trending">
        <?php 
            if(isset($_COOKIE['login'])){
                ?>
        <a href="./trending.php" class="see-all">Все</a>
        <?php
            }
            ?>
        <h3 id="all-tovars">Текущий популярный товар</h3>

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
                        <div class="block d-grid w-auto">
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
        <p>Мебель вашей мечты — у нас вы найдёте идеальный вариант!
            <br>
            <?php
                @$login = $_COOKIE['login'];

                 $result = $query->setSelectQuery('SELECT role FROM users WHERE login = ?',[$login]);
                if(@$_COOKIE['login'] && $result[0]->role == 'admin'):
                    ?>
            <a href="./add-game.php" style="color:white">Добавить товар</a>
            <?php endif; ?>
        </p>
    </section>

    <section class="container banner">
        <h3>Акции и специальные предложения!</h3>
        <p>Не упустите шанс обновить интерьер с нашей мебелью!</p>
        <img src="img/main-banner.jpeg" alt="Banner" style="border-radius: 50px;">
    </section>
</div>

<section class="features">
    <div class="container">
        <h3>Почему стоит выбрать нашу мебель?</h3>
        <p>«Программа лояльности: выгодные предложения для наших клиентов»</p>
        <div class="info">
            <div class="block">
                <img class="feature-image" src="img/feature-main1.png" alt="">
                <p>Качество и долговечность.</p>
                <div class="d-flex justify-content-end">
                    <img src="img/arrow.png" alt="">
                </div>
            </div>
            <div class="block">
                <img class="feature-image" src="img/feature-main2.png" alt="">
                <p>Стильный дизайн.</p>
                <div class="d-flex justify-content-end">
                    <img src="img/arrow.png" alt="">
                </div>
            </div>
            <div class="block">
                <img class="feature-image" src="img/feature-main3.png" alt="">
                <p>Разнообразие выбора.</p>
                <div class="d-flex justify-content-end">
                    <img src="img/arrow.png" alt="">
                </div>
            </div>
            <div class="block">
                <img class="feature-image" src="img/feature-main4.png" alt="">
                <p>Индивидуальный подход.</p>
                <div class="d-flex justify-content-end">
                    <img src="img/arrow.png" alt="">
                </div>
            </div>
            <div class="block">
                <img class="feature-image" src="img/feature5.png" alt="">
                <p>Гарантия качества.</p>
                <div class="d-flex justify-content-end">
                    <img src="img/arrow.png" alt="">
                </div>
            </div>
            <div class="block">
                <img class="feature-image" src="img/feature6.png" alt="">
                <p>Программа лояльности</p>
                <div class="d-flex justify-content-end">
                    <img src="img/arrow.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="wrapper">
    <div class="container projects">
        <h3>Наши последние проекты</h3>
        <p>Ознакомьтесь с нашими последними проектами по продаже мебели. Каждый предмет мебели разработан таким образом,
            чтобы привнести красоту и функциональность в ваше жилое пространство. Изучите нашу коллекцию и найдите
            идеальное дополнение к вашему дому.</p>
        <div class="images">
            <img src="img/project_1 (2).jpeg" alt="">
            <img src="img/project_2 (2).jpeg" alt="">
            <img src="img/project_3 (2).jpeg" alt="">
        </div>
        <div class="images">
            <img src="img/project_4 (2).jpeg" alt="">
            <img src="img/project_5 (2).jpeg" alt="">
            <img src="img/project_6 (2).jpeg" alt="">
        </div>
        <?php 
            if(isset($_COOKIE['login'])){
            ?>
        <a href="./trending.php" class="see-all">ВСЕ</a>
        <?php
            }
            ?>
    </div>

    <div class="container email">
        <h3>Подписывайтесь на уведомления</h3>
        <p>Уведомления только о важных изменениях. </p>
        <div class="block">
            <div>
                <h4>Будьте в курсе событий</h4>
                <p>Подпишитесь на получение последних новостей и обновлений о нашем магазине. Мы обещаем не рассылать
                    вам спам!
                </p>
            </div>
            <div class="d-flex align-items-center">
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