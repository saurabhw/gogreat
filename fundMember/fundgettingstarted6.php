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
<title>Getting Started | We Deliver!</title>
</head>

<body>
<div id="container">
<?php include 'header.php'; ?>
<?php include 'leftnavSampleGettingStarted.php'; ?>

 <div id="contentSample">
	<div id="column1b">
		<h1>We Deliver! </h1>
		<h3>The Ordering and Delivery Process</h3>
		
		<p>Ordering and Delivery is easy for your Friends & Family Members that are supporting your Fundraiser; they just need to do 2 simple steps. </p>
		<p><b>Step 1</b> - Shop at the GreatMoods Mall, adding their product selections to their Shopping Cart.</p>
		<p><b>Step 2</b> - Check Out with PayPal and enter where they want everything delivered to.</p>
		<p><b>Done!</b></p>
		<p>GreatMoods delivers all Products or Gifts a week before the holiday or special occasion, year round.</p>
	</div> <!--end column1b-->
	
	<div id="column2b">
		<img src="../../images/rep-pages/scouts.png" width="404" height="270" alt="Kiwanis Club">
		<img class="imgLeft" src="../../images/rep-pages/lukeandfriends.png" width="198" height="166" alt="Young Girl">
		<img class="imgRight" src="../../images/rep-pages/volleyball.png" width="198" height="166" alt="Boy with School Fundraiser">
	</div> <!--end column2b--> 
  </div>  <!--end content-->

  <?php include 'footer.php' ; ?>
</div> <!--end container-->
</body>
</html>
<?php
   ob_end_flush();
?>