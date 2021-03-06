<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
		

        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <style type="text/css">
        	.btn{
        		cursor:pointer;
				width:75%;
				border:none;
				background:#0CF;
				color:#FFF;
				margin:0 0 5px;
				padding:10px;
				font-size:15px;
        	}

        	.btn:hover {
  				background:#09C;
			}

			.btn:active { box-shadow:inset 0 1px 3px rgba(0, 0, 0, 0.5); }

        </style>
    <title>Admin</title>
  </head>
  <body>

<div class="header">
  <a href="index.html"><img src="../img/logo_header.png"></a>
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
<div class="container">  
  <?php
if(isset($_SESSION["name"])) {
?>
<center>Welcome <?php echo $_SESSION["name"]; ?>.
		

		<br><br>

		<a href="add_car.php"><button class="btn">Add New Car</button></a>
    <a href="cars_display.php"><button class="btn">View All Cars</button></a>
<?php
}else echo "<h2>Please Login First.</h2>";
?>
 
</center>
  
</div>
 


  </body>
</html>