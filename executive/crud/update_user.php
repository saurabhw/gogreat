<?php
session_start();
$user = $_SESSION['userId'];
$id = intval($_REQUEST['id']);
$firstname = htmlspecialchars($_REQUEST['firstname']);
$lastname = htmlspecialchars($_REQUEST['lastname']);
$phone = htmlspecialchars($_REQUEST['phone']);
$email = htmlspecialchars($_REQUEST['email']);

include 'conn.php';

$sql = "update distributors set FName='$firstname',LName='$lastname',homePhone='$phone',email='$email' where id=$id AND setupID = $user";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array(
		'ID' => $id,
		'FName' => $firstname,
		'LName' => $lastname,
		'homePhone' => $phone,
		'email' => $email
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
?>