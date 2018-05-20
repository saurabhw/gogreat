<?php 	
session_start();
include('includes/title.inc.php'); 
?>

<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<title>GreatMoods | Account Login<title>
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
<?php
	include "connectTo.php";
	$username = "";
	$password = "";
	$name = "";
	if($_SESSION['LOGIN'] == "TRUE") {
		$username = $_SESSION['username'];
		$password = $_SESSION['password'];
		$name = $_SESSION['name'];
		echo "</div>";
		echo "<script>location.href='index.php'</script>";
	} else {	
		$html = "<form action='logInUser.php' method='post'>";
		$html .= "email:<br /><input type='text' name='email' /><br />";
		$html .= "Password:<br /><input type='password' name='password' /><br />";
		$html .= "<input type='submit' value='Submit' />";
		$html .= "</form>";
		echo $html;
		echo "<p><a href='recover.html'>Forgot Password?</a></p>";
		echo "<p><a href='createUser.html'>Register</a></p>";
		echo "</div>";
	}
	
?>
</div><!--content-->
	</div><!--container-->
	</body></html>