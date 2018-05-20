<?php
	function connectTo() {
		$host = "localhost";
		$db_name = "amoodf5_gm2012";
		$username = "amoodf5";
		$password = "AtG7L26B";
		$link = mysqli_connect("$host", "$username", "$password", "$db_name");
		return $link;
	}	
?>