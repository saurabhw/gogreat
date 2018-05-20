<?php
	session_start();
	if(($_SESSION['role'] == 'MemberLeader' || $_SESSION['role'] == 'Member' || $_SESSION['role'] == 'fundOwner') && isset($_SESSION['authenticated']))
       {
          //authenicated
       }
       else
       {
            header('Location: ../index.php');
            exit;
       }
	ob_start();
	include '../includes/connection.inc.php';
	include '../includes/functions.php';
        $userID = $_SESSION['userId'];
	//
	$link = connectTo();
	$groupid = $_SESSION["groupid"];
        $userID = $_SESSION['userId'];
        $user = $_SESSION['email'];
	$table = "Dealers";
	// check if form has been submitted
	if(isset($_POST['submit'])){
	   // list expected fields
	    /* $expected = array('groupName','address1','address2','city','state','zip','setup_person','websiteURL','paypalID','facebookURL','twitterURL','groupID');
	    
	   set required fields
	     $required = array('groupName','setup_person', 'groupID');
	   require('processForm.php');
	   */
	   $g = $_GET['group'];
	   $club_type = mysqli_real_escape_string($link, $_POST['gtype']);
	   $group = mysqli_real_escape_string($link, $_POST['groupID']);
	   $ad1 = mysqli_real_escape_string($link, $_POST['address1']);
	   $ad2 = mysqli_real_escape_string($link, $_POST['address2']);
	   $cty = mysqli_real_escape_string($link, $_POST['city']);
	   $sta = mysqli_real_escape_string($link, $_POST['state']);
	   $zip1 = mysqli_real_escape_string($link, $_POST['zip']);
	   $gn = mysqli_real_escape_string($link, $_POST['gname']);
	   $url = mysqli_real_escape_string($link, $_POST['url']);
	   $phn = mysqli_real_escape_string($link, $_POST['phone']);
	   $ext = mysqli_real_escape_string($link, $_POST['ext']);
	   $ppe = mysqli_real_escape_string($link, $_POST['paypalemail']);
	   $fcb = mysqli_real_escape_string($link, $_POST['fb']);
	   $twt = mysqli_real_escape_string($link, $_POST['twitter']);
	   $stin = mysqli_real_escape_string($link, $_POST['stin1']);
	   $ftin = mysqli_real_escape_string($link, $_POST['ftin1']);
	   $nonp = mysqli_real_escape_string($link, $_POST['nonp1']);
	   $ext = mysqli_real_escape_string($link, $_POST['ext']);
	   
	   
	  
	   
	
	                        $query2 = "UPDATE $table SET
  				DealerDir = '$club_type',
  				Address1 = '$ad1',
  				Address2 = '$ad2',
  				Phone = '$phn',
  				City = '$cty',
  				State = '$sta',
  				Zip = '$zip1',
  				PaypalEmail = '$ppe',
  				website = '$url',
  				facebook  = '$fcb',
  				twitter	= '$twt'
  				WHERE loginid = '$groupid'";
  				$result2 = mysqli_query($link, $query2)or die("MySQL ERROR query 2: ".mysqli_error($link));
  				/*
  				$query3 = "UPDATE $table SET
  				Dealer = '$groupName',
  				Address1 = '$ad1',
  				Address2 = '$ad2',
  				Phone = '$phn',
  				City = '$cty',
  				State = '$sta',
  				Zip = '$zip1',
  				PaypalEmail = '$ppe',
  				website = '$url',
  				facebook  = '$fcb',
  				twitter	= '$twt'
  				WHERE setuppersonid = '$groupid'";
  				$result3 = mysqli_query($link, $query3)or die("MySQL ERROR query 3: ".mysqli_error($link));
  				*/
  				$queryI = "UPDATE user_info SET
  				ssn = '$stin',
  				address1 = '$ad1',
  				address2 = '$ad2',
  				city = '$cty',
  				state = '$sta',
  				zip = '$zip1',
  				homePhone = '$phn',
  				fbPage  = '$fcb',
  				twitter	= '$twt',
  				workPhoneExt = '$ext',
  				userPaypal = '$ppe',
  				fedtin ='$ftin',
  				statetin = '$stin',
  				threec = '$nonp'
  				WHERE email = '$user'";
  				$resultI = mysqli_query($link, $queryI)or die("MySQL ERROR query I: ".mysqli_error($link));
  			
  				
  	if($result2 && $resultI){
  	   $redirect = "Location:reasons.php?group=$group";
  	    header("$redirect");
  	   
  	  
  	}			
  				
	
	}// end if(isset($_POST['submit']))
	
	$query1 = "SELECT * FROM $table WHERE loginid='$groupid'";
	 $result1 = mysqli_query($link, $query1)or die ("couldn't execute query 1.".mysql_error());
	$row = mysqli_fetch_assoc($result1);
	$fundraiserid = $row['loginid'];
	$groupName = $row['Dealer'];
	$club_type = $row['DealerDir'];
	$address1 = $row['Address1'];
	$address2 = $row['Address2'];
	$city = $row['City'];
	$zip = $row['Zip'];
        $state = $row['State'];
        $email = $row['email'];
        $url = $row['website'];
        $twitter = $row['twitter'];  
        $face = $row['facebook'];
        $pay = $row['PaypalEmail'];
        $about = $row['about'];
        $reasons = $row['FundraiserReasons'];
        $goal = $row['FundraiserGoal'];
        $about = $row['About'];
        $start = $row['FundraiserStartDate'];
        $end = $row['FundraiserEndDate'];
        $groupPic = $row['location_pic'];
        $group = $_GET['group'];
        $salesTotal = getGroupSales($group);
        $salesGoal = $row['FundraiserGoal'];
        $banner_path = $row['banner_path'];
        $fb = $row['facebook'];
        $tw = $row['twitter'];
        
        $queryY = "SELECT * FROM user_info WHERE email='$_SESSION[email]'"; 
        $resultY = mysqli_query($link, $queryY)or die ("couldn't execute query Y.".mysql_error()); 
        $rowY = mysqli_fetch_assoc($resultY);
        $fed = $rowY['fedtin'];
        $stx = $rowY['statetin'];
        $threeC = $rowY['threec'];
        $ssnY = $rowY['ssn'];
        $extn = $rowY['workPhoneExt'];
           	
?>

<!DOCTYPE html>
<head>
	<title>Edit Information | Fundraising Group</title>
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
	<?php include 'header.php' ; ?>
      	<?php include 'fundSidebar.php' ; ?>
    <div class="container" id="getStartedContent" >
        <div class="row-fluid">
	<div id="Single" class="tabcontent">
 <div class="page-header">
   	<h1>Edit Information</h1>
</div>
 <div class=" col-md-7 col-md-push-2" id="bizAssociate-col">
<br>
<div id="border">
    	<h2>Fundraising Group Information</h2>
    <hr style="border-color:#b8b8b8;">

	    <?php if ($_POST && $suspect){ ?>
	    <p class="warning">Sorry, your mail could not be sent. Please try later.</p>
	    <?php } elseif ($missing || $errors) { ?>
	    <p class ="warning">Please fix the item(s) indicated.</p>
	    <?php } ?>

        <form class="" id="myForm" action="information.php" method="POST" name="myForm" enctype="multipart/form-data" id="myForm" onSubmit="(return validate());">
	
			<div class="simpleTabs">
			<!--<ul class="simpleTabsNavigation">
				<li><a href="#">Information</a></li>
				<li><a href="#">Account Login</a></li>
				<li><a href="#">Payment</a></li>
				<li><a href="#">Social Media</a></li>
				<li><a href="#">Profile Photo</a></li>
			</ul>-->
			
			<div class="interim-form">
				<div class="interim-header"><h3>Contact Information</h3></div>
				<div class="row" style="margin-left:1px"> <!-- titles -->									
					<span style="line-height:35px;" id="hd_group">Account Group Type</span>
					<span style="line-height:35px;"id="hd_url">URL of Your Existing Website</span>
				</div> <!-- end row -->
				<div class="row" style="margin-left:1px"> <!-- inputs -->
				        <input id="group" type="text" name="gtype" value="<? echo  $club_type;?>" required>
				        <input style="width:300px;" id="url" type="url" name="url" value="<? echo $url; ?>" required>
				</div> <!-- end row -->			
				<table>
	                            	<tr>
	                                	<td id="td_1">
							<div class="row"> <!-- titles -->
							<!-- Physical Address -->
								<!--<span style="line-height:35px;" id="hd_address1">Address 1</span>-->
							</div> <!-- end row -->
							<div class="row"> <!-- inputs -->
								<!--<input id="address1" type="text" name="address1" value="<? echo $address1; ?>" required>-->
							</div> <!-- end row -->
							<div class="row">
                        		<!--<span style="line-height:35px;" id="hd_address2">Address 2</span>-->
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
								<!--<input id="city" type="text" name="city" value="<? echo $city; ?>" required>
								<select id="state" name="state">
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
								<input id="zip" type="text" name="zip" value="<? echo $zip; ?>" maxlength="5" required>-->
							<!-- Physical Address End -->
							</div> <!-- end row -->
							<div class="row" style="margin-left:1px"> <!-- title -->
                           		 			<span style="line-height:35px;" id="hd_wphone">Primary Phone</span>
                           		 			<span style="line-height:35px;" id="hd_ext">Ext</span>
										</div> <!-- end row -->
                            				<div class="row" style="margin-left:1px">
                           		 			<input id="wphone1" type="text" name="phone" value="<?php echo $rowY['homePhone'];?>" maxlength="14"><!--<input id="wphone2" type="text" name=""><input id="wphone3" type="text" name="">-->
											<input id="ext" type="text" name="ext" value="<?php echo $rowY['workPhoneExt'];?>" maxlength="5">
										</div> <!-- end row -->
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

			
					
				<div class="interim-form"> <!-- payment tab -->
					<br>
					<div class="interim-header"><h2>2 Simple Steps for Payment</h2></div>
    					<hr style="border-color:#b8b8b8;">
					<h3>1. PayPal Information</h3>
					<p>Please enter your new or existing PayPal information. All funds are paid next day into your PayPal account. If you prefer, we can set up your PayPal account for you.</p>
					<div class="row" style="margin-left:1px"> <!-- title -->
						<span style="line-height:35px;" id="hd_ppemail">PayPal Email</span>
					</div> <!-- end row -->
					<div class="row" style="margin-left:1px"> <!-- input -->
						<input id="paypalemail" type="email" name="paypalemail" value="<? echo $pay; ?>" required>
					</div> <!-- end row -->
					
					<br>
					
					<h3 style="line-height:30px;">2. Fund Distribution and Tax Information<br>
					&nbsp;&nbsp;&nbsp;&nbsp;Fundraiser Account Funds: 35%</h3>
					<p>One of the following numbers is required for distribution of funds and also for tax purposes.</p>
					<div class="row" style="margin-left:1px"> <!-- titles -->
						<span style="line-height:35px;" id="hd_ssn">SSN</span>
						<span style="line-height:35px;" style="line-height:35px;" id="hd_ftin">Fed-TIN</span>
						<span style="line-height:35px;" id="hd_stin">State-TIN</span>
						<span style="line-height:35px;" id="hd_nonp">501(c)(3)</span>
					</div> <!-- end row -->
					<div class="row" style="margin-left:1px"> <!-- inputs -->
						<input id="ssn1" type="text" name="ssn1" value="<? echo $ssnY;?>"><!--<input id="ssn2" type="text" name="ssn2"><input id="ssn3" type="text" name="ssn3">-->
						<input id="ftin1" type="text" name="ftin1" value="<? echo $fed;?>"><!--<input id="ftin2" type="text" name="ftin2">-->
						<input id="stin1" type="text" name="stin1" value="<? echo $stx;?>"><br><br><!--<input id="stin2" type="text" name="stin2">-->
						<input id="nonp1" type="text" name="nonp1" value="<? echo $threeC;?>"><!--<input id="nonp2" type="text" name="nonp2">-->
					</div> <!-- end row -->

				</div> <!-- end tab3 content (payment) -->
					<br>
				<div class="interim-form"> <!-- social media tab4 -->
					<div class="interim-header"><h2>Social Media Connections</h2></div>
    					<hr style="border-color:#b8b8b8;">
					<div class="row" style="margin-left:1px"> 
						<span style="line-height:35px;padding-left:5px;" id="hd_fb" title="Facebook Name or Profile URL">Facebook</span>
						&nbsp;<input style="width:200px;" type="url" id="fb"  name="fb" value="<? echo $face; ?>" placeholder="www.facebook.com/user">&nbsp;http://
					</div> <!-- end row -->
					<br>
					<div class="row" style="margin-left:1px"> 
						<span style="line-height:35px;padding-left:5px;" id="hd_tw" title="Twitter Username or Profile URL">Twitter</span>
						&nbsp;<input style="width:200px;" type="url" id="tw" name="twitter" value="<? echo $twitter; ?>" placeholder="www.twitter.com/user">&nbsp;http://
					</div> <!-- end row -->
					<!--<div class="row">  
						<span id="hd_li" title="LinkedIn Username or Profile URL">LinkedIn</span>
						&nbsp;&nbsp;&nbsp;&nbsp;<input type="url" id="li" name="lindkedin" value="">-->
					</div> <!-- end row -->
					<!--<div class="row"> 
						<span id="hd_pn" title="Pintrest Username or Profile URL">Pintrest</span>
						&nbsp;&nbsp;&nbsp;&nbsp;<input type="url" id="pn" name="printrest" value="<? echo $twitter; ?>">
					</div>--> <!-- end row -->
					<!--<div class="row">
						<span id="hd_gp" title="Google+ Username or Profile URL">Google+</span>
						&nbsp;&nbsp;&nbsp;&nbsp;<input type="url" id="gp" name="googleplus" value="">
					</div>--> <!-- end row -->
				</div> <!-- end tab4 content (social media) -->
				
				<br>
			
		<div id="row"> <!-- submit row -->
			<a href="reasons.php?group=<?echo $fundraiserid;?>">
		         <input name="setup_person" type="hidden" value="<?php echo $userID;?>">
		         <input name="groupID" type="hidden" value="<?php echo $fundraiserid;?>"> 
		         <input name="submit" type="submit" class="redbutton" value="Save and Continue to Reasons">
		</div> <!-- end row -->
</div>
		<br>
        </form>
          </div> <!--end content -->
 	    </div>
    </div> 
</div> <!--end container-->
    
<?php include 'footer.php' ; ?>

</body>
</html>
<!--<pre>
<?php if ($_POST && $mailSent){
	echo htmlentities($message, ENT_COMPAT, 'UTF-8')."\n";
	echo 'Headers: '.htmlentities($headers, ENT_COMPAT, 'UTF-8');
} ?>
</pre>-->
<?php
   ob_end_flush();
?>