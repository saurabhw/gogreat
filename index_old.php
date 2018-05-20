<?php
	session_start();
	ob_start();
?>

<!DOCTYPE HTML>
<head>
	<title>GreatMoods Homepage</title>
</head>

<body>
<div id="container">
  <?php include 'includes/header.inc.php'; ?>
  <?php include 'navigation/leftSidebarNavHomepage.nav.php'; ?>
  
  <div id="contentSample">
    	<div id="column1">
		<h3 class="sample">My Fundraiser</h3>
    		
    		<div id="sliderFrame" class="grpcollage">
		        <div id="marketingSlider">
		            	<img src="images/sliders/mainslider1.jpg" alt="Sign Up Your Group and Start Fundraising Today!">
		            	<img src="images/sliders/mainslider2.jpg" alt="How Our Fundraising Program Works">
				<img src="images/sliders/mainslider3.jpg" alt="Example of Free Member Fundraising Website">
				<img src="images/sliders/mainslider4.jpg" alt="Great Fundraising Products at the GreatMoods Mall">
				<img src="images/sliders/mainslider5.jpg" alt="Fundraising Products You  Really Want">
				<img src="images/sliders/mainslider6.jpg" alt="35% of Every Purchase is Yours!">
				<img src="images/sliders/mainslider7.jpg" alt="We Deliver Everything!">
				<a href="gettingstarted_sendemail.php"><img src="images/sliders/mainslider8.jpg" alt="3 Easy Steps To Sign Up & Start Today!"></a>
		        </div>
		        <div id="sliderNavbar">
		            <a onclick="imageSlider.previous()" class="group2-Prev"></a>
		            <a id='auto' onclick="switchAutoAdvance()"></a>
		            <a onclick="imageSlider.next()" class="group2-Next"></a>
		        </div>
		</div> <!-- end sliderFrame -->
	
		<div class="reasonsbox">
	        	<h5 id="reasons">Reasons for My Fundraiser</h5>
	        	<div id ="reasoncontent"> 
	          		<ul>
	          			<li>Innovative, fun and easy fundraising!</li>
	          			<li>Our goal is to make your goal succeed!</li>
	          			<li>GreatMoods is 100% free forever!</li>
	          			<li>Sign up and start today!</li>
	          			<li>We want to help you achieve your dreams!</li>
				</ul>
	          	</div>
	      </div> <!-- end reasons -->
	      
	      <div id="goals">
		      <br>
		      <p><strong>My Goal</strong><br>
		        $50,000</p><br>
		      <p><strong>Raised<br>
		        So Far</strong><br>
		        $35,000</p>
	    	</div> <!--end goals--> 
		
	      <div class="leader">
	      	<div class="leaderimgcrop"><img src="images/Sample_Websites/716/groupLeadersPhoto.png.jpg" alt="UPLOAD YOUR LEADER PICTURE HERE!"></div> <!-- end leaderimgcrop -->
	        <div class="contactinfo2">
	          <span class="title"><strong>Leader</strong></span>
	          <span class="leadername"></span>
	        </div>
	      </div> <!--end leader-->  
	        
	      <div class="studentleader">
	      	<div class="leaderimgcrop"><img src="images/Sample_Websites/716/memberLeadersPhoto.png.jpg" alt="UPLOAD ANY PICTURE HERE!"></div> <!-- end leaderimgcrop -->
	        <div class="contactinfo2">
	         <!-- <span class="title"><strong>Student Leader</strong></span>
	          <span class="leadername"></span> -->
	        </div>
	      </div> <!--end studentleader-->
    	</div> <!--end column1-->
    
    	<div id="column2">
		<div class="shopDetails">
	        <ul class="stumenu">
	          <h5>Shopping Ideas For...</h5>
	          	<li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=918#!/Mothers/c/18209955/offset=0&sort=priceAsc">Mothers</a></li>
			<li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=918#!/Grandmas/c/18209956/offset=0&sort=priceAsc">Grandmas</a></li>
			<li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=918#!/Fathers/c/18209957/offset=0&sort=priceAsc">Fathers</a></li>
			<li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=918#!/Grandpas/c/18209958/offset=0&sort=priceAsc">Grandpas</a></li>
			<li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=918#!/Teen-Girls/c/18209959/offset=0&sort=priceAsc">Teen Girls</a></li>
			<li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=918#!/Teen-Boys/c/18209960/offset=0&sort=priceAsc">Teen Boys</a></li>
			<li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=918#!/Girls/c/18209961/offset=0&sort=priceAsc">Girls</a></li>
			<li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=918#!/Boys/c/18209962/offset=0&sort=priceAsc">Boys</a></li>
			<li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=918#!/Love-&-Romance/c/18209963/offset=0&sort=priceAsc">Love &amp; Romance</a></li>
			<li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=918#!/Special-Friends/c/18209964/offset=0&sort=priceAsc">Special Friends</a></li>
			<li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=918#!/Students-Away-at-School/c/18209965/offset=0&sort=priceAsc">Students Away at School</a></li>
			<li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=918#!/Customer-&-Clients/c/18209966/offset=0&sort=priceAsc">Customeres &amp; Clients</a></li>
			<li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=918#!/Me-Myself-&-I-Its-Okay/c/18209967/offset=0&sort=priceAsc">Me, Myself &amp; I</a></li>
	        </ul>
	      </div>
	      
	      <br>
	      
	      <div class="bestsellers">
	      	<h5>New Arrivals Daily!</h5>
		<img src="images/rightcol_collage_4pics_15nov2016.jpg" width="160" height="" alt="new arrivals daily">
	      </div>
	</div>    <!--end column2--> 
  </div>  <!--end content-->
  
  <?php include 'footer.php' ; ?>
</div><!--end container-->

</body>
</html>

<script>
    function switchAutoAdvance() {
        imageSlider.switchAuto();
        switchPlayPauseClass();
    }
    function switchPlayPauseClass() {
        var auto = document.getElementById('auto');
        var isAutoPlay = imageSlider.getAuto();
        auto.className = isAutoPlay ? "group2-Pause" : "group2-Play";
        auto.title = isAutoPlay ? "Pause" : "Play";
    }
    switchPlayPauseClass();
</script>

<?php
ob_end_flush();
?>