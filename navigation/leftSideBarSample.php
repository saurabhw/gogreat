<head>
<style>
    h1, h2, h3, h4, h5, h6 {
	margin: 0;
	padding: 0;
	line-height: .9;
	font-weight: 700;
	color: #333;
}

</style>

</head>
<div class="profile-block">
  <div class="panel text-center">
    <div class="user-heading"> <a href="#"> <img src="<?php echo $contact_photo;?>" class="profilepic img-rounded img-responsive" alt="profile Pic"></a>
	    <h1><?php echo $student_name; ?></h1>
    	<h2><?php echo $title; ?></h2>
    	<h3>My Goal:<span style="margin-left: -16px;">$<?php echo $goal; ?><span></h3>
    	<h3>Raised So Far:<span>$<?php echo $so_far; ?>.00</span></h3>
    </div>
    
  	<div id="social-btns">
  		<a href="#"><i id="fbicon" class="fa fa-facebook-square fa-3x" title="Facebook"></i></a>
  		<a href="#"><i id="twicon" class="fa fa-twitter-square fa-3x" title="Twitter"></i></a>
  	    <a href="#"><i id="emailicon" class="fa fa-envelope-square fa-3x" title="Email"></i></a>
  	</div>
  	
    <ul class="nav nav-pills nav-stacked" style="border-bottom:1px solid #cccccc">
        <li><a href="samplestudent.php?group=<?php echo $_GET['group']; ?>"><i class="fa fa-home navicon"></i>Fundraiser Homepage</a></li>
        <li><a href="fundgettingstarted11.php?group=<?php echo $_GET['group']; ?>"><i class="fa fa-desktop navicon"></i>GreatMoods Program Overview</a></li>
          <li><a href="fundgettingstarted14.php?group=<?php echo $_GET['group']; ?>"><i class="fa fa-line-chart navicon"></i>Fundraiser Setup Steps</a></li>
	      <li><a href="fundgettingstarted.php?group=<?php echo $_GET['group']; ?>"><i class="fa fa-smile-o"></i>About GreatMoods</a></li>
	      <li style="border-bottom:1px solid black"><a href="fundgettingstarted9.php?group=<?php echo $_GET['group']; ?>"><i class="fa fa-check navicon"></i>Get Started!</a></li>
    </ul>
    <ul id="general-links" class="nav nav-pills nav-stacked hidden-md hidden-sm hidden-xs">
        <li><h2 id="nav-label">About Greatmoods</h2></li>
        <li><a href="fundgettingstarted.php?group=<?php echo $_GET['group']; ?>"><i class="fa fa-smile-o"></i>Welcome</a></li>
        <li><a href="gm_programoverview.php"><i class="fa fa-desktop navicon"></i>GreatMoods Overview</a></li>  
        <li><a href="mission.php"><i class="fa fa-list-ul navicon"></i>GreatMoods Mission</a></li>
        <li><a href="onlinefundraising.php"><i class="fa fa-mouse-pointer navicon"></i>GreatMoodsOnline Fundraising</a></li>         
        <li><a href="program.php"><i class="fa fa-star navicon"></i>Strengths of the GreatMoods Program</a></li>
        <li><a href="easysetup.php"><i class="fa fa-line-chart navicon"></i>3 Steps to Fundraising Success!</a></li>
        <li><a href="opportunities.php"><i class="fa fa-shopping-cart navicon"></i> GreatMoods Mall Products & Gifts</a></li>
        <li><a href="deliver.php"><i class="fa fa-truck navicon"></i> We Deliver!</a></li>
        <li><a href="cash.php"><i class="fa fa-money navicon"></i> Cash Deposited Weekly!</a></li>
        <li><a href="calculator.php"><i class="fa fa-calculator navicon"></i> Calculate Your $uccess</a></li>
        <li><a href="generatefunds.php"><i class="fa fa-calendar navicon"></i> Generate Funds 24/7!</a></li>
        <li><a href="gettingstarted_sendemail.php"><i class="fa fa-check navicon"></i>Contact a Rep Today!</a></li>
    </ul>
  </div>
</div>

