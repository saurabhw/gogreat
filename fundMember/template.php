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
   require_once("../includes/functions.php");
   //require_once("../includes/functions.php");
   $link = connectTo();
   $userID = $_SESSION['userId'];
   $userEmail = $_SESSION['email'];
   $userName = $_SESSION['groupid'];
   $query1 = "SELECT * FROM Dealers WHERE loginid='$userName'";
   $result1 = mysqli_query($link, $query1)or die("MySQL ERROR query 1: ".mysqli_error($link));
   $row = mysqli_fetch_assoc($result1);
   $dealerID = $row['loginid'];
   $group = $row['setuppersonid'];
   $myPic = $row['contact_pic']; 
   //$goal = $row['goal2'];
   $twit = $row['twitter']; 
   $face = $row['facebook']; 
   $banner = $row['banner_path'];

   $so_far = getSoloSales($dealerID);
   //get parent info
   $getParent = "SELECT * FROM Dealers WHERE loginid = '$group'";
   $pResult = mysqli_query($link, $getParent)or die ("couldn't execute parent query.".mysql1_error($link));
   $pRow = mysqli_fetch_assoc($pResult);
   $goal = $pRow['goal2'];


	// mysqli_fetch_row - the results are in an array, keys are integers
	// mysqli_fetch_assoc - the results are in an associative array, keys are the column names
	// mysqli_fetch_array - the results are both, indexed by integer and column names

?>

<!DOCTYPE html>
<head>
	<title>Contacts | Member</title>
</head>
	
<body>
<div id="container">
	        <?php include 'header.php' ; ?>
		<?php include 'memberSidebar.php' ; ?>
	
	<!--START MAIN CONTENT-->
	
	<div id="content">
	
		
		
	</div>
	
	<!--END MAIN CONTENT-->
	
	
	
	<?php include '../includes/footer.php' ; ?>

</div>

<!--END CONTAINER-->

</body>
</html>

<?php
   ob_end_flush();
?>