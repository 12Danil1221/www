<?php 
    //Password
    // $salt = '2784563@#*&20564';
    // $password = md5($salt.$password);

    //Подключение к БД
    require_once "../func/db.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $login = htmlspecialchars(trim($_POST['login']));
        $username = htmlspecialchars(trim($_POST['username']));
        $email = htmlspecialchars(trim($_POST['email']));
        $password = htmlspecialchars(trim($_POST['password']));
    }

    if(strlen($login) < 3){
        echo "Логин слишком короткий";
        exit;
        }
        if(strlen($username) < 3){
            echo "Имя слишком короткое";
            exit;
            }
            if(strlen($email) < 3 && !str_contains($email, '@')){
                echo "Емаил слишком короткий";
                exit;
                }
                if(strlen($password) < 3){
                    echo "Пароль слишком короткий";
                    exit;
                    }
    
    $stmt = $pdo->prepare('SELECT * FROM users WHERE login = ? OR email = ?');
    $stmt->execute([$login, $email]);
    if($stmt->rowCount() > 0){
        echo "Логин или Емаил уже заняты!";
    }else{
    //INSERT
    $sql = 'INSERT INTO users(login, username, email, password) VALUES(?, ?, ?, ?)';
    $query = $pdo->prepare($sql);
    
    if($query->execute([$login, $username, $email, $password])){
        header('Location: ../index.php');
    }else{
        echo "Регистрация не прошла";
    }

    }