<?php
        session_start();
	ob_start();
	include'includes/connection.inc.php';
	$link = connectTo();
        $table = "Dealers";
        //get id and all rows of fundraiser to delete
        $group = mysqli_real_escape_string($link, $_POST['clubid']); 
        //delete query
        $query = "Delete FROM $table WHERE loginid='$group'";
	$result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error());
	if($result)
	{
	header("Location: setupEditWebsite/editMembers.php?group='$group'");
	}
?>