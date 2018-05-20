<?php
session_start();
if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
?>

  <?php include 'header.inc.php'; ?>
  <?php include 'leftSidebarNavRep.php'; ?>
  
  <div id="content">
	<div id="column1">
      		<h1>Getting Started</h1>
    		<h3>Sign Up and Start Today!</h3>
    		
      		<p>Getting started is easy! Drop us an e-mail and let us know who you are: Your name, where you’re located, phone number, email address.</p>
      		<p>Achieving Success for your Goals is our Goal, 24/7/365 days a year! The GreatMoods team will do whatever we can to help support you in accomplishing your mission.</p>

		<div id="graybackground">
			<p>Email Sent. Thank you! We will respond as soon as possible.<p>
		</div>
		
		<br>
		
		<h3>Interested in Becoming a GreatMoods Fundraising Representative?</h3>
		<p>If you would like to apply to become a GreatMoods Fundraising Representative or would like to find out more, please send us your resume and cover letter to: <a href="mailto:rephr@greatmoods.com%20subject:Rep%20Interest%20From%20Getting%20Started%20Page" target="_blank">rephr@greatmoods.com</a></p>
	</div> <!--end column1-->
    
    <div id="column2">
	    <br>
	    	<img src="../images/rep-pages/churchchoir.png" width="404" height="270" alt="Church Choir">
		<img class="imgLeft" src="../images/rep-pages/dodgeball.png" width="198" height="166" alt="Stuents Playing Dodgeball">
		<img class="imgRight" src="../images/rep-pages/soccergirls.png" width="198" height="166" alt="High School Girls Soccer">
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