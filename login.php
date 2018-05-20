<?php
session_start();
	include 'includes/connection.inc.php';
	$link = connectTo();
	
	
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
	<div id="container">
	<?php include 'includes/header.inc.php'; ?>
	<?php include 'navigation/leftSidebarNavHomepage.nav.php'; ?>
	
	<div id="content">
		<div id="column1">
		<h1>Account Login</h1>
		<h3></h3>
		
		
		<!--<form name='recover' onsubmit='return validateForm()' action="loginUser.php" method="post">
			<span>Email Address</span> 
			<br>
			<input id="loginemail" type="text" name="email">
			<br><br>
			
			<input type="submit" name="submit" class="redbutton" value="Login">-->
		<?	
	        $html = "<form action='logInUser.php' method='post'>";
		$html .= "email:<br /><input type='text' name='email' /><br />";
		$html .= "Password:<br /><input type='password' name='password' /><br />";
		$html .= "<input type='submit' value='Submit' class='redbutton' />";
		$html .= "</form>";
		echo $html;
		echo "<a href='recover.php' class='redbutton'>Forgot Password?</a>";
		
		echo "</div>";
		?>
		</form>
		
		<br>
		
		<?php echo '<p style="color:blue;">'.$msg.'</p>'; ?>
		</div> <!-- end column1 -->
		
		<!--<div id="column2">
			<img src="images/laptop-keyboard.jpg" width="404" alt="Laptop Keyboard" style="margin: 10px 0;">
		</div>  end column2 -->
	</div> <!-- end content -->
	
	<?php include 'footer.php' ; ?>	
	</div> <!-- end container -->
</body>
</html>