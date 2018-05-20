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
   $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error($link));
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
          <h2>Fundraiser Sales Reports</h2>
          <h3></h3>
    
	  <form>
	         <select class="" name="groupid" id="groupid" onchange="fetch_select5(this.value);" required>
			<option value="0">Select Fundraiser Account</option>
			<?php 
				$getAccount = "SELECT * FROM Dealers WHERE setuppersonid = '$userID' AND isMainGroup = 0 ORDER BY Dealer asc";
				
				$result = mysqli_query($link, $getAccount)
				or die("MySQL ERROR om query 1: ".mysqli_error($link));
				
				while($row = mysqli_fetch_assoc($result)) {
		  			$dealerName = $row['Dealer'];
		  			echo '
		  				<option value="'.$row['loginid'].'">'.$dealerName.' '.$row['DealerDir'].'</option>
		  			';
	        		}
			?>
	  </select>
		<select name="sort" id="sort" onChange="fetch_select4(this.value);">
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
			        <th class="order">Order #</th>
			        <th class="date">Date</th>
			        <th class="buyer">Buyer Name</th>
			        <th class="email">Buyer Email</th>
			        <th class="email">Buyer Phone</th>
			        <th class="product">Product</th>
			        <th class="qty">Quantity</th>
				<th class="amt">Amount</th>
				<th class="amt">Fund Earned</th>
				<th class="amt">Commission</th>
			</tr></thead>
			<!--<?php
			
			  $getSales = "SELECT * FROM IPNdata WHERE groupID = '$groupID'";
			  $salesResult = mysqli_query($link, $getSales)or die("MySQL ERROR on sales query 1: ".mysqli_error($link));
			  while($salesRow = mysqli_fetch_assoc($salesResult))
			  {
			     $memberEarned = $salesRow[Amount] * .35;
			     $memberEarned = round($memberEarned, 2); 
			     echo '<tr>
				     <td class="order">'.$salesRow['order_id'].'</td> 
				     <td class="date">'.$salesRow['Date'].'</td>
				     <td class="buyer">'.$salesRow['Buyer'].'</td>
				     <td class="email">'.$salesRow['Email'].'</td>
				     <td class="email">'.$salesRow['Phone'].'</td>
				     <td class="product">'.$salesRow['Product'].'</td>
				     <td class="qty">'.$salesRow['quantity'].'</td>
				     <td class="amt">$'.$salesRow['Amount'].'</td>
				     <td class="amt">$'.$salesRow['Amount'].'</td>    
			     </tr>';
			  }
			?>
			<tr class="total">
				<td class="order" colspan="1">TOTALS:</td>
				<td class="date" colspan="1"><?php
				$total = "SELECT SUM(Amount) as total FROM IPNdata WHERE groupID = '$groupID'";
				$totalResult = mysqli_query($link, $total)or die("MySQL ERROR on totla query 1: ".mysqli_error($link));
				$rowT = mysqli_fetch_assoc($totalResult);
				
				$total2 = "SELECT SUM(quantity) as totalitems FROM IPNdata WHERE groupID = '$groupID'";
				$totalResult2 = mysqli_query($link, $total2)or die("MySQL ERROR on totla query 2: ".mysqli_error($link));
				$rowU = mysqli_fetch_assoc($totalResult2);
				//echo $rowU['totalitems'];
				
				?></td>
				<td class="buyer" colspan="1"></td>
				<td class="email" colspan="1"></td>
				<td class="product" colspan="1"></td>
				<td class="product" colspan="1"></td>
				<td class="qty" colspan="1"></td>
				<td class="amt" colspan="1"><?php echo $rowU['totalitems']; ?> Items</td>
				<!--<td class="total" colspan="1">$<?php echo $rowT['total']; ?></td>-->
			</tr>
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