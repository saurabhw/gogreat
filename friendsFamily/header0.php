<head>
	<link rel="stylesheet" type="text/css" href="../css/mainRecruitingStyles.css">
	<link rel="stylesheet" type="text/css" href="../css/header_styles.css">
	<link rel="stylesheet" type="text/css" href="../css/addnew_form_styles.css" />
	<link rel="stylesheet" type="text/css" href="../css/layout_styles.css" />
</head>

<div id="headerMain"> 
	<div id="bannerwrap"><img id="banner" src="../<?php echo $_SESSION['banner'];?>" width="1024" height="150" alt="banner placeholder" /> </div>
	<div id="menuWrapper"> </div>
	<div id="login">
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
				echo '<p class="forgotpw"><a href="">Forgot Password?</a><br />';
				echo '<a href="">Register Now</a></p>';
				echo '</div>';   
				} elseif($_SESSION['LOGIN'] == "TRUE") {
					echo '<div class="mallmenu">
					<div class="nav-column">';
					echo '<h4><a href="../index.php">GreatMoods<br>Homepage</a></h4>';
				echo '<h4><a href="memberLogin.php" />Account<br>Home</a></h4>';
				echo '<br>';
				include('../includes/logout.inc.php');
				echo '</div>
					</div>';
				  }
		?>
	</div> <!--end login--> 
	
		<ul class="nav">
			<!--<li><a href="../index.php">GreatMoods Homepage</a></li> -->
			<?php if(isset($_SESSION['authenticated'])){ ?>
		        <li class="divider"><a href="../membersite.php?group=<? echo $_SESSION['fundid'];?>">View My Website</a></li>
		        <li><a href="memberLogin.php" title="Choose a Different Group Account">Log In Home</a></li>
		        <?php }?>
				
	<li><a href="#">Women</a>
        <?php include '../includes/menu_women_home.php'; ?>
    </li>
    <li><a href="#">Accessories</a>
        <?php include '../includes/menu_accessories_home.php'; ?>
    </li>
    <li><a href="#">Men</a>
        <?php include '../includes/menu_men_home.php'; ?>
    </li>
    <li><a href="#">Juniors</a>
        <?php include '../includes/menu_juniors_home.php'; ?>
    </li>
    <li><a href="#">Kids</a>
        <?php include '../includes/menu_kids_home.php'; ?>
    </li>
    <li><a href="#">Baby</a>
        <?php include '../includes/menu_baby_home.php'; ?>
    </li>
    <li><a href="#">Fitness</a>
        <?php include '../includes/menu_fitness_home.php'; ?>
    </li>
    <li><a href="#">Food</a>
        <?php include '../includes/menu_food_home.php'; ?>
    </li>
    <li><a href="#">Entertainment</a>
        <?php include '../includes/menu_entertainment_home.php'; ?>
    </li>
    <li><a href="#">Housewares</a>
        <?php include '../includes/menu_housewares_home.php'; ?>
    </li>
    <li><a href="#">Health</a>
        <?php include '../includes/menu_health_home.php'; ?>
    </li>
    <li><a href="#">Inspirational</a>
        <?php include '../includes/menu_inspirational_home.php'; ?>
    </li>
    <li><a href="#">Holiday</a>
        <?php include '../includes/menu_holiday_home.php'; ?>
    </li>
    <li><a href="#">Business</a>
        <?php include '../includes/menu_business_home.php'; ?>
    </li>
   <li><a href="#">Education Examples</a>
    	<?php include '../includes/menu_education_examples.php'; ?>
    </li>
    <li><a href="#">Organization Examples</a>
    	<?php include '../includes/menu_organization_examples.php'; ?>
    </li>
		</ul>
	</div> <!--end mainNav-->
