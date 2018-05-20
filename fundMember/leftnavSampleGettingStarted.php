<div id="leftSideBar">
	<div class="profileimgcrop"><img src="../<?php echo $myPic;?>" class="profilepic" alt="student photo"></div>
    	<h1><?php echo $fn.' '.$ln; ?></h1>
    	<h2><?php echo $club_type; ?></h2>
    	<h3>My Goal  $<?php echo $goal; ?></h3>
    	<h3>Raised So Far  $<?php echo $so_far; ?></h3>
  	<div id="socialmediaicons">
  		<a href="<? echo $face;?>" target="_blank"><i id="fbicon" class="fa fa-facebook-square" title="Facebook"></i></a>
  		<a href="<? echo $twit;?>" target="_blank"><i id="twicon" class="fa fa-twitter-square" title="Twitter"></i></a>
  		<!--<a href="#" target="_blank"><i id="liicon" class="fa fa-linkedin-square" title="LinkedIn"></i></a>
  		<a href="#" target="_blank"><i id="pnicon" class="fa fa-pinterest-square" title="Pinterest"></i></a>
  		<a href="#" target="_blank"><i id="gpicon" class="fa fa-google-plus-square" title="Google+"></i></a>-->
  		<a href="salesContact.php?group=<?php echo $groupID; ?>" target="_blank"><i id="emailicon" class="fa fa-envelope-square" title="Email"></i></a>
  	</div>

    <ul id="sideNav">
      <li><a href="membersite.php?group=<?php echo $groupID; ?>"><i class="fa fa-home navicon"></i> Fundraiser Homepage</a></li>
      <li><a href="fundgettingstarted11.php?group=<?php echo $groupID; ?>"><i class="fa fa-desktop navicon"></i> GreatMoods Program Overview</a></li>
      <li><a href="fundgettingstarted14.php?group=<?php echo $groupID; ?>"><i class="fa fa-list-ul navicon"></i> Fundraiser Setup Steps</a></li> 
      <li><a href="fundgettingstarted1.php?group=<?php echo $groupID; ?>"><i class="fa fa-smile-o navicon"></i> About Great Moods</a></li>
      <li><a href="salesContact.php?group=<?php echo $groupID; ?>"><i class="fa fa-check navicon"></i> Getting Started Today! Contact Your Rep!</a></li>
  </ul>
  
  
  <!--
  <h4>About GreatMoods</h4>
	<ul id="sideNav">
		<li><a href="fundgettingstarted1.php?group=<?php echo $groupID; ?>">Welcome!</a></li>
		
		<li><a href="fundgettingstarted2.php?group=<?php echo $groupID; ?>">GreatMoods Mission</a></li>
		<li><a href="fundgettingstarted12.php?group=<?php echo $groupID; ?>">GreatMoods Online Fundraising</a></li>
		<li><a href="fundgettingstarted3.php?group=<?php echo $groupID; ?>">Strengths of the<br>GreatMoods Program</a></li>
		<li><a href="fundgettingstarted4.php?group=<?php echo $groupID; ?>">3 Steps to<br>Fundraising $uccess</a></li>
		<li><a href="fundgettingstarted5.php?group=<?php echo $groupID; ?>">Greatmoods Mall<br>Products & Gifts</a></li>
		<li><a href="fundgettingstarted6.php?group=<?php echo $groupID; ?>">We Deliver!</a></li>
		<li><a href="fundgettingstarted7.php?group=<?php echo $groupID; ?>">Cash Deposited Weekly!</a></li>
		<li><a href="fundgettingstarted8.php?group=<?php echo $groupID; ?>">Calculate Your $uccess</a></li>
		<li><a href="fundgettingstarted10.php?group=<?php echo $groupID; ?>">Generate Funds<br>24/7/365 Days a Year!</a></li>
		<li><a href="fundgettingstarted9.php?group=<?php echo $groupID; ?>">Getting Started</a></li>
	</ul>-->
</div> <!--end side navigation-->