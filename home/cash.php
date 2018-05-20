<?php
	session_start();
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
  <?php include 'leftSidebarNavHomepage.php'; ?>
  <div id="content">
    <h1>Cash Next Day!</h1>
    <p>&nbsp;</p>
    <div id="column1">
      <p>Best of all your Fundraising organization receives cash next day on every individual Gift Basket sold and it will be paid directly into your PayPal account. By the way anyone can set up a PayPal account because it is like setting up a savings account at a bank. PayPal also has a Visa Debit card available for you that you can use at any ATM to access your organization’s funds 24/7, 365 days a year.</p>
      <p>GreatMoods will help set up each Club, Team and Organization with a free PayPal account prior to when the Fundraiser begins.  The goal is to help both your organization and its members maximize their income on an ongoing basis with a very easy Fundraiser.  </p>
      
    </div>
    <!--end column1-->
    
    <div id="column2">
    <div>
    	<img src="../../images/rep-pages/bigbrobigsis1.png" width="404" height="270" alt="Big Brothers & Big Sisters">
	<img class="imgLeft" src="../../images/rep-pages/studentartist1.png" width="198" height="166" alt="Student Artist - Pottery">
	<img class="imgRight" src="../../images/rep-pages/cellist.png" width="198" height="166" alt="Student Cello Player">
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