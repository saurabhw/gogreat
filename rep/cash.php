<?php
	session_start();
	if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
	ob_start();
?>

  <?php include 'header.inc.php'; ?>
  <?php include 'leftSidebarNavRep.php'; ?>

  <div id="content">
    	<h1>Cash Weekly! 24/7/365 Days a Year!</h1>
    
    	<div id="column1">
    		<h3>GreatMoods, Great Cash Flow</h3>
    	
      		<p>Best of all, your Fundraising Organization receives cash weekly on every Product or Gift purchased. The cash will be deposited weekly, directly into their PayPal account.</p>
      		<p>By the way, anyone can set up a PayPal account because it is like setting up a savings account at a bank. PayPal also has a Visa Debit card available for your Group, that they can use at any ATM to access the organization’s funds 24/7/365 days a year.</p>
      		<p>GreatMoods can help setup each Organization, Club or Team with a free PayPal account prior to when the Fundraiser begins. The goal is to help both your Organization and its Students or Members maximize their income on an ongoing basis with this very easy Fundraiser.</p>
      		
      		<h3>Get Started Today</h3>
		<p>GreatMoods is looking forward to working with you and your Organization to build a long-term consistent Fundraising Revenue!</p>
		<!--<p><b>Click the Button below to contact us and get started.</b></p>
		<div><a href="contactus.php"><input type="button" value="Let the Fundraising Begin!"/></a></div>-->
    	</div> <!--end column1-->
    
    	<div id="column2">
    		<img src="../images/rep-pages/bigbrobigsis1.png" width="404" height="270" alt="Big Brothers & Big Sisters">
		<img class="imgLeft" src="../images/rep-pages/kidsbball.png" width="198" height="166" alt="Student Artist - Pottery">
		<img class="imgRight" src="../images/rep-pages/familysteps.png" width="198" height="166" alt="Student Cello Player">   
    	</div> <!--end column2--> 
    
  </div>  <!--end content-->
  
  <?php include 'footer.php' ; ?>
</div><!--end container-->

</body>
</html>
<?php
ob_end_flush();
?>