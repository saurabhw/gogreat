<?php
  
  session_start(); 
  if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
  $current = $_SESSION['email'];
  include 'includes/connection.inc.php';
  $link = connectTo();
  $msg = '';
  if(isset($_POST['submit']))
  {
     $password1 = mysqli_real_escape_string($link, $_POST['password']);
     $cpassword = mysqli_real_escape_string($link, $_POST['cpassword']);
     if($cpassword != $password1)
     {
          $msg .= "Passwords do not match";
     }
     else
     {
         $salt = time();
         $password = sha1($password1.$salt);
         $update = "UPDATE users SET password = '$password', salt = '$salt' WHERE username = '$current'";
         $result = mysqli_query($link, $update) or die("MYSQL ERROR query update: ".mysqli_error($link));
         if($result)
         {
             $msg .= "Your password Has Been Reset";
             $to = $current;
	     $subject = "Password reset on Greatmoods.com";
	     $headers = 'From: no-reply@greatmoods.com';
	     $message = "Your password has been reset.";
	     $message .="\nYour new password is $password1";
	     //$message .="\nWe highly suggest you log in soon and change it to something you will remember.";
	     mail($to, $subject, $message, $headers);
         }
         
     }
    
  }//end post submit
  
?>
<!DOCTYPE html>
<head>
	<title>Password Reset | GreatMoods</title>
</head>

<body>
<div id="container">
	<?php include 'includes/header.inc.php'; ?>
	<?php include 'navigation/fullSidebar_home.php'; ?>

  <div id="contentSample">
  <br />
  <h2>Change Your Password</h2>
  <form action="reset.php" method="post">
  <br />
 <!-- <input type="email" name="password" value="<?php echo $current; ?>" required> Current Password-->
  <br />
  <br />
  <input type="password" name="password" value"" required> Enter New Password
  <br />
  <br />
  <input type="password" name="cpassword" value"" required> Confirn New Password
  <br />
  <br />
  <input type="submit" name="submit" class="redbutton" value="Change Password" required>
  </form>
  <?php echo '<p style="color:blue;">'.$msg.'</p>'; ?>
  
  <a href="/<?php echo $_SESSION['landingPage'];?>"><input type="button" class="redbutton" value="Nah..Take me to my home page." ></a>
  </div>  <!--end content-->
  
<div class="clearfloat">  </div>
<?php include 'footer.php' ; ?>
</div> <!--end container-->
</body>
</html>
<?php
   ob_end_flush();
?>
</html>