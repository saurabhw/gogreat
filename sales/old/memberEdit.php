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
   $user = $_GET['group'];
   $userID = $_SESSION['userId'];
   if(isset($_POST['submit']))
   {
       $message = '';
       $fname = mysqli_real_escape_string($link, $_POST['fname']);
       $lname = mysqli_real_escape_string($link, $_POST['lname']);
       $phone = mysqli_real_escape_string($link, $_POST['phone']);
       $email = mysqli_real_escape_string($link, $_POST['email']);
       $about = mysqli_real_escape_string($link, $_POST['description']);
       $g = mysqli_real_escape_string($link, $_POST['goal']);
       $face = mysqli_real_escape_string($link, $_POST['fb']);
       $twit = mysqli_real_escape_string($link, $_POST['twitter']);
       $fid = mysqli_real_escape_string($link, $_POST['group']);
       $ttl = mysqli_real_escape_string($link, $_POST['title']);
       $gnd = mysqli_real_escape_string($link, $_POST['gender']);
       $pt = mysqli_real_escape_string($link, $_POST['parent']);
       $user_info_id = mysqli_real_escape_string($link, $_POST['user_info']);
      
       $photo = $_FILES['uploaded_file']['tmp_name'];
       $photoPath = "";
       $imageDirPath = '../images/dealers/';
       $user = $_GET['group'];
       //$infoID = $_SESSION['userId'];
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
		$photoPath = process_image('uploaded_file',$fid, $photo, $imageDirPath);
		if($photoPath !=''){
		$query1 = "UPDATE user_info SET picPath = '$photoPath' WHERE userInfoId = '$user_info_id'";
			mysqli_query($link, $query1);
		
		$query = "UPDATE $table SET contact_pic = '$photoPath' WHERE loginid = '$fid'";
			mysqli_query($link, $query);
			}
		}     
       
       // Submit to Dealers table
       $query4 = "UPDATE Dealers SET
       About = '$about',
       facebook  = '$face',
       twitter	= '$twit'
       WHERE loginid = '$fid'";
       $result4 = mysqli_query($link, $query4)or die("MySQL ERROR query 4: ".mysqli_error($link));
       
       // Submit to orgMembers table
       $query5 = "UPDATE orgMembers SET
       Title = '$ttl',
       orgFName = '$fname',
       orgLName = '$lname',
       orgPhone	= '$phone'
       WHERE fundraiserID = '$fid'";
       $result5 = mysqli_query($link, $query5)or die("MySQL ERROR query 5: ".mysqli_error($link));  
       
       // Submit to user_info table
       $query6 = "UPDATE user_info SET
       FName = '$fname',
       LName = '$lname',
       fbPage = '$face',
       twitter = '$twit',
       workPhone = '$phone',
       title = '$ttl',
       gender = '$gnd'
       WHERE userInfoId = '$user_info_id'";
       $result6 = mysqli_query($link, $query6)or die("MySQL ERROR query 6: ".mysqli_error($link));
       if($result4 && $result5 && $result6)
       {
          header( 'Location: editMembers.php?group='.$pt ); 
       } 
       
       
   }//end post submit
   
   //$groupID = $_SESSION['groupid']; 
   
   $query1 = "SELECT * FROM $table WHERE loginid='$user'";
   $result1 = mysqli_query($link, $query1)or die ("couldn't execute query on query 1.".mysql_error());
   $row1 = mysqli_fetch_assoc($result1);
   $fundraiserid = $row1['loginid'];
   $fgoal = $row1['FundraiserGoal'];
   $fstart = $row1['FundraiserStartDate'];
   $fend = $row1['FundraiserEndDate'];
   $groupName = $row1['Dealer'];
   $club = $row1['DealerDir'];
   //$parent = $row1['setuppersonid'];
   //$group = $row1['loginid'];
   $myPic = $row1['contact_pic'];
   $groupPic = $row1['group_team_pic'];
   $banner_path = $row1['banner_path'];
   //$_SESSION['fundid'] = $fundraiserid;
   //$_SESSION['banner'] = $banner_path;
   //$fc = $row1["facebook"];
   //$tw = $row1["twitter"];
   $ab = $row1['About'];
   
   //get user data
   $query2 = "SELECT * FROM orgMembers WHERE fundraiserID = '$user'";
   $result2 = mysqli_query($link, $query2)or die ("couldn't execute query on query 2.".mysql_error());
   $row2 = mysqli_fetch_assoc($result2);
   $org_email = $row2['orgEmail'];
   $parent = $row2['fund_owner_id'];
   
   //$tle = $row2['Title'];
    
   //get members info
   $query3 = "SELECT * FROM user_info WHERE email ='$org_email'";
   $result3 = mysqli_query($link, $query3)or die ("couldn't execute query on query 3.".mysql_error());
   $row3 = mysqli_fetch_assoc($result3);
   $memberInfoID = $row3['userInfoID'];
   $ttl = $row3['title'];
   $gnd = $row3['gender'];
   $infoEmail = $row3['email'];
   $memberPic = $row3['picPath'];
   $first_name = $row3['FName'];
   $last_name = $row3['LName'];
   $tel = $row3['workPhone'];
   $fc = $row3["fbPage"];
   $tw = $row3["twitter"];
      
   //get logged in rep id
   $queryZ = "SELECT * FROM user_info WHERE userInfoID = '$userID'";
   $resultZ = mysqli_query($link, $queryZ)or die ("couldn't execute query.".mysql_error());
   $rowZ = mysqli_fetch_assoc($resultZ);
   $myPic = $rowZ['picPath'];
 
   
?>
<!DOCTYPE html>
<head>
	<title>GreatMoods | Edit Member Account</title>
</head>

<body>
<div id="container">		
	<?php include 'header.inc.php' ; ?>
      <?php include 'sidenav.php' ; ?>
	
	<div id="content">
		<h1>Edit Member Account</h1>
		<h3>Edit 
		<?php 
	         echo $first_name;
		?>'s Account Information Below</h3>
		
		<form action="memberEdit.php" method="POST" name="myForm" enctype="multipart/form-data" id="myForm" onSubmit="return validate(this);">
		<div class="table">
			<div class="interim-form">
			<div class="interim-header"><h2>Contact Information</h2></div>
				<div class="row"> <!-- titles -->									
					<span id="hd_fname">First</span>
					<span id="hd_lname">Last</span>
				</div> <!-- end row -->
				<div class="row"> <!-- inputs -->
					<input id="fname" type="text" name="fname" value="<? echo $first_name;?>">
					<input id="lname" type="text" name="lname" value="<? echo $last_name;?>">
				</div> <!-- end row -->
				
				<div class="row">
					<span id="hd_title">Title</span>
					<span id="hd_gender">Gender</span>
				</div> <!-- end row -->
				<div class="row">
					<input id="title" type="text" name="title" value="<? echo $ttl; ?>">
					<select id="gender" name="gender">
					<option value="<?php echo $gnd; ?>" selected><?php echo $gnd; ?></option>
						<option value="Male">Male</option>
						<option value="Female">Female</option>
					</select>
				</div> <!-- end row -->
				
				<div class="row"> <!-- titles -->									
					<span id="hd_wphone">Primary Phone</span>
				</div> <!-- end row -->
				<div class="row"> <!-- inputs -->
					<input id="phone" type="text" name="phone" value="<? echo $tel;?>" maxlength="14">
				</div> <!-- end row -->
			</div> <!-- end contact info -->
			
			<div class="interim-form"> <!-- account login tab -->
				<div class="interim-header"><h2>Account Login</h2></div>
				<div class="row"> <!-- title -->
					<span id="hd_loginemail">Email Address</span>
				</div> <!-- end row -->
				<div class="row"> <!-- input -->
					<input id="loginemail" type="text" name="email" value="<? echo $org_email;?>" readonly="readonly">
				</div> <!-- end row -->
				
				<div class="row"> <!-- titles -->
				<br />
				<p><b>Editing user email address is not allowed.</b></p>
				</div> <!-- end row -->
			
			</div> <!-- end account login -->
			
			<div class="interim-form"> <!-- fundraiser info tab -->
				<div class="interim-header"><h2>Fundraiser Information</h2></div>
				<div class="row"> <!-- title -->
					<span id="hd_loginemail">About Your Fundraiser</span>
				</div> <!-- end row -->
				<div class="row"> <!-- input -->
					<textarea name="description" cols="40" rows="6" id="description"><? echo $ab;?></textarea>
				</div> <!-- end row -->
				
				<div class="row"> <!-- titles -->
				<!--<span id="hd_fundgoal">Fundraising Goal</span>-->
				</div> <!-- end row -->
				<!--<div class="row"> --><!-- inputs -->
					<!--$ <input id="fundgoal" type="text" name="goal" value="<? echo $fgoal;?>"/>
				</div> --><!-- end row -->
			</div> <!-- end fund info -->
			
			<div class="interim-form"> <!-- social media tab4 -->
				<div class="interim-header"><h2>Social Media Connections</h2></div>
				<div class="row"> 
					<span id="hd_fb" title="Facebook Name or Profile URL">Facebook</span>
					<input type="url" id="fb"  name="fb" value="<? echo $fc;?>" placeholder="www.facebook.com/user">
				</div> <!-- end row -->
				<br>
				<div class="row"> 
					<span id="hd_tw" title="Twitter Username or Profile URL">Twitter</span>
					<input type="url" id="tw" name="twitter" value="<? echo $tw;?>" placeholder="www.twitter.com/user">
				</div> <!-- end row -->
				<!--<div class="row"> 
					<span id="hd_li" title="LinkedIn Username or Profile URL">LinkedIn</span>
					<input type="url" id="li" name="lindkedin" value="">
				</div>--> <!-- end row -->
				<!--<div class="row"> 
					<span id="hd_pn" title="Pintrest Username or Profile URL">Pintrest</span>
					<input type="url" id="pn" name="printrest" value="">
				</div>--> <!-- end row -->
				<!--<div class="row">
					<span id="hd_gp" title="Google+ Username or Profile URL">Google+</span>
					<input type="url" id="gp" name="googleplus" value="">
				</div>--> <!-- end row -->
			</div> <!-- end tab4 content (social media) -->
			
			<div class="interim-form">
				<div class="interim-header"><h2>Profile Photo</h2></div>
				<div class="row"> 
					<span>Upload Profile Photo:</span>
					<input type="file" name="uploaded_file">
					
					<br>
					<i>(Acceptable formats for photos are .jpg or .png files)</i>
				</div> <!-- end row -->
				<br>
				<div class="row"> 
					<span>Current Photo: </span> <br>
					<img class="preview" src="../<? echo $memberPic; ?>" alt="Profile Pic" />
				</div> <!-- end row -->
			</div> <!-- end tab5 content -->
		
			<br>
			
			<div class="row">
				<input name="group" type="hidden" value="<?php echo $user; ?>">
				<input name="parent" type="hidden" value="<?php echo $parent; ?>">
				<input name="user_info" type="hidden" value="<?php echo $memberInfoID; ?>">
				<input name="submit" type="submit" class="redbutton" value="Save All Changes">
			</div> <!-- end row -->
			
		</div> <!-- end table -->
		</form>
		
		<p><?php echo '<p style="color:blue;">'.$message.'</p>'; ?></p>
				
		</div><!--end content-->
		<?php include 'footer.php' ; ?>
	</div> <!--end container-->
</body>
</html>