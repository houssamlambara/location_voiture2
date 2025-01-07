<?php
require_once '../classes/db.php';
require_once '../classes/class_article.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $imageUrl = $_POST['image_url'];
    $videoUrl = $_POST['video_url'];
    $themeId = $_POST['theme_id'];
    $userId = $_POST['user_id'];

    $article = new Article();
    $article->create($title, $content, $imageUrl, $videoUrl, $themeId, $userId);

    header('Location: blog.php');
    exit();
}
?>