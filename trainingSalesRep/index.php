<?php
	session_start();
	ob_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Representative Training Program</title>
<link href="../css/mainTrainingStyles.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container">
  <?php include "header.php"; ?>
  <?php include 'leftSidebarNavTrainingSalesRep.php' ; ?>
  <div id="content">
    <h1>Representative Training Program</h1>
    <p>&nbsp;</p>
    <div id="column1">
      <p>Welcome to the GreatMoods team! As our Representative, we want you to be successful. The Representative Training Program was designed to help you understand how the GreatMoods program works. We will help you set up and manage your accounts for schools, churches, and organizations within your area.  Just follow the links below to learn more about the program and all of its benefits.</p>
     
      <div id="leadBox">
        <div id="infoText">
          <div id="redBar1">
            <h3>Training Steps</h3>
          </div>
          <!--end redBar1-->
          <ul>
            <li><a href="#">Getting Started</a></li>
            <li><a href="#">Potential Accounts</a></li>
            <li><a href="#">Using the Website</a></li>
            <li><a href="#">How to Sell</a></li>
            <li><a href="#">Setting up an Account</a> </li>
            <li><a href="#">Maintaining Accounts</a></li>
          </ul>
        </div>
        <!--end infoText--> 
      </div>
      <!--end leadBox-->
      
    </div>
    <!--end column1-->
    
    <div id="column2">
<img class="spacebelow" src="../images/video-placeholder-404x232.jpg" width="404" height="232" alt="video placeholder">

<img class="imgLeft" src="../images/placeholders/placeholder-404x220.jpg" width="404" height="220" alt="placeholder"> 
    <div id="pcaption">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eget metus et turpis euismod convallis nec non eros. </div>

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
