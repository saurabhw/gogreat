<?php 
      session_start(); // session start
      ob_start();
      ini_set('display_errors', '1'); // errors reporting on
      error_reporting(E_ALL); // all errors
      require_once('../includes/functions.php');
      require_once('../includes/connection.inc.php');
      require_once('../includes/imageFunctions.inc.php');
      $link = connectTo();
	
	if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "SC")
        {
            header('Location: ../index.php');
            exit;
        }

	$groupid = $_GET["group"];
        $userID = $_SESSION['userId'];
        $query1 = "SELECT * FROM user_info WHERE userInfoID = '$userID'";
        $result1 = mysqli_query($link, $query1)or die ("couldn't execute query 1.".mysqli_error($link));
        $row = mysqli_fetch_assoc($result1);
        $pic = $row['picPath'];
        
	$table = "Dealers";
	// check if form has been submitted
	if(isset($_POST['submit'])){
	 
	   $groupName = mysqli_real_escape_string($link, $_POST['groupname']);
	   $url = mysqli_real_escape_string($link, $_POST['websiteURL']);
	   $contactName = mysqli_real_escape_string($link, $_POST['contactFirstName']);
	   $address1 = mysqli_real_escape_string($link, $_POST['address1']);
	   $address2 = mysqli_real_escape_string($link, $_POST['address2']);
	   $fund = mysqli_real_escape_string($link, $_POST['groupID']);
	   $city = mysqli_real_escape_string($link, $_POST['city']);
	   $state = mysqli_real_escape_string($link, $_POST['state']);
	   $zip = mysqli_real_escape_string($link, $_POST['zip']);
	   $phone = mysqli_real_escape_string($link, $_POST['phone']);
	   $facebookURL = mysqli_real_escape_string($link, $_POST['fb']);
	   $twitterURL = mysqli_real_escape_string($link, $_POST['twitter']);
	   $contactEmail = mysqli_real_escape_string($link, $_POST['contactEmail']);  
	   $payMail = mysqli_real_escape_string($link, $_POST['pal']);
	   $abt = mysqli_real_escape_string($link, $_POST['about']);
	   $ext = mysqli_real_escape_string($link, $_POST['ext']);
	   
	   $group = mysqli_real_escape_string($link, $_POST['groupID']);
	
	     $query = "UPDATE Dealers SET
   				DealerDir = '$groupName',
   				About = '$abt',
   				Phone = '$phone',
   				Fax = '$ext',
  				Address1 = '$address1',
  				Address2 = '$address2',
  				City = '$city',
   				State = '$state',
  				Zip = '$zip',
   				ContactName = '$contactName',
  				setuppersonid = '$userID',
   				email = '$contactEmail',
   				website = '$url',
  				PaypalEmail = '$payMail',
    				facebook  = '$facebookURL',
  				twitter	= '$twitterURL'
  				WHERE loginid = '$fund'";
  				$result = mysqli_query($link, $query)or die("MySQL ERROR: query 1 ".mysqli_error($link)); 
  				
  		
	   $query2 = "UPDATE Dealers SET
   				DealerDir = '$groupName',
   				Phone = '$phone',
   				Fax = '$ext',
   				Address1 = '$address1',
  				Address2 = '$address2',
  				City = '$city',
  				State = '$state',
  				Zip = '$zip',
  				ContactName = '$contactName',
  				setuppersonid = '$userID',
  				email = '$contactEmail',
  				website = '$url',
  				PaypalEmail = '$payMail',
   				facebook  = '$facebookURL',
  				twitter	= '$twitterURL'
  				WHERE setuppersonid = '$fund'";
  				$result2 = mysqli_query($link, $query2)or die("MySQL ERROR: query2 ".mysqli_error($link)); 		
  	if($result && $result2){
  	    $redirect = "Location:photos.php?group=$group";
  	    header("$redirect");
  	}			
  				
	
	}// end if(isset($_POST['submit']))
	
	$query3 = "SELECT * FROM $table WHERE loginid='$groupid' AND setuppersonid='$userID'";
	$result3 = mysqli_query($link, $query3)or die ("couldn't execute query 3.".mysql_error());
	$row2 = mysqli_fetch_assoc($result3);
	$fundraiserid = $row2['loginid'];
	$orgName = $row2['Dealer'];
	$group_name = $row2['DealerDir'];
	//$name = $row2['Address1'];
	$phone = $row2['Phone'];
	$address1 = $row2['Address1'];
	$address2 = $row2['Address2'];
	
	$contact_name = $row2['ContactName'];
	$city = $row2['City'];
	$zip = $row2['Zip'];
	$fax = $row2['Fax'];
        $state = $row2['State'];
        $email = $row2['email'];
        $url = $row2['website'];
        $twitter = $row2['twitter'];
        $face = $row2['facebook'];
        $pal = $row2['PaypalEmail'];
        $about = $row2['About'];
        $reasons = $row2['FundraiserReasons'];
        $goal = $row2['FundraiserGoal'];
        $about = $row2['About'];
        $start = $row2['FundraiserStartDate'];
        $end = $row2['FundraiserEndDate'];
        $user_name = $row2['userName'];
        $user_pass = $row2['firstPass'];
        //set all session variables for multi part form
     
 
?>

<!DOCTYPE html>
<head>
<title>Edit Account Information | Representative</title>
<style>
#border{
background-color:#f8f8f8;
box-shadow: 0px 0px 15px #888888;
padding:15px 35px 40px 35px; 
}
input{
padding-left:5px;
}
</style>
</head>

<body>
      <?php include 'header.inc.php' ; ?>
<?php include 'sideLeftNav.php' ; ?>
    <div class="container" id="getStartedContent" >
        <div class="row-fluid">
	<div id="Single" class="tabcontent">
 <div class="page-header">
	<h2 align="center">Edit Fundraising Group Information</h2>
</div>
 <div class=" col-md-7 col-md-push-2" id="bizAssociate-col">
<br>

         <div class="table">
         <form id="" action="information.php" method="POST" name="addOrg" enctype="multipart/form-data" onSubmit="return validate(this);">
<div id="border">
         	<div class="simpleTabs">
			<!--<ul class="simpleTabsNavigation">
				<li><a href="#">Information</a></li>
				<li><a href="#">Account Login</a></li>
				<li><a href="#">Payment</a></li>
				<li><a href="#">Social Media</a></li>
				<li><a href="#">Profile Photo</a></li>
			</ul>-->
			
			<div class="interim-form">
				<div class="interim-header"><h2><? echo $orgName.' '.$group_name; ?></h2></div>
    				<hr style="border-color:#b8b8b8;">
				<div class="row" style="margin-left:1px"> <!-- titles -->
				        <span style="line-height:35px;" id="hd_group">Group</span>									
					<span style="line-height:35px;margin-left:120px;" id="hd_url">Existing Website URL</span>
					
				</div> <!-- end row -->
				<div class="row" style="margin-left:1px"> <!-- inputs -->
				        <input id="group" type="text" name="groupname" value="<? echo $group_name;?>" required> <!-- this should say the group not account name -->
				        <input id="url" type="url" name="websiteURL" value="<? echo $url; ?>">&nbsp;&nbsp;Include http://
				        <input id="id" type="hidden" name="fundid" value="<? echo $fundraiserid; ?>" title="Account ID Number" readonly>
				</div> <!-- end row -->
				<div class="row" style="margin-left:1px"> <!-- titles -->									
					<span style="line-height:35px;" id="hd_cname">Contact Name</span>
					<span style="line-height:35px;margin-left:69px;" id="hd_loginemail">Contact Email</span>
					<!-- <span id="hd_title">Position</span>-->
				</div> <!-- end row -->
				<div class="row" style="margin-left:1px"> <!-- inputs -->
					<input id="cname" type="text" name="contactFirstName" value="<? echo $contact_name; ?>" >
					<input id="loginemail" type="email" name="contactEmail" value="<? echo $email; ?>" >
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
							<!-- Physical Address -->
							<div class="row"> <!-- titles -->
								<!--<span id="hd_address1">Address 1</span>-->
							</div> <!-- end row -->
							<div class="row"> <!-- inputs -->
								<!--<input id="address1" type="text" name="address1" value="<? echo $address1; ?>" required>-->
							</div> <!-- end row -->
							<div class="row">
                        		<!--<span id="hd_address2">Address 2</span>-->
                        	</div> <!-- end row -->
			                <div class="row">
			                    <!--<input id="address2" type="text" name="address2" value="<? echo $address2; ?>">-->
			                </div> <!-- end row -->
							<div class="row"> <!-- titles -->
								<!--<span id="hd_city">City</span>-->
								<!--<span id="hd_state">State</span>-->
								<!--<span id="hd_zip">Zip</span>-->
								
							</div> <!-- end row -->
							<div class="row"> <!-- inputs -->
								<!--<input id="city" type="text" name="city" value="<? echo $city; ?>" required>-->
								<!--<select id="state" name="state">
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
								</select>-->
								<!--<input id="zip" type="text" name="zip" value="<? echo $zip; ?>" maxlength="5" required>-->
							</div> <!-- end row -->
							<!-- Physical Address End -->
							
							<div class="row" style="margin-left:1px"> <!-- title -->
	                           		 		<span style="line-height:35px;" id="hd_wphone">Primary Phone</span>
	                           		 		<span style="line-height:35px;margin-left:75px;" id="hd_ext">Ext</span>
							</div> <!-- end row -->
	                    				<div class="row" style="margin-left:1px">
	                   		 			<input id="phone" type="text" name="phone" value="<?php echo $phone;?>" maxlength="14">
								<input id="ext" type="text" name="ext" value="<?php echo $fax;?>" maxlength="5">
							</div> <!-- end row -->
							
							<div class="row" style="margin-left:1px">
								<span style="line-height:45px;" id="hd_about">Fundraiser Description</span><br>
								<textarea name="about" cols="30" rows="5" id="description"><? echo $about;?></textarea>
							</div> <!-- end row -->
							<br>
							<div class="row" style="margin-left:1px">
							
				<br><b><p style="font-size: 15px;">User Name: <? echo $user_name;?></p></b>
				<br><b><p style="font-size: 15px;">Password: <? echo $user_pass;?></p></b>
							</div>
                        			</td>
                        			<td id="td_2">
                        				<!--<div class="row"> <!-- title -->
                            					<!--<span id="hd_mphone">Mobile Phone</span>
							</div> <!-- end row -->
                        				<!--<div class="row"> <!-- inputs -->
                           	    				<!--<input id="mphone1" type="text" name=""><input id="mphone2" type="text" name=""><input id="mphone3" type="text" name="">
							</div> <!-- end row -->
	                            			<!--<div class="row"> <!-- title -->
	                            				<!--<span id="hd_hphone">Home Phone</span>
	                        			</div> <!-- end row -->
	                            			<!--<div class="row"> <!-- inputs -->
	                           	    			<!--<input id="hphone1" type="text" name=""><input id="hphone2" type="text" name=""><input id="hphone3" type="text" name="">
	                      	    			</div> <!-- end row -->
							
                        			</td>
                        		</tr>
                      		</table>
			</div> <!-- end tab1 content -->
			
		<br>
				<div class="interim-form"> <!-- payment tab -->
					<div class="interim-header"><h2>1 Simple Step for Payment</h2></div>
    					<hr style="border-color:#b8b8b8;">
					<h3>Group Total Funds: 35%</h3>
					<h3>1. PayPal Information</h3>
					<p>Please enter your new or existing PayPal information. All funds are paid next day into your PayPal account. If you prefer, we can set up your PayPal account for you.</p>
					<div class="row" style="margin-left:1px"> <!-- title -->
						<span style="line-height:35px;" id="hd_ppemail">PayPal Email</span>
					</div> <!-- end row -->
					<div class="row" style="margin-left:1px"> <!-- input -->
						<input id="paypalemail1" type="email" name="pal" value="<? echo $pal ?>">
					</div> <!-- end row -->
					<br>
				</div> <!-- end tab3 content (payment) -->
					
				<div class="interim-form"> <!-- social media tab4 -->
					<div class="interim-header"><h2>Social Media Connections</h2></div>
    					<hr style="border-color:#b8b8b8;">
					<div class="row" style="margin-left:1px"> 
						<span style="line-height:35px;" id="hd_fb" title="Facebook Name or Profile URL">Facebook</span>
						<input style="width:200px;" type="url" id="fb"  name="fb" value="<? echo $face; ?>" placeholder="www.facebook.com/user">
					</div> <!-- end row -->
					<br>
					<div class="row" style="margin-left:1px"> 
						<span style="line-height:35px;" id="hd_tw" title="Twitter Username or Profile URL">Twitter</span>
						<input style="width:200px;" type="url" id="tw" name="twitter" value="<? echo $twitter; ?>"  placeholder="www.twitter.com/user">
					</div> <!-- end row -->
					<!--<div class="row"> 
						<span id="hd_li" title="LinkedIn Username or Profile URL">LinkedIn</span>
						<input type="url" id="li" name="lindkedin" value="">
					</div>--> <!-- end row -->
					<!--<div class="row"> 
						<span id="hd_pn" title="Pintrest Username or Profile URL">Pintrest</span>
						<input type="url" id="pn" name="printrest" value="">
					</div>--> <!-- end row -->
					<!--<div class="row">
						<span id="hd_gp" title="Google+ Username or Profile URL">Google+</span>
						<input type="url" id="gp" name="googleplus" value="">
					</div>--> <!-- end row -->
				</div> <!-- end tab4 content (social media) -->
		</div> <!-- end simple tabs -->	
         
         <br>
         
    	<div id="row" style="margin-left:1px">
    		<a href="reasons.php?group=<?echo $fundraiserid;?>">
	         	<input name="username" type="hidden" value="<?php echo $login_email;?>">
	         	<input name="password" type="hidden" value="<?php echo $loginPass;?>">
	         	<input name="type" type="hidden" value="<?php echo $club;?>">
	         	<input name="setup_person" type="hidden" value="<?php echo $userID;?>">
	         	<input name="groupID" type="hidden" value="<?php echo $fundraiserid;?>">
	         	<input name="hasLogin" type="hidden" value="<?echo $hasLogin;?>" /> 
	         	<input name="submit" type="submit" class="redbutton" value="Save and Continue" title="Saves Changes and Brings You to Edit Reasons">
         	</a>
    	</div> <!-- end row -->
</div>
		<br>
</div>
        </form>
          </div> <!--end content -->
    </div> 
</div> <!--end container-->
    </div>
<?php include 'footer.php' ; ?>


</body>

<!--<pre>
<?php if ($_POST && $mailSent){
	echo htmlentities($message, ENT_COMPAT, 'UTF-8')."\n";
	echo 'Headers: '.htmlentities($headers, ENT_COMPAT, 'UTF-8');
} ?>
</pre>00>
<?php
   ob_end_flush();
?>