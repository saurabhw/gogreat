<?
   session_start();
   if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }

   //include($_SERVER['DOCUMENT_ROOT'].'/includes/connection.inc.php');
   include('../includes/connection.inc.php');
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
   $userID = $_SESSION['userId'];
   $query = "SELECT * FROM $table WHERE userInfoID='$userID'";
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
	<title>Edit Your Account | Admin</title>
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
	<link rel="shortcut icon" href="../images/favicon.ico">
	</head>
	
<body id="reasons">
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <?php include 'sidenav.php' ; ?>

<div id="contentMain858">
    <h3>Edit Your Account</h3>
    <div class="setupLeft">
      <div id="leadBox">
        <div id="infoText">
          <div>
          <form method="post" action="" enctype="multipart/form-data">
       <table class="editmyacct">   
          <tr>
          	<td colspan="3"><label for="company">Company Name</label></td>
          </tr>
          <tr>
          	<td colspan="3"><input type="text" id="long" name="company" value="<? echo $cn; ?>"/></td>
          </tr> 
          <tr>
          	<td colspan="3"><label for="fname">First Name</label></td>
          	<td colspan="3"><label for="lname">Last Name</label></td>
          </tr>
          <tr>
          	<td colspan="3"><input type="text" id="long" name="fname" value="<? echo $fn;?>" /></td>
          	<td colspan="3"><input type="text" id="long" name="lname" value="<? echo $ln;?>" /></td>
          <tr>
          	<td colspan="3"><label for="address1">Address 1</label></td>
          	<td colspan="3"><label for="address2">Address 2</label></td>
          </tr>
          <tr>
          	<td colspan="3"><input type="text" id="long" name="address1" value="<? echo $a1;?>" /></td>
          	<td colspan="3"><input type="text" id="long" name="address2" value="<? echo $a2;?>" /></td>
          </tr>
          <tr>
          	<td colspan="3"><label for="city">City</label></td>
          </tr>
          <tr>
          	<td colspan="3"><input type="text" id="long" name="city" value="<? echo $ct;?>" /></td>
          </tr>
          <tr>
          	<td colspan="3"><label for="state">State</label></td>
          	<td colspan="3"><label for="zip">Zip Code</label></td>
          </tr>
          <tr>
          	<td colspan="3"><input type="text" id="long" name="state" value="<? echo $st;?>" /></td>
          	<td colspan="3"><input type="text" id="long" name="zip" value="<? echo $zp;?>" /></td> 
          </tr>
          <tr> 
          	<td colspan="3"><label for="email">Email Address</label></td>
	  </tr>
          <tr>
          	<td colspan="3"><input type="text" id="long" name="email" value="<? echo $email;?>" /></td>
          </tr>
          <tr> 
          	<td colspan="3"><label for="hphone">Home Phone</label></td>
          	<td colspan="3"><label for="cell">Cell Phone</label></td>
	  </tr>
          <tr>
          	<td colspan="3"><input type="text" id="long" name="hphone" value="<? echo $hp;?>" /></td>
          	<td colspan="3"><input type="text" id="long" name="cell" value="<? echo $cp;?>" /></td>
          </tr>

          <tr>
          	<td colspan="3"><label for="ssn">SSN</label></td>
          	<td colspan="3"><label for="pal">PayPal Email Address</label></td> 
	  </tr>
          <tr>
          	<td colspan="3"><input type="text" id="long" name="ssn" value="<? echo $sn;?>" /></td>
          	<td colspan="3"><input type="text" id="long" name="pal" value="<? echo $pp;?>" /></td> 
	  </tr>
          <tr> 
          	<td colspan="3"><label for="face">Facebook Address</label></td>
	  </tr>
          <tr>
          	<td colspan="3"><input type="text" id="long" name="face" value="<? echo $fb;?>" /></td>
          </tr>
          <tr> 
          	<td colspan="3"><label for="twit">Twitter Address</label></td>
	  </tr>
          <tr>
          	<td colspan="3"><input type="text" id="long" name="twit" value="<? echo $tw;?>" /></td>
          </tr>
          <tr> 
          	<td colspan="3"><label for="linked">Linkedin Address</label></td>
	  </tr>
          <tr>
          	<td colspan="3"><input type="text" id="long" name="linked" value="<? echo $li;?>" /></td>
          </tr>
          <tr>
          	<td colspan="3"><input type="hidden" name="gp" value="<?echo $userID; ?>" /></td>
          </tr>		
          <tr>
          	<td colspan="3"><input type="submit" name="submit" value="Save Changes" /></td>
          	<!--<td colspan="3"><a href="commission.php"><input type="button" value="Split Commission" title="Click to Split Your Commission"/></a></td>-->
          </tr>
          </form> 
       </table> 
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