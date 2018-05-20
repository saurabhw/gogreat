<?php
session_start();
if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
	include "connectTo.php";
	$link = connectTo();
	$table = "users";
	$username = mysqli_real_escape_string($link, $_POST['username']);
	$password = mysqli_real_escape_string($link, $_POST['password']);
	$landingPage = mysqli_real_escape_string($link, $_POST['landing']);
	$role = "training";
	$sec = 1;
	$salt = time(); 
	if(!$link) {
		die("could not connect to database");
	}
	$query = "INSERT INTO $table (username, password, Security, landingPage, salt, created, role) VALUES ('$username', '$password', '$sec', '$landingPage', '$salt', now(), '$role')";
	$result = mysqli_query($link, $query);
	if(!$result) {
		die("could not update table");
	}
	  header( 'Location: addTraining.php?msg=1' ) ;
?>