<?php
   include 'includes/connection.inc.php';
 $link = connectTo();
 $today = date('Y-m-d');
 $receivers = array();
 $query = "SELECT * FROM IPNdata WHERE Date='$today' LIMIT 250";
 $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error());
 while($row = mysqli_fetch_assoc($result))
 { 
        $memberID = $row['Rep'];
	$amount = $row['Amount'];
	$orderNum = $row['order_id'];
	//echo $memberID;
	//get the parent id of member who sold basket
	$query2 = "SELECT * FROM Dealers WHERE loginid='$memberID'";
	$result2 = mysqli_query($link, $query2) or die ("couldn't execute query 2.".mysql_error());
	$row2 = mysqli_fetch_assoc($result2);
	$groupPayMail = $row2['PaypalEmail'];
	$rep = $row2['setuppersonid'];
	$groupAmount = $amount * 0.35;
	$amount = $amount - $groupAmount;
	$repAmount = $amount * 0.06;
	$amount = $amount - $repAmount;
	$groupArray = array(
        'receiverEmail' => "$groupPayMail", 
        'amount' => "$groupAmount",
        'uniqueID' => "", // 13 chars max
        'note' => " Creatmoods Fundraising Commission" 
        );

	//get rep details
	$query3 = "SELECT * FROM user_info WHERE userInfoID='$rep'";
	$result3 = mysqli_query($link, $query3)or die ("couldn't execute query 3.".mysql_error());
	$row3 = mysqli_fetch_assoc($result3);
	$scid = $row3['salesPerson'];
	$repPayMail = $row3['userPaypal'];
	$repArray = array(
        'receiverEmail' => $repPayMail, 
        'amount' => $repAmount,
        'uniqueID' => "", // 13 chars max
        'note' => " Creatmoods Fundraising Commission" 
        );
	
	//get sales coordinator
	$query4 = "SELECT * FROM user_info WHERE userInfoID='$scid'";
	$result4 = mysqli_query($link, $query4)or die ("couldn't execute query 4.".mysql_error());
	$row4 = mysqli_fetch_assoc($result4);
	$scPayMail = $row4['userPaypal'];
	$scAmount = $amount * 0.01;
	$amount = $amount - $scAmount;
	$vpID = $row4['salesPerson'];
	$scArray = array(
        'receiverEmail' => "$scPayMail", 
        'amount' => "$scAmount",
        'uniqueID' => "", // 13 chars max
        'note' => " Creatmoods Fundraising Commission" 
    );
	
	//get VP details
	$query5 = "SELECT * FROM user_info WHERE userInfoID ='$vpID'";
	$result5 = mysqli_query($link,$query5)or die ("couldn't execute query 5.".mysql_error());
	$row5 = mysqli_fetch_assoc($result5);
	$vpAmount = $amount * 0.005;
	$amount = $amount - $vpAmount;
	$vpPayMail = $row5['userPaypal'];
	$exID = $row4['salesPerson'];
	$vpArray = array(
        'receiverEmail' => "$vpPayMail", 
        'amount' => "$vpAmount",
        'uniqueID' => "", // 13 chars max
        'note' => "Creatmoods Fundraising Commission" // I recommend use of space at beginning of string.
        );
	array_push($receivers,$groupArray);
	array_push($receivers,$repArray);
	array_push($receivers,$scArray);
	array_push($receivers,$vpArray);
	
	

/*$receivers = array(
  0 => array(
    'receiverEmail' => "clbj35@yahoo.com", 
    'amount' => "0.01",
    'uniqueID' => "id_001", // 13 chars max
    'note' => " pagamento de comissão Fashiontuts"), // I recommend use of space at beginning of string.
  1 => array(
    'receiverEmail' => "clbj35@yahoo.com",
    'amount' => "0.02",
    'uniqueID' => "id_002", // 13 chars max, available in 'My Account/Overview/Transaction details' when the transaction is made 
    'note' => " pagamento de comissão fashiontuts"  // space again at beginning.
  )
);
 */
   
   print_r($receivers);

  } 
?>