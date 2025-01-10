<?php
require_once '../classes/class_article.php';

$article = new article();
$articleId = isset($_GET['id']) ? intval($_GET['id']) : 0;
$articleDetail = $article->getById($articleId);

if (!$articleDetail) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($articleDetail['title']) ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Bouton Retour -->
        <a href="javascript:history.back()" class="inline-flex items-center mb-6 text-yellow-600 hover:text-yellow-700">
            <i class="fas fa-arrow-left mr-2"></i>
            Retour aux articles
        </a>

        <!-- Article Header -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <img src="<?= htmlspecialchars($articleDetail['image_url']) ?>" 
                 alt="<?= htmlspecialchars($articleDetail['title']) ?>" 
                 class="w-full h-96 object-cover">
            
            <div class="p-8">
                <!-- Titre et Méta-informations -->
                <div class="mb-6">
                    <h1 class="text-3xl font-bold text-gray-900 mb-4">
                        <?= htmlspecialchars($articleDetail['title']) ?>
                    </h1>
                    <div class="flex items-center text-gray-600 text-sm">
                        <span class="flex items-center">
                            <i class="fas fa-calendar-alt mr-2"></i>
                            <?= date('d/m/Y', strtotime($articleDetail['created_at'])) ?>
                        </span>
                        <span class="mx-4">|</span>
                        <span class="flex items-center">
                            <i class="fas fa-folder mr-2"></i>
                            <?= htmlspecialchars($articleDetail['theme_id']) ?>
                        </span>
                    </div>
                </div>

                <!-- Contenu Principal -->
                <div class="prose max-w-none">
                    <div class="bg-gray-50 rounded-lg p-6 mb-8">
                        <h2 class="text-xl font-semibold mb-4">Caractéristiques</h2>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <div class="flex items-center">
                                <i class="fas fa-user text-yellow-500 mr-2"></i>
                                <span>4 places</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-gas-pump text-yellow-500 mr-2"></i>
                                <span>Essence</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-cog text-yellow-500 mr-2"></i>
                                <span>Automatique</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-tachometer-alt text-yellow-500 mr-2"></i>
                                <span>180 km/h</span>
                            </div>
                        </div>
                    </div>

                    <!-- Description détaillée -->
                    <div class="text-gray-700 leading-relaxed mb-8">
                        <?= nl2br(htmlspecialchars($articleDetail['content'])) ?>
                    </div>
                </div>

                <!-- Section Partage -->
                <div class="border-t pt-6 mt-8">
                    <h3 class="text-lg font-semibold mb-4">Partager cet article</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                            <i class="fab fa-facebook-f mr-2"></i>Facebook
                        </a>
                        <a href="#" class="bg-blue-400 text-white px-4 py-2 rounded-lg hover:bg-blue-500 transition">
                            <i class="fab fa-twitter mr-2"></i>Twitter
                        </a>
                        <a href="#" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition">
                            <i class="fab fa-whatsapp mr-2"></i>WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>