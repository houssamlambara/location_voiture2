<?php
include_once 'db.php';

$database = new Database();
$conn = $database->getConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reservation_id = $_POST['reservation_id']; 
    $status = $_POST['status']; 

    $stmt = $conn->prepare("UPDATE reservations SET status = ? WHERE id = ?");
    
    if ($stmt->execute([$status, $reservation_id])) {
        header("Location: ../front_end/reservation_list.php"); 
        exit();
    } else {
        $errorInfo = $stmt->errorInfo();
        echo "Erreur lors de la mise à jour du statut: " . $errorInfo[2];
        return false;
    }
}
?>
