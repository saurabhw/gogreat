<?php
        session_start();
	ob_start();
	include'../../includes/connection.inc.php';
	$link = connectTo();
	
	$group = mysqli_real_escape_string($link, $_POST['clubid']);
	$rep = mysqli_real_escape_string($link, $_POST['repid']); 
        $table = "Dealers";
        $table1 = "users";
        $table2 = "user_info";
        $table3 = "orgMembers";
        $table4 = "orgContacts";
        
        
        //get loginid of the clubs and the members under them
        $query1 = "SELECT * FROM $table WHERE loginid ='$group'";
	$result1 = mysqli_query($link, $query1)or die ("couldn't execute query 1.".mysql_error());
	$row1 = mysqli_fetch_assoc($result1);
	$log_in_club = $row1['loginid'];
	$clubEmail = $row1['email'];
        
        $query2 = "SELECT * FROM $table WHERE setuppersonid ='$log_in_club'";
	$result2 = mysqli_query($link, $query2)or die ("couldn't execute query 2.".mysql_error());
	$row2 = mysqli_fetch_assoc($result2);
	$log_in_member = $row2['loginid'];
	$email = $row2['email'];
	
	//delete their contacts
	$query3 = "DELETE FROM $table4 WHERE fundraiserID ='$group'";
	$result3 = mysqli_query($link, $query3)or die ("couldn't execute query 3.".mysql_error());
	
	$query4 = "DELETE FROM $table4 WHERE fundraiserID ='$log_in_member'";
	$result4 = mysqli_query($link, $query4)or die ("couldn't execute query 4.".mysql_error());
	
	//delete members
	$query5 = "DELETE FROM $table3 WHERE fundraiserID ='$log_in_member'";
	$result5 = mysqli_query($link, $query5)or die ("couldn't execute query 5.".mysql_error());
	
	$query6 = "DELETE FROM $table1 WHERE username ='$email'";
	$result6 = mysqli_query($link, $query6)or die ("couldn't execute query 6.".mysql_error());
	
	$query7 = "DELETE FROM $table2 WHERE email ='$email'";
	$result7 = mysqli_query($link, $query7)or die ("couldn't execute query 7.".mysql_error());
	
	$query8 = "DELETE FROM $table WHERE loginid ='$log_in_member'";
	$result8 = mysqli_query($link, $query8)or die ("couldn't execute query 8.".mysql_error());
	
	//delete club
	$query9 = "DELETE FROM $table1 WHERE username ='$clubEmail'";
	$result9 = mysqli_query($link, $query9)or die ("couldn't execute query 9.".mysql_error());
	
	$query10 = "DELETE FROM $table2 WHERE email ='$clubEmail'";
	$result10 = mysqli_query($link, $query10)or die ("couldn't execute query 10.".mysql_error());
	
	$query11 = "DELETE FROM $table WHERE loginid ='$log_in_club'";
	$result11 = mysqli_query($link, $query11)or die ("couldn't execute query 11.".mysql_error());
	
	if($result1 && $result2 && $result3 &&
	   $result4  && $result5 && $result6 &&
	   $result7 && $result8 && $result9 && 
	   $result10 && $result11)
	{
	header("Location: viewAccounts.php?rep=$rep");
	}
?>