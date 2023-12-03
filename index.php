<?php if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
include("connection.php");
 
function isUserConnected() {
  return !empty($_SESSION['membre']) ? $_SESSION['membre'] : false;
}

 $data = json_encode(isUserConnected());
 

$userLoggedIn = isUserConnected();

// echo $userLoggedIn;

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form</title>
  <!-- Bootstrap CSS -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
  <link rel="stylesheet" href="Css/style.css">
  <link rel="stylesheet" href="Css/index.css">

</head>
<body>

  <div id="preloader">
 

</div>

  <img id="hero-bgImage" src="imgRental/hero-bgImage.png" alt="">
  <!-- <nav class="Nav_desktop"> -->
    <!-- <div>

      <img src="imgRental/logo.png" alt="">
    </div>


    <ul>
      <li> Home</li>
      <li>About</li>
      <li><a href="vehicleModels.php">Vehicle</a> </li>
      <li>Models</li>
      <li>Testimonials</li>
      <li>Our Team</li>
      <li> Contact</li>
    </ul>
 --> 

    <?php include("Navbar.php") ?>
 

  <section class="Hero-Section">
    <div class="container">
      <div class="Hero-Div">

        <div class="Hero-Div-Items">
          <h4>Plan your trip now</h4>
          <h1>Save <span> big </span>with our car rental</h1>
          <p>Rent the car of your dreams. Unbeatable prices, unlimited miles, flexible pick-up options and much more.
          </p>

          <div class="Hero_butttons">
            <a class="redBlock rentBlock" href="#BookCar">Book Ride <i class="fa-solid fa-circle-check"
                style="color: #ffffff;"></i></a>

            <a class="blackBlock" href="">Learn More <i class="fa-solid fa-chevron-right"
                style="color: #ffffff;"></i></a>
          </div>

        </div>

        <div>
          <img id="mainCar" src="imgRental/main-car.png" alt="">
        </div>
      </div>
    </div>

  </section>



  <section class="bookCar" >
    <div class="container" > 
      
      
      <div class="bookCarDiv" >
          <h2>Book a car</h2>


<form action="vehicleModels.php" method="post" id="BookCar">

        <div class="bookCarMain">

<div class="Form_item"> 
<label for=""> <i class="ti ti-car"></i>Sélectionnez votre location</label>
<input type="text" name="Location" placeholder="ENTER THE CITY">
</div>


 <div class="Form_item"> 
<label for=""> <i class="ti ti-car"></i> Pick-up *</label>
 <input type="date"   name="PickUp" id="PickUp" min="<?php echo date('Y-m-d')?>" format="yyyy-mm-dd" >
</div>

<div class="Form_item"> 
<!-- <label for=""> <i class="ti ti-car"></i> Time</label> -->

<select name="PickUpTime">
<?php
for ($hour = 0; $hour < 24; $hour++) {
    for ($minute = 0; $minute < 60; $minute += 30) {
        $time = sprintf("%02d:%02d", $hour, $minute);
        echo '<option  value="' . $time . '" data-key="' . $time . '">' . $time . '</option>';
    }
}
?></select>
 </div>

 <div class="Form_item">
    <label for=""> <i class="ti ti-car"></i>   Drop-of * </label>
    <input type="date" id="DropOf" name="DropOf" min="<?php if (!empty($_POST['PickUp'])){ echo $_POST['PickUp'];} ?>" format="yyyy-mm-dd">
</div>

<div class="Form_item">
<select  name="DropOfTime"> 
<?php
for ($hour = 0; $hour < 24; $hour++) {
    for ($minute = 0; $minute < 60; $minute += 30) {
        $time = sprintf("%02d:%02d", $hour, $minute);
        echo '<option  value="' . $time . '" data-key="' . $time . '">' . $time . '</option>';
    }
}
?>
</select>
</div> 


<div class="Form_item"> 
<button  type="submit" id="submitBtn" class="redBlock Form_book_btn" >search </button>
</div>
 
</div> 

</form>

</div>

  </div>

  </section>
 
<section class="plan">
    <div class="container "> 
  
    <div class="Plan_main_Div">

      <h3>Plan your trip now</h3>
      <h2>Quick & easy car rental</h2>
      
      
      <div class="plan_Flex_items"> 
        
        <div>
          <img src="imgRental/image_3.jpg" alt="">
     <h3>Select Car</h3>
     <p>We offers a big range of vehicles for all your driving needs. We have the perfect car to meet your needs</p>
    </div>
    
    <div>
      <img src="imgRental/image_4.jpg" alt="">
      <h3>Contact Operator</h3>
    <p>Our knowledgeable and friendly operators are always ready to help with any questions or concerns</p>
  </div>
  
  <div>
    <img src="imgRental/image_5.jpg" alt="">
    <h3>Let's Drive</h3>
    <p>Whether you're hitting the open road, we've got you covered with our wide range of cars</p>
  </div>
  

</div>

</div>
</div>    
  </section>




  <section class="save">
    <div class="container "> 
  
    <div class="Plan_main_Div">

    <h2>Save big with our cheap car rental!</h2>
  <p>Top Airports. Local Suppliers. <span>24/7</span> Support.</p>

</div>

</div>    
  </section>


  <section class="suv">
    <div class="container "> 
  
    <div class="Suv_main_Div"> 
    
    <img src="imgRental/truck.png" alt="">
    <div class="suv_Content"> 

<div class="SuvLeft" > 
<h4>Why Choose Us</h4> 
<h2>Best valued deals you will ever find</h2>
<p>Discover the best deals you'll ever find with our unbeatable offers. We're dedicated to providing you with the best value for your money, so you can enjoy top-quality services and products without breaking the bank. Our deals are designed to give you the ultimate renting experience, so don't miss out on your chance to save big.</p>
<a href="" class="redBlock">Find Details  <i class="fa-solid fa-chevron-right"
                style="color: #ffffff;"></i></a> 
</div>

<div class="SuvRight">
 

<div >
<img src="imgRental/image_8.jpg" alt="">
<div>
  <h4>Cross Country Drive</h4>
  <p>Take your driving experience to the next level with our top-notch vehicles for your cross-country adventures.</p>
</div>
</div>


<div>
<img src="imgRental/image_9.jpg" alt="">
<div>
  <h4>All Inclusive Pricing</h4>
  <p>Get everything you need in one convenient, transparent price with our all-inclusive pricing policy.</p>
</div>
</div>



<div>
<img src="imgRental/image_10.jpg" alt="">
<div>
  <h4>No Hidden Charges</h4>
  <p>Enjoy peace of mind with our no hidden charges policy. We believe in transparent and honest pricing.</p>
</div>
</div> 

</div>

 </div>


</div> 

</div>    
  </section>
 

  <section class="Faq">
    <div class="container "> 
  
    <div class="Faq_Div">

    
<div class="Faq_Header"> 
  <h5> FAQ</h5>
  <h2>Frequently Asked Questions </h2>
  <p>Frequently Asked Questions About the Car Rental Booking Process on Our Website: Answers to Common Concerns and Inquiries.</p>
</div>

<div class="faq_All_questions">
 
 
<div >
<p class="questions">1. What is special about comparing rental car deals?</p>
<p class="answer">Comparing rental car deals is important as it helps find the best deal that fits your budget and requirements, ensuring you get the most value for your money. By comparing various options, you can find deals that offer lower prices, additional services, or better car models. You can find car rental deals by researching online and comparing prices from different rental companies.</p>
</div>



<div>
<p  class="questions">2. How do I find the car rental deals? </p>
<p class="answer">You can find car rental deals by researching online and comparing prices from different rental companies. Websites such as Expedia, Kayak, and Travelocity allow you to compare prices and view available rental options. It is also recommended to sign up for email newsletters and follow rental car companies on social media to be informed of any special deals or promotions. </p>
</div>


<div>
<p  class="questions">3. How do I find such low rental car prices? </p>
<p class="answer"> Book in advance: Booking your rental car ahead of time can often result in lower prices. Compare prices from multiple companies: Use websites like Kayak, Expedia, or Travelocity to compare prices from multiple rental car companies. Look for discount codes and coupons: Search for discount codes and coupons that you can use to lower the rental price. Renting from an off-airport location can sometimes result in lower prices.</p>
</div>


</div>
 </div>
</div>    
  </section>

<footer>
<div class="container">


<div class="Footer_Div">

  
  <ul>
    
    
<li>CAR <span ><b>Rental</b></span></li>
<li>We offers a big range of vehicles for all your driving needs. We have the perfect car to meet your needs.</li>
<li> (123) -456-789</li>
<li>carrental@gmail.com</li>
</ul>



<ul> 
  <li><b>COMPANY</b></li>
  <li>New York</li>
  <li>Careers</li>
  <li>Mobile</li>
  <li>Blog </li> 
  <li>How we work </li>  
</ul>

 

<ul> 
  <li><b>WORKING HOURS</b></li>
  <li>Mon - Fri: 9:00AM - 9:00PM</li>
  <li> sat: 9:00AM - 19:00PM</li>
  <li>Sun: Closed</li> 
</ul>



<ul> 
  <li><b> SUBSCRIPTION</b></li> 
  <li> Subscribe your Email address for latest news & updates.</li>
  <li><input type="text" class="SubsInput " placeholder="ENTER YOUR EMAIL"></li> 
  <li><button type="submit " class="redBlock Subcription">Submit</button></li>
</ul>



</div>

</div>




</footer>






<!-- <nav class="navbar navbar-expand-lg navbar-light bg-dark">
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
             <a class="nav-link text-white" href="admin.php">admin</a>
           </li>
         

           <li class="nav-item">
             <a class="nav-link text-white" href="logout.php">LOGOUT</a>  
           </li>
         </ul>
       </div>
     </div>
     <p id="utilisateur">bienvenu <?php
     if (isset($_SESSION['pseudoData'])) {
       echo $_SESSION['pseudoData'];
     } ?> </p> 
</nav>
<img style="width: 100%; height:400px;" src="img/background.jpg" alt="">
<H1>Welcome to My site</H1>
<h1 id="affortable">AFFORDABLE AND LIKE NEW CARS</h1> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.3/dist/js/bootstrap.min.js"></script>
</body>
 
 

<script async>
 
// document.getElementById('submitBtn').addEventListener('click', function(event) {
      
//         event.preventDefault();
//    var isLoggedIn =
/*  <?php echo json_encode($userLoggedIn);?>*/
 

//    console.log(isLoggedIn)
//         if (!isLoggedIn) {
//           window.location.href = 'login.php';
//             console.log('User is not logged in');
//         } else {
//           window.location.href = 'vehicleModels.php';
        
//             console.log('User is logged in');
 
 
//         }
//     });


let questions = document.querySelectorAll(".questions"); 

let answer = document.querySelectorAll(".answer");


questions.forEach((q, index) => {
  q.addEventListener("click", () => { 

      answer.forEach((answers, i) => {
        if(index === i) 
        { 
          console.log(answer[i])
          answer[i].classList.toggle("displ");
          questions[i].classList.toggle("colorChange");
          
        }
        else{
  answer[i].classList.remove("displ"); 
  questions[i].classList.remove("colorChange");
 
} 
    });
  });
});



document.getElementById('PickUp').addEventListener('input', function() {
        var pickUpDate = new Date(this.value); 
        var dropOffDateInput = document.getElementById('DropOf');
        
        // Enable the drop-off date input
        dropOffDateInput.disabled = false;

        // Set the minimum date for drop-off to the selected pick-up date
        dropOffDateInput.min = formatDate(pickUpDate);
    });

    function formatDate(date) {
        var yyyy = date.getFullYear();
        var mm = String(date.getMonth() + 1).padStart(2, '0');
        var dd = String(date.getDate()).padStart(2, '0');
        return yyyy + '-' + mm + '-' + dd;
    }
 


</script>
 

<style> 
 
</style>

</html>


