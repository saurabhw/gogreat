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
	
      $userID = $_SESSION['userId'];
      $query1 = "SELECT * FROM user_info WHERE userInfoID='$userID'";
      $result1 = mysqli_query($link, $query1)or die ("couldn't execute query 1.".mysqli_error($link));
      $row1 = mysqli_fetch_assoc($result1);
      $pic = $row1['picPath'];
      
       
        $conID = $_GET['cust'];
     
        $query = "Select * FROM orgCustomers WHERE customerID='$conID'";
	$result = mysqli_query($link, $query)or die ("couldn't execute query.".mysqli_error($link));
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
      <?php include 'header.inc.php' ; ?>
      <?php include 'sideLeftNav.php' ; ?>
      
      <div id="content">
   		<h2 align="center">Delete Customer?</h2>
    		<br>
    		<div id="border">
		<div class="warning">
			<h3>Warning!</h3>
			<p class="redtext">Deletion of this account will be final without recovery.<br>It will be necessary for you to recreate the account.</p>

         		<form action="customer_delete.php" method="post">
         			<p><?php echo $fname.' '.$lname; ?><br>
         			<? echo $st;?></p>
         			
         			<br>
         			
         			<input type="hidden" name="clubid" value="<? echo $conID; ?>" />
         			<input type="hidden" name="email" value="<? echo $email; ?>" />
         			<input type="submit" name="submit" class="medredbutton" value="Delete This Customer" />
         		</form>
		</div> <!-- end warning -->
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