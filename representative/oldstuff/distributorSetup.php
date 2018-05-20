<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Great Moods | Distributor Setup</title>
<script type="text/javascript">
	function validate(form) {
		for(var i=0; i<11; i++) {
			var input = form[i].value;
			if(input == "" || input == null) {
				if(form[i].name != "address2") {
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
<link href="../css/distributorSetupStyles.css" rel="stylesheet" type="text/css" />
<!--<style type="text/css">
#headerTop {
	background: no-repeat;
	background-position:right top;
	width:1024px;
	height:130px;
	padding:0;
	margin:0;
	position:relative;
	z-index:3;
}
#content {
	width:858px;
	margin:0px 0 50px 0;
	padding:0px 0px 50px 0px;
	float:right;
	position:relative;
	top:-50px;
}
</style>-->
</head>
<body>
<div id="container">
  <div id="contentDashboard">
    <h2>Distributor Setup</h2>
    <div class="setupRight">
      <div id="leadBox">
        <div id="infoText">
          <div id="redBar1">
            <h4>My Distributors</h4>
          </div>
          <!--end redBar1-->
          <table id="distributorList" width="408px">
            <tr>
              <th>Name</th>
              <th>Title</th>
            </tr>
            <td></td>
              <td></td>
            </tr>
          </table>
        </div>
        <!--end infoText-->
      </div>
      <!--end leadBox-->
    </div>
    <!--end setupRight-->
    <div class="setupLeft">
      <p>Please fill out the form below to set up your account for your website.</p>
      <p>Required fields are marked with <span class="red">*</span></p>
      <h3>Contact Information</h3>
      <p>Please enter contact information for your Distributorship. To add additional Distributor Salespeople, click Save/Add Distributor button below. </p>
      <form id="distributor1" action="../handleDistributorSetup.php" method="POST" name="distributor" enctype="multipart/form-data" onSubmit="return validate(this);">
        <div>
          <label id="firmName" for="firmName"> <span>Firm Name*</span>
          <input type="text" maxlength="40" id="firmName" name="firmName"/>
          </label>
        </div>
        <div class="clear">
          <label for="FName"> <span>First Name*</span>
          <input type="text" maxlength="30" id="FName" name="FName"/>
          </label>
          <label for="MName"> <span>Middle Name*</span>
          <input type="text" maxlength="30" id="MName" name="MName"/>
          </label>
          <label for="LName"> <span>Last Name*</span>
          <input type="text" maxlength="30" id="LName" name="LName"/>
          </label>
        </div>
        <div>
          <label id="address1" for="address1"> <span>Address1*</span>
          <input type="text" maxlength="40" id="address1" name="address1"/>
          </label>
        </div>
        <div>
          <label id="address2" for="address2" > <span>Address2</span>
          <input type="text" maxlength="40" id="address2" name="address2"/>
          </label>
        </div>
        <div>
          <label id="city" for="city"> <span>City*</span>
          <input type="text" maxlength="30" id="city" name="city"/>
          </label>
          <label id="state" for="state"> <span>State* </span>
          <select name="state" size="2">
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
          <label id="zip" for="zip"> <span>ZIP*</span>
          <input type="text" maxlength="10" id="zip" name="zip"/>
          </label>
        </div>
        <div>
          <label id="email" for="email"> <span>Email Address</span>
          <input type="text" maxlength="20" name="email" id="email" />
          </label>
          <label id="phone" for="phone"> <span>Phone Number*</span>
          <input type="text" maxlength="12" id="phone" name="phone"/>
          </label>
          <label id="ext" for="ext"> <span>Extension</span>
          <input type="text" maxlength="5" id="ext" name="ext"/>
          </label>
        </div>
        <div>
          <label id="fbPage" for="fbPage"> <span>Facebook</span>
          <input type="text" maxlength="40" id="fbPage" name="fbPage"/>
          </label>
          <label id="twitter" for="twitter"> <span>Twitter</span>
          <input type="text" maxlength="40" id="twitter" name="twitter"/>
          </label>
          <label id="linkedin" for="linkedin" name="linkedin"> <span>LinkedIn</span>
          <input type="text" maxlength="40" id="linkedin" name="linkedin"/>
          </label>
        </div>
        <!--<table width="100%">
            <tr>
              <td width="20%" ><label>
                  <input type="radio" name="RadioGroup1" value="radio" id="Owner">
                  Owner</label></td>
              <td width="20%"><label>
                  <input type="radio" name="RadioGroup1" value="radio" id="Co-owner">
                  Co-owner</label></td>
              <td width="60%" nowrap><label>
                  <input type="radio" name="RadioGroup1" value="radio" id="Distributor-Salesperson">
                  Distributor Salesperson</label></td>
            </tr>
          </table>-->
        <br />
        <p>
          <label for "title" class="formSelect">Title:
          <input type="radio" name="Title" value="owner" id="Title_0">
          Owner</label>
          <label for "title" class="formSelect">
          <input type="radio" name="Title" value="co-owner" id="Title_1">
          Co-owner</label>
          <label for "title" class="formSelect">
          <input type="radio" name="Title" value="distributorSalesperson" id="Title_2">
          Distributor Salesperson</label>
        </p>
        <p>
          <label for "contactGMrep">Have you talked to a GreatMoods Representative?
          <input type="radio" name="contactGMrep" value="yes" id="contactGMrep_0">
          Yes</label>
          <label for "contactGMrep" class="formSelect">
          <input type="radio" name="contactGMrep" value="no" id="contactGMrep_1">
          No</label>
        </p>
        <label id="GMcontactName">If so, whom?
        <input name="GreatMoods Contact" type="text" size="30" maxlength="30">
        </label>
        <br />
        <br />
        <h3 class="clearfloat">Upload Photos</h3>
        <p>To personalize your webpage, attach photo(s).</p>
        <table width="430" border="0" align="left" cellpadding="3" cellspacing="0" summary="To upload photos">
          <tr>
            <td width="218" align="left"><label for="AddPersonalPhoto">Personal Photo:</label>
              <br />
              <input name="AddPersonalPhoto" type="file" id="AddPersonalPhoto" size="20" /></td>
            <td width="200" valign="bottom"><label for="RemovePersonalPhoto">
              <input name="RemovePersonalPhoto" type="checkbox" id="RemovePersonalPhoto" value="RemovePersonalPhoto">
              Remove Current Photo</label></td>
          </tr>
          <tr>
            <td width="218" align="left"><label for="AddGroupPhoto">Group Photo:</label>
              <br />
              <input name="AddGroupPhoto" type="file" id="AddGroupPhoto" size="20" /></td>
            <td width="200" valign="bottom"><label for="RemoveGroupPhoto">
              <input name="RemoveGroupPhoto" type="checkbox" id="RemoveGroupPhoto" value="RemoveGroupPhoto">
              Remove Current Photo</label></td>
          </tr>
        </table>
        <br class="clearfloat">
        <h3>For Payment</h3>
        <p>All commissions are paid next day into your Paypal account.</p>
        <p>If you would like, we can set up your Paypal account for you. We will need your Federal Tax Identification Number (TIN) or Social Security Number for tax purposes.*</p>
        <br>
        <br class="clearfloat">
        <label for="ssn"> <span>SSN</span>
        <input type="text" maxlength="30" id="ssn" name="ssn"/>
        </label>
        <label for="tin"> <span>TIN</span>
        <input type="text" maxlength="30" id="tin" name="tin"/>
        </label>
        <div class="clearfloat">
          <p class="red">*For the distribution of funds, we require either a Social Security Number or Tax ID.</small> 
        </div>
        <br class="clearfloat">
        <h3>Login</h3>
        <p>Your Email Address will be your login to your account on the website.</p>
        <br>
        <label for="loginPass" class="formSelect">Enter a Login Password<br>
        <input type="text" name="loginPass">
        </label>
        <br class="clearfloat">
        <label for="confirmPass" class="formSelect">Reconfirm Password<br>
        <input type="password" name="confirmPass">
        </label>
        <br>
        <br  class="clearfloat">
        <br>
        <input type="submit" value="Save" />
        <input type="submit" value="Save/Add Distributor" />
        <input type="reset" value="Reset Form"/>
      </form>
    </div>
    <!--end setupLeft-->
  </div>
  <!--end contentDashboard-->
</div>
<!--end container-->
</body>
</html>
