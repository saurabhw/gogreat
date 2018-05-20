<?php
       session_start();

       if(!isset($_SESSION['authenticated']) )
       {
            header('Location: ../index.php');
            exit;
       }
       $ct = $_SESSION['groupid'];
       $msg = ''; 
       require_once("../includes/connection.inc.php");
       require_once("../includes/functions.php");
       include('../samplewebsites/imageFunctions.inc.php');
       $link = connectTo();
       $userName = $_SESSION['email'];
       $query1 = "SELECT * FROM Dealers WHERE loginid = '$ct'";
       $result1 = mysqli_query($link, $query1)or die("MySQL ERROR query 1: ".mysqli_error($link));
       $row1 = mysqli_fetch_assoc($result1);
       $dealerID = $row1['loginid'];
       $group = $row1['setuppersonid'];
       $repID = $row1['setuppersonid2'];
       $myPic = $row1['contact_pic'];
       $goal = $row1['goal2'];
       $so_far = getSoloSales($dealerID); 
       $banner = $row1['banner_path']; 
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
         
         $update2 = "UPDATE Dealers SET firstPass = '$password' WHERE userName = '$current'";
         $result2 = mysqli_query($link, $update2) or die("MYSQL ERROR query update 2: ".mysqli_error($link));
         if($result && $result2)
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
	<?php include 'header.php'; ?>
	<?php include 'memberSidebar.php'; ?>

  <div id="content">
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
  
  <a href="/<?php echo $_SESSION['landingPage'];?>"><input type="button" class="redbutton" value="Account Homepage" ></a>
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