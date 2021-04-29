<?php 

 $db = new mysqli("localhost","root","");
   if($db->connect_errno > 0){
         die('Unable to connect to database [' . $db->connect_error . ']');  } 
     
	 $db->query("CREATE DATABASE IF NOT EXISTS `deal-a-wheel`");
	 
             mysqli_select_db($db,"deal-a-wheel");

 ?>