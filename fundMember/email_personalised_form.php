<?php
session_start();
if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
ob_start();

       include '../includes/connection.inc.php';
       include '../email/email.php';

       $link = connectTo();

       //$user = $_SESSION['userId'];
       $userName = $_SESSION['email'];
       $query1 = "SELECT * FROM Dealers WHERE email='$userName'";
       $result1 = mysqli_query($link, $query1)or die("MySQL ERROR query 1: ".mysqli_error($link));
       $row1 = mysqli_fetch_assoc($result1);
       $dealerID = $row1['loginid'];
       $who = $row1['Dealer'];
       $group = $row1['setuppersonid']; 
       
       //$group = $_GET['groupid'];
       /*
       $user = $_SESSION['userId'];
       $email   = $userinfo['email'];
       $tbl_name = "orgContacts"; // Table name
       $loginname = $_SESSION['username'];
       
       $sql="SELECT * FROM Dealers where loginid='$dealerID'";
       $result=mysqli_query($link, $sql)or die (mysqli_error());
       $resultrow=mysqli_fetch_array($result);
        $sender = $resultrow['email'];dddddd
       $who = $resultrow['Dealer'].' '.$resultrow['DealerDir'];
       */
       $query = "SELECT * FROM orgCustomers where fundMemberID ='$dealerID'";
       $result1 = mysqli_query($link, $query)or die (mysqli_error());
       $resultrow1 = mysqli_fetch_array($result1);
       //$sender = $resultrow1['orgEmail'];
       //$sender = $userName;
       $sender = $_SESSION['firstName'].$_SESSION['lastname']."@greatmoods.com";


       if ($_POST['logdropdown'] = "Everyone") 
       {
	   $sql = "SELECT * FROM orgCustomers where fundMemberID='$dealerID'";
           $result = mysqli_query($link, $sql);
          while ($row = mysqli_fetch_assoc($result)) 
		{
		    $to = $row["email"];
		    $emailRespond = new Email();
		    $from = "From: ".$sender;
		    $subject = $who." has invited you to join a new fundraiser";
		    $body = $_POST['message']."\n\n";
		    $body .= "Please click the link to support our fundraiser: http://www.greatmoods.com/fundMember/membersite.php?group=".$dealerID;
		    $emailRespond->setTo($to);
		    $emailRespond->setSubject($subject);
		    $emailRespond->setBody($body);
		    $emailRespond->setFrom($from);
		    $emailRespond->setHeader($from);
		    if($emailRespond->send()) {
			echo "email sent successfuly.\n\n";
		    } else {
			echo "email failed :(\n";
		    }
		}// end while
  
} // end "if post" statement
else {
    $sql="SELECT email FROM orgCustomers where fundMemberID='$dealerID' AND fundGroupID = '$group'";
     
    
    $email_from = $sender;
    
   
    $headers1 = "From: ".$email_from." \r\n";
    $headers1 .= "Content-type: text/html\r\n";
    $emailRespond = new Email();
		$to = $_POST['logdropdown'];
		//$to = "clbj35@yahoo.com";
		$from = "From: ".$sender;
		$subject = $who." has invited you to join a new fundraiser";
		$body = $_POST['message']."\n\n";
		$body .= "Please click the link to support our fundraiser: http://www.greatmoods.com/fundMember/membersite.php?groupid=".$dealerID;
		$emailRespond->setTo($to);
		$emailRespond->setSubject($subject);
		$emailRespond->setBody($body);
		$emailRespond->setFrom($from);
		$emailRespond->setHeader($from);
		if($emailRespond->send()) {
			echo "email sent successfuly.\n\n";
		} else {
			echo "email failed :(\n";
		}
		
		
		
        /*
         $to = $_POST['logdropdown'];
         $subject = $who." has invited you to join a new fundraiser";
         
         $message = "Please clicksgfdfx the link to support our fundraiser: http://www.greatmoods.com/membersite.php?groupid=".$dealerID;
         
         $header = "From:promotions@greatmoods.com \r\n";
         //$header .= "Cc:afgh@somedomain.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
            echo "Message sent successfully...";
         }else {
            echo "Message could not be sent...";
         }
    */
}// end else    


echo '<script>location.href="'.$_SESSION['SERVER_ROOT'].'/fundMember/emails.php?groupid=' . $dealerID . '"</script>';

?>