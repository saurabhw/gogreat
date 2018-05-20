<?
   session_start();
   if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
   include '../includes/connection.inc.php';
   $link = connectTo();
   $table = "Dealers"; 
if(isset($_POST['submit'])){
            $too = mysqli_real_escape_string($link, $_POST['to']);
            $frm =  mysqli_real_escape_string($link, $_POST['from']);
            $sub =  mysqli_real_escape_string($link, $_POST['subject']);
            $what = mysqli_real_escape_string($link, $_POST['message']);
          
            $message = $what;
  	    $message = wordwrap($message, 50, "\r\n");
  	    $to = $too;
            $subject = $sub;
            $headers = 'From: '.$frm;
            mail($to, $subject, $message, $headers);
          
          
            /*$messge =  mysqli_real_escape_string($link, htmlspecialchars($_POST['message']));
  	    $message = wordwrap($message, 70, "\r\n");
  	    $to = $user_email;
            $subject = mysqli_real_escape_string($link, $_POST['subject']);
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
            $headers .= "From: $frm" . "\r\n";
            mail($too, $subject, $message, $headers);*/
  	    $redirect = "Location:disthome.php";
  	    header("$redirect");
  	
  	}
   $who = mysqli_real_escape_string($link, $_POST['clubidemail']);
   $group = $_GET["groupid"];
   $query = "SELECT * FROM $table WHERE loginid='$who'";
   $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error());
   $row = mysqli_fetch_assoc($result);
   $user_name = $row['userName'];
   $pass = $row['firstPass'];
   $to = mysqli_real_escape_string($link, $_POST['to']);
   $from = mysqli_real_escape_string($link, $_POST['from']);
?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8" />
	<title>GreatMoods | Setup/Edit Website - Send Emails</title>
	<script type="text/javascript">
	function validate(form) {
		var pass1 = form['loginPass'].value;
		var pass2 = form['confirmPass'].value;
		if(pass1 == "" || pass1 == null) {
			alert("please enter a valid password");
			return false;
		}
		if(pass1 != pass2) {
			alert("passwords do not match");
			return false;
		}
		return true;
	}
	</script>
	<link href="../css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
	<link href="../css/setupFormStyles.css" rel="stylesheet" type="text/css" />
	</head>
	<body id="reasons">
<div id="container">
      <?php include '../representative/header_homepage2.php' ; ?>
      <?php include 'leftNavSetupEditWebsite.php' ; ?>
      <div id="contentMain858">
   
    <!--end nav2-->
    
    <h3>Send Email</h3>
    <div class="setupLeft">

      <div id="leadBox">
        <div id="infoText">
          <div class="emailform">
          <form method="post" action="email.php" enctype="multipart/form-data">
          <table>
          <tr>
          	<th align="right"><label for="to"><b>To</b></label></th>
          	<td><input type="text" id="websiteURL" name="to" value="<? echo $to; ?>" readonly="readonly" /></td>
          </tr>
          <tr>
          	<th align="right"><label for="from"><b>From</b></label></th>
          	<td><input type="text" id="websiteURL" name="from" value="<? echo $from;?>" /></td>
          </tr>
          <tr>
          	<th align="right"><label for="subject"><b>Subject</b></label></th>
          	<td><input type="text" id="websiteURL" name="subject" value="Welcome to GreatMoods.com" /><br></td>
          </tr>
          </table>
          <textarea name="message" cols="40" row="40" style="margin: 6px; height: 176px; width: 385px; text-align: left;" wrap="s">You have a new account and fundraising website at GreatMoods! Check out your site: http://www.greatmoods.com/fundSite.php?groupid=<? echo $who;?>
     Name:<? echo $user_name;?>
   Password:<? echo $pass;?>
          </textarea>
          <br>
       
          <input type="hidden" name="gp" value="<?echo $fundraiserid; ?>" />
          <input type="submit" name="submit" value="Send Email" />
          </form>  
          </div>
          <!--end redBar1-->

        </div>
        <!--end infoText-->
      </div>
      <!--end leadBox-->
    </div>
    <!--end setupLeft-->
    
      </div>
      <!--end contentMain858-->
     <?php include '../includes/footer.php' ; ?>
    </div>
<!--end container-->

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