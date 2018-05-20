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
     $userID = $_SESSION['userId'];
  
     $query = "SELECT * FROM user_info 	WHERE userInfoID='$userID'";
     $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysqli_error($link));
     $row = mysqli_fetch_assoc($result);
     $pic = $row['picPath'];
?>


<!DOCTYPE html>
<head>
	<title>Launch Fundraiser</title> 
</head>
	
<body>
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <?php include 'sidenav.php' ; ?>

      
    <div id="content">
    <br />
     <h3>Send Member Passwords</h3>
       <form action="newEmail.php" method="get" name="" id="">
     <div class="row">
				                <span id="hd_rp4">Sales Coordinator</span>
						<span id="hd_rp4">Representive:</span>
						<span id="hd_gmfr4">Fundraiser Account:</span>
						
					</div> <!-- end row -->
					
				<div class="row">
					
				<select class="" name="scid" onChange="fetch_select2(this.value);" required>
				      		<option value="">Select Sales Coordinator</option>
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
			      		<select class="" name="rpid" id="rpid" onChange="fetch_select3(this.value);" required>
			      			<option value="">Select</option>
			      		</select>
					<select class="" name="groupid" onChange="fetch_select19(this.value);" id="groupid" required>
						<option valeu="">Select</option>
					</select>
					</div> <!-- end row -->
 		<div class="graybackground50">
 		
		<div id="recipients">
		<br />
		<b>Members who have not had their password sent will appear here.</b>
		<br />
		<br />
		</div>
	
		<input type="submit" name="submit" value="Send Passwords" />
		<br />
		<br />
		</form>
 		</div>
    	
	
      </div>  <!--end content-->
      
	<?php include 'footer.php' ; ?>
</div> <!--end container-->

</body>
</html>
<pre>
<?php if ($_POST && $mailSent){
	echo htmlentities($message, ENT_COMPAT, 'UTF-8')."\n";
	echo 'Headers: '.htmlentities($headers, ENT_COMPAT, 'UTF-8');
} ?>
</pre>
<?php
   ob_end_flush();
?>