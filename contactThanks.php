<?php
session_start();
if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
?>
<!DOCTYPE HTML>
<head>
	<title>Welcome to GreatMoods | Contact Us</title>
</head>

<body>
<div id="container">
  <?php include 'includes/header.inc.php'; ?>
  <?php include 'navigation/leftSidebarNavHomepage.nav.php'; ?>
  
  <div id="content">
	<div id="column1">
      		<h1>Getting Started</h1>
    		<h3>Sign Up and Start Today!</h3>
    		
      		<p>Getting started is easy! Drop us an e-mail and let us know who you are: Your Organization name, where you’re located, contact name, number, email address and what you or your Organization would like to do.</p>
      		<p>Achieving Success for your Goals is our Goal, 24/7/365 days a year! The GreatMoods team will do whatever we can to help support you and your organization in accomplishing your mission.</p>

		<div id="graybackground">
			<p>Email Sent. Thank you! We will respond as soon as possible.<p>
		</div>
	</div> <!--end column1-->
    
    <div id="column2">
	    <div><br>
	    	<img src="images/rep-pages/churchchoir.png" width="404" height="270" alt="Church Choir">
		<img class="imgLeft" src="images/rep-pages/dodgeball.png" width="198" height="166" alt="Stuents Playing Dodgeball">
		<img class="imgRight" src="images/rep-pages/soccergirls.png" width="198" height="166" alt="High School Girls Soccer">
	    </div>
	    <div id="pcaption">GreatMoods offers fundraising opportunities for schools, religious organizations, community organizations and more. </div>
    </div> <!--end column2--> 
    
  </div> <!--end content-->
  <?php include 'footer.php' ; ?>
</div> <!--end container-->

</body>
</html>
<?php
ob_end_flush();
?>