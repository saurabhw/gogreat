<?php
	include "email.php";
	$email = new Email();
	$to = $_POST['to'];
	$subject = $_POST['subject'];
	$body = $_POST['message'];
	$email->setTo($to);
	$email->setSubject($subject);
	$email->setBody($body);
	//$email->setBody("this is a test, this is a test, this is a test.");
	if($email->send()) {
		echo "email sent successfuly.";
	} else {
		echo "email failed :(";
	}
?>
