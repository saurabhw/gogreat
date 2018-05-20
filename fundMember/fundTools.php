<?php
      session_start();

      if(($_SESSION['role'] == 'MemberLeader' || $_SESSION['role'] == 'Member') && isset($_SESSION['authenticated']))
       {
          //authenicated
       }
       else
       {
            header('Location: ../index.php');
            exit;
       }
       
       require_once("../includes/connection.inc.php");
       include('../samplewebsites/imageFunctions.inc.php');
       include("../includes/functions.php");
       $link = connectTo();
       $userID = $_SESSION['userId'];
       $userName = $_SESSION['email'];
       $groupID = $_SESSION['groupid'];
       $query1 = "SELECT * FROM Dealers WHERE loginid='$groupID'";
       $result1 = mysqli_query($link, $query1)or die("MySQL ERROR query 1: ".mysqli_error($link));
       $row1 = mysqli_fetch_assoc($result1);
       $dealerID = $row1['loginid'];
       $group = $row1['setuppersonid']; 
       $myPic = $row1['contact_pic'];
       $twit = $row1['twitter']; 
       $face = $row1['facebook']; 
       //$goal = $row1['goal2'];
       $so_far = getSoloSales($dealerID);
       $banner = $row1['banner_path'];
       
       //get parent info
       $getParent = "SELECT * FROM Dealers WHERE loginid = '$group'";
       $pResult = mysqli_query($link, $getParent)or die ("couldn't execute parent query.".mysql1_error($link));
       $pRow = mysqli_fetch_assoc($pResult);
       $goal = $pRow['goal2'];
       
?>
<!DOCTYPE html>
<head>
	<title>GreatMoods Member</title>
</head>

<body>
<div id="container">
      <?php include 'header(1).php' ; ?>
      <?php include 'memberSidebar_new.php' ; ?>

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
	
		<h5><b>Getting Started Packet for Members</b></h5>
		<ul>
			<li>Welcome, Let’s get your Website Setup and Generating Funds (Student or Member To Do)</li>
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
			<li>Consumer Emails</li>
			<li>Facebook Posts</li>
		</ul>
		
		<br>
	</div> <!--end column1-->
	
	<div id="column2">
		<img src="../images/rep-pages/productgrouping2.png" width="100%" alt="Product Grouping">
	</div> <!--end column2-->
  </div> <!--end content -->
  
      <?php include 'footer(1).php' ; ?>   
</div> <!--end container-->

</body>
</html>

<?php
   ob_end_flush();
?>