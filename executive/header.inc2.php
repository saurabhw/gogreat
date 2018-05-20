<?php
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <div id="headerMain">
	<div id="bannerwrap"><a href="../index.php"><img id="logo2" src="../images/whitelogo.png" alt="GreatMoods Logo"></a>
  	<img id="banner" src="../images/Header-new_Homepage-Collage.png" width="1024" height="150" alt="GreatMoods Photo Collage" /></div>
	
	<div id="menuWrapper"> </div> <!--end menuWrapper-->
	   
	   <li class="lfborder"><a class="logintitle" href="#">My Account</a>
    		<div class="newlogin">
		        <?php
		            if(!isset($_SESSION['LOGIN']) || $_SESSION['LOGIN'] == "FALSE") {
		                echo '<form id="newlogin" action="../logInUser.php" method="post">';
		                echo '<h5>sign in</h5>';
		                echo '<input id="loginemail" type="text" name="email" value="" placeholder="email address">';
		                echo '<br>
		                      <input id="loginpassword" type="password" name="password" value="" placeholder="password">';
		                echo '<br>';
		                echo '<input id="redbutton" class="user redbutton" name="login" type="submit" value="sign in">';
		                echo '</form>';
		                
		            } elseif($_SESSION['LOGIN'] == "TRUE") {
		                echo '<div class="loggedinMenu">';
		                echo '<h5>my account</h5>';
		                echo '<span><a href="../index.php">GreatMoods Homepage</a></span>';
		         	echo '<span><a href="viewAccounts.php">Account Home</a></span>';
		         	echo '<span><a href="../reset.php">Change My Password</a></span>';
		         	echo '<br>';
		         	include('../includes/logout.inc.php');
		         	echo '</div>';
		              }
		         ?>
      		</div> <!--end login-->
    	</li>
	  </ul><!--end mainNav-->

</div><!--end headerMain-->
  </head>
