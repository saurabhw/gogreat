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
       $club_type = $row1['DealerDir'];
       $group = $row1['setuppersonid']; 
       $myPic = $row1['contact_pic'];
       $twit = $row1['twitter']; 
       $face = $row1['facebook']; 
       //$goal = $row1['goal2'];
       $so_far = getSoloSales($dealerID);
       $banner = $row1['banner_path'];
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
          <h1>GreatMoods Mission</h1>
          <div id="column1">
		<h3><br>Achieving Success for Your Goals!</h3>
		<br>
		<p><b>Great Moods Team Purpose:</b></p>
		<p><b>Be Kind</b> – to those in need of help</p>
		<p><b>Do Good</b> – for Individuals, Groups, Organizations and Communities</p>
		<p><b>Achieve Happiness & Success</b> – for every Goal, Vision, Dream or Mission</p>
	</div> <!--end column1-->
	
	<div id="column2">
		<img src="../images/rep-pages/diversegroup.jpg" width="404" height="270" alt="Diverse Group of Adults">
		<img class="imgLeft" src="../images/rep-pages/boychild_sm.jpg" width="198" height="166" alt="Young Boy">
		<img class="imgRight" src="../images/rep-pages/teenagegirl_sm.jpg" width="198" height="166" alt="Teenage Girl">
	</div> <!--end column2--> 
  </div> <!--end content -->
  
      <?php include 'footer(1).php' ; ?>   
</div> <!--end container-->

</body>
</html>

<?php
   ob_end_flush();
?>