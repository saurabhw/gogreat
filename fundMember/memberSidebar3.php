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
  	<h1><? echo $fn.' '.$ln; ?></h1>
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
	
  	<!--<? 
	if(isset($_SESSION['authenticated']) && $_SESSION['role'] == "Member") {
		echo '<div id="acctname">Welcome '.$_SESSION['firstName'].'!</div><br>';
	}
	?>-->

	<header class="masthead">
	  <div class="brand-container"><h4 class="brand-name">GreatMoods Mall</h4></div>
	  
	  <nav class="mallSideNav">
	    <div class="nav-container">
	      <div> 
	        <input id="slider1" name="slider1" type="checkbox">
	        <label class="slide has-child" for="slider1"><span class="name"><a href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Womens/c/18159169/offset=0&sort=priceAsc">Women</a></span><i class="fa fa-chevron-down navico n"></i></label>
	        <?php include 'leftnavSubmenu_women2.php'; ?>
	      </div> <!-- end store category -->
	      
	      <div>
	      	<input id="slider2" name="slider2" type="checkbox">
	        <label class="slide has-child" for="slider2"><span class="name"><a href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Accessories/c/18195523/offset=0&sort=priceAsc">Accessories</a></span><i class="fa fa-chevron-down navico n"></i></label>
	        <?php include 'leftnavSubmenu_accessories2.php'; ?>
	      </div> <!-- end store category -->
	      
	      <div>
	        <input id="slider3" name="slider3" type="checkbox">
	        <label class="slide has-child" for="slider3"><span class="name"><a href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Mens/c/18159150/offset=0&sort=priceAsc">Men</a></span><i class="fa fa-chevron-down navico n"></i></label>
	        <?php include 'leftnavSubmenu_men2.php'; ?>
	      </div> <!-- end store category -->
	      
	      <div>
	      	<input id="slider4" name="slider4" type="checkbox">
	        <label class="slide has-child" for="slider4"><span class="name"><a href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Juniors/c/18195671/offset=0&sort=priceAsc">Juniors</a></span><i class="fa fa-chevron-down navico n"></i></label>
	        <?php include 'leftnavSubmenu_juniors2.php'; ?>
	      </div> <!-- end store category -->
	      
	      <div>
	      	<input id="slider5" name="slider5" type="checkbox">
	        <label class="slide has-child" for="slider5"><span class="name"><a href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Kids/c/18209039/offset=0&sort=priceAsc">Kids</a></span><i class="fa fa-chevron-down navico n"></i></label>
	        <?php include 'leftnavSubmenu_kids2.php'; ?>
	      </div> <!-- end store category -->
	      
	      <div>
	      	<input id="slider6" name="slider6" type="checkbox">
	        <label class="slide has-child" for="slider6"><span class="name"><a href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Fitness/c/18209624/offset=0&sort=priceAsc">Fitness</a></span><i class="fa fa-chevron-down navico n"></i></label>
	        <?php include 'leftnavSubmenu_fitness2.php'; ?>
	      </div> <!-- end store category -->
	      
	      <div>
	      	<input id="slider7" name="slider7" type="checkbox">
	        <label class="slide has-child" for="slider7"><span class="name"><a href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Food/c/18209702/offset=0&sort=priceAsc">Food</a></span><i class="fa fa-chevron-down navico n"></i></label>
	        <?php include 'leftnavSubmenu_food2.php'; ?>
	      </div> <!-- end store category -->
	      
	      <div>
	      	<input id="slider8" name="slider8" type="checkbox">
	        <label class="slide has-child" for="slider8"><span class="name"><a href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Entertainment/c/18209743/offset=0&sort=priceAsc">Entertainment</a></span><i class="fa fa-chevron-down navico n"></i></label>
	        <?php include 'leftnavSubmenu_entertainment2.php'; ?>
	      </div> <!-- end store category -->
	      
	      <div>
	      	<input id="slider9" name="slider9" type="checkbox">
	        <label class="slide has-child" for="slider9"><span class="name"><a href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Houseware/c/18209794/offset=0&sort=priceAsc">Home</a></span><i class="fa fa-chevron-down navico n"></i></label>
	        <?php include 'leftnavSubmenu_housewares2.php'; ?>
	      </div> <!-- end store category -->
	      
	      <div>
	      	<input id="slider10" name="slider10" type="checkbox">
	        <label class="slide has-child" for="slider10"><span class="name"><a href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Health/c/18209818/offset=0&sort=priceAsc">Health</a></span><i class="fa fa-chevron-down navico n"></i></label>
	        <?php include 'leftnavSubmenu_health2.php'; ?>
	      </div> <!-- end store category -->
	      
	      <div>
	      	<input id="slider11" name="slider11" type="checkbox">
	        <label class="slide has-child" for="slider11"><span class="name"><a href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Inspirational/c/18209845/offset=0&sort=priceAsc">Inspirational</a></span><i class="fa fa-chevron-down navico n"></i></label>
	        <?php include 'leftnavSubmenu_inspirational2.php'; ?>
	      </div> <!-- end store category -->
	      
	      <div>
	      	<input id="slider12" name="slider12" type="checkbox">
	        <label class="slide has-child" for="slider12"><span class="name"><a href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Holiday/c/18209901/offset=0&sort=priceAsc">Holiday</a></span><i class="fa fa-chevron-down navico n"></i></label>
	        <?php include 'leftnavSubmenu_holiday2.php'; ?>
	      </div> <!-- end store category -->
	      
	      <div>
	      	<input id="slider13" name="slider13" type="checkbox">
	        <label class="slide has-child" for="slider13"><span class="name"><a href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Business/c/18209939/offset=0&sort=priceAsc">Business</a></span><i class="fa fa-chevron-down navico n"></i></label>
	        <?php include 'leftnavSubmenu_business2.php'; ?>
	      </div> <!-- end store category -->
	      
	    </div> <!-- end nav container -->
	  </nav>
	</header>
	
	<?
	if(isset($_SESSION['authenticated']))
	{
	  echo'
	  <hr>
	  
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