<?php
 session_start(); // session start
 ob_start();
 ini_set('display_errors', '0'); // errors reporting on
 error_reporting(E_ALL); // all errors
 require_once('../includes/functions.php');
 require_once('../includes/connection.inc.php');
 require_once('../includes/imageFunctions.inc.php');
 $link = connectTo();

  if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "RP")
       {
            header('Location: ../index.php');
            exit;
       }
       if($_SESSION['freeze'] == "TRUE")
       {
          // echo "Account Frozen";
           header('Location: accountEdit.php');
       }
   
   $userID = $_SESSION['userId'];
   $query = "SELECT * FROM user_info WHERE userInfoID='$userID'";
   $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysqli_error($link));
   $row = mysqli_fetch_assoc($result);
   $cn = $row['companyName'];
   $fn = $row['FName'];
   $mn = $row['MName'];
   $ln = $row['LName'];
   $sn = $row['ssn'];
   $a1 = $row['address1'];
   $a2 = $row['address2'];
   $ct = $row['city'];
   $st = $row['state'];
   $zp = $row['zip'];
   $email = $row['email'];
   $hp = $row['homePhone'];
   $cp = $row['cellPhone'];
   $fb = $row['fbPage'];
   $tw = $row['twitter'];
   $li = $row['linkedin'];
   $pp = $row['userPaypal'];
   $pic = $row['picPath'];
   $ftxin = $row['fedtin'];
   $stxin = $row['statetin'];
   $nonp = $row['threec'];
   $pic = $row['picPath'];
       

?>
<!DOCTYPE html>
<head>
	<title>GreatMoods | Representative</title>
</head>

<body>
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <?php include 'sideLeftNav.php' ; ?>

      <div id="content">
          <h1>Fundraising Tools</h1>
          <h3>Training Tips, Tools & Forms</h3>
		  
	<div id="column1">
		<h5><b><b>Overview Presentations</b></b></h5>
		<ul>
			<li>Fundraising Word and PowerPoint Documents (PC or Mac)</li>
			<li>Video Fundraising Overview</li>
			<li>Complete Step by Step Fundraising Training Guide</li>
			<li>Step by Step Student or Member Leader Guide</li>
			<li>Sales Guide to Successfully Selling Products and Gifts</li>
		</ul>
	
		<br>
	
		<h5><b>Getting Started Packet for the Fundraising Leaders, and Students</b></h5>
		<ul>
			<li>Welcome, Let’s Get Your Fundraiser Setup (Leaders To Do Checklist)</li>
			<li>Welcome, Let’s get your Website Setup and Generating Funds (Student or Member To Do)</li>
			<li>Fundraising Leaders Checklist</li>
			<li>Student/Member Leader Checklist</li>
			<li>Student/Member Checklist</li>
		</ul>
			
		<br>
	
		<h5><b>Forms and Marketing Materials</b></h5>
		<ul>
			<li>Friends & Family Email Prospect Form</li>
			<li>Contact Card Form</li>
			<li>Order Form with Best Sellers</li>
			<li>Poster</li>
		</ul>
	
		<br>
		
		<h5><b>Fundraising Emails</b></h5>
		<ul>
			<li>Announcements</li>
			<li>Parent Emails</li>
			<li>Student or Member Emails</li>
			<li>Consumer Emails</li>
			<li>Facebook Posts</li>
		</ul>
	
	</div> <!--end column1-->
	
	<div id="column2">
		<img src="../images/rep-pages/productgrouping2.png" width="100%"  alt="Product Grouping">
	
		
	</div> <!--end column2-->


  </div> <!--end content -->
  
      <?php include 'footer.php' ; ?>   
</div> <!--end container-->

</body>
</html>

<?php
   ob_end_flush();
?>