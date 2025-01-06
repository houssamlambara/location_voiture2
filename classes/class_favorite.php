<?php

class Favorite {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function toggle($userId, $articleId) {
        $sql = "INSERT INTO FAVORITES (user_id, article_id) 
                VALUES (?, ?) 
                ON DUPLICATE KEY UPDATE user_id = VALUES(user_id)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$userId, $articleId]);
    }

    public function getUserFavorites($userId) {
        $sql = "SELECT a.* FROM ARTICLES a 
                JOIN FAVORITES f ON a.id = f.article_id 
                WHERE f.user_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>