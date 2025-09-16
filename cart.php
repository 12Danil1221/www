<body>
    <?php require_once "include/header.php" ?>


    <div class="feedback">
        <div class="container">
            <h2>Корзина</h2>

            <div class="container trending">
                <div class="games">
                    <?php
                //DB
                require_once "./func/db.php";
                $query = new db();
                //SQL
                $games = $query->setSelectQuery('SELECT * FROM cart ORDER BY id DESC', null);
                foreach($games as $el)

                echo '
                <form method="post" action="./func/delete-cart.php">
                <div class="block d-grid w-auto">
                <img src="'.$el->image.'" alt="">
                <span><img src="./img/fire.svg" alt=""> '.$el->followers.' Followers</span>
                <span>'.$el->content.'</span>
                <input type="hidden" name="image" value="'.$el->image.'"/>
                <input type="hidden" name="followers" value="'.$el->followers.'"/>
                <input type="hidden" name="content" value="'.$el->content.'"/>
                <input style="margin-top:50px" type="text" name="quantity" value="'.$el->quantity.'" />
                <div class="block-delete-cart">
                    <button type="submit">Удалить товар из корзины</button>
                </div>
                </div><br>
                </form>';
                
                ?>
                </div>
                <div class="container w-auto" style="text-align: center; font-weight: 400; font-size:20px;">
                    <button class="p-2 btn btn-primary text-white" type="submit">Оформление заказа</button>
                    <br>
                    <br>
                    <a style="color:white;di-text:center;" href="./trending.php">Вернутся к товарам</a>
                </div>

            </div>


        </div>
    </div>


    <?php require_once "include/footer.php" ?>
</body>

</html>