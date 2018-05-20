<?php
      session_start();
      if(($_SESSION['role'] == 'MemberLeader' || $_SESSION['role'] == 'Member') && isset($_SESSION['authenticated']))
       {
          //authenicated
       }
       else
       {
            header('Location: ../index.php');
            exit;
       }
      ob_start();
      $group = $_SESSION['groupid'];
      $gn = $_SESSION['groupName'];
      $club = $_SESSION['club'];
      $email = $_SESSION['email'];
      $recipients = $_GET['recipients'];
      $first = strtolower($_SESSION['firstName']);
      $last = strtolower($_SESSION['lastname']);
      $from = $first.$last."@greatmoods.com";
      require_once("../includes/connection.inc.php");
      $link = connectTo();  
      
      foreach ($recipients as $email)
      { 
         $to = $email; 
         $subject = "An Announcement From ".$_SESSION['firstName'].' '.$_SESSION['lastname'].' of '.$gn.' '.$club;
         $headers = "From: ".$from."\r\n";
         $headers .= "BCC: ".$email."\r\n";
         $headers .= "MIME-Version: 1.0\r\n";
         $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
         $message = $_GET['message'];
         $message .= "Please click the link to support our fundraiser: 
         http://www.greatmoods.com/fundMember/membersite.php?group=".$group;
         
         if(mail($to, $subject, $message, $headers))
         {
           echo "sent";
         }
         else
         {
           echo "failed";
         }
       }
       header( 'Location: http://www.greatmoods.com/fundMember/emails2.php' ) ;
       ob_end_flush();
?>