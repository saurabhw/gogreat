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
<title>Getting Started | 3 Steps to Fundraising Success</title>
</head>

<body>
<div id="container">
<?php include 'includes/header_sample.php'; ?>
<?php include 'navigation/leftnavSampleGettingStarted.php'; ?>

 <div id="contentSample">
    	<h1>3 Steps to Fundraising $uccess!</h1>

	<div id="column1b">
		<p><br>The GreatMoods Program allows all of the Fundraising to take place online with our Simple 3 Step Setup.</p>	  
		<h5>Step 1) <a href="setupeditwebsite_example.php">Setup/Edit Website Sample Form</a></h5>
		<p>All you need to do is fill in the basic fields that are relevant to your organization, such as name of the organization and message or purpose for the Fundraiser.</p><br>
		<h5>Step 2) <a href="setupeditmembers_example.php">Setup/Edit Members Sample Form</a></h5>
		<p>Each Student or Member can create their own Free Individually Personalized Fundraising Website requesting support from their Friends and Family Members. (Anyone who has setup a Facebook page can setup the entire member list, depending on its size, in an evening.)</p><br>
		<h5>Step 3) <a href="setupeditemails_example.php">Setup/Edit E-Mails Sample Form</a></h5> 
		<p>Each Student or Member enters in the e-mail addresses for his or her Friends, Family, and Neighbors. Then a personal e-mail, or one of our standard e-mails, can go out to this e-mail list requesting the support for their Fundraiser.</p>
	
		<p>Lastly, setup a PayPal account so you or your group can receive Cash Next Day on every sale, and again we can work with you to get it done quickly. Getting paid through GreatMoods is done online through PayPal. All transactions are processed when a consumer buys a product or gift and all funds are deposited directly into your fundraising PayPal account.<br><br>
		If you already have a PayPal account, you can add that account's email to the proper field on your information website set up screen.</p>
	
		<h3>Get Started Today</h3>
		<p>GreatMoods is looking forward to working with you and your Organization to build a long-term consistent Fundraising Revenue!</p>
		<p><b>Click the Button below to contact us and get started.</b></p>
		<div><a href="contactus.php"><input type="button" class="medredbutton" value="Let the Fundraising Begin!"/></a></div>
	</div> <!--end column1b-->

	<div id="column2b">
		<div><br>
			<img src="../../images/rep-pages/choir1.png" width="404" height="270" alt="High School Choir">
			<img class="imgLeft" src="../../images/rep-pages/youngboy1.png" width="198" height="166" alt="Young Elementary Boy">
			<img class="imgRight" src="../../images/rep-pages/church2.png" width="198" height="166" alt="Lady with Father">
		</div>
		
		<div id="pcaption"></div>
		<p>If you’re not a techie that’s ok, we can do everything for you, or just find a couple kids who have either a cell phone or Facebook page, and they could do it for you in a night.</p>
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