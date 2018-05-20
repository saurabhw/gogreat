<div id="leftSideBar">
	<div class="profileimgcrop"><img src="<?php echo $contact_photo;?>" class="profilepic" alt="student photo"></div>
    	<h1><?php echo $student_name; ?></h1>
    	<h2><?php echo $title; ?></h2>
    	<h3>$<?php echo $goal; ?> Needed</h3>
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
      <li><a href="samplestudent.php?group=<?php echo $_GET['group']; ?>">Fundraiser Homepage</a></li>
      <li><a href="fundgettingstarted11.php?group=<?php echo $_GET['group']; ?>">GreatMoods Program Overview</a></li>
      <li><a href="fundgettingstarted14.php?group=<?php echo $_GET['group']; ?>">Fundraiser Setup Steps</a></li> 
      <li><a href="fundgettingstarted9.php?group=<?php echo $_GET['group']; ?>">Getting Started</a></li>
  </ul>
  
  <hr>
  
  <h4>About GreatMoods</h4>
	<ul id="sideNav">
		<li><a href="fundgettingstarted1.php?group=<?php echo $_GET['group']; ?>">Welcome!</a></li>
		<li><a href="fundgettingstarted11.php?group=<?php echo $_GET['group']; ?>">GreatMoods Program Overview</a></li>
		<li><a href="fundgettingstarted14.php?group=<?php echo $_GET['group']; ?>">Fundraiser Setup Steps</a></li> 
		<li><a href="fundgettingstarted2.php?group=<?php echo $_GET['group']; ?>">GreatMoods Mission</a></li>
		<li><a href="fundgettingstarted12.php?group=<?php echo $_GET['group']; ?>">GreatMoods Online Fundraising</a></li>
		<li><a href="fundgettingstarted3.php?group=<?php echo $_GET['group']; ?>">Strengths of the<br>GreatMoods Program</a></li>
		<li><a href="fundgettingstarted4.php?group=<?php echo $_GET['group']; ?>">3 Steps to<br>Fundraising $uccess</a></li>
		<li><a href="fundgettingstarted5.php?group=<?php echo $_GET['group']; ?>">Greatmoods Mall<br>Products & Gifts</a></li>
		<li><a href="fundgettingstarted6.php?group=<?php echo $_GET['group']; ?>">We Deliver!</a></li>
		<li><a href="fundgettingstarted7.php?group=<?php echo $_GET['group']; ?>">Cash Deposited Weekly!</a></li>
		<li><a href="fundgettingstarted8.php?group=<?php echo $_GET['group']; ?>">Calculate Your $uccess</a></li>
		<li><a href="fundgettingstarted10.php?group=<?php echo $_GET['group']; ?>">Generate Funds<br>24/7/365 Days a Year!</a></li>
		<li><a href="fundgettingstarted9.php?group=<?php echo $_GET['group']; ?>">Getting Started</a></li>
	</ul>
</div> <!--end side navigation-->