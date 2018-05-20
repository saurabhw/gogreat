<?php
	session_start();
	if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
	include "php/Connect.php";	
	/*
	if(!isset($_SESSION['siteID'])) { // stops a user from starting a form mid way through
		header("location:GreatMoodsSetupEditMainWebsite.php");
	}
	*/

	$con = new Connection();
	$table = "orgSiteContacts";
	$values = "";
	$id = $_SESSION['siteID'];
	foreach($_POST['FName'] as $rowNumber => $value) {
		$title = $_POST['position'];
		$FName = $_POST['FName'];
		$LName = $_POST['LName'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$query = "UPDATE $table SET title= '$title', FName='$FName', LName = '$LName', phone = '$phone', email = '$email' WHERE orgSiteID = '$id'";
		$con->make_query($query);
	}
?>