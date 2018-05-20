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

<!DOCTYPE html>
<head>
	<title>Getting Started | Welcome</title>
</head>

<body>
<div id="container">
	<?php include 'header_sample.php'; ?>
	<?php include 'leftnavSampleGettingStarted.php'; ?>

 <div id="contentSample">
	<h1>Generate Funds 24/7/365 Days a Year!</h1>
    <h3></h3>
    <div id="column1b">
    	<p>The Greatmoods Fundraising Program allows a low key, painless way to generate revenue year round for your groups Fundraiser. The reason, we have real products that you or your supporters could use every day and many of them for years to come. Hey, if you have to support a Fundraiser for yourself or child shouldn’t there a fun benefit for you? By the time you need the funds, it could be a non-event because you have already raised your Groups Goal during the year.</p>
    	<p>The GreatMoods Mall will constantly be adding new products daily for all seasons, age groups; from the practical, to silly for all activities and events. Year round, every purchase made from your any of your Groups Fundraising Websites, 35% of that sale is deposited into your PayPal Fundraising Account daily.</p>
    	<p>With this one Fundraising Program you could actually reach your Fundraising Goal in well in advance of the date you need the funds. Pretty nice way to achieve your fundraising goals; cash next, we deliver, one time setup, and the Social Networking kids love it. Get started with GreatMoods Today!</p>
    </div><!--end column1-->
    
    <div id="column2b">
      	<div><br>
    	<img src="../images/rep-pages/boyscouts.png" width="404" height="270" alt="Boyscout Troop">
	<img class="imgLeft" src="../images/rep-pages/cellist.png" width="198" height="166" alt="Student Playing the Cello">
	<img class="imgRight" src="../images/rep-pages/baseball.png" width="198" height="166" alt="Baseball Team">
    </div>
    </div><!--end column2-->
  </div>  <!--end content-->
  <div class="clearfloat">  </div>

  <?php include 'footer.php' ; ?>
</div> <!--end container-->
</body>
</html>
<?php
   ob_end_flush();
?>