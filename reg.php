<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Website</title>
    <link rel="stylesheet" href="../www/css/main.css">
</head>

<body>
    <?php require_once "blocks/header.php" ?>


    <div class="feedback">
        <div class="container">
            <h2>Регистрация</h2>
            <p>Пожалуйста заполните форму для вашей регистрации.</p>

            <form method="post" action="./func/reg.php">
                <div class="inline">
                    <div>
                        <label for="login">Логин</label>
                        <input type="text" id="login" name="login" required>
                    </div>
                    <div>
                        <label for="username">Имя</label>
                        <input type="text" id="username" name="username" required>
                    </div>
                </div>
                <label for="email">Email</label>
                <input type="email" id="email" class="one-line" name="email" required>

                <label for="password">Пароль</label>
                <input type="password" id="password" class="one-line" name="password" required>

                <button type="submit">Зарегистрироваться</button>
            </form>
        </div>
    </div>

    <?php require_once "blocks/footer.php" ?>
</body>

</html>