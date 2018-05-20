<?php
         include '../includes/autoload.php';
      if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
     
       $groupid = $_SESSION['groupid'];
       $query1 = "SELECT * FROM Dealers WHERE loginid='$groupid'";
       $result1 = mysqli_query($link, $query1)or die("MySQL ERROR query 1: ".mysqli_error($link));
       $row1 = mysqli_fetch_assoc($result1);
      
 
       $dealerMemberID = $_POST['memid'];
       
       
      $query3 = "SELECT * FROM orgMembers WHERE fundraiserID='$dealerMemberID'";
      $result3 = mysqli_query($link, $query3)or die("MySQL ERROR query 3: ".mysqli_error($link));
      $memberRow = mysqli_fetch_assoc($result3);
      $memberF = $memberRow['orgFName'];
      $memberL = $memberRow['orgLName'];
      
      
      $sender = $memberF.' '.$memberL;
       if ($_POST['recipients'] != "") 
       {
          
           $headers1 = "From: ".$sender." \r\n"; 
	   $sql = "SELECT * FROM orgCustomers where fundMemberID='$dealerMemberID'";
           $result = mysqli_query($link, $sql);
          while ($row = mysqli_fetch_assoc($result)) 
		{
		    $to = $row["email"];
		    $emailRespond = new Email();
		    $from = "From: ".$sender;
		    $subject = $sender." has invited you to join a new fundraiser";
		    $body = $_POST['message']."\n\n";
		    $body .= "Please click the link to support our fundraiser: http://www.greatmoods.com/membersite.php?group=".$dealerMemberID;
		    $emailRespond->setTo($to);
		    $emailRespond->setSubject($subject);
		    $emailRespond->setBody($body);
		    $emailRespond->setFrom($from);
		    $emailRespond->setHeader($headers1);
		    if($emailRespond->send()) {
			echo "email sent successfuly.\n\n";
		    } else {
			echo "email failed :(\n";
		    }
		}// end while
  
     } // end "if post" statement
     else 
    {
       /*
       $sql="SELECT email FROM orgCustomers where fundMemberID='$dealerMemberID' AND email = '$_POST[logdropdown]'";
       $result = mysqli_query($link, $sql);
       $email_from = $sender;
       */       
             
               $headers ="From:".$sender."\n";
               $headers.="MIME-Version: 1.0\n";
               $headers.="Content-type: text/html; charset=iso 8859-1";

                //$headers1 = "From: ".$sender." \r\n";
                $emailRespond = new Email();
		$to = $_POST['logdropdown'];
		//$to = "clbj35@yahoo.com";
		$from = $sender;
		$subject = $sender." has invited you to join a new fundraiser";
		$body = $_POST['message']."\n\n";
		$body .= "Please click the link to support our fundraiser: http://www.greatmoods.com/membersite.php?group=".$dealerMemberID;
		$emailRespond->setTo($to);
		$emailRespond->setSubject($subject);
		$emailRespond->setBody($body);
		$emailRespond->setFrom($from);
		$emailRespond->setHeader($headers);
		if($emailRespond->send()) {
			echo "email sent successfuly.\n\n";
		} else {
			echo "email failed :(\n";
		}

    
}// end else    


echo '<script>location.href="'.$_SESSION['SERVER_ROOT'].'/setupEditWebsite/contacts.php?group=' . $dealerMemberID . '"</script>';

?>