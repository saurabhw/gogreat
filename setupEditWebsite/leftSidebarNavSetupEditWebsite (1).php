<?php
session_start();
if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
?>

<!--Left Sidebar Nav - Distributor-->

<link href="../css/leftSidebarNav.css" rel="stylesheet" type="text/css">

<div id="leftSideBar">
               <ul id="sideNav">
                     <li><a href="fundtype.php">Add Accounts</a></li>
                     <li><a href="editacct.php">Edit Accounts</a></li>
                     <li><a href="information.php">Information</a></li>
                     <li><a href="reasons.php">Reasons</a></li>
                     <li><a href="contacts.php">Contacts</a></li>
                     <li><a href="photos.php">Photos</a></li>
                     <li><a href="goals.php">Goals</a></li>
              </ul>
</div>