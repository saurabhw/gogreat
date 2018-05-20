<?php
	session_start();
	if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
	ob_start();
?>

<!DOCTYPE HTML>
<head>
<title>Setup/Edit Members | Getting Started</title>
<link rel="stylesheet" type="text/css" href="../css/mainRecruitingStyles.css">
<link rel="shortcut icon" href="../images/favicon.ico" >
</head>

<body>
<div id="container">
  <?php include 'header.inc.php'; ?>
  <?php include 'leftSidebarNavRep.php'; ?>

  <div id="content">
    <h1>Getting Started Step 2:</h1>
    <h3>Setup/Edit Group's Members</h3>
    <div><a href="easysetup.php"> >> Back To 3 Easy Steps << </a></div>
    <div>
    	<br>
	<img src="../images/setup-edit_screens/viewaddmembers_example.png" width="886" height="1040" alt="Setup/Edit Members Example">
    </div>

  </div> <!--end content-->
  
  <?php include 'footer.php' ; ?>
</div>
<!--end container-->

</body>
</html>
<?php
ob_end_flush();
?>