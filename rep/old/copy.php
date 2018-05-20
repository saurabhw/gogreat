<?php
	session_start();
	if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
	ob_start();
?>

<!DOCTYPE HTML>
<title>GreatMoods, Great Fundraising!</title>
<link href="../css/mainRecruitingStyles.css" rel="stylesheet" title="Set up your account" type="text/css" id="Set up your account" />
<link rel="shortcut icon" href="../images/favicon.ico" >

<body>
<div id="container">
  <?php include 'header.inc.php'; ?>
  <?php include 'leftSidebarNavRep.php'; ?>
  
  <div id="content">
    <h1>Welcome!</h1>
    <h3>GreatMoods, Great Fundraising!</h3>
    <div id="column1"> 
    <p>
     Today’s Cell Phone, Facebook and Social Media Generation want convenience, ease of use and speed, all 
of which are offered as part of our GreatMoods Free Personalized Website Fundraising Program.<br><br>
Every Student or Member of every Club, Team, School, Group, Organization, Church or Community gets 
their very own Free Personalized Fundraising Website to achieve the group’s goal! Everybody!<br><br>
Cash next day is deposited into your groups’ PayPal Account on every individual sale (which is 35% of 
the Retail Price) and best of all We Deliver! Everything! Everywhere! 24/7/365 days a year! <br><br>
GreatMoods has a “Shopping Mall”, located on each of the Free Individual Websites with a wonderful 
selection of fundraising products and gifts that any supporter would be pleasantly surprised to 
purchase from. The GreatMoods Mall has fashionable clothing for everyone, including scarves, jewelry,
sportswear and ties. Coffee and candy gift baskets, toys and a whole lot more are available, with 
products changing as the seasons and fashions do. <br><br>
The Future of Fundraising for today’s technology savvy families, students and organizational members is 
completely online. GreatMoods; Easy to set up, Easy to maintain and focused on achieving $uccess for 
you.
   </p>
   <p>
   <b>Program Features and Benefits</b>

	<ul> 
	<li>Free Fun Fundraising Websites for every Student or Member!</li>
	<li>Great Products at 20 Different GreatMoods Mall Stores</li>
	<li>Cash Next Day! 35% of every sale is deposited into your PayPal Account!</li>
	<li>We Deliver! Everything! Everywhere!</li>
	<li>Achieving Success for your Goals is our Goal, 24/7/365 days a year!</li>
	<li>Easy to Setup, Easy to Maintain! Everything is Free! Now & Forever!</li></ul>
   </p>
   <p><b> Get Started Today</b><br>
	GreatMoods is looking forward to working with you and your Organization to build a long-term 
	consistent Fundraising Revenue!
    </p>
    </div> <!--end column1-->
    
    <div id="column2">
    <div>
    	<img src="../images/rep-pages/highyearbook2.png" width="404" height="270" alt="High School Year Book">
	<img class="imgLeft" src="../images/rep-pages/boyscouts1.png" width="198" height="166" alt="Boy Scouts">
	<img class="imgRight" src="../images/rep-pages/juniorchoir.png" width="198" height="166" alt="Elementary School Choir">
    </div>
    <div id="pcaption">GreatMoods offers fundraising opportunities for schools, religious organizations, community organizations, and more. </div>
     

	</div>    <!--end column2--> 
	
  </div>  <!--end content-->
  <?php include 'footer.php' ; ?>
</div><!--end container-->

</body>

<?php
ob_end_flush();
?>