<?php
include("connection.php");
session_start(); // Start a new or resume the existing session


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
   
    $sql = "SELECT * FROM membre WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC); 
    if ($user) {
        $emailDb = $user["email"];
        $mdpDb = $user["mdp"];
        $pseudoData = $user['pseudo'];
        $statut = $user['statut'];
 
        if ($email == $emailDb && password_verify($password,$mdpDb)) {
            // Authentication successful
            $_SESSION['user_id'] = $user['id']; 
            $_SESSION['email'] = $emailDb;  
            $_SESSION['membre'] = $user;
            $_SESSION['pseudoData'] = $pseudoData;  
            header('location:index.php');         
        }   

        
        else {
            // Authentication failed
            echo "Error: Incorrect email or password";
            $error ="Error: Incorrect email or password";

        }
    } else {
        // User not foundx²
        echo "Error: User not found";
    }
}
?> 

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <style>
    .card-header {
      background-color: #007bff;
    }

    .card-header>h3 {

      color: white;
    }

    .loginColor{
      background-color: red;
    }
  </style>
</head>

<body>
 
<?php

include("Navbar.php");
?> 
  </nav>
 
  <div class="container mt-5  " >
    <div class="row justify-content-center  ">
      <div class="col-md-4 ">
        <div class="card  " >
          <div class="card-header  ">
            <h3 class="text-center loginColor" >Login</h3>
          </div>
          <div class="card-body">
            <form action="login.php" method="post">
              <div class="mb-3">
                <label for="username" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label> 
                <input type="password" class="form-control" id="password" name="password" required>
              </div>
              <button type="submit" class="btn btn-primary w-100">Login  
              </button>
            </form>
          </div>
        </div>
      </div>
    </div> 
  </div>

  <!-- Bootstrap JS (Optional) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.3/dist/js/bootstrap.min.js"></script>
</body>

</html>