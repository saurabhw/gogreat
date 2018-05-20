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
  <?php include 'leftSidebarNavHomepage.php'; ?>
  <div id="content">
    <h1>Gift Baskets & Products</h1>
    <h3>Great Gift Items for Friends, Family, Business Customers & Clients</h3>
    <p>Click a category below to see our selection of Gift Baskets, Goodie Bags, & Boutique Scarves.</p>
    <div id="column1">
	<a href="newyear.php"><img src="../../images/BasketsProducts/StartNewYear.png" width="425" height="485" alt="Start the New Year With..."></a>
	<a href="seasonal.php"><img src="../../images/BasketsProducts/Seasonal.png" width="425" height="240" alt="Seasonal"></a>
    <!--end column1-->
    </div>
    
    <div id="column2">
    <div>
    	<a href="fallholiday.php"><img src="../../images/BasketsProducts/FallHoliday.png" width="425" height="240" alt="Fall & Holiday"></a>
    	<a href="themes.php"><img src="../../images/BasketsProducts/Themes.png" width="425" height="240" alt="Themes"></a>
    	<a href="#"><img src="../../images/BasketsProducts/SpecialOccasions.png" width="425" height="240" alt="Special Occasions: Coming Soon!"></a>
    </div>
    </div>
    <!--end column2--> 
    
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