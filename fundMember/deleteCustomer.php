<?php
        session_start();
	ob_start();
	if(($_SESSION['role'] == 'MemberLeader' || $_SESSION['role'] == 'Member') && isset($_SESSION['authenticated']))
       {
          //authenicated
       }
       else
       {
            header('Location: ../index.php');
            exit;
       }
	require_once("../includes/connection.inc.php");
       include('../samplewebsites/imageFunctions.inc.php');
       include("../includes/functions.php");
       $link = connectTo();
       $userID = $_SESSION['userId'];
       $userEmail = $_SESSION['email'];
       $groupID = $_SESSION['groupid'];
       $query1 = "SELECT * FROM Dealers WHERE loginid='$groupID'";
       $result1 = mysqli_query($link, $query1)or die("MySQL ERROR query 1: ".mysqli_error($link));
       $row1 = mysqli_fetch_assoc($result1);
       $dealerID = $row1['loginid'];
       $group = $row1['setuppersonid']; 
       $myPic = $row1['contact_pic'];
       $goal = $row1['goal2'];
       $so_far = getSoloSales($dealerID);
       $banner = $row1['banner_path'];
       
        $conID = $_GET['cust'];
     
        $query = "Select * FROM orgCustomers WHERE customerID='$conID'";
	$result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error());
        $row = mysqli_fetch_assoc($result);
        $fname = $row['first'];
        $lname = $row['last'];
        $email = $row['email'];
    
?>

<!DOCTYPE html>
<head>
	<title>GreatMoods | Delete Contact</title>
	<script type="text/javascript">
	function getSelectedValue() { 
	 var val = document.getElementById("fundraisingType").value;
	 //alert("You selected : " + val);
         document.getElementById("choice").value = val;
        } 
	</script>
</head>
	
<body>
<div id="container">
      <?php include 'header.php' ; ?>
      <?php include 'memberSidebar.php' ; ?>
      
      <div id="content">
		<h1>Delete Contact?</h1>
		<br>
		
		<div class="warning">
			<h3>Warning!</h3> 
			<p>Deletion of this account will be final without recovery.<br>It will be necessary for you to recreate the account.</p>
 			
 			<form action="customer_delete.php" method="post">
 				<p><?php echo $fname.' '.$lname; ?><br>
 				<? echo $st;?>
 				</p>
 				
 				<input type="hidden" name="clubid" value="<? echo $conID; ?>" />
 				<input type="hidden" name="email" value="<? echo $email; ?>" />
 				<input type="submit" name="submit" class="medredbutton" value="Delete This Account" />
 			</form>
		</div>

  </div> <!--end content-->
  
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