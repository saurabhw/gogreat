<?php
session_start();
if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
$group = $_GET['group'];
?>

<!--Left Sidebar Nav - Distributor-->

<link href="../css/leftSidebarNav.css" rel="stylesheet" type="text/css">

<div id="leftSideBar">
               <ul id="sideNav">
                     <li><a href="editClub.php?groupid=<?echo $_GET["groupid"];?>">Account Home</a></li>
                     <li><a href="selectFundraiser.php?groupid=<?echo $_GET["groupid"];?>">Add New Fundraiser</a></li>
                     <li><a href="accountEdit.php?groupid=<?echo $_GET["groupid"];?>">Edit My Account</a></li>
                     <li><a href="information.php?groupid=<?echo $_GET["groupid"];?>">Edit Information</a></li>
                     <li><a href="reasons.php?groupid=<?echo $_GET["groupid"];?>">Edit Reasons</a></li>
                     <li><a href="contacts.php?groupid=<?echo $_GET["groupid"];?>">Add Contacts</a></li>
                     <li><a href="photos.php?groupid=<?echo $_GET["groupid"];?>">Change Photos</a></li>
                     <li><a href="goals.php?groupid=<?echo $_GET["groupid"];?>">Edit Goals</a></li>
              </ul>
</div>