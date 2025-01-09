<?php
require_once 'db.php';
require_once 'class_article.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $imageUrl = $_POST['image_url'];
    $themeId = $_POST['theme_id'];
    $userId = $_POST['user_id'];

    $article = new Article();
    $article->create($title, $content, $imageUrl, $themeId, $userId);

    header('Location: ../front_end/article.php');
    exit();
}
?>