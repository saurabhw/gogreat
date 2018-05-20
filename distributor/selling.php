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
<meta charset="UTF-8">
<title>Selling | Distributor</title>
<link rel="stylesheet" type="text/css" href="../css/mainRecruitingStyles.css">
<link rel="stylesheet" type="text/css" href="../css/header_styles.css">
<link rel="shortcut icon" href="../images/favicon.ico" >

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
    <h1>How To Sell and Close Your Prospects</h1>

    <div id="column1">   
      <h3>Identify Your Prospective Fundraising Accounts</h3>
      	<p></p>
      	
      <h3>Setup Your Prospects and Fundraiser Contact Information</h3>
      	<p></p>
      	
      <h3>Time to Call Them... "Are you in front of a computer?"</h3>
      	<p>Sales Script</p>
      	<p>Sales Training Video</p>
      
      <h3>Add Additional Contacts from the Call</h3>
      	<p>Add information to their actual website.</p>
      	<p>Or Fill out our prospect form.</p>
      	<p>Video Training</p>
      	
      <h3>Start Your Email Closing Campaign</h3>
      	<p>Follow up with Thank-You for your time, we're excited for your interest.</p>
      	<p>Here's a to-do list of how to get started</p>
      	<p>Parents email, Students email</p>
      	<p>Video Training</p>
      

    
    </div>    <!--end column1-->
    
    <div id="column2">
    <div>
    <img src="../images/recruiting/Screen shot 2012-08-16 at 12.05.32 AM.png" width="404" height="270">
	<img class="imgLeft" src="../images/recruiting/elementarybooster2.jpg" width="198" height="166" alt="elementary school children">
	<img class="imgRight" src="../images/recruiting/lutheran1.jpg" width="198" height="166" alt="churchgoers">
    </div>
    <div id="pcaption">GreatMoods offers fundraising opportunities for schools, religious organizations, community organizations, and more. </div>

	<h3>After They Say Yes, Setup the Students and Members, PayPal Account, Goals, and Start Date</h3>
      	<p>Identify a couple student leaders or captains to setup the members.</p>
      	<p>Video Training</p>
      	<p>Email a checklist of what they need to do and how to get started. Include link to their website.</p>
      	<p>Email to students and members with what they need to do in setting up their friends and family.</p>
      	<p>Video training to students and members</p>
      	
     <h3>Let the Fundraising Begin</h3>
      	<p>Kickoff of year round fundraising by the Holidays.</p>
      	<p>Let the fun begin, Check your PayPal account every day.</p>
	
    </div>    <!--end column2--> 
    
  </div>  <!--end content-->
  <?php include 'footer.php' ; ?>
</div><!--end container-->

</body>
</html>
<?php
ob_end_flush();
?>