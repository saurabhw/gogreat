<?
   include '../includes/autoload.php';
   if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "VP")
       {
            header('Location: ../index.php');
            exit;
       }
  
   $table = "user_info"; 
   $table1 = "users";
   $table2 = "representatives";
   $table3 = "distributors";
   $userID = $_SESSION['userId'];
   $emx = $_SESSION['email'];
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
	   // Validate e-mail
       if (filter_var($em, FILTER_VALIDATE_EMAIL)) {
       echo("$em is a valid email address");
       } else {
         echo("$em is not a valid email address");
       }
	   
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
  				cellPhone = '$cell',
  				repPicPath = '$rpPicPath'
  				WHERE email = '$emx'";
  	$result4 = mysqli_query($link, $query4)or die("MySQL ERROR: query4 ".mysqli_error($link));
  	
  	$query5 = "UPDATE $table3 SET
  				companyname = '$company',
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
  				workPhone = '$cell',
  				workPhoneExt = '$ext',
  				distPicPath = '$rpPicPath'
  				WHERE email = '$emx'";
  	$result5 = mysqli_query($link, $query5)or die("MySQL ERROR: query5 ".mysqli_error($link));  
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
  				linkedin = '$linkedin',
  				cellPhone = '$cell'
  				WHERE email = '$emx'";
  	$result4 = mysqli_query($link, $query4)or die("MySQL ERROR: query4 ".mysqli_error($link)); 
  	
  	$query5 = "UPDATE $table3 SET
  				companyname = '$company',
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
  				workPhone = '$cell',
  				workPhoneExt = '$ext',
  				paypal = '',
  				title = '',
  				gender = ''
  				WHERE email = '$emx'";
  	$result5 = mysqli_query($link, $query5)or die("MySQL ERROR: query5 ".mysqli_error($link));  
  	}
  	
  	if($result2 && $result4){
  	    $redirect = "Location:accountEdit.php?yes=1";
  	    header("$redirect");
  	}
  	
  }
   $userID = $_SESSION['userId'];
   $query = "SELECT * FROM $table WHERE userInfoID='$userID'";
   $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysqli_error($link));
   $row = mysqli_fetch_assoc($result);
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
   $xt = $row['workPhoneExt'];
   $cp = $row['cellPhone'];
   $fb = $row['fbPage'];
   $tw = $row['twitter'];
   $li = $row['linkedin'];
   $pp = $row['userPaypal'];
   $pic = $row['picPath'];
   $ftxin = $row['fedtin'];
   $stxin = $row['statetin'];
   $nonp = $row['threec'];
   $title = $row['title'];
   $gnd = $row['gender'];
   $pic = $row['picPath'];
   
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
	<title>Edit My Account</title>

</head>
<body>
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <?php include 'sidenav.php' ; ?>
      
    <div id="content">    
    <h2 align="center">Edit Your Account Information Below</h2>
    <br>
<div id="border">
	<div id="table">
        <form class="" action="<?php echo htmlspecialchars(basename($_SERVER['PHP_SELF'])); ?>" method="post" id="myForm" name="myForm" onsubmit="return validate(this);" enctype="multipart/form-data">
		
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
					<input id="fname" type="text" name="fname" value="<?php echo $row['FName'];?>" required>
					<!--<input id="mname" type="text" name="mname" value="<?php echo $row['MName'];?>">-->
					<input id="lname" type="text" name="lname" value="<?php echo $row['LName'];?>" required>
					<!--<input id="pname" type="text" name="" value="<?php echo $row['FName'];?>">-->
				</div> <!-- end row -->
				
				<div class="row"> <!-- titles -->									
					
					<!--<span id="hd_pname" title="Preferred First Name">Preferred</span>-->
                            		<span id="hd_title">Title</span>
                            		<span id="hd_gender">Gender</span>
				</div> <!-- end row -->
				<div class="row"> <!-- inputs -->
					<input id="title" type="text" name="title" value="<?php echo $title; ?>" >
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
				                <option value="<?echo $gnd;?>" selected><?echo $gnd;?></option>
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
								<input id="city" type="text" name="city" value="<?php echo $row['city'];?>" required>
								<select id="state" name="state" required>
									<option value="<?php echo $st; ?>" selected><?php echo $st; ?></option>
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
							
										<div class="row"> <!-- title -->
                           		 			<span id="hd_wphone">Primary Phone</span>
                           		 			<span id="ext">Ext</span>
										</div> <!-- end row -->
                            				<div class="row">
                           		 			<input id="wphone1" type="text" name="phone" value="<?php echo $row['homePhone'];?>" maxlength="14"><!--<input id="wphone2" type="text" name=""><input id="wphone3" type="text" name="">-->
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
				
					<h3>1. PayPal Information</h3>
					<p>Please enter your new or existing PayPal information. All commissions are paid next day into your PayPal account. If you prefer, we can set up your PayPal account for you.</p>
					<div class="row"> <!-- title -->
						<span id="hd_ppemail">PayPal Email</span>
					</div> <!-- end row -->
					<div class="row"> <!-- input -->
						<input id="paypalemail" type="email" name="paypalemail" value="<? echo $pp;?>" required>
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
						<input id="ssn" type="text" name="ssn" value="<? echo $sn;?>"><!--<input id="ssn2" type="text" name="ssn2"><input id="ssn3" type="text" name="ssn3">-->
						<input id="tin" type="text" name="ftin1" value="<? echo $ftxin;?>"><!--<input id="ftin2" type="text" name="ftin2">-->
						<input id="stin1" type="text" name="stin1" value="<? echo $stxin;?>"><!--<input id="stin2" type="text" name="stin2">-->
						<input id="nonp1" type="text" name="nonp1" value="<? echo $nonp;?>"><!--<input id="nonp2" type="text" name="nonp2">-->
					</div> <!-- end row -->
					
					<br>
				
				</div> <!-- end tab3 content (payment) -->
					
			
			<div class="interim-form">
				<div class="interim-header"><h3>Profile Photo</h3></div>
				<div class="row"> 
					<span>Upload Profile Photo:</span><input type="file" name="uploaded_file">
					
				</div> <!-- end row -->
				<br>
				<div class="row"> 
					<span>Current Image:</span><br>
					<img src="../<?php echo $pic; ?>" class="profilepicpreview" alt="Profile Pic" />
				</div> <!-- end row -->
			</div> <!-- end tab5 content -->
		</div> <!-- end simple tabs -->	
		
		<br>
		
		<div id="row"> <!-- submit row -->
			<input type="hidden" name="gp" value="<?echo $userID; ?>" />
			<input type="submit" name="submit" class="redbutton" value="Save Changes" />
			<!--<a href="commission.php"><input type="button" value="Split Commission" title="Click to Split Your Commission"/></a>-->
		</div> <!-- end row -->
		<br>
        </form>
        </div> <!-- end table -->
        </div><!--end border-->
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

<?php
   ob_end_flush();
?>