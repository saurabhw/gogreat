<?php 
include '../includes/autoload.php';


// START DELETE FROM orgContacts_info

$customerID = mysqli_prep($_POST["customerID"]);


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
		header('Location: contacts.php?group=' . $group);
	}
}

// END DELETE FROM orgContacts_info

?>