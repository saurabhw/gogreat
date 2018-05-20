
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

                    	<form action="../handleDistributorSetup.php" method="POST" name="distributor" enctype="multipart/form-data" id="distributor1" onsubmit="return validate(this);">
                      
                       <table style="margin: auto; width: 1%; cellspacing: 0;">
                       <h3>Distributor Setup</h3>
                       <tr>
                       <td>First Name</td>
                       <td>Middle Name</td>
                       <td>Last Name</td>
                       </tr>
                       <tr>
                       <td><input type="text" maxlength="30" id="FName" name="FName"/></td>
                       <td><input type="text" maxlength="30" id="MName" name="MName"/></td>
                       <td><input type="text" maxlength="30" id="LName" name="LName"/></td>
                       </tr>
                       <tr>
                       <td>SSN#</td>
                       <td>Address1</td>
                       <td>Address2</td>
                       </tr>
                       <tr>
                       <td><input type="text" maxlength="11" id="ssn" name="ssn"/></td>
                       <td><input type="text" maxlength="40" id="address1" name="address1"/></td>
                       <td><input type="text" maxlength="40" id="address2" name="address2"/></td>
                       </tr>
                       <tr>
                       <td>City</td>
                       <td>State (e.g. MN)</td>
                       <td>ZIP</td>
                       </tr>
                       <tr>
                       <td><input type="text" maxlength="30" id="city" name="city"/></td>
                       <td><input type="text" maxlength="2" id="state" name="state"/></td>
                       <td><input type="text" maxlength="10" id="zip" name="zip"/></td>
                       </tr>
                       <tr>
                       <td>Email</td>
                       <td>Phone (Home)</td>
                       <td>Phone (Cell)</td>
                       </tr>
                       <tr>
                       <td><input type="text" maxlength="30" name="email" id="email" /></td>
                       <td><input type="text" maxlength="12" id="homephone" name="homephone"/></td>
                       <td><input type="text" maxlength="12" id="cellphone" name="cellphone"/></td>
                       </tr>
                       <tr>
                       <td>Phone (work)</td>
                       <td>Phone (ext)</td>
                       <td>Facebook</td>
                       </tr>
                       <tr>
                       <td><input type="text" maxlength="12" id="workphone" name="workphone"/></td>
                       <td><input type="text" maxlength="5" id="extphone" name="extphone"/></td>
                       <td><input type="text" maxlength="40" id="fbPage" name="fbPage"/></td>
                       </tr>
                       <tr>
                       <td>Twitter</td>
                       <td>LinkedIn</td>
                       <td></td>
                       </tr>
                       <tr>
                       <td><input type="text" maxlength="40" id="twitter" name="twitter"/></td>
                       <td><input type="text" maxlength="40" id="linkedin" name="linkedin"/></td>
                       <td></td>
                       </tr>
                       <tr>
                       <td>Picture of Representative</td>
                       <td>Logo/Banner:</td>
                       <td></td>
                       </tr>
                       <tr>
                       <td><input type="file" name="representativePic" id="pic"></td>
                       <td><input type="file" name="bannerUpload"></td>
                       <td></td>
                       </tr>
                       <tr>
                       <td><input type="submit" value="Submit" /></td>
                       <td><input type="reset" value="Reset Form"/></td>
                       <td></td>
                       </tr>
                       </table>
                        
                   
                       <!--<div class="hr">&nbsp;</div>    
                        
                        <h3>Your Email Address will be your login to your account on the website.</h3>
                        	<label for="loginPass">Enter a Login Password<input type="text" name="loginPass"></label>
                       		<label for="confirmPass">Reconfirm Password<input type="password" name="confirmPass"></label>
                       		<br />-->
                       		
                       		
                       		
                        </form>
                       
	