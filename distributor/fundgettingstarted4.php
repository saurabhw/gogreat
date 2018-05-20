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
<title>Getting Started | 3 Steps to Fundraising Success</title>
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
    <h1>3 Steps to Fundraising $uccess</h1>
    <div id="column1">
	<p><br>The GreatMoods Program allows all of the Fundraising to take place online with our Simple 3 Step Setup.</p>	  
	<h5>Step 1) <a href="setupeditwebsite_example2.php">Setup/Edit Website Sample Form</a></h5>
	All you need to do is fill in the basic fields that are relevant to your organization, such as name of the organization and message or purpose for the Fundraiser.<br>
	<h5>Step 2) <a href="setupeditmembers_example2.php">Setup/Edit Members Sample Form</a></h5>
	Each Student or Member can create their own Free Individually Personalized Fundraising Website requesting support from their Friends and Family Members. (Anyone who has setup a Facebook page can setup the entire member list, depending on its size, in an evening.)<br>
	<h5>Step 3) <a href="setupeditemails_example2.php">Setup/Edit E-Mails Sample Form</a></h5> 
	<p>Each Student or Member enters in the e-mail addresses for his or her Friends, Family, and Neighbors. Then a personal e-mail, or one of our standard e-mails, can go out to this e-mail list requesting the support for their Fundraiser.</p>
	
	<p>Lastly, setup a PayPal account so you or your group can receive Cash Next Day on every sale, and again we can work with you to get it done quickly. Getting paid through GreatMoods is done online through PayPal. All transactions are processed when a consumer buys a product or gift and all funds are deposited directly into your fundraising PayPal account.<br><br>
	  If you already have a PayPal account, you can add that account's email to the proper field on your information website set up screen.</p>
	</div> <!--end column1-->
    
    <div id="column2">
    <div><br>
    	<img src="../../images/rep-pages/choir1.png" width="404" height="270" alt="High School Choir">
	<img class="imgLeft" src="../../images/rep-pages/youngboy1.png" width="198" height="166" alt="Young Elementary Boy">
	<img class="imgRight" src="../../images/rep-pages/church2.png" width="198" height="166" alt="Lady with Father">
    </div>
    <div id="pcaption"></div>
	<div>&nbsp;</div>
	<p>If you’re not a techie that’s ok we can do everything for you, or just find a couple kids who have either a cell phone or Facebook page, and they could do it for you in a night.</p>
	
	<h3>Get Started Today</h3>
	<p>GreatMoods is looking forward to working with you and your Organization to build a long-term consistent Fundraising Revenue!</p>
	<p><b>Click the Button below to contact us and get started.</b></p>
	<div><a href="contactus.php"><input type="button" value="Let the Fundraising Begin!"/></a></div>
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