<?php 
      include_once('jcart-1.3/jcart/jcart.php');
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
	$return_cancel = "http://www.greatmoods.com/product_site.php?prodid=$productid&group=$groupID";

     $table = "Dealers";
      $query1 = "SELECT * FROM $table WHERE loginid = $groupID";
      $result1 = mysqli_query($link, $query1) or die("couldn't execute query 1.".mysqli_error($link));
      $row = mysqli_fetch_assoc($result1);
      $club_name = $row['Dealer'];
      $club_type = $row['DealerDir'];
      $goal = $row['FundraiserGoal'];
      $reasons = $row['FundraiserReasons'];
      $about = $row['About'];
      $so_far = '0';
      //$position = $row['samplePosition'];
      //$leader = $row['sampleFname'].' '.$row['sampleLname'];
      $phone = $row['Phone'];
      $email = $row['email'];
      //$contact_photo = $row['contact_group_photo'];
      $group_photo = $row['group_team_pic'];
      $leader_photo = $row['leader_pic'];
      $student_photo = $row['location_pic'];
      $location_pic = $row['location_pic'];
      $contact_pic = $row['contact_pic'];
      $banner_path = $row['banner_path'];
      $_SESSION['banner'] = $banner_path;
      $setup_person = $row['setuppersonid'];
      $face = $row['facebook'];
      $twit = $row['twitter'];
      
      $query_e = "SELECT SUM(Amount) FROM IPNdata WHERE Rep='$groupID'";
      $result_e = mysqli_query($link, $query_e)or die ("couldn't execute ytd query.".mysql_error());
      $row_e = mysqli_fetch_array($result_e);
      $amount = $row_e['SUM(Amount)'];
      
      $query2 = "SELECT * FROM orgContacts WHERE fundraiserID = $groupID";
      $result2 = mysqli_query($link, $query2) or die("couldn't execute query 2.".mysqli_error($link));
      $row2 = mysqli_fetch_assoc($result2);
      $leader = $row2['orgFName'].' '.$row2['orgLName'];
      $leader_title = $row2['Title'];
      $leader_email = $row2['orgEmail'];
      $leader_phone = $row2['orgPhone'];
      $fundraiserid = $_SESSION['userId'];
      
        $cap = "Select * FROM captions WHERE fundid = '$groupID'";
        $cap_result = mysqli_query($link, $cap)or die ("couldn't execute captions query.".mysql_error());
        $cr = mysqli_fetch_assoc($cap_result);
        $a1 = $cr['c1'];
        $a1n = $cr['c1n'];
        $a2 = $cr['c2'];
        $a2n = $cr['c2n'];   
        $a3 = $cr['c3'];
        $a3n = $cr['c3n'];   
        $a4 = $cr['c4'];
        $a4n = $cr['c4n'];  
        
      $query3 = "SELECT * FROM orgMembers WHERE fundraiserID = '$groupID'";
      $result3 = mysqli_query($link, $query3) or die(mysqli_error());
      $row3 = mysqli_fetch_assoc($result3);
      $owner = $row3['orgFName'].' '.$row3['orgLName'];
      $owner_email = $row3['orgEmail'];
      $owner_phone = $row3['orgPhone'];  
     
?>
<?$groupID = $_GET['group'];?>
<!DOCTYPE html>
<html>
<head>
<title>GreatMoods | Organization Website</title>
<link href="css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
<link href="css/headerSampleWebsiteStyles.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" media="screen, projection" href="style.css" />

		<link rel="stylesheet" type="text/css" media="screen, projection" href="jcart-1.3/jcart/css/jcart.css" />

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
          <?php include 'includes/menu_mall_directory_site.php'; ?>
        <!-- <li><a href="basketsproducts.php">Gift Baskets<br>& Products</a></li> -->
        <!--<li><a href="fundgettingstarted.php?group=<?php echo $_GET['group']; ?>">Getting<br>Started</a></li>-->
 <?if($_SESSION['LOGIN'] == "TRUE"){ echo '<li><a href="'.$_SESSION['home'].'" />My Account</a></li>';}?>
        <!--<li><a href="fundhelp.php?group=<?php echo $_GET['group']; ?>">Help</a></li>-->
      </ul> <!--end menu-->
    </div> <!--end mainNav--> 
  </div> <!--end headerMain-->
  <link href="css/leftSidebarNav.css" rel="stylesheet" type="text/css">

<div id="leftSideBarSample">
  <img src="<?php echo $contact_pic;?>" width="128" height="150" alt="student photo">
  <ul id="sideNavSample">
    <li class="stuname"><?php echo $owner; ?></li>
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
      <li><a href="membersite.php?group=<?php echo $_GET['group']; ?>"><em>Fundraiser <br />Homepage</em></a></li>
      <li>About Our Fundraiser</li>
      <li>GreatMoods<br>Mall Directory</li>
      <li>Fundraising Contacts</li>
      <li>Getting Started<br>Training Tips,<br>Tools &amp; Forms</li>
      <li>Contact Me</li>
    
    <hr>
    <!--***Turn into dropdown***-->
    <!--<li><a href="coffeeCafe.php">Coffee Cafe</a></li>
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
    <li><a href="hardyParty.php?group=<?php echo $_GET['group']; ?>">Happy, Hardy-Party Superstore</a></li>-->
  </ul>

</div>

    <!-- Content -->
    <div class="contentp">
    	<h1><?php echo $productName; ?></h1>
    	
      <div class="productImage">
        <img src="<?php echo $productLrgPicPath;?>" alt="product photo" />
         <form method="post" action="" class="jcart">
						<input type="hidden" name="jcartToken" value="<?php echo $_SESSION['jcartToken'];?>" />
						<input type="hidden" name="my-item-id" value="<?php echo $productID; ?>" />
						<input type="hidden" name="my-item-name" value="<?php echo $productName; ?>" />
						<input type="hidden" name="my-item-price" value="<?php echo $retailPrice; ?>" />
						<input type="hidden" name="my-item-url" value="" />
						<?php echo'$'; echo $retailPrice; ?>
						<label>Qty: <input type="text" name="my-item-qty" value="1" size="3" /></label>
					<input type="submit" name="my-add-button" value="add to cart" class="button" />
				</form>
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
    <!-- Begin right side navigation-->&nbsp;&nbsp;&nbsp;<div id="jcart"><?php $jcart->display_cart();?></div>
    <div class="rightnav_placeholder">
    <h3 class="mallHeader">GreatMoods Mall Directory</h3>
    <div class="productmallLinks_placeholder">
      <ul class="stumenu">
        <?php include 'includes/mall_directory_site.php'; ?>
      </ul>
    </div>
    </div>
    <!--End Right Side Navigation-->    
     
    <!--  <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_parent">-->
      
      <!-- ********************************** -->
      <!--***Add in thumbnail images later***-->
      <!-- ********************************** -->
     <!-- <div class="thumbnails">
        <img src="images/small.png" alt="Thumbnail of Product">
        <img src="images/small.png" alt="Thumbnail of Product">
        <img src="images/small.png" alt="Thumbnail of Product">
      

        <div class="button1">
        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_cart_LG.gif" border="0" name="submit" align="top" alt="Make payments with PayPal - it's fast, free and secure!">
      </div>
      
       <div class="button2"><h5>Price: $<?php echo $retailPrice; ?></h5></div>
      </div>-->
              
      <!--<div class="button2">
        <img src="images/button2.jpg" alt="Placeholder Button2" />
      </div>-->
      
      <!--<div class="summary">
        <img src="images/summary.jpg" alt="summary screen" />
      </div>    
    
  
				
		</div>
    <img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
                <input type="hidden" name="add" value="1">
		<input type="hidden" name="cmd" value="_cart">
		<input type="hidden" name="custom" value="<?php echo $groupid;?>">
	        <input type="hidden" name="business" value="gmbaskets@yahoo.com">
	        
	        <!-- ************** ENTER ITEM NAME ************** -->
	        <input type="hidden" name="item_name" value="<?php echo $productName;?>">
	        <input type="hidden" name="item_number" value="<?php echo $productID;?>">
	        
	        <!-- ************** ENTER ITEM PRICE ************** -->
	        <input type="hidden" name="amount" value="<?php echo $retailPrice;?>">
	        <input type="hidden" name="buyer_credit_promo_code" value="">
	        <input type="hidden" name="buyer_credit_product_category" value="">
	        <input type="hidden" name="buyer_credit_shipping_method" value="">
	        <input type="hidden" name="buyer_credit_user_address_change" value="">
	        <input type="hidden" name="no_shipping" value="2">
	        <input type="hidden" name="return" value="http://www.greatmoods.com/thankyou.php">
	        <input type="hidden" name="cancel_return" value="<?php echo $return_cancel; ?>">
	        <input type="hidden" name="notify_url" value="http://greatmoods.com/ipnDB.php">
	        <input type="hidden" name="cn" value="Note to <?php echo $id;?> (optional)">
	        <input type="hidden" name="currency_code" value="USD">
	        
	        
	        <!-- ************** ENTER ITEM Weight ************** -->
	        <input type="hidden" name="weight" value="<?php echo $weight_lbs; ?>">
	        <input type="hidden" name="weight_cart" value="<?php echo $weight_lbs; ?>">
	        <input type="hidden" name="weight_unit" value="lbs">
	        <input type="hidden" name="lc" value="US">
	        <input type="hidden" name="bn" value="PP-ShopCartBF">
	        
	    </form>-->
   
      <a href="checkout.php?prodid=<?php echo $productid; ?>&group=<?php echo $_GET['group']; ?>"><input type="button" value="Checkout"/></a>
      
      </div>
      
  
</div><!-- End Content-->
<div class="clearfloat"><br></div>

<?php include 'footer.php' ; ?>
</div>  <!-- End Container-->

</body>
</html>
<?php
ob_end_flush();
?>