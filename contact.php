<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/main.css">

    <title>Contact Us</title>

    <style type="text/css">

    </style>
  </head>
  <body>

<?php
include("header.php");
?>

<div class="container">  
  <form id="contact" action="" method="post">
    <h3>Let's Talk!</h3>
    <h4>Contact us today, and get reply with in 24 hours!</h4>
    <fieldset>
      <input placeholder="Your name" type="text" required autofocus>
    </fieldset>
    <fieldset>
      <input placeholder="Your Email Address" type="email" required>
    </fieldset>
    <fieldset>
      <input placeholder="Your Phone Number" type="tel" style=" width:100%;  border:1px solid #CCC;  background:#FFF;  margin:0 0 5px;
  padding:10px;" required pattern="^\d{10}$" name="phone">
    </fieldset>
    <fieldset>
      <textarea placeholder="Type your Message Here...." required></textarea>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
    </fieldset>
  </form>
 
  
</div>
 
 <footer>
  <?php
    include("footer.php");
  ?>


</footer>

  </body>
  
</html>