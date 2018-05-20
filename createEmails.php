<?php
	session_start();
	if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
	ob_start();
	include "php/Connect.php";
	
	$con = new Connection();
	$id = $_SESSION['ID'];
	$table = "email_contacts";
	$body = $_POST['body']; // the message of the email
	$to  = $_POST['sendTo']; // radio selection of who email is being sent to
	$query = "SELECT * FROM $table";
	switch($to) {
		case "friends":
			$query .=  " WHERE friendOf = '$id'";
			break;
		case "family":
			//$query .= " WHERE familyOf = '$id'";
			break;
		case "both":
			//$query .= " WHERE friendOf = '$id' AND familyOf = '$id'";
			break;
		case "individual":// for now individual and default share the same response code
		default:
			break;
	}
	$con->make_query($query);
	$sendTo = "";
	while($row = mysqli_fetch_array($con->get_result())) {
		$sendTo .= $row['friendOf'] . " ";
	}
	$table = "emails";
	$query = "INSERT INTO $table (owner, body, sendTo) VALUES('$id', '$body', '$sendTo')";
	$con->make_query($query);
	
	ob_end_flush();
?>