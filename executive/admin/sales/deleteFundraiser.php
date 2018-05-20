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
        $table = "Dealers";
        //get id and all rows of fundraiser to delete
        $group = mysqli_real_escape_string($link, $_POST['clubid']); 
        
        $query = "Select * FROM $table WHERE loginid='$group'";
	$result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error());
        $row = mysqli_fetch_assoc($result);
        $name = $row['Dealer'];
        $type = $row['DealerDir'];
        $a1 = $row['Address1'];
        $a2 = $row['Address2'];
        $ct = $row['City'];
        $st = $row['State'];
        $zp = $row['Zip'];
 	
?>

<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8" />
	<title>Delete Fundraiser | Sales Coordinator</title>
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
	<h3>Delete Fundraiser?</h3>
		<div class="warning">
			<h3>Warning!</h3> 
         		<p>Deletion of this accout will be final without recovery.<br>It will be necessary for you to recreate the account.</p>
         		<table>
         			<form action="../destroy2.php" method="post">
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