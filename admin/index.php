<?php
session_start();
?>
<html>
<head>
<title>User Login</title>
</head>
<body>

<?php
if(isset($_SESSION["name"])) {
?>
		Welcome <?php echo $_SESSION["name"]; ?>. Click here to <a href="logout.php" tite="Logout">Logout.
<?php
}else echo "<h1>Please <a href='login.php'> Login </a>First .</h1>";
?>
</body>
</html>