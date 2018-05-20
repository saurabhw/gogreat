<?php
        session_start();
	ob_start();
	if(!isset($_SESSION['authenticated']))
         {
            header('Location: ../../index.php');
            exit;
         }
	include'../../includes/connection.inc.php';
	$link = connectTo();
        $table = "Dealers";
        $table1 = "user_info";
        $table2 = "users";
        $table3 = "orgMembers";
        
        //get id and all rows of fundraiser to delete
        $group = $_POST['clubid'];
        $group_top =  $_POST['clubid_top'];
        $rep_id = $_POST['repid']; 
        $groupid = $_GET['groupid'];
        $query = "Select * FROM $table3 WHERE fundraiserID='$group'";
	$result = mysqli_query($link, $query)or die ("couldn't execute query 312.".mysql_error());
        $row = mysqli_fetch_assoc($result);
        
        
        $query2 = "Select * FROM $table1 WHERE email='$email'";
	$result2 = mysqli_query($link, $query2)or die ("couldn't execute query 2.".mysql_error());
        $row2 = mysqli_fetch_assoc($result2); 
        $name = $row2['FName'];
        $lname = $row2['LName'];      	
?>


<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8" />
	<title>Delete Club | Sales Coordinator</title>
	<script type="text/javascript">
	function getSelectedValue() { 
	 var val = document.getElementById("fundraisingType").value;
	 //alert("You selected : " + val);
         document.getElementById("choice").value = val;
        } 
	</script>
	<link href="../../css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
	<link href="../../css/setupFormStyles.css" rel="stylesheet" type="text/css" />
	</head>
	<body id="type">
<div id="container">
      
      <?php include 'header.inc.php' ; ?>
      <?php include 'sidenav.php' ; ?>
      
      <div id="contentMain858">
	<div>
	
		<div class="warning">
		<h3>Delete <?echo $name.'&nbsp;'.$lname; echo $group;?> ?</h3>
			<h3>Warning!</h3> 
         		<p>Deletion of this accout will be final without recovery.<br>It will be necessary for you to recreate the account.</p>
         		<table>
         			<form action="memberDestroy.php" method="post">
         			<tr>
					<td><? echo $name.'&nbsp;'.$lname;?></td><td><? echo $type;?></td>
         			</tr>
        			<tr>
         				<td><? echo $a1;?></td><td><? echo $a2;?></td>
		   	     	</tr>
         			<tr>
         				<td><? echo $ct;?></td><td><? echo $zip;?></td>
         			</tr>
		    	   	<tr>
         				<td><? echo $st;?></td><td><input type="hidden" name="clubid" value="<? echo $group; ?>" /><input type="hidden" name="repid" value="<? echo $group_top; ?>" /></td>
		        	</tr>
         			<tr>
         				<td><input type="submit" name="submit" value="Delete This Account" /></td>
         			</tr>
         			<tr>
         				<td></td>
         			</tr>
         			</form><a href="viewAccounts.php?rep=<? echo $rep; ?>" /><input type="button" name="back" value="No! No! Cancel" /></a>
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