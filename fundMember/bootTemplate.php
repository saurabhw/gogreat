<?php
      session_start();

      if(($_SESSION['role'] == 'MemberLeader' || $_SESSION['role'] == 'Member') && isset($_SESSION['authenticated']))
       {
          //authenicated
       }
       else
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
	<title>Layout Template</title>
</head>

<body>
    <?php include 'header(1).php' ; ?>
      <?php include 'memberSidebar_new.php' ; ?>
<div class="container" id="fundmemberHome" >
    <div class="row-fluid row-flex">
      
        
			  
        hello
		
	
    </div> <!--END row flex-->
  
        
</div> <!--end container-->
<?php include 'footer(1).php' ; ?> 
</body>
</html>
