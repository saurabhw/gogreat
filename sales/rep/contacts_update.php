<?php
session_start();
require_once("../../includes/connection.inc.php");
//require_once("../../includes/functions.php");

$link = connectTo();
$group = $_POST["group_info"];

$contactID = mysqli_real_escape_string($link, $_POST["update_contact"]);

$title = mysqli_real_escape_string($link, $_POST["update_title"]);
$firstname = mysqli_real_escape_string($link, $_POST["update_first"]);
$lastname = mysqli_real_escape_string($link, $_POST["update_last"]);
$email = mysqli_real_escape_string($link, $_POST["update_email"]);
$phone = mysqli_real_escape_string($link, $_POST["update_phone"]);


if (isset($_POST["submit_update"])) {
	$query  = "UPDATE orgContacts SET ";
	$query .= "Title = '$title', orgFName = '$firstname', orgLName = '$lastname', ";
	$query .= "orgEmail = '$email', orgPhone = '$phone' ";
	$query .= "WHERE orgContactID = '$contactID'";
	
	$result = mysqli_query($link, $query);
	$query2 = "UPDATE orgCustomers SET
	            first = '$firstname',
	            last = '$lastname',
	            relationship = '$title',
	            email = '$email',
	            homPhone = '$phone'
	            WHERE fundMemberID = '$group'";
	            $result2 = mysqli_query($link, $query2);
	//confirm_query($result);
	
	if ($result && $result2) {
		$redirect = "Location:sendEmail.php?group=$group";
  	        header("$redirect");
	}
}

ob_end_flush();
?>