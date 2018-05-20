<?php
session_start();
if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
?>

<!DOCTYPE HTML>
<title>Great Moods | Distributor Setup</title>
<script type="text/javascript">
	function validate(form) {
		for(var i=0; i<11; i++) {
			var input = form[i].value;
			if(input == "" || input == null) {
				if(form[i].name == "FName" || form[i].name =="LName" || form[i].name =="email") {
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

<body>
	<div id="container">
	<?php include 'includes/header.inc.php' ; ?>
	<?php include 'navigation/leftSidebarNavHomepage.nav.php' ; ?>
		
		<div id="content">
			<h1 class="setupEmail1">Distributor Setup</h1>
			<br>
                        <form id="distributor1" action="handleDistributorSetup.php" method="POST" name="distributor" enctype="multipart/form-data" onSubmit="return validate(this);">
			<div id="abc">
				<label for="FName">
					<tr><span id="f">First Name</span></tr>
	                            	<tr><input id="FName" type="text" maxlength="30" name="FName"/></tr>
                        	</label>
                         	<label for="MName">
                            		<span>Middle Name</span>
                            		<input id="MName" type="text" maxlength="30" name="MName"/>
                          	</label>
                         	<label for="LName">
                            		<span>Last Name</span>
                            		<input id="LName" type="text" maxlength="30" name="LName"/>
                          	</label>
                          </div>
                          
                         <div id="abc">
                         	<label id="address1" for="address1">
                            		<span>Address1</span>
                            		<input id="address1" type="text" maxlength="40" name="address1"/>
                         	</label>
                         	<label id="address2" for="address2" >
                            		<span>Address2</span>
                            		<input id="address2" type="text" maxlength="40" name="address2"/>
                          	</label>
                          </div>
                          
                         <div id="abc">
                         	<label id="city" for="city">
                            		<span>City</span>
                            		<input id="city" type="text" maxlength="30" name="city"/>
                          	</label>
                         	<label id="state" for="state">
                            		<span>State (e.g. MN)</span>
                           		 <input id="state" type="text" maxlength="2" name="state"/>
                        	 </label>
	                         <label id="zip" for="zip">
		                            <span>ZIP</span>
		                            <input id="zip" type="text" maxlength="10" name="zip"/>
	                          </label>
			</div>
			
                        <div id="abc">
                        
                        	<br><hr>
                        	
                          	<label id="email" for="email">
                            		<span>Email (You will use this email to log in to Greatmoods)</span>
                            		<input id="email" type="text" maxlength="40" name="email" />
                         	</label>
                         </div>
                         
                         <div id="abc">
                         <label id="homephone" for="homephone">
                            <span>Home Phone</span>
                            <input id="homephone" type="text" maxlength="18" name="homephone"/>
                          </label>
                         <label id="cellphone" for="cellphone">
                            <span>Cell Phone</span>
                            <input id="cellphone" type="text" maxlength="18" name="cellphone"/>
                          </label>
                          <label id="workphone" for="workphone">
                            <span>Work Phone</span>
                            <input id="workphone" type="text" maxlength="18" name="workphone"/>
                          </label>
                          <label id="extphone" for="extphone">
                            <span>Work Phone (Ext)</span>
                            <input id="extphone" type="text" maxlength="5" name="extphone"/>
                          </label>
                          </div> 
                             
                         <div id="abc">
                         
                         <br><hr>
                         
                         <h5>Social Media (optional)</h5>
                          <label id="fbPage" for="fbPage">
                            <span>Facebook</span>
                            <input id="fbPage" type="text" name="fbPage"/>
                          </label>
                          <label id="twitter" for="twitter">
                            <span>Twitter</span>
                            <input id="twitter" type="text" name="twitter"/>
                         </label>
                         <label id="linkedin" for="linkedin" name="linkedin">
                            <span>LinkedIn</span>
                            <input id="linkedin" type="text" name="linkedin"/>
                          </label>
                          </div>
                          
			  <div id="abc">
			  
			  <br><hr>
			  
			  <h5>PayPal and Tax Information</h5>
				<label for="paypal">
                            <span>PayPal ID</span>
                            <input id="paypal" type="text" name="paypal"/>
                         </label>
			<label for="ssn">
                            <span>SSN#</span>
                            <input id="ssn" type="text" maxlength="12" name="ssn"/>
                         </label>
                         </div>
                        
                      
                      
                      <div id="abc">
                      <br><hr>
                      <label id="sales" for="sales" name="sales">
                            <span>Sales Contact(optional)</span>
                            <input id="sales" type="text" name="sales"/>
                          </label>    
                       </div> 
                      
                      
                      
                      	<div id="abc">
                      	<br><hr>
                          <h5 id="upload1">Upload Photos</h5>
                          <p> 
                                <label for="distributorPic">Picture of Distributor:</label>
                                <input id="pic" type="file" name="distributorPic" >
                          </p>
                          <p>
                          	<label for="bannerPic">Logo/Banner:</label>
                          	<input type="file" name="bannerUpload">
                            </p>
                         </div>
                                                   
                       
                        
                        <div id="abc">
                        <hr>
                        <h5>Your Email Address will be your login to your account on the website.</h5>
                        	<label id="loginPass" for="loginPass">Enter a Login Password<input type="text" name="loginPass"></label>
                       		<label id="confirmPass" for="confirmPass">Reconfirm Password<input type="password" name="confirmPass"></label>
                       		
                       </div>
                       
                       <div id="abc">
                       		<br>
                       		<input type="submit" value="Submit" />
                       		<!--<input type="reset" value="Reset Form"/>-->
                       	</div>
                       		
                        </form>
	</div><!--end content-->

	<?php include 'footer.php' ; ?>
</div><!--end container-->

</body>
</html>