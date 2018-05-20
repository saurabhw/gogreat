<?php
      session_start();
      ob_start();
      define("SITE_ROOT",$_SERVER["DOCUMENT_ROOT"].'/salesTest/');
      include("includes/connection.inc.php");
      $link = connectTo();
      $groupID = $_GET['group'];
      $table = "sample_websites";
      $query = "SELECT * FROM $table WHERE samplewebID = $groupID";
      $result = mysqli_query($link, $query) or die(mysqli_error());
      $row_count = mysqli_num_rows($result);
      if($row_count == '0'){
        echo "<br />Sample Website Not Found.<br />";
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
?>

<!DOCTYPE html>
<head>
	<title>Getting Started | The GreatMoods Mall</title>
</head>

<body>
<div id="container">
<?php include 'includes/header_sample.php'; ?>
<?php include 'navigation/leftnavSampleGettingStarted.php'; ?>

 <div id="contentSample">
	<h1>The GreatMoods Mall</h1>
	<h3>Wonderful Fundraising Products and Gifts Year Round</h3>
	
	<div id="column1b">
		<p>GreatMoods has a wonderful variety of Products and Gifts at our GreatMoods Mall for every season, reason and occasion. This makes for a perfect year-round Fundraiser because it offers the chance for people to order products for themselves or as gifts for others.</p>
		<p>The GreatMoods Mall has 20,000+ products that range from practical to silly, every day to elegant, delicious to indulgent and many of the Products and Gifts will be used for years to come.</p>
		<img src="../images/gm_mallproductsgifts.jpg" alt="collage" style="width: 100%;">
		<p>&nbsp;</p>
	</div> <!--end column1b-->
	
	<div id="column2b"> 
		<div id="leadBox">
			<div id="infoText">
				<div id="redBar1">
					<h3>GreatMoods Mall Directory</h3>
				</div> <!--end redBar1-->
				
				<ul>
					<li>Multiple Fashion Boutiques</li>
					<li>Jewelry, Glitz & Glamour Accessories</li>
					<li>Activewear, Athleisure & Fitness Apparel</li>
					<li>Spring & Summer Fashions</li>
					<li>Trends Clothing for All Ages & Sizes</li>
					<li>Varsity Sports & Fitness Gear</li>
					<!--<li>The Man Cave</li> -->
					<li>Luxury Salon & Spa Products</li>
					<li>Cute PJ's & Bathrobes</li>
					<li>Romantically Sweet Boutique's</li>
					<li>Purses, Pocketbooks & Pouches</li>
					<li>Briefcases, Luggage & Tech Cases</li>
					<li>Inspirational & Motivational Treasures</li>
					<li>Family Fun & Games</li>
					<li>Creative Kids Toys</li>
					<li>Baby & Toddler Treasures</li>
					<!--<li>CandyLand</li> -->
					<li>Chocolates, Cookies & our Coffee Cafe</li>
					<li>Customer & Client Concierge Club Gifts</li>
					<li>Great Brand Names</li>
					<li>Gameday Collection of College & Pro Gear</li>
					<li>100+ Stores or over 20,000+ Products</li>
					<!--<li>It’s Hot – Best Sellers</li>
					<li>For the Ages</li>
					<li>The Cookie Jar (Coming Soon)</li>
					<li>The Chocolate Factory (Coming Soon)</li> -->
				</ul>
			</div> <!--end infoText--> 
		</div> <!--end leadBox-->
	</div>    <!--end column2b--> 
    </div> <!-- end column 2 -->

  </div>  <!--end content-->

  <?php include 'footer.php' ; ?>
</div> <!--end container-->
</body>
</html>
<?php
   ob_end_flush();
?>