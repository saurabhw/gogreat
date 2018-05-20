<?php

       session_start();

       require_once("includes/connection.inc.php");
       //include ('../includes/functions.php');
       $link = connectTo();
       $userName = "smith71694@yahoo.com";
       $salt = time();
       $password = "greatmoods1";
       $loginPass = sha1($password.$salt);
       //update password
       $ud = "UPDATE users SET
             password = '$loginPass'
             WHERE username = '$userName'";
       $update = mysqli_query($link, $ud)or die ("couldn't execute query x.".mysqli_error($link));
       if($update)
       {
         $dealer = "UPDATE Dealers SET
                    firstPass = '$password'
                    WHERE userName = '$userName'";
         $dq = mysqli_query($link, $dealer)or die ("couldn't execute query y.".mysqli_error($link)); 
         if($dq)
         {
           echo 'sweet<br>';
           echo $loginPass;
         }        
       }
       
?>