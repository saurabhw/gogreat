<?php
 
      session_start();
      ob_start();
      define("SITE_ROOT",$_SERVER["DOCUMENT_ROOT"].'/salesTest/');
      require_once("../includes/connection.inc.php");
       include('../samplewebsites/imageFunctions.inc.php');
       include("../includes/functions.php");
       $link = connectTo();
       $userID = $_SESSION['userId'];
       $userName = $_SESSION['email'];
       if(!isset($_SESSION['authenticated']) )
       {
            $groupID = $_GET['group'];
           
       }
       else
       { 
           if($_SESSION['role'] == "SC" || $_SESSION['role'] == "RP" || $_SESSION['role'] == "VP")
            {
                 header( 'Location: http://www.greatmoods.com/gm_programoverview.php#&panel1-1' );
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
       //$banner = $row1['Banner'];
       
       
       $so_far = getSoloSales($groupID);
      
       $banner = $row1['banner_path'];
       //get parent info
       $getParent = "SELECT * FROM Dealers WHERE loginid = '$group'";
       $pResult = mysqli_query($link, $getParent)or die ("couldn't execute parent query.".mysql1_error($link));
       $pRow = mysqli_fetch_assoc($pResult);
       $goal = $pRow['goal2'];
     
       $query3 = "SELECT * FROM orgMembers WHERE fundraiserID ='$groupID'";
       $result3 = mysqli_query($link, $query3) or die(mysqli_error($link));
       $row3 = mysqli_fetch_assoc($result3);
       $fn = $row3['orgFName'];
       $ln = $row3['orgLName'];
?>

<!DOCTYPE html>
<head>
	<title>Getting Started | Forms</title>
</head>

<body>
<div id="container">
	<?php include 'header(1).php'; ?>
	<?php 
	if(isset($_SESSION['authenticated']) && $_SESSION['role'] == "Member" || $_SESSION['role'] == "MemberLeader")
	{  
	   include 'memberSidebar_new.php';
	}
	else
	{ 
	  include 'memberSidebar2.php'; 
	}
	?>
<div id="content">

	<div class="presentation">
		<div id="slider">
			<div><img src="../images/presentation/gm_presentation6-1.jpg" alt="slide 1"></div>
			<div><img src="../images/presentation/gm_presentation6-2.jpg" alt="slide 2"></div>
			<div><img src="../images/presentation/gm_presentation6-3.jpg" alt="slide 3"></div>
			<div><img src="../images/presentation/gm_presentation6-4.jpg" alt="slide 4"></div>
			<div><img src="../images/presentation/gm_presentation6-5.jpg" alt="slide 5"></div>
			<div><img src="../images/presentation/gm_presentation6-6.jpg" alt="slide 6"></div>
			<div><img src="../images/presentation/gm_presentation6-7.jpg" alt="slide 7"></div>
			<div><img src="../images/presentation/gm_presentation6-8.jpg" alt="slide 8"></div>
			<div><img src="../images/presentation/gm_presentation6-9.jpg" alt="slide 9"></div>
			<div><img src="../images/presentation/gm_presentation6-10.jpg" alt="slide 10"></div>
			<div><img src="../images/presentation/gm_presentation6-11.jpg" alt="slide 11"></div>
			<div><img src="../images/presentation/gm_presentation6-12.jpg" alt="slide 12"></div>
			<div><img src="../images/presentation/gm_presentation6-13.jpg" alt="slide 13"></div>
			<div><img src="../images/presentation/gm_presentation6-14.jpg" alt="slide 14"></div>
			<div><img src="../images/presentation/gm_presentation6-15.jpg" alt="slide 15"></div>
			<div><img src="../images/presentation/gm_presentation6-16.jpg" alt="slide 16"></div>
			<div><img src="../images/presentation/gm_presentation6-17.jpg" alt="slide 17"></div>
			<div><img src="../images/presentation/gm_presentation6-18.jpg" alt="slide 18"></div>
			<div><img src="../images/presentation/gm_presentation6-19.jpg" alt="slide 19"></div>
			<div><img src="../images/presentation/gm_presentation6-20.jpg" alt="slide 20"></div>
			<div><img src="../images/presentation/gm_presentation6-21.jpg" alt="slide 21"></div>
			<div><img src="../images/presentation/gm_presentation6-22.jpg" alt="slide 22"></div>
			<div><img src="../images/presentation/gm_presentation6-23.jpg" alt="slide 23"></div>
			<div><img src="../images/presentation/gm_presentation6-24.jpg" alt="slide 24"></div>
			<div><img src="../images/presentation/gm_presentation6-25.jpg" alt="slide 25"></div>
			<div><img src="../images/presentation/gm_presentation6-26.jpg" alt="slide 26"></div>
			<div><img src="../images/presentation/gm_presentation6-27.jpg" alt="slide 27"></div>
			<div><img src="../images/presentation/gm_presentation6-28.jpg" alt="slide 28"></div>
			<div><img src="../images/presentation/gm_presentation6-29.jpg" alt="slide 29"></div>
			<div><img src="../images/presentation/gm_presentation6-30.jpg" alt="slide 30"></div>
			<div><img src="../images/presentation/gm_presentation6-31.jpg" alt="slide 31"></div>
			<div><img src="../images/presentation/gm_presentation6-32.jpg" alt="slide 32"></div>
			<div><img src="../images/presentation/gm_presentation6-33.jpg" alt="slide 33"></div>
			<div><img src="../images/presentation/gm_presentation6-34.jpg" alt="slide 34"></div>
			<div><img src="../images/presentation/gm_presentation6-35.jpg" alt="slide 35"></div>
		</div> <!-- end slider -->
	</div> <!-- end presentation -->
  </div>  <!--end content-->
  
<?php include 'footer(1).php' ; ?>
  </div>
</div> <!--end container-->
</body>
</html>
<?php
   ob_end_flush();
?>