<?php
	session_start();
	ob_start();
?>

<!DOCTYPE HTML>
<head>
	<title>GreatMoods 3 Steps to Fundraising Success</title>
</head>

<body>

<?php include 'includes/header.inc.php'; ?>
<!--<?php include 'navigation/leftSidebarNavHomepage.nav.php'; ?>-->
   <?php include 'navigation/fullSidebar_home.php'; ?>
<div class="container">
	<div class="row"> 
     	<div class="col-md-6 col-md-offset-0 col-xs-offset-1">
         	<h1>3 Steps to Fundraising $uccess!</h1>
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
    	</div><!--end column1-->
    	
        <div class="col-md-5  col-md-offset-1" id="" style="margin-top: 2em;">	
    	    <div class="row" style="margin-top: 2em;">
                <div class="col-md-12">
                    <img class="img-responsive center-block" src="../../images/rep-pages/choir1.png" width="404" height="270" alt="High School Choir"><br>              
                </div>
            </div>
            <div class="row row-centered">
                <div class ="center-block">
            	    <div class="col-xs-6 "><img class="img-responsive" src="../../images/rep-pages/youngboy1.png"  alt="Young Elementary Boy"></div>
            	    <div class="col-xs-6 "><img class="img-responsive" src="../../images/rep-pages/church2.png" alt="Lady with Father" ></div>
        	    </div>
            	</div>
		<div id="pcaption" class="row">
		<br>
		<center>
                <i>GreatMoods offers fundraising opportunities for schools, religious<br> organizations, community organizations and more.</i> 
		</center>
	</div>
	</div>
        </div><!--end column2--> 
    </div>   <!--end row--> 
</div> <!--end container--> 

<?php include 'footer.php' ; ?>
</body>
</html>
<?php
ob_end_flush();
?>