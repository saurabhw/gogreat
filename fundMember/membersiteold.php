<?php
      session_start();
    
      ob_start();
      define("SITE_ROOT",$_SERVER["DOCUMENT_ROOT"].'/salesTest/');
      include("../includes/connection.inc.php");
      include("../includes/functions.php");
      $link = connectTo();
      $groupID = $_GET['group'];
      
      /*
       if (isset($_SESSION['authenticated'])){
          // logging in user
          $groupID = $_SESSION['groupid'];
      }else{
        // customer from a link(not logged in)
      	   $groupID = $_GET['group'];
        } 
     
      $user = $_SESSION['userId'];
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
      $result1 = mysqli_query($link, $query1) or die(mysqli_error($link));
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
      $banner_path = $row['banner_path'];
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
      $banner_path1 = $row7['banner_path'];
      $start1 = $row7['FundraiserStartDate'];
      $end1 = $row7['FundraiserEndDate'];
      $goal = $row7['goal2'];
      
      
      $query2 = "SELECT * FROM orgContacts WHERE fundraiserID = '$groupID'";
      $result2 = mysqli_query($link, $query2) or die(mysqli_error($link));
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
	<title><? echo $owner;?> | GreatMoods</title>
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
	
	<script src="../js/js-image-slider.js" type="text/javascript"></script>
</head>

<body>
<div id="container">
  <div id="headerMain"> 
  	<div id="bannerwrap"><a href="#"><img id="logo2" src="../images/whitelogo.png" alt="GreatMoods Logo"></a><img id="banner" src="../<?php echo $banner_path;?>" width="1024" height="150" alt="UPLOAD YOUR BANNER HERE!" /></div>
    <div id="menuWrapper"> </div> <!--end menuWrapper-->

      <ul class="nav">
      	<li><a href="#">Women</a>
        <?php 
        if(isset($_SESSION['authenticated']))
        {
          include 'menu_women.php';
        }
        else
        {
          include 'navigation/menu_women.php';
        }
         
        ?>
	   </li>
	    <li><a href="#">Accessories</a>
	        <?php 
	        if(isset($_SESSION['authenticated']))
               {
	          include 'menu_accessories.php'; 
	       }
	       else
	       {
	          include 'navigation/menu_accessories.php';
	       } 
	       ?>
	    </li>
	    <li><a href="#">Men</a>
	        <?php
	       if(isset($_SESSION['authenticated']))
               {
	          include 'menu_men.php';
	       }
	       else
	       {
	          include 'navigation/menu_men.php';
	       } 
	        ?>
	    </li>
	    <li><a href="#">Juniors</a>
	        <?php 
	        if(isset($_SESSION['authenticated']))
                {
	          include 'menu_juniors.php';
	        } 
	        else
	        {
	          include 'navigation/menu_juniors.php';
	        } 
	        ?>
	    </li>
	    <li><a href="#">Kids</a>
	        <?php
	        if(isset($_SESSION['authenticated']))
                {
	          include 'menu_kids.php';
	        }
	          else
	        {
	          include 'navigation/menu_kids.php';
	        } 
	        ?>
	    </li>
	    <li><a href="#">Fitness</a>
	        <?php 
	          if(isset($_SESSION['authenticated']))
                  {
	            include 'menu_fitness.php';
	          }
	          else
	          {
	             include 'navigation/menu_fitness.php';
	          }
	        ?>
	    </li>
	    <li><a href="#">Food</a>
	        <?php
	        if(isset($_SESSION['authenticated']))
                  {
	             include 'menu_food.php';
	          }
	          else
	          {
	             include 'navigation/menu_food.php';
	          }
	              
	         ?>
	    </li>
	    <li><a href="#">Entertainment</a>
	        <?php 
	        if(isset($_SESSION['authenticated']))
                  {
	             include 'menu_entertainment.php'; 
	          }
	          else
	          {
	             include 'navigation/menu_entertainment.php';
	          }
	        ?>
	    </li>
	    <li><a href="#">Home</a>
	        <?php 
	        if(isset($_SESSION['authenticated']))
                  {
	            include 'menu_housewares.php';
	          }
	          else
	          {
	             include 'navigation/menu_housewares.php';
	          }
	         ?>
	    </li>
	    <li><a href="#">Health</a>
	        <?php 
	         if(isset($_SESSION['authenticated']))
                  {
	            include 'menu_health.php'; 
	          }
	          else
	          {
	             include 'navigation/menu_health.php';
	          }
	          
	        ?>
	    </li>
	    <li><a href="#">Inspirational</a>
	        <?php 
	         if(isset($_SESSION['authenticated']))
                  {
	            include 'menu_inspirational.php'; 
	          }
	          else
	          {
	             include 'navigation/menu_inspirational.php';
	          }
	        ?>
	    </li>
	    <li><a href="#">Holiday</a>
	        <?php 
	        if(isset($_SESSION['authenticated']))
                  {
	            include 'menu_holiday.php'; 
	          }
	          else
	          {
	            include 'navigation/menu_holiday.php';
	          }
	         ?>
	    </li>
	    <li class="rtborder"><a href="#">Business</a>
	        <?php 
	        if(isset($_SESSION['authenticated']))
                  {
	             include 'menu_business.php'; 
	          }
	          else
	          {
	             include 'navigation/menu_business.php';
	          }
	        ?>
	    </li>
	   
	   	<span class="examplesDropdown">Fundraiser Examples</span>
		<li class="examplesEdu"><a class="titleLink" href="#">Schools</a><?php include 'menu_education_examples.php'; ?></li>
		<li class="examplesOrg"><a class="titleLink" href="#">Organizations</a><?php include 'menu_organization_examples.php'; ?></li>
	   
	    <li class="lfborder"><a class="logintitle" href="#">My Account<br>Sign In</a>
      		<div class="newlogin">
		      <?php
		            if(!isset($_SESSION['LOGIN']) || $_SESSION['LOGIN'] == "FALSE") {
		                echo '<form id="newlogin" action="../logInUser.php" method="post">';
		                echo '<h5>sign in</h5>';
		                echo '<input id="loginemail" type="text" name="email" value="" placeholder="email address">';
		                echo '<br>';
		                echo '<input id="loginpassword" type="password" name="password" value="" placeholder="password">';
		                echo '<br>';
		                echo '<input class="user redbutton" name="login" type="submit" value="sign in" />';
		                echo '</form>';
		                
		            } elseif($_SESSION['LOGIN'] == "TRUE") {
		            	echo '<div class="loggedinMenu">';
		                echo '<h5>my account</h5>';
		                echo '<span><a href="../index.php">GreatMoods Homepage</a></span>';
		         	//echo '<span><a href="'.$_SESSION['home'].'" />Login Home</a></span>';
		         	echo '<span><a href="memberHome.php">Account Home</a></span>';
		         	echo '<span><a href="reset.php">Change My Password</a></span>';
		         	echo '<br>';
		         	include('../includes/logout.inc.php');
		         	echo '</div>';
		              }
		         ?>
		    </div>
      	</li>
      </ul>
  </div> <!--end headerMain-->
  
<div id="leftSideBar">
  	<div class="profileimgcrop"><img src="http://greatmoods.com/<?php echo $contact_pic;?>" class="profilepic" alt="UPLOAD YOUR PROFILE PICTURE HERE!"></div>
  	<h1><? echo $owner; ?></h1>
  	<h2><? 
  	$club = stripslashes($club_type);
  	echo $club; ?></h2>
  	<h3><span class="label">My Goal</span> $<?php echo $goal; ?></h3>
  	<h3><span class="label">Raised So Far</span> $<?php echo $so_far; ?></h3>
  	<div id="socialmediaicons">
  		<a href="<? echo $face; ?>" target="_blank"><i id="fbicon" class="fa fa-facebook-square" title="Facebook"></i></a>
  		<a href="<? echo $twit; ?>" target="_blank"><i id="twicon" class="fa fa-twitter-square" title="Twitter"></i></a>
  		<!--<a href="#" target="_blank"><i id="liicon" class="fa fa-linkedin-square" title="LinkedIn"></i></a>
  		<a href="#" target="_blank"><i id="pnicon" class="fa fa-pinterest-square" title="Pinterest"></i></a>
  		<a href="#" target="_blank"><i id="gpicon" class="fa fa-google-plus-square" title="Google+"></i></a>-->
  		<a href="salesContact.php?group=<?php echo $_GET['group']; ?>"><i id="emailicon" class="fa fa-envelope-square" title="Email"></i></a>
  	</div>
  	
	
  	<? 
  	
	if(isset($_SESSION['authenticated']) && $_SESSION['role'] == "Member" || $_SESSION['role'] == "MemberLeader") {
	   $userID = $_SESSION['userId'];
		echo '<hr>
		<!--<div id="acctname">Welcome!</div>-->
  	 
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
            <!-- <li><a href="goalsAchievements.php" title=""><i class="fa fa-calculator navicon"></i> Goals & Achievements</a></li>-->
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
</div>

<div id="contentSample">
  	<div id="column1">
  		<h3 class="sample"><? echo $owner; echo'\'s&nbsp;';  echo stripslashes($club_type); ?> Fundraiser</h3>
  		
  		<div id="sliderFrame" class="grpcollage">
		        <div id="marketingSlider">
		            	<img src="<?php echo "../".$group_photo;?>" alt="UPLOAD YOUR GROUP PICTURE HERE!">
		            	<img src="../images/sliders/shopSlider-add.jpg" alt="Shop at the Store Links Above">
		            	<img src="../images/sliders/mbrslider1.jpg" alt="Thank You for Visiting">
		            	<img src="../images/sliders/mbrslider2.jpg" alt="Shop at Any Stores Above">
		            	<img src="../images/sliders/mbrslider3.jpg" alt="Great Fundraising Products at the GreatMoods Mall">
		            	<img src="../images/sliders/mbrslider4.jpg" alt="Fundraising Products You  Really Want">
				<img src="../images/sliders/mbrslider5.jpg" alt="35% of Every Purchase is Yours!">
				<img src="../images/sliders/mbrslider6.jpg" alt="We Deliver Everywhere!">
		        </div>
		        <div id="sliderNavbar">
		            <a onclick="imageSlider.previous()" class="group2-Prev"></a>
		            <a id='auto' onclick="switchAutoAdvance()"></a>
		            <a onclick="imageSlider.next()" class="group2-Next"></a>
		        </div>
		</div> <!-- end sliderFrame -->
  
	      <div class="reasonsbox">
	      	<label class="funddates"><b>Starts:</b>&nbsp;<?php echo $start1; ?></label>
  		<label class="rtfloat funddates"><b>Ends:</b>&nbsp;<?php echo $end1; ?></label>
  		<br>
  		<br>
               <h5 id="about">About My Fundraiser</h5> 
               <p><?php echo stripslashes($about); ?></p>
	      
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
		
		<div id="goals">
		<br>
	      <p><strong>My Goal</strong><br>
	        $<?php echo $goal; ?></p><br>
	      <p><strong>Raised<br>
	        So Far</strong><br>
	        $<?php echo $so_far; ?></p>
	    </div>    <!--end goals--> 
	    
	    <div class="leader">
	          <div class="leaderimgcrop"><img src="../<?php echo $leader_photo1;?>" height="140px" width="140px" alt="UPLOAD YOUR LEADER PICTURE HERE!"></div>
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
	      
	      <div class="studentleader">
	        <div class="leaderimgcrop"><img src="../<?php echo $contact_pic1;?>" height="140px" width="140px" alt="UPLOAD ANY PICTURE HERE!"></div>
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
  	
  	<div id="column2">
  		<div class="shopDetails">
		       	 <ul class="stumenu">
		          	<h5>Shopping Ideas For...</h5>
				<li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=918#!/Mothers/c/18209955/offset=0&sort=priceAsc">Mothers</a></li>
				<li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=918#!/Grandmas/c/18209956/offset=0&sort=priceAsc">Grandmas</a></li>
				<li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=918#!/Fathers/c/18209957/offset=0&sort=priceAsc">Fathers</a></li>
				<li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=918#!/Grandpas/c/18209958/offset=0&sort=priceAsc">Grandpas</a></li>
				<li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=918#!/Teen-Girls/c/18209959/offset=0&sort=priceAsc">Teen Girls</a></li>
				<li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=918#!/Teen-Boys/c/18209960/offset=0&sort=priceAsc">Teen Boys</a></li>
				<li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=918#!/Girls/c/18209961/offset=0&sort=priceAsc">Girls</a></li>
				<li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=918#!/Boys/c/18209962/offset=0&sort=priceAsc">Boys</a></li>
				<li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=918#!/Love-&-Romance/c/18209963/offset=0&sort=priceAsc">Love &amp; Romance</a></li>
				<li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=918#!/Special-Friends/c/18209964/offset=0&sort=priceAsc">Special Friends</a></li>
				<li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=918#!/Students-Away-at-School/c/18209965/offset=0&sort=priceAsc">Students Away at School</a></li>
				<li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=918#!/Customer-&-Clients/c/18209966/offset=0&sort=priceAsc">Customeres &amp; Clients</a></li>
				<li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=918#!/Me-Myself-&-I-Its-Okay/c/18209967/offset=0&sort=priceAsc">Me, Myself &amp; I</a></li>
		        </ul>
	      </div>
  		
  		<br>
  		
  		<div class="bestsellers">
	      		<h5>New Arrivals Daily!</h5>
			<img src="../images/rightcol_collage_4pics_15nov2016.jpg" width="160" height="" alt="new arrivals daily">
	      </div>
  	</div> <!-- end column2 -->  
</div> <!--end content-->

  <div class="clearfloat">  </div>

  <?php include 'footer(1).php' ; ?>
</div> <!--end container-->
</body>
</html>

<script>
    function switchAutoAdvance() {
        imageSlider.switchAuto();
        switchPlayPauseClass();
    }
    function switchPlayPauseClass() {
        var auto = document.getElementById('auto');
        var isAutoPlay = imageSlider.getAuto();
        auto.className = isAutoPlay ? "group2-Pause" : "group2-Play";
        auto.title = isAutoPlay ? "Pause" : "Play";
    }
    switchPlayPauseClass();
</script>

<?php
   ob_end_flush();
?>