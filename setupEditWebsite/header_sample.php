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
	<!--<link rel="stylesheet" href="../images/font-awesome-4.6.3/css/font-awesome.min.css">-->
	
	<!-- jQuery (required) -->
	<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>-->
	
	<!-- Optional plugins -->
	<script src="../CSS-Tricks-AnythingSlider/js/jquery.easing.1.2.js"></script>
	<script src="../CSS-Tricks-AnythingSlider/js/swfobject.js"></script>
	
	<!-- Anything Slider -->
	<link rel="stylesheet" href="../CSS-Tricks-AnythingSlider/css/anythingslider.css">
	<script src="../CSS-Tricks-AnythingSlider/js/jquery.anythingslider.js"></script>
	
	<!-- Add the stylesheet(s) you are going to use here. -->
	<link rel="stylesheet" href="../CSS-Tricks-AnythingSlider/css/theme-cs-portfolio.css">
	
	<!-- AnythingSlider optional extensions -->
	<script src="../CSS-Tricks-AnythingSlider/js/jquery.anythingslider.fx.js"></script>
	<script src="../CSS-Tricks-AnythingSlider/js/jquery.anythingslider.video.js"></script>
	
	<script src="../js/simpletabs_1.3.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	
	<link href="../jquery-ui-1.10.3/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
	<link href="../jquery-ui-1.10.3/ui/jquery.multiselect.css" media="screen" rel="stylesheet" type="text/css">
	<script src="../jquery-ui-1.10.3/jquery-1.9.1.js"></script>
	<script src="../jquery-ui-1.10.3/ui/jquery-ui.js"></script>
	<script src="../jquery-ui-1.10.3/ui/jquery.multiselect.js"></script>
	
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
  $( function() {
    $( "#accordion" ).accordion({
       header: "h4",
       heightStyle: "Content",
       collapsible: true,
       active: 0,
       autoHeight: true   
    });
  } );
  </script>
	
	<script> $(document).ready(function(){ $("button").click(function(){ $("show").toggle(); }); }); </script>
	<script> $(document).ready(function(){ $("button1").click(function(){ $("show1").toggle(); }); }); </script>
	<script> $(document).ready(function(){ $("button2").click(function(){ $("show2").toggle(); }); }); </script>
	<script> $(document).ready(function(){ $("button3").click(function(){ $("show3").toggle(); }); }); </script>
	<script> $(document).ready(function(){ $("button4").click(function(){ $("show4").toggle(); }); }); </script>
	<script> $(document).ready(function(){ $("button5").click(function(){ $("show5").toggle(); }); }); </script>
	<script> $(document).ready(function(){ $("button6").click(function(){ $("show6").toggle(); }); }); </script>
	<script> $(document).ready(function(){ $("button7").click(function(){ $("show7").toggle(); }); }); </script>
	<script> $(document).ready(function(){ $("button8").click(function(){ $("show8").toggle(); }); }); </script>
	<script> $(document).ready(function(){ $("button9").click(function(){ $("show9").toggle(); }); }); </script>
	<script> $(document).ready(function(){ $("button10").click(function(){ $("show10").toggle(); }); }); </script>
	<script> $(document).ready(function(){ $("button11").click(function(){ $("show11").toggle(); }); }); </script>
	<script> $(document).ready(function(){ $("button12").click(function(){ $("show12").toggle(); }); }); </script>
	<script> $(document).ready(function(){ $("button13").click(function(){ $("show13").toggle(); }); }); </script>
	<script> $(document).ready(function(){ $("button14").click(function(){ $("show14").toggle(); }); }); </script>
	
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
	
	
</head>

<div id="container">
  <div id="headerMain">
  	<div id="bannerwrap"><a href="#"><img id="logo2" src="../images/whitelogo.png" alt="GreatMoods Logo"></a>
  		<img id="banner" src="../<?php echo $banner_path;?>" width="1024" height="150" alt="UPLOAD YOUR BANNER HERE!" /></div>
  	
    <div id="menuWrapper"> </div> <!--end menuWrapper-->
    
    <ul class="nav">
      <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Womens/c/18159169/offset=0&sort=priceAsc">Women</a>
        <?php include 'includes/menu_women_home.php'; ?>
    </li>
    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Accessories/c/18195523/offset=0&sort=priceAsc">Accessories</a>
        <?php include 'includes/menu_accessories_home.php'; ?>
    </li>
    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Mens/c/18159150/offset=0&sort=priceAsc">Men</a>
        <?php include 'includes/menu_men_home.php'; ?>
    </li>
    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Juniors/c/18195671/offset=0&sort=priceAsc">Juniors</a>
        <?php include 'includes/menu_juniors_home.php'; ?>
    </li>
    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Kids/c/18209039/offset=0&sort=priceAsc">Kids</a>
        <?php include 'includes/menu_kids_home.php'; ?>
    </li>
    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Fitness/c/18209624/offset=0&sort=priceAsc">Fitness</a>
        <?php include 'includes/menu_fitness_home.php'; ?>
    </li>
   <!-- <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Food/c/18209702/offset=0&sort=priceAsc">Food</a>
        <?php include 'includes/menu_food_home.php'; ?>
    </li>
    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Entertainment/c/18209743/offset=0&sort=priceAsc">Entertainment</a>
        <?php include 'includes/menu_entertainment_home.php'; ?>
    </li>
    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Houseware/c/18209794/offset=0&sort=priceAsc">Home</a>
        <?php include 'includes/menu_housewares_home.php'; ?>
    </li>
    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Health/c/18209818/offset=0&sort=priceAsc">Health</a>
        <?php include 'includes/menu_health_home.php'; ?>
    </li>
    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Inspirational/c/18209845/offset=0&sort=priceAsc">Inspirational</a>
        <?php include 'includes/menu_inspirational_home.php'; ?>
    </li>
    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Holiday/c/18209901/offset=0&sort=priceAsc">Holiday</a>
        <?php include 'includes/menu_holiday_home.php'; ?>
    </li>
    <li class="rtborder"><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Business/c/18209939/offset=0&sort=priceAsc">Business</a>
        <?php include 'includes/menu_business_home.php'; ?>
    </li>
  
  	<span class="examplesDropdown">Fundraiser Examples</span>
	<li class="examplesEdu"><a class="titleLink" href="#">Schools</a><?php include 'includes/menu_education_examples.php'; ?></li>
	<li class="examplesOrg"><a class="titleLink" href="#">Organizations</a><?php include 'includes/menu_organization_examples.php'; ?></li>
  
  <li class="lfborder"><a class="logintitle" href="#">My Account<br>Sign Up</a>
    		<div class="newlogin">
		        <?php
		            if(!isset($_SESSION['LOGIN']) || $_SESSION['LOGIN'] == "FALSE") {
		                echo '<form id="newlogin" action="../logInUser.php" method="post">';
		                echo '<h5>sign in</h5>';
		                echo '<input id="loginemail" type="text" name="email" value="" placeholder="email address">';
		                echo '<br>';
		                echo '<input id="loginpassword" type="password" name="password" value="" placeholder="password">';
		                echo '<br>';
		                echo '<div id="acct_buttons"><input class="user redbutton" name="login" type="submit" value="sign up" /> ';
		               /* echo '<a href="recover.php"><input class="user redbutton" name="passrec" type="button" value="Forgot Password" /></a></div>'; */
		                echo '</form>';
		                
		            } elseif($_SESSION['LOGIN'] == "TRUE") {
		            	echo '<div class="loggedinMenu">';
		                echo '<h5>my account</h5>';
		                echo '<span><a href="../index.php">GreatMoods Homepage</a></span>';
		         	echo '<span><a href="editClub.php" />Account Home</a></span>';
		         	echo '<span><a href="../reset.php">Change My Password</a></span>';
		         	echo '<br>';
		         	include('../includes/logout.inc.php');
		         	echo '</div>';
		              }
		         ?>
      		</div> <!--end login-->
    	</li>
</ul>
</div> <!--end headerMain-->
  