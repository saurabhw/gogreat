<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>GreatMoods | Sample Band Website</title>
<link href="../css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
<link href="../css/headerSampleWebsiteStyles.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="container">
  <div id="headerMain"> <img id="banner" src="../images/samplewebsites/lincolnbanner.jpg" width="1024" height="199" alt="banner placeholder" />
    <div id="menuWrapper"> </div>
    <!--end menuWrapper-->
    
        <div id="login">
      <form id="log" action="logInUser.php" method="post">
        <label class="user">Username: </label>
        <input type="text" name="enter your name" id="user" value="">
        <label class="user">Password: </label>
        <input type="password" name="password" id="password" value="" >
        <input class="user" type="submit" value="login" />
      </form>
      <div id="register">
        <p class="forgotpw"><a href="">Forgot Password?</a><br />
          <a href="">Register Now</a></p>
      </div>
      <!--end register--> 
    </div>
    <!--end login--> 
    
    <div id="mainNav">
      <ul id="menuSample">
        <li><a href="">GreatMoods <br/>Homepage</a></li>
        <li><a href="">Fundraising <br/>Examples</a></li>
        <li><a href="../giftBaskets.php">Gift Baskets <br/>& Products</a></li>
        <li><a href="">Getting <br/>Started</a></li>
        <li class="divider"><a href="../setupEditWebsite/fundtype.php">Setup/Edit<br/>
          Website</a></li>
        <li><a href="">Setup/Edit<br/>
          Members</a></li>
        <li><a href="">Setup/Edit<br/>
          Emails</a></li>
        <li><a href="../trainingSalesRep/index.php">Help</a></li>
      </ul>
    </div>
    <!--end mainNav-->
    

  </div>
  <!--end headerMain-->
  
  <?php include 'leftSidebarNavSample2.php' ; ?>
  <div id="contentSample">
    <div id="baskets">
      <h3 class="sample">Please Support Our Band Fundraiser!</h3>
      <h5 class="samplesub">Order One of Our Gift Items for Yourself, Friend or Family Member</h5>
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
        $25,000</p>
      <p><strong>Raised<br />
        So Far</strong><br />
        $3,750</p>
    </div>
    <!--end goals-->
    <div class="clearfloat">
    <br />
    </div>
    <div id="col1">
    <img class="mainphoto" src="../images/samplewebsites/mainband.jpg" width="138" height="184" alt="band photo"> 
      <h5 class="contactinfo1">Our Contact<br />
        Information</h5>
      <div class="contactinfobox">
      <img class="icons" src="../images/icons/facebook_icon.png" width="22" height="22" alt="facebook icon">
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
        <div class="leaderphoto"><img class="dropshadow" src="../images/samplewebsites/banddirector.jpg" width="106" height="141" alt="Leader"></div>
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
        <div class="studentleaderphoto"><img class="dropshadow" src="../images/samplewebsites/bandleader.jpg" width="106" height="141" alt="Leader"></div>
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
      <img class="dropshadow" src="../images/samplewebsites/bigband.jpg" width="430" height="322" alt="placeholder for group photo"> </div>
    <!--end col2--> 
  </div>
  <!--end content-->
  <div class="clearfloat">  </div>

<?php include 'footer_samplewebsites.php' ; ?>
</div>
<!--end container-->
</body>
</html>