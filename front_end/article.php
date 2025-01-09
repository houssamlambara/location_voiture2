<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LuxAuto - Ajouter un Article</title>
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
    <!-- Navbar -->
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
                    <a href="../login/signup.php" class="bg-yellow-500 text-white px-4 py-2 rounded-full hover:bg-yellow-600 text-sm font-medium shadow-md transform hover:scale-105 transition duration-300">
                        Sign In
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content with Padding Top to Account for Fixed Navbar -->
    <main class="pt-24 pb-12 px-4">
        <form class="max-w-2xl mx-auto p-8 bg-white rounded-xl shadow-lg" method="POST" enctype="multipart/form-data">
            <h2 class="text-3xl font-bold mb-8 text-gray-800">Ajouter un nouvel article</h2>

            <div class="space-y-6">
                <!-- Titre -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                        Titre de l'article
                    </label>
                    <input type="text" id="title" name="title" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition duration-300" required>
                </div>

                <!-- Catégorie -->
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700 mb-2">
                        Theme
                    </label>
                    <select id="category" name="category" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition duration-300" required>
                        <option value="">Sélectionner un theme</option>
                        <option value="vehicules">Véhicules</option>
                        <option value="actualites">Actualités</option>
                        <option value="conseils">Conseils</option>
                        <option value="evenements">Événements</option>
                    </select>
                </div>

                <!-- Image de couverture -->
                <div>
                    <label for="image_url" class="block text-sm font-medium text-gray-700 mb-2">
                        Image de couverture
                    </label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-yellow-500 transition duration-300">
                        <div class="space-y-1 text-center">
                            <i class="fas fa-image text-gray-400 text-3xl mb-3"></i>
                            <div class="flex text-sm text-gray-600 justify-center">
                                <label for="image_url" class="relative cursor-pointer bg-white rounded-md font-medium text-yellow-500 hover:text-yellow-600">
                                    <span>Télécharger une image</span>
                                    <input type="file" id="image_url" name="image_url" class="sr-only" accept="image/*" required>
                                </label>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG jusqu'à 5MB</p>
                        </div>
                    </div>
                </div>

                <!-- Contenu -->
                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-2">
                        Contenu de l'article
                    </label>
                    <textarea id="content" name="content" rows="8" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition duration-300" required></textarea>
                </div>

                <!-- Tags (modifié en select simple) -->
                <div>
                    <label for="tags" class="block text-sm font-medium text-gray-700 mb-2">
                        Tag principal
                    </label>
                    <select id="tags" name="tags" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition duration-300">
                        <option value="">Sélectionner un tag</option>
                        <option value="luxe">Luxe</option>
                        <option value="sport">Sport</option>
                        <option value="familiale">Familiale</option>
                        <option value="citadine">Citadine</option>
                        <option value="suv">SUV</option>
                        <option value="electrique">Électrique</option>
                        <option value="hybride">Hybride</option>
                        <option value="occasion">Occasion</option>
                        <option value="nouveaute">Nouveauté</option>
                        <option value="performance">Performance</option>
                    </select>
                </div>

                <div class="flex gap-4 pt-6">
                    <button type="submit"
                        class="flex-1 px-6 py-3 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition duration-300">
                        <i class="fas fa-paper-plane mr-2"></i>Publier
                    </button>
                    <button type="reset"
                        class="flex-1 px-6 py-3 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition duration-300">
                        <i class="fas fa-undo mr-2"></i>Réinitialiser
                    </button>
                </div>
            </div>
        </form>
    </main>
</body>

</html>