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
	$rep = $_POST['rep'];
	
?>
<!DOCTYPE html>
<head>

<title>Setup Group Information | Sales Coordinator</title>
<link rel="stylesheet" type="text/css" href="../../css/mainRecruitingStyles.css" />
<link rel="stylesheet" type="text/css" href="../../css/form_styles.css" />
<link rel="shortcut icon" href="../../images/favicon.ico">

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
</head>
	
<body>
<div id="container">
<?php include 'header.inc.php' ; ?>
<?php include 'sidenav.php' ; ?>

<div id="contentMain858">  
	<h1>Add New Fundraiser</h1>
      <h3>Setup Fundraising Group Information</h3>
      <p>Required Fields<span class="required">*</span></p>
      
    <div class="setupLeft">
          <form class="graybackground" action="addFundraiser.php" method="POST" name="addOrg" enctype="multipart/form-data" id="addOrg" onSubmit="return validate(this)">
        	<div id="table">
        		<div id="row"> <!-- header row -->
        			<span id="longtext"><?echo $fundtype;?>&nbsp;Name<span class="required">*</span></span>
        		</div> <!-- end row -->
        		<div id="row"> <!-- input row -->
        			<input id="group" type="text" name="groupName" maxlength="40" />
        		</div> <!-- end row -->
        			
        		<div id="row"> <!-- header row -->
        			<span id="address1">Address 1<span class="required">*</span></span>
        			<span id="address2">Address 2</span>
        		</div> <!-- end row -->
        		<div id="row"> <!-- input row -->
        			<input id="address1" type="text" name="address1" maxlength="50"/>
        			<input id="address2" type="text" name="address2" maxlength="50"/>
        		</div> <!-- end row -->
        		
        		<div id="row"> <!-- header row -->
        			<span id="city">City<span class="required">*</span></span>
        			<span id="state">State<span class="required">*</span></span>
        			<span id="zip">Zip<span class="required">*</span></span>
        		</div> <!-- end row -->
        		<div id="row"> <!-- input row -->
        			<input id="city" type="text" maxlength="30" name="city"/>
        			<select id="state" name="state">
			                <option>Select</option>
					<option value="AL">AL</option>
					<option value="AK">AK</option>
					<option value="AZ">AZ</option>
					<option value="AR">AR</option>
					<option value="CA">CA</option>
					<option value="CO">CO</option>
					<option value="CT">CT</option>
					<option value="DE">DE</option>
					<option value="FL">FL</option>
					<option value="GA">GA</option>
					<option value="HI">HI</option>
					<option value="ID">ID</option>
					<option value="IL">IL</option>
					<option value="IN">IN</option>
					<option value="IA">IA</option>
					<option value="KS">KS</option>
					<option value="KY">KY</option>
					<option value="LA">LA</option>
					<option value="ME">ME</option>
					<option value="MD">MD</option>
					<option value="MA">MA</option>
					<option value="MI">MI</option>
					<option value="MN">MN</option>
					<option value="MS">MS</option>
					<option value="MO">MO</option>
					<option value="MT">MT</option>
					<option value="NE">NE</option>
					<option value="NV">NV</option>
					<option value="NH">NH</option>
					<option value="NJ">NJ</option>
					<option value="NM">NM</option>
					<option value="NY">NY</option>
					<option value="NC">NC</option>
					<option value="ND">ND</option>
					<option value="OH">OH</option>
					<option value="OK">OK</option>
					<option value="OR">OR</option>
					<option value="PA">PA</option>
					<option value="RI">RI</option>
					<option value="SC">SC</option>
					<option value="SD">SD</option>
					<option value="TN">TN</option>
					<option value="TX">TX</option>
					<option value="UT">UT</option>
					<option value="VT">VT</option>
					<option value="VA">VA</option>
					<option value="WA">WA</option>
					<option value="WV">WV</option>
					<option value="WI">WI</option>
					<option value="WY">WY</option>
			        </select>
			        <input id="zip" name="zip" type="text" maxlength="10"/>
        		</div> <!-- end row -->
        		
        		<div id="row"> <!-- header row -->
        			<span id="longtext"><?php echo $fundtype; ?>'s Existing Website URL<span class="required">*</span></span>
        		</div> <!-- end row -->
        		<div id="row"> <!-- input row -->
        			<input id="url" name="websiteURL" type="text" maxlength="250" />
        		</div> <!-- end row -->
        		
        		<div id="row"> <!-- header row -->
        			<span id="longtext"><?echo $fundtype;?>'s Banner</span>
        		</div> <!-- end row -->
        		<div id="row"> <!-- input row -->
        			<input id="AddOrgBannerPhoto" name="banner" type="file"/>
        		</div> <!-- end row -->
        	</div> <!-- end table -->
        </div> <!--end setupLeft-->
        
    <div class="setupRight">
          
        <?php
                switch($fundtype)
                 {
                 case "High School":
                  echo'<h6>Select High School Groups to Setup</h6>
          <div id="clubsleft">
          <input type="checkbox" name="all" onClick="toggle(this)"/>
            Select All Groups<br><br>
        <b>Clubs & Organizations:</b>
        <ul>
          <li><input name="clubs[]" type="checkbox" value="Band">Band</li>
              <li><input name="clubs[]" type="checkbox" value="BPA">BPA </li>
              <li><input name="clubs[]" type="checkbox" value="Book Club">Book Club </li>
              <li><input name="clubs[]" type="checkbox" value="Booster Club">Booster Club </li>
              <li><input name="clubs[]" type="checkbox" value="Chess Club">Chess Club </li>
              <li><input name="clubs[]" type="checkbox" value="Choir">Choir </li>
              <li><input name="clubs[]" type="checkbox" value="Class Trips">Class Trips </li>
              <li><input name="clubs[]" type="checkbox" value="Debate">Debate </li>
              <li><input name="clubs[]" type="checkbox" value="FBLA">FBLA </li>
              <li><input name="clubs[]" type="checkbox" value="Language Club">Language Club </li>
              <li><input name="clubs[]" type="checkbox" value="Library">Library </li>
              <li><input name="clubs[]" type="checkbox" value="Nationa Art HS">National Art HS </li>
              <li><input name="clubs[]" type="checkbox" value="National Honor Society">National Honor Society </li>
              <li><input name="clubs[]" type="checkbox" value="Prom Committee">Prom Committee </li>
              <li><input name="clubs[]" type="checkbox" value="PTA/PTO">PTA/PTO </li>
              <li><input name="clubs[]" type="checkbox" value="Scholars Bowl">Scholars Bowl </li>
              <li><input name="clubs[]" type="checkbox" value="Scholarship Counseling">Scholarship Counseling </li>
              <li><input name="clubs[]" type="checkbox" value="School Counseling">School Counseling </li>
              <li><input name="clubs[]" type="checkbox" value="Science & Math Club">Science & Math Club </li>
              <li><input name="clubs[]" type="checkbox" value="Student Council">Student Council </li>
              <li><input name="clubs[]" type="checkbox" value="Theatre">Theatre </li>
              <li><input name="clubs[]" type="checkbox" value="Yearbook">Yearbook </li>
              <li><input name="clubs[]" type="checkbox" value="News Broadcasting">News Broadcasting </li>
              <li><input name="clubs[]" type="checkbox" value="General Fundraiser">General Fundraiser </li>
            </ul>
        </li>
      </div> <!-- end clubsleft -->

          <div id="clubsright">
          <br><br>
        <b>Athletics:</b>
        <ul>
          <li><input name="clubs[]" type="checkbox" value="Baseball">Baseball </li>
              <li><input name="clubs[]" type="checkbox" value="Basketball, Boys">Basketball, Boys </li>
              <li><input name="clubs[]" type="checkbox" value="Basketball, Girls">Basketball, Girls </li>
              <li><input name="clubs[]" type="checkbox" value="Cheerleading ">Cheerleading </li>
              <li><input name="clubs[]" type="checkbox" value="Cross Country">Cross Country </li>
              <li><input name="clubs[]" type="checkbox" value="Danceline">Danceline </li>
              <li><input name="clubs[]" type="checkbox" value="Football">Football </li>
              <li><input name="clubs[]" type="checkbox" value="Field Hockey">Field Hockey </li>
              <li><input name="clubs[]" type="checkbox" value="Golf, Boys">Golf, Boys </li>
              <li><input name="clubs[]" type="checkbox" value="Golf, Girls">Golf, Girls </li>
              <li><input name="clubs[]" type="checkbox" value="Gymnastics">Gymnastics </li>
              <li><input name="clubs[]" type="checkbox" value="Ice Hockey">Ice Hockey </li>
              <li><input name="clubs[]" type="checkbox" value="Lacrosse">Lacrosse </li>
              <li><input name="clubs[]" type="checkbox" value="Power Lifting">Power Lifting </li>
              <li><input name="clubs[]" type="checkbox" value="Ski Club">Ski Club </li>
              <li><input name="clubs[]" type="checkbox" value="Soccer">Soccer </li>
              <li><input name="clubs[]" type="checkbox" value="Softball">Softball </li>
              <li><input name="clubs[]" type="checkbox" value="Swimming & Diving">Swimming & Diving </li>
              <li><input name="clubs[]" type="checkbox" value="Tennis, Boys">Tennis, Boys </li>
              <li><input name="clubs[]" type="checkbox" value="Tennis, Girls">Tennis, Girls </li>
              <li><input name="clubs[]" type="checkbox" value="Track & Field">Track & Field </li>
              <li><input name="clubs[]" type="checkbox" value="Volleyball, Boys">Volleyball, Boys </li>
              <li><input name="clubs[]" type="checkbox" value="Volleyball, Girls">Volleyball, Girls </li>
              <li><input name="clubs[]" type="checkbox" value="Wrestling">Wrestling </li>
            </ul>
        </li>
      </div> <!-- end clubsright -->
      
           ';
           break;
		   
           case "Middle School":
           echo '<h6>Select Middle School Groups to Setup</h6>
           <div id="clubsleft">
            <input type="checkbox" name="all" onClick="toggle(this)"/>
            Select All Groups<br>
            <br>
             <b>Clubs & Organizations:</b>
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
	           <li><input name="clubs[]" type="checkbox" value="General Fundraiser">General Fundraiser </li>
	           </ul>
           </div>
           
           <div id="clubsright">
           <br>
           <br>
           <b>Athletics:</b>
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
	           </ul>
           </div>
           ';
           break;
           
           case "Elementary School":
           echo '
           <h6>Select Elementary School Groups to Setup</h6>
           <div id="clubsleft">
           <input type="checkbox" name="all" onClick="toggle(this)"/>
            Select All <br>
            <br>
           <b>Clubs & Organizations:</b>
           <ul>
           <li><input name="clubs[]" type="checkbox" value="After School Programs">After School Programs</li>
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
           <div id="clubsright">
           <br><br>
           <b>General Needs:</b>
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
           
           case "Religious Organization":
           echo '
           <h6>Select Religious Organization to Setup</h6>
           <div id="clubsleft">
           <ul>
           <li><input name="clubs[]" type="checkbox" value="Ministry">General Ministry</li>
           <li><input name="clubs[]" type="checkbox" value="Outreach Ministry">Outreach Ministry</li>
           <li><input name="clubs[]" type="checkbox" value="Mens Ministry">Mens Ministry</li>
           <li><input name="clubs[]" type="checkbox" value="Womens Ministry">Womens Ministry</li>
           <li><input name="clubs[]" type="checkbox" value="Student Ministry">Student Ministry</li>
           <li><input name="clubs[]" type="checkbox" value="Childrens Ministry">Childrens Ministry</li>
           <li><input name="clubs[]" type="checkbox" value="Mosque">Mosque</li>
           <li><input name="clubs[]" type="checkbox" value="Synagogue">Synagogue</li>
           </ul>
           </li>
           </div>
           ';
           break;
           
           case "Community Organization":
           echo '
           <h6>Select Community Organization to Setup</h6>
           <div id="clubsleft">
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
           
           case "Youth or Sport Organization":
           echo '
           <h6>Select Youth or Sport Organization to Setup</h6>
           <div id="clubsleft">
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
           
           case "Local or National Charity":
           echo '
           <h6>Select Local or National Charity to Setup</h6>
           <div id="clubsleft">
           <ul>
          <li><input name="clubs[]" type="checkbox" value="Humane Society">Humane Society</li>
          <li><input name="clubs[]" type="checkbox" value="Breast Cancer Research">Breast Cancer Research</li>
          <li><input name="clubs[]" type="checkbox" value="Alzheimers">Alzheimers</li>
          <li><input name="clubs[]" type="checkbox" value="Parkinsons">Parkinsons</li>
           </ul>
           </li>
           </div>';
           break;
           
           case "Local or National Cause":
           echo '
           <h6>Select Local or National Cause to Setup</h6>
           <div id="clubsleft">
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
        <input type="hidden" name="setup_person" value="<?php echo $loginuser; ?>" /> <!-- Represenative --> <! -- setuppersonid is not getting saved -->
        <input type="hidden" name="setup_person2" value="<?php echo $rep; ?>" /> <!-- Sales Coordinator -->
        <input type="hidden" name="type" value="fundraiser" />
        <input type="hidden" name="validation"  id="validation" value="0" />

        <div class="clearfloat" style="width: 404px; float: right;">
           <br>
              <input id="redbutton" name="submit" type="submit" value="Create New Fundraiser">
        <br><br></div>      
            </div> <!--end setupRight-->
      </form>
        </div> <!--end groupInfoForm--> 
  </div> <!--end contentMain858-->
  
      <div class="clearfloat"></div>
   <?php include 'footer.php' ; ?>
    </div> <!--end container--> 
    
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