<?php
     session_start();
     if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
     $userID = $_SESSION['userId'];
     include'../includes/connection.inc.php';
     $link = connectTo();
     $query = "SELECT * FROM user_info 	WHERE userInfoID='$userID'";
     $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error($link));
     $row = mysqli_fetch_assoc($result);
     $myPic = $row['picPath'];
?>

<!DOCTYPE HTML>
<head>
	<title>Add Representative | Sales Coordinator</title>
</head>

<body>
<div id="container">
	<?php include 'header.inc.php' ; ?>
	<?php include 'sidenav.php' ; ?>

	<div id="content">
		<h1>Add Representative</h1>
		<h3>Please fill out the form below to set up a representative account.</h3>
		
		<div id="table">
		<form id="" action="handleRep.php" method="POST" name="distributor" enctype="multipart/form-data" onSubmit="return validate(this);">
			<div class="interim-form">
			<div class="interim-header"><h2>Contact Information</h2></div>
				<div class="row">
					<span id="hd_fname">First</span>
					<!--<span id="hd_mname">Middle</span>-->
					<span id="hd_lname">Last</span>
					<span id="hd_title">Title</span>
					<span id="hd_cname">Company Name</span>
					
				</div> <!-- end row -->
				<div class="row">
					<input id="fname" type="text" name="fname" title="First Name" required/>
					<!--<input id="mname" type="text" name="mname" title="Middle Name"/>-->
					<input id="lname" type="text" name="lname" title="Last Name" required/>
					<select name="">
						<option value="">---</option>
						<option value="Mr.">Mr.</option>
						<option value="Ms.">Ms.</option>
						<option value="Mrs.">Mrs.</option>
						<option value="Miss">Miss</option>
						<option value="Dr.">Dr.</option>
						<option value="Rev.">Rev.</option>
					</select>
					<input id="cname" type="text" name="firmName">
				</div> <!-- end row -->
				
				<table>
					<tr>
						<td>
							<div class="row">
								<span id="hd_address1">Address 1</span>
							</div> <!-- end row -->
							<div class="row">
								<input id="address1" type="text" name="address1" title="Main Address"/>
							</div> <!-- end row -->
							<div class="row">
								<span id="hd_address2">Address 2</span>
							</div> <!-- end row -->
							<div class="row">
								<input id="address2" type="text" name="address2" title="Suite/Apt"/>
							</div> <!-- end row -->
							
							<div class="row">
								<span id="hd_city" for="city"> City</span>
								<span id="hd_state" for="state">State</span>
								<span id="hd_zip" for="zip"> Zip</span>	
							</div> <!-- end row -->
							<div class="row">
								<input id="city" type="list" name="city" title="City" required>
								<select id="state" name="state" required>
									<option>--</option>
									<option value="AL">AL</option>
									<option value="AK">AK</option>
									<option value="AZ">AZ</option>
									<option value="AR">AR</option>
									<option value="CA">CA</option>
									<option value="CO">CO</option>
									<option value="CT">CT</option>
									<option value="DE">DE</option>
									<option value="FL">FL</option>
									<option value="GA">GA</option>
									<option value="HI">HI</option>
									<option value="ID">ID</option>
									<option value="IL">IL</option>
									<option value="IN">IN</option>
									<option value="IA">IA</option>
									<option value="KS">KS</option>
									<option value="KY">KY</option>
									<option value="LA">LA</option>
									<option value="ME">ME</option>
									<option value="MD">MD</option>
									<option value="MA">MA</option>
									<option value="MI">MI</option>
									<option value="MN">MN</option>
									<option value="MS">MS</option>
									<option value="MO">MO</option>
									<option value="MT">MT</option>
									<option value="NE">NE</option>
									<option value="NV">NV</option>
									<option value="NH">NH</option>
									<option value="NJ">NJ</option>
									<option value="NM">NM</option>
									<option value="NY">NY</option>
									<option value="NC">NC</option>
									<option value="ND">ND</option>
									<option value="OH">OH</option>
									<option value="OK">OK</option>
									<option value="OR">OR</option>
									<option value="PA">PA</option>
									<option value="RI">RI</option>
									<option value="SC">SC</option>
									<option value="SD">SD</option>
									<option value="TN">TN</option>
									<option value="TX">TX</option>
									<option value="UT">UT</option>
									<option value="VT">VT</option>
									<option value="VA">VA</option>
									<option value="WA">WA</option>
									<option value="WV">WV</option>
									<option value="WI">WI</option>
									<option value="WY">WY</option>
								</select>
							</span>
							<input id="zip" type="text" maxlength="5" name="zip" title="Zip Code" required/>
						</div> <!-- end row -->
				
							<div class="row">
								<span id="pphone" for="phone">Primary Phone</span>
								<span id="ext" for="ext">Ext</span>
							</div> <!-- end row -->
							<div class="row">
								<input id="phone" type="text" maxlength="12" name="phone" title="Example: 123-456-7890"></span>
								<input id="ext" type="text" maxlength="5" name="ext" title="Extension">
							</div> <!-- end row -->
						</td>
					</tr>
				</table>
			</div> <!-- end interim-form -->

			<div class="interim-form">
				<div class="interim-header"><h2>2 Simple Steps for Payment</h2></div>
				<p><i>Both a PayPal email address and SSN, Fed TIN, State TIN, or 501(c)(3) are Required.</i></p>
				
				<h3>1. PayPal Information</h3>
				<p>Please enter your new or existing PayPal information. All commissions are paid next day into your PayPal account.
				<br>If you prefer, we can set up your PayPal account for you.</p>
				
				<div class="row">
					<span id="ppemail" for="paypal" class="formSelect">PayPal Email</span>
					<br>
					<input id="paypalemail" type="email" name="paypalemail" title="PayPal Email Address" required>
				</div> <!-- end row -->
				
				<br>
				
				<h3>2. Fund Distribution and Tax Information</h3>
				<p>A Federal Tax Identification Number (TIN) or Social Security Number (SSN) is required for distribution of funds and for tax purposes.</p>
				<div class="row">
					<span id="hd_ssn" for="ssn">SSN</span>
					<span id="hd_ftin" for="tin">Fed TIN</span>
					<span id="hd_stin" for="tin">State TIN</span>
					<span id="hd_nonp" for="tin">501(c)(3)</span>
				</div> <!-- end row-->
				<div class="row">
					<input id="ssn1" type="text" name="ssn" title="Example: 123-12-1234"/>
					<input id="ftin1" type="text" name="tin" title="Example: 12-1234567"/>
					<input id="stin1" type="text" name="stin" title="Example: 12-1234567"/>
					<input id="nonp1" type="text" name="501c3" title="Example: 12-1234567"/>
				</div> <!-- end row-->
			</div> <!-- end interim-form -->

			<div class="interim-form">
				<div class="interim-header"><h2>Create a Login to Your Website</h2></div>
				<p>Enter an email address and password to create a login to your GreatMoods website.
				<br>You may use the same email address as your Paypal account for your login. </p>

				<div class="row">
					<span id="hd_loginemail" class="formSelect">Email Address</span>
				</div> <!-- end row-->
				<div class="row">
					<input id="loginemail" type="email" name="email" title="This will be your Username" required/>
				</div> <!-- end row-->
				
				<div class="row">
					<span id="hd_password" class="formSelect">Password</span>
					<span id="hd_confirmpass" class="formSelect">Confirm Password</span>
				</div> <!-- end row-->
				<div class="row">
					<input id="password" type="password" name="password" title="password" required/>
					<input id="cpassword" type="password" name="confirmPass" title="repeat password" required/>
				</div> <!-- end row-->
			</div> <!-- end interim-form -->
			
			<div class="interim-form">
				<div class="interim-header"><h2>Social Media Connections</h2></div>
				
				<div class="row">
					<span id="hd_fb" for="fbPage">Facebook</span>
					<input id="fb" type="text" name="fbPage" title="Facebook Page URL" value="" placeholder="www.facebook.com/user">	
				</div> <!-- end row-->
				<br>
				<div class="row">
					<span id="hd_tw" for="twitter">Twitter</span>
					<input id="tw" type="text" name="twitter" title="Twitter Page URL" value="" placeholder="www.twitter.com/user">
				</div> <!-- end row-->
				<br>
				<div class="row">
					<span id="hd_li" for="linkedin">LinkedIn</span>
					<input id="li" type="text" name="linkedin" title="LinkedIn Profile URL" value="" placeholder="www.linkedin.com/user">
				</div> <!-- end row-->
			</div> <!-- end interim-form -->
			
			<br>
			
			<div class="row">
				<input name="submit" type="submit" class="redbutton" value="Save Representative">
			</div> <!-- end row-->
			<br>
		</form>
		</div> <!-- end table -->
	</div><!--end content-->
	
	<?php include("../includes/footer.php"); ?>
</div><!--end container-->
</body>