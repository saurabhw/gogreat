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
    <h1>We Deliver! </h1>
    <h3>How, When, Where & Who</h3>
    <div id="column1">
      <h5>How we Deliver</h5>
	  <p>Ordering and delivery is easy because any supporters of your Fundraiser just need to do 2 simple steps.  First click on the link in the e-mail sent out from the student/member asking for your support which will take the customer to the Personal Fundraising Web Page. Second the Friend or Family member orders the Gift Basket that they want for themselves or to be delivered to a recipient anywhere they designate. </p>
      <h5>When GreatMoods can Deliver</h5>
	  <p>GreatMoods delivers all gift baskets a week before the holiday or special occasion.</p>
      <h5>Where GreatMoods can Deliver</h5>
	  <p>GreatMoods can deliver to any location around the world. GreatMoods knows a Fundraiser’s best customer doesn’t always live in their neighborhood, but that your extended family can be a great source of support. That’s another great feature of our GreatMoods program which allows you to Fundraise to anyone anywhere.</p>
      <h5>Who GreatMoods can Deliver to</h5>
	  <p>Thanks to the Internet and our Free Individually Personalized Fundraising Websites every student or member has the ability to solicit orders and deliver them to anyone across the country.  Fundraising is no longer limited to your neighbors next door. If you have friends or family across the country they can easily support you and your organization year round.  Great for any grandparents in Florida or Arizona.  </p>
	 
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
  <?php include 'footer.php' ; ?>
</div>
<!--end container-->

</body>
</html>
<?php
ob_end_flush();
?>