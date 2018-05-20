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
<head>
<meta charset="UTF-8" />
<title>Getting Started | Welcome</title>
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
	<h1>Welcome!</h1>
	<h3>GreatMoods, Great Fundraising!</h3>
	
	<div id="column1">
      <p>Today’s Cell Phone, Facebook and Social Media Generation want convenience, ease of use and speed, all of which are offered as part of our GreatMoods Free Personalized Website Fundraising Program.</p>
      <p>Every Student or Member of every Club, Team, School, Group, Organization, Church or Community gets their very own Free Personalized Fundraising Website to achieve the group’s goal! Everybody!</p>
      <p>Cash next day is deposited into your groups’ PayPal Account on every individual sale (which is 35% of the Retail Price) and best of all We Deliver!  Everything!  Everywhere!  24/7/365 days a year!</p>
      <p>GreatMoods has a “Shopping Mall”, located on each of the Free Individual Websites with a wonderful selection of fundraising products and gifts that any supporter would be pleasantly surprised to purchase from. The GreatMoods Mall has fashionable clothing for everyone, including scarves, jewelry, sportswear and ties. Coffee and candy gift baskets, toys and a whole lot more are available, with products changing as the seasons and fashions do.</p>
     
	<div id="leadBox">
        <div id="infoText">
          <div id="redBar1">
            <h3>Program Features and Benefits</h3>
          </div> <!--end redBar1-->
          <ul>
		<li>Free Fun Fundraising Websites for every Student or Member!</li>
		<li>Great Products at 20 Different GreatMoods Mall Stores</li>
		<li>Cash Next Day! 35% of every sale is deposited into your PayPal Account!</li>
		<li>We Deliver! Everything! Everywhere!</li>
		<li>Achieving Success for your Goals is our Goal, 24/7/365 days a year!</li>
		<li>Easy to Setup, Easy to Maintain!  Everything is Free!  Now & Forever!</li>
	</ul>
        </div> <!--end infoText--> 
	</div> <!--end leadBox-->
   <div>&nbsp;</div>
   
    </div> <!--end column1-->
    
    <div id="column2">
    <div>
    	<img src="../images/rep-pages/highyearbook2.png" width="404" height="270" alt="High School Year Book">
	<img class="imgLeft" src="../images/rep-pages/boyscouts1.png" width="198" height="166" alt="Boy Scouts">
	<img class="imgRight" src="../images/rep-pages/juniorchoir.png" width="198" height="166" alt="Elementary School Choir">
    </div>
    <div id="pcaption">GreatMoods offers fundraising opportunities for schools, religious organizations, community organizations, and more. </div>

<p>The Future of Fundraising for today’s technology savvy families, students and organizational members is completely online. GreatMoods; Easy to set up, Easy to maintain and focused on achieving $uccess for you.</p>

	<h3>Get Started Today</h3>
		<p>GreatMoods is looking forward to working with you and your Organization to build a long-term consistent Fundraising Revenue!</p>
	<!--<p><b>Click the Button below to contact us and get started.</b></p>
	<div><a href="contactus.php"><input type="button" value="Let the Fundraising Begin!"/></a></div>-->
	</div>    <!--end column2--> 

  </div>  <!--end content-->
  <div class="clearfloat">  </div>

  <?php include 'footer.php' ; ?>
</div> <!--end container-->
</body>
</html>
<?php
   ob_end_flush();
?>