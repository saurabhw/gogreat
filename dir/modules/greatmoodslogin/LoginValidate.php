<html>
	<head>
	<?php

	include '../../config/settings.inc.php';
	include '../../config/defines.inc.php';
	include '../../config/config.inc.php';
	require_once(dirname(__FILE__).'/../../config/config.inc.php');
	include_once('../../init.php');
	global $smarty;
	
	include('Smarty.class.php');
	$smarty = new Smarty;
	
	include('../../header.php');
	$email = $_POST['email'];
	$password = $_POST['password'];
	if ($email == '' || $password == '')
	{
 		$message = "Please enter the email account and password!!!";
		echo "<script type='text/javascript'>alert('$message');</script>";

	}
	else {		
		
	/*$con=mysqli_connect("gogreatmoods1.com","gogrea5_addinfo","5U8^^!~d4Ta","gogrea5_gms"); //website, user, password, database name */
	// Check connection

		$db = Db::getInstance();
		
		$sql = 'SELECT id_customer, is_employee FROM ps_login WHERE email = '.$email.'AND password = '.$password ;
		$query = 'SELECT * FROM ps_login';
		$results = Db::getInstance()->ExecuteS($query);
		//$value = Db::getInstance()->getValue($query);

		$message = $results.'123';
		echo "<script type='text/javascript'>alert('$message');</script>";

		if ($results = $db->ExecuteS($sql))
		{
			foreach ($results as $row){
			echo $row['id_customer'].' :: '.$row['is_employee'].'<br />';
			}
			$message = "Success!!!";
			echo "<script type='text/javascript'>alert('$message');</script>";
			$cookieexpiry = (time() + 21600);
     			setcookie("session_id", $row['id_customer'], $cookieexpiry);
     			$isemp = $row['is_employee'];
		} 
		else
		{
			$message = "Please enter the correct email account and password!!!";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}

		
		

		
			
		
		
	
	}
		
	
	//mysqli_close($con);
	
	//-----------------------------------------------------------------------------------
	
	
	//$smarty->display('http://gogreatmoods.com/dir/myhomepage_v3.php');
	include('../../footer.php');
?>