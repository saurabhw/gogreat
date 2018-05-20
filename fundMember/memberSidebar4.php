<?php
    session_start();
    //include("../includes/connection.inc.php");
      //$link = connectTo();
 
    /* $email = $_SESSION['email'];
     $query1 = "SELECT * FROM Dealers WHERE email =' $email'";
      $result1 = mysqli_query($link, $query1) or die(mysqli_error());
      $row = mysqli_fetch_assoc($result1);
      $id = $row['loginid'];
      $myPic = $row['contact_pic'];
     */
?>

<div id="leftSideBar">
	<div class="profileimgcrop"><img src="../<? echo $myPic; ?>" class="profilepic" alt="UPLOAD YOUR PROFILE PICTURE HERE!"></div>
  	<h1><? echo $owner; ?></h1>
  	<h2><? echo $club_type; ?></h2>
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
	
	<ul id="sideNav">
		<li><a href="membersite.php?group=<?php echo $_GET['group']; ?>"><i class="fa fa-home navicon"></i> Fundraiser Homepage</a></li>
	      	<li><a href="fundgettingstarted11.php?group=<?php echo $_GET['group']; ?>"><i class="fa fa-desktop navicon"></i> GreatMoods<br>Program Overview</a></li>
	      	<li><a href="fundgettingstarted1.php?group=<?php echo $_GET['group']; ?>"><i class="fa fa-smile-o navicon"></i> About GreatMoods</a></li>
	      	<li><a href="salesContact.php?group=<?php echo $_GET['group']; ?>"><i class="fa fa-check navicon"></i> Get Started Today!<br>Contact Your Rep!</a></li>
	</ul>
	
	<hr>
	
	<h4>About GreatMoods</h4>
	<ul id="sideNav">
		<li><a href="fundgettingstarted1.php?group=<?php echo $_GET['group']; ?>"><i class="fa fa-smile-o navicon"></i> Welcome!</a></li>
		<li><a href="fundgettingstarted11.php?group=<?php echo $_GET['group']; ?>"><i class="fa fa-desktop navicon"></i> GreatMoods<br>Program Overview</a></li>
		<li><a href="fundgettingstarted14.php?group=<?php echo $_GET['group']; ?>"><i class="fa fa-list-ul navicon"></i> Fundraiser Setup Steps</a></li> 
		<li><a href="fundgettingstarted2.php?group=<?php echo $_GET['group']; ?>"><i class="fa fa-heart navicon"></i> GreatMoods Mission</a></li>
		<li><a href="fundgettingstarted12.php?group=<?php echo $_GET['group']; ?>"><i class="fa fa-mouse-pointer navicon"></i> GreatMoods Online Fundraising</a></li>
		<li><a href="fundgettingstarted3.php?group=<?php echo $_GET['group']; ?>"><i class="fa fa-star navicon"></i> Strengths of the<br>GreatMoods Program</a></li>
		<li><a href="fundgettingstarted4.php?group=<?php echo $_GET['group']; ?>"><i class="fa fa-line-chart navicon"></i> 3 Steps to<br>Fundraising $uccess</a></li>
		<li><a href="fundgettingstarted5.php?group=<?php echo $_GET['group']; ?>"><i class="fa fa-shopping-cart navicon"></i> Greatmoods Mall<br>Products & Gifts</a></li>
		<li><a href="fundgettingstarted6.php?group=<?php echo $_GET['group']; ?>"><i class="fa fa-truck navicon"></i> We Deliver!</a></li>
		<li><a href="fundgettingstarted7.php?group=<?php echo $_GET['group']; ?>"><i class="fa fa-money navicon"></i> Cash Deposited Weekly!</a></li>
		<li><a href="fundgettingstarted8.php?group=<?php echo $_GET['group']; ?>"><i class="fa fa-calculator navicon"></i> Calculate Your $uccess</a></li>
		<li><a href="fundgettingstarted10.php?group=<?php echo $_GET['group']; ?>"><i class="fa fa-calendar navicon"></i> Generate Funds<br>24/7/365 Days a Year!</a></li>
		<li><a href="fundgettingstarted9.php?group=<?php echo $_GET['group']; ?>"><i class="fa fa-check navicon"></i> Get Started Today!<br>Contact Your Rep!</a></li>
	</ul>
	
  	<!--<? 
	if(isset($_SESSION['authenticated'])) {
		echo '<div id="acctname">Welcome '.$_SESSION['firstName'].'!</div><br>';
	}
	?>-->

	<?
	if(isset($_SESSION['authenticated']))
	{
	  echo'<hr>
	  
	  	<h4>Program Overview</h4>
	
	       	<ul id="sideNav">
	             <li><a href="gm_mission.php" title=""><i class="fa fa-heart navicon"></i> Mission</a></li>
	             <li><a href="gm_program.php" title=""><i class="fa fa-list-ol navicon"></i> GreatMoods Program</a></li> 
	             <li><a href="gm_getStarted.php" title=""><i class="fa fa-calendar-check-o navicon"></i> Get Started Today!</a></li> 
	      	</ul>
	      	
	      	<br>
	      	
	      	<!-- collapsible menu -->
		<!--<h4>Training & Tutorials</h4> 
		<ul id="sideNav"> 
			<li><a href="#"></a></li>                                           
		</ul> -->
		
		<br>
		  <h4>Account Administration</h4>
	       	<ul id="sideNav">
	       		<li><a href="membersite.php?group='.$_SESSION['groupid'].'"><i class="fa fa-home navicon"></i> View My Homepage</a></li>
	            	<!-- <li><a href="goalsAchievements.php" title=""><i class="fa fa-calculator navicon"></i> Goals & Achievements</a></li>-->
	             	<li><a href="fundTools.php" title=""><i class="fa fa-wrench navicon"></i> Fundraising Tools</a></li>
	             	<li><a href="viewReports2.php"><i class="fa fa-dollar navicon"></i> View Reports</a></li>
	             	<li><a href="emails2.php"><i class="fa fa-envelope navicon"></i> Send Emails</a></li>
	             	<li><a href="contacts.php" title="Account Home"><i class="fa fa-user navicon"></i> View Contacts</a></li>  
	             	<li><a href="addFriendFamily.php" title=""><i class="fa fa-plus-square navicon"></i> Add Friend & Family</a></li> 
	             	<li><a href="addBusinessSupporter.php" title=""><i class="fa fa-plus-square navicon"></i> Add Business Supporter</a></li> 
	             	<li><a href="addBusinessAssociate.php" title=""><i class="fa fa-plus-square navicon"></i> Add Business Associate</a></li> 
	             	<li><a href="memberHome.php" title=""><i class="fa fa-pencil navicon"></i> Edit My Account</a></li> 
	         
	             
	            <!-- <li><a href="memberLogin.php" title="">Login Home</a></li> -->
	      	</ul>';
      	}
      	?>
</div>