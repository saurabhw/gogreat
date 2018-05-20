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
    <h1>2013 Online Fundraising</h1>
    <div id="column1">
      <p><br>Do you know anyone who does not have a Cell Phone or Internet Access today?  There is virtually not a single Child or Parent anywhere that has not shopped Online, and ordered Online to make a purchase for the Holidays or a Special Occasion Gift.</p>
      <p>Fundraising is about to change forever, from door to door sales of Candy, Cookie Dough and Gift Wrap, being the primary means to raise money to Online Fundraising and Direct Ship to the Customers/Recipients of the Products ordered. .</p>
      <P>Online ecommerce growth is at a rate of 15% to 25%. Online Fundraising is beginning a similar growth rate to that right Now! </p>
	  <P>Do you have a quality Online Fundraising Program and appropriate Product for Online Fundraising Sales? Can’t ship Cookie Dough, can’t ship one dollar Chocolate Bars, it would cost a fortune. Gift Baskets you can ship year round and is a perfect Online Fundraising Program for all Holidays & Special Events. </p>
	  <p>2 Major Online Fundraising Seasons can happen with one simple setup, with a continual revenue stream that could start as early as September and continue until April for everyone. Cash is paid on every order directly into your PayPal account and the customers PayPal account 24/7/365 days a year. </P>	
	  <p>Click on our <a href="fundraisingexamples.php">Fundraising Examples</a> to see the Future of Fundraising</p>
	</div>
    <!--end column1-->
    
    <div id="column2">
    <div><br>
    	<img src="../images/rep-pages/cancerwalk.png" width="404" height="270" alt="Boyscouts">
	<img class="imgLeft" src="../images/rep-pages/dodgeball.png" width="198" height="166" alt="Stuents Playing Dodgeball">
	<img class="imgRight" src="../images/rep-pages/elementaryfundraiser.png" width="198" height="166" alt="Elementary School Children">
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