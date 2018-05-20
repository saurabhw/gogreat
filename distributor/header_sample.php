<?php 
if(isset($_POST['login'])){
    session_start();
    ob_start();
    require_once('logInUser.inc.php');
}
?>

<div id="container">
  <div id="headerMain">
  	<img id="banner" src="../<?php echo $banner_path;?>" width="1024" height="150" alt="banner placeholder" />
  	
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
        <?php include 'menu_mall_directory2.php'; ?>
    </li>
    <li><a href="fundgettingstarted.php?group=<?php echo $_GET['group']; ?>">Getting<br>Started</a></li>
    <li><a href="fundgettingstarted9.php?group=<?php echo $_GET['group']; ?>">Sign Up &<br>Start Today!</a></li>
</ul>
</div> <!--end headerMain-->
  