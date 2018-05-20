<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<script src="js/loadXMLDoc.js"></script>
		<?php include "connectTo.php";
			function createOnclick($orgName, $clubTeam, $id) {
				$event = "loadXMLDoc(";
				// getExtraInfo.php?orgName=name&clubTeam=club
				$page = "\"getExtraInfo.php?orgName=";
				$orgName = str_replace(' ', '+', $orgName);
				$clubTeam = str_replace(' ', '+', $clubTeam);
				$page .= $orgName . "&clubTeam=" . $clubTeam . "\"";
				$id = "\"" . $id . "\"";
				$event .= "$page, $id)";
				return $event;
			}
		 ?>
<?
	$orgName = $_GET['name'];
	$rowNumber = $_GET['row'];
	$table = "orgInfo";

	$link = connectTo();
	$query = "SELECT * FROM $table WHERE orgName='$orgName'";
	$result = mysqli_query($link, $query);
	while ($row = mysqli_fetch_array($result) ) {
		$rows[] = $row;
	}
	$tab = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	$count = 0;
	foreach ($rows as $row) {
		$id = "clubTeam$count" . "row" . $rowNumber;
		$event = createOnclick($orgName, $row['clubTeam'], $id);
		$html = "<p onclick='$event'>";
		$html .= $row['clubTeam'];
		$html .= $tab . $row['orgFName'];
		$html .=  " " . $row['orgLName'];
		$html .= $tab . $row['orgPhone'];
		$html .= $tab . $row['orgEmail'];
		$html .= "<span id='$id'></span></p>";
		echo $html; 
		$count = $count + 1;
	}		
?>