<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
$image = trim(htmlspecialchars($_POST['image'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$content = trim(htmlspecialchars($_POST['content'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$followers = trim(htmlspecialchars($_POST['followers'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    }
//DB
$pdo = new PDO('mysql:host=localhost;dbname=php-website;port=3306', 'root', '');


$sql = "INSERT INTO trending (image, content, followers) VALUES (?,?,?)";
$query = $pdo->prepare($sql);
$query->execute([$image,$content,$followers]);

header('Location: ../add-game.php');

?>