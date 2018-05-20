<?php
	session_start();
	ob_start();
?>

<!DOCTYPE HTML>
<head>
	<title>GreatMoods Mission</title>
</head>

<body>
  <?php include 'includes/header.inc.php'; ?>
<!--<?php include 'navigation/leftSidebarNavHomepage.nav.php'; ?>-->
   <?php include 'navigation/fullSidebar_home.php'; ?>
  <div class="container">
<div class="row"> 
     	<div class="col-md-6 col-md-offset-0 col-xs-offset-1">
	<h1>GreatMoods Mission</h1>	
		<h3><br>Achieving Success for Your Goals!</h3>
		<p><b>Great Moods Team Purpose:</b></p>
		<p><b>Be Kind</b> – to those in need of help</p>
		<p><b>Do Good</b> – for Individuals, Groups, Organizations and Communities</p>
		<p><b>Achieve Happiness & Success</b> – for every Goal, Vision, Dream or Mission</p>
	</div> <!--end column1-->
        <div class="col-md-5  col-md-offset-1" id="" style="margin-top: 2em;">	
    	    <div class="row" style="margin-top: 2em;">
                <div class="col-md-12">
		<img class="img-responsive center-block" src="../images/rep-pages/diversegroup.jpg" width="404" height="270" alt="Diverse Group of Adults"><br>
	</div>
        </div>
	<div class="row row-centered">
        <div class ="center-block">
		<div class="col-xs-6 "><img class="imgLeft" src="../images/rep-pages/boychild_sm.jpg" width="198" height="166" alt="Young Boy"></div>
		<div class="col-xs-6 "><img class="imgRight" src="../images/rep-pages/teenagegirl_sm.jpg" width="198" height="166" alt="Teenage Girl"></div>
		<div style="margin-top: 1em;" class="col-xs-9 "><img class="imgRight" src="http://www.jameslawrencecompany.com/images/98166.jpg" width="198" height="166" alt="Hello"></div>
	</div>
	</div> <!--end column2--> 
  </div>  <!--end content-->  
</div><!--end container-->
</div>
  <?php include 'footer.php' ; ?>
</body>
</html>
<?php
ob_end_flush();
?>