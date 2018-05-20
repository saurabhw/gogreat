<?php
session_start();
if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
include '../includes/connection.inc.php';
$link = connectTo();
$user = $_SESSION['userId'];
$userName = $_SESSION['email'];
$query1 = "SELECT * FROM Dealers WHERE email='$userName'";
$result1 = mysqli_query($link, $query1)or die("MySQL ERROR query 1: ".mysqli_error($link));
$row = mysqli_fetch_assoc($result1);
$dealerID = $row['loginid'];
$group = $row['setuppersonid']; 
$myPic = $row['contact_pic'];
$who = $_GET['con'];
$gp = $_GET['gp'];
 if(isset($_POST['submit'])){
	   //$groupName = mysqli_real_escape_string($link, $groupName);
	   $t = mysqli_real_escape_string($link, $_POST['title']);
	   $f = mysqli_real_escape_string($link, $_POST['fname']);
	   $l = mysqli_real_escape_string($link, $_POST['lname']);
	   $e = mysqli_real_escape_string($link, $_POST['email']);
	   $p = mysqli_real_escape_string($link, $_POST['phone']);
	   $g = mysqli_real_escape_string($link, $_POST['gender']);
	   $r = mysqli_real_escape_string($link, $_POST['relaltion']);
	   $c = mysqli_real_escape_string($link, $_POST['phone']);
	   $cn = mysqli_real_escape_string($link, $_POST['cn']);
	   $c = mysqli_real_escape_string($link, $_POST['cphone']);
	   $id = mysqli_real_escape_string($link, $_POST['id']);
	   $city = mysqli_real_escape_string($link, $_POST['city']);
	   $state = mysqli_real_escape_string($link, $_POST['state']);
	   $zip = mysqli_real_escape_string($link, $_POST['zip']);
	   $ad = mysqli_real_escape_string($link, $_POST['ad1']);
	   $ad2 = mysqli_real_escape_string($link, $_POST['ad2']);
	   
	   $who = mysqli_real_escape_string($link, $_POST['conid']);
	   $xgroup = mysqli_real_escape_string($link, $_POST['gp']);
	   $query2 = "UPDATE orgContacts SET
  				Title = '$t',
  				orgFName = '$f',
  				orgLName = '$l',
  				orgEmail = '$e',
  				orgPhone = '$p'
  				WHERE orgContactID = '$who'";
  	$result2 = mysqli_query($link, $query2)or die("MySQL ERROR: ".mysqli_error($link)); 
  	
  	  $query3 = "UPDATE orgCustomers SET
  				first = '$f',
  				last = '$l',
  				companyname = '$cn',
   				relationship = '$r',
   				gender = '$g',
  				email = '$e',
  				workPhone = '$c',
   				homePhone = '$p',
   				address = '$ad',
   				apt = '$ad2',
   				city = '$city',
  				state = '$state',
  				zip = '$zip',
  				title = '$t'
  				WHERE customerID = '$who'";
  	$result3 = mysqli_query($link, $query3)or die("MySQL ERROR: ".mysqli_error($link)); 
  	
  	
  	if($result3){
  	   
  	    //$redirect = "Location:contacts.php";
  	   // header("$redirect");
  	}
  	}
  	?>