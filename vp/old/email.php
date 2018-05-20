<?
   session_start();
      if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
   include '../includes/connection.inc.php';
   
   $link = connectTo();
   $userID = $_SESSION['userId'];
   $query = "SELECT * FROM user_info WHERE userInfoID='$userID'";
   $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error($link));
   $row = mysqli_fetch_assoc($result);
   
   $pic = $row['picPath'];
   
   
   
  // $who = mysqli_real_escape_string($link, $_POST['clubidemail']);
   $memberID = $_GET['member'];
   $query = "SELECT * FROM orgMembers WHERE fundraiserID = '$memberID'  ";
   $result = mysqli_query($link, $query)or die ("couldn't execute query 1.".mysql_error($link));
   $row2 = mysqli_fetch_assoc($result);
   
   
   $memberEmail = $row2['orgEmail'];
   $to = $memberEmail;
   $from = "noreply@greatmoods.com";
   
   
   $getID = "SELECT * FROM Dealers WHERE loginid = '$memberID'";
   $memberResult = mysqli_query($link, $getID)or die ("couldn't execute query 2.".mysql_error($link));
   $rowM = mysqli_fetch_assoc($memberResult);
   $user_name = $rowM['userName'];
   $pass = $rowM['firstPass'];
   
   $message = "You have a new account and fundraising website at GreatMoods!\r\n";
   $message .= "Check out your site: \r\nhttp://www.greatmoods.com/membersite.php?group=".$memberID;
   $message .= "\r\nLogin in to manage your account.\r\n";
   $message .= "User Name: ".$user_name;
   $message .= "\r\n";
   $message .= "Password: ".$pass;
   
   //get logged in vp details

 
?>
<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<title>GreatMoods | Send Email</title>
	<link href="../css/layout_styles.css" rel="stylesheet" type="text/css" />
	<link href="../css/addnew_form_styles.css" rel="stylesheet" type="text/css" />
	<link href="../css/header_styles.css" rel="stylesheet" type="text/css">
	<link href="../css/sidenav_styles.css" rel="stylesheet" type="text/css">

</head>
	
<body>
	<div id="container">
		 <?php include 'header.inc.php' ; ?>
      <?php include 'sidenav.php' ; ?>
      
      <div id="content">   
    	<h1>Send Emails</h1>
    	<h3>Send an email to your member informing them of their account.</h3>
          <div class="emailform">
          <form method="post" action="emailSend.php" enctype="multipart/form-data">
         
          
         <? echo $message; ?>
        <!-- <input type="text" name="message" value="<? echo $message; ?>" readonly>
          <input type="text" name="u" value="<? echo $user_name; ?>" readonly>
          <input type="text" name="p" value="<? echo $pass; ?>" readonly>-->
    
        
          <input type="hidden" name="memberid" value="<?echo $memberID ; ?>" />
          <input type="submit" name="submit" class="redbutton" value="Send Email" />
          </form>  
          </div> <!--end emailform-->
    
      </div> <!--end content-->
      
     <?php include 'footer.php' ; ?>
    </div> <!--end container-->

</body>
</html>
<pre>
<?php if ($_POST && $mailSent){
	echo htmlentities($message, ENT_COMPAT, 'UTF-8')."\n";
	echo 'Headers: '.htmlentities($headers, ENT_COMPAT, 'UTF-8');
} ?>
</pre>
<?php
   ob_end_flush();
?>