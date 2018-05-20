<?php
	session_start();
	ini_set('session.bug_compat_warn', 0);
	ini_set('session.bug_compat_42', 0);
	
	if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
	ob_start();
	include '../includes/connection.inc.php';
	//
	$link = connectTo();
	$groupid = $_GET["group"];
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
  	    $redirect = "Location:reasons.php?group=$group";
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
 

   $query = "SELECT * FROM user_info WHERE userInfoID='$userID' ";
   $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error());
   $row = mysqli_fetch_assoc($result);
   $myPic = $row['picPath'];
        	
?>

<!DOCTYPE html>
<head>
<title>Edit Account Information | Representative</title>
</head>

<body>
<div id="container">
      <?php include 'header.inc.php' ; ?>
<?php include 'sidenav.php' ; ?>
      
      <div id="content">
	<h1>Edit Account</h1>
	<h3>Fundraising Group Information</h3>

	    <?php if ($_POST && $suspect){ ?>
		    <p class="warning">Sorry, your mail could not be sent. Please try later.</p>
		    <?php } elseif ($missing || $errors) { ?>
		    <p class ="warning">Please fix the item(s) indicated.</p>
	    <?php } ?>
         
         <form id="" action="information.php" method="POST" name="addOrg" enctype="multipart/form-data" onSubmit="return validate(this);">
         	<div class="simpleTabs">
			<!--<ul class="simpleTabsNavigation">
				<li><a href="#">Information</a></li>
				<li><a href="#">Account Login</a></li>
				<li><a href="#">Payment</a></li>
				<li><a href="#">Social Media</a></li>
				<li><a href="#">Profile Photo</a></li>
			</ul>-->
			
			<div class="interim-form">
				<div class="interim-header"><h2>Contact Information</h2></div>
				<div class="tablerow"> <!-- titles -->
				        <span id="hd_group">Group</span>									
					<span id="hd_url">Existing Website URL</span>
					<span id="hd_id">ID</span>
				</div> <!-- end row -->
				<div class="tablerow"> <!-- inputs -->
				        <input id="group" type="text" name="groupname" value="<? echo $group_name;?>"> <!-- this should say the group not account name -->
				        <input id="url" type="text" name="websiteURL" value="<? echo $url; ?>">
				        <input id="id" type="text" name="" value="<? echo $fundraiserid; ?>" title="Account ID Number" readonly>
				</div> <!-- end row -->
				<div class="tablerow"> <!-- titles -->									
					<span id="hd_cname">Contact Name</span>
					<span id="hd_loginemail">Contact Email</span>
					<!-- <span id="hd_title">Position</span>-->
				</div> <!-- end row -->
				<div class="tablerow"> <!-- inputs -->
					<input id="cname" type="text" name="contactFirstName" value="<? echo $contact_name; ?>">
					<input id="loginemail" type="text" name="contactEmail" value="<? echo $email; ?>">
    					<!--<select name="">
						<option value="">---</option>
						<option value=""></option>
						<option value=""></option>
						<option value=""></option>
						<option value=""></option>
						<option value=""></option>
					</select>-->
				</div> <!-- end row -->
								
				<table>
	                            	<tr>
	                                	<td id="td_1">
							<div class="tablerow"> <!-- titles -->
								<span id="hd_address1">Address 1</span>
							</div> <!-- end row -->
							<div class="tablerow"> <!-- inputs -->
								<input id="address1" type="text" name="address1" value="<? echo $address1; ?>">
							</div> <!-- end row -->
							<div class="tablerow">
                        		<span id="hd_address2">Address 2</span>
                        	</div> <!-- end row -->
			                <div class="tablerow">
			                    <input id="address2" type="text" name="address2" value="<? echo $address2; ?>">
			                </div> <!-- end row -->
							<div class="tablerow"> <!-- titles -->
								<span id="hd_city">City</span>
								<span id="hd_state">State</span>
								<span id="hd_zip">Zip</span>
							</div> <!-- end row -->
							<div class="tablerow"> <!-- inputs -->
								<input id="city" type="text" name="city" value="<? echo $city; ?>">
								<select id="state" name="State">
									<option value="<?php echo $state; ?>"><?php echo $state; ?></option>
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
								</select>
								<input id="zip" type="text" name="" value="<? echo $zip; ?>">
							</div> <!-- end row -->
                        			</td>
                        			<td id="td_2">
                        				<!--<div class="tablerow"> <!-- title -->
                            				<!--<span id="hd_mphone">Mobile Phone</span>
										</div> <!-- end row -->
                        				<!--<div class="tablerow"> <!-- inputs -->
                           	    			<!--<input id="mphone1" type="text" name=""><input id="mphone2" type="text" name=""><input id="mphone3" type="text" name="">
										</div> <!-- end row -->
                            			<!--<div class="tablerow"> <!-- title -->
                            				<!--<span id="hd_hphone">Home Phone</span>
                        				</div> <!-- end row -->
                            			<!--<div class="tablerow"> <!-- inputs -->
                           	    			<!--<input id="hphone1" type="text" name=""><input id="hphone2" type="text" name=""><input id="hphone3" type="text" name="">
                      	    			</div> <!-- end row -->
										<div class="tablerow"> <!-- title -->
                           		 			<span id="hd_wphone">Primary Phone</span>
                           		 			<span id="hd_ext">Ext</span>
										</div> <!-- end row -->
                            				<div class="tablerow">
                           		 			<input id="wphone1" type="text" name="" value="<?php echo $row['homePhone'];?>"><!--<input id="wphone2" type="text" name=""><input id="wphone3" type="text" name="">-->
											<input id="ext" type="text" name="ext" value="<?php echo $row['workPhoneExt'];?>">
										</div> <!-- end row -->
                        			</td>
                        		</tr>
                      		</table>
			</div> <!-- end tab1 content -->
			
			<div class="interim-form"> <!-- account login tab -->
					<div class="interim-header"><h2>Your Account Login</h2></div>
					<div class="tablerow"> <!-- title -->
						<span id="hd_username">Initial Username</span>
					</div> <!-- end row -->
					<div class="tablerow"> <!-- input -->
						<input id="username" type="text" name="email" value="<? echo $user_name;?>" readonly>
					</div> <!-- end row -->
					
					<div class="tablerow"> <!-- titles -->
					<span id="hd_password">Initial Password</span>
					</div> <!-- end row -->
					<div class="tablerow"> <!-- inputs -->
						<input id="password" type="password" name="pass" value="<? echo $user_pass;?>" readonly>
					</div> <!-- end row -->
				</div> <!-- end tab2 content (account login) -->
					
				<div class="interim-form"> <!-- payment tab -->
					<div class="interim-header"><h2>1 Simple Step for Payment</h2></div>
					<h3>1. PayPal Information</h3>
					<p>Please enter your new or existing PayPal information. All funds are paid next day into your PayPal account. If you prefer, we can set up your PayPal account for you.</p>
					<div class="tablerow"> <!-- title -->
						<span id="hd_ppemail">PayPal Email</span>
					</div> <!-- end row -->
					<div class="tablerow"> <!-- input -->
						<input id="paypalemail" type="text" name="paypalemail" value="<? echo $pal ?>">
					</div> <!-- end row -->
					<br>
					<h3>Group Total Funds: 35%</h3>
				</div> <!-- end tab3 content (payment) -->
					
				<div class="interim-form"> <!-- social media tab4 -->
					<div class="interim-header"><h2>Social Media Connections</h2></div>
					<div class="tablerow"> 
						<span id="hd_fb" title="Facebook Name or Profile URL">Facebook</span>
						<input type="url" id="fb"  name="fb" value="<? echo $face; ?>" placeholder="www.facebook.com/user">
					</div> <!-- end row -->
					<br>
					<div class="tablerow"> 
						<span id="hd_tw" title="Twitter Username or Profile URL">Twitter</span>
						<input type="url" id="tw" name="twitter" value="<? echo $twitter; ?>"  placeholder="www.twitter.com/user">
					</div> <!-- end row -->
					<!--<div class="tablerow"> 
						<span id="hd_li" title="LinkedIn Username or Profile URL">LinkedIn</span>
						<input type="url" id="li" name="lindkedin" value="">
					</div>--> <!-- end row -->
					<!--<div class="tablerow"> 
						<span id="hd_pn" title="Pintrest Username or Profile URL">Pintrest</span>
						<input type="url" id="pn" name="printrest" value="">
					</div>--> <!-- end row -->
					<!--<div class="tablerow">
						<span id="hd_gp" title="Google+ Username or Profile URL">Google+</span>
						<input type="url" id="gp" name="googleplus" value="">
					</div>--> <!-- end row -->
				</div> <!-- end tab4 content (social media) -->
		</div> <!-- end simple tabs -->	
         
         <br>
         
    	<div id="row">
    		<a href="reasons.php?group=<?echo $fundraiserid;?>">
	         	<input name="username" type="hidden" value="<?php echo $login_email;?>">
	         	<input name="password" type="hidden" value="<?php echo $loginPass;?>">
	         	<input name="type" type="hidden" value="<?php echo $club;?>">
	         	<input name="setup_person" type="hidden" value="<?php echo $userID;?>">
	         	<input name="groupID" type="hidden" value="<?php echo $fundraiserid;?>">
	         	<input name="hasLogin" type="hidden" value="<?echo $hasLogin;?>" /> 
	         	<input name="submit" type="submit" class="redbutton" value="Save and Continue to Reasons" title="Saves Changes and Brings You to Edit Reasons">
         	</a>
    	</div> <!-- end row -->
    	<br>
    </div> <!-- end interim-form -->
        </form>

    </div> <!--end content-->
    
<?php include '../includes/footer.php' ; ?>
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