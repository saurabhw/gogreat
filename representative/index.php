<?php
	session_start();
	ob_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Welcome to GreatMoods</title>
<link href="../css/mainRecruitingStyles.css" rel="stylesheet" title="Set up your account" type="text/css" id="Set up your account" />
</head>

<body>
<div id="container">
  <?php include 'header_homepage2.php' ; ?>
  <?php include 'leftSidebarNavHomepage.php' ; ?>
  <div id="content">
    <h1>Welcome to GreatMoods!</h1>
    <p>&nbsp;</p>
    <div id="column1">
      <p>New quality opportunities in the Fundraising industry are hard to come by in this very difficult economy, until now. GreatMoods is the first complete solution for the next generation of fundraising for any School, Church or Organization looking to raise money.</p>
      <p>Today’s Facebook, Cell Phone and Social Media Generation want convenience, ease of use and speed which our Personalized Website Fundraising Program offers.</p>
      <p>Please take a few minutes to go through our presentation and evaluate the GreatMoods Program and Product Line; and evaluate the financial opportunity for yourself. Be pleasantly surprised by what you learn and how easy it is to create a lasting income in a very rewarding career helping others.</p>
      <div id="leadBox">
        <div id="infoText">
          <div id="redBar1">
            <h3>Career and Financial Success<br>Step-by-Step Program Overview</h3>
          </div>
          <!--end redBar1-->
          <ul>
            <li><a href="about.php">Who is GreatMoods?</a></li>
            <li><a href="program.php">What is the GreatMoods Program?</a></li>
            <li><a href="opportunities.php">The GreatMoods Product Line</a></li>
            <li><a href="customers.php">Who are the GreatMoods Targeted Online Fundraising Organizations / Customers?</a></li>
            <li><a href="distributorCalculator.php">How Much Can I Make?</a> </li>
            <li><a href="signup.php">$ign up and $tart today</a></li>
          </ul>
        </div>
        <!--end infoText--> 
      </div>
      <!--end leadBox-->
      
      <p>&nbsp;</p>
      <h5>Income Potential</h5>
      <p>The GreatMoods Program can generate a six-digit income for you annually. It allows for year-round fundraising that will be ongoing and forever. Every individual Fundraising Account you set up is your account forever, so there is a reason to get your accounts lined up today.</p>
      <p>Combining your years of experience in fundraising with our years of experience in software, consumer product design and distribution make our business relationship a perfect fit.</p>
      <h5>Easy to Set Up and Sell</h5>
      <p>This line is perfect for today’s consumer, generation of technology kids and students. It’s excellent for your existing Fundraising Account base and new customers. GreatMoods is a very strong line for all Middle & High Schools (Clubs and Teams) and Churches.</p>
      <p>If you’re unfamiliar with working online, don’t worry; the GreatMoods team can do all the tech stuff for you. If you get your Fundraising Organization to say yes and identify a couple kids to help with the setup, then it’s a done deal for everyone.</p>
    </div>
    <!--end column1-->
    
    <div id="column2">
    <div>
    	<img src="../images/rep-pages/boyscouts.png" width="404" height="270" alt="Boyscouts">
	<img class="imgLeft" src="../images/rep-pages/elementary.png" width="198" height="166" alt="Elementary School Children">
	<img class="imgRight" src="../images/rep-pages/congregation.png" width="198" height="166" alt="Church Congregation">
    </div>
    <div id="pcaption">GreatMoods offers fundraising opportunities for schools, religious organizations, community organizations, and more. </div>

      <h5>Program Features and Benefits</h5>
      <ul>
        <li>All Gift Baskets can be ordered and processed online</li>
        <li>Direct shipping to the Customer/Recipient of every Gift Basket sold</li>
        <li>3 to 4 major revenue generating fundraisers a year — all from one simple set up</li>
        <li>All cash is deposited next day to everyone involved, for every product sold — 24/7/365 days a year</li>
        <li>A Free All-Inclusive Personalized Fundraising Website and Distribution Program is included for every Student/Member that signs up</li>
      </ul>
      <h5>Join Us</h5>
      <p>GreatMoods is looking forward to working with you and building a long-term consistent revenue for both you and your New Online Fundraising Account base of customers!</p>
      <p id="redtxt">Getting started as our Representative is quick & easy: <a href="../sales/representativeSetupForm.php" title="Sign up now">Click Here</a></p>
    </div>
    <!--end column2--> 
    
  </div>
  <!--end content-->
  <?php include 'footer.php' ; ?>
</div>
<!--end container-->

</body>
</html>
<?php
ob_end_flush();
?>