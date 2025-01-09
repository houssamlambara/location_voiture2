<?php
include_once("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reservation_id = $_POST['reservation_id'];

    $db = new Database();
    $conn = $db->getConnection();

    $stmt = $conn->prepare("DELETE FROM reservations WHERE id = ?");
    if ($stmt->execute([$reservation_id])) {
        header("Location: ../front_end/reservation_list.php");
        exit();
    } else {
        echo "Erreur lors de la suppression de la réservation.";
    }
}
?>  