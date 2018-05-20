<?php
      session_start();

      if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
       
       require_once("../includes/connection.inc.php");
       include('../samplewebsites/imageFunctions.inc.php');
       include("../includes/functions.php");
       $link = connectTo();
       $userID = $_SESSION['userId'];
       $userName = $_SESSION['email'];
       $groupID = $_SESSION['groupid'];
       $query1 = "SELECT * FROM Dealers WHERE loginid='$groupID'";
       $result1 = mysqli_query($link, $query1)or die("MySQL ERROR query 1: ".mysqli_error($link));
       $row1 = mysqli_fetch_assoc($result1);
       $dealerID = $row1['loginid'];
       $group = $row1['setuppersonid']; 
       $myPic = $row1['contact_pic'];
       $twit = $row1['twitter']; 
       $face = $row1['facebook']; 
       //$goal = $row1['goal2'];
       $so_far = getSoloSales($dealerID);
       $banner = $row1['banner_path'];
       
       //get parent info
       $getParent = "SELECT * FROM Dealers WHERE loginid = '$group'";
       $pResult = mysqli_query($link, $getParent)or die ("couldn't execute parent query.".mysql1_error($link));
       $pRow = mysqli_fetch_assoc($pResult);
       $goal = $pRow['goal2'];
       

?>
<!DOCTYPE html>
<head>
	<title>GreatMoods Member</title>
</head>

<body>
<div id="container">
      <?php include 'header(1).php' ; ?>
      <?php include 'memberSidebar_new.php' ; ?>

      <div id="content">
          <h1>Get Started Today!</h1>
          <h3>Achieving Success for your Goals is our Goal</h3>
          
	  <div id="column1">
		<p>Setting up an Online Fundraiser for your entire Organization is probably a first for you and we know that. Here is your Fundraising To Do Checklist, with Step by Step forms to help you get started.</p> 
		<p>A suggestion for any Organization or Fundraising Leader or non-techie types who are concerned about setting up an online Fundraiser. Find a couple kids or members who have a Cell Phone, Facebook page or Twitter account, because they could easily set up the whole Fundraiser in an evening and maintain any part of it in their sleep.</p>
		
		<p>GreatMoods is looking forward to working with you and your Organization to build a long-term consistent Fundraising Revenue!</p>
	</div> <!--end column1-->
	
	<div id="column2">
		<img src="../images/laptop-keyboard.jpg" alt="collage" style="width: 100%;">
	</div> <!--end column2-->

  </div> <!--end content -->
  
      <?php include 'footer(1).php' ; ?>   
</div> <!--end container-->

</body>
</html>

<?php
   ob_end_flush();
?>