<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../classes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $model = $_POST['model'];
    $category_id = $_POST['category_id'];
    $description = $_POST['description'];
    $prix_par_jour = $_POST['prix_par_jour'];
    $image_url = '';


    if (isset($_FILES['image_url']['name']) && !empty($_FILES['image_url']['name'])) {
        $dir = '../uploads';
        $path = basename($_FILES['image_url']['name']);
        $finalPath = $dir . uniqid() . "" . $path;
        $allowedExtensions = ['png', 'jpg', 'jpeg', 'gif', 'svg'];
        $extension = pathinfo($finalPath, PATHINFO_EXTENSION);
        if (in_array(strtolower($extension), $allowedExtensions)) {
            if (move_uploaded_file($_FILES['image_url']['tmp_name'], $finalPath)) {

            } else {

                echo "Erreur lors du téléchargement de l'image pour le véhicule : " . $_POST['nom'];
            }
        } else {
            echo "Extension non autorisée pour le fichier : " . $_FILES['image_url']['name'];
        }
    }

    try {
        $database = new Database();
        $db = $database->getConnection();

        $sql = "INSERT INTO voiture (model, category_id, description, image_url, prix_par_jour) VALUES (:model, :category_id, :description, :image_url, :prix_par_jour)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':model', $model);
        $stmt->bindParam(':category_id', $category_id);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':image_url', $finalPath);
        $stmt->bindParam(':prix_par_jour', $prix_par_jour);

        if ($stmt->execute()) {
            echo "Voiture ajoutée avec succès.";
            header("Location: ../front_end/add_car.php");
            exit;
        } else {
            echo "Erreur lors de l'ajout de la voiture.";
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
