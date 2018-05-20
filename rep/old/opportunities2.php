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
<link rel="stylesheet" type="text/css" href="../css/layout_styles.css">
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
  <?php include '../rep/header.inc.php'; ?>
  <?php include '../rep/leftSidebarNavRep.php'; ?>
  
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
	<h5>GreatMoods Mall Directory</h5>
	<ul>
		<li>Fun Fashion Boutique </li>
		<li>Jewelry, Glitz and Glamour Store </li>
		<li>Fitness & Fun Activewear</li>
		<li>Spring Into Summer Shop </li>
		<li>Trends </li>
		<li>Varsity Sports and Fitness </li>
		<li>The Man Cave</li>
		<li>Luxury Salon and Spa </li>
		<li>Romantically Sweet Boutique </li>
                <li>Purses, Pocketbooks and Pouches</li>
                <li>Inspirational, Motivational and Success Treasures </li>
		<li>Family Fun and Games </li>
		<li>Creative Kids Corner </li>
		<li>Baby & Toddler Treasures </li>
		<li>CandyLand </li>
		<li>Coffee Cafe </li>
		<li>Customer and Client Concierge Club </li>
		<li>It’s Hot – Best Sellers</li>
		<li>For the Ages</li>
		<li>The Cookie Jar (Coming Soon)</li>
		<li>The Chocolate Factory (Coming Soon) </li>
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