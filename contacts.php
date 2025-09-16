<body>
    <?php require_once "include/header.php" ?>

    <div class="container hero-contacts">
        <h1>Как с нами связаться:</h1>
        <p> удобные способы общения для ваших вопросов и заказов.</p>
        <img src="img/Map.png" alt="Map">
    </div>

    <div class="feedback">
        <div class="container">
            <h2>Форма обратной связи</h2>
            <p>Заполните форму для обратной связи.</p>

            <form class="form-feedback">
                <div class="inline">
                    <div>
                        <label>Имя</label>
                        <input type="text">
                    </div>
                    <div>
                        <label>Логин</label>
                        <input type="text">
                    </div>
                </div>
                <label>Емаил</label>
                <input type="email" class="one-line">

                <label>Message</label>
                <textarea class="one-line"></textarea>

                <button type="button">Get in touch</button>
            </form>
        </div>
    </div>

    <?php require_once "include/footer.php" ?>
</body>

</html>