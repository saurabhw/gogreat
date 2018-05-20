<?php
session_start();
require_once("../includes/connection.inc.php");
require_once("../includes/functions.php");

$link = connectTo();
$group = $_POST["group_info"];

$contactID = mysqli_prep($_POST["update_contact"]);

$title = mysqli_prep($_POST["update_title"]);
$firstname = mysqli_prep($_POST["update_first"]);
$lastname = mysqli_prep($_POST["update_last"]);
$email = mysqli_prep($_POST["update_email"]);
$phone = mysqli_prep($_POST["update_phone"]);


if (isset($_POST["submit_update"])) {
	$query  = "UPDATE orgContacts SET ";
	$query .= "Title = '$title', orgFName = '$firstname', orgLName = '$lastname', ";
	$query .= "orgEmail = '$email', orgPhone = '$phone' ";
	$query .= "WHERE orgContactID = '$contactID'";
	
	$result = mysqli_query($link, $query);
	confirm_query($result);
	
	if ($result && mysqli_affected_rows($link) >= 0) {
		redirect_to("sendEmail.php?group=" . urlencode($group));
	}
}

ob_end_flush();
?>