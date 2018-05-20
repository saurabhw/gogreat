<?php
	session_start();
	
	$username = $_SESSION['email'];
	include '../includes/connection.inc.php';
        include('../samplewebsites/imageFunctions.inc.php');
        $link = connectTo();
        $salt = time();
        $loginPass = sha1($pass.$salt);
	
	if ($user) 
	{
            //user is logged in
	    if ($_POST['submit'])
	     {
		//check fields
		$oldpassword = trim($_POST['opassword']);
		$newpassword = trim($_POST['newpassword']);
		$repeatnewpassword = trim($_POST['cnewpassword']);
		
	        //$username = trim($_POST['email']);
	        //$password = trim($_POST['password']);
	        // protection agains sql injection attacks
	        $username = stripslashes($username);
	        $username = mysqli_real_escape_string($link, $username);
	        $oldpassword = stripslashes($password);
	        $password = mysqli_real_escape_string($link, $password);
	        // end of protection code
	        // Get the username's details from the database
	        $sql = "SELECT * FROM users WHERE username = '$username'";
	        $result = mysqli_query($link,$sql);
	        $row = mysqli_fetch_assoc($result);
	        // Get the username's details form the database
	        $sql = "SELECT salt, password FROM users WHERE username = ?";
			
		$oldpassworddb = sha1($row['password'].$salt);
			
		//check pass
		if ($oldpassword == $oldpassworddb)
		  {
			//check twonew pass
		   if ($newpassword == $repeatnewpassword)
		    {
			//success
			//change pass in db	
		    if(strlen($newpassword) > 25 || strlen($newpassword ) < 6)   
		     {
		        echo "Password must be betwwen 6 & 25";
		     }
		    else
		     {
		        $query2 = "UPDATE users SET password ='$newpassword' WHERE username='$user'";
			$queryChangeResult = mysqli_query($link,$query2);
			session_destroy();
			die("Your pass has benn changed.<a href='index.php'>Return</a> to the main page");
		     }
	            }
	            else//old pass not matching
	            {
		      die("New Pass don't match");		
		    }      
		 }
		else
		 {
		    die("Old Pass doesn't match");
		
		
			echo "
			
			<form action='processChangePassword.php' method='POST'>
				Old password:    <input type='text' name='oldpassword'><p>
				New password:	<input type='password' name='newpassword'><p><br>
				Repeat new password:	<input type='password' name='repeatnewpassword'><p>
				<input type='submit' name='submit' value='Change Password'>
			
			</form>
			
			";

		}		
	
	}

	else{
		die("You must be logged in to change your password");
	    }
	    }

?>