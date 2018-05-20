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
<title>Mission | Distributor</title>
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
</head>

<body>
<div id="container">
<?php include 'header.inc.php'; ?><br><br>
<?php include 'leftSidebarNavDistributor.php'; ?>
  
  <div id="content">
    <h1>GreatMoods Mission</h1>
    <h3>Helping You Achieve Success for Your Goals</h3>
    <br><br>
    
    <div id="column1">
      <p><b>Be Kind</b> – to those in need of help</p>
      <p><b>Do Good</b> – for Individuals, Groups, Organizations and Communities</p>
      <p><b>Achieve Happiness & Success</b> – for every Goal, Vision, Dream or Mission</p>
    </div> <!--end column1-->
    
    <div id="column2">
    <div>
    	<img src="../images/rep-pages/diversegroup.jpg" width="404" height="270" alt="Diverse Group of Adults">
	<img class="imgLeft" src="../images/rep-pages/boychild_sm.jpg" width="198" height="166" alt="Young Boy">
	<img class="imgRight" src="../images/rep-pages/teenagegirl_sm.jpg" width="198" height="166" alt="Teenage Girl">
    </div>
	</div> <!--end column2--> 
  </div>  <!--end content-->
  
  <?php include 'footer.php' ; ?>
</div><!--end container-->

</body>

<?php
ob_end_flush();
?>