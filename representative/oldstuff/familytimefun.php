<?php
	session_start();
	ob_start();
?>

<!DOCTYPE HTML>
<title>Family Time Fun Gift Baskets</title>
<link href="../../css/mainRecruitingStyles.css" rel="stylesheet" title="Set up your account" type="text/css" id="Set up your account" />

<body>
<div id="container">
  <?php include 'header.inc.php'; ?>
  <?php include '../navigation/leftSidebarNavRep.nav.php'; ?>
  <div id="content">
    <h1>Family Time Fun</h1>
    <h3>Great Gift Items for Friends and Family</h3>
    
    <div>
	<a href="#"><img src="../../images/BasketsProducts/sportsspectacular.png" width="276" height="365" alt="Sports Spectacular"></a>
	<a href="#"><img src="../../images/BasketsProducts/gamenight.png" width="276" height="365" alt="Game Night"></a>
	<a href="#"><img src="../../images/BasketsProducts/atthecabin.png" width="276" height="365" alt="At the Cabin"></a>
    </div>
    
  </div>  <!--end content-->
  <?php include 'footer.php' ; ?>
</div><!--end container-->

</body>

<?php
ob_end_flush();
?>