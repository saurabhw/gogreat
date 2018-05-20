<?php
       session_start();

      if(($_SESSION['role'] == 'MemberLeader' || $_SESSION['role'] == 'Member' || $_SESSION['role'] == 'fundOwner') && isset($_SESSION['authenticated']))
       {
          //authenicated
       }
       else
       {
            header('Location: ../index.php');
            exit;
       }
	include '../includes/connection.inc.php';
	include('../samplewebsites/imageFunctions.inc.php');
	include '../includes/functions.php';
        $link = connectTo();
        $userID = $_SESSION['userId'];
        $table = "Dealers";
        $group = $_SESSION['groupid'];
   
       $userName = $_SESSION['email'];
       $query1 = "SELECT * FROM Dealers WHERE loginid='$group'";
       $result1 = mysqli_query($link, $query1)or die("MySQL ERROR query 1: ".mysqli_error($link));
       $row1 = mysqli_fetch_assoc($result1);
       $groupPic = $row1['group_team_pic'];
       //$dealerID = $row1['loginid'];
       //$group = $row1['setuppersonid']; 
        
	$upload_msg = "Message: <br>";
	
	
	// check if form has been submitted
	if(isset($_POST['submit'])){
	  $dealer_group = $_POST['group'];
	  if ($dealer_group == ""){
	    $upload_msg .= "Cannot save because group ID not found. <br>";
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
	  $c1 = mysqli_real_escape_string($link, $_POST['capt1']);
	  $c1n = mysqli_real_escape_string($link, $_POST['cap1']);
	  $c2 = mysqli_real_escape_string($link, $_POST['capt2']);
	  $c2n = mysqli_real_escape_string($link, $_POST['cap2']);
	 
	  $queryc = "UPDATE captions SET
		 c1 = '$c1',
		 c1n = '$c1n',
		 c2 = '$c2',
		 c2n = '$c2n'
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
    			$upload_msg .= $cleanedPic . " is not an image file. <br>";
    		} else {
    			if($_FILES['$name']['error'] > 0) {
				$upload_msg .= $_FILES['$name']['error'] . "<br>";
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
					$upload_msg .= "$cleanedPic uploaded.<br>";
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
			$query2 = "UPDATE $table SET leader_pic = '$OrgLeaderPicPath' WHERE setuppersonid = '$dealer_group'";
			mysqli_query($link, $query2);
			}
		}
	    if($orgContactPhoto != ''){
		$OrgContactPicPath = process_image('AddOrgContactPhoto',$dealer_group, $orgContactPhoto, $imageDirPath);
		if($OrgContactPicPath !=''){
			$query = "UPDATE $table SET contact_pic = '$OrgContactPicPath' WHERE loginid = '$dealer_group'";
			mysqli_query($link, $query);
			/*$query2 = "UPDATE $table SET contact_pic = '$OrgContactPicPath' WHERE setupperson = '$dealer_group'";
			mysqli_query($link, $query2);*/
			}
		}
		if($orgLocationPhoto != ''){
		$OrgLocationPicPath = process_image('AddOrgLocationPhoto',$dealer_group, $orgLocationPhoto, $imageDirPath);
		if($OrgLocationPicPath !=''){
			$query = "UPDATE $table SET location_pic = '$OrgLocationPicPath' WHERE loginid = '$dealer_group'";
			mysqli_query($link, $query);
			$query2 = "UPDATE $table SET location_pic = '$OrgLocationPicPath' WHERE setuppersonid = '$dealer_group'";
			mysqli_query($link, $query2);
			}
		}
	    if($orgGroupPhoto != ''){
		$OrgGroupPicPath = process_image('AddOrgGroupPhoto',$dealer_group, $orgGroupPhoto, $imageDirPath);
		if($OrgGroupPicPath !=''){
			$query = "UPDATE $table SET group_team_pic = '$OrgGroupPicPath' WHERE loginid = '$dealer_group'";
			mysqli_query($link, $query);
			$query2 = "UPDATE $table SET group_team_pic = '$OrgGroupPicPath' WHERE setuppersonid = '$dealer_group'";
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
		
		$group_id = $_SESSION['groupid'];
		$queryR = "SELECT * FROM Dealers WHERE loginid = '$group_id'";
	        $resultR = mysqli_query($link, $queryR)or die ("couldn't execute query.".mysql_error());
	        $rowR = mysqli_fetch_assoc($resultR);
	        $groupPicture = $rowR['group_team_pic'];
	        $bPath = $rowR['banner_path'];
	        $leaderPic = $rowR['leader_pic'];
	        $conPic = $rowR['contact_pic'];
	        
	        $sql_u = "UPDATE Dealers SET
	                  leader_pic = '$leaderPic',
	                  location_pic =  '$conPic',
	                  group_team_pic = '$groupPicture',
	                  banner_path = '$bPath'
	                  WHERE setuppersonid = '$group_id'";
	        $result_u = mysqli_query($link, $sql_u)or die ("couldn't execute query update dealers.".mysql_error());
	        
		$redirect = "Location:goals.php?group=$dealer_group";
         	header($redirect);	
	  }// end $dealer_group else	
	}// end if
	//$group = $_GET["group"];
        
	$query = "SELECT * FROM $table WHERE loginid='$group'";
	$result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error());
	$row = mysqli_fetch_assoc($result);
	$about = $row['About'];
	$fundraiserid = $row['loginid'];
	
        $salesGoal = $row['FundraiserGoal'];
        $fstart = $row['FundraiserStartDate'];
        $fend = $row['FundraiserEndDate'];
        $groupName = $row['Dealer'];
        $club_type = $row['DealerDir'];
        $group = $row["loginid"];
        $banner_path = $row['banner_path'];
        $groupPic = $row['location_pic'];
        //$_SESSION['fundid'] = $fundraiserid;
        $salesTotal = getGroupSales($group);
        
        $query8 = "SELECT * FROM captions WHERE fundid = '$group'";
        $result8 = mysqli_query($link, $query8) or die(mysqli_error($link));
        $row8 = mysqli_fetch_assoc($result8);
        $capTitle1 = $row8['c1'];
        $cap1 = $row8['c1n'];
        $capTitle2 = $row8['c2'];
        $cap2 = $row8['c2n'];

?>

<!DOCTYPE html>
<head>
	<title>Change Photos | Fundraising Group</title>
<style>
#border{
background-color:#f8f8f8;
box-shadow: 0px 0px 15px #888888;
padding:15px 35px 40px 35px;  
}
</style>
</head>
	
<body>
	<?php include 'header.php' ; ?>
	<?php include 'fundSidebar.php' ; ?>
    <div class="container" id="getStartedContent" >
        <div class="row-fluid">
	<div id="Single" class="tabcontent">

 <div class="page-header">
	<h1>Change Photos</h1>
</div>
 <div class=" col-md-7 col-md-push-2" id="bizAssociate-col">
        <h3>Personalize Website With Photos</h3>
        <p style="line-height:30px;">To personalize your webpage, attach photo(s).<br> 
        Acceptable formats for photos are .jpg or .png files.</p>
	<hr><br>
          
		<form class="photos" action="photos.php" method="POST" name="addPhotos" enctype="multipart/form-data" id="addPhotos" onSubmit="return validate(this);">
			<div class="table">
				<div class="interim-form">
				<div id="border">
					<div class="interim-header"><h2>1. Main Fundraiser Leader Photo and <br>2. Student or Other Fundraiser <br>&nbsp;&nbsp;&nbsp;&nbsp;Leader Photo</h2></div>
					<hr style="border-color:#b8b8b8;"><br>
						<div id="colgrp1">
							<label for="AddOrgLeaderPhoto"><b>Upload Main Fundraiser Leader Photo: </b></label>
							<input name="AddOrgLeaderPhoto" type="file" id="AddOrgLeaderPhoto">
							<br><br>
							<label>Preview:</label>
							<img style="width:350px;" id="leaderPreview" class="img-responsive center-block" src="/<?php echo $row['leader_pic'];?>" alt="leader photo">
			<br>
          		<br>
          		<input type="text" name="capt1" value="&nbsp;<? echo $capTitle1;?>" placeholder="" > Name
          		<br>
          		<br>
          		<input type="text" name="cap1" value="&nbsp;<? echo $cap1;?>" placeholder="" > Title
						</div>
						
						<br><br>
						
						<div id="colgrp2">
							<label for="AddOrgContactPhoto"><b>Upload Student or Other Fundraiser Leader Photo: </b></label>
							<input name="AddOrgContactPhoto" type="file" id="AddOrgLocationPhoto">
							<br><br>
							<label>Preview:</label>
							<img style="width:350px;" id="fmleaderPreview" class="img-responsive center-block" src="/<?php echo $row['contact_pic'];?>" alt="member leader photo">
			<br>
          		<br>
          		<input type="text" name="capt2" value="&nbsp;<? echo $capTitle2;?>" placeholder="" > Name
          		<br>
          		<br>
          		<input type="text" name="cap2" value="&nbsp;<? echo $cap2;?>" placeholder="" > Title
						</div>
					</div>
				</div> <!-- end interim-form -->
<hr>
				
				<div class="interim-form">
			<div id="border">
					<div class="interim-header"><h2>3. Location or General Photo</h2></div>
					<hr style="border-color:#b8b8b8;"><br>
					<div class="row">
						<label for="AddOrgLocationPhoto"><b>Upload Location or General Photo: </b></label>
						<input name="AddOrgLocationPhoto" type="file" id="">
						<br><br>
						<label>Preview:</label>
						<img style="width:350px;" id="profilePreview" class="img-responsive center-block" src="/<?php echo $row['location_pic'];?>" alt="profile photo">
					</div> <!-- end row -->
				</div> <!-- end interim-form -->
<hr>
				
				<div class="interim-form">
			<div id="border">
					<div class="interim-header"><h2>4. Organization Banner Image</h2></div>
					<hr style="border-color:#b8b8b8;"><br>
					<div class="row">
						<label for="AddOrgBannerPhoto"><b>Upload Organization Banner Image: </b></label>
						<input name="AddOrgBannerPhoto" type="file" id="AddOrgBannerPhoto">
						<br><br>
						<label>Preview:</label>
						<img style="width:350px;" id="bannerPreview" class="img-responsive center-block" src="/<?php echo $row['banner_path'];?>" alt="banner image"><br />
						<p><b>Note When Changing Banner!</b></p>
						<p><b>Banner changes will appear on this page when you log in again.</b></p>
					</div> <!-- end row -->
				</div>
				</div> <!-- end interim-form -->
 <hr>
				<div class="interim-form">
			<div id="border">
					<div class="interim-header"><h2>5. Fundraising Group Photo or Collage</h2></div>
					<hr style="border-color:#b8b8b8;"><br>
					<div class="row">
						<label for="AddOrgGroupPhoto"><b style="line-height:35px;">Upload Fundraising Group Photo or Collage: </b></label>
						<input name="AddOrgGroupPhoto" type="file" id="AddOrgGroupPhoto">
						<br><br>
						<label>Preview:</label>
						<img style="width:350px;" id="groupPreview" class="img-responsive center-block" src="/<?php echo $row['group_team_pic'];?>" alt="group collage photo">
					</div> <!-- end row -->
				</div>
				</div> <!-- end interim-form -->

				

				<!--<div class="row">
					 <label for="AddOrgContactPhoto"><b>Photo for Contact Information:</b></label>
					<br>
					<input name="AddOrgContactPhoto" type="file" id="AddOrgContactPhoto">
				   
					<br>
				 
				</div> <!-- end row -->

				<!--<div class="row">
					<label for="AddOrgSupportVideo"><b>Fun Video Requesting Support:</b></label>
					<br>
					<input name="AddOrgSupportVideo" type="file" id="AddOrgSupportVideo">
				  
				</div> <!-- end row -->
		
				<br>
				<br>

				<div class="row" style="margin-left:1px">
					<input name="group" type="hidden" value="<?php echo $fundraiserid; ?>">
					<input name="submit" type="submit" class="redbutton" value="Save Changes">
				</div> <!-- end row -->

			</div> <!-- end table -->
		</form>
      
		<br>
          </div> <!--end content -->
 	    </div>
</div>
</div>
</div>
    <?php include 'footer.php' ; ?>
</body>
</html>

<?php
   ob_end_flush();
?>