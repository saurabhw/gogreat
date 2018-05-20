<?php
      session_start();
      if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
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
<meta charset="UTF-8">
<title>GreatMoods | Organization Website</title>
<link rel="stylesheet" type="text/css" href="../css/mainRecruitingStyles.css">
<link rel="stylesheet" type="text/css" href="../css/header_styles.css">
<link rel="stylesheet" type="text/css" href="../css/leftSidebarNav.css">
<link rel="shortcut icon" href="../images/favicon.ico">

<script>
$(document).ready(function() {
$(“.nav li:has(ul)”).hover(function(){
$(this).find(“ul”).slideDown();
}, function(){
$(this).find(“ul”).hide();
});
});
</script>
</head>

<body>
<div id="container">
<?php include 'header_sample.php'; ?>
 
<div id="leftSideBarSample">
  <img src="../<?php echo $contact_photo;?>" width="128" height="150" alt="student photo">
  <ul id="sideNavSample">
    <li class="stuname"><?php echo $student_name; ?></li>
    <li class="stylized"><?php echo $title; ?> Fundraiser</li>
    <hr>
    <li><a href="index.php">GreatMoods Homepage</a></li>   
    <li><a href="../samplestudent.php?group=<?php echo $_GET['group']; ?>">Fundraiser Homepage</a></li>
    <li>About Our Fundraiser</li>
    <div id="giftlist_placeholder">  </div> <!-- blank space -->
  </ul>
</div> <!--end side navigation-->
  <div id="contentSample">
    <h3>Game Day Sports</h3>
    <div class="productcol1">
      <div class="product">
        <a href="product.php?prodid=65&group=<?php echo $_GET['group']; ?>"><img src="../images/sports_item2.jpg" /></a>
      </div>
      <p>Sports Spectacular</p>
    </div>
    <div class="productcol1">
      <div class="product">
        <a href="product.php?prodid=89&group=<?php echo $_GET['group']; ?>"><img src="../images/sports_item4.jpg" /></a>
      </div>
      <p>All About Fun</p>
    </div>
    <div class="productcol1">
      <div class="product">
        <a href="product.php?prodid=90&group=<?php echo $_GET['group']; ?>"><img src="../images/sports_item5.jpg" /></a>
      </div>
      <p>Life's A Ball</p>
    </div>
    <div class="productcol1">
      <div class="product">
        <a href="product.php?prodid=91&group=<?php echo $_GET['group']; ?>"><img src="../images/sports_item6.jpg" /></a>
      </div>
      <p>Game On</p>
    </div>
    
    <!-- Begin right side navigation-->
    <div class="rightnav">
      <h3 class="mallHeader">Varsity Sports &amp; Fitness</h3>
      <div class="productmallLinks">
      <ul class="stumenu">
      <li><a href="sportsFitness_gameProduct.php?group=<?php echo $_GET['group']; ?>">Game Day Sports</a></li>
      <li><a href="sportsFitness_sillyProduct.php?group=<?php echo $_GET['group']; ?>">Silly Sports</a></li>
      <li><a href="sportsFitness_lockerProduct.php?group=<?php echo $_GET['group']; ?>">The Locker Room</a></li>
      <!-- <li><a href="sportsFitness_proteinProduct.php?group=<?php echo $_GET['group']; ?>">Protein To-Go</a></li>
      <li><a href="sportsFitness_funProduct.php?group=<?php echo $_GET['group']; ?>">Fun Size Sports</a></li> -->
      </ul>
      <br>
    </div>
    
    <h3 class="mallHeader">GreatMoods Mall Directory</h3>
    <div class="productmallLinks">
      <ul class="stumenu">
        <?php include '../includes/mall_directory_sample.php'; ?>
      </ul>
    </div>
    </div>
    <!--End Right Side Navigation-->              
    
    <div class="productcol2">
      <div class="product">
        <a href="product.php?prodid=92&group=<?php echo $_GET['group']; ?>"><img src="../images/sports_item7.jpg" /></a>
      </div>
      <p>Slammin!</p>
    </div>
        <div class="productcol1">
      <div class="product">
        <a href="product.php?prodid=93&group=<?php echo $_GET['group']; ?>"><img src="../images/sports_item8.jpg" /></a>
      </div>
      <p>Kick Start</p>
    </div>
            <div class="productcol1">
      <div class="product">
        <a href="product.php?prodid=67&group=<?php echo $_GET['group']; ?>"><img src="../images/sports_item1.jpg" /></a>
      </div>
      <p>To The Gym</p>
    </div>
    
  </div>
  <!--end content-->
  <div class="clearfloat">  </div>

  <?php include 'footer.php' ; ?>
</div>
<!--end container-->
</body>
</html>
<?php
   ob_end_flush();
?>