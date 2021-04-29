<?php
$msg = "";
session_start();






if(!isset($_SESSION["name"])) {

	header("Location:index.php");
            
}

$cid = $_GET['id'];

include_once("db_conn.php");
$query = $db->query("SELECT * FROM cars WHERE cid = '$cid'");

while ($row = mysqli_fetch_array($query)): 
{
  $car_name2 = $row["car_name"];
  $car_brand2 = $row["car_brand"];
  $fuel_type2 = $row["fuel_type"];
  $transmission_type2 = $row["transmission_type"];
  $seating_capacity2 = $row["seating_capacity"];
  $luggage_capacity2 = $row["luggage_capacity"];
  $price_per_hr2 = $row["price_per_hr"];
  $car_img2 = $row["car_img"];
  $availability2 = $row["availability"];
}
endwhile;

if (isset($_POST["submit"])) {

  if ($_FILES["new_car_img"]["name"] == '') {
    $car_img = $car_img2;
  }
  elseif ($_FILES["new_car_img"]["name"] == $car_img2) {
    $car_img = $car_img2;
  }
  else{
    $car_img = $_FILES["new_car_img"]["name"];
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["new_car_img"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $dpname = $_FILES["new_car_img"]["name"];

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["new_car_img"]["tmp_name"]);
      if($check !== false) {
        $msg = "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        $msg = "File is not an image.";
        $uploadOk = 0;
      }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
      $msg = "Sorry, file already exists.";
      $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["new_car_img"]["size"] > 5000000) {
      $msg = "Sorry, your file is too large.";
      $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
      $msg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      $msg = "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["new_car_img"]["tmp_name"], $target_file)) {
        $msg = "The file ". htmlspecialchars( basename( $_FILES["new_car_img"]["name"])). " has been uploaded.";
      } else {
        $msg = "Sorry, there was an error uploading your file.";
      }
    }
  }




$car_name = $_POST['car_name'];
$car_brand = $_POST['car_brand'];
$fuel_type = $_POST['fuel_type'];
$transmission_type = $_POST['transmission_type'];
$seating_capacity = $_POST['seating_capacity'];
$luggage_capacity = $_POST['luggage_capacity'];
$price_per_hr = $_POST['pph'];


		$qr = "UPDATE cars SET
						car_name = '$car_name',
            car_brand = '$car_brand',
            fuel_type = '$fuel_type',
            transmission_type = '$transmission_type',
            seating_capacity = '$seating_capacity',
            luggage_capacity = '$luggage_capacity',
            price_per_hr = '$price_per_hr',
            car_img = '$car_img'
          WHERE cid = '$cid'";



    if ($result = $db -> query($qr)) {
      echo "Record Updated";
      header("Location:cars_display.php");
    }
  else
    echo "Record Not Updated";








}

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../css/main.css">

    <title>Modify Car</title>
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

<div class="container">  
  <form id="contact" action="" method="post" enctype="multipart/form-data">
    <h3>Modify Car</h3>
    <h4>
    	<?php
    		if ($msg != NULL) {
    			echo $msg;
    		}
    		else{
    			echo "Change Details Of The Car";
    		}
    	?>
   </h4>
    <fieldset>
      <input placeholder="Car Name" name="car_name" type="text"  autofocus value=<?php echo $car_name2; ?> >
    </fieldset>
    <fieldset>
      <input placeholder="Brand" name="car_brand" type="text"  value=<?php echo $car_brand2; ?>>
    </fieldset>
    <fieldset>
    	<label for="fuel_type">Fuel Type : </label>
    	<select name="fuel_type">
    		<option value="petrol" <?php if ($fuel_type2=='petrol') echo "selected"; ?> >Petrol</option>
    		<option value="diesel" <?php if ($fuel_type2=='diesel') echo "selected"; ?>>Diesel</option>
    		<option value="gas" <?php if ($fuel_type2=='gas') echo "selected"; ?>>Gas</option>
    	</select>
    </fieldset>
    <fieldset>
    	<label for="transmission_type">Trabsmission Type : </label>
    	<select name="transmission_type">
    		<option value="manual" <?php if ($transmission_type2=='manual') echo "selected"; ?> >Manual</option>
    		<option value="auto" <?php if ($transmission_type2=='auto') echo "selected"; ?> >Automatic</option>
    	</select>
    </fieldset>
    <fieldset>
      <input placeholder="Seating Capacity" name="seating_capacity" type="text" value=<?php echo $seating_capacity2; ?> >
    </fieldset>
    <fieldset>
      <input placeholder="Luggage Capacity" name="luggage_capacity" type="text" value=<?php echo $luggage_capacity2; ?> >
    </fieldset>
     <fieldset>
      <input placeholder="Price/Hr" name="pph" type="text" value=<?php echo $price_per_hr2; ?> >
    </fieldset>
    <fieldset>
      <label for="old_car_img"></label><img src=<?php echo "images/$car_img2"; ?>>
    </fieldset>
    <fieldset>
    	<label for="new_car_img">Select Car Image : </label><input name="new_car_img" type="file" >
    </fieldset>
    <fieldset>
      <button name="submit" type="submit">Modify Car Details</button>
    </fieldset>
  </form>
 
  
</div>




  </body>

</html>