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
  <?php include 'header.php'; ?>
  <?php include 'sidenav.php'; ?>
  <div id="content">
    <h1>Fall & Holiday</h1>
    <h3>Great Gift Items for Friends, Family, Business Customers & Clients</h3>
    <p>Click a Gift Basket, Goodie Bag, or Boutique Scarf for more information.</p>
    <div>
	<img src="../../images/BasketsProducts/basket-cabin.png" width="275" height="275" alt="At the Cabin">
	<img src="../../images/BasketsProducts/basket-classic.png" width="275" height="275" alt="Classic Comforts">
	<img src="../../images/BasketsProducts/basket-coffeebreak.png" width="275" height="275" alt="Coffee Break">
    </div>

    <div>
    	<img src="../../images/BasketsProducts/bag-coffeecafe.png" width="275" height="275" alt="Coffee Cafe">
    	<img src="../../images/BasketsProducts/bag-coffeecomfort.png" width="275" height="275" alt="Coffee Comfort">
    	<img src="../../images/BasketsProducts/basket-coffeetime.png" width="275" height="275" alt="Coffee Time">
    	
    </div>
	<img src="../../images/BasketsProducts/basket-earlyrise.png" width="275" height="275" alt="Early Rise">
    	<img src="../../images/BasketsProducts/basket-frosty.png" width="275" height="275" alt="Frosty Treats">
    <div>
    	
    
  </div>
  <!--end content-->
  <?php include '../footer.php' ; ?>
</div>
<!--end container-->

</body>
</html>
<?php
ob_end_flush();
?>