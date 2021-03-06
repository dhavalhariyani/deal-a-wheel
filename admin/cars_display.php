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



button {
  padding: 8px;
  color: white;
  background-color: #000;
  cursor: pointer;
  width: 50%;
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

    <title>Cars Display</title>
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
<?php
$quariy = $db->query("select * from cars");
while ( $row = mysqli_fetch_array($quariy) ) :

?>

    <div class="card">
      <img src="<?php echo 'images/'.$row['car_img']?>" style="width:75%;">
      
      <h2><?php echo $row['car_brand']?></h2>
      <h1><?php echo $row['car_name']?></h1>
      <h4>
        Fuel Type : <?php echo $row['fuel_type']?><br>
        Transmission Type : <?php echo $row['transmission_type']?><br>
        Seating Capacity : <?php echo $row['seating_capacity']?><br>
        Luggage Capacity : <?php echo $row['luggage_capacity']?><br>
        Price/Hr : <?php echo $row['price_per_hr']?><br>
        Availability : <?php if($row['availability']) echo "Available"; else echo "Unavailable";?><br>

        <button name="modifycar" onclick="javascript:location.href='modify_car.php?id=<?php echo $row['cid']?>';" value="Modify">Modify</button>


        <?php
          if ($row['availability']) {
        ?>
            <button name="makeunavailable" onclick="javascript:location.href='action.php?id=<?php echo $row['cid']?>&action=makeunavailable';" value="Hide">Hide</button>

          <?php
          }
          else{
            ?> 
          
          <button name="makeavailable" onclick="javascript:location.href='action.php?id=<?php echo $row['cid']?>&action=makeavailable';" value="Hide">Show</button>
<?php
          }
        ?>

      
    </div>

<?php
endwhile;
?>
  </div>
</div>




  </body>

</html>