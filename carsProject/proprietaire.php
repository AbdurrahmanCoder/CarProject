


    <?php
include("connection.php"); 

try { 
    if (!isset($_GET["table"])) {
        echo '<a href="?table=proprietaire">proprietaire</a> 
    <a href="?table=vehicules">vehicules</a>';
        die();
    } else {

        $table = $_GET["table"];
        if (!in_array($table, array("proprietaire,vehicules"))) { 
            echo "table non existence";
        }
    }

    $pdostat = $pdo->query("select * from " . $table);
    $pdostat->setFetchMode(PDO::FETCH_ASSOC);
    $total_column = $pdostat->columnCount();
} catch (Exception $e) {
    echo "<p>ERREUR REQUETE :" . $e->getMessage();
}
?>


 
<?php
$table_fields = $pdo->query("DESCRIBE  $table")->fetchAll(PDO::FETCH_COLUMN);
?>
 

<html>

<head>
    <title>Display Data</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <!-- <img src="vehicule1.png"  style="width: 100px; height:200px" alt="">   -->
    <h1>MENU</h1>
    <div style="display: flex;flex-direction:column;padding:10px">
        <a href="?table=proprietaire">proprietaire</a>
        <a href="?table=vehicules">vehicules</a>
        <a href="ajouterColonne.php">Ajouter une colonne</a>


    </div>
    <?php

if(isset($_GET['id'])) {
 
    $id = $_GET['id'];

}
?>
    <table border='1'>
        <tr>
 
            <th> Action</th>
            <?php
            foreach ($table_fields as $value) {  ?>   
                <th> <?php echo $value ?></th>
            <?php } ?>
        </tr>
        <?php foreach ($pdostat as $ligne) { ?>

          
            <tr>
                <!-- <td class="tdSupprime" ><a href='' >  <i  class='fa-solid fa-eye tdSupprime'></i></a><a href=''><i class='fa-solid fa-pen tdSupprime'></i></a><a  class="tdSupprime" href='connection.php?id=<?php echo($ligne["proprietaire_id"])?> '>  Supprimer  </a></td> -->
                <td class="tdSupprime">
    <a href="liste_proprietaire.php?id=<?php echo($ligne['proprietaire_id'])?>"><i class='fa-solid fa-eye tdSupprime'></i></a>
    <a href=""><i class='fa-solid fa-pen tdSupprime'></i></a>
    
    <a class="tdSupprime" href='#'>Supprimer</a>
</td>
                <?php foreach ($table_fields as $value) { ?>
                    <td>
                        <?php echo $ligne[$value]  ?>
              
                    </td>
                <?php } ?>
            </tr>
        <?php } ?>

    </table>

</body>
<style>
    .tdSupprime {
        padding-left: 10px;
    }


    img {
        width: 200px;
        height: 400px;
    }




    table {
        padding: 10px;
        width: 60%;
        height: 500px;
        border: none;
        border-bottom: 1px solid grey;
    }

    td,
    th {
        border: none;
        width: 20%;
        text-align: center;

    }

    th {
        background-color: aliceblue;
        padding: 10px;
    }
</style>

</html>