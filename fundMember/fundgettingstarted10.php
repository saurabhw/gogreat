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
	<title>Getting Started | Overview</title>
</head>

<body>
<div id="container">
	<?php include 'header.php'; ?>
	<?php include 'memberSidebar2.php'; ?>

 <div id="contentSample">
	<h1>Generate Funds 24/7/365 Days a Year!</h1>
	<h3></h3>
	    
	<div id="column1b">
		<p>The Greatmoods Fundraising Program allows a low key, painless way to generate revenue year round for your group's Fundraiser. The reason, we have products that you or your supporters could use every day and many of them for years to come. Hey, if you have to support a Fundraiser for yourself or your child, shouldn’t there a fun benefit for you? By the time you need the funds, it could be a non-event because you have already raised your Groups Goal during the year.</p>
		<p>The GreatMoods Mall will constantly be adding new products daily for all seasons, age groups; from the practical, to silly for all activities and events. Year round, every purchase made from your any of your Groups Fundraising Websites, 35% of that sale is deposited into your PayPal Fundraising Account weekly.</p>
		<p>With this one Fundraising Program you could actually reach your Fundraising Goal in well in advance of the date you need the funds. Pretty nice way to achieve your fundraising goals; cash weekly, we deliver, one time setup, and the Social Networking kids love it. Get started with GreatMoods Today!</p>
	</div><!--end column1b-->
	
	<div id="column2b">
		<img src="../images/rep-pages/boyscouts.png" width="404" height="270" alt="Boyscout Troop">
		<img class="imgLeft" src="../images/rep-pages/cellist.png" width="198" height="166" alt="Student Playing the Cello">
		<img class="imgRight" src="../images/rep-pages/baseball.png" width="198" height="166" alt="Baseball Team">
	</div><!--end column2b-->
  </div>  <!--end content-->

  <?php include 'footer.php' ; ?>
</div> <!--end container-->
</body>
</html>
<?php
   ob_end_flush();
?>