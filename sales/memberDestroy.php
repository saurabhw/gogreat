<?php
        include '../includes/autoload.php';
	
	$group =  $_POST['clubid'];
	$pid = $_POST['pid'];
	$rep =  $_POST['repid']; 
        $table = "Dealers";
        $table1 = "users";
        $table2 = "user_info";
        $table3 = "orgMembers";
        $table4 = "orgContacts";
        $table5 = "orgCustomers";
        
        
        //get loginid of the clubs and the members under them
        $query1 = "SELECT * FROM $table WHERE loginid ='$group'";
	$result1 = mysqli_query($link, $query1)or die ("couldn't execute query 1.".mysqli_error($link));
	$row1 = mysqli_fetch_assoc($result1);
	$log_in_club = $row1['loginid'];
	$clubEmail = $row1['userName'];
	//$parent = $row1['setuppersonid'];
        
        $query2 = "SELECT * FROM $table WHERE setuppersonid ='$log_in_club'";
	$result2 = mysqli_query($link, $query2)or die ("couldn't execute query 2.".mysqli_error($link));
	$row2 = mysqli_fetch_assoc($result2);
	$log_in_member = $row2['loginid'];
	$email = $row2['email'];
	
	//delete their contacts
	//$query3 = "DELETE FROM $table4 WHERE fund_owner_id ='$group'";
	//$result3 = mysqli_query($link, $query3)or die ("couldn't execute query 3.".mysqli_error($link));
	
	
	//delete members
	$query5 = "DELETE FROM $table3 WHERE fundraiserID ='$group'";
	$result5 = mysqli_query($link, $query5)or die ("couldn't execute query 5.".mysqli_error($link));
	/*i
	$query6 = "DELETE FROM $table1 WHERE username ='$clubEmail'";
	$result6 = mysqli_query($link, $query6)or die ("couldn't execute query 6.".mysql_error());
	
	$query7 = "DELETE FROM $table2 WHERE email ='$clubEmail'";
	$result7 = mysqli_query($link, $query7)or die ("couldn't execute query 7.".mysql_error());
	*/
	$query8 = "DELETE FROM $table WHERE loginid ='$group'";
	$result8 = mysqli_query($link, $query8)or die ("couldn't execute query 8.".mysqli_error($link));
	
	/*
	//delete club
	$query9 = "DELETE FROM $table1 WHERE username ='$clubEmail'";
	$result9 = mysqli_query($link, $query9)or die ("couldn't execute query 9.".mysql_error());
	
	$query10 = "DELETE FROM $table2 WHERE email ='$clubEmail'";
	$result10 = mysqli_query($link, $query10)or die ("couldn't execute query 10.".mysql_error());
	
	$query11 = "DELETE FROM $table WHERE loginid ='$group'";
	$result11 = mysqli_query($link, $query11)or die ("couldn't execute query 11.".mysqli_error($link));
	
	$query12 = "DELETE FROM $table WHERE loginid ='$log_in_club'";
	$result12 = mysqli_query($link, $query12)or die ("couldn't execute query 12.".mysqli_error($link));
	
	$query13 = "DELETE FROM $table5 WHERE fundGroupID ='$group'";
	$result13 = mysqli_query($link, $query13)or die ("couldn't execute query 13.".mysqli_error($link));
	*/
	if($result5 && $result8)
	{
	  header('Location: editMembers.php?group='.$pid);
	}
?>