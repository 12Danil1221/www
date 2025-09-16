<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Кабинет пользователя</title>
    <link rel="stylesheet" href="../www/css/main.css">
</head>

<body>
    <?php require_once "include/header.php" ?>
    <?php require_once("./classes/User.php");
    $user = new User($_COOKIE['login'] ?? 'Гость');
    ?>

    <main class="feedback">
        <div class="container">
            <h2>Кабинет пользователя</h2>
            <p>Привет: <b><?= $user->getLogin() ?></b>.</p>

        </div>
    </main>

    <?php require_once "include/footer.php" ?>

    <script>
    </script>
</body>

</html>