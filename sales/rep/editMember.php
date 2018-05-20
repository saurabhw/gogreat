<?php
	session_start();
	ini_set('session.bug_compat_warn', 0);
	ini_set('session.bug_compat_42', 0);
	
	if(!isset($_SESSION['authenticated']))
         {
            header('Location: ../../index.php');
            exit;
         }
	ob_start();
	include '../../includes/connection.inc.php';
	include('../../samplewebsites/imageFunctions.inc.php');
	$link = connectTo();
	$groupid = $_GET["groupid"];
        $userID = $_SESSION['userId'];
	$table = "Dealers";
	$table1 = "user_info";
	$table2 = "users";
	$table3 = "orgMembers";
	$upload_msg = "Message: <br />";
	// check if form has been submitted
	if(isset($_POST['submit']))
	{
	  $dealer_group = $_POST['groupID'];
	  if ($dealer_group == "")
	   {
	        $upload_msg .= "Cannot save because group ID not found. <br />";
	   }
	   else
	   {
	   
	   $imageDirPath = $_SERVER['DOCUMENT_ROOT'].'/images/dealers/';
	   $first_name = mysqli_real_escape_string($link, $_POST['fname']);
	   $last_name = mysqli_real_escape_string($link, $_POST['lname']);
	   $email_address = mysqli_real_escape_string($link, $_POST['email']);
	   $f_address =  $_POST['first_email'];
	   $face = mysqli_real_escape_string($link, $_POST['facebookURL']);
	   $twitter = mysqli_real_escape_string($link, $_POST['twitterURL']);
	   $group = mysqli_real_escape_string($link, $_POST['groupID']);
	   $set_up = mysqli_real_escape_string($link, $_POST['setup_person']);
	   $memberPhoto = $_FILES['memberphoto']['tmp_name'];
	   $memberPhotoPath = "";
	   
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
	     
	     if($memberPhoto != ''){
		$memberPhotoPath = process_image('memberphoto',$group, $memberPhoto, $imageDirPath);
		
		}
		$queryg = "UPDATE $table1 SET 
			           FName = '$first_name',
			           LName = '$last_name',
			           email = '$email_address'
			           WHERE email = '$f_address'";
			$result2 = mysqli_query($link, $queryg)or die("MySQL ERROR: $result2".mysqli_error($link));
			
			$queryh = "UPDATE $table2 SET 
			           username = '$email_address'
			           WHERE username = '$f_address'";
			$result3 = mysqli_query($link, $queryh)or die("MySQL ERROR: $result3".mysqli_error($link));
			
		$queryp = "UPDATE $table SET 
			           email = '$email_address', 
			           facebook  = '$face',
  				   twitter   = '$twitter',
  				   leader_pic = '$memberPhotoPath',
  				   userName = '$email_address'
			           WHERE loginid = '$group'";
			$result1 = mysqli_query($link, $queryp)or die("MySQL ERROR: $result1".mysqli_error($link));
			
			
			
			$queryt = "UPDATE $table3 SET 
			           orgFName = '$first_name',
			           orgLName = '$last_name',
			           orgEmail = '$email_address'
			           WHERE orgEmail = '$f_address'";
			$result4 = mysqli_query($link, $queryt)or die("MySQL ERROR: $result4".mysqli_error($link));
			
			if($result1 && $result2 && $result3 && $result4)
			//if($result3 )
			{
  	                   $redirect = "Location:editMembers.php?groupid=$set_up";
  	                   header("$redirect");
  	                }	
  			
  				
	  }// end if ($dealer_group == "")
	}// end if(isset($_POST['submit']))
	
	$query = "SELECT * FROM $table WHERE loginid='$groupid'";
	$result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error());
	$row = mysqli_fetch_assoc($result);
	$fundraiserid = $row['loginid'];
        $url = $row['website'];
        $twitter = $row['twitter'];
        $face = $row['facebook'];
        $user_name = $row['email'];
        $user_pass = $row['firstPass'];
        $setup = $row['setuppersonid'];
        
        //get member data
        $query1 = "SELECT * FROM $table1 WHERE email='$user_name'";
	$result1 = mysqli_query($link, $query1)or die ("couldn't execute query 1.".mysql_error());
	$row1 = mysqli_fetch_assoc($result1);
	$first_name = $row1['FName'];
	$last_name = $row1['LName'];
	$em = $row1['email'];
      
        	
?>

<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<title>Information | Edit Account | Sales Coordinator</title>
<link href="../../css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
<link href="../../css/form_styles.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../../images/favicon.ico">

<script type="text/javascript">
	function validate(form) {
		var pass1 = form['loginPass'].value;
		var pass2 = form['confirmPass'].value;
		if(pass1 == "" || pass1 == null) {
			alert("please enter a valid password");
			return false;
		}
		if(pass1 != pass2) {
			alert("passwords do not match");
			return false;
		}
		return true;
	}
</script>
</head>

<body>
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <?php include 'member_sidenav.php' ; ?>

	<div id="contentMain858">
    <h1>Edit Account</h1>
    <h3>Member Information</h3>
    <p>Required fields are marked with <span class="required">*</span></p>
    
    <?php if ($_POST && $suspect){ ?>
    <p class="warning">Sorry, your mail could not be sent. Please try later.</p>
    <?php } elseif ($missing || $errors) { ?>
    <p class ="warning">Please fix the item(s) indicated.</p>
    <?php } ?>
    
      <div id="graybackground4">   
    <form action="" method="POST" name="editMember" enctype="multipart/form-data" id="addOrg" onSubmit="return validate(this);">
    <div id="table">
    	<div id="row"> <!-- header row -->
    		<span id="loginemail">Username</span>
	</div> <!-- end row -->
	<div id="row"> 
		<input id="loginemail" type="text name="user" value="<? echo $user_name;?>" readonly="readonly" title="Username"/>
	</div> <!-- end row -->
	<br>
	<div id="row"> <!-- header row -->
    		<span id="fname">First<span class="required">*</span></span>
    		<span id="lname">Last<span class="required">*</span></span>
    		<span id="loginemail">Email</span>
	</div> <!-- end row -->
	<div id="row"> 
		<input id="fname" type="text" name="fname" value="<? echo $first_name;?>" title="First Name"/>
		<input id="lname" type="text" name="lname" value="<? echo $last_name; ?>" title="Last Name"/>
		<input id="loginemail" name="email" type="text" maxlength="150" value="<? echo $user_name; ?>" title="Email Address"/>
	</div> <!-- end row -->
	
	<div id="row"> <!-- header row -->
    		<span id="url">Facebook Page</span>
    		<span id="url">Twitter Page</span>
	</div> <!-- end row -->
	<div id="row"> 
		<input id="url" name="facebookURL" type="text" maxlength="150" value="<? echo $face; ?>" title="Facebook Page URL" />
		<input  id="url" name="twitterURL" type="text" maxlength="150" value="<? echo $twitter; ?>" title="Twitter Page URL"/>
	</div> <!-- end row -->
	<br>
	<div id="row"> <!-- header row -->
    		<span id="url">Member Photo</span>
	</div> <!-- end row -->
	<div id="row"> 
		<input name="memberphoto" type="file" id="AddOrgLocationPhoto" title="Member Photo File"/>
	</div> <!-- end row -->
    	</div> <!-- end table -->
          <br  class="clearfloat">
          
         <input name="first_email" type="hidden" value="<?php echo $em;?>">
         <input name="password" type="hidden" value="<?php echo $loginPass;?>">
         <input name="type" type="hidden" value="<?php echo $club;?>">
         <input name="setup_person" type="hidden" value="<?php echo $setup;?>">
         <input name="groupID" type="hidden" value="<?php echo $groupid;?>">
         <input name="hasLogin" type="hidden" value="<?echo $hasLogin;?>" /> 
         <input name="submit" type="submit" value="Save & Continue" />
         </form>
          </div> <!--end graybackground-->
          
          <br class="clearfloat">
    </div> <!--end content-->
    
<?php include '../footer.php' ; ?>
</div> <!--end container-->

</body>

<pre>
<?php if ($_POST && $mailSent){
	echo htmlentities($message, ENT_COMPAT, 'UTF-8')."\n";
	echo 'Headers: '.htmlentities($headers, ENT_COMPAT, 'UTF-8');
} ?>
</pre>
<?php
   ob_end_flush();
?>