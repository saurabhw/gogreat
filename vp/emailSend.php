<?php
 
    include '../includes/autoload.php';
    $id = $_SESSION['userId'];
    $memberID = $_POST['memberid'];
    $query1 = "SELECT * FROM Dealers WHERE loginid='$memberID'";
    $result1 = mysqli_query($link, $query1)or die("MySQL ERROR query 1: ".mysqli_error($link));
    $row1 = mysqli_fetch_assoc($result1);
    $name = $row1['Dealer'];
    $lower = strtolower($name);
    $cleanName = str_replace(' ', '', $lower);
    $query = "SELECT * FROM orgMembers WHERE fundraiserID ='$memberID' AND repID ='$id' ";
    $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error());
    $row2 = mysqli_fetch_assoc($result);
    
    $user_name = $row1['userName'];
    $pass = $row1['firstPass'];
    $fn = $row2['orgFName'];
    $ln = $row2['orgLName'];
    $to = $row2['orgEmail'];
    $parentID = $row2['fund_owner_id'];
    $from = $cleanName."@greatmoods.com";
    //$to = mysqli_real_escape_string($link, $_POST['to']);
    //$from = mysqli_real_escape_string($link, $_POST['from']);
    //$subject = mysqli_real_escape_string($link, $_POST['subject']);
    //$message = mysqli_real_escape_string($link, $_POST['message']);
    
    $subject = "Hello ".$fn." ".$ln." You Are Now a Member Of ".$groupName." ".$club." Fundraiser";
    $message = "Hey ".$fn."!";
    $message .= "<br />";
    $message .= "<br />";
    $message .= "You have a new account and fundraising website at GreatMoods! Check out your site:";
    $message .= "<br />";
    $message .= "<br />";
    $message .= "http://www.greatmoods.com/membersite.php?group=".$memberID;
    $message .= "<br />";
    $message .= "<br />";
    $message .= "Login to Manage Your Account";
    $message .= "<br />";
    $message .= "<br />";
    $message .= "User Name: ".$user_name;
    $message .= "<br />";
    $message .= "<br />";
    $message .= "Password: ".$pass; 
    
        // $to = $email; 
   // $subject = "Hello Greatmoods.com";
    $headers = "From: ".$from."\r\n";
    //$headers .= "BCC: ".$email."\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    //$message = $_GET['message'];
     //$message .= "<br />
     //    <br />Please click the link to support our fundraiser: 
     //    http://www.greatmoods.com/membersite.php?group=".$group;
         
         if(mail($to, $subject, $message, $headers))
         {
           echo "sent";
         }
         else
         {
           echo "failed";
         }
         echo '<script>location.href="'.$_SESSION['SERVER_ROOT'].'/setupEditWebsite/editMembers.php?group=' . $parentID . '"</script>';
    //$headers = "From:".$from;
    /*
    $ext = "@greatmoods.com";
    $from = $from.$ext;
    $headers ="From:".$from."\n";
    $headers.="MIME-Version: 1.0\n";
    $headers.="Content-type: text/html; charset=iso 8859-1"; 
    
    $emailRespond = new Email();
    $emailRespond->setTo($to);
    $emailRespond->setSubject($subject);
    $emailRespond->setBody($body);
    $emailRespond->setFrom($from);
    $emailRespond->setHeader($headers);
    if(mail($to, $subject, $message, $headers))
    {
	echo "email sent successfuly.\n\n";
	
echo '<script>location.href="'.$_SESSION['SERVER_ROOT'].'/setupEditWebsite/editMembers.php?group=' . $parentID . '"</script>';
    } 
    else
    {
	echo "email failed :(\n";
    }
   
  */
  
  

?>