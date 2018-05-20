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
 
<link href="../css/leftSidebarNav.css" rel="stylesheet" type="text/css">
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
    <h3>The Candy Counter</h3>
    <div class="productcol1">
      <div class="product">
        <a href="product.php?prodid=81&group=<?php echo $groupID; ?>"><img src="../images/candy_item1.jpg" /></a>
      </div>
      <p>Treats &amp; Sweets</p>
    </div>
    <div class="productcol1">
      <div class="product">
        <a href="product.php?prodid=82&group=<?php echo $groupID; ?>"><img src="../images/candy_item2.jpg" /></a>
      </div>
      <p>Snack Attack</p>
    </div>
    <div class="productcol1">
      <div class="product">
        <a href="product.php?prodid=83&group=<?php echo $groupID; ?>"><img src="../images/candy_item3.jpg" /></a>
      </div>
      <p>Candy, Candy, Candy</p>
    </div>
    
        <!-- Begin right side navigation-->
    <div class="rightnav">
      <h3 class="mallHeader">Candyland</h3>
      <div class="productmallLinks">
      <ul class="stumenu">
      <li><a href="candyland_counterProduct.php?group=<?php echo $groupID; ?>">The Candy Counter</a></li>
      <!--<li><a href="candyland_healthyProduct.php?group=<?php echo $groupID; ?>">Healthy Treats &amp; Sweets</a></li> -->
      </ul>
      <br>
    </div>
    
    <h3 class="mallHeader">GreatMoods Mall Directory</h3>
    <div class="productmallLinks">
      <ul class="stumenu">
        <li><a href="coffeeCafe.php?group=<?php echo $groupID; ?>">Coffee Cafe</a></li>
        <li><a href="funFashion.php?group=<?php echo $groupID; ?>">Fun Fashion Boutique<a/></li>
        <li><a href="jewelryGlitz.php?group=<?php echo $groupID; ?>">Jewelry, Glitz &amp; Glamour Store</a></li>
        <li><a href="salonSpa.php?group=<?php echo $groupID; ?>">Luxury Salon &amp; Spa</a></li>
        <li><a href="sportsFitness.php?group=<?php echo $groupID; ?>">Varsity Sports &amp; Fitness</a></li>
        <li><a href="healthyHappy.php?group=<?php echo $groupID; ?>">The Healthy &amp; Happy Shop</a></li>
        <li><a href="funGames.php?group=<?php echo $groupID; ?>">Fun &amp; Games Family Shop</a></li>
        <li><a href="bananasZoo.php?group=<?php echo $groupID; ?>">Going Bananas Zoo</a></li>
        <li><a href="creativeKids.php?group=<?php echo $groupID; ?>">Creative Kids Multi-Media Center</a></li>
        <li><a href="cookieJar.php?group=<?php echo $groupID; ?>">Cookie Jar Bakery</a></li>
        <li><a href="chocolateFactory.php?group=<?php echo $groupID; ?>">The Chocolate Factory</a></li>
        <li><a href="candyland.php?group=<?php echo $groupID; ?>">Candyland</a></li>
        <li><a href="barneysPet.php?group=<?php echo $groupID; ?>">Barney's Pet Shop</a></li>
        <li><a href="holidayHome.php?group=<?php echo $groupID; ?>">The Holiday Home Store</a></li>
        <li><a href="santasWorkshop.php?group=<?php echo $groupID; ?>">Santa's Workshop</a></li>
        <li><a href="customerClient.php?group=<?php echo $groupID; ?>">Customer &amp; Client Concierge Club</a></li>
        <li><a href="carePackages.php?group=<?php echo $groupID; ?>">Care Packages with Love</a></li>
        <li><a href="sweetBoutique.php?group=<?php echo $groupID; ?>">Romantically Sweet Boutique</a></li>
        <li><a href="inspirational.php?group=<?php echo $groupID; ?>">Inspirational, Motivational<br>&amp; Success Treasures</a></li>
        <li><a href="hardyParty.php?group=<?php echo $groupID; ?>">Happy, Hardy-Party Superstore</a></li>
      </ul>
    </div>
    </div>
    <!--End Right Side Navigation-->                  
    
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