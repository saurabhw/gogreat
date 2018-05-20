<?php
	session_start();
	ob_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Setting Up Accounts</title>
<link href="../css/mainTrainingStyles.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container">
  <?php include "header.php"; ?>
  <?php include 'leftSidebarNavTrainingSalesRep.php' ; ?>
  <div id="content">
    <h1>Setting Up an Account</h1>
    <p>&nbsp;</p>
    <div id="column1">
      <p>Once they have said yes, all you are going to have to do is make sure that they go through the 3 step process in order to be set up and get going.  Those 3 steps are editing their own website and linking it to a PayPal account, getting the students setup, and getting the emails from the students.  Once those 3 steps are complete they are ready to go.</p>
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
