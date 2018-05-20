<?php
	session_start();
	
	include'../includes/connection.inc.php';
	include('imageFunctions.inc.php');
	$sampleID = $_GET["sampleID"];
	
	ob_start();
	$link = connectTo();
	$table = "sample_websites";
	$errors = array();
	$missing = array();
	// check if form has been submitted
	if(isset($_POST['submit'])){
		// list expected fields
		$expected = array('fundname','address1','address2','city','state','zip','groupurl','groupemail','facebookurl','twitterurl','descriptions','reasons','fname','lname','position','phone','paypal','personalphoto','groupphoto','goal','banner','image1','image2','image3','image4','image5','image6','image7','image8','image9','image10','image11','image12','video1','message','sampleID');
		// set required fields
		$required = array('fundname','sampleID');
		require('processSampleWebsiteForm.php');
	
	// Database operations
	if(!$missing && !$errors){
	$personalPic = $_FILES['personalphoto']['tmp_name'];
	$groupPic = $_FILES['groupphoto']['tmp_name'];
	$bannerPic = $_FILES['banner']['tmp_name'];
	$imagePic1 = $_FILES['image1']['tmp_name'];
	$imagePic2 = $_FILES['image2']['tmp_name'];
	$imagePic3 = $_FILES['image3']['tmp_name'];
	$imagePic4 = $_FILES['image4']['tmp_name'];
	$imagePic5 = $_FILES['image5']['tmp_name'];
	$imagePic6 = $_FILES['image6']['tmp_name'];
	$imagePic7 = $_FILES['image7']['tmp_name'];
	$imagePic8 = $_FILES['image8']['tmp_name'];
	$imagePic9 = $_FILES['image9']['tmp_name'];
	$imagePic10 = $_FILES['image10']['tmp_name'];
	$imagePic11 = $_FILES['image11']['tmp_name'];
	$imagePic12 = $_FILES['image12']['tmp_name'];
	$imageDirPath = $_SERVER['DOCUMENT_ROOT'].'/images/Sample_Websites/';
	
	$personalPicPath = "";
	$groupPicPath = "";
	$bannerPicPath = "";
	$imagePic1Path = "";
	$imagePic2Path = "";
	$imagePic3Path = "";
	$imagePic4Path = "";
	$imagePic5Path = "";
	$imagePic6Path = "";
	$imagePic7Path = "";
	$imagePic8Path = "";
	$imagePic9Path = "";
	$imagePic10Path = "";
	$imagePic11Path = "";
	$imagePic12Path = "";
	
	$link = connectTo();
	$table = "sample_websites";
	
	/**  process_image
	**	This function will first verify if the file uploaded is an image file.
	**	Next, the image will save the file in the desired directory in a folder labeled with the ID from the parameter.
	**      Last, the directory path to the image is returned so it can be saved to the database.
	**/
	function process_image($name, $id, $tmpPic, $baseDirPath){
	
		$cleanedPic = checkName($_FILES["$name"]["name"]);	
		if(!is_image($tmpPic)) {
    			// is not an image
    			echo $cleanedPic . " is not an image file. ";
    		} else {
    			if($_FILES['$name']['error'] > 0) {
				echo $_FILES['$name']['error'] . "<br />";
			} else {
				
				if (file_exists($baseDirPath.$id."/".$cleanedPic)){
					$imagePath = "images/Sample_Websites/".$id."/".$cleanedPic;
					
				} else {
					$picDirectory = $baseDirPath;
					
					
					if (!is_dir($picDirectory.$id)){
						mkdir($picDirectory.$id);
						
					}
					$picDirectory = $picDirectory.$id."/";
					move_uploaded_file($tmpPic, $picDirectory . $cleanedPic);
					echo "\n$cleanedPic uploaded.<br />";
					$imagePath = "images/Sample_Websites/".$id."/".$cleanedPic;
					
					
				}
				return $imagePath;
			}
		}
	}// end banner picture upload operations
		
		}// end process_image
	
	//Check to see if another sample website with the same name already exists
	$queryCheck = "SELECT * FROM $table WHERE samplewebID = '$sampleID';";
	$checkResult = mysqli_query($link, $queryCheck);
	if(mysqli_num_rows($checkResult) < 1){
		echo $fundname." ".$club." does not exist. \n\n";
		
	}else{
	// add new sample website to the database	
	$query1 = "UPDATE $table SET sampleName = '$fundname',
	                             sampleAdd1 = '$address1',
	                             sampleAdd2 = '$address2',
	                             sampleCity = '$city',
	                             sampleState = '$state',
	                             sampleZip = '$zip',
	                             sampleUrl = '$groupurl',
	                             sampleGroupEmail = '$groupemail',
	                             sampleFacebook = '$facebookurl',
	                             sampleTwitter = '$twitterurl',
	                             sampleDesc = '$descriptions',
	                             sampleReasons = '$reasons',
	                             sampleFname = '$fname',
	                             sampleLname = '$lname',
	                             samplePosition = '$position',
	                             samplePhone = '$phone',
	                             samplePaypal = '$paypal',
	                             goal = '$goal',
	                             sample_message = '$message'
	                             WHERE samplewebID = '$sampleID'";
	mysqli_query($link, "start transaction;");
		// insert data into sample_websites table
		$res1 = mysqli_query($link, $query1);
		
	if( $res1 ){
			mysqli_query($link, "commit;");
			echo "<p>General sample website information has been saved.</p>";
			echo "<p>Any uploaded images will now be processed.....</p>";
			
		} else{
                        mysqli_query($link, "rollback;");
			echo "I'm sorry, there was a problem creating the sample website.";
			}
	
	    
	    // the path will be images/Sample_Websites/websiteID/<image>
	    
	    $websiteID = $sampleID;
	    // image upload operations
	    if($bannerPic != ''){
		$bannerPicPath = process_image('banner',$websiteID, $bannerPic, $imageDirPath);
		if($bannerPicPath !=''){
			$query = "UPDATE $table SET bannerPath = '$bannerPicPath' WHERE samplewebID = '$websiteID'";
			mysqli_query($link, $query);
			}
		}
	    if($personalPic != ''){
		$personalPicPath = process_image('personalphoto',$websiteID, $personalPic, $imageDirPath);
		if($personalPicPath !=''){
			$query = "UPDATE $table SET personalPhoto = '$personalPicPath' WHERE samplewebID = '$websiteID'";
			mysqli_query($link, $query);
			}
		}
	    if($groupPic != ''){
		$groupPicPath = process_image('groupphoto',$websiteID, $groupPic, $imageDirPath);
		if($groupPicPath !=''){
			$query = "UPDATE $table SET groupPhoto = '$groupPicPath' WHERE samplewebID = '$websiteID'";
			mysqli_query($link, $query);
			}
		}
	    if($imagePic1 != ''){
		$imagePic1Path = process_image('image1',$websiteID, $imagePic1, $imageDirPath);
		if($imagePic1Path !=''){
			$query = "UPDATE $table SET contact_group_photo = '$imagePic1Path' WHERE samplewebID = '$websiteID'";
			mysqli_query($link, $query);
			}
		}
	    if($imagePic2 != ''){
		$imagePic2Path = process_image('image2',$websiteID, $imagePic2, $imageDirPath);
		if($imagePic2Path !=''){
			$query = "UPDATE $table SET group_leader = '$imagePic2Path' WHERE samplewebID = '$websiteID'";
			mysqli_query($link, $query);
			}
		}
	    if($imagePic3 != ''){
		$imagePic3Path = process_image('image3',$websiteID, $imagePic3, $imageDirPath);
		if(imagePic3Path !=''){
			$query = "UPDATE $table SET student_leaders = '$imagePic3Path' WHERE samplewebID = '$websiteID'";
			mysqli_query($link, $query);
			}
		}
	    if($imagePic4 != ''){
		$imagePic4Path = process_image('image4',$websiteID, $imagePic4, $imageDirPath);
		if($imagePic4Path !=''){
			$query = "UPDATE $table SET img4Path = '$imagePic4Path' WHERE samplewebID = '$websiteID'";
			mysqli_query($link, $query);
			}
		}
	    if($imagePic5 != ''){
		$imagePic5Path = process_image('image5',$websiteID, $imagePic5, $imageDirPath);
		if($imagePic5Path !=''){
			$query = "UPDATE $table SET img5Path = '$imagePic5Path' WHERE samplewebID = '$websiteID'";
			mysqli_query($link, $query);
			}
		}
	    if($imagePic6 != ''){
		$imagePic6Path = process_image('image6',$websiteID, $imagePic6, $imageDirPath);
		if($imagePic6Path !=''){
			$query = "UPDATE $table SET img6Path = '$imagePic6Path' WHERE samplewebID = '$websiteID'";
			mysqli_query($link, $query);
			}
		}
	    if($imagePic7 != ''){
		$imagePic7Path = process_image('image7',$websiteID, $imagePic7, $imageDirPath);
		if($imagePic7Path !=''){
			$query = "UPDATE $table SET img7Path = '$imagePic7Path' WHERE samplewebID = '$websiteID'";
			mysqli_query($link, $query);
			}
		}
	    if($imagePic8 != ''){
		$imagePic8Path = process_image('image8',$websiteID, $imagePic8, $imageDirPath);
		if($imagePic8Path !=''){
			$query = "UPDATE $table SET img8Path = '$imagePic8Path' WHERE samplewebID = '$websiteID'";
			mysqli_query($link, $query);
			}
		}
	    if($imagePic9 != ''){
		$imagePic9Path = process_image('image9',$websiteID, $imagePic9, $imageDirPath);
		if($imagePic9Path !=''){
			$query = "UPDATE $table SET img9Path = '$imagePic9Path' WHERE samplewebID = '$websiteID'";
			mysqli_query($link, $query);
			}
		}
	    if($imagePic10 != ''){
		$imagePic10Path = process_image('image10',$websiteID, $imagePic10, $imageDirPath);
		if($imagePic10Path !=''){
			$query = "UPDATE $table SET img10Path = '$imagePic10Path' WHERE samplewebID = '$websiteID'";
			mysqli_query($link, $query);
			}
		}
	    if($imagePic11 != ''){
		$imagePic11Path = process_image('image11',$websiteID, $imagePic11, $imageDirPath);
		if($imagePic11Path !=''){
			$query = "UPDATE $table SET img11Path = '$imagePic11Path' WHERE samplewebID = '$websiteID'";
			mysqli_query($link, $query);
			}
		}
	    if($imagePic12 != ''){
		$imagePic12Path = process_image('image12',$websiteID, $imagePic12, $imageDirPath);
		if($imagePic12Path !=''){
			$query = "UPDATE $table SET img12Path = '$imagePic12Path' WHERE samplewebID = '$websiteID'";
			mysqli_query($link, $query);
			}
		}											
		
	}// end else from checking to see if sample website already exists.
	//} // end of if(!$missing.....
		header('Location:addEditSampleWebsites.php');
	}// end if (isset($_POST['submit']))...
	
	$query = "SELECT * FROM $table WHERE samplewebID='$sampleID'";
	$result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error());
	$row = mysqli_fetch_assoc($result);
	$orgType = $row['orgType'];
	$clubType = $row['clubType'];
	$club = $row['club'];
	$sampleName = $row['sampleName'];
	$sampleAdd1 = $row['sampleAdd1'];
	$sampleAdd2 = $row['sampleAdd2'];
	$city = $row['sampleCity'];
	$state = $row['sampleState'];
	$zip = $row['sampleZip'];
	$webUrl = $row['sampleUrl'];
	$groupEmail = $row['sampleGroupEmail'];
	$facebook = $row['sampleFacebook'];
	$twitter = $row['sampleTwitter'];
	$description = $row['sampleDesc'];
	$reasons = $row['sampleReasons'];
	$message = $row['sample_message'];
	$fName = $row['sampleFname']; 
	$lName = $row['sampleLname'];
	$position = $row['samplePosition'];
	$phone = $row['samplePhone'];
	$paypal = $row['samplePaypal'];
	$goal = $row['goal'];
	$banner_load = basename($row['bannerPath']);
	$personal_load = basename($row['personalPhoto']);
	$group_load = basename($row['groupPhoto']);
	$contact_load = basename($row['contact_group_photo']);
	$leader_load = basename($row['group_leader']);
	$student_load = basename($row['student_leaders']);
	$load4 = basename($row['img4Path']);
	$load5 = basename($row['img5Path']);
	$load6 = basename($row['img6Path']);
	$load7 = basename($row['img7Path']);
	$load8 = basename($row['img8Path']);
	$load9 = basename($row['img9Path']);
	$load10 = basename($row['img10Path']);
	$load11 = basename($row['img11Path']);
	$load12 = basename($row['img12Path']);
?>
<!DOCTYPE html>
<head>
	<meta charset="UTF-8" />
	<title>GreatMoods | Sample Website Editor</title>
	<link rel="stylesheet" type="text/css" href="../css/admin_styles.css" />
</head>	

<body>
<h1>Edit Sample Website</h1>
<?php if ($missing || $errors) { ?>
	<p class ="warning">Please fix the item(s) indicated.</p>
<?php } ?>
<form action="" method="POST" id="sampleWebsites" name="sample" enctype="multipart/form-data" >

<table border="0" style="height:100px">
<tr><td><h2>Information</h2></td></tr>
<tr>
<td><label for="orgType" >Fundraiser Type: </label></td>
<td><?php echo $orgType; ?></td>
</tr>
<tr>
<td><label for="clubType">Fundraiser Group: </label></td>
<td><?php echo $clubType; ?></td>
</tr>
<tr>
<td><label for="club">Fundraiser Club: </label></td>
<td><?php echo $club; ?></td>
</tr>

<tr>
	<td><label for="fundname">Fundraising Group Name:</label></td>
	<td><input id="fundname" name="fundname" type="text" maxlength="100" value="<?php echo $sampleName; ?>"></td>
</tr>
<tr> <!-- ADD IN THIS INPUT FIELD -->
	<td><label for="">Student/Member Name:</label></td>
	<td><input id="" name="" type="text" maxlength="30" value=""></td>
</tr>
<tr>
	<td><label for="address1">Address 1:</label></td>
	<td><input id="address1" name="address1" type="text" maxlength="100" value="<?php echo $sampleAdd1; ?>"></td>
</tr>
<tr>
	<td><label for="address2">Address 2:</label></td>
	<td><input id="address2" name="address2" type="text" maxlength="100" value="<?php echo $sampleAdd2; ?>"></td>
</tr>
<tr>
	<td><label for="city">City:</label></td>
	<td><input id="city" name="city" type="text" maxlength="40" value="<?php echo $city; ?>"></td>
</tr>
<tr>
	<td><label for="state">State (ex: MN):</label></td>
	<td><input id="state" name="state" type="text" maxlength="2" value="<?php echo $state; ?>"></td>
</tr>
<tr>
	<td><label for="zip">ZIP:</label></td>
	<td><input id="zip" name="zip" type="text" maxlength="10" value="<?php echo $zip; ?>"></td>
</tr>
<tr>
	<td><label for="groupurl">Group's Website URL:</label></td>
	<td><input id="groupurl" name="groupurl" type="text" maxlength="255" value="<?php echo $webUrl; ?>"></td>
</tr>
<tr>
	<td><label for="groupemail">Group Email:</label></td>
	<td><input id="groupemail" name="groupemail" type="text" maxlength="50" value="<?php echo $groupEmail; ?>"></td>
</tr>
<tr>
	<td><label for="facebookurl">Facebook URL:</label></td>
	<td><input id="facebookurl" name="facebookurl" type="text" maxlength="255" value="<?php echo $facebook; ?>"></td>
</tr>
<tr>
	<td><label for="twitterurl">Twitter URL:</label></td>
	<td><input id="twitterurl" name="twitterurl" type="text" maxlength="255" value="<?php echo $twitter; ?>"></td>
	
</tr>
</table>

<br>

<table>
<tr><td><h2>Reasons</h2></td></tr>
<tr>
	<td><label for="description">General Description:</label></td>
	<td><textarea id="description" name="description" rows="8" cols="50"  maxlength="255"><?php echo $description; ?></textarea></td>
</tr>
<tr>
	<td><label for="reasons">Reasons:</label></td>
	<td><textarea id="reasons" name="reasons" rows="8" cols="50" maxlength="255"><?php echo $reasons; ?></textarea></td>
</tr>
<tr>
	<td><label for="message">Personal Message:</label></td>
	<td><textarea id="message" name="message" rows="8" cols="50"  maxlength="255"><?php echo $message; ?></textarea></td>
</tr>
</table>

<br>

<table>
<tr><td><h2>Contacts</h2></td></tr>
<tr> 
	<td><label for="fname">Leader First Name:</label></td>
	<td><input id="fname" name="fname" type="text" maxlength="30" value="<?php echo $fName; ?>"></td>
</tr>
<tr>
	<td><label for="lname">Leader Last Name:</label></td>
	<td><input id="lname" name="lname" type="text" maxlength="30" value="<?php echo $lName; ?>"></td>
</tr>
<tr>
	<td><label for="position">Leader Position Title:</label></td>
	<td><input id="position" name="position" type="text" maxlength="50" value="<?php echo $position; ?>"></td>
</tr>
<tr>
	<td><label for="phone">Phone:</label></td>
	<td><input id="phone" name="phone" type="text" maxlength="13" value="<?php echo $phone; ?>"></td>
</tr>
<tr>
	<td><label for="paypal">Paypal ID:</label></td>
	<td><input id="paypal" name="paypal" type="text" maxlength="100" value="<?php echo $paypal; ?>"></td>
</tr>
<tr>  <!-- ADD IN THIS INPUT FIELD -->
	<td><label for="">Student Leader Name:</label></td>
	<td><input id="" name="" type="text" maxlength="30" value=""></td>
</tr>
</table>

<br>

<table>
<tr><td><h2>Goal</h2></td></tr>
<tr>
	<td><label for="goal">Fundraiser Goal:</label></td>
	<td><input id="goal" name="goal" type="number" value="<?php echo $goal; ?>"></td>
</tr>
</table>

<br>

<table>
<tr><td><h2>Sample Website Images</h2></td><td></td>
<td><b><u>Image currently stored in database</u></b></td></tr>
<tr>
	<td><label for="banner">Upload Banner:</label></td>
	<td><input id="banner" name="banner" type="file"></td>
	<td><?php echo $banner_load; ?></td>
</tr>
<tr>
	<td><label for="personalphoto">Personal Photo:</label></td>
	<td><input id="personalphoto" name="personalphoto" type="file"></td>
	<td><?php echo $personal_load; ?></td>
</tr>
<tr>
	<td><label for="groupphoto">Group Photo:</label></td>
	<td><input id="groupphoto" name="groupphoto" type="file"></td>
	<td><?php echo $group_load; ?></td>
</tr>
<tr>
	<td><label for="image1">Upload Contact Group Photo:</label></td>
	<td><input id="image1" name="image1" type="file"></td>
	<td><?php echo $contact_load; ?></td>
</tr>
<tr>
	<td><label for="image2">Upload Group Leader Photo:</label></td>
	<td><input id="image2" name="image2" type="file"></td>
	<td><?php echo $leader_load; ?></td>
</tr>
<tr>
	<td><label for="image3">Upload Student Leader(s) Photo:</label></td>
	<td><input id="image3" name="image3" type="file"></td>
	<td><?php echo $student_load; ?></td>
</tr>
<tr>
	<td><label for="image4">Upload Image 4:</label></td>
	<td><input id="image4" name="image4" type="file"></td>
	<td><?php echo $load4; ?></td>
</tr>
<tr>
	<td><label for="image5">Upload Image 5:</label></td>
	<td><input id="image5" name="image5" type="file"></td>
	<td><?php echo $load5; ?></td>
</tr>
<tr>
	<td><label for="image6">Upload Image 6:</label></td>
	<td><input id="image6" name="image6" type="file"></td>
	<td><?php echo $load6; ?></td>
</tr>
<tr>
	<td><label for="image7">Upload Image 7:</label></td>
	<td><input id="image7" name="image7" type="file"></td>
	<td><?php echo $load7; ?></td>
</tr>
<tr>
	<td><label for="image8">Upload Image 8:</label></td>
	<td><input id="image8" name="image8" type="file"></td>
	<td><?php echo $load8; ?></td>
</tr>
<tr>
	<td><label for="image9">Upload Image 9:</label></td>
	<td><input id="image9" name="image9" type="file"></td>
	<td><?php echo $load9; ?></td>
</tr>
<tr>
	<td><label for="image10">Upload Image 10:</label></td>
	<td><input id="image10" name="image10" type="file"></td>
	<td><?php echo $load10; ?></td>
</tr>
<tr>
	<td><label for="image11">Upload Image 11:</label></td>
	<td><input id="image11" name="image11" type="file"></td>
	<td><?php echo $load11; ?></td>
</tr>
<tr>
	<td><label for="image12">Upload Image 12:</label></td>
	<td><input id="image12" name="image12" type="file"></td>
	<td><?php echo $load12; ?></td>
</tr>
<tr>
	<td><label for="video1">Upload Video: (not working)</label></td>
	<td><input id="video1" name="video1" type="file"></td>
</tr>

</table>

<p>
<input name="sampleID" id="sampleID" type="hidden" value="<? echo $sampleID; ?>">
<input name="submit" id="submit" type="submit" value="Save & Return" />
<input type="reset" value="Clear"/>
</p>

</form>

</body>
</html>