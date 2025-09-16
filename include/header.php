<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Комфорт Хаус</title>
    <link rel="stylesheet" href="../www/css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <style>
    body {
        background-color: #000;
    }

    a {
        color: #fff;
        text-decoration: none;
    }

    a:hover {
        color: #f0f0f0ff;
    }

    .btn:hover {
        color: #fff;
    }

    h1,
    h2,
    h3,
    h4,
    li,
    p,
    span {
        color: #fff;
    }
    </style>
</head>

<body>

    <header class="container">
        <span class="logo"><a href="./index.php">Комфорт Хаус</a></span>
        <nav class="navbar_nav">
            <ul>
                <li class="active"><a href="./index.php">Главная</a></li>
                <li><a href="./about.php">О нас</a></li>

                <?php
            if(isset($_COOKIE['login']))
            
        echo '<li class="profile"><a href="./user.php">Кабинет пользователя</a></li>
        <li class="user_card"><a href="./cart.php">Корзину</a></li>
        <li class="logout"><a href="./func/logout.php">Выход</a></li>
        ';
            else
            echo '<li><a href="./reg.php">Регистрация</a></li>
            <li><a href="./auth.php">Авторизация</a></li>';
            ?>


                <li class="btn"><a href="./contacts.php">Контакты</a></li>
            </ul>
        </nav>
    </header>