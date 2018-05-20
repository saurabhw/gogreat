<?php
      session_start();
      ob_start();
      define("SITE_ROOT",$_SERVER["DOCUMENT_ROOT"].'/salesTest/');
      include("includes/connection.inc.php");
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
         $student_name = $row['student_name'];
         if($row['sampleTitle']==''){
           $title = $club;
         }else{
           $title = $row['sampleTitle'];
         }   
      }
?>

<!DOCTYPE html>
<head>
	<title>Getting Started | Welcome</title>
</head>

<body>
<div id="container">
	<?php include 'includes/header_sample.php'; ?>
	<?php include 'navigation/leftnavSampleGettingStarted.php'; ?>

 <div id="contentSample">
	<h1>Welcome to GreatMoods!</h1>
	<h3>GreatMoods, Great Fundraising!</h3>
	
	<div id="column1b">
		<p>Today’s Cell Phone, Facebook and Social Media Generation want convenience, ease of use and speed, all of which are offered as part of our GreatMoods Free Personalized Website Fundraising Program.</p>
		<p>Every Student or Member of every Club, Team, School, Group, Organization, Church or Community gets their very own Free Personalized Fundraising Website to achieve the group’s goal! Everybody!</p>
		<p>Cash is Deposited every week into your Group's PayPal Account on every individual sale (which is 35% of the Retail Price) and best of all We Deliver!  Everything!  Everywhere!  24/7/365 days a year!</p>
		<p>GreatMoods has a “Shopping Mall”, located on each of the Free Individual Member Websites, with a wonderful selection of fundraising products and gifts that any supporter would be pleasantly surprised to purchase from.</p> 
		<p>The GreatMoods Mall has fashionable clothing for everyone, including scarves, jewelry, sportswear and accessories. Chocolate, Cookie and Coffee Dessert Trays are available for Friends, Family, Customers and Clients during all the Holiday Seasons! New Merchandise is arriving everyday for every Season and Reason Year Round!</p>
	
		<div id="leadBox">
			<div id="infoText">
				<div id="redBar1">
					<h3>Program Features and Benefits</h3>
				</div> <!--end redBar1-->
				
				<ul>
					<li>Free Fun Fundraising Websites for every Student or Member!</li>
					<li>100+ Stores of 20,000+ Products at the GreatMoods Mall</li>
					<li>Cash is Deposited Every Week into your Group's PayPal Account!</li>
					<li>We Deliver! Everything! Everywhere!</li>
					<li>Achieving Success for your Goals is our Goal, 24/7/365 days a year!</li>
					<li>Easy to Setup, Easy to Maintain!  Everything is Free!  Now & Forever!</li>
				</ul>
			</div> <!--end infoText--> 
		</div> <!--end leadBox-->
		
		<div>&nbsp;</div>
		<p>The Future of Fundraising for today’s technology savvy families, students and organizational members is completely online. GreatMoods; Easy to set up, Easy to maintain and focused on achieving $uccess for you.</p>
	</div> <!--end column1b-->
	
	<div id="column2b">
		<div>
			<img src="images/rep-pages/highyearbook2.png" width="404" height="270" alt="High School Year Book">
			<img class="imgLeft" src="images/rep-pages/boyscouts1.png" width="198" height="166" alt="Boy Scouts">
			<img class="imgRight" src="images/rep-pages/juniorchoir.png" width="198" height="166" alt="Elementary School Choir">
		</div>
		
		<div id="pcaption">GreatMoods offers fundraising opportunities for schools, religious organizations, community organizations and more. </div>
	
		<h3>Get Started Today</h3>
		<p>GreatMoods is looking forward to working with you and your Organization to build a long-term consistent Fundraising Revenue!</p>
	</div>    <!--end column2b--> 
  </div>  <!--end content-->
  <div class="clearfloat">  </div>

  <?php include 'footer.php' ; ?>
</div> <!--end container-->
</body>
</html>
<?php
   ob_end_flush();
?>