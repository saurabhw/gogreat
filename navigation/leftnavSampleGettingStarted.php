<div id="leftSideBar">
	<div class="profileimgcrop"><img src="<?php echo $contact_photo;?>" class="profilepic" alt="UPLOAD YOUR PROFILE PICTURE HERE!"></div>
    	<h1><?php echo $student_name; ?></h1>
    	<h2><?php echo $title; ?></h2>
    	<h3><span class="label">My Goal</span> $<?php echo $goal; ?></h3>
    	<h3><span class="label">Raised So Far</span> $</h3>
  	<div id="socialmediaicons">
  		<a href="#" target="_blank"><i id="fbicon" class="fa fa-facebook-square" title="Facebook"></i></a>
  		<a href="#" target="_blank"><i id="twicon" class="fa fa-twitter-square" title="Twitter"></i></a>
  		<!--<a href="#" target="_blank"><i id="liicon" class="fa fa-linkedin-square" title="LinkedIn"></i></a>
  		<a href="#" target="_blank"><i id="pnicon" class="fa fa-pinterest-square" title="Pinterest"></i></a>
  		<a href="#" target="_blank"><i id="gpicon" class="fa fa-google-plus-square" title="Google+"></i></a>-->
  		<a href="mailto:someone@example.com" target="_blank"><i id="emailicon" class="fa fa-envelope-square" title="Email"></i></a>
  	</div>

    <ul id="sideNav">
   <?
     if(isset($_SESSION['authenticated'])&& $_SESSION['role'] == "Member" )
        {
          echo '
          <li><a href="fundMember/memberHome.php">My Account</a></li>
          <hr>
          ';
        } 
     ?>   
      	      <li><a href="samplewebsite.php?group=<?php echo $_GET['group']; ?>"><i class="fa fa-home navicon"></i> Fundraiser Homepage</a></li>
	      <li><a href="fundgettingstarted11.php?group=<?php echo $_GET['group']; ?>"><i class="fa fa-desktop navicon"></i> GreatMoods<br>Program Overview</a></li>
	      <li><a href="fundgettingstarted14.php?group=<?php echo $_GET['group']; ?>"><i class="fa fa-list-ul navicon"></i> Fundraiser Setup Steps</a></li> 
	      <li><a href="fundgettingstarted1.php?group=<?php echo $_GET['group']; ?>"><i class="fa fa-smile-o navicon"></i> About GreatMoods</a></li>
	      <li><a href="fundgettingstarted9.php?group=<?php echo $_GET['group']; ?>"><i class="fa fa-check navicon"></i> Get Started Today!<br>Contact Your Rep!</a></li>
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
</div> <!--end side navigation-->