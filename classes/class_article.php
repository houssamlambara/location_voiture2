<?php
require_once 'db.php';

class Article {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll() {
        $sql = "SELECT * FROM ARTICLES";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $sql = "SELECT a.*, t.name as theme_name FROM ARTICLES a
                JOIN THEMES t ON a.theme_id = t.id
                WHERE a.id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($title, $content, $imageUrl, $themeId, $userId) {
        $sql = "INSERT INTO ARTICLES (title, content, image_url, theme_id, user_id) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$title, $content, $imageUrl, $themeId, $userId]);
    }

    public function updateStatus($id, $status) {
        $sql = "UPDATE ARTICLES SET status = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$status, $id]);
    }

    public function addTags($articleId, array $tagIds) {
        $sql = "INSERT INTO ARTICLE_TAGS (article_id, tag_id) VALUES (?, ?)";
        $stmt = $this->db->prepare($sql);
        foreach($tagIds as $tagId) {
            $stmt->execute([$articleId, $tagId]);
        }
    }

    public function getPaginated($page = 1, $perPage = 5) {
        $offset = ($page - 1) * $perPage;
        $sql = "SELECT * FROM ARTICLES LIMIT ? OFFSET ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$perPage, $offset]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>