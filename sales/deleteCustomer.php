<?php
        include '../includes/autoload.php';
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
      $query1 = "SELECT * FROM user_info WHERE userInfoID='$userID'";
      $result1 = mysqli_query($link, $query1)or die ("couldn't execute query 1.".mysql_error());
      $row1 = mysqli_fetch_assoc($result1);
      $myPic = $row1['picPath'];
      
       
        $conID = $_GET['cust'];
        $conID = ereg_replace("[^0-9]", "", $conID);
        $query = "Select * FROM orgCustomers WHERE customerID='$conID'";
	$result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error());
        $row = mysqli_fetch_assoc($result);
        $fname = $row['first'];
        $lname = $row['last'];
        $email = $row['email'];
    
?>

<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8" />
	<title>GreatMoods | Delete Contact</title>
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
   
    <br>
	<div>
	
		<div class="warning">
			<h3>Delete <?php echo $fname.' '.$lname; ?></h3> 
         		
         		<table class="table table-bordered table-striped">
         			<form action="customer_delete.php" method="post">
         			
		    	   	<tr>
         				<td><? echo $st;?></td><td><input type="hidden" name="clubid" value="<? echo $conID; ?>" /><input type="hidden" name="email" value="<? echo $email; ?>" /></td>
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