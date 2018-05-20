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
    <h1>3 Steps to Fundraising Success</h1>
    <div id="column1">
	<p><br>Setting up fundraisers has never been so easy. Our Easy 3 Step process is simple for you and your customer. The GreatMoods Program allows all of the fundraising to take place online, and makes fundraising quick and easy.</p>
	<h3>The 3 simple steps are:</h3>	  
	<h5>Step 1) <a href="setupeditclub.php">Setup/Edit Website</a> of the Club, Team or Organization</h5>
	All you need to do is fill in the basic fields that are relevant to your organization. Such as name of organization and message or purpose for the fundraiser.<br>
	<h5>Step 2) <a href="setupeditmembers.php">Setup/Edit Members</a> that will be participating in your fundraiser</h5>
	Each student/member creates their own Free Individually Personalized Fundraising Website that will be used for their supporters.<br>
	<h5>Step 3) <a href="setupeditemails.php">Setup/Edit E-Mails</a> from students/kids Friends, Family and Neighbors</h5> 
	Each student/member retrieves and enters in the e-mail addresses for his or hers friends, family, and neighbors, along with a personal message.	
	<p>If you or your customers ever need <a href="help.php">Help</a> along the way click on our <a href="help.php">Help</a> button or contact your GreatMoods Representative.</p>
	</div>
    <!--end column1-->
    
    <div id="column2">
    <div><br>
    	<img src="../../images/rep-pages/crosscountry1.png" width="404" height="270" alt="Cross Country Runners">
	<img class="imgLeft" src="../../images/rep-pages/girlyoung1.png" width="198" height="166" alt="Elementary School Girl">
	<img class="imgRight" src="../../images/rep-pages/americanheartassociation1.png" width="198" height="166" alt="American Heart Association">
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
