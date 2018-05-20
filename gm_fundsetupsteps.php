<?php
	session_start();
	ob_start();
?>

<!DOCTYPE html>
<head>
	<title>GreatMoods Checklist</title>
</head>

<body>
<div id="container">
      	<?php include 'includes/header.inc.php'; ?>
  	<?php include 'navigation/leftSidebarNavHomepage.nav.php'; ?>

      <div id="content">
          <div class="presentation">
		<div id="slider">
			<div><img src="../images/presentation/rp-fl_checklist-1.jpg" alt="slide 1"></div>
			<div><img src="../images/presentation/rp-fl_checklist-2.jpg" alt="slide 2"></div>
			<div><img src="../images/presentation/rp-fl_checklist-3.jpg" alt="slide 3"></div>
			<div><img src="../images/presentation/rp-fl_checklist-4.jpg" alt="slide 4"></div>
			<div><img src="../images/presentation/rp-fl_checklist-5.jpg" alt="slide 5"></div>
			<div><img src="../images/presentation/rp-fl_checklist-6.jpg" alt="slide 6"></div>
			<div><img src="../images/presentation/rp-fl_checklist-7.jpg" alt="slide 7"></div>
			<div><img src="../images/presentation/rp-fl_checklist-8.jpg" alt="slide 8"></div>
			<div><img src="../images/presentation/rp-fl_checklist-9.jpg" alt="slide 9"></div>
			<div><img src="../images/presentation/rp-fl_checklist-10.jpg" alt="slide 10"></div>
			<div><img src="../images/presentation/rp-fl_checklist-11.jpg" alt="slide 11"></div>
			<div><img src="../images/presentation/rp-fl_checklist-12.jpg" alt="slide 12"></div>
		</div> <!-- end slider -->
	</div> <!-- end presentation -->
  </div> <!--end content -->
  
      <?php include 'footer.php' ; ?>   
</div> <!--end container-->

</body>
</html>

<?php
   ob_end_flush();
?>