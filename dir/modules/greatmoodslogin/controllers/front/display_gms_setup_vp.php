<?php
	//Code from prestashop website explaining old versions of code.
	global $smarty;
	include('../../../../config/config.inc.php');
	include('Smarty.class.php');
	$smarty = new Smarty;
	include '../../config/settings.inc.php';
	include '../../config/defines.inc.php';
	include('../../../../header.php');
		$smarty->display(dirname(__FILE__).'/display_gms_setup_vp.tpl');
	 
	include('../../../../footer.php');
?>
