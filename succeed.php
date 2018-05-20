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
  <?php include 'includes/header.inc.php'; ?>
  <?php include 'navigation/leftSidebarNavHomepage.nav.php'; ?>
  <div id="content">
    <h1>How To Succeed</h1>
    <h3>Steps to a Successful Fundraiser</h3>
<div id="column1">
      <p>Success is easy with GreatMoods Fundraising, just follow these quick and easy steps to see how much MONEY your Organization, Team or Club can raise online!</p>
	  <h5>Step 1:</h5><p>Choose your Organization's Fundraising Leaders, Team Captains or Student Fundraising Leaders to Setup and Create your Fundraising Website.</p>
		<p>Add the basic information about your Fundraiser in our form.</p>
		<p>Add a simple message to the supporters of your Fundraiser</p>
		<p>Post multiple photos of your organization, team, or club</p>
		<p>Add the leader and Fundraising contacts its members or organization for everyone to recognize</p>
	  <h5>Step 2:</h5><p>Set up your Team, Club or Organization’s Individually Personalized Fundraising Member Websites. That would include setting up a post at their Facebook/Twitter pages. </p>
		<p>Refer your Team, Club or Organization to the team’s Fundraising page.  Then have each member create their own page and upload a picture of him or herself if they please.</p>
	  <h5>Step 3:</h5><p>Set up all of your Friends, Family, Neighbors, Business Customers and Clients E-mail addresses.</p>
		<p>Create a personal message to send to all your e-mail contacts or select one of our many greetings requesting support for your cause.</p>
	  <h5>Step 4:</h5><p>After receiving your prospects Individually Personalized Free Fundraising Website from GreatMoods, contact your prospects and show them how easy fundraising with GreatMoods can be.</p>
	</div>
    <!--end column1-->
    
    <div id="column2">
    <div><br>
    	<img src="../../images/rep-pages/choir1.png" width="404" height="270" alt="High School Choir">
	<img class="imgLeft" src="../../images/rep-pages/relay.png" width="198" height="166" alt="Young Elementary Boy">
	<img class="imgRight" src="../../images/rep-pages/kidscelebrating.png" width="198" height="166" alt="Lady with Father">
    </div>
    <div id="pcaption">GreatMoods offers fundraising opportunities for schools, religious organizations, community organizations, and more. </div>

     <p>Note if you would like to still go door-to-door we have an E-mail sign-up form. In addition we have an order form with photos of the gift baskets that you can use to write an order at your neighbor's or at the back of a church. This allows you to show your neighbors a selection of gift baskets they can choose and how easy it is to order. </p>
     <p>PS. Have your friend, family, or neighbor order from your cell phone if your going door-to-door or in person. </p>
	 <p>If you or your supporters need any assistance with setting up the Fundraising sites or ordering from your Fundraiser please let us know and we will help you immediately.</p>
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