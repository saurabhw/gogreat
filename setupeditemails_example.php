<?php
	session_start();
	ob_start();
?>

<!DOCTYPE HTML>
<head>
<title>3 Steps to Fundraising Success</title>
</head>

<body>
<div id="container">
  <?php include 'includes/header.inc.php'; ?>
  <?php include 'navigation/leftSidebarNavHomepage.nav.php'; ?>

  <div id="content">
    <h1>Getting Started Step 3:</h1>
    <h3>Personalize and Setup Friends & Family Supporter's E-Mails</h3>
    <div><a href="easysetup.php"> >> Back To 3 Easy Steps << </a></div>
    <div>
    	<br>
	<img src="../images/setup-edit_screens/sendemails_example.jpg" alt="Send Emails Example">
    </div> <!--end column1-->
  </div> <!--end content-->
  
  <?php include 'footer.php' ; ?>
</div> <!--end container-->

</body>
</html>
<?php
ob_end_flush();
?>