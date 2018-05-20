<?
      include '../includes/autoload.php';
      if(isset($_POST['submit1']))
       {
          $_SESSION['role'] = "RP";
       }
      if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "RP")
       {
            header('Location: ../index.php');
            exit;
       }
       
       $userID = $_SESSION['userId'];
       $userEmail = $_SESSION['email'];
       
       
       $query = "SELECT * FROM user_info WHERE userInfoID='$userID'";
       $resultx = mysqli_query($link, $query)or die ("couldn't execute query.".mysqli_error($link));
       $rowx = mysqli_fetch_assoc($resultx);
       $pic = $rowx['picPath'];
       
       //check if user has member account
       $getMember = "SELECT * FROM Dealers WHERE userName = '$userEmail'";
       $result = mysqli_query($link, $getMember)or die ("couldn't execute get member query.".mysqli_error($link));
       
       //check if user has SC account
       $getDis = "SELECT * FROM distributors WHERE email = '$userEmail' AND role = 'SC'";
       $result2 = mysqli_query($link, $getDis)or die ("couldn't execute get distributor query.".mysqli_error($link));
       
        //check if user has VP account
       $getVP = "SELECT * FROM distributors WHERE email = '$userEmail' AND role = 'VP'";
       $result3 = mysqli_query($link, $getVP)or die ("couldn't execute get vp query.".mysqli_error($link));
     
?>
<!DOCTYPE HTML>
<head>
	<title>Rep Login | Representative</title>
</head>

<body>
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <?php include 'loginNav.php' ; ?>
  
  <div id="content">
  <h1>Login</h1>
  <br>
  <?
    if(mysqli_num_rows($result) > 0)
       {
         $memberRow = mysqli_fetch_assoc($result);
         
         //echo 'user has member account'; 
         echo '<form action="../fundMember/memberLogin.php" method="Post"><input type="submit" class="redbutton" value="Login as Fundraiser Member" name="submit1"></form><br>';
         
       }
       else
       {
          //echo 'No member account.<br>';
       }
       
       if(mysqli_num_rows($result2) > 0)
       {
         //echo 'user has SC account'; 
         echo '<form action="../sales/viewReps.php" method="Post"><input type="submit" class="redbutton" value="Login as Sales Coordinator" name="submit1"></form><br>';
         
       }
       else
       {
          //echo 'No SC account.<br>';
       }
       if(mysqli_num_rows($result3) > 0)
       {
         echo 'user has VP account';
         echo '<form action="../vp/accounts.php" method="Post"><input type="submit" class="redbutton" value="Login as Vice President" name="submit1"></form><br>'; 
         
       }
       else
       {
          //echo 'No VP account.<br>';
       }
       
      echo '<br><a href="editClub.php"><input type="button" class="redbutton" value="Login as Representative" name=""></a><br>';
  ?>
   </div>  <!--end content-->
  
  <?php include 'footer.php' ; ?>
</div><!--end container-->

</body>

<?php
ob_end_flush();
?>