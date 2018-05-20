<?php
define('DB_USER', 'amoodf5_tyler');
define('DB_PASSWORD', 'K8.x4tsTJFiP');
define('DB_SERVER', 'localhost');
define('DB_NAME', 'amoodf5_gm2012');


if (!$db = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME)) {
	die($db->connect_errno.' - '.$db->connect_error);
}

$arr = array();

if (!empty($_POST['keywords'])) {
	$keywords = $db->real_escape_string($_POST['keywords']);
	$sql = "SELECT * FROM Dealers WHERE Dealer LIKE '%".$keywords."%'";
	$result = $db->query($sql) or die($mysqli->error);
	if ($result->num_rows > 0) {
		while ($obj = $result->fetch_object()) {
			$arr[] = array('Dealer' => $obj->Dealer, 'club' => $obj->DealerDir);
		}
	}
}
echo json_encode($arr);
