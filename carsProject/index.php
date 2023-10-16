<?php
include("connection.php")

?> 
<?php 
    $pdostat = $pdo->query("SELECT * FROM vehicules ");
    $pdostat->setFetchMode(PDO::FETCH_ASSOC);
  
?>
 
 
<html>
<head>
    <title>Display Data</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <!-- <img src="vehicule1.png"  style="width: 100px; height:200px" alt="">   -->

<table border="1">
    <tr>
    <th>action</th> 
        <th>image</th>
        <th>Immatriculation</th>
        <th>Marque</th>
        <th>Modele</th>
        <th>Couleur</th>
    </tr>   
    <?php foreach ($pdostat as $ligne) { ?>
    <tr>
        <td class="tdSupprime" ><a href='' >  <i  class='fa-solid fa-eye tdSupprime'></i></a><a href=''><i class='fa-solid fa-pen tdSupprime'></i></a><a  class="tdSupprime" href=''>  Supprimer  </a></td>
       <td><img src= '<?php echo $ligne['img']; ?> '  style="width: 150px; height:150px" alt=""></td> 
       <td><?php echo $ligne['immatriculation']; ?></td>
        <td><?php echo $ligne['marque']; ?></td>
        <td ><?php echo $ligne['modele']; ?></td>
        <td><?php echo $ligne['couleur']; ?></td>   
        
    </tr>
    <?php } ?>

</table>

</body>
<style>
.tdSupprime{
    padding-left: 10px;
}


img{
width: 200px;
height:400px;
}


 

table
{
    padding: 10px;
    width:60%;
    height: 500px;
    border: none;
    border-bottom: 1px solid grey;
} 

td,th{
    border: none;
    width: 20%;
    text-align: center;

}
th{
    background-color: aliceblue;
    padding: 10px;
}


</style>
</html>