<?php

class Theme {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function create($name, $description) {
        $sql = "INSERT INTO THEMES (name, description) VALUES (?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$name, $description]);
    }

    public function getArticles($themeId) {
        $sql = "SELECT * FROM ARTICLES WHERE theme_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$themeId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>