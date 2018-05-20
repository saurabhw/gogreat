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
<title>Getting Started | We Deliver!</title>
</head>

<body>
<div id="container">
<?php include 'includes/header_sample.php'; ?>
<?php include 'navigation/leftnavSampleGettingStarted.php'; ?>

 <div id="contentSample">
	<div id="column1b">
		<h1>We Deliver! </h1>
		<h3>The Ordering and Delivery Process</h3>
		
		<p>Ordering and Delivery is easy for your Friends & Family Members that are supporting your Fundraiser; they just need to do 2 simple steps. </p>
		<p><b>Step 1</b> - Shop at the GreatMoods Mall, adding their product selections to their Shopping Cart.</p>
		<p><b>Step 2</b> - Check Out with PayPal and enter where they want everything delivered to.</p>
		<p><b>Done!</b></p>
		<p>GreatMoods delivers all Products or Gifts a week before the holiday or special occasion, year round.</p>
	</div> <!--end column1b-->
	
	<div id="column2b">
		<img src="../../images/rep-pages/scouts.png" width="404" height="270" alt="Kiwanis Club">
		<img class="imgLeft" src="../../images/rep-pages/lukeandfriends.png" width="198" height="166" alt="Young Girl">
		<img class="imgRight" src="../../images/rep-pages/volleyball.png" width="198" height="166" alt="Boy with School Fundraiser">
	</div> <!--end column2b--> 
  </div>  <!--end content-->

  <?php include 'footer.php' ; ?>
</div> <!--end container-->
</body>
</html>
<?php
   ob_end_flush();
?>