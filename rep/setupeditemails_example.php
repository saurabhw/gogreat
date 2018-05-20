<?php
	session_start();
	if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
	ob_start();
?>

  <?php include 'header.inc.php'; ?>
  <?php include 'leftSidebarNavRep.php'; ?>

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