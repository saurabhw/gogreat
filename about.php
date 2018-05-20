<?php
	session_start();
	ob_start();
?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Welcome to GreatMoods</title>
<link rel="stylesheet" type="text/css" href="../css/mainRecruitingStyles.css">
<link rel="stylesheet" type="text/css" href="../css/header_homepageStyles.css">
<link rel="stylesheet" type="text/css" href="../css/leftSidebarNav.css">
<link rel="shortcut icon" href="images/favicon.ico">
</head>

<body>
<div id="container">
  <?php include 'includes/header.inc.php'; ?>
  <?php include 'navigation/leftSidebarNavHomepage.nav.php'; ?>
  <div id="content">
    <h1>Who is GreatMoods</h1>
    <h3>About Us</h3>
<div id="column1">
      <p>GreatMoods offers Free Personalized Fundraising Websites for every School, Church or Organization. Every student or member in an Organization or on a club or team also receives a Free Personalized Fundraising Website.</p>
      	  <p>Fundraising is about to change forever, from door to door sales of Candy, Cookie Dough and Gift Wrap, to Online Fundraising.</p>
	  <p>Today’s cell phone and Facebook generation want convenience and will select any Online Program, App or Product, if they can do it in a matter of minutes from home while benefitting just as much.</p>
		
	  <h3>Multiple Fundraising<br>Opportunities Each Year!</h3>
	  <p>3 to 4 major Fundraising opportunities will happen each year from one Fundraiser and one simple setup.</p>
	  <p>Thanksgiving, Christmas and Holiday Gift Baskets are great for friends, family, customers and clients as autumn begins.  The New Year continues to bring great selling and revenue generating opportunities with Gift Baskets for Valentine’s Day, Easter, Mother’s and Father’s Day. Gift Baskets are a great selling and revenue generating opportunity for every student or member year round.</p>
	  <p>GreatMoods Gift Baskets contain national brand chocolate bars, cookies, candy, candles and coffee. IPod downloadable music and lifestyle DVDs will be components of most Gift Baskets. Almost every product line you currently sell is a component in our GreatMoods Gift Baskets, wrapped up nicely with a bow.</p>
	 	 
	</div>
    <!--end column1-->
    
    <div id="column2">
    <div><br>
    	<img src="../../images/rep-pages/choir1.png" width="404" height="270" alt="High School Choir">
	<img class="imgLeft" src="../../images/rep-pages/youngboy1.png" width="198" height="166" alt="Young Elementary Boy">
	<img class="imgRight" src="../../images/rep-pages/church2.png" width="198" height="166" alt="Lady with Father">
    </div>
    <div id="pcaption">GreatMoods offers fundraising opportunities for schools, religious organizations, community organizations, and more. </div>
		<h3>Cash Next Day!</h3>
     <p>Best of all, your Fundraiser will receive cash next day on every Gift Basket sold, during every Fundraising Opportunity you participate in, year round.</p>
     <p>When a Gift Basket is ordered and processed from an individual’s website, your Fundraising Organization will receive a direct deposit into its PayPal account the next day. PayPal has a Visa Debit card you can use at any ATM to access your funds 24/7, 365 days a year, as your fundraiser takes place.</p>
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