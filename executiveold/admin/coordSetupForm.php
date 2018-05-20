<?php
session_start();
if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
?>

<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Sales Coordinator Setup | VP</title>
	<!--<link href="../../css/leftSidebarNav.css" rel="stylesheet" type="text/css">
	<link href="../../css/mainRecruitingStyles.css" rel="stylesheet" type="text/css">
	<link href="../../css/mainStyles.css" rel="stylesheet" type="text/css">
	
	<link href="../../css/setupFormStyles.css" rel="stylesheet" type="text/css">-->
	
	<link href="../../css/layout_styles.css" rel="stylesheet" type="text/css">
	<link href="../../css/header_styles.css" rel="stylesheet" type="text/css">
	<link href="../../css/sidenav_styles.css" rel="stylesheet" type="text/css">
	<link href="../../css/form_styles.css" rel="stylesheet" type="text/css">
	
	
	
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
  
  <div id="content">
    <h1>Sales Coordinator Setup</h1>
    <h3>Please fill out the form below to setup a Sales Coordinator account.</h3>

    <div class="setupLeft">

     Required fields are marked with <span class="required">*</span>
      <h3>Contact Information</h3>
     
      
      <form class="distributor1" action="handleCoordSetup1.php" method="POST" name="distributor" enctype="multipart/form-data" onSubmit="return validate(this);">
        <table>
          <tr>
            <td><label id="firmName" for="firmName"> Company Name<span class="required">*</span></label></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><label>
              <input type="text" size="132" maxlength="40" id="firmName" name="firmName">
              </label></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><label for="FName">First Name<span class="required">*</span></label></td>
            <td><label for="MName">Middle Name</label></td>
            <td><label for="LName">Last Name<span class="required">*</span></label></td>
          </tr>
          <tr>
            <td><label>
              <input type="text" size="132" maxlength="30" id="FName" name="FName"/>
              </label></td>
            <td><label>
              <input type="text" size="132" maxlength="30" id="MName" name="MName"/>
              </label></td>
            <td><label>
              <input type="text" size="132" maxlength="30" id="LName" name="LName"/>
              </label></td>
          </tr>
          <tr>
            <td colspan="3"><label id="address1" for="address1"> Address 1</label>            </td>
          </tr>
          <tr>
            <td colspan="3"><label>
              <input type="text" maxlength="40" id="address1" name="address1"/>
              </label></td>
          </tr>
          <td colspan="3"><label id="address2" for="address1"> Address 2</label>            </td>
          </tr>
          <tr>
            <td colspan="3"><label>
              <input type="text" maxlength="40" id="address2" name="address2"/>
              </label></td>
          </tr>
          <tr>
            <td width="125"><label id="city" for="city"> City</label></td>
            <td width="125"><label id="state" for="state"> State</label></td>
            <td><label id="zip" for="zip"> ZIP</label></td>
          </tr>
          <tr>
            <td width="125"><label>
              <input type="list" maxlength="30" id="city" name="city">
              </label></td>
            <td width="125"><label id="state" for="state">
              <select name="state" size="1">
                <option value="">-- Please select --</option>
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
              </label></td>
            <td><label>
              <input type="text" maxlength="10" id="zip" name="zip"/>
              </label></td>
          </tr>
          <tr>
            
            <td width="125"><label id="phone" for="phone"> Phone Number<span class="required">*</span></label></td>
            <td><label id="ext" for="ext">Extension</label>            </td>
          </tr>
          <tr>
            <td width="125"><label>
              <input type="text" maxlength="12" id="phone" name="phone">
              </label></td>
            <td><label>
              <input type="text" maxlength="5" id="ext" name="ext">
              </label></td>
          </tr>
          <tr>
            <td width="125"><label id="fbPage" for="fbPage">Facebook</label>            </td>
            <td width="125"><label id="twitter" for="twitter">Twitter</label></td>
            <td><label id="linkedin" for="linkedin" name="linkedin">LinkedIn</label></td>
          </tr>
          <tr>
            <td width="125"><label>
              <input type="text" maxlength="40" id="fbPage" name="fbPage"/>
              </label></td>
            <td width="125"><label>
              <input type="text" maxlength="40" id="twitter" name="twitter"/>
              </label></td>
            <td><label>
              <input type="text" maxlength="40" id="linkedin" name="linkedin"/>
              </label></td>
          </tr>
        </table>
        <br>
        <p>
          <label for "title" class="formSelect">Title:
          <input type="radio" name="Title" value="owner" id="Title_0">
          Owner</label>
          <label for "title" class="formSelect">
          <input type="radio" name="Title" value="co-owner" id="Title_1">
          Co-owner</label>
          <!--<label for "title" class="formSelect">
          <input type="radio" name="Title" value="distributorSalesperson" id="Title_2">
          Distributor Salesperson</label>-->
        </p>
        <!--<p>
          <label for "contactGMradio1">Have you talked to a GreatMoods Representative?<br>
          <input type="radio" name="contactGMradio1" value="yes" id="contactGMrep_0">
          Yes</label>
          <label for "contactGMradio2" class="formSelect">
          <input type="radio" name="contactGMradio2" value="no" id="contactGMrep_1">
          No</label>
        </p>
        <p>
          <label id="sales"> If so, whom?</label>
          <input name="sales" type="text" size="30" maxlength="30">
          
          <br>
        </p>-->
        <h3 class="clearfloat">Upload Photos</h3>
        <p>To personalize your webpage, attach photo(s). Acceptable formats are .jpg or .png files.</p>
        <p><label for="AddPersonalPhoto">Personal Photo:</label>
        <br>
        <input name="AddPersonalPhoto" type="file" id="AddPersonalPhoto" />
        <input name="RemovePersonalPhoto" type="checkbox" id="RemovePersonalPhoto" value="RemovePersonalPhoto">
        <label for="RemovePersonalPhoto">Remove Current Photo</label>
        </p>
        <p>
        <label for="AddGroupPhoto">Group Photo:</label>
        <br>
        <input name="AddGroupPhoto" type="file" id="AddGroupPhoto" />
        <input name="RemoveGroupPhoto" type="checkbox" id="RemoveGroupPhoto" value="RemoveGroupPhoto">
        <label for="RemoveGroupPhoto">Remove Current Photo</label>
        </p>

        <!--        <table width="430" border="0" align="left" cellpadding="3" cellspacing="0" summary="To upload photos">
            <td width="238" align="left"><label for="AddPersonalPhoto">Personal Photo:</label>
              <input name="AddPersonalPhoto" type="file" id="AddPersonalPhoto" /></td>
            <td width="180" valign="bottom"><input name="RemovePersonalPhoto" type="checkbox" id="RemovePersonalPhoto" value="RemovePersonalPhoto">
              <label for="RemovePersonalPhoto">Remove Current Photo</label></td>
          </tr>
          <tr>
            <td width="238" align="left"><label for="AddGroupPhoto">Group Photo:</label>
              <br>
              <input name="AddGroupPhoto" type="file" id="AddGroupPhoto" size="20" /></td>
            <td width="180" valign="bottom"><label for="RemoveGroupPhoto">
              <input name="RemoveGroupPhoto" type="checkbox" id="RemoveGroupPhoto" value="RemoveGroupPhoto">
              Remove Current Photo</label></td>
          </tr>
        </table>-->
        <h3>2 Simple Steps for Payment</h3>
        <p>Please enter your new or existing Paypal information. 
        All commissions are paid next day into your Paypal account.</p>
        <label for="paypal" class="formSelect">Paypal ID (Email address)<br>
        <input type="text" name="paypal"  style="width: 225px;">
        </label>
        <br class="clearfloat">
        
        <br>
        <br>
        <p>If you prefer, we can set up your Paypal account for you. 
<br>
        <p class="nospace">A Federal Tax Identification Number (TIN) or Social Security Number is required for distribution of funds and also for tax purposes.<span class="required">*</span></p>
</p>
        <table width="430" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><label for="ssn"> SSN</label></td>
            <td><label for="tin"> Tax ID Number (TIN)</label></td>
          </tr>
          <tr>
            <td><label>
              <input type="text" maxlength="30" id="ssn" name="ssn"/>
              </label></td>
            <td><label>
              <input type="text" maxlength="30" id="tin" name="tin"/>
              </label></td>
          </tr>
        </table>
<!--        <p class="footnote"> *We require either a Social Security Number or Tax Identification Number for the distribution of funds.</small> <br class="clearfloat">
-->        <h3>Create a Login to Your Website</h3>
        <p>Enter an email address and password to create a login to your website. You may use the same email address and password as your Paypal account for your login. </p>
        <label for="email" class="formSelect">Email Address (This will be your Login)<br>
        <input type="text" name="email" style="width: 225px;">
        </label>
        <br class="clearfloat">
        <br>
        <label for="loginPass" class="formSelect">Enter a Login Password<br>
        <input type="password" name="loginPass" id="loginPass">
        </label>
        <br class="clearfloat">
        <br>
        <label for="confirmPass" class="formSelect">Confirm Password<br>
        <input type="password" name="confirmPass" id="confirmPass">
        </label>
        
        
        
        <br>
        <br  class="clearfloat">
        <br>
        <input type="submit" value="Save" />
<!--        <input type="reset" value="Reset Form"/>
-->      </form>
    </div>
    <!--end setupLeft-->
  </div>
  <!--end contentMain858-->
</div>
<!--end container-->
</body>
</html>