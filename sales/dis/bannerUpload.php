<?php
  session_start();
  if(!isset($_SESSION['authenticated']))
   {
     header('Location: ../../index.php');
     exit;
  }
   include '../../includes/connection.inc.php';
   include('../../samplewebsites/imageFunctions.inc.php');
   $link = connectTo();
   $table = "Dealers"; 
   $upload_msg = "Message: <br />";
  if(isset($_POST['submit'])){
          $ad = $_POST['ad'];
	  $dealer_group = $_POST['group'];
	  $orgName = $_GET['name'];
	  if ($dealer_group == ""){
	    $upload_msg .= "Cannot save because group ID not found. <br />";
	  }else{
	 
	  $orgBannerPhoto = $_FILES['AddOrgBannerPhoto']['tmp_name'];
	  $imageDirPath = $_SERVER['DOCUMENT_ROOT'].'/images/dealers/';
	  $OrgBannerPathPath = "";
	  	
	  $link = connectTo();
	  $table = "Dealers";
	
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
	    
		if($orgBannerPhoto != ''){
		$OrgBannerPathPath = process_image('AddOrgBannerPhoto',$dealer_group, $orgBannerPhoto, $imageDirPath);
		if($OrgBannerPathPath !='' && $orgName !=''){
			$query = "UPDATE Dealers SET banner_path = '$OrgBannerPathPath' WHERE Address1 = '$ad'";
			$result_g = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error()); 
			if($result_g)
			{
			   $redirect = "Location:addBanner.php";
         	           header($redirect);
         	        }
			}
		}
		   
		     
         	     
         	 	
	  }// end $dealer_group else
	  	
	}// end if
    $userID = $_SESSION['userId'];
   $orgName = $_GET['name'];
   $orgId = $_GET['group'];
   $query = "SELECT * FROM $table WHERE Dealer='$orgName' AND setuppersonid='$userID'";
   $nameResult = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error());
   $row_a = mysqli_fetch_assoc($nameResult);
   $address = $row_a['Address1'];
   
  // $row = mysqli_fetch_assoc($nameResult); 
  ?>
 <!DOCTYPE html>
<title>GreatMoods | View Contacts</title>
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
<link href="../css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
<link href="../css/setupFormStyles.css" rel="stylesheet" type="text/css" />
<link href="../css/headerSampleWebsiteStyles.css" rel="stylesheet" type="text/css">
<link href="../css/leftSidebarNav.css" rel="stylesheet" type="text/css">

<body id="contacts">
	<div id="container">
      		<?php include 'header.inc.php' ; ?>
	       	<?php include 'sidenav.php' ; ?>
	       	
    <div id="contentMain858">
   <!-- <div class="nav2">
        <ul id="setupNav">
        <li><a href="rephome.php" class="infonav">Account Home</a></li>
        <li>|</li>
        <li><a href="information.php?group=<?echo $_GET["group"];?>" class="infonav">Information</a></li>
        <li>|</li>
        <li><a href="reasons.php?group=<?echo $_GET["group"];?>" class="reasonsnav">Reasons</a></li>
        <li>|</li>
        <li id="current"><b>Contacts</b></li>
        <li>|</li>
        <li><a href="photos.php?group=<?echo $_GET["group"];?>" class="photosnav">Photos</a></li>
        <li>|</li>
        <li><a href="goals.php?group=<?echo $_GET["group"];?>" class="goalsnav">Goals</a></li>
      </ul>
        </div>-->
    
	<h3>Add Banners to <? echo $orgName; ?></h3>
	<br />
     <div class="distributor1">
      <table id="contacts">
        <tr>
          <td>
          <form method="post" action="" name="addPhotos" enctype="multipart/form-data" id="addPhotos" onSubmit="return validate(this);">
          <input name="AddOrgBannerPhoto" type="file" id="AddOrgBannerPhoto" />
          <input name="group" type="hidden" value="<? echo $_GET['group']; ?>" />
          <input name="ad" type="hidden" value="<? echo $address; ?>" />
          <input type="submit" name="submit" value="Upload Banner" />
          </form>
          </td>
        </tr>
        </table>
        </div>
        <br>
          </div> <!--end contentMain858-->
          
      <?php include 'footer.php' ; ?>
    </div> <!--end container-->

</body>