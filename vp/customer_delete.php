<?php 
require_once("../includes/connection.inc.php");
require_once("../includes/functions.php");

$link = connectTo();



// START DELETE FROM orgContacts_info

$customerID = mysqli_prep($_POST["clubid"]);


if (isset($_POST["submit"])) {

        $group = $_POST["clubid"];
        $em = $_POST["email"];
	$remove_query = "DELETE FROM orgCustomers WHERE customerID = '$group'";
	$remove_result = mysqli_query($link, $remove_query)or die("MYSQL ERROR query 1: ".mysqli_error($link));
	confirm_query($remove_result);
	
	$remove_query2 = "DELETE FROM orgContacts WHERE orgEmail = '$em' AND fundraiserID = '$group'";
	$remove_result2 = mysqli_query($link, $remove_query2)or die("MYSQL ERROR query 2: ".mysqli_error($link));
	confirm_query($remove_result2);
	
	if ($remove_result && $remove_result2) {
		//redirect_to("contacts.php?group=" . $group);
		header('Location: contacts.php');
	}
}

// END DELETE FROM orgContacts_info

?>