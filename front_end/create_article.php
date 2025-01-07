<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="container mx-auto p-4">
        <h1 class="text-4xl font-bold mb-8">Blog</h1>
        <?php
require_once '../classes/db.php';
require_once '../classes/class_article.php';

$article = new Article();
$articles = $article->getAll();

foreach ($articles as $article) {
    echo "<div class='mb-8 p-4 bg-white rounded shadow'>";
    echo "<h2 class='text-2xl font-semibold mb-2'>{$article['title']}</h2>";
    echo "<p class='mb-4'>" . substr($article['content'], 0, 200) . "...</p>";
    echo "<a href='article.php?id={$article['id']}' class='text-blue-500 hover:underline'>Lire la suite</a>";
    echo "</div>";
}
?>
    </div>
</body>
</html>


developpe moi la partie front end de ce code pour que je puisse avoir tout les fonctionnalité n'nécessaire 