<?php 
$upload_dir = $_SERVER['DOCUMENT_ROOT'].'/www/uploads/image/';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $image_name = $upload_dir.$_FILES['image']['name'];
        $tmpname = $_FILES["image"]["tmp_name"];
    
        $image = 'uploads/image/'.$_FILES['image']['name'];
        $content = trim(htmlspecialchars($_POST['content'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $followers = trim(htmlspecialchars($_POST['followers'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    }
//DB
require('./db.php');

move_uploaded_file($tmpname, $image_name);

$query = new db();
$query->setInsertQuery('INSERT INTO trending (image, content, followers) VALUES (?,?,?)', [$image,$content,$followers]);

header('Location: ../add-game.php');

?>