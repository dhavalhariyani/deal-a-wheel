<?php
    session_start();
    $message="";

    if(isset($_POST['submit'])) {


        include_once("db_conn.php");
        $result = mysqli_query($db,"SELECT * FROM users WHERE user_name='" . $_POST["username"] . "' or user_email = '". $_POST["email"]."'");
        $row  = mysqli_fetch_array($result);
        if(is_array($row)) {
          $message = "User Already Exist, Please <a href='login.php'>Login</a>!";
        } 
        else {

         $result = mysqli_query($db,"insert into users (user_name,user_email,user_number,user_pass) values( '" 
          . $_POST["username"] . "','" 
          . $_POST["email"]. "','"
          . $_POST["phonenumber"]. "','"
          . $_POST["password"]. "')"
        );

         if ($result) {
           $message = "Registration Successfull!";
         }
         else{
          $message = "Registration Not Successfull!";
         }

        }
    
    }
    else {
         $message = "Enter All Details";
        }
    if(isset($_SESSION["id"])) {
    header("Location:index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" type="text/css" href="../css/main.css">

    <title>Registration</title>

    <style type="text/css">
        .inp{
            width: 100%;
            border: 1px solid #CCC;
            background: #FFF;
            margin: 0 0 5px;
            padding: 10px; 
        }
    </style>
  </head>
  <body>

<div class="header">
  <a href="../index.php"><img src="../img/logo_header.png"></a>
  <div class="header-right">
    <a href="../index.php">Home</a>
    <a href='login.php'>Login</a>
    <a href='registration.php'>Register</a>
  </div>
</div>
<br>
<div class="container">  
  <form id="contact" action="" method="post" enctype="multipart/form-data">
    <h3>Register</h3><br>
    <h4><div class="message"><?php if($message!="") { echo $message; } ?></div>
</h4>
    <fieldset>
      <input placeholder="Username" class="inp" type="text" name="username" required autofocus>
    </fieldset>
    <fieldset>
      <input placeholder="Email Address" class="inp" type="email" name="email" required>
    </fieldset>
    <fieldset>
      <input placeholder="Phone Number" class="inp" type="tel" pattern="^\d{10}$" name="phonenumber" required>
    </fieldset>
    <fieldset>
      <input placeholder="Password" class="inp" type="password" name="password" required>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit">Register</button>
    </fieldset>

  </form>
 
  
</div>

d

 
 <footer>
  <div class="row">
    <div class="three-column">
      <img src="../img/logo_main.png" style="height: 75%; width: 75%;">

<br><br>


    </div>
    <div class="three-column">
      <ul style="list-style-type:none;">
            <li><a href="../index.php">Home</a></li>
            <li><a href="../about.html">About Us</a></li>
            <li><a href="../contact.html">Contact Us</a></li>

      </ul>
    </div>
    <div class="three-column">
      <h4>Have A Question?<br>
        <a href="../contact.html">24/7 Customer Support</a><br>
        +91-0000000000<br>
        ask@deal-a-wheel.com
    </div>
  </div>

</footer>

  </body>
</html>