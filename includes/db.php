<?php
//Database connection.
 
$con = MySQLi_connect(
 
   "localhost", //Server host name.
 
   "amoodf5_tyler", //Database username.
 
   "K8.x4tsTJFiP", //Database password.
 
   "amoodf5_gogm2012" //Database name or anything you would like to call it.
 
);
 
 
 
//Check connection
 
if (MySQLi_connect_errno()) {
 
   echo "Failed to connect to MySQL: " . MySQLi_connect_error();
 
}
 
?>
