<head>
	<link rel="stylesheet" type="text/css" href="../css/mainRecruitingStyles.css">
	<link rel="stylesheet" type="text/css" href="../css/all_styles.css">
	<link rel="stylesheet" type="text/css" href="../css/header_styles.css">
	<link rel="stylesheet" type="text/css" href="../css/addnew_form_styles.css" />
	<link rel="stylesheet" type="text/css" href="../css/layout_styles.css" />
	<link rel="shortcut icon" href="../images/favicon.ico">
</head>

<div id="headerMain">
	<div id="bannerwrapmain"><a href="../index.php"><img id="logo" src="../images/header-new_LogoRedBackground.png" width="1175" height="150" alt="GreatMoods: Great Fundraising!" /></a>
	<img id="collage" src="../images/Header-new_Homepage-Collage.png" width="1175" height="150" alt=Photo Collage" /></div>
	
	<div id="menuWrapper"> </div> <!--end menuWrapper-->
    
	<ul class="nav">
      		<li><a href="#">My Account</a>
    		<div class="newlogin">
		        <?php
		            if(!isset($_SESSION['LOGIN']) || $_SESSION['LOGIN'] == "FALSE") {
		                echo '<form id="newlogin" action="../logInUser.php" method="post">';
		                echo '<label class="userlogin">Username:</label>
		                      <input id="loginemail" type="text" name="email" value="">';
		                echo '<br>';
		                echo '<label class="userlogin">Password:</label>
		                      <input id="loginpassword" type="password" name="password" value="" >';
		                echo '<br>';
		                echo '<input id="redbutton" class="user" name="login" type="submit" value="Login" />';
		                echo '</form>';
		                
		            } elseif($_SESSION['LOGIN'] == "TRUE") {
		                echo '<div class="mallmenu">
		         		<div class="nav-column">';
		                echo '<h4><a href="index.php">GreatMoods<br>Homepage</a></h4>';
		         	echo '<h4><a href="'.$_SESSION['home'].'" />Account<br>Home</a></h4>';
		         	echo '<br>';
		         	include('../includes/logout.inc.php');
		         	echo '</div>
		         		</div>';
		              }
		         ?>
	    
      		</div> <!--end login-->
    	</li>
        <li><a href="#">Women</a>
        	<?php include '../includes/menu_women.php'; ?>
	    </li>
	    <li><a href="#">Accessories</a>
	        <?php include '../includes/menu_accessories.php'; ?>
	    </li>
	    <li><a href="#">Men</a>
	        <?php include '../includes/menu_men.php'; ?>
	    </li>
	    <li><a href="#">Juniors</a>
	        <?php include '../includes/menu_juniors.php'; ?>
	    </li>
	    <li><a href="#">Kids</a>
	        <?php include '../includes/menu_kids.php'; ?>
	    </li>
	    <li><a href="#">Baby</a>
	        <?php include '../includes/menu_baby.php'; ?>
	    </li>
	    <li><a href="#">Fitness</a>
	        <?php include '../includes/menu_fitness.php'; ?>
	    </li>
	    <li><a href="#">Food</a>
	        <?php include '../includes/menu_food.php'; ?>
	    </li>
	    <li><a href="#">Entertainment</a>
	        <?php include '../includes/menu_entertainment.php'; ?>
	    </li>
	    <li><a href="#">Housewares</a>
	        <?php include '../includes/menu_housewares.php'; ?>
	    </li>
	    <li><a href="#">Health</a>
	        <?php include '../includes/menu_health.php'; ?>
	    </li>
	    <li><a href="#">Inspirational</a>
	        <?php include '../includes/menu_inspirational.php'; ?>
	    </li>
	    <li><a href="#">Holiday</a>
	        <?php include '../includes/menu_holiday.php'; ?>
	    </li>
	    <li><a href="#">Business</a>
	        <?php include '../includes/menu_business.php'; ?>
	    </li>
	   <li><a href="#">Education Examples</a>
	    	<?php include '../includes/menu_education_examples.php'; ?>
	    </li>
	    <li><a href="#">Organization Examples</a>
	    	<?php include '../includes/menu_organization_examples.php'; ?>
	    </li>
	</ul>
</div> <!--end headerMain-->
  