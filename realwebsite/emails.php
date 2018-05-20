<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8" />
	<title>GreatMoods | Setup/Edit Emails</title>
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
	<link href="../css/setupFormStyles2.css" rel="stylesheet" type="text/css" />
	</head>
	<body id="contacts">
<div id="container">
      <?php include 'header_homepage2.php' ; ?>
      <?php include 'leftSidebarNavHomepage.php' ; ?>
      <div id="contentMain858">
    <h2>Setup/Edit Emails</h2>
    <h3>Set Up Email Contacts</h3>
    <p>Please enter contact information for those you want to send emails to.</p>
    <p>Required fields are marked with <span class="required">*</span></p>
    <form class="distributor1" action="../handleDistributorSetup.php" method="POST" name="fundraisercontacts" enctype="multipart/form-data" onSubmit="return validate(this);">
          <table id="contacts">
        <tr>
              <td><label for="FName1">First Name<span class="required">*</span></label></td>
              <td><label for="LName1">Last Name<span class="required">*</span></label></td>
              <td><label for="relation">Relation To</label></td>
              <td><label for="phone1">Phone Number<span class="required">*</span></label></td>
              <td><label for="email1">Email Address<span class="required">*</span></label></td>
            </tr>
        <tr>
              <td><label>
                  <input type="text" size="132" maxlength="30" id="FName1" name="FName1"/>
                </label></td>
              <td><label>
                  <input type="text" size="132" maxlength="30" id="LName1" name="LName1"/>
                </label></td>
              <td><label>
                  <input type="text" size="132" maxlength="30" id="title1" name="title1"/>
                </label></td>
              <td><label>
                  <input type="text" size="132" maxlength="30" id="phone1" name="phone1"/>
                </label></td>
              <td><label>
                  <input type="text" size="132" maxlength="30" id="email1" name="email1"/>
                </label></td>
            </tr>
        <tr>
              <td><label for="FName2">First Name<span class="required">*</span></label></td>
              <td><label for="LName2">Last Name<span class="required">*</span></label></td>
              <td><label for="title2">Relation To</label></td>
              <td><label for="phone2">Phone Number<span class="required">*</span></label></td>
              <td><label for="email2">Email Address<span class="required">*</span></label></td>
            </tr>
        <tr>
              <td><label>
                  <input type="text" size="132" maxlength="30" id="FName2" name="FName2"/>
                </label></td>
              <td><label>
                  <input type="text" size="132" maxlength="30" id="LName2" name="LName2"/>
                </label></td>
              <td><label>
                  <input type="text" size="132" maxlength="30" id="title2" name="title2"/>
                </label></td>
              <td><label>
                  <input type="text" size="132" maxlength="30" id="phone2" name="phone2"/>
                </label></td>
              <td><label>
                  <input type="text" size="132" maxlength="30" id="email2" name="email2"/>
                </label></td>
            </tr>
        <tr>
              <td><label for="FName3">First Name<span class="required">*</span></label></td>
              <td><label for="LName3">Last Name<span class="required">*</span></label></td>
              <td><label for="title3">Relation To</label></td>
              <td><label for="phone3">Phone Number<span class="required">*</span></label></td>
              <td><label for="email3">Email Address<span class="required">*</span></label></td>
            </tr>
        <tr>
              <td><label>
                  <input type="text" size="132" maxlength="30" id="FName3" name="FName3"/>
                </label></td>
              <td><label>
                  <input type="text" size="132" maxlength="30" id="LName3" name="LName3"/>
                </label></td>
              <td><label>
                  <input type="text" size="132" maxlength="30" id="title3" name="title3"/>
                </label></td>
              <td><label>
                  <input type="text" size="132" maxlength="30" id="phone3" name="phone3"/>
                </label></td>
              <td><label>
                  <input type="text" size="132" maxlength="30" id="email3" name="email3"/>
                </label></td>
            </tr>
        <tr>
              <td><label for="FName4">First Name<span class="required">*</span></label></td>
              <td><label for="LName4">Last Name<span class="required">*</span></label></td>
              <td><label for="title4">Relation To</label></td>
              <td><label for="phone4">Phone Number<span class="required">*</span></label></td>
              <td><label for="email4">Email Address<span class="required">*</span></label></td>
            </tr>
        <tr>
              <td><label>
                  <input type="text" size="132" maxlength="30" id="FName4" name="FName4"/>
                </label></td>
              <td><label>
                  <input type="text" size="132" maxlength="30" id="LName4" name="LName4"/>
                </label></td>
              <td><label>
                  <input type="text" size="132" maxlength="30" id="title4" name="title4"/>
                </label></td>
              <td><label>
                  <input type="text" size="132" maxlength="30" id="phone4" name="phone4"/>
                </label></td>
              <td><label>
                  <input type="text" size="132" maxlength="30" id="email4" name="email4"/>
                </label></td>
            </tr>
        <tr>
              <td>&nbsp;</td>
            </tr>
        <tr>
<!--              <td><input type="submit" value="Add New Contact" /></td>
              <td><input type="submit" value="Save" /></td>
-->            </tr>
      </table>
              <input type="submit" value="Add New Contact" />
              <input type="submit" value="Save" />
        </form>
        
    <p>&nbsp;</p>
    <h3>View/Edit Email Contact List</h3>
    <p>To view contacts by last name click a letter below or "View All".</p>
    <div class="navAlpha">
          <ul class="setupNav">
        <li><a href="">A</a></li>
        <li><a href="">B</a></li>
        <li><a href="">C</a></li>
        <li><a href="">D</a></li>
        <li><a href="">E</a></li>
        <li><a href="">F</a></li>
        <li><a href="">G</a></li>
        <li><a href="">H</a></li>
        <li><a href="">I</a></li>
        <li><a href="">J</a></li>
        <li><a href="">K</a></li>
        <li><a href="">L</a></li>
        <li><a href="">M</a></li>
        <li><a href="">N</a></li>
        <li><a href="">O</a></li>
        <li><a href="">P</a></li>
        <li><a href="">Q</a></li>
        <li><a href="">T</a></li>
        <li><a href="">D</a></li>
        <li><a href="">Y</a></li>
        <li><a href="">U</a></li>
        <li><a href="">V</a></li>
        <li><a href="">W</a></li>
        <li><a href="">X</a></li>
        <li><a href="">Y</a></li>
        <li><a href="">Z</a></li>
        <li>|</li>
        <li><a href="">View All</a></li>
      </ul>
          <p>&nbsp;</p>
        </div>
    <!--end navAlpha-->
    
    <form class="distributor1" action="../handleDistributorSetup.php" method="POST" name="fundraisercontacts" enctype="multipart/form-data" onSubmit="return validate(this);">
          <table id="viewcontacts">
        <tr>
              <td><label for="FName4">First Name</label></td>
              <td><label for="LName4">Last Name</label></td>
              <td><label for="relation4">Relation To</label></td>
              <td><label for="phone4">Phone Number</label></td>
              <td><label for="email4">Email Address</label></td>
              <td><label for="removeContact" class="remove" width="100px">Remove</label></td>
            </tr>
        <tr>
              <td><label>
                  <input type="text" size="132" maxlength="30" id="FName4" name="FName4"/>
                </label></td>
              <td><label>
                  <input type="text" size="132" maxlength="30" id="LName4" name="LName4"/>
                </label></td>
              <td><label>
                  <input type="text" size="132" maxlength="30" id="title4" name="title4"/>
                </label></td>
              <td><label>
                  <input type="text" size="132" maxlength="30" id="phone4" name="phone4"/>
                </label></td>
              <td><label>
                  <input type="text" size="132" maxlength="30" id="email4" name="email4"/>
                </label></td>
              <td><input name="remove" type="button" id="remove" title="remove" value="X"></td>
            </tr>
        <tr>
              <td>&nbsp;</td>
            </tr>
        <tr>
<!--              <td><input type="submit" value="Print" /></td>
              <td><input type="submit" value="Save" /></td>
-->            </tr>
      </table>
              <input type="submit" value="Print" />
              <input type="submit" value="Save" />
        </form>
    <p>&nbsp;</p>
    <h3>Send Email</h3>
    <p>Personalize your email by selecting one or all recipients. Then Select an editable prewritten greeting for the type of email you wish to send, or create your own.</p>
    <form id="sendemail" class="distributor1" method="post" action="email_personalised_form.php">
          <select name='logdropdown'>
        <option>Select Contact</option>
        <option>Everyone</option>
      </select>
          <script language="javascript" type="text/javascript">
			<!-- 
			function change_input(strURL)
			{
			  var req;
			  
					// Opera 8.0+, Firefox, Safari
					req = new XMLHttpRequest();
				
			
					//function to be called when state is changed
					req.onreadystatechange = function()
					{
					  //when state is completed i.e 4
					  if (req.readyState == 4)
					  {
							// only if http status is "OK"
							if (req.status == 200)
							{
									document.getElementById('message').value=req.responseText;
							}
							else
							{
									alert("There was a problem while using XMLHTTP:\n" + req.statusText);
							}
			
						   
					  }
					}
					req.open("GET", strURL, true);
					req.send(null);
			  
			}
			//-->
			</script>
          <select name="logdropdown1" id="logdropdown1"  onchange="change_input('efind_ccode.php?logdropdown1='+this.value)">
        <option value="0">Select Type of E-mail</option>
        <option value="Announcement">Fundraiser Announcement</option>
        <option value="Reminder">Fundraiser Reminder</option>
        <option value="FinalEmail">End of Fundraiser</option>
        <option value="Personalized">Personalized E-mail</option>
      </select>
          <br />
          <br />
          <textarea name="message" id="message"rows="10" cols="50"></textarea>
          <br />
          <br />
          <input type="submit" value="Send Email"/>
        </form>
  </div>
      <!--end contentMain858-->
      <?php include 'footer.php' ; ?>
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