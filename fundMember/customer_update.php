<?php
session_start();
require_once("../includes/connection.inc.php");
require_once("../includes/functions.php");

$link = connectTo();

// GET GROUP ID NUMBER IN ORDER TO REDIRECT AFTER DELETION
$group_info = $_POST["group_info"];

$user = $_SESSION['userId'];
$userName = $_SESSION['email'];
$query1 = "SELECT * FROM Dealers WHERE loginid='$_COOKIE[dealer]' AND email='$userName'";
$result1 = mysqli_query($link, $query1)or die("MySQL ERROR query 1: ".mysqli_error($link));
$row = mysqli_fetch_assoc($result1);
$dealerID = $row['loginid'];
$group = $row['setuppersonid']; 


// START UPDATE orgContacts_info

// Passing in the hidden value for contactsInfoID.
$customerID = mysqli_prep($_POST["userid"]);

$submit = mysqli_prep($_POST['submit']);

if (isset($submit)) {

	$firstname	  = mysqli_prep($_POST["fname"]);
	$lastname	  = mysqli_prep($_POST["lname"]);
	$companyname	  = mysqli_prep($_POST["company"]);

	$relationship = mysqli_prep($_POST["rel"]);
	$birthday	  = mysqli_prep($_POST["bd"]);
	$gender		  = mysqli_prep($_POST["gn"]);

	$email	= mysqli_prep($_POST["email"]);
	$mobile = mysqli_prep($_POST["cell"]);
	$work	= mysqli_prep($_POST["update_work"]);
	$ext	= mysqli_prep($_POST["update_ext"]);

	$home	 = mysqli_prep($_POST["hp"]);
	$address = mysqli_prep($_POST["ad1"]);
	$apt	 = mysqli_prep($_POST["ad2"]);
	$city	 = mysqli_prep($_POST["city"]);

	$state	 = mysqli_prep($_POST["state"]);
	$zip	 = mysqli_prep($_POST["zip"]);

	$update_info  = "UPDATE orgCustomers SET ";
	$update_info .= "first = '$firstname', last = '$lastname', ";
	$update_info .= "relationship = '$relationship', birthday = '$birthday', gender = '$gender', ";
	$update_info .= "email = '$email', mobile = '$mobile', workPhone = '$work', ext = '$ext', ";
	$update_info .= "homePhone = '$home', address = '$address', apt = '$apt', city = '$city', ";
	$update_info .= "state = '$state', zip = '$zip', customerUpdated = now() ";
	$update_info .= "WHERE customerID = '$customerID' AND fundMemberID='$dealerID'";
	
	$query  = "UPDATE orgContacts SET ";
	$query .= "Title = '$title', orgFName = '$firstname', orgLName = '$lastname', ";
	$query .= "orgEmail = '$email', orgPhone = '$phone' ";
	$query .= "WHERE orgContactID = '$contactID' AND fundraiserID='$dealerID'";
	
	$result = mysqli_query($link, $query);

	$result_info = mysqli_query($link, $update_info);
	confirm_query($result_info);

	if ($result_info && mysqli_affected_rows($link) >= 0) {
		redirect_to("contacts.php?group=" . urlencode($group_info));
	}
}

// END UPDATE orgContacts_info



ob_end_flush();
?>