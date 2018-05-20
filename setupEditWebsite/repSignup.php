<?php
  include '../includes/autoload.php';

  if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "RP")
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
   $cn = $row['companyName'];
   $fn = $row['FName'];
   $mn = $row['MName'];
   $ln = $row['LName'];
   $sn = $row['ssn'];
   $a1 = $row['address1'];
   $a2 = $row['address2'];
   $ct = $row['city'];
   $st = $row['state'];
   $zp = $row['zip'];
   $email = $row['email'];
   $hp = $row['homePhone'];
   $cp = $row['cellPhone'];
   $fb = $row['fbPage'];
   $tw = $row['twitter'];
   $li = $row['linkedin'];
   $pp = $row['userPaypal'];
   $pic = $row['picPath'];
   $ftxin = $row['fedtin'];
   $stxin = $row['statetin'];
   $nonp = $row['threec'];
   $pic = $row['picPath'];
?>


<!DOCTYPE html>
<head>
	<title> Getting Started Representative Signup  </title>
</head>
	
<body>
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <?php include 'sideLeftNav.php' ; ?>
      
    <div id="content">
	<h1>Getting Started Representative Signup </h1> 
	<h3>GreatMoods Representative Housekeeping Tasks, 1099 and Representative Agreement</h3>

	<ol>
		<li>Please download and fill out the <a href="http://www.irs.gov/uac/about-form-1099misc" target="_blank">1099 Form</a>, sign it and mail it in to us.<br>
			<p class="indent">GreatMoods, LLC<br>                                                                                           
			750 South Plaza Drive, Suite 317<br>                                            
			Mendota Heights, MN 55120</p>
		</li>
		
		<li>Please download and fill out the <a href="../forms/Welcome to Great Moods- Rep Agreement 2.0 Generic.doc" target="_blank" title="Click to download file">GreatMoods Representative Agreement</a> so we know how to set up your Representative Website.
			<p class="indent"><i>Note:</i> There are thousands of Rep Agreements out there and the bottom line is none of them are perfect. There are no trick clauses and it is designed to cover both of us. GreatMoods will always use Independent Representatives, period. If you were to get hit by a truck while stepping off a curb, or you were to retire with no one to carry on we would reassign your Accounts to another GreatMoods Representative. It is never our intention to work with a Fundraising Account on a direct basis. As long as you maintain the Fundraising Accounts Members, answer their questions and support them in a professional friendly way, the Fundraising Account should be yours for years.</p>
		</li>
		
		<li>Getting paid Cash Weekly requires two simple steps:
			<p class="indent">Setup Email Address for your PayPal Account <br>
			<a href="http://www.paypal.com/home" title="Click to Visit PayPal to Sign Up">Setup your PayPal Account</a> (we can help)</p>
		</li>
		
		<li>Mail us the <a href="http://www.irs.gov/uac/about-form-1099misc" target="_blank">1099 Form</a> and 2 copies of the signed <a href="../forms/Welcome to Great Moods- Rep Agreement 2.0 Generic.doc" target="_blank" title="Click to download file">GreatMoods Representative Agreement</a>.<br>
		<p><i>Explanation about 1099 Form <a href="http://turbotax.intuit.com/tax-tools/tax-tips/Self-Employment-Taxes/What-is-an-IRS-1099-Form-/INF14810.html">here</a>.</i></p>
		</li>
	</ol>
	
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