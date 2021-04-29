<?php
session_start();

$id = $_GET['id'];
$action = $_GET['action'];

include_once("db_conn.php");

if ($action == "confirm") {
	$qr = "UPDATE bookings SET status = '1' WHERE bid = '$id';";
}
elseif ($action == "reject") {
	$qr = "UPDATE bookings SET status = '2' WHERE bid = '$id';";
}
elseif ($action == "makeunavailable") {
	$qr = "UPDATE cars SET availability = '0' WHERE cid = '$id';";
}
elseif ($action == "makeavailable") {
	$qr = "UPDATE cars SET availability = '1' WHERE cid = '$id';";
}
//echo "$qr";
if ($result = $db -> query($qr)) {
		echo "Record Updated";
		header("Location:cars_display.php");
	}
	else
		echo "Record Not Updated";

?>