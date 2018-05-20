<?php
	session_start();

	ob_start();
?>

<!DOCTYPE HTML>
<head>
	<title>Cash Deposited Weekly!</title>
</head>

<body>
  <?php include 'includes/header.inc.php'; ?>
  <!--<?php include 'navigation/leftSidebarNavHomepage.nav.php'; ?>-->
   <?php include 'navigation/fullSidebar_home.php'; ?>
<div class="container">
	<div class="row"> 
     	<div class="col-md-6 col-md-offset-0 col-xs-offset-1">
    <h1>Cash Weekly! 24/7/365 Days a Year!</h1>
    	<h3>GreatMoods, Great Cash Flow</h3>
    	
      <p>Best of all, your Fundraising Organization receives cash weekly on every Product or Gift purchased. The cash will be deposited weekly, directly into their PayPal account.</p>
      <p>By the way, anyone can set up a PayPal account because it is like setting up a savings account at a bank. PayPal also has a Visa Debit card available for your Group, that they can use at any ATM to access the organization’s funds 24/7/365 days a year.</p>
      <p>GreatMoods can help setup each Organization, Club or Team with a free PayPal account prior to when the Fundraiser begins. The goal is to help both your Organization and its Students or Members maximize their income on an ongoing basis with this very easy Fundraiser.</p>
      <h3>Get Started Today</h3>
	<p>GreatMoods is looking forward to working with you and your Organization to build a long-term consistent Fundraising Revenue!</p>
	<!--<p><b>Click the Button below to contact us and get started.</b></p>
	<div><a href="contactus.php"><input type="button" value="Let the Fundraising Begin!"/></a></div>-->
   </div> <!--end column1-->   
        <div class="col-md-5 col-md-offset-1" id="" style="margin-top: 2em;">	
    	    <div class="row" style="margin-top: 2em;">
                <div class="col-md-12">
    	<img class="img-responsive center-block" src="../../images/rep-pages/bigbrobigsis1.png" width="404" height="270" alt="Big Brothers & Big Sisters"><br>
	</div>
        </div>
	<div class="row row-centered">
	<div class="center-block">
	<div class="col-xs-6 "><img class="imgLeft" src="../../images/rep-pages/kidsbball.png" width="198" height="166" alt="Student Artist - Pottery"></div>
	<div class="col-xs-6 "><img class="imgRight" src="../../images/rep-pages/familysteps.png" width="198" height="166" alt="Student Cello Player"></div>
	</div>
	</div>   
    </div> <!--end column2--> 
    
<!--<form action="https://app.ecwid.com/api/v1/1003/orders" method="post">
     <input type="text" name="secure_auth_key" value="r1wrFhJVcMAD" />
     <input type="text" name="order" value="123" />
     <input type="text" name="new_payment_status" value="ACCEPTED" />
     <input type="submit" />
</form>-->
</div>
  </div>  <!--end content-->
</div><!--end container-->
  <?php include 'footer.php' ; ?>
</body>
</html>
<?php
ob_end_flush();
?>