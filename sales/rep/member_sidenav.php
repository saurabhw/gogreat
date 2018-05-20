<?php
?>

<link href="../../css/sidenav_styles.css" rel="stylesheet" type="text/css">

<div id="leftSideBar">
	<div id="acctname">Welcome<br><? echo $_SESSION['firstName']; ?>!</div>
               <ul id="sideNav">
                     <li><a href="../viewReps.php">Account Home</a></li>
                     <li><a href="../repSetup.php">Add Representative</a></li> 
                     <li><a href="../accountEdit.php">Edit My Account</a></li>
                     <hr>
                     <li><a href="editMember.php?groupid=<?echo $_GET['groupid'];?>">Member Information</a></li>
                     <li><a href="memberGoals.php?groupid=<?echo $_GET['groupid'];?>">Member Goals</a></li>
                     <li><a href="memberContacts.php?groupid=<?echo $_GET['groupid'];?>">Friends & Family</a></li>
                     <hr>
                     <li><a href="../../membersite.php?group=<? echo $_GET['groupid']; ?>">View Member Site</a></li>   
              </ul>
</div>