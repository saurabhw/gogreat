<?php
	session_start();
	ob_start();
?>

<!DOCTYPE HTML>
<head>
	<title>We Deliver!</title>
</head>

<body>
  <?php include 'includes/header.inc.php'; ?>
  <!--<?php include 'navigation/leftSidebarNavHomepage.nav.php'; ?>-->
   <?php include 'navigation/fullSidebar_home.php'; ?>
<div class="container">
	<div class="row"> 
     	<div class="col-md-6 col-md-offset-0 col-xs-offset-1">
    	    	<h1>We Deliver! </h1>
		<h3>The Ordering and Delivery Process</h3>
	  	<p>Ordering and Delivery is easy for your Friends & Family Members that are supporting your Fundraiser; they just need to do 2 simple steps. </p>
	  	<p><b>Step 1</b> - Shop at the GreatMoods Mall, adding their product selections to their Shopping Cart.</p>
	  	<p><b>Step 2</b> - Check Out with PayPal and enter where they want everything delivered to.</p>
	  	<p><b>Done!</b></p>
	  	<p>GreatMoods delivers all Products or Gifts a week before the holiday or special occasion, year round.</p>
      	</div> <!--end column1-->
        <div class="col-md-5 col-md-offset-1" id="" style="margin-top: 2em;">	
    	    <div class="row" style="margin-top: 2em;">
                <div class="col-md-12">
    		<img class="img-responsive center-block" src="../../images/rep-pages/scouts.png" width="404" height="270" alt="Kiwanis Club"><br>
		</div>
        	</div>
		<div class="row row-centered">
		<div class="center-block">	
		<div class="col-xs-6 "><img class="imgLeft" src="../../images/rep-pages/lukeandfriends.png" width="198" height="166" alt="Young Girl"></div>
		<div class="col-xs-6 "><img class="imgRight" src="../../images/rep-pages/volleyball.png" width="198" height="166" alt="Boy with School Fundraiser"></div>
		</div>
		</div>
	    <!--<h3>Get Started Today</h3>
		<p>GreatMoods is looking forward to working with you and your Organization to build a long-term consistent Fundraising Revenue!</p>
		<p><b>Click the Button below to contact us and get started.</b></p>
		<div><a href="contactus.php"><input type="button" class="medredbutton" value="Let the Fundraising Begin!"/></a></div>-->
    	</div> <!--end column2--> 
  </div>  <!--end content-->
</div>
</div> <!--end container-->
  <?php include 'footer.php' ; ?>
</body>
</html>
<?php
ob_end_flush();
?>