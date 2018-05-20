<?php
	session_start();

	ob_start();
       $userID = $_SESSION['userId'];
       $userEmail = $_SESSION['email'];
?>

<!DOCTYPE HTML>
<head>
	<title>Cash Deposited Weekly!</title>
</head>

<body>
<div id="container">
  	<?php include 'header.php' ; ?>
	<?php include 'memberSidebar.php' ; ?>
  
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
      
    </div>
    <!--end column1-->
    
    <div id="column2">
    <div>
    	<img src="../../images/rep-pages/bigbrobigsis1.png" width="404" height="270" alt="Big Brothers & Big Sisters">
	<img class="imgLeft" src="../../images/rep-pages/kidsbball.png" width="198" height="166" alt="Student Artist - Pottery">
	<img class="imgRight" src="../../images/rep-pages/familysteps.png" width="198" height="166" alt="Student Cello Player">
    </div>    
    </div> <!--end column2--> 
    
<!--<form action="https://app.ecwid.com/api/v1/1003/orders" method="post">
     <input type="text" name="secure_auth_key" value="r1wrFhJVcMAD" />
     <input type="text" name="order" value="123" />
     <input type="text" name="new_payment_status" value="ACCEPTED" />
     <input type="submit" />
</form>-->
  </div>  <!--end content-->
  
  <?php include 'footer.php' ; ?>
</div><!--end container-->

</body>
</html>
<?php
ob_end_flush();
?>