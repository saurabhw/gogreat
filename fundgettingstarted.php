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
	<title>GreatMoods Getting Started</title>
</head>

<body>
<div id="container">
	<?php include 'includes/header_sample.php'; ?>
	<?php include 'navigation/leftnavSampleGettingStarted.php'; ?>

 <div id="contentSample">
	<h1>Getting Started</h1>
	<h3>Welcome to GreatMoods!</h3>

	<div id="column1b">
		<div id="leadBox">
	        <div id="infoText">
	          <div id="redBar1">
	            <h3>Fundraising Overview</h3>
	          </div> <!--end redBar1-->
	          <ul>
			<li><a href="fundgettingstarted1.php?group=<?php echo $_GET['group']; ?>">Welcome!</a></li>
			<li><a href="fundgettingstarted11.php?group=<?php echo $_GET['group']; ?>">GreatMoods Program Overview</a></li>
			<li><a href="fundgettingstarted2.php?group=<?php echo $_GET['group']; ?>">GreatMoods Mission</a></li>
			<li><a href="fundgettingstarted12.php?group=<?php echo $_GET['group']; ?>">GreatMoods Online Fundraising</a></li>
			<li><a href="fundgettingstarted3.php?group=<?php echo $_GET['group']; ?>">Strengths of the Greatmoods Program</a></li>
			<li><a href="fundgettingstarted4.php?group=<?php echo $_GET['group']; ?>">3 Steps to Fundraising $uccess</a></li>
			<li><a href="fundgettingstarted5.php?group=<?php echo $_GET['group']; ?>">Greatmoods Mall Products & Gifts</a></li>
			<li><a href="fundgettingstarted6.php?group=<?php echo $_GET['group']; ?>">We Deliver!</a></li>
			<li><a href="fundgettingstarted7.php?group=<?php echo $_GET['group']; ?>">Cash Deposited Weekly!</a></li>
			<li><a href="fundgettingstarted8.php?group=<?php echo $_GET['group']; ?>">Calculate Your $uccess</a></li>
			<li><a href="fundgettingstarted10.php?group=<?php echo $_GET['group']; ?>">Generate Funds 24/7/365 Days a Year!</a></li>
			<li><a href="fundgettingstarted9.php?group=<?php echo $_GET['group']; ?>">Sign Up & Start Today!</a></li>
		</ul>
	        </div> <!--end infoText--> 
		</div> <!--end leadBox-->
		
		</div> <!--end column1-->
	    
	    <div id="column2b">
		    <div>
		    	<img src="../images/rep-pages/choir1.png" width="404" height="270" alt="High School Choir">
			<img class="imgLeft" src="../images/rep-pages/youngboy1.png" width="198" height="166" alt="Young Elementary Boy">
			<img class="imgRight" src="../images/rep-pages/church2.png" width="198" height="166" alt="Lady with Father">
		    </div>
		    <div id="pcaption">GreatMoods offers fundraising opportunities for schools, religious organizations, community organizations, and more. </div>
	</div><!--end column2--> 

  </div>  <!--end content-->


  <?php include 'footer.php' ; ?>
</div>
<!--end container-->
</body>
</html>
<?php
   ob_end_flush();
?>