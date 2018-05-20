<?php
	session_start();
	ob_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Maintaining Accounts</title>
<link href="../css/mainTrainingStyles.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container">
  <?php include "header.php"; ?>
  <?php include 'leftSidebarNavTrainingSalesRep.php' ; ?>
  <div id="content">
    <h1>Maintaining Accounts</h1>
    <p>&nbsp;</p>
    <div id="column1">
      <p>After an account has been all set up the management of that account involves making sure that they are submitting all the proper information and in a timely manner.</p>
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
