<?php
    include '../includes/autoload.php';
     if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "SC")
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
     
     $query = "SELECT * FROM user_info 	WHERE userInfoID='$userID'";
     $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error($link));
     $row = mysqli_fetch_assoc($result);
     $myPic = $row['picPath'];
?>


<!DOCTYPE html>
<head>
	<title> Getting Started Representative Signup  </title> 
</head>
	
<body>
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <?php include 'sidenav.php' ; ?>
      
    <div id="content">
    
       <h1>Getting Started Representative Signup </h1> 
       <h3>GreatMoods Sales Representative Housekeeping Tasks, 1099 and GreatMoods Representative Agreement</h3>
	

	<div id>
      		<hr5> 1) Please download and fill out the <a href="">1099 Form</a>, sign it, and mail it in to us. </hr5> 
                       <br>
                       <p>&nbsp;&nbsp; GreatMoods<br>                                                                                             
                       &nbsp;&nbsp; 750 South Plaza Drive, Suite 317<br>                                              
                       &nbsp;&nbsp; Mendota Heights, MN 55120 </p>
                       
	<hr5> 2) Please download and fill out the <a href="">GreatMoods Representative Agreement</a> so we know how to set up your GreatMoods Representative Website. </hr5>
	<br>
  	<p>Note: There are thousands of Rep Agreements out there and the bottom line is none of them are perfect. There are no trick clauses and it is designed to cover both of us. GreatMoods will always use Independent Representatives, period. If you were to get hit by a truck while stepping off a curb, or you were to retire with no one to carry on, we would reassign your Accounts to another GreatMoods Representative. It is never our intention to work with a Fundraising Account on a direct basis. As long as you maintain the Fundraising Account's Members, answer their questions, and support them in a professional, friendly way, the Fundraising Account should be yours for years. </p>
   		<hr5> 3) Getting paid Cash Next day requires two simple steps:</hr5>
	<p> &nbsp;&nbsp;&nbsp; -    Setup Email Address for your PayPal Account <br>
		
	&nbsp;&nbsp;&nbsp; -     Setup your PayPal Account (we can help)</p>

       <hr5>4) Scan & Email or Mail us the 1099 and 2 copies of the signed GreatMoods Representative Agreement.</hr5>
        <br><br><br>
         
	</div> <!--end column1-->
	
  		
      		
      		
      
          
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