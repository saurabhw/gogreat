<?php
	session_start();
	ob_start();
?>

<!DOCTYPE HTML>
<head>
	<title>GreatMoods Mission</title>
</head>

<body>
<div id="container">
  <?php include 'includes/header.inc.php'; ?>
  <?php include 'navigation/fullSidebar_home.php'; ?>
  
  <div id="content">    
	<h1>GreatMoods Mission</h1>
		
	<div id="column1">
		<h3><br>Achieving Success for Your Goals!</h3>
		<br>
		<p><b>Great Moods Team Purpose: </b></p>
		<p><b>Be Kind</b> – to those in need of help</p>
		<p><b>Do Good</b> – for Individuals, Groups, Organizations and Communities</p>
		<p><b>Achieve Happiness & Success</b> – for every Goal, Vision, Dream or Mission</p>
	</div> <!--end column1-->
	
	<div id="column2">
		<img src="../images/rep-pages/diversegroup.jpg" width="404" height="270" alt="Diverse Group of Adults">
		<img class="imgLeft" src="../images/rep-pages/boychild_sm.jpg" width="198" height="166" alt="Young Boy">
		<img class="imgRight" src="../images/rep-pages/teenagegirl_sm.jpg" width="198" height="166" alt="Teenage Girl">
		<img class="imgRight" src="http://www.jameslawrencecompany.com/images/98166.jpg" width="198" height="166" alt="Hello">
		
	</div> <!--end column2--> 
  </div>  <!--end content-->
  
  <?php include 'footer.php' ; ?>
</div><!--end container-->

</body>

<?php
ob_end_flush();
?>