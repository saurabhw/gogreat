<?php
session_start();
if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../../index.php');
            exit;
       }
include '../../includes/connection.inc.php';
$link = connectTo();
$id = $_GET['conid'];
$gp = $_GET['gp'];
 $removeSQL = "DELETE FROM orgContacts WHERE orgContactID = '$id'";
 $remove_result = mysqli_query($link, $removeSQL)or die("MySQL ERROR: ".mysqli_error($link));
 $redirect = "Location:contacts.php?groupid=$gp";
  	    header("$redirect"); 
?>