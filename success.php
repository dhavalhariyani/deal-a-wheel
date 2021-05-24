<?php
    session_start();
    
    
    include_once("db_conn.php");
    
    include_once("mail.php");
    
    $bid = $_SESSION['booking_id'];
    
    
    
    $qr = "SELECT * FROM bookings WHERE bid = '$bid' ";
    $quariy = $db->query($qr);
    while ( $row = mysqli_fetch_array($quariy) ) :
      $uid = $row['uid'];
      $cid = $row['cid'];
      $city = $row['city'];
      $booking_from = $row['booking_from'];
      $booking_to = $row['booking_to'];
      $total_hours = $row['total_hours'];
      $amount = $row['amount'];
    endwhile;
    
    $qr = "SELECT * FROM cars WHERE cid = '$cid' ";
    $quariy = $db->query($qr);
    while ( $row = mysqli_fetch_array($quariy) ) :
      $car_name = $row['car_name'];
      $car_brand = $row['car_brand'];
      $fuel_type = $row['fuel_type'];
      $transmission_type = $row['transmission_type'];
      $seating_capacity = $row['seating_capacity'];
      $luggage_capacity = $row['luggage_capacity'];
      $price_per_hr = $row['price_per_hr'];
      $car_img = $row['car_img'];
    endwhile;
    
    $qr = "SELECT * FROM users WHERE uid = '$uid' ";
    $quariy = $db->query($qr);
    while ( $row = mysqli_fetch_array($quariy) ) :
      $user_name = $row['user_name'];
      $user_email = $row['user_email'];
      $user_number = $row['user_number'];
    endwhile;
    
    
    
    
    
    
    
    
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <script src="https://code.jquery.com/jquery-2.x-git.min.js"></script>
        <script src="http://eray.info/demo/html-to-jpeg-php/js/html2canvas.js"></script>
        <style type="text/css">
            @media print {
            div.header {
            display:none;
            }
            }
            span{
            background-color: #e7e6e1;
            margin-right: 1%;
            font-size: 18px;
            font-weight: bold;
            }
            input{
            width:100%;  border:1px solid #CCC;  background:#FFF;  margin:0 0 5px;  padding:10px;
            }
            * {
            box-sizing: border-box;
            }
            .carcard {
            background-color: #eee;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            margin: 0.8%;
            text-align: center;
            float: left;
            padding: 8px;
            border-radius: 10px;
            max-width: 450px;
            }
            .detailcard{
            background-color: #eee;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            margin: 0.8%;
            text-align: center;
            float: left;
            padding: 8px;
            border-radius: 10px;
            width: 500px;
            }
            .card2 {
            background-color: #eee;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            margin: 0.8%;
            text-align: center;
            float: left;
            padding: 8px;
            border-radius: 10px;
            max-width: 100%;
            }
            .cardContainer:after {
            content: "";
            display: table;
            clear: both;
            }
            @media screen and (max-width: 600px) {
            .card {
            width: 100%;
            }
            }
            div{
            background-color: transparent;
            }
            .title {
            color: grey;
            font-size: 18px;
            }
            section{
            margin: 1.5%;
            }
            button {
            border: none;
            outline: 0;
            display: inline-block;
            padding: 8px;
            color: white;
            background-color: #000;
            text-align: center;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
            }
            a {
            text-decoration: none;
            font-size: 22px;
            color: black;
            }
            button:hover, a:hover {
            opacity: 0.7;
            }
        </style>
        <title>Booking Successfull!</title>
    </head>
    <body>
        <?php
            include("header.php");
            ?>
        <br>
        <section style="text-align: center;">
            <div style="margin: 1rem; ">
            <section>
                <h3>Thank You For Using Our Services !</h3>
                <br>
                <h2>This Is Your Booking Details!</h2>
            </section>
            <?php
                ?>
            <section style="background-color: #eee;">
                <div style="padding:1%;">
                    <div class="row">
                        <div class="two-column">
                            <div class="cardContainer">
                                <div class="carcard">
                                    <img src="<?php echo 'admin/images/'.$car_img?>" style="width:75%;">
                                    <h2><?php echo $car_brand;?></h2>
                                    <h1><?php echo $car_name;?></h1>
                                    <h4>
                                        Fuel Type : <?php echo $fuel_type;?><br>
                                        Transmission Type : <?php echo $transmission_type;?><br>
                                        Seating Capacity : <?php echo $seating_capacity;?><br>
                                        Luggage Capacity : <?php echo $luggage_capacity;?><br>
                                        City: <?php echo $city; ?><br>
                                        Booking From: <?php echo $booking_from; ?><br>
                                        To: <?php echo $booking_to; ?><br>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="two-column" >
                            <div class="cardContainer" >
                                <div class="detailcard">
                                    <h4 >
                                        <table style="  font-size:13px; text-align: left;" >
                                            <td style="font-weight: bold;">Customer Name&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                            <td>: &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $user_name; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: bold;">Customer E-mail&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                <td>: &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $user_email;?></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: bold;">Customer Number&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                <td>: &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $user_number?><br></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: bold;">Total Hours&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                <td>: &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $total_hours; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: bold;">Price Per Hour&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                <td>: &nbsp;&nbsp;&nbsp;&nbsp;₹<?php echo $price_per_hr;?></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: bold;">Total Amount&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                <td>: &nbsp;&nbsp;&nbsp;&nbsp;₹<?php echo $amount?><br></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: bold;">Extra kms charge&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                <td>: &nbsp;&nbsp;&nbsp;&nbsp;₹9/km</td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: bold;">Fuel&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                <td>: &nbsp;&nbsp;&nbsp;&nbsp;Excluded</td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: bold;">All Other Taxes&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                <td>: &nbsp;&nbsp;&nbsp;&nbsp;To be paid by you</td>
                                            </tr>
                                        </table>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
            <div class="cardContainer">
            <div class="card2" >
            <h3>
            <span class="titleHeadingSpan">IMPORTANT POINTS TO REMEMBER</span>
            </h3><br>
            <table>
            <tbody>
            <tr>
            <td>CHANGE IN PRICING PLAN:</td>
            <td>The pricing plan (10 kms/hr, without fuel) cannot be changed after the booking is made</td>
            </tr>
            <tr>
            <td style="min-width: 30vw;">FUEL:</td>
            <td>In case you are returning the car at a lower fuel level than what was received, we will charge a flat Rs 500 refuelling service charge + actual fuel cost to get the tank to the same level as what was received</td>
            </tr>
            <tr>
            <td>TOLLS, PARKING, INTER-STATE TAXES:</td>
            <td>To be paid by you.</td>
            </tr>
            <tr>
            <td>ID VERIFICATION:</td>
            <td> Please keep your original Driving License handy. While delivering the car to you, our executive will verify your original Driving License and ID proof (same as the ones whose details were provided while making the booking). This verification is mandatory. In the unfortunate case where you cannot show these documents, we will not be able to handover the car to you, and it will be treated as a late cancellation (100% of the fare would be payable). Driving license printed on A4 sheet of paper (original or otherwise) will not be considered as a valid document.</td>
            </tr>
            <tr>
            <td>PRE-HANDOVER INSPECTION:</td>
            <td>Please inspect the car (including the fuel gauge and odometer) thoroughly before approving the checklist.</td>
            </tr>
            </tbody>
            </table>
            </div>
            </div>
            </div>
        </section>
    </body>
    <footer>  <?php
        include("footer.php");
        ?></footer>
</html>