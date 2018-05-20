<?php
session_start();
ob_start();
$groupid = $_GET['groupid'];
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
  <?php include 'includes/header.inc.php'; ?>
  <?php include 'navigation/leftSidebarNavHomepage.nav.php'; ?>
  <div id="content">
    <h1>Hopping into Spring</h1>
    <h3>Great Gift Items for Friends, Family, Business Customers and Clients</h3>
    <div>
	<a href="product.php?prodid=11&groupid=<? echo $groupid;?>"><img src="../../images/BasketsProducts/happyeaster.png" width="276" height="365" alt="Happy Easter"></a>
	<a href="product.php?prodid=12&groupid=<? echo $groupid;?>"><img src="../../images/BasketsProducts/hoppingintoeaster.png" width="276" height="365" alt="Hopping into Easter"></a>
	<a href="product.php?prodid=13&groupid=<? echo $groupid;?>"><img src="../../images/BasketsProducts/eastertreats.png" width="276" height="365" alt="Easter Treats and Color Time Fun"></a>
    <!--end column1-->
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