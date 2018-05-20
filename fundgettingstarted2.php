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
         if($row['sampleTitle']==''){
           $title = $club;
         }else{
           $title = $row['sampleTitle'];
         }   
      }
?>

<!DOCTYPE html>
<head>
	<title>Getting Started | GreatMoods Mission</title>
</head>

<body>

<div id="container">
	<?php include 'includes/header_sample.php'; ?>
	<?php include 'navigation/leftnavSampleGettingStarted.php'; ?>

 <div id="contentSample">
	<h1>GreatMoods Mission</h1>
		
	<div id="column1b">
		<h3><br>Achieving Success for Your Goals!</h3>
		<br>
		<p><b>Great Moods Team Purpose:</b></p>
		<p><b>Be Kind</b> – to those in need of help</p>
		<p><b>Do Good</b> – for Individuals, Groups, Organizations and Communities</p>
		<p><b>Achieve Happiness & Success</b> – for every Goal, Vision, Dream or Mission</p>
	</div> <!--end column1b-->
	
	<div id="column2b">
		<img src="../images/rep-pages/diversegroup.jpg" width="404" height="270" alt="Diverse Group of Adults">
		<img class="imgLeft" src="../images/rep-pages/boychild_sm.jpg" width="198" height="166" alt="Young Boy">
		<img class="imgRight" src="../images/rep-pages/teenagegirl_sm.jpg" width="198" height="166" alt="Teenage Girl">
	</div> <!--end column2b--> 
  </div>  <!--end content-->

  <?php include 'footer.php' ; ?>
</div> <!--end container-->
</body>
</html>
<?php
   ob_end_flush();
?>