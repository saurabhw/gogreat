<?php
	session_start();
	ob_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Getting Started</title>
<link href="../css/mainTrainingStyles.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container">
  <?php include "header.php"; ?>
  <?php include 'leftSidebarNavTrainingSalesRep.php' ; ?>
  <div id="content">
    <h1>Getting Started</h1>
    <p>&nbsp;</p>
    <div id="column1">
      <p>To get started as a GreatMoods Representative you will need to do two simple things. The first step is editing your personal information; the second step is setting up a PayPal account and linking it to your own personal account.</p>
<br />    
<h3>Editing Your Information</h3> 
<p>Go to <a href="http://www.greatmoods.com/" target="_blank">www.greatmoods.com</a> and login to your account by using your given username and password.
Select Edit Information and add in your general contact information.</p>
<p>You may then change your password by selecting the Change your Password button.</p>
<br />    
<h3>Setting Up a PayPal Account</h3> 
<p>Getting paid through GreatMoods is all done online through PayPal.  All transactions are processed when a consumer buys a gift basket and all funds are disbursed appropriately.</p>

<p>If you already have a PayPal account, you can add that account&#39;s email to the proper field on your information screen.</p>

<p>If you do not have a PayPal account, simply go to <a href="https://www.paypal.com/home" target="_blank">www.paypal.com</a> and sign up for an account. </p>    
<p>If you need further instruction follow the document below.</p>

<p><a href="#">How to set up a PayPal account.</a> (document) <img style="vertical-align:top" src="../images/pdficon_small.png" width="16" height="16" alt="Download PDF"></p>

    </div>
    <!--end column1-->
    
    <div id="column2">
<img class="spacebelow" src="../images/video-placeholder-404x232.jpg" width="404" height="232" alt="video placeholder">

<!-- PayPal Logo --><div class="PayPalLogo" style="width: 100% !important; margin-bottom: 20px !important;"> <style type="text/css">div.PayPalLogo{text-align:center;margin:0;padding:0;width:90px;font:normal 12px arial,helvetica,san-serif;line-height:13px;} div.PayPalLogo a{text-decoration:none;color:black;} div.PayPalLogo a:visited{color:black;} div.PayPalLogo a:active{color:black;} div.PayPalLogo a:hover{text-decoration:underline;color:black;} div.PayPalLogo a img{border:0px;margin:0px;text-decoration:none;}</style><a href="#" onclick="javascript:window.open('https://www.paypal.com/cgi-bin/webscr?cmd=xpt/Marketing/popup/OLCWhatIsPayPal-outside','olcwhatispaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=500, height=350');"><img  src="https://www.paypal.com/en_US/i/logo/PayPal_mark_180x113.gif" border="0" alt="PayPal Logo"></a></br></div><!-- PayPal Logo -->

<img class="imgLeft" src="../images/placeholders/placeholder-404x220.jpg" width="404" height="220" alt="placeholder"> 
    <div id="pcaption">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. </div>

    </div>
    <!--end column2--> 
    
  </div>
  <!--end content-->
  <?php include 'footer.php' ; ?>
</div>
<!--end container-->

</body>
</html>
<?php
ob_end_flush();
?>
