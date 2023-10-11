<?php

$sql = "SELECT  *  FROM  membre ";
$stmt = $pdo->prepare($sql);
$stmt->execute(); 
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);  
 var_dump($results ); 

 ?>