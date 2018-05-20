<?php
	session_start();
	if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
	include "connectTo.php";
	$link = connectTo();
	
	$table = "users";
	$email = $_POST['email'];
	$query = "SELECT * FROM $table WHERE username='$email'";
	$result = mysqli_query($link, $query);
	if (mysqli_num_rows($result) <= 0) {
		echo "No account found matching $email";
	} else {
		$values = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'
		,'A','B','C','D','E','F','G','H','I','J','K','L','M','N','P','O','P','Q','R','S','T','U','V','W','X','Y','Z'
		,'0','1','2','3','4','5','6','7','8','9');
		$password = "";
		for($i=0; $i<10; $i++) {
			$password .= $values[rand(0, 61)];
		}
		if ($password !=''){
		$salt = time(); 			// create salt using the current timestamp 
	        $loginPass = sha1($password.$salt); 	// encrypt the password and salt with SHA1 
		$query = "UPDATE $table SET password='$loginPass', salt='$salt' WHERE username='$email'";
		$result = mysqli_query($link, $query) or die("<h1>Failed to update password</h1>");
		}
		$to = $email;
		$subject = "Password reset on Greatmoods.com";
		$headers = 'From: no-reply@greatmoods.com';
		$message = "Your password has been reset.";
		$message .="\nYour new password is $password";
		$message .="\nWe highly suggest you log in soon and change it to something you will remember.";
		mail($to, $subject, $message, $headers);	
		echo "<h1>Password Reset</h1><p>An email has been sent to your account with your new password</p>";
		echo "<p><a href='login.php'>Log in</a></a>";
	}
?>