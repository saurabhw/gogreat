<?php
session_start();
if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
 if(isset($_POST['submit']))
    { 
       $msg = 'Name: '.$_POST['name'] ."\n"
       .'Email: ' .$_POST['email'] ."\n"
       .'Comment: ' .$_POST['comment'];
       mail('gmprospect@greatmoods.com', 'Customer Query', $msg);
       header('location: contactThanks.php');
    }
    else
    {
      header('location gettingstarted_sendemail.php');
    }
?>