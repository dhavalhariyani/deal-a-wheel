<?php
//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["us-cdbr-east-03.cleardb.com"];
$cleardb_username = $cleardb_url["b7500849b9e969"];
$cleardb_password = $cleardb_url["c361994a"];
$cleardb_db = substr($cleardb_url["path"],1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
//$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

 $db = new mysqli($cleardb_db,$cleardb_username, $cleardb_password);
 mysqli_select_db($db,$cleardb_db);

?>
