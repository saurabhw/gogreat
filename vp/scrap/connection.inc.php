<?php
function connectTo() {
		$host = "localhost";
		$db_name = "amoodf5_cdata3";
		$username = "amoodf5_cleo";
		$password = "3#t{F)Z.KE=n";//AtG7L26B 4c1!yGF_V#H$
		$link = mysqli_connect("$host", "$username", "$password", "$db_name");
		return $link;
	}	
?>