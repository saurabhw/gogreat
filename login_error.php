<?php
	session_start();
	ob_start();
?>

<!DOCTYPE HTML>
<head>
	<title>GreatMoods Homepage</title>
</head>

<body>
<div id="container">
  <?php include 'includes/header.inc.php'; ?>
  <?php include 'navigation/leftSidebarNavHomepage.nav.php'; ?>
  
  <div id="content">
	<div id="column1">
		<h1>OOPS!</h1>
		<h3>Your Username or Password are Incorrect</h3>

		<div class="graybackground">
			<h5>Please Try Again...</h5>
			<form action="logInUser.php" method="post" enctype="multipart/form-data">
				<table id="contactus">
					<tr>
						<td><label class="right">Username</label></td>
						<td><input id="loginemail" type="text" name="email" value=""></td>
					</tr>
					<tr>
						<td><label class="right">Password</label></td>
						<td><input id="password2" type="password" name="password" value=""></td>
					</tr>
					<tr>
						<td> </td>
						<td>
							<input id="" type="submit" name="submit" class="redbutton" value="Login">
							<a href="recover.php"><input class="user redbutton" name="passrec" type="button" value="Forgot Password" /></a>
						</td>
					</tr>
				</table>
			</form>
		</div> <!-- end graybackground -->
	</div> <!-- end column1 -->
		
	<div id="column2">
		<img src="images/girlpointatcomputer-flipped.jpg" width="404" alt="girl pointing to computer">
	</div> <!-- end column2 -->
	
	<br>
  </div>  <!--end content-->
  
  <?php include 'footer.php' ; ?>
</div><!--end container-->
</body>

<?php
ob_end_flush();
?>