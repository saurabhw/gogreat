<?
   session_start();
   if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
   include '../includes/connection.inc.php';
   $link = connectTo();
   $table = "Dealers";
   $table1 = "orgMembers";
   $table2 = "user_info";
   $user = $_SESSION['email']; 
   $query1 = "SELECT * FROM $table WHERE userName='$user'";
   $result1 = mysqli_query($link, $query1)or die ("couldn't execute query on query 1.".mysql_error());
   $row1 = mysqli_fetch_assoc($result1);
   $fundraiserid = $row1['loginid'];
   $who = $row1=['userName'];
   $fgoal = $row1['FundraiserGoal'];
   $fstart = $row1['FundraiserStartDate'];
   $fend = $row1['FundraiserEndDate'];
   $groupName = $row1['Dealer'];
   $club = $row1['DealerDir'];
   $group = $row1["loginid"];
   $myPic = $row1['leader_pic'];
   $banner_path = $row1['banner_path'];
   $_SESSION['fundid'] = $fundraiserid;
   $_SESSION['banner'] = $banner_path;
   $fc = $row1["facebook"];
   $tw = $row1["twitter"];
   $ab = $row1["About"];
   
   //get user data
   $query3 = "SELECT * FROM $table2 WHERE email='$user'";
   $result3 = mysqli_query($link, $query3)or die ("couldn't execute query on query 3.".mysql_error());
   $row3 = mysqli_fetch_assoc($result3);
   
   $first_name = $row3['FName'];
   $last_name = $row3['LName'];
   
   //get members
   $query2 = "SELECT * FROM $table1 WHERE fund_owner_id='$fundraiserid'";
   $result2 = mysqli_query($link, $query2)or die ("couldn't execute query on query 2.".mysql_error());
 
   
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>GreatMoods | Coordinator Account Home</title>
		<link href="../css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
		<link href="../css/headerSampleWebsiteStyles.css" rel="stylesheet" type="text/css">
		<link href="../css/setupFormStyles.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="container">
			<div id="headerMain"> <img id="banner" src="../<?php echo $_SESSION['banner'];?>" width="1024" height="150" alt="banner placeholder" /> 
				<div id="menuWrapper"> </div>
				<div id="login">
					<?php
						if(!isset($_SESSION['LOGIN']) || $_SESSION['LOGIN'] == "FALSE") {
							echo '<form id="log" action="../logInUser.php" method="post">';
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
							include('../includes/logout.inc.php');
						}
					?>
				</div> <!--end login--> 
				<div id="mainNav">
					<ul id="menuSample">
						<li><a href="../index.php">GreatMoods <br/>Homepage</a></li>
						<li><a href="../basketsproducts.php">Gift Baskets<br>& Products</a></li>
						<li><a href="../fundgettingstarted.php">Getting<br>Started</a></li>
						<li><a href="memberedit.php?groupid=<?echo $fundraiserid;?>">Setup/Edit<br>Website</a></li>
						<li><a href="emails.php?groupid=<?echo $fundraiserid;?>">Setup/Edit<br>Emails</a></li>
						<li><a href="fundhelp.php?groupid=<?php echo $fundraiserid;?>">Help</a></li>
					</ul>
				</div> <!--end mainNav-->
			</div> <!--end headerMain-->
			
			<br><br>
			<?php include 'memberSidebar.php' ; ?>
			
		<div id="contentMain858">
		      <div class="nav2">
                      <ul id="setupNav">
                      <li><a href="memberHome.php" class="infonav">Account Home</a></li>
                      <li>|</li>
                      <li><a href="#" class="infonav">Contacts</a></li>
                      <li>|</li>
                      <li><a href="emails.php?groupid=<?echo $group;?>" class="goalsnav">Send Emails</a></li>
                      </ul>
                      </div>
			  <br />

				<h3>Welcome <?php echo $_SESSION['firstName'];?></h3>
				<h5>Edit My Account</h5>
				<div class="photos">
				        
					<form action="" method="POST" name="reasons" enctype="multipart/form-data" id="" onSubmit="return validate(this);">
					<label>First Name</label>
					<br />
					<input type="text" name="fname" value="<? echo $first_name;?>" id="websiteURL" />
					<br />
					<br />
					<label>Last Name</label>
					<br />
					<input type="text" name="lname" value="<? echo $last_name;?>" id="websiteURL" />
					<br />
					<br />
					<label>Email Address</label>
					<br />
					<input type="text" name="email" value="<? echo $who;?>" id="websiteURL" />
					<br />
					<br />
					<label>About Your Fundraiser</label>
					<br />
					<textarea name="description" cols="50" rows="7" id="description"><? echo $ab;?></textarea>
					<br />
					<br />
					<label>Fundraising Goal</label>
					<br />
					<input type="text" name="goal" value="<? echo $fgoal;?>" id="websiteURL"  />
					<br />
					<br />
					<label>Facebook URL</label>
					<br />
					<input type="text" name="goal" value="<? echo $fc;?>" id="websiteURL"  />
					<br />
					<br />
					<label>Twitter URL</label>
					<br />
					<input type="text" name="goal" value="<? echo $tw;?>" id="websiteURL"  />
					<br />
					</div>

					<p><b>Personalize Your Webpage by Uploading a Photo:</b><br><i>(Acceptable formats for photos are .jpg or .png files)</i></p>
					<div class="photos">
			                  <table>
			                  <tr><td>
						<label for=""><b>Photo of Yourself:</b></label><br>
							<input name="" type="file" id="" />
							<br />
							<input name="" type="checkbox" id="" value="">
							<label for="">Remove Current Photo</label>
						
						</td>
						<td><img src="../<? echo $myPic; ?>" alt="My Photo" /></td>
						</tr>
						</table>
						<input name="group" type="hidden" value="<?php echo $group; ?>">
						<input name="submit" type="submit" value="Save">
					</form>
					</div>
				</div>
				
			 
			<?php include 'footer.php' ; ?>
		</div> <!--end container-->
		<p>
		<?php echo $message; ?>
		</p>
	</body>
</html>