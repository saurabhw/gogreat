<?php
      session_start();

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
       $userName = $_SESSION['email'];
       $groupID = $_SESSION['groupid'];
       $query1 = "SELECT * FROM Dealers WHERE loginid='$groupID'";
       $result1 = mysqli_query($link, $query1)or die("MySQL ERROR query 1: ".mysqli_error($link));
       $row1 = mysqli_fetch_assoc($result1);
       $dealerID = $row1['loginid'];
       $group = $row1['setuppersonid']; 
       $myPic = $row1['contact_pic'];
       $twit = $row1['twitter']; 
       $face = $row1['facebook']; 
       //$goal = $row1['goal2'];
       $so_far = getSoloSales($dealerID);
       $banner = $row1['banner_path'];
       
       //get parent info
       $getParent = "SELECT * FROM Dealers WHERE loginid = '$group'";
       $pResult = mysqli_query($link, $getParent)or die ("couldn't execute parent query.".mysql1_error($link));
       $pRow = mysqli_fetch_assoc($pResult);
       $goal = $pRow['goal2'];
       
?>
<!DOCTYPE html>
<head>
	<title>Sales Reports</title>
</head>

<body>
<div id="container">
      <?php include 'header(1).php' ; ?>
      <?php include 'memberSidebar_new.php' ; ?>

      <div class="container" id="fundmemberHome">
      	    <div class="row-fluid row-flex">
          <h1>Your Sales Reports</h1>
          
          <h3></h3>
  <div class="col-md-12 col-lg-11 col-lg-push-1 page-header">
	  <form>
		
		<!-- This alphabet should allow for sorting the data 
		<table id="alphabet">
			<tr>
				<td>A</td>
				<td>B</td>
				<td>C</td>
				<td>D</td>
				<td>E</td>
				<td>F</td>
				<td>G</td>
				<td>H</td>
				<td>I</td>
				<td>J</td>
				<td>K</td>
				<td>L</td>
				<td>M</td>
				<td>N</td>
				<td>O</td>
				<td>P</td>
				<td>Q</td>
				<td>R</td>
				<td>S</td>
				<td>T</td>
				<td>U</td>
				<td>V</td>
				<td>W</td>
				<td>X</td>
				<td>Y</td>
				<td>Z</td>
			</tr>
		</table>
		-->
		<!--<label><b>Sort:</b></label>-->
		<select name="sort" id="sort" onChange="fetch_select4(this.value);">
			<option value="">Sort By...</option>
			<option value="CustomerF">Customer First</option>
			<option value="CustomerL">Customer Last</option>
			<option value="Amount">Amount</option>
			<option value="Date">Date</option>
		</select>
		<br>
		<div id="try"></div>
		<br>
		<table class='table table-bordered table-striped' id="goalreport">
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
				<th class="amt">Total Earned</th>
			</tr></thead>
			<?php
			  $getSales = "SELECT * FROM IPNdata WHERE groupID = '$groupID'";
			  $salesResult = mysqli_query($link, $getSales)or die("MySQL ERROR on sales query 1: ".mysqli_error($link));
			  while($salesRow = mysqli_fetch_assoc($salesResult))
			  {
			     $earned = (double)$salesRow[Amount] * .35;
			     $earned = round($earned, 2);
			     echo '<tr>
			     <td class="order">'.$salesRow[order_id].'</td> 
			     <td class="date">'.$salesRow[Date].'</td>
			     <td class="buyer">'.$salesRow[Buyer].'</td>
			     <td class="email">'.$salesRow[Email].'</td>
			     <td class="email">'.$salesRow[Phone].'</td>
			     <td class="product">'.$salesRow[Product].'</td>
			     <td class="qty">'.$salesRow[quantity].'</td>
			     <td class="amt">$'.$salesRow[Amount].'</td>
			     <td class="amt">$'.$earned.'</td>   
			     </tr>';
			  }
			?>
			<tr class="total">
				<td class="order" colspan="1">TOTALS:</td>
				<td class="date" colspan="1"><?php
				$total = "SELECT SUM(Amount) as total FROM IPNdata WHERE Rep = '$groupID'";
				$totalResult = mysqli_query($link, $total)or die("MySQL ERROR on totla query 1: ".mysqli_error($link));
				$rowT = mysqli_fetch_assoc($totalResult);
				
				$total2 = "SELECT SUM(quantity) as totalitems FROM IPNdata WHERE Rep = '$groupID'";
				$totalResult2 = mysqli_query($link, $total2)or die("MySQL ERROR on totla query 2: ".mysqli_error($link));
				$rowU = mysqli_fetch_assoc($totalResult2);
				//echo $rowU['totalitems'];
				
				?></td>
				<td class="buyer" colspan="1"></td>
				<td class="email" colspan="1"></td>
				<td class="product" colspan="1"></td>
				<td class="product" colspan="1"></td>
				<td class="qty" colspan="1"><?php echo $rowU['totalitems']; ?> Items</td>
				<td class="amt" colspan="1">$<?php echo $rowT['total']; ?></td>
				<td class="amt" colspan="1">$<?php 
				$totalEarned = $rowT['total'] * .35;
				$totalEarned = round($totalEarned, 2);
				echo $totalEarned; ?></td>
			</tr>
		</table>
	</form>
	</div>
   </div><!--end flex div>-->
  </div> <!--end container -->
  
      <?php include 'footer(1).php' ; ?>   
</div> <!--end container-->

</body>
</html>

<?php
   ob_end_flush();
?>