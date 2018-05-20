<?php
	session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Sign Up Today</title>
<link href="../css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
<link href="../css/headerSampleWebsiteStyles.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="container">
  <div id="headerMain"> <img id="banner" src="../images/samplewebsites/lincolnbanner.jpg" width="1024" height="150" alt="banner placeholder" />
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
        <li><a href="../trainingSalesRep/index.php">Help</a></li>
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
    <div id="column1">
    <h5>About Our Fundraiser
    </h5>
  <ul>
    <li>Thank You for supporting our Fundraising effort! This is a big year for our High School and with a little added support we can make it a great year for the Students!!! Gift Baskets are a wonderful item for the Holidays and really helps us to achieve our individual needs and goals. Please select one of the Gift Baskets below to send to a Family Member, Friend or special Business Customer this Holiday Season. </li>
    </ul>

  
    </div>
    <!--end column1-->
    
    <div id="column2">
    <img class="spacebelow" src="../images/samplewebsites/bigband.jpg" width="404" height="270">
  
  

</div>
<!--end column2-->

</div>
<!--end content-->
<?php include 'footer_samplewebsites.php' ; ?>
</div>
<!--end container-->

</body>
</html>
<?php
ob_end_flush();
?>