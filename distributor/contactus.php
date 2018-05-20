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
<title>Sign Up & Start Today | Representative</title>
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
    <h1>Sign Up and Start Today</h1>
    <h3>Achieving Success for your Goals is our Goal</h3>
    
    <!--<h3>Complete The Online Application Below</h3>-->
    
<div id="column1">
	<p>Getting started is easy! Drop us an e-mail and let us know who you are: Your Organization name, where you’re located, contact name, number, email address and what you or your Organization would like to do.</p>
      	<p>Achieving Success for your Goals is our Goal, 24/7/365 days a year! The GreatMoods team will do whatever we can to help support you and your organization in accomplishing your mission.</p>
      	
		<!--<ul>
		<li>Quick Review of the GreatMoods Program</li>
		<li>Fill Out Your Contact Information</li>

		<li>Let Us Know Your Income Goal</li>
		<li>Who Are Some of Your Potential Account Prospects</li>
		<li>Send Us a Cover Letter - Let Us Know What You Think of the Opportunity and Attach a Resume</li>
		<li>We Will Contact You Within 48 hours - We Are Looking Forward to Helping You Achieve Your Income Goal</li>
		</ul>
	<p><a href="../rep/appstart.php">Begin the Application >></a><br></p>-->
	
		<div class="contactus">
			<form action="contactEmail.php" method="post" enctype="multipart/form-data">
				<table>
					<tr>
						<th><label>Name</label></td>
						<td><input id="name" type="text" name="name" value="" /></td>
					</tr>
					<tr>
						<th><label>Email</label></td>
						<td><input id="email" type="text" name="email" value="" /></td>
					</tr>
					<tr>
						<th><label>Comments<br>or Questions</label></td>
						<td><textarea id="comment" name="comment" cols="35" row="20" wrap="hard" /></textarea></td>
					</tr>
					<tr>
						<td></td>
						<td><input id="mailbutton" type="reset" value="Clear Text">
						<input id="mailbutton" type="submit" name="submit" value="Send Email" />
						</td>
					</tr>
					
				</table>
			</form>
		</div>
	</div> <!--end column1-->
    
    <div id="column2">
    <div><br>
    	<img src="../images/rep-pages/churchchoir.png" width="404" height="270" alt="Church Choir">
	<img class="imgLeft" src="../images/rep-pages/dodgeball.png" width="198" height="166" alt="Stuents Playing Dodgeball">
	<img class="imgRight" src="../images/rep-pages/soccergirls.png" width="198" height="166" alt="High School Girls Soccer">
    </div>
    <div id="pcaption">GreatMoods offers fundraising opportunities for schools, religious organizations, community organizations and more. </div>
		
      
    </div> <!--end column2-->  
    
  </div> <!--end content-->
  <?php include 'footer.php' ; ?>
</div> <!--end container-->

</body>

<?php
ob_end_flush();
?>