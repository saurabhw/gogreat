<?php
      session_start();

      if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
       
       require_once("../includes/connection.inc.php");
       include('../samplewebsites/imageFunctions.inc.php');
       $link = connectTo();
       $user = $_SESSION['userId'];
       $userName = $_SESSION['email'];
       $groupID = $_SESSION['groupid'];
       $query1 = "SELECT * FROM Dealers WHERE loginid = '$groupID'";
       $result1 = mysqli_query($link, $query1)or die("MySQL ERROR query 1: ".mysqli_error($link));
       $row1 = mysqli_fetch_assoc($result1);
       $dealerID = $row1['loginid'];
       $group = $row1['setuppersonid']; 
       $groupPic = $row1['group_team_pic'];
       
?>
<!DOCTYPE html>
<head>
	<title>Sales Reports</title>
</head>

<body>
<div id="container">
      <?php include 'header.php' ; ?>
      <?php include 'fundSidebar.php' ; ?>

      <div id="content">
      <br />
          <h2>Member Sales Reports</h2>
          <h3></h3>
    
	  <form>
		<!--<h3>Sort</h3>-->
		<select name="sort" id="sort" onChange="fetch_select4(this.value);">
		<option value="">Sort By</option>
		<option value="CustomerF">Customer First</option>
		<option value="CustomerL">Customer Last</option>
		<option value="Amount">Amount</option>
		<option value="Date">Date</option>
		</select>
		
<table class="goalreport" id="goalreport">
			<tr> 
			        <th class="gp">Order #</th>
			        <th class="items">Date</th>
			        <th class="items">Buyer Name</th>
			        <th class="whlsle">Buyer Email</th>
			        <th class="goal">Product</th>
			        <th class="goal">Quantity</th>
				<th class="actual">Amount</th>
			</tr>
		<?php
		  
		  $getMembers = "SELECT * FROM orgMembers WHERE fund_owner_id = '$groupID'";
		  $membersResult = mysqli_query($link, $getMembers)or die("MySQL ERROR on member sales query 1: ".mysqli_error($link));
		  
		while($rowM = mysqli_fetch_assoc($membersResult))
		{
		
		     $getID = $rowM['fundraiserID'];
		     $getMemberSales = "SELECT * FROM IPNdata WHERE Rep = '$getID'";
		     $salesMemberResult = mysqli_query($link, $getSales)or die("MySQL ERROR on sales query 1: ".mysqli_error($link));
			  while($salesMemberRow = mysqli_fetch_assoc($salesMemberResult))
			  {
			     echo '<tr>
			     <td>'.$salesMemberRow[order_id].'</td> 
			     <td>'.$salesMemberRow[Date].'</td>
			     <td>'.$salesMemberRow[Buyer].'</td>
			     <td>'.$salesMemberRow[Email].'</td>
			     <td>'.$salesMemberRow[Product].'</td>
			     <td>'.$salesMemberRow[quantity].'</td>
			     <td>$'.$salesMemberRow[Amount].'</td>   
			     </tr>';
			}
		 }
			?>
			<tr class="total">
				<td class="total" colspan="1">TOTALS:</td>
				<td class="actual" colspan="1"><?php
				$total4 = "SELECT SUM(Amount) as total FROM IPNdata WHERE Rep = '$getID'";
				$totalResult4 = mysqli_query($link, $total4)or die("MySQL ERROR on totl4 query 1: ".mysqli_error($link));
				$rowT4 = mysqli_fetch_assoc($totalResult4);
				
				$total3 = "SELECT SUM(quantity) as totalitems FROM IPNdata WHERE Rep = '$getID'";
				$totalResult3 = mysqli_query($link, $total3)or die("MySQL ERROR on totl3 query 2: ".mysqli_error($link));
				$rowU2 = mysqli_fetch_assoc($totalResult3);
				//echo $rowU2['totalitems'];
				
				?></td>
				<td class="goal" colspan="1"></td>
				<td class="diff" colspan="1"></td>
				<td class="diff" colspan="1"></td>
				<td class="items" colspan="1"><?php echo $rowU2['totalitems']; ?> Items</td>
				<td class="whlsle" colspan="1">$<?php echo $rowT4['total']; ?></td>
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