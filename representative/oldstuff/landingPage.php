<?php
	session_start();
	include "../redirect/redirect.php";
	redirect($_SESSION['type'], "landingPage.php");
?>
<!DOCTYPE HTML>
<html lang="en">
	<head>
		<title>Welcome to Greatmoods!</title>
		<link rel="stylesheet" href="../greatmoods.css">
	</head>
	<body>
		<h1>Welcome To Greatmoods!</h1>
		<h2>heres some navigation</h2>
		
	</body>
</html>
