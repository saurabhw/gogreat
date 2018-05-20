<?php
include '../includes/autoload.php';

      if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "SC")
       {
            header('Location: ../repSignup.php');
            exit;
       }
       if($_SESSION['freeze'] == "TRUE")
       {
          // echo "Account Frozen";
           header('Location: accountEdit.php');
       }
      
	$id = $_SESSION['userId'];
	
	$table1 = "user_info";
	$table2 = "users";
	$table3 = "distributors";
        
        
	$upload_msg = "Message: <br />";
	function isUniqueEmail($link, $table1, $email) {
		$query = "SELECT * FROM $table1 WHERE email='$email'";
		$result = mysqli_query($link, $query)or die("MySQL ERROR on query c: ".mysqli_error($link));
		if(mysqli_num_rows($result) >= 1) {
			echo "I'm sorry, that email address is already being used, please use another one.";
			return false;
		} else {
			return true;
		}
	}
	
	// check if form has been submitted
	if(isset($_POST['submit'])){
	
	$rpPhoto = $_FILES['uploaded_file']['tmp_name'];
	$imageDirPath = $_SERVER['DOCUMENT_ROOT'].'/images/sc/';
	$vpPicPath = "";
	
	//grab all form fileds
	//$bob = 24503;
	//$vpid = $id;
	$vpid = mysqli_real_escape_string($link, $_POST['vpid']);
	$company = mysqli_real_escape_string($link, $_POST['cname']);
	$fname = mysqli_real_escape_string($link, $_POST['fname']);
	$mname = mysqli_real_escape_string($link, $_POST['mname']);
	$lname = mysqli_real_escape_string($link, $_POST['lname']);
	$title = mysqli_real_escape_string($link, $_POST['title']);
	$gender = mysqli_real_escape_string($link, $_POST['gender']);
	$ssn = mysqli_real_escape_string($link, $_POST['ssn1']);
	$address1 = mysqli_real_escape_string($link, $_POST['address1']);
	$address2 = mysqli_real_escape_string($link, $_POST['address2']);
	$city = mysqli_real_escape_string($link, $_POST['city']);
	$state = mysqli_real_escape_string($link, $_POST['state']);
	$zip = mysqli_real_escape_string($link, $_POST['zip']);
	$email = mysqli_real_escape_string($link, $_POST['email']);
	$phone = mysqli_real_escape_string($link, $_POST['phone']);
	//$hPhone2 = mysqli_real_escape_string($link, $_POST['hphone2']);
	//$wPhone3 = mysqli_real_escape_string($link, $_POST['hphone3']);
	$mPhone = mysqli_real_escape_string($link, $_POST['mphone']);
	$ext = mysqli_real_escape_string($link, $_POST['ext']);
	$fbPage = mysqli_real_escape_string($link, $_POST['fb']);
	$twitter = mysqli_real_escape_string($link, $_POST['twitter']);
	$linkedin = mysqli_real_escape_string($link, $_POST['lindkedin']);
	$loginPass = mysqli_real_escape_string($link, $_POST['password']);
	$salesMan = $_POST['sales'];
	$ftin = mysqli_real_escape_string($link, $_POST['ftin1']);
	$stin = mysqli_real_escape_string($link, $_POST['stin1']);
	$nonp = mysqli_real_escape_string($link, $_POST['nonp1']);
	//$cellPhone = $_POST['cellphone'];
	//$workPhone = $_POST['workphone'];
	$extPhone = mysqli_real_escape_string($link, $_POST['ext']);
	$paypal = mysqli_real_escape_string($link, $_POST['paypalemail']);
	$landingPage = "setupEditWebsite/accountEdit.php";
	$who = "RP";
	$percent = 6;
	$salt = time(); 			// create salt using the current timestamp 
	$loginPass = sha1($loginPass.$salt); 	// encrypt the password and salt with SHA1
	//$distPic = $_FILES['uploaded_file']['tmp_name'];
	$imageDirPath = $_SERVER['DOCUMENT_ROOT'].'/images/representatives/';
	$imagePath = "";
	
	
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
					$imagePath = "/images/representatives/".$id."/".$cleanedPic;
				} else {
					$picDirectory = $baseDirPath;
					
					
					if (!is_dir($picDirectory.$id)){
						mkdir($picDirectory.$id);
						
					}
					$picDirectory = $picDirectory.$id."/";
					move_uploaded_file($tmpPic, $picDirectory . $cleanedPic);
					$upload_msg .= "$cleanedPic uploaded.<br />";
					$imagePath = "/images/representatives/".$id."/".$cleanedPic;
					
					
				}// end third inner else
				return $imagePath;
			} // end first inner else
		      } // end else
	     }// end process_image
	    
		//if good email insert data
	    if(isUniqueEmail($link, $table1, $email)) {
		$query1 = "INSERT INTO $table2 (username, password, Security, landingPage, salt, created, lastLogin, role)";
		$query1 .= "VALUES('$email','$loginPass','1','$landingPage','$salt', now(), now(), '$who')";
		$query2 = "INSERT INTO $table1 (companyName, FName, MName, LName, ssn, address1, address2, city, state, zip, email, homePhone, fbPage, twitter, linkedin, salesPerson, cellPhone, workPhone, userPaypal,role,title,gender, userBaseCommPct, fedtin, statetin, threec)";
		$query2 .= " VALUES('$company','$fname','$mname','$lname','$ssn','$address1','$address2','$city','$state','$zip','$email','$hPhone1','$fbPage','$twitter','$linkedin', '$id','$phone', '$phone', '$paypal','$who', '$title', '$gender', '$percent', '$ftin', '$stin', '$nonp')";
        $query3 = "INSERT INTO $table3 (companyName, FName, MName, LName, ssn, address1, address2, city, state, zip, email, homePhone, fbPage, twitter, linkedin, vpID, workPhone, workPhoneExt,  distPicPath,setupID, role,paypal)";
		$query3 .= " VALUES('$company','$fname','$mname','$lname','$ssn','$address1','$address2','$city','$state','$zip','$email','$hPhone1','$fbPage','$twitter','$linkedin', '$vpid', '$phone', '$ext', '$imagePath','$id', '$who','$paypal')";


		mysqli_query($link, "start transaction;");
		// insert data into users table
		$res1 = mysqli_query($link, $query1)or die ("couldn't execute query 1.".mysqli_error($link));
		// insert data into distributors table
		$res2 = mysqli_query($link, $query2)or die ("couldn't execute query 2.".mysqli_error($link));
		
		$res3 = mysqli_query($link, $query3)or die ("couldn't execute query 3.".mysqli_error($link));
		
		if($res1 && $res2 && $res3){
			mysqli_query($link, "commit;");
			$query9 = "SELECT * FROM user_info WHERE email='$email'";
			$res4 = mysqli_query($link, $query9)or die ("couldn't execute query 9.".mysqli_error($link));
			$row = mysqli_fetch_assoc($res4);
			$newUserID = $row['userInfoID'];
			
			$queryx = "UPDATE distributors SET loginid = '$newUserID ', distPicPath='$imagePath' WHERE email = '$email'";
			mysqli_query($link, $queryx)or die ("couldn't execute query x.".mysqli_error($link));
			
			if($rpPhoto != ''){
		    $personalPicPath = process_image('uploaded_file',$newUserID, $rpPhoto, $imageDirPath);
		    if($personalPicPath !=''){
			$query10 = "UPDATE $table1 SET picPath = '$personalPicPath' WHERE userInfoID = '$newUserID'";
			mysqli_query($link, $query10);
			$query11 = "UPDATE distributors SET distPicPath = '$personalPicPath' WHERE userInfoID = '$newUserID'";
			mysqli_query($link, $query11);
						}
		    }
			echo "Your account has been successfuly created.\n\n";
			//newDistributorEmail($email,$FName,$LName,$cellPhone);
			 header( 'Location: viewReps.php' );

		} 
	        }
		else
		{   
		    /*
                    mysqli_query($link, "rollback;");
		    echo "I'm sorry, there was a problem creating your account.";
		    */  
		        $query15 = "SELECT * FROM user_info WHERE email='$email'";
			$res15 = mysqli_query($link, $query15)or die ("couldn't execute query 15.".mysqli_error($link));
			$rowC = mysqli_fetch_assoc($res15);
			$newUserID = $rowC['userInfoID'];
			$company2 = $rowC['companyName'];
			$fname2 = $rowC['FName'];
			$lname2 = $rowC['LName'];
			$ssn2 = $rowC['ssn'];
			$ad1 = $rowC['address1'];
			$ad2 = $rowC['address2'];
			$city2 = $rowC['city'];
			$state2 = $rowC['state'];
			$zip2 = $rowC['zip'];
			$fbPage = $rowC['fbPage'];
			$twitter2 = $rowC['twitter'];
			$linkedin2 = $rowC['linkedin'];
			$phone2 = $rowC['workPhone'];
			$ext2 = $rowC['workPhoneExt'];
			$imagePath2 = $rowC['picPath'];
			$paypal2 = $rowC['userPaypal'];
			$title2 = $rowC['title'];
			$gender2 = $rowC['gender'];
	
			
		$query16 = "INSERT INTO distributors (companyName, FName, LName, ssn, address1, address2, city, state, zip, email, fbPage, twitter,
			 linkedin, vpID, workPhone, workPhoneExt,  distPicPath, setupID, role, loginid, paypal, title, gender)";
			 
		        $query16 .= " VALUES('$company2','$fname2','$lname2','$ssn2','$ad1','$ad2','$city2','$state2','$zip2',
		        '$email','$fbPage','$twitter2','$linkedin2', '$vpid', '$phone2', '$ext2', '$imagePath2', '$id', 'RP', '$newUserID', '$paypal2', 'title2', '$gender2')";
		        $res16 = mysqli_query($link, $query16)or die ("couldn't execute query 16.".mysqli_error($link));
		        
		        echo "Your account has been successfuly created.\n\n";
			//newDistributorEmail($email,$FName,$LName,$cellPhone);
			 header( 'Location: viewReps.php' );
	        }
	

	}// end if
	
   $userID = $_SESSION['userId'];
   $userEmail = $_SESSION['email'];
   $query = "SELECT * FROM user_info WHERE userInfoID='$id'";
   $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysqli_error($link));
   $row = mysqli_fetch_assoc($result);
   
   $queryn = "SELECT * FROM distributors WHERE email ='$userEmail'";
   $resultn = mysqli_query($link, $queryn)or die ("couldn't execute query n.".mysqli_error($link));
   $rown = mysqli_fetch_assoc($resultn);
   $vp = $rown['vpID'];
   
   $myPic = $row['picPath'];
   $salesPerson = $row['salesPerson'];
?>
<!DOCTYPE html>
<head>
	<title>Add Representative</title>
		<style>

#border{
background-color:#f8f8f8;
box-shadow: 0px 0px 15px #888888;
padding:15px 35px 40px 35px; 
}
input{
padding-left:5px;
}
	    .form-control{
	        margin-bottom:1rem;
	    }
	    label{
	        margin-top:1rem;
	    }
	    .interim-header{
	        margin: 4rem 0 -2rem 0;
	    }
	    
	</style>
</head>

<body>
<?php include 'header.inc.php' ; ?>
<?php include 'sidenav.php' ; ?>

<div class="container" id="addBizAssociate" >
    <div class="row-fluid row-flex">
            
        <!-- row / full width column -->        
        <div class="page-header col-md-12">
              <h2 align="center">Add Representative</h2>
        </div>
        
        <div class=" col-md-10 col-md-push-1" id="AddPersonFormWrap">
<br>
<div id="border">
<br>
            <form class="" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="myForm" name="myForm" onsubmit="return validate();" enctype="multipart/form-data">
               
				<section class="row" id="dropdownSelections-section">
				    
			   </section> <!-- end SELECTION DROPDOWNS SECTION ROW -->

			
					
				<section class="interim-form" id="contactInformationSection-form">
					<div class="interim-header"><h2>Information</h2></div><hr>
				
						

    				<div class="row"> <!-- INOFRMATION SECTION ROW ONE -->
					    <div class="col-md-3 col-lg-2">
							<label for="title" id="hd_title">Title</label>
    						<select class="form-control" name="title">
    							<option value="">---</option>
    							<option value="Mr.">Mr.</option>
    							<option value="Ms.">Ms.</option>
    							<option value="Mrs.">Mrs.</option>
    							<option value="Miss">Miss</option>
    							<option value="Dr.">Dr.</option>
    							<option value="Rev.">Rev.</option>
    						</select>
    					</div>
    					
    					<div class="col-md-4 col-lg-4">
    						<label for="fname" id="hd_fname">First</label>
    						<input class="form-control" id="fname" type="text" name="fname" required>
    					</div>
    						
    					<div class="col-md-5 col-lg-4">
    						<label for="lname" id="hd_lname">Last</label>
        						<!--<input id="mname" type="text" name="mname">-->
        						<input class="form-control" id="lname" type="text" name="lname" required>
    						<!--<input id="pname" type="text" name="">-->
                        </div>
                        
                        <div class="col-md-3 col-md-pull-3 col-lg-pull-0 col-lg-2">
                            <label for="gender" id="hd_gender">Gender</label>
    						<select class="form-control" name="gender"><!-- Is this not obvious from asking for title? What is the point... Why does it even matter? -->
    							<option value="">---</option>
    							<option value="Male">Male</option>
    							<option value="Female">Female</option>
    						</select>
    				    </div>
                    </div> <!-- end INFORMATION SECTION ROW ONE -->

                    <div class="row"> <!-- INFORMATION ROW TWO -->
                        <div class="col-md-8">
                            <label for="address1" id="hd_address1">Address 1</label>
                            <input class="form-control" id="address1" type="text" name="address1" required>
                        </div> 
                    </div><!-- end INFORMATION  row TWO -->

				    <div class="row"> <!-- INFORMATION ROW THREE -->
    					<div class="col-md-8"> <!-- INFORMATION  row THREE -->
    						<label for="address2" id="hd_address2">Address 2</label>
    						<input class="form-control" id="address2" type="text" name="address2">
    					</div> <!-- end col -->
				    </div><!-- end INFORMATION  row THREE -->
												
				    <div class="row"> <!-- INFORMATION ROW FOUR -->
    					<div class="col-md-12 col-lg-5">
    						<label for="city" id="hd_city">City</label>
    						<input class="form-control" id="city" type="text" name="city" required>
    				    </div>
									
						<div class="col-md-3">
							<label for="state" id="hd_state">State</label>
							<select class="form-control" id="state" name="state" required>
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
						</div>
    									
    					<div class="col-md-4">
    						<label for="zip" id="hd_zip">Zip</label>
    						<input class="form-control" id="zip" type="text" name="zip" maxlength="5" required>
    					</div>
				    </div> <!-- end INFORMATION row FOUR -->
							    
					<div class="row"><!--  INFORMATION ROW FIVE -->
					    <div class="col-md-8">
							<label for="phone" id="hd_wphone">Primary Phone</label>
							<input class="form-control" id="phone" type="text" name="phone" maxlength="14"><!--<input id="wphone2" type="text" name=""><input id="wphone3" type="text" name="">-->
						</div>
						
					    <div class="col-md-4">
							<label for="ext" id="hd_ext">Ext</label>
							<input class="form-control" id="ext" type="text" name="ext" maxlength="5">
						</div>
					</div> <!-- END INFORMATION  row FIVE -->
				</section><!-- END INFORMATION SECTION FORM -->
                        
                        <!--<td id="td_2">-->
                        <!--<div class="row"> <!-- titles -->
                        <!--<span id="hd_mphone">Mobile Phone</span>
                        </div> <!-- end row -->
                        <!--<div class="row"> <!-- inputs -->
                        <!--<input id="mphone1" type="text" name=""><input id="mphone2" type="text" name=""><input id="mphone3" type="text" name="">
                        <select>
                        <option>Select Carrier</option>
                        <option>Verizon</option>
                        <option>AT&T</option>
                        <option>Sprint</option>
                        <option>T-Mobile</option>
                        <option>U.S. Cellular</option>
                        <option>Other</option>
                        </select>
                        </div> <!-- end row -->
                        <!--<div class="row">
                        <span id="hd_hphone">Home Phone</span>
                        </div> <!-- end row -->
                        <!--<div class="row">
                        <input id="hphone1" type="text" name=""><input id="hphone2" type="text" name=""><input id="hphone3" type="text" name="">
                        </div> <!-- end row -->
                        

                        
                        <!--<div class="row"> <!-- titles -->
                        <!--<span id="hd_bday">Birthday</span>
                        <span id="hd_gender">Gender</span>
                        </div> <!-- end row -->
                        <!--<div class="row"> <!-- inputs -->
                            <!--<select id="month" name="">
                                <option value="na">Month</option>
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                                <option value="4">April</option>
                                <option value="5">May</option>
                                <option value="6">June</option>
                                <option value="7">July</option>
                                <option value="8">August</option>
                                <option value="9">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                                <select id="day" name="">
                                <option value="na">Day</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                            </select>
                            <select id="year" name="">
                                <option value="na">Year</option>
                                <option value="2014">2014</option>
                                <option value="2013">2013</option>
                                <option value="2012">2012</option>
                                <option value="2011">2011</option>
                                <option value="2010">2010</option>
                                <option value="2009">2009</option>
                                <option value="2008">2008</option>
                                <option value="2007">2007</option>
                                <option value="2006">2006</option>
                                <option value="2005">2005</option>
                                <option value="2004">2004</option>
                                <option value="2003">2003</option>
                                <option value="2002">2002</option>
                                <option value="2001">2001</option>
                                <option value="2000">2000</option>
                                <option value="1999">1999</option>
                                <option value="1998">1998</option>
                                <option value="1997">1997</option>
                                <option value="1996">1996</option>
                                <option value="1995">1995</option>
                                <option value="1994">1994</option>
                                <option value="1993">1993</option>
                                <option value="1992">1992</option>
                                <option value="1991">1991</option>
                                <option value="1990">1990</option>
                                <option value="1989">1989</option>
                                <option value="1988">1988</option>
                                <option value="1987">1987</option>
                                <option value="1986">1986</option>
                                <option value="1985">1985</option>
                                <option value="1984">1984</option>
                                <option value="1983">1983</option>
                                <option value="1982">1982</option>
                                <option value="1981">1981</option>
                                <option value="1980">1980</option>
                                <option value="1979">1979</option>
                                <option value="1978">1978</option>
                                <option value="1977">1977</option>
                                <option value="1976">1976</option>
                                <option value="1975">1975</option>
                                <option value="1974">1974</option>
                                <option value="1973">1973</option>
                                <option value="1972">1972</option>
                                <option value="1971">1971</option>
                                <option value="1970">1970</option>
                                <option value="1969">1969</option>
                                <option value="1968">1968</option>
                                <option value="1967">1967</option>
                                <option value="1966">1966</option>
                                <option value="1965">1965</option>
                                <option value="1964">1964</option>
                                <option value="1963">1963</option>
                                <option value="1962">1962</option>
                                <option value="1961">1961</option>
                                <option value="1960">1960</option>
                                <option value="1959">1959</option>
                                <option value="1958">1958</option>
                                <option value="1957">1957</option>
                                <option value="1956">1956</option>
                                <option value="1955">1955</option>
                                <option value="1954">1954</option>
                                <option value="1953">1953</option>
                                <option value="1952">1952</option>
                                <option value="1951">1951</option>
                                <option value="1950">1950</option>
                                <option value="1949">1949</option>
                                <option value="1948">1948</option>
                                <option value="1947">1947</option>
                                <option value="1946">1946</option>
                                <option value="1945">1945</option>
                                <option value="1944">1944</option>
                                <option value="1943">1943</option>
                                <option value="1942">1942</option>
                                <option value="1941">1941</option>
                                <option value="1940">1940</option>
                                <option value="1939">1939</option>
                                <option value="1938">1938</option>
                                <option value="1937">1937</option>
                                <option value="1936">1936</option>
                                <option value="1935">1935</option>
                                <option value="1934">1934</option>
                                <option value="1933">1933</option>
                                <option value="1932">1932</option>
                                <option value="1931">1931</option>
                                <option value="1930">1930</option>
                                <option value="1929">1929</option>
                                <option value="1928">1928</option>
                                <option value="1927">1927</option>
                                <option value="1926">1926</option>
                                <option value="1925">1925</option>
                                <option value="1924">1924</option>
                                <option value="1923">1923</option>
                                <option value="1922">1922</option>
                                <option value="1921">1921</option>
                                <option value="1920">1920</option>
                                <option value="1919">1919</option>
                                <option value="1918">1918</option>
                                <option value="1917">1917</option>
                                <option value="1916">1916</option>
                                <option value="1915">1915</option>
                                <option value="1914">1914</option>
                            </select>
                        

                        </div> <!-- end row -->	

                <section class="interim-form" id="emailSection-form"><!-- EMAIL SECTION FORM -->
                	
					<div class="interim-header"><h2>Contact Email</h2></div><hr>

					<div id="row-fluid"> <!-- inputs -->
						<label for="email" id="hd_loginemail">Email Address</label>
						<input class="form-control" id="email" type="email" name="email" value="" required>
					</div> <!-- end row -->
					
					<!--<div id="row"> --><!-- titles -->
					<!--<span id="hd_password">Password</span>
					<span id="hd_cpassword">Confirm Password</span>
					</div>--> <!-- end row -->
					<!--<div id="row">--> <!-- inputs -->
						<!--<input id="password" type="password" name="password" value="">
						<input id="cpassword" type="password" name="cpassword" value="">
					</div> --><!-- end row -->
				</section> <!-- END EMAIL SECTION -->
    				
        				<!--<div id="row"> --><!-- titles -->
        				<!--<span id="hd_password">Password</span>
        				<span id="hd_cpassword">Confirm Password</span>
        				</div> --><!-- end row -->
        				<!--<div id="row"> --><!-- inputs -->
        					<!--<input id="password" type="password" name="password" value="">
        					<input id="cpassword" type="password" name="password" value="">
        				</div>--> <!-- end row -->
        		<!-- 	</div> end tab 2 -->
        			
					
				<!-- NOT NEEDED FOR THIS ROLE 
				<section class="interim-form"> <!-- PROFILE SECTION FORM -->
				<!--	<div class="interim-header"><h2>Profile Photo</h2></div><hr>-->
				<!--	<div class="row-fluid"> -->
				<!--		<label for="file" id="">Upload Profile Photo:</label>-->
				<!--		<input class="btn btn-md btn-default" type="file" id="" name="uploaded_file">-->
				<!--	</div> <!-- end row -->
				<!--</section> <!-- END PROFILE PICTURE upload ROW SECTION -->

				<section class="row row-flex" style="margin-top:4rem" id="submitButtonSection-form"><!-- SUBMIT BUTTON SECTION ROW -->
    				<div class="col-lg-3 col-lg-push-9">
    					<input style="width:15rem" type="submit" name="submit" class="redbutton btn btn-md btn-danger" value="Save & Exit">
    				</div>
				</section> <!-- end SUBMIT BUTTON SECTION ROW -->
        	</form>

        	
        	<!--<form class="graybackground">
        		<h3>--Option 2: Add Multiple Business Associates--</h3>
        		<h2>How To Add Multiple Business Associates</h2><br>
        		<ol>
        			<li><a href="">Download</a> Our Business Associate Setup Spreadsheet</li>
        			<li>Input the Data for Each Associate You want to Add</li>
        			<li>Upload the Completed Spreadsheet...</li>
        		</ol>
        		<input type="file" name="">
        		<input class="redbutton" type="submit" name="uploaded_file" value="Upload File">
        	</form>-->
        	</div>
        	
	    </div> <!--end AddPersonFormWrap -->
    </div><!-- end row wrap -->
</div> <!--end container wrap -->
      <?php include '../footer.php' ; ?>   

</body>
</html>

<?php
   ob_end_flush();
?>