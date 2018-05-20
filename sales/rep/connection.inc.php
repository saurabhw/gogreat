<?php
function connectTo() {
		$host = "localhost";
		$db_name = "amoodf5_gm2012";
		$username = "amoodf5_ryan";
		$password = "nb]]mFg2ZU.n";
		$link = mysqli_connect("$host", "$username", "$password", "$db_name");
		return $link;
	}	
?>