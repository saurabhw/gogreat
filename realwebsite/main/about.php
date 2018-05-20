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
    <h1>Who is Greatmoods?</h1>
    <h3>About Us</h3>
    <div id="column1">
      <p>GreatMoods is a Company that creates consumer related Programs and Products for all of today’s Fundraising needs.</p>
      <p>Fundraising is about to change forever, from door to door sales to Online Fundraising.  Today’s Facebook generation want convenience and will select any online program, app or product, if they can do it in a matter of minutes from home and benefit just as much.</p>
      <p>The GreatMoods program offers Free Personalized Fundraising Websites for every School, Church or Organization. In addition every individual student or member in those clubs and teams also receives a Free Personalized Fundraising Website.</p>
     <h5>Multiple Fundraising<br>Opportunities Each Year!</h5>
      <ul>
        <li>3 to 4 large revenue generating Fundraisers will happen every year, at every account you set up — forever, with the GreatMoods Program!</li>
        <li>Fall time is great with Thanksgiving/Holiday/Christmas Gift Baskets, then after January 1 it’s even better,<br>with Valentine’s Day, Easter and Mother’s Day<br>Gift Baskets.</li>
      </ul>
      <p>GreatMoods Gift Baskets contain national brand chocolate bars, cookies, candy, candles and coffee. IPod downloadable music and lifestyle DVDs will be components of most Gift Baskets. Almost every product line you currently sell is a component in our GreatMoods Gift Baskets, wrapped up nicely with a bow.</p>
      <img class="imgLeft" src="../../images/rep-pages/holidaybaskets2.png" width="387" height="270" alt="3 Baskets">
      
      <p>&nbsp;</p>
    </div>
    <!--end column1-->
    
    <div id="column2"> <img src="../../images/rep-pages/cancerwalk.png" width="404" height="270" alt=American Cancer Society Walk>
    <div id="pcaption">Raising funds is easy for all organizations with the GreatMoods Program. </div>
      <h5>Order Processing and Delivery is Easy!</h5>
      <p>PayPal is the order processing system that we use at every individual website to process every order and ship every Gift Basket straight to the customer/recipient.  PayPal is the most trusted and fraud proof online ordering system for the consumer market today on the Internet.  There is never a need for you or your accounts to process an order, collect cash, or deliver a single product. </p>
      <p>The days of arranging delivery/distribution of product at the school or church are done forever for both you at the school or church and all the parents having to deliver all this stuff with their children door-to-door after they pick it up from the school.  </p>
      <h5>Cash Next Day!</h5>
      <p>Best of all, you and your accounts will receive cash next day on every Gift Basket sold deposited into your PayPal account next day. </p>
    </div>
    <!--end column2--> 
    
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