<?php

// jCart v1.3
// http://conceptlogic.com/jcart/

// This file demonstrates a basic checkout page

// If your page calls session_start() be sure to include jcart.php first
include_once('jcart-1.3/jcart/jcart.php');

session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />

		<title>jCart - Free Ajax/PHP shopping cart</title>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js" type="text/javascript"></script>
               
		<link rel="stylesheet" type="text/css" media="screen, projection" href="jcart-1.3/style.css" />

		<link rel="stylesheet" type="text/css" media="screen, projection" href="jcart-1.3/jcart/css/jcart.css" />
	</head>
	<body>
		<div id="wrapper">
			<h2>Demo Checkout</h2>

			<div id="sidebar">
			</div>

			<div id="content">
				<div id="jcart"><?php $jcart->display_cart();?></div>

				<p><!--<a href="jcart-1.3/index.php">&larr; Continue shopping</a>--></p>

				<?php
					//echo '<pre>';
					//var_dump($_SESSION['jcart']);
					//echo '</pre>';
				?>
			</div>

			<div class="clear"></div>
		</div>
		 <script type="text/javascript" src="jcart-1.3/jcart/js/jquery-1.4.4.min.js"></script>
		
		<script type="text/javascript" src="jcart-1.3/jcart/js/jcart.js"></script>
	</body>
</html>