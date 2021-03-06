<?php

session_start();

$f = 0;


if(!isset($_POST["city"])) {

  header("Location:index.html");
            
}
include_once("admin/db_conn.php");

$d1= $_POST['pickup_date'];
$d2= $_POST['return_date'];

$city = $_POST['city'];

$fuel_type = $_POST['fuel_type'];
$transmission_type = $_POST['transmission_type'];
$seats = $_POST['seats'];

$seconds = strtotime($d2) - strtotime($d1);
$hours = $seconds / 60 / 60;


$qr = "SELECT * FROM cars WHERE fuel_type = '$fuel_type' AND transmission_type = '$transmission_type' AND seating_capacity = '$seats' ";





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


* {
      box-sizing: border-box;
   }
          
          .card {
            background-color: #eee;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width: 300px;
            margin: 1%;
            text-align: center;
            float: left;
            width: calc(25% - 20px);
            padding: 10px;
            border-radius: 10px;

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

<div class="header">
  <a href="index.html"><img src="img/logo_header.png"></a>
  <div class="header-right">
    <a href="index.php">Home</a>
    <?php
        if(isset($_SESSION["name"])) {
            echo "<a href='logout.php'>Logout</a>";
        }
        else{
            echo "<a href='login.php'>Login</a>";
        }
      
        ?>
  </div>
</div>
<br>

<section style="background-color: #eee;">
<div style="padding:1%;">
  <center><h3>Your Booking Criterias </h3>

  <br>



  <span> City : <?php echo "$city"; ?> </span>
  <span> From : <?php echo "$d1"; ?> </span>
  <span> To : <?php echo "$d2"; ?> </span>
  <span> Fuel Type : <?php echo "$fuel_type"; ?> </span>
  <span> Transmission Type : <?php echo "$transmission_type"; ?> </span>
  <span> Seating Capacity : <?php echo "$seats"; ?> </span>

</div>
</section>


<div class="cardContainer">
<?php
$quariy = $db->query($qr);



while ( $row = mysqli_fetch_array($quariy) ) :
$f = 1;
?>

    <div class="card">
      <img src="<?php echo 'admin/images/'.$row['car_img']?>" style="width:75%;">
      
      <h2><?php echo $row['car_brand']?></h2>
      <h1><?php echo $row['car_name']?></h1>
      <h4>
        Fuel Type : <?php echo $row['fuel_type']?><br>
        Transmission Type : <?php echo $row['transmission_type']?><br>
        Seating Capacity : <?php echo $row['seating_capacity']?><br>
        Luggage Capacity : <?php echo $row['luggage_capacity']?><br>
        Price : <?php echo ceil($hours * $row['price_per_hr'])?>
      </h4>

      <p><button>Book</button></p>
    </div>

<?php
endwhile;
?>
  </div>
</div>


<?php

  if ($f == 0) {
    echo "<center><section style='background-color: #eee; font-size:20px;'>No Cars Found</section></center>";
  }
  
?>

  </body>

</html>

