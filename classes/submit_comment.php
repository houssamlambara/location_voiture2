<?php
include_once("db.php");
require_once ("class_comment.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $articleId = $_POST['article_id'];
    $userId = $_POST['user_id'];
    $content = $_POST['content'];

    $comment = new Comment();
    $comment->addComment($articleId, $userId, $content);

    header('Location: article.php?id=' . $articleId);
    exit();
}
?>