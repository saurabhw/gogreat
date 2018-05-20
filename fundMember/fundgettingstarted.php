<?php
       session_start();
      ob_start();
      define("SITE_ROOT",$_SERVER["DOCUMENT_ROOT"].'/salesTest/');
      require_once("../includes/connection.inc.php");
       include('../samplewebsites/imageFunctions.inc.php');
       include("../includes/functions.php");
       $link = connectTo();
       $userID = $_SESSION['userId'];
       $userEmail = $_SESSION['email'];
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
	<title>GreatMoods Getting Started</title>
</head>

<body>
<div id="container">
	<?php include 'header.php'; ?>
	<?php include 'memberSidebar4.php'; ?>

 <div id="contentSample">
	<h1>Getting Started</h1>
	<h3>Welcome to GreatMoods!</h3>

	<div id="column1b">
		
		
		</div> <!--end column1-->
	    
	    <div id="column2b">
		    <div>
		    	<img src="../images/rep-pages/choir1.png" width="404" height="270" alt="High School Choir">
			<img class="imgLeft" src="../images/rep-pages/youngboy1.png" width="198" height="166" alt="Young Elementary Boy">
			<img class="imgRight" src="../images/rep-pages/church2.png" width="198" height="166" alt="Lady with Father">
		    </div>
		    <div id="pcaption">GreatMoods offers fundraising opportunities for schools, religious organizations, community organizations, and more. </div>
	</div><!--end column2--> 

  </div>  <!--end content-->


  <?php include 'footer.php' ; ?>
</div>
<!--end container-->
</body>
</html>
<?php
   ob_end_flush();
?>