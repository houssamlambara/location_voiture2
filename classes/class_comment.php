<?php
class Comment {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getByArticleId($articleId) {
        $sql = "SELECT c.*, u.username FROM COMMENTS c 
                JOIN USERS u ON c.user_id = u.id 
                WHERE c.article_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$articleId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addComment($articleId, $userId, $content) {
        $sql = "INSERT INTO COMMENTS (article_id, user_id, content) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$articleId, $userId, $content]);
    }
}
?>