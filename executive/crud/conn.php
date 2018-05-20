<?php

$conn = @mysql_connect('localhost','gogrea5_ryan','nb]]mFg2ZU.n');
if (!$conn) {
	die('Could not connect: ' . mysql_error());
}
mysql_select_db('gogrea5_gm2012', $conn);

?>