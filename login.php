<?php
include("connection.php");
session_start(); // Start a new or resume the existing session

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate user input (e.g., check for empty fields)

    // Prepare and execute the SQL query
    $sql = "SELECT * FROM membre WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $emailDb = $user["email"];
        $mdpDb = $user["mdp"];
        $pseudoData = $user['pseudo'];
        if ($email == $emailDb && $password == $mdpDb) {
            // Authentication successful
            $_SESSION['user_id'] = $user['id']; // Store user ID in the session
            $_SESSION['email'] = $emailDb; // Store email in the session
            $_SESSION['pseudoData'] = $pseudoData; // Store email in the session
            header('location:index.php');       
    
        } else {
            // Authentication failed
            echo "Error: Incorrect email or password";
            $error ="Error: Incorrect email or password";

        }
    } else {
        // User not found
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
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">LOGIN</a>
    
          </li>
          <li class="nav-item">
            <a class="nav-link" href="signup.php">SIGNUP</a>
          </li>
          <li class="nav-item">
                <a class="nav-link" href="logout.php">logout</a>
              </li>
        </ul>
      </div>
    </div>
  </nav>




  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">
            <h3 class="text-center">Login</h3>
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