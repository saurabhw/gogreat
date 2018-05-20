<?php
      include '../includes/autoload.php';
       $user = $_SESSION['userId'];
       $userName = $_SESSION['email'];
       if(!isset($_SESSION['authenticated']) )
       {
            $groupID = $_GET['group'];
       }
       else
       {
           if($_SESSION['role'] == "SC" || $_SESSION['role'] == "RP" || $_SESSION['role'] == "VP")
            {
                 header( 'Location: http://www.greatmoods.com/welcome.php' );
            }
           $groupID = $_SESSION['groupid'];
       }
       //$groupID = $_SESSION['groupid'];
       $query1 = "SELECT * FROM Dealers WHERE loginid='$groupID'";
       $result1 = mysqli_query($link, $query1)or die("MySQL ERROR query 1: ".mysqli_error($link));
       $row1 = mysqli_fetch_assoc($result1);
       $dealerID = $row1['loginid'];
       $group = $row1['setuppersonid']; 
       $club_type = $row1['DealerDir']; 
       $myPic = $row1['contact_pic'];
       //$goal = $row1['goal2'];
       $twit = $row1['twitter']; 
       $face = $row1['facebook']; 
       $banner = $row1['banner_path'];
       $so_far = getSoloSales($dealerID);
      
       $banner = $row1['banner_path'];
     
     
       $query3 = "SELECT * FROM orgMembers WHERE fundraiserID ='$groupID'";
       $result3 = mysqli_query($link, $query3) or die(mysqli_error());
       $row3 = mysqli_fetch_assoc($result3);
       $fn = $row3['orgFName'];
       $ln = $row3['orgLName'];
      
       //get parent info
       $getParent = "SELECT * FROM Dealers WHERE loginid = '$group'";
       $pResult = mysqli_query($link, $getParent)or die ("couldn't execute parent query.".mysql1_error($link));
       $pRow = mysqli_fetch_assoc($pResult);
       $goal = $pRow['goal2'];
?>

<!DOCTYPE html>
<head>
	<title>Getting Started | Welcome</title>
</head>

<body>
<div id="container">
	<?php include 'header(1).php'; ?>
	<?php
	if(isset($_SESSION['authenticated']) )
	{
	    include 'memberSidebar_new.php';
	}
	else
	{
	   include 'leftnavSampleGettingStarted.php';
	}
	   
	?>

 <div id="contentSample">
	<h1>Welcome to GreatMoods!</h1>
	<h3>GreatMoods, Great Fundraising!</h3>
	
	<div id="column1b">
		<p>Today’s Cell Phone, Facebook and Social Media Generation want convenience, ease of use and speed, all of which are offered as part of our GreatMoods Free Personalized Website Fundraising Program.</p>
		<p>Every Student or Member of every Club, Team, School, Group, Organization, Church or Community gets their very own Free Personalized Fundraising Website to achieve the group’s goal! Everybody!</p>
		<p>Cash is Deposited every week into your Group's PayPal Account on every individual sale (which is 35% of the Retail Price) and best of all We Deliver!  Everything!  Everywhere!  24/7/365 days a year!</p>
		<p>GreatMoods has a “Shopping Mall”, located on each of the Free Individual Member Websites, with a wonderful selection of fundraising products and gifts that any supporter would be pleasantly surprised to purchase from.</p> 
		<p>The GreatMoods Mall has fashionable clothing for everyone, including scarves, jewelry, sportswear and accessories. Chocolate, Cookie and Coffee Dessert Trays are available for Friends, Family, Customers and Clients during all the Holiday Seasons! New Merchandise is arriving everyday for every Season and Reason Year Round!</p>
	
		<div id="leadBox">
			<div id="infoText">
				<div id="redBar1">
					<h3>Program Features and Benefits</h3>
				</div> <!--end redBar1-->
				
				<ul>
					<li>Free Fun Fundraising Websites for every Student or Member!</li>
					<li>100+ Stores of 20,000+ Products at the GreatMoods Mall</li>
					<li>Cash is Deposited Every Week into your Group's PayPal Account!</li>
					<li>We Deliver! Everything! Everywhere!</li>
					<li>Achieving Success for your Goals is our Goal, 24/7/365 days a year!</li>
					<li>Easy to Setup, Easy to Maintain!  Everything is Free!  Now & Forever!</li>
				</ul>
			</div> <!--end infoText--> 
		</div> <!--end leadBox-->
		
		<div>&nbsp;</div>
		<p>The Future of Fundraising for today’s technology savvy families, students and organizational members is completely online. GreatMoods; Easy to set up, Easy to maintain and focused on achieving $uccess for you.</p>
	</div> <!--end column1b-->
	
	<div id="column2b">
		<div>
			<img src="../images/rep-pages/highyearbook2.png" width="404" height="270" alt="High School Year Book">
			<img class="imgLeft" src="../images/rep-pages/boyscouts1.png" width="198" height="166" alt="Boy Scouts">
			<img class="imgRight" src="../images/rep-pages/juniorchoir.png" width="198" height="166" alt="Elementary School Choir">
		</div>
		
		<div id="pcaption">GreatMoods offers fundraising opportunities for schools, religious organizations, community organizations and more. </div>
	
		<h3>Get Started Today</h3>
		<p>GreatMoods is looking forward to working with you and your Organization to build a long-term consistent Fundraising Revenue!</p>
	</div>    <!--end column2b--> 
  </div>  <!--end content-->
  <div class="clearfloat">  </div>

  <?php include 'footer(1).php' ; ?>
</div> <!--end container-->
</body>
</html>
<?php
   ob_end_flush();
?>