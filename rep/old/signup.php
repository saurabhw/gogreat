<?php
	session_start();
	if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Sign Up Today</title>
<link href="../css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container">
  <?php include 'header.php' ; ?>
  <?php include 'leftSidebarNavRep.php' ; ?>
  <div id="content">
    <h1>$ign Up and $tart Today </h1>
    <h3></h3>
    <div id="column1">
    <h5>Reasons Your Organization Will Sign Up to the GreatMoods Program:
    </h5>
  <ul>
    <li>If given the choice, do you think your kids would rather go door to door selling 50 $1 chocolate bars, or 1 gift basket online?</li>
    <li>What do you think the kids' parents would prefer? Door to door or online sales?</li>
    <li>What will teachers, coaches, and ministers think of a Fundraising Program where they have absolutely no handling of any orders, cash or products?</li>
    <li>What would you, the teacher, coach or minister think of receiving cash the next day, 24/7, 365 days a year on every Gift Basket sold?  (I can tell you the first thing you will do every morning is check your PayPal account, once this starts).</li>
    <li>Do you think a school, church or organization will ever turn off a Free Fundraising Website that gives them 4 major fundraisers a year, pays cash next day, and delivers the product straight to the customer?  PayPal also issues a Visa Debit Card so you can go to any ATM and withdraw your cash daily.</li>
  </ul>

  <h5>The Consumer Market: Reasons Online Fundraising is the Future, Here Today.</h5>
  <ul>
    <li>Consumer internet retail sales are growing over 15% a year for the last decade and will continue that way for the next decade. (That is a long-term, consistent revenue for you and your Customer.)</li>
    <li>Virtually every child and family, regardless of their economic status, has a cell phone and is on the internet daily.</li>
    <li>A child can sell 1 gift basket in 5 minutes online and earn the same amount of money that it would take in 3 to 4 hours door to door. </li>
    <li>One reality that is positively happening is that the kids and their parents will definitely choose online Fundraising vs. door to door sales in the near future, when given the chance.</li>
    <li>Door to door sales are quickly becoming a thing of the past and so are the commissions/revenues that go with it.</li>
  </ul>
    </div>
    <!--end column1-->
    
    <div id="column2">
    <img src="../images/recruiting/Screen shot 2012-08-16 at 12.05.32 AM.png" width="404" height="270">
  
  <h5>Reasons You Should $ign Up and $tart Today</h5>
  <ul>
    <li>If every account you set up and the commission it generates is yours forever, do you really want to risk having another Distributor setting up your account with GreatMoods first?</li>
    <li>There is no processing of orders, no collection of cash, no delivery of product by you, the parents, or the kids because GreatMoods delivers the product straight to the customer.</li>
    <li>There are 3 to 4 Fundraisers per year.
    <li>Every sale earns cash, paid next day 24/7, 365 days a year, directly to your PayPal account.</li>
    <li>Over a third of the Distributors say the same statements again and again: "This is too good to be true", and "This is a no brainer".</li>
  </ul>
  <p>Distributors, this is a new and exciting opportunity to break into the Online Fundraising market.  Combining your rears of experience in Fundraising and our 30 years of Retail Software Development, Product Development and Distribution can only lead to Success!!!</p>
  <p>Still haven't made up your mind?  Click on our calculator one more time and play the "What If" game. Then ask yourself if this is not the perfect Fundraising Line of the Future for all of your Fundraising Accounts. <a href="repCalculator.php">Earnings Potential Calculator</a></p>
  <p><a href="repSetup.php">$ign Up and get $tarted Today with GreatMoods.</a></p>
  

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