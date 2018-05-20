<?php 
	session_start();
	include "connectTo.php";
	ob_start();
	$link = connectTo();
	$table = "email_contacts";
	$id = $_SESSION['ID'];
	$FName = $_POST['FName'];
	$LName = $_POST['LName'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$query = "INSERT INTO $table (FName, LName, email, phone, friendOf) VALUES('$FName','$LName','$email','$phone', '$id')";
	$result = mysqli_query($link, $query);
	if($result) {
		echo "Email contact for $FName $LName has been created";
	} else {
		echo "I'm sorry, there was a problem creating the Email contact.";
	}
	ob_end_flush();
?>
