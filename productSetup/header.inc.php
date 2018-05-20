<?php 
if(isset($_POST['login'])){
    session_start();
    ob_start();
    require_once('logInUser.inc.php');
}
?>
<head>
<link href="../css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
<link href="../css/header_homepageStyles.css" rel="stylesheet" type="text/css">
</head>

<div id="container">
  <div id="headerMain"> <a href="index.php"><img id="banner" src="../images/header_LogoRedBackground.png" width="1024" height="150" alt="GreatMoods: Great Fundraising!" /> 		  </a>
  <img id="collage" src="../images/Header-Banner_Homepage-Collage.png" width="1024" height="150" alt="Photo Collage" />
    <div id="menuWrapper"> </div>
    <!--end menuWrapper-->
    
        <div id="login">
        <?php
            if(!isset($_SESSION['LOGIN']) || $_SESSION['LOGIN'] == "FALSE") {
                echo '<form id="log" action="logInUser.php" method="post">';
                echo '<label class="user" id="user">Username: </label>
                      <input type="text" name="email" id="user" value="">';
                echo '<label class="user" id="user"> Password: </label>
                      <input type="password" name="password" id="password" value="" >';
                echo '<input class="user" id="user" name="login" type="submit" value="login" />';
                echo '</form>';
                echo '<div id="register">';
                echo '<p class="forgotpw"><a href="../recover.php">Forgot Password?</a><br />';
                echo '<a href="">Register Now</a></p>';
                echo '</div>';
                
            } elseif($_SESSION['LOGIN'] == "TRUE") {
                include('logout.inc.php');
              }
         ?>
      </div>
    <!--end login--> 
    
    <div id="mainNav">
      <ul id="menu">
        <?if($_SESSION['LOGIN'] == "TRUE"){ echo '<li><a href="'.$_SESSION['home'].'" />My Account</a></li>';}?>
        <li><a href="../index.php">GreatMoods <br/>Homepage</a></li>
	<li><a href="../gettingstarted.php">Getting <br/>Started</a>
	<li><a href="../help.php">Help </a>
      </ul>
    </div><!--end mainNav-->
    

  </div><!--end headerMain-->
  