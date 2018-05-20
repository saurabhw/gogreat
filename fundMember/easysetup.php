<?php
	session_start();
	ob_start();
	$userID = $_SESSION['userId'];
        $userEmail = $_SESSION['email'];
?>

<!DOCTYPE HTML>
<head>
	<title>GreatMoods 3 Steps to Fundraising Success</title>
</head>

<body>
<div id="container">
  	<?php include 'header.php' ; ?>
	<?php include 'memberSidebar.php' ; ?>
  
  <div id="content">
    <h1>3 Steps to Fundraising $uccess!</h1>
    <div id="column1">
	<p><br>The GreatMoods Program allows all of the Fundraising to take place online with our Simple 3 Step Setup.</p>	  
	<h5>Step 1) <a href="setupeditwebsite_example.php">Setup Website Example</a></h5>
	<p>All you need to do is fill in the basic fields that are relevant to your organization, such as name of the organization and message or purpose for the Fundraiser.</p><br>
	<h5>Step 2) <a href="setupeditmembers_example.php">Setup Members Example</a></h5>
	<p>Each Student or Member can create their own Free Individually Personalized Fundraising Website requesting support from their Friends and Family Members. (Anyone who has setup a Facebook page can setup the entire member list, depending on its size, in an evening.)</p><br>
	<h5>Step 3) <a href="setupeditemails_example.php">Setup E-Mails Example</a></h5> 
	<p>Each Student or Member enters in the e-mail addresses for his or her Friends, Family, and Neighbors. Then a personal e-mail, or one of our standard e-mails, can go out to this e-mail list requesting the support for their Fundraiser.</p>
	
	<p>Lastly, setup a PayPal account so you or your group can receive Cash Weekly on every sale, and again we can work with you to get it done quickly. Getting paid through GreatMoods is done online through PayPal. All transactions are processed when a consumer buys a product or gift and all funds are deposited directly into your fundraising PayPal account.<br><br>
	  If you already have a PayPal account, you can add that account's email to the proper field on your information website set up screen.</p>
	  
	  <h3>Get Started Today</h3>
	<p>GreatMoods is looking forward to working with you and your Organization to build a long-term consistent Fundraising Revenue!</p>
	<p><b>Click the Button below to contact us and get started.</b></p>
	<div><a href="gettingstarted_sendemail.php"><input type="button" class="medredbutton" value="Let the Fundraising Begin!"/></a></div>
	<br>
	</div> <!--end column1-->
    
    <div id="column2">
    <div><br>
    	<img src="../../images/rep-pages/choir1.png" width="404" height="270" alt="High School Choir">
	<img class="imgLeft" src="../../images/rep-pages/youngboy1.png" width="198" height="166" alt="Young Elementary Boy">
	<img class="imgRight" src="../../images/rep-pages/church2.png" width="198" height="166" alt="Lady with Father">
    </div>
    <div id="pcaption"></div>

	<p>If you’re not a techie that’s ok, we can do everything for you, or just find a couple kids who have either a cell phone or Facebook page, and they could do it for you in a night.</p>
	
    </div>   <!--end column2--> 
    
  </div> <!--end content-->
  <?php include 'footer.php' ; ?>
</div> <!--end container-->

</body>
</html>
<?php
ob_end_flush();
?>