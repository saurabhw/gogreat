<?php
session_start();
if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
ob_start();

include 'includes/connection.inc.php';
$link = connectTo();

$email = $_SESSION['email'];
$query = "SELECT * FROM orgMembers WHERE orgEmail = '$email'"; 
$result = mysqli_query($link, $query);
if($row = mysqli_fetch_assoc($result)){
    $groupID = $row['fundraiserID'];
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>GreatMoods | Member - Edit My Account</title>
		<link href="../css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
		<link href="css/headerSampleWebsiteStyles.css" rel="stylesheet" type="text/css">
		<link href="../css/setupFormStyles.css" rel="stylesheet" type="text/css" />
	</head>
	<body id="edit">
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
						<?if($_SESSION['LOGIN'] == "TRUE"){ echo '<li><a href="'.$_SESSION['home'].'" />My Account</a></li>';}?>
						<li><a href="fundhelp.php?group=<?php echo $groupID; ?>">Help</a></li>
					</ul>
				</div> <!--end mainNav-->
			</div> <!--end headerMain-->
			<link href="css/leftSidebarNav.css" rel="stylesheet" type="text/css">
			<div id="leftSideBarSample">
				<ul id="sideNavSample">
					<li><a href="fundSite.php?group=<?php echo $groupID; ?>"><em>Fundraiser<br>Homepage</em></a></li>
					<li>About Our Fundraiser</li>
					<li>Gift Baskets & Products<br>Order Now!</li>
					<li>Fundraising Contacts</li>
					<li>Help<br>Training Tips,<br>Tools & Forms</li>
					<li><a href="#">My Account</a></li>
				</ul>
			</div>
			<div>
				<h3>Welcome <?php echo $_SESSION['firstName'];?> !</h3>
				<h5>Edit My Account</h5>
				
				<div id="col1">
					<p><b>Personalize Your Webpage by Uploading a Photo:</b><br><i>(Acceptable formats for photos are .jpg or .png files)</i></p>
					<form class="photos" action="photos.php" method="POST" name="addPhotos" enctype="multipart/form-data" id="addPhotos" onSubmit="return validate(this);">
						<p><label for=""><b>Photo of Yourself:</b></label><br>
							<input name="" type="file" id="" />
							<input name="" type="checkbox" id="" value="">
							<label for="">Remove Current Photo</label>
						</p>
						<input name="group" type="hidden" value="<?php echo $group; ?>">
						<input name="submit" type="submit" value="Save">
					</form>
					<p>&nbsp;</p>
				</div> <!--end col1-->
				<div id="col2">
					<p><b>About Your Fundraiser:</b><br>
					<label>Reason(s) why you want to raise money</label></p>
					<form action="reasons.php" method="POST" name="reasons" enctype="multipart/form-data" id="" onSubmit="return validate(this);">
					<textarea name="description" cols="50" rows="7" id="description"><? echo $about;?></textarea>
					<br>
					<p>&nbsp;</p>
				</div> <!--end col2-->
			</div> 
			<?php include 'footer.php' ; ?>
		</div> <!--end container-->
		<p>
		<?php echo $message; ?>
		</p>
	</body>
</html>