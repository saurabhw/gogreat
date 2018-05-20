<?php
	session_start();
	if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../../index.php');
            exit;
       }
	ob_start();
	//define("SITE_ROOT", $_SERVER["DOCUMENT_ROOT"] . "/salesTest");
        //define("HTML_ROOT", "/salesTest");
	//include(../includes/login/db_connect.inc.php);
	include '../../includes/connection.inc.php';
	if(!$_POST['fundtype']){header('Location: selectFundraiser.php');}
	$type = $_POST['RadioGroup1'];
	$fundtype = $_POST['fundtype'];
	$loginuser = $_SESSION['userId'];
	
?>
<!DOCTYPE html>
<html>
	<head>
	<title>GreatMoods | Setup Website Information</title>
	<script type="text/javascript" src="jquery-1.8.3.js"></script>
	<script type="text/javascript">
	function toggle(source) {
	  checkboxes = document.getElementsByName('clubs[]');
	  for(var i in checkboxes)
	  checkboxes[i].checked = source.checked;
	}
	function validate(form) {
		
		var fail = validateGroupname(form.groupName.value)
		fail += validateAddress1(form.address1.value)
		
		fail += validateCity(form.city.value)
		fail += validateState(form.state.value)
		fail += validateZip(form.zip.value)
		fail += validateWebsiteURL(form.websiteURL.value)
		
		if (fail == "") {
			$('#validation').val("1");
			return true}
		else { alert(fail); return false }
	}
	$(document).ready(function(){
	  $('input[name="all"],input[name="clubs[]"]').bind('click', function(){
	  var status = $(this).is(':checked');
	  $('input[type="checkbox"]', $(this).parent('li')).attr('checked', status);
	  });
	  });
	</script>
	<link href="../../css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
	<link href="../../css/setupFormStyles.css" rel="stylesheet" type="text/css" />
	</head>
	
	<body id="info">
<div id="container">
<?php include 'header.inc.php' ; ?>
<?php include 'sidenav.php' ; ?>

<div id="contentMain858">
      <!--<div class="nav2">
    <ul class="setupNav">
        <li><a href="accountEdit.php" class="infonav">Edit My Account</a></li>
        <li>|</li>
        <li><a href="selectFundraiser.php" class="infonav">Add New Fundraiser</a></li>
        <li>|</li>
        <li><a href="disthome.php" class="editnav">Edit Fundraiser Accounts</a></li>
        </ul>
  </div>2-->
  
	<h1>Add New Fundraiser</h1>
      <h3>Setup Fundraising Group Information</h3>
      <p>Required fields are marked with <span class="required">*</span></p>
      <div id="groupInfoForm">
    <div class="setupLeft">
          <form class="distributor1" action="addFundraiser.php" method="POST" name="addOrg" enctype="multipart/form-data" id="addOrg" onSubmit="return validate(this)">
        <table class="genInfo1">
              <tr>
            <td colspan="3"><label for="groupName"> <?echo $fundtype;?>&nbsp;Name<span class="required">*</span></label></td>
          </tr>
              <tr>
            <td colspan="3"><input type="text" id="groupName" name="groupName" maxlength="40" /></td>
          </tr>
              <tr>
            <td colspan="3"><label for="address1"> Address 1<span class="required">*</span></label></td>
          </tr>
              <tr>
            <td colspan="3"><input type="text" id="address1" name="address1" maxlength="50"/></td>
          </tr>
              <tr>
            <td colspan="3"><label for="address2"> Address 2</label></td>
          </tr>
              <tr>
            <td colspan="3"><input type="text" id="address2" name="address2" maxlength="50"/></td>
          </tr>
              <tr>
            <td><label for="city"> City<span class="required">*</span></label></td>
          </tr>
              <tr>
            <td><input id="websiteURL" type="text" maxlength="30" name="city"/></td>
          </tr>
              <tr>
            <td><label for="state"> State<span class="required">*</span></label></td>
          </tr>
              <tr>
            <td><select id="state" name="state" size="1">
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
              </select></td>
          </tr>
          <tr>
          <td><label for="zip"> ZIP<span class="required">*</span></label></td>
          </tr>
          <tr>
          <td><input id="zip" name="zip" type="text" maxlength="10" size="8" /></td>
          </tr>
              <tr>
            <td colspan="3"><label for="websiteURL">URL of the <?php echo $fundtype; ?> Existing Website<span class="required">*</span></label></td>
          </tr>
              <tr>
            <td colspan="3"><input id="websiteURL" name="websiteURL" type="text" maxlength="50" /></td>
          </tr>
          <tr>
          <td colspan="3"><label for="banner"><?echo $fundtype;?>&nbsp;Banner (optional)</label></td>
          </tr>
           <tr>
            <td colspan="3"><input id="banner" name="banner" type="file" style="width:250px;"/></td>
          </tr>
            </table>
      
        </div>
    <!--end setupLeft-->
    <div class="setupRight">
          
        <?php
                switch($fundtype)
                 {
                 case "High School":
                  echo'<h5>High School Club Setup</h5>
          <div class="clubsleft">
          <input type="checkbox" name="all" onClick="toggle(this)"/>
            Select All <br>
            <br>
        <p>Clubs & Organizations</p> 
        <ul>
          <li>
            <input name="clubs[]" type="checkbox" value="Band">
            Band</li>
              <li>
            <input name="clubs[]" type="checkbox" value="BPA">
            BPA </li>
              <li>
            <input name="clubs[]" type="checkbox" value="Book Club">
            Book Club </li>
              <li>
            <input name="clubs[]" type="checkbox" value="Booster Club">
            Booster Club </li>
              <li>
            <input name="clubs[]" type="checkbox" value="Chess Club">
            Chess Club </li>
              <li>
            <input name="clubs[]" type="checkbox" value="Choir">
            Choir </li>
              <li>
            <input name="clubs[]" type="checkbox" value="Class Trips">
            Class Trips </li>
              <li>
            <input name="clubs[]" type="checkbox" value="Debate">
            Debate </li>
              <li>
            <input name="clubs[]" type="checkbox" value="FBLA">
            FBLA </li>
              <li>
            <input name="clubs[]" type="checkbox" value="Language Club">
            Language Club </li>
              <li>
            <input name="clubs[]" type="checkbox" value="Library">
            Library </li>
              <li>
            <input name="clubs[]" type="checkbox" value="Nationa Art HS">
            National Art HS </li>
              <li>
            <input name="clubs[]" type="checkbox" value="National Honor Society">
            National Honor Society </li>
              <li>
            <input name="clubs[]" type="checkbox" value="Prom Committee">
            Prom Committee </li>
              <li>
            <input name="clubs[]" type="checkbox" value="PTA/PTO">
            PTA/PTO </li>
              <li>
            <input name="clubs[]" type="checkbox" value="Scholars Bowl">
            Scholars Bowl </li>
              <li>
            <input name="clubs[]" type="checkbox" value="Scholarship Counseling">
            Scholarship Counseling </li>
              <li>
            <input name="clubs[]" type="checkbox" value="School Counseling">
            School Counseling </li>
              <li>
            <input name="clubs[]" type="checkbox" value="Science & Math Club">
            Science & Math Club </li>
              <li>
            <input name="clubs[]" type="checkbox" value="Student Council">
            Student Council </li>
              <li>
            <input name="clubs[]" type="checkbox" value="Theatre">
            Theatre </li>
              <li>
            <input name="clubs[]" type="checkbox" value="Yearbook">
            Yearbook </li>
              <li>
            <input name="clubs[]" type="checkbox" value="News Broadcasting">
            News Broadcasting </li>
              <li>
            <input name="clubs[]" type="checkbox" value="General Fundraiser">
           General Fundraiser </li>
            </ul>
        </li>
      </div>

          <div class="clubsright">
          <br><br>
        <p>Athletics</p>

        <ul>
          <li>
            <input name="clubs[]" type="checkbox" value="Baseball">
            Baseball </li>
              <li>
            <input name="clubs[]" type="checkbox" value="Basketball, Boys">
            Basketball, Boys </li>
              <li>
            <input name="clubs[]" type="checkbox" value="Basketball, Girls">
            Basketball, Girls </li>
              <li>
            <input name="clubs[]" type="checkbox" value="Cheerleading ">
            Cheerleading </li>
              <li>
            <input name="clubs[]" type="checkbox" value="Cross Country">
            Cross Country </li>
              <li>
            <input name="clubs[]" type="checkbox" value="Danceline">
            Danceline </li>
              <li>
            <input name="clubs[]" type="checkbox" value="Football">
            Football </li>
              <li>
            <input name="clubs[]" type="checkbox" value="Field Hockey">
            Field Hockey </li>
              <li>
            <input name="clubs[]" type="checkbox" value="Golf, Boys">
            Golf, Boys </li>
              <li>
            <input name="clubs[]" type="checkbox" value="Golf, Girls">
            Golf, Girls </li>
              <li>
            <input name="clubs[]" type="checkbox" value="Gymnastics">
            Gymnastics </li>
              <li>
            <input name="clubs[]" type="checkbox" value="Ice Hockey">
            Ice Hockey </li>
              <li>
            <input name="clubs[]" type="checkbox" value="Lacrosse">
            Lacrosse </li>
              <li>
            <input name="clubs[]" type="checkbox" value="Power Lifting">
            Power Lifting </li>
              <li>
            <input name="clubs[]" type="checkbox" value="Ski Club">
            Ski Club </li>
              <li>
            <input name="clubs[]" type="checkbox" value="Soccer">
            Soccer </li>
              <li>
            <input name="clubs[]" type="checkbox" value="Softball">
            Softball </li>
              <li>
            <input name="clubs[]" type="checkbox" value="Swimming & Diving">
            Swimming & Diving </li>
              <li>
            <input name="clubs[]" type="checkbox" value="Tennis, Boys">
            Tennis, Boys </li>
              <li>
            <input name="clubs[]" type="checkbox" value="Tennis, Girls">
            Tennis, Girls </li>
              <li>
            <input name="clubs[]" type="checkbox" value="Track & Field">
            Track & Field </li>
              <li>
            <input name="clubs[]" type="checkbox" value="Volleyball, Boys">
            Volleyball, Boys </li>
              <li>
            <input name="clubs[]" type="checkbox" value="Volleyball, Girls">
            Volleyball, Girls </li>
              <li>
            <input name="clubs[]" type="checkbox" value="Wrestling">
            Wrestling </li>
            </ul>
        </li>
      </div>
      
           ';
           break;
		   
           case "Middle School":
           echo '<h5>Middle School Club Setup</h5>
           <div class="clubsleft">
<p>Athletics</p>
          <li>
           <input type="checkbox" name="all" />Select All
           <ul>
           <li><input name="clubs[]" type="checkbox" value="Baseball">Baseball</li>
           <li><input name="clubs[]" type="checkbox" value="Basketball">Basketball</li>
           <li><input name="clubs[]" type="checkbox" value="Bowling">Bowling</li>
           <li><input name="clubs[]" type="checkbox" value="Cheerleading">Cheerleading</li>
           <li><input name="clubs[]" type="checkbox" value="Cross Country">Cross Country</li>
           <li><input name="clubs[]" type="checkbox" value="Football">Football</li>
           <li><input name="clubs[]" type="checkbox" value="Field Hockey">Field Hockey</li>
           <li><input name="clubs[]" type="checkbox" value="Golf">Golf</li>
           <li><input name="clubs[]" type="checkbox" value="Gymnastics">Gymnastics</li>
           <li><input name="clubs[]" type="checkbox" value="Ice Hockey">Ice Hockey</li>
           <li><input name="clubs[]" type="checkbox" value="Lacrosse">Lacrosse</li>
           <li><input name="clubs[]" type="checkbox" value="Ski Club">Ski Club</li>
           <li><input name="clubs[]" type="checkbox" value="Soccer">Soccer</li>
           <li><input name="clubs[]" type="checkbox" value="Softball">Softball</li>
           <li><input name="clubs[]" type="checkbox" value="Swimming">Swimming</li>
           <li><input name="clubs[]" type="checkbox" value="Tennis">Tennis</li>
           <li><input name="clubs[]" type="checkbox" value="Track & Field">Track & Field</li>
           <li><input name="clubs[]" type="checkbox" value="Volleyball">Volleyball</li>
           <li>
            <input name="clubs[]" type="checkbox" value="General Fundraiser">
           General Fundraiser </li>
           </ul>
           </li>
           </div>
           <div class="clubsright">
            <p>Clubs & Organizations</p>
           <li> 
           <input type="checkbox" name="all" />Select All
           <br />
           <ul>
           <li><input name="clubs[]" type="checkbox" value="Band">Band</li>
           <li><input name="clubs[]" type="checkbox" value="Book Club">Book Club</li>
           <li><input name="clubs[]" type="checkbox" value="Booster Club">Booster Club</li>
           <li><input name="clubs[]" type="checkbox" value="Chess Club">Chess Club</li>
           <li><input name="clubs[]" type="checkbox" value="Choir">Choir</li>
           <li><input name="clubs[]" type="checkbox" value="Class Trips">Class Trips</li>
           <li><input name="clubs[]" type="checkbox" value="Debate">Debate</li>
           <li><input name="clubs[]" type="checkbox" value="Library">Library</li>
           <li><input name="clubs[]" type="checkbox" value="PTA/PTO">PTA/PTO</li>
           <li><input name="clubs[]" type="checkbox" value="School Counseling">School Counseling</li>
           <li><input name="clubs[]" type="checkbox" value="Science Club">Science Club</li>
           <li><input name="clubs[]" type="checkbox" value="Math Club">Math Club</li>
           </ul>
           </li>
           </div>
           ';
           break;
           case "Elementary School":
           echo '
           <h5>Elementary School Club Setup</h5>
           <div class="clubsleft">
           <p>Clubs & Organizations</p>
           <li>
           <input type="checkbox" name="all" />Select All
           <br />
           <ul>
           <li><input name="clubs[]" type="checkbox" value="Programs">Programs</li>
           <li><input name="clubs[]" type="checkbox" value="Band">Band</li>
           <li><input name="clubs[]" type="checkbox" value="Booster Club">Booster Club</li>
           <li><input name="clubs[]" type="checkbox" value="School Carnival">School Carnival</li>
           <li><input name="clubs[]" type="checkbox" value="Choir">Choir</li>
           <li><input name="clubs[]" type="checkbox" value="Class Field Trip">Class Field Trip</li>
           <li><input name="clubs[]" type="checkbox" value="Library">Library</li>
           <li><input name="clubs[]" type="checkbox" value="PTA/PTO">PTA/PTO</li>
           <li><input name="clubs[]" type="checkbox" value="School Counseling">School Counseling</li>
           <li><input name="clubs[]" type="checkbox" value="Science Club">Science Club</li>
           <li><input name="clubs[]" type="checkbox" value="Math Club">Math Club</li>
           </ul>
           </li>
           </div>
           <div class="clubsright">
           <p>General Needs</p>
           <li>
           <input type="checkbox" name="all" />Select All
           <br />
           <ul>
           <li><input name="clubs[]" type="checkbox" value="Computer">Computer</li>
           <li><input name="clubs[]" type="checkbox" value="Athletic Equipment ">Athletic Equipment </li>
           <li><input name="clubs[]" type="checkbox" value="Electronics">Electronics</li>
           <li><input name="clubs[]" type="checkbox" value="Field & Equipment ">Field & Equipment </li>
           <li><input name="clubs[]" type="checkbox" value="General Fundraiser">General Fundraiser</li>
           <li><input name="clubs[]" type="checkbox" value="Playground Equipment ">Playground Equipment </li>
           </ul>
           </li>
           </div>
           ';
           break;
           case "Religious Organizations":
           echo '
           <div style="width: 400px; float: left;">
           <h5>Religious Organization Setup</h5>
           <ul>
           <li><input name="clubs[]" type="checkbox" value="Church">Church</li>
           <li><input name="clubs[]" type="checkbox" value="Mosque">Mosque</li>
           <li><input name="clubs[]" type="checkbox" value="Synagogue">Synagogue</li>
           </ul>
           </li>
           </div>
           ';
           break;
           case "Community Organizations":
           echo '<div style="width: 400px; float: left;">
           <h5>Community Organization Setup</h5>
           <ul>
          <li><input name="clubs[]" type="checkbox" value="Fire Department">Fire Department</li>
          <li><input name="clubs[]" type="checkbox" value="Police Department">Police Department</li>
          <li><input name="clubs[]" type="checkbox" value="Lions Club">Lion\'s Club</li>
          <li><input name="clubs[]" type="checkbox" value="Jaycees">Jaycees</li>
          <li><input name="clubs[]" type="checkbox" value="Rotary Club">Rotary Club</li>
          <li><input name="clubs[]" type="checkbox" value="Knights of Columbus">Knights of Columbus</li>
           </ul>
           </li>
           </div>';
           break;
           case "Youth and Sports":
           echo '<div style="width: 400px; float: left;">
           <h5>Youth & Sports Setup</h5>
           <ul>
          <li><input name="clubs[]" type="checkbox" value="Boy Scouts">Boy Scouts</li>
          <li><input name="clubs[]" type="checkbox" value="Girl Scouts">Girl Scouts</li>
          <li><input name="clubs[]" type="checkbox" value="YMCA">YMCA</li>
          <li><input name="clubs[]" type="checkbox" value="Athletic Associations">Athletic Associations</li>
          <li><input name="clubs[]" type="checkbox" value="Big Brothers/Big Sisters">Big Brothers/Big Sisters</li>
           </ul>
           </li>
           </div>';
           break;
           case "Local and National Charities":
           echo '<div style="width: 400px; float: left;">
           <h5>Charities Setup</h5>
           <ul>
          <li><input name="clubs[]" type="checkbox" value="Humane Society">Humane Society</li>
          <li><input name="clubs[]" type="checkbox" value="Breast Cancer Research">Breast Cancer Research</li>
          <li><input name="clubs[]" type="checkbox" value="Alzheimers">Alzheimers</li>
          <li><input name="clubs[]" type="checkbox" value="Parkinsons">Parkinsons</li>
           </ul>
           </li>
           </div>';
           break;
           case "Causes":
           echo '<div style="width: 400px; float: left;">
           <h5>Causes Setup</h5>
           <ul>
          <li><input name="clubs[]" type="checkbox" value="Vets">Vets</li>
          <li><input name="clubs[]" type="checkbox" value="Memorial">Memorial</li>
          <li><input name="clubs[]" type="checkbox" value="Personal">Personal</li>
          <li><input name="clubs[]" type="checkbox" value="Hospital">Hospital</li>
          <li><input name="clubs[]" type="checkbox" value="Local Benefit">Local Benefit</li>
           </ul>
           </li>
           </div>';
           break;
         }
              ?>
        <input type="hidden" name="fundtype" value="<?php echo $fundtype; ?>" />
        <input type="hidden" name="setup_person" value="<?php echo $loginuser; ?>" />
        <input type="hidden" name="type" value="fundraiser" />
        <input type="hidden" name="validation"  id="validation" value="0" />

        <div class="clearfloat" style="width: 404px; float: right;">
           <br />
              <input name="submit" type="submit" value="Create">
        <br /></div>      

            </div>
        <!--end setupRight-->
      </form>
        </div>
    <!--end groupInfoForm--> 
  </div>
      <!--end contentMain858-->
      <div class="clearfloat"></div>
   <?php include 'footer.php' ; ?>
    </div>
<!--end container--> 
<script>
function validateGroupname(field)
{
	if (field == "") {return "No Group name was entered.\n"}
	return ""
}
function validateAddress1(field)
{
	if (field == "") {return "No Address1 was entered.\n"}
	return ""
}
function validateAddress2(field)
{
	if (field == "") {return "No Address2 was entered.\n"}
	return ""
}
function validateCity(field)
{
	if (field == "") {return "No city was entered.\n"}
	return ""
}
function validateState(field)
{
	if (field == "") {return "No state was selected.\n"}
	return ""
}
function validateZip(field)
{
	if (field == "") {return "No zip was entered.\n"}
	var zip = validateZipCode(field)
	if(!zip){return "Zip not entered correctly.\n"}
	return ""
}
function validateWebsiteURL(field)
{
	if (field == "") {return "No Website URL was entered.\n"}
	return ""
}
function validateClubs(field)
{
	if (field == "") {return "No clubs were chosen.\n"}
	return ""
}
function validateZipCode(elementValue){
    var zipCodePattern = /^\d{5}$|^\d{5}-\d{4}$/;
     return zipCodePattern.test(elementValue);
}

</script>
</body>
</html>
<?php
   ob_end_flush();
?>