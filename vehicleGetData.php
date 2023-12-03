<?php

include('connection.php');

class DataRetrieve
{
    // private $id;
    // private $marque;
    // private $kilometrage;
    // private $tarif;
    // private $photo;
    protected $db;

    public function __construct($pdo)
    {
        $this->db = $pdo;
    }
    public function DeleteItem($id)
    {  
        $stmt = $this->db->prepare("DELETE FROM voiture WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();    
    } 
    public function affiche()
    {
        $sql = "SELECT  *  FROM  voiture ORDER BY id DESC" ;    
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } 

}
$afficheData = new DataRetrieve($pdo); 
$results = $afficheData->affiche();  

//   $results = $afficheData->DeleteItem(163);
 
?>
