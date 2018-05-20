<?php
	function connectTo() {
		$host = "localhost";
		$db_name = "amoodf5_gm2012";
		$username = "amoodf5_drake";
		$password = "y+kXL?CH5kw9";
		$link = mysqli_connect("$host", "$username", "$password", "$db_name");
		return $link;
	}	
?>