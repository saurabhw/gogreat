<?php
	session_start();
	ob_start();
?>

<!DOCTYPE HTML>
<title>Summer Time Fun Gift Baskets</title>
<link href="../../css/mainRecruitingStyles.css" rel="stylesheet" title="Set up your account" type="text/css" id="Set up your account" />

<body>
<div id="container">
  <?php include 'header.inc.php'; ?>
  <?php include '../navigation/leftSidebarNavRep.nav.php'; ?>
  <div id="content">
    <h1>Summer Time Fun</h1>
    <h3>Great Gift Items for Friends and Family</h3>
    <div>
	<a href="#"><img src="../../images/BasketsProducts/funinthesun.png" width="276" height="365" alt="Fun in the Sun"></a>
	<a href="#"><img src="../../images/BasketsProducts/wetandwild.png" width="276" height="365" alt="Wet & Wild"></a>
	<a href="#"><img src="../../images/BasketsProducts/beagoodsport.png" width="276" height="365" alt="Be A Good Sport"></a>
    </div>
    
  </div> <!--end content-->
  <?php include 'footer.php' ; ?>
</div> <!--end container-->

</body>

<?php
ob_end_flush();
?>