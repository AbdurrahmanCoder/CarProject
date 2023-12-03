<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your Form Title</title>
  <!-- Add Bootstrap CSS link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="Css/adminLogin.css">
</head>
<script src="AdminLogin.js" async> </script>

<body>
  <?php include("Navbar.php"); ?>
  <?php
  include("connection.php");
  if (!isAdmin()) {
    header("Location: login.php");
    exit();
  } else {
    ?>

    <?php
    include('vehicleGetData.php');
    class DataInsert extends DataRetrieve
    {
      public function __construct($pdo)
      {
        parent::__construct($pdo);
      }
      public function CommandeAffficher()
      {

        $requete = "SELECT carorder.*, membre.*
        FROM carorder
        INNER JOIN membre ON carorder.id_Second = membre.id
        WHERE membre.id";

        $stmt = $this->db->prepare($requete);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);


      }


      public function insertItem($marque, $kilometrage, $tarif, $photo)
      {

        if (empty($photo)) {
          header("Location:index.php?message=er");
        }
        // Obtenir le nom de l'image sans l'extension
        $file_basename = pathinfo($_FILES["image_file"]["name"], PATHINFO_FILENAME);
        // Renommer l'image en y ajoutant le nom de base et la date et l'heure
        $file_extension = pathinfo($_FILES["image_file"]["name"], PATHINFO_EXTENSION);
        $new_image_name = $file_basename . '_' . date("Ymd_His") . '.' . $file_extension;
        $target_directory = "imgRental/";
        $target_path = $target_directory . $new_image_name;
        if (!move_uploaded_file($photo, $target_path)) {
          // header("Location:index.php?message=er");
        }
        $sql = "INSERT INTO voiture (marque, kilometrage, tarif, photo) VALUES (:marque, :kilometrage, :tarif, :photo)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':marque', $marque);
        $stmt->bindParam(':kilometrage', $kilometrage);
        $stmt->bindParam(':tarif', $tarif);
        $stmt->bindParam(':photo', $new_image_name);
        // Execute the query
        $stmt->execute();
        // Check for success
        if ($stmt->rowCount() > 0) {
          return true; // Insertion successful
        } else {
          return false; // Insertion failed
        }

      }


    }

    $dataInsert = new DataInsert($pdo);


    $RetriveData = $dataInsert->affiche();

    $CommandeData = $dataInsert->CommandeAffficher();
    // var_dump($CommandeData);
  


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $photoimg = $_FILES["image_file"]["tmp_name"];
      $marque = $_POST["marque"];
      $kilometrage = $_POST["kilometrage"];
      $tarif = $_POST["tarif"];
      // Assuming $dataInsert->insertItem() function expects these parameters
      if ($dataInsert->insertItem($marque, $kilometrage, $tarif, $photoimg)) {
        echo "Item inserted successfully!";
      } else {
        echo "Failed to insert item.";
      }

    }
    ?>
    <div class="container">
      <div class="links">
        <a href="?id=Dashboard" class="nav-link">Dashboard</a>
        <a href="?id=addCar" class="nav-link">addCar</a>
        <a href="?id=deleteCar" class="nav-link">deleteCar</a>
        <a href="?id=modify" class="nav-link">modify </a>

      </div>
      <div class="content">


        <?php
        $id = isset($_GET["id"]) ? $_GET["id"] : "Dashboard";
        ?>
        <?php

        if ($id === "Dashboard") {
          ?>

          <h1>
            Dashboard
          </h1>




          <div class="Vehicule_List">

            <div class="VehiculeModels">


              <div class="container mt-5">
                <h2>Car List</h2>
                <table class="table">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Image</th>
                      <th>Tarif</th>
                      <th>Marque</th>
                      <th>Kilometrage</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($CommandeData as $ComData) { ?>
                      <tr>
                        <td>
                          <?php echo $ComData['DropTime']; ?>

                          <?php echo $ComData['PickUpTime']; ?>
                        </td>
                        <td>
                          <?php echo $ComData['PickUpDate']; ?>
                        </td>
                        <td>
                          <?php echo $ComData['City']; ?>
                        </td>
                        <td>


                </div>
                </form>
                </td>
                </tr>
              <?php } ?>



            <?php } else if ($id === "addCar") { ?>
                <div class="container-form">
                  <h2>Formulaire de Voiture</h2>
                  <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                      <label for="marque" class="form-label">Marque</label>
                      <input type="text" class="form-control" id="marque" name="marque" required>
                    </div>

                    <div class="mb-3">
                      <label for="kilometrage" class="form-label">Kilométrage</label>
                      <input type="number" class="form-control" id="kilometrage" name="kilometrage" required>
                    </div>

                    <div class="mb-3">
                      <label for="tarif" class="form-label">Tarif</label>
                      <input type="number" class="form-control" id="tarif" name="tarif" required>
                    </div>

                    <div class="mb-3">
                      <label for="images" class="form-label">Photo</label>
                      <label for="images" class="drop-container">
                        <span class="drop-title">Déposez les fichiers ici</span>
                        ou
                        <input type="file" name="image_file" id="images" accept="image/*" required>
                      </label>
                    </div>

                    <button type="submit">Enregistrer</button>
                  </form>
                </div>
            <?php } else if ($id === "modify") { ?>
                  <!-- /***************************************************************     MODIFY     ***************************************** */ -->
                  <h1>welcome</h1>
            <?php } else { ?>
                  <!-- /***********v****************************************************  DELETE    ***************************************** */ -->

                  <div class="Vehicule_List">

                    <div class="VehiculeModels">


                      <div class="container mt-5">
                        <h2>Car List</h2>
                        <table class="table">
                          <thead>
                            <tr>
                              <th>ID</th>
                              <th>Image</th>
                              <th>Tarif</th>
                              <th>Marque</th>
                              <th>Kilometrage</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                          foreach ($RetriveData as $data) { ?>
                              <tr>
                                <td>
                              <?php echo $data['id']; ?>
                                </td>
                                <td> <img class="imgList" src="imgRental\<?php echo $data['photo'] ?>" alt=""></td>
                                <td>
                              <?php echo $data['tarif']; ?>
                                </td>
                                <td>
                              <?php echo $data['marque']; ?>
                                </td>
                                <td>
                              <?php echo $data['marque']; ?>
                                </td>
                                <td>
                                  <a href=' ' class='btn btn-warning'>Edit</a>
                                  <form method="GET">
                                    <!-- <button name="ElementToDelete" class="btn btn-danger deleteButton" data-id="<?php echo $data['id']; ?>">Delete Element</button>  -->

                                    <button class="btn btn-danger deleteButton" data-id="<?php echo $data['id']; ?>">Delete
                                      Element</button>

                                    <div id="afficheTesting">

                                    </div>
                                  </form>
                                </td>
                              </tr>
                        <?php } ?>


                          </tbody>
                        </table>
                      </div>






                    </div>
                  </div>
                  <!-- #region -->
                </div>

              </div>

        <?php }
  } ?>


      <!-- <script src="script.js" async></script>: -->






</body>
<style>
  .imgList {
    width: 120px;
    height: 120px;

  }
</style>

</html>