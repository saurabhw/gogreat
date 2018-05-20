<?php
	session_start();
	if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
	ob_start();
?>
<!DOCTYPE HTML>
<head>
<meta charset="UTF-8">
<title>GreatMoods Mall Opportunities | Representative</title>
<link rel="stylesheet" type="text/css" href="../css/mainRecruitingStyles.css">
<link rel="stylesheet" type="text/css" href="../css/header_styles.css">
<link rel="shortcut icon" href="../images/favicon.ico" >

<script>
$(document).ready(function() {
$(“.nav li:has(ul)”).hover(function(){
$(this).find(“ul”).slideDown();
}, function(){
$(this).find(“ul”).hide();
});
});
</script>

<!--  jQuery library-->
<script type="text/javascript" src="../../jquery/jquery-1.9.1.min.js"></script>
<!--  jCarousel library-->
<script type="text/javascript" src="../../jquery/jquery.jcarousel.min.js"></script>
<!--  jCarousel skin stylesheet-->
<link rel="stylesheet" type="text/css" href="../../css/skin.css" />

<script type="text/javascript">

jQuery(document).ready(function() {
    jQuery('#mycarousel').jcarousel({
      wrap: 'circular'
    });
});
</script>
</head>

<body>
<div id="container">
<?php include 'header.inc.php'; ?><br><br>
<?php include 'leftSidebarNavDistributor.php'; ?>
  
  <div id="content">
    <h1>The GreatMoods Mall</h1>
    <h3>Wonderful Fundraising Products and Gifts Year Round</h3>
    <div id="column1">
      <p>GreatMoods has a wonderful variety of Products and Gifts at our GreatMoods Mall for every season, reason and occasion. This makes for a perfect year-round Fundraiser because it offers the chance for people to order products for themselves or as gifts for others.</p>
      <p>The GreatMoods Mall has products that range from practical to silly, every day to elegant, delicious to indulgent and many of the Products and Gifts will be used for years to come.</p>
      <img src="../../images/rep-pages/productgrouping.png" width="389" height="306">
      <p>&nbsp;</p>
    </div>
    <!--end column1-->
    
    <div id="column2"> 
      <div class="slider">
      <ul id="mycarousel" class="jcarousel-skin-tango">
        <li><a href="coffeeCafe.php?group=37"><img src="../images/store1_slide.jpg" alt="Coffee Cafe" /></a></li>
        <li><a href="funFashion.php?group=37"><img src="../images/store2_slide.jpg" alt="Fun Fashion Boutique" /></a></li>
        <li><a href="jewelryGlitz.php?group=37"><img src="../images/store3_slide.jpg" alt="Jewelry Glitz and Glamour Store" /></a></li>
        <li><a href="salonSpa.php?group=37"><img src="../images/store4_slide.jpg" alt="Luxury Salon and Spa" /></a></li>
        <li><a href="sportsFitness.php?group=37"><img src="../images/store5_slide.jpg" alt="Varsity Sports & Fitness" /></a></li>
        <li><a href="funGames.php?group=37"><img src="../images/store7_slide.jpg" alt="Family Fun and Games Shop" /></a></li>
        <li><a href="bananasZoo.php?group=37"><img src="../images/store8_slide.jpg" alt="Going Bananas Zoo" /></a></li>
        <li><a href="creativeKids.php?group=37"><img src="../images/store9_slide.jpg" alt="Creative Kids Multi-Media Center" /></a></li>
        <li><a href="candyland.php?group=37"><img src="../images/store12_slide.jpg" alt="CandyLand" /></a></li>
        <li><a href="customerClient.php?group=37"><img src="../images/store16_slide.jpg" alt="Customer and Client Concierge Club" /></a></li>
        <li><a href="sweetBoutique.php?group=37"><img src="../images/store18_slide.jpg" alt="Romantically Sweet Boutique" /></a></li>
        <li><a href="inspirational.php?group=37"><img src="../images/store19_slide.jpg" alt="Inspirational, Motiviational and Success Treasures" /></a></li>
      </ul>
    </div>
    <p>&nbsp;</p>
	<h5>GreatMoods Mall Directory</h5>
	<ul>
		<li>Fun Fashion Boutique</li>
		<li>Jewelry, Glitz & Glamour Store</li>
		<li>Luxury Salon & Spa</li>
		<li>Varsity Sports & Fitness</li>
		<li>The Man Cave</li>
		<li>Romantically Sweet Boutique</li>
		<li>Purses, Pocketbooks & Pouches</li>
		<li>Inspirational, Motivational & Success Treasures</li>
		<li>Coffee Cafe</li>
		<li>Fun & Games Family Shop</li>
		<li>Going Bananas Zoo</li>
		<li>Creative Kids Multi-Media Center</li>
		<li>The Cookie Jar & Chocolate Factory</li>
		<li>CandyLand</li>
		<li>Barney’s Pet Shop</li>
		<li>Santa’s Workshop</li>
		<li>Customer & Client Concierge Club</li>
		<li>It’s Hot – Best Sellers</li>
		<li>For the Ages</li>
	</ul>
    </div>    <!--end column2--> 
  </div>  <!--end content-->
  
  <?php include 'footer.php' ; ?>
</div> <!--end container-->

</body>
</html>
<?php
ob_end_flush();
?>