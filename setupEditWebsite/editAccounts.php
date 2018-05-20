<?php  
include '../includes/autoload.php';
if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }

include(SITE_ROOT."/includes/getid.php");
include (SITE_ROOT.'/includes/login/db_connect.inc.php');
include (SITE_ROOT.'/includes/admin/checkadminrights.php');
if (isset($_SESSION['loginid']) && isset($_SESSION['username'])) {
	if (!checkAdminRights()) {
		header("Location: ".HTML_ROOT."/login.php");
	}
} 

$groupName = mysql_real_escape_string($_POST['groupName']);
$addressOne = mysql_real_escape_string($_POST['address1']);
$addressTwo = mysql_real_escape_string($_POST['address2']);
$city = mysql_real_escape_string($_POST['city']);
$state = mysql_real_escape_string($_POST['state']);
$facebook = mysql_real_escape_string($_POST['facebook']);
$desc = mysql_real_escape_string($_POST['description']);
$reasons = mysql_real_escape_string($_POST['reasons']);
$fname1 = mysql_real_escape_string($_POST['FName1']);
$lname1 = mysql_real_escape_string($_POST['LName1']);
$title1 = mysql_real_escape_string($_POST['title1']);
$phone1 = mysql_real_escape_string($_POST['phone1']);
$email1 = mysql_real_escape_string($_POST['email1']);
$fname2 = mysql_real_escape_string($_POST['FName2']);
$lname2 = mysql_real_escape_string($_POST['LName2']);
$title2 = mysql_real_escape_string($_POST['title2']);
$phone2 = mysql_real_escape_string($_POST['phone2']);
$email2 = mysql_real_escape_string($_POST['email2']);
$fname3 = mysql_real_escape_string($_POST['FName3']);
$lname3 = mysql_real_escape_string($_POST['LName3']);
$title3 = mysql_real_escape_string($_POST['title3']);
$phone3 = mysql_real_escape_string($_POST['phone3']);
$email3 = mysql_real_escape_string($_POST['email3']);
$fname4 = mysql_real_escape_string($_POST['FName4']);
$lname4 = mysql_real_escape_string($_POST['LName4']);
$title4 = mysql_real_escape_string($_POST['title4']);
$phone4 = mysql_real_escape_string($_POST['phone4']);
$email4 = mysql_real_escape_string($_POST['email4']);
$paypal = mysql_real_escape_string($_POST['paypalID']);
$orgtype = mysql_real_escape_string($_POST['fundtype']);
?>