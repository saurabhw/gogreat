<?php
   include '../includes/autoload.php';
   if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "VP")
       {
            header('Location: ../index.php');
            exit;
       }
       if($_SESSION['freeze'] == "TRUE")
       {
          // echo "Account Frozen";
           header('Location: accountEdit.php');
       }
   $userID = $_SESSION['userId'];
   $coord = $_GET['coord'];
   $check = isMySalesperson($userID, $coord);
   if($check == 1)
   {
       header('Location: ../index.php');
       exit;
   }
   $table = "user_info"; 
   $table1 = "users";
   $table2 = "distributors";
   
  // $emx = $_SESSION['email'];
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
	   $twitter = mysqli_real_escape_string($link, $_POST['twitter']);
	   $linkedin = mysqli_real_escape_string($link, $_POST['lindkedin']);
	   $ss = mysqli_real_escape_string($link, $_POST['ssn']);
	   $stx = mysqli_real_escape_string($link, $_POST['stin1']);
	   $ftx = mysqli_real_escape_string($link, $_POST['ftin1']);
	   $np = mysqli_real_escape_string($link, $_POST['nonp1']);
	   $tt = mysqli_real_escape_string($link, $_POST['title']);
	   $gd = mysqli_real_escape_string($link, $_POST['gender']);
	   $ext = mysqli_real_escape_string($link, $_POST['ext']);
	 
	   $who = mysqli_real_escape_string($link, $_POST['gp']);
	   $imageDirPath = $_SERVER['DOCUMENT_ROOT'].'/images/representatives/';
	   $rpPhoto = $_FILES['uploaded_file']['tmp_name'];
	   $rpPicPath = "";
	   
	   $salt = time();
	   $loginPassx = sha1($loginPass.$salt);
	   
	   //$emx = mysqli_real_escape_string($link, $_POST['em']);
	   
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
	   if($rpPhoto != ''){
		$rpPicPath = process_image('uploaded_file',$userID, $rpPhoto, $imageDirPath);
		
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
  				workPhone = '$hp',
  				workPhoneExt = '$ext',
  				fbPage = '$face',
  				twitter = '$twitter',
  				linkedin = '$linkedin',
  				cellPhone = '$cell',
  				picPath = '$rpPicPath',
  				userPaypal = '$ppal',
  				fedtin = '$ftx',
  				statetin = '$stx',
  				title = '$tt',
  				gender = '$gd'
  				WHERE userInfoID = '$who'";
  	$result2 = mysqli_query($link, $query2)or die("MySQL ERROR: query2".mysqli_error($link));
  	
  	
  	
  	 $query4 = "UPDATE $table2 SET
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
  				vpID = '$userID',
  				workPhone = '$hp',
  				workPhoneExt = '$ext',
  				distPicPath = '$rpPicPath'
  				WHERE loginid = '$who' AND role = 'SC'";
  	$result4 = mysqli_query($link, $query4)or die("MySQL ERROR: query4 ".mysqli_error($link)); 
  	} 
  	else
  	{
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
  				workPhone = '$hp',
  				workPhoneExt = '$ext',
  				fbPage = '$face',
  				twitter = '$twitter',
  				linkedin = '$linkedin',
  				cellPhone = '$cell',
  				userPaypal = '$ppal',
  				fedtin = '$ftx',
  				statetin = '$stx',
  				threec = '$np',
  				title = '$tt',
  				gender = '$gd'
  				WHERE userInfoID = '$who'";
  	$result2 = mysqli_query($link, $query2)or die("MySQL ERROR: query2".mysqli_error($link));
  	
  	
  	 
  	 $query4 = "UPDATE $table2 SET
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
  				vpID = '$userID',
  				workPhone = '$hp',
  				workPhoneExt = '$ext'
  				WHERE loginid = '$who' AND role = 'SC'";
  	$result4 = mysqli_query($link, $query4)or die("MySQL ERROR: query4 ".mysqli_error($link)); 
  	}
  	
  	if($result2 && $result4){
  	    $redirect = "Location:accounts.php";
  	    header("$redirect");
  	}
  	
  }
   $userID = $_SESSION['userId'];
   $query = "SELECT * FROM $table WHERE userInfoID='$userID' and role='VP'";
   $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysqli_error($link));
   $row = mysqli_fetch_assoc($result);
   $pic = $row['picPath'];
   
   //get the sales coordinator data
   
   $getCoord = "SELECT * FROM user_info WHERE userInfoId = '$coord'";
   $cResult = mysqli_query($link, $getCoord)or die ("couldn't execute query coordinator.".mysqli_error($link));
   $row3 = mysqli_fetch_assoc($cResult);
   $cn = $row3['companyName'];
   
?>


<head>
	<title>Edit Sales Coordinator</title>
</head>
<body>
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <?php include 'sidenav.php' ; ?>
      
    <div id="content">    
    <h2 align="center">Edit Sales Coordinator</h2>
    <br>
    <div id="border">
	<div id="table">
        <form class="" action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post" id="myForm" name="myForm" onsubmit="return validate(this);" enctype="multipart/form-data">
		
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
				<div class="row"> <!-- titles -->
				        <span id="hd_cname">Company</span>									
					<span class="hd_fname">First</span>
					<!--<span id="hd_mname">Middle</span>-->
					<span class="hd_lname">Last</span>
                            		
                            		
				</div> <!-- end row -->
				<div class="row"> <!-- inputs -->
				        <input id="cname" type="text" name="company" value="<?php echo $cn;?>">
					<input id="fname" type="text" name="fname" value="<?php echo $row3['FName'];?>" required>
					<!--<input id="mname" type="text" name="mname" value="<?php echo $row3['MName'];?>">-->
					<input id="lname" type="text" name="lname" value="<?php echo $row3['LName'];?>" required>
					<!--<input id="pname" type="text" name="" value="<?php echo $row3['FName'];?>">-->
				</div> <!-- end row -->
				
				<div class="row"> <!-- titles -->									
					
					<!--<span id="hd_pname" title="Preferred First Name">Preferred</span>-->
                            		<span id="hd_title">Title</span>
                            		<span id="hd_gender">Gender</span>
				</div> <!-- end row -->
				<div class="row"> <!-- inputs -->
					<input id="title" type="text" name="title" value="<?php echo $row3['title']; ?>" >
				<!--<select name="title">
						<option value="">---</option>
						<option value="">Mr.</option>
						<option value="">Ms.</option>
						<option value="">Mrs.</option>
						<option value="">Miss</option>
						<option value="">Dr.</option>
						<option value="">Rev.</option>
					</select> -->
					<select id="gender" name="gender">
				                <option value="<?echo $row3['gender'];?>" selected><?echo $row3['gender'];?></option>
						<option value="">---</option>
						<option value="Male">Male</option>
						<option value="Female">Female</option>
					</select>
				</div> <!-- end row -->
								
				<table>
	                            	<tr>
	                                	<td id="td_1">
							<div class="row"> <!-- titles -->
								<span id="hd_address1">Address 1</span>
							</div> <!-- end row -->
							<div class="row"> <!-- inputs -->
								<input id="address1" type="text" name="address1" value="<?php echo $row3['address1'];?>" required>
							</div> <!-- end row -->
							<div class="row">
                        		<span id="hd_address2">Address 2</span>
                        	</div> <!-- end row -->
			                <div class="row">
			                    <input id="address2" type="text" name="address2" value="<?php echo $row3['address2'];?>">
			                </div> <!-- end row -->
							<div class="row"> <!-- titles -->
								<span id="hd_city">City</span>
								<span id="hd_state">State</span>
								<span id="hd_zip">Zip</span>
							</div> <!-- end row -->
							<div class="row"> <!-- inputs -->
								<input id="city" type="text" name="city" value="<?php echo $row3['city'];?>" required>
								<select id="state" name="state" required>
									<option value="<?php echo $row3['state'];; ?>" selected><?php echo $row3['state']; ?></option>
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
							
										<div class="row"> <!-- title -->
                           		 			<span id="hd_wphone">Primary Phone</span>
                           		 			<span id="ext">Ext</span>
										</div> <!-- end row -->
                            				<div class="row">
                           		 			<input id="phone" type="text" name="phone" value="<?php echo $row3['workPhone'];?>" maxlength="14"><!--<input id="wphone2" type="text" name=""><input id="wphone3" type="text" name="">-->
											<input id="ext" type="text" name="ext" value="<?php echo $row['workPhoneExt'];?>" maxlength="5">
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
			
			<!--<div class="interim-form"> --><!-- account login tab -->
					<!--<div class="interim-header"><h2>Create Your Account Login</h2></div>
					<div class="row">--> <!-- title -->
						<!--<span id="hd_loginemail">Email Address</span>
					</div> --><!-- end row -->
					<!--<div class="row"> --><!-- input -->
						<!--<input id="email" type="text" name="email" value="<? echo $email;?>">
					</div> --><!-- end row -->
					
					<!--<div class="row">--> <!-- titles -->
					<!--<span id="hd_password">Password</span>
					<span id="hd_cpassword">Confirm Password</span>
					</div> --><!-- end row -->
					<!--<div class="row"> --><!-- inputs -->
						<!--<input id="password" type="password" name="password">
						<input id="cpassword" type="password" name="cpassword">
					</div>--> <!-- end row -->
				<!--</div>--> <!-- end tab2 content (account login) -->
					
				<div class="interim-form"> <!-- payment tab -->
				
					<div class="row"> <!-- title -->
						<span id="hd_ppemail">PayPal Email</span>
					</div> <!-- end row -->
					<div class="row"> <!-- input -->
						<input id="paypalemail" type="text" name="paypalemail" value="<? echo $row3['userPaypal'];?>" required>
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
						<input id="ssn" type="text" name="ssn" value="<? echo $row3['ssn'];?>"><!--<input id="ssn2" type="text" name="ssn2"><input id="ssn3" type="text" name="ssn3">-->
						<input id="tin" type="text" name="ftin1" value="<? echo $row3['fedtin'];?>"><!--<input id="ftin2" type="text" name="ftin2">-->
						<input id="stin1" type="text" name="stin1" value="<? echo $row3['statetin'];?>"><!--<input id="stin2" type="text" name="stin2">-->
						<input id="nonp1" type="text" name="nonp1" value="<? echo $nonp;?>"><!--<input id="nonp2" type="text" name="nonp2">-->
					</div> <!-- end row -->
					
					<br>
					
					<h3>3. 1099 Form</h3>
					<p>Explanation about 1099 Form <a href="https://turbotax.intuit.com/tax-tools/tax-tips/Self-Employment-Taxes/What-is-an-IRS-1099-Form-/INF14810.html">here</a>.<br>
					Go here to get your official copy of a 1099 form:  <a href="">http://www.irs.gov/Forms-&-Pubs</a></p>
					<br>
					<h3>Sales Coordinator Total Commission Override: 1%</h3>
				</div> <!-- end tab3 content (payment) -->
					
			
				
			<div class="interim-form">
				<div class="interim-header"><h3>Profile Photo</h3></div>
				<div class="row"> 
					<span>Upload Profile Photo:</span><input type="file" name="uploaded_file">
					
				</div> <!-- end row -->
				<br>
				<div class="row"> 
					<span>Current Image:<span><br>
					<img src="../<?php echo $row3['picPath']; ?>" height="250px" width="250px" alt="Profile Pic" />
				</div> <!-- end row -->
			</div> <!-- end tab5 content -->
		</div> <!-- end simple tabs -->	
		
		<br>
		
		<div id="row"> <!-- submit row -->
			<input type="hidden" name="gp" value="<?echo $coord; ?>" />
			<input type="submit" name="submit" class="redbutton" value="Save Changes" />
			<!--<a href="commission.php"><input type="button" value="Split Commission" title="Click to Split Your Commission"/></a>-->
		</div> <!-- end row -->
		<br>
        </form>
        </div> <!-- end table -->
        </div><!-end border-->
      </div> <!--end content-->
      
     <?php include 'footer.php' ; ?>
    </div> <!--end container-->

</body>
</html>

<?php
   ob_end_flush();
?>