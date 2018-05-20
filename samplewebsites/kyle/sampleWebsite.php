<?php include '../redirect/redirect.php'; ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Main Website</title>
		
<link rel="stylesheet" type="text/css" href="../css/mainStyles.css">
<link rel="stylesheet" type="text/css" href="../css/sampleWebsiteStyles.css">	
	
		<style type="text/css">
			#headerTop{
				background: no-repeat;
				background-position:right top;
				width:1024px;
				height:160px;
				padding:0;
				margin:0;
				position:relative;
				z-index:3;
				}
			

		</style>	
		
    
	</head>
    <body>
	  <div id="container">
		<?php include '../banner.php' ; ?>
			<?php include '../mainLeftSidebar.php' ; ?>
         		<div id="content">
                     <div id="leftSideContent">
                     	<h1>Lincoln High School Band Fundraiser</h1>
                        <span></span>
                        <h2 class="frTitle">Please Support Our Fundraiser!</h2>
                            <p>Thank You for supporting our Fundraising effort! This is a big year for our High School and with a little added support we can make it a great year for the Students!!! 	                               Gift Baskets are a wonderful item for the Holidays and really helps us to achieve our individual needs and goals. Please select one of the Gift Baskets below to send to 	                               a Family Member, Friend or special Business Customer this Holiday Season.</p>



                     <h3 class="reasonsTitle">Reason(s) for Our Fundraiser</h3>
                     <ul class="reasons">
                     	<li>General Fund</li>
                        <li>Field Trips & Travel</li>
                        <li>Schoo General Fund</li>
                        <li>Events, Concerts, Banquets & Awards Fund</li>
                        <li> General Equipment & Maintenance Fund</li>
                     	<li>Carnival & Events</li>
                     	<li>Classroom Technology Equipment Fund</li>
                     </ul>
                     </div><!--end leftSideContent-->           
                    <div id="rightSideContent">
              		<img src="../images/images from emily/landing page images/Band, Orchestra, Choir Director/marching_trumpeters_football_field.jpg" width="300" height="200">
                     <img src="images/images from emily/landing page images/Band, Orchestra, Choir Director/casual_attire_band_sports_event.jpg" width="300" height="200">
                      </div>
                   
               </div><!--end content-->
			<?php include '../footer.php' ; ?>
</div><!--end container-->

</body>
</html>
