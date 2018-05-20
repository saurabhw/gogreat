<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Sign Up Complete</title>
<link href="css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container">
  <?php include 'header.php' ; ?>
  <!--<?php include 'leftSidebarNavRep.php' ; ?>-->
  <div id="content">
  <?php include('newRepEmail.php');
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
	//include "../redirect.php";
	include "../connectTo.php";
	$link = connectTo();
	$table1 = "reps1";
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
	$landingPage = "GreatMoodsSalesSection\.php";
	$salt = time(); 			// create salt using the current timestamp 
	$loginPass = sha1($loginPass.$salt); 	// encrypt the password and salt with SHA1
	$fileDirectory;
        session_start();
        $_SESSION['email'] = $email;
	// code to upload banner and picture
	$upload_directory = "../upload";
	$banner = $_FILES['bannerUpload']['tmp_name'];
	$distPic = $_FILES['distributorPic']['tmp_name'];
	$fileDirectory = "images/distributor/" . $_FILES['distributorPic']['name'];
	
	if($_FILES['bannerUpload']['error'] > 0 || $_FILES['distributorPic']['error'] > 0) {
		echo $_FILES['bannerUpload']['error'] . "<br />";
		echo $_FILES['distributorPic']['error'] . "<br />";
	} else { 
		/*
		echo "Upload: " . $_FILES["bannerUpload"]["name"] . "<br />";
		echo "Type: " . $_FILES["bannerUpload"]["type"] . "<br />";
		echo "Size: " . ($_FILES["bannerUpload"]["size"] / 1024) . " Kb<br />";
		
		echo "Upload: " . $_FILES["distributorPic"]["name"] . "<br />";
		echo "Type: " . $_FILES["distributorPic"]["type"] . "<br />";
		echo "Size: " . ($_FILES["distributorPic"]["size"] / 1024) . " Kb<br />";
        */        
				// echo "Stored in: " . $_FILES["file"]["tmp_name"];
		if(isUniqueEmail($link, $table1, $email)) {
			$query1 = "INSERT INTO $table2 (username, password, Security, type, landingPage, salt, created, lastLogin)";
			$query1 .= "VALUES('$email','$loginPass','1','null','$landingPage','$salt', now(), now())";
			$query2 = "INSERT INTO $table1 (FName, MName, LName, ssn, address1, address2, city, state, zip, email, homePhone, fbPage, twitter, linkedin, salesPerson, cellPhone, workPhone, workPhoneExt)";
			$query2 .= " VALUES('$FName','$MName','$LName','$ssn','$address1','$address2','$city','$state','$zip','$email','$homePhone','$fbPage','$twitter','$linkedin', '$salesMan','$cellPhone','$workPhone','$extPhone')";
			mysqli_query($link, "start transaction;");
			// insert data into users table
			$res1 = mysqli_query($link, $query1);
			// insert data into distributors table
			$res2 = mysqli_query($link, $query2);
			if( $res1 && $res2 ){
				mysqli_query($link, "commit;");
				"Your account has been successfuly created.\n\n";
				//newDistributorEmail($email,$FName,$LName,$homePhone);
				echo( '<a href="index.php">Login to your new GreatMoods account</a>' );
			} else{
				mysqli_query($link, "rollback;");
				echo "I'm sorry, there was a problem creating your account.";
			}
			if (file_exists("picutes/" . $_FILES["bannerUpload"]["name"])) {
				echo $_FILES["bannerUpload"]["name"] . " already exists. ";
			} else {
				move_uploaded_file($_FILES['bannerUpload']['tmp_name'], "pictures/" . $_FILES["bannerUpload"]["name"]);
				echo "\nbanner uploaded<br />";
			}
			if(file_exists("images/distributor" . $_FILES['distributorPic']['name'])) {
				echo $_FILES['distributorPic']['name'] . " already exists. ";
			} else {	
				move_uploaded_file($_FILES['distributorPic']['tmp_name'], $fileDirectory);
				echo "\nportait pic has been uploaded<br />";
			}
		}
	}
	// end upload code
/*	
	if(isUniqueEmail($link, $table1, $email)) {
		$query1 = "INSERT INTO $table2 (username, password, Security, type, landingPage, salt, created, lastLogin)";
		$query1 .= "VALUES('$email','$loginPass','1','null','$landingPage','$salt', now(), now())";
		$query2 = "INSERT INTO $table1 (FName, MName, LName, ssn, address1, address2, city, state, zip, email, homePhone, fbPage, twitter, linkedin, salesPerson, cellPhone, workPhone, workPhoneExt)";
		$query2 .= " VALUES('$FName','$MName','$LName','$ssn','$address1','$address2','$city','$state','$zip','$email','$homePhone','$fbPage','$twitter','$linkedin', '$salesMan','$cellPhone','$workPhone','$extPhone')";

		mysqli_query($link, "start transaction;");
		// insert data into users table
		$res1 = mysqli_query($link, $query1);
		// insert data into distributors table
		$res2 = mysqli_query($link, $query2);


		if( $res1 && $res2 ){
			mysqli_query($link, "commit;");
			echo "Your account has been successfuly created.\n\n";
			//newDistributorEmail($email,$FName,$LName,$homePhone);
			echo( '<a href="GreatMoodsSalesSection.php">Click to start using GreatMoods.com!</a>' );
		} else{
			mysqli_query($link, "rollback;");
			echo "I'm sorry, there was a problem creating your account.";
			}
	}// end if
*/	
?>
   
</div>
<!--end content-->
<?php include '../footer.php' ; ?>
</div>
<!--end container-->

</body>
</html>
<?php
ob_end_flush();
?>