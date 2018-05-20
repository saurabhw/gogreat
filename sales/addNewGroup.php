<?php
  session_start(); // session start
  ob_start();
  ini_set('display_errors', '0'); // errors reporting on
  error_reporting(E_ALL); // all errors
  require_once('../includes/functions.php');
  require_once('../includes/connection.inc.php');
  require_once('../includes/imageFunctions.inc.php');
  $link = connectTo();
  
      if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "SC")
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
       $myPic = $row['picPath'];
       $table = "Dealers";

?>

<!DOCTYPE html>
<head>
	<title>Add Fundraiser Group</title>
	
</head>

<body>
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <?php include 'sidenav.php' ; ?>

      <div id="content">
          <h2 align="center">Add Fundraiser Group</h2>
          
         <form class="form" action="newGroup.php" method="post" id="myForm" name="myForm" onsubmit="return atleast_onecheckbox(event)" enctype="multipart/form-data">
          	<select class="" name="rpid" onchange="fetch_select14(this.value);" required>
      		<option value="">Select Representative</option>
      		
      		<?
      		$sql = "SELECT * FROM distributors WHERE setupID = '$userID' AND role = 'RP'";
		$result2 = mysqli_query($link, $sql)or die ("couldn't execute query distrubutors.".mysql_error());
	
		while($row2 = mysqli_fetch_assoc($result2))
		{
                   echo '<option value="'.$row2[loginid].'">'.$row2['FName'].' '.$row2[LName].'</option>';
	        }
	        ?>
      		</select>
						<select class="" name="groupid" id="groupid" onchange='showUser2(this.value)' required>
							<option value="">Select Fundraiser Account</option>
						
						</select>
			
			<span id="error"></span>
			<br>
			<br>
			<div id="border">
			<div id="clubs"></div>
			<input type="submit" name="submit1" class="redbutton" value="Add New Clubs">
		</form>
         
          <br />
          </div><!--end border-->
          </div> <!--end content -->
 
      <?php include 'footer.php' ; ?>   
</div> <!--end container-->

</body>
</html>

<?php
   ob_end_flush();
?>