<?php
session_start();
?>
<style type="text/css">
	.menu, .menu ul, .menu li, .menu a {
		margin: 0;
		padding: 0;
		border: none;
		outline: none;
	}
	.menu {
		width: 150px;	
		float:right;
		
		list-style:none;
		cursor: pointer;
		text-decoration: none;
	}	
	.menu li {
		list-style:none;
		margin: 0;
		padding: 0;
		border-left: 0;
		border: none;
		outline: none;
	}	
	.menu li a {
		text-decoration: none;
		color: black;
	}
	.menu li a:hover {
		color: purple;
	}
	ul.menu:first-child {
		opacity: 0;
	}
	ul.menu:first-child:hover {
		opacity: 1;
	}
	
	<!-- .menu li:hover > ul { opacity: 1; } -->
</style>

<ul class="menu">
	<li>Account
		<ul>
			<li><a href="changePassword.html">Change Password</a></li>
			<li><a href="logout.php">Log out</a></li>
		</ul>
	</li>
</ul>