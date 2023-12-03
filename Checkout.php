<?php
include("Navbar.php");
include("vehicleGetData.php");

 
class Checkout extends  DataRetrieve
{
       public function __construct($pdo)
    {
        parent::__construct($pdo); 
        // $this->db = $pdo;
    }

    public function CheckoutDatas($id,$city, $pickUpDate, $pickUpTime, $dropDate, $dropTime, $checked)
{
 
    $sql = "INSERT INTO `carorder`( `City`, `PickUpDate`, `PickUpTime`, `DropDate`, `DropTime`, `Checked`,id_Second) VALUES (:city,:PickUpDate,:PickUpTime,:DropDate,:DropTime,:Checked,:id_Second)";
    $Connect = $this->db->prepare($sql); 
    $Connect->bindParam(':city', $city);
    $Connect->bindParam(':PickUpDate', $pickUpDate);
    $Connect->bindParam(':PickUpTime', $pickUpTime);
    $Connect->bindParam(':DropDate', $dropDate);
    $Connect->bindParam(':DropTime', $dropTime);
    $Connect->bindParam(':Checked', $checked);
    $Connect->bindParam(':id_Second', $id);
    $Connect->execute();

} 
}
$Checkout = new Checkout($pdo); 
$id = $_SESSION['user_id']; 
$checked = 1;
$city = $_SESSION['car_rental_data']['Ses_Location'];
$pickUpDate = $_SESSION['car_rental_data']['Ses_PickUp'];
$pickUpTime = $_SESSION['car_rental_data']['ses_PickUpTime'];
$dropDate =  $_SESSION['car_rental_data']['ses_DropOf'];
$dropTime = $_SESSION['car_rental_data']['ses_DropOfTime'];   
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['payed']) && $_POST['payed'] === 'true') {
        $Checkout->CheckoutDatas($id,$city, $pickUpDate, $pickUpTime, $dropDate, $dropTime, $checked); 
 
    }  
}

if(!empty($_GET))
{ 
    if (isset($_GET['CarImages'])) { 
        
        $CarImages = $_GET['CarImages']; 
        
    }
 
    
} 
?>
<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['payed']) && $_POST['payed'] === 'true') {

?>

<div class="container">

    <h1 class="succes containerTotal">🎉 Payment Successful 🎉</h1>
    
</div>
 

<?php }} else {?>




        <div class="reviewMain">

    <div class="container ">
        <div class="review">
            <h1>Review and proceed to booking </h1>

            <div class="total">
                <p>TOTAL </p> 
                <h3>€
                    <?php echo $_SESSION['OrderData']['total']; ?>
                </h3>
            </div>

        </div>
    </div>
</div>

<section class="Section_Review">

    <div class="container containerReview">
        <!-- <h2>review</h2>  -->

        <div class="vehicleDiv">

       <div class="vehicleDiv_descrip">

       <div class="vehicleImage"  >
            <h4>vehicle</h4>
            <img src="imgRental/<?php echo  $CarImages ?>" alt="" width="200px">
            <h4>MG MG4 ELECTRIC </h4>
        </div>
       

        <h3>Pick up & return  </h3>

        <div class="vehicleImage"  >
        <h5>pick up</h5>
        <h3> <?php echo $_SESSION['car_rental_data']['Ses_Location']; ?></h3>
         <p>   <?php echo $_SESSION['car_rental_data']['Ses_PickUp']; ?>     <?php echo $_SESSION['car_rental_data']['ses_PickUpTime']; ?>  </p>      
         <hr> 
        <h5>return</h5>
        <h3>  <?php echo $_SESSION['car_rental_data']['Ses_Location']; ?> </h3>
        <p>   <?php echo $_SESSION['car_rental_data']['ses_DropOf']; ?>     <?php echo $_SESSION['car_rental_data']['ses_DropOfTime']; ?>  </p>       
        </div>  
        </div>

           <div class="Rate">
        
<div> 
<p>Basic rate (for 37 days) </p>
<p>Included </p>
</div>


<div>
<p>Mileage 4625 km </p>
<p>Included</p>

</div>
<div>
<p>Licenses &amp; Fees </p>
<p>Included</p>
</div>
<div>
<p>High Season Surcharge </p>
<p>Included</p>
</div>
<div>
<p>FLEETSC </p>
<p>Included</p>
</div>
<div>
<p>Environmental contribution </p>
<p>Included</p>

</div>
<div>
<p>Railway Station Surcharge </p>
<p>Included</p>
</div>
<div>
<p>VAT  <span class="tax"> See full T&amp;Cs </span> </p>
<p>Included</p>

</div>      

 

    </div>

        </div>  
    </div>
</section>












<section class="Section_Total">

    <div class="container containerTotal">
        <div>

            <h1>TOTAL <span>
To pay online</span>  </h1>
            <h3>€   <?php echo $_SESSION['OrderData']['total']; ?>  </h3>
        </div>
    </div>
</section>



<section class="Section_Total">

    <div class="container  ContainerFooter">


    <form action="" method="post">
    <!-- Add any other form fields or data you need to submit -->
    <input type="hidden" name="payed" value="true">
    <button type="submit" class="pay redBlock Form_book_btn">PAY</button>
</form>
    </div>
</section>


<?php  } ?>
 

<style>
 
.succes
{padding: 20px;
text-align: center;
margin-top: 20px;
}
.pay{
    font-size: 19px;
    width: 20%;
    /* height: 3rem;
    border: none;
    background-color: rgba(255, 83, 48); */
}

.ContainerFooter{
    height: 10rem; 
}
 
 .reviewMain {
        background-color: #ffff;
    }

    .review {

        display: flex;
        justify-content: space-between;
        /* width: 80%; */
        margin-bottom: 4rem;
    }


    .review h1 {
        align-self: center;
        font-size: 36px;

    }

    .vehicleDiv {
        padding: 16px;
    }

    .total h3 {
        font-size: 36px;
    }


    .total p {
        position: relative;

        text-align: end;
        font-size: 20px;
    }

    h3 {

        font-size: 36px;

    }

    .vehicleDiv {

        /* border: 1px Solid #bfbfbf ; */
      position: relative;
        display: flex;
        justify-content: space-between;
    } 
    .vehicleDiv_descrip{
        
        width: 40%;
    }

    .vehicleImage{

        background-color: #f7f7f7;
    }

    .Section_Review {
        border-image-slice: 1;
        /* Ensure the entire border is used for the gradient */
        /* Add padding to prevent content from touching the border */
        border-image: linear-gradient(to top, #fafafa, #fbfbfb, #fcfcfc, #fdfdfd);
        /* Define the linear gradient */

    } 
    .containerReview {
        background-color: white;
        border: 1px solid #bfbfbf;
        border-radius: 5px;
    }

    .Rate{
     
        width: 100%;
            margin: 0 auto;
        width: 39%;
        margin-top: 5%;
        right: 0;
        position: absolute;
        }
    .Rate div {
        justify-content: space-between; 
        display: flex; 
        padding: 2px;

    }

    .tax{

    color: #090;
    font-size: 11px;
    font-weight: 700;
}

.Section_Total{
    margin-top: 5rem;;
     
    }
    
    
    .containerTotal {
       
        /* border: 1px solid #090; */
        box-shadow:0 0 0 1px #090, 0 5px 30px rgba(0,153,0,.3);
        border-radius: 5px;
    }
    
    .containerTotal div {
     display: flex; 
        justify-content: space-between;
        align-items: center;
        padding:  20px 0;
    }

</style>