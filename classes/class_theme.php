<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../classes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image_url = '';

    // if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] == 0) {
    //     $upload_dir = 'uploads/';
    //     $image_url = $upload_dir . basename($_FILES['image_url']['name']);
    //     move_uploaded_file($_FILES['image_url']['tmp_name'], $image_url);
    // }

    try {
        $database = new Database();
        $db = $database->getConnection();

        $sql = "INSERT INTO themes (name, description) VALUES (:name, :description)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);

        if ($stmt->execute()) {
            echo "Theme ajoutée avec succès.";
            header("Location: ../front_end/theme.php");
            exit;
        } else {
            echo "Erreur lors de l'ajout du theme.";
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
