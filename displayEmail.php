<?php
	session_start();
	if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
	include "connectTo.php";
	$id = $_SESSION['ID'];
	$link = connectTo();
	$letter = $_GET['letter'];
	ob_start();
	$table = "email_contacts";

	if($letter == "all") {
		//$query = "SELECT FName, LName, email, phone FROM $table";
		$query = "SELECT * FROM $table WHERE friendOf = '$id'";
	} else {
		$letterU = $letter;
		$letterL = strtolower($letter);
		//echo "[$letterU$letterL]%";
		//$query = "SELECT FName, LName, email, phone FROM $table WHERE LName LIKE '[$letterU$letterL]%'";
		$query = "SELECT * FROM $table WHERE LName LIKE '$letter%' AND friendOf = '$id'";
	}
	
	$result = mysqli_query($link, $query);
	echo "<tr><th>Name</th><th>Email</th><th>Phone</th></tr>";
	if(mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_array($result)) {
			$name = $row['FName'] . " " . $row['LName'];
			echo "<tr>";
			echo "<td><input type='checkbox' />$name</td><td>" . $row['email'] . "</td><td>" . $row['phone'] . "</td>";
			echo "</tr>"; 
		}
	}
	
	ob_end_flush();
	
?>