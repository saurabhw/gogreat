<?php 
if(isset($_POST['login'])){
    session_start();
    ob_start();
    require_once('logInUser.inc.php');
}
?>

<head>
	<meta charset="UTF-8">
	<meta name="wot-verification" content="afd275378407e34df6ec"/>
	
	<link rel="shortcut icon" href="../images/favicon.ico">
	<link rel="stylesheet" type="text/css" href="../css/global_styles.css">
	<link rel="stylesheet" type="text/css" href="../css/allforms_styles.css">
	<link rel="stylesheet" href="../../images/font-awesome-4.6.3/css/font-awesome.min.css">
	
	<script>
		$(document).ready(function() {
			$(“.nav li:has(ul)”).hover(function(){
				$(this).find(“ul”).slideDown();
			}, function(){
				$(this).find(“ul”).hide();
			});
		});
	</script>
	
	<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-N7BS27"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-N7BS27');</script>
<!-- End Google Tag Manager -->

	<script>
		function calculateSchool(orgType) {
		        var price = 35; 
		        var commission = .35;
			//elementary schools
			//var num7 = Number(document.getElementById("Enum").value);
			//var fund7 = Number(document.getElementById("Efund").value);
			var people7 = Number(document.getElementById("Epeople").value);
			var percent7 = (Number(document.getElementById("Epercent").value))/100;
			var active7 = people7 * percent7;
			active7 = Number(active7);
			//document.getElementById("Eactive").innerHTML = active7;
			var baskets7 = Number(document.getElementById("Ebaskets").value);
			var numPerYear7 = Number(document.getElementById("EnumPerYear").value);
			var total7 = baskets7 * numPerYear7 * price * commission * active7;
			var result7 =  format(total7,2);
			document.getElementById("Etotal").innerHTML = result7;			
		}
		function format(num, dec) {
	        	return Math.round(num*Math.pow(10,dec))/Math.pow(10,dec);
	        }
	</script>
	
	<script>
		function getUrlVars() {
		    var vars = {};
		    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
		        vars[key] = value;
		    });
		    return vars;
		}
		var group = getUrlVars()["group"];
	</script>
	
	<script src="http://app.ecwid.com/script.js?" charset="utf-8"></script>
	<script>  xAffiliate(''); </script>
	<script> xProductBrowser("categoriesPerRow=3","views=grid(5,4) list(10) table(20)","categoryView=grid","searchView=list","style="); </script>
	
	<!-- jQuery (required) -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	
	<!-- Optional plugins -->
	<script src="CSS-Tricks-AnythingSlider/js/jquery.easing.1.2.js"></script>
	<script src="CSS-Tricks-AnythingSlider/js/swfobject.js"></script>
	
	<!-- Anything Slider -->
	<link rel="stylesheet" href="CSS-Tricks-AnythingSlider/css/anythingslider.css">
	<script src="CSS-Tricks-AnythingSlider/js/jquery.anythingslider.js"></script>
	
	<!-- Add the stylesheet(s) you are going to use here. -->
	<link rel="stylesheet" href="CSS-Tricks-AnythingSlider/css/theme-cs-portfolio.css">
	
	<!-- AnythingSlider optional extensions -->
	<script src="CSS-Tricks-AnythingSlider/js/jquery.anythingslider.fx.js"></script>
	<script src="CSS-Tricks-AnythingSlider/js/jquery.anythingslider.video.js"></script>
	
	<!-- Required -->
	<script>
		$(function(){
		 $('#slider')
		   .anythingSlider() // add any non-default options here
		});
	</script>
</head>

<div id="container">
  <div id="headerMain">
  	<div id="bannerwrapmain"><a href="<?php echo $_SERVER['SERVER_ROOT'].'/index.php'; ?>"><img id="logo" src="images/header-new_LogoRedBackground.png" width="1175" height="150" alt="GreatMoods: Great Fundraising!" /></a>
  	<img id="collage" src="images/Header-new_Homepage-Collage.png" width="1175" height="150" alt=Photo Collage" /></div>
  	
    <div id="menuWrapper"> </div> <!--end menuWrapper-->
    
    <ul class="nav">
    	<li><a href="#">My Account Login</a>
    		<div class="newlogin">
		        <?php
		            if(!isset($_SESSION['LOGIN']) || $_SESSION['LOGIN'] == "FALSE") {
		                echo '<form id="newlogin" action="logInUser.php" method="post">';
		                echo '<label class="userlogin">Username: </label>
		                      <input id="loginemail" type="text" name="email" value="">';
		                echo '<br>';
		                echo '<label class="userlogin">Password: </label>
		                      <input id="loginpassword" type="password" name="password" value="" >';
		                echo '<br>';
		                echo '<div id="acct_buttons"><input class="user redbutton" name="login" type="submit" value="Login" /> ';
		                echo '<a href="recover.php"><input class="user redbutton" name="passrec" type="button" value="Forgot Password" /></a></div>';
		                echo '</form>';
		                
		            } elseif($_SESSION['LOGIN'] == "TRUE") {
		                echo '<div class="mallmenu">
		         		<div class="nav-column">';
		                echo '<h4><a href="index.php">GreatMoods<br>Homepage</a></h4>';
		         	echo '<h4><a href="'.$_SESSION['home'].'" />Account<br>Home</a></h4>';
		         	echo '<div id="abc">';

		         	echo '<br>';
		         	include('includes/logout.inc.php');
		         	echo '</div>
		         		</div>';
		              }
		         ?>
	    
      		</div> <!--end login-->
    	</li>

    <li><a href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Womens/c/18159169/offset=0&sort=priceAsc">Women</a>
        <?php include 'includes/menu_women.php'; ?>
    </li>
    <li><a href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Accessories/c/18195523/offset=0&sort=priceAsc">Accessories</a>
        <?php include 'includes/menu_accessories.php'; ?>
    </li>
    <li><a href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Mens/c/18159150/offset=0&sort=priceAsc">Men</a>
        <?php include 'includes/menu_men.php'; ?>
    </li>
    <li><a href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Juniors/c/18195671/offset=0&sort=priceAsc">Juniors</a>
        <?php include 'includes/menu_juniors.php'; ?>
    </li>
    <li><a href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Kids/c/18209039/offset=0&sort=priceAsc">Kids</a>
        <?php include 'includes/menu_kids.php'; ?>
    </li>
    <li><a href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Baby/c/18209573/offset=0&sort=priceAsc">Baby</a>
        <?php include 'includes/menu_baby.php'; ?>
    </li>
    <li><a href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Fitness/c/18209624/offset=0&sort=priceAsc">Fitness</a>
        <?php include 'includes/menu_fitness.php'; ?>
    </li>
    <li><a href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Food/c/18209702/offset=0&sort=priceAsc">Food</a>
        <?php include 'includes/menu_food.php'; ?>
    </li>
    <li><a href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Entertainment/c/18209743/offset=0&sort=priceAsc">Entertainment</a>
        <?php include 'includes/menu_entertainment.php'; ?>
    </li>
    <li><a href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Houseware/c/18209794/offset=0&sort=priceAsc">Housewares</a>
        <?php include 'includes/menu_housewares.php'; ?>
    </li>
    <li><a href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Health/c/18209818/offset=0&sort=priceAsc">Health</a>
        <?php include 'includes/menu_health.php'; ?>
    </li>
    <li><a href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Inspirational/c/18209845/offset=0&sort=priceAsc">Inspirational</a>
        <?php include 'includes/menu_inspirational.php'; ?>
    </li>
    <li><a href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Holiday/c/18209901/offset=0&sort=priceAsc">Holiday</a>
        <?php include 'includes/menu_holiday.php'; ?>
    </li>
    <li><a href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Business/c/18209939/offset=0&sort=priceAsc">Business</a>
        <?php include 'includes/menu_business.php'; ?>
    </li>
   <li><a href="#">Education Examples</a>
    	<?php include 'includes/menu_education_examples.php'; ?>
    </li>
    <li><a href="#">Organizations</a>
    	<?php include 'includes/menu_organization_examples.php'; ?>
    </li>
</ul>
</div> <!--end headerMain-->
  