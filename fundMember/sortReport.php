<?php
    session_start();
    include '../includes/connection.inc.php';
    $link = connectTo();
    $id = $_SESSION['userId'];
    $groupid = $_SESSION['groupid'];
    $link = connectTo();
    $member = $_POST['get_option']; 
  
   if(isset($_POST['get_option']))
   { 
      //sort data
      switch ($member) 
      {
       case "CustomerF":
          $query = "SELECT * FROM IPNdata WHERE groupID = '$groupid' ORDER BY Buyer asc ";
          break;
       case "CustomerL":
          $query = "SELECT * FROM IPNdata WHERE groupID = '$groupid' ORDER BY Buyer desc ";
          break;
      case "Amount":
         $query = "SELECT * FROM IPNdata WHERE groupID = '$groupid' ORDER BY Amount desc";
          break;
      case "Date":
         $query = "SELECT * FROM IPNdata WHERE groupID = '$groupid' ORDER BY Formatteddate";
         break;
        default:
        $query = "SELECT * FROM IPNdata WHERE groupID = '$groupid'";
      }
      
     
     $result = mysqli_query($link, $query)or die("MySQL ERROR on query c: ".mysqli_error($link));
    
      echo '<thead><tr> 
			        <th class="order">Order #</th>
			        <th class="date">Date</th>
			        <th class="buyer">Buyer Name</th>
			        <th class="email">Buyer Email</th>
			        <th class="email">Buyer Phone</th>
			        <th class="product">Product</th>
			        <th class="qty">Quantity</th>
				<th class="amt">Amount</th>
				<th class="amt">Total Earned</th>
			</tr></thead>';
     while($salesRow = mysqli_fetch_assoc($result))
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
			  
			  $total = "SELECT SUM(Amount) as total FROM IPNdata WHERE groupID = '$groupid'";
				$totalResult = mysqli_query($link, $total)or die("MySQL ERROR on totla query 1: ".mysqli_error($link));
				$rowT = mysqli_fetch_assoc($totalResult);
				
				$total2 = "SELECT SUM(quantity) as totalitems FROM IPNdata WHERE groupID = '$groupid'";
				$totalResult2 = mysqli_query($link, $total2)or die("MySQL ERROR on totla query 2: ".mysqli_error($link));
				$rowU = mysqli_fetch_assoc($totalResult2);  
				
				echo'<tr class="total">
					<td class="order" colspan="1">TOTALS:</td>
					<td class="date" colspan="1"></td>
					<td class="buyer" colspan="1"></td>
					<td class="email" colspan="1"></td>
					<td class="product" colspan="1"></td>
					<td class="product" colspan="1"></td>
					<td class="qty" colspan="1">'.$rowU[totalitems].' Items</td>
					<td class="amt" colspan="1">$'.$rowT[total].'</td>
					<td class="amt" colspan="1">$';
				$totalEarned = $rowT['total'] * .35;
				$totalEarned = round($totalEarned, 2);
				echo $totalEarned;
				echo '</td>
				</tr> ';
   
     exit;
   }

?>