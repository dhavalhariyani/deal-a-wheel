<?php
$msg = "";
session_start();


if(!isset($_SESSION["name"])) {

	header("Location:index.php");
            
}


include_once("db_conn.php");
if (isset($_POST["submit"])) {



		$target_dir = "images/";
		$target_file = $target_dir . basename($_FILES["car_img"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$dpname = $_FILES["car_img"]["name"];

		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		  $check = getimagesize($_FILES["car_img"]["tmp_name"]);
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
		if ($_FILES["car_img"]["size"] > 5000000) {
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
		  if (move_uploaded_file($_FILES["car_img"]["tmp_name"], $target_file)) {
		    $msg = "The file ". htmlspecialchars( basename( $_FILES["car_img"]["name"])). " has been uploaded.";
		  } else {
		    $msg = "Sorry, there was an error uploading your file.";
		  }
		}


		$car_name = $_POST["car_name"];
		$car_brand = $_POST["car_brand"];
		$fuel_type = $_POST["fuel_type"];
		$transmission_type = $_POST["transmission_type"];
		$seating_capacity = $_POST["seating_capacity"];
		$luggage_capacity = $_POST["luggage_capacity"];
    $pph = $_POST["pph"];




		   $check="SELECT * FROM cars WHERE car_name='$car_name'";

	       $checks=mysqli_query($db,$check);
	 		$found=mysqli_num_rows($checks);


		  if($found==0)
		  {
		  	  
			
		  	$query = "INSERT INTO cars (car_name,car_brand,fuel_type,transmission_type,seating_capacity,luggage_capacity,price_per_hr,car_img) ".
        "VALUES ('$car_name','$car_brand','$fuel_type','$transmission_type','$seating_capacity','$luggage_capacity','$pph','$dpname')";

             $db->query($query) or die('Error1, query failed');	
			 
		  
             $msg = "Car Added Successfully";



		  }

		  else{
		  	$msg = "Car Exist";
             

		  }
						

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

    <title>Add New Car</title>
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
    <h3>Add New Car</h3>
    <h4>
    	<?php
    		if ($msg != NULL) {
    			echo $msg;
    		}
    		else{
    			echo "Add Details Of The Car";
    		}
    	?>
   </h4>
    <fieldset>
      <input placeholder="Car Name" name="car_name" type="text" required autofocus>
    </fieldset>
    <fieldset>
      <input placeholder="Brand" name="car_brand" type="text" required>
    </fieldset>
    <fieldset>
    	<label for="fuel_type">Fuel Type : </label>
    	<select name="fuel_type">
    		<option value="petrol">Petrol</option>
    		<option value="diesel">Diesel</option>
    		<option value="gas">Gas</option>
    	</select>
    </fieldset>
    <fieldset>
    	<label for="transmission_type">Trabsmission Type : </label>
    	<select name="transmission_type">
    		<option value="manual">Manual</option>
    		<option value="auto">Automatic</option>
    	</select>
    </fieldset>
    <fieldset>
      <input placeholder="Seating Capacity" name="seating_capacity" type="text" required>
    </fieldset>
    <fieldset>
      <input placeholder="Luggage Capacity" name="luggage_capacity" type="text" required>
    </fieldset>
     <fieldset>
      <input placeholder="Price/Hr" name="pph" type="text" required>
    </fieldset>
    <fieldset>
    	<label for="car_img">Select Car Image : </label><input name="car_img" type="file" required>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit">Add Car</button>
    </fieldset>
  </form>
 
  
</div>




  </body>

</html>