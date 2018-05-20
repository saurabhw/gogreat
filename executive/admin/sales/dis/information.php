<?php
	session_start();
	if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../../index.php');
            exit;
       }
	ob_start();
	include '../../includes/connection.inc.php';
	//
	$link = connectTo();
	$groupid = $_GET["groupid"];
        $userID = $_SESSION['userId'];
	$table = "Dealers";
	// check if form has been submitted
	if(isset($_POST['submit'])){
	   // list expected fields
	     $expected = array('groupName','address1','address2','city','state','zip','setup_person','websiteURL', 'contactFirstName',
	     'contactEmail','paypalID','facebookURL','twitterURL','groupID');
	   // set required fields
	     $required = array('groupName','setup_person', 'groupID');
	   require('processForm.php');
	   $groupName = mysqli_real_escape_string($link, $groupName);
	   $group = mysqli_real_escape_string($link, $_POST['groupID']);
	
	   $query = "UPDATE $table SET
  				Dealer = '$groupName',
  				Address1 = '$address1',
  				Address2 = '$address2',
  				City = '$city',
  				State = '$state',
  				Zip = '$zip',
  				ContactName = '$contactFirstName',
  				setuppersonid = '$setup_person',
  				email = '$contactEmail',
  				website = '$websiteURL',
  				PaypalEmail = '$paypalID',
  				facebook  = '$facebookURL',
  				twitter	= '$twitterURL'
  				WHERE loginid = '$group'";
  				$result = mysqli_query($link, $query)or die("MySQL ERROR: ".mysqli_error($link)); 
  	if($result){
  	    $redirect = "Location:reasons.php?groupid=$group";
  	    header("$redirect");
  	}			
  				
	
	}// end if(isset($_POST['submit']))
	
	$query = "SELECT * FROM $table WHERE loginid='$groupid' AND setuppersonid='$userID'";
	$result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error());
	$row = mysqli_fetch_assoc($result);
	$fundraiserid = $row['loginid'];
	$group_name = $row['Dealer'];
	$name = $row['Address1'];
	$phone = $row['Address1'];
	$address1 = $row['Address1'];
	$address2 = $row['Address2'];
	$contact_name = $row['ContactName'];
	$city = $row['City'];
	$zip = $row['Zip'];
        $state = $row['State'];
        $email = $row['email'];
        $url = $row['website'];
        $twitter = $row['twitter'];
        $face = $row['facebook'];
        $pal = $row['PaypalEmail'];
        $about = $row['about'];
        $reasons = $row['FundraiserReasons'];
        $goal = $row['FundraiserGoal'];
        $about = $row['About'];
        $start = $row['FundraiserStartDate'];
        $end = $row['FundraiserEndDate'];
        $user_name = $row['userName'];
        $user_pass = $row['firstPass'];
        //set all session variables for multi part form
      
        $_SESSION['groupName'] = $group_name;	
        $_SESSION['address1']  = $address1;			
        $_SESSION['address2']  = $address2;		
        $_SESSION['city']  = $city;
        $_SESSION['state']  = $state;
        $_SESSION['zip' ]= $zip;
        $_SESSION['url'] = $url;
        $_SESSION['tw'] = $twitter;
        $_SESSION['fc'] = $face;
        $_SESSION['pp'] = $pal;
        $_SESSION['ab'] = $about;
        $_SESSION['goal'] = $goal;
        $_SESSION['startDate'] = $start;
        $_SESSION['endDate'] = $end;
        
        	
?>

<!DOCTYPE html>
<title>GreatMoods | Setup/Edit Website - General Information</title>
<link href="mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
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
<link href="mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
<link href="setupFormStyles.css" rel="stylesheet" type="text/css" />

<body id="info">
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <?php include '../sidenav.php' ; ?>
      <div id="contentMain858">
    <div class="nav2">
          <ul class="setupNav">
        <li><a href="editacct.php"> <<&nbsp;</a></li>
        <li id="current"><a href="information.php" class="infonav">Information</a></li>
        <li>|</li>
        <li><a href="reasons.php?groupid=<?echo $groupid;?>" class="reasonsnav">Reasons</a></li>
        <li>|</li>
        <li><a href="contacts.php?groupid=<?echo $groupid;?>" class="contactsnav">Contacts</a></li>
        <li>|</li>
        <li><a href="photos.php?groupid=<?echo $groupid;?>" class="photosnav">Photos</a></li>
        <li>|</li>
        <li><a href="goals.php?groupid=<?echo $groupid;?>" class="goalsnav">Goals</a></li>
        <li><a href="reasons.php">&nbsp;>> </a></li>
      </ul>
        </div> <!--end nav2--> 

    <p style="font-size: 24px;">Setup/Edit Website</p>
    
    <h3>Fundraising Group Information</h3>
    <p>Required fields are marked with <span class="required">*</span></p>
    <?php if ($_POST && $suspect){ ?>
    <p class="warning">Sorry, your mail could not be sent. Please try later.</p>
    <?php } elseif ($missing || $errors) { ?>
    <p class ="warning">Please fix the item(s) indicated.</p>
    <?php } ?>
      
    <form action="information.php" method="POST" name="addOrg" enctype="multipart/form-data" id="addOrg" onSubmit="return validate(this);">
    <div class="setupLeft">
           Initial User Name
           <br />
           <input type="text name="user" value="<? echo $user_name;?>" readonly="readonly"/>
           <br />
           Initial Password
           <br />
           <input type="text name="pass" value="<? echo $user_pass;?>" readonly="readonly"/>
          <table class="genInfo1">
        <tr>
              <td colspan="3"><label for="groupName"> Fundraising Group Name<span class="required">*</span></label></td>
            </tr>
        <tr>
              <td colspan="3"><input type="text" id="groupName" name="groupName" maxlength="40" value="<? echo $group_name;?>" /></td>
            </tr>
        <tr>
              <td colspan="3"><label for="address1"> Address 1<span class="required">*</span></label></td>
            </tr>
        <tr>
              <td colspan="3"><input type="text" id="address1" name="address1" maxlength="40" value="<? echo $address1; ?>"/></td>
            </tr>
        <tr>
              <td colspan="3"><label for="address2"> Address 2</label></td>
            </tr>
        <tr>
              <td colspan="3"><input type="text" id="address2" name="address2" maxlength="40" value="<? echo $address2; ?>"/></td>
            </tr>
        <tr>
              <td colspan="3"><label for="city"> City<span class="required">*</span></label></td>
              </tr>
              <tr>
             <td><input id="websiteURL" type="text" maxlength="40" name="city" value="<? echo $city; ?>"/></td> 
             </tr>
             <tr>
             <td colspan="2"><label for="state"> State<span class="required">*</span></label></td>
             <td colspan="1"><label for="zip">ZIP<span class="required">*</span></label></td>
            </tr>
        <tr>
              
              <td colspan="2"><select id="state" name="state" size="1">
                  <option value="<?php echo $state; ?>"><?php echo $state; ?></option>
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
             <td colspan="1"><input id="zip" name="zip" type="text" maxlength="10" size="8" value="<? echo $zip; ?>" /></td>
            </tr>
            <tr>
              <td colspan="3"><label for="websiteURL">URL of Your Existing Website<span class="required">*</span></label></td>
            </tr>
             <tr>
              <td colspan="3"><input id="websiteURL" name="websiteURL" type="text" maxlength="40" value="<? echo $url; ?>" /></td>
            </tr>
            </table>
            </div>
           
           <div>
            <table>
            <tr>
            <td colspan="3"><label>Contact Name (optional)</label></td>
          </tr>
           <tr>
            <td colspan="3"><input id="websiteURL" name="contactFirstName" type="text" maxlength="50" value="<? echo $contact_name; ?>" /></td>
          </tr>
          <tr>
          <td colspan="3"><label>Contact Email Address (optional)</label></td>
          </tr>
          <tr>
            <td colspan="3"><input id="websiteURL" name="contactEmail" type="text" maxlength="50" value="<? echo $email; ?>" /></td>
          </tr>
        <tr>
              <td colspan="3"><label for="facebookURL">URL of Your Facebook Page</label></td>
            </tr>
        <tr>
              <td colspan="3"><input id="websiteURL" name="facebookURL" type="text" maxlength="40" value="<? echo $face; ?>" /></td>
            </tr>
        <tr>
              <td colspan="3"><label for="twitterURL">URL of Your Twitter Page</label></td>
            </tr>
        <tr>
              <td colspan="3"><input  id="websiteURL" name="twitterURL" type="text" maxlength="40" value="<? echo $twitter; ?>" /></td>
            </tr>
            
                    <tr>
          <td><label for="paypalID" class="formSelect">Paypal ID (Email address)<br>
            <input type="text" id="websiteURL" name="paypalID" value="<? echo $pal ?>">
          </label></td>
        </tr>
      
      </table>
    	</div>
          <br  class="clearfloat">
          <br>
         <a href="reasons.php?groupid=<?echo $fundraiserid;?>">
         <input name="username" type="hidden" value="<?php echo $login_email;?>">
         <input name="password" type="hidden" value="<?php echo $loginPass;?>">
         <input name="type" type="hidden" value="<?php echo $club;?>">
         <input name="setup_person" type="hidden" value="<?php echo $userID;?>">
         <input name="groupID" type="hidden" value="<?php echo $fundraiserid;?>">
         <input name="hasLogin" type="hidden" value="<?echo $hasLogin;?>" /> 
         <input name="submit" type="submit" value="Save and Continue">
         </a>
          <br>
          </div> <!--end distributor 1-->
          <br class="clearfloat">
        </form>
    
  </div> <!--end nav3-->
    </div> <!--end contentMain858-->
<?php include '../../footer.php' ; ?>
</div> <!--end container-->

</body>

<pre>
<?php if ($_POST && $mailSent){
	echo htmlentities($message, ENT_COMPAT, 'UTF-8')."\n";
	echo 'Headers: '.htmlentities($headers, ENT_COMPAT, 'UTF-8');
} ?>
</pre>
<?php
   ob_end_flush();
?>