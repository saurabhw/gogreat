<?php 
if(isset($_POST['login'])){
    session_start();
    ob_start();
    require_once('logInUser.inc.php');
}
?>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<meta name="wot-verification" content="afd275378407e34df6ec"/>
	
	<link rel="shortcut icon" href="../images/favicon.ico">
	<link rel="stylesheet" type="text/css" href="../css/global_styles.css">
	<link rel="stylesheet" type="text/css" href="../css/allforms_styles.css">
	<link rel="stylesheet" href="../../images/font-awesome-4.6.3/css/font-awesome.min.css">
	
	<script src="../js/js-image-slider.js" type="text/javascript"></script>
	
	<script>
		$(document).ready(function() {
			$(“.nav li:has(ul)”).hover(function(){
				$(this).find(“ul”).slideDown();
			}, function(){
				$(this).find(“ul”).hide();
			});
		});
	</script>

	<!--google analytics-->
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-88659906-1', 'auto');
  ga('send', 'pageview');

      </script>

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
	<script>xAffiliate('24503');</script>
	<script> xProductBrowser("categoriesPerRow=3","views=grid(5,4) list(10) table(20)","categoryView=grid","searchView=list","style="); </script>
	
	<!-- jQuery (required) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	
	<!-- Optional plugins -->
	<script src="CSS-Tricks-AnythingSlider/js/jquery.easing.1.2.js"></script>
	<script src="CSS-Tricks-AnythingSlider/js/swfobject.js"></script>
	
	<!-- Anything Slider -->
	<link rel="stylesheet" href="CSS-Tricks-AnythingSlider/css/anythingslider.css">
	<script src="CSS-Tricks-AnythingSlider/js/jquery.anythingslider.js"></script>
	
	<!-- Add the stylesheet(s) you are going to use here. 
	<link rel="stylesheet" href="CSS-Tricks-AnythingSlider/css/theme-cs-portfolio.css">-->
	
	<!-- AnythingSlider optional extensions -->
	<script src="CSS-Tricks-AnythingSlider/js/jquery.anythingslider.fx.js"></script>
	<script src="CSS-Tricks-AnythingSlider/js/jquery.anythingslider.video.js"></script>
	
	<!-- Required -->
	<script>
		var slideIndex = 0;
		carousel();
		
		function carousel() {
		    var i;
		    var x = document.getElementsByClassName("mainSlides");
		    for (i = 0; i < x.length; i++) {
		      x[i].style.display = "none";
		    }
		    slideIndex++;
		    if (slideIndex > x.length) {slideIndex = 1}
		    x[slideIndex-1].style.display = "block";
		    setTimeout(carousel, 2000);
		}
	</script>
	<script>
		$(function(){
		 $('#slider')
		   .anythingSlider() // add any non-default options here
		});
	</script>
	
	
</head>
<body>
<div id="container">
  <div id="headerMain">
  	<div id="bannerwrap"><a href="<?php echo $_SERVER['SERVER_ROOT'].'/index.php'; ?>"><img id="logo2" src="../images/whitelogo.png" alt="GreatMoods Logo"></a>
  	<img id="banner" src="images/Header-new_Homepage-Collage.png" width="1024" height="150" alt="GreatMoods Photo Collage" /></div>
  	
    <div id="menuWrapper"> </div> <!--end menuWrapper-->
    
    <ul class="nav">
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
    <li><a href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Fitness/c/18209624/offset=0&sort=priceAsc">Fitness</a>
        <?php include 'includes/menu_fitness.php'; ?>
    </li>
    <li><a href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Food/c/18209702/offset=0&sort=priceAsc">Food</a>
        <?php include 'includes/menu_food.php'; ?>
    </li> 
    <li><a href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Entertainment/c/18209743/offset=0&sort=priceAsc">Entertainment</a>
        <?php include 'includes/menu_entertainment.php'; ?>
    </li>
    <li><a href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Houseware/c/18209794/offset=0&sort=priceAsc">Home</a>
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
    <li class="rtborder"><a href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Business/c/18209939/offset=0&sort=priceAsc">Business</a>
        <?php include 'includes/menu_business.php'; ?>
    </li>
    
    	<span class="examplesDropdown">Fundraiser Examples</span>
    	<li class="examplesEdu"><a class="titleLink" href="#">Schools</a><?php include 'includes/menu_education_examples.php'; ?></li>
	<li class="examplesOrg"><a class="titleLink" href="#">Organizations</a><?php include 'includes/menu_organization_examples.php'; ?></li>
    	
   	<li class="lfborder"><a class="logintitle" href="#">My Account<br>Sign In</a>
    		<div class="newlogin">
		        <?php
		            if(!isset($_SESSION['LOGIN']) || $_SESSION['LOGIN'] == "FALSE") {
		                echo '<form id="newlogin" action="../logInUser.php" method="post">';
		                echo '<h5>sign in</h5>';
		                echo '<input id="loginemail" type="text" name="email" value="" placeholder="email address">';
		                echo '<br>
		                      <input id="loginpassword" type="password" name="password" value="" placeholder="password">';
		                echo '<br>';
		                echo '<div id="acct_buttons"><input class="user redbutton" name="login" type="submit" value="sign in"> ';
		               /* echo '<a href="recover.php"><input class="user redbutton" name="passrec" type="button" value="Forgot Password" /></a></div>'; */
		                echo '</form>';
		                
		            } elseif($_SESSION['LOGIN'] == "TRUE") {
		            	echo '<div class="loggedinMenu">';
		                echo '<h5>my account</h5>';
		                echo '<span><a href="../index.php">GreatMoods Homepage</a></span>';
		         	echo '<span><a href="'.$_SESSION['home'].'" />Account Home</a></span>';
		         	echo '<span><a href="../reset.php">Change My Password</a></span>';
		         	echo '<br>';
		         	include('logout.inc.php');
		         	echo '</div>';
		              }
		         ?>
	    
      		</div> <!--end login-->
    	</li>
</ul>
</div> <!--end headerMain-->
  