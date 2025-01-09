<?php
session_start();
require_once ("db.php");
require_once ("class_article.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_SESSION['title'];    
    $content = isset($_POST['content']) ? $_POST['content'] : null;
    $imageUrl = isset($_POST['imageUrl']) ? $_POST['imageUrl'] : null;
    $themeId = isset($_POST['themeId']) ? $_POST['themeId'] : null;
    $userId = isset($_POST['userId']) ? $_POST['userId'] : null;

    if (!$username || !$email || !$phone || !$voiture_id || !$pickup_date || !$return_date) {
        die("Erreur : Veuillez remplir tous les champs obligatoires.");
    }

    $article = new Article();
    $article->create($title, $content, $imageUrl, $themeId, $userId);

    header('Location: ../front_end/article.php');
    exit();
}
?>