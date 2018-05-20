<?php
      session_start();
      ob_start();
      
      include("includes/connection.inc.php");
      include("includes/functions.php");
      $link = connectTo();
      /*
      if (isset($_SESSION['authenticated'])){
          // logging in user
          $groupID = $_SESSION['groupid'];
      }else{
        // customer from a link(not logged in)
      	$groupID = $_GET['group'];
        } 
        
        */
      $groupID = $_GET['group']; 
      $table = "Dealers";
      $query1 = "SELECT * FROM $table WHERE loginid = '$groupID'";
      $result1 = mysqli_query($link, $query1) or die("couldn't execute query 1.".mysqli_error($link));
      $row = mysqli_fetch_assoc($result1);
      $club_name = stripslashes($row['Dealer']);
      $club_type = stripslashes($row['DealerDir']);
      $club_type1 = mysqli_real_escape_string($link, stripslashes($row['DealerDir']));
      $goal = $row['FundraiserGoal'];
      //$reasons = $row['FundraiserReasons'];
      $about = mysqli_real_escape_string($link, $row['About']);
      $start = $row['FundraiserStartDate'];
      $end = $row['FundraiserEndDate'];
      $so_far = getGroupSales($groupID);
      //$position = $row['samplePosition'];
      //$leader = $row['sampleFname'].' '.$row['sampleLname'];
      $phone = $row['Phone'];
      $email = $row['email'];
      //$contact_photo = $row['contact_group_photo'];
      $group_photo = $row['group_team_pic'];
      $leader_photo = $row['leader_pic'];
      $student_photo = $row['location_pic'];
      //$location_pic = $row['location_pic'];
      $contact_pic = $row['contact_pic'];
      $banner_path = $row['banner_path'];
      //$_SESSION['banner'] = $banner_path;
      $setup_person = $row['setuppersonid'];
      $face = $row['facebook'];
      $twit = $row['twitter'];
      $orgType = $row['orgtype'];
      $clubType = $row['clubType'];
      
      $query_e = "SELECT SUM(Amount) FROM IPNdata WHERE Rep='$groupID'";
      $result_e = mysqli_query($link, $query_e)or die ("couldn't execute ytd query.".mysql_error());
      $row_e = mysqli_fetch_array($result_e);
      $amount = $row_e['SUM(Amount)'];
      
      $query2 = "SELECT * FROM orgContacts WHERE fundraiserID = '$groupID'";
      $result2 = mysqli_query($link, $query2) or die("couldn't execute query 2.".mysqli_error($link));
      $row2 = mysqli_fetch_assoc($result2);
      $leader = $row2['orgFName'].' '.$row2['orgLName'];
      $leader_title = $row2['Title'];
      $leader_email = $row2['orgEmail'];
      $leader_phone = $row2['orgPhone'];
      $fundraiserid = $_SESSION['userId'];
      
      $getSample = "SELECT * FROM sample_websites WHERE orgType = '$orgType' AND clubType = '$clubType' AND club = '$club_type1'";
      $sampleResult = mysqli_query($link, $getSample)or die(mysqli_error());
      $sRow = mysqli_fetch_assoc($sampleResult);
      $sReasons = $sRow['sampleReasons'];
      $personalPhoto = $sRow['personalPhoto'];
      $groupPhotoA = $sRow['contact_group_photo'];
      $groupPhotoB = $sRow['groupPhoto'];
      $lPic = $sRow['group_leader'];
      $sPic = $sRow['student_leaders'];
      $sBanner = $sRow['bannerPath'];
      
      
        
      $query3 = "SELECT * FROM orgMembers WHERE fundraiserID = '$groupID'";
      $result3 = mysqli_query($link, $query3) or die(mysqli_error());
      $row3 = mysqli_fetch_assoc($result3);
      $owner = $row3['orgFName'].' '.$row3['orgLName'];
      $owner_email = $row3['orgEmail'];
      $owner_phone = $row3['orgPhone'];  
      
      if($banner_path != '')
        {
           $bannerShow = $banner_path;
        }
        else
        {
           $bannerShow = $sBanner;
        }
      $query8 = "SELECT * FROM captions WHERE fundid = '$groupID'";
      $result8 = mysqli_query($link, $query8) or die(mysqli_error($link));
      $row8 = mysqli_fetch_assoc($result8);
      $capTitle1 = $row8['c1'];
      $cap1 = $row8['c1n'];
      $capTitle2 = $row8['c2'];
      $cap2 = $row8['c2n']; 
   
?>

<!DOCTYPE html>
<head>
	<meta charset="UTF-8" />
	<title>Group Fundraising Website | GreatMoods</title>
	<link rel="shortcut icon" href="favicon.ico">
	<link type="text/css" rel="stylesheet" href="../css/global_styles.css">
	<link type="text/css" rel="stylesheet" href="../css/allforms_styles.css">
	<link rel="stylesheet" href="../images/font-awesome-4.6.3/css/font-awesome.min.css">
	<!--google analytics-->
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-88659906-1', 'auto');
  ga('send', 'pageview');

      </script>
	<script src="../js/js-image-slider.js" type="text/javascript"></script>
</head>

<body>
<div id="container">
  <div id="headerMain"> 
  	<div id="bannerwrap"><a href="http://greatmoods.com"><img id="logo2" src="images/whitelogo.png" alt="GreatMoods Logo"></a>
  	<img id="banner" src="<?php echo $bannerShow;?>" width="1175" height="150" alt="UPLOAD YOUR BANNER HERE!" /></div>
    <div id="menuWrapper"> </div>
    <!--end menuWrapper-->

      <ul class="nav">
		<li><a href="#">Women</a>
	        <?php include 'editFundraiser/menu_women.php'; ?>
		    </li>
		    <li><a href="#">Accessories</a>
		        <?php include 'includes/menu_accessories.php'; ?>
		    </li>
		    <li><a href="#">Men</a>
		        <?php include 'includes/menu_men.php'; ?>
		    </li>
		    <li><a href="#">Juniors</a>
		        <?php include 'includes/menu_juniors.php'; ?>
		    </li>
		    <li><a href="#">Kids</a>
		        <?php include 'includes/menu_kids.php'; ?>
		    </li>
		    <li><a href="#">Fitness</a>
		        <?php include 'includes/menu_fitness.php'; ?>
		    </li>
		    <li><a href="#">Food</a>
		        <?php include 'includes/menu_food.php'; ?>
		    </li>
		    <li><a href="#">Entertainment</a>
		        <?php include 'includes/menu_entertainment.php'; ?>
		    </li>
		    <li><a href="#">Home</a>
		        <?php include 'includes/menu_housewares.php'; ?>
		    </li>
		    <li><a href="#">Health</a>
		        <?php include 'includes/menu_health.php'; ?>
		    </li>
		    <li><a href="#">Inspirational</a>
		        <?php include 'includes/menu_inspirational.php'; ?>
		    </li>
		    <li><a href="#">Holiday</a>
		        <?php include 'includes/menu_holiday.php'; ?>
		    </li>
		    <li class="rtborder"><a href="#">Business</a>
		        <?php include 'includes/menu_business.php'; ?>
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
				                echo '<input class="redbutton" class="user redbutton" name="login" type="submit" value="sign in">';
				                echo '</form>';
				                
				            } elseif($_SESSION['LOGIN'] == "TRUE") {
				            	echo '<div class="loggedinMenu">';
				                echo '<h5>my account</h5>';
				                echo '<span><a href="index.php">GreatMoods Homepage</a></span>';
				         	echo '<span><a href="'.$_SESSION['landingPage'].'" />Account Home</a></span>';
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
          	<div class="profileimgcrop"><img src="<?php  if($student_photo != '')
          	{
          	   echo $student_photo;
          	}
          	else
          	{
          	   echo $groupPhotoA;
          	} 
          	?>" class="profilepic" alt="UPLOAD YOUR PROFILE PICTURE HERE!"></div>
          	<h1><?php echo $club_name; ?></h1>
	    	<h2><? echo $club_type; ?></h2>
	    	<h3><span class="label">Group Goal</span> $<?php echo $goal; ?></h3>
	    	<h3><span class="label">Raised So Far</span> $<?php echo $so_far; ?></h3>
	    	
	  	<div id="socialmediaicons">
	  		<a href="#" target="_blank"><i id="fbicon" class="fa fa-facebook-square" title="Facebook"></i></a>
	  		<a href="#" target="_blank"><i id="twicon" class="fa fa-twitter-square" title="Twitter"></i></a><a href="editFundraiser/salesContact.php?group=<?php echo $_GET['group']; ?>"><i id="emailicon" class="fa fa-envelope-square" title="Email"></i></a>
	  		<!--<a href="#" target="_blank"><i id="liicon" class="fa fa-linkedin-square" title="LinkedIn"></i></a>
	  		<a href="#" target="_blank"><i id="pnicon" class="fa fa-pinterest-square" title="Pinterest"></i></a>
	  		<a href="#" target="_blank"><i id="gpicon" class="fa fa-google-plus-square" title="Google+"></i></a>
	  		-->
	  	</div>
	  	
          	<ul id="sideNav">
		      <li><a href="fundSite.php?group=<?php echo $_GET['group']; ?>"><i class="fa fa-home navicon"></i> Fundraiser Homepage</a></li><?
		      if(isset($_SESSION['authenticated']) && $_SESSION['role'] !== "fundOwner" )
		      {
		          echo '';
		      }
		      else
		      {
		        echo'
		      <li><a href="gm_programoverview.php?group='.$_GET['group'].'"><i class="fa fa-desktop navicon"></i> GreatMoods<br>Program Overview</a></li>
		       <li><a href="editFundraiser/fundgettingstarted14.php?group='.$_GET['group'].'"><i class="fa fa-desktop navicon"></i> Fundraiser Setup Steps</a></li>
		      <li><a href="editFundraiser/fundgettingstarted1.php?group='. $_GET['group'].'"><i class="fa fa-smile-o navicon"></i> About GreatMoods</a></li>
		      <li><a href="editFundraiser/salesContact.php?group='.$_GET['group'].'"><i class="fa fa-check navicon"></i> Get Started Today!<br>Contact Your Rep!</a></li>';
		      }
		      ?>
		</ul>
          	
		<? 
		if(isset($_SESSION['authenticated']) && $_SESSION['role'] == "fundOwner") {
			echo '
	  	<hr>
		
		<h4>Program Overview</h4>
	       	<ul id="sideNav">
	             <li><a href="editFundraiser/gm_mission.php" title=""><i class="fa fa-heart navicon"></i> Mission</a></li>
	             <li><a href="editFundraiser/gm_program.php" title=""><i class="fa fa-list-ol navicon"></i> GreatMoods Program</a></li> 
	             <li><a href="editFundraiser/gm_getStarted.php" title=""><i class="fa fa-calendar-check-o navicon"></i> Get Started Today!</a></li> 
	      	</ul>
	      	
	      	<hr>
	      	
	      	<!-- collapsible menu -->
		<!--<h4>Training & Tutorials</h4> 
		<ul id="sideNav"> 
			<li><a href="#"></a></li>                                           
		</ul> 
		
		<br>-->
		
		<h4>Account Administration</h4>
	       	<ul id="sideNav">
	       		<li><a href="fundSite.php?group= '.$_GET['group'].'"><i class="fa fa-home navicon"></i> View My Homepage</a></li> 
	             <li><a href="editFundraiser/goals.php" title=""><i class="fa fa-calculator navicon"></i> Goals & Achievements</a></li>
	             <li><a href="editFundraiser/fundTools.php" title=""><i class="fa fa-wrench navicon"></i> Fundraising Tools</a></li>
	             <li><a href="editFundraiser/coordhome.php" title="Account Home"><i class="fa fa-users navicon"></i> View Team & Accounts</a></li> 
	             <li><a href="editFundraiser/contacts.php" title=""><i class="fa fa-user navicon"></i> View Fundraiser Contacts</a></li>
	             <li><a href="editFundraiser/emails2.php"><i class="fa fa-envelope navicon"></i> Send Emails</a></li>
		     <li><a href="editFundraiser/viewReports2.php"><i class="fa fa-dollar navicon"></i> $ales Reports</a></li>
		     <li><a href="editFundraiser/memberReports.php"><i class="fa fa-dollar navicon"></i> Member Reports</a></li>
	             <!--<li><a href="editFundraiser/addFundGroup.php" title=""><i class="fa fa-plus-square navicon"></i> Add Fundraiser Group</a></li>-->
	             <li><a href="editFundraiser/addFundLeader.php" title=""><i class="fa fa-plus-square navicon"></i> Add Fundraiser Leader</a></li>
	             <li><a href="editFundraiser/members.php" title=""><i class="fa fa-plus-square navicon"></i> Add Fundraiser Member</a></li> 
	             <li><a href="editFundraiser/addFriendFamily.php" title=""><i class="fa fa-plus-square navicon"></i> Add Friend & Family</a></li> 
	             <li><a href="editFundraiser/addBusinessSupporter.php" title=""><i class="fa fa-plus-square navicon"></i> Add Business Supporter</a></li> 
	             <li><a href="editFundraiser/addBusinessAssociate.php" title=""><i class="fa fa-plus-square navicon"></i> Add Business Associate</a></li> 
	             <li><a href="editFundraiser/information.php" title=""><i class="fa fa-pencil navicon"></i> Edit My Account</a></li>
		     <li><a href="editFundraiser/reasons.php"><i class="fa fa-edit navicon"></i> Edit Fundraiser Description</a></li>
		     <li><a href="editFundraiser/photos.php"><i class="fa fa-photo navicon"></i> Change Photos</a></li>
		    <!-- <li><a href="editFundraiser/leaderLogin.php" />Login Home</a></li>-->
	      	</ul>
	      	';
	       	} 
	       	?>
	       	
	       	<ul id="sideNav">
			
		</ul>
	</ul> <!-- end sidenav -->
</div> <!-- end leftSideBarSample -->

<div id="contentSample">
	<div id="column1">
		<h3 class="sample">Please Support Our <? echo $club_type; ?> Fundraiser!</h3>
		
		<div id="sliderFrame" class="grpcollage">
		        <div id="marketingSlider">
		            	<img src="<?php  if($group_photo != '') {
					echo $group_photo;
				}
				else {
					echo $groupPhotoB;
				} 
				?>" height="258" alt="UPLOAD YOUR GROUP PICTURE HERE!">
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
			<?php 
			if($start != '') {
				echo '
				<label class="funddates"><b>Starts:</b>&nbsp;
				'.$start.'</label>
				<label class="rtfloat funddates"><b>Ends:</b>&nbsp; '.$end.'</label>
				<br>
				<br>
				';
			} 
			?>
			
			<?php 
			if($about != '') {
				echo '<h5 id="reasons">About Our Fundraiser</h5>';
				echo "<p>";
				echo stripslashes($about);
				echo "</p>";
			}	
			?>

			<?php
			$query5 = "SELECT * FROM fund_reasons WHERE fundID = '$groupID '";
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
			
			echo '<h5 id="reasons">Reasons for Our Fundraiser</h5>';
				if($r1 == '' && $r2 == '' && $r3 == '') {
					$r_list = explode('.', $sReasons);
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
				else {
					echo '<div id="reasoncontent">
					<table class="">
						<tr class="even"><td>';
							if($r1 != '') { 
								echo '<i class="fa fa-circle"></i>';
								echo $r1;
								echo '</td></tr><tr class="even"><td>';
							} 
							if($r2 != '') { 
								echo '<i class="fa fa-circle"></i>';
								echo $r2;
								echo '</td></tr><tr class="even"><td>';
							} 
							if($r3 != '') { 
								echo '<i class="fa fa-circle"></i>'; 
								echo $r3;
								echo '</td></tr><tr class="even"><td>';
							} 
							if($r4 != '') { 
								echo '<i class="fa fa-circle"></i>';
								echo $r4;
								echo '</td></tr><tr class="even"><td>';
							}  
							if($r5 != '') {
								echo '<i class="fa fa-circle"></i>';
								echo $r5;
								echo '</td></tr><tr class="even"><td>';
							} 
							if($r6 != '') { 
								echo '<i class="fa fa-circle"></i>';
								echo $r6;
								echo '</td></tr> <tr class="even"><td>';
							} 
							if($r7 != '') { 
								echo '<i class="fa fa-circle"></i>';
								echo $r7;
								echo '</td></tr><tr class="even"><td>';
							} 
							if($r8 != '') { 
								echo '<i class="fa fa-circle"></i>';
								echo $r8;
								echo '</td></tr><tr class="even"><td>';
							} 
							if($r9 != '') { 
								echo '<i class="fa fa-circle"></i>';
								echo $r9;
								echo '</td></tr><tr class="even"><td>';
							} 
							if($r10 != '') { 
								echo '<i class="fa fa-circle"></i>';
								echo $r10;
								echo '</td></tr>';
							} 
					echo '</table>
					</div>';
				}
			?>
		</div> <!-- end reasonsbox -->
		
		<div id="goals">
			<br>
			<p><strong>Group<br>Goal</strong><br>
			$<?php echo $goal; ?></p><br>
			<p><strong>Raised<br>
			So Far</strong><br>
			$<?php echo $so_far; ?></p>
		</div>    <!--end goals--> 

		<div class="leader">
			<div class="leaderimgcrop"><img src="<?php  if($leader_photo != '') {
				echo $leader_photo;
			}
			else {
				echo $leader_photo;
			} 
			?>" alt="UPLOAD YOUR LEADER PICTURE HERE!" height="140px" width="140px"></div>
			
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
			<div class="leaderimgcrop">
				<img src="<?php  if($contact_pic != '') {
					echo $contact_pic;
				}
				else {
					echo $sPic;
				} 
				?>" alt="UPLOAD ANY PICTURE HERE!" height="140px" width="140px">
			</div>
			
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
		</div> <!--end studentleader-->
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
			<img src="images/rightcol_collage_4pics_15nov2016.jpg" width="160" height="" alt="new arrivals daily">
		</div>
	</div> <!-- end column2 -->  
</div> <!--end content-->

  <div class="clearfloat">  </div>

  <?php include 'footer.php' ; ?>
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