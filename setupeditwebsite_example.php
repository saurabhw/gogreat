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
    <h1>Getting Started Step 1:</h1>
    <h3>Setup Group's Information at the Main Website</h3>
    <div><a href="easysetup.php"> >> Back To 3 Easy Steps << </a></div>
    <div>
    	<br>
	<img src="../images/setup-edit_screens/editwebsite_example_info.jpg" alt="Setup Website Example Information">
	<img src="../images/setup-edit_screens/editwebsite_example_reasons.jpg" alt="Setup Website Example Reasons">
	<img src="../images/setup-edit_screens/editwebsite_example_photos.jpg" alt="Setup Website Example Photos">
	<img src="../images/setup-edit_screens/editwebsite_example_goals.jpg" alt="Setup Website Example Goals">
    </div>

  </div> <!--end content-->
  
  <?php include 'footer.php' ; ?>
</div> <!--end container-->

</body>
</html>
<?php
ob_end_flush();
?>