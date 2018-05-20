<?php 
	session_start();
	ob_start();
	include "connectTo.php";
	$table = "users";
        
	$link = connectTo();
	$username = trim($_POST['email']);
	$password = trim($_POST['password']);
	// protection agains sql injection attacks
	$username = stripslashes($username);
	$username = mysqli_real_escape_string($link, $username);
	$password = stripslashes($password);
	$password = mysqli_real_escape_string($link, $password);
	// end of protection code
	// Get the username's details from the database
	$sql = "SELECT * FROM users WHERE username = '$username'";
	$result = mysqli_query($link,$sql);
	$row = mysqli_fetch_assoc($result);
	// Get the username's details from the database
	$sql = "SELECT salt, password FROM users WHERE username = ?";
	// initialize and prepare statement
	$stmt = $link->stmt_init();
	if ($stmt->prepare($sql)) {
		// bind the input parameter
		$stmt->bind_param('s',$username);
		// bind the result, using a new variable for the password
		$stmt->bind_result($salt, $storedPwd);
		$stmt->execute();
		$stmt->fetch();
	}
	if (sha1($password.$salt) == $storedPwd){
		$_SESSION['authenticated'] = 'Charlie Brown';
		// Update the users lastest login time
		$link = connectTo();
		if (!$link)
  		{
  			die('Could not connect: ' . mysql_error());
  		}
  		mysqli_query($link, "UPDATE users SET lastLogin = NOW() WHERE username = '$username'");
  	}else{
		$_SESSION = array();
		session_destroy();
		$error = 'Invalid username or password';
		echo "login failed, please try again";
		$_SESSION['LOGIN'] = "FALSE";
		header("location:$home");
		}
	if (isset($_SESSION['authenticated'])){
		$_SESSION['start'] = time();
		$user = $row;
		$security = $user['Security'];
		$home = $user['landingPage'];
		$role = $user['role'];
		$userID = $user['userID'];
		$u_name = $_SESSION['username'];
		
		$_SESSION['LOGIN'] = "TRUE";
		
		$_SESSION['home'] = $home;
		$_SESSION['password'] = $password;	
		$_SESSION['Security'] = $user['Security'];
		$_SESSION['role'] = $role;
		
		
		$_SESSION['server'] = $_SERVER['SERVER_NAME'];
		
		// Get info from Dealers table
		$sql_dealer = "SELECT * FROM Dealers WHERE userName = '$username'";
	        $result3 = mysqli_query($link, $sql_dealer);
	        $row3 = mysqli_fetch_assoc($result3);
	        $_SESSION['groupid'] = $row3['loginid'];
	        
		
		// Get user info from user_info table
		$sql_userInfo = "SELECT * FROM user_info WHERE email = '$username'";
		$result2 = mysqli_query($link,$sql_userInfo);
	        $row2 = mysqli_fetch_assoc($result2);
	        $_SESSION['userId'] = $row2['userInfoID'];
	        $_SESSION['firstName'] = $row2['FName'];
	        //$_SESSION['email'] = $row2['email'];
	        
	        
	       
	        if($home == "") {
			header("location:index.php");
			exit;
		} else {
			header("location:$home");
			exit;
		} // end else
	} // end if	
	ob_end_flush();
?>