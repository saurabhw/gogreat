<?php
	session_start();
	ob_start();
?>

<!DOCTYPE HTML>
<title>Coffee, Coffee, Coffee</title>
<link href="../css/mainRecruitingStyles.css" rel="stylesheet" title="Set up your account" type="text/css" id="Set up your account" />

<body>
<div id="container">
  <?php include 'header.inc.php'; ?>
  <?php include 'leftSidebarNavRep.php'; ?>
  <div id="content">
    <h1>Coffee, Coffee, Coffee</h1>
    <h3>Great Gift Items for Friends, Family, Business Customers & Clients</h3>
    <div>
	<a href="#"><img src="../../images/BasketsProducts/earlytorise.png" width="552" height="365" alt="Early to Rise"></a>
	<a href="#"><img src="../../images/BasketsProducts/coffeecafe.png" width="276" height="365" alt="Coffee Cafe"></a>
    </div>
    <div>
	<a href="#"><img src="../../images/BasketsProducts/coffeecomfort.png" width="276" height="365" alt="Coffee Comfort"></a>
	<a href="#"><img src="../../images/BasketsProducts/amomentformom.png" width="276" height="365" alt="A Moment For Mom"></a>
	<a href="#"><img src="../../images/BasketsProducts/morningexpress.png" width="276" height="365" alt="Morning Express"></a>
    </div>
    
  </div> <!--end content-->
  <?php include 'footer.php' ; ?>
</div> <!--end container-->

</body>

<?php
ob_end_flush();
?>