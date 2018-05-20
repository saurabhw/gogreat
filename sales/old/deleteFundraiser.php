<?php
        session_start();
	ob_start();
	if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
	include'../includes/connection.inc.php';
	$link = connectTo();
        $table = "representatives";
        $table1 = "user_info";
        $table2 = "users";
        //get id and all rows of fundraiser to delete
        $group = mysqli_real_escape_string($link, $_POST['repid']); 
        
        $query = "Select * FROM $table WHERE loginid='$group'";
	$result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error());
        $row = mysqli_fetch_assoc($result);
        $name = $row['companyname'];
        $fname = $row['FName'];
        $lname = $row['LName'];
        $type = $row['DealerDir'];
        $a1 = $row['address1'];
        $a2 = $row['address2'];
        $ct = $row['city'];
        $st = $row['state'];
        $zp = $row['zip'];
 	
?>

<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8" />
	<title>Delete Rep | Sales Coordinator</title>
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
	<h3>Delete <?echo $fname.'&nbsp;'.$lname?>?</h3>
		<div class="warning">
			<h3>Warning!</h3> 
         		<p>Deletion of this accout will be final without recovery.<br>It will be necessary for you to recreate the account.</p>
         		<table>
         			<form action="repDestroy.php" method="post">
         			<tr>
					<td><? echo $name;?></td><td><? echo $type;?></td>
         			</tr>
        			<tr>
         				<td><? echo $a1;?></td><td><? echo $a2;?></td>
		   	     	</tr>
         			<tr>
         				<td><? echo $ct;?></td><td><? echo $zip;?></td>
         			</tr>
		    	   	<tr>
         				<td><? echo $st;?></td><td><input type="hidden" name="clubid" value="<? echo $group; ?>" /></td>
		        	</tr>
         			<tr>
         				<td><input type="submit" name="submit" value="Delete This Account" /></td>
         			</tr>
         			<tr>
         				<td><a href="viewReps.php" /><input type="button" name="back" value="No! No! Cancel" /></a></td>
         			</tr>
         			</form>
         		</table>
		</div>
	</div>
    <!--end distributor1-->
    
    <p>&nbsp;</p>
    
    

  </div>
      <!--end contentMain858-->
      <?php include 'footer.php' ; ?>
    </div>
<!--end container-->

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