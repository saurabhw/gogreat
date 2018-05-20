<?php
      session_start();
      ini_set('session.bug_compat_warn', 0);
	ini_set('session.bug_compat_42', 0);

      ob_start();
      define("SITE_ROOT",$_SERVER["DOCUMENT_ROOT"].'/salesTest/');
      include("includes/connection.inc.php");
      $link = connectTo();
      $table = "sample_websites";
      $sample = $_GET['sample'];
      $groupID = $_GET['group'];
      if($sample == '')
      {
          $query = "SELECT * FROM $table WHERE samplewebID = $groupID";
      }
      else
      {
         $query = "SELECT * FROM $table WHERE samplewebID = $sample";
      }
      
      
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
         $sn = $row['sampleName'];
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
	<title>GreatMoods Sample Website</title>
</head>

<body>
<div id="container">
	<?php include 'includes/header_sample.php'; ?>
	<?php include 'navigation/leftSideBarSample.php'; ?>

  <div id="contentSample">
    <div id="column1">
    	<h3 class="sample"><?php echo $leader; ?>'s <?php echo $sn; ?> Fundraiser</h3>
      	
      	<div id="sliderFrame" class="grpcollage">
	        <div id="marketingSlider">
	            	<img src="<?php echo $group_photo;?>" alt="UPLOAD YOUR GROUP PICTURE HERE!">
	            	<img src="../images/sliders/mbrslider1.jpg" alt="Thank You for Visiting">
	            	<img src="../images/sliders/mbrslider2.jpg" alt="Shop at Any Stores Above">
	            	<img src="../images/sliders/mbrslider3.jpg" alt="Great Fundraising Products at the GreatMoods Mall">
	            	<img src="../images/sliders/mbrslider4.jpg" alt="Fundraising Products You  Really Want">
			<img src="../images/sliders/mbrslider5.jpg" alt="35% of Every Purchase is Yours!">
			<img src="../images/sliders/mbrslider6.jpg" alt="We Deliver Everywhere!">
	        </div>
	        <div id="sliderNavbar">
	            <a onclick="imageSlider.previous()" class="group2-Prev"></a>
	            <a id='auto' onclick="switchAutoAdvance()"></a>
	            <a onclick="imageSlider.next()" class="group2-Next"></a>
	        </div>
	</div> <!-- end sliderFrame -->

	<div class="reasonsbox">
        <h5 id="reasons">Reasons for Our Fundraiser</h5>
        <?php
          echo '<div id ="reasoncontent">'; 
          $r_list = explode('.', $reasons);
          echo '<ul>';
          foreach ($r_list as $item){
            if ($item != ''){
               echo '<li>', trim($item), '</li>';
            }
          }
          echo '<?ul>';
          echo '</div>';
        ?>
      </div>
      
      <div id="goals">
      <br />
      <p><strong>My Goal</strong><br />
        $<?php echo $goal; ?></p><br/>
      <p><strong>Raised<br />
        So Far</strong><br />
        $<?php echo $so_far; ?>.00</p>
    </div> <!--end goals--> 
	
      <div class="leader">
      	<div class="leaderimgcrop">
          <img src="<?php echo $leader_photo;?>" alt="UPLOAD YOUR LEADER PICTURE HERE!">
        </div> <!-- end leaderimgcrop -->
        <div class="contactinfo2">
          <span class="title"><strong><?php echo $position; ?></strong></span>
          <span class="leadername"><?php echo $leader; ?></span>
        </div>
      </div> <!--end leader-->  
        
      <div class="studentleader">
      	<div class="leaderimgcrop">
          <img src="../<?php echo $student_photo;?>" alt="UPLOAD ANY PICTURE HERE!">
        </div> <!-- end leaderimgcrop -->
        <div class="contactinfo2">
         <!-- <span class="title"><strong>Student Leader</strong></span>
          <span class="leadername"><?php echo $student_leader_name; ?></span> -->
        </div>
      </div> <!--end studentleader-->
  </div> <!-- End Column 1-->
  
 <div id="column2">  	
  	<div class="shopDetails">
        <ul class="stumenu">
          <h5>Shopping Ideas For...</h5>
		<li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=918#!/Mothers/c/18209955/offset=0&sort=priceAsc">Mothers</a></li>
		<li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=918#!/Grandmas/c/18209956/offset=0&sort=priceAsc">Grandmas</a></li>
		<li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=918#!/Fathers/c/18209957/offset=0&sort=priceAsc">Fathers</a></li>
		<li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=918#!/Grandpas/c/18209958/offset=0&sort=priceAsc">Grandpas</a></li>
		<li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=918#!/Teen-Girls/c/18209959/offset=0&sort=priceAsc">Teen Girls</a></li>
		<li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=918#!/Teen-Boys/c/18209960/offset=0&sort=priceAsc">Teen Boys</a></li>
		<li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=918#!/Girls/c/18209961/offset=0&sort=priceAsc">Girls</a></li>
		<li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=918#!/Boys/c/18209962/offset=0&sort=priceAsc">Boys</a></li>
		<li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=918#!/Love-&-Romance/c/18209963/offset=0&sort=priceAsc">Love &amp; Romance</a></li>
		<li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=918#!/Special-Friends/c/18209964/offset=0&sort=priceAsc">Special Friends</a></li>
		<li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=918#!/Students-Away-at-School/c/18209965/offset=0&sort=priceAsc">Students Away at School</a></li>
		<li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=918#!/Customer-&-Clients/c/18209966/offset=0&sort=priceAsc">Customeres &amp; Clients</a></li>
		<li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=918#!/Me-Myself-&-I-Its-Okay/c/18209967/offset=0&sort=priceAsc">Me, Myself &amp; I</a></li>
        </ul>
      </div>
      
      <br>
      
      <div class="bestsellers">
      	<h5>New Arrivals Daily!</h5>
	<img src="images/rightcol_collage_4pics_15nov2016.jpg" width="160" height="" alt="new arrivals daily">
      </div>
      
  </div> <!-- end column 2 -->
	
  </div> <!--end content-->
  <div class="clearfloat">  </div>

  <?php include 'footer.php' ; ?>
</div> <!--end container-->
</body>
</html>

<script>
    function switchAutoAdvance() {
        imageSlider.switchAuto();
        switchPlayPauseClass();
    }
    function switchPlayPauseClass() {
        var auto = document.getElementById('auto');
        var isAutoPlay = imageSlider.getAuto();
        auto.className = isAutoPlay ? "group2-Pause" : "group2-Play";
        auto.title = isAutoPlay ? "Pause" : "Play";
    }
    switchPlayPauseClass();
</script>

<?php
   ob_end_flush();
?>