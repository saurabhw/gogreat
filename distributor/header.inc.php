<?php 
if(isset($_POST['login'])){
    session_start();
    ob_start();
    require_once('logInUser.inc.php');
}
?>

<div id="container">
  <div id="headerMain">
  	<a href="index.php"><img id="logo" src="../images/header_LogoRedBackground.png" width="1175" height="150" alt="GreatMoods: Great Fundraising!" /></a>
  	<img id="collage" src="images/Header-new_Homepage-Collage.png" width="1175" height="150" alt=Photo Collage" />
  	
    <div id="menuWrapper"> </div> <!--end menuWrapper-->
	<div id="login">
        <?php
            if(!isset($_SESSION['LOGIN']) || $_SESSION['LOGIN'] == "FALSE") {
                echo '<form id="log" action="logInUser.php" method="post">';
                echo '<label class="user" id="user">Username: </label>
                      <input type="text" name="email" id="user" value="">';
                echo '<label class="user" id="user"> Password: </label>
                      <input type="password" name="password" id="password" value="" >';
                echo '<input class="user" id="user" name="login" type="submit" value="Login" />';
                echo '</form>';
                echo '<div id="register">';
                echo '<ul><li><a href="">Forgot Password?</a></li>';
                echo '<li><a href="">Register Now</a></li></ul>';
                echo '</div>';
                
            } elseif($_SESSION['LOGIN'] == "TRUE") {
                include('../includes/logout.inc.php');
              }
         ?>
      </div> <!--end login-->
    
    <ul class="nav">
    <li><a href="index.php">GreatMoods<br>Homepage</a></li>
    <li><a href="#">Fundraising<br>Examples</a>
    	<?php include 'menu_fundraising_examples.php'; ?>
    </li>
    <li>
        <a href="#">GreatMoods<br>Mall Directory</a>
        <?php include 'menu_mall_directory.php'; ?>
    </li>
    <li><a href="help.php">Getting<br>Started</a></li>
    <li><a href="contactus.php">Sign Up &<br>Start Today!</a></li>
</ul>
</div> <!--end headerMain-->
  