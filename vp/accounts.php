<?php
session_start(); // session start
ob_start();
ini_set('display_errors', '0'); // errors reporting on
error_reporting(E_ALL); // all errors
require_once('../includes/functions.php');
require_once('../includes/connection.inc.php');
require_once('../includes/imageFunctions.inc.php');
$link = connectTo();
    if(isset($_POST['submit1']))
       {
          $_SESSION['role'] = "VP";
          $_SESSION['home'] = "vp/accounts.php";
       }
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
   $link = connectTo();
   $userID = $_SESSION['userId'];
   $query = "SELECT * FROM user_info WHERE userInfoID='$userID'";
   $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysqli_error($link));
   $row = mysqli_fetch_assoc($result);
   $pic = $row['picPath'];
   $bob = 24503;

?>
<!DOCTYPE html>
<head>
	<title>GreatMoods | Vice President</title>
</head>

<body>
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <?php include 'sidenav.php' ; ?>
      
      <div id="content">
          	<br />
          	<h3>My Sales People</h3>
          	
          	
		<select class="role4" name="scid" onChange="fetch_select4(this.value);" required>
	      		<option>Select Sales Coordinator</option>
	      		<option value="<?  echo $bob;?>">GreatMoods Coordinator</option>
	      		<?
	      		$sql = "SELECT * FROM distributors WHERE vpID = '$userID' AND role = 'SC'";
			$result2 = mysqli_query($link, $sql)or die ("couldn't execute query distrubutors.".mysqli_error($link));
		
			while($row2 = mysqli_fetch_assoc($result2))
			{
	                   echo '<option value="'.$row2[loginid].'">'.$row2['FName'].' '.$row2[LName].'</option>';
		        }
		        ?>
      		</select>
      		<br><br>
      		<div id="cd">
		<table class="table table-bordered table-striped">
		    <thead>
		<tr>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Email Address</th>
		<th>Phone</th>
		<th>Role</th>
		<th>Actions</th>
		</tr></thead>
		<?
		$sql = "SELECT * FROM distributors WHERE vpID = '$userID' AND role = 'SC'";
		$result2 = mysqli_query($link, $sql)or die ("couldn't execute query distrubutors.".mysqli_error($link));
	
		while($row2 = mysqli_fetch_assoc($result2))
		{
		  $coordID = $row2['loginid'];
		  echo '<tr><td>'.$row2['FName'].'</td><td>'.$row2['LName'].'</td><td>'.$row2['email'].'</td><td>'.$row2['workPhone'].'</td><td>'.$row2['role'].'</td><td>
		  <a href="editCoordinator.php?coord='.$coordID.'"><input class="redbutton" type="button" value="Edit Acct" title="Edit Account"/></a>
		 <!-- <a href="#"><input class="redbutton" type="button" value="View Accounts" title="View Accounts"/></a>-->
	<a href="viewReports2.php"><input class="redbutton" type="button" value="View Reports" title="View Reports"/></a>
	<!--<a href="viewAccounts.php"><input class="redbutton" type="button" value="View Accounts" title="View Accounts"/></a>
	<a href="#"><input class="redbutton" type="button" value="View Reps" title="View Reps"/></a>-->
		  </td></tr>';
		}
		echo '</table>';
		?>
    </table></div>
  </div> <!--end content -->
  
      <?php include 'footer.php' ; ?>   
</div> <!--end container-->

</body>
</html>

<?php
   ob_end_flush();
?>