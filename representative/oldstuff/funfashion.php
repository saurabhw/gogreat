<?php
	session_start();
	ob_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Welcome to GreatMoods</title>
<link href="../../css/mainRecruitingStyles.css" rel="stylesheet" title="Set up your account" type="text/css" id="Set up your account" />
</head>

<body>
<div id="container">
  <?php include 'header.inc.php'; ?>
  <?php include '../navigation/leftSidebarNavRep.nav.php'; ?>
  <div id="content">
    <h1>Fun Fashion Boutique</h1>
    <h3>Great Gift Items for Friends, Family, Business Customers & Clients</h3>
    <div>
    	<h5>Designer Collection</h5>
	<a href="#"><img src="../../images/BasketsProducts/fleurdelisstyle.png" width="276" height="365" alt="Fleur-de-lis Style"></a>
	<a href="#"><img src="../../images/BasketsProducts/violetruffles.png" width="276" height="365" alt="Violet Ruffles"></a>
	<a href="#"><img src="../../images/BasketsProducts/spotsandstripes.png" width="276" height="365" alt="Stand Out with Spots & Stripes"></a>
    </div>
    <div>
    	<h5>Whimsically Fun Scarves</h5>
	<a href="#"><img src="../../images/BasketsProducts/redcheckered.png" width="276" height="365" alt="Red Checkered Fun"></a>
	<a href="#"><img src="../../images/BasketsProducts/springstripes.png" width="276" height="365" alt="Spring Stripes"></a>
	<a href="#"><img src="../../images/BasketsProducts/80throwback.png" width="276" height="365" alt="80's Throwback"></a>
    </div>
    
  </div>
  <!--end content-->
  <?php include 'footer.php' ; ?>
</div>
<!--end container-->

</body>
</html>
<?php
ob_end_flush();
?>