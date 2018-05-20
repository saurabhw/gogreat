<?php
session_start();
	include 'includes/connection.inc.php';
	$link = connectTo();
	
	if(isset($_POST['submit'])){
	    $msg = '';
	    $table = "users";
	    $email = $_POST['email'];
	    
	    $query = "SELECT * FROM $table WHERE username='$email'";
	    $result = mysqli_query($link, $query);
	    
	    if (mysqli_num_rows($result) <= 0) {
		$msg .= "No account found matching $email. <br />";
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
		$msg .= "Password Reset. <br />";
		$msg .= "An email has been sent to your account with your new password. <br />";
		
	    }// end else
	}
?>
<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<title>GreatMoods | Recover Account</title>
	<link rel="stylesheet" type="text/css" href="css/layout_styles.css">
	<link rel="stylesheet" type="text/css" href="css/header_styles.css">
	<link rel="stylesheet" type="text/css" href="css/sidenav_styles.css">
	<link rel="stylesheet" type="text/css" href="css/addnew_form_styles.css">
	<link rel="shortcut icon" href="../images/favicon.ico">
	
	
	<script>
		function validateForm() {
			var field = document.forms['recover']['email'].value;
			if (field==null || field=="") {
				alert("please enter your email address");
				return false;
			}
			if(field.indexOf(".") == -1 || field.indexOf("@") == -1) {
				alert("please enter a valid email");
				return false;
			}
			return true;
		}
	</script>
</head>

<body>
	<?php include 'includes/header.inc.php'; ?>
  <!--<?php include 'navigation/leftSidebarNavHomepage.nav.php'; ?>-->
   <?php include 'navigation/fullSidebar_home.php'; ?>
<div class="container">
	<div class="row"> 
     	<div class="col-md-6 col-md-offset-0 col-xs-offset-1" style="margin-top: 2em;">
		<h1>Password Recovery</h1>
		<h3></h3>
		
		<p>Enter your email address below and a temporary password will be sent to your email account.</p>
		<form name='recover' onsubmit='return validateForm()' action="" method="post">
			<span>Email Address</span> 
			<br>
			<input id="loginemail" type="text" name="email">
			<br><br>
			<input type="submit" name="submit" class="redbutton" value="Send My Temporary Password">
		</form>
		
		<br>
		
		<?php echo '<p style="color:blue;">'.$msg.'</p>'; ?>
		</div> <!-- end column1 -->
	<div class="row row-centered" style="margin-top: 2em;">
	<div class="center-block" style="margin-top: 2em;">	
	<div class="col-xs-6 ">
			<img src="images/laptop-keyboard.jpg" width="404" alt="Laptop Keyboard">
		</div> <!-- end column2 -->
	</div>
	</div>
	</div>
	</div>
	 <!-- end content -->
	<div style="height:180px;"></div>
	<br>
	</div>
	<?php include 'footer.php' ; ?>	
<!-- end container -->
</body>
</html>