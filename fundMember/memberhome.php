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
	<title>Account Home</title>
</head>

<body>
<?php include 'header(1).php'; ?>
<?php include 'memberSidebar_new.php'; ?>

<div class="container" id="fundmemberHome" >
    <div class="row-fluid row-flex">

        <div class="col-md-12 col-lg-11 col-lg-push-1 page-header">
        	<h2 align="center">Account Home</h1>
        	<!--club -<?php echo $_SESSION['club'];?>
        	group -<?php echo $_SESSION['groupid'];?>
        	user -<?php echo $_SESSION['userId'];?>-->
        </div>

   
        <!-- Allow for password change within modal. No need to have seperate page for that.. If I'm missing some PHP functions in header someone please let me know. Success and error messages show up fine. -----------DOES NOT UPDATE PASSWORD.  INTERFERES WITH OTHER SUBMISSION BUTTONS. PHP IS TOO ANNOYING FOR ME TO PURSUE THIS ATM, GUESS A SEPERATE PAGE WILL SUFFICE...  -->    	
            <!-- </?php
            if(isset($_POST['submit']))
            {
                $password1 = mysqli_real_escape_string($link, $_POST['password']);
                $cpassword = mysqli_real_escape_string($link, $_POST['cpassword']);
                if($cpassword != $password1)
                {
                        $alertmsg .= "Passwords do not match";
                        echo '<div class="container"><div id="message" class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span id="alert" aria-hidden="true">&times;</span></button><div><strong>'.$alertmsg.'!</strong></div></div>';
                }
                
                else
                {
                    $salt = time();
                    $password = sha1($password1.$salt);
                    $update = "UPDATE users SET password = '$password', salt = '$salt' WHERE username = '$current'";
                    $result = mysqli_query($link, $update) or die("MYSQL ERROR query update: ".mysqli_error($link));
                    
                    $update2 = "UPDATE Dealers SET firstPass = '$password' WHERE userName = '$current'";
                    $result2 = mysqli_query($link, $update2) or die("MYSQL ERROR query update 2: ".mysqli_error($link));
                    
                    if($result && $result2)
                    {
                        $successmsg .= "Your password Has Been Reset";
                        echo '<div class="container"><div id="message" class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span id="alert" aria-hidden="true">&times;</span></button><div><strong>'.$successmsg.'</strong></div></div>';
                        
                        $to = $current;
                        $subject = "Password reset on Greatmoods.com";
                        $headers = 'From: no-reply@greatmoods.com';
                        $message = "Your password has been reset.";
                        $message .="\nYour new password is $password1";
                        //$message .="\nWe highly suggest you log in soon and change it to something you will remember.";
                        mail($to, $subject, $message, $headers);
                    }
                }
            }//end post submit
            ?/>
            
            
            </?php echo $fundraiserid; ?> -->
    
    
            <div class="col-md-11 col-md-push-1" id="userMsgAlertWrap"> <!-- ALERT MESSAGE ROW --> 
                <?php
            		  if(mysqli_num_rows($leaderResult) > 0)
            		  {
            		      /*
            		    //member is leader get user name and pass from parent group
            		    $getPass = "SELECT * FROM Dealers WHERE loginid = '$setup'";
            		    $end = mysqli_query($link, $getPass)or die ("couldn't execute get pass query.".mysqli_error($link));
            		    $parent = mysqli_fetch_assoc($end);
            		    $parentUserName = $parent['userName'];
            		    $parentPass = $parent['firstPass'];
            		    $parentID = $parent['loginid'];
            		    $groupName = $parent['Dealer'];
            		    $leaderMsg = "You are a leader for this fundraiser - Log in to edit members, photos, contacts";
                        echo '
                        <div id="message" class="alert alert-warning alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span id="alert" aria-hidden="true">&times;</span>
                            </button>
                            
                            <div>
                                <strong><center>'.$leaderMsg.'</center></strong>
                            </div>
            
            		        <form action="../editFundraiser/coordhome.php" method="post">
                        			<input type="hidden" name="clubid" value="'.$parentID.'">
                        			<input type="submit" name="submit1" class="btn btn-sm btn-success center-block" style="margin-top:1rem" value="Login">
                            </form>
                        </div>';
                        */
        		        }
        		  
        		    ?>
            </div><!-- end alert message and alert row -->
    
            	
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" name="myForm" enctype="multipart/form-data" id="myForm" onSubmit="return validate(this);">

            <div class="col-md-12 col-lg-11 col-lg-push-1"><!-- START row-1  / col wrap of of 12 to create a new row -->
                <div class="interim-form col-md-5 col-md-offset-1 col-lg-6 col-lg-offset-0"><!-- START contact info /nested columns for form boxes -->
    
                    <div class="form-area ">  
                        <div class="interim-header">
                            <h3 style="margin-bottom: 20px; text-align: center;border-bottom:1px solid #cccccc">Contact Information</h3>
                        </div>
                                
                        <div class="form-group">
                            <label for="fname">First Name</label><br>
                            <input type="text" class="form-control" id="fname" name="fname" value="<? echo $first_name;?>" placeholder="First Name"> 
                        </div>
        				
                        <div class="form-group">
                            <label for="lname">Last Name</label><br>
                            <input type="text" class="form-control" id="lname" name="lname" value="<? echo $last_name;?>" placeholder="Last Name"> 
                        </div>
                    				
                        <div class="form-group">
                            <label for="titleSelect">Title</label><br>
                            
                            <select name="title" class="form-control">
                                <option value="<?php echo $ttl; ?>" selected><?php echo $ttl; ?></option>
                                <option value="Mr.">Mr.</option>
                                <option value="Ms.">Ms.</option>
                                <option value="Mrs.">Mrs.</option>
                                <option value="Miss">Miss</option>
                                <option value="Dr.">Dr.</option>
                                <option value="Rev.">Rev.</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="genderSelect">Gender</label><br>
                            
                            <select name="gender" class="form-control">
                                <option value="<?php echo $gender; ?>" selected><?php echo $gender; ?></option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>	
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="genderSelect">Phone #</label><br>
                            <input class="form-control" id="phone" type="text" name="phone" value="<? echo $tel;?>" maxlength="14" placeholder="(555)-666-7777" >
                        </div>
                        
                        </div><!-- END form area wrap -->
                    </div><!-- END contact info  -->
    
            
        
                    <div class="form-area col-md-5 col-md-push-1 col-lg-5 col-lg-push-1"  id="profPic">  <!-- profile edit card/form area -->
                    <!--<form action="memberHome.php" method="POST" name="myForm" enctype="multipart/form-data" id="myForm" onSubmit="return validate(this);">-->
                        <div class="interim-form">
                            <div class="interim-header"><h3 style="margin-bottom: 20px; text-align: center;border-bottom:1px solid #cccccc">Profile Photo</h3></div>
                            
            				<div class="form-group">
                                <label for="uploadDesc">Upload Profile Photo:</label><br><br>
                                <input type="file" name="memberphoto" />
                                <i style="font-size: small !important;">(Acceptable formats for photos are .jpg or .png files)</i>
            				</div><br>
            				
                            <div class="form-group">            	
                                <label for="current">Current Photo:</label>
                                <img class="img-responsive img-rounded" src="../<? echo $myPic; ?>" alt="Profile Picture Preview">
                            </div>
                        </div>
                    </div><!--end profpic -->
                    
            </div><!-- END row 1 -->   

<!-- old social media - consider using id's, name's, or type's if form is not working properly 
<div class="interim-header"><h2>Social Media Connections</h2></div>

<span id="hd_fb" title="Facebook Name or Profile URL">Facebook</span>
<input type="url" id="fb"  name="face" value="<? echo $fc;?>" placeholder="www.facebook.com/user">http://

<span id="hd_tw" title="Twitter Username or Profile URL">Twitter</span>
<input type="url" id="tw" name="twit" value="<? echo $tw;?>" placeholder="www.twitter.com/user">http://

<span id="hd_li" title="LinkedIn Username or Profile URL">LinkedIn</span>
<input type="url" id="li" name="lindkedin" value="">

<span id="hd_pn" title="Pintrest Username or Profile URL">Pintrest</span>
<input type="url" id="pn" name="printrest" value="">

<span id="hd_gp" title="Google+ Username or Profile URL">Google+</span>
<input type="url" id="gp" name="googleplus" value="">
-->
    	

            <div class="col-md-12 col-lg-11 col-lg-push-1"><!-- START row 2 / nested cols of 12 to create a new row -->
            
                <div class="interim-form col-md-5 col-md-offset-1 col-lg-6 col-lg-offset-0">
                    <div class="form-area ">  
                    <!--<form action="memberHome.php" method="POST" name="myForm" enctype="multipart/form-data" id="myForm" onSubmit="return validate(this);">-->
                        <div class="interim-form">
                            <div class="interim-header"><h3 style="margin-bottom: 20px; text-align: center;border-bottom:1px solid #cccccc">Fundraiser Information</h3></div>
            				<div class="form-group">
            				    <label for="aboutFundraiser">About Your Fundraiser</label><br>
                                <textarea class="form-control" type="textarea" name="description" cols="40" rows="12" id="description"><? echo $ab;?></textarea>				
                            </div>
                        </div>
                    </div>
                </div><!--end about fundraiser -->
    
                    
                <div class="interim-form col-md-5 col-md-push-1 col-lg-5 col-lg-push-1">
                    <div class="form-area ">  
                    <!--<form action="memberHome.php" method="POST" name="myForm" enctype="multipart/form-data" id="myForm" onSubmit="return validate(this);">-->
                        <div class="interim-form">
                            <div class="interim-header"><h3 style="margin-bottom: 20px; text-align: center;border-bottom:1px solid #cccccc">Social Media Connections</h3></div>
            				<div class="form-group">
            				    <label for="face">Facebook Profile URL</label><br>
            					<input class="form-control" type="url" id="fb"  name="face" value="<? echo $fc;?>"  placeholder="http://www.facebook.com/user"> 
            				</div>
            				<div class="form-group">            	
            				   <label for="twitter">Twitter Profile URL</label><br>
            					<input class="form-control" type="url" id="tw" name="twit" value="<? echo $tw;?>" placeholder="http://www.twitter.com/user"> 
            				</div>
                        </div>
                    </div><!-- END form area -->
                </div><!-- end column block -->
            </div> <!--END row 2-->
       
            <div class="col-md-10 col-md-push-2 col-lg-11 col-lg-push-1">        <!--START submit button // row 3 -->
                    <input name="group" type="hidden" value="<?php echo $group; ?>">
            		<input id="maurl" type="hidden" name="groupID" value="<? echo $fundraiserid;?>"/>
            		<input id="maurl" type="hidden" name="first_email" value="<? echo $first_mail;?>"/>
            		 <!-- echo message for sumbission -->
                    <input id="saveChangesButton" name="submit" type="submit" class="redbutton2 center-block" value="Save All Changes" onsubmit="return validate()">
            </div> <!-- END submit btn -->

            
            
        </form><!-- END form -->

    </div><!--END row-->
</div> <!-- END container -->

<?php include 'footer(1).php' ; ?>
</body>
</html>