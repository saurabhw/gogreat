<?php
      include '../includes/autoload.php';
      if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "RP")
       {
            header('Location: ../index.php');
            exit;
       }
      
    
      
      $group = $_POST['groupid'];
     
      $recipients = $_POST['recipients'];
      $leader = $_POST['leader']; 
      $l =  strtolower($leader);
      $name = str_replace(' ', '', $l);
      $name = strtolower($name);
      //$from = $name."@greatmoods.com";
      $from = $name."@greatmoods.com";
       
      
      //get the groups photos
      $getMember = "SELECT * FROM Dealers WHERE loginid = '$group'";
      $memberResult = mysqli_query($link, $getMember)or die("MySQL ERROR query member query: ".mysqli_error($link));
      $row1 = mysqli_fetch_assoc($memberResult);
      $memberBanner = $row1['banner_path'];
      $memberPhoto = $row1['leader_pic'];
      $gn = $_SESSION['Dealer'];
      $gc = $_SESSION['DealerDir'];
      
      foreach ($recipients as $email)
      { 
      
        $getContact = "SELECT * FROM orgCustomers WHERE email = '$email'";
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
        $subject = "An Announcement From ".$gn.' '.$club;
        
        $headers = "From: ".$from."\r\n";
        $headers .= "BCC: ".$email."\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        
        $subjectPara1 = "<br><br>Greetings,<br><br>"; 
        $subjectPara2 = $_POST['message'];
        $subjectPara3 = "<a href='http://www.greatmoods.com/editFundraiser/fundSite.php?group=".$group."'>Please click the link to support our fundraiser</a>";
         
       
        $subjectPara4 = "We truly appreciate your support! Thank You!"; 
        $subjectPara5 = NULL; 

        $message = '<!DOCTYPE HTML>'. 
        '<head>'. 
        '<meta http-equiv="content-type" content="text/html">'. 
        '<title>GreatMoods Fundraising</title>'. 
        '</head>'. 
        '<body>'. 
        '<div id="header" style="width: 100%;height: 80px;color: #fff;text-align: left;background-color: 
        #FFF; float: left; font-family: Open Sans,Arial,sans-serif;">'. 
        '<img height="80" width="600" style="border-width:0" src="'.$imgSrc.'" 
        alt="'.$imgDesc.'" title="'.$imgTitle.'">'. '</div>'. 

        //'<div id="outer" style="width: 100%; margin-top: 10px; float: left;">'.  
        '<div id="inner" style="width: 100%; background-color: #fff;font-family:
         Open Sans,Arial,sans-serif;font-size: 13px;font-weight: normal;line-height: 
         1.4em;color: #444; margin-top: 10px; float: left;">'. 
         '<p style="text-align: left;"><img height="140" width="140" style="border-width:0" src="'.$imgSrc2.'" 
        alt="'.$imgDesc2.'" title="'.$imgTitle2.'"></p>'.
         '<p>'.$subjectPara1.'</p><br>'. 
         '<p>'.$subjectPara2.'</p><br>'.
         '<p>'.$subjectPara3.'</p><br>'.
         '<p>'.$subjectPara4.'</p><br>'.
         '<p>'.$whole.'</p>'. 
         '</div>'.   
         //'</div>'. 
         '.<br><br><br><div><img src="http://www.greatmoods.com/images/footer_logo.png" /></div>.'
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
       header( 'Location: http://www.greatmoods.com/setupEditWebsite/emails2.php' ) ;
       ob_end_flush();
?>