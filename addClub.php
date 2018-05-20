<?php 
	session_start();
	if(!isset($_SESSION['authenticated']))
	       {
	            header('Location: ../index.php');
	            exit;
	       }
	include "redirect.php"; 
	include "connectTo.php";
?>
<html>
	<head>
		<link rel="stylesheet" href="greatmoods.css">
<?
	$orgType = "";	
	$orgName = $_POST['orgName'];
	$clubTeam = $_POST['clubTeam'];
	$orgFName = $_POST['FName'];
	$orgLName = $_POST['LName'];
	$orgPhone = $_POST['phone'];
	$orgEmail = $_POST['email'];
	$orgStreet = $_POST['street'];
	$orgCity = $_POST['city'];
	$orgState = $_POST['state'];
	$orgZipCode = $_POST['zip'];
	// finds the type of organization from orgNames table to be inserted into query later
	$table = "orgNames";
	$link = connectTo();
	$query = "SELECT orgType FROM $table WHERE orgName = '$orgName'";
	$result = mysqli_query($link, $query) or die(mysqli_errno($link));	
	if (!isset($_POST['orgType']) ) {
		while($row = mysqli_fetch_array($result)) {
			$orgType = $row[0];

		}
	} else {
		$orgType = $_POST['orgType'];
	}	
	echo "<script>alert($orgtype)</script>";
	// end of code for getting orgType
	// add contact of club into orgContacts
	$table = "orgContacts";
	$query = "INSERT INTO $table (orgFName, orgLName, orgPhone, orgEmail, orgStreet1, orgCity, orgState, orgZipCode, orgName)";
	$query .= " VALUES ('$orgFName', '$orgLName', '$orgPhone', '$orgEmail', '$orgStreet', '$orgCity', '$orgState', '$orgZipCode', '$orgName')";
		
	$result = mysqli_query($link, $query) or die("<h1>unable to insert into orgContacts</h1>");
	// add club into orgInfo
	$table = "orgInfo";
	$query = "INSERT INTO $table (orgType, orgName, clubTeam, orgFName, orgLName, orgPhone, orgEmail)";
	$query .= " VALUES ('$orgType', '$orgName', '$clubTeam', '$orgFName', '$orgLName', '$orgPhone', '$orgEmail')";
	$result = mysqli_query($link, $query) or die("<h1>unable to insert into orgInfo</h1>");
	// if user is adding a new organization, update orgNames to include their new org
	if (isset($_POST['orgType'])) {
		$table = "orgNames";
		$query = "INSERT INTO $table (orgType, orgName) VALUES ('$orgType', '$orgName')";
		$result = mysqli_query($link, $query) or die("<h1>Unable to insert into orgNames</h1>");
	}
	echo "<h1>club added to orgContacts</h1>";	
	echo "<a href='index.php'>Go back to Organization Page</a>";	
?>