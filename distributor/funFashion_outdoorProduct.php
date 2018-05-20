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
  </ul>
</div> <!--end side navigation-->

  <div id="contentSample">
    <h3>Out & About</h3>
    <!-- First Row -->
    <div class="productcol1">
      <div class="product">
        <!-- Replace "fashion_item1.jpg" with appropriate image title -->
        <a href="product.php?prodid=112&group=<?php echo $_GET['group']; ?>"><img src="../images/fashion-outabout_item1.jpg" /></a>
      </div>
      <p></p>
    </div>
    <div class="productcol1">
      <div class="product">
        <a href="product.php?prodid=113&group=<?php echo $_GET['group']; ?>"><img src="../images/fashion-outabout_item2.jpg" /></a>
      </div>
      <p></p>
    </div>
    <div class="productcol1">
      <div class="product">
        <a href="product.php?prodid=114&group=<?php echo $_GET['group']; ?>"><img src="../images/fashion-outabout_item3.jpg" /></a>
      </div>
      <p></p>
    </div>
    <div class="productcol1">
      <div class="product">
        <a href="product.php?prodid=115&group=<?php echo $_GET['group']; ?>"><img src="../images/fashion-outabout_item4.jpg" /></a>
      </div>
      <p></p>
    </div>
    <!-- End First Row -->
    
    <!-- Begin right side navigation-->
    <div class="rightnav">
      <h3 class="mallHeader">Fun Fashion Boutique</h3>
      <div class="productmallLinks">
      <ul class="stumenu">
      <li><a href="funFashion_scarvesProduct.php?group=<?php echo $_GET['group']; ?>">Scarves, Scarves, Scarves</a></li>
      <!-- <li><a href="funFashion_fashionsetsProduct.php?group=<?php echo $_GET['group']; ?>">Fashion Sets</a></li> -->
      <!-- <li><a href="funFashion_wrapsProduct.php?group=<?php echo $_GET['group']; ?>">Wrapping Up for Comfort</a></li> -->
      <li><a href="funFashion_workProduct.php?group=<?php echo $_GET['group']; ?>">Designer Work Wear</a></li>
      <li><a href="funFashion_eveningProduct.php?group=<?php echo $_GET['group']; ?>">Evening Collections</a></li>
      <li><a href="funFashion_outdoorProduct.php?group=<?php echo $_GET['group']; ?>">Out &amp; About</a></li>
      <!-- <li><a href="funFashion_tiesProduct.php?group=<?php echo $_GET['group']; ?>">The Tie Rack</a></li> -->
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
    
    <!-- Second Row -->
    <!-- "productcol2" calls a clear to break into next row -->
    <div class="productcol2">
      <div class="product">
        <a href="product.php?prodid=116&group=<?php echo $_GET['group']; ?>"><img src="../images/fashion-outabout_item5.jpg" /></a>
      </div>
      <p></p>
    </div>
    <div class="productcol1">
      <div class="product">
        <a href="product.php?prodid=117&group=<?php echo $_GET['group']; ?>"><img src="../images/fashion-outabout_item6.jpg" /></a>
      </div>
      <p></p>
    </div>
    <div class="productcol1">
      <div class="product">
        <a href="product.php?prodid=118&group=<?php echo $_GET['group']; ?>"><img src="../images/fashion-outabout_item7.jpg" /></a>
      </div>
      <p></p>
    </div>
    <div class="productcol1">
      <div class="product">
        <a href="product.php?prodid=119&group=<?php echo $_GET['group']; ?>"><img src="../images/fashion-outabout_item8.jpg" /></a>
      </div>
      <p></p>
    </div>
    <!-- End Second Row -->
    
    <!-- Third Row -->
    <div class="productcol2">
      <div class="product">
        <a href="product.php?prodid=120&group=<?php echo $_GET['group']; ?>"><img src="../images/fashion-outabout_item9.jpg" /></a>
      </div>
      <p></p>
    </div>
    <div class="productcol1">
      <div class="product">
        <a href="product.php?prodid=121&group=<?php echo $_GET['group']; ?>"><img src="../images/fashion-outabout_item10.jpg" /></a>
      </div>
      <p></p>
    </div>
    <div class="productcol1">
      <div class="product">
        <a href="product.php?prodid=122&group=<?php echo $_GET['group']; ?>"><img src="../images/fashion-outabout_item11.jpg" /></a>
      </div>
      <p></p>
    </div>
    <div class="productcol1">
      <div class="product">
        <a href="product.php?prodid=123&group=<?php echo $_GET['group']; ?>"><img src="../images/fashion-outabout_item12.jpg" /></a>
      </div>
      <p></p>
    </div>
  <!-- End Third Row -->
  
  <!-- Fourth Row -->
    <div class="productcol2">
      <div class="product">
        <a href="product.php?prodid=124&group=<?php echo $_GET['group']; ?>"><img src="../images/fashion-outabout_item13.jpg" /></a>
      </div>
      <p></p>
    </div>
    <div class="productcol1">
      <div class="product">
        <a href="product.php?prodid=125&group=<?php echo $_GET['group']; ?>"><img src="../images/fashion-outabout_item14.jpg" /></a>
      </div>
      <p></p>
    </div>
    <div class="productcol1">
      <div class="product">
        <a href="product.php?prodid=127&group=<?php echo $_GET['group']; ?>"><img src="../images/fashion-outabout_item15.jpg" /></a>
      </div>
      <p></p>
    </div>
    <div class="productcol1">
      <div class="product">
        <a href="product.php?prodid=126&group=<?php echo $_GET['group']; ?>"><img src="../images/fashion-outabout_item16.jpg" /></a>
      </div>
      <p></p>
    </div>
  <!-- End Fourth Row -->
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