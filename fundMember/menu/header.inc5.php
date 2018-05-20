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
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="preload" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" as="style" onload="this.rel='stylesheet'" crossorigin="anonymous"> <!-- asynch css load -->
  <noscript> <link rel="stylesheet"  href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"></noscript> <!-- load styles for browsers with JS disabled -->
  <!--sidebar navigation dropdown plugin -->  
  <link rel="preload" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css" as="style" onload="this.rel='stylesheet'"> <!-- asynch css load -->
  <noscript><link  rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css"></noscript><!-- load styles for browsers with JS disabled -->
  
  <link rel="preload" href="../css/global_styles.css" as="style" onload="this.rel='stylesheet'"> <!-- asynch css load -->
  <noscript><link rel="stylesheet" href="../css/global_styles.css"></noscript><!-- load styles for browsers with JS disabled -->
  <!-- bootstrap file, avoid editing if possible, find the classes you need and then override them in global styles -->
  <link rel="preload" href="../css/bootstrap.css"  as="style" onload="this.rel='stylesheet'"> <!-- asynch css load -->
  <noscript><link rel="stylesheet" href="../css/bootstrap.css"></noscript><!-- load styles for browsers with JS disabled -->
  
  <link rel="preload" href="../css/content_styles.css" as="style" onload="this.rel='stylesheet'"> <!-- asynch css load -->
  <noscript><linkrel="stylesheet" href="../css/content_styles.css"></noscript><!-- load styles for browsers with JS disabled -->
  <!-- top navigation styles -->
  <link rel="preload" href="../css/main_nav.css" as="style" onload="this.rel='stylesheet'"> <!-- asynch css load -->
  <noscript><link rel="stylesheet" href="../css/main_nav.css"></noscript><!-- load styles for browsers with JS disabled -->
  
  <!-- function for loading basic content for browser with JS disabled -->
	<script>
	/*! loadCSS. [c]2017 Filament Group, Inc. MIT License */
	!function(a){"use strict";var b=function(b,c,d){function e(a){return h.body?a():void setTimeout(function(){e(a)})}function f(){i.addEventListener&&i.removeEventListener("load",f),i.media=d||"all"}var g,h=a.document,i=h.createElement("link");if(c)g=c;else{var j=(h.body||h.getElementsByTagName("head")[0]).childNodes;g=j[j.length-1]}var k=h.styleSheets;i.rel="stylesheet",i.href=b,i.media="only x",e(function(){g.parentNode.insertBefore(i,c?g:g.nextSibling)});var l=function(a){for(var b=i.href,c=k.length;c--;)if(k[c].href===b)return a();setTimeout(function(){l(a)})};return i.addEventListener&&i.addEventListener("load",f),i.onloadcssdefined=l,l(f),i};"undefined"!=typeof exports?exports.loadCSS=b:a.loadCSS=b}("undefined"!=typeof global?global:this);
	/*! loadCSS rel=preload polyfill. [c]2017 Filament Group, Inc. MIT License */
	!function(a){if(a.loadCSS){var b=loadCSS.relpreload={};if(b.support=function(){try{return a.document.createElement("link").relList.supports("preload")}catch(b){return!1}},b.poly=function(){for(var b=a.document.getElementsByTagName("link"),c=0;c<b.length;c++){var d=b[c];"preload"===d.rel&&"style"===d.getAttribute("as")&&(a.loadCSS(d.href,d,d.getAttribute("media")),d.rel=null)}},!b.support()){b.poly();var c=a.setInterval(b.poly,300);a.addEventListener&&a.addEventListener("load",function(){b.poly(),a.clearInterval(c)}),a.attachEvent&&a.attachEvent("onload",function(){a.clearInterval(c)})}}}(this);
	</script>
	
	<script>
		// $(document).ready(function() {
		// 	$(“.nav li:has(ul)”).hover(function(){
		// 		$(this).find(“ul”).slideDown();
		// 	}, function(){
		// 		$(this).find(“ul”).hide();
		// 	});
		// });
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
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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
		// $(function(){
		// $('#slider')
		//   .anythingSlider() // add any non-default options here
		// });
	</script>
	<script>
	$(document).ready(function(){

      $('#itemslider').carousel({ interval: 3000 });
      
      $('.carousel-showmanymoveone .item').each(function(){
      var itemToClone = $(this);
      
      for (var i=1;i<6;i++) {
      itemToClone = itemToClone.next();
      
      if (!itemToClone.length) {
      itemToClone = $(this).siblings(':first');
      }
      
      itemToClone.children(':first-child').clone()
      .addClass("cloneditem-"+(i))
      .appendTo($(this));
      }
      });
  });
	</script>
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
  <!-- jequery for validation -- ensures fields at least have text -->
  <script> 
    var $formLogin = $('#loginform');
    var $formLost = $('#lost-form');
    var $modalAnimateTime = 300;
    var $msgAnimateTime = 150;
    var $msgShowTime = 2000;

    $("#login_btn").submit(function () {
        switch(this.id) {
            case "loginform":
                var $username=$('#loginemail').val();
                var $password=$('#loginpassword').val();
                return false;
                break;
            default:
                return false;
        }
        return false;
    });
  </script>
   <script> 
// javascript:(function(){var s=document.createElement("script");s.onload=function(){bootlint.showLintReportForCurrentDocument([]);};s.src="https://maxcdn.bootstrapcdn.com/bootlint/latest/bootlint.min.js";document.body.appendChild(s)})();
   </script>
   <!-- prevent side navigation from collapsing when mobile users attempt to toggle a dropdown -->
   <script>
    $(document).ready(function(){
    $('li.dropdown a').on("click", function(){
      $(this).parent().toggleClass('open');
      });
      $('body.canvas-slid').on('click', function (e) {
      if (!$('li.dropdown').is(e.target) && $('li.dropdown').has(e.target).length === 0 && $('.open').has(e.target).length === 0)  {
          $('li.dropdown').removeClass('open');
        }
        e.stopPropagation();
        e.preventDefault();
      });
    });    
  </script>
      	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</head>
<header>

      <!-- hidden mobile account icon -- allows for better positioning of icon on small screens -->
      <a href="#"  id="accountIconMobile" class="hidden-lg pull-right" id="accountIconMobile" role="button" data-toggle="modal" data-target="#login-modal"><i class="fa fa-user-circle fa-3x" aria-hidden="true"></i></a>
        <div id="headerImage" class="col-lg-1 col-lg-offset-3 col-md-1 col-sm-1">
          <a href="index.php"><img src="../images/GMlogo.png" alt="GMlogo" class="img-responsive"></img></a>
        </div>

          <div class ="container-fluid">
        <!-- elements above main nav -->
    <div class="row row-centered" id="aboveNavElements">

         <!--search bar above nav-->
        <div class="col-centered col-lg-7 col-lg-pull-1 col-md-6 col-md-pull-1 col-sm-6 col-sm-pull-1 col-xs-12">
          <form id="search1" class="form-inline input-group" role="form" method="post" action="" >
            <!--<script type="text/javascript" src="https://app.ecwid.com/script.js?9012020" charset="utf-8"></script> <script type="text/javascript">("id=my-search-9012020"); </script>-->
            <input type="text" class="form-control search-form" placeholder="Search GreatMoods Mall...">
            <span class="input-group-btn"><button type="submit" class="btn btn-primary search-btn" data-target="#search-form" name="search"><i class="fa fa-search"></i></button></span>
          </form>       
        </div>

      
      <!-- account icon visible through lg-sm -- modal opens up a login display-->
       <!--<a href="#"  id="accountIcon" class="col-centered pull-right col-lg-3 col-md-1 col-sm-2 col-sm-3 col-sm-pull-1 col-xs-1 hidden-xs" role="button" data-toggle="modal" data-target="#login-modal"><i class="fa fa-user-circle fa-4x" aria-hidden="true"></i></a>-->
    </div> <!--close row-->
  </div><!-- container end -->
 

  <!-- START MODAL LOGIN -  pops up box for login -->
  <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" align="center">
          <img class="img-rounded" id="img_logo" src="../images/GMlogo.png">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="fa fa-times-circle" aria-hidden="true"></i>
          </button>
        </div>
    		<div id="loginSession">
    		<!-- form for login info and verifying session/user -->
          <?php
              if(!isset($_SESSION['LOGIN']) || $_SESSION['LOGIN'] == "FALSE") {
                  echo '<form id="loginSession">';
                  echo '<div class="modal-body">';
                  echo '<input class="form-control" id="loginemail" type="text" name="email" value="" placeholder="Email" required>';
                  echo '<input id="loginpassword" class="form-control" "loginpassword" type="password" name="password" value="" placeholder="Password" required>';
                  echo '<div class="checkbox"><label><input type="checkbox"> Remember me</label></div>';
                  echo '</div>'; /*modal body end */
                  echo '<div class="modal-footer">';
                  echo '<div><button class="btn btn-success btn-lg btn-block" id="login_btn" name="login" type="submit" value="login home"  action="../logInUser.php" method="post">Login</button></div>';
                   echo '<a href="recover.php"><input class="btn-link" name="passrec" type="button" value="Forgot Password" /></a></div>';
                  echo '</div>'; /* end modal footer */
                 /* echo '<a href="recover.php"><input class="user redbutton" name="passrec" type="button" value="Forgot Password" /></a></div>'; */
                  echo '</form>';
              }
               elseif ($_SESSION['LOGIN'] == "TRUE") {
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
          </div>
      </div>    <!-- end modal content -->   
    </div> <!-- end modal-dialogue -->
  </div> <!-- END MODAL LOGIN -->

  <nav class="navbar navbar-default" role="navigation"> <!-- start default nav -->
      <div class="navbar-header container-fluid ">
        <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target=".navmenu" data-canvas="body">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
    <div class ="container-fluid">
      <div class="collapse navbar-collapse"> 
        <ul class="nav navbar-nav" id="navCats"  id="mainCategoryType"> <!-- navbar list items -->
           <li class="dropdown">
            <a href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Womens/c/18159169/offset=0&sort=priceAsc" class="dropdown-toggle" data-toggle="dropdown disabled" role="button" aria-haspopup="true" aria-expanded="false">Women<span class="sr-only"></span></a>
            <?php include 'includes/menu_women.php'; ?>
          </li> <!-- end nav dropdown for multi columns -->
          
          <li class="dropdown"  id="mainCategoryType">
            <a  href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Accessories/c/18195523/offset=0&sort=priceAsc" class="dropdown-toggle" data-toggle="dropdown disabled" role="button" aria-haspopup="true" aria-expanded="false">Accessories <span class="sr-only"></span></a>
              <?php include 'includes/menu_accessories.php'; ?>
          </li>

          <li class="dropdown"  id="mainCategoryType">
            <a href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Mens/c/18159150/offset=0&sort=priceAsc" class="dropdown-toggle" data-toggle="dropdown disabled" role="button" aria-haspopup="true" aria-expanded="false">Men <span class="sr-only"></span></a>
            <?php include 'includes/menu_men.php'; ?>
          </li> 
          
          <li class="dropdown"  id="mainCategoryType">
            <a href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Juniors/c/18195671/offset=0&sort=priceAsc" class="dropdown-toggle" data-toggle="dropdown disabled" role="button" aria-haspopup="true" aria-expanded="false">Juniors <span class="sr-only"></span></a>
            <?php include 'includes/menu_juniors.php'; ?>
          </li>  

          <li class="dropdown"  id="mainCategoryType">
            <a  href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Kids/c/18209039/offset=0&sort=priceAsc" class="dropdown-toggle" data-toggle="dropdown disabled" role="button" aria-haspopup="true" aria-expanded="false">Kids <span class="sr-only"></span></a>
              <?php include 'includes/menu_kids.php'; ?>
          </li>  
          <li class="dropdown"  id="mainCategoryType">
            <a "../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Fitness/c/18209624/offset=0&sort=priceAsc" class="dropdown-toggle" data-toggle="dropdown disabled" role="button" aria-haspopup="true" aria-expanded="false">Fitness <span class="sr-only"></span> </a>
            <?php include 'includes/menu_fitness.php'; ?>
          </li>  

          <li class="dropdown"  id="mainCategoryType">
            <a  href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Food/c/18209702/offset=0&sort=priceAsc" class="dropdown-toggle" data-toggle="dropdown disabled" role="button" aria-haspopup="true" aria-expanded="false"  id="mainCategoryType">Food <span class="sr-only"></span> </a>
             <?php include 'includes/menu_food.php'; ?>
          </li>  

          <li class="dropdown"  id="mainCategoryType">
            <a  href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Entertainment/c/18209743/offset=0&sort=priceAsc" class="dropdown-toggle" data-toggle="dropdown disabled" role="button" aria-haspopup="true" aria-expanded="false">Entertainment<span class="sr-only"></span> </a>
             <?php include 'includes/menu_entertainment.php'; ?>
          </li>  

          <li class="dropdown" id="mainCategoryType">
            <a  href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Houseware/c/18209794/offset=0&sort=priceAsc" class="dropdown-toggle" data-toggle="dropdown disabled" role="button" aria-haspopup="true" aria-expanded="false">Home <span class="sr-only"></span></a>
            <?php include 'includes/menu_housewares.php'; ?>
          </li>         

          <li class="dropdown"  id="mainCategoryType">
            <a  href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Health/c/18209818/offset=0&sort=priceAsc" class="dropdown-toggle" data-toggle="dropdown disabled" role="button" aria-haspopup="true" aria-expanded="false">Health<span class="sr-only"></span> </a>
            <?php include 'includes/menu_health.php'; ?>
          </li>  

          <li class="dropdown"  id="mainCategoryType">
            <a  href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Inspirational/c/18209845/offset=0&sort=priceAsc" class="dropdown-toggle" data-toggle="dropdown disabled" role="button" aria-haspopup="true">Inspirational<span class="sr-only"></span> </a>
            <?php include 'includes/menu_inspirational.php'; ?>
          </li>  

          <li class="dropdown"  id="mainCategoryType">
            <a  href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Holiday/c/18209901/offset=0&sort=priceAsc"  class="dropdown-toggle" data-toggle="dropdown disabled" role="button" aria-haspopup="true">Holiday<span class="sr-only"></span> </a>
              <?php include 'includes/menu_holiday.php'; ?>
          </li>  

          <li class="dropdown"  id="mainCategoryType">
            <a  href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Business/c/18209939/offset=0&sort=priceAsc"  class="dropdown-toggle" data-toggle="dropdown disabled" role="button" aria-haspopup="true">Business<span class="sr-only"></span> </a>
                <?php include 'includes/menu_business.php'; ?>
          </li>
          <li class="divider-vertical" style="border-right: 1px solid white !important;border-left: 1px solid white !important"></li>

                          
          <!--<li class="dropdown" id="fundraiserExamples"><a href="#"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Fundraiser Examples <span class="sr-only"></span></a>-->
            <!--<ul class="dropdown-menu">-->
            <!--    <li class="dropdown-submenu">-->
            <!--      <a class="fund_examples" href="#" tabindex="-1"><i class="fa fa-caret-left fa-lg-1" aria-hidden="true"></i>Schools</a>-->
          <!--      	 <ul class="dropdown-menu dropdown-menu-right">-->
          <!--            <php include 'includes/menu_education_examples.php'; ?>-->
          <!--        </ul>-->
          <!--      </li>-->
          <!--      <li class="dropdown-submenu">-->
          <!--        <a class="fund_examples" href="#" tabindex="-1"><i class="fa fa-caret-left fa-lg-1" aria-hidden="true"></i>Organizations</a>-->
          <!--      <ul class="dropdown-menu dropdown-menu-right">-->
          <!--        <php include 'includes/menu_organization_examples.php'; ?>-->
          <!--      </ul>-->
          <!--    </li>-->
          <!--  </ul>-->
          <!--</li><!-- end multi-level dropdown -->
          <!-- <li> start for login button functions | dropdown | "setting non-functional atm 
         <#% if logged_in? %> - dropdown options showed if a user is logged in 
          <li class="dropdown"> <!-- start dropdown 
           <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b class="caret">   </b></a>
            <ul class="dropdown-menu">
              <li>Profile</li> <!-- not even close to being finished -->
              <!--<li>Settings</li>  Not working / will allow for editing prfoile 
              <li class="divider"></li> -->
              <!--<li>-->
              <!--  Logout<!--<%= link_to "Log out", logout_path, method: "delete" %> -->
              <!--</li>-->
           <!-- </ul> -end dropdown menu -->
         <!-- </li>  End dropdown -->

          <!--<ul class="dropdown-menu">-->
          <!--      <li class="dropdown-submenu">-->
          <!--        <a class="fund_examples" href="#" tabindex="-1"><i class="fa fa-caret-left fa-lg-1" aria-hidden="true"></i>Schools</a>-->
        <span id="navbar-examples-wrap" style="float:left;margin:0 !important;">
          <li id="navbar-examples-title" style="padding:6px 0 5px 0;font-weight: 600;letter-spacing: 0.5px;border-bottom: 1px solid white !important;margin-right:-9px;margin-left:-9px">Fundraiser Examples
          </li>
          <li id="fund-example-item" class="dropdown" style="display:inline-block;padding:7px 10px 0 15px;">
            <a style="color:white;text-decoration:none;font-weight:bold;” href="#"  class="dropdown-toggle"  role="button" id="mainCategoryType">Schools<span class="sr-only"></span></a>
             <ul class="dropdown-menu example-list-edu" >
              <?php include 'includes/menu_education_examples.php'; ?>
            </ul>
          </li>
	<span class="fund-divider" style="border-left:1px solid white !important;padding:7px 0 14px 0 !important;"></span>
          </li>
          <li id="fund-example-item" class="dropdown" style="display:inline-block;padding:7px 6px 0 5px;">
            <a style="color:white;text-decoration:none;font-weight:bold;" href="#">Organizations<span class="sr-only"></span></a>
            <ul class="dropdown-menu example-list-org" data-toggle="dropdown disabled" role="button" aria-haspopup="true" aria-expanded="false">
              <?php include 'includes/menu_organization_examples.php'; ?>
            </ul>
          </li>
      </span>
      <li class="divider-vertical" style="border-right: 1px solid white !important;border-left: 1px solid white !important; hideden-sm hidden-xs hidden-md"></li>
      <li role="button" data-toggle="modal" data-target="#login-modal" aria-hidden="true"><a href="#">Account</a></li>



      <!--      <a href="#"  class="dropdown-toggle" >&#09;Schools</li> <span class="sr-only"></span></a>-->
      <!--      <ul class="dropdown-menu" >-->
      <!--        <php include 'includes/menu_education_examples.php'; ?>-->
      <!--      </ul>-->
      <!--  </li><!-- end multi-level dropdown -->
      <!--  <li class="dropdown" id="fundraiserExamples">-->
      <!--    <a href="#"  class="dropdown-toggle" role="button" id="mainCategoryType"><br>&#09;Organizations&#09;&#09;&#09;&#09;<span class="sr-only"></span></a>-->
      <!--    <ul class="dropdown-menu" >-->
      <!--    ?php include 'includes/menu_organization_examples.php'; ?>-->
      <!--  </ul>-->
      <!--</li>-->
      </div> 
    </div><!-- end container -->
  </nav> <!-- end nav -->

    <!-- Code for navbar collapse to SIDEBAR on MOBILE screens -->
  <div class="navmenu navmenu-default navmenu-fixed-left offcanvas" >                
    <ul class="nav navmenu-nav">
      <!--<span role="button" data-toggle="modal" data-target="#login-modal" aria-hidden="true">Login</span>-->

          <li class="dropdown" id="fundraiserExamples">
            <a href="#"  class="dropdown-toggle"  role="button" id="mainCategoryType">School Examples <span class="sr-only"></span></a>
            <ul class="dropdown-menu" >
              <?php include 'includes/menu_education_examples.php'; ?>
            </ul>
          </li><!-- end multi-level dropdown -->
          
          <li class="dropdown" id="fundraiserExamples">
          <a href="#"  class="dropdown-toggle" role="button" id="mainCategoryType">Organization Examples <span class="sr-only"></span></a>
          <ul class="dropdown-menu" >
          <?php include 'includes/menu_organization_examples.php'; ?>
        </ul>
      </li>

      <li class="dropdown">
        <a href="#" class="dropdown-toggle " role="button" aria-haspopup="true" aria-expanded="false" id="mainCategoryType">Women <span class="sr-only"></span></a>
          <?php include 'includes/menu_women.php'; ?>
      </li> <!-- end nav dropdown for multi columns -->
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false"  id="mainCategoryType">Accessories <span class="sr-only"></span></a>
            <?php include 'includes/menu_accessories.php'; ?>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false"  id="mainCategoryType">Men <span class="sr-only"></span></a>
            <?php include 'includes/menu_men.php'; ?>
      </li> 
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" role="button"aria-haspopup="true" aria-expanded="false"  id="mainCategoryType">Juniors <span class="sr-only"></span></a>
            <?php include 'includes/menu_juniors.php'; ?>
      </li>  
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false"  id="mainCategoryType">Kids <span class="sr-only"></span> </a>
        <?php include 'includes/menu_kids.php'; ?>
      </li>  
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" role="button"  aria-haspopup="true" aria-expanded="false" id="mainCategoryType">Fitness <span class="sr-only"></span> </a>             
          <?php include 'includes/menu_fitness.php'; ?>
      </li>  
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false"  id="mainCategoryType">Food <span class="sr-only"></span></a>
          <?php include 'includes/menu_food.php'; ?>
      </li>  
      <li class="dropdown">
        <a href="#" class="dropdown-toggle"  role="button" aria-haspopup="true" aria-expanded="false"  id="mainCategoryType">Entertainment <span class="sr-only"></span></a>
         <?php include 'includes/menu_entertainment.php'; ?>
      </li>  
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false"  id="mainCategoryType">Home <span class="sr-only"></span></a>
            <?php include 'includes/menu_housewares.php'; ?>
      </li>         
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" role="button"  aria-haspopup="true" aria-expanded="false"  id="mainCategoryType">Health <span class="sr-only"></span> </a>
        <?php include 'includes/menu_health.php'; ?>
      </li>  
      <li class="dropdown" >
        <a href="#"  id="mainCategoryType" class="dropdown-toggle"  role="button" aria-haspopup="true" aria-expanded="false">Inspirational <span class="sr-only"></span></a>
          <?php include 'includes/menu_inspirational.php'; ?>
      </li>  
      <li class="dropdown">
        <a href="#"  id="mainCategoryType" class="dropdown-toggle"  role="button" aria-haspopup="true" aria-expanded="false">Holiday <span class="sr-only"></span></a>
        <?php include 'includes/menu_holiday.php'; ?>
      </li>  
      <li class="dropdown">
        <a href="#"  id="mainCategoryType" class="dropdown-toggle"  role="button" aria-haspopup="true" aria-expanded="false">Business <span class="sr-only"></span></a>
        <?php include 'includes/menu_business.php'; ?>
      </li>
    </ul>
  </div> 
</header>

