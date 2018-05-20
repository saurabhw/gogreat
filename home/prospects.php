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
    <h1>Prospective Fundraising Customers</h1>
    
    <div id="column1">
      <p>GreatMoods has a wonderful variety of Gift Baskets for every special occasion and type of Fundraiser. This makes for a perfect year-round Fundraiser because supporters can send them as gifts to friends, family members, business customers and clients. </p>
      <p>The opportunities to Fundraise are not limited to online consumers.  By using the form below Clubs, Teams and Organizations can still raise funds the “old fashioned way” door-to-door, or with a Fundraising Booth but process the orders with a Cell Phone or Laptop as you go.</p>
      <p>There are 3 to 4 major Gift Basket seasons each year, starting with the Fall Holidays as displayed. </p>
      <div id="leadBox">
        <div id="infoText">
          <div id="redBar1">
            <h4>Gift Baskets Make Great Gifts Year-Round</h4>
          </div>
          <!--end redBar1-->
          <ul>
          <li><a href="basketsproducts.php">Fall & Holiday Gift Baskets</a><br>(Thanksgiving, Hanukkah, Christmas)</li>
<li><a href="basketsproducts.php">Start the New Year with…</a><br>(Valentine’s Day, Easter, Mother’s Day,<br>Father’s Day & Graduation)</li>
<li><a href="basketsproducts.php">Special Occasions Coming Soon</a><br>(Birthday, Anniversary, Baby & Wedding Showers)</li>
<li><a href="basketsproducts.php">Themes</a><br>(Coffee, Spa, Christian, Children’s &<br>Our New Fun Fashion Boutique)</li>
<li><a href="basketsproducts.php">Seasonal</a><br>(Picnic, Friend & Family Game Night<br>& Sports Themed)</li>
<li><a href="basketsproducts.php">Business Gift Baskets</a></li>
	</ul>
        </div>
        <!--end infoText--> 
      </div>
      <!--end leadBox-->
      </div>
    <!--end column1-->
    
    <div id="column2">
    <div>
    	<img src="../../images/rep-pages/kiwanis1.png" width="404" height="270" alt="Kiwanis Club">
	<img class="imgLeft" src="../../images/rep-pages/girlyoung2.png" width="198" height="166" alt="Young Girl">
	<img class="imgRight" src="../../images/rep-pages/kicks4kids.png" width="198" height="166" alt="Boy with School Fundraiser">
    </div>
    <div id="pcaption">GreatMoods offers fundraising opportunities for schools, religious organizations, community organizations, and more. </div>
	<p>Gifts Baskets are a great Fundraising Product and with price points for everyone to be able to ship year-round. You can’t ship cookie dough or $1.00 chocolate bars; a door-to-door selling is dying for the safety of children. Online year-round Fundraising is the future with our Free Website Fundraising GreatMoods Program.</p>
	<p>GreatMoods delivers every Gift Basket to the address the customer indicated, so there is no handling of the product by your Fundraising team.</p>
	<p>All ordering is done online at the Student/Member’s Free Fundraising Website using PayPal. All Cash is distributed next day, 24/7/365 days a year. Online Fundraising just can’t get any better than with our GreatMoods Gift Basket Program.</p>
	
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