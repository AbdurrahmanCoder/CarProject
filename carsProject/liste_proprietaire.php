<?php

include("connection.php");  
?>
 
<?php
  $pdostat = $pdo->query("select * from proprietaire");
 $data= $pdostat->fetchAll(PDO::FETCH_ASSOC); 
// var_dump($data);
 
?>
 

<?php 
try{ 
    $id = $_GET['id']; 
    $stmt = $pdo->prepare("SELECT * FROM proprietaire WHERE proprietaire_id = :id");  
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);  
    var_dump($result  );
}

catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>
   <!-- $stmt = $pdo->prepare("SELECT column_name FROM your_table WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    // Fetch the result
    $result = $stmt->fetch(PDO::FETCH_ASSOC); -->

<?php

    if(empty($result['commentaire'])){

        echo "dzd";
    }
 
       
?>


<!-- <form action="actionmodifie.php" method="post">

<textarea name="comm" cols="30" rows="10"></textarea>

<button type="">Envoyer</button>
 -->





    
<html> 
<head>
    <title>Display Data</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <div class="container mt-5">
        <h1>Employee List</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>champs</th>
                    <th>valeur</th>
                </tr>  
            </thead>
            <tbody>
            <?php foreach ($result as $key => $value) { ?>
            <tr>    
                        <td> <?php echo  $key?></td> 
                      <td> <?php echo $value?></td> 
                    </tr> 
                    <?php } ?> 
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
 

</html>

<script>

 

</script>