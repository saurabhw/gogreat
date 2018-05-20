<?php
	session_start();
	ob_start();
?>
<!DOCTYPE HTML>
<head>
<meta charset="UTF-8">
<title>Successful Fundraiser | GreatMoods</title>
<link href="../css/mainRecruitingStyles.css" rel="stylesheet" title="Set up your account" type="text/css" id="Set up your account" />
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
  <?php include 'header.inc.php'; ?>
  <?php include 'leftSidebarNavDistributor.php'; ?>
  <div id="content">
    <h1>Daily Jobs & Goals</h1>
    <h3>Steps to a Successful Fundraiser</h3>    
<div id="column1">
      <h5>Step 1:</h5><p>Identify your prospects that you would like to set up in your community or region.</p>
      <h5>Step 2:</h5><p>Identify the possible clubs, teams and organizations within each of your prospects</p>
      <h5>Step 3:</h5><p>Enter in your prospects information via your representative website’s or your Offline Prospect Form</p>
      <h5>Step 4:</h5><p>After receiving your prospects Individually Personalized Free Fundraising Website from GreatMoods, contact your prospects and show them how easy fundraising with GreatMoods can be</p>
	<p>Selling is easy because all you need to do is call them on the phone, ask them, “are you in front of a computer because I would like to show you your free fundraising website.” In real time you can send them that link to their real website and explain 3 simple steps to setting up the GreatMoods Fundraiser.</p>
	<p>The closing ratio will be over 50% when they see their real website already set up, so have fun and sign up today.</p>
	
    </div>
    <!--end column1-->
    
    <div id="column2">
    <div><br>
    	<img src="../images/rep-pages/choir1.png" width="404" height="270" alt="High School Choir">
	<img class="imgLeft" src="../images/rep-pages/relay.png" width="198" height="166" alt="Young Elementary Boy">
	<img class="imgRight" src="../images/rep-pages/kidscelebrating.png" width="198" height="166" alt="Lady with Father">
    </div>
    <div id="pcaption">GreatMoods offers fundraising opportunities for schools, religious organizations, community organizations, and more. </div>

     <p>Anytime you need assistance with setting up the fundraiser or to explain to your prospect the program just give us a call or set up a time that you would like us to be available we will help you immediately.</p>
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