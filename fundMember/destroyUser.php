<?php
session_start();
if(($_SESSION['role'] == 'MemberLeader' || $_SESSION['role'] == 'Member') && isset($_SESSION['authenticated']))
       {
          //authenicated
       }
       else
       {
            header('Location: ../index.php');
            exit;
       }
include '../includes/connection.inc.php';
$link = connectTo();
$id = $_GET['conid'];
$gp = $_GET['gp'];
 $removeSQL = "DELETE FROM orgContacts WHERE orgContactID = '$id'";
 $remove_result = mysqli_query($link, $removeSQL)or die("MySQL ERROR: ".mysqli_error($link));
 $redirect = "Location:contacts.php?group=$gp";
  	    header("$redirect"); 
?>