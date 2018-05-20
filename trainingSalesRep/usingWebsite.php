<?php
	session_start();
	ob_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Using the Website</title>
<link href="../css/mainTrainingStyles.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container">
  <?php include "header.php"; ?>
  <?php include 'leftSidebarNavTrainingSalesRep.php' ; ?>
  <div id="content">
    <h1>Using the Website</h1>
    <p>&nbsp;</p>
    <div class="col1">
      <p>Once you have identified potential accounts, you will be able to enter them into your account, allowing you to view all of your prospects and the progress they are making on their fundraisers.  Other features of our website include the prospect list as well as a call list that you can use to keep track of your accounts.</p>
    </div>
    <!--end col1-->
      <div class="col2">

<img class="spacebelow" style="padding-top:0" src="../images/training/keyboard.jpg" width="404" height="268" alt="keyboard">
</div>
      <!--end col2-->
      
      <div class="mainWide" />
      <div class="col1">
        <h3>Setting up an Account</h3>
        <p>Setting up a potential account in your prospect section is easy to do.  The information entered in these accounts is used to create a mockup website for the potential account. The information is also entered into your Prospect List to help you manage your accounts.</p>
        <p><a href="#">How to add a fundraiser</a> (document) <img style="vertical-align:top" src="../images/pdficon_small.png" width="16" height="16" alt="Download PDF"></p>
        <p>(Screen capture)</p>
      </div>
      <!--end col1-->
      <div class="col2">
       <img class="imgLeft" src="../images/placeholders/placeholder-404x220.jpg" width="404" height="220" alt="Prospect List Screen Capture">
        <div id="pcaption">How to add a fundraiser. </div>
      </div>
      <!--end col2--> 
    </div>
    <!--end mainWide-->
    
    <div class="mainWide" />
    <div class="col1">
      <h3>Using the Prospect List</h3>
      <p>After you have set up potential accounts they will appear in your Prospect List.  This list will show all of your prospects as well as their progress. </p>
      <p><a href="#">How to use the Prospect List</a> (document) <img style="vertical-align:top" src="../images/pdficon_small.png" width="16" height="16" alt="Download PDF"></p>
      <p>(Screen capture)</p>
    </div>
    <!--end col1-->
    <div class="col2">
      <div><img class="imgLeft" src="../images/placeholders/placeholder-404x220.jpg" width="404" height="220" alt="placeholder"> </div>
      <div id="pcaption">How to use the Prospect List.</div>
    </div>
    <!--end col2--> 
  </div>
  <!--end mainWide-->
  
  <div class="mainWide" />
  <div class="col1">
    <h3>Using the Call List</h3>
    <p>The Call List will enable you to make notes on particular accounts. You can keep track of when you have called a certain account and when you should be calling potential or current accounts.</p>
    <p><a href="#">How to use the Call List</a> (document) <img style="vertical-align:top" src="../images/pdficon_small.png" width="16" height="16" alt="Download PDF"></p>
    <p>(Screen capture)</p>
  </div>
  <!--end col1-->
  <div class="col2">
    <div><img class="imgLeft" src="../images/placeholders/placeholder-404x220.jpg" width="404" height="220" alt="placeholder"> </div>
    <div id="pcaption">How to use the Call List. </div>
  </div>
</div>
</div>
<!--end col2-->

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
