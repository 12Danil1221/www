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
                echo "Емаил слишком короткий или нет символа @";
                exit;
                }
                if(strlen($password) < 3){
                    echo "Пароль слишком короткий";
                    exit;
                    }
    
    try{        
        $query = new db();
        
        $result = $query->setSelectQuery('SELECT * FROM users WHERE login = ? OR email = ?', [$login, $email]);

        if(!empty($result)){
            echo "Логин или Емаил уже существуют!";
        }else{
        //INSERT
            $hash_pass = password_hash($password, PASSWORD_DEFAULT);
            $result = $query->setInsertQuery('INSERT INTO users(login, username, email, password) VALUES(?, ?, ?, ?)', [$login, $username, $email, $hash_pass]);
            $result = $query->setSelectQuery('SELECT * FROM users WHERE(email = ?)',[$email]);

            if(!empty($result)){
                header('Location: ../index.php');
            }else{
                echo "Регистрация не прошла";
            }
        }
    }catch(PDOException $e){
        echo "Ошибка:".$e->getMessage();
    }