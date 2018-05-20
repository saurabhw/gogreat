<?php
      session_start();
     
      ob_start();
      
      include("includes/connection.inc.php");
      $link = connectTo();
      if (isset($_SESSION['authenticated'])){
          // logging in user
          $groupID = $_SESSION['groupid'];
      }else{
        // customer from a link(not logged in)
      	$groupID = $_GET['groupid'];
        }  
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
          <li><a href="fundMember/memberHome.php">My Account</a></li>
          ';
        } 
     ?>   
      <li><a href="fundSite.php?group=<?php echo $_GET['group']; ?>"><em>Fundraiser <br />Homepage</em></a></li>
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
</div> <!--end side navigation-->

  <div id="contentSample">
    <img src="images/store6.jpg" />
    <div class="categories">
    <h5>The Happy &amp; Healthy Shop Coming September 15th!</h5>
    <!--<ul class="categoriesul">
      <li><a href="happyHealthy_sugarfreeProduct_site.php?group=<?php echo $_GET['group']; ?>">Sugar Free</a></li>
      <li><a href="happyHealthy_naturalProduct_site.php?group=<?php echo $_GET['group']; ?>">Natural</a></li>
      <li><a href="happyHealthy_organicProduct_site.php?group=<?php echo $_GET['group']; ?>">Organic</a></li>
      <li><a href="happyHealthy_certifiedProduct_site.php?group=<?php echo $_GET['group']; ?>">Certified Organic</a></li>
      <li><a href="happyHealthy_proteinProduct_site.php?group=<?php echo $_GET['group']; ?>">Protein To-Go</a></li>
    </ul> -->
  </div>  <!--end content-->
  
  <div class="clearfloat">  </div>
  <?php include 'footer.php' ; ?>
</div><!--end container-->
</body>
</html>
<?php
   ob_end_flush();
?>