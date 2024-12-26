<?php 

//Подключение к бд
require_once "./db.php";

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
$sql = 'SELECT id FROM users WHERE login = ? AND password = ?';
$query = $pdo->prepare($sql);
$query->execute([$login, $password]);
$user = $query->fetch(PDO::FETCH_ASSOC);

if($user){
    $_SESSION['user_id'] = $user['id']; //Сохрвняем id пользователя в сессии
    setcookie('login', $login, time()+ 3600 * 24 * 30, "/");
    header('Location: ../user.php');
}else{
    echo "Вход не удался";
}