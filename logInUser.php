<?php 
	session_start();
	ob_start();
	include "includes/connection.inc.php";
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
	// Get the username's details form the database
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
  			die('Could not connect: ' . mysqli_error($link));
  		}
  		mysqli_query($link, "UPDATE users SET lastLogin = NOW() WHERE username = '$username'");
  	}else{
		$_SESSION = array();
		session_destroy();
		$error = 'Invalid username or password';
		echo "Incorrect Username or Password, Please Try Again";
		$_SESSION['LOGIN'] = "FALSE";
		header("location:login_error.php");
		}
	if (isset($_SESSION['authenticated'])){
	    session_regenerate_id();
	        
		$_SESSION['start'] = time();
		$user = $row;
		$security = $user['Security'];
		$home = $user['landingPage'];
		$role = $user['role'];
		$userID = $user['userID'];
		
		$_SESSION['LOGIN'] = "TRUE";
		$_SESSION['email'] = $username;
		$_SESSION['home'] = $home;
		//$_SESSION['password'] = $password;	
		$_SESSION['Security'] = $security;
		$_SESSION['role'] = $role;
		$_SESSION['userId'] = $userID;
		$_SESSION['landingPage'] = $home;
		
		// Get info from Dealers table
		$sql_dealer = "SELECT * FROM Dealers WHERE userName = '$username'";
	        $result3 = mysqli_query($link, $sql_dealer);
	        $row3 = mysqli_fetch_assoc($result3);
	        $_SESSION['groupid'] = $row3['loginid'];
	        $_SESSION['banner'] = $row3['banner_path'];
	        $_SESSION['contactPic'] = $row3['contact_pic'];
	        $_SESSION['groupName'] = $row3['Dealer'];
	        $_SESSION['club'] = $row3['DealerDir'];
	        
		// Get user info from user_info table
		$sql_userInfo = "SELECT * FROM user_info WHERE email = '$username'";
		if ($result2 = mysqli_query($link,$sql_userInfo)){
	        $row2 = mysqli_fetch_assoc($result2);
	        $_SESSION['userId'] = $row2['userInfoID'];
	        $_SESSION['firstName'] = $row2['FName'];
	        $_SESSION['lastname'] = $row2['LName'];
	        $_SESSION['role'] = $row2['role'];
	        $paymail = $row2['userPaypal'];
	        $role = $_SESSION['role'];
	        }
	        if($paymail == "")
	        {
	           $_SESSION['freeze'] = "TRUE";
	        }
	        else
	        {
	            $_SESSION['freeze'] = "FALSE";
	        }
	        
	        if($home == "") {
			header("location:setupEditMainWebsite/index.php");
			exit;
		} else {
			header("location:$home");
			exit;
		} // end else
	} // end if	
	ob_end_flush();
	mysqli_close($link);
?>