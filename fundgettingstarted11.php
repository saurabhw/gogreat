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
	<title>Getting Started | Forms</title>
</head>

<body>
<div id="container">
	<?php include 'includes/header_sample.php'; ?>
	<?php include 'navigation/leftnavSampleGettingStarted.php'; ?>

 <div id="contentSample">
	<div class="presentation">
		<div id="slider">
			<div><img src="images/presentation/gm_presentation6-1.jpg" alt="slide 1"></div>
			<div><img src="images/presentation/gm_presentation6-2.jpg" alt="slide 2"></div>
			<div><img src="images/presentation/gm_presentation6-3.jpg" alt="slide 3"></div>
			<div><img src="images/presentation/gm_presentation6-4.jpg" alt="slide 4"></div>
			<div><img src="images/presentation/gm_presentation6-5.jpg" alt="slide 5"></div>
			<div><img src="images/presentation/gm_presentation6-6.jpg" alt="slide 6"></div>
			<div><img src="images/presentation/gm_presentation6-7.jpg" alt="slide 7"></div>
			<div><img src="images/presentation/gm_presentation6-8.jpg" alt="slide 8"></div>
			<div><img src="images/presentation/gm_presentation6-9.jpg" alt="slide 9"></div>
			<div><img src="images/presentation/gm_presentation6-10.jpg" alt="slide 10"></div>
			<div><img src="images/presentation/gm_presentation6-11.jpg" alt="slide 11"></div>
			<div><img src="images/presentation/gm_presentation6-12.jpg" alt="slide 12"></div>
			<div><img src="images/presentation/gm_presentation6-13.jpg" alt="slide 13"></div>
			<div><img src="images/presentation/gm_presentation6-14.jpg" alt="slide 14"></div>
			<div><img src="images/presentation/gm_presentation6-15.jpg" alt="slide 15"></div>
			<div><img src="images/presentation/gm_presentation6-16.jpg" alt="slide 16"></div>
			<div><img src="images/presentation/gm_presentation6-17.jpg" alt="slide 17"></div>
			<div><img src="images/presentation/gm_presentation6-18.jpg" alt="slide 18"></div>
			<div><img src="images/presentation/gm_presentation6-19.jpg" alt="slide 19"></div>
			<div><img src="images/presentation/gm_presentation6-20.jpg" alt="slide 20"></div>
			<div><img src="images/presentation/gm_presentation6-21.jpg" alt="slide 21"></div>
			<div><img src="images/presentation/gm_presentation6-22.jpg" alt="slide 22"></div>
			<div><img src="images/presentation/gm_presentation6-23.jpg" alt="slide 23"></div>
			<div><img src="images/presentation/gm_presentation6-24.jpg" alt="slide 24"></div>
			<div><img src="images/presentation/gm_presentation6-25.jpg" alt="slide 25"></div>
			<div><img src="images/presentation/gm_presentation6-26.jpg" alt="slide 26"></div>
			<div><img src="images/presentation/gm_presentation6-27.jpg" alt="slide 27"></div>
			<div><img src="images/presentation/gm_presentation6-28.jpg" alt="slide 28"></div>
			<div><img src="images/presentation/gm_presentation6-29.jpg" alt="slide 29"></div>
			<div><img src="images/presentation/gm_presentation6-30.jpg" alt="slide 30"></div>
			<div><img src="images/presentation/gm_presentation6-31.jpg" alt="slide 31"></div>
			<div><img src="images/presentation/gm_presentation6-32.jpg" alt="slide 32"></div>
			<div><img src="images/presentation/gm_presentation6-33.jpg" alt="slide 33"></div>
			<div><img src="images/presentation/gm_presentation6-34.jpg" alt="slide 34"></div>
			<div><img src="images/presentation/gm_presentation6-35.jpg" alt="slide 35"></div>
		</div> <!-- end slider -->
	</div> <!-- end presentation -->
  </div>  <!--end content-->
  <div class="clearfloat">  </div>

  <?php include 'footer.php' ; ?>
</div> <!--end container-->
</body>
</html>
<?php
   ob_end_flush();
?>