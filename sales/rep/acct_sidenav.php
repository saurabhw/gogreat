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
                     <li><a href="information.php?groupid=<?echo $_GET['groupid'];?>">Edit Account Information</a></li>
                     <li><a href="reasons.php?groupid=<?echo $_GET['groupid'];?>">Edit Reasons</a></li>
                     <li><a href="photos.php?groupid=<?echo $_GET['groupid'];?>">Change Photos</a></li>
                     <li><a href="goals.php?groupid=<?echo $_GET['groupid'];?>">Edit Goals</a></li>
                     <li><a href="contacts.php?groupid=<?echo $_GET['groupid'];?>">Leader Contacts</a></li>
                     <!--<li><a href="addContacts.php?groupid=<?echo $_GET['groupid'];?>">Add Contacts</a></li>-->
                     <li><a href="editMembers.php?groupid=<?echo $_GET['groupid'];?>">Members</a></li> 
                     <!--<li><a href="members.php?groupid=<?echo $_GET['groupid'];?>">Add Members</a></li>-->
                     <!-- <li><a href="sendEmail.php?groupid=<?echo $_GET['groupid'];?>">Send Emails</a></li> --> 
                     <hr>
                     <li><a href="../../fundSite_z.php?group=<? echo $_GET['groupid']; ?>">View Site</a></li>   
              </ul>
</div>