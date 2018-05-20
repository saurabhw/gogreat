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
  <?php include 'leftSidebarNavDistributor.php'; ?>
  <div id="content">
    <h1>Cash Next Day!</h1>
    <p>&nbsp;</p>
    <div id="column1">
      <p>Best of all, you and your accounts will receive cash next day on every individual Gift Basket sold and it will be paid directly into your PayPal account. By the way anyone can set up a PayPal account because it is like setting up a savings account at a bank. PayPal also has a Visa Debit card you available for you that you can use at any ATM to access your commissions 24/7, 365 days a year.</p>
      <p>GreatMoods will set up each distributor, representative and organization with a free PayPal account prior to when the fundraiser begins if you need help.  The goal is to help both you and your account maximize your income on an ongoing basis with a very easy fundraiser. </p>
      <p>The funny thing we have found is that everyone we have worked with the very first thing they do every morning is check to see home much cash has come in the prior day’s fundraising.</p>
    </div>
    <!--end column1-->
    
    <div id="column2">
    <div>
    	<img src="../images/rep-pages/bigbrobigsis1.png" width="404" height="270" alt="Big Brothers & Big Sisters">
	<img class="imgLeft" src="../images/rep-pages/studentartist1.png" width="198" height="166" alt="Student Artist - Pottery">
	<img class="imgRight" src="../images/rep-pages/cellist.png" width="198" height="166" alt="Student Cello Player">
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