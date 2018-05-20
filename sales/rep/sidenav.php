<div id="leftSideBar">
	<div id="acctname">Welcome<br><? echo $_SESSION['firstName']; ?>!</div>
               <ul id="sideNav">
                     <li><a href="../viewReps.php">Account Home</a></li>
                     <li><a href="addBanner.php?rep=<? echo $_GET['rep'];?>">Add Banners</a></li> 
                     <li><a href="../repSetup.php">Add Representative</a></li>
                     <li><a href="../accountEdit.php">Edit My Account</a></li> 
                     
              </ul>
</div>