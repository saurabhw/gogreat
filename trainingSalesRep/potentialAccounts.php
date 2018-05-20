<?php
	session_start();
	ob_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Potential Accounts</title>
<link href="../css/mainTrainingStyles.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container">
  <?php include "header.php"; ?>
  <?php include 'leftSidebarNavTrainingSalesRep.php' ; ?>
  <div id="content">
    <h1>Potential Accounts</h1>
    <p>&nbsp;</p>
    <div class="col1">
      <p>Accounts exist all around you, from your local school to your local churches, and countless other possibilities. Finding potential accounts is simple, but the key to the whole process is finding out who to talk to within that account.</p>
    </div>
    <!--end col1-->
    <div class="col2"> </div>
    <!--end col2-->
    <div class="mainWide" />
    <div class="col1">
      <h3>Finding Potential Accounts</h3>
      <p>Potential accounts are all over your local neighborhood. We can set up fundraisers for schools, churches, and any organization that needs to raise money.  The basic research will be doing a Google search for any of these potential accounts within your area.</p>
    </div>
    <!--end col1-->
    <div class="col2">
    <img class="spacebelow" src="../images/video-placeholder-404x232.jpg" width="404" height="232" alt="video placeholder"> </div>
    <!--end col2--> 
  </div>
  <!--end mainWide-->
  
  <div class="mainWide" />
  <div class="col1">
    <h3 class="alignToTop">Who’s in Charge?</h3>
    <p>After you have found some potential accounts, the next, and most important step, will be finding out who is in charge of raising the funds for that particular organization. You will need to make some phone calls to ask who is in charge of fundraising to make sure that you talk to the proper person.</p>
  </div>
  <!--end col1-->
  <div class="col2"> <img src="../images/video-placeholder-404x232.jpg" width="404" height="232" alt="video placeholder"> </div>
  <!--end col2--> 
</div>
<!--end mainWide-->

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
