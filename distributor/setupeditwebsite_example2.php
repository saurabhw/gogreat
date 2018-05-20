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
<meta charset="UTF-8">
<title>Setup/Edit Website | Getting Started</title>
<link rel="stylesheet" type="text/css" href="../css/mainRecruitingStyles.css">
<link rel="stylesheet" type="text/css" href="../css/header_styles.css">
<link rel="shortcut icon" href="../images/favicon.ico" >

<script>
$(document).ready(function() {
$(“.nav li:has(ul)”).hover(function(){
$(this).find(“ul”).slideDown();
}, function(){
$(this).find(“ul”).hide();
});
});
</script>
</head>

<body>
<div id="container">
<?php include 'header.inc.php'; ?><br><br>
<?php include 'leftSidebarNavDistributor.php'; ?>

  <div id="content">
    <h1>Getting Started Step 1:</h1>
    <h3>Setup/Edit Group's Information at the Main Website</h3>
    <div><a href="easysetup.php"> >> Back To 3 Easy Steps << </a></div>
    <div>
    	<br>
	<img src="../images/setup-edit_screens/editwebsite_example.png" width="867" height="804" alt="Setup/Edit Website Example">
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