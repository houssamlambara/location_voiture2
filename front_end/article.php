<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="container mx-auto p-4">
        <?php
        require_once '../classes/db.php';
        require_once '../classes/class_article.php';
        require_once '../classes/class_comment.php';

        if (!isset($_GET['id'])) {
            echo "<p class='text-red-500'>ID de l'article non spécifié.</p>";
            exit();
        }

        $articleId = $_GET['id'];
        $article = new Article();
        $comment = new Comment();

        $articleData = $article->getById($articleId);
        if (!$articleData) {
            echo "<p class='text-red-500'>Article non trouvé.</p>";
            exit();
        }

        $comments = $comment->getByArticleId($articleId);

        echo "<h1 class='text-4xl font-bold mb-4'>{$articleData['title']}</h1>";
        echo "<p class='text-gray-600 mb-4'>Thème : {$articleData['theme_name']}</p>";
        echo "<p class='mb-8'>{$articleData['content']}</p>";

        echo "<h2 class='text-2xl font-semibold mb-4'>Commentaires</h2>";
        foreach ($comments as $comment) {
            echo "<div class='mb-4 p-4 bg-white rounded shadow'>";
            echo "<p class='mb-2'>{$comment['content']}</p>";
            echo "<p class='text-sm text-gray-600'>- par {$comment['username']}</p>";
            echo "</div>";
        }
        ?>

        <h2 class="text-2xl font-semibold mb-4">Ajouter un commentaire</h2>
        <form action="submit_comment.php" method="POST" class="bg-white p-6 rounded shadow">
            <input type="hidden" name="article_id" value="<?php echo $articleId; ?>">
            <div class="mb-4">
                <label for="user_id" class="block text-sm font-medium text-gray-700">ID Utilisateur</label>
                <input type="text" name="user_id" id="user_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700">Commentaire</label>
                <textarea name="content" id="content" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
            </div>
            <div class="mb-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Ajouter</button>
            </div>
        </form>
    </div>
</body>
</html>