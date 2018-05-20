<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8" />
	<title>GreatMoods | Setup/Edit Members</title>
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
	<link href="../../css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
	
	</head>
	<body id="contacts">
<div id="container">
      <?php include 'header.php' ; ?>
      <?php include 'sidenav.php' ; ?>
      <div id="contentMain858">
    <link href="../../css/setupFormStyles.css" rel="stylesheet" type="text/css" />
	<h2>Setup/Edit Members</h2>
    <h3>Fundraising Members Contact Information</h3>
    <p>Please enter contact information for your fundraising members.</p>
    <p>Required fields are marked with <span class="required">*</span></p>
    <form class="distributor1" action="../../handleDistributorSetup.php" method="POST" name="fundraisercontacts" enctype="multipart/form-data" onSubmit="return validate(this);">
          <table id="contacts">
        <!--      <td><table id="contacts2">
-->
        <tr>
              <td><label for="FName1">First Name<span class="required">*</span></label></td>
              <td><label for="LName1">Last Name<span class="required">*</span></label></td>
              <td><label for="title1">Position Title</label></td>
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
              <td><label for="title2">Position Title</label></td>
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
              <td><label for="title3">Position Title</label></td>
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
              <td><label for="title4">Position Title</label></td>
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
<!--        <tr>
              <td><input type="submit" value="Add New Contact" /></td>
              <td><input type="submit" value="Save" /></td>
            </tr>-->
      </table>
          <input type="submit" value="Add New Contact" />
          <input type="submit" value="Save" />
        </form>
    <p>&nbsp;</p>
    <h3>Add New Member List With Excel Template</h3>
    <input id="redbutton" name="downloadTemplate" type="button" value="Download Excel Template">
    <br />
    <p>1. Start by downloading our template (above)<br />
          2. Fill in the first name, last name, position title (optional), phone number, and email columns on the spreadsheet<br />
          3. Save the list on your computer as the name of your organization followed by the state and zip code (e.g., lincolnhsmn55432)<br />
          4. To upload the list, select the file you saved, then click "Upload"</p>
        <p><label for="uploadExcel">Upload Your Excel File</label>
        <br />
        <input name="uploadExcel" type="file" id="uploadExcel" />
        <input name="upload" type="button" value="Upload"></p>
    <p>&nbsp;</p>
    <h3>View/Edit Existing Member List</h3>
    <p>To view members by last name click a letter below or "View All".</p>
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
    
    <form class="distributor1" action="../../handleDistributorSetup.php" method="POST" name="fundraisercontacts" enctype="multipart/form-data" onSubmit="return validate(this);">
          <table id="viewmembers">
        <tr>
              <td><label for="FName5">First Name</label></td>
              <td><label for="LName5">Last Name</label></td>
              <td><label for="position5">Position Title</label></td>
              <td><label for="phone5">Phone Number</label></td>
              <td><label for="email5">Email Address</label></td>
              <td id="emailsSetup5"><label for="emailsSetup5">Number of<br />
                  Emails Set Up</label></td>
              <td id="earnings5"><label for="earnings5">Current<br />
                  $ Earned</label></td>
              <td id="ytdearnings5"><label for="ytdearnings5">YTD<br />
                  $ Earned</label></td>
              <td><label for="remove" class="remove" width="100px">Remove</label></td>
            </tr>
        <tr>
              <td><label>
                  <input type="text" size="132" maxlength="30" id="FName5" name="FName5"/>
                </label></td>
              <td><label>
                  <input type="text" size="132" maxlength="30" id="LName5" name="LName5"/>
                </label></td>
              <td><label>
                  <input type="text" size="132" maxlength="30" id="title5" name="title5"/>
                </label></td>
              <td><label>
                  <input type="text" size="132" maxlength="30" id="phone5" name="phone5"/>
                </label></td>
              <td><label>
                  <input type="text" size="132" maxlength="30" id="email5" name="email5"/>
                </label></td>
              <td><label>
                  <input type="text" size="30" maxlength="30" id="emailsSetup5" name="emailsSetup5"/>
                </label></td>
              <td><label>
                  <input type="text" size="30" maxlength="30" id="earnings5" name="earnings5"/>
                </label></td>
              <td><label>
                  <input type="text" size="30" maxlength="30" id="ytdearnings5" name="ytdearnings5"/>
                </label></td>
              <td><input name="remove" type="button" id="remove" title="remove" value="X"></td>
            </tr>
        <tr>
              <td>&nbsp;</td>
            </tr>
<!--        <tr>
              <td><input type="submit" value="Print" /></td>
              <td><input type="submit" value="Save" /></td>
            </tr>-->
      </table>
          <input type="submit" value="Print" />
          <input type="submit" value="Save" />
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