<?php 
   session_start();
?>
<div id="leftSideBar">
	<div class="profileimgcrop"><img src="../<?php echo $pic; ?>" class="profilepic" alt="profile Pic"></div>
	<h1>Welcome,<br><? echo $_SESSION['firstName'].' '.$_SESSION['lastname']; ?>!</h1>
		<!-- will pull up related accounts -->

	<hr>
	
	<h4>Welcome,<br>Program Overview</h4>
       	<ul id="sideNav">
             <li><a href="gm_mission.php" title=""><i class="fa fa-heart navicon"></i> GreatMoods Mission</a></li>
             <li><a href="gm_programoverview.php" title=""><i class="fa fa-desktop navicon"></i> GreatMoods<br>Program Overview</a></li> 
             <li><a href="gm_program.php" title=""><i class="fa fa-list-ol navicon"></i> GreatMoods Program</a></li> 
             <li><a href="gm_fundsetupsteps.php" title=""><i class="fa fa-desktop navicon"></i> Fundraiser Setup Steps</a></li> 
             <li><a href="gm_getStarted.php" title=""><i class="fa fa-calendar-check-o navicon"></i> Get Started Today!</a></li> 
      	</ul>
      	
      	<hr>
      	
	<h4>Training & Tutorials</h4> 
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
	
	<hr>
	
	<h4>Account Administration</h4>
       	<ul id="sideNav">
            <!-- <li><a href="calculator.php" title=""><i class="fa fa-calculator navicon"></i> Goals & Achievements</a></li>-->
             <li><a href="fundTools.php" title=""><i class="fa fa-wrench navicon"></i> Fundraising Tools</a></li> 
             <li><a href="editClub.php" title="Account Home"><i class="fa fa-users navicon"></i> View Team & Accounts</a></li> 
             <li><a href="contacts.php" title=""><i class="fa fa-user navicon"></i> View Contacts</a></li>
             <li><a href="emails2.php" title=""><i class="fa fa-envelope navicon"></i> Send Email</a></li>
             <li><a href="viewReports2.php" title=""><i class="fa fa-dollar navicon"></i> Group Sales Reports</a></li>
             <li><a href="memberReports.php" title=""><i class="fa fa-dollar navicon"></i> Member Sales Reports</a></li> 
             <li><a href="sendPasswords.php" title=""><i class="fa fa-envelope navicon"></i> Send Passwords</a></li>
             <li><a href="selectFundraiser2.php" title=""><i class="fa fa-plus-square navicon"></i> Add Fundraiser Account</a></li>
             <li><a href="addNewGroup.php" title=""><i class="fa fa-plus-square navicon"></i> Add Fundraiser Group</a></li>
             <li><a href="newLeaders.php" title=""><i class="fa fa-plus-square navicon"></i> Add Fundraiser Leader</a></li>
             <li><a href="newMembers.php" title=""><i class="fa fa-plus-square navicon"></i> Add Fundraiser Member</a></li>
             <li><a href="addFriendFamily.php" title=""><i class="fa fa-plus-square navicon"></i> Add Friend & Family</a></li> 
             <li><a href="addBusinessSupporter.php" title=""><i class="fa fa-plus-square navicon"></i> Add Business Supporter</a></li> 
             <li><a href="addBusinessAssociate.php" title=""><i class="fa fa-plus-square navicon"></i> Add Business Associate</a></li> 
             <li><a href="accountEdit.php" title=""><i class="fa fa-pencil navicon"></i> Edit My Account</a></li>
             <li><a href="salesContact.php" title=""><i class="fa fa-envelope navicon"></i> My Salesperson</a></li>  
      	</ul>
	
	<!--<br>
	
	<h4>Old Nav</h4>
               <ul id="sideNav">
                     	<li><a href="addBanner.php">Add Banners</a></li> 
              </ul>-->
</div>