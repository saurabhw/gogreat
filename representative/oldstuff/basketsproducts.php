<?php
	session_start();
	ob_start();
?>
<!DOCTYPE HTML>
<title>GreatMoods Gift Baskets</title>
<link href="../../css/mainRecruitingStyles.css" rel="stylesheet" title="Set up your account" type="text/css" id="Set up your account" />

<body>

<div id="container">
	<?php include '../rep/header.inc.php'; ?>
	<?php include '../rep/leftSidebarNavRep.php'; ?>
	<div id="content">
		<h1>Gift Baskets and Products</h1>
		<h3>Great Gift Items for Friends, Family, Business Customers and Clients</h3>
		<p>Click a category below to see our selection of Gift Baskets, Goodie Bags, and Boutique Scarves.</p>
    
		<div id="column1">
			<a href="coffee.php?groupid=<?php echo $groupid; ?>"><img src="../../images/BasketsProducts/coffee.png" width="425" height="240" alt="Coffee, Coffee, Coffee"></a>	
			<a href="familytimefun.php?groupid=<?php echo $groupid; ?>"><img src="../../images/BasketsProducts/familytimefun.png" width="425" height="240" alt="Family Time Fun"></a>
			<a href="summertimefun.php?groupid=<?php echo $groupid; ?>"><img src="../../images/BasketsProducts/summertimefun.png" width="425" height="240" alt="Summer Time Fun"></a>
			<a href="holiday.php?groupid=<?php echo $groupid; ?>"><img src="../../images/BasketsProducts/happyhappyholidays.png" width="425" height="240" alt="Happy Happy Holidays"></a>
		</div> <!--end column1-->
    
		<div id="column2">
			<a href="earlylearning.php?groupid=<?php echo $groupid; ?>"><img src="../../images/BasketsProducts/earlylearning.png" width="425" height="240" alt="Early Learning Color and Fun"></a>
			<a href="funfashion.php?groupid=<?php echo $groupid; ?>"><img src="../../images/BasketsProducts/funfashionboutique.png" width="425" height="240" alt="Fun Fashion Boutique"></a>
			<a href="sweetstreats.php?groupid=<?php echo $groupid; ?>"><img src="../../images/BasketsProducts/sweetsandtreats.png" width="425" height="240" alt="Sweets and Treats"></a>
			<a href="#"><img src="../../images/BasketsProducts/SpecialOccasions.png" width="425" height="240" alt="Special Occasions"></a>
		</div> <!--end column2--> 
		
	</div>  <!--end content-->
<?php include '../rep/footer.php' ; ?>
</div> <!--end container-->

</body>

<?php
ob_end_flush();
?>