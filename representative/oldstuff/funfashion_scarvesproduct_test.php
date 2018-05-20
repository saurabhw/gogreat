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
<?$groupID = $_GET['group'];?>
<!DOCTYPE html>
<html>
<head>
<title>GreatMoods | Organization Website</title>
<link href="css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
<link href="css/headerSampleWebsiteStyles.css" rel="stylesheet" type="text/css">
<!--
  jQuery library
-->
<script type="text/javascript" src="jquery/jquery-1.9.1.min.js"></script>
<!--
  jCarousel library
-->
<script type="text/javascript" src="jquery/jquery.jcarousel.min.js"></script>
<!--
  jCarousel skin stylesheet
-->
<link rel="stylesheet" type="text/css" href="css/skin.css" />

<script src="js/jquery.js" type="text/javascript" charset="utf-8"></script>
<script src="js/jquery.tabify.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
  // <![CDATA[
        
  $(document).ready(function () {
    $('#menudetails').tabify();
  });
          
  // ]]>
</script>

<script type="text/javascript">
jQuery(document).ready(function() {
    jQuery('#mycarousel').jcarousel({
        vertical: true,
        scroll: 2
    });
});
</script>

</head>
<body>
<div id="container">
  <div id="headerMain"> <img id="banner" src="<?php echo $banner_path;?>" width="1024" height="150" alt="banner placeholder" />
    <div id="menuWrapper"> </div>
    <!--end menuWrapper-->
    
    <?php include 'includes/loginNav.php'; ?>
    <div id="mainNav">
      <ul id="menu">
        <li><a href="index.php">GreatMoods<br>Homepage</a></li>
        <li><a href="" class="drop">Fundraising<br>Examples</a>
          <?php include 'includes/menu_fundraising_examples.php'; ?>
        <li><a href="" class="drop">GreatMoods<br>Mall Directory</a>
          <?php include 'includes/menu_mall_directory.php'; ?>
        <!-- <li><a href="basketsproducts.php">Gift Baskets<br>& Products</a></li> -->
        <!--<li><a href="fundgettingstarted.php?group=<?php echo $_GET['group']; ?>">Getting<br>Started</a></li>-->
       <?if($_SESSION['LOGIN'] == "TRUE"){ echo '<li><a href="'.$_SESSION['home'].'" />My Account</a></li>';}?>
        <!--<li><a href="fundhelp.php?group=<?php echo $_GET['group']; ?>">Help</a></li>-->
      </ul> <!--end menu-->
    </div> <!--end mainNav--> 
  </div> <!--end headerMain-->
  <link href="css/leftSidebarNav.css" rel="stylesheet" type="text/css">

<div id="leftSideBarSample">
  <img src="<?php echo $contact_photo;?>" width="128" height="150" alt="student photo">
  <ul id="sideNavSample">
    <!-- *********************************************** -->
    <!-- *********************************************** -->
    <!-- [Student Name]'s [Title of Club/Org] Fundraiser -->
    <!-- *********************************************** -->
    <!-- *********************************************** -->
    <li class="stuname"><?php echo $student_name; ?></li>
    <li class="stylized"><?php echo $title; ?> Fundraiser</li>
    <hr>
    <li class="red">GreatMoods<br>Mall Directory</li>
    <hr>
    <li><a href="coffeeCafe.php?group=<?php echo $_GET['group']; ?>">Coffee Cafe</a></li>
    <li><a href="funFashion.php?group=<?php echo $_GET['group']; ?>">Fun Fashion Boutique<a/></li>
    <li><a href="jewelryGlitz.php?group=<?php echo $_GET['group']; ?>">Jewelry, Glitz<br>&amp; Glamour Store</a></li>
    <li><a href="salonSpa.php?group=<?php echo $_GET['group']; ?>">Luxury Salon &amp; Spa</a></li>
    <li><a href="sportsFitness.php?group=<?php echo $_GET['group']; ?>">Varsity Sports<br>&amp; Fitness</a></li>
    <li><a href="healthyHappy.php?group=<?php echo $_GET['group']; ?>">The Healthy &amp; Happy Shop</a></li>
    <li><a href="funGames.php?group=<?php echo $_GET['group']; ?>">Fun &amp; Games Family Shop</a></li>
    <li><a href="bananasZoo.php?group=<?php echo $_GET['group']; ?>">Going<br>Bananas Zoo</a></li>
    <li><a href="creativeKids.php?group=<?php echo $_GET['group']; ?>">Creative Kids<br>Multi-Media Center</a></li>
    <li><a href="cookieJar.php?group=<?php echo $_GET['group']; ?>">Cookie Jar Bakery</a></li>
    <li><a href="chocolateFactory.php?group=<?php echo $_GET['group']; ?>">The Chocolate Factory</a></li>
    <li><a href="candyland.php?group=<?php echo $_GET['group']; ?>">Candyland</a></li>
    <li><a href="barneysPet.php?group=<?php echo $_GET['group']; ?>">Barney's Pet Shop</a></li>
    <li><a href="holidayHome.php?group=<?php echo $_GET['group']; ?>">The Holiday<br>Home Store</a></li>
    <li><a href="santasWorkshop.php?group=<?php echo $_GET['group']; ?>">Santa's Workshop</a></li>
    <li><a href="customerClient.php?group=<?php echo $_GET['group']; ?>">Customer &amp; Client Concierge Club</a></li>
    <li><a href="carePackages.php?group=<?php echo $_GET['group']; ?>">Care Packages with Love</a></li>
    <li><a href="sweetBoutique.php?group=<?php echo $_GET['group']; ?>">Romantically<br>Sweet Boutique</a></li>
    <li><a href="inspirational.php?group=<?php echo $_GET['group']; ?>">Inspirational, Motivational &amp; Success Treasures</a></li>
    <li><a href="hardyParty.php?group=<?php echo $_GET['group']; ?>">Happy, Hardy-Party Superstore</a></li>
  </ul>

</div>

    <!-- Content -->
    <div class="contentp">
      <div class="productImage">
        <img src="images/fashion-evening_item5_lg.jpg" alt="product" />
      </div>
      <div class="slidecol1">
        <img src="images/Lslider.jpg" alt="product slider" />
        <!-- <div class="slider">
          <ul id="mycarousel" class="jcarousel-skin-tango">
            <li><img src="images/image.jpg" alt="" /></li>
            <li><img src="images/image.jpg" alt="" /></li>
            <li><img src="images/image.jpg" alt="" /></li>
            <li><img src="images/image.jpg" alt="" /></li>
            <li><img src="images/image.jpg" alt="" /></li>
            <li><img src="images/image.jpg" alt="" /></li>
            <li><img src="images/image.jpg" alt="" /></li>
            <li><img src="images/image.jpg" alt="" /></li>
            <li><img src="images/image.jpg" alt="" /></li>
            <li><img src="images/image.jpg" alt="" /></li>
            <li><img src="images/image.jpg" alt="" /></li>
            <li><img src="images/image.jpg" alt="" /></li>
            <li><img src="images/image.jpg" alt="" /></li>
            <li><img src="images/image.jpg" alt="" /></li>
            <li><img src="images/image.jpg" alt="" /></li>
            <li><img src="images/image.jpg" alt="" /></li>
            <li><img src="images/image.jpg" alt="" /></li>
            <li><img src="images/image.jpg" alt="" /></li>
            <li><img src="images/image.jpg" alt="" /></li>
            <li><img src="images/image.jpg" alt="" /></li>
          </ul>
        </div> -->
      </div>
      <div class="slidecol2">
        <img src="images/Rslider.jpg" alt="product slider" />
        <!-- <div class="slider">
          <ul id="mycarousel" class="jcarousel-skin-tango">
            <li><img src="images/image.jpg" alt="" /></li>
            <li><img src="images/image.jpg" alt="" /></li>
            <li><img src="images/image.jpg" alt="" /></li>
            <li><img src="images/image.jpg" alt="" /></li>
            <li><img src="images/image.jpg" alt="" /></li>
            <li><img src="images/image.jpg" alt="" /></li>
            <li><img src="images/image.jpg" alt="" /></li>
            <li><img src="images/image.jpg" alt="" /></li>
            <li><img src="images/image.jpg" alt="" /></li>
            <li><img src="images/image.jpg" alt="" /></li>
            <li><img src="images/image.jpg" alt="" /></li>
            <li><img src="images/image.jpg" alt="" /></li>
            <li><img src="images/image.jpg" alt="" /></li>
            <li><img src="images/image.jpg" alt="" /></li>
            <li><img src="images/image.jpg" alt="" /></li>
            <li><img src="images/image.jpg" alt="" /></li>
            <li><img src="images/image.jpg" alt="" /></li>
            <li><img src="images/image.jpg" alt="" /></li>
            <li><img src="images/image.jpg" alt="" /></li>
            <li><img src="images/image.jpg" alt="" /></li>
          </ul>
        </div> -->
      </div>
      <div class="thumbnails">
        <img src="images/small.png" alt="Thumbnail of Product">
        <img src="images/small.png" alt="Thumbnail of Product">
        <img src="images/small.png" alt="Thumbnail of Product">
        <p>Qty: </p><input class="quantity" type="text" name="Quantity">
      </div>
      <div class="button1">
        <img src="images/button.jpg" alt="Placeholder Button" />
      </div>
      <div class="button2">
        <img src="images/button2.jpg" alt="Placeholder Button2" />
      </div>
      <div class="summary">
        <img src="images/summary.jpg" alt="summary screen" />
      </div>    
    </div>
      <ul id="menudetails">
        <li class="active"><a href="#tab1">Build Your Own Gift</a></li>
        <li><a href="#tab2">Description</a></li>
        <li><a href="#tab3">What's Inside</a></li>
        <li><a href="#tab4">Shipping</a></li>
      </ul>
      <div class="tab" id="tab1">Summary of Your Gift Items Below:
      Summary of Your Gift Items Below:Summary of Your Gift Items Below:Summary of Your Gift Items Below:Summary of Your Gift Items Below:Summary of Your Gift Items Below:Summary of Your Gift Items Below:Summary of Your Gift Items Below:</div>
      <div class="tab" id="tab2">Description:Summary of Your Gift Items Below:Summary of Your Gift Items Below:Summary of Your Gift Items Below:Summary of Your Gift Items Below:Summary of Your Gift Items Below:</div>
      <div class="tab" id="tab3">What's Inside:Summary of Your Gift Items Below:Summary of Your Gift Items Below:Summary of Your Gift Items Below:Summary of Your Gift Items Below:Summary of Your Gift Items Below:Summary of Your Gift Items Below:</div>
      <div class="tab" id="tab4">Shipping:Summary of Your Gift Items Below:Summary of Your Gift Items Below:Summary of Your Gift Items Below:</div>
    <!-- End Content-->
    <?php include 'footer.php' ; ?>
  </div>
  <!-- End Container-->

</body>
</html>
<?php
ob_end_flush();
?>