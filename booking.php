<?php

session_start();

$f = 0;

include_once("db_conn.php");


$cid = $_POST['cid'];
$amount = $_POST['amount'];
$d1 = $_POST['d1'];
$d2 = $_POST['d2'];
$city = $_POST['city'];
$hours = $_POST['hours'];

$qr = "SELECT * FROM cars WHERE cid = '$cid' ";

if (isset($_SESSION["id"]))
{
  $tid = $_SESSION['id'];

  $qr1t = "SELECT * FROM users WHERE uid = '$tid' ";
  $qr1 = $db->query($qr1t);

  while ( $row = mysqli_fetch_array($qr1) ) :
    $username = $row["user_name"];
    $useremail = $row["user_email"];
    $usernumber = $row["user_number"];
  endwhile;
}




$msg = "";



?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="stylesheet" type="text/css" href="css/main.css">

        <style type="text/css">

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
          
          .card {
            background-color: #eee;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            margin: 0.8%;
            text-align: center;
            float: left;
            padding: 8px;
            border-radius: 10px;
            max-width: 450px;

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

    <title>Car Booking</title>
  </head>
  <body>

<?php
include("header.php");
?>


<section style="background-color: #eee;">
<div style="padding:1%;">


  
  
<?php
$quariy = $db->query($qr);



while ( $row = mysqli_fetch_array($quariy) ) :
$f = 1;
?>


<div class="row">
    
    <div class="three-column">
        <div class="cardContainer">
          <div class="card">
            <img src="<?php echo 'admin/images/'.$row['car_img']?>" style="width:75%;">
            
            <h2><?php echo $row['car_brand']?></h2>
            <h1><?php echo $row['car_name']?></h1>
            <h4>
              Fuel Type : <?php echo $row['fuel_type']?><br>
              Transmission Type : <?php echo $row['transmission_type']?><br>
              Seating Capacity : <?php echo $row['seating_capacity']?><br>
              Luggage Capacity : <?php echo $row['luggage_capacity']?><br>
              City: <?php echo $city; ?><br>
              Booking From: <?php echo $d1; ?><br>
              To: <?php echo $d2; ?><br>
            </h4>
           </div>
        </div>
    </div>

    <div class="three-column">
         <div class="cardContainer">
              <div class="card">  
                 <?php

                  if (!isset($_SESSION["id"])) {
                     echo "<h3>Enter Your Details!</h3>";}
                     else
                      echo "<h3>Your Details!</h3>";
                  ?>

                

                <h4></h4>
                <form action="verification.php" method="POST"> 
                  <?php

                  if (!isset($_SESSION["id"])) {

                  ?>
                  
                  <input name="uname" placeholder="Your name" type="text" required autofocus>
                  <input name="uemail" placeholder="Your Email Address" type="email" required>
                  <input name="uphone" placeholder="Your Phone Number" type="tel" required>
                  <input name="upass" placeholder="Create A Password" type="password" required>

                  <?php
                }
                else{

                        echo "

                        <table>
                          <tr>
                            <td style='font-weight: bold; text-align: left;'>Name&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td>:&nbsp;&nbsp;&nbsp;&nbsp;$username</td>
                          </tr>
                          <tr>
                            <td style='font-weight: bold; text-align: left;'>Email&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td>:&nbsp;&nbsp;&nbsp;&nbsp;$useremail</td>
                          </tr>
                          <tr>
                            <td style='font-weight: bold; text-align: left;'>Number&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td>:&nbsp;&nbsp;&nbsp;&nbsp;$usernumber</td>
                          </tr>
                        </table>


                        ";

                }
                ?>

                  <input type="hidden" name="cid" value="<?php echo $row['cid'] ?>" />
                  <input type="hidden" name="amount" value="<?php echo ceil($hours * $row['price_per_hr'])?>" />
                  <input type="hidden" name="d1" value="<?php echo $d1 ?>" />
                  <input type="hidden" name="d2" value="<?php echo $d2 ?>" />
                  <input type="hidden" name="hours" value="<?php echo $hours ?>" />
                  <input type="hidden" name="city" value="<?php echo $city ?>" />

        
                    <button name="submit" type="submit" id="contact-submit">Submit</button>
                  </form>
            </div>
          </div>
    </div>

     <div class="three-column" >
      <div class="cardContainer" >
      <div class="card">
        <h4 >
          <table style="  font-size:13px;" >
            <tr>
              <td style="font-weight: bold; text-align: left;">Total Hours&nbsp;&nbsp;&nbsp;&nbsp;</td>
              <td>: &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $hours ?></td>
            </tr>
            <tr>
              <td style="font-weight: bold; text-align: left;">Price Per Hour&nbsp;&nbsp;&nbsp;&nbsp;</td>
              <td>: &nbsp;&nbsp;&nbsp;&nbsp;₹<?php echo $row['price_per_hr']?></td>
            </tr>
            <tr>
              <td style="font-weight: bold; text-align: left;">Total Amount&nbsp;&nbsp;&nbsp;&nbsp;</td>
              <td>: &nbsp;&nbsp;&nbsp;&nbsp;₹<?php echo $amount?><br></td>
            </tr>            
            <tr>
              <td style="font-weight: bold; text-align: left;">Extra kms charge&nbsp;&nbsp;&nbsp;&nbsp;</td>
              <td>: &nbsp;&nbsp;&nbsp;&nbsp;₹9/km</td>
            </tr>
            <tr>
              <td style="font-weight: bold; text-align: left;">Fuel&nbsp;&nbsp;&nbsp;&nbsp;</td>
              <td>: &nbsp;&nbsp;&nbsp;&nbsp;Excluded</td>
            </tr>
            <tr>
              <td style="font-weight: bold; text-align: left;">All Other Taxes&nbsp;&nbsp;&nbsp;&nbsp;</td>
              <td>: &nbsp;&nbsp;&nbsp;&nbsp;To be paid by you</td>
            </tr>
          </table>

        </h4>
      </div>
     </div>
    </div>
</div>

<?php
endwhile;
?>

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
</body>

</html>

