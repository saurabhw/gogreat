<!DOCTYPE HTML>
<head>
	<meta charset="UTF-8">
	<title>GreatMoods Rep</title>
	<link rel="shortcut icon" href="../images/favicon.ico" >
	<link rel="stylesheet" type="text/css" href="../css/global_styles.css">
	<link rel="stylesheet" type="text/css" href="../css/allforms_styles.css">
	<link rel="stylesheet" href="../images/font-awesome-4.6.3/css/font-awesome.min.css">
	
	<script>
		$(document).ready(function() {
			$(“.nav li:has(ul)”).hover(function(){
				$(this).find(“ul”).slideDown();
			}, function(){
				$(this).find(“ul”).hide();
			});
		});
	</script>
	<script>
        function myToggle() {
        var x = document.getElementById('example1');
        var y = document.getElementById('example2');
        if (x.style.display === 'none') {
        x.style.display = 'block'; 
        y.style.display = 'none';
        } else {
          x.style.display = 'none';
        }
       }
       </script>
       <script>
        function myToggle2() {
        var x = document.getElementById('example2');
        var y = document.getElementById('example1');
        if (x.style.display === 'none') {
        x.style.display = 'block'; 
        y.style.display = 'none';
        } else {
          x.style.display = 'none';
        }
       }
       </script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	
	<script>
		$(document).ready(function(){
		  $("button1").click(function(){
		    $("show").toggle();
		  });
		});
	</script>
	
	<script>
		$(document).ready(function(){
		  $("button2").click(function(){
		    $("show2").toggle();
		  });
		});
	</script>
	
	<script type="text/javascript">
		var LHtotal;
		var AHtotal;
		var LMtotal;
		var AMtotal;
		var schoolTotal;
		var churchTotal;
		var grandTotal1;
		function calculateSchool(orgType) {
		        //large high schools
		        var num = Number(document.getElementById("LHnum").value);
			var fund = Number(document.getElementById("LHfund").value);
			var people = Number(document.getElementById("LHpeople").value);
			var percent = (Number(document.getElementById("LHpercent").value))/100;
			var active = people * percent;
			active = Number(active);
			//document.getElementById("LHactive").innerHTML = active;
			var baskets = Number(document.getElementById("LHbaskets").value);
			var numPerYear = Number(document.getElementById("LHnumPerYear").value);
			var price = 22.75;
			var commission = 0.06;
			var total1 = fund * active * baskets * numPerYear * price * commission * num;
			var result1 = format(total1,2);
			grandTotal1 = result1;
			schoolTotal = result1;
			document.getElementById("LHtotal").innerHTML = result1;
			document.getElementById("schoolTotal").innerHTML = schoolTotal;
			document.getElementById("grandTotal").value = grandTotal1;
			
			//average high schools
			var num2 = Number(document.getElementById("AHnum").value);
			var fund2 = Number(document.getElementById("AHfund").value);
			var people2 = Number(document.getElementById("AHpeople").value);
			var percent2 = (Number(document.getElementById("AHpercent").value))/100;
			var active2 = people2 * percent2;
			active2 = Number(active2);
			//document.getElementById("AHactive").innerHTML = active2;
			var baskets2 = Number(document.getElementById("AHbaskets").value);
			var numPerYear2 = Number(document.getElementById("AHnumPerYear").value);
			var total2 = fund2 * active2 * baskets2 * numPerYear2 * price * commission * num2;
			var result2 =  format(total2,2);
			document.getElementById("AHtotal").innerHTML = result2;
			grandTotal1 += result2;
			schoolTotal += result2;
			schoolTotal = format(schoolTotal,2);
			document.getElementById("schoolTotal").innerHTML = schoolTotal;
			document.getElementById("grandTotal").value = grandTotal1;
			
			//large middle schools
			var num3 = Number(document.getElementById("LMnum").value);
			var fund = Number(document.getElementById("LMfund").value);
			var fund3 = Number(document.getElementById("LMfund").value);
			var people3 = Number(document.getElementById("LMpeople").value);
			var percent3 = (Number(document.getElementById("LMpercent").value))/100;
			var active3 = people3 * percent3;
			active3 = Number(active3);
			//document.getElementById("LMactive").innerHTML = active3;
			var baskets3 = Number(document.getElementById("LMbaskets").value);
			var numPerYear3 = Number(document.getElementById("LMnumPerYear").value);
			var total3 = fund3 * active3 * baskets3 * numPerYear3 * price * commission * num3;
			var result3 =  format(total3,2);
			document.getElementById("LMtotal").innerHTML = result3;
			grandTotal1 += result3;
			schoolTotal += result3;
			schoolTotal = format(schoolTotal,2);
			document.getElementById("schoolTotal").innerHTML = schoolTotal;
			document.getElementById("grandTotal").value = grandTotal1;
			
			//average middle schools
			var num4 = Number(document.getElementById("AMnum").value);
			var fund4 = Number(document.getElementById("AMfund").value);
			var people4 = Number(document.getElementById("AMpeople").value);
			var percent4 = (Number(document.getElementById("AMpercent").value))/100;
			var active4 = people4 * percent4;
			active4 = Number(active4);
			//document.getElementById("AMactive").innerHTML = active4;
			var baskets4 = Number(document.getElementById("AMbaskets").value);
			var numPerYear4 = Number(document.getElementById("AMnumPerYear").value);
			var total4 = fund4 * active4 * baskets4 * numPerYear4 * price * commission * num4;
			var result4 =  format(total4,2);
			document.getElementById("AMtotal").innerHTML = result4;
			grandTotal1 += result4;
			schoolTotal += result4;
			document.getElementById("schoolTotal").innerHTML = schoolTotal;
			document.getElementById("grandTotal").value = grandTotal1;
			
			//elementary schools
			var num7 = Number(document.getElementById("Enum").value);
			var fund7 = Number(document.getElementById("Efund").value);
			var people7 = Number(document.getElementById("Epeople").value);
			var percent7 = (Number(document.getElementById("Epercent").value))/100;
			var active7 = people7 * percent7;
			active7 = Number(active7);
			//document.getElementById("Eactive").innerHTML = active7;
			var baskets7 = Number(document.getElementById("Ebaskets").value);
			var numPerYear7 = Number(document.getElementById("EnumPerYear").value);
			var total7 = fund7 * active7 * baskets7 * numPerYear7 * price * commission * num7;
			var result7 =  format(total7,2);
			grandTotal1 += result7;
			schoolTotal += result7;
			document.getElementById("Etotal").innerHTML = result7;
			document.getElementById("schoolTotal").innerHTML = schoolTotal;
			document.getElementById("grandTotal").value = grandTotal1;
			
			
			//large churches
			var num5 = Number(document.getElementById("LCnum").value);
			var fund5 = Number(document.getElementById("LCfund").value);
			var people5 = Number(document.getElementById("LCpeople").value);
			var percent5 = (Number(document.getElementById("LCpercent").value))/100;
			var active5 = people5 * percent5;
			active5 = Number(active5);
			//document.getElementById("LCactive").innerHTML = active5;
			var baskets5 = Number(document.getElementById("LCbaskets").value);
			var numPerYear5 = Number(document.getElementById("LCnumPerYear").value);
			var total5 = fund5 * active5* baskets5 * numPerYear5 * price * commission * num5;
			var result5 =  format(total5,2);
			document.getElementById("LCtotal").innerHTML = result5;
			grandTotal1 += result5;
			churchTotal = result5;
			document.getElementById("churchTotal").innerHTML = churchTotal;
			document.getElementById("grandTotal").value = grandTotal1;
			
			//average churches
			var num6 = Number(document.getElementById("ACnum").value);
			var fund6 = Number(document.getElementById("ACfund").value);
			var people6 = Number(document.getElementById("ACpeople").value);
			var percent6 = (Number(document.getElementById("ACpercent").value))/100;
			var active6 = people6 * percent6;
			active6 = Number(active6);
			//document.getElementById("ACactive").innerHTML = active6;
			var baskets6 = Number(document.getElementById("ACbaskets").value);
			var numPerYear6 = Number(document.getElementById("ACnumPerYear").value);
			var total6 = fund6 * active6 * baskets6 * numPerYear6 * price * commission * num6;
			var result6 =  format(total6,2);
			document.getElementById("ACtotal").innerHTML = result6;
			grandTotal1 += result6;
			churchTotal += result6;
			document.getElementById("churchTotal").innerHTML = churchTotal;
			document.getElementById("grandTotal").value = grandTotal1;
			
			
			
			//organizations
			var num8 = Number(document.getElementById("Onum").value);
			var fund8 = Number(document.getElementById("Ofund").value);
			var people8 = Number(document.getElementById("Opeople").value);
			var percent8 = (Number(document.getElementById("Opercent").value))/100;
			var active8 = people8 * percent8;
			active8 = Number(active8);
			//document.getElementById("Oactive").innerHTML = active8;
			var baskets8 = Number(document.getElementById("Obaskets").value);
			var numPerYear8 = Number(document.getElementById("OnumPerYear").value);
			var total8 = fund8 * active8 * baskets8 * numPerYear8 * price * commission * num8;
			var result8 =  format(total8,2);
			//document.getElementById("Ototal").innerHTML = result6;
			grandTotal1 += result8;
			orgTotal = result8;
			document.getElementById("Ototal").innerHTML = result8;
			document.getElementById("orgTotal").innerHTML = orgTotal;
			document.getElementById("grandTotal").value = grandTotal1;	
		}
		function format(num, dec) {
	        	return Math.round(num*Math.pow(10,dec))/Math.pow(10,dec);
	        }
	</script>
	
	<script src="http://app.ecwid.com/script.js?" charset="utf-8"></script>
	<script>  xAffiliate(''); </script>
	<script> xProductBrowser("categoriesPerRow=3","views=grid(5,4) list(10) table(20)","categoryView=grid","searchView=list","style="); </script>
	
	<!-- jQuery (required) -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	
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
	
	<!-- Required -->
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
  	<div id="bannerwrap"><a href="index.php"><img id="logo2" src="../images/whitelogo.png" alt="GreatMoods Logo"></a>
  	<img id="banner" src="../images/Header-new_Homepage-Collage.png" width="1024" height="150" alt=Photo Collage"></div>
  	
    <div id="menuWrapper"> </div> <!--end menuWrapper-->
    
    <ul class="nav">
    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Womens/c/18159169/offset=0&sort=priceAsc">Women</a>
        <?php include 'menu_women.php'; ?>
    </li>
    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Accessories/c/18195523/offset=0&sort=priceAsc">Accessories</a>
        <?php include 'menu_accessories.php'; ?>
    </li>
    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Mens/c/18159150/offset=0&sort=priceAsc">Men</a>
        <?php include 'menu_men.php'; ?>
    </li>
    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Juniors/c/18195671/offset=0&sort=priceAsc">Juniors</a>
        <?php include 'menu_juniors.php'; ?>
    </li>
    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Kids/c/18209039/offset=0&sort=priceAsc">Kids</a>
        <?php include 'menu_kids.php'; ?>
    </li>
    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Fitness/c/18209624/offset=0&sort=priceAsc">Fitness</a>
        <?php include 'menu_fitness.php'; ?>
    </li>
    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Food/c/18209702/offset=0&sort=priceAsc">Food</a>
        <?php include 'menu_food.php'; ?>
    </li>
    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Entertainment/c/18209743/offset=0&sort=priceAsc">Entertainment</a>
        <?php include 'menu_entertainment.php'; ?>
    </li>
    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Houseware/c/18209794/offset=0&sort=priceAsc">Home</a>
        <?php include 'menu_housewares.php'; ?>
    </li>
    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Health/c/18209818/offset=0&sort=priceAsc">Health</a>
        <?php include 'menu_health.php'; ?>
    </li>
    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Inspirational/c/18209845/offset=0&sort=priceAsc">Inspirational</a>
        <?php include 'menu_inspirational.php'; ?>
    </li>
    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Holiday/c/18209901/offset=0&sort=priceAsc">Holiday</a>
        <?php include 'menu_holiday.php'; ?>
    </li>
    <li class="rtborder"><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Business/c/18209939/offset=0&sort=priceAsc">Business</a>
        <?php include 'menu_business.php'; ?>
    </li>
   
   	<span class="examplesDropdown">Fundraiser Examples</span>
    	<li class="examplesEdu"><a class="titleLink" href="#">Schools</a><?php include 'menu_education_examples.php'; ?></li>
	<li class="examplesOrg"><a class="titleLink" href="#">Organizations</a><?php include 'menu_organization_examples.php'; ?></li>
   
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
		                echo '<input id="redbutton" class="user redbutton" name="login" type="submit" value="sign in">';
		                echo '</form>';
		                
		            } elseif($_SESSION['LOGIN'] == "TRUE") {
		            	echo '<div class="loggedinMenu">';
		                echo '<h5>my account</h5>';
		                echo '<span><a href="index.php">GreatMoods Homepage</a></span>';
		         	echo '<br>';
		         	include('../includes/logout.inc.php');
		         	echo '</div>';
		              }
		         ?>
 
      		</div> <!--end login-->
    	</li>
</ul>
</div> <!--end headerMain-->