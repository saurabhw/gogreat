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
    <h1>Welcome to GreatMoods!</h1>
    <p>&nbsp;</p>
    <div id="column1">
      <p>New quality opportunities in the fundraising industry are hard to come by in this very difficult economy and that’s why the GreatMoods Program will be a very pleasant surprise for you.</p>
      <p>Please take 10 to 15 minutes to go through our presentation and evaluate the GreatMoods Program and Product Line; it will be worth your time to evaluate the financial opportunity.</p>
      <div id="leadBox">
        <div id="infoText">
          <div id="redBar1">
            <h3>About GreatMoods<br>Fundraising</h3>
          </div>
          <!--end redBar1-->
          <ul>
		<li><a href="basketsproducts.php">Who is GreatMoods</a></li>
		<li><a href="basketsproducts.php">What is the GreatMoods Program</a></li>
		<li><a href="basketsproducts.php">GreatMoods Product Line</a></li>
		<li><a href="basketsproducts.php">How Much Can I Raise</a></li>
		<li><a href="basketsproducts.php">$ign up and $tart today</a></li>
		 </ul>
        </div>
        <!--end infoText--> 
      </div>
      <!--end leadBox-->
      
      
    <!--end column1-->
    </div>
    <div id="column2">
    <div><br>
    	<img src="../../images/home/classtrip.png" width="404" height="270" alt="High School Class Trip">
	<img class="imgLeft" src="../../images/home/ymca.png" width="198" height="166" alt="YMCA Fundraiser">
	<img class="imgRight" src="../../images/home/classtrip2.png" width="198" height="166" alt="Elementary Class Trip">
    </div>
    

      
      
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