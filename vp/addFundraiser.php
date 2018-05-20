<?php  
    include '../includes/autoload.php';
    if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "VP")
       {
            header('Location: ../index.php');
            exit;
       }
       if($_SESSION['freeze'] == "TRUE")
       {
          // echo "Account Frozen";
           header('Location: accountEdit.php');
       }
    
    $loginuser = $_SESSION['userId'];
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
    $contactEmail = mysqli_real_escape_string($link, $_POST['contactEmail']);
    $address1 = mysqli_real_escape_string($link, $_POST['address1']);
    $address2 = mysqli_real_escape_string($link, $_POST['address2']);
    $city = mysqli_real_escape_string($link, $_POST['city']);
    $state = mysqli_real_escape_string($link, $_POST['state']);
    $zip = mysqli_real_escape_string($link, $_POST['zip']);
    $phone = mysqli_real_escape_string($link, $_POST['phone']);
    $neworgtype = mysqli_real_escape_string($link, $_POST['orgtype']);
    $url = mysqli_real_escape_string($link, $_POST['websiteURL']);
    $repID =  mysqli_real_escape_string($link, $_POST['rpid']);
    //$repID =  mysqli_real_escape_string($link, $_POST['rpid']);

    $club_type1 = mysqli_real_escape_string($link, $_POST['grouptype']);
    if($neworgtype == "High School" ||
	$neworgtype == "Elementary School" ||
	$neworgtype == "Middle School" ||
	$neworgtype == "College" ||
	$neworgtype == "Home School" ||
	$neworgtype == "Trade, Vocational & Tech" ||
	$neworgtype == "Camps" ||
	$neworgtype == "Pre-School") 
	{
	    $club_type2 = "Clubs & Organizations";
	    $education = 1;
	}
	else
	{
	   $club_type2 = $club_type1;
	   $education = 0;
	}


      // process banner
    $bannerPic = mysqli_real_escape_string($link, $_FILES['banner']['tmp_name']);//banner
    $orgLeaderPhoto = mysqli_real_escape_string($link, $_FILES['AddOrgLeaderPhoto']['tmp_name']);//position 1
    $orgLocationPhoto = mysqli_real_escape_string($link,$_FILES['AddOrgLocationPhoto']['tmp_name']);//position 2
    $orgGroupPhoto = mysqli_real_escape_string($link,$_FILES['AddOrgGroupPhoto']['tmp_name']);//position 3
    $collage1 = mysqli_real_escape_string($link,$_FILES['collagePhoto']['tmp_name']);//collage
    
    $imageDirPath = $_SERVER['DOCUMENT_ROOT'].'/images/banners/';
    $bannerPic = checkName($bannerPic);
    $orgLeaderPhoto = checkName($orgLeaderPhoto);
    $orgLocationPhoto = checkName($orgLocationPhoto);
    $orgGroupPhoto = checkName($orgGroupPhoto);
    $collage1 = checkName($collage1);
    
    $bannerPicPath = ""; 
    $orgLeaderPicPath = "";
    $orgLocationPicPath = "";
    $orgGroupPicPath = "";
    $collagePicPath = "";
    $id = str_replace(' ', '', $groupName);
    $id = str_replace("'", '', $groupName);
    $id = preg_replace('/[^A-Za-z0-9\-]/', '', $id);
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
	
	if($bannerPic != '')
	{
	   $bannerPicPath = process_image('banner', $id, $bannerPic, $imageDirPath);
	}
        if($orgLeaderPhoto != '')
        {
	   $orgLeaderPicPath = process_image('AddOrgLeaderPhoto', $id, $orgLeaderPhoto, $imageDirPath);
        }
	if($orgLocationPhoto != '')
	{
	   $orgLocationPicPath = process_image('AddOrgLocationPhoto', $id, $orgLocationPhoto, $imageDirPath);
	}
	if($orgGroupPhoto != '')
	{
	   $orgGroupPicPath = process_image('AddOrgGroupPhoto', $id, $orgGroupPhoto, $imageDirPath);
	}
	if($collage1 != '')
	{
	   $collagePicPath = process_image('collagePhoto', $id, $collage1, $imageDirPath);
	}
	
	$cleanName1 = str_replace(' ', '', $groupName);
        $cleanName1 = strtolower($cleanName1);
        $cleanName1 = trim($cleanName1);
        $cleanName1 = preg_replace('/[^a-z]/i','',$cleanName1);
        $tax = rand(100,9000);
        $tax2 = rand(1,99);
        $tax = $tax.$tax2;
        $userName = $cleanName1.$tax;
        
        $loginPass1 = $cleanName1.$tax;
        $loginPassx1 = sha1($loginPass.$salt); 	
	$landingPage = "editFundraiser/coordhome.php";
	
	//insert user name and password
	$query31 = "INSERT INTO $table2 (username, password, Security, landingPage, salt, created, lastLogin, role)";
	$query31 .= "VALUES('$userName','$loginPassx1','1','$landingPage','$salt', now(), now(), '$role')";
	$result31 = mysqli_query($link, $query31)or die("MySQL ERROR om query 31: ".mysqli_error($link));
	
	//get it back
	$query191 = "SELECT * FROM users WHERE username = '$userName'";
	$result191 = mysqli_query($link, $query191)or die("MySQL ERROR om query 191: ".mysqli_error($link));
	$row191 = mysqli_fetch_assoc($result191);
	$newClubID1 = $row191['userID']; 	
	
	//insert user info
	$query111 = "INSERT INTO user_info(companyName, address1, address2, city, state, zip, email, salesPerson, workPhone, bannerPath, role, dealer, user_table_id)";
      	$query111 .= "VALUES('$groupName', '$address1', '$address2', '$city', '$state', '$zip',
      	'$userName', '$repID','$phone', '$bannerPicPath', '$role', 'Main Group', '$newClubID1')";
      	
      	$result111 = mysqli_query($link, $query111)or die("MySQL ERROR on query 111: ".mysqli_error($link));  
       
        //query data just inserted to get info id
        $query21 = "Select * FROM user_info WHERE companyName='$groupName' AND zip='$zip'";
        $result21 = mysqli_query($link, $query21)or die("MySQL ERROR om query 2: ".mysqli_error($link));
        $row21 = mysqli_fetch_assoc($result21);
        $user_id = $row21['userInfoID'];
        
        //get sample photos
        $sampleR = "SELECT * FROM sample_websites WHERE orgType = '$neworgtype' AND club = 'Main Group'";
        $sampleResult = mysqli_query($link, $sampleR)or die("sjgfshg".mysqli_error($link));
        $row2r = mysqli_fetch_assoc($sampleResult);
     
        $studentPhoto = $row2r['student_leaders'];
        $groupPhoto = $row2r['groupPhoto'];
        $bannerPhoto = $row2r['bannerPath'];
        $contactPhoto = $row2r['contact_group_photo'];
        $groupLeaderPhoto = $row2r['group_leader'];
        //$clubType = $row2r['clubType'];
        
        $reason1 = $row2r['reason1'];
	$reason2 = $row2r['reason2'];
	$reason3 = $row2r['reason3'];
	$reason4 = $row2r['reason4'];
	$reason5 = $row2r['reason5'];
	$reason6 = $row2r['reason6'];
	$reason7 = $row2r['reason7'];
	$reason8 = $row2r['reason8'];
	$reason9 = $row2r['reason9'];
	$reason10 = $row2r['reason10'];
	
	
	
	if($bannerPicPath != '')
	{
	   $realBanner = $bannerPicPath;
	}
	else
	{
	   $realBanner = $bannerPhoto;
	}
	if($orgLeaderPicPath != '')
	{
	   $realLeaderPic = $orgLeaderPicPath;
	}
	else
	{
	   $realLeaderPic = $groupLeaderPhoto;
	}
	if($orgLocationPicPath != '')
	{
	   $realStudentPic = $orgLocationPicPath;
	}
	else
	{
	   $realStudentPic = $contactPhoto;
	}
	if($orgGroupPicPath != '')
	{
	   $realGroupPic = $orgGroupPicPath;
	}
	else
	{
	   $realGroupPic = $studentPhoto;
	}
	if($collagePicPath != '')
	{
	   $realCollagePic = $collagePicPath;
	}
	else
	{
	   $realCollagePic = $groupPhoto;
	}
        
        
	//insert parent group
	$newSQL1 = "INSERT INTO $table3 (Dealer, DealerDir, Phone, Address1, Address2, City, State, Zip,Banner, sponsorid, setuppersonid, signuptype, orgtype, demo, email, website, leader_pic, location_pic, group_team_pic, contact_pic, userName, banner_path, firstPass, isMainGroup, clubType) VALUES ( '$groupName', 'Main Group', '$phone','$address1','$address2','$city','$state','$zip', '$realBanner', '$parentID', '$repID','$type',
'$neworgtype', '$user_id', '$contactEmail','$url', '$realLeaderPic', '$realGroupPic', '$realCollagePic', '$realStudentPic', '$userName', '$realBanner', '$loginPass1', 1, '$club_type2')";
     
 
	$newResult1 = mysqli_query($link, $newSQL1)or die("MySQL ERROR: on query new sql1 ".mysqli_error($link));
	
	//get the parent group id
	$getParent = "SELECT * FROM $table3 WHERE Dealer = '$groupName' AND userName = '$userName'";
        $parentResult = mysqli_query($link, $getParent)or die("MySQL ERROR: on query get parent ".mysqli_error($link));
        $parentRow = mysqli_fetch_assoc($parentResult);
        $parentID = $parentRow['loginid'];
        
	
	$query10 = "INSERT INTO fund_reasons (fundID, r1, r2, r3, r4, r5, r6, r7, r8, r9, r10)";
	$query10 .= "VALUES('$parentID', '$reason1', '$reason2', '$reason3', '$reason4', '$reason5', '$reason6', '$reason7', '$reason8', '$reason9', '$reason10')";
	$result10 = mysqli_query($link, $query10)or die("MySQL ERROR on query 510: ".mysqli_error($link));
	
	$query5 = "INSERT INTO captions (c1, c1n, c2, c2n, c3, c3n, c4, c4n, fundid)";
	$query5 .= "VALUES('$blank','$blank','$blank','$blank','$blank', '$blank', '$blank' ,'$blank', '$parentID')";
	$result5 = mysqli_query($link, $query5)or die("MySQL ERROR on query 5: ".mysqli_error($link));
        
	//set up clubs
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
        
        $loginPass = $cleanName.$tax;
        $loginPassx = sha1($loginPass.$salt); 	
	$landingPage = "editFundraiser/coordhome.php";
	
	$query3 = "INSERT INTO $table2 (username, password, Security, landingPage, salt, created, lastLogin, role)";
	$query3 .= "VALUES('$userName','$loginPassx','1','$landingPage','$salt', now(), now(), '$role')";
	$result3 = mysqli_query($link, $query3)or die("MySQL ERROR om query 3: ".mysqli_error($link));
	
	$query19 = "SELECT * FROM users WHERE username = '$userName'";
	$result19 = mysqli_query($link, $query19)or die("MySQL ERROR om query 19: ".mysqli_error($link));
	$row19 = mysqli_fetch_assoc($result19);
	$newClubID = $row19['userID']; 	
        
	
      	//insert some data for user_info table
      	$query1 = "INSERT INTO user_info(companyName, address1, address2, city, state, zip, email, salesPerson, workPhone, bannerPath, role, dealer, user_table_id)";
      	$query1 .= "VALUES('$groupName', '$address1', '$address2', '$city', '$state', '$zip',
      	'$userName', '$repID',  '$phone', '$bannerPicPath', '$role', '$optionArray[$i]', '$newClubID')";
      	
      	$result1 = mysqli_query($link, $query1)or die("MySQL ERROR on query 461: ".mysqli_error($link));  
       
        //query data just inserted to get info id
        $query2 = "Select * FROM user_info WHERE companyName='$groupName' AND zip='$zip'";
        $result2 = mysqli_query($link, $query2)or die("MySQL ERROR om query 2: ".mysqli_error($link));
        $row1 = mysqli_fetch_assoc($result2);
        $user_id = $row1['userInfoID'];
        //isert fundraiser
        
        //get sample photos
        if($education = 1)
        {
           $sampleR = "SELECT * FROM sample_websites WHERE orgType = '$neworgtype' AND club = '$optionArray[$i]'";
        }
        else
        {
           $sampleR = "SELECT * FROM sample_websites WHERE orgType = '$neworgtype' AND clubType = '$club_type2'";
        }
        $sampleResult = mysqli_query($link, $sampleR)or die("sjgfshg".mysqli_error($link));
        $row2r = mysqli_fetch_assoc($sampleResult);
     
        $studentPhoto = $row2r['student_leaders'];
        $groupPhoto = $row2r['groupPhoto'];
        $bannerPhoto = $row2r['bannerPath'];
        $contactPhoto = $row2r['contact_group_photo'];
        $groupLeaderPhoto = $row2r['group_leader'];
        //$clubType = $row2r['clubType'];
        
        $reason1 = $row2r['reason1'];
	$reason2 = $row2r['reason2'];
	$reason3 = $row2r['reason3'];
	$reason4 = $row2r['reason4'];
	$reason5 = $row2r['reason5'];
	$reason6 = $row2r['reason6'];
	$reason7 = $row2r['reason7'];
	$reason8 = $row2r['reason8'];
	$reason9 = $row2r['reason9'];
	$reason10 = $row2r['reason10'];
	
	if($bannerPicPath != '')
	{
	   $realBanner = $bannerPicPath;
	}
	else
	{
	   $realBanner = $bannerPhoto;
	}
	if($orgLeaderPicPath != '')
	{
	   $realLeaderPic = $orgLeaderPicPath;
	}
	else
	{
	   $realLeaderPic = $groupLeaderPhoto;
	}
	if($orgLocationPicPath != '')
	{
	   $realStudentPic = $orgLocationPicPath;
	}
	else
	{
	   $realStudentPic = $contactPhoto;
	}
	if($orgGroupPicPath != '')
	{
	   $realGroupPic = $orgGroupPicPath;
	}
	else
	{
	   $realGroupPic = $studentPhoto;
	}
	if($collagePicPath != '')
	{
	   $realCollagePic = $collagePicPath;
	}
	else
	{
	   $realCollagePic = $groupPhoto;
	}
	
	$query4 = "INSERT INTO $table3 (Dealer, DealerDir, Phone, Address1, Address2, City, State, Zip, Banner, sponsorid, setuppersonid, signuptype, orgtype,  demo, email, website, leader_pic, location_pic, group_team_pic, contact_pic, userName, banner_path, firstPass, clubType) VALUES ( '$groupName', '$optionArray[$i]', '$phone','$address1','$address2','$city','$state','$zip', '$realBanner', '$parentID', '$repID','$type',
'$neworgtype', '$user_id', '','$url', '$realLeaderPic', '$realGroupPic', '$realCollagePic', '$realStudentPic', '$userName', '$realBanner', '$loginPass', '$club_type2')";
 
	$result4 = mysqli_query($link, $query4)or die("MySQL ERROR: on query 4 ".mysqli_error($link));
  	
  	$query6 = "SELECT * FROM $table3 WHERE userName ='$userName'";
  	$result6 = mysqli_query($link, $query6)or die("MySQL ERROR om query 6: ".mysqli_error($link));
  	$id_row = mysqli_fetch_assoc($result6);
  	$f_id = $id_row['loginid'];
  	$clubName = $id_row['Dealer'];
  	$club_type3 = $id_row['DealerDir'];
  	$blank = "";
	
	$query10 = "INSERT INTO fund_reasons (fundID, r1, r2, r3, r4, r5, r6, r7, r8, r9, r10)";
	$query10 .= "VALUES('$f_id', '$reason1', '$reason2', '$reason3', '$reason4', '$reason5', '$reason6', '$reason7', '$reason8', '$reason9', '$reason10')";
	$result10 = mysqli_query($link, $query10)or die("MySQL ERROR on query 510: ".mysqli_error($link));
	
	$query5 = "INSERT INTO captions (c1, c1n, c2, c2n, c3, c3n, c4, c4n, fundid)";
	$query5 .= "VALUES('$blank','$blank','$blank','$blank','$blank', '$blank', '$blank' ,'$blank', '$f_id')";
	$result5 = mysqli_query($link, $query5)or die("MySQL ERROR on query 5: ".mysqli_error($link));
	
    }//for loop
   }//clubs 
   if (isset($_POST['clubs1'])) 
        {
           $other = $_POST['clubs1'];
      
     
      	$cleanName = str_replace(' ', '', $other);
        $cleanName = strtolower($cleanName);
        $cleanName = trim($cleanName);
        $cleanName = preg_replace('/[^a-z]/i','',$cleanName);
        $tax = rand(100,9000);
        $tax2 = rand(1,99);
        $tax = $tax.$tax2;
        $userName = $cleanName.$tax;
        
        $loginPass = $cleanName.$tax;
        $loginPassx = sha1($loginPass.$salt); 	
	$landingPage = "editFundraiser/coordhome.php";
	
	$query3 = "INSERT INTO $table2 (username, password, Security, landingPage, salt, created, lastLogin, role)";
	$query3 .= "VALUES('$userName','$loginPassx','1','$landingPage','$salt', now(), now(), '$role')";
	$result3 = mysqli_query($link, $query3)or die("MySQL ERROR om query 3: ".mysqli_error($link));
	
	$query19 = "SELECT * FROM users WHERE username = '$userName'";
	$result19 = mysqli_query($link, $query19)or die("MySQL ERROR om query 19: ".mysqli_error($link));
	$row19 = mysqli_fetch_assoc($result19);
	$newClubID = $row19['userID']; 	
        
	
      	//insert some data for user_info table
      	$query1 = "INSERT INTO user_info(companyName, address1, address2, city, state, zip, email, salesPerson, workPhone, bannerPath, role, dealer, user_table_id)";
      	$query1 .= "VALUES('$groupName', '$address1', '$address2', '$city', '$state', '$zip',
      	'$userName', '$repID',  '$phone', '$bannerPicPath', '$role', '$other', '$newClubID')";
      	
      	$result1 = mysqli_query($link, $query1)or die("MySQL ERROR on query 324361: ".mysqli_error($link));  
       
        //query data just inserted to get info id
        $query2 = "Select * FROM user_info WHERE companyName='$groupName' AND zip='$zip'";
        $result2 = mysqli_query($link, $query2)or die("MySQL ERROR om query 2: ".mysqli_error($link));
        $row1 = mysqli_fetch_assoc($result2);
        $user_id = $row1['userInfoID'];
        //isert fundraiser
        
        //get sample photos
        $sampleR = "SELECT * FROM sample_websites WHERE orgType = '$neworgtype' AND club = 'General'";
        $sampleResult = mysqli_query($link, $sampleR)or die("sjgfshg".mysqli_error($link));
        $row2r = mysqli_fetch_assoc($sampleResult);
     
        $studentPhoto = $row2r['student_leaders'];
        $groupPhoto = $row2r['groupPhoto'];
        $bannerPhoto = $row2r['bannerPath'];
        $contactPhoto = $row2r['contact_group_photo'];
        $groupLeaderPhoto = $row2r['group_leader'];
        //$clubType = "Clubs & Organizations";
        
        $reason1 = $row2r['reason1'];
	$reason2 = $row2r['reason2'];
	$reason3 = $row2r['reason3'];
	$reason4 = $row2r['reason4'];
	$reason5 = $row2r['reason5'];
	$reason6 = $row2r['reason6'];
	$reason7 = $row2r['reason7'];
	$reason8 = $row2r['reason8'];
	$reason9 = $row2r['reason9'];
	$reason10 = $row2r['reason10'];
	
	if($bannerPicPath != '')
	{
	   $realBanner = $bannerPicPath;
	}
	else
	{
	   $realBanner = $bannerPhoto;
	}
	if($orgLeaderPicPath != '')
	{
	   $realLeaderPic = $orgLeaderPicPath;
	}
	else
	{
	   $realLeaderPic = $groupLeaderPhoto;
	}
	if($orgLocationPicPath != '')
	{
	   $realStudentPic = $orgLocationPicPath;
	}
	else
	{
	   $realStudentPic = $contactPhoto;
	}
	if($orgGroupPicPath != '')
	{
	   $realGroupPic = $orgGroupPicPath;
	}
	else
	{
	   $realGroupPic = $studentPhoto;
	}
	if($collagePicPath != '')
	{
	   $realCollagePic = $collagePicPath;
	}
	else
	{
	   $realCollagePic = $groupPhoto;
	}
	
	$query4 = "INSERT INTO $table3 (Dealer, DealerDir, Phone, Address1, Address2, City, State, Zip, Banner, sponsorid, setuppersonid, signuptype, orgtype,  demo, email, website, leader_pic, location_pic, group_team_pic, contact_pic, userName, banner_path, firstPass, clubType) VALUES ( '$groupName', '$other', '$phone','$address1','$address2','$city','$state','$zip', '$realBanner', '$parentID', '$repID','$type',
'$neworgtype', '$user_id', '','$url', '$realLeaderPic', '$studentPhoto', '$groupPhoto', '$realStudentPic', '$userName', '$realBanner', '$loginPass', '$club_type2')";
 
	$result4 = mysqli_query($link, $query4)or die("MySQL ERROR: on query 4 ".mysqli_error($link));
  	
  	$query6 = "SELECT * FROM $table3 WHERE userName ='$userName'";
  	$result6 = mysqli_query($link, $query6)or die("MySQL ERROR om query 6: ".mysqli_error($link));
  	$id_row = mysqli_fetch_assoc($result6);
  	$f_id = $id_row['loginid'];
  	$clubName = $id_row['Dealer'];
  	$club_type3 = $id_row['DealerDir'];
  	$blank = "";
	
	$query10 = "INSERT INTO fund_reasons (fundID, r1, r2, r3, r4, r5, r6, r7, r8, r9, r10)";
	$query10 .= "VALUES('$f_id', '$reason1', '$reason2', '$reason3', '$reason4', '$reason5', '$reason6', '$reason7', '$reason8', '$reason9', '$reason10')";
	$result10 = mysqli_query($link, $query10)or die("MySQL ERROR on query 510: ".mysqli_error($link));
	
	$query5 = "INSERT INTO captions (c1, c1n, c2, c2n, c3, c3n, c4, c4n, fundid)";
	$query5 .= "VALUES('$blank','$blank','$blank','$blank','$blank', '$blank', '$blank' ,'$blank', '$f_id')";
	$result5 = mysqli_query($link, $query5)or die("MySQL ERROR on query 5: ".mysqli_error($link));
	
   
   }//clubs other
     if (isset($_POST['athletics1'])) 
        {
           //$other = $_POST['athletics1'];
           $other = mysqli_real_escape_string($link, $_POST['athletics1']);
     
      	$cleanName = str_replace(' ', '', $other);
        $cleanName = strtolower($cleanName);
        $cleanName = trim($cleanName);
        $cleanName = preg_replace('/[^a-z]/i','',$cleanName);
        $tax = rand(100,9000);
        $tax2 = rand(1,99);
        $tax = $tax.$tax2;
        $userName = $cleanName.$tax;
        
        $loginPass = $cleanName.$tax;
        $loginPassx = sha1($loginPass.$salt); 	
	$landingPage = "editFundraiser/coordhome.php";
	
	$query3 = "INSERT INTO $table2 (username, password, Security, landingPage, salt, created, lastLogin, role)";
	$query3 .= "VALUES('$userName','$loginPassx','1','$landingPage','$salt', now(), now(), '$role')";
	$result3 = mysqli_query($link, $query3)or die("MySQL ERROR om query 3: ".mysqli_error($link));
	
	$query19 = "SELECT * FROM users WHERE username = '$userName'";
	$result19 = mysqli_query($link, $query19)or die("MySQL ERROR om query 19: ".mysqli_error($link));
	$row19 = mysqli_fetch_assoc($result19);
	$newClubID = $row19['userID']; 	
        
	
      	//insert some data for user_info table
      	$query1 = "INSERT INTO user_info(companyName, address1, address2, city, state, zip, email, salesPerson, workPhone, bannerPath, role, dealer, user_table_id)";
      	$query1 .= "VALUES('$groupName', '$address1', '$address2', '$city', '$state', '$zip',
      	'$userName', '$repID',  '$phone', '$bannerPicPath', '$role', '$other', '$newClubID')";
      	
      	$result1 = mysqli_query($link, $query1)or die("MySQL ERROR on query 46761: ".mysqli_error($link));  
       
        //query data just inserted to get info id
        $query2 = "Select * FROM user_info WHERE companyName='$groupName' AND zip='$zip'";
        $result2 = mysqli_query($link, $query2)or die("MySQL ERROR om query 2: ".mysqli_error($link));
        $row1 = mysqli_fetch_assoc($result2);
        $user_id = $row1['userInfoID'];
        //isert fundraiser
        
        //get sample photos
        $sampleR = "SELECT * FROM sample_websites WHERE orgType = '$neworgtype' AND clubType = 'Athletics'";
        $sampleResult = mysqli_query($link, $sampleR)or die("sjgfshg".mysqli_error($link));
        $row2r = mysqli_fetch_assoc($sampleResult);
     
        $studentPhoto = $row2r['student_leaders'];
        $groupPhoto = $row2r['groupPhoto'];
        $bannerPhoto = $row2r['bannerPath'];
        $contactPhoto = $row2r['contact_group_photo'];
        $groupLeaderPhoto = $row2r['group_leader'];
        $clubType = "Athletics";
        
        $reason1 = $row2r['reason1'];
	$reason2 = $row2r['reason2'];
	$reason3 = $row2r['reason3'];
	$reason4 = $row2r['reason4'];
	$reason5 = $row2r['reason5'];
	$reason6 = $row2r['reason6'];
	$reason7 = $row2r['reason7'];
	$reason8 = $row2r['reason8'];
	$reason9 = $row2r['reason9'];
	$reason10 = $row2r['reason10'];
	
	if($bannerPicPath != '')
	{
	   $realBanner = $bannerPicPath;
	}
	else
	{
	   $realBanner = $bannerPhoto;
	}
	if($orgLeaderPicPath != '')
	{
	   $realLeaderPic = $orgLeaderPicPath;
	}
	else
	{
	   $realLeaderPic = $groupLeaderPhoto;
	}
	if($orgLocationPicPath != '')
	{
	   $realStudentPic = $orgLocationPicPath;
	}
	else
	{
	   $realStudentPic = $contactPhoto;
	}
	if($orgGroupPicPath != '')
	{
	   $realGroupPic = $orgGroupPicPath;
	}
	else
	{
	   $realGroupPic = $studentPhoto;
	}
	if($collagePicPath != '')
	{
	   $realCollagePic = $collagePicPath;
	}
	else
	{
	   $realCollagePic = $groupPhoto;
	}
	
	$query4 = "INSERT INTO $table3 (Dealer, DealerDir, Phone, Address1, Address2, City, State, Zip, Banner, sponsorid, setuppersonid, signuptype, orgtype,  demo, email, website, leader_pic, location_pic, group_team_pic, contact_pic, userName, banner_path, firstPass, clubType) VALUES ( '$groupName', '$other', '$phone','$address1','$address2','$city','$state','$zip', '$realBanner', '$parentID', '$repID','$type',
'$neworgtype', '$user_id', '','$url', '$realLeaderPic', '$realGroupPic', '$realCollagePic', '$realStudentPic', '$userName', '$realBanner', '$loginPass', 'Athletics')";
 
	$result4 = mysqli_query($link, $query4)or die("MySQL ERROR: on query 4 ".mysqli_error($link));
  	
  	$query6 = "SELECT * FROM $table3 WHERE userName ='$userName'";
  	$result6 = mysqli_query($link, $query6)or die("MySQL ERROR om query 6: ".mysqli_error($link));
  	$id_row = mysqli_fetch_assoc($result6);
  	$f_id = $id_row['loginid'];
  	$clubName = $id_row['Dealer'];
  	$club_type3 = $id_row['DealerDir'];
  	$blank = "";
	
	$query10 = "INSERT INTO fund_reasons (fundID, r1, r2, r3, r4, r5, r6, r7, r8, r9, r10)";
	$query10 .= "VALUES('$f_id', '$reason1', '$reason2', '$reason3', '$reason4', '$reason5', '$reason6', '$reason7', '$reason8', '$reason9', '$reason10')";
	$result10 = mysqli_query($link, $query10)or die("MySQL ERROR on query 510: ".mysqli_error($link));
	
	$query5 = "INSERT INTO captions (c1, c1n, c2, c2n, c3, c3n, c4, c4n, fundid)";
	$query5 .= "VALUES('$blank','$blank','$blank','$blank','$blank', '$blank', '$blank' ,'$blank', '$f_id')";
	$result5 = mysqli_query($link, $query5)or die("MySQL ERROR on query 5: ".mysqli_error($link));
	
   
   }//clubs athletics1
     if (isset($_POST['general1'])) 
        {
           //$other = $_POST['general1'];
           $other = mysqli_real_escape_string($link, $_POST['general1']);
      	
      	$cleanName = str_replace(' ', '', $other);
        $cleanName = strtolower($cleanName);
        $cleanName = trim($cleanName);
        $cleanName = preg_replace('/[^a-z]/i','',$cleanName);
        $tax = rand(100,9000);
        $tax2 = rand(1,99);
        $tax = $tax.$tax2;
        $userName = $cleanName.$tax;
        
        $loginPass = $cleanName.$tax;
        $loginPassx = sha1($loginPass.$salt); 	
	$landingPage = "editFundraiser/coordhome.php";
	
	$query3 = "INSERT INTO $table2 (username, password, Security, landingPage, salt, created, lastLogin, role)";
	$query3 .= "VALUES('$userName','$loginPassx','1','$landingPage','$salt', now(), now(), '$role')";
	$result3 = mysqli_query($link, $query3)or die("MySQL ERROR om query 3: ".mysqli_error($link));
	
	$query19 = "SELECT * FROM users WHERE username = '$userName'";
	$result19 = mysqli_query($link, $query19)or die("MySQL ERROR om query 19: ".mysqli_error($link));
	$row19 = mysqli_fetch_assoc($result19);
	$newClubID = $row19['userID']; 	
        
	
      	//insert some data for user_info table
      	$query1 = "INSERT INTO user_info(companyName, address1, address2, city, state, zip, email, salesPerson, workPhone, bannerPath, role, dealer, user_table_id)";
      	$query1 .= "VALUES('$groupName', '$address1', '$address2', '$city', '$state', '$zip',
      	'$userName', '$repID',  '$phone', '$bannerPicPath', '$role', '$other', '$newClubID')";
      	
      	$result1 = mysqli_query($link, $query1)or die("MySQL ERROR on query 5674371: ".mysqli_error($link));  
       
        //query data just inserted to get info id
        $query2 = "Select * FROM user_info WHERE companyName='$groupName' AND zip='$zip'";
        $result2 = mysqli_query($link, $query2)or die("MySQL ERROR om query 2: ".mysqli_error($link));
        $row1 = mysqli_fetch_assoc($result2);
        $user_id = $row1['userInfoID'];
        //isert fundraiser
        
        //get sample photos
        $sampleR = "SELECT * FROM sample_websites WHERE orgType = '$neworgtype' AND clubType = 'General'";
        $sampleResult = mysqli_query($link, $sampleR)or die("sjgfshg".mysqli_error($link));
        $row2r = mysqli_fetch_assoc($sampleResult);
     
        $studentPhoto = $row2r['student_leaders'];
        $groupPhoto = $row2r['groupPhoto'];
        $bannerPhoto = $row2r['bannerPath'];
        $contactPhoto = $row2r['contact_group_photo'];
        $groupLeaderPhoto = $row2r['group_leader'];
        $clubType = "General";
        
        $reason1 = $row2r['reason1'];
	$reason2 = $row2r['reason2'];
	$reason3 = $row2r['reason3'];
	$reason4 = $row2r['reason4'];
	$reason5 = $row2r['reason5'];
	$reason6 = $row2r['reason6'];
	$reason7 = $row2r['reason7'];
	$reason8 = $row2r['reason8'];
	$reason9 = $row2r['reason9'];
	$reason10 = $row2r['reason10'];
	
	if($bannerPicPath != '')
	{
	   $realBanner = $bannerPicPath;
	}
	else
	{
	   $realBanner = $bannerPhoto;
	}
	if($orgLeaderPicPath != '')
	{
	   $realLeaderPic = $orgLeaderPicPath;
	}
	else
	{
	   $realLeaderPic = $groupLeaderPhoto;
	}
	if($orgLocationPicPath != '')
	{
	   $realStudentPic = $orgLocationPicPath;
	}
	else
	{
	   $realStudentPic = $contactPhoto;
	}
	if($orgGroupPicPath != '')
	{
	   $realGroupPic = $orgGroupPicPath;
	}
	else
	{
	   $realGroupPic = $studentPhoto;
	}
	if($collagePicPath != '')
	{
	   $realCollagePic = $collagePicPath;
	}
	else
	{
	   $realCollagePic = $groupPhoto;
	}
	
	$query4 = "INSERT INTO $table3 (Dealer, DealerDir, Phone, Address1, Address2, City, State, Zip, Banner, sponsorid, setuppersonid, signuptype, orgtype,  demo, email, website, leader_pic, location_pic, group_team_pic, contact_pic, userName, banner_path, firstPass, clubType) VALUES ( '$groupName', '$other', '$phone','$address1','$address2','$city','$state','$zip', '$realBanner', '$parentID', '$repID','$type',
'$neworgtype', '$user_id', '','$url', '$realLeaderPic', '$realGroupPic', '$realCollagePic', '$realStudentPic', '$userName', '$realBanner', '$loginPass', '$club_type2')";
 
	$result4 = mysqli_query($link, $query4)or die("MySQL ERROR: on query 4 ".mysqli_error($link));
  	
  	$query6 = "SELECT * FROM $table3 WHERE userName ='$userName'";
  	$result6 = mysqli_query($link, $query6)or die("MySQL ERROR om query 6: ".mysqli_error($link));
  	$id_row = mysqli_fetch_assoc($result6);
  	$f_id = $id_row['loginid'];
  	$clubName = $id_row['Dealer'];
  	$club_type3 = $id_row['DealerDir'];
  	$blank = "";
	
	$query10 = "INSERT INTO fund_reasons (fundID, r1, r2, r3, r4, r5, r6, r7, r8, r9, r10)";
	$query10 .= "VALUES('$f_id', '$reason1', '$reason2', '$reason3', '$reason4', '$reason5', '$reason6', '$reason7', '$reason8', '$reason9', '$reason10')";
	$result10 = mysqli_query($link, $query10)or die("MySQL ERROR on query 510: ".mysqli_error($link));
	
	$query5 = "INSERT INTO captions (c1, c1n, c2, c2n, c3, c3n, c4, c4n, fundid)";
	$query5 .= "VALUES('$blank','$blank','$blank','$blank','$blank', '$blank', '$blank' ,'$blank', '$f_id')";
	$result5 = mysqli_query($link, $query5)or die("MySQL ERROR on query 5: ".mysqli_error($link));
	
  
   }//general other
   if (isset($_POST['athletics'])) 
        {
           //$other = $_POST['general1'];
           //$other = mysqli_real_escape_string($link, $_POST['general1']);
      	$optionArrayx = $_POST['athletics'];
      	for ($i = 0; $i < count($optionArrayx); $i++){
      	$cleanName = str_replace(' ', '', $optionArrayx[$i]);
        $cleanName = strtolower($cleanName);
        $cleanName = trim($cleanName);
        $cleanName = preg_replace('/[^a-z]/i','',$cleanName);
        $tax = rand(100,9000);
        $tax2 = rand(1,99);
        $tax = $tax.$tax2;
        $userName = $cleanName.$tax;
        
        $loginPass = $cleanName.$tax;
        $loginPassx = sha1($loginPass.$salt); 	
	$landingPage = "editFundraiser/coordhome.php";
	
	$query3 = "INSERT INTO $table2 (username, password, Security, landingPage, salt, created, lastLogin, role)";
	$query3 .= "VALUES('$userName','$loginPassx','1','$landingPage','$salt', now(), now(), '$role')";
	$result3 = mysqli_query($link, $query3)or die("MySQL ERROR om query 3: ".mysqli_error($link));
	
	$query19 = "SELECT * FROM users WHERE username = '$userName'";
	$result19 = mysqli_query($link, $query19)or die("MySQL ERROR om query 19: ".mysqli_error($link));
	$row19 = mysqli_fetch_assoc($result19);
	$newClubID = $row19['userID']; 	
        
	
      	//insert some data for user_info table
      	$query1 = "INSERT INTO user_info(companyName, address1, address2, city, state, zip, email, salesPerson, workPhone, bannerPath, role, dealer, user_table_id)";
      	$query1 .= "VALUES('$groupName', '$address1', '$address2', '$city', '$state', '$zip',
      	'$userName', '$repID',  '$phone', '$bannerPicPath', '$role', '$other', '$newClubID')";
      	
      	$result1 = mysqli_query($link, $query1)or die("MySQL ERROR on query 5674371: ".mysqli_error($link));  
       
        //query data just inserted to get info id
        $query2 = "Select * FROM user_info WHERE companyName='$groupName' AND zip='$zip'";
        $result2 = mysqli_query($link, $query2)or die("MySQL ERROR om query 2: ".mysqli_error($link));
        $row1 = mysqli_fetch_assoc($result2);
        $user_id = $row1['userInfoID'];
        //isert fundraiser
        
        //get sample photos
        $sampleR = "SELECT * FROM sample_websites WHERE orgType = '$neworgtype' AND clubType = 'Athletics' AND club = 'General'";
        $sampleResult = mysqli_query($link, $sampleR)or die("sjgfshg".mysqli_error($link));
        $row2r = mysqli_fetch_assoc($sampleResult);
     
        $studentPhoto = $row2r['student_leaders'];
        $groupPhoto = $row2r['groupPhoto'];
        $bannerPhoto = $row2r['bannerPath'];
        $contactPhoto = $row2r['contact_group_photo'];
        $groupLeaderPhoto = $row2r['group_leader'];
        $clubType = "General";
        
        $reason1 = $row2r['reason1'];
	$reason2 = $row2r['reason2'];
	$reason3 = $row2r['reason3'];
	$reason4 = $row2r['reason4'];
	$reason5 = $row2r['reason5'];
	$reason6 = $row2r['reason6'];
	$reason7 = $row2r['reason7'];
	$reason8 = $row2r['reason8'];
	$reason9 = $row2r['reason9'];
	$reason10 = $row2r['reason10'];
	
	if($bannerPicPath != '')
	{
	   $realBanner = $bannerPicPath;
	}
	else
	{
	   $realBanner = $bannerPhoto;
	}
	if($orgLeaderPicPath != '')
	{
	   $realLeaderPic = $orgLeaderPicPath;
	}
	else
	{
	   $realLeaderPic = $groupLeaderPhoto;
	}
	if($orgLocationPicPath != '')
	{
	   $realStudentPic = $orgLocationPicPath;
	}
	else
	{
	   $realStudentPic = $contactPhoto;
	}
	if($orgGroupPicPath != '')
	{
	   $realGroupPic = $orgGroupPicPath;
	}
	else
	{
	   $realGroupPic = $studentPhoto;
	}
	if($collagePicPath != '')
	{
	   $realCollagePic = $collagePicPath;
	}
	else
	{
	   $realCollagePic = $groupPhoto;
	}
	
	$query4 = "INSERT INTO $table3 (Dealer, DealerDir, Phone, Address1, Address2, City, State, Zip, Banner, sponsorid, setuppersonid, signuptype, orgtype,  demo, email, website, leader_pic, location_pic, group_team_pic, contact_pic, userName, banner_path, firstPass, clubType) VALUES ( '$groupName', '$optionArrayx[$i]', '$phone','$address1','$address2','$city','$state','$zip', '$realBanner', '$parentID', '$repID','$type',
'$neworgtype', '$user_id', '','$url', '$realLeaderPic', '$realGroupPic', '$realCollagePic', '$realStudentPic', '$userName', '$realBanner', '$loginPass', 'Athletics')";
 
	$result4 = mysqli_query($link, $query4)or die("MySQL ERROR: on query 4 ".mysqli_error($link));
  	
  	$query6 = "SELECT * FROM $table3 WHERE userName ='$userName'";
  	$result6 = mysqli_query($link, $query6)or die("MySQL ERROR om query 6: ".mysqli_error($link));
  	$id_row = mysqli_fetch_assoc($result6);
  	$f_id = $id_row['loginid'];
  	$clubName = $id_row['Dealer'];
  	$club_type3 = $id_row['DealerDir'];
  	$blank = "";
	
	$query10 = "INSERT INTO fund_reasons (fundID, r1, r2, r3, r4, r5, r6, r7, r8, r9, r10)";
	$query10 .= "VALUES('$f_id', '$reason1', '$reason2', '$reason3', '$reason4', '$reason5', '$reason6', '$reason7', '$reason8', '$reason9', '$reason10')";
	$result10 = mysqli_query($link, $query10)or die("MySQL ERROR on query 510: ".mysqli_error($link));
	
	$query5 = "INSERT INTO captions (c1, c1n, c2, c2n, c3, c3n, c4, c4n, fundid)";
	$query5 .= "VALUES('$blank','$blank','$blank','$blank','$blank', '$blank', '$blank' ,'$blank', '$f_id')";
	$result5 = mysqli_query($link, $query5)or die("MySQL ERROR on query 5: ".mysqli_error($link));
	
    }
   }//athletics
   
   //clean dealers
   $clean = "DELETE FROM Dealers WHERE Dealer = '' OR DealerDir = ''";
   $cleanResult = mysqli_query($link, $clean)or die("MySQL ERROR on query clean dealers: ".mysqli_error($link)); 
   header('Location: accounts.php');
}//post submit 
?>