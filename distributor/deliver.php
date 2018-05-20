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
<title>Mission | Representative</title>
<link rel="stylesheet" type="text/css" href="../css/mainRecruitingStyles.css">
<link rel="stylesheet" type="text/css" href="../css/header_styles.css">
<link rel="shortcut icon" href="../images/favicon.ico">

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
    <h1>We Deliver! </h1>
    <h3>The Ordering and Delivery Process</h3>
    <div id="column1">
	  <p>Ordering and Delivery is easy for your Friends & Family Members that are supporting your Fundraiser; they just need to do 2 simple steps. </p>
	  <p><b>Step 1</b> - Shop at the GreatMoods Mall, adding their product selections to their Shopping Cart.
</p>
	  <p><b>Step 2</b> - Check Out with PayPal and enter where they want everything delivered to.</p>
	  <p><b>Done!</b></p>
	  <p>GreatMoods delivers all Products or Gifts a week before the holiday or special occasion, year round.</p>
      </div> <!--end column1-->
    
    <div id="column2">
    <div>
    	<img src="../images/rep-pages/scouts.png" width="404" height="270" alt="Kiwanis Club">
	<img class="imgLeft" src="../images/rep-pages/lukeandfriends.png" width="198" height="166" alt="Young Girl">
	<img class="imgRight" src="../images/rep-pages/volleyball.png" width="198" height="166" alt="Boy with School Fundraiser">
    </div>

    </div> <!--end column2--> 
  </div>  <!--end content-->
  
  <?php include 'footer.php' ; ?>
</div> <!--end container-->

</body>
</html>
<?php
ob_end_flush();
?>