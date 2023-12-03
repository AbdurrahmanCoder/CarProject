 
<?php
include('connection.php');

if (!empty($_GET['ElementToDelete'])) {   
  $elementTodelRecu = $_GET['ElementToDelete'];  

  $stmt = $pdo->prepare("DELETE FROM voiture WHERE id = :id");
  $stmt->bindParam(':id', $elementTodelRecu, PDO::PARAM_INT);
  $stmt->execute();       

  echo "Element deleted successfully: " . $elementTodelRecu;
} else {
  http_response_code(400);
  echo "Error: 'ElementToDelete' not set in the POST request.";
}
?>