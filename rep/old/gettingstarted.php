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
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Welcome to GreatMoods</title>
<link href="../../css/mainRecruitingStyles.css" rel="stylesheet" title="Set up your account" type="text/css" id="Set up your account" />
</head>

<body>
<div id="container">
  <?php include 'header.inc.php'; ?>
  <?php include 'leftSidebarNavRep.php'; ?>
  <div id="content">
    <h1>Sign Up and Start Today</h1>
    
	<h3>Getting Started</h3>
    
<div id="column1">
      <p>Getting started is easy, either drop us an e-mail, fill out the Setup/Edit form or give us a call. </p>
	  
		<p>PS. Calculate your success, and you can save it by entering in your e-mail address.  GreatMoods will do whatever we can do to help you and your organization succeed.</p>
	  <h5>Setting up & Editing Your Information is Easy</h5><p>Go to www.greatmoods.com and complete our 3 simple steps to setting up your Fundraiser or give us a call and we’ll do it with you.</p>
		<p>Refer your team, club or organization to the team’s Fundraising page.  Then have each member create their own page and upload a picture of him or herself if they please.</p>
	  <h5>Setting Up a PayPal Account</h5><p>Getting paid through GreatMoods is all done online through PayPal.  All transactions are processed when a consumer buys a gift basket and all funds are disbursed into your fundraising PayPal account.</p>
		<p>If you already have a PayPal account, you can add that account's email to the proper field on your information website set up screen.</p>
	  <p>If you do not have a PayPal account, simply go to www.paypal.com and sign up for an account.  If you are not sure how to set up a PayPal account, call us and we will help you over the phone, it only takes a few minutes.</p>
	</div>
    <!--end column1-->
    
    <div id="column2">
    <div><br>
    	<img src="../../images/rep-pages/choir1.png" width="404" height="270" alt="High School Choir">
	<img class="imgLeft" src="../../images/rep-pages/youngboy1.png" width="198" height="166" alt="Young Elementary Boy">
	<img class="imgRight" src="../../images/rep-pages/church2.png" width="198" height="166" alt="Lady with Father">
    </div>
    <div id="pcaption">GreatMoods offers fundraising opportunities for schools, religious organizations, community organizations, and more. </div>

    
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