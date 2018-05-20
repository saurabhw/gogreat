<?php
      session_start(); // session start
      ob_start();
      ini_set('display_errors', '0'); // errors reporting on
      error_reporting(E_ALL); // all errors
      require_once('../includes/functions.php');
      require_once('../includes/connection.inc.php');
      require_once('../includes/imageFunctions.inc.php');
      $link = connectTo();
      $userID = $_SESSION['userId'];
	if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "SC")
       {
            header('Location: ../index.php');
            exit;
       }
	
        $table = "Dealers";
        //get id and all rows of fundraiser to delete
        //$group = mysqli_real_escape_string($link, $_POST['clubid']); 
        $group = $_POST['clubid'];
        
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
        
        $queryW = "Select * FROM orgMembers WHERE fundraiserID = '$group'";
	$resultW = mysqli_query($link, $queryW)or die ("couldn't execute query W.".mysqli_error($link));
        $rowW = mysqli_fetch_assoc($resultW);
        $fn = $rowW['orgFName'];
        $ln = $rowW['orgLName'];
        $parent = $rowW['fund_owner_id'];
        
          
       
       $query1 = "SELECT * FROM user_info WHERE userInfoID='$userID'";
       $result1 = mysqli_query($link, $query1)or die ("couldn't execute query.".mysqli_error($link));
       $row1 = mysqli_fetch_assoc($result1);
       $myPic = $row1['picPath'];
       
       
 	
?>

<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8" />
	<title>Delete Fundraiser</title>
	<script type="text/javascript">
	function getSelectedValue() { 
	 var val = document.getElementById("fundraisingType").value;
	 //alert("You selected : " + val);
         document.getElementById("choice").value = val;
        } 
	</script>
	<link href="../css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
	<link href="../css/setupFormStyles.css" rel="stylesheet" type="text/css" />
	</head>
	<body id="type">
<div id="container">
      
      <?php include 'header.inc.php' ; ?>
      <?php include 'sidenav.php' ; ?>
      <div id="contentMain858">
    
	<div>
	<br>
	<br>
	<h2 align="center">Delete <? echo $name.' '.$type; ?>?</h2>
	<div id="border">
		<div class="warning">
			<h3>Warning!</h3> 
         		<p>Deletion of this account will be final without recovery.<br>It will be necessary for you to recreate the account.</p>
         		<table>
         			<form action="fundDestroy.php" method="post">
         			<tr>
					<td><? echo $name;?></td><td><? echo $type;?></td>
         			</tr>
        			<tr>
         				<td><? echo $aa1;?></td><td><? echo $aa2;?></td>
		   	     	</tr>
         			<tr>
         				<td><? echo $cct;?></td><td><? echo $zpp;?></td>
         			</tr>
		    	   	<tr>
         				<td><? echo $sst;?></td><td><input type="hidden" name="clubid" value="<? echo $group; ?>" /><input type="hidden" name="rid" value="<? echo $userID; ?>" /></td>
		        	</tr>
         			<tr>
         				<td><input type="submit" name="submit" class="redbutton" value="Delete This Account" /></td>
         			</tr>
         			</form>
         		</table>
		</div>
		</div>
	</div>
    <!--end distributor1-->
  
    
    

  </div>
      <!--end contentMain858-->
      <?php include 'footer.php' ; ?>
    </div>
<!--end container-->

</body>
</html>

<?php
   ob_end_flush();
?>