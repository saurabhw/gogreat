<?php include 'redirect/redirect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Setup/Edit Main Website</title>
		
<link rel="stylesheet" type="text/css" href="css/mainStyles.css">
<link rel="stylesheet" type="text/css" href="css/setupEditMainWebsiteStyles.css">
<link rel="stylesheet" type="text/css" href="css/nic.css"/>	
<style type="text/css">
#headerTop{
		background: no-repeat;
		background-position:right top;
		width:1024px;
		height:130px;
		padding:0;
		margin:0;
		position:relative;
		z-index:3;
		}
#content{
		width:700px;
		margin:0px 0 50px 0;
		padding:0px 0px 50px 0px;
		float:right;
		position:relative;
		top:-50px;
		}
#leadImg{
		position:relative;
		float:right;
		}
#logout {
		position: absolute;
		right: 8px;
		}
.school {
				
		}
.hidden {
		display: none;
		}
.unhidden {
		display: block;
		}
		
#baskets {
	#baskets {
	width:700px;
	float: left;
	padding-left: 100px;
	}
	

</style>	
		
	</head>
    <body>
	  <div id="container">
		<?php include 'header.php'; ?>
			<?php include 'mainLeftSidebar.php'; ?>
         		
         		<!-- start main content -->
         		<!--START BASKET SECTION-->
         		<div id="mainbox" style="margin-left: 40px;">
         		<div> <!-- start buttons -->
		
	
		
		<span class="style3">Fundraiser Name Here</span></br></hr>
				
			
		<table style="padding-bottom:8px; border-color: none;" cellspacing="0px;" cellpadding="0px;" border="0">
		
			<tr>
				<td>
					<form action="" method="post" enctype="multipart/form-data">
					<input type="submit" value="Login!">
					</form>
				</td>
				
				<td>
					<form action="/admin/addnewfundraiserexample.php" method="post" enctype="multipart/form-data">
					<input type="hidden" name="presetfundraiser" value="High School Baseball Team">
					<input type="submit" value="Setup Now!">
					</form>
				</td>
	
				<td>
					<form action="/admin/addmemberexample.php" method="post" enctype="multipart/form-data">
					<input type="submit" value="Setup Students">
					</form>
				</td>
	
				<td>
					<form action="/admin/emailexample.php" method="post" enctype="multipart/form-data">
					<input type="submit" value="Setup and Send E-mails">
					</form>
				</td>

				<td>
					<form action="/fundraisertools/trainingandtools/">
					<input type="submit" value="Training and Tools">
					</form>
				</td>
			</tr>
		</table>
	</div> <!-- end buttons -->
	<hr class="header">
	</br>
<div id="baskets">
	
	<span class="style3">Order Your Gift Baskets Here! </span></br >
		<table cellpadding="0px;" cellspacing="0px;" style="margin: auto;">
			
			<!--START BASKET ROW ONE-->
			
			<tr>
				<td>
					<a href="/product.php?id=lincoln&bid=711">
						<img src="images/baskets/aboutmain/spaandrelaxation.jpg" height="95" width="95" border="0">
					</a><br />
					<center>
						<a href="/product.php?id=lincoln&bid=711" style="font-size:.8em;">Spa & Relaxation</a>
					</center>
				</td>
				
				<td>
					<a href="/product.php?id=lincoln&bid=712">
						<img src="images/baskets/aboutmain/atthecabin.jpg" height="95" width="95" border="0">
					</a><br />
					<center>
						<a href="/product.php?id=lincoln&bid=712" style="font-size:.8em;">At the Cabin</a>
					</center>
				</td>
				
				<td>
					<a href="/product.php?id=lincoln&bid=709">
						<img src="images/baskets/aboutmain/housewarming.jpg" height="95" width="110" border="0">
					</a><br />
					<center>
						<a href="/product.php?id=lincoln&bid=709" style="font-size:.8em;">Housewarming</a>
					</center>
				</td>
				
				<td>
					<a href="/product.php?id=lincoln&bid=707">
						<img src="images/baskets/aboutmain/outtothegarden.jpg" height="95" width="105" border="0">
					</a><br />
					<center>
						<a href="/product.php?id=lincoln&bid=707" style="font-size:.8em;">Out to the Garden</a>
					</center>
				</td>
				
				<td>
					<a href="/product.php?id=lincoln&bid=708">
						<img src="images/baskets/aboutmain/tranquility.jpg" height="95" width="95" border="0">
					</a><br />
					<center>
						<a href="/product.php?id=lincoln&bid=708" style="font-size:.8em;">Tranquility</a>
					</center>
				</td>
				
				<td>
					<a href="/product.php?id=lincoln&bid=710">
						<img src="images/baskets/aboutmain/amomentformom.jpg" height="95" width="110" border="0">
					</a><br />
					<center>
						<a href="/product.php?id=lincoln&bid=710" style="font-size:.8em;">A Moment for Mom</a>
					</center>
				</td>
			</tr>
			
			<!--END BASKET ROW ONE-->
			
			<!--START BASKET ROW TWO-->
			
			<tr>
				<td>
					<a href="/product.php?id=lincoln&bid=676">
						<img src="images/baskets/aboutmain/earlytorise.jpg" border="0">
					</a><br />
					<center>
						<a href="/product.php?id=lincoln&bid=676" style="font-size:.8em;">Early To Rise</a>
					</center>
				</td>
				
				<td>
					<a href="/product.php?id=lincoln&bid=697">
						<img src="images/baskets/aboutmain/movietime.jpg" border="0">
					</a><br />
					<center>
						<a href="/product.php?id=lincoln&bid=697" style="font-size:.8em;">Movie Time</a>
					</center>
				</td>
				
				<td>
					<a href="/product.php?id=lincoln&bid=672">
						<img src="images/baskets/aboutmain/coffeebreak.jpg" border="0">
					</a><br />
					<center>
						<a href="/product.php?id=lincoln&bid=672" style="font-size:.8em;">Coffee Break</a>
					</center>
				</td>
				
				<td>
					<a href="/product.php?id=lincoln&bid=701">
						<img src="images/baskets/aboutmain/sportsspectacular.jpg" border="0">
					</a><br />
					<center>
						<a href="/product.php?id=lincoln&bid=701" style="font-size:.8em;">Sports Spectacular</a>
					</center>
				</td>
				
				<td>
					<a href="/product.php?id=lincoln&bid=686">
						<img src="images/baskets/aboutmain/celebration.jpg" border="0">
					</a><br />
					<center>
						<a href="/product.php?id=lincoln&bid=686" style="font-size:.8em;">Celebration</a>
					</center>
				</td>
				
				<td>
					<a href="/product.php?id=lincoln&bid=704">
						<img src="images/baskets/aboutmain/tranquilreflections.jpg" border="0">
					</a><br />
					<center>
						<a href="/product.php?id=lincoln&bid=704" style="font-size:.8em;">Tranquil Reflections</a>
					</center>
				</td>
			</tr>
			
			<!--END BASKET ROW TWO-->
			
		</table>
		
	<br />
	<hr />
	<br />
</div>

	<!--END BASKET SECTION-->
	
	<div style="float:right;">
		<img src="images/highkeyclubstudent.jpg" style="float: right;" width="257" height="157"><br />
		<img src="images/highkeyclub1.jpg" style="float: right;" width="257" height="157">
	</div>

	<div>
		
		<span class="customstyle2">Please Support Our Fundraiser!</span>
			<br />
			
			Thank You for supporting our Fundraising effort! This is a big year for our School and with a little added support we can make it a great year for the Students!!!<br /><br />
			<br />

			Gift Baskets are a wonderful item for the Holidays and really helps us to achieve our individual needs and goals. <br /><br /> 
			<br /><br />

			Please select one of the Gift Baskets below to send to a Family Member, Friend or special Business Customer this Holiday Season. 
 			<br /><br />
			

		<span class="customstyle2">Reason(s) for Our Fundraiser</span>
			<ul>
				<font size="2"><strong>
				<li>Gloves, Bats, Ball, Bases, General Equipment Fund</li>
		        <li>Team Uniforms, Pads, Shoe Funds</li>
		        <li>Field Maintenance Funds</li>
		        <li>League Sign Up & Team Participation Fees</li>
		        <li>Tournament & General Competition Fees</li>
		        <li>Bus Rental & Gas Team Travel Funds</li>
		        <li>Tournament Travel and Lodging Funds</li>
		        <li>Coaching Salaries</li>
		        <li>General Baseball Athletics Fund</li>
		        <li>Banquet & Awards Fund</li>
				</strong></font>
			</ul>

		<span class="customstyle2">Contact Person</span>
			<br /><strong>John Smith</strong>
			<br />johnsmith@school.edu
			<br />555-555-5555
			<br />
			<br />

		<span class="customstyle2">Student Contact</span>
			<br /><strong>Pat Erickson</strong>
			<br />paterickson@school.edu
			<br />
			<br />
	</div>
	
	<span style="clear:both;"></span>
	
</div>
         		
         		
         		
	<?php include 'footer.php' ; ?>
</div><!--end container-->

</body>
</html>