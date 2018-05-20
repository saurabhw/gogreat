<?php
  session_start(); // session start
  ob_start();
  ini_set('display_errors', '0'); // errors reporting on
  error_reporting(E_ALL); // all errors
  require_once('../includes/functions.php');
  require_once('../includes/connection.inc.php');
  require_once('../includes/imageFunctions.inc.php');
  $link = connectTo();
      if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "VP")
       {
            header('Location: ../index.php');
            exit;
       }
       if($_SESSION['freeze'] == "TRUE")
       {
          // echo "Account Frozen";
           header('Location: accountEdit.php');
       }
       
       //get user ID and database connection
       $userID = $_SESSION['userId'];
       $repID = $userID;
      
       //$getGroup = $_GET['group'];
       
       $userID = $_SESSION['userId'];
       $query = "SELECT * FROM user_info WHERE userInfoID='$userID'";
       $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysqli_error($link));
       $row = mysqli_fetch_assoc($result);
       $pic = $row['picPath'];
       $table = "Dealers";

?>

<!--<!DOCTYPE html>
<head>
	<title>GreatMoods | Representative</title>
	
</head>
-->
<body>
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <?php include 'sideLeftNav.php' ; ?>

      <div id="content">
          <h1>Add Fundraiser Group</h1>
         <form class="form" action="newGroup.php" method="post" id="myForm" name="myForm" enctype="multipart/form-data">
          	<select name='groupid' style='width: 220px;' required>
          	<option value="">Select Account Name</option>
			<?
			$query = "SELECT * FROM $table WHERE isMainGroup = 1 AND setuppersonid ='$userID' ORDER BY Dealer asc";
		        $result = mysqli_query($link, $query)or die ("couldn't execute  pages query.".mysqli_error($link)); 
		    			
                        while ($row = mysqli_fetch_assoc($result)){
                            //$dealer = mysqli_real_escape_string($row['Dealer']);
                            $dealer = $row['Dealer'];
                            //$dealer = addslashes($dealer);
                            $idDealer = $row['loginid'];
                            $a1 = mysqli_real_escape_string($link, $row['Address1']); 
                            echo '<option value="'.$idDealer.'">'.$dealer.' '.$row['City'].' '.$row['State'].'</option>';
                        }
						
                        echo "</select>";
                       
			?>
			<div id="clubs"></div>
			<span id="error"></span>
			<br>
			<input type="submit" name="submit1" class="redbutton" value="Add New Clubs">
		</form>
         
          <br />
          </div> <!--end content -->
 
      <?php include 'footer.php' ; ?>   
</div> <!--end container-->

</body>
</html>

<?php
   ob_end_flush();
?>