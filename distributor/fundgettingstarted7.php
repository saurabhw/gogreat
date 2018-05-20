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
<title>Getting Started | Cash Next Day!</title>
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
      <li><a href="fundgettingstarted.php?group=<?php echo $_GET['group']; ?>">Getting<br>Started</a></li>
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
	<h1>Cash Next Day! 24/7/365 Days a Year!</h1>
    <h3>GreatMoods, Great Cash Flow</h3>
    <div id="column1">
      <p>Best of all, your Fundraising Organization receives cash next day on every Product or Gift purchased. The cash will be deposited next day, directly into their PayPal account.</p>
      <p>By the way, anyone can set up a PayPal account because it is like setting up a savings account at a bank. PayPal also has a Visa Debit card available for your Group, that they can use at any ATM to access the organization’s funds 24/7/365 days a year.</p>
      <p>GreatMoods can help setup each Organization, Club or Team with a free PayPal account prior to when the Fundraiser begins. The goal is to help both your Organization and its Students or Members maximize their income on an ongoing basis with this very easy Fundraiser.</p>
      <h3>Get Started Today</h3>
	<p>GreatMoods is looking forward to working with you and your Organization to build a long-term consistent Fundraising Revenue!</p>
	<!--<p><b>Click the Button below to contact us and get started.</b></p>
	<div><a href="contactus.php"><input type="button" value="Let the Fundraising Begin!"/></a></div>-->
      
    </div>
    <!--end column1-->
    
    <div id="column2">
    <div>
    	<img src="../../images/rep-pages/bigbrobigsis1.png" width="404" height="270" alt="Big Brothers & Big Sisters">
	<img class="imgLeft" src="../../images/rep-pages/kidsbball.png" width="198" height="166" alt="Student Artist - Pottery">
	<img class="imgRight" src="../../images/rep-pages/familysteps.png" width="198" height="166" alt="Student Cello Player">
    </div>    
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