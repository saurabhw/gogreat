<?php
	session_start();
       if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "Executive")
       {
            header('Location: ../../index.php');
            exit;
       }
      
	ob_start();
	include "connectTo.php";
	include('../samplewebsites/imageFunctions.inc.php');
	$id = $_SESSION['userId'];
	//include($_SESSION['fileroot'].'includes/connection.inc.php');
	//include($_SESSION['fileroot'].'email/newDistributorEmail.php');

?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Sign Up Complete</title>
<link href="css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container">
   <?php include 'header.inc.php' ; ?>
  <!--<?php include 'distributor/leftSidebarNavDistributor.php' ; ?>-->
  <div id="content">
  <?php 
  	function isUniqueEmail($link, $table1, $email) {
		$query = "SELECT * FROM $table1 WHERE email='$email'";
		$result = mysqli_query($link, $query)or die("MySQL ERROR on query c: ".mysqli_error($link));
		if(mysqli_num_rows($result) >= 1) {
			echo "I'm sorry, that email address is already being used, please use another one.";
			return false;
		} else {
			return true;
		}
	}
	
	/**  process_image
	**	This function will first verify if the file uploaded is an image file.
	**	Next, the image will save the file in the desired directory in a folder labeled with the ID from the parameter.
	**      Last, the directory path to the image is returned so it can be saved to the database.
	**/
	/*function process_image($name, $id, $tmpPic, $baseDirPath, $userMail){     
	         
	         //$baseDirPath = $baseDirPath.'/'.$userMail.'/';
	
		$cleanedPic = checkName($_FILES["$name"]["name"]);	
		if(!is_image($tmpPic)) {
    			// is not an image
    			echo $cleanedPic . " is not an image file. ";
    		} else {
    			if($_FILES['$name']['error'] > 0) {
				echo $_FILES['$name']['error'] . "<br />";
			} else {
				
				if (file_exists($baseDirPath.$id."/".$cleanedPic)){
					echo $cleanedPic . " already exists. ";
				} else {
					$picDirectory = $baseDirPath;
					
					
					if (!is_dir($picDirectory.$id)){
						mkdir($picDirectory.$id, 0777, true);
						
					}
					$picDirectory = $picDirectory."/".$id."/";
					move_uploaded_file($tmpPic, $picDirectory . $cleanedPic);
					echo "\n$cleanedPic uploaded.<br />";
					$imagePath = "images/vp/".$id."/".$cleanedPic;
					
					return $imagePath;
				}
			}
		}
	}// end banner picture upload operations
	*/
	//include "../redirect.php";
	
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
					$imagePath = "images/vp/".$id."/".$cleanedPic;
					
					
				}// end third inner else
				return $imagePath;
			} // end first inner else
		      } // end else
	     }// end process_image

	
	$link = connectTo();
	$table1 = "user_info";
	$table2 = "users";
	$table3 = "distributors";
	$company = mysqli_real_escape_string($link, $_POST['cname']);
	$fname = mysqli_real_escape_string($link, $_POST['fname']);
	$mname = mysqli_real_escape_string($link, $_POST['mname']);
	$lname = mysqli_real_escape_string($link, $_POST['lname']);
	$title = mysqli_real_escape_string($link, $_POST['title']);
	$gender = mysqli_real_escape_string($link, $_POST['gender']);
	$ssn = mysqli_real_escape_string($link, $_POST['ssn1']);
	$address1 = mysqli_real_escape_string($link, $_POST['address1']);
	$address2 = mysqli_real_escape_string($link, $_POST['address2']);
	$city = mysqli_real_escape_string($link, $_POST['city']);
	$state = mysqli_real_escape_string($link, $_POST['state']);
	$zip = mysqli_real_escape_string($link, $_POST['zip']);
	$email = mysqli_real_escape_string($link, $_POST['email']);
	$hPhone1 = mysqli_real_escape_string($link, $_POST['wphone1']);
	$hPhone2 = mysqli_real_escape_string($link, $_POST['hphone2']);
	$wPhone3 = mysqli_real_escape_string($link, $_POST['hphone3']);
	$mPhone = mysqli_real_escape_string($link, $_POST['mphone']);
	$ext = mysqli_real_escape_string($link, $_POST['ext']);
	$fbPage = mysqli_real_escape_string($link, $_POST['fb']);
	$twitter = mysqli_real_escape_string($link, $_POST['twitter']);
	$linkedin = mysqli_real_escape_string($link, $_POST['lindkedin']);
	$loginPass = mysqli_real_escape_string($link, $_POST['loginpass']);
	$salesMan = $_POST['sales'];
	$ftin = mysqli_real_escape_string($link, $_POST['ftin1']);
	$stin = mysqli_real_escape_string($link, $_POST['stin1']);
	$nonp = mysqli_real_escape_string($link, $_POST['nonp1']);
	//$cellPhone = $_POST['cellphone'];
	//$workPhone = $_POST['workphone'];
	$extPhone = mysqli_real_escape_string($link, $_POST['ext']);
	$paypal = mysqli_real_escape_string($link, $_POST['paypalemail']);
	$landingPage = "vp/vpLanding.php";
	$who = "VP";
	$percent = 0.5;
	$salt = time(); 			// create salt using the current timestamp 
	$loginPass = sha1($loginPass.$salt); 	// encrypt the password and salt with SHA1
	$bannerDirPath = "";
	$distPicDirPath = "";
	// code to upload banner and picture
	$banner = $_FILES['AddGroupPhoto']['tmp_name'];
	$distPic = $_FILES['uploaded_file']['tmp_name'];
	$imageDirPath = $_SERVER['fileroot'].'/images/vp/';
	$directory = '/images/vp'; // Name of directory that folder is being created in

       if (!file_exists($directory."/".$email)) {
        mkdir($directory."/".$email, 0777, true);
        }
	
	if(isUniqueEmail($link, $table1, $email)) {
		$query1 = "INSERT INTO $table2 (username, password, Security, landingPage, salt, created, lastLogin, role)";
		$query1 .= "VALUES('$email','$loginPass','1','$landingPage','$salt', now(), now(), '$who')";
		$query2 = "INSERT INTO $table1 (companyName, FName, MName, LName, ssn, address1, address2, city, state, zip, email, homePhone, fbPage, twitter, linkedin, salesPerson, cellPhone, workPhone, userPaypal,role,title,gender, userBaseCommPct, fedtin, statetin, threec)";
		$query2 .= " VALUES('$company','$fname','$mname','$lname','$ssn','$address1','$address2','$city','$state','$zip','$email','$hPhone1','$fbPage','$twitter','$linkedin', '$id','$mPhone', '$wPhone', '$paypal','$who', '$title', '$gender', '$percent', '$ftin', '$stin', '$nonp')";
                $query3 = "INSERT INTO $table3 (companyName, FName, MName, LName, ssn, address1, address2, city, state, zip, email, homePhone, fbPage, twitter, linkedin, salesPerson, workPhoneExt, bannerPath, distPicPath,setupID,role)";
		$query3 .= " VALUES('$company','$fname','$mname','$lname','$ssn','$address1','$address2','$city','$state','$zip','$email','$hPhone1','$fbPage','$twitter','$linkedin', '$salesMan','$extPhone', '$banner','$distPic','$id', '$who')";


		mysqli_query($link, "start transaction;");
		// insert data into users table
		$res1 = mysqli_query($link, $query1);
		// insert data into distributors table
		$res2 = mysqli_query($link, $query2);
		
		$res3 = mysqli_query($link, $query3);
		
		if($res1 && $res2 && $res3){
			mysqli_query($link, "commit;");
			echo "Your account has been successfuly created.\n\n";
			//newDistributorEmail($email,$FName,$LName,$cellPhone);
			 //header( 'Location: viewAccounts.php' );

		} else{
                        mysqli_query($link, "rollback;");
			echo "I'm sorry, there was a problem creating your account.";
			}
	
	// picture operations
	$query2 = "SELECT userInfoID FROM $table1 WHERE email = '$email'";
	$res2 = mysqli_query($link, $query2);
	
	if ($res2){
	    // get userInfoID so we can create a folder to store the images
	    // the path will be images/Sample_Websites/websiteID/<image>
	    $row = mysqli_fetch_assoc($res2);
	    $userID = $row['userInfoID'];
	    //$userID.'/'.$eMail.'/';
	
	    if($distPic != ''){
		$personalPicPath = process_image('uploaded_file',$userID, $distPic, $imageDirPath, $email);
		if($personalPicPath !=''){
			$query = "UPDATE $table1 SET picPath = '$personalPicPath' WHERE userInfoID = '$userID'";
			mysqli_query($link, $query);
			$queryx = "UPDATE $table3 SET userInfoID = '$userID' WHERE email = '$email'";
			mysqli_query($link, $queryx);
						}
		}
	} else{
			echo $email." not found in database.\n\n";
		}// end else
	}// end if	

?>
   
</div>
<!--end content-->
<?php include 'footer.php' ; ?>
</div>
<!--end container-->

</body>
</html>
<?php
ob_end_flush();
?>