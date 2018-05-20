<?php
session_start();
if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
	include "connectTo.php";
	$table = "users";
	$FName = $_POST['FName'];
	$LName = $_POST['LName'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$link = connectTo();
	if(!$link) {
		die("could not connect to database");
	}
	$query = "INSERT INTO $table (username, password, Security, landingPage,) VALUES ('$FName', '$LName', '$username', '$password')";
	$result = mysqli_query($link, $query);
	if(!$result) {
		die("could not update table");
	}
	echo "well done";
?>