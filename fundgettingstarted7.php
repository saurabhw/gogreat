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
<title>Getting Started | Cash Next Day!</title>
</head>

<body>
<div id="container">
<?php include 'includes/header_sample.php'; ?>
<?php include 'navigation/leftnavSampleGettingStarted.php'; ?>

 <div id="contentSample">
	<h1>Cash Weekly! 24/7/365 Days a Year!</h1>

	<div id="column1b">
		<h3>GreatMoods, Great Cash Flow</h3>
		<p>Best of all, your Fundraising Organization receives cash weekly on every Product or Gift purchased. The cash will be deposited weekly, directly into their PayPal account.</p>
		<p>By the way, anyone can set up a PayPal account because it is like setting up a savings account at a bank. PayPal also has a Visa Debit card available for your Group, that they can use at any ATM to access the organization’s funds 24/7/365 days a year.</p>
		<p>GreatMoods can help setup each Organization, Club or Team with a free PayPal account prior to when the Fundraiser begins. The goal is to help both your Organization and its Students or Members maximize their income on an ongoing basis with this very easy Fundraiser.</p>
		
		<h3>Get Started Today</h3>
		<p>GreatMoods is looking forward to working with you and your Organization to build a long-term consistent Fundraising Revenue!</p>
	</div> <!--end column1b-->
	
	<div id="column2b">
		<img src="../../images/rep-pages/bigbrobigsis1.png" width="404" height="270" alt="Big Brothers & Big Sisters">
		<img class="imgLeft" src="../../images/rep-pages/kidsbball.png" width="198" height="166" alt="Student Artist - Pottery">
		<img class="imgRight" src="../../images/rep-pages/familysteps.png" width="198" height="166" alt="Student Cello Player">
	</div> <!--end column2b--> 
  </div>  <!--end content-->

  <?php include 'footer.php' ; ?>
</div> <!--end container-->
</body>
</html>
<?php
   ob_end_flush();
?>