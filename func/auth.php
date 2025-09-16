<?php 

//Подключение к бд
require_once "./db.php";
$query = new db();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
$login = htmlspecialchars(trim($_POST['login']));
$password = trim($_POST['password']);
}

if(strlen($login) < 2){
    echo "Login слишком короткий и небезопасный"; 
    exit;
}
if(strlen($password) < 2){
    echo "Password слишком короткий и небезопасный"; 
    exit;
}


//Авторизация
$user = $query->setSelectQuery('SELECT id FROM users WHERE login = ?', [$login]);

if($user){
    $_SESSION['user_id'] = $user['id']; //Сохрвняем id пользователя в сессии
    
    setcookie('login', $login, time()+ 3600 * 24 * 30, "/");
    header('Location: ../user.php');
}else{
    echo "Вход не удался";
}