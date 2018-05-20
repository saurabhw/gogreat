<?php
        include '../includes/autoload.php';
	
	$group =  $_POST['clubid'];
	$rep =  $_POST['repid']; 
	
	$query = "Select * FROM Dealers WHERE loginid = '$group'";
	$result = mysqli_query($link, $query)or die ("couldn't execute query.".mysqli_error($link));
        $row = mysqli_fetch_assoc($result);
        $name = $row['Dealer'];
     
        $us = $row['userName'];
        
        $query5 = "DELETE FROM users WHERE username ='$us'";
	$result5 = mysqli_query($link, $query5)or die ("couldn't execute query 5.".mysqli_error($link));
	
	$query6 = "DELETE FROM user_info WHERE email ='$us'";
	$result6 = mysqli_query($link, $query6)or die ("couldn't execute query 6.".mysqli_error($link));
  
	$query1 = "DELETE FROM Dealers WHERE loginid ='$group'";
	$result1 = mysqli_query($link, $query1)or die ("couldn't execute query 1.".mysqli_error($link));
	
	$query3 = "DELETE FROM Dealers WHERE setuppersonid ='$group'";
	$result3 = mysqli_query($link, $query3)or die ("couldn't execute query 3.".mysqli_error($link));
        
	//delete their contacts
	$query2 = "DELETE FROM orgMembers WHERE fund_owner_id ='$group'";
	$result2 = mysqli_query($link, $query2)or die ("couldn't execute query 2.".mysqli_error($link));
	
	//delete their contacts
	/*
	$query3 = "DELETE FROM orgCustomers WHERE fundGroupID ='$group'";
	$result3 = mysqli_query($link, $query3)or die ("couldn't execute query 3.".mysqli_error($link));

	$query4 = "DELETE FROM orgContacts WHERE fund_owner_id ='$group'";
	$result4 = mysqli_query($link, $query4)or die ("couldn't execute query 4.".mysqli_error($link));
        */
	
	if($result1 && $result2 && $result3 && $result5 && $result6)
	{
	   header("Location: editClub.php");
	}
?>