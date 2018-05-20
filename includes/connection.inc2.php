<?php
function connectTo2() {
		$host = "localhost";
		$db_name = "amoodf5_supply";
		$username = "amoodf5_dssupply";
		$password = "_s0]oX0.yh36";// nb]]mFg2ZU.n AtG7L26B 4c1!yGF_V#H$
		$link = mysqli_connect("$host", "$username", "$password", "$db_name");
		return $link;
		mysqli_close($link);
	}	
?>