<?php
  session_start(); // session start
ob_start();
ini_set('display_errors', '1'); // errors reporting on
error_reporting(E_ALL); // all errors
require_once('../includes/functions.php');
require_once('../includes/connection.inc.php');
require_once('../includes/imageFunctions.inc.php');
$link = connectTo();

  if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
   
   $userID = $_SESSION['userId'];
   $query = "SELECT * FROM user_info WHERE userInfoID='$userID'";
   $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysqli_error($link));
   $row = mysqli_fetch_assoc($result);

   $pic = $row['picPath'];

?>
<!DOCTYPE html>
<head>
	<title>Add Organization | Representative</title>
</head>

<body>
<div id="container">
      
      <?php include 'header.inc.php' ; ?>
      <?php include 'sideLeftNav.php' ; ?>
      
      <div id="content">
    <h1>Add New Organization</h1>
          <h3>Choose Organization Type</h3>
          
        <form name="fundraisingType" method="post" action="newOrg.php" enctype="multipart/form-data">
        <ul>
        <li><input type="text" name="orgName" id="" required> Organization Name</li>
        <li><input type="text" name="a1" id="" required> Address 1</li>
        <li><input type="text" name="a2" id="" > Address 2</li>
        <li><input type="text" name="city" id="" require> City</li>
        <li><select id="state" name="state" required>State
	<option value="">--</option>
	<option value="AL">AL</option>
	<option value="AK">AK</option>
	<option value="AZ">AZ</option>
	<option value="AR">AR</option>
	<option value="CA">CA</option>
	<option value="CO">CO</option>
	<option value="CT">CT</option>
	<option value="DE">DE</option>
	<option value="DC">DC</option>
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
	</select> </li>
        <li><input type="text" name="zip" id="" maxlegth="5" required> Zip</li>
        <li><input type="text" name="phone" id="" maxlength="14" required> Primary Phone</li>
        <li><input type="text" name="ext" id="" maxlegth="5">Extension</li>
        <li><input type="email" name="email" id="email" required></li>
      </ul>
          	<div id="graybackground">
          		<div class="groupcolumns">
				<div class="groupsection">
					<h7>Education</h7> <br><br>
		          		<input type="radio" name="fundtype" value="Elementary School"><label>Elementary School</label> <br>
		          		<input type="radio" name="fundtype" value="Middle School"><label>Middle School</label> <br>
					<input type="radio" name="fundtype" value="High School"><label>High School</label> <br>
					<input type="radio" name="fundtype" value="College"><label>College</label> <br>
					<input type="radio" name="fundtype" value="Pre-School"><label>Pre-School</label> <br>
					<input type="radio" name="fundtype" value="Home School"><label>Home School</label> <br>
					<input type="radio" name="fundtype" value="Trade, Vocational & Tech"><label>Trade, Vocational & Tech</label> <br>
					<input type="radio" name="fundtype" value="Camp"><label>Camp</label> <br>
				</div> <!-- end groupsection -->
				<div class="groupsection">
					<h7>Faith</h7><br /><br />                      
					<input type="radio" name="fundtype" value="Baptist"><label>Baptist</label> <br>
					<input type="radio" name="fundtype" value="Catholic"><label>Catholic</label> <br>
					<input type="radio" name="fundtype" value="Episcopal"><label>Episcopal</label> <br>
					<input type="radio" name="fundtype" value="Lutheran"><label>Lutheran</label> <br>
					<input type="radio" name="fundtype" value="Methodist"><label>Methodist</label> <br>
					<input type="radio" name="fundtype" value="Presbyterian"><label>Presbyterian</label> <br>
					<input type="radio" name="fundtype" value="Orthodox"><label>Orthodox</label> <br>
					<input type="radio" name="fundtype" value="Reformed"><label>Reformed</label> <br>
					<input type="radio" name="fundtype" value="Spirit-Filled"><label>Spirit-Filled</label> <br>
					<input type="radio" name="fundtype" value="Christian Other"><label>Christian Other</label> <br>
				</div> <!-- end groupsection -->
				
				<div class="groupsection">
					<h7>Organization</h7> <br><br>
					
					<input type="radio" name="fundtype" value="Local & National Organization"><label>Local & National Organization</label> <br>
					<input type="radio" name="fundtype" value="Local & National Charity"><label>Local & National Charity</label> <br>
					<input type="radio" name="fundtype" value="Community Organization"><label>Community Organization</label> <br>
					<input type="radio" name="fundtype" value="Youth & Sports"><label>Youth & Sports</label> <br>
					<input type="radio" name="fundtype" value="Sports League"><label>Sports League</label> <br>
					<input type="radio" name="fundtype" value="General"><label>General</label> <br>
				</div> <!-- end groupsection -->
				
			</div> <!-- end groupcolumns -->
              </div> <!-- end graybackground -->
              <br>
        <input type="hidden" id="choice" name="choice" />
        <input type="submit" name="submit" class="redbutton" value="Step 2: Set Up Website" />
      </form>
  </div> <!--end content-->
  
      <?php include 'footer.php' ; ?>
    </div> <!--end container-->
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