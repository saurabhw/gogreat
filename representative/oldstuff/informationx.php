<?php
	session_start();
	ob_start();
	$errors = array();
	$missing = array();
	// check if form has been submitted
	if(isset($_POST['submit'])){
		$to = 'tonyq@greatmoods.com';
		$subject = 'Testing addOrganization.php';
		// list expected fields
		$expected = array('name','address1','address2','city','state','zip','email','paypalid','taxid','description','bannerpic','leaderpic','loginPass','confirmPass');
		// set required fields
		$required = array('name','email');
		// create additional headers
		$headers = "From: from test code\r\n";
		$headers .= 'Content-Type: text/plain; charset=utf-8';
		require('../includes/processmail.inc.php');
		if ($mailSent){
			header('Location: http://test.greatmoods.com/salesTest/index.php');
			exit;
		}
	}// end if
?>

<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8" />
	<title>GreatMoods | Setup/Edit Website - General Information</title>
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
	</head>
	<body>
<div id="container">
      <?php include 'header1.php' ; ?>
      <?php include 'leftSidebarNavDistributor.php' ; ?>
      <div id="contentMain858">
    <div id="setupNav">
          <ul>
        <li><<</li>
        <li><a href="">Photos</a></li>
        <li>|</li>
        <li><a href="">Contacts</a></li>
        <li>|</li>
        <li><a href="">Goals</a></li>
        <li>|</li>
        <li><a href="">Reasons</a></li>
        <li>|</li>
        <li><a href="">Information</a></li>
        <li>>></li>
      </ul>
        </div>
    <!--end setupNav-->
    
    <h2>Setup/Edit Website</h2>
    <h3>Fundraiser Group Information</h3>
    <div class="setupLeft">
          <?php if ($_POST && $suspect){ ?>
          <p class="warning">Sorry, your mail could not be sent. Please try later.</p>
          <?php } elseif ($missing || $errors) { ?>
          <p class ="warning">Please fix the item(s) indicated.</p>
          <?php } ?>
          <form class="distributor1" action="../addOrganization.php" method="post" enctype="multipart/form-data" name="addOrg"id="addOrg" onSubmit="return validate(this);>
          <table width="99%" border="0" cellpadding="0" cellspacing="0" class="contactInfo" summary="Contact Information">
          <tr>
        <td colspan="3"><label id="groupName" for="groupName"> Fundraiser Group Name<span class="red">*</span></label></td>
      </tr>
          <tr>
        <td colspan="3"><label>
            <input type="text" maxlength="40" id="groupName" name="groupName"/>
          </label></td>
      </tr>
          <tr>
        <td colspan="3"><label id="address1" for="address1"> Address 1<span class="red">*</span></label></td>
      </tr>
          <tr>
        <td colspan="3"><label>
            <input type="text" maxlength="40" id="address1" name="address1"/>
          </label></td>
      </tr>
          <td colspan="3"><label id="address2" for="address1"> Address 2<span class="red">*</span></label></td>
          </tr>
          <tr>
        <td colspan="3"><label>
            <input type="text" maxlength="40" id="address2" name="address2"/>
          </label></td>
      </tr>
          <tr>
        <td width="125"><label id="city" for="city"> City<span class="red">*</span></label></td>
        <td width="125"><label id="state" for="state"> State<span class="red">* </span></label></td>
        <td><label id="zip" for="zip"> ZIP<span class="red">*</span></label></td>
      </tr>
          <tr>
        <td width="125"><label>
            <input type="list" maxlength="30" id="city" name="city"/>
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
        <td colspan="3"><label id="websiteURL" for="websiteURL"> Website URL<span class="red">*</span></label></td>
      </tr>
          <tr>
        <td colspan="3"><label>
            <input type="text" maxlength="20" name="websiteURL" id="websiteURL" />
          </label></td>
      </tr>
          </table>
          <h3>For Payment</h3>
          <p>All commissions are paid next day into your Paypal account.</p>
          <p>If you would like, we can set up your Paypal account for you. We will need your Federal Tax Identification Number (TIN) or Social Security Number for tax purposes.<span class="red">*</span></p>
          <table width="99%" border="0" cellspacing="0" cellpadding="0">
        <tr>
              <td><label for="ssn"> Paypal Account ID</label></td>
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
          <p class="footnote"> *We require either a Social Security Number or Tax Identification Number for the distribution of funds.</small> <br class="clearfloat">
      <h3>Login</h3>
          <label for="loginEmail" class="formSelect">Email for account access (required)<br>
        <input type="text" name="loginEmail">
      </label>
          <br class="clearfloat">
          <label for="loginPass" class="formSelect">Create a Login Password<br>
        <input type="password" name="loginPass">
      </label>
          <br class="clearfloat">
          <label for="confirmPass" class="formSelect">Confirm Password<br>
        <input type="password" name="confirmPass">
      </label>
          <br>
          <br  class="clearfloat">
          <br>
          <input type="submit" value="Save" />
          </p>
        </div>
    <!--end setupLeft-->
    
    <div class="setupRight">
          <h3>Fundraiser Type</h3>
          <table width="99%" border="0" cellpadding="0" cellspacing="0" class="contactInfo" summary="Contact Information">
        <tr>
              <td colspan="3"><label id="fundraisingType" for="fundraisingType"> Select Fundraising Website Type<span class="red">* </span></label></td>
            </tr>
        <tr>
              <td colspan="3"><label id="fundraisingType" for="fundraisingType">
                  <select name="fundraisingType" size="1">
                  <option value="">-- Please select --</option>
                  <option value="HS">High School</option>
                  <option value="MS">Middle School</option>
                  <option value="ES">Elementary School</option>
                  <option value="RO">Religious Organizations</option>
                  <option value="CO">Community Organizations</option>
                  <option value="YS">Youth and Sports</option>
                  <option value="Charity">Local and National Charities</option>
                  <option value="Cause">Causes</option>
                </select>
                </label></td>
            </tr>
      </table>
          <br />
          <br />
          <label id="fundraiserList" for="fundraiserList"> Select Fundraising Groups</label>
          <table id="fundraiserList" width="400px" border "0" cellpadding="1" cellspacing="0">
        <tr>
              <th>Clubs and Organizations</th>
              <th>Athletics</th>
            </tr>
      </table>
          <input name="Create Websites" type="button" value="Create Websites">
        </div>
    </form>
    
    <!--end infoText--> 
  </div>
      <!--end leadBox--> 
    </div>
<!--end setupRight-->

</div>
<!--end contentMain858-->
<?php include 'footer.php' ; ?>
</div>
<!--end container-->
<p>&nbsp;</p>
<p>&nbsp;</p>
<form action="../addOrganization.php" method="POST" name="addOrg" enctype="multipart/form-data" id="addOrg" onSubmit="return validate(this);">
      <label for="orgName">Name of Organization (required):
    <?php if ($missing && in_array('name', $missing)) { ?>
    <span class="warning" style="color: #f00;">Please enter an Organization name</span>
    <?php } ?>
  </label>
      <input id="orgName" name="name" type="text" maxlength="50" 
			<?php if ($missing || $errors){
			echo 'value="'. htmlentities($name, ENT_COMPAT,'UTF-8').'"';
			} ?>>
      <label for="orgAddress1">Address 1:</label>
      <input id="orgAddress1" name="address1" type="text" maxlength="30"
			<?php if ($missing || $errors){
			echo 'value="'. htmlentities($address1, ENT_COMPAT,'UTF-8').'"';
			} ?>>
      <label for="orgAddress2">Address 2:</label>
      <input id="orgAddress2" name="address2" type="text" maxlength="30"
			<?php if ($missing || $errors){
			echo 'value="'. htmlentities($address2, ENT_COMPAT,'UTF-8').'"';
			} ?>>
      <label for="orgCity">City:</label>
      <input id="orgCity" name="city" type="text" maxlength="30"
			<?php if ($missing || $errors){
			echo 'value="'. htmlentities($city, ENT_COMPAT,'UTF-8').'"';
			} ?>>
      <label for="orgState">State (ex. MN):</label>
      <input id="orgState" name="state" type="text" maxlength="2"
			<?php if ($missing || $errors){
			echo 'value="'. htmlentities($state, ENT_COMPAT,'UTF-8').'"';
			} ?>>
      <label for="orgZip">Zip Code:</label>
      <input id="orgZip" name="zip" type="text" maxlength="10"
			<?php if ($missing || $errors){
			echo 'value="'. htmlentities($zip, ENT_COMPAT,'UTF-8').'"';
			} ?>>
      <label for="orgEmail">Email for account access (required):
    <?php if ($missing && in_array('email', $missing)) { ?>
    <span class="warning">Please enter an email address</span>
    <?php } elseif (isset($errors['email'])) { ?>
      <span class="warning" style="color: #f00;">Invalid email address</span>
      <?php } ?>
  </label>
      <input id="orgEmail" name="email" type="text" maxlength="30"
			<?php if ($missing || $errors){
			echo 'value="'. htmlentities($email, ENT_COMPAT,'UTF-8').'"';
			} ?>>
      <label for="orgPaypal">Paypal ID:</label>
      <input id="orgPaypal" name="paypalid" type="text" maxlength="30"
			<?php if ($missing || $errors){
			echo 'value="'. htmlentities($paypalid, ENT_COMPAT,'UTF-8').'"';
			} ?>>
      <label for="orgTaxId">Organization Tax ID:</label>
      <input id="orgTaxId" name="taxid" type="text" maxlength="30"
			<?php if ($missing || $errors){
			echo 'value="'. htmlentities($taxid, ENT_COMPAT,'UTF-8').'"';
			} ?>>
      <label for="orgDesc">Description of Organization:</label>
      <textarea id ="orgDesc" name="description" COLS=40 ROWS=6 maxlength="255"><?php
		if ($missing || $errors){
			echo htmlentities($description, ENT_COMPAT,'UTF-8');
			} ?>
</textarea>
      <h2 id="upload1">Upload Photos and Video(optional)</h2>
      <p>
    <label for="bannerPic">Banner Picture:</label>
    <input id="bannerPic" name="bannerpic" type="file">
  </p>
      <p>
    <label for="leaderPic">Leader Picture:</label>
    <input id="leaderPic" name="leaderpic" type="file"  >
  </p>
      <!-- These would take too long to load on organization creation.  These could be uploaded in the edit page
		<p>
			<label for="locationPic">Organization Location Picture:</label>
			<input id="locationPic" name="locationpic" type="file">
		</p>
		<p>
			<label for="groupPic">Group Picture:</label>
			<input id="groupPic" name="grouppic" type="file">
		</p>
		<p>
			<label for="orgVideo">Organization Video:</label>
			<input id="orgVideo" name="video" type="file">
		</p>
		-->
      <label for="loginPass">Enter a Login Password: </label>
      <input id="loginPass" name="loginPass" type="text">
      <label for="confirmPass">Reconfirm Password: </label>
      <input id="confirmPass" name="confirmPass" type="password">
      <input type="submit" name='submit' value="Submit" />
      <input type="reset" value="Reset Form"/>
    </form>
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
