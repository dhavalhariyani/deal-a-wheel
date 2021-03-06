<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <title>Deal-A-Wheel</title>
    <link rel="icon" href="logo-only.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <style type="text/css">
      .mySlides {display: none;}
       .mySlides img {vertical-align: middle;}

.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
    </style>
  </head>
  <body>

<?php
include("header.php");
?>

    
<section class="row">

  <div class="two-column" style="width: 60%;">
    <center><h3>Book A Ride</h3></center>
    <form id="booking" action="show_cars.php" method="post">

        <label for="city">City</label>
          <input type="text" name="city">
          &nbsp;&nbsp;&nbsp;&nbsp;
        
        <br><br>
        <label for="pickup_date">Start Date</label>
          <input type="datetime-local" name="pickup_date">
          &nbsp;&nbsp;&nbsp;&nbsp;
        <label for="return_date">End Date</label>
          <input type="datetime-local" name="return_date">
          &nbsp;&nbsp;&nbsp;&nbsp;
        <br><br>
         <label for="fuel_type">Fuel Type : </label>
            <select name="fuel_type">
              <option value="petrol">Petrol</option>
              <option value="diesel">Diesel</option>
              <option value="gas">Gas</option>
            </select>


          &nbsp;&nbsp;&nbsp;&nbsp;

          <label for="transmission_type">Transmission Type : </label>
      <select name="transmission_type">
        <option value="manual">Manual</option>
        <option value="auto">Automatic</option>
      </select>

      &nbsp;&nbsp;&nbsp;&nbsp;

        <label for="seats">Seating Capacity</label>
          <select name="seats">
            <option>4</option>
            <option>5</option>
            <option>7</option>
            <option>8</option>
            <option>9</option>
            <option>12</option>
          </select>


        <center>      
        <br>  
          <button name="submit" type="submit" id="contact-submit" >Continue</button>
        </center>

      </form>
  </div>

  <div class="two-column" style="background-color:transparent; width: 10%;">&nbsp;</div>


  <div class="two-column" style="width: 30%; ">
    <center><h3>Rent, Ride & Roll</h3><br>

        <div class="slideshow-container">

            <div class="mySlides fade">
    <img src="img/car (1).png" style="width:75%">
</div>

<div class="mySlides fade">
    <img src="img/car (2).png" style="width:75%">
</div>

<div class="mySlides fade">
    <img src="img/car (3).png" style="width:75%">
</div>

<div class="mySlides fade">
    <img src="img/car (4).png" style="width:75%">
</div>

<div class="mySlides fade">
    <img src="img/car (5).png" style="width:75%">
</div>

<div class="mySlides fade">
    <img src="img/car (6).png" style="width:75%">
</div>                       

          </div>
            <br>

            <div style="text-align:center">
              <span class="dot"></span> 
              <span class="dot"></span> 
              <span class="dot"></span>
              <span class="dot"></span> 
              <span class="dot"></span> 
              <span class="dot"></span> 
            </div>

    </center>
  </div>


</section>


  
</table>

<section style="background-color: #eee;">
  <center>
  <div>
    <h3>Why Ride With Us </h3> 
            <h4>Deal-A-Wheel is the best option for car rental. Renting with us poses many advantages.</h4>


  </div>

  <div class="row">
    
    <div class="three-column">
      <div class="card">
        <img src="img/cab.jpg" alt="Pickup" style="width:100%">
        <div class="container">
          <h4><b>100% Delivery & Pickup</b></h4>
          <p>For every booking, every car model. With industry leading on-time performance. We love to make things easy for you!</p>
        </div>
      </div>
    </div>

     <div class="three-column">
      <div class="card">
        <img src="img/no_hidden_fees.jpg" alt="Pickup" style="width:100%">
        <div class="container">
          <h4><b>No Hidden Charges</b></h4>
          <p>Our tariffs include taxes & insurance. And since our tariffs do NOT include fuel, it means you pay for only as much fuel as you use!</p>
        </div>
      </div>
    </div>

     <div class="three-column" >
      <div class="card">
        <img src="img/easy_booking.jpg" alt="Pickup" style="width:100%">
        <div class="container">
          <h4><b>Booking in 2 Minutes</b></h4>
          <p>Our fast forward booking system lets you book a ride under 2 minutes without any hustle. So you can enjoy your ride effortlessly.</p>
        </div>
      </div>
    </div>


    
  </div>
  </center>
</section>


<section style="background-color: #eee;">
  <center>

  <div>
    <h3>People Love To Ride With Us &hearts;</h3>
  </div>
  

<br>
  <div>
    <img src="img/user.png" style="height: 10%; width: 10%;" >
  </div>

  <div>
    <b>John Doe</b>
        <br>
          Deal-A-Wheel provides the best and hassle free car rental experience in the market. I'm using it on regular basis now days.
        <br>
        <a href="#">Learn More &rarr;</a>
  </div>

  </center>
  
</section>

<footer>
  <?php
    include("footer.php");
  ?>

</footer>


  </body>

  <script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 3000); 
}
</script>
</html>