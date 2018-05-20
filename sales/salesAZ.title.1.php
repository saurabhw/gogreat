<?php
	include '../includes/autoload.php';
	if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "SC")
       {
            header('Location: ../salesAZ.php');
            exit;
       }
	
?>

<!DOCTYPE HTML>
<head>
<title>Mission | Representative</title>
<link rel="stylesheet" type="text/css" href="../css/mainRecruitingStyles.css">
<link rel="shortcut icon" href="../images/favicon.ico" >
</head>

<body>
<div id="container">
  <?php include 'header.inc.php' ; ?>
      <?php include 'sidenav.php' ; ?>


  <div id="content">
    <h1>First Step:</h1>
    <h3>Setup/Edit Group's Information at the Main Website</h3>
    <div><a href="salesAZ2.php"> >> Back To Sales A to Z << </a></div>
    

  </div> <!--end content-->
  
  <?php include 'footer.php' ; ?>
</div>
<!--end container-->

</body>
</html>
<?php
ob_end_flush();
?>
