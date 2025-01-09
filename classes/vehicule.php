<?php
include_once 'db.php';
class Vehicule
{
  private PDO $db;
  public function __construct()
  {
    $database = new Database();
    $this->db = $database->connect();
  }

  function showAllvehicules()
  {
    $req = "SELECT * FROM voiture ";
    $stmt = $this->db->prepare($req);
    $result = $stmt->execute();
    if ($result) {
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
      return [];
    }
  }
  function totalvihuicules()
  {
    $req = "SELECT COUNT(*) as total FROM voiture";
    $stmt = $this->db->prepare($req);
    $result = $stmt->execute();
    if ($result) {
      return $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
      return [];
    }
  }

  function pagination($page)
  {
    $parpage = 8;
    $premier = ($page * $parpage) - $parpage;
    $req = "SELECT * FROM voiture LIMIT $premier, $parpage";
    $stmt = $this->db->prepare($req);
    $result = $stmt->execute();
    if ($result) {
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
      return [];
    }
  }
}
