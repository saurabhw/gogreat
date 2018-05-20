<?php
      session_start();
      ob_start();
      define("SITE_ROOT",$_SERVER["DOCUMENT_ROOT"].'/salesTest/');
      include("includes/connection.inc.php");
      $link = connectTo();
      
      $groupID = $_GET['group'];
      $productid = $_GET['prodid'];
	$table = "products";
	$query = "SELECT * FROM $table WHERE productID = $productid";
	$result = mysqli_query($link, $query) or die(mysqli_error());
	$row_count = mysqli_num_rows($result);
	$banner = $_SESSION['banner'];
	
	$row = mysqli_fetch_assoc($result);
	$productName = $row['productName'];
	$productID = $row['productID'];
	$description = $row['description'];
	$Contents = $row['Contents'];
	$retailPrice = $row['retailPrice'];
	$wholesalePrice = $row['wholesalePrice'];
	$dimensions = $row['dimensions'];
	$weight_lbs = $row['weight_lbs'];
	$productLrgPicPath = $row['productLrgPicPath'];
	
	$query2 = "SELECT * FROM Dealers WHERE loginid = '$groupid'";
	$result2 = mysqli_query($link, $query2) or die(mysqli_error());
	$row1 = mysqli_fetch_assoc($result2);
	$setup_person = $row1['setuppersonid'];
	
	$repNum = $setup_person;
	$return_cancel = 'http://www.greatmoods.com/product.php?prodid='.$productid.'&group='.$groupID;

      $table1 = "sample_websites";
      $query = "SELECT * FROM $table1 WHERE samplewebID = $groupID";
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
<title>Product | GreatMoods</title>
<link href="css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/header_styles.css">
<link rel="stylesheet" type="text/css" href="css/skin2.css" />

<script>
$(document).ready(function() {
$(“.nav li:has(ul)”).hover(function(){
$(this).find(“ul”).slideDown();
}, function(){
$(this).find(“ul”).hide();
});
});
</script>

<!--  jQuery library-->
<script type="text/javascript" src="jquery/jquery-1.9.1.min.js"></script>
<!--  jCarousel library-->
<script type="text/javascript" src="jquery/jquery.jcarousel.min.js"></script>
<!--  jCarousel skin stylesheet-->

<!--<script src="js/jquery.js" type="text/javascript" charset="utf-8"></script>-->
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
    jQuery('#second-carousel').jcarousel({
        vertical: true,
        scroll: 2
    });
	jQuery('#third-carousel').jcarousel({
        vertical: true,
        scroll: 2
    });
});
</script>

</head>
<body>
<div id="container">
<?php include 'includes/header_sample.php'; ?>
<?php include 'navigation/leftSidebarSampleStores.php'; ?>

    <!-- Content -->
    <div class="contentp">
    	<h1><?php echo $productName; ?></h1>
    	
      <div class="productImage">
        <img src="<?php echo $productLrgPicPath;?>" alt="product photo" />
      </div>
       
        
      <div class="slidecol1_placeholder">
      	<br><br><br><br><br><br><br><br><br><br> <!-- **stand in for slider** -->
         <div class="slider2">
  		<!--<ul id="second-carousel" class="jcarousel-skin-tango">
              <li><img src="http://static.flickr.com/66/199481236_dc98b5abb3_s.jpg" width="75" height="75" alt="" /></li>
              <li><img src="http://static.flickr.com/75/199481072_b4a0d09597_s.jpg" width="75" height="75" alt="" /></li>
              <li><img src="http://static.flickr.com/57/199481087_33ae73a8de_s.jpg" width="75" height="75" alt="" /></li>
              <li><img src="http://static.flickr.com/77/199481108_4359e6b971_s.jpg" width="75" height="75" alt="" /></li>
              <li><img src="http://static.flickr.com/58/199481143_3c148d9dd3_s.jpg" width="75" height="75" alt="" /></li>
              <li><img src="http://static.flickr.com/72/199481203_ad4cdcf109_s.jpg" width="75" height="75" alt="" /></li>
              <li><img src="http://static.flickr.com/58/199481218_264ce20da0_s.jpg" width="75" height="75" alt="" /></li>
              <li><img src="http://static.flickr.com/69/199481255_fdfe885f87_s.jpg" width="75" height="75" alt="" /></li>
              <li><img src="http://static.flickr.com/60/199480111_87d4cb3e38_s.jpg" width="75" height="75" alt="" /></li>
              <li><img src="http://static.flickr.com/70/229228324_08223b70fa_s.jpg" width="75" height="75" alt="" /></li>
  		</ul>-->
        </div>
      </div>
      <div class="slidecol2_placeholder">
      <br><br><br><br><br><br><br><br><br><br> <!-- **stand in for slider** -->
         <div class="slider3">
  		<!--<ul id="third-carousel" class="jcarousel-skin-tango">
              <li><img src="http://static.flickr.com/66/199481236_dc98b5abb3_s.jpg" width="75" height="75" alt="" /></li>
              <li><img src="http://static.flickr.com/75/199481072_b4a0d09597_s.jpg" width="75" height="75" alt="" /></li>
              <li><img src="http://static.flickr.com/57/199481087_33ae73a8de_s.jpg" width="75" height="75" alt="" /></li>
              <li><img src="http://static.flickr.com/77/199481108_4359e6b971_s.jpg" width="75" height="75" alt="" /></li>
              <li><img src="http://static.flickr.com/58/199481143_3c148d9dd3_s.jpg" width="75" height="75" alt="" /></li>
              <li><img src="http://static.flickr.com/72/199481203_ad4cdcf109_s.jpg" width="75" height="75" alt="" /></li>
              <li><img src="http://static.flickr.com/58/199481218_264ce20da0_s.jpg" width="75" height="75" alt="" /></li>
              <li><img src="http://static.flickr.com/69/199481255_fdfe885f87_s.jpg" width="75" height="75" alt="" /></li>
              <li><img src="http://static.flickr.com/60/199480111_87d4cb3e38_s.jpg" width="75" height="75" alt="" /></li>
              <li><img src="http://static.flickr.com/70/229228324_08223b70fa_s.jpg" width="75" height="75" alt="" /></li>
  		</ul>-->
        </div>
      </div>
     
     <!-- ***************************** -->
     <!-- ***Placeholder For Sliders*** -->
     <!-- ***************************** -->
    <!-- Begin right side navigation-->
    <div class="rightnav_placeholder">
    <h3 class="mallHeader">GreatMoods Mall Directory</h3>
    <div class="productmallLinks_placeholder">
      <ul class="stumenu">
	<?php include 'includes/mall_directory_sample.php'; ?>
      </ul>
    </div>
    </div>
    <!--End Right Side Navigation-->    

      <!-- ********************************** -->
      <!--***Add in thumbnail images later***-->
      <!-- ********************************** -->
      <div class="thumbnails">
        <!--<img src="images/small.png" alt="Thumbnail of Product">
        <img src="images/small.png" alt="Thumbnail of Product">
        <img src="images/small.png" alt="Thumbnail of Product">-->

        <p>Qty: <input id="quantity" type="text" name="quantity" size="3" value="1"></p>
        
        <div class="button1">
        <img src="https://www.paypalobjects.com/en_US/i/btn/btn_cart_LG.gif" border="0" name="submit" align="top" alt="Make payments with PayPal - it's fast, free and secure!">
      </div>
      
       <div class="button2"><h5>Price: $<?php echo $retailPrice; ?></h5></div>
      </div>
              
      <!--<div class="button2">
        <img src="images/button2.jpg" alt="Placeholder Button2" />
      </div>-->
      
      <div class="summary">
        <!--<img src="images/summary.jpg" alt="summary screen" />-->
      </div>    
    
      <ul id="menudetails">
        <li class="active"><a href="#tab1">Gift List</a></li>
        <li><a href="#tab2">Description</a></li>
        <!--<li><a href="#tab3">What's Inside</a></li>-->
        <li><a href="#tab4">Shipping</a></li>
      </ul>
      
      <div class="tab" id="tab1"><?php echo $student_name; ?>'s Gift Items Below:<br><img src="images/sample_giftlist.PNG" alt="Sample Gift List"/><br>
      <div><a href="samplecheckout.php?prodid=<?php echo $productid; ?>&group=<?php echo $_GET['group']; ?>"><input type="button" value="Checkout"/></a></div>
      </div>
      
      <div class="tab" id="tab2">Description:<br><br><br><br><br></div>
      
      <!--<div class="tab" id="tab3">What's Inside:<br><br><br><br><br></div>-->
      
      <div class="tab" id="tab4">Shipping:<br><br><br><br><br></div>
     
</div><!-- End Content-->
<div class="clearfloat"><br></div>

<?php include 'footer.php' ; ?>
</div>  <!-- End Container-->

</body>
</html>
<?php
ob_end_flush();
?>