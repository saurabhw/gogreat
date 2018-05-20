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
<html>
<head>
<title>GreatMoods | Organization Website</title>
<link href="../css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
<link href="../css/headerSampleWebsiteStyles.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="container">
  <div id="headerMain"> <img id="banner" src="../<?php echo $banner_path;?>" width="1024" height="150" alt="banner placeholder" />
    <div id="menuWrapper"> </div>
    <!--end menuWrapper-->
    
    <?php include '../includes/loginNav.php'; ?>
    <div id="mainNav">
      <ul id="menu">
        <li><a href="index.php">GreatMoods<br>Homepage</a></li>
        <li><a href="" class="drop">Fundraising<br>Examples</a>
          <?php include '../includes/menu_fundraising_examples.php'; ?>
        <li><a href="" class="drop">GreatMoods<br>Mall Directory</a>
          <?php include '../includes/menu_mall_directory.php'; ?>
        <!-- <li><a href="basketsproducts.php">Gift Baskets<br>& Products</a></li> -->
        <!--<li><a href="fundgettingstarted.php?group=<?php echo $groupID; ?>">Getting<br>Started</a></li>-->
        <li><a href="fundwebsite.php?group=<?php echo $groupID; ?>">Setup/Edit<br>Website</a></li>
        <li><a href="fundmembers.php?group=<?php echo $groupID; ?>">Setup/Edit<br>Members</a></li>
        <li><a href="fundemails.php?group=<?php echo $groupID; ?>">Setup/Edit<br>Emails</a></li>
        <!--<li><a href="fundhelp.php?group=<?php echo $groupID; ?>">Help</a></li>-->
      </ul> <!--end menu-->
    </div> <!--end mainNav--> 
  </div> <!--end headerMain-->
 
<link href="../css/leftSidebarNav.css" rel="stylesheet" type="text/css">
<div id="leftSideBarSample">
  <img src="../<?php echo $contact_photo;?>" width="128" height="150" alt="student photo">
  <ul id="sideNavSample">
    <!-- *********************************************** -->
    <!-- *********************************************** -->
    <!-- [Student Name]'s [Title of Club/Org] Fundraiser -->
    <!-- *********************************************** -->
    <!-- *********************************************** -->
    <li class="stuname"><?php echo $student_name; ?></li>
    <li class="stylized"><?php echo $title; ?> Fundraiser</li>
    <hr>
   <?
     if(isset($_SESSION['authenticated'])&& $_SESSION['role'] == "Member" )
        {
          echo '
          <li><a href="../fundMember/memberHome.php">My Account</a></li>
          ';
        } 
     ?>   
      <li><a href="../samplestudent.php?group=<?php echo $_GET['group']; ?>"><em>Fundraiser <br />Homepage</em></a></li>
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
    
  <!--***********************************-->
  <!--***Placeholder Box for Gift List***-->
  <!--***********************************-->
  <div id="giftlist_placeholder">  </div>
  
  </ul>
</div> <!--end side navigation-->

  <div id="contentSample">
    <h3>Early Learning &amp; Arts &amp; Crafts</h3>
    <div class="productcol1">
      <div class="product">
        <a href="product.php?prodid=74&group=<?php echo $groupID; ?>"><img src="../images/kids_item1.jpg" /></a>
      </div>
      <p>ABC's &amp; 123's</p>
    </div>
    <div class="productcol1">
      <div class="product">
        <a href="product.php?prodid=75&group=<?php echo $groupID; ?>"><img src="../images/kids_item2.jpg" /></a>
      </div>
      <p>First Words,<br>Colors &amp; Sizes</p>
    </div>
    <div class="productcol1">
      <div class="product">
        <a href="product.php?prodid=76&group=<?php echo $groupID; ?>"><img src="../images/kids_item3.jpg" /></a>
      </div>
      <p>Addition &amp; Subtraction</p>
    </div>
    <div class="productcol1">
      <div class="product">
        <a href="product.php?prodid=77&group=<?php echo $groupID; ?>"><img src="../images/kids_item4.jpg" /></a>
      </div>
      <p>Arts, Crafts &<br>Multi-Media Fun</p>
    </div>
    
           <!-- Begin right side navigation-->
    <div class="rightnav">
      <h3 class="mallHeader">Creative Kids<br>Multi-Media Center</h3>
      <div class="productmallLinks">
      <ul class="stumenu">
      <li><a href="creativeKids_Product.php?group=<?php echo $groupID; ?>">Early Learning &amp; Arts &amp; Crafts</a></li>
      <!--<li><a href="creativeKids_wordsProduct.php?group=<?php echo $groupID; ?>">First Words, Shapes, Colors &amp; Sizes</a></li>
      <li><a href="creativeKids_mathProduct.php?group=<?php echo $groupID; ?>">Adding, Subtracting &amp; Multiplying</a></li>
      <li><a href="creativeKids_artsProduct.php?group=<?php echo $groupID; ?>">Arts, Crafts &amp; Multi-Media Fun</a></li>
      <li><a href="creativeKids_sportsProduct.php?group=<?php echo $groupID; ?>">Sports Spectacular Starter Sack</a></li> -->
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
    
    <div class="productcol2">
      <div class="product">
        <a href="product.php?prodid=78&group=<?php echo $groupID; ?>"><img src="../images/kids_item5.jpg" /></a>
      </div>
      <p>Off To The Races</p>
    </div>
    <div class="productcol1">
      <div class="product">
        <a href="product.php?prodid=79&group=<?php echo $groupID; ?>"><img src="../images/kids_item6.jpg" /></a>
      </div>
      <p>Princess Power</p>
    </div>
    <div class="productcol1">
      <div class="product">
        <a href="product.php?prodid=80&group=<?php echo $groupID; ?>"><img src="../images/kids_item7.jpg" /></a>
      </div>
      <p>Bible Stories</p>
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