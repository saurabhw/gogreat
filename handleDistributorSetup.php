<?php
session_start();
if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
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
  <?php include 'includes/header.inc.php' ; ?>
  <!--<?php include 'distributor/leftSidebarNavDistributor.php' ; ?>-->
  <div id="content">
  <?php include('email/newDistributorEmail.php');
  	function isUniqueEmail($link, $table1, $email) {
		$query = "SELECT * FROM $table1 WHERE email='$email'";
		$result = mysqli_query($link, $query);
		if(mysqli_num_rows($result) >= 1) {
			echo "I'm sorry, that email address is already being used, please use another one.";
			return false;
		} else {
			return true;
		}
	}
	function is_image($path)
	{
		$a = getimagesize($path);
		$image_type = $a[2];
		if(in_array($image_type , array(IMAGETYPE_GIF , IMAGETYPE_JPEG ,IMAGETYPE_PNG , IMAGETYPE_BMP)))
		{
			return true;
		}
			return false;
	}
	// Remove empty spaces from file name
	function checkName($name){
		$nospaces = str_replace(' ','_',$name);
		return $nospaces;
	}
	//include "../redirect.php";
	include "connectTo.php";
	$link = connectTo();
	$table1 = "user_info";
	$table2 = "users";
	$FName = $_POST['FName'];
	$MName = $_POST['MName'];
	$LName = $_POST['LName'];
	$ssn = $_POST['ssn'];
	$address1 = $_POST['address1'];
	$address2 = $_POST['address2'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zip = $_POST['zip'];
	$email = $_POST['email'];
	$homePhone = $_POST['homephone'];
	$fbPage = $_POST['fbPage'];
	$twitter = $_POST['twitter'];
	$linkedin = $_POST['linkedin'];
	$loginPass = trim($_POST['loginPass']);
	$salesMan = $_POST['sales'];
	$cellPhone = $_POST['cellphone'];
	$workPhone = $_POST['workphone'];
	$extPhone = $_POST['extphone'];
	$paypal = $_POST['paypal'];
	$landingPage = "setupEditWebsite2/disthome.php";
	$role = "Distributor";
	$salt = time(); 			// create salt using the current timestamp 
	$loginPass = sha1($loginPass.$salt); 	// encrypt the password and salt with SHA1
	$bannerDirPath = "";
	$distPicDirPath = "";
	// code to upload banner and picture
	$banner = $_FILES['bannerUpload']['tmp_name'];
	$distPic = $_FILES['distributorPic']['tmp_name'];
	
	// Banner upload operations
	if($banner != ''){
	$cleanedBanner = checkName($_FILES["bannerUpload"]["name"]);
	if(!is_image($banner)) {
    		// is not an image
    		echo $cleanedBanner . " is not an image file. ";
   	} else {
    		if($_FILES['bannerUpload']['error'] > 0) {
			echo $_FILES['bannerUpload']['error'] . "<br />";
		} else {
			if (file_exists("banners/distributors/" . $cleanedBanner)) {
					echo $cleanedBanner . " already exists. ";
				} else {
					$bannerDirectory = "banners/distributors/";
					if (!is_dir($bannerDirectory.$email)){
						mkdir($bannerDirectory.$email);
					}
					$bannerDirectory = $bannerDirectory.$email."/";
					move_uploaded_file($banner, $bannerDirectory . $cleanedBanner);
					echo "\nBanner uploaded<br />";
					$bannerDirPath = $bannerDirectory . $cleanedBanner;
				}
			}
		}
	}// end banner upload
	// Representative picture upload operations
	if($distPic != ''){
	$cleanedDistPic = checkName($_FILES["distributorPic"]["name"]);	
	if(!is_image($distPic)) {
    		// is not an image
    		echo $cleanedDistPic . " is not an image file. ";
    	} else {
    		if($_FILES['distributorPic']['error'] > 0) {
			echo $_FILES['distributorPic']['error'] . "<br />";
		} else {
			if (file_exists("images/distributors/" . $cleanedDistPic)) {
					echo $cleanedDistPic . " already exists. ";
				} else {
					$distPicDirectory = "images/distributors/";
					if (!is_dir($distPicDirectory.$email)){
						mkdir($distPicDirectory.$email);
					}
					$distPicDirectory = $distPicDirectory.$email."/";
					move_uploaded_file($distPic, $distPicDirectory . $cleanedDistPic);
					echo "\nDistributor picture uploaded<br />";
					$distPicDirPath = $distPicDirectory . $cleanedDistPic;
				}
			}
		}
	}// end distributor picture upload operations
	if(isUniqueEmail($link, $table1, $email)) {
		$query1 = "INSERT INTO $table2 (username, password, Security, landingPage, salt, created, lastLogin, role)";
		$query1 .= "VALUES('$email','$loginPass','1','$landingPage','$salt', now(), now(), '$role')";
		$query2 = "INSERT INTO $table1 (FName, MName, LName, ssn, address1, address2, city, state, zip, email, homePhone, fbPage, twitter, linkedin, salesPerson, cellPhone, workPhone, workPhoneExt, bannerPath, picPath, userPaypal, role)";
		$query2 .= " VALUES('$FName','$MName','$LName','$ssn','$address1','$address2','$city','$state','$zip','$email','$homePhone','$fbPage','$twitter','$linkedin', '$salesMan','$cellPhone','$workPhone','$extPhone','$bannerDirPath','$distPicDirPath','$paypal','$role')";

		mysqli_query($link, "start transaction;");
		// insert data into users table
		$res1 = mysqli_query($link, $query1);
		// insert data into distributors table
		$res2 = mysqli_query($link, $query2);
		
		if( $res1 && $res2 ){
			mysqli_query($link, "commit;");
			echo "Your account has been successfuly created.\n\n";
			//newDistributorEmail($email,$FName,$LName,$cellPhone);
			echo '<form id="logoutForm" action="includes/logout.inc.php" name="logoutForm" method="post" action="">
                        <input name="logout" type="submit" id="logout" value="Click to start using GreatMoods.com!" />
			</form>';
		} else{
                        mysqli_query($link, "rollback;");
			echo "I'm sorry, there was a problem creating your account.";
			}
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