<?php
      session_start();
      if(isset($_POST['submit1']))
       { 
          $_SESSION['role'] = "Member";
          $id = $_POST['acctid'];
          $club = $_POST['club'];
          $_SESSION['groupid'] = $id;
          $_SESSION['club'] = $club;
          $_SESSION['home'] = "fundMember/memberHome.php";
          
       }
     if(($_SESSION['role'] == 'MemberLeader' || $_SESSION['role'] == 'Member') && isset($_SESSION['authenticated']))
       {
          //authenicated
       }
       else
       {
            header('Location: ../index.php');
            exit;
       }
       
      
        include '../includes/connection.inc.php';
        require_once("../includes/functions.php");
        include('../samplewebsites/imageFunctions.inc.php');
        $userID = $_SESSION['userId'];
        $userEmail = $_SESSION['email'];
        $link = connectTo();
   	$table = "Dealers";
	$table1 = "user_info";
	$table2 = "users";
	$table3 = "orgMembers";
	$upload_msg = "Message: <br />";
	$userEmail = $_SESSION['email'];
	/*
        $userID = $_SESSION['userId'];
        
        $query1 = "SELECT * FROM Dealers WHERE email='$userName'";
        $result1 = mysqli_query($link, $query1)or die("MySQL ERROR query 1: ".mysqli_error($link));
        $row1 = mysqli_fetch_assoc($result1);
        $dealerID = $row1['loginid'];
        $group = $row1['setuppersonid']; 
       */
	// check if form has been submitted
	
	   if(isset($_POST['submit']))
           { 
	   $imageDirPath = $_SERVER['DOCUMENT_ROOT'].'/images/dealers/';
	   $tt = mysqli_real_escape_string($link, $_POST['title']);
	   $gd = mysqli_real_escape_string($link, $_POST['gender']);
	   $first_name = mysqli_real_escape_string($link, $_POST['fname']);
	   $last_name = mysqli_real_escape_string($link, $_POST['lname']);
	   $email_address = mysqli_real_escape_string($link, $_POST['email']);
	   $descript = mysqli_real_escape_string($link, $_POST['description']);
	   $phone = mysqli_real_escape_string($link, $_POST['phone']);
	   $f_address =  $_POST['first_email'];
	   $face = mysqli_real_escape_string($link, $_POST['face']);
	   $twitter = mysqli_real_escape_string($link, $_POST['twit']);
	   $group = mysqli_real_escape_string($link, $_POST['groupID']);
	   $set_up = mysqli_real_escape_string($link, $_POST['setup_person']);
	   $memberPhoto = $_FILES['memberphoto']['tmp_name'];
	   $memberPhotoPath = "";
	   $uid = $_SESSION['userId'];
	   $fgoal = mysqli_real_escape_string($link, $_POST['goal']);
	   
	     function process_image($name, $id, $tmpPic, $baseDirPath){

		$cleanedPic = checkName($_FILES["$name"]["name"]);	
		if(!is_image($tmpPic)) {
    			// is not an image
    			$upload_msg .= $cleanedPic . " is not an image file. <br />";
    		} else {
    			if($_FILES['$name']['error'] > 0) {
				$upload_msg .= $_FILES['$name']['error'] . "<br />";
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
					$upload_msg .= "$cleanedPic uploaded.<br />";
					$imagePath = "images/dealers/".$id."/".$cleanedPic;
					
					
				}// end third inner else
				return $imagePath;
			} // end first inner else
		      } // end else
	     }// end process_image
	     
		       
			
			/*
			$queryh = "UPDATE $table2 SET 
			           username = '$email_address'
			           WHERE username = '$f_address'";
			$result3 = mysqli_query($link, $queryh)or die("MySQL ERROR: $result3".mysqli_error($link));
			*/
	     if($memberPhoto != ''){
		$memberPhotoPath = process_image('memberphoto',$group, $memberPhoto, $imageDirPath); 
		$queryg = "UPDATE $table1 SET 
			           FName = '$first_name',
			           LName = '$last_name',
			           homePhone = '$phone',
			           picPath = '$memberPhotoPath',
			           title = '$tt',
			           gender = '$gd'
			           WHERE userInfoID = '$uid'";
			$result2 = mysqli_query($link, $queryg)or die("MySQL ERROR: $result2".mysqli_error($link));
		
		$queryp = "UPDATE $table SET 
		                   About = '$descript',
		                   FundraiserGoal = '$fgoal',
		                   Phone = '$phone', 
			           facebook  = '$face',
  				   twitter   = '$twitter',
  				   contact_pic = '$memberPhotoPath'
			           WHERE loginid = '$group'";
			           
		$queryd = "UPDATE $table SET 
		                   Phone = '$phone', 
			           facebook  = '$face',
  				   twitter   = '$twitter',
  				   contact_pic = '$memberPhotoPath'
			           WHERE userName = '$userEmail'";
		
		}
		else
		{
		$queryg = "UPDATE $table1 SET 
			           FName = '$first_name',
			           LName = '$last_name',
			           homePhone = '$phone',
			           title = '$tt',
			           gender = '$gd'
			           WHERE userInfoID = '$uid'";
			$result2 = mysqli_query($link, $queryg)or die("MySQL ERROR: $result2".mysqli_error($link));
		$queryp = "UPDATE $table SET 
		                   About = '$descript',
		                   FundraiserGoal = '$fgoal',
			           facebook  = '$face',
  				   twitter   = '$twitter'
			           WHERE loginid = '$group'";
			           
	         $queryd = "UPDATE $table SET
	                           Phone = '$phone',
			           facebook  = '$face',
  				   twitter   = '$twitter'
			           WHERE userName = '$userEmail'";		           
	        }
			$result1 = mysqli_query($link, $queryp)or die("MySQL ERROR: $result1".mysqli_error($link));
			$resultO = mysqli_query($link, $queryd)or die("MySQL ERROR: $resultO".mysqli_error($link));
			
			
			
			$queryt = "UPDATE $table3 SET
			            Title = '$tt',
			            orgFName = '$first_name',
			            orgLName = '$last_name',
			            orgPhone = '$phone'
			            WHERE orgEmail = '$userEmail'";
			$result4 = mysqli_query($link, $queryt)or die("MySQL ERROR: $result4".mysqli_error($link));
			
			if($result1 && $result2 && $result4 && $resultO)
			//if($result3 )
			{
  	                   //$redirect = "Location:editMembers.php?groupid=$set_up";
  	                   //header("$redirect");
  	                }	
  			
  		}		
	
	$user = $_SESSION['groupid'];

	//$_SESSION['groupid'] = $_GET['group'];
        $query = "SELECT * FROM $table WHERE loginid = '$user'";
	$result = mysqli_query($link, $query)or die ("couldn't execute query.".mysqli_error($link));
	$row = mysqli_fetch_assoc($result);
	$fundraiserid = $row['loginid'];
        $url = $row['website'];
        $tw = $row['twitter']; 
        $fc = $row['facebook'];
        $user_name = $row['userName'];
        $user_pass = $row['firstPass'];
        $setup = $row['setuppersonid'];
        $ab = $row['About'];
        $fgoal = $row['FundraiserGoal'];
        $myPic = $row['contact_pic'];
        $first_mail = $row['userName'];
        $banner = $row['banner_path'];
        $first_pass = $row['firstPass'];
        
        //get parent info
        $getParent = "SELECT * FROM Dealers WHERE loginid = '$setup'";
        $pResult = mysqli_query($link, $getParent)or die ("couldn't execute parent query.".mysql1_error($link));
        $pRow = mysqli_fetch_assoc($pResult);
        $goal = $pRow['goal2'];
        
        $so_far = getSoloSales($fundraiserid);
        
        //get member data
        $query1 = "SELECT * FROM $table1 WHERE email='$userEmail'";
	$result1 = mysqli_query($link, $query1)or die ("couldn't execute query 1.".mysqli_error($link));
	$row1 = mysqli_fetch_assoc($result1);
	$first_name = $row1['FName'];
	$last_name = $row1['LName'];
	$em = $row1['email'];
	$tel = $row1['homePhone'];
	$gender = $row1['gender'];
	$ttl = $row1['title'];
      
        //determine if member is a leader
        $leaderQ = "SELECT * FROM leaders WHERE email = '$userEmail' AND fundID = '$setup'";
        $leaderResult = mysqli_query($link, $leaderQ)or die ("couldn't execute leader query.".mysqli_error($link));
        
 
   
?>
<!DOCTYPE html>
<head>
	<title>GreatMoods Member Account Home</title>
</head>

<body>
	<div id="container">
		<?php include 'header.php' ; ?>
		<?php include 'memberSidebar.php' ; ?>
		
		<div id="content">
		<h1 style="display:inline-block;">Account Home</h1>	
	       
		<!--<?php echo $fundraiserid; ?>-->
		
		<!--Place leader Badge here align far right of h1 tag-->
		<?php
		
		  if(mysqli_num_rows($leaderResult) > 0)
		  {
		    //member is leader get user name and pass from parent group
		    $getPass = "SELECT * FROM Dealers WHERE loginid = '$setup'";
		    $end = mysqli_query($link, $getPass)or die ("couldn't execute get pass query.".mysqli_error($link));
		    $parent = mysqli_fetch_assoc($end);
		    $parentUserName = $parent['userName'];
		    $parentPass = $parent['firstPass'];
		    $parentID = $parent['loginid'];
		    $groupName = $parent['Dealer'];
		    echo '<div class="leaderBadge" style="display:inline-block; background:#999; color:#fff; width:62%; padding:3px 10px; border:1px solid #cc0000; border-radius:15px; float:right; margin:10px 0 0 0;"> 
		    	<p style="padding:0 6px 0 0; float:left; line-height:1.5em;">You are a leader for this fundraiser - Log in to edit members, photos, contacts.</p>
		   	<!-- <p>User name is: '.$parentUserName.'
		   		Password is: '.$parentPass.'</p>-->
		    
		    <form action="../editFundraiser/coordhome.php" method="post">
            			<input type="hidden" name="clubid" value="'.$parentID.'">
            			<input type="submit" name="submit1" class="redbutton" value="Login">
            		</form>
		    </div>
		   ';
		  }
		  
		?>
		
		<h3></h3>
              
		<form action="memberHome.php" method="POST" name="myForm" enctype="multipart/form-data" id="myForm" onSubmit="return validate(this);">
		
		<div class="interim-form">
		<div class="interim-header"><h2>Contact Information</h2></div>
			<div class="row"> <!-- titles -->									
				<span id="hd_fname">First</span>
				<span id="hd_lname">Last</span>
				<span id="hd_title">Title</span>
				<span id="hd_title">Gender</span>
			</div> <!-- end row -->
			<div class="row"> <!-- inputs -->
				<input id="fname" type="text" name="fname" value="<? echo $first_name;?>">
				<input id="lname" type="text" name="lname" value="<? echo $last_name;?>">
				<select name="title">
				<option value="<?php echo $ttl; ?>" selected><?php echo $ttl; ?></option>
					<option value="Mr.">Mr.</option>
					<option value="Ms.">Ms.</option>
					<option value="Mrs.">Mrs.</option>
					<option value="Miss">Miss</option>
					<option value="Dr.">Dr.</option>
					<option value="Rev.">Rev.</option>
				</select>
				<select name="gender">
					<option value="<?php echo $gender; ?>" selected><?php echo $gender; ?></option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
				</select>
			</div> <!-- end row -->
			
			<div class="row"> <!-- titles -->									
				<span id="hd_wphone">Primary Phone</span>
			</div> <!-- end row -->
			<div class="row"> <!-- inputs -->
				<input id="phone" type="text" name="phone" value="<? echo $tel;?>" maxlength="14" >
			</div> <!-- end row -->
		</div> <!-- end contact info -->
		
		<!-- <div class="interim-form"> account login tab 
			<div class="interim-header"><h2>Your Account Login</h2></div>
			<div class="row"> --><!-- title -->
				<!--<span id="hd_loginemail">Email Address</span>
			</div>--> <!-- end row -->
			<!--<div class="row"> --><!-- input -->
				<!--<input id="loginemail" type="text" name="email" value="<? echo $em;?>">
			</div> --><!-- end row -->
			
			<!--<div class="row">--> <!-- titles -->
			<!--<span id="hd_password">Password</span>
			<span id="hd_cpassword">Confirm Password</span>
			</div> --><!-- end row -->
			<!--<div class="row">--> <!-- inputs -->
				<!--<input id="password" type="password" name="password">
				<input id="cpassword" type="password" name="cpassword">
			</div>--> <!-- end row -->
		<!--</div> --><!-- end account login -->
		
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
			<div class="row"> <!-- inputs -->
				<!--$ <input id="goal" type="text" name="goal" value="<? echo $fgoal;?>"/>-->
			</div> <!-- end row -->
		</div> <!-- end fund info -->
		
		<div class="interim-form"> <!-- social media tab4 -->
			<div class="interim-header"><h2>Social Media Connections</h2></div>
			<div class="row"> 
				<span id="hd_fb" title="Facebook Name or Profile URL">Facebook</span>
				<input type="url" id="fb"  name="face" value="<? echo $fc;?>" placeholder="www.facebook.com/user">http://
			</div> <!-- end row -->
			<br>
			<div class="row"> 
				<span id="hd_tw" title="Twitter Username or Profile URL">Twitter</span>
				<input type="url" id="tw" name="twit" value="<? echo $tw;?>" placeholder="www.twitter.com/user">http://
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
				<span>Upload Profile Photo:</span><input type="file" name="memberphoto" />
				<!--<input type="submit" class="redbutton" value="Upload Photo">-->
				<br>
				<i>(Acceptable formats for photos are .jpg or .png files)</i>
			</div> <!-- end row -->
			<br>
			<div class="row"> 
				<span>Current Photo: </span> <br>
				<img class="profilepicpreview" src="../<? echo $myPic; ?>" alt="Profile Picture Preview">
			</div> <!-- end row -->
		</div> <!-- end tab5 content -->

		<br>
		<input name="group" type="hidden" value="<?php echo $group; ?>">
		<input id="maurl" type="hidden" name="groupID" value="<? echo $fundraiserid;?>"/>
		<input id="maurl" type="hidden" name="first_email" value="<? echo $first_mail;?>"/>
		<input name="submit" type="submit" class="redbutton" value="Save All Changes" onsubmit="return validate()">
		</form>
		<p><?php echo '<p style="color:blue;">'.$message.'</p>'; ?></p>

				
	</div><!--end content-->
	
	<?php include 'footer.php' ; ?>
</div> <!--end container-->
</body>
</html>