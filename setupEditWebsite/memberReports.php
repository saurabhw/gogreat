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
       if($_SESSION['freeze'] == "TRUE")
       {
          // echo "Account Frozen";
           header('Location: accountEdit.php');
       }
       
       $userID = $_SESSION['userId'];
       $query = "SELECT * FROM user_info WHERE userInfoID='$userID'";
       $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysqli_error($link));
       $row = mysqli_fetch_assoc($result);
       //$fundID = $_GET['group'];
       $pic = $row['picPath'];
       
?>
<!DOCTYPE html>
<head>
	<title>Sales Reports</title>
</head>

<body>
<div id="container">
     <?php include 'header.inc.php' ; ?>
      <?php include 'sideLeftNav.php' ; ?>

      <div id="content">
      <br />
          <h2>Member Sales Reports</h2>
          <h3></h3>
    
	  <form>
		
	
       
       <select class="role4" name="groupid" id="groupid" onChange="fetch_select2(this.value);">
	<option value="0">Select FR Account</option>
	<?php 
	
	   $getAccount = "SELECT * FROM Dealers WHERE setuppersonid = '$userID' AND isMainGroup = 0 ORDER BY Dealer asc";
	   $result = mysqli_query($link, $getAccount)or die("MySQL ERROR om query 1: ".mysqli_error($link));
	   
	   while($row = mysqli_fetch_assoc($result))
	   {
		$dealerName = $row['Dealer'];
		 echo '<option value="'.$row['loginid'].'">'.$dealerName.' '.$row[DealerDir].'</option>';
	   }
	?>
	</select>
	
	<select class="role4" name="memberid" id="memberid" onChange="fetch_select10(this.value);">
	<option value="">Select Member</option>
	</select>
		
	<select name="sort" id="sort" onChange="fetch_select11(this.value);">
			<option value="">Sort By...</option>
			<option value="CustomerF">Customer First</option>
			<option value="CustomerL">Customer Last</option>
			<option value="Amount">Amount</option>
			<option value="Date">Date</option>
		</select>
		<br><br>
	<table class="table table-bordered table-striped" id="goalreport">
	    <thead>
	<tr> 
			        <th class="gp">Order #</th>
			        <th class="items">Date</th>
			        <th class="items">Buyer Name</th>
			        <th class="whlsle">Buyer Email</th>
			        <th class="whlsle">Buyer Phone</th>
			        <th class="goal">Product</th>
			        <th class="goal">Quantity</th>
				<th class="actual">Amount</th>
				<th class="actual">Earned</th>
				<th class="actual">Commission</th>
			</tr></thead>
		</table>

	</form>

  </div> <!--end content -->
  
      <?php include 'footer.php' ; ?>   
</div> <!--end container-->

</body>
</html>

<?php
   ob_end_flush();
?>