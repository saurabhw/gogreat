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
	$return_cancel = 'http://www.greatmoods.com/product.php?prodid='.$productid.'&groupid='.$groupid;

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
<link href="css/leftSidebarNav.css" rel="stylesheet" type="text/css">

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
  

<div id="leftSideBarSample">
	<?php include 'includes/sidenav_giftlist.php'; ?>
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
        <?php include 'includes/mall_directory_site.php'; ?>
      </ul>
    </div>
    </div>
    <!--End Right Side Navigation-->    
      
      <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_parent">
      
      <!-- ********************************** -->
      <!--***Add in thumbnail images later***-->
      <!-- ********************************** -->
      <div class="thumbnails">
        <!--<img src="images/small.png" alt="Thumbnail of Product">
        <img src="images/small.png" alt="Thumbnail of Product">
        <img src="images/small.png" alt="Thumbnail of Product">-->

        <p>Qty: <input id="quantity" type="text" name="quantity" size="3" value="1"></p>
        
        <div class="button1">
        <a href=""><input type="button" value="Add Item To Gift List"/></a>
      </div>
      
       <div class="button2"><h5>Price: $<?php echo $retailPrice; ?></h5></div>
      </div>
              
      <!--<div class="button2">
        <img src="images/button2.jpg" alt="Placeholder Button2" />
      </div>-->
      
      <div class="summary">
        <!--<img src="images/summary.jpg" alt="summary screen" />-->
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
	        
	    </form>
    
      <ul id="menudetails">
        <li class="active"><a href="#tab1">Gift List</a></li>
        <li><a href="#tab2">Description</a></li>
        <!--<li><a href="#tab3">What's Inside</a></li>-->
        <li><a href="#tab4">Shipping</a></li>
      </ul>
      
      <!-- ****************Name should be for Active Giftlist (in place of $owner;)************* -->
      <div class="tab" id="tab1"><?php echo $owner; ?>'s Gift List Items Below:<br> 
      	<div id="giftlistbox">
      	<!-- ******************image, name, price for each item added*************************** -->
      		<div id="glbrow">
      			<div id="smprodimg"><img src="" alt="small product thumbnail" width="45" height="45"/></div>
      			<div id="glbprodname">Product Name</div>
      			<div id="glbprodprice">$0.00</div>
      			<div id="deleteprod"><input type="button" value="Remove Item"/></div>
      		</div>
      		<div id="glbrow">
      			<div id="smprodimg"><img src="" alt="small product thumbnail" width="45" height="45"/></div>
      			<div id="glbprodname">Product Name</div>
      			<div id="glbprodprice">$0.00</div>
      			<div id="deleteprod"><input type="button" value="Remove Item"/></div>
      		</div>
      		<div id="glbrow">
      			<div id="smprodimg"><img src="" alt="small product thumbnail" width="45" height="45"/></div>
      			<div id="glbprodname">Product Name</div>
      			<div id="glbprodprice">$0.00</div>
      			<div id="deleteprod"><input type="button" value="Remove Item"/></div>
      		</div>
      		<div id="glbrow">
      			<div id="glbsubtotal">Subtotal: <div id="glbsubtotalprice">$0.00</div></div>
      			<div id="deleteprod"><a href="checkout_giftlist.php?prodid=<?php echo $productid; ?>&group=<?php echo $_GET['group']; ?>"><input type="button" value="Checkout"/></a></div>
      		</div>
      		
      	</div>
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