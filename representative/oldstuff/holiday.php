<?php
	session_start();
	ob_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Welcome to GreatMoods</title>
<link href="../css/mainRecruitingStyles.css" rel="stylesheet" title="Set up your account" type="text/css" id="Set up your account" />
</head>

<body>
<div id="container">
  <?php include 'header.inc.php'; ?>
  <?php include '../navigation/leftSidebarNavRep.nav.php'; ?>
  <div id="content">
    <h1>Happy Happy Holidays</h1>
    <h3>Great Gift Items for Friends, Family, Business Customers & Clients</h3>
    <div>
	<a href="#"><img src="../images/BasketsProducts/happyholidays.png" width="276" height="365" alt="Happy Holidays"></a>
	<a href="#"><img src="../images/BasketsProducts/cocoacomforts.png" width="276" height="365" alt="Cocoa Comforts"></a>
	<a href="#"><img src="../images/BasketsProducts/frostytreats.png" width="276" height="365" alt="Frosty Treats"></a>
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