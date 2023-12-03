<?php
include("connection.php");
?>

<?php
$value = false;
$smts = $pdo->prepare("SELECT email FROM  membre");
$smts->execute();
$results = $smts->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $emailToCheck = $_POST['email'];
    $exists = false;
    $mdps =  $_POST['mdp'];

    foreach ($results as $record) {
        if ($record['email'] === $emailToCheck) {
            $exists = true;
            break; // Stop looping once found
        }
    }
?>
<?php

    if ($exists) {
        echo "Email exists in the array.";
    } else {

        if (isset($_POST['pseudo']) && !empty($_POST['pseudo'])) {
            // Proceed with the database insertion
            try {

                $mdpencrpt = password_hash($mdps, PASSWORD_BCRYPT);
                $sql = "INSERT INTO membre (pseudo, mdp, nom, prenom, email, telephone) VALUES (:pseudo, :mdp, :nom, :prenom, :email, :telephone)";
                $stmt = $pdo->prepare($sql);
                // Assuming you are getting these values from a form using POST method, you should use $_POST instead of $_GET 
                $stmt->bindParam(':pseudo', $_POST['pseudo']);
                $stmt->bindParam(':mdp', $mdpencrpt);
                $stmt->bindParam(':nom', $_POST['nom']);
                $stmt->bindParam(':prenom', $_POST['prenom']);
                $stmt->bindParam(':email', $_POST['email']);
                $stmt->bindParam(':telephone', $_POST['telephone']);
                $stmt->execute();
                $value = true;
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        } else {
            echo "Pseudo field is empty.";
        }
    }
}
?>



 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="Css/style.css">
    
    
    <style>
        /* Custom styles for the form */
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            border: 1px solid #dcdcdc;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: white;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }

        .card-body {
            padding: 20px;
        }

        .form-label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 10px;
            margin-top: 10px;
            color: white;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        /* Custom styles for the navigation bar */
        .navbar {
            background-color: #3498db;
            /* Custom background color */
            padding: 10px 0;
            /* Add padding to top and bottom */
        }

        .navbar-brand {
            color: #fff;
            /* Custom text color */
        }

        .navbar-toggler-icon {
            background-color: #fff;
            /* Custom color for the hamburger icon */
        }

        .navbar-nav {
            justify-content: space-around;
            /* Center the navigation links */
        }

        .nav-link {
            color: #fff;
            /* Custom text color for links */
        }
    </style>
</head>

<body> 


    <?php include 'Navbar.php' ?>

    </nav>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Registration Form</h3>
                    </div>
                    <div class="card-body">
                        <form action="?signup.php" method="post">
                            <div class="mb-3 row">
                                <label for="username" class="col-sm-3 col-form-label">pseudo</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="pseudo" name="pseudo" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="password" class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="password" name="mdp" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="firstName" class="col-sm-3 col-form-label">First Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="firstName" name="nom" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="lastName" class="col-sm-3 col-form-label">Last Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="lastName" name="prenom" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="email" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                                <div class="col-sm-9">
                                    <input type="tel" class="form-control" id="phone" name="telephone" required>
                                </div>
                            </div>


                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Register</button>
                        <?php if ($value) {  ?>
                            <h3 style="margin-top: 18px;"> Please click the below to login </h3>
                            <a href="login.php" class="btn btn-primary">login</a>

                        <?php  } ?>

                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.3/dist/js/bootstrap.min.js"></script>
</body>

</html>