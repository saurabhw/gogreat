<?php
    include '../includes/autoload.php';
    $id = $_SESSION['userId'];
    $groupid = $_SESSION['groupid'];
   
    $member = $_POST['get_option'];
   
   if(isset($_POST['get_option']))
   { 
                  echo'<thead><tr> 
			        <th class="order">Order #</th>
			        <th class="date">Date</th>
			        <th class="buyer">Buyer Name</th>
			        <th class="email">Buyer Email</th>
			        <th class="email">Buyer Phone</th>
			        <th class="product">Product</th>
			        <th class="qty">Quantity</th>
				<th class="amt">Amount</th>
				<th class="amt">Fund Earned</th>
				<th class="amt">RP %</th>
				<th class="amt">My %</th>
			</tr></thead>';
   
			  $getMemberSales = "SELECT * FROM IPNdata WHERE groupID = '$member'";
			  $salesMemberResult = mysqli_query($link, $getMemberSales)or die("MySQL ERROR on sales query 2: ".mysqli_error($link));
			  if(mysqli_num_rows($salesMemberResult) < 0)
			  {
			     echo '<tr><td>No Sales Recorded.</td></tr>';
			  }
			  while($memberRow = mysqli_fetch_assoc($salesMemberResult))
			  {
			     $memberEarned = $memberRow[Amount] * .35;
			     $memberEarned = round($memberEarned, 2);
			     $repCom = $memberRow[Amount] * .06;
			     $repCom = round($repCom, 2);
			     $myCom = $memberRow[Amount] * .01;
			     $myCom = round($myCom, 2);
			     echo '<tr>
				     <td class="order">'.$memberRow['order_id'].'</td> 
				     <td class="date">'.$memberRow['Date'].'</td>
				     <td class="buyer">'.$memberRow['Buyer'].'</td>
				     <td class="email">'.$memberRow['Email'].'</td>
				     <td class="email">'.$memberRow['Phone'].'</td>
				     <td class="product">'.$memberRow['Product'].'</td>
				     <td class="qty">'.$memberRow['quantity'].'</td>
				     <td class="amt">$'.$memberRow['Amount'].'</td>
				     <td class="amt">$'.$memberEarned.'</td>
				     <td class="amt">$'.$repCom.'</td>
				     <td class="amt">$'.$myCom.'</td> 
			     </tr>';
			}
		
			
			echo' <tr class="total">
				<td class="order" colspan="1">TOTALS:</td>
				<td class="date" colspan="1">';
				$total4 = "SELECT SUM(Amount) as total FROM IPNdata WHERE groupID = '$member'";
				$totalResult4 = mysqli_query($link, $total4)or die("MySQL ERROR on totl4 query 1: ".mysqli_error($link));
				$rowT4 = mysqli_fetch_assoc($totalResult4);
				
				$total3 = "SELECT SUM(quantity) as totalitems FROM IPNdata WHERE groupID = '$member'";
				$totalResult3 = mysqli_query($link, $total3)or die("MySQL ERROR on totl3 query 2: ".mysqli_error($link));
				$rowU2 = mysqli_fetch_assoc($totalResult3);
				//echo $rowU2['totalitems'];
				$memberTotal = $rowT4['total'] * .35;
			        $memberTotal = round($memberTotal, 2);
			        $repTotal = $rowT4['total'] * .06;
			        $repTotal = round($repTotal, 2);
			        $myTotal = $rowT4['total'] * .01;
			        $myTotal = round($myTotal, 2);
				echo '</td>
				<td class="buyer" colspan="1"></td>
				<td class="email" colspan="1"></td>
				<td class="product" colspan="1"></td>
				<td class="product" colspan="1"></td>
				<td class="qty" colspan="1">'.$rowU2['totalitems'].' Items</td>
				<td class="amt" colspan="1">$'.$rowT4['total'].'</td>
				<td class="amt" colspan="1">$'.$memberTotal.'</td>
				<td class="amt" colspan="1">$'.$repTotal.'</td>
				<td class="amt" colspan="1">$'.$myTotal.'</td>
			</tr>';
   
     exit;
   }

?>