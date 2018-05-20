<?php
	include "email.php";
	
	// This function will send an email to the new distributor upon successful account creation.
  	// Additional emails will be sent to Bob and Linda.  	
  	function newDistributorEmail($email, $FName, $LName, $phone) {
		$emailRespond = new Email();
		$to = $email;
		$subject = 'Welcome to GreatMoods!';
		$body = "Welcome to GreatMoods ".$FName." ".$LName.",\n\n";
		$body .= "Your account has been created.  Your user name is ".$email.".\n";
		$body .= "Thank you for joining our team!";
		$emailRespond->setTo($to);
		$emailRespond->setSubject($subject);
		$emailRespond->setBody($body);
		if($emailRespond->send()) {
			echo "email sent successfuly.\n\n";
		} else {
			echo "email failed :(\n";
		}
		// Sends an email to Bob and Linda with information on new distributorr
		$emailNotification = new Email();
		$to = ('bob@greatmoods.com'.','.'linda@greatmoods.com');
		$subject = "--test message--A new Rep has joined GreatMoods!";
		$body = $FName." ".$LName." ";
		$body .= "has signed on as a new Distributor.\n\n";
		$body .= "Email: ".$email."\n";
		$body .= "Phone: ".$phone;
		$emailNotification->setTo($to);
		$emailNotification->setSubject($subject);
		$emailNotification->setBody($body);
		if($emailNotification->send()) {
			//echo "forwarded email sent successfuly.\n\n";
		} else {
			//echo "forwarded email failed :(\n";
		}
		return;
	}
?>