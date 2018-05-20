<?php
       session_start();
      ob_start();
      define("SITE_ROOT",$_SERVER["DOCUMENT_ROOT"].'/salesTest/');
      require_once("../includes/connection.inc.php");
       include('../samplewebsites/imageFunctions.inc.php');
       include("../includes/functions.php");
       $link = connectTo();
       $user = $_SESSION['userId'];
       $userName = $_SESSION['email'];
       if(!isset($_SESSION['authenticated']) )
       {
            $groupID = $_GET['group'];
       }
       else
       {
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
       $goal = $row1['goal2'];
       $twit = $row1['twitter']; 
       $face = $row1['facebook']; 
       //$banner = $row1['Banner'];
       $so_far = getSoloSales($groupID);
      
       $banner = $row1['banner_path'];
     
     
      $query3 = "SELECT * FROM orgMembers WHERE fundraiserID ='$groupID'";
      $result3 = mysqli_query($link, $query3) or die(mysqli_error());
      $row3 = mysqli_fetch_assoc($result3);
      $fn = $row3['orgFName'];
      $ln = $row3['orgLName'];
?>

<!DOCTYPE html>
<head>
<title>Getting Started | Strengths</title>
</head>

<body>
<div id="container">
<?php include 'header.php'; ?>
<?php include 'leftnavSampleGettingStarted.php'; ?>

 <div id="contentSample">
	<h1>Strengths of the GreatMoods Program </h1>
	<h3>10 Good Reasons To Do Fundraising Online With GreatMoods</h3>

	<div id="column1b">
		<p><b>1.</b> Every Student, or Member of every Team, Club, Church or Organization gets their own Free Individually Personalized Fundraising Website.</p>
		<p><b>2.</b> The GreatMoods Shopping Mall offers a great selection of over 20,000+ fundraising products designed for all age groups.  Everyone is a potential customer or recipient of our products for every season, reason or occasion.</p>
		<p><b>3.</b> PayPal, the most trusted and fraud proof online order processing system, for the consumer market today, is used to process every order. </p>
		<p><b>4.</b> Cash is Deposited Weekly for every product sold directly into your groups’ PayPal account 24/7/ 365 days a year, forever!</p>
		<p><b>5.</b> Spring, Summer, Winter or Fall GreatMoods Fundraising delivers it all.  This one Program allows 3 to 5 significant fundraising income opportunities a year, with one simple setup.</p>
		<p><b>6.</b> Selling door-to-door really isn’t required because all of your Fundraising can be done online with Friends, Family and Neighbors from anywhere in the country.</p>
		<p><b>7.</b> We Deliver! Everything! Everywhere! You don’t touch the product, because it is delivered straight to the designated recipient (even when it’s for you)!</p>
		<p><b>8.</b> It’s Free, Now and Forever, No cost of anything to anyone, EVER. All you have to do is maintain new members and delete old ones a couple times a year.</p>
		<p><b>9.</b> New, absolutely! Facebook is new, Twitter is new and Texting is new. Personalized Fundraising Websites by GreatMoods are new, and being new and online is certainly a good thing for all your Students, Members and potential Supporters.</p>
		<p><b>10.</b> New to technology? Never worry about that.  With today’s tech savvy kids and family members, the Fundraising Program can be setup in no time. It's as easy to maintain as a Facebook or Twitter Account.</p>
	</div> <!--end column1b-->
	
	<div id="column2b">
		<br>
		<img src="../../images/rep-pages/scarfgrouping.png" width="404" height="270" alt="5 Scarves">
		<img class="imgLeft" src="images/rep-pages/boycomputer.png" width="198" height="166" alt="Student at Computer">
		<img class="imgRight" src="images/rep-pages/teachercomputer.png" width="198" height="166" alt="Teacher at Computer Desk">
		<div id="pcaption">GreatMoods offers fundraising opportunities for schools, religious organizations, community organizations and more.</div>
		
		<!-- <h3>Get Started Today</h3>
		<p>GreatMoods is looking forward to working with you and your Organization to build a long-term consistent Fundraising Revenue!</p>
		<p><b>Click the Button below to contact us and get started.</b></p>
		<div><a href="contactus.php"><input type="button" value="Let the Fundraising Begin!"/></a></div>-->
	</div> <!--end column2b-->
  </div>  <!--end content-->
  <div class="clearfloat">  </div>

  <?php include 'footer.php' ; ?>
</div> <!--end container-->
</body>
</html>
<?php
   ob_end_flush();
?>