<?php
function connectTo() {
		$host = "localhost";
		$db_name = "amoodf5_gm2012";
		$username = "amoodf5_tyler";
		$password = "K8.x4tsTJFiP";// nb]]mFg2ZU.n AtG7L26B 4c1!yGF_V#H$
		$link = mysqli_connect("$host", "$username", "$password", "$db_name");
		return $link;
		mysqli_close($link);
	}	
?>