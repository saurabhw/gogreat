<?php
session_start();
if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
ob_start();

include '../includes/connection.inc.php';
$link = connectTo();

$user = $_SESSION['userId'];
$userName = $_SESSION['email'];
$query1 = "SELECT * FROM Dealers WHERE email='$userName'";
$result1 = mysqli_query($link, $query1)or die("MySQL ERROR query 1: ".mysqli_error($link));
$row = mysqli_fetch_assoc($result1);
$dealerID = $row['loginid'];
$group = $row['setuppersonid']; 


/*$email = $_SESSION['email'];
$query = "SELECT * FROM Dealers WHERE orgEmail = '$email'"; 
$result = mysqli_query($link, $query);
if($row = mysqli_fetch_assoc($result)){
    $groupID = $row['fundraiserID'];
    $banner_path = $row['banner_path'];
*/
?>
<!DOCTYPE html>
<head>
	<meta charset="UTF-8" />
	<title>GreatMoods | Member - Edit My Account</title>
	<link href="../css/layout_styles.css" rel="stylesheet" type="text/css" />
	<link href="../css/header_styles.css" rel="stylesheet" type="text/css">
	<link href="../css/sidenav_styles.css" rel="stylesheet" type="text/css">
	<link href="../css/addnew_form_styles.css" rel="stylesheet" type="text/css" />
</head>
	
<body>
<div id="container">
	<?php include 'header.php' ; ?>
	<?php include 'memberSidebar.php' ; ?>
	
			
	<div id="content">							
		<h1>Edit Account</h1>
		<h3></h3>
		
		 <?php if ($_POST && $suspect){ ?>
		    <p class="warning">Sorry, your mail could not be sent. Please try later.</p>
		    <?php } elseif ($missing || $errors) { ?>
		    <p class ="warning">Please fix the item(s) indicated.</p>
		 <?php } ?>
		 
		 <form class="" action="information.php" method="POST" name="addOrg" enctype="multipart/form-data" id="addOrg" onSubmit="return validate(this);">
		
		<div class="interim-form">
		<div class="interim-header"><h2>Contact Information</h2></div>
			<div class="tablerow"> <!-- titles -->									
				<span id="hd_fname">First</span>
				<span id="hd_lname">Last</span>
			</div> <!-- end row -->
			<div class="tablerow"> <!-- inputs -->
				<input id="fname" type="text" name="groupName" value="<? echo  $group_name;?>">
				<input id="lname" type="text" name="groupName" value="<? echo  $group_name;?>">
			</div> <!-- end row -->
		</div> <!-- end contact info -->
		
		<div class="interim-form"> <!-- account login tab -->
			<div class="interim-header"><h2>Account Login</h2></div>
			<div class="tablerow"> <!-- title -->
				<span id="hd_loginemail">Email Address</span>
			</div> <!-- end row -->
			<div class="tablerow"> <!-- input -->
				<input id="loginemail" type="text" name="email" value="" required>
			</div> <!-- end row -->
			
			<div class="tablerow"> <!-- titles -->
			<span id="hd_password">Password</span>
			<span id="hd_cpassword">Confirm Password</span>
			</div> <!-- end row -->
			<div class="tablerow"> <!-- inputs -->
				<input id="password" type="password" name="createPaypalPass">
				<input id="cpassword" type="password" name="confirmPaypalPass">
			</div> <!-- end row -->
		</div> <!-- end account login -->
		
		<div class="interim-form"> <!-- fundraiser info tab -->
			<div class="interim-header"><h2>Fundraiser Information</h2></div>
			<form action="reasons.php" method="POST" name="reasons" enctype="multipart/form-data" id="" onSubmit="return validate(this);">
				<div class="tablerow"> <!-- title -->
					<span id="hd_loginemail">About Your Fundraiser</span>
				</div> <!-- end row -->
				<div class="tablerow"> <!-- input -->
					<textarea name="description" cols="40" rows="6" id="description"><? echo $about;?></textarea>
				</div> <!-- end row -->
			</form>
			
			<div class="tablerow"> 
				<span id="hd_url" title="">Current Website URL</span>
			</div> <!-- end row -->
			<div class="tablerow"> 
				<input type="url" id="websiteURL"  name="websiteURL" value="<? echo $url; ?>" placeholder="www.yourcurrentwebsite.com" required>
			</div> <!-- end row -->
		</div> <!-- end fund info -->
		
		<div class="interim-form"> <!-- social media tab4 -->
			<div class="interim-header"><h2>Social Media Connections</h2></div>
			<div class="tablerow"> 
				<span id="hd_fb" title="Facebook Name or Profile URL">Facebook</span>
				<input type="url" id="facebookURL"  name="facebookURL" value="<? echo $face; ?>" placeholder="www.facebook.com/user">
			</div> <!-- end row -->
			<br>
			<div class="tablerow"> 
				<span id="hd_tw" title="Twitter Username or Profile URL">Twitter</span>
				<input type="url" id="twitterURL" name="twitterURL" value="<? echo $twitter; ?>" placeholder="www.twitter.com/user">
			</div> <!-- end row -->
			<!--<div class="tablerow"> 
				<span id="hd_li" title="LinkedIn Username or Profile URL">LinkedIn</span>
				<input type="url" id="li" name="lindkedin" value="">
			</div>--> <!-- end row -->
			<!--<div class="tablerow"> 
				<span id="hd_pn" title="Pintrest Username or Profile URL">Pintrest</span>
				<input type="url" id="pn" name="printrest" value="">
			</div>--> <!-- end row -->
			<!--<div class="tablerow">
				<span id="hd_gp" title="Google+ Username or Profile URL">Google+</span>
				<input type="url" id="gp" name="googleplus" value="">
			</div>--> <!-- end row -->
		</div> <!-- end tab4 content (social media) -->
		
		<div class="interim-form">
			<div class="interim-header"><h2>Profile Photo</h2></div>
			<form class="photos" action="photos.php" method="POST" name="addPhotos" enctype="multipart/form-data" id="addPhotos" onSubmit="return validate(this);">
				<div class="tablerow"> 
					<span>Upload Profile Photo:</span>
					<input name="" type="file" id="" />
					<input name="" type="checkbox" id="" value="">
					<label for="">Remove Current Photo</label>
					<br>
					<i>(Acceptable formats for photos are .jpg or .png files)</i>
					<br><br>
					<input name="group" type="hidden" value="<?php echo $group; ?>">
					<input name="submit" type="submit" class="redbutton" value="Save Photo">
				</div> <!-- end row -->
				<br>
				<div class="tablerow"> 
					<span>Current Photo: </span> <br>
					<img class="preview" src="../<? echo $myPic; ?>" alt="Profile Pic">
				</div> <!-- end row -->
			</form>
		</div> <!-- end tab5 content -->

	          <br>
	          <a href="reasons.php?groupid=<?echo $fundraiserid;?>">
	         <input name="setup_person" type="hidden" value="<?php echo $userID;?>">
	         <input name="groupID" type="hidden" value="<?php echo $fundraiserid;?>"> 
	         <input name="submit" type="submit" class="redbutton" value="Save and Continue">
	         </a>
		  <br><br>
		  
		</div> <!-- end content -->
			
	<?php include 'footer.php' ; ?>
	</div> <!--end container-->
	<p><?php echo $message; ?></p>
</body>
</html>