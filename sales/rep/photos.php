<?php
	session_start();
	ob_start();
	if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
	include '../../includes/connection.inc.php';
	include('../../samplewebsites/imageFunctions.inc.php');
        $link = connectTo();
        $userID = $_SESSION['userId'];
        $table = "Dealers";
	$upload_msg = "Message: <br />";
	// check if form has been submitted
	if(isset($_POST['submit'])){
	  $dealer_group = $_POST['group'];
	  if ($dealer_group == ""){
	    $upload_msg .= "Cannot save because group ID not found. <br />";
	  }else{
	  $orgLeaderPhoto = $_FILES['AddOrgLeaderPhoto']['tmp_name'];
	  $orgLocationPhoto = $_FILES['AddOrgLocationPhoto']['tmp_name'];
	  $orgGroupPhoto = $_FILES['AddOrgGroupPhoto']['tmp_name'];
	  $orgContactPhoto = $_FILES['AddOrgContactPhoto']['tmp_name'];
	  $orgBannerPhoto = $_FILES['AddOrgBannerPhoto']['tmp_name'];
	  $imageDirPath = $_SERVER['DOCUMENT_ROOT'].'/images/dealers/';
	  $OrgGroupPicPath = "";
	  $OrgLeaderPicPath = "";
	  $OrgLocationPicPath = "";
	  $OrgContactPhotoPath = "";
	  $OrgBannerPathPath = "";
	  	
	  $link = connectTo();
	  $table = "Dealers";
	  $table2 = "captions";
	  $c1 = mysqli_real_escape_string($link, $_POST['c1']);
	  $c1n = mysqli_real_escape_string($link, $_POST['c1n']);
	  $c2 = mysqli_real_escape_string($link, $_POST['c2']);
	  $c2n = mysqli_real_escape_string($link, $_POST['c2n']);
	  $c3 = mysqli_real_escape_string($link, $_POST['c3']);
	  $c3n = mysqli_real_escape_string($link, $_POST['c3n']);
	  $c4 = mysqli_real_escape_string($link, $_POST['c4']);
	  $c4n = mysqli_real_escape_string($link, $_POST['c4n']);
	  $queryc = "UPDATE captions SET
		 c1 = '$c1',
		 c1n = '$c1n',
		 c2 = '$c2',
		 c2n = '$c2n',
		 c3 = '$c3',
		 c3n = '$c3n',
		 c4 = '$c4',
		 c4n = '$c4n' 
		 WHERE fundid = '$dealer_group'";
	         $resultc = mysqli_query($link, $queryc)or die("MySQL ERROR on query c: ".mysqli_error($link));
	  
	  /**  process_image
	  **	This function will first verify if the file uploaded is an image file.
	  **	Next, the image will save the file in the desired directory in a folder labeled with the ID from the parameter.
	  **      Last, the directory path to the image is returned so it can be saved to the database.
	  **/
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
	     if($orgLeaderPhoto != ''){
		$OrgLeaderPicPath = process_image('AddOrgLeaderPhoto',$dealer_group, $orgLeaderPhoto, $imageDirPath);
		if($OrgLeaderPicPath !=''){
			$query = "UPDATE $table SET leader_pic = '$OrgLeaderPicPath' WHERE loginid = '$dealer_group'";
			mysqli_query($link, $query);
			}
		}
	    if($orgContactPhoto != ''){
		$OrgContactPicPath = process_image('AddOrgContactPhoto',$dealer_group, $orgContactPhoto, $imageDirPath);
		if($OrgContactPicPath !=''){
			$query = "UPDATE $table SET contact_pic = '$OrgContactPicPath' WHERE loginid = '$dealer_group'";
			mysqli_query($link, $query);
			}
		}
		if($orgLocationPhoto != ''){
		$OrgLocationPicPath = process_image('AddOrgLocationPhoto',$dealer_group, $orgLocationPhoto, $imageDirPath);
		if($OrgLocationPicPath !=''){
			$query = "UPDATE $table SET location_pic = '$OrgLocationPicPath' WHERE loginid = '$dealer_group'";
			mysqli_query($link, $query);
			}
		}
	    if($orgGroupPhoto != ''){
		$OrgGroupPicPath = process_image('AddOrgGroupPhoto',$dealer_group, $orgGroupPhoto, $imageDirPath);
		if($OrgGroupPicPath !=''){
			$query = "UPDATE $table SET group_team_pic = '$OrgGroupPicPath' WHERE loginid = '$dealer_group'";
			mysqli_query($link, $query);
			}
		}
		if($orgBannerPhoto != ''){
		$OrgBannerPathPath = process_image('AddOrgBannerPhoto',$dealer_group, $orgBannerPhoto, $imageDirPath);
		if($OrgBannerPathPath !=''){
			$query = "UPDATE $table SET banner_path = '$OrgBannerPathPath' WHERE loginid = '$dealer_group'";
			mysqli_query($link, $query);
			}
		}
		
		   $redirect = "Location:goals.php?groupid=$dealer_group";
         	   header($redirect);
         	 	
	  }// end $dealer_group else
	  	
	}// end if
	$groupid = $_GET["groupid"];
        
	$query = "SELECT * FROM $table WHERE loginid='$group'";
	$result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error());
	$row = mysqli_fetch_assoc($result);
	$about = $row['About'];
	$fundraiserid = $row['loginid'];
        
        $cap = "Select * FROM captions WHERE fundid = '$group'";
        $cap_result = mysqli_query($link, $cap)or die ("couldn't execute captions query.".mysql_error());
        $cr = mysqli_fetch_assoc($cap_result);
        $a1 = $cr['c1'];
        $a1n = $cr['c1n'];
        $a2 = $cr['c2'];
        $a2n = $cr['c2n'];   
        $a3 = $cr['c3'];
        $a3n = $cr['c3n'];   
        $a4 = $cr['c4'];
        $a4n = $cr['c4n'];           

?>

<!DOCTYPE html>
<head>
<title>Photos | Sales Coordinator</title>
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
      <?php include 'acct_sidenav.php' ; ?>
      
      <div id="contentMain858">
     <h1>Change Photos</h1>
     <h3>Personalize the Fundraiser Website With Photos</h3>
     <p>To personalize your webpage, choose an image file to upload.<br> 
          (Acceptable formats are .jpg or .png files.)</p>
          <!--Acceptable formats for video are .avi wmv, mpg/.mpeg, .mov, mp4.rm/.ram, .swf/.flv, -->
    
    <div class="setupLeft">  
    <form id="graybackground4" class="photos" action="photos.php" method="POST" name="addPhotos" enctype="multipart/form-data" onSubmit="return validate(this);">
          <div id="table">
          	<div id="row"> <!-- Leader -->
          		<h6>1. Fundraiser Leader(s)</h6>
          	</div> <!-- end row -->
          	<div id="row"> 
          		<span id="longtext">Upload Photo:</span>
          	</div> <!-- end row -->
          	<div id="row">
          		<input id="longtext" name="AddOrgLeaderPhoto" type="file" />
          		<span id="removefile"><input id="removefile" name="RemoveOrgLeaderPhoto" type="checkbox" value="RemoveOrgLeaderPhoto">Remove Current Photo</span>
          	</div> <!-- end row -->
          	<div id="row">
          		<span id="title">Title</span>
          		<span id="title">Name</span>
          	</div> <!-- end row -->
          	<div id="row"> 
          		<input id="title" type="text" name="c1" value="<? echo $a1;?>" title="Ex: Coach; Director; Pastor"/>
          		<input id="title" type="text" name="c1n" value="<? echo $a1n;?>"" title="Full Name(s)"/>
          	</div> <!-- end row -->
          	<br>
          	
          	<div id="row"> <!-- Member Leader -->
          		<h6>2. Fundraiser Member Leader(s)</h6>
          	</div> <!-- end row -->
          	<div id="row"> 
          		<span id="longtext">Upload Photo:</span>
          	</div> <!-- end row -->
          	<div id="row">
          		<input id="longtext" name="AddOrgLocationPhoto" type="file" />
          		<span id="removefile"><input id="removefile" name="AddOrgLocationPhoto" type="checkbox" value="AddOrgLocationPhoto">Remove Current Photo</span>
          	</div> <!-- end row -->
          	<div id="row">
          		<span id="title">Title</span>
          		<span id="title">Name</span>
          	</div> <!-- end row -->
          	<div id="row"> 
          		<input id="title" type="text" name="c3" value="<? echo $a3;?>" title="Ex: Student Leader; Volunteer Leader; Member Leader"/>
          		<input id="title" type="text" name="c3n" value="<? echo $a3n;?>"" title="Full Name(s)"/>
          	</div> <!-- end row -->
          	<br>
          	
          	<div id="row"> <!-- Group -->
          		<h6>3. Fundraising Group</h6>
          	</div> <!-- end row -->
          	<div id="row"> 
          		<span id="longtext">Upload Photo:</span>
          	</div> <!-- end row -->
          	<div id="row">
          		<input id="longtext" name="AddOrgGroupPhoto" type="file" title="Upload photo of the group/team fundraising"/>
          		<span id="removefile"><input id="removefile" name="RemoveOrgGroupPhoto" type="checkbox" value="RemoveOrgGroupPhoto">Remove Current Photo</span>
          	</div> <!-- end row -->
          	<br>
          	
          	<div id="row"> <!-- Banner -->
          		<h6>4. Organization Banner</h6>
          	</div> <!-- end row -->
          	<div id="row"> 
          		<span id="longtext">Upload Photo:</span>
          	</div> <!-- end row -->
          	<div id="row">
          		<input id="longtext" name="AddOrgBannerPhoto" type="file" title="Upload new file to change current banner" />
          		<span id="removefile"><input id="removefile" name="RemoveOrgBannerPhoto" type="checkbox" value="RemoveOrgBannerPhoto">Remove Current Photo</span>
          	</div> <!-- end row -->
          	
          	<!-- Video -->
          	<!--<br>
          	<div id="row"> 
          		<h6>5. Fun Video Requesting Support</h6>
          	</div> 
          	<div id="row"> 
          		<span id="longtext">Upload Video:</span>
          	</div>
          	<div id="row">
          		<input id="longtext" name="AddOrgSupportVideo" type="file" title="Upload video file" />
          		<span id="removefile"><input id="RemoveOrgSupportVideo" name="RemoveOrgSupportVideo" type="checkbox" value="RemoveOrgSupportVideo">Remove Current Video</span>
          	</div>-->
          	<br>
          	
          	<div id="row">
          		<input name="group" type="hidden" value="<?php echo $group; ?>">
          		<input id="redbutton" name="submit" type="submit" value="Save & Continue to Goals">
          	</div> <!-- end row -->
          </div> <!-- end table -->
        </form>
        </div> <!--end setupLeft-->
    
   <div class="photoRight">
      <img src="../../images/example_photolayout.jpg" width="380" height="405" alt="Example Layout of Photos">
   </div> <!--end setupRight--> 
 
  </div> <!--end contentMain858-->
      <?php include '../footer.php' ; ?>
    </div> <!--end container-->

</body>
</html>

<?php
   ob_end_flush();
?>