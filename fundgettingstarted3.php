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
<title>Getting Started | Strengths</title>
</head>

<body>
<div id="container">
<?php include 'includes/header_sample.php'; ?>
<?php include 'navigation/leftnavSampleGettingStarted.php'; ?>

 <div id="contentSample">
	<h1>Strengths of the GreatMoods Program </h1>
	<h3>10 Good Reasons To Do Fundraising Online With GreatMoods</h3>

	<div id="column1b">
		<p><b>1.</b> Every Student, or Member of every Team, Club, Church or Organization gets their own Free Individually Personalized Fundraising Website.</p>
		<p><b>2.</b> The GreatMoods Shopping Mall offers a great selection of over 20,000+ fundraising products designed for all age groups.  Everyone is a potential customer or recipient of our products for every season, reason or occasion.</p>
		<p><b>3.</b> PayPal, the most trusted and fraud proof online order processing system, for the consumer market today, is used to process every order. </p>
		<p><b>4.</b> Cash is Deposited Weekly for every product sold directly into your groups’ PayPal account 24/7/ 365 days a year, forever!</p>
		<p><b>5.</b> Spring, Summer, Winter or Fall GreatMoods Fundraising delivers it all.  This one Program allows 3 to 5 significant fundraising income opportunities a year, with one simple setup.</p>
		<p><b>6.</b> Selling door-to-door really isn’t required because all of your Fundraising can be done online with Friends, Family and Neighbors from anywhere in the country.</p>
		<p><b>7.</b> We Deliver! Everything! Everywhere! You don’t touch the product, because it is delivered straight to the designated recipient (even when it’s for you)!</p>
		<p><b>8.</b> It’s Free, Now and Forever, No cost of anything to anyone, EVER. All you have to do is maintain new members and delete old ones a couple times a year.</p>
		<p><b>9.</b> New, absolutely! Facebook is new, Twitter is new and Texting is new. Personalized Fundraising Websites by GreatMoods are new, and being new and online is certainly a good thing for all your Students, Members and potential Supporters.</p>
		<p><b>10.</b> New to technology? Never worry about that.  With today’s tech savvy kids and family members, the Fundraising Program can be setup in no time. It's as easy to maintain as a Facebook or Twitter Account.</p>
	</div> <!--end column1b-->
	
	<div id="column2b">
		<br>
		<img src="../../images/rep-pages/scarfgrouping.png" width="404" height="270" alt="5 Scarves">
		<img class="imgLeft" src="images/rep-pages/boycomputer.png" width="198" height="166" alt="Student at Computer">
		<img class="imgRight" src="images/rep-pages/teachercomputer.png" width="198" height="166" alt="Teacher at Computer Desk">
		<div id="pcaption">GreatMoods offers fundraising opportunities for schools, religious organizations, community organizations and more.</div>
		
		<!-- <h3>Get Started Today</h3>
		<p>GreatMoods is looking forward to working with you and your Organization to build a long-term consistent Fundraising Revenue!</p>
		<p><b>Click the Button below to contact us and get started.</b></p>
		<div><a href="contactus.php"><input type="button" value="Let the Fundraising Begin!"/></a></div>-->
	</div> <!--end column2b-->
  </div>  <!--end content-->
  <div class="clearfloat">  </div>

  <?php include 'footer.php' ; ?>
</div> <!--end container-->
</body>
</html>
<?php
   ob_end_flush();
?>