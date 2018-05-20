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
<head>
<title>Mission | Representative</title>
<link rel="stylesheet" type="text/css" href="../css/mainRecruitingStyles.css">
<link rel="stylesheet" type="text/css" href="../css/header_styles.css">
<link rel="shortcut icon" href="../images/favicon.ico">

<script>
$(document).ready(function() {
$(“.nav li:has(ul)”).hover(function(){
$(this).find(“ul”).slideDown();
}, function(){
$(this).find(“ul”).hide();
});
});
</script>
</head>

<body>
<div id="container">
<?php include 'header.inc.php'; ?><br><br>
<?php include 'leftSidebarNavDistributor.php'; ?>
  
  <div id="content">
    <h1>3 Steps to Fundraising $uccess!</h1>
    <div id="column1">
	<p><br>The GreatMoods Program allows all of the Fundraising to take place online with our Simple 3 Step Setup.</p>	  
	<h5>Step 1) <a href="setupeditwebsite_example2.php">Setup/Edit Website Sample Form</a></h5>
	All you need to do is fill in the basic fields that are relevant to your organization, such as name of the organization and message or purpose for the Fundraiser.<br>
	<h5>Step 2) <a href="setupeditmembers_example2.php">Setup/Edit Members Sample Form</a></h5>
	Each Student or Member can create their own Free Individually Personalized Fundraising Website requesting support from their Friends and Family Members. (Anyone who has setup a Facebook page can setup the entire member list, depending on its size, in an evening.)<br>
	<h5>Step 3) <a href="setupeditemails_example2.php">Setup/Edit E-Mails Sample Form</a></h5> 
	<p>Each Student or Member enters in the e-mail addresses for his or her Friends, Family, and Neighbors. Then a personal e-mail, or one of our standard e-mails, can go out to this e-mail list requesting the support for their Fundraiser.</p>
	
	<p>Lastly, setup a PayPal account so you or your group can receive Cash Next Day on every sale, and again we can work with you to get it done quickly. Getting paid through GreatMoods is done online through PayPal. All transactions are processed when a consumer buys a product or gift and all funds are deposited directly into your fundraising PayPal account.<br><br>
	  If you already have a PayPal account, you can add that account's email to the proper field on your information website set up screen.</p>
	</div> <!--end column1-->
    
    <div id="column2">
    <div><br>
    	<img src="../../images/rep-pages/choir1.png" width="404" height="270" alt="High School Choir">
	<img class="imgLeft" src="../../images/rep-pages/youngboy1.png" width="198" height="166" alt="Young Elementary Boy">
	<img class="imgRight" src="../../images/rep-pages/church2.png" width="198" height="166" alt="Lady with Father">
    </div>
    <div id="pcaption"></div>
	<div>&nbsp;</div>
	<p>If you’re not a techie that’s ok, we can do everything for you, or just find a couple kids who have either a cell phone or Facebook page, and they could do it for you in a night.</p>
	
	<h3>Get Started Today</h3>
	<p>GreatMoods is looking forward to working with you and your Organization to build a long-term consistent Fundraising Revenue!</p>
	<p><b>Click the Button below to contact us and get started.</b></p>
	<div><a href="contactus.php"><input type="button" value="Let the Fundraising Begin!"/></a></div>
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