
<?php 
try {
$pdo = new PDO('mysql:host=localhost;dbname=carproject','root','');
} catch (PDOException $e) {
echo 'Query failed: ' . $e->getMessage();
} 
?>




 