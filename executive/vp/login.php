<?php
$message="";
if(count($_POST)>0) {
$conn = mysql_connect("localhost","root","");
mysql_select_db("phppot_examples",$conn);
mysql_query("INSERT INTO users (userName, password, firstName, lastName) VALUES ('" . $_POST["userName"] . "','" . $_POST["password"] . "','" . $_POST["firstName"] . "','" . $_POST["lastName"] . "')");
$current_id = mysql_insert_id();
if(!empty($current_id)) {
$message = "New User Added Successfully";
}
}
?>
<html>
<head>
<title>Add New User</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
<form name="frmUser" method="post" action="">
<div class="message"><?php if(isset($message)) { echo $message; } ?></div>
<table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tblSaveForm">
<tr class="tableheader">
<td colspan="2">Add New User</td>
</tr>
<tr>
<td><label>Username</label></td>
<td><input type="text" name="userName" class="txtField"></td>
</tr>
<tr>
<td><label>Password</label></td>
<td><input type="password" name="password" class="txtField"></td>
</tr>
<td><label>First Name</label></td>
<td><input type="text" name="firstName" class="txtField"></td>
</tr>
<td><label>Last Name</label></td>
<td><input type="text" name="lastName" class="txtField"></td>
</tr>
<tr>
<td colspan="2"><input type="submit" name="submit" value="Submit" class="btnSubmit"></td>
</tr>
</table>
</form>
</body></html>