<?php
      include '../includes/autoload.php';
      $recipients = $_GET['recipients'];  
      $group = $_GET['groupid'];
   
      $leader = $_GET['leader'];
      $l = strtolower($leader);
      //$first = strtolower($_SESSION['firstName']);
      //$last = strtolower($_SESSION['lastname']);
      $from = $l."@greatmoods.com";
      
      foreach ($recipients as $email)
      { 
      $to = $email; 
      $subject = "An Announcement From Greatmoods.com";
      $headers = "From: ".$from;
      $message = $_GET['message'];
      $message .= "Please click the link to support our fundraiser: http://www.greatmoods.com/fundSite.php?group=".$group;
        if(mail($to, $subject, $message, $headers))
        {
          echo "sent";
        }
        else
        {
          echo "failed";
        }
       }
       header('Location: emails2.php');
       ob_end_flush();
?>