<?php
    include '../includes/autoload.php';
    $id = $_SESSION['userId'];
    $link = connectTo();
    $member = $_POST['get_option'];
    $groupid = $_POST['get_option2'];  
  
   if(isset($_POST['get_option']))
   { 

      //sort data
      switch ($member) 
      {
       case "CustomerF":
          $query = "SELECT * FROM IPNdata WHERE groupID = '$groupid' ORDER BY Buyer ASC";
          break;
       case "CustomerL":
          $query = "SELECT * FROM IPNdata WHERE groupID = '$groupid' ORDER BY Buyer DESC ";
          break;
      case "Amount":
         $query = "SELECT * FROM IPNdata WHERE groupID = '$groupid' ORDER BY Amount DESC";
          break;
      case "Date":
         $query = "SELECT * FROM IPNdata WHERE groupID = '$groupid' ORDER BY Formatteddate asc";
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
				<th class="amt">Fund Earned</th>
				<th class="amt">RP %</th>
				<th class="amt">My %</th>
			</tr></thead>';
     while($salesRow = mysqli_fetch_assoc($result))
			  {
			     $memberEarned = $salesRow[Amount] * .35;
			     $memberEarned = round($memberEarned, 2);
			     $repCom = $salesRow[Amount] * .06;
			     $repCom = round($repCom, 2);
			     $myCom = $salesRow[Amount] * .01;
			     $myCom = round($myCom, 2);
			     echo '<tr>
				     <td class="order">'.$salesRow['order_id'].'</td> 
				     <td class="date">'.$salesRow['Date'].'</td>
				     <td class="buyer">'.$salesRow['Buyer'].'</td>
				     <td class="email">'.$salesRow['Email'].'</td>
				     <td class="email">'.$salesRow['Phone'].'</td>
				     <td class="product">'.$salesRow['Product'].'</td>
				     <td class="qty">'.$salesRow['quantity'].'</td>
				     <td class="amt">$'.$salesRow['Amount'].'</td>
				     <td class="amt">$'.$memberEarned.'</td>
				     <td class="amt">$'.$repCom.'</td> 
				     <td class="amt">$'.$myCom.'</td> 
			     </tr>';
			  } 
			  
			  $total = "SELECT SUM(Amount) as total FROM IPNdata WHERE groupID = '$groupid'";
				$totalResult = mysqli_query($link, $total)or die("MySQL ERROR on total query 1: ".mysqli_error($link));
				$rowT = mysqli_fetch_assoc($totalResult);
				
				$total2 = "SELECT SUM(quantity) as totalitems FROM IPNdata WHERE groupID = '$groupid'";
				$totalResult2 = mysqli_query($link, $total2)or die("MySQL ERROR on total query 2: ".mysqli_error($link));
				$rowU = mysqli_fetch_assoc($totalResult2);  
				$memberTotal = $rowT['total'] * .35;
			        $memberTotal = round($memberTotal, 2);
			        $repTotal = $rowT['total'] * .06;
			        $repTotal = round($repTotal, 2);
			        $myTotal = $rowT['total'] * .01;
			        $myTotal = round($myTotal, 2);
				echo'<tr class="total">
					<td class="order" colspan="1">TOTALS:</td>
					<td class="date" colspan="1"></td>
					<td class="buyer" colspan="1"></td>
					<td class="email" colspan="1"></td>
					<td class="email" colspan="1"></td>
					<td class="product" colspan="1"></td>
					<td class="amt" colspan="1">'.$rowU['totalitems'].' Items</td>
					<td class="total" colspan="1">$'.$rowT['total'].'</td>
					<td class="amt" colspan="1">$'.$memberTotal.'</td>
				        <td class="amt" colspan="1">$'.$repTotal.'</td>
				        <td class="amt" colspan="1">$'.$myTotal.'</td>
				</tr> ';
   
     exit;
   }

?>