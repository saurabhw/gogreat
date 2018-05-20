<?php
	session_start();
	ini_set('session.bug_compat_warn', 0);
        ini_set('session.bug_compat_42', 0);
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
  				setuppersonid2 = '$setup_person',
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
	
	$query = "SELECT * FROM $table WHERE loginid='$groupid'";
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
<head>
<meta charset="UTF-8">
<title>Information | Edit Account | Sales Coordinator</title>
<link href="../../css/layout_styles.css" rel="stylesheet" type="text/css" />
<link href="../../css/form_styles.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../../images/favicon.ico">

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
</head>

<body id="info">
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <?php include 'acct_sidenav.php' ; ?>
      
      <div id="content">
	<h1>Edit Account</h1>
    	<h3>Fundraising Group Information</h3>
    	<p>Required fields are marked with <span class="required">*</span></p>
    	
	    <?php if ($_POST && $suspect){ ?>
	    <p class="warning">Sorry, your mail could not be sent. Please try later.</p>
	    <?php } elseif ($missing || $errors) { ?>
	    <p class ="warning">Please fix the item(s) indicated.</p>
	    <?php } ?>
         
    	<form id="graybackground" action="information.php" method="POST" name="addOrg" enctype="multipart/form-data" id="addOrg" onSubmit="return validate(this);">
    	<div id="table">
           <div id="row">
	           <span id="loginemail">Initial User Name</span>
	           <span id="loginpass">Initial Password</span>
	           <span id="acctid">ID</span>
           </div> <!-- end row -->
           <div id="row">
	           <input id="loginemail" type="text name="user" value="<? echo $user_name;?>" readonly="readonly"/>
	           <input id="loginpass" type="text name="pass" value="<? echo $user_pass;?>" readonly="readonly"/>
	           <input id="acctid" type="text" name="" value="<? echo $fundraiserid; ?>" title="Account ID Number" readonly/>
           </div> <!-- end row -->
           <br>
         <div id="row">
               <span id="group">Group Name<span class="required">*</span></span>
               <span id="type">Contact Name</span>
            	<span id="loginemail">Contact Email Address</span>
         </div> <!-- end row -->
        <div id="row">
              <input id="group" type="text" name="groupName" value="<? echo $group_name;?>" maxlength="150" title="Fundraiser Group Name" />
              <input id="type" name="contactFirstName" type="text" value="<? echo $contact_name; ?>" maxlength="150" title="Main Contact's Name - Optional"/>
            	<input id="loginemail" name="contactEmail" type="text" value="<? echo $email; ?>" maxlength="150" title="Main Contact's Email Address - Optional"/>
        </div> <!-- end row -->
        <br>
        <div id="row">
              <span id="address1">Address 1<span class="required">*</span></span>
              <span id="address2">Address 2</span>
              <span id="city">City<span class="required">*</span></span>
              <span id="state2">State<span class="required">*</span></span>
              <span id="zip">Zip<span class="required">*</span></span>
        </div> <!-- end row -->     
        <div id="row">      
              <input id="address1" type="text" name="address1" value="<? echo $address1; ?>" maxlength="150"/>
              <input id="address2" type="text" name="address2" value="<? echo $address2; ?>" maxlength="150"/>
              <input id="city" type="text" name="city" value="<? echo $city; ?>" maxlength="150"/> 
              <select id="state2" name="state">
                  	<option value="<?php echo $state; ?>"><?php echo $state; ?></option>
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
             <input id="zip" name="zip" type="text" value="<? echo $zip; ?>" maxlength="15"/>
            </div> <!-- end row -->
            <br>
            <div id="row">
             <span id="url">Existing Website URL<span class="required">*</span></span>
             <span id="url">Facebook Page</span>
             <span id="url">Twitter Page</span>
            </div> <!-- end row -->
            <div id="row">
             <input id="url" name="websiteURL" type="text" value="<? echo $url; ?>" maxlength="150" title="URL of Your Group's Existing Website"/>
             <input id="url" name="facebookURL" type="text" value="<? echo $face; ?>" maxlength="150" title="URL of Your Group's Facebook Page - Optional"/>
             <input id="url" name="twitterURL" type="text" value="<? echo $twitter; ?>" maxlength="150" title="URL of Your Group's Twitter Profile - Optional"/>
            </div> <!-- end row -->
            <br>            
            <div id="row">
            	<span id="ppemail">PayPal Email</span>
            </div> <!-- end row -->
            <div id="row">
            	<input id="ppemail" type="text" name="paypalID" value="<? echo $pal ?>" maxlength="150" title="PayPal Email Address"/>
            </div> <!-- end row -->
		<br>
          <div id="row">
	         <a href="reasons.php?groupid=<?echo $fundraiserid;?>">
	         <input name="username" type="hidden" value="<?php echo $login_email;?>">
	         <input name="password" type="hidden" value="<?php echo $loginPass;?>">
	         <input name="type" type="hidden" value="<?php echo $club;?>">
	         <input name="setup_person" type="hidden" value="<?php echo $userID;?>">
	         <input name="groupID" type="hidden" value="<?php echo $fundraiserid;?>">
	         <input name="hasLogin" type="hidden" value="<?echo $hasLogin;?>" /> 
	         <input id="redbutton" name="submit" type="submit" value="Save & Continue to Reasons">
	         </a>
         </div> <!-- end row -->
      </div> <!-- end table -->
      <br class="clearfloat">
      </form>
    </div> <!--end content-->
    
<?php include '../footer.php' ; ?>
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