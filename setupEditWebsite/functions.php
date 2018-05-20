<?php
/*
function connectTo() {
	$host = "localhost";
	$db_name = "amoodf5_gm2012";
	$username = "amoodf5";
	$password = "AtG7L26B";
	$link = mysqli_connect("$host", "$username", "$password", "$db_name");
	return $link;
}
*/
function redirect_to($new_location) {
	header("Location: " . $new_location);
	exit;
}
function mysqli_prep($string) { // ESCAPE ALL STRINGS
	global $link;
	$escaped_string = mysqli_real_escape_string($link, $string);	
	return $escaped_string;
}
function confirm_query($result_set) {
	global $link;
	if (!$result_set) {
		die("Database query failed: " . mysqli_error($link) . "...");
	}
}

// START REP EMAIL SECTION FOR ALL FUNDRAISERS, CONTACTS, MEMBERS, AND CUSTOMERS

// GET THE REP'S ID
function repID($link, $repEmail) {
	$query = "SELECT * FROM user_info WHERE email = '$repEmail'";
	$result = mysqli_query($link, $query);
	confirm_query($result);
	$row = mysqli_fetch_assoc($result);
	$repID = $row["userInfoID"]; // rep's ID
	return $repID;
}

// USE THE REP'S ID TO GET THE REP'S GROUPS: SCHOOL NAME, GROUP TYPE, AND GROUP ID
function repGroups($link, $repID) {
	$query = "SELECT * FROM Dealers WHERE setuppersonid = '$repID'";
	$result = mysqli_query($link, $query);
	confirm_query($result);
	return $result;
}

// USE THE GROUP ID TO GET THE FUNDRAISERS' CONTACTS / COACHES / ETC.
function fundContacts($link, $groupid) {
	$query = "SELECT * FROM orgContacts WHERE fundraiserID = '$groupid' ORDER BY orgFName ASC";
	$result = mysqli_query($link, $query);
	confirm_query($result);
	return $result;
}

// USE THE GROUP ID TO GET THE FUNDRAISERS' MEMBERS / STUDENTS
function fundMembers($link, $groupid) {
	$query = "SELECT * FROM orgMembers WHERE fund_owner_id = '$groupid'";
	$result = mysqli_query($link, $query);
	confirm_query($result);
	return $result;
}

// USE THE GROUP ID TO GET THE FUNDRAISERS' CUSTOMERS
function fundCustomers($link, $groupid) {
	$query = "SELECT * FROM orgCustomers WHERE fundGroupID = '$groupid'";
	$result = mysqli_query($link, $query);
	confirm_query($result);
	return $result;
}
























