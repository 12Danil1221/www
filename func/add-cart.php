<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
$image = trim(htmlspecialchars($_POST['image'], FILTER_SANITIZE_SPECIAL_CHARS));
$followers = trim(htmlspecialchars($_POST['followers'], FILTER_SANITIZE_SPECIAL_CHARS));
$content = trim(htmlspecialchars($_POST['content'], FILTER_SANITIZE_SPECIAL_CHARS));
    }

$errors = [];
if(strlen($image) < 3){
    $error = "Image must be at least 3 characters long.";
}
if(strlen($followers) < 1){
    $error = "Followers must be at least 1 character long.";
}
if(strlen($content) < 3){
    $errors[] = "Content must be at least 3 characters long.";
}

if(empty($errors)){
    // Insert data into database
    foreach($errors as $error){
        echo $error . "\n";
    }
    exit;
}
//DB
require_once "../func/db.php";
    // Проверка на дубликат
    $stmt = $pdo->prepare("SELECT 1 FROM cart WHERE Image = :image");
    $stmt->execute([
        'image' => $image,
    ]);
    $result = $stmt->fetch(PDO::FETCH_NUM);
    if ($result[0]) {
        header('Location: ../add-cart-null.php');
        exit;
    } else{
//SQL
$sql = 'INSERT INTO cart(image, followers, content) VALUES (?,?,?)';
$query = $pdo->prepare($sql);
$query->execute([$image, $followers, $content]);

header('Location: ../trending.php');
    }
?>