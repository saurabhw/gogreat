<?php
      include '../includes/autoload.php';
      require '../email/PHPMailer-master/PHPMailerAutoload.php';
      $recipients = $_GET['recipients'];  
      $group = $_GET['groupid'];
      
      //get group name
      $getGroup = "SELECT * FROM Dealers WHERE loginid  = '$group'";
      $groupResult = mysqli_query($link, $getGroup)or die("MySQL ERROR query 1: ".mysqli_error($link));
      $row1 = mysqli_fetch_assoc($groupResult);
      $dealerName = $row1['Dealer'];
      $club = $row1['DealerDir'];
      $lower = strtolower($dealerName);
      $cleanName = str_replace(' ', '', $lower);
      $cleanName = str_replace("'", '', $cleanName);
      $from = $dealerName.' '.$club;
      
      foreach ($recipients as $email)
      { 
      
        //get member name
        $getMember = "SELECT * FROM orgMembers WHERE orgEmail = '$email' AND fund_owner_id = '$group' AND passSent = 0";
        $memberResult = mysqli_query($link, $getMember)or die("MySQL ERROR query 2: ".mysqli_error($link));
        $row2 = mysqli_fetch_assoc($memberResult);
        $memberFirst = $row2['orgFName'];
        $memberLast = $row2['orgLName'];
        $memberID = $row2['fundraiserID'];
        
        //get password
        $query3 = "SELECT * FROM Dealers WHERE loginid='$memberID'";
        $result3 = mysqli_query($link, $query3)or die("MySQL ERROR query 10: ".mysqli_error($link));
        $row3 = mysqli_fetch_assoc($result3);
        $user_name = $row3['userName'];
        $pass = $row3['firstPass'];
        
        $to = $email; 
        
        $subject = "Hello ".$memberFirst." ".$memberLast." You Are Now a Member Of ".$dealerName." ".$club." Fundraiser.";
        $message = "Hey ".$memberFirst.",";
        $message .= "<br /><br />You have a new account and fundraising website at GreatMoods!<br /><br />";
        $message .= "Check out your site: <br /><br />";
        $message .= "<a href='http://www.greatmoods.com/membersite.php?group=".$memberID."'>View Your Site Here!</a><br/>";
        $message .= "<br />Login to Manage your account.";
        $message .= "<br /><br />User Name: ".$user_name;
        $message .= "<br /><br />Password: ".$pass; 
    
         // $to = $email; 
        $mail = new PHPMailer;

        //$mail->SMTPDebug = 3;                               // Enable verbose debug output

        $mail->isSMTP();
        $mail->Host = 'greatmoods.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'myfundraiser@greatmoods.com';                 // SMTP username
        $mail->Password = 'qOLX4[pHVMl*';                           // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to
        
        $mail->setFrom('myfundraiser@greatmoods.com', $from);
        $mail->addAddress($email, $rec);     // Add a recipient
        //$mail->addAddress('');
        //$mail->addAddress('');               // Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = $subject;
        $mail->Body    = '<!DOCTYPE HTML>'. 
        '<head>'. 
        '<meta http-equiv="content-type" content="text/html"><head>'. 
        '<title>GreatMoods Fundraising</title>'. 
        '</head><body>'. $message.'</div></div>'.   
         '.<br><br><br><img src="http://www.greatmoods.com/images/footer_logo.png" />.'
        .'</body>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if(!$mail->send()) {
           echo 'Message could not be sent.';
           echo 'Mailer Error: ' . $mail->ErrorInfo;
         } 
         else {
            //echo 'Message has been sent';
            $orgUpdate = "UPDATE orgMembers SET
                          passSent = 1
                          WHERE orgEmail = '$email'";
           $updateResult = mysqli_query($link, $orgUpdate)or die("MySQL ERROR password sent update: ".mysqli_error($link));
         }
       }
      header('Location: editClub.php');
       ob_end_flush();
?>