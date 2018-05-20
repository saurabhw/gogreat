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
<link rel="shortcut icon" href="../../images/favicon.ico">

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
    <h3>Coffee Cafe Gifts</h3>
    <div class="productcol1">
      <div class="product">
        <a href="product.php?prodid=53&group=<?php echo $_GET['group']; ?>"><img src="../images/coffee_item1.jpg" /></a>
      </div>
      <p>Coffee Lovers Delight</p>
    </div>
    <div class="productcol1">
      <div class="product">
        <a href="product.php?prodid=54&group=<?php echo $_GET['group']; ?>"><img src="../images/coffee_item2.jpg" /></a>
      </div>
      <p>Rise &amp; Shine</p>
    </div>
    <div class="productcol1">
      <div class="product">
        <a href="product.php?prodid=55&group=<?php echo $_GET['group']; ?>"><img src="../images/coffee_item3.jpg" /></a>
      </div>
      <p>Coffee Comforts</p>
    </div>
    <div class="productcol1">
      <div class="product">
        <a href="product.php?prodid=56&group=<?php echo $_GET['group']; ?>"><img src="../images/coffee_item4.jpg" /></a>
      </div>
      <p>Coffee Connection</p>
    </div>
    
        <!-- Begin right side navigation-->
    <div class="rightnav">
      <h3 class="mallHeader">Coffee Cafe</h3>
      <div class="productmallLinks">
      <ul class="stumenu">
      <li><a href="coffeeCafe_giftProduct.php?group=<?php echo $_GET['group']; ?>">Coffee Cafe Gifts</a></li>
      <li><a href="coffeeCafe_expressProduct.php?group=<?php echo $_GET['group']; ?>">Express</a></li>
      <li><a href="coffeeCafe_ciderProduct.php?group=<?php echo $_GET['group']; ?>">Cider &amp; Cocoa Concoctions</a></li>
      <!-- <li><a href="coffeeCafe_proteinProduct.php?group=<?php echo $_GET['group']; ?>">Protein To-Go</a></li> -->
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
        <a href="product.php?prodid=57&group=<?php echo $_GET['group']; ?>"><img src="../images/coffee_item11.jpg" /></a>
      </div>
      <p>Jump Start Your Day</p>
    </div>
    <div class="productcol1">
      <div class="product">
        <a href="product.php?prodid=58&group=<?php echo $_GET['group']; ?>"><img src="../images/coffee_item12.jpg" /></a>
      </div>
      <p>Coffee Burst</p>
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