<?php
        include '../includes/autoload.php';
        $table = "representatives";
        $table1 = "users";
        $table2 = "user_info";
        //get id and all rows of fundraiser to delete
        $group = mysqli_real_escape_string($link, $_POST['clubid']); 
        //delete query
        $query = "Delete FROM $table WHERE loginid='$group'";
	$result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error());
	
	$query1 = "Delete FROM $table1 WHERE loginid='$group'";
	$result1 = mysqli_query($link, $query1)or die ("couldn't execute query 1.".mysql_error());
	
	$query2 = "Delete FROM $table2 WHERE loginid='$group'";
	$result2 = mysqli_query($link, $query2)or die ("couldn't execute query 2.".mysql_error());
	if($result)
	{
	header('Location: viewAccounts.php');
	}
?>