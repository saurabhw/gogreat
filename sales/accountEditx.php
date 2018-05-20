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
   $query = "SELECT * FROM user_info WHERE userInfoID='$userID'";
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
  
<div class="container" id="addRep" >
    <div class="row-fluid row-flex">
            
        <!-- row / full width column -->        
 <div class="page-header">
              
        </div>

        <div class=" col-md-10 col-md-push-1" id="AddPersonFormWrap">
            <h2 align="center">Edit Account</h2><? echo $userID;?>
<br>
<div id="border">
		<form class="" action="accountEdit.php" method="POST" enctype="multipart/form-data" id="myForm" name="myForm" onsubmit="return checkForm(this);">
			
				<section class="interim-form" id="contactInformationSection-form">
					<div class="interim-header page-header"><h2 style="margin-left:30px;">Information</h2></div>
				
						<!--<span style="line-height:35px;">Friend or Family Type: </span>
						<select name="">
							<option value="">Select Type</option>
							<option value="">Mom</option>
							<option value="" selected>Dad</option>
							<option value="">Brother</option>
							<option value="">Sister</option>
							<option value="">--etc--</option>
						</select>-->
						
                    <div class="row" style="margin-left:15px;"> <!-- inputs -->
                        <label style="line-height:35px;margin-left:15px;" for="cname">Company Name</label>
    				    <input style="width:500px;margin-left:15px;" class="form-control" id="cname" type="text" name="company" value="<?php echo $row['companyName'];?>">
    				</div>
    				<div class="row" style="margin-left:15px;"> <!-- INOFRMATION SECTION ROW ONE -->
					    <div class="col-md-3 col-lg-2">
							<label style="line-height:35px;" for="title" id="hd_title">Title</label>
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
    						<label style="line-height:35px;" for="fname" id="hd_fname">First</label>
    						<input class="form-control" id="fname" type="text" name="fname" value="<?php echo $row['FName'];?>" required>
    					</div>
    						
    					<div class="col-md-5 col-lg-4">
    						<label style="line-height:35px;" for="lname" id="hd_lname">Last</label>
        						<!--<input id="mname" type="text" name="mname">-->
        						<input class="form-control" id="lname" type="text" value="<?php echo $row['LName'];?>" required>
    						<!--<input id="pname" type="text" name="">-->
                        </div>
                        
                        <div class="col-md-3 col-md-pull-3  col-lg-pull-0 col-lg-2">
                            <label style="line-height:35px;" for="gender" id="hd_gender">Gender</label>
    						<select class="form-control" name="gender"><!-- Is this not obvious from asking for title? What is the point... Why does it even matter? -->
    							<option value="">---</option>
    							<option value="Male">Male</option>
    							<option value="Female">Female</option>
    						</select>
    				    </div>
                    </div> <!-- end INFORMATION SECTION ROW ONE -->

                    <div class="row" style="margin-left:15px;"> <!-- INFORMATION ROW TWO -->
                        <div class="col-md-8">
                            <label style="line-height:35px;" for="address1" id="hd_address1">Address 1</label>
                            <input class="form-control" id="address1" type="text" name="address1" value="<?php echo $row['address1'];?>" required>
                        </div> 
                    </div><!-- end INFORMATION  row TWO -->

				    <div class="row" style="margin-left:15px;"> <!-- INFORMATION ROW THREE -->
    					<div class="col-md-8"> <!-- INFORMATION  row THREE -->
    						<label style="line-height:35px;" for="address2" id="hd_address2">Address 2</label>
    						<input class="form-control" id="address2" type="text" name="address2" value="<?php echo $row['addresss2'];?>">
    					</div> <!-- end col -->
				    </div><!-- end INFORMATION  row THREE -->
												
				    <div class="row" style="margin-left:15px;"> <!-- INFORMATION ROW FOUR -->
    					<div class="col-md-12 col-lg-5">
    						<label style="line-height:35px;" for="city" id="hd_city">City</label>
    						<input class="form-control" id="city" type="text" name="city" value="<?php echo $row['city'];?>" required>
    				    </div>
									
						<div class="col-md-3">
							<label style="line-height:35px;" for="state" id="hd_state">State</label>
							<select class="form-control" id="state" name="state" required>
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
						</div>
    									
    					<div class="col-md-4">
    						<label style="line-height:35px;" for="zip" id="hd_zip">Zip</label>
    						<input class="form-control" id="zip" type="text" name="zip" maxlength="5" value="<?php echo $row['zip'];?>" required>
    					</div>
				    </div> <!-- end INFORMATION row FOUR -->
							    
					<div class="row" style="margin-left:15px;"><!--  INFORMATION ROW FIVE -->
					    <div class="col-md-8">
							<label style="line-height:35px;" for="phone" id="hd_wphone">Primary Phone</label>
							<input class="form-control" id="phone" type="text" name="phone" maxlength="14" value="<?php echo $row['homePhone'];?>"><!--<input id="wphone2" type="text" name=""><input id="wphone3" type="text" name="">-->
						</div>
						
					    <div class="col-md-4">
							<label style="line-height:35px;" for="ext" id="hd_ext">Ext</label>
							<input class="form-control" id="ext" type="text" name="ext" maxlength="5" value="<?php echo $row['workPhoneExt'];?>">
						</div>
					</div> <!-- END INFORMATION  row FIVE -->
				</section>
				<!-- END INFORMATION SECTION FORM -->
										
						<!--<div class="row" style="margin-left:15px;">--> <!-- titles -->
							<!--<span style="line-height:35px;" id="hd_bday">Birthday</span>
							<span style="line-height:35px;" id="hd_gender">Gender</span>
						</div>--> <!-- end row -->
						<!--<div class="row" style="margin-left:15px;">--> <!-- inputs -->
							<!--<select id="month" name="month">
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
							<select id="day" name="day">
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
							<select id="year" name="year">
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
							<select id="gender" name="gender">
								<option value="na">Gender</option>
								<option value="female">Female</option>
								<option value="male">Male</option>
							</select>
						</div>--> <!-- end row -->			
				<!--	</div> <!-- end tab1 content (information) -->
						
						
					 <section class="interim-form" id="stepForPaymentSection-form"> <!-- Paypal Section -->
						<div class="interim-header"><h2 style="margin-left:30px;">3 Simple Steps for Payment</h2></div>
    						<div class="row" style="margin-left:15px;"><hr>
        						<h3 style="margin-left:30px;">1. PayPal Information</h3>
        						<p style="margin-left:30px;">Please enter your new or existing PayPal information. All commissions are paid next day into your PayPal account. If you prefer, we can set up your PayPal account for you.</p>
        				    </div>	
        				    
    						<div class="row" style="margin-left:15px;"> <!-- title -->
    						    <div class="col-md-8">
        							<label style="line-height:35px;margin-left:30px;" for="paypalemail" id="hd_ppemail">PayPal Email</label>
        							<input style="margin-left:30px;" class="form-control" id="paypalemail" type="email" name="paypalemail" value="<? echo $pp;?>">
        						</div>
    						</div> <!-- end row -->
    						


    						
        					<div class="row" style="margin-left:15px;"> <!-- THIS BETTER BE SECURE. I WOULD NEVER GIVE MY FULL SSN OUT ONLINE..... -->
    						<h3 style="margin-left:30px;">2. Fund Distribution and Tax Information</h3>
    						<p style="margin-left:30px;">One of the following numbers is required for distribution of funds and also for tax purposes.</p>
    						
    							<div class="col-md-3">
        							<label style="line-height:35px;" for="ssn1" id="hd_ssn">SSN</label>
        							<!-- -_- -_- -_- HAVING SSN ECHOED INTO THIS INPUT BOX IS TERRIBLE SECURITY. I AM NOT PUTTING THAT ECHO INTO THIS CODE. -_- -_- -_- -_- -->
        							<input class="form-control" id="ssn1" type="text" name="ssn1"><!--<input id="ssn2" type="text" name="ssn2"><input id="ssn3" type="text" name="ssn3">-->
        						</div>
    							<div class="col-md-3">
        							<label style="line-height:35px;" for="ftin1" id="hd_ftin">Fed-TIN</label>
        							<input class="form-control" id="ftin1" type="text" name="ftin1" value="<? echo $fedtin;?>"><!--<input id="ftin2" type="text" name="ftin2">-->
          						</div>
    							<div class="col-md-3">
          							<label style="line-height:35px;" for="stin1" id="hd_stin">State-TIN</label>
        							<input class="form-control" id="stin1" type="text" name="stin1" value="<? echo $stxin;?>"><!--<input id="stin2" type="text" name="stin2">-->
        						</div>
    							<div class="col-md-3">
        							<label style="line-height:35px;" for="nonp1" id="hd_nonp">501(c)(3)</label>
        							<input class="form-control" id="nonp1" type="text" name="nonp1" value="<? echo $txinFive; ?>"><!--<input id="nonp2" type="text" name="nonp2">-->
        						</div>
    						</div> <!-- end row -->

                            <div class="row" style="margin-left:15px;">
                            <div class="col-md-10">
        						<h3 style="margin-left:30px;">3. 1099 Form</h3>
        						<p style="margin-left:30px;">Explanation about 1099 Form <a href="https://turbotax.intuit.com/tax-tools/tax-tips/Self-Employment-Taxes/What-is-an-IRS-1099-Form-/INF14810.html">here</a>.<br>
        						Go here to get your official copy of a 1099 form:  <a href="">http://www.irs.gov/Forms-&-Pubs</a></p><br>
        					    
        						<blockquote>Sales Coordinator Total Commission Override: 1%</blockquote>
        					</div>
    					    </div>
					</section> <!-- end PAYPAL SECTION -->
						
					<section class="interim-form" id="socialMediaSection-form"> <!-- social media Section Form -->
						<div class="interim-header"><h2 style="margin-left:30px;">Social Media Connections</h2></div>
						<div class="row" style="margin-left:15px;"><hr> 
						    <div class="col-md-8">
    							<label style="line-height:35px;" for="fb" id="hd_fb" title="Facebook Name or Profile URL">Facebook</label>
    							<input class="form-control" type="url" id="fb"  name="fb" placeholder="http://" value="<? echo $fb;?>">
						    </div>
						</div> <!-- end row -->
					
						<div class="row" style="margin-left:15px;"> 
                            <div class="col-md-8">
							<label style="line-height:35px;" for="tw" id="hd_tw" title="Twitter Username or Profile URL">Twitter</label>
							<input class="form-control" type="url" id="tw" name="twitter" placeholder="http://" value="<? echo $tw;?>">
							</div>
						</div> <!-- end row -->
						
						<div class="row" style="margin-left:15px;"> 
						    <div class="col-md-8">
							<label style="line-height:35px;" for="linkedin" id="hd_li" title="LinkedIn Username or Profile URL">LinkedIn</label>
							<input class="form-control" type="url" id="li" name="lindkedin" placeholder="http://" value="<? echo $li;?>">
							</div>
						</div> <!-- end row -->
						<!--<div class="row" style="margin-left:15px;"> 
							<span style="line-height:35px;" id="hd_pn" title="Pinterest Username or Profile URL">Pinterest</span>
							<input type="url" id="pn" name="pinterest">
						</div>--> <!-- end row -->
						<!--<div class="row" style="margin-left:15px;">
							<span style="line-height:35px;" id="hd_gp" title="Google+ Username or Profile URL">Google+</span>
							<input type="url" id="gp" name="googleplus">
						</div>--> <!-- end row -->
					</section> <!-- end Social Media Section Form -->
					
					<section class="interim-form"> <!-- profile pic tab5 -->
						<div class="interim-header"><h2 style="margin-left:30px;">Profile Photo</h2></div><hr>
						<div class="row" style="margin-left:15px;"> 
							<label style="line-height:35px;margin-left:30px;" fpr="uploaded_file" id="">Upload New Profile Photo:</label>
							<input style="margin-left:30px;" type="file" id="" name="uploaded_file"><br>
							<img class="img-responsive" style="margin-left:35px;" src="../<?php echo $row['picPath']; ?>" class="profilepicpreview" alt="Profile Picture Preview">

							
						</div> <!-- end row -->
					</section> <!-- end profile pic -->
					
					<section class="row row-flex" style="margin-top:4rem" id="submitButtonSection-form"><!-- SUBMIT BUTTON SECTION ROW -->
        				<div class="col-lg-3 col-lg-push-9">
                			<input type="hidden" name="vpid" value="<? echo $salesPerson; ?>">
            				<input style="width:15rem" type="submit" name="submit" class="redbutton btn btn-md btn-danger redbutton" value="Save & Exit">
        				</div>
				    </section> <!-- end SUBMIT BUTTON SECTION ROW -->
		    </form>

	    </div><!-- end AddPerson wrap col width -->
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
    </div><!-- end row wrap -->
</div> <!--end container-->
</div>
   
    <?php include '../footer.php' ; ?>
</body>
</html>

<!--<p style="margin-left:30px;"re class="hidden">
<?php if ($_POST && $mailSent){
	echo htmlentities($message, ENT_COMPAT, 'UTF-8')."\n";
	echo 'Headers: '.htmlentities($headers, ENT_COMPAT, 'UTF-8');
} ?>
</pre>-->
-->
<?php
   ob_end_flush();
?>