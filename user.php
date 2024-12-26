<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Кабинет пользователя</title>
    <link rel="stylesheet" href="../www/css/main.css">
</head>

<body>
    <?php require_once "blocks/header.php" ?>

    <main class="feedback">
        <div class="container">
            <h2>Кабинет пользователя</h2>
            <p>Привет: <b><?= $_COOKIE['login'] ? htmlspecialchars($_COOKIE['login']) : 'Гость' ?></b>.</p>
        </div>
    </main>

    <?php require_once "blocks/footer.php" ?>
</body>

</html>