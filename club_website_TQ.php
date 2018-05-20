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
	<title>Main Fundraiser Website | GreatMoods</title>
</head>

<body>
<div id="container">
	<?php include 'includes/header_sample.php'; ?>
	<?php include 'navigation/leftSideBarSample.php'; ?>

  <div id="contentSample">
  	<div id="column1">
  		<h3 class="sample">Please Support Our <?php echo $title; ?> Fundraiser!</h3>
  		
  		<div class="grpcollage">
  			<img src="<?php echo $group_photo;?>" alt="placeholder for group photo" />
  		</div>
  		
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
	      <br>
	      <p><strong>Individual<br>Goals</strong><br>
	        $<?php echo $goal; ?></p><br/>
	      <p><strong>Raised<br />
	        So Far</strong><br />
	        $<?php echo $so_far; ?>.00</p>
	    </div>    <!--end goals--> 
	    
	    <div class="leader">
	          <img src="<?php echo $leader_photo;?>" width="106" height="106" alt="Leader photo">
	        <div class="contactinfo2">
	          <span class="title"><strong><?php echo $position; ?></strong></span>
	          <span class="leadername"><?php echo $leader; ?></span>
	        </div>
	      </div> <!--end leader-->  
	        
	      <div class="studentleader">
	        <div class="studentleaderphoto">
	          <img src="../<?php echo $student_photo;?>" width="106" height="106" alt="Leader">
	        </div>
	        <div class="contactinfo2">
	         <!-- <span class="title"><strong>Student Leader</strong></span>
	          <span class="leadername"><?php echo $student_leader_name; ?></span> -->
	        </div>
	      </div> <!--end studentleader-->
	      
  	</div> <!-- end column1 -->
  	
  	<div id="column2">
  		<div class="shopDetails">
	        <ul class="stumenu">
	          <h5>Shopping Ideas For...</h5>
	          <li><a href="">Mothers &amp; Grandmas</a></li>
	          <li><a href="">Fathers &amp; Grandpas</a></li>
	          <li><a href="">Boys &amp; Girls</a></li>
	          <li><a href="">Teen Boys</a></li>
	          <li><a href="">Teen Girls</a></li>
	          <li><a href="">Men &amp; Women</a></li>
	          <li><a href="">Special Friends</a></li>
	          <li><a href="">Students Away at School</a></li>
	          <li><a href="">Me Me Me (It's OK...)</a></li>
	        </ul>
	      </div>
  		
  		<div class="bestsellers">
	      	<h5>Best Sellers</h5>
			<img src="images/sanmar_LSW289.jpg" width="190" height="" alt="bestsellers">
	      </div>
  	</div> <!-- end column2 -->
      
  </div>  <!--end content-->
  
  <div class="clearfloat">  </div>
  <?php include 'footer.php' ; ?>
</div> <!--end container-->
</body>
</html>
<?php
   ob_end_flush();
?>