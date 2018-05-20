<?php
session_start();
if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }

?>
<!DOCTYPE HTML>
<title>Distributor Setup | GreatMoods</title>
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
<link href="../css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
<link href="../css/mainStyles.css" rel="stylesheet" type="text/css" />
<link href="../css/setupFormStyles.css" rel="stylesheet" type="text/css" />

<body>
<div id="container">
<?php include 'header.inc.php' ; ?>
<?php include 'sidenav.php' ; ?>
	<div id="contentMain858">
		<h2>Distributor Setup</h2>
		<div>Please fill out the form below to set up your account for your website. 
		<br>Required fields are marked with <span class="required">*</span><br><br>
		To add additional Distributor Salespeople, click Save/Add Distributor button at the bottom.<br><br></div>
      
		<form class="distributor1" action="handleDistributorSetup1.php" method="POST" name="distributor" enctype="multipart/form-data" onSubmit="return validate(this);">
		<h3>Contact Information</h3>
			<div>
				<label id="firmName" for="firmName"> Company Name<span class="required">*</span></label>
				<br><input type="text" maxlength="40" id="firmName" name="firmName">
			</div>
			<div>
				<label id="FName" for="FName">First Name<span class="required">*</span></label>
				<label id="MName" for="MName">Middle Name</label>
				<label id="LName" for="LName">Last Name<span class="required">*</span></label>
			</div>
			<div>
				<input id="FName" type="text" maxlength="30" name="FName"/>
				<input id="MName" type="text" maxlength="30" name="MName"/>
				<input id="LName" type="text" maxlength="30" name="LName"/>
			</div>
			<div>
				<label id="address1" for="address1"> Address 1</label>
				<label id="address2" for="address1"> Address 2</label>	
			</div>
			<div>
				<input id="address1" type="text" maxlength="40" name="address1"/>
				<input id="address2" type="text" maxlength="40" name="address2"/>
			</div>
			<div>
				<label id="city" for="city"> City</label>
				<label id="state" for="state"> State</label>
				<label id="zip" for="zip"> Zip</label>
			</div>
			<div>
			<input id="city" type="list" maxlength="30" name="city">
			<label id="state" for="state">
				<select name="state" size="1">
					<option value="">-- Select State --</option>
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
				</label>
				<input id="zip" type="text" maxlength="10" name="zip"/>
			</div>
			<div>
				<label id="phone" for="phone"> Phone Number<span class="required">*</span></label>
				<label id="ext" for="ext">Extension</label>
			</div>
			<div>
				<input type="text" maxlength="12" id="phone" name="phone">
				<input type="text" maxlength="5" id="ext" name="ext">
			</div>
			<div>
				<label id="fbPage" for="fbPage">Facebook</label>
				<label id="twitter" for="twitter">Twitter</label>
				<label id="linkedin" for="linkedin">LinkedIn</label>
			</div>
			<div>
				<input id="fbPage" type="text" maxlength="40" name="fbPage"/>
				<input id="twitter" type="text" maxlength="40" name="twitter"/>
				<input id="linkedin" type="text" maxlength="40" name="linkedin"/>
			</div>
			<br>
			
			<div>
				<label for "title" class="formSelect"><input type="radio" name="Title" value="owner" id="Title_0">Owner</label>
				<label for "title" class="formSelect"><input type="radio" name="Title" value="co-owner" id="Title_1">Co-owner</label>
				<label for "title" class="formSelect"><input type="radio" name="Title" value="distributorSalesperson" id="Title_2">Distributor Salesperson</label>
			</div>
			<div>
				<label for "contactGMradio1">Have you talked to a GreatMoods Representative?<br><input type="radio" name="contactGMradio1" value="yes" id="contactGMrep_0">Yes</label>
				<label for "contactGMradio2" class="formSelect"><input type="radio" name="contactGMradio2" value="no" id="contactGMrep_1">No</label>
			</div>
			<div>
				<label id="sales"> If so, whom?</label>
			</div>
			<div>
				<input id="sales" name="sales" type="text" size="30" maxlength="30">
			</div>
			<br>
			
			<h3>Upload Photos</h3>
			<p>To personalize your webpage, attach photo(s).<br>Acceptable formats are .jpg or .png files.</p>
			<div>
				<label for="AddPersonalPhoto">Personal Photo:</label>
				<br>
				<input name="AddPersonalPhoto" type="file" id="AddPersonalPhoto" />
				<input name="RemovePersonalPhoto" type="checkbox" id="RemovePersonalPhoto" value="RemovePersonalPhoto">
				<label for="RemovePersonalPhoto">Remove Current Photo</label>
			</div>
			<div>
				<label for="AddGroupPhoto">Group Photo:</label>
				<br>
				<input name="AddGroupPhoto" type="file" id="AddGroupPhoto" />
				<input name="RemoveGroupPhoto" type="checkbox" id="RemoveGroupPhoto" value="RemoveGroupPhoto">
				<label for="RemoveGroupPhoto">Remove Current Photo</label>
			</div>
			<br>
			
			<!--<table width="430" border="0" align="left" cellpadding="3" cellspacing="0" summary="To upload photos">
				<td width="238" align="left"><label for="AddPersonalPhoto">Personal Photo:</label>
				<input name="AddPersonalPhoto" type="file" id="AddPersonalPhoto" /></td>
				<td width="180" valign="bottom"><input name="RemovePersonalPhoto" type="checkbox" id="RemovePersonalPhoto" value="RemovePersonalPhoto">
				<label for="RemovePersonalPhoto">Remove Current Photo</label></td>
				</tr>
				<tr>
				<td width="238" align="left"><label for="AddGroupPhoto">Group Photo:</label>
				<br />
				<input name="AddGroupPhoto" type="file" id="AddGroupPhoto" size="20" /></td>
				<td width="180" valign="bottom"><label for="RemoveGroupPhoto">
				<input name="RemoveGroupPhoto" type="checkbox" id="RemoveGroupPhoto" value="RemoveGroupPhoto">
				Remove Current Photo</label></td>
				</tr>
			</table>-->

			<h3>2 Simple Steps for Payment</h3>
			<p>1. Paypal Information<br>Please enter your new or existing Paypal information. All commissions are paid next day into your Paypal account.
			<br>If you prefer, we can set up your Paypal account for you.</p>
			<div>
				<label id="paypalemail" for="paypal" class="formSelect">Paypal ID (Email address)<br>
				<input id="paypalemail" type="text" name="paypal"></label>
			</div>
			<br>
			
			<p>2. Fund Distribution and Tax Information<br>A Federal Tax Identification Number (TIN) or Social Security Number (SSN) is required for distribution of funds and also for tax purposes.<span class="required">*</span></p>
			<div>
				<label for="ssn"> (SSN)</label>
				<label for="tin"> Tax ID Number (TIN)</label>
			</div>
			<div>
				<input type="text" maxlength="30" id="ssn" name="ssn"/>
				<input type="text" maxlength="30" id="tin" name="tin"/>
			</div>
			<br>
			
			<!--<p class="footnote"> *We require either a Social Security Number or Tax Identification Number for the distribution of funds.</small> <br class="clearfloat">-->        
			
			<h3>Create a Login to Your Website</h3>
			<p>Enter an email address and password to create a login to your website.
			<br>You may use the same email address and password as your Paypal account for your login. </p>

			<div>
				<label id="email" for="email" class="formSelect">Email Address (This will be your Username)</label>
				
			</div>
			<div>
				<input id="email" type="text" name="email" /><br>
			</div>
			<div>
				<br><label id="loginPass" for="loginPass" class="formSelect">Enter a Login Password</label>
			</div>
			<div>
				<input id="loginPass" type="password" name="loginPass" /><br>
			</div>
			<div>
				<label id="confirmPass" for="confirmPass" class="formSelect">Confirm Password</label>
			</div>
			<div>
				<input id="confirmPass" type="password" name="confirmPass" />
			</div>
			<br>
			<div>
				<input type="submit" value="Save" />
				<input type="submit" value="Save/Add Distributor" />
				<!--<input type="reset" value="Reset Form"/>-->
			</div>
		</form>
	</div><!--end contentMain858-->
</div><!--end container-->
</body>