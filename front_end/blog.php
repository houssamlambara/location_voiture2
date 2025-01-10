<?php
require_once('../classes/db.php'); 

if (isset($_GET['idArticle']) && is_numeric($_GET['idArticle'])) {
    $idArticle = $_GET['idArticle'];

    $stmt = $pdo->prepare("SELECT * FROM articles WHERE idArticle = :idArticle");
    $stmt->bindParam(':idArticle', $idArticle, PDO::PARAM_INT);
    $stmt->execute();

    if ($article = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $titre = htmlspecialchars($article['title']);
        $description = htmlspecialchars($article['description']);
        $imagePath = htmlspecialchars($article['imagePath']);
        $content = nl2br(htmlspecialchars($article['content']));
    } else {
        $error = "Article introuvable.";
    }
} else {
    $error = "ID d'article invalide.";
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LuxAuto - Location de Voitures</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
        }

        .nav-hover:hover {
            transform: scale(1.05);
            transition: all 0.3s ease;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-gray-50 to-gray-100">
    <!-- Navbar Amélioré -->
    <nav class="bg-black bg-opacity-95 shadow-2xl fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <a href="../index.php" class="flex-shrink-0">
                        <img class="h-10 w-auto transform hover:scale-110 transition duration-300" src="https://via.placeholder.com/150x50?text=RoadRover" alt="RoadRover Logo">
                    </a>
                </div>
                <div class="flex-1 flex justify-center">
                    <div class="flex items-baseline space-x-4">
                        <a href="../index.php" class="text-white nav-hover hover:bg-yellow-500 px-3 py-2 rounded-md text-sm font-medium">Home</a>
                        <a href="./categorie.php" class="text-white nav-hover hover:bg-yellow-500 px-3 py-2 rounded-md text-sm font-medium">Nos Véhicules</a>
                        <a href="./reservation.php" class="text-white nav-hover hover:bg-yellow-500 px-3 py-2 rounded-md text-sm font-medium">Réservation</a>
                        <a href="./about.php" class="text-white nav-hover hover:bg-yellow-500 px-3 py-2 rounded-md text-sm font-medium">À Propos</a>
                        <a href="./blog.php" class="text-white nav-hover hover:bg-yellow-500 px-3 py-2 rounded-md text-sm font-medium">Blog</a>
                        <a href="./article.php" class="text-white nav-hover hover:bg-yellow-500 px-3 py-2 rounded-md text-sm font-medium">Article</a>
                    </div>
                </div>
                <div>
                    <a href="../login/signup.php" class="bg-yellow-500 text-white px-4 py-2 rounded-full hover:bg-yellow-500 text-sm font-medium shadow-md transform hover:scale-105 transition duration-300">
                        Sign In
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mx-auto px-4 py-16">
        <h1 class="text-4xl font-bold text-center text-yellow-500 mt-12 mb-12">Nos Article</h1>
        <!-- Barre de recherche -->
        <div class="max-w-2xl mx-auto mb-8">
            <form action="" method="GET" class="relative">
                <input type="text" name="search" placeholder="Rechercher un article par theme, tage..." 
                       class="w-full px-4 py-3 pl-12 pr-10 text-gray-700 bg-white border border-gray-300 rounded-full focus:outline-none focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 transition duration-300"
                       value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
                <button type="submit" class="absolute inset-y-0 right-0 px-4 text-gray-600 hover:text-yellow-500 focus:outline-none">
                    <i class="fas fa-arrow-right"></i>
                </button>
            </form>
        </div>

        <!-- Filtres de Catégorie -->
        <div class="flex justify-center mb-12 space-x-4">
            <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600"
                onclick="filterCars('all')">Tous</button>
            <button class="bg-gray-200 text-gray-800 px-4 py-2 rounded-md hover:bg-gray-300"
                onclick="filterCars('Sport')">Sport</button>
            <button class="bg-gray-200 text-gray-800 px-4 py-2 rounded-md hover:bg-gray-300"
                onclick="filterCars('SUV')">SUV</button>
            <button class="bg-gray-200 text-gray-800 px-4 py-2 rounded-md hover:bg-gray-300"
                onclick="filterCars('Electric')">Électriques</button>
        </div>

        <!-- Voitures -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <?php
            require_once '../classes/class_article.php';

            $article = new article();
            $allarticle = $article->showAllArticles();
            $total = $article->totalArticles();
            $nmbpage = ceil($total['total'] / 6);
            $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
            $articles = $article->pagination($page);

            foreach ($articles as $blog):
            ?>
                <div class="bg-white rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:scale-105">
                    <img src="<?= htmlspecialchars($blog['image_url']) ?>" alt="<?= htmlspecialchars($blog['title']) ?>" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold mb-2"><?= htmlspecialchars($blog['content']) ?></h3>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600"><?= htmlspecialchars($blog['theme_id']) ?>/jour</span>
                            <div class="flex items-center">
                                <i class="fas fa-user mr-2"></i>4
                                <i class="fas fa-gas-pump ml-2 mr-2"></i>Essence
                            </div>
                        </div>
                        <div class="mt-4 flex space-x-2">
                        <a href="../front_end/detail_article.php?id=<?= htmlspecialchars($blog['id']) ?>"
                        class="w-full bg-yellow-500 text-white py-2 rounded-md hover:bg-yellow-400 text-center flex items-center justify-center">Lire L'article</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- <button class="bg-gray-200 text-gray-800 px-4 py-2 rounded-md hover:bg-gray-300">1</button> -->

    </div>
    <!-- Pagination -->
    <div class="w-full">
        <div class="pagination">
            <ul class="flex justify-center mb-12 space-x-4">
                <?php

                for ($i = 1; $i <= $nmbpage; $i++) {

                    $activeClass = ($i == $page) ? 'class="active"' : '';
                    echo "<li class='bg-gray-200 text-gray-800 px-4 py-2 rounded-md hover:bg-gray-300'><a href='?page=$i' $activeClass>$i</a></li>";
                }
                ?>
            </ul>
        </div>
    </div>
    </div>

    <script>
        function filterCars(category) {
            const allCars = document.querySelectorAll('.car-item');
            allCars.forEach(car => {
                if (category === 'all' || car.getAttribute('data-category') === category) {
                    car.style.display = 'block';
                } else {
                    car.style.display = 'none';
                }
            });
        }
    </script>

    <!-- Footer Amélioré -->
    <footer class="bg-gradient-to-r from-gray-900 to-black text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
                <!-- Colonnes précédentes avec des améliorations visuelles subtiles -->
                <div>
                    <img src="https://via.placeholder.com/150x50?text=RoadRover" alt="RoadRover Logo" class="mb-4 mx-auto transform hover:scale-110 transition duration-300">
                    <p class="text-sm text-gray-400">RoadRover - Votre partenaire de confiance pour la location de voitures de luxe.</p>
                </div>

                <div>
                    <h4 class="font-bold mb-4 text-yellow-500">Liens Rapides</h4>
                    <ul class="space-y-2">
                        <li><a href="./categorie.php" class="hover:text-yellow-400 transition duration-300">Nos Véhicules</a></li>
                        <li><a href="./reservation.php" class="hover:text-yellow-400 transition duration-300">Réservation</a></li>
                        <li><a href="./about.php" class="hover:text-yellow-400 transition duration-300">About Us</a></li>
                        <li><a href="./contact.php" class="hover:text-yellow-400 transition duration-300">Contact Us</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold mb-4 text-yellow-500">Contact</h4>
                    <ul class="space-y-2">
                        <li><i class="fas fa-phone mr-2 text-yellow-500"></i>+33 1 23 45 67 89</li>
                        <li><i class="fas fa-envelope mr-2 text-yellow-500"></i>contact@roadrover.com</li>
                        <li><i class="fas fa-map-marker-alt mr-2 text-yellow-500"></i>Paris, France</li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold mb-4 text-yellow-500">Suivez-nous</h4>
                    <div class="flex space-x-4 justify-center">
                        <a href="#" class="text-2xl hover:text-yellow-400 transform hover:scale-125 transition duration-300"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-2xl hover:text-yellow-400 transform hover:scale-125 transition duration-300"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-2xl hover:text-yellow-400 transform hover:scale-125 transition duration-300"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-2xl hover:text-yellow-400 transform hover:scale-125 transition duration-300"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>

            <div class="mt-8 pt-8 border-t border-gray-800 text-center">
                <p class="text-sm text-gray-400">&copy; 2024 LuxAuto. Tous droits réservés.</p>
            </div>
        </div>
    </footer>
</body>

</html>