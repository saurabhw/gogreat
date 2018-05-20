<?php 
   session_start();
?>
<div id="leftSideBar">
	<div class="profileimgcrop"><img src="../<?php echo $pic; ?>" class="profilepic" alt="profile Pic"></div>
	<h1>Welcome,<br><? echo $_SESSION['firstName'].' '.$_SESSION['lastname']; ?>!</h1>
		<!-- will pull up related accounts -->

	
	
	
</div>