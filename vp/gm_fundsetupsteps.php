<?php
   include '../includes/autoload.php';
    if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "VP")
       {
            header('Location: ../index.php');
            exit;
       }
       if($_SESSION['freeze'] == "TRUE")
       {
          // echo "Account Frozen";
           header('Location: accountEdit.php');
       }
  
   $userID = $_SESSION['userId'];
   $query = "SELECT * FROM user_info WHERE userInfoID='$userID' and role='VP'";
   $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error());
   $row = mysqli_fetch_assoc($result);
   $pic = $row['picPath'];

?>
<!DOCTYPE html>
<head>
	<title>GreatMoods | VP</title>
</head>

<body>
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <?php include 'sidenav.php' ; ?>

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