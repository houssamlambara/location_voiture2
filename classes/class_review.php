<?php
class Review {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function create($userId, $voitureId, $rating, $comment) {
        $sql = "INSERT INTO REVIEWS (user_id, voiture_id, rating, comment) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$userId, $voitureId, $rating, $comment]);
    }

    public function softDelete($id) {
        $sql = "UPDATE REVIEWS SET deleted_at = CURRENT_TIMESTAMP WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }
}
?>