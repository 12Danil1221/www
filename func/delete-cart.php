<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
$image = trim(htmlspecialchars($_POST['image'], FILTER_SANITIZE_SPECIAL_CHARS));
$followers = trim(htmlspecialchars($_POST['followers'], FILTER_SANITIZE_SPECIAL_CHARS));
$content = trim(htmlspecialchars($_POST['content'], FILTER_SANITIZE_SPECIAL_CHARS));
$quantity = trim(htmlspecialchars($_POST['quantity'], FILTER_SANITIZE_SPECIAL_CHARS));
    }

//DB
$pdo = new PDO('mysql:host=localhost;dbname=php-website;port=3306','root','');

//SQL
$sql = 'DELETE FROM cart WHERE image = ? AND followers = ? AND content = ? AND quantity = ?';
$query = $pdo->prepare($sql);
$query->execute([$image,$followers,$content,$quantity]);

header('Location: ../trending.php');

?>