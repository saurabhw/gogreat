<?php
        session_start();
        if(($_SESSION['role'] == 'MemberLeader' || $_SESSION['role'] == 'Member') && isset($_SESSION['authenticated']))
       {
          //authenicated
       }
       else
       {
            header('Location: ../index.php');
            exit;
       }
	ob_start();
	include'../includes/connection.inc.php';
	$link = connectTo();
        $table = "Dealers";
        $table2 = "orgMembers";
        $table3 = "users";
        $table4 = "user_info";
        //get id and all rows of fundraiser to delete
        $group = mysqli_real_escape_string($link, $_POST['clubid']); 
        $person = mysqli_real_escape_string($link, $_POST['user']); 
        $email = mysqli_real_escape_string($link, $_POST['user_email']); 
        //delete query
        $query = "Delete FROM $table WHERE loginid='$group'";
	$result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error());
	
	$query1 = "Delete FROM $table2 WHERE fundraiserID='$group'";
	$result1 = mysqli_query($link, $query1)or die ("couldn't execute query1.".mysql_error());
	
	$query2 = "Delete FROM $table3 WHERE username='$person'";
	$result2 = mysqli_query($link, $query2)or die ("couldn't execute query2.".mysql_error());
	
	$query3 = "Delete FROM $table4 WHERE email='$email'";
	$result3 = mysqli_query($link, $query3)or die ("couldn't execute query3.".mysql_error());
	
	if($result && $result1 && $result2 && $result3)
	{
	header('Location: coordhome.php');
	}
?>