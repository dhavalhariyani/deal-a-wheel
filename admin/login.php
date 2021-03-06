<?php
    session_start();
    $message="";

    if(isset($_POST['submit'])) {
        include_once("db_conn.php");
        $result = mysqli_query($db,"SELECT * FROM login_user WHERE user_name='" . $_POST["username"] . "' and password = '". $_POST["password"]."'");
        $row  = mysqli_fetch_array($result);
        if(is_array($row)) {
        $_SESSION["id"] = $row['id'];
        $_SESSION["name"] = $row['name'];
        } 
        else {
         $message = "Invalid Username or Password!";
        }
    
    }
    else {
         $message = "Enter Username and Password to Login";
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

    <title>Login</title>

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
  <a href="../index.html"><img src="../img/logo_header.png"></a>
  <div class="header-right">
    <a href="../index.html">Home</a>
    <a href="../about.html">About Us</a>
    <a href="../contact.html">Contact Us</a>
  </div>
</div>
<br>
<div class="container">  
  <form id="contact" action="" method="post" enctype="multipart/form-data">
    <h3>Login</h3><br>
    <h4><div class="message"><?php if($message!="") { echo $message; } ?></div>
</h4>
    <fieldset>
      <input placeholder="Username" class="inp" type="text" name="username" required autofocus>
    </fieldset>
    <fieldset>
      <input placeholder="Password" class="inp" type="password" name="password" required>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit">Login</button>
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
            <li><a href="../index.html">Home</a></li>
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