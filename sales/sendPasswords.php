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
     $userID = $_SESSION['userId'];
  
     $query = "SELECT * FROM user_info 	WHERE userInfoID='$userID'";
     $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysqli_error($link));
     $row = mysqli_fetch_assoc($result);
     $myPic = $row['picPath'];
?>


<!DOCTYPE html>
<head>
	<title>Send Passwords</title> 
<style>
    .form-control{
        margin-bottom:1rem;
    }
    label{
        margin-top:1rem;
    }
    .interim-header{
        margin: 4rem 0 -2rem 0;
    }
    	    #border{
background-color:#f8f8f8;
box-shadow: 0px 0px 15px #888888;
padding:15px 35px 40px 35px; 
}
</style>
</head>
	
<body>
<?php include 'header.inc.php' ; ?>
<?php include 'sidenav.php' ; ?>
<div class="container" id="sendPasswordsContent" >
    <div class="row row-flex">
            
    <div class="page-header col-md-12">
        <h2 align="center">Send Member Passwords</h2>
    </div> 
    
    <div class=" col-md-7 col-md-push-2" id="sendPasswords">
<div style="margin-top:35px;" id="border">
       <form action="newEmail.php" method="get" name="" id="">
			<div class="row" style="margin-left:3px;">
				<label for-"rpid" id="hd_rp4">Representive:</label>
			    <select class="form-control" name="rpid" id="rpid" onChange="fetch_select6(this.value);" required>
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
			    <select class=" form-control" name="groupid" id="groupid" onChange="fetch_select19(this.value);" required>
					<option value="">Select Group</option>	
				</select><br>
						
			</div> <!-- end row -->
 		<div class="table-responsive">
 		
		<div id="recipients" class="table-condensed table-striped table-bordered table-hover"><!-- need to somehow markup ajax table -->
		<br />
		<b>&nbsp;&nbsp;Members who have not had their password sent will appear here.</b>
		<br />
		<br />
		</div>
		<br><br>
		<input class="btn btn-danger btn-md pull-right" type="submit" name="submit" value="Send Passwords" />
		</form>
 		</div>
      </div> <!--end send pws col wrap -->
    </div><!-- end row -->
</div> <!--end container-->
</div>
 <br>     
<?php include '../footer.php' ; ?>

</body>
</html>
<!--<pre>
<?php if ($_POST && $mailSent){
	echo htmlentities($message, ENT_COMPAT, 'UTF-8')."\n";
	echo 'Headers: '.htmlentities($headers, ENT_COMPAT, 'UTF-8');
} ?>
</pre>-->
<?php
   ob_end_flush();
?>