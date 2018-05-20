<?php
      session_start();
      ob_start();
      define("SITE_ROOT",$_SERVER["DOCUMENT_ROOT"].'/salesTest/');
      include("includes/connection.inc.php");
      $link = connectTo();
      $groupID = $_GET['groupid'];
      $table = "Dealers";
      $query1 = "SELECT * FROM $table WHERE loginid = $groupID";
      $result1 = mysqli_query($link, $query1) or die(mysqli_error());
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
      $setup_person = $row['setuppersonid'];
      
      $query2 = "SELECT * FROM orgContacts WHERE fundraiserID = $groupID";
      $result2 = mysqli_query($link, $query2) or die(mysqli_error());
      $row2 = mysqli_fetch_assoc($result2);
      $leader = $row2['orgFName'].' '.$row2['orgLName'];
      $leader_title = $row2['Title'];
      $leader_email = $row2['orgEmail'];
      $leader_phone = $row2['orgPhone'];
      
      
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>GreatMoods | Sample Student Website</title>
<link href="css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
<link href="css/headerSampleWebsiteStyles.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="container">
  <div id="headerMain"> <img id="banner" src="<?php echo $banner_path;?>" width="1024" height="150" alt="banner placeholder" />
    <div id="menuWrapper"> </div>
    <!--end menuWrapper-->
    
      <div id="login">
      <?php
            if(!isset($_SESSION['LOGIN']) || $_SESSION['LOGIN'] == "FALSE") {
                echo '<form id="log" action="includes/logInUser.php" method="post">';
                echo '<label class="user" id="user">Username: </label>
                      <input type="text" name="email" id="user" value="">';
                echo '<label class="user" id="user"> Password: </label>
                      <input type="password" name="password" id="password" value="" >';
                echo '<input class="user" id="user" name="login" type="submit" value="login" />';
                echo '</form>';
                echo '<div id="register">';
                echo '<p class="forgotpw"><a href="">Forgot Password?</a><br />';
                echo '<a href="">Register Now</a></p>';
                echo '</div>';
                
            } elseif($_SESSION['LOGIN'] == "TRUE") {
                include('includes/logout.inc.php');
              }
         ?>
    </div>
    <!--end login--> 
    
    <div id="mainNav">
      <ul id="menuSample">
        <li><a href="index.php">GreatMoods <br/>Homepage</a></li>
        <!--<li><a href="#" class="drop">Fundraising <br/>Examples</a>-->
        <li><a href="basketsproducts.php">Gift Baskets <br/>& Products</a></li>
        <li><a href="fundgettingstarted.php?group=<?php echo $groupID; ?>">Getting <br/>Started</a></li>
      <?if($_SESSION['LOGIN'] == "TRUE"){ echo '<li><a href="'.$_SESSION['home'].'" />My Account</a></li>';}?>
        <li><a href="fundhelp.php?group=<?php echo $groupID; ?>">Help</a></li>
      </ul>
    </div>
    <!--end mainNav-->
    

  </div>
  <!--end headerMain-->
  
 <link href="css/leftSidebarNav.css" rel="stylesheet" type="text/css">

<div id="leftSideBarSample">
  <ul id="sideNavSample">
    <li><a href="fundSite.php?groupid=<? echo $_SESSION['fundid'];?>"><em>Fundraiser <br />Homepage</em></a></li>
    <li>About Our Fundraiser</li>
    <li>Gift Baskets & Products</li>
    <li>Order Now!</li>
    <li>Fundraising Contacts</li>
    <li>Help<br>Training Tips,<br>Tools & Forms</li>
    <li><a href="samplestudent.php?group=<?php echo $groupID; ?>"><em>View Sample Student Websites</em></a></li>
  </ul>

  <ul id="sideNavMktg">
<!--    <li>GreatMoods<br>Great Fundraising</li>
	<li id="whiterule"><a href="">Message for the<br>Coordinator</a></li>-->
	<li><a href="fundaboutus.php?group=<?php echo $groupID; ?>">About Our<br>Fundraising Program</a></li>
	<li><a href="fundonlinefundraising.php?group=<?php echo $groupID; ?>">2013 Online Fundraising</a></li>
	<li><a href="fundprogram.php?group=<?php echo $groupID; ?>">Strengths of The Program</a></li>
	<li><a href="fundeasysetup.php?group=<?php echo $groupID; ?>">Easy 3 Step<br>Online Setup</a></li>
    	<li><a href="fundopportunities.php?group=<?php echo $groupID; ?>">Gift Baskets & Opportunities</a></li>
    	<li><a href="funddeliver.php?group=<?php echo $groupID; ?>">We Deliver!<br>How, When, Where & Who</a></li>
    	<li><a href="fundcash.php?group=<?php echo $groupID; ?>">Cash Next Day!</a></li>
    	<li><a href="fundcalculator.php?group=<?php echo $groupID; ?>">Calculate Your $uccess!</a></li>
    	<li><a href="fundsucceed.php?group=<?php echo $groupID; ?>">How to Succeed: Daily Jobs & Goals</a></li>
    	<li><a href="fundgettingstarted.php?group=<?php echo $groupID; ?>">Getting Started Today</a></li>
    	<li><a href="fundhelp.php?group=<?php echo $groupID; ?>">Help: Training Tips, Tools & Forms</a></li>
    	<li><a href="fundcontactus.php?group=<?php echo $groupID; ?>">Contact Us</a></li>
  </ul>
</div>
  <div id="contentSample">
    <div id="baskets">
      <h3 class="sample">Please Support My <?php echo $title; ?> Fundraiser!</h3>
      <br />
      <h5 class="samplesub">Order One of Our Gift Items for Yourself, Friend or Family Member</h5>
      <table id="basketphotos">
        <tr>
          <td><img src="../../images/sample_website_baskets/Spring2013/atthecabin.png" width="99" height="80" alt="At the Cabin Gift Basket"><br />
            At the Cabin</td>
          <td><img src="../../images/sample_website_baskets/Spring2013/celebration.png" width="99" height="80" alt="Celebration Gift Basket"><br />
            Celebration</td>
          <td><img src="../../images/sample_website_baskets/Spring2013/coffeecomfort.png" width="99" height="80" alt="Coffee Comfort Goodie Bag"><br />Coffee Comfort</td>
          <td><img src="../../images/sample_website_baskets/Spring2013/coffeetime.png" width="99" height="80" alt="Coffee Time Gift Basket"><br />
            Coffee Time</td>
          <td><img src="../../images/sample_website_baskets/Spring2013/happyeaster.png" width="99" height="80" alt="Hopping into Easter Goodie Bag"><br />Hopping into Easter</td>
          <td><img src="../../images/sample_website_baskets/Spring2013/hoppingintoeaster.png" width="99" height="80" alt="Happy Easter Gift Basket"><br />Happy Easter</td>
        </tr>
        
        <tr>
          <td><img src="../../images/sample_website_baskets/Spring2013/kiddinaround.png" width="99" height="80" alt="Kiddin Around Gift Basket"><br />
            Kiddin Around</td>
          <td><img src="../../images/sample_website_baskets/Spring2013/movienight.png" width="99" height="80" alt="Movie Night Gift Basket"><br />
            Movie Night</td>
          <td><img src="../../images/sample_website_baskets/Spring2013/sportsspectacular.png" width="99" height="80" alt="Sports Spectacular Gift Basket"><br />
            Sports Spectacular</td>
          <td><img src="../../images/sample_website_baskets/Spring2013/sweetsandtreats.png" width="99" height="80" alt="Sweets & Treats Goodie Bag"><br />Sweets & Treats</td>
          <td><img src="../../images/sample_website_baskets/Spring2013/timelessclassic.png" width="99" height="80" alt="Whimsically Fun Scarves"><br />
            Whimsically Fun</td>
          <td><img src="../../images/sample_website_baskets/Spring2013/vibrantsophisticate.png" width="99" height="80" alt="Designer Scarf Collection"><br />Designer Collection</td>
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
    <img class="mainphoto" src="<?php echo $contact_photo;?>" width="138" height="184" alt="student photo"> 
      <h5 class="contactinfo1"><?php echo $student_name; ?></h5>
      <div class="contactinfobox">
      <img class="icons" src="../images/icons/facebook_icon.png" width="22" height="22" alt="facebook icon">
      <img src="../images/icons/twitter_icon.png" width="22" height="22" alt="twitter icon">
      <img src="../images/icons/googleplus_icon.png" width="22" height="22" alt="google plus icon">
        <div>
          <p class="studentemail"><?php echo str_replace(" ",".",$student_name); ?>@email.com</p>
          <p class="studentnote">"Thanks for helping me achieve my goals this year!  Thanks to your contributions I am going to have a Great year!"</p>
      </div>
      </div>
      <!--end contactinfobox--> 
      <br />
      <div class="leader">
        <div class="leaderphoto"><img class="dropshadow" src="<?php echo $leader_photo;?>" width="106" height="106" alt="Leader photo"></div>
        <div class="contactinfo2">
          <p class="contactinfo2"><strong><?php echo $position; ?></strong><br />
            <span class="leadername"><?php echo $leader; ?></span><br />
            <?php echo str_replace(" ",".",$leader); ?>@email.com<br />
            (123) 456-7890<br />
            <img src="../../images/icons/video_icon.png" width="41" height="51" alt="play video icon"> </p>
        </div>
        <!--end contactinfo2-->
      </div>
      <!--end leader--> 
              
      <div class="studentleader">
        <div class="studentleaderphoto"><img src="<?php echo $student_photo;?>" width="106" height="106" alt="Leader"></div>
        <div class="contactinfo2">
          <p class="contactinfo2"><strong>Student Leader</strong><br />
            <span class="leadername"><?php echo $student_leader_name; ?></span><br />
            <?php echo str_replace(" ",".",$student_leader_name); ?>@email.com<br />
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
         $r_list = explode('.', $reasons);
         echo '<ul>';
         foreach ($r_list as $item){
           if($item != ''){
             echo '<li>', trim($item), '</li>';
             }
         }
         echo '</ul>';
         echo '</div>';
      ?>
      <br />
      <img src="<?php echo $group_photo;?>" width="430" height="322" alt="placeholder for group photo"> </div>
    <!--end col2--> 
  </div>
  <!--end content-->
  <div class="clearfloat">  </div>

<?php include 'footer.php' ; ?>
</div>
<!--end container-->
</body>
</html>