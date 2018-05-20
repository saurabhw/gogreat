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
    <h1>Help</h1>
    <h3>Training Tips, Tools & Forms</h3>
    <p>&nbsp;</p>
    <div id="column1">
      <p>New quality opportunities in the fundraising industry are hard to come by in this very difficult economy and that’s why the GreatMoods Program will be a very pleasant surprise for you.</p>
      <p>Please take 10 to 15 minutes to go through our presentation and evaluate the GreatMoods Program and Product Line; it will be worth your time to evaluate the financial opportunity.</p>
      <div id="leadBox">
        <div id="infoText">
          <div id="redBar1">
            <h3>Program and Profit Step by Step Points</h3>
          </div>
          <!--end redBar1-->
          <ul>
            <li><a href="about.php">Who is GreatMoods?</a></li>
            <li><a href="program.php">What is the GreatMoods Program?</a></li>
            <li><a href="productLine.php">The GreatMoods Product Line</a></li>
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
      <p>The GreatMoods Program can generate a six digit income for you annually.  It’s year-round fundraising that’s ongoing and forever. Every individual Fundraising Account you set up is your account forever, so there is a reason to get your accounts lined up today.</p>
      <p>Your years of experience in fundraising combined with our years of experience in software, consumer product design and distribution makes our business relationship a perfect fit.</p>
      <h5>Easy to Set Up and Sell</h5>
      <p>This line is perfect for today’s fundraising consumer, the cell phone and Facebook generation. It’s perfect for your existing Fundraising Account base and new customers.  GreatMoods is a very strong line for all high schools (clubs and teams) and churches.</p>
      <p>If you’re unfamiliar with working online, don’t worry, GreatMoods can do all the tech and geek stuff. If you get your Fundraising Organization to say yes and identify a couple kids to help with the setup, then it’s a done deal for everyone.</p>
    </div>
    <!--end column1-->
    
    <div id="column2">
    <div>
    <img src="../images/recruiting/Screen shot 2012-08-16 at 12.05.32 AM.png" width="404" height="270">
	<img class="imgLeft" src="../images/recruiting/elementarybooster2.jpg" width="192" height="166" alt="elementary school children">
	<img id="imgRight" src="../images/recruiting/lutheran1.jpg" width="192" height="166" alt="churchgoers">
    </div>
    <div id="pcaption">GreatMoods offers fundraising opportunities for schools, religious organizations, community organizations, and more. </div>

      <h5>Program Features and Benefits</h5>
      <ul>
        <li>All Gift Baskets are ordered and processed online</li>
        <li>Direct shipping to the Customer of every Gift Basket Basket sold</li>
        <li>3 to 4 major revenue generating fundraisers a year &#8212; all from one simple set up</li>
        <li>All cash is deposited next day to everyone involved, for every product sold &#8212; 24/7, 365 days a year</li>
        <li>A Free Turnkey Online Fundraising Website and Distribution Program is included for every Student/Member signed up</li>
      </ul>
      <h5>Join Us</h5>
      <p>GreatMoods is looking forward to working with you and building long term consistent revenue for both you and your New Online Fundraising Account base of customers!</p>
      <p id="redtxt">Getting started as our Distributor is quick and easy: <a href="../sales/distributorSetupForm.php" title="Sign up now">Click Here</a></p>
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