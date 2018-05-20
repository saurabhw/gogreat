<?php
      session_start();
      ob_start();
      define("SITE_ROOT",$_SERVER["DOCUMENT_ROOT"].'/salesTest/');
      include("../includes/connection.inc.php");
      $link = connectTo();
      $groupID = $_GET['group'];
      $table = "sample_websites";
      $query = "SELECT * FROM $table WHERE samplewebID = $groupID";
      $result = mysqli_query($link, $query) or die(mysqli_error());
      $row_count = mysqli_num_rows($result);
      if($row_count == '0'){
        echo "<br />Sample Website Not Found.<br />";
      }else{
         $row = mysqli_fetch_assoc($result);
         $club_name = $row['sampleName'];
         $club = $row['club'];
         $goal = $row['goal'];
         $so_far = $goal*.2;
         $banner_path = $row['bannerPath'];
         $position = $row['samplePosition'];
         $leader = $row['sampleFname'].' '.$row['sampleLname'];
         $phone = $row['samplePhone'];
         $group_email = $row['sampleGroupEmail'];
         $contact_photo = $row['contact_group_photo'];
         $group_photo = $row['groupPhoto'];
         $leader_photo = $row['group_leader'];
         $student_photo = $row['student_leaders'];
         $reasons = $row['sampleReasons'];
         $student_leader_name = $row['student_leader'];
         if($row['sampleTitle']==''){
           $title = $club;
         }else{
           $title = $row['sampleTitle'];
         }   
      }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>Getting Started | Overview</title>
<link rel="stylesheet" type="text/css" href="../css/mainRecruitingStyles.css">
<link rel="stylesheet" type="text/css" href="../css/header_styles.css">
<link rel="stylesheet" type="text/css" href="../css/leftSidebarNav.css">
<link rel="shortcut icon" href="../images/favicon.ico">

<script>
$(document).ready(function() {
$(“.nav li:has(ul)”).hover(function(){
$(this).find(“ul”).slideDown();
}, function(){
$(this).find(“ul”).hide();
});
});
</script>
</head>

<body>
<div id="container">
<?php include 'header_sample.php'; ?>
  
<div id="leftSideBarSample">
  <img src="../<?php echo $contact_photo;?>" width="128" height="150" alt="student photo">
      <ul id="sideNavSample">
      <li><a href="samplestudent.php?group=<?php echo $groupID; ?>"><em>Fundraiser<br>Homepage</em></a></li>
      <li>About Our Fundraiser</li>
      <li><a href="fundgettingstarted.php">Getting<br>Started</a></li>
    </ul>
    <div class="clearfloat"></div>
    	<hr>
	<div class="sidegraybackground">
		<div id="sideRedbar">
           	 <h3>Fundraising Overview</h3>
         	</div> <!--end sideRedbar-->
		<ul id="sidemenugettingstarted">
			<li><a href="fundgettingstarted1.php?group=<?php echo $_GET['group']; ?>">Welcome!</a></li>
			<li><a href="fundgettingstarted2.php?group=<?php echo $_GET['group']; ?>">Mission</a></li>
			<li><a href="fundgettingstarted12.php?group=<?php echo $_GET['group']; ?>">Online Fundraising</a></li>
			<li><a href="fundgettingstarted3.php?group=<?php echo $_GET['group']; ?>">10 Strengths</a></li>
			<li><a href="fundgettingstarted4.php?group=<?php echo $_GET['group']; ?>">3 Steps</a></li>
			<li><a href="fundgettingstarted5.php?group=<?php echo $_GET['group']; ?>">Greatmoods Mall</a></li>
			<li><a href="fundgettingstarted6.php?group=<?php echo $_GET['group']; ?>">We Deliver!</a></li>
			<li><a href="fundgettingstarted7.php?group=<?php echo $_GET['group']; ?>">Cash Next Day!</a></li>
			<li><a href="fundgettingstarted8.php?group=<?php echo $_GET['group']; ?>">Income Calculator</a></li>
			<li><a href="fundgettingstarted13.php?group=<?php echo $_GET['group']; ?>">Funds 24/7/365</a></li>
			<li><a href="fundgettingstarted10.php?group=<?php echo $_GET['group']; ?>">Training, Tips, Tools & Forms</a></li>
			<li><a href="fundgettingstarted9.php?group=<?php echo $_GET['group']; ?>">Start Today!</a></li>
		</ul>
	</div>
</div>
<br><br>

 <div id="content">
	<h1>Getting Started</h1>
    	<h3>Achieving Success for your Goals is our Goal</h3>
<div id="column1">
<p>Setting up an Online Fundraiser for your entire Organization is probably a first for you and we know that. Here is your Fundraising To Do Checklist, with Step by Step forms to help you get started.</p> 
<p>A suggestion for any Organization or Fundraising Leader or non-techie types who are concerned about setting up an online Fundraiser. Find a couple kids or members who have a Cell Phone, Facebook page or Twitter account, because they could easily set up the whole Fundraiser in an evening and maintain any part of it in their sleep.</p>

<h3>Overview Presentations</h3>
    <ul>
    	<li>Fundraising Word and PowerPoint Documents (PC or Mac)</li>
    	<li>Video Fundraising Overview</li>
    	<li>Complete Step by Step Fundraising Training Guide</li>
    	<li>Step by Step Student or Member Leader Guide</li>
    	<li>Sales Guide to Successfully Selling Products and Gifts</li>
    </ul>
    <h3>Getting Started Packet for the Fundraising Leaders, and Students</h3>
   	<ul>
   		<li>Welcome, Let’s Get Your Fundraiser Setup (Leaders To Do Checklist)</li>
    		<li>Welcome, Let’s get your Website Setup and Generating Funds (Student or Member To Do)</li>
    		<li>Fundraising Leaders Checklist</li>
    		<li>Student/Member Leader Checklist</li>
    		<li>Student/Member Checklist</li>
    	</ul>
    <h3>Forms and Marketing Materials</h3>
    	<ul>
   	 	<li>Friends & Family Email Prospect Form</li>
    		<li>Contact Card Form</li>
    		<li>Order Form with Best Sellers</li>
    		<li>Poster</li>
	</ul>

    </div>
    <!--end column1-->
    
    <div id="column2">
    <img src="../images/rep-pages/productgrouping2.png" width="347" height="307" alt="Product Grouping">
    
    <h3>Fundraising Emails</h3>
    	<ul>
    		<li>Announcements</li>
    		<li>Parent Emails</li>
    		<li>Student or Member Emails</li>
    		<li>Consumer Emails</li>
    		<li>Facebook Posts</li>
    	</ul>
    
<h3>Get Started Today</h3>
	<p>GreatMoods is looking forward to working with you and your Organization to build a long-term consistent Fundraising Revenue!</p>
	<p><b>Click the Button below to contact us and get started.</b></p>
	<div><a href="fundgettingstarted9.php?group=<?php echo $_GET['group']; ?>"><input type="button" value="Let the Fundraising Begin!" title="Click to contact us and get started."/></a></div>

    </div> <!--end column2-->

  </div>  <!--end content-->
  <div class="clearfloat">  </div>

  <?php include 'footer.php' ; ?>
</div> <!--end container-->
</body>
</html>
<?php
   ob_end_flush();
?>