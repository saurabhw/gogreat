<?php
        include '../includes/autoload.php';
        $table = "Dealers";
        $table1 = "users";
        $table2 = "user_info";
        $table3 = "representatives";
        //get id and all rows of fundraiser to delete
        $group = mysqli_real_escape_string($link, $_POST['clubid']); 
        
        //delete query
        $query = "SELECT * FROM $table3 WHERE loginid='$group'";
	$result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error());
	$row = mysqli_fetch_assoc($result);
	$email = $row['email'];
	
	$query2 = "DELETE FROM $table3 WHERE loginid='$group'";
	$result2 = mysqli_query($link, $query2)or die ("couldn't execute query 2.".mysql_error());
	
	$query3 = "DELETE FROM $table2 WHERE email='$email'";
	$result3 = mysqli_query($link, $query3)or die ("couldn't execute query 3.".mysql_error());
	
	$query4 = "DELETE FROM $table1 WHERE username='$email'";
	$result4 = mysqli_query($link, $query4)or die ("couldn't execute query 4.".mysql_error());
	
	if($result && $result2 && $result3 && $result4)
	{
	header("Location: viewReps.php");
	}
?>