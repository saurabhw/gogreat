<?php
   session_start();
   if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
   include '../includes/connection.inc.php';
   include '../includes/functions.php';
   include('../samplewebsites/imageFunctions.inc.php');
   if(isset($_POST['submit1']))
   {
      $_SESSION['role'] = "Member";
      $_SESSION['home'] = "fundMember/memberLogin.php";
   }
   $link = connectTo();
   $table = "Dealers";
   $user = $_SESSION['email']; 
   $userID = $_SESSION['userId'];
   
   $queryT = "SELECT * FROM user_info WHERE userInfoId='$userID'";
   $resultT = mysqli_query($link, $queryT)or die ("couldn't execute query on query 1.".mysqli_error($link));
   $rowT = mysqli_fetch_assoc($resultT);
   $myPic = $rowT['picPath'];
   
  
?>
<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<title>Member Login | GreatMoods</title>
	 <!-- jQuery (required) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	
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
	<link rel="shortcut icon" href="../images/favicon.ico">
	<link rel="stylesheet" type="text/css" href="../css/global_styles.css">
	<link rel="stylesheet" type="text/css" href="../css/allforms_styles.css">
	<link rel="stylesheet" href="../images/font-awesome-4.6.3/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="../jquery-ui-1.10.3/themes/base/jquery-ui.css">
	<!--<link rel="stylesheet" href="../jquery-ui-1.7.2/css/base/ui.accordion.css">-->
	
	<script src="../js/js-image-slider.js" type="text/javascript"></script>
	<script src="../js/simpletabs_1.3.js"></script>
	<script src="../jquery-ui-1.10.3/ui/jquery-ui.js"></script>
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
</head>

<body>
<div id="container">
	<div id="headerMain">
		<div id="bannerwrap"><a href="http://greatmoods.com"><img id="logo2" src="../images/whitelogo.png" alt="GreatMoods Logo"></a><img id="banner" src="../images/Header-new_Homepage-Collage.png" width="1024" height="150" alt="banner placeholder" /></div>
		
		
    	<div id="menuWrapper"> </div>
 
	<ul class="nav">
		<li><a class="logintitle" href="#">My Account<br>Sign In</a>
	    		<div class="newlogin">
			        <?php
			            if(!isset($_SESSION['LOGIN']) || $_SESSION['LOGIN'] == "FALSE") {
			                echo '<form id="newlogin" action="../logInUser.php" method="post">';
			                
			                echo '<input id="loginemail" type="text" name="email" value="" placeholder="email address">';
			                echo '<br>';
			                echo '<input id="loginpassword" type="password" name="password" value="" placeholder="password">';
			                echo '<br>';
			                echo '<input id="redbutton" class="user redbutton" name="login" type="submit" value="sign in" />';
			                echo '</form>';
			                
			            } elseif($_SESSION['LOGIN'] == "TRUE") {
			            	echo '<div class="loggedinMenu">';
			                echo '<h5>my account</h5>';
			         	echo '<span><a href="../reset.php">Change My Password</a></span>';
			         	echo '<br>';
			         	include('../includes/logout.inc.php');
			         	echo '</div>';
			              }
			         ?>
		    
	      		</div> <!--end login-->
		</li>
		
		<?php
	         if(isset($_SESSION['authenticated']))
	        {
	        ?>
	        <!--<li><a href="../membersite.php?group=<? echo $_SESSION['fundid'];?>">View My Website</a></li>
	        <li><a href="gettingstarted.php?group=<? echo $_SESSION['fundid'];?>">Getting Started</a></li>
	          <li><a href="memberHome.php?group=<? echo $_SESSION['fundid'];?>">Account Home</a></li>
	          <li><a href="contacts.php?group=<? echo $_SESSION['fundid'];?>">View Contacts</a></li>
	          <li><a href="emails.php?group=<? echo $_SESSION['fundid'];?>">Send Emails</a></li>
	          <li><a href="fundsitehelp.php?group=<? echo $_SESSION['fundid'];?>">Help</a></li>-->
	        <?php }?>
	        
	</ul>

</div><!--end headerMain-->
	
	<div id="leftSideBar">
		<ul id="sideNav">
	  		<!--<li><a href="http://greatmoods.com"><i class="fa fa-home navicon"></i> Greatmoods Homepage</a></li>-->
	  	</ul> 
	  	<div class=""><img src="../<?php echo $myPic; ?>" class="profilepic" alt="profile Pic"></div>
	  	<br>
		<h1>Welcome <?php echo $_SESSION['firstName'];?>!</h1>
		<h3>Account Login</h3>	
		<div id="accordion">
  	        <h4>My Accounts</h4>
  	       <div>
  	       <?
  	        getAccounts1($userID);
  	       ?>
  	      </div></div>
	  	  	
	</div>
	
	<br>
			
	<div id="contentSample">			
		
			<!-- ********** Contact List, Account Info,  should be the same for all groups -->
				 <!-- groups below are just examples -->
				
				<h3>WELCOME TO YOUR FUNDRAISING ACCOUNT!</h3>
<b>
<p>STEP 1: UNDER MY ACCOUNTS ON THE LEFT-HAND SIDE, JUST CLICK ON THE RED  
BUTTON THAT STATES YOUR FUNDRAISING ACCOUNT TO GET STARTED.</p>
<p>
THEN YOU CAN GET STARTED PERSONALIZING YOUR FUNDRAISING WEBSITE AND  
SET UP YOUR FRIENDS AND FAMILY SUPPORTERS TO START YOUR FUNDRAISING.
</p><p>
REMEMBER, JUST CLICK YOUR RED BUTTON ON THE LEFT SIDE TO GET STARTED!
</p><p>
THANK YOU,

GREATMOODS TEAM.
	</p>	</b>		
				<br>	
		</div><!--end content-->
		
		<div class="clearfloat">  </div>
		
		<?php include 'footer.php' ; ?>
	</div> <!--end container-->
</body>
</html>