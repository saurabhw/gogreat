<?php 
   //session_start();
?>
<div id="leftSideBar">
<div class="profileimgcrop"><img src="../<?php echo $pic; ?>" class="profilepic" alt="profile Pic"></div>
	<div id="acctname"><? echo $_SESSION['firstName'].' '.$_SESSION['lastname']; ?></div>
		<!-- will pull up related accounts -->
		
	<br>
	<div id="accordion">
	<h4>My Accounts</h4>
	<div>
	<?
         
         getAccounts1($userID);
        ?>
	</div>
	<h4>Program Overview</h4>
	<div>
	<ul id="sideNav">
       		<li><a href="gm_programoverview.php" title="">GreatMoods Program Overview</a></li> 
       		<li><a href="gm_fundsetupsteps.php" title="">Fundraiser Setup Steps</a></li> 
             <li><a href="gm_mission.php" title="">Mission</a></li>
             <li><a href="gm_program.php" title="">GreatMoods Program</a></li> 
             <li><a href="gm_getStarted.php" title="">Get Started Today!</a></li> 
      	</ul>
	</div>
	<h4>Training & Tutorials</h4>
	<div>
	<ul id="sideNav"> <!-- collapsible menu -->
		<li><a href="salesAZ2.php">Training Program<br>Overview - A to Z</a></li>                                          
		<li><a href="repSignup.php">Getting Started</a></li>
		<li><a href="jobDescription.php">Job Description & Responsibilities</a></li>
		<li><a href="prospectOpp.php">Prospect <br>Opportunities</a></li>
		<li><a href="identifyProspect.php">Identifying Your Prospects</a></li>
		<li><a href="researchProspect.php">Researching Your Prospects</a></li>
		<li><a href="setupProspect.php">Setting Up Your Prospect's Website</a></li>
		<li><a href="calculateIncome.php">Income $uccess Potential </a></li>
		<li><a href="repCalculator.php">Income Calculator</a></li>
		<li><a href="beginSelling.php">Let the Fundraising Begin!</a></li>
		<li><a href="fundraisingPresentation.php">Your Fundraising Presentation</a></li>                   
		<li><a href="presentationScript.php">Presentation Script</a></li>
		<li><a href="afterYes.php">When They <br>Say Yes!</a></li>
		<li><a href="fundLeaderAZ.php">Fundraising<br>Leaders A to Z</a></li>
		<li><a href="memberAZ.php">Members A to Z</a></li>
		<li><a href="printshop.php">Printshop Library</a></li>  
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
	</div> <!-- end greatmoods mall -->
	
	</div><!--end accordion-->
	
	<h4>Account Administration</h4>
       	<ul id="sideNav">
            <!-- <li><a href="calculator.php" title=""><i class="fa fa-calculator navicon"></i> Goals & Achievements</a></li>-->
             <li><a href="fundTools.php" title=""><i class="fa fa-wrench navicon"></i> Fundraising Tools</a></li> 
             <li><a href="editClub.php" title="Account Home"><i class="fa fa-users navicon"></i> View Team & Accounts</a></li> 
             <li><a href="contacts.php" title=""><i class="fa fa-user navicon"></i> View Contacts</a></li>
             <li><a href="emails2.php" title=""><i class="fa fa-envelope navicon"></i> Send Email</a></li>
             <li><a href="viewReports2.php" title=""><i class="fa fa-dollar navicon"></i> Group Sales Reports</a></li>
             <li><a href="memberReports.php" title=""><i class="fa fa-dollar navicon"></i> Member Sales Reports</a></li> 
             <!-- <li><a href="addOrg.php" title=""><i class="fa fa-plus-square navicon"></i> Add Organization</a></li> -->
             <li><a href="selectFundraiser.php" title=""><i class="fa fa-plus-square navicon"></i> Add Fundraiser Account</a></li>
             <li><a href="addNewGroup.php" title=""><i class="fa fa-plus-square navicon"></i> Add Fundraiser Group</a></li>
            
             <li><a href="newLeaders.php" title=""><i class="fa fa-upload navicon"></i> Add Fundraiser Leaders</a></li>
             <li><a href="newMembers.php" title=""><i class="fa fa-plus-square navicon"></i> Add Fundraiser Members</a></li>
             
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