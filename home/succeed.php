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
    <h1>Daily Jobs & Goals</h1>
    <p>&nbsp;</p>
<div id="column1">
      <p>Online Fundraising is changing the Fundraising world forever, from door-to-door sales of Candy, Cookie Dough and Gift Wrap, to Online Fundraising. In order to succeed with GreatMoods just follow these quick and easy steps to successfully Fundraise online, and see how much MONEY (link to income calculator) your Team, Club or Organization can raise!</p>
	  <h5>Step 1:</h5><p>Have your Team Captains or Student Leaders Setup and Create your Fundraising Website.</p>
		<p>This process is simple for every student or member who knows how to navigate the Internet.  GreatMoods makes it simple to create your own website by adding a quick, simple message to your Fundraising supporters.  Also you can post multiple photos of your team, its members or organization for everyone to recognize.</p>
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
	<img class="imgLeft" src="../../images/rep-pages/youngboy1.png" width="198" height="166" alt="Young Elementary Boy">
	<img class="imgRight" src="../../images/rep-pages/church2.png" width="198" height="166" alt="Lady with Father">
    </div>
    <div id="pcaption">GreatMoods offers fundraising opportunities for schools, religious organizations, community organizations, and more. </div>

     <p>Note if you would like to still go door-to-door we have an E-mail sign-up form. In addition we have an order form with photos of the gift baskets that you can use to write an order to your neighbors or at the back of a church. This allows you to show your neighbors a selection of gift baskets they can choose and how easy it is to order. </p>
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