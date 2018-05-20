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
                     <li><a href="index.php">Welcome</a></li>
                     <li><a href="about.php">About Us</a></li>
                     <li><a href="program.php">GreatMoods Program</a></li>
                     <li><a href="productLine.php">GreatMoods Product Line</a></li>
                     <li><a href="customers.php">Target Customers</a></li>
                     <li><a href="distributorCalculatorOld.php">Income Calculator</a></li>
                     <li><a href="signup.php">Sign Up</a></li>
                     <li><a href="">Contacts</a></li>
              </ul>
</div>