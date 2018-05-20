<?php
	session_start();
	ob_start();
?>

<!DOCTYPE HTML>
<head>
	<title>OOPS!</title>
</head>

<body>
  <?php include 'includes/header.inc.php'; ?>
<!--<?php include 'navigation/leftSidebarNavHomepage.nav.php'; ?>-->
   <?php include 'navigation/fullSidebar_home.php'; ?>
  <div class="container">

  	<div id="column1">
		<h1>OOPS!</h1>
		<h3>We can't seem to find the page you're looking for.</h3>
		
		<br>
		
		<h5>No need to worry, we can help you find your way again.</h5>
		<p>Check out the links to the left to learn more about GreatMoods!</p>
		
		<br>
		
		<h5>Quick Links:</h5>
			     	
		<div>
			<a href="https://www.greatmoods.com/index.php"><input type="button" class="medredbutton" value="GreatMoods Homepage"></a>
			<a href="https://www.greatmoods.com/gm_programoverview.php"><input type="button" class="medredbutton" value="GreatMoods Program Overview"></a>
			<a href="https://www.greatmoods.com/gettingstarted_sendemail.php"><input type="button" class="medredbutton" value="Getting Started"></a>			
		</div>
		
		<br>
	</div> <!-- end column1 -->

</div><!--end container-->
</div>
  <?php include 'footer.php' ; ?>
</body>
</html>
<?php
ob_end_flush();
?>