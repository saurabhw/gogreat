<?php
      session_start();
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
<meta charset="UTF-8" />
<title>GreatMoods | Organization Website</title>
<link href="../css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
<link href="../css/headerSampleWebsiteStyles.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="container">
  <div id="headerMain"> <img id="banner" src="<?php echo "../".$banner_path;?>" width="1024" height="150" alt="banner placeholder" />
    <div id="menuWrapper"> </div>
    <!--end menuWrapper-->
    
    <div id="login">
      <form id="log" action="logInUser.php" method="post">
        <label class="user">Username: </label>
        <input type="text" name="enter your name" id="user" value="">
        &nbsp;
        <label class="user">Password: </label>
        <input type="password" name="password" id="password" value="" >
        &nbsp;
        <input class="user" type="submit" value="login" />
        &nbsp;
      </form>
      <div id="register">
        <p class="forgotpw"><a href="">Forgot Password?</a><br />
          <a href="">Register Now</a></p>
      </div>
      <!--end register--> 
    </div>
    <!--end login-->
    <div id="mainNav">
      <ul id="menu">
        <li><a href="giftBaskets.php">Gift Basket <br/>& Products</a></li>
        <li><a href="">Getting <br/>Started</a></li>
        <li><a href="setupEditWebsite/fundtype.php">Setup/Edit<br/>
          Website</a></li>
        <li><a href="">Setup/Edit<br/>
          Members</a></li>
        <li><a href="">Setup/Edit<br/>
          Emails</a></li>
        <li><a href="trainingSalesRep/index.php">Training Tips,<br/>
          Tools &amp; Forms </a></li>
      </ul>
    </div>
    <!--end mainNav--> 
  </div>
  <!--end headerMain-->
  
  <link href="../css/leftSidebarNav.css" rel="stylesheet" type="text/css">

<div id="leftSideBarSample">
  <ul id="sideNavSample">
    <li><a href="club_website.php">Fundraiser <br />Homepage</a></li>
    <li><a href="club_website_about.php">About Our Fundraiser</a></li>
    <li><a href="">Gift Baskets & Products</a></li>
    <li><a href="">Order Now!</a></li>
    <li><a href="">Fundraising Contacts</a></li>
    <li><a href="">Help<br>Training Tips,<br>Tools & Forms</a></li>
    <li><a href="samplestudent.php?group=<?php echo "../".$groupID; ?>"><em>View Sample Student Websites</em></a></li>
  </ul>

  <ul id="sideNavMktg">
<!--    <li>GreatMoods<br>Great Fundraising</li>
	<li id="whiterule"><a href="">Message for the<br>Coordinator</a></li>-->
	<li><a href="">About Our<br>Fundraising Program</a></li>
	<li><a href="">Message to the<br>Coordinator</a></li>
	<li><a href="onlinefundraising.php">2013 Online Fundraising</a></li>
	<li><a href="program.php">Strengths of The Program</a></li>
	<li><a href="easysetup.php">Easy 3 Step<br>Online Setup</a></li>
    	<li><a href="opportunities.php">Gift Baskets & Opportunities</a></li>
    	<li><a href="deliver.php">We Deliver!<br>How, When, Where & Who</a></li>
    	<li><a href="cash.php">Cash Next Day!</a></li>
    	<li><a href="">Calculate Your $uccess!</a></li>
    	<li><a href="succeed.php">How to Succeed: Daily Jobs & Goals</a></li>
    	<li><a href="gettingstarted.php">Getting Started Today</a></li>
    	<li><a href="help.php">Help: Training Tips, Tools & Forms</a></li>
    	<li><a href="contactus.php">Contact Us</a></li>
  </ul>
</div>

  <div id="contentSample">
    <div id="baskets">
      <h3 class="sample">Please Support Our <?php echo $title; ?> Fundraiser!</h3>
      <table id="basketphotos">
        <tr>
          <td><img src="../images/sample_website_baskets/spaandrelaxation.jpg" width="99" height="80" alt="Spa and Relaxation Giftbasket"><br />
            Spa and Relaxation</td>
          <td><img src="../images/sample_website_baskets/atthecabin.jpg" width="105" height="80" alt="At The Cabin Giftbasket"><br />
            At the Cabin</td>
          <td><img src="../images/sample_website_baskets/housewarming.jpg" width="91" height="80" alt="Housewarming Giftbasket"><br />
            Housewarming</td>
          <td><img src="../images/sample_website_baskets/outtothegarden.jpg" width="97" height="80" alt="Out To The Garden Giftbasket"><br />
            Out to the Garden</td>
          <td><img src="../images/sample_website_baskets/tranquility.jpg" width="98" height="80" alt="Tranquility Giftbasket"><br />
            Tranquility</td>
          <td><img src="../images/sample_website_baskets/amomentformom.jpg" width="116" height="80" alt="A Moment For Mom Giftbasket"><br />
            A Moment for Mom</td>
        </tr>
        <tr>
          <td><img src="../images/sample_website_baskets/earlytorise.jpg" width="83" height="80" alt="Early To Rise Giftbasket"><br />
            Early to Rise</td>
          <td><img src="../images/sample_website_baskets/movietimejr.jpg" width="96" height="80" alt="Movietime Giftbasket"><br />
            Movie Time</td>
          <td><img src="../images/sample_website_baskets/coffeebreak.jpg" width="96" height="80" alt="Coffee Break Giftbasket"><br />
            Coffee Break</td>
          <td><img src="../images/sample_website_baskets/sportsspectacular.jpg" width="84" height="80" alt="Sports Spectacular"><br />
            Sports Spectacular</td>
          <td><img src="../images/sample_website_baskets/celebration.jpg" width="96" height="80" alt="Celebration Giftbasket"><br />
            Celebration</td>
          <td><img src="../images/sample_website_baskets/tranquilreflections.jpg" width="96" height="80" alt="Tranquil Reflections Giftbasket"><br />
            Tranquil Reflections</td>
        </tr>
      </table>
    </div>
    <!--end baskets-->
    
    <div id="goals">
      <p><strong>Our Goal</strong><br />
        $<?php echo $goal; ?></p>
      <p><strong>Raised<br />
        So Far</strong><br />
        $<?php echo $so_far; ?>.00</p>
    </div>
    <!--end goals-->
    <div class="clearfloat">
    <br />
    </div>
    <div id="col1">
    <img class="mainphoto" src="<?php echo $contact_photo;?>" width="132" height="186" alt="contact photo">
    <br />
      <h5 class="contactinfo1">Our Contact<br />
        Information</h5>
      <div class="contactinfobox">
      <img class="contactinfo1" src="../images/icons/facebook_icon.png" width="22" height="22" alt="facebook icon">
      <img src="../images/icons/twitter_icon.png" width="22" height="22" alt="twitter icon">
      <img src="../images/icons/googleplus_icon.png" width="22" height="22" alt="google plus icon">
        <div>
          <p class="contactinfo1"><?php echo $group_email; ?><br />
            <?php echo $phone; ?></p>
      </div>
      </div>
      <!--end contactinfobox--> 
      <br />
      <div class="leader">
        <div class="leaderphoto"><img src="<?php echo "../".$leader_photo;?>" width="106" height="106" alt="Leader photo"></div>
        <div class="contactinfo2">
          <p class="contactinfo2"><strong><?php echo "../".$position; ?></strong><br />
            <span class="leadername"><?php echo "../".$leader; ?></span><br />
            <?php echo $group_email; ?><br />
            <?php echo $phone; ?><br />
            <img src="../images/icons/video_icon.png" width="41" height="51" alt="play video icon"> </p>
        </div>
        <!--end contactinfo2-->
      </div>
      <!--end leader--> 
              
      <div class="studentleader">
        <div class="studentleaderphoto"><img src="<?php echo "../".$student_photo;?>" width="106" height="106" alt="Leader"></div>
        <div class="contactinfo2">
          <p class="contactinfo2"><strong>Student Leader</strong><br />
            <span class="leadername">J. Doe</span><br />
            jdoe@email.com<br />
        </div>
        <!--end contactinfo2--> 
      </div>
      <!--end studentleader--> 
      
      <!--      <p>Thank You for supporting our Fundraising effort! This is a big year for our High School and with a little added support we can make it a great year for the Students!!! 	                               Gift Baskets are a wonderful item for the Holidays and really helps us to achieve our individual needs and goals. Please select one of the Gift Baskets below to send to 	                               a Family Member, Friend or special Business Customer this Holiday Season.</p>
--> 
    </div>
    <!--end col1-->
    
    <div id="col2">
      <h5 id="reasons">Reasons for Our Fundraiser</h5>
      <?php
         echo '<div id ="reasoncontent">'; 
         $r_list = explode(',', $reasons);
         echo '<ul>';
         foreach ($r_list as $item){
             echo '<li>', trim($item), '</li>';
         }
         echo '<?ul>';
         echo '</div>';
      ?>
      
      <br />
      <img src="<?php echo "../".$group_photo;?>" width="430" height="322" alt="placeholder for group photo"> </div>
    <!--end col2--> 
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