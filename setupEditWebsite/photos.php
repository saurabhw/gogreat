<?php
    session_start(); // session start
    ob_start();
    ini_set('display_errors', '0'); // errors reporting on
    error_reporting(E_ALL); // all errors
    require_once('../includes/functions.php');
    require_once('../includes/connection.inc.php');
    require_once('../includes/imageFunctions.inc.php');
    $link = connectTo();
    $userID = $_SESSION['userId'];
    $group = trim($_GET["group"]);
	if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "RP")
         {
            header('Location: ../index.php');
            exit;
         }
	if($_SESSION['freeze'] == "TRUE")
       {
          // echo "Account Frozen";
           header('Location: accountEdit.php');
       }
       
      $check = checkChainRep($userID,$group);
      if(!is_numeric($group) || $check == 1  )
        {
           header('Location: ../logout.php');  
        }	 
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
	  $orgCollagePhoto = $_FILES['collagePhoto']['tmp_name'];
	  $imageDirPath = $_SERVER['DOCUMENT_ROOT'].'/images/dealers/';
	  $OrgGroupPicPath = "";
	  $OrgLeaderPicPath = "";
	  $OrgLocationPicPath = "";
	  $OrgContactPhotoPath = "";
	  $OrgBannerPathPath = "";
	  $OrgCollagePath = "";
	  	
	  $link = connectTo();
	  $table = "Dealers";
	  $table2 = "captions";
	  $c1 = mysqli_real_escape_string($link, $_POST['capt1']);
	  $c1n = mysqli_real_escape_string($link, $_POST['cap1']);
	  $c2 = mysqli_real_escape_string($link, $_POST['capt2']);
	  $c2n = mysqli_real_escape_string($link, $_POST['cap2']);
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
			//update member photo
			$query2 = "UPDATE $table SET leader_pic = '$OrgLeaderPicPath' WHERE setuppersonid = '$dealer_group'";
			mysqli_query($link, $query2);
			}
		}
	    if($orgContactPhoto != ''){
		$OrgContactPicPath = process_image('AddOrgContactPhoto',$dealer_group, $orgContactPhoto, $imageDirPath);
		if($OrgContactPicPath !=''){
			$query = "UPDATE $table SET contact_pic = '$OrgContactPicPath' WHERE loginid = '$dealer_group'";
			mysqli_query($link, $query);
			
			$query2 = "UPDATE $table SET location_pic = '$OrgContactPicPath' WHERE setuppersonid = '$dealer_group'";
			mysqli_query($link, $query2);
			}
		}
		if($orgLocationPhoto != ''){
		$OrgLocationPicPath = process_image('AddOrgLocationPhoto',$dealer_group, $orgLocationPhoto, $imageDirPath);
		///*
		if($OrgLocationPicPath !=''){
			$query = "UPDATE $table SET contact_pic = '$OrgLocationPicPath' WHERE loginid = '$dealer_group'";
			mysqli_query($link, $query);
			}
		}
		//*/
	    if($orgGroupPhoto != ''){
		$OrgGroupPicPath = process_image('AddOrgGroupPhoto',$dealer_group, $orgGroupPhoto, $imageDirPath);
		if($OrgGroupPicPath !=''){
			$query = "UPDATE $table SET location_pic = '$OrgGroupPicPath' WHERE loginid = '$dealer_group'";
			mysqli_query($link, $query);
			
			$query2 = "UPDATE $table SET location_pic = '$OrgGroupPicPath' WHERE setuppersonid = '$dealer_group'";
			mysqli_query($link, $query2);
			}
		}
		if($orgBannerPhoto != ''){
		$OrgBannerPathPath = process_image('AddOrgBannerPhoto',$dealer_group, $orgBannerPhoto, $imageDirPath);
		if($OrgBannerPathPath !=''){
			$query = "UPDATE $table SET banner_path = '$OrgBannerPathPath' WHERE loginid = '$dealer_group'";
			mysqli_query($link, $query);
			
			$query2 = "UPDATE $table SET banner_path = '$OrgBannerPathPath' WHERE setuppersonid = '$dealer_group'";
			mysqli_query($link, $query2);
			}
		}
		
		if($orgCollagePhoto != ''){
		$OrgCollagePath = process_image('collagePhoto',$dealer_group, $orgCollagePhoto, $imageDirPath);
		if($OrgCollagePath !=''){
			$query = "UPDATE $table SET group_team_pic = '$OrgCollagePath' WHERE loginid = '$dealer_group'";
			mysqli_query($link, $query);
			
			$query2 = "UPDATE $table SET group_team_pic = '$OrgCollagePath' WHERE setuppersonid = '$dealer_group'";
			mysqli_query($link, $query2);
			}
		}
		
		   $redirect = "Location:goals.php?group=$dealer_group";
         	   header($redirect);
         	 	
	  }// end $dealer_group else
	  	
	}// end if
	
        
	$query = "SELECT * FROM $table WHERE loginid='$group' and setuppersonid = '$userID'";
	$result = mysqli_query($link, $query)or die ("couldn't execute query.".mysqli_error($link));
	$row = mysqli_fetch_assoc($result);
	$about = $row['About'];
	$fundraiserid = $row['loginid'];
	$banner = $row['banner_path'];
	$group_pic = $row['group_team_pic'];
	$collage = $row['group_team_pic'];
	$location_pic = $row['location_pic'];
	$leader_pic = $row['leader_pic'];
	$contact_pic = $row['contact_pic'];
        
        $cap = "Select * FROM captions WHERE fundid = '$group'";
        $cap_result = mysqli_query($link, $cap)or die ("couldn't execute captions query.".mysqli_error($link));
        $cr = mysqli_fetch_assoc($cap_result);
        $a1 = $cr['c1'];
        $a1n = $cr['c1n'];
        $a2 = $cr['c2'];
        $a2n = $cr['c2n'];   
        $a3 = $cr['c3'];
        $a3n = $cr['c3n'];   
        $a4 = $cr['c4'];
        $a4n = $cr['c4n'];  
        
        
        $queryQ = "SELECT * FROM user_info WHERE userInfoID='$userID'";
        $resultQ = mysqli_query($link, $queryQ)or die ("couldn't execute query.".mysqli_error($link));
        $rowQ = mysqli_fetch_assoc($resultQ);
        $pic = $rowQ['picPath'];         

?>

<!DOCTYPE html>
<head>
	<title>Change Photos | Representative</title>
<style>
#border{
background-color:#f8f8f8;
box-shadow: 0px 0px 15px #888888;
padding:15px 35px 40px 35px; 
}
</style>
</head>
	
<body>
       <?php include 'header.inc.php' ; ?>
       <?php include 'sideLeftNav.php' ; ?>
    <div class="container" id="getStartedContent" >
        <div class="row-fluid">
 <div class="page-header">
     <h2 align="center">Change Photos</h2>
</div>
 <div class=" col-md-7 col-md-push-2" id="bizAssociate-col">
<br>
<div id="border">
     <h3>Personalize the Fundraiser Website With Photos</h3>
     <p>To personalize your webpage, choose an image file to upload.<br> 
          (Acceptable formats are .jpg or .png files.)</p>
          <!--Acceptable formats for video are .avi wmv, mpg/.mpeg, .mov, mp4.rm/.ram, .swf/.flv, -->
    	<form class="photos" action="<?php echo htmlspecialchars(basename($_SERVER['PHP_SELF'])); ?>" method="POST" name="addPhotos" enctype="multipart/form-data" onSubmit="return validate(this);">
	<hr style="border-color:#b8b8b8;">
          <div id="table">
          	<div class="row" style="margin-left:15px;"> <!-- Leader bottom left pic -->
          		<p><b>1.</b> Main Fundraiser Leader Photo</p>
          		<span style="line-height:35px;" id="">Upload Photo:</span><br>
          	        <img class="img-responsive" src="../<?php echo $leader_pic; ?>" alt="Leader" width="200px" height="200px"><br>
          		<input id="" name="AddOrgLeaderPhoto" type="file">
          		<br>
          		<br>
          		<input type="text" name="capt1" value="<? echo $a1;?>" placeholder="" > Name
          		<br>
          		<br>
          		<input type="text" name="cap1" value="<? echo $a1n;?>" placeholder="" > Title
          	</div> <!-- end row -->
          	
          	<br>
          	
          	<div class="row" style="margin-left:15px;"> <!-- Member Leader bottom right pic -->
	<hr style="border-color:#b8b8b8;">
          		<p><b>2.</b> Student or Other Fundraiser Leader Photo</p>
          		<span style="line-height:35px;" id="">Upload Photo:</span><br>
          	       	<img class="img-responsive" src="../<?php echo $contact_pic; ?>" alt="Location" width="200px" height="200px"><br>
          		<input id="" name="AddOrgLocationPhoto" type="file">
          		<br>
          		<br>
          		<input type="text" name="capt2" value="<? echo $a2;?>" placeholder="" > Name
          		<br>
          		<br>
          		<input type="text" name="cap2" value="<? echo $a2n;?>" placeholder="" > Title
          	</div> <!-- end row -->
          	
          	<br>
          	
          	<div class="row" style="margin-left:15px;"> <!-- Profile Pic in Left Nav -->
	<hr style="border-color:#b8b8b8;">
          		<p><b>3.</b> Location or General Photo</p>
          		<span style="line-height:35px;" id="longtext">Upload Photo:</span><br>
          		<img class="img-responsive" src="../<?php echo $location_pic; ?>" alt="Group" width="200px" height="200px"><br>
          		<input id="longtext" name="AddOrgGroupPhoto" type="file" title="Upload photo of the group/team fundraising">
          	</div> <!-- end row -->
          	
          	<br>
          	
          	<div class="row" style="margin-left:15px;"> <!-- Banner at top of page -->
	<hr style="border-color:#b8b8b8;">
          		<p><b>4.</b> Organization Banner</p>
          		<span style="line-height:35px;" id="longtext">Upload Photo:</span><br>
          	    	<img class="img-responsive" src="../<?php echo $banner; ?>" alt="Banner" width="700px" height="150px"><br>
          		<input id="longtext" name="AddOrgBannerPhoto" type="file" title="Upload new file to change current banner">
          	</div> <!-- end row -->
          	<br>
          	<div class="row" style="margin-left:15px;"> <!-- Group/Collage in center of page -->
	<hr style="border-color:#b8b8b8;">
          		<p><b>5.</b> Fundraising Group Photo or Collage</p>
          		<span style="line-height:35px;" id="longtext">Upload Photo:</span><br>
          	    	<img class="img-responsive" src="../<?php echo $collage; ?>" alt="Collage" width="700px" height="150px"><br>
          		<input id="longtext" name="collagePhoto" type="file" title="Upload new file to change current collage photo.">
          	</div> <!-- end row -->
          	
          	<!-- Video -->
          	<!--<br>
          	
          	<div class="row" style="margin-left:15px;"> 
          		<p>Fun Video Requesting Support</p>
          		<span style="line-height:35px;" id="longtext">Upload Video:</span><br>
          		<input id="longtext" name="AddOrgSupportVideo" type="file" title="Upload video file"><br>
          		<span style="line-height:35px;" id="removefile"><input id="RemoveOrgSupportVideo" name="RemoveOrgSupportVideo" type="checkbox" value="RemoveOrgSupportVideo">Remove Current Video</span>
          	</div>-->
          	
          	<br>
          	
          	<div class="row" style="margin-left:15px;">
          		<input name="group" type="hidden" value="<?php echo $group; ?>">
          		<input class="redbutton" name="submit" type="submit" value="Save and Continue to Goals">
          		<br>
          		<br>
   <div style="margin-left:2px;line-height:35px;padding-right:20px;">
   	<br>
      <img class="img-responsive" src="../images/photo_upload_examples.jpg" width="100%" alt="Example Layout of Photos">
      <caption><i>Example Layout of Photos</i></caption>
</div>
          	</div> <!-- end row -->
          </div> <!-- end table -->
        </form>
        </div> <!--end column1 -->
   </div> <!--end column2 --> 
 
  </div> <!--end content-->
    </div> <!--end container-->
<br>  
      <?php include 'footer.php' ; ?>


</body>
</html>

<?php
   ob_end_flush();
?>