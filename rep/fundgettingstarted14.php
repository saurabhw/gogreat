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
         $student_name = $row['student_name'];
         if($row['sampleTitle']==''){
           $title = $club;
         }else{
           $title = $row['sampleTitle'];
         }   
      }
?>

	<?php include 'header.inc.php'; ?>
  	<?php include 'leftnavSampleGettingStarted.php'; ?>

      <div id="content">
          <div class="presentation">
		<div id="slider">
			<div><img src="../images/presentation/rp-fl_checklist-1.jpg" alt="slide 1"></div>
			<div><img src="../images/presentation/rp-fl_checklist-2.jpg" alt="slide 2"></div>
			<div><img src="../images/presentation/rp-fl_checklist-3.jpg" alt="slide 3"></div>
			<div><img src="../images/presentation/rp-fl_checklist-4.jpg" alt="slide 4"></div>
			<div><img src="../images/presentation/rp-fl_checklist-5.jpg" alt="slide 5"></div>
			<div><img src="../images/presentation/rp-fl_checklist-6.jpg" alt="slide 6"></div>
			<div><img src="../images/presentation/rp-fl_checklist-7.jpg" alt="slide 7"></div>
			<div><img src="../images/presentation/rp-fl_checklist-8.jpg" alt="slide 8"></div>
			<div><img src="../images/presentation/rp-fl_checklist-9.jpg" alt="slide 9"></div>
			<div><img src="../images/presentation/rp-fl_checklist-10.jpg" alt="slide 10"></div>
			<div><img src="../images/presentation/rp-fl_checklist-11.jpg" alt="slide 11"></div>
			<div><img src="../images/presentation/rp-fl_checklist-12.jpg" alt="slide 12"></div>
		</div> <!-- end slider -->
	</div> <!-- end presentation -->
  </div> <!--end content -->
  
      <?php include 'footer.php' ; ?>   
</div> <!--end container-->

</body>
</html>

<?php
   ob_end_flush();
?>