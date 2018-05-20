<?php
	session_start();
	
	include'../includes/connection.inc.php';
	//include($_SESSION['fileroot'].'includes/connection.inc.php');
	include('imageFunctions.inc.php');
	
	ob_start();
	$link = connectTo();
	$table = "sample_websites";
	$errors = array();
	$missing = array();
	// check if form has been submitted
	if(isset($_POST['submit'])){
		// list expected fields
		$expected = array('orgType','clubType','club','fundname','address1','address2','city','state','zip','groupurl','groupemail','facebookurl','twitterurl','descriptions','reasons','fname','lname','position','phone','paypal','personalphoto','groupphoto','goal','banner','image1','image2','image3','image4','image5','image6','image7','image8','image9','image10','image11','image12','video1','message');
		// set required fields
		$required = array('orgType','club','fundname');
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
					$imagePath = "images/".$id."/".$cleanedPic;
					
					return $imagePath;
				}
				return $imagePath;
			}
		}
	}// end banner picture upload operations
		
		}// end process_image
	if($bannerPic != ''){
		$bannerPicPath = process_image('banner',$id, $bannerPic, $imageDirPath);
		}	
	
	//Check to see if another sample website with the same name already exists
	$queryCheck = "SELECT * FROM $table WHERE sampleName = '$fundname' AND club = '$club'";
	$checkResult = mysqli_query($link, $queryCheck);
	if(mysqli_num_rows($checkResult) > 0){
		echo $fundname." ".$club." already exists. \n\n";
	}else{
	// add new sample website to the database	
	$query1 = "INSERT INTO $table(orgType, clubType, club, sampleName, sampleAdd1, sampleAdd2, sampleCity, sampleState, sampleZip, sampleUrl, sampleGroupEmail, sampleFacebook, sampleTwitter, sampleDesc, sampleReasons, sampleFname, sampleLname, samplePosition, samplePhone, samplePaypal, goal, sample_message)";
	$query1 .= "VALUES('$orgType','$clubType','$club','$fundname','$address1', '$address2','$city','$state','$zip','$groupurl','$groupemail','$facebookurl','$twitterurl','$descriptions','$reasons','$fname','$lname','$position','$phone','$paypal','$goal', '$message')";
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
	$query2 = "SELECT samplewebID FROM $table WHERE sampleName = '$fundname' AND orgType = '$orgType' AND clubType = '$clubType' AND club = '$club';";
	$res2 = mysqli_query($link, $query2);
	
	if ($res2){
	    // get websiteID so we can create a folder to store the images
	    // the path will be images/Sample_Websites/websiteID/<image>
	    $row = mysqli_fetch_assoc($res2);
	    $websiteID = $row[samplewebID];
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
	} else{
			echo $fundname." not found in database.\n\n";
		}// end else	
	}// end else from checking to see if sample website already exists.
	//} // end of if(!$missing.....
	}// end if (isset($_POST['submit']))...

?>
<!DOCTYPE html>
<head>
	<meta charset="UTF-8" />
	<title>GreatMoods | Sample Website Editor</title>
	<link rel="stylesheet" type="text/css" href="../css/admin_styles.css" />	
</head>	

<body>
<h1>Create / Edit Sample Websites</h1>
<?php if ($missing || $errors) { ?>
	<p class ="warning">Please fix the item(s) indicated.</p>
<?php } ?>
<form action="addEditSampleWebsites.php" method="POST" id="sampleWebsites" name="sample" enctype="multipart/form-data" >

<table border="0" style="height:100px">
<tr><td><h2>Information</h2></td></tr>
<tr>
<td><label for="orgType" >Fundraiser Type:
	<?php if ($missing && in_array('orgType', $missing)) { ?>
			<span class="warning" style="color: #f00;"> Please enter a Fundraiser Type</span>
		<?php } ?>	
     </label></td>
<td><label for="clubType">Fundraiser Group: </label></td>
<td><label for="club">Fundraiser Club:
	<?php if ($missing && in_array('club', $missing)) { ?>
			<span class="warning" style="color: #f00;"> Please select a Fundraiser Club</span>
		<?php } ?>
    </label></td>
</tr>
<tr>
<td>
<select id="orgType" name="orgType" size="4">
  <option>High School</option>
  <option>Middle School</option>
  <option>Elementary School</option>
  <option>Colleges & Universities</option>
  <option>Religions</option>
  <option>Community Organizations</option>
  <option>Youth & Sports</option>
  <option>Local & National Charities</option>
  <option>Causes</option>
</select>
</td>
<td>
<select id="clubType" name="clubType" size="4">
  <option>(none)</option>
  <option>Clubs & Organizations</option>
  <option>Athletics</option>
  <option>Activities</option>
 </select>
</td>
<td>
<select id="club" name="club" size="4">
	<option>4H Club</option>
	<option>Adapted Sports</option>
	<option>After School Programs</option>
	<option>Alzheimers</option>
	<option>Archery Club</option>
	<option>Athletic Associations</option>
	<option>Athletic Equipment</option>
	<option>Band</option>
	<option>Baseball</option>
	<option>Basketball</option>
	<option>Basketball, Boys</option>
	<option>Basketball, Girls</option>
	<option>Big Brothers / Big Sisters</option>
	<option>Book Club</option>
	<option>Booster Club</option>
	<option>Bowling</option>
	<option>Boy Scouts</option>
	<option>BPA</option>
	<option>Breast Cancer Research</option>
	<option>Cheerleading</option>
	<option>Chess Club</option>
	<option>Choir</option>
	<option>Church</option>
	<option>Class Field Trip</option>
	<option>Class Trips</option>
	<option>Club Sports</option>
	<option>Computer</option>
	<option>Cross Country</option>
	<option>Cross Country Ski, Boys</option>
	<option>Cross Country Ski, Girls</option>
	<option>Cross Country, Boys</option>
	<option>Cub Scouts</option>
	<option>Cycling Club</option>
	<option>Danceline</option>
	<option>Debate</option>
	<option>Electronics</option>
	<option>Equestrian</option>
	<option>FBLA</option>
	<option>Field & Equipment</option>
	<option>Field Hockey</option>
	<option>Fire Department</option>
	<option>Football</option>
	<option>General</option>
	<option>General Needs</option>
	<option>Girl Scouts</option>
	<option>Golf</option>
	<option>Golf, Boys</option>
	<option>Golf, Girls</option>
	<option>Gymnastics</option>
	<option>Hospital</option>
	<option>Humane Society</option>
	<option>Ice Hockey</option>
	<option>Ice Hockey, Boys</option>
	<option>Ice Hockey, Girls</option>
	<option>Intramural Sports</option>
	<option>Jaycees</option>
	<option>Knights of Columbus</option>
	<option>Lacrosse</option>
	<option>Lacross, Boys</option>
	<option>Lacrosse, Girls</option>
	<option>Language Club</option>
	<option>Library</option>
	<option value="Lions Club">Lion's Club</option>
	<option>Local Benefit</option>
	<option>Math Club</option>
	<option>Memorial Fund</option>
	<option>Mission Trip</option>
	<option>Mosque</option>
	<option>Mountaineering Club</option>
	<option>National Arts HS</option>
	<option>National Honor Society</option>
	<option>News Broadcasting</option>
	<option>Parkinsons</option>
	<option>Personal</option>
	<option>Playground Equipment</option>
	<option>Police Department</option>
	<option>Power Lifting</option>
	<option>Prom Committee</option>
	<option>PTA/PTO</option>
	<option>Raquetball</option>
	<option>Rodeo</option>
	<option>Rotary Club</option>
	<option>Rowing</option>
	<option>Rugby Club</option>
	<option>Scholars Club</option>
	<option>Scholarship Counseling</option>
	<option>School Carnival</option>
	<option>School Counseling</option>
	<option>Science & Math Club</option>
	<option>Science Club</option>
	<option>Ski Club</option>
	<option>Ski/Snowboard Club, Boys</option>
	<option>Ski/Snowboard Club, Girls</option>
	<option>Sports Camp</option>
	<option>Soccer</option>
	<option>Soccer, Boys</option>
	<option>Soccer, Girls</option>
	<option>Softball</option>
	<option>Student Council</option>
	<option>Swimming</option>
	<option>Swimming & Diving, Boys</option>
	<option>Swimming & Diving, Girls</option>
	<option>Synchronized Swimming</option>
	<option>Synagogue</option>
	<option>Tennis</option>
	<option>Tennis, Boys</option>
	<option>Tennis, Girls</option>
	<option>Theater</option>
	<option>Track & Field</option>
	<option>Track & Field, Boys</option>
	<option>Track & Field, Girls</option>
	<option>Ultimate Frisbee</option>
        <option>Vacation Bible School</option>	
	<option>Vets</option>
	<option>Volleyball</option>
	<option>Water Polo</option>
	<option>Wrestling</option>
	<option>Yacht Club</option>
	<option>Year Book</option>
	<option>YMCA</option>
</select>
</td>
</tr>
<tr>
	<td><label for="fundname">Fundraising Group Name:</label></td>
	<td><input id="fundname" name="fundname" type="text" maxlength="100"></td>
	<td><?php if ($missing && in_array('fundname', $missing)) { ?>
			<span class="warning" style="color: #f00;"> Please Enter a Fundraising Group Name</span>
		<?php } ?></td>
</tr>
<tr>
	<td><label for="address1">Address 1:</label></td>
	<td><input id="address1" name="address1" type="text" maxlength="100" value="123 Main St."></td>
</tr>
<tr>
	<td><label for="address2">Address 2:</label></td>
	<td><input id="address2" name="address2" type="text" maxlength="100"></td>
</tr>
<tr>
	<td><label for="city">City:</label></td>
	<td><input id="city" name="city" type="text" maxlength="40" value="Springfield"></td>
</tr>
<tr>
	<td><label for="state">State (ex: MN):</label></td>
	<td><input id="state" name="state" type="text" maxlength="2" value="IL"></td>
</tr>
<tr>
	<td><label for="zip">ZIP:</label></td>
	<td><input id="zip" name="zip" type="text" maxlength="10" value="12345"></td>
</tr>
<tr>
	<td><label for="groupurl">Group's Website URL:</label></td>
	<td><input id="groupurl" name="groupurl" type="text" maxlength="255"></td>
</tr>
<tr>
	<td><label for="groupemail">Group Email:</label></td>
	<td><input id="groupemail" name="groupemail" type="text" maxlength="50"></td>
</tr>
<tr>
	<td><label for="facebookurl">Facebook URL:</label></td>
	<td><input id="facebookurl" name="facebookurl" type="text" maxlength="255"></td>
</tr>
<tr>
	<td><label for="twitterurl">Twitter URL:</label></td>
	<td><input id="twitterurl" name="twitterurl" type="text" maxlength="255"></td>
	
</tr>
</table>

<br>

<table>
<tr><td><h2>Reasons</h2></td></tr>
<tr>
	<td><label for="description">General Description:</label></td>
	<td><textarea id="description" name="description" rows="8" cols="50"  maxlength="255">Enter a general description for your group.</textarea></td>
</tr>
<tr>
	<td><label for="reasons">Reasons:</label></td>
	<td><textarea id="reasons" name="reasons" rows="8" cols="50" maxlength="255">List the reasons for your fundraiser.</textarea></td>
</tr>
<tr>
	<td><label for="message">Personal Message:</label></td>
	<td><textarea id="message" name="message" rows="8" cols="50"  maxlength="255">Personal message for recruiting.</textarea></td>
</tr>
</table>

<br>

<table>
<tr><td><h2>Contacts</h2></td></tr>
<tr>
	<td><label for="fname">First Name:</label></td>
	<td><input id="fname" name="fname" type="text" maxlength="30"></td>
</tr>
<tr>
	<td><label for="lname">Last Name:</label></td>
	<td><input id="lname" name="lname" type="text" maxlength="30"></td>
</tr>
<tr>
	<td><label for="position">Position Title:</label></td>
	<td><input id="position" name="position" type="text" maxlength="50"></td>
</tr>
<tr>
	<td><label for="phone">Phone:</label></td>
	<td><input id="phone" name="phone" type="text" maxlength="13"></td>
</tr>
<tr>
	<td><label for="paypal">Paypal ID:</label></td>
	<td><input id="paypal" name="paypal" type="text" maxlength="100"></td>
</tr>
</table>

<br>

<table>
<tr><td><h2>Goal</h2></td></tr>
<tr>
	<td><label for="goal">Fundraiser Goal:</label></td>
	<td><input id="goal" name="goal" type="number"></td>
</tr>
</table>

<br>

<table>
<tr><td><h2>Sample Website Images</h2></td></tr>
<tr>
	<td><label for="banner">Upload Banner:</label></td>
	<td><input id="banner" name="banner" type="file"></td>
</tr>
<tr>
	<td><label for="personalphoto">Personal Photo:</label></td>
	<td><input id="personalphoto" name="personalphoto" type="file"></td>
</tr>
<tr>
	<td><label for="groupphoto">Group Photo:</label></td>
	<td><input id="groupphoto" name="groupphoto" type="file"></td>
</tr>
<tr>
	<td><label for="image1">Upload Contact Group Photo:</label></td>
	<td><input id="image1" name="image1" type="file"></td>
</tr>
<tr>
	<td><label for="image2">Upload Group Leader Photo:</label></td>
	<td><input id="image2" name="image2" type="file"></td>
</tr>
<tr>
	<td><label for="image3">Upload Student Leader(s) Photo:</label></td>
	<td><input id="image3" name="image3" type="file"></td>
</tr>
<tr>
	<td><label for="image4">Upload Image 4:</label></td>
	<td><input id="image4" name="image4" type="file"></td>
</tr>
<tr>
	<td><label for="image5">Upload Image 5:</label></td>
	<td><input id="image5" name="image5" type="file"></td>
</tr>
<tr>
	<td><label for="image6">Upload Image 6:</label></td>
	<td><input id="image6" name="image6" type="file"></td>
</tr>
<tr>
	<td><label for="image7">Upload Image 7:</label></td>
	<td><input id="image7" name="image7" type="file"></td>
</tr>
<tr>
	<td><label for="image8">Upload Image 8:</label></td>
	<td><input id="image8" name="image8" type="file"></td>
</tr>
<tr>
	<td><label for="image9">Upload Image 9:</label></td>
	<td><input id="image9" name="image9" type="file"></td>
</tr>
<tr>
	<td><label for="image10">Upload Image 10:</label></td>
	<td><input id="image10" name="image10" type="file"></td>
</tr>
<tr>
	<td><label for="image11">Upload Image 11:</label></td>
	<td><input id="image11" name="image11" type="file"></td>
</tr>
<tr>
	<td><label for="image12">Upload Image 12:</label></td>
	<td><input id="image12" name="image12" type="file"></td>
</tr>
<tr>
	<td><label for="video1">Upload Video: (not working)</label></td>
	<td><input id="video1" name="video1" type="file"></td>
</tr>

</table>

<p>
<input name="submit" id="submit" type="submit" value="Save" />
<input type="reset" value="Clear"/>
</p>

</form>

<hr>

<form action="editWebsite.php" method="POST" id="editWebsites" name="editsample" enctype="multipart/form-data" >
<table border="0" style="height:100px">
<?php
//$wsLink = connectTo();
$wsquery = "SELECT * FROM $table ORDER BY sampleName";
$wsresult = mysqli_query($link, $wsquery);
$num = mysqli_num_rows($wsresult);
if($num < 1){
    echo '<p>No sample websites found.</p>';
}else{
	echo '<tr class="header">
		<td></td>
		<td>Name of Sample Website</td>
		<td>Club</td>
		<td>Banner</td>
		<td>Personal Pic</td>
		<td>Contact Pic</td>
		<td>Group Pic</td>
		<td>Leader Pic</td>
		<td>Student(s) Pic</td>
		<td>Image4</td>
	     </tr>';
	for ($j = 0; $j < $num; ++$j){
	   $row = mysqli_fetch_row($wsresult);
	   $site = $row[0]; //sample website id
	   $name = $row[4]; //sample website name
	   $tclub = $row[3]; //Club name
	   $banner_load = basename($row[25]);
	   $personal_load = basename($row[22]);
	   $contact_load = basename($row[26]);
	   $group_load = basename($row[23]);
	   $leader_load = basename($row[27]);
	   $student_load = basename($row[28]);
	   $img4_load = basename($row[29]);
	   
	   echo '<tr class="data">';
	   echo '<td><a href="editWebsite.php?sampleID='.$site.'" class="button">Edit</a></td>';
	   echo "<td>$name</td>";
	   echo "<td><b>$tclub</b></td>";
	   echo "<td>$banner_load</td>";
	   echo "<td>$personal_load</td>";
	   echo "<td>$contact_load</td>";
	   echo "<td>$group_load</td>";
	   echo "<td>$leader_load</td>";
	   echo "<td>$student_load</td>";
	   echo "<td>$img4_load</td>";
	   echo '</tr>';
	}
} ?> 
</table>
</form>
</body>
</html>