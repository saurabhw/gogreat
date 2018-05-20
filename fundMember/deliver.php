<?php
	session_start();
	ob_start();
	$userID = $_SESSION['userId'];
        $userEmail = $_SESSION['email'];
?>

<!DOCTYPE HTML>
<head>
	<title>We Deliver!</title>
</head>

<body>
<div id="container">
  	<?php include 'header.php' ; ?>
	<?php include 'memberSidebar.php' ; ?>
  
  <div id="content">
	<div id="column1">
    	    	<h1>We Deliver! </h1>
		<h3>The Ordering and Delivery Process</h3>
	  	<p>Ordering and Delivery is easy for your Friends & Family Members that are supporting your Fundraiser; they just need to do 2 simple steps. </p>
	  	<p><b>Step 1</b> - Shop at the GreatMoods Mall, adding their product selections to their Shopping Cart.</p>
	  	<p><b>Step 2</b> - Check Out with PayPal and enter where they want everything delivered to.</p>
	  	<p><b>Done!</b></p>
	  	<p>GreatMoods delivers all Products or Gifts a week before the holiday or special occasion, year round.</p>
      	</div> <!--end column1-->
    
    	<div id="column2">
    		<img src="../../images/rep-pages/scouts.png" width="404" height="270" alt="Kiwanis Club">
		<img class="imgLeft" src="../../images/rep-pages/lukeandfriends.png" width="198" height="166" alt="Young Girl">
		<img class="imgRight" src="../../images/rep-pages/volleyball.png" width="198" height="166" alt="Boy with School Fundraiser">
		
	    <!--<h3>Get Started Today</h3>
		<p>GreatMoods is looking forward to working with you and your Organization to build a long-term consistent Fundraising Revenue!</p>
		<p><b>Click the Button below to contact us and get started.</b></p>
		<div><a href="contactus.php"><input type="button" class="medredbutton" value="Let the Fundraising Begin!"/></a></div>-->
    	</div> <!--end column2--> 
  </div>  <!--end content-->
  
  <?php include 'footer.php' ; ?>
</div> <!--end container-->

</body>
</html>
<?php
ob_end_flush();
?>