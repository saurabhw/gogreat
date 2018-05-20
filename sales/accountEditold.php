<?php

   session_start(); // session start
   ob_start();
   ini_set('display_errors', '0'); // errors reporting on
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
  
   
   $table = "user_info";
   $table1 = "users";
   $userID = $_SESSION['userId'];
   if(isset($_POST['submit'])){
	   //$groupName = mysqli_real_escape_string($link, $groupName);
	   $company = mysqli_real_escape_string($link, $_POST['company']);
	   $Fname = mysqli_real_escape_string($link, $_POST['fname']);
	   $Lname = mysqli_real_escape_string($link, $_POST['lname']);
	   $address1 = mysqli_real_escape_string($link, $_POST['address1']);
	   $address2 = mysqli_real_escape_string($link, $_POST['address2']);
	   $city = mysqli_real_escape_string($link, $_POST['city']);
	   $state = mysqli_real_escape_string($link, $_POST['state']);
	   $zip = mysqli_real_escape_string($link, $_POST['zip']);
	   $em = mysqli_real_escape_string($link, $_POST['email']);
	   $hp = mysqli_real_escape_string($link, $_POST['phone']);
	   $cell = mysqli_real_escape_string($link, $_POST['cell']);
	   $ppal = mysqli_real_escape_string($link, $_POST['paypalemail']);
	   $face = mysqli_real_escape_string($link, $_POST['fb']);
	   $twitter = mysqli_real_escape_string($link, $_POST['tw']);
	   $linkedin = mysqli_real_escape_string($link, $_POST['li']);
	   $ss = mysqli_real_escape_string($link, $_POST['ssn1']);
	   $who = mysqli_real_escape_string($link, $_POST['gp']);
	   $tin = mysqli_real_escape_string($link, $_POST['ftin1']);
	   $stin = mysqli_real_escape_string($link, $_POST['stin1']);
	   $title = mysqli_real_escape_string($link, $_POST['title']);
	   $gender = mysqli_real_escape_string($link, $_POST['gender']);
	   $ext = mysqli_real_escape_string($link, $_POST['ext']);
	   $fiveZeroOne = mysqli_real_escape_string($link, $_POST['nonp1']);
	   $imageDirPath = $_SERVER['DOCUMENT_ROOT'].'/images/sc/';
	   $scPhoto = $_FILES['uploaded_file']['tmp_name'];
	   $scPicPath = "";
	   //$rep = $_GET['rep'];
	   function process_image($name, $id, $tmpPic, $baseDirPath){

		$cleanedPic = checkName($_FILES["$name"]["name"]);	
		if(!is_image($tmpPic)) {
    			// is not an image
    			$upload_msg .= $cleanedPic . " is not an image file. <br />";
    		} else {
    			if($_FILES['$name']['error'] > 0) {
				$upload_msg .= $_FILES['$name']['error'] . "<br />";
			} else {
				
				if (file_exists($baseDirPath.$id."/".$cleanedPic)){
					$imagePath = "images/sc/".$id."/".$cleanedPic;
				} else {
					$picDirectory = $baseDirPath;
					
					
					if (!is_dir($picDirectory.$id)){
						mkdir($picDirectory.$id);
						
					}
					$picDirectory = $picDirectory.$id."/";
					move_uploaded_file($tmpPic, $picDirectory . $cleanedPic);
					$upload_msg .= "$cleanedPic uploaded.<br />";
					$imagePath = "images/sc/".$id."/".$cleanedPic;
					
					
				}// end third inner else
				return $imagePath;
			} // end first inner else
		      } // end else
	     }
	     
	   
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
  				homePhone = '$hp',
  				fbPage = '$face',
  				twitter = '$twitter',
  				linkedin = '$linkedin',
  				cellPhone = '$cell',
  				workPhoneExt = '$ext',
  				userPaypal = '$ppal',
  				fedtin ='$tin',
  				statetin = '$stin',
  				threec = '$fiveZeroOne'
  				WHERE userInfoID = '$who'";
  	$result2 = mysqli_query($link, $query2)or die("MySQL ERROR: ".mysqli_error($link));
  	
  	 $query3 = "UPDATE distributors SET
  				companyName = '$company',
  				FName = '$Fname',
  				LName = '$Lname',
  				ssn = '$ss',
  				address1 = '$address1',
  				address2 = '$address2',
  				city = '$city',
  				state = '$state',
  				zip = '$zip',
  				homePhone = '$hp',
  				fbPage = '$face',
  				twitter = '$twitter',
  				linkedin = '$linkedin',
  				cellPhone = '$cell',
  				paypal = '$ppal'
  				WHERE userInfoID = '$who'";
  	$result3 = mysqli_query($link, $query3)or die("MySQL ERROR: query 3 ".mysqli_error($link));
  	/* 
  	$query4 = "UPDATE $table1 SET
  	                        username = '$em'
  				WHERE username ='$email'";
  	$result4 = mysqli_query($link, $query4)or die("MySQL ERROR: ".mysqli_error($link));
  	*/
  	if($result2 && $result3){
  	
  	    if($scPhoto != ''){
		$scPicPath = process_image('uploaded_file',$userID, $scPhoto, $imageDirPath);
		if($scPicPath !=''){
		
		$photoQuery = "UPDATE distributors SET distPicPath = '$scPicPath' WHERE userInfoID = '$userID'";
	        mysqli_query($link, $photoQuery)or die("MySQL ERROR upload error 1: ".mysqli_error($link));
		
		$photoQuery2 = "UPDATE user_info SET picPath = '$scPicPath' WHERE userInfoID = '$userID'";
		mysqli_query($link, $photoQuery2)or die("MySQL ERROR: upload error 2 ".mysqli_error($link));
			}
		}    
  	    $redirect = "Location:viewReps.php";
  	    header("$redirect");
  	}
  	
  	}
   $user_email = $_SESSION['email'];
   $query = "SELECT * FROM $table WHERE userInfoID='$userID'";
   $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysqli_error($link));
   $row = mysqli_fetch_assoc($result);
   $myPic = $row['picPath'];
   $txin = $row['fedtin'];
   
   $pp = $row['userPaypal'];
   $fb = $row['fbPage'];
   $tw = $row['twitter'];
   $li = $row['linkedin'];
   $fedtin = $row['fedtin'];
   $ph = $row['workPhone'];
   $stxin = $row['statetin'];
   $pp = $row['userPaypal'];
   $txinFive = $row['threec'];
   $ssn = $row['ssn'];
   $today = date("F j, Y, g:i a");
   
    if($pp !== "")
  	    {
  	        $_SESSION['freeze'] = "FALSE";
  	    }
  	    else
  	    {
  	        $_SESSION['freeze'] = "TRUE";
  	    }
?>

<!DOCTYPE html>
<head>
	<title>Edit My Account | Sales Coordinator</title>
</head>
	
<body>
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <?php include 'sidenav.php' ; ?>

<div id="content">
    <h1>Edit My Account</h1>
    <h3>Sales Coordinator</h3>
  
   	<div class="table">
		<form class="" method="post" action="accountEdit.php" enctype="multipart/form-data">
		
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
				<div class="row"> <!-- titles -->
				        <span id="hd_cname">Company</span>									
					<span id="hd_fname">First</span>
					<!--<span id="hd_mname">Middle</span>-->
					<span id="hd_lname">Last</span>
					<!--<span id="hd_pname" title="Preferred First Name">Preferred</span>-->
                            		<span id="hd_title">Title</span>
				</div> <!-- end row -->
				<div class="row"> <!-- inputs -->
				        <input id="cname" type="text" name="company" value="<?php echo $row['companyName'];?>">
					<input id="fname" type="text" name="fname" value="<?php echo $row['FName'];?>" required>
					<!--<input id="mname" type="text" name="mname" value="<?php echo $row['MName'];?>">-->
					<input id="lname" type="text" name="lname" value="<?php echo $row['LName'];?>" required>
					<!--<input id="pname" type="text" name="" value="<?php echo $row['FName'];?>">-->
    					<select name="title">
						<option value="<?php echo $row['title'];?>" selected><?php echo $row['title'];?></option>
						<option value="Mr.">Mr.</option>
						<option value="Ms.">Ms.</option>
						<option value="Mrs.">Mrs.</option>
						<option value="Miss">Miss</option>
						<option value="Dr.">Dr.</option>
						<option value="Rev.">Rev.</option>
					</select>
				</div> <!-- end row -->
								
				<table>
	                            	<tr>
	                                	<td id="td_1">
							<div class="row"> <!-- titles -->
								<span id="hd_address1">Address 1</span>
							</div> <!-- end row -->
							<div class="row"> <!-- inputs -->
								<input id="address1" type="text" name="address1" value="<?php echo $row['address1'];?>" required>
							</div> <!-- end row -->
							<div class="row">
                        					<span id="hd_address2">Address 2</span>
                        				</div> <!-- end row -->
			                <div class="row">
			                    <input id="address2" type="text" name="address2" value="<?php echo $row['address2'];?>">
			                </div> <!-- end row -->
							<div class="row"> <!-- titles -->
								<span id="hd_city">City</span>
								<span id="hd_state">State</span>
								<span id="hd_zip">Zip</span>
							</div> <!-- end row -->
							<div class="row"> <!-- inputs -->
								<input id="city" type="text" name="city" value="<?php echo $row['city'];?>" maxlength="30" required>
								<select id="state" name="state" required>
									<option value="<?php echo $row['state'];?>" selected><?php echo $row['state'];?></option>
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
								<input id="zip" type="text" name="zip" value="<?php echo $row['zip'];?>" maxlength="5" required>
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
										<div class="row"> <!-- title -->
                           		 			<span id="hd_wphone">Primary Phone</span>
                           		 			<span id="ext">Ext</span>
										</div> <!-- end row -->
                            				<div class="row">
                           		 			<input id="phone" type="text" name="phone" value="<?php echo $row['homePhone'];?>" maxlength="10"><!--<input id="wphone2" type="text" name=""><input id="wphone3" type="text" name="">-->
											<input id="ext" type="text" name="ext" value="<?php echo $row['workPhoneExt'];?>" maxlength="5">
										</div> <!-- end row -->
                        			</td>
                        		</tr>
                      		</table>
			</div> <!-- end tab1 content -->
			
				<div class="interim-form"> <!-- payment tab -->
					<div class="interim-header"><h2>3 Simple Steps for Payment</h2></div>
					<h3>1. PayPal Information</h3>
					<p>Please enter your new or existing PayPal information. All commissions are paid next day into your PayPal account. If you prefer, we can set up your PayPal account for you.</p>
					<div class="row"> <!-- title -->
						<span id="hd_ppemail">PayPal Email</span>
					</div> <!-- end row -->
					<div class="row"> <!-- input -->
						<input id="paypalemail" type="email" name="paypalemail" value="<? echo $pp;?>">
					</div> <!-- end row -->
					
					<br>
					
					<h3>2. Fund Distribution and Tax Information</h3>
					<p>One of the following numbers is required for distribution of funds and also for tax purposes.</p>
					<div class="row"> <!-- titles -->
						<span id="hd_ssn">SSN</span>
						<span id="hd_ftin">Fed-TIN</span>
						<span id="hd_stin">State-TIN</span>
						<span id="hd_nonp">501(c)(3)</span>
					</div> <!-- end row -->
					<div class="row"> <!-- inputs -->
						<input id="ssn1" type="text" name="ssn1" value="<? echo $ssn;?>"><!--<input id="ssn2" type="text" name="ssn2"><input id="ssn3" type="text" name="ssn3">-->
						<input id="ftin1" type="text" name="ftin1" value="<? echo $fedtin;?>"><!--<input id="ftin2" type="text" name="ftin2">-->
						<input id="stin1" type="text" name="stin1" value="<? echo $stxin;?>"><!--<input id="stin2" type="text" name="stin2">-->
						<input id="nonp1" type="text" name="nonp1" value="<? echo $txinFive; ?>"><!--<input id="nonp2" type="text" name="nonp2">-->
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
					<div class="row"> 
						<span id="hd_fb" title="Facebook Name or Profile URL">Facebook</span>
						<input type="url" id="fb"  name="fb" value="<? echo $fb;?>">
					</div> <!-- end row -->
					<br>
					<div class="row"> 
						<span id="hd_tw" title="Twitter Username or Profile URL">Twitter</span>
						<input type="url" id="tw" name="tw" value="<? echo $tw;?>">
					</div> <!-- end row -->
					<br>
					<div class="row"> 
						<span id="hd_li" title="LinkedIn Username or Profile URL">LinkedIn</span>
						<input type="url" id="li" name="li" value="<? echo $li;?>">
					</div> <!-- end row -->
					<!--<div class="row"> 
						<span id="hd_pn" title="Pintrest Username or Profile URL">Pintrest</span>
						<input type="url" id="pn" name="printrest" value="">
					</div>--> <!-- end row -->
					<!--<div class="row">
						<span id="hd_gp" title="Google+ Username or Profile URL">Google+</span>
						<input type="url" id="gp" name="googleplus" value="">
					</div>--> <!-- end row -->
				</div> <!-- end tab4 content (social media) -->
				
			<div class="interim-form">
				<div class="interim-header"><h2>Profile Photo</h2></div>
				<div class="row"> 
					<span>Upload Profile Photo:</span><input type="file" name="uploaded_file">
					
				</div> <!-- end row -->
				<br>
				<div class="row"> 
					<span>Current Image:</span><br>
					<img src="../<?php echo $row['picPath']; ?>" class="profilepicpreview" alt="Profile Picture Preview">
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
        </div>
        <?php
        //echo $_SESSION['freeze'];
         if($_SESSION['freeze'] == "TRUE")
         {
             echo '<br>
             <div class="container">
            
           <!-- <div style="background-color: #cc0000; color: #fff; padding: 6px;">
           Warning! A valid PayPal email address must be saved to continue. Once saved you must log out and log in again for the changes to update
          </div>-->
          <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><img src="../images/footer_logo.png" /></h4>
        </div>
        <div class="modal-body">
        <center><p><img src="../images/icons/warning-icon.png" /></p></center>
          <p><strong>No PayPal email address saved. Your account has been frozen. You must save your payment address to restore your account.</strong></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Okay</button>
          <br>
          
        </div>
      </div>
      
    </div>
  </div>
        </div>';
         }
        ?>
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