<?php
       include '../includes/autoload.php';
	
	$group =  $_POST['clubid'];
	$rep =  $_POST['repid'];
	$parent = $_POST['parent']; 
  
	$query1 = "DELETE FROM Dealers WHERE loginid ='$group'";
	$result1 = mysqli_query($link, $query1)or die ("couldn't execute query 1.".mysqli_error($link));
        
	//delete their contacts
	$query2 = "DELETE FROM orgMembers WHERE fundraiserID ='$group'";
	$result2 = mysqli_query($link, $query2)or die ("couldn't execute query 2.".mysqli_error($link));
	
	//delete their contacts
	$query3 = "DELETE FROM orgCustomers WHERE fundMemberID ='$group'";
	$result3 = mysqli_query($link, $query3)or die ("couldn't execute query 3.".mysqli_error($link));

	$query4 = "DELETE FROM orgContacts WHERE fundraiserID ='$group'";
	$result4 = mysqli_query($link, $query4)or die ("couldn't execute query 4.".mysqli_error($link));

	
	if($result1 && $result2 && $result3 && $result4)
	{
	   header("Location: editMembers.php?group=".$parent);
	}
?>