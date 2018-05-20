<?
   session_start();
   if(!isset($_SESSION['authenticated'])){
            header('Location: ../index.php');
            exit;
   }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Commission | Sales Coordinator</title>
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
      		<?php include 'sidenav.php' ; ?>
	
		<div id="content">
			<h1>Split Commission</h1>
			<h3>Must Not Exceed 1% Total</h3>
			
				<form id="graybackground">
					<div id="commissiontable">
						<div id="row"> <!-- *** header row *** -->
							<span id="fname">First Name</span>
							<span id="lname">Last Name</span>
							<span id="phone">Phone</span>
							<span id="ppemail">PayPal Email</span>
							<span id="commission">Commission</span>
						</div> <!-- end row -->
						<div id="row"> <!-- *** input row *** -->
							<input id="fname" type="text" name="firstname" title="First Name">
							<input id="lname" type="text" name="lastname" title="Last Name">
							<input id="phone" type="text" name="phone" title="Phone Number">
							<input id="ppemail" type="text" name="paypalemail" title="PayPal Email Address">
							<input id="commission" type="text" name="commission" title="Commission Portion">%
						</div> <!-- end row -->
						<div id="row"> <!-- *** input row *** -->
							<input id="fname" type="text" name="firstname" title="First Name">
							<input id="lname" type="text" name="lastname" title="Last Name">
							<input id="phone" type="text" name="phone" title="Phone Number">
							<input id="ppemail" type="text" name="paypalemail" title="PayPal Email Address">
							<input id="commission" type="text" name="commission" title="Commission Portion">%
						</div> <!-- end row -->
						<div id="row"> <!-- *** input row *** -->
							<input id="fname" type="text" name="firstname" title="First Name">
							<input id="lname" type="text" name="lastname" title="Last Name">
							<input id="phone" type="text" name="phone" title="Phone Number">
							<input id="ppemail" type="text" name="paypalemail" title="PayPal Email Address">
							<input id="commission" type="text" name="commission" title="Commission Portion">%
						</div> <!-- end row -->
						<div id="row"> <!-- *** input row *** -->
							<input id="fname" type="text" name="firstname" title="First Name">
							<input id="lname" type="text" name="lastname" title="Last Name">
							<input id="phone" type="text" name="phone" title="Phone Number">
							<input id="ppemail" type="text" name="paypalemail" title="PayPal Email Address">
							<input id="commission" type="text" name="commission" title="Commission Portion">%
						</div> <!-- end row -->
						<div id="row"> <!-- *** input row *** -->
							<input id="fname" type="text" name="firstname" title="First Name">
							<input id="lname" type="text" name="lastname" title="Last Name">
							<input id="phone" type="text" name="phone" title="Phone Number">
							<input id="ppemail" type="text" name="paypalemail" title="PayPal Email Address">
							<input id="commission" type="text" name="commission" title="Commission Portion">%
						</div> <!-- end row -->
						<div id="row"> <!-- *** submit row *** -->
							<input type="submit" value="Save" title="Save Changes to Commission Structure">
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