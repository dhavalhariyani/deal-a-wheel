<?php

session_start();
include_once("db_conn.php");

$cid = $_POST['cid'];
$amount = $_POST['amount'];
$d1 = $_POST['d1'];
$d2 = $_POST['d2'];
$city = $_POST['city'];
$hours = $_POST['hours'];

if (!isset($_SESSION["id"])) {
  $uname = $_POST['uname'];
  $uemail = $_POST['uemail'];
  $uphone = $_POST['uphone'];
  $upass = $_POST['upass'];
}
else{
    $tid = $_SESSION['id'];

  $qr1t = "SELECT * FROM users WHERE uid = '$tid' ";
  $qr1 = $db->query($qr1t);

  while ( $row = mysqli_fetch_array($qr1) ) :
    $uemail = $row["user_email"];
  endwhile;
}







if (!isset($_SESSION["id"])) {
  $insert_user_qr = "insert into users(user_name,user_email,user_number,user_pass) values ('$uname','$uemail','$uphone','$upass')";

  $sql = "SELECT * FROM users ORDER BY uid DESC LIMIT 1";
$result = mysqli_query($db, $sql) or die( mysqli_error($db));

      while ( $row = mysqli_fetch_array($result) ) :

      $uid = $row['uid'];


    endwhile;
}
else{
  $uid = $_SESSION["id"];
}


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


                header("Location:success.php");


    	    }
    	    else {
    	    	echo "Booking Not Done";
    	    }





?>