<?php
class Tag {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function createMultiple(array $tags) {
        $sql = "INSERT IGNORE INTO TAGS (name) VALUES (?)";
        $stmt = $this->db->prepare($sql);
        foreach($tags as $tag) {
            $stmt->execute([$tag]);
        }
    }
}
?>