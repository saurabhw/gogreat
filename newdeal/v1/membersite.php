<?php
      session_start();
    
      ob_start();
      define("SITE_ROOT",$_SERVER["DOCUMENT_ROOT"].'/salesTest/');
      include("includes/connection.inc.php");
      include("includes/functions.php");
      $link = connectTo();
      $groupID = $_GET['group'];
      $userID = $_SESSION['userId'];
      /*
       if (isset($_SESSION['authenticated'])){
          // logging in user
          $groupID = $_SESSION['groupid'];
      }else{
        // customer from a link(not logged in)
      	   $groupID = $_GET['group'];
        } 
     
      
      $userName = $_SESSION['email'];
      $query1 = "SELECT * FROM Dealers WHERE email='$userName'";
      $result1 = mysqli_query($link, $query1)or die("MySQL ERROR query 1: ".mysqli_error($link));
      $row = mysqli_fetch_assoc($result1);
      $dealerID = $row['loginid'];
      $group = $row['setuppersonid']; 
      $groupID = $_GET['group'];
      //$groupID = $_SESSION['groupid']; 
     */
      $table = "Dealers";
      $query1 = "SELECT * FROM $table WHERE loginid ='$groupID'";
      $result1 = mysqli_query($link, $query1) or die(mysqli_error());
      $row = mysqli_fetch_assoc($result1);
      $club_name = mysqli_real_escape_string($link, $row['Dealer']);
      $club_type = mysqli_real_escape_string($link, $row['DealerDir']);
      //$goal = $row['goal2'];
      //$reasons = $row['FundraiserReasons'];
      $about = mysqli_real_escape_string($link, $row['About']);
      $so_far = getSoloSales($groupID);
      //$position = $row['samplePosition'];
      //$leader = $row['sampleFname'].' '.$row['sampleLname'];
      $phone = $row['Phone'];
      $email = $row['email'];
      //$contact_photo = $row['contact_group_photo'];
      $group_photo = $row['group_team_pic'];
      $leader_photo = $row['leader_pic'];
      $student_photo = $row['location_pic'];
      $location_pic = $row['location_pic'];
      $contact_pic = $row['contact_pic'];
      $myPic = $row['contact_pic'];
      $bb = $row['banner_path'];
      $start = $row['FundraiserStartDate'];
      $end = $row['FundraiserEndDate'];
      $_SESSION['banner'] = $banner_path;
      $setup_person = $row['setuppersonid'];
      $face = $row['facebook'];
      $twit = $row['twitter'];
      
      $parent_query = "SELECT * FROM Dealers WHERE loginid = '$setup_person'";
      $getParent = mysqli_query($link, $parent_query)or die(mysqli_error($link));
      $row7 = mysqli_fetch_assoc($getParent);
      $group_photo1 = $row7['group_team_pic'];
      $leader_photo1 = $row7['leader_pic'];
      $student_photo1 = $row7['location_pic'];
      $contact_pic1 = $row7['contact_pic'];
      $banner_path = $row7['banner_path'];
      $start1 = $row7['FundraiserStartDate'];
      $end1 = $row7['FundraiserEndDate'];
      $goal = $row7['goal2'];
      
      
      $query2 = "SELECT * FROM orgContacts WHERE fundraiserID = '$groupID'";
      $result2 = mysqli_query($link, $query2) or die(mysqli_error());
      $row2 = mysqli_fetch_assoc($result2);
      $leader = $row2['orgFName'].' '.$row2['orgLName'];
      $leader_title = $row2['Title'];
      $leader_email = $row2['orgEmail'];
      $leader_phone = $row2['orgPhone'];
      
      $query_e = "SELECT SUM(Amount) FROM IPNdata WHERE Rep='$groupID'";
      $result_e = mysqli_query($link, $query_e)or die ("couldn't execute ytd query.".mysqli_error($link));
      $row_e = mysqli_fetch_array($result_e);
      $amount = $row_e['SUM(Amount)'];
      
      $query3 = "SELECT * FROM orgMembers WHERE fundraiserID = '$groupID'";
      $result3 = mysqli_query($link, $query3) or die(mysqli_error($link));
      $row3 = mysqli_fetch_assoc($result3);
      $owner = $row3['orgFName'].' '.$row3['orgLName'];
      $owner_email = $row3['orgEmail'];
      $owner_phone = $row3['orgPhone'];
      $parent = $row3['fund_owner_id'];
      
      
      $query5 = "SELECT * FROM sample_websites WHERE club = '$club_type'";
      $result5 = mysqli_query($link, $query5) or die(mysqli_error($link));
      $row5 = mysqli_fetch_assoc($result5);
      $reasons = $row5['sampleReasons'];
      $reasons = rtrim($reasons, ".");
      
      $query8 = "SELECT * FROM captions WHERE fundid = '$setup_person'";
      $result8 = mysqli_query($link, $query8) or die(mysqli_error($link));
      $row8 = mysqli_fetch_assoc($result8);
      $capTitle1 = $row8['c1'];
      $cap1 = $row8['c1n'];
      $capTitle2 = $row8['c2'];
      $cap2 = $row8['c2n'];
     
      
?>

<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<title><? echo $owner;?>' Fundraiser</title>
	 <!-- jQuery (required) -->
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> sooooooo olddddddddd-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	
	<!-- Optional plugins -->
	<!--<script src="../CSS-Tricks-AnythingSlider/js/jquery.easing.1.2.js"></script>-->
	<!--<script src="../CSS-Tricks-AnythingSlider/js/swfobject.js"></script>-->
	
	<!-- Anything Slider -->
	<!--<link rel="stylesheet" href="../CSS-Tricks-AnythingSlider/css/anythingslider.css">-->
	<!--<script src="../CSS-Tricks-AnythingSlider/js/jquery.anythingslider.js"></script>-->
	
	<!-- Add the stylesheet(s) you are going to use here. -->
	<!--<link rel="stylesheet" href="../CSS-Tricks-AnythingSlider/css/theme-cs-portfolio.css">-->
	
	<!-- AnythingSlider optional extensions |  These are in header | Why they here? -->
	<!--<script src="../CSS-Tricks-AnythingSlider/js/jquery.anythingslider.fx.js"></script>-->
	<!--<script src="../CSS-Tricks-AnythingSlider/js/jquery.anythingslider.video.js"></script>-->
	<!--<link rel="shortcut icon" href="../images/favicon.ico">-->
	<!--<link rel="stylesheet" type="text/css" href="../css/global_styles.css">-->
	<!--<link rel="stylesheet" type="text/css" href="../css/allforms_styles.css">-->
	<!--<link rel="stylesheet" href="../images/font-awesome-4.6.3/css/font-awesome.min.css">-->

	<!--<link rel="stylesheet" type="text/css" href="../jquery-ui-1.10.3/themes/base/jquery-ui.css">-->
	<!--<link rel="stylesheet" href="../jquery-ui-1.7.2/css/base/ui.accordion.css">-->
	
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
	
	<!--<script src="../js/js-image-slider.js" type="text/javascript"></script>-->
</head>
<body>
    
<!-- MANY PHP ECHOS ARE NOT WORKING PROPERLY. WOOO PHP. GOOD STUFF. --> 
    
<?php include 'includes/fundHeader.php'; ?>
<!--<div class=""><?php include '../navigation/rightSidebar.php'; ?></div>-->
<?php include 'includes/memberSidebar.php'; ?><!-- columns md-2 lg-3 defined inside file -->
<div class="container">
    <div class="row-fluid">
        
        
<!--<div id="container">-->
<!--  <div id="headerMain"> -->
<!--  	<div id="bannerwrap"><a href="#"><img id="logo2" src="../images/whitelogo.png" alt="GreatMoods Logo"></a><img id="banner" src="../<?php echo $banner_path;?>" width="1024" height="150" alt="UPLOAD YOUR BANNER HERE!" /></div>-->
<!--    <div id="menuWrapper"> </div> <!--end menuWrapper-->

<!--      <ul class="nav">-->
<!--      	<li><a href="#">Women</a>-->
<!--        </?php include 'menu_women.php'; ?>-->
<!--	   </li>-->
<!--	    <li><a href="#">Accessories</a>-->
<!--	        </?php include 'menu_accessories.php'; ?>-->
<!--	    </li>-->
<!--	    <li><a href="#">Men</a>-->
<!--	        </?php include 'menu_men.php'; ?>-->
<!--	    </li>-->
<!--	    <li><a href="#">Juniors</a>-->
<!--	        </?php include 'menu_juniors.php'; ?>-->
<!--	    </li>-->
<!--	    <li><a href="#">Kids</a>-->
<!--	        </?php include 'menu_kids.php'; ?>-->
<!--	    </li>-->
<!--	    <li><a href="#">Fitness</a>-->
<!--	        </?php include 'menu_fitness.php'; ?>-->
<!--	    </li>-->
<!--	    <li><a href="#">Food</a>-->
<!--	        </?php include 'menu_food.php'; ?>-->
<!--	    </li>-->
<!--	    <li><a href="#">Entertainment</a>-->
<!--	        </?php include 'menu_entertainment.php'; ?>-->
<!--	    </li>-->
<!--	    <li><a href="#">Home</a>-->
<!--	        </?php include 'menu_housewares.php'; ?>-->
<!--	    </li>-->
<!--	    <li><a href="#">Health</a>-->
<!--	        </?php include 'menu_health.php'; ?>-->
<!--	    </li>-->
<!--	    <li><a href="#">Inspirational</a>-->
<!--	        </?php include 'menu_inspirational.php'; ?>-->
<!--	    </li>-->
<!--	    <li><a href="#">Holiday</a>-->
<!--	        </?php include 'menu_holiday.php'; ?>-->
<!--	    </li>-->
<!--	    <li class="rtborder"><a href="#">Business</a>-->
<!--	        </?php include 'menu_business.php'; ?>-->
<!--	    </li>-->
	   
<!--	   	<span class="examplesDropdown">Fundraiser Examples</span>-->
<!--		<li class="examplesEdu"><a class="titleLink" href="#">Schools</a></?php include 'menu_education_examples.php'; ?></li>-->
<!--		<li class="examplesOrg"><a class="titleLink" href="#">Organizations</a></?php include 'menu_organization_examples.php'; ?></li>-->
	   
<!--	    <li class="lfborder"><a class="logintitle" href="#">My Account<br>Sign In</a>-->
<!--      		<div class="newlogin">-->
<!--		      </?php
<!--		            if(!isset($_SESSION['LOGIN']) || $_SESSION['LOGIN'] == "FALSE") {-->
<!--		                echo '<form id="newlogin" action="../logInUser.php" method="post">';
<!--		                echo '<h5>sign in</h5>';
<!--		                echo '<input id="loginemail" type="text" name="email" value="" placeholder="email address">';
<!--		                echo '<br>';
<!--		                echo '<input id="loginpassword" type="password" name="password" value="" placeholder="password">';
<!--		                echo '<br>';-->
<!--		                echo '<input class="user redbutton" name="login" type="submit" value="sign in" />';
<!--		                echo '</form>';-->
		                
<!--		            } elseif($_SESSION['LOGIN'] == "TRUE") {
<!--		            	echo '<div class="loggedinMenu">';
<!--		                echo '<h5>my account</h5>';-->
<!--		                echo '<span><a href="../index.php">GreatMoods Homepage</a></span>';
		         	//echo '<span><a href="'.$_SESSION['home'].'" />Login Home</a></span>';
<!--		         	echo '<span><a href="memberHome.php">Account Home</a></span>';
<!--		         	echo '<span><a href="reset.php">Change My Password</a></span>';
<!--		         	echo '<br>';
<!--		         	include('../includes/logout.inc.php');
<!--		         	echo '</div>';-->
<!--		              }-->
<!--		         ?/>-->
<!--		    </div>-->
<!--      	</li>-->
<!--      </ul>-->
<!--  </div> <!--end headerMain-->
  
  
  
<!-- <div id="leftSideBar">
  	<div class="profileimgcrop"><img src="http://greatmoods.com/</?php echo $contact_pic;?>" class="profilepic" alt="UPLOAD YOUR PROFILE PICTURE HERE!"></div>
  	<h1></? echo $owner; ?></h1>
  	<h2></? 
  	$club = stripslashes($club_type);
  	echo $club; ?></h2>
  	<h3><span class="label">My Goal</span> $</?php echo $goal; ?></h3>
  	<h3><span class="label">Raised So Far</span> $</?php echo $so_far; ?></h3>
  	<div id="socialmediaicons">
  		<a href="</? echo $face; ?>" target="_blank"><i id="fbicon" class="fa fa-facebook-square" title="Facebook"></i></a>
  		<a href="</? echo $twit; ?>" target="_blank"><i id="twicon" class="fa fa-twitter-square" title="Twitter"></i></a>
  		<!--<a href="#" target="_blank"><i id="liicon" class="fa fa-linkedin-square" title="LinkedIn"></i></a>
  		<a href="#" target="_blank"><i id="pnicon" class="fa fa-pinterest-square" title="Pinterest"></i></a>
  		<a href="#" target="_blank"><i id="gpicon" class="fa fa-google-plus-square" title="Google+"></i></a>
  		<a href="salesContact.php?group=</?php echo $_GET['group']; ?>"><i id="emailicon" class="fa fa-envelope-square" title="Email"></i></a>
  	</div> -->
  	
	
  <!--	</? 
  	
	if(isset($_SESSION['authenticated']) && $_SESSION['role'] == "Member" || $_SESSION['role'] == "MemberLeader") {
	   $userID = $_SESSION['userId'];
		echo '<hr>
		<!--<div id="acctname">Welcome!</div>--><!--
  	 
	<div id="accordion">
  	 <h4>My Accounts</h4><div>';
  	 
  	  getAccounts1($userID);
  	
  	echo' </div>
  	 <h4>Getting Started</h4>
  	 <div>
  	 <ul>
  	    <li><a href="fundgettingstarted11.php?group='.$_SESSION['groupid'].'"><i class="fa fa-desktop navicon"></i> GreatMoods<br>Program Overview</a></li>
	    <li><a href="fundgettingstarted14.php?group='.$_SESSION['groupid'].'"><i class="fa fa-list-ul navicon"></i> Fundraiser Setup Steps</a></li>
	    <li><a href="fundgettingstarted1.php?group='.$_SESSION['groupid'].'"><i class="fa fa-smile-o navicon"></i> About GreatMoods</a></li>
	    <li><a href="salesContact.php?group='.$_SESSION['groupid'].'"><i class="fa fa-check navicon"></i> Get Started Today!<br>Contact Your Rep!</a></li>
  	 </ul>
  	 </div>
  	 <h4>Program Overview</h4>
  	 <div>
  	 <ul id="sideNav">
	   <li><a href="gm_mission.php" title=""><i class="fa fa-heart navicon"></i> Mission</a></li>
	   <li><a href="gm_program.php" title=""><i class="fa fa-list-ol navicon"></i> GreatMoods Program</a></li> 
	   <li><a href="gm_getStarted.php" title=""><i class="fa fa-calendar-check-o navicon"></i> Get Started Today!</a></li>
	 </ul>
  	 </div>
  	 </div>
  	
	
      	
	
	<h4>Account Administration</h4>
       	<ul id="sideNav">
            <li><a href="membersite.php?group='. $_GET['group'].'"><i class="fa fa-home navicon"></i> View My Website</a></li>
            <!-- <li><a href="goalsAchievements.php" title=""><i class="fa fa-calculator navicon"></i> Goals & Achievements</a></li>--><!--
             <li><a href="fundTools.php" title=""><i class="fa fa-wrench navicon"></i> Fundraising Tools</a></li>
             <li><a href="viewReports2.php"><i class="fa fa-dollar navicon"></i> View Reports</a></li>
             <li><a href="emails2.php"><i class="fa fa-envelope navicon"></i> Send Emails</a></li>
             <li><a href="contacts.php" title="Account Home"><i class="fa fa-user navicon"></i> View Contacts</a></li>  
             <li><a href="addFriendFamily.php" title=""><i class="fa fa-plus-square navicon"></i> Add Friend & Family</a></li> 
             <li><a href="addBusinessSupporter.php" title=""><i class="fa fa-plus-square navicon"></i> Add Business Supporter</a></li> 
             <li><a href="addBusinessAssociate.php" title=""><i class="fa fa-plus-square navicon"></i> Add Business Associate</a></li> 
             <li><a href="memberHome.php" title=""><i class="fa fa-pencil navicon"></i> Edit My Account</a></li>   
      	</ul>
      	';
       	} 
       	else
       	{
       	  echo '
       	  <ul id="sideNav">
	      <li><a href="membersite.php?group='.$_GET['group'].'"><i class="fa fa-home navicon"></i> Fundraiser Homepage</a></li>
	      <li><a href="fundgettingstarted11.php?group='.$_GET['group'].'"><i class="fa fa-desktop navicon"></i> GreatMoods<br>Program Overview</a></li>
	      <li><a href="fundgettingstarted14.php?group='.$_GET['group'].'"><i class="fa fa-list-ul navicon"></i> Fundraiser Setup Steps</a></li>
	      <li><a href="fundgettingstarted1.php?group='.$_GET['group'].'"><i class="fa fa-smile-o navicon"></i> About GreatMoods</a></li>
	      <li><a href="salesContact.php?group='.$_GET['group'].'"><i class="fa fa-check navicon"></i> Get Started Today!<br>Contact Your Rep!</a></li>
	  </ul>
	  ';
       	}
       	?>  
       	
       	
       	</ul>	
</div> -->  

<div id="memberSiteContent" class="container">

  <!--	   <div class="col-lg-11 col-lg-pull-1 col-md-pull-0 col-md-9 col-md-push-2 col-sm-11 col-sm-pull-1 col-xs-11 col-xs-pull-1">-->
  <!--		<h3 class="sample"></? echo $owner; echo'\'s&nbsp;';  echo stripslashes($club_type); ?> Fundraiser</h3>-->
  		
  <!--		<div id="sliderFrame" class="grpcollage">
		<!--        <div id="marketingSlider">-->
		<!--            	<img src="</?php echo "../".$group_photo;?>" alt="UPLOAD YOUR GROUP PICTURE HERE!">-->
		<!--            	<img src="../images/sliders/shopSlider-add.jpg" alt="Shop at the Store Links Above">-->
		<!--            	<img src="../images/sliders/mbrslider1.jpg" alt="Thank You for Visiting">-->
		<!--            	<img src="../images/sliders/mbrslider2.jpg" alt="Shop at Any Stores Above">-->
		<!--            	<img src="../images/sliders/mbrslider3.jpg" alt="Great Fundraising Products at the GreatMoods Mall">-->
		<!--            	<img src="../images/sliders/mbrslider4.jpg" alt="Fundraising Products You  Really Want">-->
		<!--		<img src="../images/sliders/mbrslider5.jpg" alt="35% of Every Purchase is Yours!">-->
		<!--		<img src="../images/sliders/mbrslider6.jpg" alt="We Deliver Everywhere!">-->
		<!--        </div>-->
		<!--        <div id="sliderNavbar">-->
		<!--            <a onclick="imageSlider.previous()" class="group2-Prev"></a>-->
		<!--            <a id='auto' onclick="switchAutoAdvance()"></a>-->
		<!--            <a onclick="imageSlider.next()" class="group2-Next"></a>-->
		<!--        </div>-->
		<!--</div> <!-- end sliderFrame -->
  
	 <!--     <div class="reasonsbox">-->
  <!--		<br>-->
  <!--		<br>-->
  
    <div class="page-header">
	    <h1><? echo $owner; echo'\'s&nbsp;';  echo stripslashes($club_type); ?> Fundraiser</h1>
	</div>
    <div class=" col-md-9 col-md-push-2 col-sm-12 col-xs-12">

          <div id="carousel-sample" class="carousel slide" data-ride="carousel">
            <ol style="display:none;">
                <li data-target="#carousel-band" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-band" data-slide-to="1"></li>
                <li data-target="#carousel-band" data-slide-to="2"></li>
                <li data-target="#carousel-band" data-slide-to="3"></li>
                <li data-target="#carousel-band" data-slide-to="4"></li>        
                <li data-target="#carousel-band" data-slide-to="5"></li>
                <li data-target="#carousel-band" data-slide-to="6"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                  <!--<img class="img-responsive center-block" src="<?php echo "../".$group_photo;?>" alt="UPLOAD YOUR GROUP PICTURE HERE!">    THIS LINK IS NOT WORKING ALONG WITH MOST PHP. WOOO PHP. -_- -->
                  <img class="img-responsive center-block" src="http://cdn.iflscience.com/assets/site/img/ifls-placeholder.png?v=1.2.13../images/sliders/shopSlider-add.jpg" alt="UPLOAD YOUR GROUP PICTURE HERE!" style="max-height:258px"> 
                    <div class="carousel-caption">
                        <h3 style="color:white">UPLOAD YOUR GROUP PICTURE HERE</h3>
                    </div>
                </div>
              <div class="item">
                  <img class="img-responsive center-block" src="../images/sliders/shopSlider-add.jpg" alt="Shop at the Store Links Above">
                </div>
                <div class="item">
                  <img class="img-responsive center-block" src="../images/sliders/mbrslider1.jpg" alt="Thank You For Visiting">
                </div>
               <div class="item">
                  <img class="img-responsive center-block" src="../images/sliders/mbrslider2.jpg" alt="Shop at Any Stores Above">
                </div>                
                    <div class="item">
                  <img class="img-responsive center-block" src="../images/sliders/mbrslider3.jpg" alt="Great Fundraising Products at the GreatMoods Mall">
                </div>
                <div class="item">
                  <img class="img-responsive center-block" src="../images/sliders/mbrslider4.jpg" alt="Fundraising Products You  Really Want">
                </div> 
                <div class="item">
                  <img class="img-responsive center-block" src="../images/sliders/mbrslider5.jpg"  alt="35% of Every Purchase is Yours!">
                </div>
                <div class="item">
                  <img class="img-responsive center-block" src="../images/sliders/mbrslider6.jpg" alt="We Deliver Everywhere!">
                </div>
            </div>
             <!--Left and right controls -->
            <a class="left carousel-control" href="#carousel-sample" data-slide="prev" data-interval="false">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-sample" data-slide="next" data-interval="false">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
            <!--<div id="carouselButtons" class="vcenter center-block">--> <!-- not functioning properly since addition of thermometer. will be a work in progress. -->
            <!--  <button id="playButton" class="vcenter btn btn-default btn-xs">-->
            <!--      <span class="fa fa-play-circle"></span>-->
            <!--   </button>-->
            <!--  <button id="pauseButton" class="vcenter btn btn-default btn-xs">-->
            <!--      <span class="fa fa-pause-circle"></span>-->
            <!--  </button>-->
            <!--</div>-->
        </div>
    </div>
    
    

	      
        	<div class="reasonsbox col-xs-11 col-xs-push-1 col-sm-push-0 col-sm-4 col-md-3 col-md-push-1 col-md-offset-1 col-lg-offset-0 col-lg-push-1 col-lg-4">
        	    <label class="funddates"><b>Starts:</b>&nbsp;<?php echo $start1; ?></label>
  		        <label class="rtfloat funddates"><b>Ends:</b>&nbsp;<?php echo $end1; ?></label><br>
  		        <h5 id="about">About My Fundraiser</h5> 
               <p><?php echo stripslashes($about); ?></p><br>
                <h5 id="reasons">Reasons for Our Fundraiser</h5>
	        <?php
	        $query5 = "SELECT * FROM fund_reasons WHERE fundID = '$setup_person'";
                $result5 = mysqli_query($link, $query5) or die(mysqli_error());
                $row5 = mysqli_fetch_assoc($result5);
                $r1 = $row5['r1'];
                $r2 = $row5['r2'];
                $r3 = $row5['r3'];
                $r4 = $row5['r4'];
                $r5 = $row5['r5'];
                $r6 = $row5['r6'];
                $r7 = $row5['r7'];
                $r8 = $row5['r8'];
                $r9 = $row5['r9'];
                $r10 = $row5['r10'];
	        
	      
	        if($r1 == '' && $r2 == '' && $r3 == '' )
	        {
	            $r_list = explode('.', $reasons);
					echo '<div id="reasoncontent">';
					echo '<ul>';
					foreach ($r_list as $item) {
						if ($item != '') {
							echo '<li>', trim($item), '</li>';
						}
					}
					echo '</ul>';
					echo '</div>';
	        }
	        else
	        {
		      
	      echo '   <table class="reasonscontent">';
		     if($r1 !== '')
	              {
	                 echo '<tr class="even"><td><i class="fa fa-circle"></i>'.$r1.'</td></tr>';
	              }
	              if($r2 !== '')
	              {
	                 echo '<tr class="even"><td><i class="fa fa-circle"></i>'.$r2.'</td></tr>';
	              }
	              if($r3 !== '')
	              {
	                 echo '<tr class="even"><td><i class="fa fa-circle"></i>'.$r3.'</td></tr>';
	              }
	              if($r4 !== '')
	              {
	                 echo '<tr class="even"><td><i class="fa fa-circle"></i>'.$r4.'</td></tr>';
	              }
	              if($r5 !== '')
	              {
	                 echo '<tr class="even"><td><i class="fa fa-circle"></i>'.$r5.'</td></tr>';
	              }
	              if($r6 !== '')
	              {
	                 echo '<tr class="even"><td><i class="fa fa-circle"></i>'.$r6.'</td></tr>';
	              }
	              if($r7 !== '')
	              {
	                 echo '<tr class="even"><td><i class="fa fa-circle"></i>'.$r7.'</td></tr>';
	              }
	              if($r8 !== '')
	              {
	                 echo '<tr class="even"><td><i class="fa fa-circle"></i>'.$r8.'</td></tr>';
	              }
	              if($r9 !== '')
	              {
	                 echo '<tr class="even"><td><i class="fa fa-circle"></i>'.$r9.'</td></tr>';
	              }
	              if($r10 !== '')
	              {
	                 echo '<tr class="even"><td><i class="fa fa-circle"></i>'.$r10.'</td></tr>';
	              }
	              
	      echo '</table>';
	      }
		?>
		</div> <!-- end reasonsbox -->
		
		<!--<div id="goals">
		<br>
	      <p><strong>My Goal</strong><br>
	        $</?php echo $goal; ?></p><br>
	      <p><strong>Raised<br>
	        So Far</strong><br>
	        $</?php echo $so_far; ?></p>
	    </div>    end goals--> 
	    
        <div class="col-xs-9 col-xs-offset-3 col-sm-push-0 col-sm-offset-2 col-sm-2 col-md-3 col-md-push-1 col-md-offset-1 col-lg-3">
        	<div id="thermo-wrap" class="">
                <div id="thermometer">
                    <div class="track">
                        <div class="goal">
                            <div class="amount"><?php echo $goal; ?> </div>
                        </div>
                        <div class="raised">
                            <div class="amount"><?php echo $so_far; ?></div>
                        </div>
                    </div>
        
                </div>
        
            </div>
        </div>

            <div class="img-thumbnail pull-right col-xs-1 col-xs-pull-4 col-sm-1 col-sm-pull-0 col-md-1 col-lg-1" style="width:130px;height:180px">
                
	          <img src="../<?php echo $leader_photo;?>"class="img-responsive" alt="UPLOAD YOUR LEADER PICTURE HERE!">
	        <?
			if($capTitle1 != '')
			{
			  echo'<div class="contactinfo2">
				<span><strong>'.$capTitle1.'</strong></span>
				<br>';
		        }
		        if($cap1 != '')
		        {
				echo'
				<span class="leadername">'.$cap1.'</span>
			        </div>';
			}
			?>
	      </div>      <!--end leader-->    
	      
            <div class="img-thumbnail  pull-right col-xs-offset-6 col-xs-pull-4 col-xs-1 col-sm-pull-0 col-sm-offset-0 col-md-1 col-lg-1 col-md-offset-0"  style="width:130px;height:180px" >
             <div class="leaderimgcrop "><img src="../<?php echo $student_photo;?>" class="img-responsive" alt="UPLOAD ANY PICTURE HERE!"></div>
	         <?
			if($capTitle2 != '')
			{
			  echo'<div class="contactinfo2">
				<span><strong>'.$capTitle2.'</strong></span>
				<br>';
		        }
		        if($cap2 != '')
		        {
				echo'
				<span class="leadername">'.$cap2.'</span>
			        </div>';
			}
			?>
	      </div>      <!--end studentleader-->

  	</div> <!-- end column1 -->
  	
  	<!--<div id="column2">
  		<div class="shopDetails">
		       	 <ul class="stumenu">
		          	<h5>Shopping Ideas For...</h5>
				<li><a href="greatmoodsMall.php?group=</?php echo $_GET['group']; ?>&storeid=918#!/Mothers/c/18209955/offset=0&sort=priceAsc">Mothers</a></li>
				<li><a href="greatmoodsMall.php?group=</?php echo $_GET['group']; ?>&storeid=918#!/Grandmas/c/18209956/offset=0&sort=priceAsc">Grandmas</a></li>
				<li><a href="greatmoodsMall.php?group=</?php echo $_GET['group']; ?>&storeid=918#!/Fathers/c/18209957/offset=0&sort=priceAsc">Fathers</a></li>
				<li><a href="greatmoodsMall.php?group=</?php echo $_GET['group']; ?>&storeid=918#!/Grandpas/c/18209958/offset=0&sort=priceAsc">Grandpas</a></li>
				<li><a href="greatmoodsMall.php?group=</?php echo $_GET['group']; ?>&storeid=918#!/Teen-Girls/c/18209959/offset=0&sort=priceAsc">Teen Girls</a></li>
				<li><a href="greatmoodsMall.php?group=</?php echo $_GET['group']; ?>&storeid=918#!/Teen-Boys/c/18209960/offset=0&sort=priceAsc">Teen Boys</a></li>
				<li><a href="greatmoodsMall.php?group=</?php echo $_GET['group']; ?>&storeid=918#!/Girls/c/18209961/offset=0&sort=priceAsc">Girls</a></li>
				<li><a href="greatmoodsMall.php?group=</?php echo $_GET['group']; ?>&storeid=918#!/Boys/c/18209962/offset=0&sort=priceAsc">Boys</a></li>
				<li><a href="greatmoodsMall.php?group=</?php echo $_GET['group']; ?>&storeid=918#!/Love-&-Romance/c/18209963/offset=0&sort=priceAsc">Love &amp; Romance</a></li>
				<li><a href="greatmoodsMall.php?group=</?php echo $_GET['group']; ?>&storeid=918#!/Special-Friends/c/18209964/offset=0&sort=priceAsc">Special Friends</a></li>
				<li><a href="greatmoodsMall.php?group=</?php echo $_GET['group']; ?>&storeid=918#!/Students-Away-at-School/c/18209965/offset=0&sort=priceAsc">Students Away at School</a></li>
				<li><a href="greatmoodsMall.php?group=</?php echo $_GET['group']; ?>&storeid=918#!/Customer-&-Clients/c/18209966/offset=0&sort=priceAsc">Customeres &amp; Clients</a></li>
				<li><a href="greatmoodsMall.php?group=</?php echo $_GET['group']; ?>&storeid=918#!/Me-Myself-&-I-Its-Okay/c/18209967/offset=0&sort=priceAsc">Me, Myself &amp; I</a></li>
		        </ul>
	      </div>
  		
  		<br>
  		
  		<div class="bestsellers">
	      		<h5>New Arrivals Daily!</h5>
			<img src="../images/rightcol_collage_4pics_15nov2016.jpg" width="160" height="" alt="new arrivals daily">
	      </div>
  	</div>  end column2 -->  
  	
</div> <!--end content container-->


  </div> <!-- end row-fluid -->
</div> <!--end container-->
  <?php include 'fundMember/footer(1).php' ; ?>
   
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script>//script for thermometer money conversion / completion
    function formatCurrency(n, c, d, t) {
        "use strict";
    
        var s, i, j;
    
        c = isNaN(c = Math.abs(c)) ? 2 : c;
        d = d === undefined ? "." : d;
        t = t === undefined ? "," : t;
    
        s = n < 0 ? "-" : "";
        i = parseInt(n = Math.abs(+n || 0).toFixed(c), 10) + "";
        j = (j = i.length) > 3 ? j % 3 : 0;
    
        return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
    }

    /**
     * Thermometer raised meter.
     * This function will update the raised element in the "thermometer"
     * to the updated percentage.
     * If no parameters are passed in it will read them from the DOM
     *
     * @param {Number} goalAmount The Goal amount, this represents the 100% mark
     * @param {Number} raisedAmount The raised amount is the current amount
     * @param {Boolean} animate Whether to animate the height or not
     *
     */
    function thermometer(goalAmount, raisedAmount, animate) {
        "use strict";
    
        var $thermo = $("#thermometer"),
            $raised = $(".raised", $thermo),
            $goal = $(".goal", $thermo),
            percentageAmount;
    
        goalAmount = goalAmount || parseFloat( $goal.text() ),
        raisedAmount = raisedAmount || parseFloat( $raised.text() ),
        percentageAmount =  Math.min( Math.round(raisedAmount / goalAmount * 1000) / 10, 100); //make sure we have 1 decimal point
    
        //let's format the numbers and put them back in the DOM
        $goal.find(".amount").text( "$" + formatCurrency( goalAmount ) );
        $raised.find(".amount").text( "$" + formatCurrency( raisedAmount ) );
    
    
        //let's set the raised indicator
        $raised.find(".amount").hide();
        if (animate !== false) {
            $raised.animate({
                "height": percentageAmount + "%"
            }, 1200, function(){
                $(this).find(".amount").fadeIn(500);
            });
        }
        else {
            $raised.css({
                "height": percentageAmount + "%"
            });
            $raised.find(".amount").fadeIn(500);
        }
    }

    $(document).ready(function(){
    
        //call without the parameters to have it read from the DOM
        thermometer();
        // or with parameters if you want to update it using JavaScript.
        // you can update it live, and choose whether to show the animation
        // (which you might not if the updates are relatively small)
        //thermometer( 1000000, 425610, false );
    });
    </script>
</body>
</html>

<!--<script>-->
<!--    function switchAutoAdvance() {-->
<!--        imageSlider.switchAuto();-->
<!--        switchPlayPauseClass();-->
<!--    }-->
<!--    function switchPlayPauseClass() {-->
<!--        var auto = document.getElementById('auto');-->
<!--        var isAutoPlay = imageSlider.getAuto();-->
<!--        auto.className = isAutoPlay ? "group2-Pause" : "group2-Play";-->
<!--        auto.title = isAutoPlay ? "Pause" : "Play";-->
<!--    }-->
<!--    switchPlayPauseClass();-->
<!--</script>-->

<?php
   ob_end_flush();
?>