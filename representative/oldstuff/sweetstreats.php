<?php
	session_start();
	ob_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Welcome to GreatMoods</title>
<link href="../../css/mainRecruitingStyles.css" rel="stylesheet" title="Set up your account" type="text/css" id="Set up your account" />
</head>

<body>
<div id="container">
  <?php include 'header.inc.php'; ?>
  <?php include '../navigation/leftSidebarNavRep.nav.php'; ?>
  <div id="content">
    <h1>Sweets & Treats</h1>
    <h3>Great Gift Items for Friends, Family, Business Customers & Clients</h3>
    <div>
	<a href="#"><img src="../../images/BasketsProducts/movietime.png" width="552" height="365" alt="Movie Time"></a>
	<a href="#"><img src="../../images/BasketsProducts/celebrate.png" width="276" height="365" alt="Celebrate"></a>
    </div>
    <div>
	<a href="#"><img src="../../images/BasketsProducts/movietimegrabbag.png" width="276" height="365" alt="Movie Time Grab Bag"></a>
	<a href="#"><img src="../../images/BasketsProducts/congratstoyou.png" width="276" height="365" alt="Congrats To You"></a>
	<a href="#"><img src="../../images/BasketsProducts/sweetstreats.png" width="276" height="365" alt="Sweets & Treats"></a>
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