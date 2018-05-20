<?php
      include '../includes/autoload.php';
      $groupID = $_GET['group'];
      $store = $_GET['storeid'];
      $where = $_SERVER['REQUEST_URI'];
	  
      $table = "sample_websites";
      $query = "SELECT * FROM $table WHERE samplewebID = '$groupID'";
      $result = mysqli_query($link, $query) or die(mysqli_error($link));
      $row_count = mysqli_num_rows($result);
      if($row_count == '0'){
        //echo "<br>Sample Website Not Found.<br>";
      }else{
         $row = mysqli_fetch_assoc($result);
         $club_name = $row['sampleName'];
         $club = $row['club'];
         $goal = $row['goal'];
         $so_far = $goal*.2;
         $banner_path = $row['bannerPath'];
         $position = $row['samplePosition'];
         $leader = $row['sampleFname'].' '.$row['sampleLname'];
         $phone = $row['samplePhone'];
         $group_email = $row['sampleGroupEmail'];
         $contact_photo = $row['contact_group_photo'];
         $group_photo = $row['groupPhoto'];
         $leader_photo = $row['group_leader'];
         $student_photo = $row['student_leaders'];
         $reasons = $row['sampleReasons'];
         $student_leader_name = $row['student_leader'];
         $student_name = $row['student_name'];
         if($row['sampleTitle']==''){
           $title = $club;
         }else{
           $title = $row['sampleTitle'];
         }
      }
      
   $userID = $_SESSION['userId'];
   $query = "SELECT * FROM user_info WHERE userInfoID='$userID'";
   $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysqli_error($link));
   $row = mysqli_fetch_assoc($result);
   $pic = $row['picPath'];
?>

<!DOCTYPE HTML>
<head>
	<title>GreatMoods Mall</title>
</head>

<body>
<div id="container">
	<?php include 'header_sample.php'; ?> 
	<?php include 'sideLeftNav2.php' ; ?>
	
	<div id="contentSample">
		<h1 style="display:inline-block;">GreatMoods Mall</h1>
		<div id="searchbar"> <script type="text/javascript" src="https://app.ecwid.com/script.js?9012020" charset="utf-8"></script> <script type="text/javascript"> xSearch("id=my-search-9012020"); </script> </div>
		
		<div>
			<script type="text/javascript" src="https://app.ecwid.com/script.js?9012020"></script>
			<script type="text/javascript"> xMinicart("style=","layout=floating", "title=Click and drag to move"); </script>
		</div>
		
		<!-- Product Browser Widget -->
		<div id="my-store-9012020"></div>
		<div>
			<script type="text/javascript" src="https://app.ecwid.com/script.js?9012020&data_platform=code&data_date=2016-03-17" charset="utf-8"></script>
			<script type="text/javascript">xAffiliate('<?php echo $groupID; ?>'); </script>
			<script type="text/javascript"> xProductBrowser("categoriesPerRow=4","views=grid(4,3) list(10) table(20)","categoryView=grid","searchView=list","id=my-store-9012020");</script>
		</div>
		<!-- END Product Browser Widget -->
	
	
	</div> <!--end content-->

	<!-- footer include deleted. add back later -->
<?php include 'footer.php' ; ?>
</div> <!--end container-->

</body>
</html>
<?php
ob_end_flush();
?>