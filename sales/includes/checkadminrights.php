<?php

function checkAdminRights() {

	$tmpusername = $_SESSION['username'];
	$sql="SELECT * FROM Dealers WHERE DealerDir = '$tmpusername'";
	
	$result = mysql_query($sql);
	
	if ($result) {
		if (mysql_num_rows($result)) {
			$userinfo = mysql_fetch_array($result);
		}
	}
	
	if ($userinfo['adminrights']) {
		return true;
	} else {
		return false;
	}
}

?>