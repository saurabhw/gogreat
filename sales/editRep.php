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
            header('Location: ../../index.php');
            exit;
       }
       if($_SESSION['freeze'] == "TRUE")
       {
          // echo "Account Frozen";
           header('Location: accountEdit.php');
       }
       
      $userID = $_SESSION['userId'];
      $rep = $_GET['rep'];
     
      $rep = trim($rep);
      $table = "user_info";
      $table2 = "representatives";
      $table3 = "distributors";
      $check = editRepSC($userID, $rep);
      if($check !== 2)
       {
          //not authorized to edit account. Or url query string manipulation";
           header('Location: ../logout.php');
       }
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
	   $ftax = mysqli_real_escape_string($link, $_POST['ftin1']);
	   $stax = mysqli_real_escape_string($link, $_POST['stin1']);
	   $threeC = mysqli_real_escape_string($link, $_POST['nonp1']);
	   $title = mysqli_real_escape_string($link, $_POST['title']);
	   $gender = mysqli_real_escape_string($link, $_POST['gender']);
	   $ext = mysqli_real_escape_string($link, $_POST['ext']);
	   $imageDirPath = $_SERVER['DOCUMENT_ROOT'].'/images/representatives/';
	   $rpPhoto = $_FILES['uploaded_file']['tmp_name'];
	   $rpPicPath = "";
	   $rep = $_GET['rep'];
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
					$imagePath = "images/representatives/".$id."/".$cleanedPic;
				} else {
					$picDirectory = $baseDirPath;
					
					
					if (!is_dir($picDirectory.$id)){
						mkdir($picDirectory.$id);
						
					}
					$picDirectory = $picDirectory.$id."/";
					move_uploaded_file($tmpPic, $picDirectory . $cleanedPic);
					$upload_msg .= "$cleanedPic uploaded.<br />";
					$imagePath = "images/representatives/".$id."/".$cleanedPic;
					
					
				}// end third inner else
				return $imagePath;
			} // end first inner else
		      } // end else
	     }// end process_image
	     
	   
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
  				fbPage = '$face',
  				twitter = '$twitter',
  				linkedin = '$linkedin',
  				workPhone = '$hp',
  				workPhoneExt = '$ext',
  				userPaypal = '$ppal',
  				fedtin = '$ftax',
  				statetin = '$stax',
  				threec = '$threeC',
  				title = '$title',
  				gender = '$gender'
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
  				homePhone = '$hp',
  				fbPage = '$face',
  				twitter = '$twitter',
  				linkedin = '$linkedin',
  				salesPerson = '$userID',
  				workPhone = '$hp',
   				payPal = '$ppal',
   				fedtin = '$ftax',
   				statetin = '$stax',
   				threec = '$threeC'						
  				WHERE loginid ='$who'";
  	$result3 = mysqli_query($link, $query3)or die("MySQL ERROR: ".mysqli_error($link));
  	
  	$query4 = "UPDATE $table3 SET
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
  	                        workPhone = '$hp',
  	                        workPhoneExt = '$ext',
  	                        paypal = '$ppal',
  	                        title = '$title',
  	                        gender = '$gender'
  				WHERE email ='$email'";
  	$result4 = mysqli_query($link, $query4)or die("MySQL ERROR: ".mysqli_error($link));

  	if($result2 && $result3 && $result4)
  	{
  	   
  	   if($rpPhoto != ''){
		$rpPicPath = process_image('uploaded_file',$rep, $rpPhoto, $imageDirPath);
		if($rpPicPath !=''){
			$photoQuery = "UPDATE representatives SET repPicPath = '$rpPicPath' WHERE loginid = '$who'";
			 mysqli_query($link, $photoQuery)or die("MySQL ERROR upload error 1: ".mysqli_error($link));
			 
			 $photoQuery1 = "UPDATE distributors SET distPicPath = '$rpPicPath' WHERE loginid = '$who'";
			 mysqli_query($link, $photoQuery1)or die("MySQL ERROR upload error 3: ".mysqli_error($link));
			
			 $photoQuery2 = "UPDATE user_info SET picPath = '$rpPicPath' WHERE userInfoID = '$who'";
			 mysqli_query($link, $photoQuery2)or die("MySQL ERROR: upload error 2 ".mysqli_error($link));
			}
		}    
  	   
  	    $redirect = "Location: viewReps.php?rep=$who";
  	    header("$redirect");
  	}
  		
 	
  	}
  
   
   
   $myQuery = "SELECT * FROM user_info 	WHERE userInfoID='$userID'";
   $myResult = mysqli_query($link, $myQuery)or die ("couldn't execute query.".mysql_error($link));
   $myRow = mysqli_fetch_assoc($myResult); 
   $myPic = $myRow['picPath'];
   
   $query = "SELECT * FROM distributors WHERE loginid='$rep' AND setupID = '$userID'";
   $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error());
   /*
   $row = mysqli_fetch_assoc($result);
   $repID = $row['ID'];
   $cn = $row['companyName'];
   $fn = $row['FName'];
   $mn = $row['MName'];
   $ln = $row['LName'];
   $sn = $row['ssn'];
   $a1 = $row['address1'];
   $a2 = $row['address2'];
   $ct = $row['city'];
   $st = $row['state'];
   $zp = $row['zip'];
   $email = $row['email'];
   $hp = $row['workPhone'];
   $cp = $row['cellPhone'];
   $fb = $row['fbPage'];
   $tw = $row['twitter'];
   $li = $row['linkedin'];
   $ppal = $row['paypal'];
   $tt = $row['title'];
   $gd = $row['gender'];
   */
   
   $coord = $_GET['rep'];
   $getCoord = "SELECT * FROM user_info WHERE userInfoId = '$coord'";
   $cResult = mysqli_query($link, $getCoord)or die ("couldn't execute query coordinator.".mysqli_error($link));
   $row3 = mysqli_fetch_assoc($cResult);
   $cn = $row3['companyName'];
   $fn = $row3['FName'];
   $mn = $row3['MName'];
   $ln = $row3['LName'];
   $sn = $row3['ssn'];
   $a1 = $row3['address1'];
   $a2 = $row3['address2'];
   $ct = $row3['city'];
   $st = $row3['state'];
   $zp = $row3['zip'];
   $email = $row3['email'];
   $hp = $row3['workPhone'];
   $cp = $row3['cellPhone'];
   $fb = $row3['fbPage'];
   $tw = $row3['twitter'];
   $li = $row3['linkedin'];
   $ppal = $row3['userPaypal'];
   $tt = $row3['title'];
   $gd = $row3['gender'];
   $pic = $row3['picPath'];
   
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
    <h2 align="center">Edit <? echo $fn.' '.$ln;?>'s Account</h2>
  
        <div id="border">
        <div class="table" class="">
		<form class="" method="post" action="<?php echo htmlspecialchars(basename($_SERVER['PHP_SELF'])); ?>" enctype="multipart/form-data">
		
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
				<div class="tablerow"> <!-- titles -->
				        <span id="hd_cname">Company</span>									
					<span id="hd_fname">First</span>
					
					<span id="hd_lname">Last</span>
					<!--<span id="hd_pname" title="Preferred First Name">Preferred</span>
                            		<span id="hd_title">Title</span>-->
				</div> <!-- end row -->
				<div class="tablerow"> <!-- inputs -->
				        <input id="cname" type="text" name="company" value="<?php echo $cn;?>">
					<input id="fname" type="text" name="fname" value="<?php echo $row3['FName'];?>" required>
					
					<input id="lname" type="text" name="lname" value="<?php echo $row3['LName'];?>" required>
					<div class="tablerow"> <!-- titles -->
				        <span id="hd_cname">Title</span>									
					<span id="hd_cname">Gender</span>
					
					<!--<span id="hd_pname" title="Preferred First Name">Preferred</span>
                            		<span id="hd_title">Title</span>-->
				</div> <!-- end row -->
    					<select name="title">
						<option value="<? echo $tt;?>"><? echo $tt;?></option>
						<option value="Mr.">Mr.</option>
						<option value="Ms.">Ms.</option>
						<option value="Mrs.">Mrs.</option>
						<option value="Miss">Miss</option>
						<option value="Dr.">Dr.</option>
					</select>
					<select name="gender">
						<option value="<? echo $gd;?>"><? echo $gd;?></option>
						<option value="Male">Male</option>
						<option value="Female">Female</option>
						
					</select>
				</div> <!-- end row -->
								
				<table class="table table-bordered table-striped">
	                            	<tr>
	                                	<td id="td_1">
							<div class="tablerow"> <!-- titles -->
								<span id="hd_address1">Address 1</span>
							</div> <!-- end row -->
							<div class="tablerow"> <!-- inputs -->
								<input id="address1" type="text" name="address1" value="<?php echo $row3['address1'];?>" required>
							</div> <!-- end row -->
							<div class="tablerow">
                        		<span id="hd_address2">Address 2</span>
                        	</div> <!-- end row -->
			                <div class="tablerow">
			                    <input id="address2" type="text" name="address2" value="<?php echo $row3['address2'];?>">
			                </div> <!-- end row -->
							<div class="tablerow"> <!-- titles -->
								<span id="hd_city">City</span>
								<span id="hd_state">State</span>
								<span id="hd_zip">Zip</span>
							</div> <!-- end row -->
							<div class="tablerow"> <!-- inputs -->
								<input id="city" type="text" name="city" value="<?php echo $row3['city'];?>" required>
								<select id="state" name="state" required>
								<option value="" selected="selected">--</option>
								<option value="<?php echo $row3['state']; ?>" selected="selected"><?php echo $row3['state']; ?></option>
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
								<input id="zip" type="text" name="zip" value="<?php echo $row3['zip'];?>" maxlength="5" required>
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
                           		 			<input id="phone" type="text" name="phone" value="<?php echo $row3['workPhone'];?>"><!--<input id="wphone2" type="text" name=""><input id="wphone3" type="text" name="">-->
											<input id="ext" type="text" name="ext" value="<?php echo $row3['workPhoneExt'];?>" maxlegth="5" >
										</div> <!-- end row -->
                        			</td>
                        		</tr>
                      		</table>
			</div> <!-- end tab1 content -->
			
			 <!-- end tab2 content (account login) -->
					
				<div class="interim-form"> <!-- payment tab -->
					<div class="interim-header"><h3>3 Simple Steps for Payment</h3></div>
					<h3>1. PayPal Information</h3>
					<p>Please enter your new or existing PayPal information. All commissions are paid next day into your PayPal account. If you prefer, we can set up your PayPal account for you.</p>
					<div class="tablerow"> <!-- title -->
						<span id="hd_ppemail">PayPal Email</span>
					</div> <!-- end row -->
					<div class="tablerow"> <!-- input -->
						<input id="ppemail" type="email" name="paypalemail" value="<? echo $ppal;?>" required>
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
						<input id="ssn1" type="text" name="ssn1" value="<? echo $row3['ssn'];?>"><!--<input id="ssn2" type="text" name="ssn2"><input id="ssn3" type="text" name="ssn3">-->
						<input id="ftin1" type="text" name="ftin1" value="<? echo $row3['fedtin'];?>"><!--<input id="ftin2" type="text" name="ftin2">-->
						<input id="stin1" type="text" name="stin1" value="<? echo $row3['statetin'];?>"><!--<input id="stin2" type="text" name="stin2">-->
						<input id="nonp1" type="text" name="nonp1" value="<? echo $row3['threec'];?>"><!--<input id="nonp2" type="text" name="nonp2">-->
					</div> <!-- end row -->
					
					<br>
					
					<h3>3. 1099 Form</h3>
					<p>Explanation about 1099 Form <a href="https://turbotax.intuit.com/tax-tools/tax-tips/Self-Employment-Taxes/What-is-an-IRS-1099-Form-/INF14810.html">here</a>.<br>
					Go here to get your official copy of a 1099 form:  <a href="">http://www.irs.gov/Forms-&-Pubs</a></p>
					<br>
					<h3>Sales Coordinator Total Commission Override: 1%</h3>
				</div> <!-- end tab3 content (payment) -->
					
				<div class="interim-form"> <!-- social media tab4 -->
					<div class="interim-header"><h3>Social Media Connections</h3></div>
					<div class="tablerow"> 
						<span id="hd_fb" title="Facebook Name or Profile URL">Facebook</span>
						<input type="url" id="fb"  name="fb" value="<? echo $fb;?>" placeholder="www.facebook.com/user">
					</div> <!-- end row -->
					<br>
					<div class="tablerow"> 
						<span id="hd_tw" title="Twitter Username or Profile URL">Twitter</span>
						<input type="url" id="tw" name="tw" value="<? echo $tw;?>" placeholder="www.twitter.com/user">
					</div> <!-- end row -->
					<br>
					<div class="tablerow"> 
						<span id="hd_li" title="LinkedIn Username or Profile URL">LinkedIn</span>
						<input type="url" id="li" name="li" value="<? echo $li;?>" placeholder="www.linkedin.com/user">
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
				<div class="interim-header"><h3>Profile Photo</h3></div>
				<div class="tablerow"> 
					<span>Upload Profile Photo:</span>
					<input type="file" name="uploaded_file">
					
				</div> <!-- end row -->
				<br>
				<div class="tablerow"> 
					<span>Current Image:<span><br>
					<img src="../<?php echo $pic; ?>" alt="Profileashbdbhdfbhdfbdfb Pic">
				</div> <!-- end row -->
			</div> <!-- end tab5 content -->
		</div> <!-- end simple tabs -->	
		
		<div id="row"> <!-- submit row -->
		<br>
			<input type="hidden" name="gp" value="<?echo $rep; ?>" />
			<input type="submit" name="submit" class="redbutton" value="Save Changes" />
			<!--<a href="commission.php"><input type="button" value="Split Commission" title="Click to Split Your Commission"/></a>-->
		</div> <!-- end row -->
		<br>
        </form>
        </div><!--end border-->
   </div> <!--end content-->
</div>
     <?php include 'footer.php' ; ?>
    </div> <!--end container-->

</body>
</html>

<?php
   ob_end_flush();
?>