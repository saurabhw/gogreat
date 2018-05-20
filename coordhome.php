<?php
session_start();
if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>GreatMoods | Coordinator Account Home</title>
		<link href="css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
		<link href="css/headerSampleWebsiteStyles.css" rel="stylesheet" type="text/css">
		<link href="css/setupFormStyles.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="container">
			<div id="headerMain"> <img id="banner" src="<?php echo $banner_path;?>" width="1024" height="150" alt="banner placeholder" /> 
				<div id="menuWrapper"> </div>
				<div id="login">
					<?php
						if(!isset($_SESSION['LOGIN']) || $_SESSION['LOGIN'] == "FALSE") {
							echo '<form id="log" action="includes/logInUser.php" method="post">';
							echo '<label class="user" id="user">Username: </label>
								<input type="text" name="email" id="user" value="">';
							echo '<label class="user" id="user"> Password: </label>
								<input type="password" name="password" id="password" value="" >';
							echo '<input class="user" id="user" name="login" type="submit" value="login" />';
							echo '</form>';
							echo '<div id="register">';
							echo '<p class="forgotpw"><a href="">Forgot Password?</a><br />';
							echo '<a href="">Register Now</a></p>';
							echo '</div>';   
						} 
						elseif($_SESSION['LOGIN'] == "TRUE") {
							include('includes/logout.inc.php');
						}
					?>
				</div> <!--end login--> 
				<div id="mainNav">
					<ul id="menuSample">
						<li><a href="index.php">GreatMoods <br/>Homepage</a></li>
						<li><a href="basketsproducts.php">Gift Baskets<br>& Products</a></li>
						<li><a href="fundgettingstarted.php?group=<?php echo $groupID; ?>">Getting<br>Started</a></li>
						<li><a href="fundwebsite.php?group=<?php echo $groupID; ?>">Setup/Edit<br>Website</a></li>
						<li><a href="fundmembers.php?group=<?php echo $groupID; ?>">Setup/Edit<br>Members</a></li>
						<li><a href="fundemails.php?group=<?php echo $groupID; ?>">Setup/Edit<br>Emails</a></li>
						<li><a href="fundhelp.php?group=<?php echo $groupID; ?>">Help</a></li>
					</ul>
				</div> <!--end mainNav-->
			</div> <!--end headerMain-->
			<link href="css/leftSidebarNav.css" rel="stylesheet" type="text/css">
			<div id="leftSideBarSample">
				<ul id="sideNavSample">
					<li><a href="club_website_TQ.php?group=<?php echo $groupID; ?>"><em>Fundraiser<br>Homepage</em></a></li>
					<li>About Our Fundraiser</li>
					<li>Gift Baskets & Products<br>Order Now!</li>
					<li>Fundraising Contacts</li>
					<li>Help<br>Training Tips,<br>Tools & Forms</li>
					<li><a href="#">My Account</a></li>
				</ul>
			</div>
			<div id="contentMain858">
				<br>
				<h3>Welcome [Coordinator]!</h3>
				<h5>My Fundraiser Members</h5>
				<div class="distributor1">
					<table id="contacts">
						<tr>
							<th align="left"><b>Position<br>Title</b></th>
							<th align="left"><b>First<br>Name</b></th>
							<th align="left"><b>Last<br>Name</b></th>
							<th align="left"><b>Email<br>Address</b></th>
							<th align="left"><b>Phone<br>Number</b></th>
							<th align="left"><b>Amount<br>Raised</b></th>
						</tr>
						<tr>
							<td>Student Leader</td>
							<td>Sarah</td>
							<td>Vogley</td>
							<td>sarah.vogley@email.com</td>
							<td>123-321-4567</td>
							<td>$175.00</td>
							<td>Edit</td>
							<td>Delete</td>							
						</tr>
						<tr>
							<td>Student </td>
							<td>Tom</td>
							<td>Halverson</td>
							<td>tom.halverson@email.com</td>
							<td>987-654-3210</td>
							<td>$150.00</td>
							<td>Edit</td>
							<td>Delete</td>							
						</tr>
						<tr>
							<td>Student </td>
							<td>Eric</td>
							<td>Thompson</td>
							<td>eric.thompson@email.com</td>
							<td>741-852-9630</td>
							<td>$195.00</td>
							<td>Edit</td>
							<td>Delete</td>							
						</tr>
				</table>
				</div>
				<p>&nbsp;</p>
				<div class="nav3">
					<ul class="setupNav">
						<li><a href="fundtype.php"><<&nbsp;Previous</a></li>
						<li>|</li>
						<li><a href="information.php">Next&nbsp;>></a></li></ul>
						<p>&nbsp;</p>
				</div>
			</div> <!--end content-->
			<div class="clearfloat">
			</div>
			<?php include 'footer.php' ; ?>
		</div> <!--end container-->
	</body>
</html>