<?
   session_start();
   //include($_SERVER['DOCUMENT_ROOT'].'/includes/connection.inc.php');
   include('connection.inc.php');
   $link = connectTo();
   $table = "user_info"; 
   if(isset($_POST['submit'])){
	   //$groupName = mysqli_real_escape_string($link, $groupName);
	   $company = mysqli_real_escape_string($link, $_POST['company']);
	   $Fname = mysqli_real_escape_string($link, $_POST['fname']);
	   $Lname = mysqli_real_escape_string($link, $_POST['lname']);
	   $address1 = mysqli_real_escape_string($link, $_POST['address1']);
	   $address2 = mysqli_real_escape_string($link, $_POST['address2']);
	   $city = mysqli_real_escape_string($link, $_POST['city']);
	   $state = mysqli_real_escape_string($link, $_POST['state']);
	   $zip = mysqli_real_escape_string($link, $_POST['zip']);
	   $em = mysqli_real_escape_string($link, $_POST['email']);
	   $hp = mysqli_real_escape_string($link, $_POST['hphone']);
	   $cell = mysqli_real_escape_string($link, $_POST['cell']);
	   $ppal = mysqli_real_escape_string($link, $_POST['pal']);
	   $face = mysqli_real_escape_string($link, $_POST['face']);
	   $twitter = mysqli_real_escape_string($link, $_POST['twit']);
	   $linkedin = mysqli_real_escape_string($link, $_POST['linked']);
	   $ss = mysqli_real_escape_string($link, $_POST['ssn']);
	   $who = mysqli_real_escape_string($link, $_POST['gp']);
	   
	   $query2 = "UPDATE $table SET
  				companyName = '$company',
  				FName = '$Fname',
  				LName = '$Lname',
  				ssn = '$ss',
  				address1 = '$address1',
  				address2 = '$address2',
  				city = '$city',
  				state = '$state',
  				zip = '$zip',
  				email = '$em',
  				homePhone = '$hp',
  				fbPage = '$face',
  				twitter = '$twitter',
  				linkedin = '$linkedin',
  				cellPhone = '$cell',
  				userPaypal = '$ppal'
  				WHERE userInfoID = '$who';";
  	$result2 = mysqli_query($link, $query2)or die("MySQL ERROR: ".mysqli_error($link)); 
  	if($result2){
  	    $redirect = "Location:editacct.php";
  	    header("$redirect");
  	}
  	}
   $dis = $_GET['dis'];
   $userID = $_SESSION['userId'];
   $query = "SELECT * FROM $table WHERE userInfoID='$dis'";
   $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error());
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
   
?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8" />
	<title>GreatMoods | Setup/Edit Website - Goals</title>
		<link rel="stylesheet" type="text/css" href="../../css/layout_styles.css" >
	<link rel="stylesheet" type="text/css" href="../../css/form_styles.css" >
	<link rel="shortcut icon" href="../../images/favicon.ico">
	
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
    <h3>Edit <? echo $fn.'&nbsp;'.$ln;?>'s Account</h3>
    <form id="graybackground" method="post" action="" enctype="multipart/form-data">
			<div id="editaccount_table">
				<div id="row"> <!-- *** header row *** -->
					<span id="company">Company</span>
					<span id="fname">First</span>
					<span id="lname">Last</span>
				</div> <!-- end row -->
				<div id="row"> <!-- *** input row *** -->
					<input id="company" type="text" name="company" value="<? echo $cn; ?>" title="Company Name"/>
					<input id="fname" type="text" name="firstname" value="<? echo $fn;?>" title="First Name">
					<input id="lname" type="text" name="lastname" value="<? echo $ln;?>" title="Last Name">
				</div> <!-- end row -->
						
				<div id="row"> <!-- *** header row *** -->
					<span id="address1">Address 1</span>
					<span id="address2">Address 2</span>
					<span id="city">City</span>
					<span id="state">State</span>
					<span id="zip">Zip</span>
				</div> <!-- end row -->
				<div id="row"> <!-- *** input row *** -->
					<input id="address1" type="text" name="address1" value="<? echo $a1;?>" title="Address"/>
					<input id="address2" type="text" name="address2" value="<? echo $a2;?>" title="Apt or Suite"/>
					<input id="city"  type="text" name="city" value="<? echo $ct;?>" title="City"/>
					<input id="state"  type="text" name="state" value="<? echo $st;?>" title="State"/>
					<input id="zip"  type="text" name="zip" value="<? echo $zp;?>" title="Zip"/>
				</div> <!-- end row -->
						
				<div id="row"> <!-- *** header row *** -->
					<span id="loginemail">Email</span>
					<span id="phone">Phone 1</span>
					<span id="phone">Phone 2</span>
				</div> <!-- end row -->
				<div id="row"> <!-- *** input row *** -->
					<input id="loginemail" type="text" name="email" value="<? echo $email;?>" title="Login Email Address">
					<input id="phone" type="text" name="phone" value="<? echo $cp;?>" title="Cell Phone Number">
					<input id="phone" type="text" name="hphone" value="<? echo $hp;?>" title="Home Phone Number"/>
				</div> <!-- end row -->
						
				<div id="row"> <!-- *** header row *** -->
					<span id="url">Facebook</span>
					<span id="url">Twitter</span>
					<span id="url">LinkedIn</span>
				</div> <!-- end row -->
				<div id="row"> <!-- *** input row *** -->
					<input id="url" type="text" name="face" value="<? echo $fb;?>" title="Facebook Page URL"/>
					<input id="url" type="text" name="twit" value="<? echo $tw;?>" title="Twitter URL"/>
					<input id="url" type="text" name="linked" value="<? echo $li;?>" title="LinkedIn Profile URL"/>
				</div> <!-- end row -->
						
				<div id="row"> <!-- *** header row *** -->
					<span id="ppemail">PayPal Email</span>
					<span id="ssn">SSN</span>
					<span id="or">-or-</span>
					<span id="tin">TIN</span>
				</div> <!-- end row -->
				<div id="row"> <!-- *** input row *** -->
					<input id="ppemail" type="text" name="paypalemail" value="<? echo $pp;?>" title="PayPal Email Address">
					<input id="ssn" type="text" name="ssn" value="<? echo $sn;?>" title="Social Security Number">
					<input id="tin" type="text" name="tin" value="" title="Tax ID Number">
				</div> <!-- end row -->
						
				<div id="row"> <!-- *** submit row *** -->
					<input type="hidden" name="gp" value="<?echo $userID; ?>" />
					<input type="submit" name="submit" value="Save Changes" />
					<!--<a href="commission.php"><input type="button" value="Split Commission" title="Click to Split Your Commission"/></a>-->
				</div> <!-- end row -->
			</div> <!-- end table -->
        </form>
    
      </div>  <!--end content-->
     <?php include '../footer.php' ; ?>
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