<?php 
if(isset($_POST['login'])){
    session_start();
    ob_start();
    require_once('../includes/logInUser.inc.php');
}?>
<head>
	<link rel="stylesheet" type="text/css" href="../css/mainRecruitingStyles.css">
	<link rel="stylesheet" type="text/css" href="../css/header_styles.css">
	<link rel="stylesheet" type="text/css" href="../css/addnew_form_styles.css" />
	<link rel="stylesheet" type="text/css" href="../css/layout_styles.css" />
</head>

<div id="container">
  <div id="headerMain"> 
  	<div id="bannerwrapmain"><a href="../index.php"><img id="logo" src="../images/header-new_LogoRedBackground.png" width="1175" height="150" alt="GreatMoods: Great Fundraising!" /></a> <img id="collage" src="../images/Header-new_Homepage-Collage.png" width="1175" height="150" alt=Photo Collage" /></div>
    
    <div id="menuWrapper"> </div> <!--end menuWrapper-->
    
        <!--<div id="login">
        <?php
            if(!isset($_SESSION['LOGIN']) || $_SESSION['LOGIN'] == "FALSE") {
                echo '<form id="log" action="../logInUser.php" method="post">';
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
                 
                include('../includes/logout.inc.php');
                
              }
         ?>
      </div>-->
    <!--end login--> 
    
    <div id="mainNav">
      	<ul class="nav">
	      	<li><a href="#">My Account</a>
	    		<div class="newlogin">
			        <?php
			            if(!isset($_SESSION['LOGIN']) || $_SESSION['LOGIN'] == "FALSE") {
			                echo '<form id="newlogin" action="logInUser.php" method="post">';
			                echo '<label class="userlogin">Username:</label>
			                      <input id="loginemail" type="text" name="email" value="">';
			                echo '<br>';
			                echo '<label class="userlogin">Password:</label>
			                      <input id="loginpassword" type="password" name="password" value="" >';
			                echo '<br>';
			                echo '<input id="redbutton" class="user" name="login" type="submit" value="login" />';
			                echo '</form>';
			                
			            } elseif($_SESSION['LOGIN'] == "TRUE") {
			                include('../includes/logout.inc.php');
			              }
			         ?>
	      		</div> <!--end login-->
	    	</li>
      
        	<li><a href="../index.php">GreatMoods Homepage</a></li>
	        <li><a href="#">Educational Examples</a>
	    	<?php include '../includes/menu_educational_examples.php'; ?>
	    	</li>
		<li><a href="viewReps.php">Account Home</a>
		<li><a href="repSetup.php">Add Rep</a>
		<li><a href="accountEdit.php">Edit My Account</a>
	  </ul>
    </div><!--end mainNav-->
  </div><!--end headerMain-->