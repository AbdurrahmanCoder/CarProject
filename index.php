 <?php
  include("connection.php");
  session_start();
  if (isset($_SESSION['user_id'])) {



    $pseudoDta  = $_SESSION['pseudoData'];


    // $values =$_SESSION['email'];
    // echo  $values ;
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

 </head>

 <body>
   <nav class="navbar navbar-expand-lg navbar-light bg-dark">
     <div class="container-fluid">

       <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
       </button>
       <div class="collapse navbar-collapse" id="navbarNav">
         <ul class="navbar-nav">
           <li class="nav-item">
             <a class="nav-link active text-white" aria-current="page" href="#">Home</a>
           </li>
           <li class="nav-item">
             <a class="nav-link text-white" href="login.php">LOGIN</a>
           </li>
           <li class="nav-item">
             <a class="nav-link text-white" href="signup.php">SIGNUP</a>
           </li>
           <li class="nav-item">
           </li>


           <li class="nav-item">
             <a class="nav-link text-white" href="logout.php">LOGOUT</a>
           </li>
         </ul>
       </div>
     </div>
     <p id="utilisateur">bienvenu <?php
                                  if (isset($_SESSION['pseudoData'])) {
                                    echo  $_SESSION['pseudoData'];
                                  } ?> </p> 
</nav>
<img style="width: 100%; height:400px;" src="img/background.jpg" alt="">
<H1>Welcome to My site</H1>
<h1 id="affortable">AFFORDABLE AND LIKE NEW CARS</h1>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.3/dist/js/bootstrap.min.js"></script>
 </body>



 <style>
   @import url('https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@600&family=Caveat+Brush&family=Cormorant+Garamond:wght@300;700&family=Fraunces:wght@900&family=Montserrat:ital,wght@0,700;0,800;1,400;1,700;1,800&family=Overpass:ital,wght@0,100;0,500;1,500&family=Srisakdi&display=swap');


   #utilisateur {
     width: 214px;
     color: grey;
     padding-top: 12px;
   }

   .nav-link {
     color: white;
   }

   #affortable{
/* font-family: "BeVietnamPro" ; */
   }
 </style>

 </html>