<?
   session_start();
   if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../../index.php');
            exit;
       }

   //include($_SERVER['DOCUMENT_ROOT'].'/includes/connection.inc.php');
    include('../includes/connection.inc.php');
   $link = connectTo();
   $table = "user_info";
   $table2 = "representatives"; 
   $table3 = "users";
   if(isset($_POST['submit'])){
	   //$groupName = mysqli_real_escape_string($link, $groupName);
	   $company = mysqli_real_escape_string($link, $_POST['company']);
	   $Fname = mysqli_real_escape_string($link, $_POST['firstname']);
	   $Lname = mysqli_real_escape_string($link, $_POST['lastname']);
	   $address1 = mysqli_real_escape_string($link, $_POST['address1']);
	   $address2 = mysqli_real_escape_string($link, $_POST['address2']);
	   $city = mysqli_real_escape_string($link, $_POST['city']);
	   $state = mysqli_real_escape_string($link, $_POST['state']);
	   $zip = mysqli_real_escape_string($link, $_POST['zip']);
	   $em = mysqli_real_escape_string($link, $_POST['email']);
	   $hp = mysqli_real_escape_string($link, $_POST['hphone']);
	   $cell = mysqli_real_escape_string($link, $_POST['cell']);
	   $ppal = mysqli_real_escape_string($link, $_POST['paypalemail']);
	   $face = mysqli_real_escape_string($link, $_POST['face']);
	   $twitter = mysqli_real_escape_string($link, $_POST['twit']);
	   $linkedin = mysqli_real_escape_string($link, $_POST['linked']);
	   $ss = mysqli_real_escape_string($link, $_POST['ssn']);
	   $who = mysqli_real_escape_string($link, $_POST['gp']);
	   
	   $query2 = "UPDATE $table SET
  				companyName = '$company',
  				FName = '$Fname',
  				LName = '$Lname',
  				ssn = '$ss',
  				address1 = '$address1',
  				address2 = '$address2',
  				city = '$city',
  				state = '$state',
  				zip = '$zip',
  				email = '$em',
  				homePhone = '$hp',
  				fbPage = '$face',
  				twitter = '$twitter',
  				linkedin = '$linkedin',
  				cellPhone = '$cell',
  				userPaypal = '$ppal'
  				WHERE userInfoID ='$who'";
  	$result2 = mysqli_query($link, $query2)or die("MySQL ERROR: ".mysqli_error($link)); 
  	
  	//update rep table
  	$query3 = "UPDATE $table2 SET
  	                        companyname = '$company',
  				FName = '$Fname',
  				LName = '$Lname',
  				ssn = '$ss',
  				address1 = '$address1',
  				address2 = '$address2',
  				city = '$city',
  				state = '$state',
  				zip = '$zip',
  				email = '$em',
  				homePhone = '$hp',
  				fbPage = '$face',
  				twitter = '$twitter',
  				linkedin = '$linkedin'
  				WHERE loginid ='$who'";
  	$result3 = mysqli_query($link, $query3)or die("MySQL ERROR: ".mysqli_error($link));
  	
  	$query4 = "UPDATE $table3 SET
  	                        username = '$em'
  				WHERE username ='$email'";
  	$result4 = mysqli_query($link, $query4)or die("MySQL ERROR: ".mysqli_error($link));
  				
  	if($result2 && $result3 && $result4)
  	{
  	    $redirect = "Location:../viewReps.php?rep=$who";
  	    header("$redirect");
  	}
  		
 	
  	}
   //$rep = $_GET['rep'];
   $userID = $_SESSION['userId'];
   $query = "SELECT * FROM $table WHERE userInfoID='$userID'";
   $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error());
   $row = mysqli_fetch_assoc($result);
   $myPic = $row['picPath'];
 
   
?>
<!DOCTYPE html>
<head>
	<title>Edit Representative Account | Sales Coordinator</title>
</head>
	
<body>
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <?php include 'sidenav.php' ; ?>

<div id="content">
    <h1>Edit <? echo $fn.'&nbsp;'.$ln;?>s Account</h1>
    <h3>Representative</h3>
        
        <div class="table" class="">
		<form class="" method="post" action="" enctype="multipart/form-data">
		
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
				        <span id="hd_cname">Company</span>									
					<span id="hd_fname">First</span>
					<span id="hd_mname">Middle</span>
					<span id="hd_lname">Last</span>
					<!--<span id="hd_pname" title="Preferred First Name">Preferred</span>
                            		<span id="hd_title">Title</span>-->
				</div> <!-- end row -->
				<div class="tablerow"> <!-- inputs -->
				        <input id="cname" type="text" name="company" value="<?php echo $row['companyName'];?>">
					<input id="fname" type="text" name="fname" value="<?php echo $row['FName'];?>">
					<input id="mname" type="text" name="mname" value="<?php echo $row['MName'];?>">
					<input id="lname" type="text" name="lname" value="<?php echo $row['LName'];?>">
					<!--<input id="pname" type="text" name="" value="<?php echo $row['FName'];?>">
    					<select name="salu">
						<option value="">---</option>
						<option value="">Mr.</option>
						<option value="">Ms.</option>
						<option value="">Mrs.</option>
						<option value="">Miss</option>
						<option value="">Dr.</option>
					</select>-->
				</div> <!-- end row -->
								
				<table>
	                            	<tr>
	                                	<td id="td_1">
							<div class="tablerow"> <!-- titles -->
								<span id="hd_address1">Address 1</span>
							</div> <!-- end row -->
							<div class="tablerow"> <!-- inputs -->
								<input id="address1" type="text" name="address1" value="<?php echo $row['address1'];?>">
							</div> <!-- end row -->
							<div class="tablerow">
                        		<span id="hd_address2">Address 2</span>
                        	</div> <!-- end row -->
			                <div class="tablerow">
			                    <input id="address2" type="text" name="address2" value="<?php echo $row['address2'];?>">
			                </div> <!-- end row -->
							<div class="tablerow"> <!-- titles -->
								<span id="hd_city">City</span>
								<span id="hd_state">State</span>
								<span id="hd_zip">Zip</span>
							</div> <!-- end row -->
							<div class="tablerow"> <!-- inputs -->
								<input id="city" type="text" name="city" value="<?php echo $row['city'];?>">
								<select id="state" name="State">
									<option value="" selected="selected">--</option>
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
								<input id="zip" type="text" name="" value="<?php echo $row['zip'];?>">
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
                           		 			<span id="ext">Ext</span>
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
					<div class="interim-header"><h2>Create Your Account Login</h2></div>
					<div class="tablerow"> <!-- title -->
						<span id="hd_loginemail">Email Address</span>
					</div> <!-- end row -->
					<div class="tablerow"> <!-- input -->
						<input id="loginemail" type="text" name="email" value="<? echo $email;?>">
					</div> <!-- end row -->
					
					<div class="tablerow"> <!-- titles -->
					<span id="hd_password">Password</span>
					<span id="hd_cpassword">Confirm Password</span>
					</div> <!-- end row -->
					<div class="tablerow"> <!-- inputs -->
						<input id="password" type="password" name="password">
						<input id="cpassword" type="password" name="cpassword">
					</div> <!-- end row -->
				</div> <!-- end tab2 content (account login) -->
					
				<div class="interim-form"> <!-- payment tab -->
					<div class="interim-header"><h2>3 Simple Steps for Payment</h2></div>
					<h3>1. PayPal Information</h3>
					<p>Please enter your new or existing PayPal information. All commissions are paid next day into your PayPal account. If you prefer, we can set up your PayPal account for you.</p>
					<div class="tablerow"> <!-- title -->
						<span id="hd_ppemail">PayPal Email</span>
					</div> <!-- end row -->
					<div class="tablerow"> <!-- input -->
						<input id="paypalemail" type="email" name="paypalemail" value="<? echo $pp;?>">
					</div> <!-- end row -->
					
					<br>
					
					<h3>2. Fund Distribution and Tax Information</h3>
					<p>One of the following numbers is required for distribution of funds and also for tax purposes.</p>
					<div class="tablerow"> <!-- titles -->
						<span id="hd_ssn">SSN</span>
						<span id="hd_ftin">Fed-TIN</span>
						<span id="hd_stin">State-TIN</span>
						<span id="hd_nonp">501(c)(3)</span>
					</div> <!-- end row -->
					<div class="tablerow"> <!-- inputs -->
						<input id="ssn1" type="text" name="ssn1" value="<? echo $txin;?>"><!--<input id="ssn2" type="text" name="ssn2"><input id="ssn3" type="text" name="ssn3">-->
						<input id="ftin1" type="text" name="ftin1" value="<? echo $stxin;?>"><!--<input id="ftin2" type="text" name="ftin2">-->
						<input id="stin1" type="text" name="stin1" value="<? echo $txinFive;?>"><!--<input id="stin2" type="text" name="stin2">-->
						<input id="nonp1" type="text" name="nonp1" value="<? echo $sn;?>"><!--<input id="nonp2" type="text" name="nonp2">-->
					</div> <!-- end row -->
					
					<br>
					
					<h3>3. 1099 Form</h3>
					<p>Explanation about 1099 Form <a href="https://turbotax.intuit.com/tax-tools/tax-tips/Self-Employment-Taxes/What-is-an-IRS-1099-Form-/INF14810.html">here</a>.<br>
					Go here to get your official copy of a 1099 form:  <a href="">http://www.irs.gov/Forms-&-Pubs</a></p>
					<br>
					<h3>Sales Coordinator Total Commission Override: 1%</h3>
				</div> <!-- end tab3 content (payment) -->
					
				<div class="interim-form"> <!-- social media tab4 -->
					<div class="interim-header"><h2>Social Media Connections</h2></div>
					<div class="tablerow"> 
						<span id="hd_fb" title="Facebook Name or Profile URL">Facebook</span>
						<input type="url" id="fb"  name="fb" value="<? echo $fb;?>" placeholder="www.facebook.com/user">
					</div> <!-- end row -->
					<br>
					<div class="tablerow"> 
						<span id="hd_tw" title="Twitter Username or Profile URL">Twitter</span>
						<input type="url" id="tw" name="twitter" value="<? echo $tw;?>" placeholder="www.twitter.com/user">
					</div> <!-- end row -->
					<br>
					<div class="tablerow"> 
						<span id="hd_li" title="LinkedIn Username or Profile URL">LinkedIn</span>
						<input type="url" id="li" name="lindkedin" value="<? echo $li;?>" placeholder="www.linkedin.com/user">
					</div> <!-- end row -->
					<!--<div class="tablerow"> 
						<span id="hd_pn" title="Pintrest Username or Profile URL">Pintrest</span>
						<input type="url" id="pn" name="printrest" value="">
					</div>--> <!-- end row -->
					<!--<div class="tablerow">
						<span id="hd_gp" title="Google+ Username or Profile URL">Google+</span>
						<input type="url" id="gp" name="googleplus" value="">
					</div>--> <!-- end row -->
				</div> <!-- end tab4 content (social media) -->
				
			<div class="interim-form">
				<div class="interim-header"><h2>Profile Photo</h2></div>
				<div class="tablerow"> 
					<span>Upload Profile Photo:</span><input type="file">
					<input type="submit" class="redbutton" value="Upload Photo">
				</div> <!-- end row -->
				<br>
				<div class="tablerow"> 
					<span>Current Image:<span><br>
					<img src="../<?php echo $row['picPath']; ?>" alt="Profile Pic">
				</div> <!-- end row -->
			</div> <!-- end tab5 content -->
		</div> <!-- end simple tabs -->	
		
		<div id="row"> <!-- submit row -->
			<input type="hidden" name="gp" value="<?echo $userID; ?>" />
			<input type="submit" name="submit" class="redbutton" value="Save Changes" />
			<!--<a href="commission.php"><input type="button" value="Split Commission" title="Click to Split Your Commission"/></a>-->
		</div> <!-- end row -->
		<br>
        </form>
        </div> <!-- end table -->
   </div> <!--end content-->

     <?php include '../footer.php' ; ?>
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