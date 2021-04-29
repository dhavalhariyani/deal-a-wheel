
<div class="header">
  <a href="index.php"><img src="img/logo_header.png"></a>
  <div class="header-right">
    <a href="index.php">Home</a>
    <a href="about.php">About Us</a>
    <a href="contact.php">Contact Us</a>
    <?php
      if (!isset($_SESSION["id"])) {
        ?>
        <a href="user">Login</a>
        <a href="user/registration.php">Registration</a>
        <a href="admin"><i class="fa fa-user-circle"></i></a>
      
    <?php
  }
    else{
      if ($_SESSION["name"] == 'Admin') {
         echo "<a href='admin'>Dashboard</a>";
      }
      else
        echo "<a href='user'>Dashboard</a>";
     
      echo "<a href='logout.php'>Logout</a>";}
      
    ?>
    
  </div>
</div>