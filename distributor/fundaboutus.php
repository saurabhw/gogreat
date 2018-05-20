<?php
      session_start();
      ob_start();
      define("SITE_ROOT",$_SERVER["DOCUMENT_ROOT"].'/salesTest/');
      include("../includes/connection.inc.php");
      $link = connectTo();
      $groupID = $_GET['group'];
      $table = "sample_websites";
      $query = "SELECT * FROM $table WHERE samplewebID = $groupID";
      $result = mysqli_query($link, $query) or die(mysqli_error());
      $row_count = mysqli_num_rows($result);
      if($row_count == '0'){
        echo "<br />Sample Website Not Found.<br />";
      }else{
         $row = mysqli_fetch_assoc($result);
         $club_name = $row['sampleName'];
         $club = $row['club'];
         $goal = $row['goal'];
         $so_far = $goal*.2;
         $banner_path = $row['bannerPath'];
         $position = $row['samplePosition'];
         $leader = $row['sampleFname'].' '.$row['sampleLname'];
         $phone = $row['samplePhone'];
         $group_email = $row['sampleGroupEmail'];
         $contact_photo = $row['contact_group_photo'];
         $group_photo = $row['groupPhoto'];
         $leader_photo = $row['group_leader'];
         $student_photo = $row['student_leaders'];
         $reasons = $row['sampleReasons'];
         if($row['sampleTitle']==''){
           $title = $club;
         }else{
           $title = $row['sampleTitle'];
         }
         
          
      }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>GreatMoods | Organization Website</title>
<link href="../css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
<link href="../css/headerSampleWebsiteStyles.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="container">
  <div id="headerMain"> <img id="banner" src="../<?php echo $banner_path;?>" width="1024" height="150" alt="banner placeholder" />
    <div id="menuWrapper"> </div>
    <!--end menuWrapper-->
    
    <div id="login">
      <?php
            if(!isset($_SESSION['LOGIN']) || $_SESSION['LOGIN'] == "FALSE") {
                echo '<form id="log" action="includes/logInUser.php" method="post">';
                echo '<label class="user" id="user">Username: </label>
                      <input type="text" name="email" id="user" value="">';
                echo '<label class="user" id="user"> Password: </label>
                      <input type="password" name="password" id="password" value="" >';
                echo '<input class="user" id="user" name="login" type="submit" value="login" />';
                echo '</form>';
                echo '<div id="register">';
                echo '<p class="forgotpw"><a href="">Forgot Password?</a><br />';
                echo '<a href="">Register Now</a></p>';
                echo '</div>';
                
            } elseif($_SESSION['LOGIN'] == "TRUE") {
                include('../includes/logout.inc.php');
              }
         ?>
    </div>
    <!--end login-->
    <div id="mainNav">
      <ul id="menu">
        <li><a href="index.php"> Homepage</a><li>
		<li><a href="basketsproducts.php">Gift Basket <br/>& Products</a></li>
        <li><a href="">Getting <br/>Started</a></li>
        <li><a href="setupEditWebsite/fundtype.php">Setup/Edit<br/>
          Website</a></li>
        <li><a href="">Setup/Edit<br/>
          Members</a></li>
        <li><a href="">Setup/Edit<br/>
          Emails</a></li>
        <li><a href="fundhelp.php?group=<?php echo $groupID; ?>">Help</a></li>
      </ul>
    </div>
    <!--end mainNav--> 
  </div>
  <!--end headerMain-->
  
  <?php include 'leftSidebarNavFundraiser.php'; ?>

  <div id="content">
    </br>
    <h3>GreatMoods Great Fundraising!</h3>
    <div id="column1">
      <p>New quality opportunities for raising funds are hard to come by in this very difficult economy, until now. Today’s Facebook, Cell Phone and Social Media Generation want convenience, ease of use and speed which our GreatMoods Personalized Website Fundraising Program offers.</p>
      <p>GreatMoods has gift baskets for any occasion year round with 2 very strong Fundraising selling seasons in the Fall and Spring.</p>
      <p>Easy to setup, easy to sell, easy to Fundraise! That’s the GreatMoods Program!</p>
	  <div id="leadBox">
        <div id="infoText">
          <div id="redBar1">
            <h3>Fundraising for Today's World<br>Step-by-Step Program Overview</h3>
          </div>
          <!--end redBar1-->
          <ul>
		<li><a href="about.php">Who is GreatMoods</a></li>
		<li><a href="program.php">What is the GreatMoods Program</a></li>
		<li><a href="basketsproducts.php">What is the GreatMoods Product Line</a></li>
		<li><a href="calculator.php">How Much Can I Raise</a></li>
		<li><a href="gettingstarted.php">$ign up and $tart today</a></li>
		 </ul>
        </div>
        <!--end infoText--> 
      
</div>
      <!--end leadBox-->
   <p>&nbsp;</p>
    <h5>Income Potential</h5>
		<p>The GreatMoods Program can generate a consistent income for your organization annually, year round and forever. </p>
    <h5>Easy to Set Up and Sell</h5>
		<p>This line is perfect for today’s consumer, generation of technology kids, students and organizational members.  GreatMoods is a very strong line for all Schools (Clubs and Teams) Churches and Organizations.</p>
		<p>If you’re unfamiliar with working online, don’t worry; the GreatMoods Team can do all the tech stuff for you. Identify a couple kids with a cell phone or a Facebook page and it’s a done deal for everyone because it is so easy to set up and maintain.</p>
	<!--end column1-->
    </div>
    <div id="column2">
    <div><br>
    	<img src="../images/home/classtrip.png" width="404" height="270" alt="High School Class Trip">
	<img class="imgLeft" src="../images/home/ymca.png" width="198" height="166" alt="YMCA Fundraiser">
	<img class="imgRight" src="../images/home/classtrip2.png" width="198" height="166" alt="Elementary Class Trip">
    </div>
     
	<h5>Program Features and Benefits</h5>
		<ul>
			<li>All Gift Baskets can be Ordered and Processed online.</li>
			<li>Direct shipping to the Customer/Recipient of every Gift Basket sold</li>
			<li>3 to 4 major revenue generating Fundraisers a year — all from one simple set up</li>
			<li>All cash is deposited next day to everyone involved, for every product sold — 24/7/365 days a year</li>
			<li>A Free All-Inclusive Personalized Fundraising Website and Distribution Program is included for every Student/Member that signs up</li>
		</ul>

	<h5>Join Us</h5>
		<p>GreatMoods is looking forward to working with you and building a long-term consistent revenue for you!</p>
	<h3>Get started today, by contacting us: Click Here</h3>
	
	</div>
    <!--end column2--> 
    
  </div>
  <!--end content-->
  <div class="clearfloat">  </div>

  <?php include 'footer.php' ; ?>
</div>
<!--end container-->
</body>
</html>
<?php
   ob_end_flush();
?>