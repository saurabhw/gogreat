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
  
  <link rel="preload" href="../css2/global_styles.css" as="style" onload="this.rel='stylesheet'"> <!-- asynch css load -->
  <noscript><link rel="stylesheet" href="../css2/global_styles.css"></noscript><!-- load styles for browsers with JS disabled -->
  <!-- bootstrap file, avoid editing if possible, find the classes you need and then override them in global styles -->
  <link rel="preload" href="../css2/bootstrap.css"  as="style" onload="this.rel='stylesheet'"> <!-- asynch css load -->
  <noscript><link rel="stylesheet" href="../css2/bootstrap.css"></noscript><!-- load styles for browsers with JS disabled -->
  
  <link rel="preload" href="../css2/content_styles.css" as="style" onload="this.rel='stylesheet'"> <!-- asynch css load -->
  <noscript><linkrel="stylesheet" href="../css2/content_styles.css"></noscript><!-- load styles for browsers with JS disabled -->
  <!-- top navigation styles -->
  <link rel="preload" href="../css2/main_nav.css" as="style" onload="this.rel='stylesheet'"> <!-- asynch css load -->
  <noscript><link rel="stylesheet" href="../css2/main_nav.css"></noscript><!-- load styles for browsers with JS disabled -->
  
	<!-- jQuery (required) 
	**ALL OTHER CDNS LOCATED IN FOOTER, AS FOOTERS ARE ALWAYS LOCATED BEFORE BODY CLOSING TAG - the ideal spot of JS/jQuery**
	*For some reason jasny needs jquery listed in header as well to allow for sidenav dropdowns to collapse correctly ? -->
   <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
    <!--dont use min version of jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <!-- function for loading basic content for browser with JS disabled -->
	<script>
	/*! loadCSS. [c]2017 Filament Group, Inc. MIT License */
	!function(a){"use strict";var b=function(b,c,d){function e(a){return h.body?a():void setTimeout(function(){e(a)})}function f(){i.addEventListener&&i.removeEventListener("load",f),i.media=d||"all"}var g,h=a.document,i=h.createElement("link");if(c)g=c;else{var j=(h.body||h.getElementsByTagName("head")[0]).childNodes;g=j[j.length-1]}var k=h.styleSheets;i.rel="stylesheet",i.href=b,i.media="only x",e(function(){g.parentNode.insertBefore(i,c?g:g.nextSibling)});var l=function(a){for(var b=i.href,c=k.length;c--;)if(k[c].href===b)return a();setTimeout(function(){l(a)})};return i.addEventListener&&i.addEventListener("load",f),i.onloadcssdefined=l,l(f),i};"undefined"!=typeof exports?exports.loadCSS=b:a.loadCSS=b}("undefined"!=typeof global?global:this);
	/*! loadCSS rel=preload polyfill. [c]2017 Filament Group, Inc. MIT License */
	!function(a){if(a.loadCSS){var b=loadCSS.relpreload={};if(b.support=function(){try{return a.document.createElement("link").relList.supports("preload")}catch(b){return!1}},b.poly=function(){for(var b=a.document.getElementsByTagName("link"),c=0;c<b.length;c++){var d=b[c];"preload"===d.rel&&"style"===d.getAttribute("as")&&(a.loadCSS(d.href,d,d.getAttribute("media")),d.rel=null)}},!b.support()){b.poly();var c=a.setInterval(b.poly,300);a.addEventListener&&a.addEventListener("load",function(){b.poly(),a.clearInterval(c)}),a.attachEvent&&a.attachEvent("onload",function(){a.clearInterval(c)})}}}(this);
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
        $('#accountIcon, #accountIconMobile').click(function () {
            $('login-modal').modal({
                show: true
            })
        });
            $(document).on('show.bs.modal', '.modal', function (event) {
                var zIndex = 1040 + (10 * $('.modal:visible').length);
                $(this).css('z-index', zIndex);
                setTimeout(function() {
                    $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
                }, 0);
            }); $('[data-toggle="tooltip"]').tooltip(); 
    });
   
  </script>
  
    <script>/* remove containers so dropdowns are consistant inside sidenavigation */
        $(function () {
        $(window).on('load, resize', function () {
            var viewportWidth = $(window).width();
            if (viewportWidth < 1183) {
                $(".dropdown-menu #dropdownrow-large").removeClass("container");
                 $(".dropdown-menu #dropdownrow").removeClass("container").removeClass("container-fluid");
            }else{
                $(".dropdown-menu #dropdownrow-large").addClass("container"),
                $(".dropdown-menu #dropdownrow").addClass("container").addClass("container-fluid");
            }
        })
        .resize();
        });
     </script>
     
     <script> //pause play carousel, switch active classes depedning on button clicked */
        $(function () {
            $('#carousel-presentation').carousel({
                interval:6500,
                pause: "false"
            });
            $('#playButton').click(function () {
                $('#carousel-presentation').carousel('cycle');
                $('#pauseButton').removeClass('active');
            });
            $('#pauseButton').click(function () {
                $('#carousel-presentation').carousel('pause');
                $('#pauseButton').addClass('active');
                $('#playButton').removeClass('active');
            });
        });
	</script>

</head>
<header>
    
    <div class ="container-fluid"> <!-- START above nav elements content container -->
       <div class="row-fluid" id="aboveNavElements">
          <a href="#" class="hidden-lg hidden-md pull-right" id="accountIcon" role="button" data-toggle="modal" data-target="#login-modal"><i data-toggle="tooltip" data-placement="left" title="Account Login and Information" class="fa fa-user fa-3x" aria-hidden="true"></i></a>

          <div id="headerImage" class="col-lg-3 col-md-1 col-sm-1" style="">
              <a href="../index.php"><img class="img-responsive" src="../images/GMlogo.png" alt="GMlogo" class="img-responsive"></img></a>
          </div>

          <div id="bannerHeader" class="col-lg-7 col-lg-push-1 col-md-7 col-xs-12">
  	        <img class="img-responsive" src="../images/main_2.jpg" alt="Main Banner Image. Achieve Great Goals!"/>   
          </div>    

          <a href="#"  id="accountIcon" class="pull-right  hidden-sm hidden-xs" role="button" data-toggle="modal" data-target="#login-modal"><i class="fa fa-user fa-4x" aria-hidden="true" style="text-indent: 5px;"></i>Account</a>

      </div>
    </div><!-- END above nav elements -->






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
            <?php include 'menu/menu_women.php'; ?>
         </li> <!-- end nav dropdown for multi columns -->
          
         <li class="dropdown"  id="mainCategoryType">
            <a  href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Accessories/c/18195523/offset=0&sort=priceAsc" class="dropdown-toggle" data-toggle="dropdown disabled" role="button" aria-haspopup="true" aria-expanded="false">Accessories <span class="sr-only"></span></a>
              <?php include 'menu/menu_accessories.php'; ?>
         </li>

          <li class="dropdown"  id="mainCategoryType">
            <a href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Mens/c/18159150/offset=0&sort=priceAsc" class="dropdown-toggle" data-toggle="dropdown disabled" role="button" aria-haspopup="true" aria-expanded="false">Men <span class="sr-only"></span></a>
            <?php include 'menu/menu_men.php'; ?>
          </li> 
          
          <li class="dropdown"  id="mainCategoryType">
            <a href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Juniors/c/18195671/offset=0&sort=priceAsc" class="dropdown-toggle" data-toggle="dropdown disabled" role="button" aria-haspopup="true" aria-expanded="false">Juniors <span class="sr-only"></span></a>
            <?php include 'menu/menu_juniors.php'; ?>
          </li>  

          <li class="dropdown"  id="mainCategoryType">
            <a  href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Kids/c/18209039/offset=0&sort=priceAsc" class="dropdown-toggle" data-toggle="dropdown disabled" role="button" aria-haspopup="true" aria-expanded="false">Kids <span class="sr-only"></span></a>
              <?php include 'menu/menu_kids.php'; ?>
          </li>  
          <li class="dropdown"  id="mainCategoryType">
            <a "../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Fitness/c/18209624/offset=0&sort=priceAsc" class="dropdown-toggle" data-toggle="dropdown disabled" role="button" aria-haspopup="true" aria-expanded="false">Fitness <span class="sr-only"></span> </a>
            <?php include 'menu/menu_fitness.php'; ?>
          </li>  

          <li class="dropdown"  id="mainCategoryType">
            <a  href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Food/c/18209702/offset=0&sort=priceAsc" class="dropdown-toggle" data-toggle="dropdown disabled" role="button" aria-haspopup="true" aria-expanded="false"  id="mainCategoryType">Gifts <span class="sr-only"></span> </a>
             <?php include 'menu/menu_food.php'; ?>
          </li>  

          <li class="dropdown"  id="mainCategoryType">
            <a  href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Entertainment/c/18209743/offset=0&sort=priceAsc" class="dropdown-toggle" data-toggle="dropdown disabled" role="button" aria-haspopup="true" aria-expanded="false">Entertainment<span class="sr-only"></span> </a>
             <?php include 'menu/menu_entertainment.php'; ?>
          </li>  

          <li class="dropdown" id="mainCategoryType">
            <a  href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Houseware/c/18209794/offset=0&sort=priceAsc" class="dropdown-toggle" data-toggle="dropdown disabled" role="button" aria-haspopup="true" aria-expanded="false">Home <span class="sr-only"></span></a>
            <?php include 'menu/menu_housewares.php'; ?>
          </li>         

          <li class="dropdown"  id="mainCategoryType">
            <a  href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Health/c/18209818/offset=0&sort=priceAsc" class="dropdown-toggle" data-toggle="dropdown disabled" role="button" aria-haspopup="true" aria-expanded="false">Health<span class="sr-only"></span> </a>
            <?php include 'menu/menu_health.php'; ?>
          </li>  

          <li class="dropdown"  id="mainCategoryType">
            <a  href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Inspirational/c/18209845/offset=0&sort=priceAsc" class="dropdown-toggle" data-toggle="dropdown disabled" role="button" aria-haspopup="true">Inspirational<span class="sr-only"></span> </a>
            <?php include 'menu/menu_inspirational.php'; ?>
          </li>  

          <li class="dropdown"  id="mainCategoryType">
            <a  href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Holiday/c/18209901/offset=0&sort=priceAsc"  class="dropdown-toggle" data-toggle="dropdown disabled" role="button" aria-haspopup="true">Holiday<span class="sr-only"></span> </a>
              <?php include 'menu/menu_holiday.php'; ?>
          </li>  

          <li class="dropdown"  id="mainCategoryType">
            <a  href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Business/c/18209939/offset=0&sort=priceAsc"  class="dropdown-toggle" data-toggle="dropdown disabled" role="button" aria-haspopup="true">Business<span class="sr-only"></span> </a>
                <?php include 'menu/menu_business.php'; ?>
          </li>
          <!--<li class="divider-vertical" style="border-right: 1px solid white !important;border-left: 1px solid white !important"></li>-->

          <!-- fundraiser examples main navigation start -->
          <li id="fund-border" class="divider-vertical" style="border-right: 1px solid white !important;border-left: 1px solid transparent !important"></li>
          <span id="navbar-examples-wrap">
            <li id="navbar-examples-title">Fundraiser Examples</li>
              <li id="fund-example-item" class="dropdown">
                <a id="school-drop-link" data-toggle="dropdown disabled" role="button" aria-haspopup="true" aria-expanded="false">Schools<span class="sr-only"></span></a>
                   <ul class="dropdown-menu example-list-edu" >
                    <?php include 'includes/menu_education_examples.php'; ?>
                  </ul>
              </li>
            <span class="fund-divider"></span>
            <li id="fund-example-item" class="dropdown">
              <a id="orgs-drop-link" href="#"  class="dropdown-toggle"  role="button" id="mainCategoryType">Organizations<span class="sr-only"></span></a>
                              <ul class="dropdown-menu example-list-org">
                  <?php include 'includes/menu_organization_examples.php'; ?>
                </ul>
            </li>
          </span>
          <li id="fund-border" class="divider-vertical" style="border-right: 1px solid transparent !important;border-left: 1px solid white !important"></li>

        <!--<li id="login-button" role="button" data-toggle="modal" data-target="#login-modal" aria-hidden="true"><a href="#"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Login</a></li>-->
      </div> 
    </div><!-- end container -->
  </nav> <!-- end nav -->

    <!-- Code for navbar collapse to SIDEBAR on MOBILE screens -->
  <div class="navmenu navmenu-default navmenu-fixed-left offcanvas" >                
    <ul class="nav navmenu-nav">
      <!--<span role="button" data-toggle="modal" data-target="#login-modal" aria-hidden="true">Login</span>-->
      <li class="dropdown">
        <a href="#" class="dropdown-toggle " role="button" aria-haspopup="true" aria-expanded="false" id="mainCategoryType">Women <span class="sr-only"></span></a>
          <?php include 'menu/menu_women.php'; ?>
      </li> <!-- end nav dropdown for multi columns -->
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false"  id="mainCategoryType">Accessories <span class="sr-only"></span></a>
            <?php include 'menu/menu_accessories.php'; ?>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false"  id="mainCategoryType">Men <span class="sr-only"></span></a>
            <?php include 'menu/menu_men.php'; ?>
      </li> 
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" role="button"aria-haspopup="true" aria-expanded="false"  id="mainCategoryType">Juniors <span class="sr-only"></span></a>
            <?php include 'menu/menu_juniors.php'; ?>
      </li>  
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false"  id="mainCategoryType">Kids <span class="sr-only"></span> </a>
        <?php include 'menu/menu_kids.php'; ?>
      </li>  
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" role="button"  aria-haspopup="true" aria-expanded="false" id="mainCategoryType">Fitness <span class="sr-only"></span> </a>             
          <?php include 'menu/menu_fitness.php'; ?>
      </li>  
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false"  id="mainCategoryType">Gifts <span class="sr-only"></span></a>
          <?php include 'menu/menu_food.php'; ?>
      </li>  
      <li class="dropdown">
        <a href="#" class="dropdown-toggle"  role="button" aria-haspopup="true" aria-expanded="false"  id="mainCategoryType">Entertainment <span class="sr-only"></span></a>
         <?php include 'menu/menu_entertainment.php'; ?>
      </li>  
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false"  id="mainCategoryType">Home <span class="sr-only"></span></a>
            <?php include 'menu/menu_housewares.php'; ?>
      </li>         
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" role="button"  aria-haspopup="true" aria-expanded="false"  id="mainCategoryType">Health <span class="sr-only"></span> </a>
        <?php include 'menu/menu_health.php'; ?>
      </li>  
      <li class="dropdown" >
        <a href="#"  id="mainCategoryType" class="dropdown-toggle"  role="button" aria-haspopup="true" aria-expanded="false">Inspirational <span class="sr-only"></span></a>
          <?php include 'menu/menu_inspirational.php'; ?>
      </li>  
      <li class="dropdown">
        <a href="#"  id="mainCategoryType" class="dropdown-toggle"  role="button" aria-haspopup="true" aria-expanded="false">Holiday <span class="sr-only"></span></a>
        <?php include 'menu/menu_holiday.php'; ?>
      </li>  
      <li class="dropdown">
        <a href="#"  id="mainCategoryType" class="dropdown-toggle"  role="button" aria-haspopup="true" aria-expanded="false">Business <span class="sr-only"></span></a>
        <?php include 'menu/menu_business.php'; ?>
      </li>
        <li class="dropdown" id="fundraiserExamples">
          <a href="#"  class="dropdown-toggle" role="button" id="mainCategoryType">School Examples <span class="sr-only"></span></a>
            <!--<ul class="dropdown-menu">-->
              <?php include 'menu/menu_education_examples.php'; ?>
            <!--</ul>-->
          </li>
          <li class="dropdown" id="fundraiserExamples">
            <a href="#" class="dropdown-toggle" role="button" id="mainCategoryType">Organization Examples <span class="sr-only"></span></a>
            <ul class="dropdown-menu">
              <?php include 'menu/menu_organization_examples.php'; ?>
            </ul>
          </li>
        <li class="divider"></li>
      </ul> <!-- end navmenu -->
    </div> <!--end side nav -->
    
    
<!-- Login/logged in/change pw modal elements -->    
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
                  echo '<form id="loginform" action="../logInUser.php" method="POST">';
                  echo '<div class="modal-body">';
                  echo '<input class="form-control" id="loginemail" type="text" name="email" value="" placeholder="Email" required>';
                  echo '<input id="loginpassword" class="form-control" "loginpassword" type="password" name="password" value="" placeholder="Password" required>';
                //   echo '<div class="checkbox"><label><input type="checkbox"> Remember me</label></div>';
                  echo '</div>'; /*modal body end */
                  echo '<div class="modal-footer">';
                  echo '<div><button class="btn btn-success btn-lg btn-block" id="login_btn" name="submit" type="submit" value="login">Login</button></div>';
                   echo '<a href="recover.php"><input class="btn-link" name="passrec" type="button" value="Forgot Password" /></a></div>';
                  echo '</div>'; /* end modal footer */
                 /* echo '<a href="recover.php"><input class="user redbutton" name="passrec" type="button" value="Forgot Password" /></a></div>'; */
                  echo '</form>';
              }
               elseif ($_SESSION['LOGIN'] == "TRUE") {
                        echo '<div class="modal-body">';
                            echo '<div class="mallmenu">';
            	            echo '<h4><a href="index.php">GreatMoods Homepage</a></h4>';
            	         	echo '<h4><a href="'.$_SESSION['home'].'"/>Account Home</a></h4>';
                	        echo '<h4><a href="../reset.php">Change My Password</a></h4>';
            	         	echo '</div>'; /*modal body end */
            	         	echo '<div class="modal-footer">';
			         	    include('includes/logout.inc.php');
			         	    echo '</div>'; /*modal body end */
                } 
           ?>
          </div>
      </div>    <!-- end modal content -->   
    </div> <!-- end modal-dialogue -->
  </div> <!-- END MODAL LOGIN -->
    
          <!-- Reset PW Modal  
          || WHILE ALL FUNCTIONS WORKED FINE FOR THIS, IT DOES NOT PROPERLY STORE PWs || 
          || Saving so I can look into utilizing PHP for reset inside this modal - have used it to show messages based on button submit, but pws still did not change ||
        <div class="modal fade" id="change-pw">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" align="center">
                      <img class="img-rounded" id="img_logo" src="../images/GMlogo.png">
                    </div>
                	<!-- change pw modal2 form 
                  </?php
                        if($_SESSION['LOGIN'] == "TRUE") {
                                echo '<div class="modal-body">';
              	         	    echo '<h3>Change Your Password</h3>';
                                echo '<form id="change-pw-form" method="POST">';
                                echo '<input  class="form-control" type="password" name="password" value"" palceholder="Enter New Password" required>';
                                echo '<input class="form-control" type="password" name="cpassword" value"" placeholder= Confirm New Password" required>';
                                echo '</div>'; /*modal body end */
                                echo '<div class="modal-footer">';
                                echo '<button class="btn btn-success btn-lg btn-block" type="submit" name="submit" value="Change Password" id="changBtn" required>Change Password</button>';
                                echo '  </form>';
                                echo '<br><a class="btn btn-sm btn-primary" href="#" data-dismiss="modal">Back</a>';
                                echo '</div>'; /* end modal footer */
                        }
                	  ?>
                </div>    <!-- end modal content  
            </div> <!-- end modal-dialogue 
        </div>  END MODAL CHANGEPW -->

</header>
<!--<li>
    <a href="#">GreatMoods<br>Mall Directory</a>
    <php include 'includes/menu_mall_directory_site.php'; ?>
</li> -->


