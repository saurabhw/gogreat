<?php
session_start();
if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
	include "php/Connect.php";
	$con = new Connection();
	$table = "orgInfo";
	$orgType = $_POST['orgType'];
	$clubTeam = $_POST['clubTeam'];
	$website = $_POST['website'];
	$contact = $_POST['contact'];
	$fistLastName = explode(" ", $contact);
	$FName = $firstLastName[0];
	$LName = $firstLastName[1];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	
	$query = "INSERT INTO $table (orgType, clubTeam, url, orgFName, orgLName, orgPhone, orgEmail)";
	$query .+ "VALUES('$orgType', '$clubTeam', '$website', '$FName', '$LName', '$phone', '$phone')";
	$con->make_query($query);
	if($con->get_result()) {
		echo "Prospected Added Successfuly.<br />";
	} else {
		echo $con->get_result();
	}
?>