<?php
	include('newDistributorEmail.php');
	$email     = 'tonyq@gmail.com';
	$FName     = 'Charlie';
	$LName     = 'Brown';
	$homePhone = '555-555-5555';
	newDistributorEmail($email, $FName, $LName, $homePhone);
?>