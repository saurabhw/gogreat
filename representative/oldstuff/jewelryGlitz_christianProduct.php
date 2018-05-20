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
    <h3>The Christian Corner</h3>
    <!-- First Row -->
    <div class="productcol1">
      <div class="product">
        <!-- Replace "fashion_item1.jpg" with appropriate image title -->
        <a href="product.php?prodid=180&group=<?php echo $_GET['group']; ?>"><img src="../images/jewelry-cc_item3.jpg" /></a>
      </div>
      <p></p>
    </div>
    <div class="productcol1">
      <div class="product">
        <a href="product.php?prodid=181&group=<?php echo $_GET['group']; ?>"><img src="../images/jewelry-cc_item2.jpg" /></a>
      </div>
      <p></p>
    </div>
    <div class="productcol1">
      <div class="product">
        <a href="product.php?prodid=182&group=<?php echo $_GET['group']; ?>"><img src="../images/jewelry-cc_item1.jpg" /></a>
      </div>
      <p></p>
    </div>
    <div class="productcol1">
      <div class="product">
        <a href="product.php?prodid=183&group=<?php echo $_GET['group']; ?>"><img src="../images/jewelry-cc_item4.jpg" /></a>
      </div>
      <p></p>
    </div>
    <!-- End First Row -->
    
            <!-- Begin right side navigation-->
    <div class="rightnav">
      <h3 class="mallHeader">Jewelry<br>Glitz &amp; Glamour Store</h3>
      <div class="productmallLinks">
      <ul class="stumenu">
      <li><a href="jewelryGlitz_setProduct.php?group=<?php echo $_GET['group']; ?>">Necklace &amp; Earring Sets</a></li>
      <!-- <li><a href="jewelryGlitz_necklacesProduct.php?group=<?php echo $_GET['group']; ?>">Necklaces</a></li> -->
      <li><a href="jewelryGlitz_braceletsProduct.php?group=<?php echo $_GET['group']; ?>">Bracelets</a></li>
      <!-- <li><a href="jewelryGlitz_earringsProduct.php?group=<?php echo $_GET['group']; ?>">Earrings</a></li> -->
      <!-- <li><a href="jewelryGlitz_fashionsetsProduct.php?group=<?php echo $_GET['group']; ?>">Fashion Sets</a></li> -->
      <li><a href="jewelryGlitz_christianProduct.php?group=<?php echo $_GET['group']; ?>">Christian Corner</a></li>
      <!-- <li><a href="jewelryGlitz_holidayProduct.php?group=<?php echo $_GET['group']; ?>">Holiday Flair</a></li> -->
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
        <a href="product.php?prodid=184&group=<?php echo $_GET['group']; ?>"><img src="../images/jewelry-cc_item5.jpg" /></a>
      </div>
      <p></p>
    </div>
    <div class="productcol1">
      <div class="product">
        <a href="product.php?prodid=185&group=<?php echo $_GET['group']; ?>"><img src="../images/jewelry-cc_item6.jpg" /></a>
      </div>
      <p></p>
    </div>
        <div class="productcol1">
      <div class="product">
        <a href="product.php?prodid=186&group=<?php echo $_GET['group']; ?>"><img src="../images/jewelry-cc_item7.jpg" /></a>
      </div>
      <p></p>
    </div>
        <div class="productcol1">
      <div class="product">
        <a href="product.php?prodid=187&group=<?php echo $_GET['group']; ?>"><img src="../images/jewelry-cc_item8.jpg" /></a>
      </div>
      <p></p>
    </div>
    <!-- End Second Row -->
    
   <!-- Third Row -->
    <!-- "productcol2" calls a clear to break into next row -->
   <div class="productcol2">
      <div class="product">
        <a href="product.php?prodid=188&group=<?php echo $_GET['group']; ?>"><img src="../images/jewelry-cc_item9.jpg" /></a>
      </div>
      <p></p>
    </div>
    <div class="productcol1">
      <div class="product">
        <a href="product.php?prodid=189&group=<?php echo $_GET['group']; ?>"><img src="../images/jewelry-cc_item10.jpg" /></a>
      </div>
      <p></p>
    </div>
        <div class="productcol1">
      <div class="product">
        <a href="product.php?prodid=190&group=<?php echo $_GET['group']; ?>"><img src="../images/jewelry-cc_item11.jpg" /></a>
      </div>
      <p></p>
    </div>
        <div class="productcol1">
      <div class="product">
        <a href="product.php?prodid=191&group=<?php echo $_GET['group']; ?>"><img src="../images/jewelry-cc_item12.jpg" /></a>
      </div>
      <p></p>
    </div>
    <!-- End Third Row -->
    
    <!-- Fourth Row -->
    <!-- "productcol2" calls a clear to break into next row -->
   <div class="productcol2">
      <div class="product">
        <a href="product.php?prodid=192&group=<?php echo $_GET['group']; ?>"><img src="../images/jewelry-cc_item13.jpg" /></a>
      </div>
      <p></p>
    </div>
    <!-- End Fourth Row -->
  </div>  <!--end content-->
  
  <div class="clearfloat">  </div>
  <?php include 'footer.php' ; ?>
</div><!--end container-->
</body>
</html>
<?php
   ob_end_flush();
?>