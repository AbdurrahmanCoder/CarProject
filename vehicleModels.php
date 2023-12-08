<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include("connection.php");

function UserLoggedIn()
{
    if (isset($_SESSION['pseudoData'])) {

        return $_SESSION['pseudoData'];
    }
}

 

include("vehicleGetData.php");

if (!empty($_GET['CarMarque']) && !empty($_GET['CarTarif']) && !empty($_GET['CarImg'])) {
    $_SESSION['OrderData'] = [
        'CarMarque' => $_GET['CarMarque'],
        'CarTarif' => $_GET['CarTarif'],
        'CarImg' => $_GET['CarImg']
    ];
} 

if (!empty($_GET)) {
    // if (isset($_GET['CarId'])) {
    $_SESSION['OrderData'] = [
        'CarMarque' => $_GET['CarMarque'],
        'CarTarif' => $_GET['CarTarif'],
        'CarImg' => $_GET['CarImg']
    ];
    // }
    if (isset($_GET['checkOut'])) {
        echo "dflklfk";
    }
}
if (isset($_SESSION['OrderData'])) {
    $CarMarque = $_SESSION['OrderData']['CarMarque'];
    $CarTarif = $_SESSION['OrderData']['CarTarif'];
    $CarImg = $_SESSION['OrderData']['CarImg'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    <title>Document</title>
    <link rel="stylesheet" href="Css/style.css">
    <link rel="stylesheet" href="Css/vehicleModels.css">


</head>

<body>
    <div class="header">
        <nav>
            <?php
            include("Navbar.php");
            ?>

            <div class="container ">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $_SESSION['car_rental_data'] = [
                        'Ses_Location' => $_POST["Location"],
                        'Ses_PickUp' => $_POST["PickUp"],
                        'ses_PickUpTime' => $_POST["PickUpTime"],
                        'ses_DropOf' => $_POST["DropOf"],
                        'ses_DropOfTime' => $_POST["DropOfTime"],
                    ];
                }
                if (isset($_SESSION["car_rental_data"])) {
                    $date1 = new DateTime($_SESSION['car_rental_data']['Ses_PickUp']);
                    $date2 = new DateTime($_SESSION['car_rental_data']['ses_DropOf']);
                    $interval = $date1->diff($date2);
                    $days = $interval->format('%a');
                    // echo "Number of days between the two dates: $days days";
                    if (!empty($_GET)) {
                        // if (isset($_GET['CarId'])) { 
                        $daysChange = $days == 0 ? 1 : $days;
                        $total = $daysChange * $CarTarif;

                        $_SESSION['OrderData'] = [
                            'total' => $total,
                            'days' => $days
                        ];
                    }
                }
                // }
                ?>
            </div>
        </nav>
        <?php if (isset($_SESSION['car_rental_data'])) {

            ?>
            <div class="container  ">

                <div class="mainContainer">

                    <div class="order">
                        <div class="order_First_child">
                            <span class="identifier"> 1</span>
                            <h3 class="order_h3">RENTAL LOCATION </h3>

                        </div>



                        <div class="OrderDivsContainer">


                            <div class="pickUp">
                                <p>pick up</p>
                                <?php echo $_SESSION['car_rental_data']['Ses_Location']; ?>
                                <p>
                                    <?php echo $_SESSION['car_rental_data']['Ses_PickUp']; ?>
                                </p>
                                <p>
                                    <?php echo $_SESSION['car_rental_data']['ses_PickUpTime']; ?>
                                </p>
                            </div>

                            <div class="return">
                                <p>return</p>
                                <?php echo $_SESSION['car_rental_data']['Ses_Location']; ?>
                                <p>
                                    <?php echo $_SESSION['car_rental_data']['ses_DropOf']; ?>
                                </p>
                                <p>
                                    <?php echo $_SESSION['car_rental_data']['ses_DropOfTime']; ?>
                                </p>
                            </div>
                        </div>


                    </div>

                    <div class="vehicule">
                        <div class="order_First_child">
                            <span class="identifier idenColorChange"> 2</span>
                            <h3>VEHICULE</h3>

                        </div>
                        <?php
                        if (!empty($CarMarque) && !empty($CarTarif)) { {
                                ?>
                                <p>
                                    <?php  echo " <h5><b> selected Vehicule : </b> </h5>" . $CarMarque; ?>
                                </p>
                                <p>
                                    <?php echo "<h5><b> Per day Tarif: </b> </h5>" .$CarTarif ."€" ;?>
                                </p>

                            <?php }
                        } else { ?>
                            <p>you have not selected the car </p>
                        <?php } ?>
                        <?php if (isset($_SESSION['OrderData'])) { ?>
                            <p>

                            </p>
                        <?php } ?>
                    </div>




                </div>




            </div>
        </div>




        </div>

    <?php } ?>


    </div>

    <!-- ///checkout div -->
    <div class="checkout_main">

        <div class="checkout_Div">

            <?php if (isset($_GET['CarId'])) { ?>
                <div class="checkout">
                    <div class="container tocheck">
                        <a class="redBlock Form_book_btn checkout_btn"
                            href="Checkout.php?CarImages=<?php echo $CarImg ?>&CarMarqueSelected=<?php echo $CarMarque ?>   ">Go
                            to review & checkout</a>

                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <!-- ///checkout div -->


    <div class="Vehicule_List">


        <div class="VehiculeModels">
            <div class="container">
                <?php

                foreach ($results as $data) { ?>
                    <div class="List_vehicule_Disponible">

                        <div>
                            <img src="imgRental\<?php echo $data['photo'] ?>" alt="">
                        </div>

                        <div>
                            <h2>
                                <?php echo $data['marque']; ?>
                            </h2>
                            <p><i class="fa-solid fa-check"></i>Free first charge</p>
                            <p><i class="fa-solid fa-check"></i>Basic protection included</p>
                            <p><i class="fa-solid fa-check"></i>Free cancellation up to 48h before pick up</p>
                        </div>


                        <div>
                            <!-- <p>FROM</p> -->
                            <p class="tarif_vehicule">
                                <?php echo $data['tarif']; ?> <span> €/day </span>
                            </p>
                            <p> TOTAL €
                                <?php
                                if (isset($_SESSION['OrderData']['total'])) {
                                    echo $_SESSION['OrderData']['total'];

                                } else {
                                    echo 0;
                                } ?>
                            </p>



                            <?php if (UserLoggedIn()) { ?>
                                <a class="bookButton"
                                    href="?CarId=<?php echo $data['id']; ?>&CarMarque=<?php echo $data['marque']; ?>&CarTarif=<?php echo $data['tarif']; ?>&CarImg=<?php echo $data['photo']; ?>">
                                    Book Ride</a>



                            <?php } else { ?>
                                <a class="bookButton" href="login.php"> Book Ride</a>
                            <?php } ?>


                        </div>



                    </div>
                    <?php
                }

                ?>

            </div>
        </div>


</body>

<script>




</script>


</html>

<!-- 
<a class="bookButton"
                                href=
        "?CarId=<?php echo $data['id']; ?>&CarMarque=<?php echo $data['marque']; ?>&CarTarif=<?php echo $data['tarif']; ?>&CarImg=<?php echo $data['photo']; ?>">
                                 
                                
                                
                                Book
                                Ride</a> -->