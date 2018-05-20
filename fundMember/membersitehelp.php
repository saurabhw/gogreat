<?php
   session_start();
   if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
   include '../includes/connection.inc.php';
   include('../samplewebsites/imageFunctions.inc.php');
   $link = connectTo();
   $table = "Dealers";
   $table1 = "orgMembers";
   $table2 = "user_info";
   if(isset($_POST['submit']))
   {
       $message = '';
       $fname = mysqli_real_escape_string($link, $_POST['fname']);
       $lname = mysqli_real_escape_string($link, $_POST['lname']);
       $phone = mysqli_real_escape_string($link, $_POST['phone']);
       $email = mysqli_real_escape_string($link, $_POST['email']);
       $about = mysqli_real_escape_string($link, $_POST['description']);
       $g = mysqli_real_escape_string($link, $_POST['goal']);
       $face = mysqli_real_escape_string($link, $_POST['face']);
       $twit = mysqli_real_escape_string($link, $_POST['twit']);
       $fundraiserid = $_POST['group'];
       $photo = $_FILES['photo']['tmp_name'];
       $photoPath = "";
       $imageDirPath = '../images/dealers/';
       $infoID = $_SESSION['userId'];
       /**  process_image
	  **	This function will first verify if the file uploaded is an image file.
	  **	Next, the image will save the file in the desired directory in a folder labeled with the ID from the parameter.
	  **      Last, the directory path to the image is returned so it can be saved to the database.
	  **/
	  function process_image($name, $id, $tmpPic, $baseDirPath){

		$cleanedPic = checkName($_FILES["$name"]["name"]);	
		if(!is_image($tmpPic)) {
    			// is not an image
    			$message .= $cleanedPic . " is not an image file. <br />";
    		} else {
    			if($_FILES['$name']['error'] > 0) {
				$message .= $_FILES['$name']['error'] . "<br />";
			} else {
				
				if (file_exists($baseDirPath.$id."/".$cleanedPic)){
					$imagePath = "images/dealers/".$id."/".$cleanedPic;
				} else {
					$picDirectory = $baseDirPath;
					
					
					if (!is_dir($picDirectory.$id)){
						mkdir($picDirectory.$id);
						
					}
					$picDirectory = $picDirectory.$id."/";
					move_uploaded_file($tmpPic, $picDirectory . $cleanedPic);
					$message .= "$cleanedPic uploaded.<br />";
					$imagePath = "images/dealers/".$id."/".$cleanedPic;
					
					
				}// end third inner else
				return $imagePath;
			} // end first inner else
		      } // end else
	     }// end process_image
	// Add photo to images/dealers/<loginid>/<file>
	// Add path to photo to leader_pic in Dealers table
	if($photo != ''){
		$photoPath = process_image('photo',$fundraiserid, $photo, $imageDirPath);
		if($photoPath !=''){
			$query = "UPDATE $table SET leader_pic = '$photoPath' WHERE loginid = '$fundraiserid'";
			mysqli_query($link, $query);
			}
		}     
       
       // Submit to Dealers table
       $query4 = "UPDATE $table SET
       About = '$about',
       FundraiserGoal = '$g',
       facebook  = '$face',
       twitter	= '$twit'
       WHERE loginid = '$fundraiserid'";
       $result4 = mysqli_query($link, $query4)or die("MySQL ERROR query 4: ".mysqli_error($link));
       
       // Submit to orgMembers table
       $query5 = "UPDATE $table1 SET
       orgFName = '$fname',
       orgLName = '$lname',
       orgPhone	= '$phone'
       WHERE fundraiserID = '$fundraiserid'";
       $result5 = mysqli_query($link, $query5)or die("MySQL ERROR query 5: ".mysqli_error($link));  
       
       // Submit to user_info table
       $query6 = "UPDATE $table2 SET
       FName = '$fname',
       LName = '$lname',
       homePhone = '$phone'
       WHERE userInfoID = '$infoID'";
       $result6 = mysqli_query($link, $query6)or die("MySQL ERROR query 6: ".mysqli_error($link));  
   }
   $userName = $_SESSION['email'];
   $query1 = "SELECT * FROM Dealers WHERE loginid='$_COOKIE[dealer]' AND email='$userName'";
   $result1 = mysqli_query($link, $query1)or die ("couldn't execute query on query 1.".mysql_error());
   $row1 = mysqli_fetch_assoc($result1);
   $fundraiserid = $row1['loginid'];
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
   $query2 = "SELECT * FROM $table1 WHERE fundraiserID='$fundraiserid'";
   $result2 = mysqli_query($link, $query2)or die ("couldn't execute query on query 2.".mysql_error());
   $row2 = mysqli_fetch_assoc($result2);
   
   $first_name = $row2['orgFName'];
   $last_name = $row2['orgLName'];
   $tel = $row2['orgPhone'];
   
   //get members
   $query3 = "SELECT * FROM $table1 WHERE fund_owner_id='$fundraiserid'";
   $result3 = mysqli_query($link, $query3)or die ("couldn't execute query on query 3.".mysql_error());
 
   
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>GreatMoods | Member Account Home</title>
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
						<li><a href="../index.php">GreatMoods<br>Homepage</a></li>
						<li><a href="../basketsproducts.php">Gift Baskets<br>& Products</a></li>
						<li><a href="gettingstarted.php">Getting<br>Started</a></li>
						<li><a href="memberHome.php?groupid=<?echo $fundraiserid;?>">Setup/Edit<br>Website</a></li>
						<li><a href="emails.php?groupid=<?echo $fundraiserid;?>">Setup/Edit<br>Emails</a></li>
						<li><a href="membersitehelp.php?groupid=<?php echo $fundraiserid;?>">Help</a></li>
					</ul>
				</div> <!--end mainNav-->
			</div> <!--end headerMain-->
			
			<link href="../css/leftSidebarNav.css" rel="stylesheet" type="text/css">
			<div id="leftSideBarSample">
				<ul id="sideNavSample">
					<li><a href="../membersite.php?groupid=<? echo $_SESSION['fundid'];?>">View Website</a></li>
					<li>About Our Fundraiser</li>
					<li>Gift Baskets<br>& Products<br>Order Now!</li>
					<li>Fundraising Contacts</li>
					<li><a href="membersitehelp.php?groupid=<?php echo $fundraiserid;?>">Help<br>Training Tips,<br>Tools & Forms</li>
					<li><a href="memberHome.php">My Account</a></li>
				</ul>
			</div>
			
			<div id="contentMain858"><br>
			
			
    <!--end nav2--> 
				
				
    		</br>
    		<h3>GreatMoods is here to help you Succeed!</h3>
			    <div id="column1">
<p>Setting up an Online Fundraiser for your entire Organization is probably a first for you and we know that. So here is what we suggest for the non-techie type of person.</p>
<p>1)	Download the Setup Word .doc below and just fill in the information after each question and save the document and send it to us. Greatmoods will set up the Fundraising for you.</p>
<p>2)	Attach any pictures you would like at your website and add/attach them to your same email to us.</p>
<p>3)	If at the same time you have your member list, download our Setup Excel file .exe and fill in the member names and add/attach them to your same email to us.</p>
<p>Greatmoods will set up your Main Website and your Member Websites and email a link back to you to get started.</p>
<p>PS:  A final suggestion for the Teacher, Coach, Director, Head of the Fundraiser, and non-techie, Etc. find a couple Kids who have a computer for us to work with. Every Child with a Cell Phone or Facebook page could set up the whole Fundraiser in an evening and could maintain any part of your Fundraiser in their sleep.</p>

<p>E-mail any questions to: customerservice@greatmoods.com<p>
    
    </div>
    <!--end column1-->
    
    <div id="column2">
    <img src="../../images/rep-pages/3baskets.png" width="347" height="270">
    

      <!--end leadBox--> 
    </div>
    <!--end column2-->
    
<!--    <p>[“Next” Button] – links to What is the Greatmoods Product Line			[“Back to MainPage”]
												Button
</p>-->
 
        </div><!--end content-->
			<?php include 'footer.php' ; ?>
		</div> <!--end container-->
	</body>
</html>