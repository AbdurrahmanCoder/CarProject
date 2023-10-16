<?php 
try { 
    $pdo = new PDO("mysql:host=localhost;dbname=mabdd", 'root');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

} catch (Exception $e) {

    echo "<p>ERREur :" . $e->getMessage();
}

?>  

