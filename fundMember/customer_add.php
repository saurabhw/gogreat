<?php
session_start();
require_once("../includes/connection.inc.php");
//require_once("../includes/functions.php");

$link = connectTo();

// START REQUIRED POSTS
$firstname = $_POST["firstname"];
$lastname  = $_POST["lastname"];
$email	   = $_POST["email"];
// END REQUIRED POSTS

$nickname	  = $_POST["nickname"];
$relationship = $_POST["relationship"];
$birthday	  = $_POST["birthday"];
$gender		  = $_POST["gender"];

$mobile = $_POST["mobile"];
$work	= $_POST["work"];
$ext	= $_POST["ext"];
$home	= $_POST["home"];

$address = $_POST["address"];
$apt	 = $_POST["apt"];
$city	 = $_POST["city"];
$state	 = $_POST["state"];
$zip	 = $_POST["zip"];



$fundMemberID = $_POST["group"];



$query = "SELECT * FROM Dealers WHERE loginid = '$fundMemberID'";
$result = mysqli_query($link, $query);
//confirm_query($result);
$row = mysqli_fetch_assoc($result);
$fundGroupID = $row["setuppersonid"];



// START INSERT INTO orgCustomers

if ($_POST["submit"]) {
	$query  = "INSERT INTO orgCustomers (";
	$query .= "first, last, nickname, relationship, ";
	$query .= "birthday, gender, email, mobile, workPhone, ext, ";
	$query .= "homePhone, address, apt, city, state, zip, ";
	$query .= "fundMemberID, fundGroupID, customerCreated, customerUpdated) ";
	$query .= "VALUES (";
	$query .= "'$firstname', '$lastname', '$nickname', '$relationship', ";
	$query .= "'$birthday', '$gender', '$email', '$mobile', '$work', '$ext', ";
	$query .= "'$home', '$address', '$apt', '$city', '$state', '$zip', ";
	$query .= "'$fundMemberID', '$fundGroupID', now(), now())";
	
	$result = mysqli_query($link, $query);
	//confirm_query($result);
	
	if ($result) {
		//redirect_to("contacts.php?group=" . urlencode($fundMemberID));
	}
}

// END INSERT INTO orgCustomers

ob_end_flush();
?>