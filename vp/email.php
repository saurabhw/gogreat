<?
   include '../includes/autoload.php';
      if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "VP")
       {
            header('Location: ../index.php');
            exit;
       }
       if($_SESSION['freeze'] == "TRUE")
       {
          // echo "Account Frozen";
           header('Location: accountEdit.php');
       }

   $userID = $_SESSION['userId'];
   $query = "SELECT * FROM user_info WHERE userInfoID='$userID'";
   $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysqli_error($link));
   $row = mysqli_fetch_assoc($result);
   
   $pic = $row['picPath'];
   
   
   
  // $who = mysqli_real_escape_string($link, $_POST['clubidemail']);
   $memberID = $_GET['member'];
   $query = "SELECT * FROM orgMembers WHERE fundraiserID = '$memberID'  ";
   $result = mysqli_query($link, $query)or die ("couldn't execute query 1.".mysqli_error($link));
   $row2 = mysqli_fetch_assoc($result);
   
   
   $memberEmail = $row2['orgEmail'];
   $to = $memberEmail;
   $from = "noreply@greatmoods.com";
   
   
   $getID = "SELECT * FROM Dealers WHERE loginid = '$memberID'";
   $memberResult = mysqli_query($link, $getID)or die ("couldn't execute query 2.".mysqli_error($link));
   $rowM = mysqli_fetch_assoc($memberResult);
   $user_name = $rowM['userName'];
   $pass = $rowM['firstPass'];
   
   $message = "You have a new account and fundraising website at GreatMoods!<br><br>";
   $message .= "Check out your site: <br><br>http://www.greatmoods.com/membersite.php?group=".$memberID;
   $message .= "<br><br>Login in to manage your account.<br><br>";
   $message .= "User Name: ".$user_name;
   $message .= "<br><br>";
   $message .= "Password: ".$pass;
?>
<!DOCTYPE html>
<head>
	<title>GreatMoods | Send Email</title>
</head>
	
<body>
	<div id="container">
		 <?php include 'header.inc.php' ; ?>
      		<?php include 'sidenav.php' ; ?>
      
      <div id="content">   
    	<h1>Send Emails</h1>
    	<h3>Send an email to your member informing them of their account.</h3>
	
	<div id="column1">
	<div class="graybackground">
	          <form method="post" action="emailSend.php" enctype="multipart/form-data">
		         
		         <? echo $message; ?>
		         
		        <!-- <input type="text" name="message" value="<? echo $message; ?>" readonly>
		          <input type="text" name="u" value="<? echo $user_name; ?>" readonly>
		          <input type="text" name="p" value="<? echo $pass; ?>" readonly>-->
		    
		          <br><br>
		          
		          <input type="hidden" name="memberid" value="<?echo $memberID ; ?>" />
		          <input type="submit" name="submit" class="redbutton" value="Send Email" />
		          
	          </form>  
          </div> <!-- end graybackground -->
          </div> <!-- end column1 -->
          
          <div id="column2">
          	<img src="../images/websiteready_sample.jpg" alt="website is ready - send email to member!" style="width: 100%;">
          </div> <!-- end column2 -->
    
      </div> <!--end content-->
      
     <?php include '../includes/footer.php' ; ?>
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