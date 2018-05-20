<html>
<head>
<?php

include '../../config/settings.inc.php';
include '../../config/defines.inc.php';
include '../../config/config.inc.php';
//include '../../classes/db/Db.php';
	
	global $smarty;
	//include('../../config/config.inc.php');
	include('Smarty.class.php');
	$smarty = new Smarty;
	//include '../../config/settings.inc.php';
	//include '../../config/defines.inc.php';
	include('../../header.php');
	$smarty->assign('custoemr_id', $cookie->id_customer);
	
	$sql = "SELECT passwd FROM "._DB_PREFIX_."customer WHERE id_customer = '$cookie->id_customer'";
	$row = Db::getInstance()->getRow($sql);
	
	if((Tools::encrypt($_POST['old_password'])) == $row['passwd']) {
	
		$where = "id_customer = " . $cookie->id_customer; 
		$cell = $_POST['mphone1']."-".$_POST['mphone2']."-".$_POST['mphone3'];
		$home_phone = $_POST['hphone1']."-".$_POST['hphone2']."-".$_POST['hphone3'];
		$work_phone = $_POST['wphone1']."-".$_POST['wphone2']."-".$_POST['wphone3'];
		$birthday = $_POST['birthyy']."-".$_POST['birthmm']."-".$_POST['birthdd'];
		
		//Change this line if you want gender to be stored as male and/or female.
		if($_POST['gender'] == "male") {
			$gender = 1;
		} else {
			$gender = 2;
		}
		
		$ssn = $_POST['ssn1'].$_POST['ssn2'].$_POST['ssn3'];
		$fed_txid = $_POST['ftin1'].$_POST['ftin2'];
		$st_txid = $_POST['stin1'].$_POST['stin2'];
		$_501C3 = $_POST['nonp1'].$_POST['nonp2'];
		
		Db::getInstance()->update("customer", array(		//DON'T ADD THE ps_  instert will do it automatically.
			'salutation' => $_POST['salutation'],
			'firstname' => $_POST['fname'],
			'middlename' => $_POST['mname'],
			'lastname' => $_POST['lname'],
			'preferredname' => $_POST['pname'],
			'co_name' => $_POST['cname'],
			'primaryphn' => $_POST['primaryphn'],
			'cell' => $cell,
			'homephn' => $home_phone,
			'workphn' => $work_phone,
			'birthday' => $birthday,
			'id_gender' => $gender,
			'address1' => $_POST['address1'],
			'address2' => $_POST['address2'],
			'city' => $_POST['city'],
			'state' => $_POST['state'],
			'zip' => $_POST['zip'],
			'email' => $_POST['loginemail'],
			'ssn' => $ssn,
			'fed_txid' => $fed_txid,
			'st_txid' => $st_txid,
			'501C3' => $_501C3,
			'paypal_email' => $_POST['ppemail'],
			'facebook' => $_POST['fb'],
			'twitter' => $_POST['tw'],
			'linkedin' => $_POST['li'],
			'pinterest' => $_POST['pn'],
			'gplus' => $_POST['gp']
		), $where);
		//password
		//cpassword
		
		if(($_POST['password'] == "")) {
			$message = "All fields have been updated.";
			echo "<script type='text/javascript'>alert('$message');</script>";
			$smarty->assign('success', "SUCCESS");
		} else if($_POST['password'] == $_POST['cpassword']) {
	
			Db::getInstance()->update("customer", array(
				'passwd' => Tools::encrypt($_POST['password']),
				'last_passwd_gen' => date('Y-m-d H:i:s', time())
			), $where);
			$message = "All fields have been updated.";
			echo "<script type='text/javascript'>alert('$message');</script>";
			$smarty->assign('success', "SUCCESS");
		} else {
			$message = "Error: Password has not been changed.";
			echo "<script type='text/javascript'>alert('$message');</script>";
			$smarty->assign('success', "Password not changed");
		}	
	} else {
		$message = "Error: Password does not match the passwrod on record!";
		echo "<script type='text/javascript'>alert('$message');</script>";
		$smarty->assign('success', "ERROR");
	}
	
	
	
	
	//-------------------------------------------------------------------------------------------------------------------------------------------
	
	$smarty->display(dirname(__FILE__).'/controllers/front/validate_complete.tpl');
	 
	include('../../footer.php');
	
	
?>
<!--
</head>
<body>
Data updated.  
</body>
</html>
-->