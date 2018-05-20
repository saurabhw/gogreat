<?php
	session_start();
	ob_start();
	include "php/Connect.php";
	$con = new Connection();
	$table = "orgWebsite";
	$general = $_POST['general']; // text area box containing general message to be displayed on organizations main page
	$reasons = $_POST['reasons']; // checkbox selection of why the fundraiser is being held
	$numRows = count($reasons);
	$reasonString = ""; // string to hold every reason, each reason sepparated by a "-"
	for($i=0; $i < $numRows-1; $i++) {
		$reasonString .= $reasons[$i] . "-";
	}
	$reasonString .= $reasons[$numRows-1];
	echo $reasonString;
	if(isset($_SESSION['siteID'])) {
		$id = $_SESSION['siteID'];
		$query = "UPDATE $table SET general = '$general', reasons = '$reasonString' WHERE ID = '$id'";
		$con->make_query($query);
		echo " Editing site now.";
	} else {
		$query = "INSERT INTO $table (general, reasons) VALUES('$general', '$reasonString')";
		$con->make_query($query);
		$query = "SELECT MAX(ID) FROM $table";
		$con->make_query($query);
		$result = $con->get_result();
		while($row = mysqli_fetch_array($result)) {
			$_SESSION['siteID'] = $row[0]; // subsquent tables will update this row in the table
		}
		echo " Making your site now.";
	}
	
	header("location:setupEditMainWebsiteContactInfo.php");
	ob_end_flush();
?>