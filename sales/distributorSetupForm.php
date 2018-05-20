<?php
include '../includes/autoload.php';
if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "SC")
       {
            header('Location: ../index.php');
            exit;
       }

?>
<!DOCTYPE HTML>
<head>
<title>Add Distributor | Sales Coordinator</title>
<link href="../css/mainRecruitingStyles.css" rel="stylesheet" type="text/css">
<link href="../css/mainStyles.css" rel="stylesheet" type="text/css">
<link href="../css/form_styles.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="../images/favicon.ico">

<script type="text/javascript">
	function validate(form) {
		for(var i=0; i<11; i++) {
			var input = form[i].value;
			if(input == "" || input == null) {
				if(form[i].name != "address2" &&
				    form[i].name != "MName" &&
				    form[i].name != "address1" &&
				    form[i].name != "city" &&
				    form[i].name != "state" &&
				    form[i].name != "ext" &&
				    form[i].name != "zip") {
					alert("Please enter a value for " + form[i].name);
					form[i].focus();
					return false;
				}
			}

		}
		var email = form['email'].value;
		if(!isValidEmail(email)) {
			alert("please enter a valid email address");
			return false;
		}
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
	function isValidEmail(email) {
		if(email.indexOf("@") == -1 || email.indexOf(".") == -1) {
			return false;
		} else {
			return true;
		}
	}
</script>
</head>

<body>
<div id="container">
<?php include 'header.inc.php' ; ?>
<?php include 'sidenav.php' ; ?>
	<div id="contentMain858">
		<h2>Add Distributor</h2>
		<div>Please fill out the form below to set up a distributor account.  
		<br>Required fields are marked with <span class="required">*</span><br><br>
		To add an additional Distributor, click Save/Add Another Distributor button at the bottom.<br><br></div>
      
		<form id="graybackground" action="handleDistributorSetup1.php" method="POST" name="distributor" enctype="multipart/form-data" onSubmit="return validate(this);">
		<h3>Contact Information</h3>
<div id="table">
		<div id="row">
			<span id="company">Company Name<span class="required">*</span></span>
			<span id="fname">First<span class="required">*</span></span>
			<span id="mname">Middle</span>
			<span id="lname">Last<span class="required">*</span></span>
			<br>
			<input id="company" type="text" name="firmName">
			<input id="fname" type="text" name="FName" title="First Name"/>
			<input id="mname" type="text" name="MName" title="Middle Name"/>
			<input id="lname" type="text" name="LName" title="Last Name"/>
		</div> <!-- end row -->

		<div id="row">
			<span id="address1">Address 1</span>
			<span id="address2">Address 2</span>
			<span id="city" for="city"> City</span>
			<span id="state" for="state"> State</span>
			<span id="zip" for="zip"> Zip</span>	
			<br>
			<input id="address1" type="text" name="address1" title="Main Address"/>
			<input id="address2" type="text" name="address2" title="Suite/Apt"/>
			<input id="city" type="list" name="city" title="City">
			<span id="state" for="state" title="State">
				<select name="state">
					<option value="AL">Alabama</option>
					<option value="AK">Alaska</option>
					<option value="AZ">Arizona</option>
					<option value="AR">Arkansas</option>
					<option value="CA">California</option>
					<option value="CO">Colorado</option>
					<option value="CT">Connecticut</option>
					<option value="DE">Delaware</option>
					<option value="FL">Florida</option>
					<option value="GA">Georgia</option>
					<option value="HI">Hawaii</option>
					<option value="ID">Idaho</option>
					<option value="IL">Illinois</option>
					<option value="IN">Indiana</option>
					<option value="IA">Iowa</option>
					<option value="KS">Kansas</option>
					<option value="KY">Kentucky</option>
					<option value="LA">Louisiana</option>
					<option value="ME">Maine</option>
					<option value="MD">Maryland</option>
					<option value="MA">Massachusetts</option>
					<option value="MI">Michigan</option>
					<option value="MN">Minnesota</option>
					<option value="MS">Mississippi</option>
					<option value="MO">Missouri</option>
					<option value="MT">Montana</option>
					<option value="NE">Nebraska</option>
					<option value="NV">Nevada</option>
					<option value="NH">New Hampshire</option>
					<option value="NJ">New Jersey</option>
					<option value="NM">New Mexico</option>
					<option value="NY">New York</option>
					<option value="NC">North Carolina</option>
					<option value="ND">North Dakota</option>
					<option value="OH">Ohio</option>
					<option value="OK">Oklahoma</option>
					<option value="OR">Oregon</option>
					<option value="PA">Pennsylvania</option>
					<option value="RI">Rhode Island</option>
					<option value="SC">South Carolina</option>
					<option value="SD">South Dakota</option>
					<option value="TN">Tennessee</option>
					<option value="TX">Texas</option>
					<option value="UT">Utah</option>
					<option value="VT">Vermont</option>
					<option value="VA">Virginia</option>
					<option value="WA">Washington</option>
					<option value="WV">West Virginia</option>
					<option value="WI">Wisconsin</option>
					<option value="WY">Wyoming</option>
				</select>
			</span>
			<input id="zip" type="text" maxlength="10" name="zip" title="Zip Code"/>
		</div> <!-- end row -->

			<div id="row">
				<span id="phone" for="phone"> Phone<span class="required">*</span></span>
				<span id="ext" for="ext">Ext</span>
				<br>
				<input type="text" maxlength="12" id="phone" name="phone" title="Phone Number">
				<input type="text" maxlength="5" id="ext" name="ext" title="Extension">
			</div> <!-- end row -->

			<div id="row">
				<span id="url" for="fbPage">Facebook</span>
				<span id="url" for="twitter">Twitter</span>
				<span id="url" for="linkedin">LinkedIn</span>
				<br>
				<input id="url" type="text" name="fbPage" title="Facebook Page URL"/>
				<input id="url" type="text" name="twitter" title="Twitter Page URL"/>
				<input id="url" type="text" name="linkedin" title="LinkedIn Profile URL"/>
			</div> <!-- end row -->
			</div> <!-- end contact table -->
			
			<br>
			<h3>2 Simple Steps for Payment</h3>
			<p>1. PayPal Information<br>Please enter your new or existing PayPal information. All commissions are paid next day into your PayPal account.
			<br>If you prefer, we can set up your PayPal account for you.</p>
			<div id="table">
			<div id="row">
				<span id="ppemail" for="paypal" class="formSelect">PayPal Email</span>
				<br>
				<input id="ppemail"type="text" name="paypalemail" title="PayPal Email Address">
			</div> <!-- end row -->
			<br>
			
			<p>2. Fund Distribution and Tax Information<br>A Federal Tax Identification Number (TIN) or Social Security Number (SSN) is required for distribution of funds and also for tax purposes.<span class="required">*</span></p>
			<div id="row">
				<span id="ssn" for="ssn">SSN</span>
				<span id="or">-or-</span>
				<span id="tin" for="tin">TIN</span>
				<br>
				<input id="ssn" type="text" name="ssn" title="Social Security Number"/>
				<input id="tin" type="text" name="tin" title="Federal Tax ID Number"/>
			</div> <!-- end row-->
			</div> <!-- end payment table -->
			<br>
			
			<!--<p class="footnote"> *We require either a Social Security Number or Tax Identification Number for the distribution of funds.</small> <br class="clearfloat">-->        
			
			<h3>Create a Login to Your Website</h3>
			<p>Enter an email address and password to create a login to your website.
			<br>You may use the same email address and password as your Paypal account for your login. </p>
			
			<div id="table">
			<div id="row">
				<span id="loginemail" for="email" class="formSelect">Email Address</span>
				<br>
				<input id="loginemail" type="text" name="email" title="This will be your Username"/>
			</div>
			<div id="row">
				<span id="loginpass" for="loginpass" class="formSelect">Enter a Login Password</span>
				<br>
				<input id="loginpass" type="password" name="loginPass" title="password"/>
			</div>
			<div id="row">
				<span id="confirmpass" for="confirmpass" class="formSelect">Confirm Password</span>
				<br>
				<input id="confirmpass" type="password" name="confirmPass" title="repeat password"/>
			</div>
			<br>
			<div>
				<input type="submit" value="Save Distributor" />
				<input type="submit" value="Save/Add Another Distributor" />
				<!--<input type="reset" value="Reset Form"/>-->
			</div>
		</form>
	</div><!--end contentMain858-->
</div><!--end container-->
</body>