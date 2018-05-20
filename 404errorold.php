<?php
	session_start();
	ob_start();
?>

<!DOCTYPE HTML>
<head>
	<meta charset="UTF-8">
	<title>GreatMoods Homepage</title>
	<link rel="stylesheet" type="text/css" href="../../css/global_styles.css">
	<link rel="stylesheet" type="text/css" href="../../css/error.css">
	<link rel="shortcut icon" href="../../images/favicon.ico">
</head>

<body>
<div id="container">
	<div id="headerMain">
	  	<div id="bannerwrap"><a href="<?php echo $_SERVER['SERVER_ROOT'].'index.php'; ?>"><img id="logo2" src="../../images/whitelogo.png" alt="GreatMoods Logo"></a>
	  	<img id="banner" src="../../images/Header-new_Homepage-Collage.png" width="1024" height="150" alt="GreatMoods Photo Collage" /></div>
	  	
	    <div id="menuWrapper"> </div> <!--end menuWrapper-->
	    
	    <ul class="nav">
	    <li><a href="https://www.greatmoods.com/greatmoodsMall.php?group=900#!/Womens/c/18159169/offset=0&sort=priceAsc">Women</a>
	        <?php include 'includes/menu_women_home.php'; ?>
	    </li>
	    <li><a href="https://www.greatmoods.com/greatmoodsMall.php?group=900#!/Accessories/c/18195523/offset=0&sort=priceAsc">Accessories</a>
	        <?php include 'includes/menu_accessories_home.php'; ?>
	    </li>
	    <li><a href="https://www.greatmoods.com/greatmoodsMall.php?group=900#!/Mens/c/18159150/offset=0&sort=priceAsc">Men</a>
	        <?php include 'includes/menu_men_home.php'; ?>
	    </li>
	    <li><a href="https://www.greatmoods.com/greatmoodsMall.php?group=900#!/Juniors/c/18195671/offset=0&sort=priceAsc">Juniors</a>
	        <?php include 'includes/menu_juniors_home.php'; ?>
	    </li>
	    <li><a href="https://www.greatmoods.com/greatmoodsMall.php?group=900#!/Kids/c/18209039/offset=0&sort=priceAsc">Kids</a>
	        <?php include 'includes/menu_kids_home.php'; ?>
	    </li>
	    <li><a href="https://www.greatmoods.com/greatmoodsMall.php?group=900#!/Fitness/c/18209624/offset=0&sort=priceAsc">Fitness</a>
	        <?php include 'includes/menu_fitness_home.php'; ?>
	    </li>
	    <li><a href="https://www.greatmoods.com/greatmoodsMall.php?group=900#!/Food/c/18209702/offset=0&sort=priceAsc">Food</a>
	        <?php include 'includes/menu_food_home.php'; ?>
	    </li>
	    <li><a href="https://www.greatmoods.com/greatmoodsMall.php?group=900#!/Entertainment/c/18209743/offset=0&sort=priceAsc">Entertainment</a>
	        <?php include 'includes/menu_entertainment_home.php'; ?>
	    </li>
	    <li><a href="https://www.greatmoods.com/greatmoodsMall.php?group=900#!/Houseware/c/18209794/offset=0&sort=priceAsc">Home</a>
	        <?php include 'includes/menu_housewares_home.php'; ?>
	    </li>
	    <li><a href="https://www.greatmoods.com/greatmoodsMall.php?group=900#!/Health/c/18209818/offset=0&sort=priceAsc">Health</a>
	        <?php include 'includes/menu_health_home.php'; ?>
	    </li>
	    <li><a href="https://www.greatmoods.com/greatmoodsMall.php?group=900#!/Inspirational/c/18209845/offset=0&sort=priceAsc">Inspirational</a>
	        <?php include 'includes/menu_inspirational_home.php'; ?>
	    </li>
	    <li><a href="https://www.greatmoods.com/greatmoodsMall.php?group=900#!/Holiday/c/18209901/offset=0&sort=priceAsc">Holiday</a>
	        <?php include 'includes/menu_holiday_home.php'; ?>
	    </li>
	    <li class="rtborder"><a href="https://www.greatmoods.com/greatmoodsMall.php?group=900#!/Business/c/18209939/offset=0&sort=priceAsc">Business</a>
	        <?php include 'includes/menu_business_home.php'; ?>
	    </li>
	    
	    <span class="examplesDropdown">Fundraiser Examples</span>
	    <li class="examplesEdu"><a class="titleLink" href="#">Schools</a><?php include 'includes/menu_education_examples.php'; ?></li>
	    <li class="examplesOrg"><a class="titleLink" href="#">Organizations</a><?php include 'includes/menu_organization_examples.php'; ?></li>
	    
	    <li class="lfborder"><a class="logintitle" href="#">My Account<br>Sign In</a>
	    		<div class="newlogin">
			        <?php
			            if(!isset($_SESSION['LOGIN']) || $_SESSION['LOGIN'] == "FALSE") {
			                echo '<form id="newlogin" action="logInUser.php" method="post">';
			                echo '<h5>sign in</h5>';
			                echo '<input id="loginemail" type="text" name="email" value="" placeholder="email address">';
			                echo '<br>';
			                echo '<input id="loginpassword" type="password" name="password" value="" placeholder="password">';
			                echo '<br>';
			                echo '<input id="redbutton" class="user redbutton" name="login" type="submit" value="sign in" /> ';
			                /*echo '<a href="recover.php"><input class="user redbutton" name="passrec" type="button" value="Forgot Password" /></a></div>';*/
			                echo '</form>';
			                
			            } elseif($_SESSION['LOGIN'] == "TRUE") {
			            	echo '<div class="loggedinMenu">';
			                echo '<h5>my account</h5>';
			                echo '<span><a href="index.php">GreatMoods Homepage</a></span>';
			         	echo '<span><a href="'.$_SESSION['home'].'" />Account Home</a></span>';
			         	echo '<span><a href="reset.php">Change My Password</a></span>';
			         	echo '<br>';
			         	include('includes/logout.inc.php');
			         	echo '</div>';
			              }
			         ?>
		    
	      		</div> <!--end login-->
	    	</li>
	</ul>
	</div> <!--end headerMain-->
	
	  <div id="leftSideBar">
	  	<ul id="sideNav">
                     <li><a href="https://www.greatmoods.com/index.php">Welcome!</a></li>
                     <li><a href="https://www.greatmoods.com/gm_programoverview.php">GreatMoods Program Overview</a></li>
                     <li><a href="https://www.greatmoods.com/mission.php">GreatMoods Mission</a></li>
                     <li><a href="https://www.greatmoods.com/onlinefundraising.php">GreatMoods<br>Online Fundraising</a></li>
                     <li><a href="https://www.greatmoods.com/program.php">Strengths of the<br>GreatMoods Program</a></li>
                     <li><a href="https://www.greatmoods.com/easysetup.php">3 Steps to <br>Fundraising $uccess!</a></li>
                     <li><a href="https://www.greatmoods.com/opportunities.php">GreatMoods Mall<br>Products & Gifts</a></li>
                     <li><a href="https://www.greatmoods.com/deliver.php">We Deliver!</a></li>
                     <li><a href="https://www.greatmoods.com/cash.php">Cash Deposited Weekly!</a></li>
                     <li><a href="https://www.greatmoods.com/calculator.php">Calculate Your $uccess</a></li>
                     <li><a href="https://www.greatmoods.com/generatefunds.php">Generate Funds<br>24/7/365 Days a Year!</a></li>
                     <li><a href="https://www.greatmoods.com/gettingstarted_sendemail.php">Getting Started</a></li>
	        </ul>
	</div>
  
  <div id="content">
  	
  	
  	<div id="column1">
		<h1>OOPS!</h1>
		<h3>We can't seem to find the page you're looking for.</h3>
		
		<br>
		
		<h5>No need to worry, we can help you find your way again.</h5>
		<p>Check out the links to the left to learn more about GreatMoods!</p>
		
		<br>
		
		<h5>Quick Links:</h5>
			     	
		<div>
			<a href="https://www.greatmoods.com/index.php"><input type="button" class="medredbutton" value="GreatMoods Homepage"></a>
			<a href="https://www.greatmoods.com/gm_programoverview.php"><input type="button" class="medredbutton" value="GreatMoods Program Overview"></a>
			<a href="https://www.greatmoods.com/gettingstarted_sendemail.php"><input type="button" class="medredbutton" value="Getting Started"></a>			
		</div>
		
		<br>
	</div> <!-- end column1 -->
	
	<div id="column2">
		<img src="../../images/hands-way-guide-tourist.jpg" width="404" alt="Holding Paper Map" style="margin: 10px 0;">
		<br>
	</div> <!-- end column2 -->
	
  </div>  <!--end content-->
  
  <?php include 'footer.php' ; ?>
</div><!--end container-->

</body>

<?php
ob_end_flush();
?>