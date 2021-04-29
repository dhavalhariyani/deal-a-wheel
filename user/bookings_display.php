<?php
session_start();
$msg = "";



if(!isset($_SESSION["name"])) {

	header("Location:index.php");
            
}


include_once("../db_conn.php");


?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="stylesheet" type="text/css" href="../css/main.css">

        <style type="text/css">


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
            width: calc(100% - 20px);
            padding: 10px;
            border-radius: 10px;

          }
          .card2 {
            background-color: #eee;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width: 100%;
            margin: 1%;
            text-align: center;
            float: left;
            width: calc(100% - 20px);
            padding: 10px;
            border-radius: 10px;
            text-align: left;
            
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

table{
  border-collapse: collapse;
}

td, th{
  border: 1.5px solid #ddd;
  padding-left: 5px;
  margin-left: 2%;   
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

    <title>Booking</title>
  </head>
  <body>

<div class="header">
  <a href="index.php"><img src="../img/logo_header.png"></a>
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


<div class="cardContainer">
<div class="card2">
            <table>
            <thead>
              <tr>
                <th>Car Image</th>
                <th>Car Brand</th>
                <th>Car Name</th>
                <th>City</th>
                <th>From</th>
                <th>To</th>
                <th>Total Hours</th>
                <th>Amount</th>
                <th>Status</th>
              </tr>

              <tbody>
  <?php

  $userid = $_SESSION["id"];



  $query = $db->query("select * from bookings where uid = $userid");

  while ( $row = mysqli_fetch_array($query) ) :

  $bid = $row["bid"];
  $uid = $row["uid"];
  $cid = $row["cid"];
  $city = $row["city"];
  $booking_from = $row["booking_from"];
  $booking_to = $row["booking_to"];
  $total_hours = $row["total_hours"];
  $amount = $row["amount"];
  $status = $row["status"];

  $quariy1 = $db->query("SELECT * FROM cars WHERE cid = '$cid'");
    $row1 = mysqli_fetch_array($quariy1);
      $car_img  = $row1['car_img'];
      $car_brand  = $row1['car_brand'];
      $car_name  = $row1['car_name'];
      
  $quariy2 = $db->query("SELECT * FROM users WHERE uid = '$uid'");
    $row2 = mysqli_fetch_array($quariy2);
      $user_name = $row2["user_name"];
      $user_email = $row2["user_email"];
      $user_number = $row2["user_number"];

  ?>

                <tr>
                  <td width="15%" style="padding: 5px"><img src="<?php echo '../admin/images/'.$car_img?>" style="width:100%;"></td>
                  <td width="10%"><?php echo $car_brand ?></td>
                  <td width="10%"><?php echo $car_name ?></td>
                  <td width="10%"><?php echo $city ?></td>
                  <td width="12.5%"><?php echo $booking_from ?></td>
                  <td width="12.5%"><?php echo $booking_to ?></td>
                  <td width="10%"><?php echo $total_hours ?></td>
                  <td width="10%"><?php echo $amount ?></td>
                  <td width="10%">
                    <?php
                      if ($status == 0) {
                        echo "Pending";
                      }
                      elseif ($status == 1) {
                        echo "Approved";
                      }
                      else
                        echo "Rejected";
                      ?>
                  </td>

                </tr>


      <?php
      endwhile;
      ?>
              </tbody>
            </thead> 
          </table>
        </div>
      </div>





</body>

</html>