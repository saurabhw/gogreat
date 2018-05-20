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
          $_SESSION['role'] = "RP";
          $_SESSION['home'] = "setupEditWebsite/editClub.php";
       }
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
   $table = "Dealers";

   $userID = $_SESSION['userId'];
   $query = "SELECT * FROM user_info WHERE userInfoID='$userID'";
   $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysqli_error($link));
   $row = mysqli_fetch_assoc($result);
   $cn = $row['companyName'];
   $fn = $row['FName'];
   $mn = $row['MName'];
   $ln = $row['LName'];
   $sn = $row['ssn'];
   $a1 = $row['address1'];
   $a2 = $row['address2'];
   $ct = $row['city'];
   $st = $row['state'];
   $zp = $row['zip'];
   $email = $row['email'];
   $hp = $row['homePhone'];
   $cp = $row['cellPhone'];
   $fb = $row['fbPage'];
   $tw = $row['twitter'];
   $li = $row['linkedin'];
   $pp = $row['userPaypal'];
   $pic = $row['picPath'];
   $ftxin = $row['fedtin'];
   $stxin = $row['statetin'];
   $nonp = $row['threec'];
   $myPic = $row['picPath'];
       
?>

<!DOCTYPE html>
<head>
	<title>View Fundraising Accounts</title>
</head>

<body>
<div id="container">
      
	<?php include 'header.inc.php' ; ?>
	<?php include 'sidenav.php' ; ?>
	
      
    <div id="content">
   
	<h2 align="center">View Accounts</h2>
	<h3>Select An Account Below</h3>
	
					
				<label for="rpid" id="hd_rp4">Representive:</label>
			    <select class="" name="rpid" id="rpid" onChange="fetch_select6(this.value);" required>
			        <option value="">Select Representative</option>
			        <?
				      		$sql = "SELECT * FROM distributors WHERE setupID = '$userID' AND role = 'RP'";
						$result2 = mysqli_query($link, $sql)or die ("couldn't execute query distrubutors.".mysqli_error($link));
					
						while($row2 = mysqli_fetch_assoc($result2))
						{
				            echo '<option value="'.$row2[loginid].'">'.$row2['FName'].' '.$row2[LName].'</option>';
					    }
					 ?>
				      		
			      		</select>
			      	<label for="groupid" id="hd_gmfr4">Fundraiser Account:</label>
					<select class="" name="groupid" id="groupid" onchange='showUser(this.value)'> required>
						<option value="">Select Group</option>	
					</select>
						
		<br>
		<div id="">
			<div id="txtHint"><b>Account Groups will display here.<b></div>
		</div>
		
	<p>&nbsp;</p>
	</div> <!--end content-->
  
<?php include 'footer.php' ; ?>
</div> <!--end container-->

</body>
</html>

<?php
   ob_end_flush();
?>