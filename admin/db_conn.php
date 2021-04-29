<?php
//Get Heroku ClearDB connection information
$cleardb_server   = "us-cdbr-east-03.cleardb.com";
$cleardb_username = "b059e439a2fe34";
$cleardb_password = "b0fd0555";
$cleardb_db       = "heroku_b71b87e8ebd3f16";
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
//$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

 $db = new mysqli($cleardb_db,$cleardb_username, $cleardb_password);
 mysqli_select_db($db,$cleardb_db);

?>
