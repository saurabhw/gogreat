<?php
    session_start();
	ob_start();
	if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../../index.php');
            exit;
       }
	include '../../includes/connection.inc.php';
	include('../../samplewebsites/imageFunctions.inc.php');
    $link = connectTo();
    $userID = $_SESSION['userId'];
    $table1 = "user_info";  
    $table2 = "distributors";
    $user = $_GET['user'];
    
    // check if form has been submitted
	if(isset($_POST['submit'])){
	
	$vpPhoto = $_FILES['uploaded_file']['tmp_name'];
	$imageDirPath = $_SERVER['DOCUMENT_ROOT'].'/images/vp/';
	$vpPicPath = "";
	
	//grab all form fileds
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
	//$email = mysqli_real_escape_string($link, $_POST['email']);
	$hPhone1 = mysqli_real_escape_string($link, $_POST['wphone1']);
	$hPhone2 = mysqli_real_escape_string($link, $_POST['hphone2']);
	$wPhone3 = mysqli_real_escape_string($link, $_POST['hphone3']);
	$mPhone = mysqli_real_escape_string($link, $_POST['mphone']);
	$ext = mysqli_real_escape_string($link, $_POST['ext']);
	$fb = mysqli_real_escape_string($link, $_POST['fb']);
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
	//$distPic = $_FILES['uploaded_file']['tmp_name'];
	$imageDirPath = $_SERVER['DOCUMENT_ROOT'].'/images/vp/';
	$imagePath = "";
	
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
					$imagePath = "images/vp/".$id."/".$cleanedPic;
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
	mysqli_query($link, "start transaction;");    
	$query1 = "UPDATE $table1 SET
	companyName = '$company',
	FName = '$fname',
	MName = '$manme',
	LName = '$lname',
	ssn = '$ssn',
	address1 = '$address1',
	address2 = '$address2',
	city = '$city',
	state = '$state',
	zip = '$zip',
	homePhone = '$hPhone1',
	fbPage = '$fb',
	twitter = '$twitter',
	linkedin = '$linkedin',
	userPaypal = '$paypal',
	fedtin = '$fedtin',
	statetin = '$statetin',
	threec = '$nonp',
	gender = '$gender'
	WHERE userinfoID = '$user' AND role = 'VP' AND salesPerson = '$userID' LIMIT 1";
	$result1 = mysqli_query($link, $query1)or die("MySQL ERROR on query 1: ".mysqli_error($link));
	
	$query2 = "UPDATE $table2 SET
	companyName = '$company',
	FName = '$fname',
	MName = '$mname',
	LName = '$lname',
	ssn = '$ssn',
	address1 = '$address1',
	address2 = '$address2',
	city = '$city',
	state = '$state',
	zip = '$zip',
	homePhone = '$hPhone1',
	fbPage = '$fb',
	twitter = '$twitter',
	linkedin = '$linkedin'
	
	WHERE loginid = '$user' AND role = 'VP' AND salesPerson = '$userID' LIMIT 1";
	$result2 = mysqli_query($link, $query2)or die("MySQL ERROR on query 2: ".mysqli_error($link));
	
	if($result1 && $result2){
			mysqli_query($link, "commit;");
			/*$query9 = "SELECT * FROM user_info WHERE email='$email'";
			$res4 = mysqli_query($link, $query9)or die ("couldn't execute query 9.".mysql_error());
			$row = mysqli_fetch_assoc($res4);
			$newUserID = $row['userInfoID'];
			
			$queryx = "UPDATE distributors SET loginid = '$newUserID ', distPicPath='$imagePath' WHERE email = '$email'";
			mysqli_query($link, $queryx)or die ("couldn't execute query x.".mysql_error());
			*/
		    if($vpPhoto != '')
		    $personalPicPath = process_image('uploaded_file',$user, $vpPhoto, $imageDirPath);
		    if($personalPicPath !=''){
			$query10 = "UPDATE $table1 SET picPath = '$personalPicPath' WHERE userInfoID = '$newUserID'";
			mysqli_query($link, $query10);
						}
		    
			echo "Your account has been successfuly created.\n\n";
			//newDistributorEmail($email,$FName,$LName,$cellPhone);
			 header( 'Location: list_user.php' );

		} 
		else
		{
                    mysqli_query($link, "rollback;");
		    echo "I'm sorry, there was a problem creating your account.";
		}

	}// end if
?>