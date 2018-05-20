<?php  
include '../includes/autoload.php';
if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "RP")
       {
            header('Location: ../index.php');
            exit;
       }

$userID = $_SESSION['userId'];
$loginuser = $userID;
$user_email = $_SESSION['email'];
$setup_person = $loginuser;

$type = "fundraiser";
$role = "fundOwner";
$table1 = "user_info";
$table2 = "users";
$table3 = "Dealers";
$table4 = "captions";
$table5 = "organizations";
$salt = time();

if(isset($_POST['submit']))
{
$j = mysqli_real_escape_string($link, $_POST['frname']);
//$groupName = preg_replace('/[^a-z\d ]/i', '', $j);
$groupName = $j;
$contactFirstName = mysqli_real_escape_string($link, $_POST['contactFirstName']);
$contactLastName = mysqli_real_escape_string($link, $_POST['contactLastName']);
$contactEmail = mysqli_real_escape_string($link, $_POST['contactEmail']);
$address1 = mysqli_real_escape_string($link, $_POST['address1']);
$address2 = mysqli_real_escape_string($link, $_POST['address2']);
$city = mysqli_real_escape_string($link, $_POST['city']);
$state = mysqli_real_escape_string($link, $_POST['state']);
$zip = mysqli_real_escape_string($link, $_POST['zip']);
$phone = mysqli_real_escape_string($link, $_POST['phone']);
$neworgtype = mysqli_real_escape_string($link, $_POST['orgtype']);
$ct = mysqli_real_escape_string($link, $_POST['fundtype']);
$url = mysqli_real_escape_string($link, $_POST['websiteURL']);
$athletics1 = mysqli_real_escape_string($link, $_POST['athletics1']);
$general1 = mysqli_real_escape_string($link, $_POST['general1']);
$clubs1 = mysqli_real_escape_string($link, $_POST['clubs1']);


$role = "fundOwner";
    
      // process banner
    $bannerPic = $_FILES['banner']['tmp_name'];
    $orgLeaderPhoto = $_FILES['AddOrgLeaderPhoto']['tmp_name'];
    $orgLocationPhoto = $_FILES['AddOrgLocationPhoto']['tmp_name'];   
    $orgGroupPhoto = $_FILES['AddOrgGroupPhoto']['tmp_name'];
    $orgContactPhoto = $_FILES['AddOrgContactPhoto']['tmp_name'];
    $imageDirPath = $_SERVER['DOCUMENT_ROOT'].'/images/banners/';
    $bannerPicPath = "";
    $id = str_replace(' ', '', $groupName);
    $id = str_replace("'", '', $groupName);
    $id = $id.$zip;
    /**  process_image
	**	This function will first verify if the file uploaded is an image file.
	**	Next, the image will save the file in the desired directory in a folder labeled with the ID from the parameter.
	**      Last, the directory path to the image is returned so it can be saved to the database.
	**/
	function process_image($name, $id, $tmpPic, $baseDirPath){
		$cleanedPic = checkName($_FILES["$name"]["name"]);	
		if(!is_image($tmpPic))
		{
			// is not an image
			$msg .= $cleanedPic . " is not an image file. <br />";
		} else
			{
				if($_FILES['$name']['error'] > 0)
				{
					$msg .= $_FILES['$name']['error'] . "<br />";
				} else
					{
						if(file_exists($baseDirPath.$id."/".$cleanedPic))
						{
							$imagePath = "images/banners/".$id."/".$cleanedPic;
						} else
							{
								$picDirectory = $baseDirPath;
								
								if (!is_dir($picDirectory.$id))
								{
									mkdir($picDirectory.$id);
								}
								$picDirectory = $picDirectory.$id."/";
								move_uploaded_file($tmpPic, $picDirectory . $cleanedPic);
								$msg .= "\n$cleanedPic uploaded.<br />";
								$imagePath = "images/banners/".$id."/".$cleanedPic;
							} //end else
							return $imagePath;
					} //end else
			}// and else
	}// process_image
	
	$cleanName = str_replace(' ', '', $groupName);
        $cleanName = strtolower($cleanName);
        $cleanName = trim($cleanName);
        $cleanName = preg_replace('/[^a-z]/i','',$cleanName);
        $tax = rand(100,9000);
        $tax2 = rand(1,99);
        $tax = $tax.$tax2;
        $userName = $cleanName.$tax;
        $clubType = $ct;
        
        $loginPass = $cleanName.$tax;
        $loginPassx = sha1($loginPass.$salt); 	
	$landingPage = "editFundraiser/coordhome.php";
	
	
	
	$query11 = "INSERT INTO user_info(companyName, address1, address2, city, state, zip, email, workPhone, bannerPath, role, dealer)";
      	$query11 .= "VALUES('$groupName', '$address1', '$address2', '$city', '$state', '$zip',
      	'$userName', '$phone', '$bannerPicPath', '$role', 'Main Group')";
      	
      	$result11 = mysqli_query($link, $query11)or die("MySQL ERROR on query 11: ".mysqli_error($link));  
       
        //query data just inserted to get info id
        $query2 = "Select * FROM $table1 WHERE companyName='$groupName' AND zip='$zip'";
        $result2 = mysqli_query($link, $query2)or die("MySQL ERROR om query 2: ".mysqli_error($link));
        $row1 = mysqli_fetch_assoc($result2);
        $user_id = $row1['userInfoID'];
        //insert fundraiser
        
	//insert parent group
	$newSQL = "INSERT INTO $table3 (Dealer, DealerDir, Phone, Address1, Address2, City, State, Zip, ContactName, sponsorid, setuppersonid, signuptype, orgtype, demo, email, website, leader_pic, location_pic, group_team_pic, contact_pic, userName, banner_path, firstPass, clubType) VALUES ( '$groupName', 'Main Group', '$phone','$address1','$address2','$city','$state','$zip','$contactFirstName', '$parentID', '$setup_person','$type',
'$neworgtype', '$user_id', '$contactEmail','$url', '$groupLeaderPhoto', '$contactPhoto', '$groupPhoto', '$studentPhoto', '$userName', '$bannerPicPath', '$loginPass', '$clubType')";
     
 
	$newResult = mysqli_query($link, $newSQL)or die("MySQL ERROR: on query new sql ".mysqli_error($link));
	
	//get the parent group id
	$getParent = "SELECT * FROM $table3 WHERE Dealer = '$groupName' AND userName = '$userName'";
        $parentResult = mysqli_query($link, $getParent)or die("MySQL ERROR: on query get parent ".mysqli_error($link));
        $parentRow = mysqli_fetch_assoc($parentResult);
        $parentID = $parentRow['loginid'];
        
        if($bannerPic != '')
	{
		$bannerPicPath = process_image('banner', $id, $bannerPic, $imageDirPath);
		if($bannerPicPath != '')
		{
		   $bannerUpdate = "UPDATE Dealers SET
		     Banner = '$bannerPicPath',
		     banner_path = '$bannerPicPath'
		     WHERE loginid = '$parentID' AND setuppersonid = '$loginuser'
		   ";
		   
		   $bannerUpdateResult = mysqli_query($link, $bannerUpdate)or die("MySQL ERROR: on query banner update ".mysqli_error($link));
		}
		
	}
	
	
	if (isset($_POST['clubs'])) 
        {
           $optionArray = $_POST['clubs'];
      
        for ($i = 0; $i < count($optionArray); $i++){
      	//mysqli_query($link, "start transaction;");
      	
      	$cleanName = str_replace(' ', '', $optionArray[$i]);
        $cleanName = strtolower($cleanName);
        $cleanName = trim($cleanName);
        $cleanName = preg_replace('/[^a-z]/i','',$cleanName);
        $tax = rand(100,9000);
        $tax2 = rand(1,99);
        $tax = $tax.$tax2;
        $userName = $cleanName.$tax;
        $clubType = $ct;
        
        $loginPass = $cleanName.$tax;
        $loginPassx = sha1($loginPass.$salt); 	
	$landingPage = "editFundraiser/coordhome.php";
        
	
      	//insert some data for user_info table
      	$query1 = "INSERT INTO user_info(companyName, address1, address2, city, state, zip, email, workPhone, bannerPath, role, dealer)";
      	$query1 .= "VALUES('$groupName', '$address1', '$address2', '$city', '$state', '$zip',
      	'$userName', '$phone', '$bannerPicPath', '$role', '$optionArray[$i]')";
      	
      	$result1 = mysqli_query($link, $query1)or die("MySQL ERROR on query 1: ".mysqli_error($link));  
       
        //query data just inserted to get info id
        $query2 = "Select * FROM $table1 WHERE companyName='$groupName' AND zip='$zip'";
        $result2 = mysqli_query($link, $query2)or die("MySQL ERROR om query 2: ".mysqli_error($link));
        $row1 = mysqli_fetch_assoc($result2);
        $user_id = $row1['userInfoID'];
        //isert fundraiser
        
        //get sample photos
        $sampleR = "SELECT * FROM sample_websites WHERE orgType = '$neworgtype' AND (club = '$optionArray[$i]' OR clubType= '$optionArray[$i]')";
        $sampleResult = mysqli_query($link, $sampleR)or die("sjgfshg".mysqli_error($link));
        $row2r = mysqli_fetch_assoc($sampleResult);
     
        $studentPhoto = $row2r['student_leaders'];
        $groupPhoto = $row2r['groupPhoto'];
        $bannerPhoto = $row2r['bannerPath'];
        $contactPhoto = $row2r['contact_group_photo'];
        $groupLeaderPhoto = $row2r['group_leader'];
	
	$query4 = "INSERT INTO $table3 (Dealer, DealerDir, Phone, Address1, Address2, City, State, Zip, Banner, ContactName, sponsorid, setuppersonid, signuptype, orgtype, demo, email, website, leader_pic, location_pic, group_team_pic, contact_pic, userName, banner_path, firstPass, clubType) VALUES ( '$groupName', '$optionArray[$i]', '$phone','$address1','$address2','$city','$state','$zip', '$bannerPicPath', '$contactFirstName', '$parentID', '$setup_person','$type',
'$neworgtype', '$user_id', '$contactEmail','$url', '$groupLeaderPhoto', '$contactPhoto', '$groupPhoto', '$studentPhoto', '$userName', '$bannerPicPath', '$loginPass', '$clubType')";
 
	$result4 = mysqli_query($link, $query4)or die("MySQL ERROR: on query 4 ".mysqli_error($link));
  	
  	$query6 = "SELECT * FROM $table3 WHERE userName ='$userName'";
  	$result6 = mysqli_query($link, $query6)or die("MySQL ERROR om query 6: ".mysqli_error($link));
  	$id_row = mysqli_fetch_assoc($result6);
  	$f_id = $id_row['loginid'];
  	$clubName = $id_row['Dealer'];
  	$club_type3 = $id_row['DealerDir'];
  	$blank = "";
  	
  	$query3 = "INSERT INTO $table2 (username, password, Security, landingPage, salt, created, lastLogin, role)";
	$query3 .= "VALUES('$userName','$loginPassx','1','$landingPage','$salt', now(), now(), '$role')";
	$result3 = mysqli_query($link, $query3)or die("MySQL ERROR om query 3: ".mysqli_error($link));
	
	$query19 = "SELECT * FROM users WHERE username = '$userName'";
	$result19 = mysqli_query($link, $query19)or die("MySQL ERROR om query 19: ".mysqli_error($link));
	$row19 = mysqli_fetch_assoc($result19);
	$newClubID = $row19['userID']; 	
  	 	
  	 	
	$query5 = "INSERT INTO $table4 (c1, c1n, c2, c2n, c3, c3n, c4, c4n, fundid)";
	$query5 .= "VALUES('$blank','$blank','$blank','$blank','$blank', '$blank', '$blank' ,'$blank', '$f_id')";
	$result5 = mysqli_query($link, $query5)or die("MySQL ERROR on query 5: ".mysqli_error($link));
	
	$sql1= "SELECT * FROM sample_websites WHERE club = '$optionArray[$i]' AND clubType='$clubType'";
	$sqlResult = mysqli_query($link, $sql1)or die("MySQL ERROR on sql1: ".mysqli_error($link));
	$sql_row = mysqli_fetch_assoc($sqlResult);
	$reason1 = $sql_row['reason1'];
	$reason2 = $sql_row['reason2'];
	$reason3 = $sql_row['reason3'];
	$reason4 = $sql_row['reason4'];
	$reason5 = $sql_row['reason5'];
	$reason6 = $sql_row['reason6'];
	$reason7 = $sql_row['reason7'];
	$reason8 = $sql_row['reason8'];
	$reason9 = $sql_row['reason9'];
	$reason10 = $sql_row['reason10'];
	
	$query10 = "INSERT INTO fund_reasons (fundID, r1, r2, r3, r4, r5, r6, r7, r8, r9, r10)";
	$query10 .= "VALUES('$f_id', '$reason1', '$reason2', '$reason3', '$reason4', '$reason5', '$reason6', '$reason7', '$reason8', '$reason9', '$reason10')";
	$result10 = mysqli_query($link, $query10)or die("MySQL ERROR on query 510: ".mysqli_error($link));
	
	$query7 = "SELECT * FROM users WHERE username = '$userName'";
	$result7 = mysqli_query($link, $query7)or die("MySQL ERROR on query 7: ".mysqli_error($link));
	$row7 = mysqli_fetch_assoc($result7);
	$login_ID = $row7['userID'];
	
	$query8 = "UPDATE user_info SET
	salesPerson = '$loginuser',
	user_table_id =  '$login_ID'
	WHERE email = '$userName'";
	$result8 = mysqli_query($link, $query8)or die("MySQL ERROR on query 8: ".mysqli_error($link));
	
    } // end for loop for athletic clubs
  }//end clubs

       if (isset($_POST['general'])) 
       {
        $optionArray2 = $_POST['general'];
      
      for ($i = 0; $i < count($optionArray2); $i++){
      	mysqli_query($link, "start transaction;");
      	
      	$cleanName = str_replace(' ', '', $optionArray2[$i]);
        $cleanName = strtolower($cleanName);
        $cleanName = trim($cleanName);
        $cleanName = preg_replace('/[^a-z]/i','',$cleanName);
        $tax = rand(100,9000);
        $tax2 = rand(1,99);
        $tax = $tax.$tax2;
        $userName = $cleanName.$tax;
        $clubType2 = $ct;
        
        $loginPass = $cleanName.$tax;
        $loginPassx = sha1($loginPass.$salt); 	
	$landingPage = "editFundraiser/coordhome.php";
      
	
	
      	//insert some data for user_info table
      	$query1 = "INSERT INTO user_info(companyName, address1, address2, city, state, zip, email, workPhone, bannerPath, role, dealer)";
      	$query1 .= "VALUES('$groupName', '$address1', '$address2', '$city', '$state', '$zip',
      	'$userName', '$phone', '$bannerPicPath', '$role', '$optionArray2[$i]')";
      	
      	$result1 = mysqli_query($link, $query1)or die("MySQL ERROR on query 1: ".mysqli_error($link));  
       
        //query data just inserted to get info id
        $query2 = "Select * FROM $table1 WHERE companyName='$groupName' AND zip='$zip'";
        $result2 = mysqli_query($link, $query2)or die("MySQL ERROR om query 2: ".mysqli_error($link));
        $row1 = mysqli_fetch_assoc($result2);
        $user_id = $row1['userInfoID'];
        //insert fundraiser
	
	//get sample photos
        $sampleR = "SELECT * FROM sample_websites WHERE orgType = '$neworgtype' AND club = '$optionArray2[$i]'";
        $sampleResult = mysqli_query($link, $sampleR)or die("sjgfshg".mysqli_error($link));
        $row2r = mysqli_fetch_assoc($sampleResult);
     
        $studentPhoto = $row2r['student_leaders'];
        $groupPhoto = $row2r['groupPhoto'];
        $bannerPhoto = $row2r['bannerPath'];
        $contactPhoto = $row2r['contact_group_photo'];
        $groupLeaderPhoto = $row2r['group_leader'];
	
	$query4 = "INSERT INTO $table3 (Dealer, DealerDir, Phone, Address1, Address2, City, State, Zip, Banner, ContactName, sponsorid, setuppersonid, signuptype, orgtype, demo,  email, website, leader_pic, location_pic, group_team_pic, contact_pic, userName, banner_path, firstPass, clubType) VALUES ( '$groupName', '$optionArray2[$i]', '$phone','$address1','$address2','$city','$state','$zip', '$bannerPicPath', '$contactFirstName', '$parentID', '$setup_person','$type',
'$neworgtype', '$user_id', '$contactEmail','$url', '$groupLeaderPhoto', '$contactPhoto', '$groupPhoto', '$studentPhoto', '$userName', '$bannerPicPath', '$loginPass', '$clubType')";
 
	$result4 = mysqli_query($link, $query4)or die("MySQL ERROR: on query 4 ".mysqli_error($link));
  	
  	$query6 = "SELECT * FROM $table3 WHERE userName ='$userName'";
  	$result6 = mysqli_query($link, $query6)or die("MySQL ERROR om query 6: ".mysqli_error($link));
  	$id_row = mysqli_fetch_assoc($result6);
  	$f_id = $id_row['loginid'];
  	$clubName = $id_row['Dealer'];
  	$club_type3 = $id_row['DealerDir'];
  	$blank = "";
  	
  	$query3 = "INSERT INTO $table2 (username, password, Security, landingPage, salt, created, lastLogin, role)";
	$query3 .= "VALUES('$userName','$loginPassx','1','$landingPage','$salt', now(), now(), '$role')";
	$result3 = mysqli_query($link, $query3)or die("MySQL ERROR om query 3: ".mysqli_error($link));
	
	$query19 = "SELECT * FROM users WHERE username = '$userName'";
	$result19 = mysqli_query($link, $query19)or die("MySQL ERROR om query 19: ".mysqli_error($link));
	$row19 = mysqli_fetch_assoc($result19);
	$newClubID = $row19['userID'];
	
	$query5 = "INSERT INTO $table4 (c1, c1n, c2, c2n, c3, c3n, c4, c4n, fundid)";
	$query5 .= "VALUES('$blank','$blank','$blank','$blank','$blank', '$blank', '$blank' ,'$blank', '$f_id')";
	$result5 = mysqli_query($link, $query5)or die("MySQL ERROR on query 5: ".mysqli_error($link));
	
	$sql1= "SELECT * FROM sample_websites WHERE club = '$optionArray2[$i]' AND orgType = '$neworgtype'";
	$sqlResult = mysqli_query($link, $sql1)or die("MySQL ERROR on sql1: ".mysqli_error($link));
	$sql_row = mysqli_fetch_assoc($sqlResult);
	$reason1 = $sql_row['reason1'];
	$reason2 = $sql_row['reason2'];
	$reason3 = $sql_row['reason3'];
	$reason4 = $sql_row['reason4'];
	$reason5 = $sql_row['reason5'];
	$reason6 = $sql_row['reason6'];
	$reason7 = $sql_row['reason7'];
	$reason8 = $sql_row['reason8'];
	$reason9 = $sql_row['reason9'];
	$reason10 = $sql_row['reason10'];
	
	$query10 = "INSERT INTO fund_reasons (fundID, r1, r2, r3, r4, r5, r6, r7, r8, r9, r10)";
	$query10 .= "VALUES('$f_id', '$reason1', '$reason2', '$reason3', '$reason4', '$reason5', '$reason6', '$reason7', '$reason8', '$reason9', '$reason10')";
	$result10 = mysqli_query($link, $query10)or die("MySQL ERROR on query 510: ".mysqli_error($link));
	
	$query7 = "SELECT * FROM users WHERE username = '$userName'";
	$result7 = mysqli_query($link, $query7)or die("MySQL ERROR on query 7: ".mysqli_error($link));
	$row7 = mysqli_fetch_assoc($result7);
	$login_ID = $row7['userID'];
	
	$query8 = "UPDATE user_info SET
	salesPerson = '$loginuser',
	user_table_id =  '$login_ID'
	WHERE email = '$userName'";
	$result8 = mysqli_query($link, $query8)or die("MySQL ERROR on query 8: ".mysqli_error($link));
	
    } // end for loop for athletic clubs
    }//end general
  
    if (isset($_POST['athletics'])) 
       {
        $optionArray3 = $_POST['athletics'];
      
      for ($i = 0; $i < count($optionArray3); $i++){
      	mysqli_query($link, "start transaction;");
      	
      	$cleanName = str_replace(' ', '', $optionArray3[$i]);
        $cleanName = strtolower($cleanName);
        $cleanName = trim($cleanName);
        $cleanName = preg_replace('/[^a-z]/i','',$cleanName);
        $tax = rand(100,9000);
        $tax2 = rand(1,99);
        $tax = $tax.$tax2;
        $userName = $cleanName.$tax;
        $clubType3 = $ct;
        
        $loginPass = $cleanName.$tax;
        $loginPassx = sha1($loginPass.$salt); 	
	$landingPage = "editFundraiser/coordhome.php";
      
	
	
      	//insert some data for user_info table
      	$query1 = "INSERT INTO user_info(companyName, address1, address2, city, state, zip, email, workPhone, bannerPath, role, dealer)";
      	$query1 .= "VALUES('$groupName', '$address1', '$address2', '$city', '$state', '$zip',
      	'$userName', '$phone', '$bannerPicPath', '$role', '$optionArray3[$i]')";
      	
      	$result1 = mysqli_query($link, $query1)or die("MySQL ERROR on query 1: ".mysqli_error($link));  
       
        //query data just inserted to get info id
        $query2 = "Select * FROM $table1 WHERE companyName='$groupName' AND zip='$zip'";
        $result2 = mysqli_query($link, $query2)or die("MySQL ERROR om query 2: ".mysqli_error($link));
        $row1 = mysqli_fetch_assoc($result2);
        $user_id = $row1['userInfoID'];
        //isert fundrais
	
	//get sample photos
        $sampleR = "SELECT * FROM sample_websites WHERE orgType = '$neworgtype' AND club = '$optionArray3[$i]'";
        $sampleResult = mysqli_query($link, $sampleR)or die("sjgfshg".mysqli_error($link));
        $row2r = mysqli_fetch_assoc($sampleResult);
     
        $studentPhoto = $row2r['student_leaders'];
        $groupPhoto = $row2r['groupPhoto'];
        $bannerPhoto = $row2r['bannerPath'];
        $contactPhoto = $row2r['contact_group_photo'];
        $groupLeaderPhoto = $row2r['group_leader'];
	
	$query4 = "INSERT INTO $table3 (Dealer, DealerDir, Phone, Address1, Address2, City, State, Zip, Banner, ContactName, sponsorid, setuppersonid, signuptype, orgtype, demo, email, website, leader_pic, location_pic, group_team_pic, contact_pic, userName, banner_path, firstPass, clubType) VALUES ( '$groupName', '$optionArray3[$i]', '$phone','$address1','$address2','$city','$state','$zip', '$bannerPicPath', '$contactFirstName', '$parentID', '$setup_person','$type',
'$neworgtype', '$user_id', '$contactEmail','$url', '$groupLeaderPhoto', '$contactPhoto', '$groupPhoto', '$studentPhoto', '$userName', '$bannerPicPath', '$loginPass', '$clubType')";
 
	$result4 = mysqli_query($link, $query4)or die("MySQL ERROR: on query 4 ".mysqli_error($link));
  	
  	$query6 = "SELECT * FROM $table3 WHERE userName ='$userName'";
  	$result6 = mysqli_query($link, $query6)or die("MySQL ERROR om query 6: ".mysqli_error($link));
  	$id_row = mysqli_fetch_assoc($result6);
  	$f_id = $id_row['loginid'];
  	$clubName = $id_row['Dealer'];
  	$club_type3 = $id_row['DealerDir'];
  	$blank = "";
  	
  	$query3 = "INSERT INTO $table2 (username, password, Security, landingPage, salt, created, lastLogin, role)";
	$query3 .= "VALUES('$userName','$loginPassx','1','$landingPage','$salt', now(), now(), '$role')";
	$result3 = mysqli_query($link, $query3)or die("MySQL ERROR om query 3: ".mysqli_error($link));
	
	$query19 = "SELECT * FROM users WHERE username = '$userName'";
	$result19 = mysqli_query($link, $query19)or die("MySQL ERROR om query 19: ".mysqli_error($link));
	$row19 = mysqli_fetch_assoc($result19);
	$newClubID = $row19['userID'];
	
	$query5 = "INSERT INTO $table4 (c1, c1n, c2, c2n, c3, c3n, c4, c4n, fundid)";
	$query5 .= "VALUES('$blank','$blank','$blank','$blank','$blank', '$blank', '$blank' ,'$blank', '$f_id')";
	$result5 = mysqli_query($link, $query5)or die("MySQL ERROR on query 5: ".mysqli_error($link));
	
	$sql1= "SELECT * FROM sample_websites WHERE club = '$optionArray3[$i]' AND orgType = '$neworgtype'";
	$sqlResult = mysqli_query($link, $sql1)or die("MySQL ERROR on sql1: ".mysqli_error($link));
	$sql_row = mysqli_fetch_assoc($sqlResult);
	$reason1 = $sql_row['reason1'];
	$reason2 = $sql_row['reason2'];
	$reason3 = $sql_row['reason3'];
	$reason4 = $sql_row['reason4'];
	$reason5 = $sql_row['reason5'];
	$reason6 = $sql_row['reason6'];
	$reason7 = $sql_row['reason7'];
	$reason8 = $sql_row['reason8'];
	$reason9 = $sql_row['reason9'];
	$reason10 = $sql_row['reason10'];
	
	$query10 = "INSERT INTO fund_reasons (fundID, r1, r2, r3, r4, r5, r6, r7, r8, r9, r10)";
	$query10 .= "VALUES('$f_id', '$reason1', '$reason2', '$reason3', '$reason4', '$reason5', '$reason6', '$reason7', '$reason8', '$reason9', '$reason10')";
	$result10 = mysqli_query($link, $query10)or die("MySQL ERROR on query 510: ".mysqli_error($link));
	
	$query7 = "SELECT * FROM users WHERE username = '$userName'";
	$result7 = mysqli_query($link, $query7)or die("MySQL ERROR on query 7: ".mysqli_error($link));
	$row7 = mysqli_fetch_assoc($result7);
	$login_ID = $row7['userID'];
	
	$query8 = "UPDATE user_info SET
	salesPerson = '$loginuser',
	user_table_id =  '$login_ID'
	WHERE email = '$userName'";
	$result8 = mysqli_query($link, $query8)or die("MySQL ERROR on query 8: ".mysqli_error($link));
     
    } // end for loop for athletic clubs
   }//end athletics
   if($athletics1 != '')
   {
      
      	$cleanName = str_replace(' ', '', $athletics1);
        $cleanName = strtolower($cleanName);
        $cleanName = trim($cleanName);
        $cleanName = preg_replace('/[^a-z]/i','',$cleanName);
        $tax = rand(100,9000);
        $tax2 = rand(1,99);
        $tax = $tax.$tax2;
        $userName = $cleanName.$tax;
        $clubType3 = $ct;
        
        $loginPass = $cleanName.$tax;
        $loginPassx = sha1($loginPass.$salt); 	
	$landingPage = "editFundraiser/coordhome.php";
      
	
	
      	//insert some data for user_info table
      	$query1 = "INSERT INTO user_info(companyName, address1, address2, city, state, zip, email, workPhone, bannerPath, role, dealer)";
      	$query1 .= "VALUES('$groupName', '$address1', '$address2', '$city', '$state', '$zip',
      	'$userName', '$phone', '$bannerPicPath', '$role', '$athletics1')";
      	
      	$result1 = mysqli_query($link, $query1)or die("MySQL ERROR on query 1: ".mysqli_error($link));  
       
        //query data just inserted to get info id
        $query2 = "Select * FROM $table1 WHERE companyName='$groupName' AND zip='$zip'";
        $result2 = mysqli_query($link, $query2)or die("MySQL ERROR om query 2: ".mysqli_error($link));
        $row1 = mysqli_fetch_assoc($result2);
        $user_id = $row1['userInfoID'];
        //isert fundrais
	
	//get sample photos
        $sampleR = "SELECT * FROM sample_websites WHERE orgType = '$neworgtype' AND club = '$athletics1'";
        $sampleResult = mysqli_query($link, $sampleR)or die("sjgfshg".mysqli_error($link));
        $row2r = mysqli_fetch_assoc($sampleResult);
     
        $studentPhoto = $row2r['student_leaders'];
        $groupPhoto = $row2r['groupPhoto'];
        $bannerPhoto = $row2r['bannerPath'];
        $contactPhoto = $row2r['contact_group_photo'];
        $groupLeaderPhoto = $row2r['group_leader'];
	
	$query4 = "INSERT INTO $table3 (Dealer, DealerDir, Phone, Address1, Address2, City, State, Zip, Banner,  ContactName, sponsorid, setuppersonid, signuptype, orgtype, demo, email, website, leader_pic, location_pic, group_team_pic, contact_pic, userName, banner_path, firstPass, clubType) VALUES ( '$groupName', '$athletics1', '$phone','$address1','$address2','$city','$state','$zip', '$bannerPicPath', '$contactFirstName', '$parentID', '$setup_person','$type',
'$neworgtype', '$user_id', '$contactEmail','$url', '$groupLeaderPhoto', '$contactPhoto', '$groupPhoto', '$studentPhoto', '$userName', '$bannerPicPath', '$loginPass', '$clubType')";
 
	$result4 = mysqli_query($link, $query4)or die("MySQL ERROR: on query 4 ".mysqli_error($link));
  	
  	$query6 = "SELECT * FROM $table3 WHERE userName ='$userName'";
  	$result6 = mysqli_query($link, $query6)or die("MySQL ERROR om query 6: ".mysqli_error($link));
  	$id_row = mysqli_fetch_assoc($result6);
  	$f_id = $id_row['loginid'];
  	$clubName = $id_row['Dealer'];
  	$club_type3 = $id_row['DealerDir'];
  	$blank = "";
  	
  	$query3 = "INSERT INTO $table2 (username, password, Security, landingPage, salt, created, lastLogin, role)";
	$query3 .= "VALUES('$userName','$loginPassx','1','$landingPage','$salt', now(), now(), '$role')";
	$result3 = mysqli_query($link, $query3)or die("MySQL ERROR om query 3: ".mysqli_error($link));
	
	$query19 = "SELECT * FROM users WHERE username = '$userName'";
	$result19 = mysqli_query($link, $query19)or die("MySQL ERROR om query 19: ".mysqli_error($link));
	$row19 = mysqli_fetch_assoc($result19);
	$newClubID = $row19['userID'];
	
	$query5 = "INSERT INTO $table4 (c1, c1n, c2, c2n, c3, c3n, c4, c4n, fundid)";
	$query5 .= "VALUES('$blank','$blank','$blank','$blank','$blank', '$blank', '$blank' ,'$blank', '$f_id')";
	$result5 = mysqli_query($link, $query5)or die("MySQL ERROR on query 5: ".mysqli_error($link));
	
	$sql1= "SELECT * FROM sample_websites WHERE club = 'athletics1' AND orgType = '$neworgtype'";
	$sqlResult = mysqli_query($link, $sql1)or die("MySQL ERROR on sql1: ".mysqli_error($link));
	$sql_row = mysqli_fetch_assoc($sqlResult);
	$reason1 = $sql_row['reason1'];
	$reason2 = $sql_row['reason2'];
	$reason3 = $sql_row['reason3'];
	$reason4 = $sql_row['reason4'];
	$reason5 = $sql_row['reason5'];
	$reason6 = $sql_row['reason6'];
	$reason7 = $sql_row['reason7'];
	$reason8 = $sql_row['reason8'];
	$reason9 = $sql_row['reason9'];
	$reason10 = $sql_row['reason10'];
	
	$query10 = "INSERT INTO fund_reasons (fundID, r1, r2, r3, r4, r5, r6, r7, r8, r9, r10)";
	$query10 .= "VALUES('$f_id', '$reason1', '$reason2', '$reason3', '$reason4', '$reason5', '$reason6', '$reason7', '$reason8', '$reason9', '$reason10')";
	$result10 = mysqli_query($link, $query10)or die("MySQL ERROR on query 510: ".mysqli_error($link));
	
	$query7 = "SELECT * FROM users WHERE username = '$userName'";
	$result7 = mysqli_query($link, $query7)or die("MySQL ERROR on query 7: ".mysqli_error($link));
	$row7 = mysqli_fetch_assoc($result7);
	$login_ID = $row7['userID'];
	
	$query8 = "UPDATE user_info SET
	salesPerson = '$loginuser',
	user_table_id =  '$login_ID'
	WHERE email = '$userName'";
	$result8 = mysqli_query($link, $query8)or die("MySQL ERROR on query 8: ".mysqli_error($link));
   }
   if($general1 != '')
   {
        $cleanName = str_replace(' ', '', $general1);
        $cleanName = strtolower($cleanName);
        $cleanName = trim($cleanName);
        $cleanName = preg_replace('/[^a-z]/i','',$cleanName);
        $tax = rand(100,9000);
        $tax2 = rand(1,99);
        $tax = $tax.$tax2;
        $userName = $cleanName.$tax;
        $clubType3 = $ct;
        
        $loginPass = $cleanName.$tax;
        $loginPassx = sha1($loginPass.$salt); 	
	$landingPage = "editFundraiser/coordhome.php";
      
	
	
      	//insert some data for user_info table
      	$query1 = "INSERT INTO user_info(companyName, address1, address2, city, state, zip, email, workPhone, bannerPath, role, dealer)";
      	$query1 .= "VALUES('$groupName', '$address1', '$address2', '$city', '$state', '$zip',
      	'$userName', '$phone', '$bannerPicPath', '$role', '$general1')";
      	
      	$result1 = mysqli_query($link, $query1)or die("MySQL ERROR on query 1: ".mysqli_error($link));  
       
        //query data just inserted to get info id
        $query2 = "Select * FROM $table1 WHERE companyName='$groupName' AND zip='$zip'";
        $result2 = mysqli_query($link, $query2)or die("MySQL ERROR om query 2: ".mysqli_error($link));
        $row1 = mysqli_fetch_assoc($result2);
        $user_id = $row1['userInfoID'];
        //isert fundrais
	
	//get sample photos
        $sampleR = "SELECT * FROM sample_websites WHERE orgType = '$neworgtype' AND club = '$general1'";
        $sampleResult = mysqli_query($link, $sampleR)or die("sjgfshg".mysqli_error($link));
        $row2r = mysqli_fetch_assoc($sampleResult);
     
        $studentPhoto = $row2r['student_leaders'];
        $groupPhoto = $row2r['groupPhoto'];
        $bannerPhoto = $row2r['bannerPath'];
        $contactPhoto = $row2r['contact_group_photo'];
        $groupLeaderPhoto = $row2r['group_leader'];
	
	$query4 = "INSERT INTO $table3 (Dealer, DealerDir, Phone, Address1, Address2, City, State, Zip, Banner,  ContactName, sponsorid, setuppersonid, signuptype, orgtype, demo, email, website, leader_pic, location_pic, group_team_pic, contact_pic, userName, banner_path, firstPass, clubType) VALUES ( '$groupName', '$general1', '$phone','$address1','$address2','$city','$state','$zip', '$bannerPicPath', '$contactFirstName', '$parentID', '$setup_person','$type',
'$neworgtype', '$user_id', '$contactEmail','$url', '$groupLeaderPhoto', '$contactPhoto', '$groupPhoto', '$studentPhoto', '$userName', '$bannerPicPath', '$loginPass', '$clubType')";
 
	$result4 = mysqli_query($link, $query4)or die("MySQL ERROR: on query 4 ".mysqli_error($link));
  	
  	$query6 = "SELECT * FROM $table3 WHERE userName ='$userName'";
  	$result6 = mysqli_query($link, $query6)or die("MySQL ERROR om query 6: ".mysqli_error($link));
  	$id_row = mysqli_fetch_assoc($result6);
  	$f_id = $id_row['loginid'];
  	$clubName = $id_row['Dealer'];
  	$club_type3 = $id_row['DealerDir'];
  	$blank = "";
  	
  	$query3 = "INSERT INTO $table2 (username, password, Security, landingPage, salt, created, lastLogin, role)";
	$query3 .= "VALUES('$userName','$loginPassx','1','$landingPage','$salt', now(), now(), '$role')";
	$result3 = mysqli_query($link, $query3)or die("MySQL ERROR om query 3: ".mysqli_error($link));
	
	$query19 = "SELECT * FROM users WHERE username = '$userName'";
	$result19 = mysqli_query($link, $query19)or die("MySQL ERROR om query 19: ".mysqli_error($link));
	$row19 = mysqli_fetch_assoc($result19);
	$newClubID = $row19['userID'];
	
	$query5 = "INSERT INTO $table4 (c1, c1n, c2, c2n, c3, c3n, c4, c4n, fundid)";
	$query5 .= "VALUES('$blank','$blank','$blank','$blank','$blank', '$blank', '$blank' ,'$blank', '$f_id')";
	$result5 = mysqli_query($link, $query5)or die("MySQL ERROR on query 5: ".mysqli_error($link));
	
	$sql1= "SELECT * FROM sample_websites WHERE club = '$general1' AND orgType = '$neworgtype'";
	$sqlResult = mysqli_query($link, $sql1)or die("MySQL ERROR on sql1: ".mysqli_error($link));
	$sql_row = mysqli_fetch_assoc($sqlResult);
	$reason1 = $sql_row['reason1'];
	$reason2 = $sql_row['reason2'];
	$reason3 = $sql_row['reason3'];
	$reason4 = $sql_row['reason4'];
	$reason5 = $sql_row['reason5'];
	$reason6 = $sql_row['reason6'];
	$reason7 = $sql_row['reason7'];
	$reason8 = $sql_row['reason8'];
	$reason9 = $sql_row['reason9'];
	$reason10 = $sql_row['reason10'];
	
	$query10 = "INSERT INTO fund_reasons (fundID, r1, r2, r3, r4, r5, r6, r7, r8, r9, r10)";
	$query10 .= "VALUES('$f_id', '$reason1', '$reason2', '$reason3', '$reason4', '$reason5', '$reason6', '$reason7', '$reason8', '$reason9', '$reason10')";
	$result10 = mysqli_query($link, $query10)or die("MySQL ERROR on query 510: ".mysqli_error($link));
	
	$query7 = "SELECT * FROM users WHERE username = '$userName'";
	$result7 = mysqli_query($link, $query7)or die("MySQL ERROR on query 7: ".mysqli_error($link));
	$row7 = mysqli_fetch_assoc($result7);
	$login_ID = $row7['userID'];
	
	$query8 = "UPDATE user_info SET
	salesPerson = '$loginuser',
	user_table_id =  '$login_ID'
	WHERE email = '$userName'";
	$result8 = mysqli_query($link, $query8)or die("MySQL ERROR on query 8: ".mysqli_error($link));
   }
   if($clubs1 != '')
   {
       $cleanName = str_replace(' ', '', $general1);
        $cleanName = strtolower($cleanName);
        $cleanName = trim($cleanName);
        $cleanName = preg_replace('/[^a-z]/i','',$cleanName);
        $tax = rand(100,9000);
        $tax2 = rand(1,99);
        $tax = $tax.$tax2;
        $userName = $cleanName.$tax;
        $clubType3 = $ct;
        
        $loginPass = $cleanName.$tax;
        $loginPassx = sha1($loginPass.$salt); 	
	$landingPage = "editFundraiser/coordhome.php";
      
      	//insert some data for user_info table
      	$query1 = "INSERT INTO user_info(companyName, address1, address2, city, state, zip, email, workPhone, bannerPath, role, dealer)";
      	$query1 .= "VALUES('$groupName', '$address1', '$address2', '$city', '$state', '$zip',
      	'$userName', '$phone', '$bannerPicPath', '$role', '$clubs1')";
      	
      	$result1 = mysqli_query($link, $query1)or die("MySQL ERROR on query 1: ".mysqli_error($link));  
       
        //query data just inserted to get info id
        $query2 = "Select * FROM $table1 WHERE companyName='$groupName' AND zip='$zip'";
        $result2 = mysqli_query($link, $query2)or die("MySQL ERROR om query 2: ".mysqli_error($link));
        $row1 = mysqli_fetch_assoc($result2);
        $user_id = $row1['userInfoID'];
        //isert fundrais
	
	//get sample photos
        $sampleR = "SELECT * FROM sample_websites WHERE orgType = '$neworgtype' AND club = '$clubs1'";
        $sampleResult = mysqli_query($link, $sampleR)or die("sjgfshg".mysqli_error($link));
        $row2r = mysqli_fetch_assoc($sampleResult);
     
        $studentPhoto = $row2r['student_leaders'];
        $groupPhoto = $row2r['groupPhoto'];
        $bannerPhoto = $row2r['bannerPath'];
        $contactPhoto = $row2r['contact_group_photo'];
        $groupLeaderPhoto = $row2r['group_leader'];
	
	$query4 = "INSERT INTO $table3 (Dealer, DealerDir, Phone, Address1, Address2, City, State, Zip, Banner, ContactName, sponsorid, setuppersonid, signuptype, orgtype, demo, email, website, leader_pic, location_pic, group_team_pic, contact_pic, userName, banner_path, firstPass, clubType) VALUES ( '$groupName', '$clubs1', '$phone','$address1','$address2','$city','$state','$zip', '$bannerPicPath', '$contactFirstName', '$parentID', '$setup_person','$type',
'$neworgtype', '$user_id', '$contactEmail','$url', '$groupLeaderPhoto', '$contactPhoto', '$groupPhoto', '$studentPhoto', '$userName', '$bannerPicPath', '$loginPass', '$clubType')";
 
	$result4 = mysqli_query($link, $query4)or die("MySQL ERROR: on query 4 ".mysqli_error($link));
  	
  	$query6 = "SELECT * FROM $table3 WHERE userName ='$userName'";
  	$result6 = mysqli_query($link, $query6)or die("MySQL ERROR om query 6: ".mysqli_error($link));
  	$id_row = mysqli_fetch_assoc($result6);
  	$f_id = $id_row['loginid'];
  	$clubName = $id_row['Dealer'];
  	$club_type3 = $id_row['DealerDir'];
  	$blank = "";
  	
  	$query3 = "INSERT INTO $table2 (username, password, Security, landingPage, salt, created, lastLogin, role)";
	$query3 .= "VALUES('$userName','$loginPassx','1','$landingPage','$salt', now(), now(), '$role')";
	$result3 = mysqli_query($link, $query3)or die("MySQL ERROR om query 3: ".mysqli_error($link));
	
	$query19 = "SELECT * FROM users WHERE username = '$userName'";
	$result19 = mysqli_query($link, $query19)or die("MySQL ERROR om query 19: ".mysqli_error($link));
	$row19 = mysqli_fetch_assoc($result19);
	$newClubID = $row19['userID'];
	
	$query5 = "INSERT INTO $table4 (c1, c1n, c2, c2n, c3, c3n, c4, c4n, fundid)";
	$query5 .= "VALUES('$blank','$blank','$blank','$blank','$blank', '$blank', '$blank' ,'$blank', '$f_id')";
	$result5 = mysqli_query($link, $query5)or die("MySQL ERROR on query 5: ".mysqli_error($link));
	
	$sql1= "SELECT * FROM sample_websites WHERE club = '$clubs1' AND orgType = '$neworgtype'";
	$sqlResult = mysqli_query($link, $sql1)or die("MySQL ERROR on sql1: ".mysqli_error($link));
	$sql_row = mysqli_fetch_assoc($sqlResult);
	$reason1 = $sql_row['reason1'];
	$reason2 = $sql_row['reason2'];
	$reason3 = $sql_row['reason3'];
	$reason4 = $sql_row['reason4'];
	$reason5 = $sql_row['reason5'];
	$reason6 = $sql_row['reason6'];
	$reason7 = $sql_row['reason7'];
	$reason8 = $sql_row['reason8'];
	$reason9 = $sql_row['reason9'];
	$reason10 = $sql_row['reason10'];
	
	$query10 = "INSERT INTO fund_reasons (fundID, r1, r2, r3, r4, r5, r6, r7, r8, r9, r10)";
	$query10 .= "VALUES('$f_id', '$reason1', '$reason2', '$reason3', '$reason4', '$reason5', '$reason6', '$reason7', '$reason8', '$reason9', '$reason10')";
	$result10 = mysqli_query($link, $query10)or die("MySQL ERROR on query 510: ".mysqli_error($link));
	
	$query7 = "SELECT * FROM users WHERE username = '$userName'";
	$result7 = mysqli_query($link, $query7)or die("MySQL ERROR on query 7: ".mysqli_error($link));
	$row7 = mysqli_fetch_assoc($result7);
	$login_ID = $row7['userID'];
	
	$query8 = "UPDATE user_info SET
	salesPerson = '$loginuser',
	user_table_id =  '$login_ID'
	WHERE email = '$userName'";
	$result8 = mysqli_query($link, $query8)or die("MySQL ERROR on query 8: ".mysqli_error($link));
   }
   
   header('Location: editClub.php');
}//post submit 
?>