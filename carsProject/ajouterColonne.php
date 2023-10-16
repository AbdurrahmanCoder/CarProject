<?php
include("connection.php") 

?> 

 


<?php
 
 $sql = "INSERT INTO vehicules (immatriculation,marque,modele,couleur,id_proprietaire,img ) VALUES  (:immatriculation,:marque,:modele,:couleur,:id_proprietaire,:img)"; 
 try{  
 $stmt = $pdo->prepare($sql); 
 $stmt->bindParam(':immatriculation',$_GET["immatriculation"]);
 $stmt->bindParam(':marque',$_GET["marque"]); 
 $stmt->bindParam(':modele',$_GET["modele"]); 
 $stmt->bindParam(':couleur',$_GET["couleur"]); 
 $stmt->bindParam(':id_proprietaire',$_GET["id_proprietaire"]); 
 $stmt->bindParam(':img',$_GET["img"]); 
 $stmt->execute();
 echo "data inserted successfuly";
}
catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Vehicules Form</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Vehicules Information Form</h1>
        <form action="ajouterColonne.php" method="GET">
            <div class="mb-3">
                <label for="immatriculation" class="form-label">Immatriculation</label>
                <input type="text" class="form-control" id="immatriculation" name="immatriculation">
            </div>
            <div class="mb-3">
                <label for="marque" class="form-label">Marque</label>
                <input type="text" class="form-control" id="marque" name="marque">
            </div>
            <div class="mb-3">
                <label for="modele" class="form-label">Modele</label>
                <input type="text" class="form-control" id="modele" name="modele">
            </div>
            <div class="mb-3">
                <label for="couleur" class="form-label">Couleur</label>
                <input type="text" class="form-control" id="couleur" name="couleur">
            </div>
            <div class="mb-3">
                <label for="id_proprietaire" class="form-label">ID Proprietaire</label>
                <input type="text" class="form-control" id="id_proprietaire" name="id_proprietaire">
            </div>
            <div class="mb-3">
                <label for="img" class="form-label">Image URL</label>
                <input type="text" class="form-control" id="img" name="img">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>