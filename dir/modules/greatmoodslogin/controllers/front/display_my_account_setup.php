<?php
	//Code from prestashop website explaining old versions of code.
	//For some reason, the new version does not exist.
	global $smarty;
	include('../../../../config/config.inc.php');
	include('../../../../header.php');
	//public  = 'test';
	$smarty->display(dirname(__FILE__).'/display_my_account_setup.tpl');
	 
	include('../../../../footer.php');
?>
