<?php
	session_start();
	ob_start();
?>

<!DOCTYPE HTML>
<head>
	<title>Getting Started</title>
</head>

<body>
<div id="container">
  <?php include 'includes/header.inc.php'; ?>
  <?php include 'navigation/leftSidebarNavHomepage.nav.php'; ?>
  
  <div id="content">
    <h1>Getting Started</h1>
<h3>Achieving Success for your Goals is our Goal</h3>

<div id="column1">
	<p>Setting up an Online Fundraiser for your entire Organization is probably a first for you and we know that. Here is your Fundraising To Do Checklist, with Step by Step forms to help you get started.</p> 
	<p>A suggestion for any Organization or Fundraising Leader or non-techie types who are concerned about setting up an online Fundraiser. Find a couple kids or members who have a Cell Phone, Facebook page or Twitter account, because they could easily set up the whole Fundraiser in an evening and maintain any part of it in their sleep.</p>

	<h3>Training Tips, Tools & Forms:</h3>
	<h5><b><b>Overview Presentations</b></b></h5>
	<ul>
		<li>Fundraising Word and PowerPoint Documents (PC or Mac)</li>
		<li>Video Fundraising Overview</li>
		<li>Complete Step by Step Fundraising Training Guide</li>
		<li>Step by Step Student or Member Leader Guide</li>
		<li>Sales Guide to Successfully Selling Products and Gifts</li>
	</ul>

	<br>

	<h5><b>Getting Started Packet for the Fundraising Leaders, and Students</b></h5>
	<ul>
		<li>Welcome, Let’s Get Your Fundraiser Setup (Leaders To Do Checklist)</li>
		<li>Welcome, Let’s get your Website Setup and Generating Funds (Student or Member To Do)</li>
		<li>Fundraising Leaders Checklist</li>
		<li>Student/Member Leader Checklist</li>
		<li>Student/Member Checklist</li>
	</ul>
		
	<br>

	<h5><b>Forms and Marketing Materials</b></h5>
	<ul>
		<li>Friends & Family Email Prospect Form</li>
		<li>Contact Card Form</li>
		<li>Order Form with Best Sellers</li>
		<li>Poster</li>
	</ul>

	<br>

</div> <!--end column1-->

<div id="column2">
	<img src="../images/rep-pages/productgrouping2.png" width="347" height="307" alt="Product Grouping">

	<h5><b>Fundraising Emails</b></h5>
	<ul>
		<li>Announcements</li>
		<li>Parent Emails</li>
		<li>Student or Member Emails</li>
		<li>Consumer Emails</li>
		<li>Facebook Posts</li>
	</ul>

	<br>

	<h5><b>Get Started Today</b></h5>
	<p>GreatMoods is looking forward to working with you and your Organization to build a long-term consistent Fundraising Revenue!</p>
	<p><b>Click the Button below to contact us and get started.</b></p>
	<div><a href="contactus.php"><input type="button" class="medredbutton" value="Let the Fundraising Begin!" title="Click to contact us and get started."/></a></div>
</div> <!--end column2-->

</div> <!--end content-->

  <?php include 'footer.php' ; ?>
</div> <!--end container-->

</body>
</html>
<?php
ob_end_flush();
?>