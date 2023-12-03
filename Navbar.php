<?php 
// include("ToCheck.php");
// session_start(); // Start a new or resume the existing session
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
include("connection.php");
function isConnected(){
    return !empty($_SESSION['membre'])? $_SESSION['membre']:false;
}
function isAdmin(){
 
    if(isConnected() && $_SESSION['membre']['statut'] == 1){ 
        return $_SESSION['membre']; 
    }
}  
function UserLogged(){ 
  if (isset($_SESSION['pseudoData'])) {
    // echo $_SESSION['pseudoData']; 
    // var_dump( $_SESSION['membre']);
    // echo $_SESSION['membre']; 
    return $_SESSION['pseudoData'];
    }  
}
// echo  UserLogged();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
  <link rel="stylesheet" href="Css/style.css">
</head>
<body> 
  <nav class="Nav_desktop">
    <div>

      <img src="imgRental/logo.png" alt="">
    </div>


    <ul>
      <li> <a href="index.php">Home</a> </li>
      <li><a href="about.php">About</a></li>
      <li><a href="vehicleModels.php">Vehicle Models</a> </li>
      <!-- <li>Models</li> -->
      <li>Testimonials</li>
      <li>Our Team</li>
      <li> Contact</li>
    <!-- <a href="logout.php ">click me </a> -->
       <li> <?php if(isAdmin()): ?> 
         <a href="adminLogin.php">Admin Login</a> 
            <?php endif; ?>  
  </a></li>
    </ul>
    <div class="LinksTOsignin">
 
 
        <?php if(UserLogged()){  ?> 
          <?php     echo $_SESSION['pseudoData'] ."<i class='fa-solid fa-angle-down downarrow'>"."</i>"  ; ?>
          <?php }else{  ?>  
<a href="login.php">login</a>

    <?php   }   ?> 


 
  <div class="userSession"> 
    <a href="logout.php "> logout   </a>
  </div>
 

  <?php if(!UserLogged()){  ?> 
    <a class='Register redBlock' href="signup.php"> Register </a>
  
      <?php }; ?>   

    </div>

  </nav> 
</body> 

<style>
  .downarrow{
    color:red;
  }

.userSession{
  display: none;
}

.userSession-show
{
  display: flex;
  flex-direction: column;
}


@media screen and (max-width: 986px) {
  .Nav_desktop ul {
    display: none;
  }

} 


</style>
<script async>
    let angledown = document.querySelector(".downarrow");
    let userSession = document.querySelector(".userSession");

    if (angledown !== null) {
      angledown.addEventListener("click", showDropdown);

      function showDropdown() {
        userSession.classList.toggle("userSession");
      }
    }
  </script>

 





</html>

