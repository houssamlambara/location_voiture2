<?php

class Tag
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function tagNameExist($tagName)
    {
        $sql = "SELECT id FROM tags WHERE name = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$tagName]);
        return $stmt->fetchColumn() !== false;
    }

    public function getIDbyNameTag($tagName)
    {
        $sql = "SELECT id FROM tags WHERE name = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$tagName]);
        return $stmt->fetchColumn();
    }

    public function ajoutTag($tagName)
    {
        $sql = "INSERT INTO tags (name) VALUES (?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$tagName]);
        return $this->db->lastInsertId();
    }
}

class TagArticle
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function ajouterTagArticle($articleId, $tagId)
    {
        $sql = "INSERT INTO article_tags (article_id, tag_id) VALUES (?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$articleId, $tagId]);
    }
}
?>