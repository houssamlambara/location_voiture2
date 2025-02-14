<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Dashbord Admin</title>

</head>

<body class="bg-gray-100">
  <nav class="fixed top-0 z-50 w-full border-gray-200 dark:bg-black">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
      <div class="flex items-center justify-between">
        <div class="flex items-center justify-start rtl:justify-end">
          <button id="menu-toggle" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M4 5h12a1 1 0 110 2H4a1 1 0 110-2zM4 10h12a1 1 0 110 2H4a1 1 0 110-2zM4 15h12a1 1 0 110 2H4a1 1 0 110-2z" clip-rule="evenodd" />
            </svg>
          </button>
          <a href="#" class="flex ms-2 md:me-24">
            <img src="img/logo_cuisine.png" class="h-8 me-3" alt=" Logo" />
            <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white"></span>
          </a>
        </div>
        <div class="flex items-center">
          <div class="flex items-center ms-3">
            <div>
              <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                <span class="sr-only">Open user menu</span>
                <img class="w-full h-12 rounded-full" src="img/6458b4217bf5b7e2b040cb46f9ae9dc4-805x1024.png" alt="user photo">
              </button>
            </div>
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown-user">
              <div class="px-4 py-3" role="none">
                <p class="text-sm text-gray-900 dark:text-white" role="none">
                  Neil Sims
                </p>
                <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                  neil.sims@flowbite.com
                </p>
              </div>
              <ul class="py-1" role="none">
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Dashboard</a>
                </li>
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Settings</a>
                </li>
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Earnings</a>
                </li>
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Sign out</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>

  <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-black" aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto dark:bg-black">
      <ul class="space-y-2 font-medium">
        <li>
          <a href="./admin.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-orange-500 group">
            <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
              <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
              <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
            </svg>
            <span class="ms-3">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="./reservation_list.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-orange-500 group">
            <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
              <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
            </svg>
            <span class="flex-1 ms-3 whitespace-nowrap">Reservation List</span>
          </a>
        </li>
        <li>
          <a href="./clients_list.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-orange-500 group">
            <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
              <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
            </svg>
            <span class="flex-1 ms-3 whitespace-nowrap">Clients List</span>
          </a>
        </li>
        <li>
          <a href="./add_car.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-orange-500 group">
            <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
              <path d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z" />
            </svg>
            <span class="flex-1 ms-3 whitespace-nowrap">Ajouter Voiture</span>
          </a>
        </li>
        <li>
          <a href="./theme.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-orange-500 group">
            <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
              <path d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z" />
            </svg>
            <span class="flex-1 ms-3 whitespace-nowrap">Ajouter Theme</span>
          </a>
        </li>
        <li>
          <a href="./tags.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-orange-500 group">
            <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
              <path d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z" />
            </svg>
            <span class="flex-1 ms-3 whitespace-nowrap">Ajouter Tags</span>
          </a>
        </li>
        <li>
          <a href="../login/signin.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-orange-500 group">
            <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3" />
            </svg>
            <span class="flex-1 ms-3 whitespace-nowrap">Se deconnecter</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>

  <!-- Main Content -->
  <div class="p-4 grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-1">
    <div class="col-span-1 bg-white p-6 rounded-lg shadow-md lg:ml-64 mt-20">
      <h2 class="text-center text-2xl font-bold mb-8 text-yellow-500">Ajouter une Voiture</h2>
      <form action="../classes/add_car.php" method="POST" enctype="multipart/form-data" class="space-y-4">
        <div>
          <label for="nom" class="block text-sm font-medium text-gray-700">Model</label>
          <input type="text" id="nom" name="model" class="p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Entrez le nom" required>
        </div>
        <div>
          <label for="category_id" class="block text-sm font-medium text-gray-700">Catégorie</label>
          <select id="category_id" name="category_id" class="p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
            <option value="">Sélectionnez une catégorie</option>
            <?php
            require_once '../classes/db.php';
            $db = new Database();
            $conn = $db->getConnection();
            $sql = "SELECT id, name FROM categories";
            $res = $conn->query($sql);
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
              echo "<option value='{$row['id']}'>{$row['name']}</option>";
            }
            ?>
          </select>
        </div>
        <div>
          <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
          <input type="text" id="description" name="description" class="p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Description" required>
        </div>
        <div>
          <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
          <input type="file" id="image" name="image_url" class="p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        </div>
        <div>
          <label for="prix" class="block text-sm font-medium text-gray-700">Prix</label>
          <textarea id="prix" name="prix_par_jour" class="p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Entrez le prix" required></textarea>
        </div>
        <div>
          <button type="submit" class="w-full bg-yellow-400 text-white py-2 px-4 rounded-md shadow hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2">Ajouter une Voiture</button>
        </div>
      </form>
    </div>

    <div class="col-span-1 md:col-span-2 bg-white p-6 rounded-lg shadow-md overflow-x-auto lg:ml-64">
      <h2 class="text-center text-2xl font-bold mb-8 text-yellow-500">List Voiture</h2>
      <div>
        <table class="w-full border-collapse border border-gray-400">
          <thead class="bg-black">
            <tr>
              <th class="border border-black text-white px-4 py-2">Model</th>
              <th class="border border-black text-white px-4 py-2">Description</th>
              <th class="border border-black text-white px-4 py-2">Image</th>
              <th class="border border-black text-white px-4 py-2">Prix</th>
              <th class="border border-black text-white px-4 py-2">Statut</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include_once("../classes/db.php");

            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['change_status'])) {
              $car_id = $_POST['car_id'];
              $new_status = $_POST['status'];

              $update_sql = "UPDATE voiture SET status = :status WHERE id = :id";
              $stmt = $conn->prepare($update_sql);
              $stmt->bindParam(':status', $new_status);
              $stmt->bindParam(':id', $car_id);
              $stmt->execute();
            }

            $sql = "SELECT * FROM `voiture`";
            $res = $conn->query($sql);
            while ($row = $res->fetch(PDO::FETCH_ASSOC)):
            ?>
              <tr class="hover:bg-orange-500">
                <td class="border border-black px-4 py-2"><?php echo htmlspecialchars($row["model"]); ?></td>
                <td class="border border-black px-4 py-2"><?php echo htmlspecialchars($row["description"]); ?></td>
                <td class="border border-black px-4 py-2">
                  <img src="<?php echo htmlspecialchars($row["image_url"]); ?>" alt="Image" class="w-16 h-16 object-cover">
                </td>
                <td class="border border-black px-4 py-2"><?php echo htmlspecialchars($row["prix_par_jour"]); ?> €</td>
                <td class="border border-black px-4 py-2">
                  <form method="POST" action="">
                    <input type="hidden" name="car_id" value="<?php echo $row['id']; ?>">
                    <select name="status" class="bg-gray-200 p-2 rounded" onchange="this.form.submit()">
                      <option value="disponible" <?php if ($row['status'] === 'disponible') echo 'selected'; ?>>Disponible</option>
                      <option value="indisponible" <?php if ($row['status'] === 'indisponible') echo 'selected'; ?>>Indisponible</option>
                    </select>
                    <input type="hidden" name="change_status" value="1">
                  </form>
                </td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>

    <script>
      document.getElementById('menu-toggle').addEventListener('click', function() {
        const sidebar = document.getElementById('logo-sidebar');
        sidebar.classList.toggle('-translate-x-full');
      });
    </script>

</body>

</html>