<?php
      session_start();
      ob_start();
      define("SITE_ROOT",$_SERVER["DOCUMENT_ROOT"].'/salesTest/');
      include(SITE_ROOT."includes/connection.inc.php");
      $link = connectTo();
      $table = "sample_websites";
      $query = "SELECT * FROM $table WHERE samplewebID = '57'";
      $result = mysqli_query($link, $query) or die(mysqli_error());
      $row_count = mysqli_num_rows($result);
      if($row_count == '0'){
        echo "<br />Sample Website Not Found.<br />";
      }else{
         $row = mysqli_fetch_assoc($result);
         $club_name = $row['sampleName'];
         $club = $row['club'];
         $goal = $row['goal'];
         $banner_path = $row['bannerPath'];
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
    
    <div id="mainNav">
      <ul id="menu">
        <li><a href="../giftBaskets.php">Gift Basket <br/>& Products</a></li>
        <li><a href="">Getting <br/>Started</a></li>
        <li><a href="../setupEditWebsite/fundtype.php">Setup/Edit<br/>
          Website</a></li>
        <li><a href="">Setup/Edit<br/>
          Members</a></li>
        <li><a href="">Setup/Edit<br/>
          Emails</a></li>
        <li><a href="../trainingSalesRep/index.php">Training Tips,<br/>
          Tools &amp; Forms </a></li>
      </ul>
    </div>
    <!--end mainNav-->
    
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
  </div>
  <!--end headerMain-->
  
  <?php include 'leftSidebarNavSample.php' ; ?>
  <div id="contentSample">
    <div id="baskets">
      <h3 class="sample">Please Support Our <?php echo $club; ?> Fundraiser!</h3>
      <table id="basketphotos">
        <tr>
          <td><img src="../images/sample_website_baskets/Spring2013/atthecabin.png" width="204" height="153" alt="At the Cabin Gift Basket"><br />
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
        $3,750</p>
    </div>
    <!--end goals-->
    <div class="clearfloat">
    <br />
    </div>
    <div id="col1">
    <img class="mainphoto" src="../images/samplewebsites/mainband.jpg" width="137" height="204" alt="band photo">
    <br />
      <h5 class="contactinfo1">Our Contact<br />
        Information</h5>
      <div class="contactinfobox">
      <img class="contactinfo1" src="../images/icons/facebook_icon.png" width="22" height="22" alt="facebook icon">
      <img src="../images/icons/twitter_icon.png" width="22" height="22" alt="twitter icon">
      <img src="../images/icons/googleplus_icon.png" width="22" height="22" alt="google plus icon">
        <div>
          <p class="contactinfo1">abrahamlincoln-band@abc.school.edu<br />
            (123) 456-7890</p>
      </div>
      </div>
      <!--end contactinfobox--> 
      <br />
      <div class="leader">
        <div class="leaderphoto"><img src="../images/samplewebsites/banddirector.jpg" width="106" height="106" alt="Leader"></div>
        <div class="contactinfo2">
          <p class="contactinfo2"><strong>Band Leader</strong><br />
            <span class="leadername">Mark Gregory</span><br />
            mark.gregory@abc.school.edu<br />
            (123) 456-7890<br />
            <img src="../images/icons/video_icon.png" width="41" height="51" alt="play video icon"> </p>
        </div>
        <!--end contactinfo2-->
      </div>
      <!--end leader--> 
              
      <div class="studentleader">
        <div class="studentleaderphoto"><img src="../images/samplewebsites/bandleader.jpg" width="106" height="106" alt="Leader"></div>
        <div class="contactinfo2">
          <p class="contactinfo2"><strong>Student Leader</strong><br />
            <span class="leadername">Patty Erickson</span><br />
            ericksonpatricia@abc.school.edu<br />
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
      <ul class="reasons">
        <li>New Instrument</li>
        <li>Instrument Maintenance</li>
        <li>Band Field Trips & Performance</li>
        <li>Band Travel</li>
        <li>Uniforms, Sheet Music, Books & Banners</li>
        <li>Music & Concert Sound Systems</li>
        <li>Computers, Recording & Video Equipment</li>
        <li>Music & Video Editing Software & Supplies</li>
        <li>General Band Fund</li>
        <li>Events, Concerts, Banquet & Awards Fund</li>
      </ul>
      <br />
      <img src="../images/samplewebsites/bigband.jpg" width="430" height="322" alt="placeholder for group photo"> </div>
    <!--end col2--> 
  </div>
  <!--end content-->
  <div class="clearfloat">  </div>

  <?php include 'footer_samplewebsites.php' ; ?>
</div>
<!--end container-->
</body>
</html>
<?php
   ob_end_flush();
?>