<header class="container">
    <span class="logo">logo</span>
    <nav>
        <ul>
            <li class="active"><a href="./index.php">Home</a></li>
            <li><a href="./about.php">About us</a></li>

            <?php
            if(isset($_COOKIE['login']))
            
        echo '<li><a href="./user.php">Кабинет пользователя</a></li>
        <li><a href="./cart.php">Корзину</a></li>
        <li><a href="./func/logout.php">Выход</a></li>
        ';
            else
            echo '<li><a href="./reg.php">Регистрация</a></li>
            <li><a href="./auth.php">Авторизация</a></li>';
            ?>


            <li class="btn"><a href="./contacts.php">Contacts</a></li>
        </ul>
    </nav>
</header>