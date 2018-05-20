<?php
session_start(); // session start
ob_start();
ini_set('display_errors', '0'); // errors reporting on
error_reporting(E_ALL); // all errors
require_once('../includes/functions.php');
require_once('../includes/connection.inc.php');
require_once('../includes/imageFunctions.inc.php');
$link = connectTo();
	if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "RP")
        {
            header('Location: ../index.php');
            exit;
        }
	
        $table = "Dealers";
        //get id and all rows of fundraiser to delete
        //$group = mysqli_real_escape_string($link, $_POST['clubid']); 
        $group = $_POST['memberid'];
        $query = "Select * FROM $table WHERE loginid='$group'";
	$result = mysqli_query($link, $query)or die ("couldn't execute query.".mysqli_error($link));
        $row = mysqli_fetch_assoc($result);
        $name = $row['Dealer'];
        $type = $row['DealerDir'];
        $aa1 = $row['Address1'];
        $aa2 = $row['Address2'];
        $cct = $row['City'];
        $sst = $row['State'];
        $zpp = $row['Zip'];
        $parent = $row['setuppersonid'];
        
        $group = $_POST['memberid'];
        $query = "Select * FROM orgMembers WHERE fundraiserID='$group'";
	$resultM = mysqli_query($link, $query)or die ("couldn't execute query.".mysqli_error($link));
        $rowM = mysqli_fetch_assoc($resultM);
        
        $first_name = $rowM['orgFName'];
        $last_name = $rowM['orgLName'];
        
        
          
       $userID = $_SESSION['userId'];
       $query1 = "SELECT * FROM user_info WHERE userInfoID='$userID'";
       $result1 = mysqli_query($link, $query1)or die ("couldn't execute query.".mysqli_error($link));
       $row1 = mysqli_fetch_assoc($result1);
       $pic = $row1['picPath'];
       
       
 	
?>

<!DOCTYPE html>
<head>
	<title>GreatMoods | Delete Fundraiser</title>
	<script type="text/javascript">
	function getSelectedValue() { 
	 var val = document.getElementById("fundraisingType").value;
	 //alert("You selected : " + val);
         document.getElementById("choice").value = val;
        } 
	</script>
<style>
#border{
background-color:#f8f8f8;
box-shadow: 0px 0px 15px #888888;
padding:15px 35px 40px 35px;  
}
</style>
</head>

<body>      
      <?php include 'header.inc.php' ; ?>
      <?php include 'sideLeftNav.php' ; ?>
    <div class="container" id="getStartedContent" >
        <div class="row-fluid">
 <div class="page-header">
	<h2 align="center">Delete <? echo $first_name.' '.$last_name; ?>?</h2>
</div>
<div class="col-md-7 col-md-push-2" id="bizAssociate-col">
<br>
<div id="border">
		<div class="warning">
			<h3>Warning!</h3> 
    <hr style="border-color:#b8b8b8;">
         		<p class="redtext">Deletion of this account will be final without recovery.<br>It will be necessary for you to recreate the account.</p>

         		<form action="memberDestroy.php" method="post">
         			<p><? echo $name;?><br>
         			<? echo $type;?><br>
         			<? echo $aa1;?> <? echo $aa2;?><br>
         			<? echo $cct;?>, <? echo $sst;?> <? echo $zpp;?>
         			</p>

         			<input type="hidden" name="clubid" value="<? echo $group; ?>" />
         			<input type="hidden" name="parent" value="<? echo $parent; ?>" />
         			<input type="submit" name="submit" class="medredbutton" value="Delete This Account" />
         		</form>
		</div>
  </div> <!--end content -->
	    </div>
</div>
</div> <!--end container-->	
  <br>
  
      <?php include 'footer.php' ; ?>
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