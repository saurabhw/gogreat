<div class="row-fluid" id="sidebarBlock">    
    <div class="col-md-3 col-lg-2">
     
        <div class="profile-block">
            <div class="panel text-center">
                <div class="user-heading">
                 
                    <!-- profile image at top of profile block pannel -->
                    <img src="../<?php echo $myPic;?>" class="img-rounded img-responsive center-block profileimgcrop" alt="Profile Pic"/>
                    
                    <!-- identify user through either variable PHP calls or through user's session data; session has been autenticated - First and Last names should always show correctly -->
                  	<h3 id="sidebarTitleNoMoney">Welcome <? 
                  	  
                               echo $_SESSION['firstName'];
                         
                  
                  	?>
                  	</h3>
                </div><!--end user heading -->
                
                <div id="social-btns"><!--START social-btns list block | non-collapsible -->
                    <a target="_blank" href="<? echo $face; ?>"><i id="fbicon" class="fa fa-facebook-square fa-3x" title="Facebook"></i></a>
                    <a target="_blank" href="<? echo $twit; ?>"><i id="twittericon" class="fa fa-twitter-square fa-3x" title="Twitter"></i></a>
                    <a href="#"><i id="emailicon" class="fa fa-envelope-square fa-3x" title="Email"></i></a>
                    <!--<a href="#" target="_blank"><i id="liicon" class="fa fa-linkedin-square" title="LinkedIn"></i></a>
                    <a href="#" target="_blank"><i id="pnicon" class="fa fa-pinterest-square" title="Pinterest"></i></a>
                    <a href="#" target="_blank"><i id="gpicon" class="fa fa-google-plus-square" title="Google+"></i></a>-->
                </div> <!--END social-btns list block | NON collapsible -->            
        
                <div id="myAccounts-sideNav" class="sidenavList nav nav-pills nav-stacked"> <!-- start my accounts list block | linked btns inside profile block section "my accounts" -->
                    <li class="sidenavTitle" data-target="#sidenavSectionAccounts" data-toggle="collapse">
                        <h4><a href="#/">My Accounts<span class="fa fa-chevron-up darkredText"></span><span class="hidden fa fa-chevron-down redText"></span></a></h4>
                    </li>
                    
                    <ul id="sidenavSectionAccounts" class="nav nav-pills nav-stacked collapse in">
                        <div class="accountsBtn center-block">
                      	 <?
                            getAccounts1($userID);
                      	 ?>
                        </div><!-- end accountBtn div | red btns listed in profile block -->
                    </ul><!-- end account unordered list -->
                </div> <!-- END sidenav list block -->
                
                <div class="sidenavList nav nav-pills nav-stacked"> <!-- start program overview list block -->
                    <li class="sidenavTitle" data-target="#sidenavSection1" data-toggle="collapse" aria-expanded="false">
                        <!-- title for sidenavSection1 - when clicked, toggles collapse for sidenavSection1 list items -->
                        <h4><a href="#/">Program Overview <span class="hidden fa fa-chevron-up darkredText"></span><span class="hidden fa fa-chevron-down redText"></span></a></h4>
                    </li>
                
                    
                    <ul id="sidenavSection1" class="nav nav-pills nav-stacked collapse">
                        <li><a href="gm_programoverview.php"><i class="fa fa-desktop navicon"></i> GreatMoods<br>Program Overview</a></li>
                        <li><a href="gm_fundsetupsteps.php"><i class="fa fa-list-ul navicon"></i> Fundraiser Setup Steps</a></li>
                        <li><a href="gm_mission.php" title=""><i class="fa fa-heart navicon"></i> Mission</a></li>
                        <li><a href="gm_program.php" title=""><i class="fa fa-list-ol navicon"></i> GreatMoods Program</a></li> 
                        <li><a href="gm_getStarted.php" title=""><i class="fa fa-user-plus" aria-hidden="true"></i>Get Started Today!</a></li> 
                        
                    </ul><!-- end sidenav section1 list -->
                </div> <!-- end program overview list block -->
                     
        
                <div id="trainingTutorial-sideNav" class="sidenavList nav nav-pills nav-stacked">
                    <li class="sidenavTitle" data-target="#sidenavSection2" data-toggle="collapse" aria-expanded="false">
                        <!-- title for sidenavSection2 - when clicked, toggles collapse for sidenavSection2 list items  -->
                        <h4><a href="#/">Training & Tutorials<span class="hidden fa fa-chevron-up darkredText"></span><span class="hidden fa fa-chevron-down redText"></span></a></h4>
                    </li>
                
                    <ul id="sidenavSection2" class="nav nav-pills nav-stacked collapse">
                        <li><a href="salesAZ2.php"><i class="fa fa-desktop navicon"></i> Training Program Overview - A to Z</a></li> <!-- why A-Z, why not Just overview ? -->                                         
                        <!--<li><a href="repSignup.php"><i class="fa fa-calendar-check-o navicon"></i>Getting Started</a></li>-->
                        <li><a href="jobDescription.php"><i class="fa fa-list-ol navicon"></i> Job Description Responsibilities</a></li>
                        <li><a href="prospectOpp.php"><i class="fa fa-hand-o-right" aria-hidden="true"></i>Prospect Opportunities</a></li>
                        <li><a href="identifyProspect.php"><i class="fa fa-search-plus" aria-hidden="true"></i>Identifying Your Prospects</a></li>
                        <li><a href="researchProspect.php"><i class="fa fa-leanpub" aria-hidden="true"></i>Researching Your Prospects</a></li>
                        <li><a href="setupProspect.php"><i class="fa fa-cogs" aria-hidden="true"></i>Setting Up Your Prospect's Website</a></li>
                        <li><a href="calculateIncome.php"><i class="fa fa-dollar navicon"></i> Income $uccess Potential </a></li>
                        <li><a href="repCalculator.php"><i class="fa fa-calculator navicon"></i>Income Calculator</a></li>
                        <li><a href="beginSelling.php"><i class="fa fa-check navicon"></i>Let the Fundraising Begin!</a></li>
                        <li><a href="fundraisingPresentation.php"><i class="fa fa-desktop navicon"></i>Your Fundraising Presentation</a></li>                   
                        <li><a href="presentationScript.php"><i class="fa fa-list-ol navicon"></i> Presentation Script</a></li>
                        <li><a href="afterYes.php"><i class="fa fa-handshake-o" aria-hidden="true"></i>When They Say Yes!</a></li>
                        <li><a href="fundLeaderAZ.php"><i class="fa fa-male" aria-hidden="true"></i>Fundraising Leaders A to Z</a></li>
                        <li><a href="memberAZ.php"><i class="fa fa-users" aria-hidden="true"></i>Members A to Z</a></li>
                        <li><a href="printshop.php"><i class="fa fa-print" aria-hidden="true"></i>Printshop Library</a></li>  
                    </ul><!-- end sidenav section2 list -->
                </div><!-- end training and tutorial list block -->
    
                <div id="accountAdministration-sideNav" class="sidenavList nav nav-pills nav-stacked">
                    <!-- title for sidenavSection3 - when clicked, toggles collapse for sidenavSection3 list items  -->
                    <li id="sidenavTitle" data-target="#sidenavSection3" data-toggle="collapse">
                        <h4><a href="#/">Account Administration<span class="fa fa-chevron-up darkredText"></span><span class="hidden fa fa-chevron-down redText"></span></a></h4>
                    </li>
                
                    <ul id="sidenavSection3" class="nav nav-pills nav-stacked collapse in">
                        <!--<li><a hrefr="#" title="">Goals & Achievements</a></li>
                        <!--<li><a href="fundTools.php" title="">Fundraising Tools</a></li>--> 
                        <li><a href="viewReps.php" title="View Representatives"><i class="fa fa-users"></i> View Team Accounts</a></li>
                        <li><a href="contacts.php" title="View contacts"><i class="fa fa-users"></i>View Team Contacts</a></li>
                        <li><a href="addRep.php" title=""><i class="fa fa-user-plus" aria-hidden="true"></i>Add Representative</a></li>
                        <li><a href="viewReports2.php" title="View Group Sales Reports"><i class="fa fa-bar-chart" aria-hidden="true"></i>Group Sales Reports</a></li>
                        <li><a href="memberReports.php" title="Account Home"><i class="fa fa-line-chart" aria-hidden="true"></i>Member Sales Reports</a></li>   
                        <li><a href="selectFundraiser.php" title=""><i class="fa fa-plus-square navicon"></i> Add Fundraiser Account</a></li>
                        <li><a href="addNewGroup.php" title=""><i class="fa fa-plus-square navicon"></i>Add Fundraiser Group</a></li>
                        <li><a href="newLeaders.php" title=""><i class="fa fa-user-plus" aria-hidden="true"></i>Add Fundraiser Leader</a></li>
                        <!-- <li><a href="uploadLeaders.php" title="">Upload Fundraiser Leaders</a></li>  -->
                        <li><a href="newMembers.php" title=""><i class="fa fa-user-plus" aria-hidden="true"></i> Add Fundraiser Member</a></li> 
                        <!--<li><a href="uploadMembers.php" title="">Upload Fundraiser Members</a></li>-->
                       <!-- <li><a href="addFriendFamily.php" title=""><i class="fa fa-user-plus" aria-hidden="true"></i>Add Friend Family</a></li> 
                        <li><a href="addBusinessSupporter.php" title=""><i class="fa fa-user-plus" aria-hidden="true"></i>Add Business Supporter</a></li> -->
                        <li><a href="addContact.php" title=""><i class="fa fa-user-plus" aria-hidden="true"></i>Add Contact</a></li> 
                        <li><a href="emails2.php" title=""><i class="fa fa-envelope navicon"></i>Send Emails</a></li>
                        <li><a href="sendPasswords.php" title=""><i class="fa fa-envelope navicon"></i>Send Passwords</a></li>
                        <li><a href="accountEdit.php" title=""><i class="fa fa-pencil navicon"></i> Edit My Account</a></li> 
                        <li><a href="salesContact.php" title=""><i class="fa fa-briefcase" aria-hidden="true"></i>My Salesperson</a></li> 
                    </ul><!-- end sidenav section3 list -->
                </div> <!-- end account admin list block -->
                
            </div> <!--end panel / text center block -->
        </div> <!--end profile block -->
    </div><!--end column -->
</div><!-- end row -->	