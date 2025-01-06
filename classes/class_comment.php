<?php
class Comment {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function create($articleId, $userId, $content) {
        $sql = "INSERT INTO COMMENTS (article_id, user_id, content) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$articleId, $userId, $content]);
    }

    public function update($id, $content, $userId) {
        $sql = "UPDATE COMMENTS SET content = ? WHERE id = ? AND user_id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$content, $id, $userId]);
    }
}
?>