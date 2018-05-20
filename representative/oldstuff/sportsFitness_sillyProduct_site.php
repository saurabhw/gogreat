<?php
      session_start();
     
      ob_start();
      
      include("includes/connection.inc.php");
      $link = connectTo();
	$groupID = $_GET['group'];
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


<!DOCTYPE html>
<html>
<head>
<title>GreatMoods | Organization Website</title>
<link href="css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
<link href="css/headerSampleWebsiteStyles.css" rel="stylesheet" type="text/css">
<link href="css/leftSidebarNav.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="../images/favicon.ico">
</head>

<body>
<div id="container">
  <div id="headerMain"> <img id="banner" src="<?php echo $banner_path;?>" width="1024" height="150" alt="banner placeholder" />
    <div id="menuWrapper"> </div>
    <!--end menuWrapper-->
    
    <?php include 'includes/loginNav.php'; ?>
    <?php include 'includes/header_site.php'; ?>
    <?php include 'includes/sidenav_site.php'; ?>
    
  <div id="contentSample">
    <h3>Silly Sports</h3>
    <div class="productcol1">
      <div class="product">
        <a href="product_site.php?prodid=65&group=<?php echo $_GET['group']; ?>"><img src="images/sports_item2.jpg" /></a>
      </div>
      <p>Sports Spectacular</p>
    </div>
    <div class="productcol1">
      <div class="product">
        <a href="product_site.php?prodid=66&group=<?php echo $_GET['group']; ?>"><img src="images/sports_item3.jpg" /></a>
      </div>
      <p>Goofin Around</p>
    </div>
        <div class="productcol1">
      <div class="product">
        <a href="product_site.php?prodid=89&group=<?php echo $_GET['group']; ?>"><img src="images/sports_item4.jpg" /></a>
      </div>
      <p>All About Fun</p>
    </div>
    <div class="productcol1">
      <div class="product">
        <a href="product_site.php?prodid=90&group=<?php echo $_GET['group']; ?>"><img src="images/sports_item5.jpg" /></a>
      </div>
      <p>Life's A Ball</p>
    </div>
    
    <!-- Begin right side navigation-->
    <div class="rightnav">
      <h3 class="mallHeader">Varsity Sports &amp; Fitness</h3>
      <div class="productmallLinks">
      <ul class="stumenu">
      <li><a href="sportsFitness_gameProduct_site.php?group=<?php echo $_GET['group']; ?>">Game Day Sports</a></li>
      <li><a href="sportsFitness_sillyProduct_site.php?group=<?php echo $_GET['group']; ?>">Silly Sports</a></li>
      <li><a href="sportsFitness_lockerProduct_site.php?group=<?php echo $_GET['group']; ?>">The Locker Room</a></li>
      <!-- <li><a href="sportsFitness_proteinProduct_site.php?group=<?php echo $_GET['group']; ?>">Protein To-Go</a></li>
      <li><a href="sportsFitness_funProduct_site.php?group=<?php echo $_GET['group']; ?>">Fun Size Sports</a></li> -->
      </ul>
      <br>
    </div>
    
    <h3 class="mallHeader">GreatMoods Mall Directory</h3>
    <div class="productmallLinks">
      <ul class="stumenu">
        <li><a href="coffeeCafe_site.php?group=<?php echo $_GET['group']; ?>">Coffee Cafe</a></li>
        <li><a href="funFashion_site.php?group=<?php echo $_GET['group']; ?>">Fun Fashion Boutique<a/></li>
        <li><a href="jewelryGlitz_site.php?group=<?php echo $_GET['group']; ?>">Jewelry, Glitz &amp; Glamour Store</a></li>
        <li><a href="salonSpa_site.php?group=<?php echo $_GET['group']; ?>">Luxury Salon &amp; Spa</a></li>
        <li><a href="sportsFitness_site.php?group=<?php echo $_GET['group']; ?>">Varsity Sports &amp; Fitness</a></li>
        <li><a href="healthyHappy_site.php?group=<?php echo $_GET['group']; ?>">The Healthy &amp; Happy Shop</a></li>
        <li><a href="funGames_site.php?group=<?php echo $_GET['group']; ?>">Fun &amp; Games Family Shop</a></li>
        <li><a href="bananasZoo_site.php?group=<?php echo $_GET['group']; ?>">Going Bananas Zoo</a></li>
        <li><a href="creativeKids_site.php?group=<?php echo $_GET['group']; ?>">Creative Kids Multi-Media Center</a></li>
        <li><a href="cookieJar_site.php?group=<?php echo $_GET['group']; ?>">Cookie Jar Bakery</a></li>
        <li><a href="chocolateFactory_site.php?group=<?php echo $_GET['group']; ?>">The Chocolate Factory</a></li>
        <li><a href="candyland_site.php?group=<?php echo $_GET['group']; ?>">Candyland</a></li>
        <li><a href="barneysPet_site.php?group=<?php echo $_GET['group']; ?>">Barney's Pet Shop</a></li>
        <li><a href="holidayHome_site.php?group=<?php echo $_GET['group']; ?>">The Holiday Home Store</a></li>
        <li><a href="santasWorkshop_site.php?group=<?php echo $_GET['group']; ?>">Santa's Workshop</a></li>
        <li><a href="customerClient_site.php?group=<?php echo $_GET['group']; ?>">Customer &amp; Client Concierge Club</a></li>
        <li><a href="carePackages_site.php?group=<?php echo $_GET['group']; ?>">Care Packages with Love</a></li>
        <li><a href="sweetBoutique_site.php?group=<?php echo $_GET['group']; ?>">Romantically Sweet Boutique</a></li>
        <li><a href="inspirational_site.php?group=<?php echo $_GET['group']; ?>">Inspirational, Motivational<br>&amp; Success Treasures</a></li>
        <li><a href="hardyParty_site.php?group=<?php echo $_GET['group']; ?>">Happy, Hardy-Party Superstore</a></li>
      </ul>
    </div>
    </div>
    <!--End Right Side Navigation-->
    
           <div class="productcol2">
      <div class="product">
        <a href="product_site.php?prodid=91&group=<?php echo $_GET['group']; ?>"><img src="images/sports_item6.jpg" /></a>
      </div>
      <p>Game On</p>
    </div>
    
  </div>  <!--end content-->
  
  <div class="clearfloat">  </div>
<?php include 'footer.php' ; ?>  
</div><!--end container-->
</body>
</html>
<?php
   ob_end_flush();
?>