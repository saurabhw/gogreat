<?php
      session_start();
      ob_start();
      define("SITE_ROOT",$_SERVER["DOCUMENT_ROOT"].'/salesTest/');
      include("includes/connection.inc.php");
      $link = connectTo();
      
      $groupID = $_GET['group'];
      $productid = $_GET['prodid'];
$table = "products";
$table1 = "orgContacts";
$table2 = "gift_list";
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
$return_cancel = 'http://www.greatmoods.com/product.php?prodid='.$productid.'&groupid='.$groupid;

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
      $queryx = "SELECT * FROM $table1 WHERE fundraiserID = $groupID";
      $resultx = mysqli_query($link, $queryx) or die(mysqli_error());
     
?>

<!DOCTYPE html>
<html>
<head>
<title>GreatMoods | Organization Website</title>
<link href="css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
<link href="css/headerSampleWebsiteStyles.css" rel="stylesheet" type="text/css">

<!--  jQuery library-->
<script type="text/javascript" src="jquery/jquery-1.9.1.min.js"></script>
<!--  jCarousel library-->
<script type="text/javascript" src="jquery/jquery.jcarousel.min.js"></script>
<!--  jCarousel skin stylesheet-->
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
        <!--<li><a href="fundgettingstarted.php?group=<?php echo $groupID; ?>">Getting<br>Started</a></li>-->
       <?if($_SESSION['LOGIN'] == "TRUE"){ echo '<li><a href="'.$_SESSION['home'].'" />My Account</a></li>';}?>
        <!--<li><a href="fundhelp.php?group=<?php echo $groupID; ?>">Help</a></li>-->
      </ul> <!--end menu-->
    </div> <!--end mainNav--> 
  </div> <!--end headerMain-->
  <link href="css/leftSidebarNav.css" rel="stylesheet" type="text/css">
<?
while ($row = mysqli_fetch_assoc($resultx)){
              
              echo '<tr>
                  <td>'.$row['orgFName'].'</td>
                  <td>'.$row['orgLName'].'</td>
                  <td>'.$row['Title'].'</td>
                  <td>'.$row['orgEmail'].'</td>
                  <td>'.$row['orgPhone'].'</td>
                  <td></td>
                  
                  <td>
                   <form action="" method="post">
                     <input type="hidden" name="delete_id" value="'.$row['orgContactID'].'" />
                     <input id="dhbutton" type="submit" name="delete" value="Delete" />
                  
                  </td>
                  </form>
                  </tr>';
                  
	   }// end while
?>
<div id="leftSideBarSample">
  <img src="<?php echo $contact_photo;?>" width="128" height="150" alt="student photo">
  <ul id="sideNavSample">
    <li class="stuname"><?php echo $student_name; ?></li>
    <li class="stylized"><?php echo $title; ?> Fundraiser</li>
    <hr>
   <?
     if(isset($_SESSION['authenticated'])&& $_SESSION['role'] == "Member" )
        {
          echo '
          <li><a href="fundMember/memberHome.php">My Account</a></li>
          ';
        } 
     ?>   
      <li><a href="club_website_TQ.php?group=<?php echo $groupID; ?>"><em>Fundraiser <br />Homepage</em></a></li>
      <li>About Our Fundraiser</li>
      <li>GreatMoods<br>Mall Directory</li>
      <li>Fundraising Contacts</li>
      <li>Getting Started<br>Training Tips,<br>Tools &amp; Forms</li>
      <li>Contact Me</li>
    
    <hr>
    <li class="red">GreatMoods<br>Mall Directory</li>
    <hr>
    <!--***Turn into dropdown***-->
    <!--<li><a href="coffeeCafe.php">Coffee Cafe</a></li>
    <li><a href="funFashion.php?group=<?php echo $groupID; ?>">Fun Fashion Boutique<a/></li>
    <li><a href="jewelryGlitz.php?group=<?php echo $groupID; ?>">Jewelry, Glitz<br>&amp; Glamour Store</a></li>
    <li><a href="salonSpa.php?group=<?php echo $groupID; ?>">Luxury Salon &amp; Spa</a></li>
    <li><a href="sportsFitness.php?group=<?php echo $groupID; ?>">Varsity Sports<br>&amp; Fitness</a></li>
    <li><a href="healthyHappy.php?group=<?php echo $groupID; ?>">The Healthy &amp; Happy Shop</a></li>
    <li><a href="funGames.php?group=<?php echo $groupID; ?>">Fun &amp; Games Family Shop</a></li>
    <li><a href="bananasZoo.php?group=<?php echo $groupID; ?>">Going<br>Bananas Zoo</a></li>
    <li><a href="creativeKids.php?group=<?php echo $groupID; ?>">Creative Kids<br>Multi-Media Center</a></li>
    <li><a href="cookieJar.php?group=<?php echo $groupID; ?>">Cookie Jar Bakery</a></li>
    <li><a href="chocolateFactory.php?group=<?php echo $groupID; ?>">The Chocolate Factory</a></li>
    <li><a href="candyland.php?group=<?php echo $groupID; ?>">Candyland</a></li>
    <li><a href="barneysPet.php?group=<?php echo $groupID; ?>">Barney's Pet Shop</a></li>
    <li><a href="holidayHome.php?group=<?php echo $groupID; ?>">The Holiday<br>Home Store</a></li>
    <li><a href="santasWorkshop.php?group=<?php echo $groupID; ?>">Santa's Workshop</a></li>
    <li><a href="customerClient.php?group=<?php echo $groupID; ?>">Customer &amp; Client Concierge Club</a></li>
    <li><a href="carePackages.php?group=<?php echo $groupID; ?>">Care Packages with Love</a></li>
    <li><a href="sweetBoutique.php?group=<?php echo $groupID; ?>">Romantically<br>Sweet Boutique</a></li>
    <li><a href="inspirational.php?group=<?php echo $groupID; ?>">Inspirational, Motivational &amp; Success Treasures</a></li>
    <li><a href="hardyParty.php?group=<?php echo $groupID; ?>">Happy, Hardy-Party Superstore</a></li>-->
  </ul>

</div>

    <!-- Content -->
    <div class="contentp">
    	<h1><?php echo $productName; ?></h1>
    	
      <div class="productImage">
        <img src="<?php echo $productLrgPicPath;?>" alt="product photo" />
      </div>
         
      <div class="slidecol1">
        <!--<img src="images/Lslider.jpg" alt="product slider" />
         <div class="slider">
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
        </div>-->
      </div>
      <div class="slidecol2">
        <!--<img src="images/Rslider.jpg" alt="product slider" />
         <div class="slider">
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
        </div>-->
      </div>
     
     <!-- ***************************** -->
     <!-- ***Placeholder For Sliders*** -->
     <!-- ***************************** -->
    <!-- Begin right side navigation-->
    <div class="rightnav_placeholder">
    <h3 class="mallHeader">GreatMoods Mall Directory</h3>
    <div class="productmallLinks_placeholder">
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
        <li><a href="#tab3">What's Inside</a></li>
        <li><a href="#tab4">Shipping</a></li>
      </ul>
      
      <div class="tab" id="tab1">Gift Items Below:<br><br><br><br><br></div>
      
      <div class="tab" id="tab2">Description:<br><br><br><br><br></div>
      
      <div class="tab" id="tab3">What's Inside:<br><br><br><br><br></div>
      
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