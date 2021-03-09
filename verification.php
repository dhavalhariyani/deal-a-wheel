<?php

session_start();
include_once("admin/db_conn.php");
include_once("mail.php");

$cid = $_POST['cid'];
$amount = $_POST['amount'];
$d1 = $_POST['d1'];
$d2 = $_POST['d2'];
$city = $_POST['city'];
$hours = $_POST['hours'];

$uname = $_POST['uname'];
$uemail = $_POST['uemail'];
$uphone = $_POST['uphone'];
$upass = $_POST['upass'];


function generateOTP($n) { 
      
    // Take a generator string which consist of 
    // all numeric digits 
    $generator = "1357902468"; 
  
    // Iterate for n-times and pick a single character 
    // from generator and append it to $result 
      
    // Login for generating a random character from generator 
    //     ---generate a random number 
    //     ---take modulus of same with length of generator (say i) 
    //     ---append the character at place (i) from generator to result 
  
    $result = ""; 
  
    for ($i = 1; $i <= $n; $i++) { 
        $result .= substr($generator, (rand()%(strlen($generator))), 1); 
    } 
  
    // Return result 
    return $result; 
} 



$insert_user_qr = "insert into users(user_name,user_email,user_number,user_pass) values ('$uname','$uemail','$uphone','$upass')";


if ($db->query($insert_user_qr) === TRUE){

    //echo "User Inserted";


$sql = "SELECT * FROM users ORDER BY uid DESC LIMIT 1";
$result = mysqli_query($db, $sql) or die( mysqli_error($db));

    	while ( $row = mysqli_fetch_array($result) ) :

			$uid = $row['uid'];
			//echo "User ID is : ".$uid;

		endwhile;


    	    $insert_booking_qr = "insert into bookings(uid,cid,city,booking_from,booking_to,total_hours,amount) values ('$uid','$cid','$city','$d1','$d2','$hours','$amount')";

    	    $quariy = $db->query($insert_booking_qr);

    	    if ($quariy){
    	    	//echo "Bookin Done";

    	    	$sql = "SELECT * FROM bookings ORDER BY bid DESC LIMIT 1";
						$result = mysqli_query($db, $sql) or die( mysqli_error($db));

						    	while ( $row = mysqli_fetch_array($result) ) :

									$bid = $row['bid'];
									//echo "User ID is : ".$uid;

								endwhile;

    	    			$_SESSION['booking_id'] = $bid;


                $n = 6; 
                $otp = generateOTP($n);

                $insert_otp_qr = "insert into otps(uid,otp) values ('$uid','$otp')";

                $quariy = $db->query($insert_otp_qr);

                sendOPT($uemail,$otp);



    	    }
    	    else {
    	    	//echo "Booking Not Done";
    	    }





}

else
	echo "User Not Inserted";












?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/main.css">

    <title>Verification</title>
  </head>
  <body>

<div class="header">
  <a href="index.php"><img src="img/logo_header.png"></a>
  <div class="header-right">
    <a href="index.php">Home</a>
    <a href="about.html">About Us</a>
    <a href="contact.html">Contact Us</a>
    <a href="admin"><i class="fa fa-user-circle"></i></a>
  </div>
</div>

<div class="container">  
  <form id="contact" action="success.php" method="post">
    <h3>Verify Your Identity!</h3>
    <h4>Enter The OTP We Have Sent You On Your E-Mail!</h4>
    <fieldset>
      <input placeholder="Enter OTP" type="text" name="userotp" required autofocus>
    </fieldset>
    <input type="hidden" name="uid" value="<?php echo $uid ?>">
    <input type="hidden" name="uemail" value="<?php echo $uemail ?>">
    <fieldset>
      <button name="submit" type="submit">Submit</button>
    </fieldset>
  </form>
 
  
</div>
 
 <footer>
  <div class="row">
    <div class="three-column">
      <img src="img/logo_main.png" style="height: 75%; width: 75%;">

<br><br>


    </div>
    <div class="three-column">
      <ul style="list-style-type:none;">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.html">About Us</a></li>
            <li><a href="contact.html">Contact Us</a></li>

      </ul>
    </div>
    <div class="three-column">
      <h4>Have A Question?<br>
        <a href="contact.html">24/7 Customer Support</a><br>
        +91-0000000000<br>
        ask@deal-a-wheel.com
    </div>
  </div>

</footer>

  </body>
</html>