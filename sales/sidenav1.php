<div id="leftSideBar">
	<div id="acctname">Welcome <? echo $_SESSION['firstName']; ?>!</div>
		<!-- will pull up related accounts -->
	
	<div class="profileimgcrop"><img src="../<?php echo $myPic;?>" class="profilepic" alt="contact picture"></div>
	
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
	</div>
	
       	
      	
      	<br>
      	
	
	<h4>Account Administration</h4>
       	<ul id="sideNav">
             <!--<li><a href="#" title="">Goals & Achievements</a></li>
             <li><a href="fundTools.php" title="">Fundraising Tools</a></li>--> 
             <li><a href="viewReps.php" title="Account Home">View Team & Accounts</a></li>
             <li><a href="contacts.php" title="Account Home">View Team Contacts</a></li>
             <li><a href="viewReports2.php" title="Account Home">Group Sales Reports</a></li>
             <li><a href="memberReports.php" title="Account Home">Member Sales Reports</a></li>   
             <li><a href="addRep.php" title="">Add Representative</a></li> 
             <li><a href="selectFundraiser.php" title="">Add Fundraiser Account</a></li>
             <li><a href="addNewGroup.php" title="">Add Fundraiser Group</a></li>
             <li><a href="newLeaders.php" title="">Add Fundraiser Leader</a></li>
            <!-- <li><a href="uploadLeaders.php" title="">Upload Fundraiser Leaders</a></li>  -->
             <li><a href="newMembers.php" title="">Add Fundraiser Member</a></li> 
             <!--<li><a href="uploadMembers.php" title="">Upload Fundraiser Members</a></li>-->
             <li><a href="addFriendFamily.php" title="">Add Friend & Family</a></li> 
             <li><a href="addBusinessSupporter.php" title="">Add Business Supporter</a></li> 
             <li><a href="addBusinessAssociate.php" title="">Add Business Associate</a></li> 
             <li><a href="emails2.php" title="">Send Emails</a></li>
             <li><a href="sendPasswords.php" title="">Send Passwords</a></li>
             <li><a href="accountEdit.php" title="">Edit My Account</a></li> 
             <li><a href="salesContact.php" title="">My Salesperson</a></li> 
      	</ul>
</div>