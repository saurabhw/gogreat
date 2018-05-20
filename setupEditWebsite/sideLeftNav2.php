<?php 
   //session_start();
?>
<div id="leftSideBar">
	<div class="profileimgcrop"><img src="../<?php echo $pic; ?>" class="profilepic" alt="profile Pic"></div>
	<h1><? echo $_SESSION['firstName'].' '.$_SESSION['lastname']; ?></h1>
		<!-- will pull up related accounts -->
	<div id="accordion">
  <h4>My Accounts</h4>
  <div>
   <?
     //include('../includes/functions.php');
     getAccounts1($userID);
   ?>
  </div>
  <h4>Program Overview</h4>
  <div>
   <ul id="sideNav">
             <li><a href="../gm_mission.php" title=""><i class="fa fa-heart navicon"></i> GreatMoods Mission</a></li>
             <li><a href="../gm_programoverview.php" title=""><i class="fa fa-desktop navicon"></i> GreatMoods<br>Program Overview</a></li> 
             <li><a href="gm_program.php" title=""><i class="fa fa-list-ol navicon"></i> GreatMoods Program</a></li> 
             <li><a href="gm_fundsetupsteps.php" title=""><i class="fa fa-desktop navicon"></i> Fundraiser Setup Steps</a></li> 
             <li><a href="gm_getStarted.php" title=""><i class="fa fa-calendar-check-o navicon"></i> Get Started Today!</a></li> 
      	</ul>
  </div>
  <h4>Training & Tutorials</h4>
  <div>
   <ul id="sideNav"> <!-- collapsible menu -->
		<li><a href="salesAZ2.php"><i class="fa fa-sort-alpha-asc navicon"></i> Training Program<br>Overview - A to Z</a></li>                                          
		<li><a href="repSignup.php"><i class="fa fa-inbox navicon"></i> Getting Started</a></li>
		<li><a href="jobDescription.php"><i class="fa fa-briefcase navicon"></i> Job Description & Responsibilities</a></li>
		<li><a href="prospectOpp.php"><i class="fa fa-list-alt navicon"></i> Prospect Opportunities</a></li>
		<li><a href="identifyProspect.php"><i class="fa fa-files-o navicon"></i> Identifying Your Prospects</a></li>
		<li><a href="researchProspect.php"><i class="fa fa-search navicon"></i> Researching Your Prospects</a></li>
		<li><a href="setupProspect.php"><i class="fa fa-laptop navicon"></i> Setting Up Your Prospect's Website</a></li>
		<li><a href="calculateIncome.php"><i class="fa fa-pie-chart navicon"></i> Income $uccess Potential </a></li>
		<li><a href="repCalculator.php"><i class="fa fa-calculator navicon"></i> Income Calculator</a></li>
		<li><a href="beginSelling.php"><i class="fa fa-clock-o navicon"></i> Let the Fundraising Begin!</a></li>
		<li><a href="fundraisingPresentation.php"><i class="fa fa-comment navicon"></i> Your Fundraising Presentation</a></li>                   
		<li><a href="presentationScript.php"><i class="fa fa-file-text-o navicon"></i> Presentation Script</a></li>
		<li><a href="afterYes.php"><i class="fa fa-thumbs-o-up navicon"></i> When They Say Yes!</a></li>
		<li><a href="fundLeaderAZ.php"><i class="fa fa-sort-alpha-asc navicon"></i> Fundraising Leaders A to Z</a></li>
		<li><a href="memberAZ.php"><i class="fa fa-sort-alpha-asc navicon"></i> Members A to Z</a></li>
		<li><a href="printshop.php"><i class="fa fa-print navicon"></i> Printshop Library</a></li>  
	</ul> 
    
  </div>
  
	<h4>GreatMoods Mall</h4>
	<div>
	  <header class="masthead">
	  <nav class="mallSideNav">
	    <div class="nav-container">
	      <div> 
	        <input id="slider1" name="slider1" type="checkbox">
	        <label class="slide has-child" for="slider1"><span class="name"><a href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Womens/c/18159169/offset=0&sort=priceAsc">Women</a></span><i class="fa fa-chevron-down navico n"></i></label>
	        <?php include 'navigation/leftnavSubmenu_women2.php'; ?>
	      </div> <!-- end store category -->
	      
	      <div>
	      	<input id="slider2" name="slider2" type="checkbox">
	        <label class="slide has-child" for="slider2"><span class="name"><a href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Accessories/c/18195523/offset=0&sort=priceAsc">Accessories</a></span><i class="fa fa-chevron-down navico n"></i></label>
	        <?php include 'navigation/leftnavSubmenu_accessories2.php'; ?>
	      </div> <!-- end store category -->
	      
	      <div>
	        <input id="slider3" name="slider3" type="checkbox">
	        <label class="slide has-child" for="slider3"><span class="name"><a href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Mens/c/18159150/offset=0&sort=priceAsc">Men</a></span><i class="fa fa-chevron-down navico n"></i></label>
	        <?php include 'navigation/leftnavSubmenu_men2.php'; ?>
	      </div> <!-- end store category -->
	      
	      <div>
	      	<input id="slider4" name="slider4" type="checkbox">
	        <label class="slide has-child" for="slider4"><span class="name"><a href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Juniors/c/18195671/offset=0&sort=priceAsc">Juniors</a></span><i class="fa fa-chevron-down navico n"></i></label>
	        <?php include 'navigation/leftnavSubmenu_juniors2.php'; ?>
	      </div> <!-- end store category -->
	      
	      <div>
	      	<input id="slider5" name="slider5" type="checkbox">
	        <label class="slide has-child" for="slider5"><span class="name"><a href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Kids/c/18209039/offset=0&sort=priceAsc">Kids</a></span><i class="fa fa-chevron-down navico n"></i></label>
	        <?php include 'navigation/leftnavSubmenu_kids2.php'; ?>
	      </div> <!-- end store category -->
	      
	      <div>
	      	<input id="slider6" name="slider6" type="checkbox">
	        <label class="slide has-child" for="slider6"><span class="name"><a href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Fitness/c/18209624/offset=0&sort=priceAsc">Fitness</a></span><i class="fa fa-chevron-down navico n"></i></label>
	        <?php include 'navigation/leftnavSubmenu_fitness2.php'; ?>
	      </div> <!-- end store category -->
	      
	      <div>
	      	<input id="slider7" name="slider7" type="checkbox">
	        <label class="slide has-child" for="slider7"><span class="name"><a href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Food/c/18209702/offset=0&sort=priceAsc">Food</a></span><i class="fa fa-chevron-down navico n"></i></label>
	        <?php include 'navigation/leftnavSubmenu_food2.php'; ?>
	      </div> <!-- end store category -->
	      
	      <div>
	      	<input id="slider8" name="slider8" type="checkbox">
	        <label class="slide has-child" for="slider8"><span class="name"><a href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Entertainment/c/18209743/offset=0&sort=priceAsc">Entertainment</a></span><i class="fa fa-chevron-down navico n"></i></label>
	        <?php include 'navigation/leftnavSubmenu_entertainment2.php'; ?>
	      </div> <!-- end store category -->
	      
	      <div>
	      	<input id="slider9" name="slider9" type="checkbox">
	        <label class="slide has-child" for="slider9"><span class="name"><a href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Houseware/c/18209794/offset=0&sort=priceAsc">Home</a></span><i class="fa fa-chevron-down navico n"></i></label>
	        <?php include 'navigation/leftnavSubmenu_housewares2.php'; ?>
	      </div> <!-- end store category -->
	      
	      <div>
	      	<input id="slider10" name="slider10" type="checkbox">
	        <label class="slide has-child" for="slider10"><span class="name"><a href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Health/c/18209818/offset=0&sort=priceAsc">Health</a></span><i class="fa fa-chevron-down navico n"></i></label>
	        <?php include 'navigation/leftnavSubmenu_health2.php'; ?>
	      </div> <!-- end store category -->
	      
	      <div>
	      	<input id="slider11" name="slider11" type="checkbox">
	        <label class="slide has-child" for="slider11"><span class="name"><a href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Inspirational/c/18209845/offset=0&sort=priceAsc">Inspirational</a></span><i class="fa fa-chevron-down navico n"></i></label>
	        <?php include 'navigation/leftnavSubmenu_inspirational2.php'; ?>
	      </div> <!-- end store category -->
	      
	      <div>
	      	<input id="slider12" name="slider12" type="checkbox">
	        <label class="slide has-child" for="slider12"><span class="name"><a href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Holiday/c/18209901/offset=0&sort=priceAsc">Holiday</a></span><i class="fa fa-chevron-down navico n"></i></label>
	        <?php include 'navigation/leftnavSubmenu_holiday2.php'; ?>
	      </div> <!-- end store category -->
	      
	      <div>
	      	<input id="slider13" name="slider13" type="checkbox">
	        <label class="slide has-child" for="slider13"><span class="name"><a href="../greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Business/c/18209939/offset=0&sort=priceAsc">Business</a></span><i class="fa fa-chevron-down navico n"></i></label>
	        <?php include 'navigation/leftnavSubmenu_business2.php'; ?>
	      </div> <!-- end store category -->
	      
	    </div> <!-- end nav container -->
	  </nav>
	</header>
	
	</div> <!-- end mall -->
	</div> <!-- end accordian -->

	
	<hr>
	
	<h4>Account Administration</h4>
       	<ul id="sideNav">
            <!-- <li><a href="calculator.php" title=""><i class="fa fa-calculator navicon"></i> Goals & Achievements</a></li>-->
             <li><a href="fundTools.php" title=""><i class="fa fa-wrench navicon"></i> Fundraising Tools</a></li> 
             <li><a href="editClub.php" title="Account Home"><i class="fa fa-users navicon"></i> View Team & Accounts</a></li> 
             <li><a href="contacts.php" title=""><i class="fa fa-user navicon"></i> View Contacts</a></li>
             <li><a href="sendPasswords.php" title=""><i class="fa fa-envelope navicon"></i> Send Passwords</a></li>
             <li><a href="emails2.php" title=""><i class="fa fa-envelope navicon"></i> Send Email</a></li>
             <li><a href="viewReports2.php" title=""><i class="fa fa-dollar navicon"></i> Group Sales Reports</a></li>
             <li><a href="memberReports.php" title=""><i class="fa fa-dollar navicon"></i> Member Sales Reports</a></li> 
             <!-- <li><a href="addOrg.php" title=""><i class="fa fa-plus-square navicon"></i> Add Organization</a></li> -->
             <li><a href="selectFundraiser.php" title=""><i class="fa fa-plus-square navicon"></i> Add Fundraiser Account</a></li>
             <li><a href="addNewGroup.php" title=""><i class="fa fa-plus-square navicon"></i> Add Fundraiser Group</a></li>
             <li><a href="addFundLeader.php" title=""><i class="fa fa-plus-square navicon"></i> Add Fundraiser Leader</a></li>
             <li><a href="uploadLeaders.php" title=""><i class="fa fa-upload navicon"></i> Upload Leaders</a></li>
             <li><a href="addFundMember.php" title=""><i class="fa fa-plus-square navicon"></i> Add Fundraiser Member</a></li>
             <li><a href="uploadMembers.php" title=""><i class="fa fa-upload navicon"></i> Upload Members</a></li> 
             <li><a href="addFriendFamily.php" title=""><i class="fa fa-plus-square navicon"></i> Add Friend & Family</a></li> 
             <li><a href="addBusinessSupporter.php" title=""><i class="fa fa-plus-square navicon"></i> Add Business Supporter</a></li> 
             <li><a href="addBusinessAssociate.php" title=""><i class="fa fa-plus-square navicon"></i> Add Business Associate</a></li> 
             <li><a href="accountEdit.php" title=""><i class="fa fa-pencil navicon"></i> Edit My Account</a></li>  
      	</ul>
	
	<!--<br>
	
	<h4>Old Nav</h4>
               <ul id="sideNav">
                     	<li><a href="addBanner.php">Add Banners</a></li> 
              </ul>-->
</div>