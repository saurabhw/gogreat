<?php
	session_start();
	ob_start();
?>

<!DOCTYPE HTML>
<title>Early Learning Color & Fun</title>
<link href="../../css/mainRecruitingStyles.css" rel="stylesheet" title="Set up your account" type="text/css" id="Set up your account" />

<body>
<div id="container">
  <?php include 'header.inc.php'; ?>
  <?php include '../navigation/leftSidebarNavRep.nav.php'; ?>
  <div id="content">
    <h1>Early Learning Color and Fun</h1>
    <h3>Great Gift Items for Friends and Family</h3>
    <div>
	<a href="#"><img src="../../images/BasketsProducts/kiddinaround.png" width="276" height="365" alt="Kiddin' Around"></a>
	<a href="#"><img src="../../images/BasketsProducts/playtimefun.png" width="276" height="365" alt="Playtime Fun"></a>
	<a href="#"><img src="../../images/BasketsProducts/abc123.png" width="276" height="365" alt="ABC's and 123's"></a>
    </div>
    
  </div> <!--end content-->
  <?php include 'footer.php' ; ?>
</div> <!--end container-->

</body>

<?php
ob_end_flush();
?>