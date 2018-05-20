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
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>GreatMoods | Representative Setup</title>
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

<link href="css/mainStyles.css" rel="stylesheet" type="text/css" />
<link href="css/distributorStyles.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container">
	<?php include 'includes/header.inc.php' ; ?>
	<?php include 'navigation/leftSidebarNavHomepage.nav.php' ; ?>
	
                <div id="content">
                    <h1 class="setupEmail1">Representative Setup</h1>
                    	<h3>Enter information to setup an account. (Required*)</h3>
                        <form action="handleRepresentativeSetup.php" method="POST" name="representative" enctype="multipart/form-data" id="representative1" onsubmit="return validate(this);">
                          <label for="FName">
                            <span id="f">First Name*</span>
                            <input type="text" maxlength="30" id="FName" name="FName"/>
                          </label>
                          <label for="MName">
                            <span>Middle Name*</span>
                            <input type="text" maxlength="30" id="MName" name="MName"/>
                          </label>
                         <label for="LName">
                            <span>Last Name*</span>
                            <input type="text" maxlength="30" id="LName" name="LName"/>
                          </label>
                         <label for="ssn">
                            <span>SSN*</span>
                            <input type="text" maxlength="11" id="ssn" name="ssn"/>
                          </label>
                          <br>
                         <label id="address1" for="address1">
                            <span>Address1*</span>
                            <input type="text" maxlength="40" id="address1" name="address1"/>
                         </label>
                         <label id="address2" for="address2" >
                            <span>Address2</span>
                            <input type="text" maxlength="40" id="address2" name="address2"/>
                          </label>
                          <br>
                         <label id="city" for="city">
                            <span>City*</span>
                            <input type="text" maxlength="30" id="city" name="city"/>
                          </label>
                         <label id="state" for="state">
                            <span>State* (e.g. MN)</span>
                            <input type="text" maxlength="2" id="state" name="state"/>
                         </label>
                         <label id="zip" for="zip">
                            <span>Zip*</span>
                            <input type="text" maxlength="10" id="zip" name="zip"/>
                          </label>
                          <br>
                         <label id="homephone" for="homephone">
                            <span>Home Phone*</span>
                            <input type="text" maxlength="12" id="homephone" name="homephone"/>
                          </label>
                         <label id="cellphone" for="cellphone">
                            <span>Cell Phone*</span>
                            <input type="text" maxlength="12" id="cellphone" name="cellphone"/>
                          </label>
                          <label id="workphone" for="workphone">
                            <span>Work Phone</span>
                            <input type="text" maxlength="12" id="workphone" name="workphone"/>
                          </label>
                          <label id="extphone" for="extphone">
                            <span>Work Ext</span>
                            <input type="text" maxlength="5" id="extphone" name="extphone"/>
                          </label>    
                          <br><br>
                         <label id="fbPage" for="fbPage">
                            <span>Facebook</span>
                            <input type="text" maxlength="40" id="fbPage" name="fbPage"/>
                          </label>
                          <br>
                          <label id="twitter" for="twitter">
                            <span>Twitter</span>
                            <input type="text" maxlength="40" id="twitter" name="twitter"/>
                         </label>
                         <br>
                         <label id="linkedin" for="linkedin" name="linkedin">
                            <span>LinkedIn</span>
                            <input type="text" maxlength="40" id="linkedin" name="linkedin"/>
                          </label>   
                        
                      <div class="hr">&nbsp;</div>
                      <br />
                      <br />
                     <!-- <label id="sales1" for="sales" name="sales">
                            <span>Rep(optional)</span>
                            <input type="text" id="linkedin" name="sales"/>
                          </label>     
                      <div class="hr">&nbsp;<br></div>
                          <h2 id="upload1">Upload Photos</h2>
                          <p> 
                                <label for="representativePic">Picture of Representative:</label>
                                <input type="file" name="representativePic" id="pic">
                          </p>
                          <p>
                          	<label for="bannerPic">Logo/Banner:</label>
                          	<input type="file" name="bannerUpload">
                            </p>
                                                   
                       <div class="hr">&nbsp;</div>   --> 
                        <h5>Login Information</h5>
                        <p>Your Email Address will be your username to login to your account on our GreatMoods website.</p>
                        <label id="email" for="email">
                            <span>Email</span>
                            <input type="text" maxlength="30" name="email" id="email" />
                         </label><br>
                        	<label for="loginPass">Login Password<input type="text" name="loginPass"></label><br>
                       		<label for="confirmPass">Confirm Password<input type="password" name="confirmPass"></label>
                       		<br />
                       		<input type="submit" value="Submit" />
                       		<input type="reset" value="Clear Form"/>
                       		
                        </form>
	</div><!--end content-->

	<?php include 'footer.php' ; ?>
</div><!--end container-->

</body>
</html>