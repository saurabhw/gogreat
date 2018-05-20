<?php
      session_start();
      ini_set('session.bug_compat_warn', 0);
	ini_set('session.bug_compat_42', 0);

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

<!DOCTYPE html>
<head>
	<title>GreatMoods Sample Website</title>
</head>

<body>
<div id="container">
	<?php include 'header_sample.php'; ?>
	<?php include 'leftSideBarSample.php'; ?>

  <div id="contentSample">
    <div id="column1">
    	<h3 class="sample"><!-- <?php echo $student_name; ?>'s --><?php echo $title; ?> Fundraiser</h3>
    	
    	<div class="grpcollage">
        	<div class="mainSlides"><img src="../<?php echo $group_photo;?>" alt="placeholder for group photo"></div>
        	<div class="mainSlides"><img src="images/sliders/mainslider1.jpg" alt="Sign Up Your Group and Start Fundraising Today!"></div>
		<div class="mainSlides"><img src="images/sliders/mainslider2.jpg" alt="How Our Fundraising Program Works"></div>
		<div class="mainSlides"><img src="images/sliders/mainslider3.jpg" alt="Example of Free Member Fundraising Website"></div>
		<div class="mainSlides"><img src="images/sliders/mainslider4.jpg" alt="Great Fundraising Products at the GreatMoods Mall"></div>
		<div class="mainSlides"><img src="images/sliders/mainslider5.jpg" alt="Fundraising Products You  Really Want"></div>
		<div class="mainSlides"><img src="images/sliders/mainslider6.jpg" alt="35% of Every Purchase is Yours!"></div>
		<div class="mainSlides"><img src="images/sliders/mainslider7.jpg" alt="We Deliver Everything!"></div>
		<div class="mainSlides"><a href="gettingstarted_sendemail.php"><img src="images/sliders/mainslider8.jpg" alt="3 Easy Steps To Sign Up & Start Today!"></a></div>
      	</div> <!-- end slider -->
	
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
          <img src="../<?php echo $leader_photo;?>" alt="Leader photo">
        </div> <!-- end leaderimgcrop -->
        <div class="contactinfo2">
          <span class="title"><strong><?php echo $position; ?></strong></span>
          <span class="leadername"><?php echo $leader; ?></span>
        </div>
      </div> <!--end leader-->  
        
      <div class="studentleader">
      	<div class="leaderimgcrop">
          <img src="../<?php echo $student_photo;?>" alt="Leader">
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
          <li><a href="">Mothers</a></li>
          <li><a href="">Grandmas</a></li>
          <li><a href="">Fathers</a></li>
           <li><a href="">Grandpas</a></li>
           <li><a href="">Teen Girls</a></li>
           <li><a href="">Teen Boys</a></li>
          <li><a href="">Girls</a></li>
          <li><a href="">Boys</a></li>
          <li><a href="">Love &amp; Romance</a></li>
          <li><a href="">Special Friends</a></li>
          <li><a href="">Students Away at School</a></li>
          <li><a href="">Customeres &amp; Clients</a></li>
          <li><a href="">Me, Myself &amp; I</a></li>
        </ul>
      </div>
      
      <br>
      
      <div class="bestsellers">
      	<h5>New Arrivals</h5>
	<img src="../images/rightcol_collage_4pics_15nov2016.jpg" width="160" height="" alt="new arrivals daily">
      </div>
      
  </div> <!-- end column 2 -->
	
  </div> <!--end content-->
  <div class="clearfloat">  </div>

  <?php include 'footer.php' ; ?>
</div>
<!--end container-->
</body>
</html>
<?php
   ob_end_flush();
?>