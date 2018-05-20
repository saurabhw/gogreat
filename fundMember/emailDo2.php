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
      //$whole = $_SESSION['firstName'].' '.$_SESSION['lastname'];
      $from = $first.$last."@greatmoods.com";
      require_once("../includes/connection.inc.php");
      $link = connectTo();  
      
      //get the members photos
      $getMember = "SELECT * FROM Dealers WHERE loginid = '$group'";
      $memberResult = mysqli_query($link, $getMember)or die("MySQL ERROR query member query: ".mysqli_error($link));
      $row1 = mysqli_fetch_assoc($memberResult);
      $memberBanner = $row1['banner_path'];
      $memberPhoto = $row1['contact_pic'];
      
      
      foreach ($recipients as $email)
      { 
      
        $getContact = "SELECT * FROM orgCustomers WHERE email = '$email' AND fundMemberID = '$group'";
        $conResult = mysqli_query($link, $getContact)or die("MySQL ERROR query contact query: ".mysqli_error($link));
        $row2 = mysqli_fetch_assoc($conResult);
        $reciever = $row2['first'];
        
         //lets make the email live
        $imgSrc   = 'http://www.greatmoods.com/'.$memberBanner; 
        $imgSrc2   = 'http://www.greatmoods.com/'.$memberPhoto;
        $imgDesc  = 'Banner of organization'; // Change Alt tag/image Description to your site specific settings 
        $imgTitle = 'Banner Photo'; // Change Alt Title tag/image title to your site specific settings 
        $imgDesc2  = 'Member Profile Pic'; // Change Alt tag/image Description to your site specific settings 
        $imgTitle2 = 'Member Photo'; // Change Alt Title tag/image title to your site specific settings 
        
        $to = $email; 
        $subject = "An Announcement From ".$_SESSION['firstName'].' '.$_SESSION['lastname'].' of '.$gn.' '.$club;
        
        $headers = "From: ".$from."\r\n";
        $headers .= "BCC: ".$email."\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        
        $subjectPara1 = "<br><br>Hey ".$reciever.",<br><br>"; 
        $subjectPara2 = $_GET['message'];
        $subjectPara3 = "<a href='http://www.greatmoods.com/fundMember/membersite.php?group=".$group."'>Please click the link to support our fundraiser</a>";
         
       
        $subjectPara4 = "I truly appreciate your support! Thank You!"; 
        $subjectPara5 = NULL; 

        $message = '<!DOCTYPE HTML>'. 
        '<head>'. 
        '<meta http-equiv="content-type" content="text/html">'. 
        '<title>GreatMoods Fundraising</title>'. 
        '</head>'. 
        '<body>'. 
        '<div id="header" style="width: 100%;height: 80px;margin: 
         auto;padding: 8px;color: #fff;text-align: center;background-color: 
        #FFF;font-family: Open Sans,Arial,sans-serif;">'. 
        '<img height="80" width="600" style="border-width:0" src="'.$imgSrc.'" 
        alt="'.$imgDesc.'" title="'.$imgTitle.'">'. '</div>'. 

        '<div id="outer" style="width: 80%; margin-top: 10px; float: left;">'.  
        '<div id="inner" style="width: 78%;margin: 0 auto;background-color: #fff;font-family:
         Open Sans,Arial,sans-serif;font-size: 13px;font-weight: normal;line-height: 
         1.4em;color: #444;margin-top: 10px;">'. 
         '<p align="left"><img height="140" width="140" style="border-width:0" src="'.$imgSrc2.'" 
        alt="'.$imgDesc2.'" title="'.$imgTitle2.'"></p>'.
         '<p>'.$subjectPara1.'</p><br>'. 
         '<p>'.$subjectPara2.'</p><br>'.
         '<p>'.$subjectPara3.'</p><br>'.
         '<p>'.$subjectPara4.'</p><br>'.
         '<p>'.$whole.'</p>'. 
         '</div>'.   
         '</div>'. 
         '.<br><br><br><img src="http://www.greatmoods.com/images/footer_logo.png" />.'
         /*
         '<div id="footer" style="width: 80%;height: 40px;margin: 0 auto;text-align:
          center;padding: 10px;font-family: Verdena;background-color: #FFF;">'. 
          
          .'All rights reserved @ greatmoods.com 2016'. 
         '</div>'.
         */ 
         .'</body>'; 
     
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