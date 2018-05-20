<?php
	session_start();
	/*if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }*/
	ob_start();
	$msg = $_GET['msg'];
?>
<!DOCTYPE HTML>
<html>
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Add Training</title>
                <link href="../css/setupFormStyles.css" rel="stylesheet" type="text/css" />
                <link href="../css/headerSampleWebsiteStyles.css" rel="stylesheet" type="text/css">
                <link href="../css/leftSidebarNav.css" rel="stylesheet" type="text/css">
		<link href="../css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
		<script src="js/loadXMLDoc.js"></script>
		<style type="text/css"></style>
		</head>
		<body>
<div id="container">
<?php include 'header.inc.php' ; ?>
<?php include 'sidenav.php' ; ?>
<div id="content">
         
           
  <div class="distributor1">
   <?
             if($msg == 1)
             {
                echo'Last Record Inserted';
             }
      ?>  
    <form method="post" action="createUser.php">
    <input type="text" name="username" id="websiteURL"/>&nbsp;User Name
    <br />
    <br />
    <input type="text" name="password" id="websiteURL"/>&nbsp;Password
    <br />
    <br />
    <input type="text" name="landing" id="websiteURL"/>&nbsp;Landing Page
    <br />
    example: folderName/FileName.php
    <br />
    <input type="submit" value="Set New Training Group" />
    </form>
  </div>
          <!--end column2-->
  </div><!--end content-->
          <?php include 'footer.php' ; ?>
</div><!--end container-->

</body>
</html>
<? ob_end_flush(); ?>