<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name  = $_POST['name'];
    $tags = $_POST['tags']; // Tableau des IDs des tags sélectionnés
    

    // if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] == 0) {
    //     $upload_dir = 'uploads/';
    //     $image_url = $upload_dir . basename($_FILES['image_url']['name']);
    //     move_uploaded_file($_FILES['image_url']['tmp_name'], $image_url);
    // }

    try {
        $database = new Database();
        $db = $database->getConnection();

        $sql = "INSERT INTO tags (name) VALUES (:name)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':name', $name);

        if ($stmt->execute()) {
            echo "Theme ajoutée avec succès.";
            header("Location: ../front_end/tags.php");
            exit;
        } else {
            echo "Erreur lors de l'ajout du theme.";
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
