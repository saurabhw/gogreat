<?php
      include '../includes/autoload.php';
       
       if(!isset($_SESSION['authenticated']))
       {
          $groupID = $_GET['group'];  
       }
       else
       {
          $groupID = $_SESSION['groupid'];
       }
       
       $user = $_SESSION['userId'];
       $userName = $_SESSION['email'];
       $userID = $user;
       $query1 = "SELECT * FROM Dealers WHERE loginid='$groupID'";
       $result1 = mysqli_query($link, $query1)or die("MySQL ERROR query 1: ".mysqli_error($link));
       $row1 = mysqli_fetch_assoc($result1);
       $dealerID = $row1['loginid'];
       $club_type = $row1['DealerDir'];
       $group = $row1['setuppersonid']; 
       $myPic = $row1['contact_pic'];
       $goal = $row1['goal2'];
       $face = $row1['facebook'];
       $twit = $row1['twitter'];
       $so_far = getSoloSales($dealerID);
       $banner = $row1['banner_path'];
      
      
      $query3 = "SELECT * FROM orgMembers WHERE fundraiserID ='$groupID'";
      $result3 = mysqli_query($link, $query3) or die(mysqli_error($link));
      $row3 = mysqli_fetch_assoc($result3);
      $fn = $row3['orgFName'];
      $ln = $row3['orgLName'];
      $store = $_GET['storeid'];
      $table = "sample_websites";
      $query = "SELECT * FROM $table WHERE samplewebID = '$store'";
      $result = mysqli_query($link, $query) or die(mysqli_error($link));
      $row_count = mysqli_num_rows($result);
      if($row_count == '0'){
        //echo "<br>Sample Website Not Found.<br>";
      }else{
         $row = mysqli_fetch_assoc($result);
         $club_name = $row['sampleName'];
         $club = $row['club'];
         //$goal = $row['goal'];
         //$so_far = $goal*.2;
         $bb = $row['bannerPath'];
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
         
}
      
      
?>
<!DOCTYPE html>
<body>
<div id="container">
	<?php  ?>
	<?php
	if(isset($_SESSION['authenticated']) )
	{
	    include 'header_mall.php';
	    include 'memberSidebar_new.php';
	}
	else
	{
	   include 'header_sample3.php';
	   include 'memberSidebar3.php';
	}
	   
	?>
	
	<div id="content">
	
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

	<?php include 'footer(1).php' ; ?>

</div> <!--end container-->

</body>
</html>
<?php
ob_end_flush();
?>