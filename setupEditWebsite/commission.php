<?
   include '../includes/autoload.php';
   if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
   
   $table = "user_info"; 
   if(isset($_POST['submit'])){
	   //$groupName = mysqli_real_escape_string($link, $groupName);
	   $company = mysqli_real_escape_string($link, $_POST['company']);
	   $Fname = mysqli_real_escape_string($link, $_POST['fname']);
	   $Lname = mysqli_real_escape_string($link, $_POST['lname']);
	   $em = mysqli_real_escape_string($link, $_POST['email']);
	   $cell = mysqli_real_escape_string($link, $_POST['cell']);
	   $ppal = mysqli_real_escape_string($link, $_POST['pal']);
	   $who = mysqli_real_escape_string($link, $_POST['gp']);
	   
	   $query2 = "UPDATE $table SET
  				companyName = '$company',
  				FName = '$Fname',
  				LName = '$Lname',
  				email = '$em',
  				homePhone = '$hp',
  				cellPhone = '$cell',
  				userPaypal = '$ppal'
  				WHERE userInfoID = '$who';";
  	$result2 = mysqli_query($link, $query2)or die("MySQL ERROR: ".mysqli_error($link)); 
  	if($result2){
  	    $redirect = "Location:editacct.php";
  	    header("$redirect");
  	}
  	}
   $userID = $_SESSION['userId'];
   $query = "SELECT * FROM $table WHERE userInfoID='$userID' and role='Representative'";
   $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error());
   $row = mysqli_fetch_assoc($result);
   $cn = $row['companyName'];
   $fn = $row['FName'];
   $ln = $row['LName'];
   $email = $row['email'];
   $cp = $row['cellPhone'];
   $pp = $row['userPaypal']; 
?>

<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>Commission | Representative</title>
	<link href="../css/layout_styles.css" rel="stylesheet" type="text/css">
	<link href="../css/form_styles.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="../images/favicon.ico">
	
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
</head>

<body>
	<div id="container">
		<?php include 'header.inc.php' ; ?>
		<?php include 'sideLeftNav.php' ; ?>
	
		<div id="content">
			<h1>Split Commission</h1>
			<h3>Must Not Exceed 8% Total</h3>
			
				<form id="graybackground">
					<div id="commissiontable">
						<div id="row"> <!-- *** header row *** -->
							<span id="fname">First</span>
							<span id="lname">Last</span>
							<span id="loginemail">Email</span>
							<span id="phone">Phone</span>
							<span id="ppemail">PayPal Email</span>
							<span id="ssn">SSN</span>
							<span id="or">-or-</span>
							<span id="tin">TIN</span>
							<span id="commission">Comm.</span>
						</div> <!-- end row -->
						<div id="row"> <!-- *** input row *** -->
							<input id="fname" type="text" name="firstname" value="<? echo $fn;?>" title="Your First Name" readonly>
							<input id="lname" type="text" name="lastname" value="<? echo $ln;?>" title="Your Last Name" readonly>
							<input id="loginemail" type="text" name="email" value="<? echo $email;?>" title="Your Login Email Address" readonly>
							<input id="phone" type="text" name="phone" value="<? echo $cp;?>" title="Your Cell Phone Number" readonly>
							<input id="ppemail" type="text" name="paypalemail" value="<? echo $pp;?>" title="Your PayPal Email Address" readonly>
							<input id="ssn" type="text" name="ssn" value="" title="Your Social Security Number" readonly>
							<input id="tin" type="text" name="tin" value="" title="Your Tax ID Number" readonly>
							<input id="commission" type="text" name="commission" value="8" title="Your Commission Portion">%
						</div> <!-- end row -->
						<div id="row"> <!-- *** input row *** -->
							<input id="fname" type="text" name="firstname" title="First Name">
							<input id="lname" type="text" name="lastname" title="Last Name">
							<input id="loginemail" type="text" name="email" value="" title="Login Email Address">
							<input id="phone" type="text" name="phone" title="Cell Phone Number">
							<input id="ppemail" type="text" name="paypalemail" title="PayPal Email Address">
							<input id="ssn" type="text" name="ssn" value="" title="Social Security Number">
							<input id="tin" type="text" name="tin" value="" title="Tax ID Number">
							<input id="commission" type="text" name="commission" title="Commission Portion">%
						</div> <!-- end row -->
						<div id="row"> <!-- *** input row *** -->
							<input id="fname" type="text" name="firstname" title="First Name">
							<input id="lname" type="text" name="lastname" title="Last Name">
							<input id="loginemail" type="text" name="email" value="" title="Login Email Address">
							<input id="phone" type="text" name="phone" title="Cell Phone Number">
							<input id="ppemail" type="text" name="paypalemail" title="PayPal Email Address">
							<input id="ssn" type="text" name="ssn" value="" title="Social Security Number">
							<input id="tin" type="text" name="tin" value="" title="Tax ID Number">
							<input id="commission" type="text" name="commission" title="Commission Portion">%
						</div> <!-- end row -->
						<div id="row"> <!-- *** input row *** -->
							<input id="fname" type="text" name="firstname" title="First Name">
							<input id="lname" type="text" name="lastname" title="Last Name">
							<input id="loginemail" type="text" name="email" value="" title="Login Email Address">
							<input id="phone" type="text" name="phone" title="Cell Phone Number">
							<input id="ppemail" type="text" name="paypalemail" title="PayPal Email Address">
							<input id="ssn" type="text" name="ssn" value="" title="Social Security Number">
							<input id="tin" type="text" name="tin" value="" title="Tax ID Number">
							<input id="commission" type="text" name="commission" title="Commission Portion">%
						</div> <!-- end row -->
						<div id="row"> <!-- *** input row *** -->
							<input id="fname" type="text" name="firstname" title="First Name">
							<input id="lname" type="text" name="lastname" title="Last Name">
							<input id="loginemail" type="text" name="email" value="" title="Login Email Address">
							<input id="phone" type="text" name="phone" title="Cell Phone Number">
							<input id="ppemail" type="text" name="paypalemail" title="PayPal Email Address">
							<input id="ssn" type="text" name="ssn" value="" title="Social Security Number">
							<input id="tin" type="text" name="tin" value="" title="Tax ID Number">
							<input id="commission" type="text" name="commission" title="Commission Portion">%
						</div> <!-- end row -->
						<div id="row"> <!-- *** submit row *** -->
							<input type="submit" value="Apply Changes" title="Save Changes to Commission Structure">
							<div id="total">Total: <input id="commission" type="text" name="commissiontotal" title="Commission Total" readonly>%</div>
						</div> <!-- end row -->
					</div> <!-- end table -->
				</form>
			
		</div> <!-- end content -->
		
		<?php include '../includes/footer.php' ; ?>
	</div> <!-- end container -->
</body>
</html>
<pre>
<?php if ($_POST && $mailSent){
	echo htmlentities($message, ENT_COMPAT, 'UTF-8')."\n";
	echo 'Headers: '.htmlentities($headers, ENT_COMPAT, 'UTF-8');
	}
?>
</pre>
<?php
   ob_end_flush();
?>