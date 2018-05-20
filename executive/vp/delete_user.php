<?php
$conn = mysql_connect("localhost","gogrea5_ryan","nb]]mFg2ZU.n");
mysql_select_db("gogrea5_gm2012",$conn);
mysql_query("DELETE FROM users WHERE userId='" . $_GET["userId"] . "'");
header("Location:list_user.php");
?>