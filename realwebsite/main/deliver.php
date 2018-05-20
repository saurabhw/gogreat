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
  <?php include 'header.php'; ?>
  <?php include 'sidenav.php'; ?>
  <div id="content">
    <h1>We Deliver! </h1>
    <h3>How, When, Where & Who</h3>
    <div id="column1">
      <h5>How</h5>
	  <p>Ordering and delivery is easy because you just click on the link to the website and order up one of the many gift baskets!  Placing orders will take just a matter of minutes for your friends, family and neighbors using our PayPal shopping cart at the student or member’s personalized website. </p>
      <h5>When</h5>
	  <p>GreatMoods delivers all gift baskets a week before the holiday or special occasion. </p>
      <h5>Where</h5>
	  <p>GreatMoods can deliver to any location your supporters desire. GreatMoods knows a fundraiser’s best customer doesn’t always live in your neighborhood, and that your extended family can be a great source of support, so GreatMoods allows you to fundraise to anyone around the country.</p>
      <h5>Who</h5>
	  <p>Thanks to the Internet and our Free Individually Personalized Fundraising Websites every student or member has the ability to solicit orders and deliver them to anyone across the country.  Fundraising is  no longer limited to your neighbors next door. If you have friends or family across the country they can easily support you and your organization year round.  Great for grandparents in Florida or Arizona.  </p>
	 
      </div>
      <!--end leadBox-->
      
      
    <!--end column1-->
    
    <div id="column2">
    <div>
    	<img src="../../images/rep-pages/kiwanis1.png" width="404" height="270" alt="Kiwanis Club">
	<img class="imgLeft" src="../../images/rep-pages/girlyoung2.png" width="198" height="166" alt="Young Girl">
	<img class="imgRight" src="../../images/rep-pages/kicks4kids.png" width="198" height="166" alt="Boy with School Fundraiser">
    </div>
    <div id="pcaption">GreatMoods offers fundraising opportunities for schools, religious organizations, community organizations, and more. </div>

      
    </div>
    <!--end column2--> 
    
  </div>
  <!--end content-->
  <?php include '../footer.php' ; ?>
</div>
<!--end container-->

</body>
</html>
<?php
ob_end_flush();
?>