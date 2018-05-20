<?php
function connectTo() {
		$host = "localhost";
		$db_name = "amoodf5_test";
		$username = "amoodf5_tyler";
		$password = "K8.x4tsTJFiP";
		$link = mysqli_connect("$host", "$username", "$password", "$db_name");
		return $link;
		mysqli_close($link);
	}	
?>