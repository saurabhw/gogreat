<div id="leftSideBar">
	<div class="profileimgcrop"><img src="<?php echo $contact_photo;?>" class="profilepic" alt="UPLOAD YOUR PROFILE PICTURE HERE!"></div>
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
	      <li><a href="samplestudent.php?group=<?php echo $_GET['group']; ?>">Fundraiser Homepage</a></li>
	      <li><a href="fundgettingstarted11.php?group=<?php echo $_GET['group']; ?>">GreatMoods Program Overview</a></li>
	      <li><a href="fundgettingstarted14.php?group=<?php echo $_GET['group']; ?>">Fundraiser Setup Steps</a></li> 
	      <li><a href="fundgettingstarted.php?group=<?php echo $_GET['group']; ?>">About GreatMoods</a></li>
	      <li><a href="fundgettingstarted9.php?group=<?php echo $_GET['group']; ?>">Getting Started</a></li>
	</ul>
</div>