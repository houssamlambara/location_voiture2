<?php
require_once 'db.php';

class Article
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM articles";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function showAllArticles()
    {
        $req = "SELECT * FROM articles";
        $stmt = $this->db->prepare($req);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function totalArticles()
    {
        $req = "SELECT COUNT(*) as total FROM articles";
        $stmt = $this->db->prepare($req);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function getAllArticles($db)
    {
        $query = "SELECT * FROM articles WHERE statut = 'accepter'";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getAllArticlesAdmin($db)
    {
        $query = "SELECT * FROM articles";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $sql = "SELECT a.*, t.name as theme_name FROM articles a
                JOIN themes t ON a.theme_id = t.id
                WHERE a.id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function pagination($page)
    {
        $parpage = 8;
        $premier = ($page * $parpage) - $parpage;
        $req = "SELECT * FROM articles LIMIT $premier, $parpage";
        $stmt = $this->db->prepare($req);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($title, $content, $imageUrl, $themeId, $userId)
    {
        $query = "INSERT INTO articles (title, content, image_url, theme_id, user_id) 
                  VALUES (:title, :content, :image_url, :theme_id, :user_id)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':image_url', $imageUrl);
        $stmt->bindParam(':theme_id', $themeId);
        $stmt->bindParam(':user_id', $userId);

        return $stmt->execute();
    }

    public function updateStatus($id, $status)
    {
        $sql = "UPDATE articles SET status = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$status, $id]);
    }

    // public function addTags($articleId, array $tagIds)
    // {
    //     $sql = "INSERT INTO article_tags (article_id, tag_id) VALUES (?, ?)";
    //     $stmt = $this->db->prepare($sql);
    //     foreach ($tagIds as $tagId) {
    //         $stmt->execute([$articleId, $tagId]);
    //     }
    

    // $article->ajouterArticle($titre, $description, $finalPath, $iduser, $idtheme);
    //     $idarticle=$db->lastInsertId();
    //     $tags = explode(',', $tagString);
    //     $tag->addTags( $idarticle,$tags);
    //     // $allTagArticle=array();
    //     // foreach ($tags as $tagFor) {
    //     //     array_push( $allTagArticle,$tagFor);
    //     // }
    //    $tag_article = new tag_article($db);
    //     foreach($allTagArticle as $tagArray){
    //         if($tag->tagNameExist($tagArray)){
    //             $id=$tag->getIDbyNamTag($tagArray);
    //             $tag_article->ajouterTag_article($idarticle,$id);
    //         }else{
    //             $tag->ajoutTag($tagArray);
    //             $idtag=$db->lastInsertId();
    //             $tag_article->ajouterTag_article($idarticle,$idtag);
    //         }

    //     }

    public function getPaginated($page = 1, $perPage = 5)
    {
        $offset = ($page - 1) * $perPage;
        $sql = "SELECT * FROM articles LIMIT ? OFFSET ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$perPage, $offset]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
