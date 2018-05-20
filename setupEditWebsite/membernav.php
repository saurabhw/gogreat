<?php
session_start();
if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
$group = $_GET['group'];
?>

<!--Left Sidebar Nav - Representative-->

<link href="../css/sidenav_styles.css" rel="stylesheet" type="text/css">

<div id="leftSideBar">
	<div id="acctname">Welcome<br><? echo $_SESSION['firstName']; ?>!</div>
               <ul id="sideNav">
                     <li><a href="editClub.php">Account Home</a></li>
                     <!-- <li><a href="selectFundraiser.php">Add New Fundraiser</a></li> -->
                     <li><a href="prospectRequest.php">Add New Fundraiser</a></li>
                     <li><a href="addBanner.php">Add Banners</a></li>
                     <li><a href="accountEdit.php">Edit My Account</a></li>
                     <hr>
                    <!-- <li><a href="information.php?group=<?echo $_GET["group"];?>">Edit Information</a></li>
                     <li><a href="reasons.php?group=<?echo $_GET["group"];?>">Edit Reasons</a></li>
                     <li><a href="contacts.php?group=<?echo $_GET["group"];?>">View Contacts</a></li>
                     <li><a href="addContacts.php?group=<?echo $_GET["group"];?>">Add Contacts</a></li>
                     <li><a href="photos.php?group=<?echo $_GET["group"];?>">Change Photos</a></li>
                     <li><a href="goals.php?group=<?echo $_GET["group"];?>">Edit Goals</a></li>
                     <li><a href="editMembers.php?group=<?echo $_GET["group"];?>">Edit Members</a></li>
                     <li><a href="members.php?group=<?echo $_GET["group"];?>">Add Members</a></li>-->
                     <hr>
                     <li><a href="../fundSite_z.php?group=<?echo $_GET["group"];?>">View Website</a></li>
              </ul>
</div>