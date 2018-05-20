<?php  
include '../includes/autoload.php';
if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }


$loginuser = $_SESSION['userId'];
$user_email = $_SESSION['email'];
$setup_person = $loginuser;
$groupName = mysqli_real_escape_string($link, $_POST['groupName']);
$contactFirstName = mysqli_real_escape_string($link, $_POST['contactFirstName']);
$contactLastName = mysqli_real_escape_string($link, $_POST['contactLastName']);
$contactEmail = mysqli_real_escape_string($link, $_POST['contactEmail']);
$address1 = mysqli_real_escape_string($link, $_POST['address1']);
$address2 = mysqli_real_escape_string($link, $_POST['address2']);
$city = mysqli_real_escape_string($link, $_POST['city']);
$state = mysqli_real_escape_string($link, $_POST['state']);
$zip = mysqli_real_escape_string($link, $_POST['zip']);
$neworgtype = mysqli_real_escape_string($link, $_POST['fundtype']);
$url = mysqli_real_escape_string($link, $_POST['websiteURL']);
$type = "fundraiser";
$role = "fundOwner";
$table1 = "user_info";
$table2 = "users";
$table3 = "Dealers";
$table4 = "captions";
$salt = time();




if(isset($_POST['submit']))
{
    
    
  if (isset($_POST['clubs'])) 
  {
    
    
    $gid = $_POST['gid'];
    $sql = "SELECT * FROM Dealers WHERE loginid = '$gid'";
    $resultG = mysqli_query($link, $sql)or die("MySQL ERROR query sql: ".mysqli_error($link));
    $rowG = mysqli_fetch_assoc($resultG);
    
    $orgID = $rowG['loginid'];
    $orgName = $rowG['Dealer'];
    $orgGroup = $rowG['DealerDir'];
    $orgAbout = $rowG['About'];
    $orgReason = $rowG['FundraiserReasons'];
    $orgGoal = $rowG['FundraiserGoal'];
    $orgSD = $rowG['FundraiserStartDate'];
    $orgED = $rowG['FundraiserEndDate'];
    $orgPhone = $rowG['Phone'];
    $orgAD1 = $rowG['Address1'];
    $orgAD2 = $rowG['Address2'];
    $orgCT = $rowG['City'];
    $orST = $rowG['State'];
    $orgZP = $rowG['Zip'];
    $orgPay = $rowG['PaypalEmail'];
    $orgBanner = $rowG['Banner'];
    $orgSignupType = $rowG['signuptype'];
    $orgType = $rowG['orgtype'];
    $orgEmail = $rowG['email'];
    $orgFB = $rowG['facebook'];
    $orgTW = $rowG['twitter'];
    $orgLP = $rowG['leader_pic'];
    $orglocationPic = $rowG['location_pic'];
    $orgGP = $rowG['group_team_pic'];
    $orgWeb = $rowG['website'];
    $orgCon = $rowG['ContactName'];
    
    
    $type = "fundraiser";
    $role = "fundOwner";
    $table1 = "user_info";
    $table2 = "users";
    $table3 = "Dealers";
    $table4 = "captions";
    $salt = time();
    $loginuser = $_SESSION['userId'];
    $user_email = $_SESSION['email'];
    $setup_person = $loginuser;

    
    
    
    
      // process banner
    $bannerPic = $_FILES['banner']['tmp_name'];
    $imageDirPath = $_SERVER['DOCUMENT_ROOT'].'/images/banners/';
    $bannerPicPath = "";
    $id = str_replace(' ', '', $groupName);
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
      $optionArray = $_POST['clubs'];
      
      for ($i = 0; $i < count($optionArray); $i++){
      	mysqli_query($link, "start transaction;");
      	
      	$cleanName = str_replace(' ', '', $optionArray[$i]);
        $cleanName = strtolower($cleanName);
        $cleanName = trim($cleanName);
        $cleanName = preg_replace('/[^a-z]/i','',$cleanName);
        $tax = rand(100,9000);
        $tax2 = rand(1,99);
        $tax = $tax.$tax2;
        $userName = $cleanName.$tax;
      	//insert some data for user_info table
      	$query1 = "INSERT INTO $table1(companyName, FName,  address1, address2, city, state, zip, email, role, dealer)";
      	$query1 .="VALUES('$orgName','$orgGroup', '$orgAD1','$orgAD2','$orgCT','$orgST','$orgZP',
      	'$userName','$role','$optionArray[$i]')";
      	
      	$result1 = mysqli_query($link, $query1)or die("MySQL ERROR on query 1: ".mysqli_error($link));  
       
        //query data just inserted to get info id
        $query2 = "Select * FROM $table1 WHERE companyName='$orgName' AND zip='$orgZP'";
        $result2 = mysqli_query($link, $query2)or die("MySQL ERROR om query 2: ".mysqli_error($link));
        $row1 = mysqli_fetch_assoc($result2);
        $user_id = $row1['userInfoID'];
        //isert fundraiser
     
        	
        $loginPass = $cleanName.$tax;
        $loginPassx = sha1($loginPass.$salt); 	
	$landingPage = "editFundraiser/coordHome.php";
	
	$query4 = "INSERT INTO $table3 (Dealer, DealerDir, Address1, Address2, City, State, Zip,PaypalEmail, Banner, ContactName, setuppersonid, setuppersonid2, signuptype, orgtype, email, website, userName, firstPass, banner_path) VALUES ( '$orgName', '$optionArray[$i]','$orgAD1','$orgAD2','$orgCT','$orgST','$orgZP', '$orgPay', '$orgBanner', '$orgCon','$gid', '$setup_person','$orgSignupType',
'$orgType','$contactEmail','$url','$userName','$loginPass', '$orgBanner')";
 
	$result4 = mysqli_query($link, $query4)or die("MySQL ERROR: on query 4 ".mysqli_error($link));
  	
  	$query6 = "SELECT * FROM $table3 WHERE userName ='$userName'";
  	$result6 = mysqli_query($link, $query6)or die("MySQL ERROR om query 6: ".mysqli_error($link));
  	$d_row = mysqli_fetch_assoc($result6);
  	$f_id = $d_row['loginid'];
  	$blank = "";
  	 	
  	 //set up fundraiser owner user name and password
  	$query3 = "INSERT INTO $table2 (username, password, Security, landingPage, salt, created, lastLogin, role)";
	$query3 .= "VALUES('$userName','$loginPassx','1','$landingPage','$salt', now(), now(), '$role')";
	$result3 = mysqli_query($link, $query3)or die("MySQL ERROR om query 3: ".mysqli_error($link));
	
	$query5 = "INSERT INTO $table4 (c1, c1n, c2, c2n, c3, c3n, c4, c4n, fundid)";
	$query5 .= "VALUES('$blank','$blank','$blank','$blank','$blank', '$blank', '$blank' ,'$blank', '$f_id')";
	$result5 = mysqli_query($link, $query5)or die("MySQL ERROR on query 5: ".mysqli_error($link));
	
	//send in an id for later editing of photo captions
     
           /* $message = "You have created a user name and password for ".$groupName;
  	    $message .= "\r\n";
  	    $message .= "User Name: ".$userName;
  	    $message .= "\r\n";
  	    $message .= "Password: ".$loginPass;
  	    $message = wordwrap($message, 70, "\r\n");
  	    $to = $user_email;
            $subject = 'Account Credentials Ready';
            $headers = 'From: noreply@greatmoods.com' . "\r\n" .
            'Reply-To: noreply@greatmoods.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
            mail($to, $subject, $message, $headers);*/
        
       if($result1 && $result4 && $result3 && $result5 && $result6)
       {
       	  mysqli_query($link, "commit;");
       }else
       	{
       	    mysqli_query($link, "rollback;");
       	}
    } // end for
   	    
}//post clubs
header('Location: editClub.php');
}//post submit 
?>