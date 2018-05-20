<?php
     include '../includes/autoload.php';
      //if not logged in kick them to home page
     if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "SC")
       {
            header('Location: ../index.php');
            exit;
       }
       
       //get user ID and database connection
      
       
       //$getGroup = $_GET['group'];
       
       $userID = $_SESSION['userId'];
       $query = "SELECT * FROM user_info WHERE userInfoID='$userID'";
       $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error());
       $row = mysqli_fetch_assoc($result);
       $myPic = $row['picPath'];
       $table = "Dealers";

?>

<!DOCTYPE html>
<head>
	<title>GreatMoods | Sales</title>
</head>

<body>
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <?php include 'sidenav.php' ; ?>

      <div id="content">
          <h1>Add Fundraiser Group</h1>
         <form class="" method="post" action="addClub.php" onsubmit="return atleast_onecheckbox(event)" name="myForm" id="myForm" enctype="multipart/form-data">
          	
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
			
			<div id="clubs">...</div>
			<span id="error"></span>
			<br>
			<input type="submit" name="submit" class="redbutton" value="Add New Clubs" />
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