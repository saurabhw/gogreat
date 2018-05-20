<?php
session_start();
require_once("../includes/connection.inc.php");
require_once("../includes/functions.php");

$link = connectTo();

// START REQUIRED POSTS
$firstname = mysqli_prep($_POST["firstname"]);
$lastname  = mysqli_prep($_POST["lastname"]);
$email	   = mysqli_prep($_POST["email"]);
// END REQUIRED POSTS

$nickname	  = mysqli_prep($_POST["nickname"]);
$relationship = mysqli_prep($_POST["relationship"]);
$birthday	  = mysqli_prep($_POST["birthday"]);
$gender		  = mysqli_prep($_POST["gender"]);

$mobile = mysqli_prep($_POST["mobile"]);
$work	= mysqli_prep($_POST["work"]);
$ext	= mysqli_prep($_POST["ext"]);
$home	= mysqli_prep($_POST["home"]);

$address = mysqli_prep($_POST["address"]);
$apt	 = mysqli_prep($_POST["apt"]);
$city	 = mysqli_prep($_POST["city"]);
$state	 = mysqli_prep($_POST["state"]);
$zip	 = mysqli_prep($_POST["zip"]);



// This number is the group ID number. Insert this number into [orgContacts_info] fundGroupID.
$groupID = mysqli_prep($_POST["group"]);

// GET THE USER / FUNDRAISER MEMBER'S EMAIL ADDRESS FROM ORGMEMBERS
$query_orgMembers = "SELECT * FROM orgMembers WHERE fundraiserID = '$groupID'";
$result_orgMembers = mysqli_query($link, $query_orgMembers);
confirm_query($result_orgMembers);
$row_orgMembers = mysqli_fetch_assoc($result_orgMembers);
$orgMembers_email = mysqli_prep($row_orgMembers['orgEmail']);

// USE THE USER / FUNDRAISER MEMBER'S EMAIL ADDRESS TO GET THE FUNDRAISER MEMBER'S
// userInfoID NUMBER FROM USER_INFO
$query_user_info = "SELECT * FROM user_info WHERE email = '$orgMembers_email'";
$result_user_info = mysqli_query($link, $query_user_info);
confirm_query($result_user_info);
$row_user_info = mysqli_fetch_assoc($result_user_info);
$fundMemberID = mysqli_prep($row_user_info["userInfoID"]);



// START INSERT INTO ORGCONTACTS_INFO

if ($_POST["submit"]) {
	$query  = "INSERT INTO orgContacts_info (";
	$query .= "first, last, nickname, relationship, ";
	$query .= "birthday, gender, email, mobile, workPhone, ext, ";
	$query .= "homePhone, address, apt, city, state, zip, ";
	$query .= "fundGroupID, fundMemberID, contacts_infoCreated, contacts_infoUpdated) ";
	$query .= "VALUES (";
	$query .= "'$firstname', '$lastname', '$nickname', '$relationship', ";
	$query .= "'$birthday', '$gender', '$email', '$mobile', '$work', '$ext', ";
	$query .= "'$home', '$address', '$apt', '$city', '$state', '$zip', ";
	$query .= "'$groupID', '$fundMemberID', now(), now())";
	
	$result = mysqli_query($link, $query);
	confirm_query($result);
	
	if ($result) {
		redirect_to("contacts.php?group=" . urlencode($groupID));
	}
}

// END INSERT INTO ORGCONTACTS_INFO

//var_dump($_POST["firstname"]);

ob_end_flush();
?>