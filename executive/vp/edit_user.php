<?php
 
  session_start();
	ob_start();
	if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../../index.php');
            exit;
       }
	include '../../includes/connection.inc.php';
	include('../../samplewebsites/imageFunctions.inc.php');
    $link = connectTo();
    $userID = $_SESSION['userId'];
    $table1 = "user_info";  
    $table2 = "distributors";
    $user = $_GET['user'];
    /*
    // check if form has been submitted
	if(isset($_POST['submit'])){
	
	$vpPhoto = $_FILES['uploaded_file']['tmp_name'];
	$imageDirPath = $_SERVER['DOCUMENT_ROOT'].'/images/vp/';
	$vpPicPath = "";
	
	//grab all form fileds
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
	//$email = mysqli_real_escape_string($link, $_POST['email']);
	$hPhone1 = mysqli_real_escape_string($link, $_POST['wphone1']);
	$hPhone2 = mysqli_real_escape_string($link, $_POST['hphone2']);
	$wPhone3 = mysqli_real_escape_string($link, $_POST['hphone3']);
	$mPhone = mysqli_real_escape_string($link, $_POST['mphone']);
	$ext = mysqli_real_escape_string($link, $_POST['ext']);
	$fb = mysqli_real_escape_string($link, $_POST['fb']);
	$twitter = mysqli_real_escape_string($link, $_POST['twitter']);
	$linkedin = mysqli_real_escape_string($link, $_POST['lindkedin']);
	$loginPass = mysqli_real_escape_string($link, $_POST['loginpass']);
	$salesMan = $_POST['sales'];
	$ftin = mysqli_real_escape_string($link, $_POST['ftin1']);
	$stin = mysqli_real_escape_string($link, $_POST['stin1']);
	$nonp = mysqli_real_escape_string($link, $_POST['nonp1']);
	//$cellPhone = $_POST['cellphone'];
	//$workPhone = $_POST['workphone'];
	$extPhone = mysqli_real_escape_string($link, $_POST['ext']);
	$paypal = mysqli_real_escape_string($link, $_POST['paypalemail']);
	$landingPage = "vp/vpLanding.php";
	$who = "VP";
	$percent = 0.5;
	$salt = time(); 			// create salt using the current timestamp 
	$loginPass = sha1($loginPass.$salt); 	// encrypt the password and salt with SHA1
	//$distPic = $_FILES['uploaded_file']['tmp_name'];
	$imageDirPath = $_SERVER['DOCUMENT_ROOT'].'/images/vp/';
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
					$imagePath = "images/vp/".$id."/".$cleanedPic;
				} else {
					$picDirectory = $baseDirPath;
					
					
					if (!is_dir($picDirectory.$id)){
						mkdir($picDirectory.$id);
						
					}
					$picDirectory = $picDirectory.$id."/";
					move_uploaded_file($tmpPic, $picDirectory . $cleanedPic);
					$upload_msg .= "$cleanedPic uploaded.<br />";
					$imagePath = "images/vp/".$id."/".$cleanedPic;
					
					
				}// end third inner else
				return $imagePath;
			} // end first inner else
		      } // end else
	     }// end process_image
	mysqli_query($link, "start transaction;");    
	$query1 = "UPDATE $table1 SET
	companyName = '$company',
	FName = '$fname',
	MName = '$manme',
	LName = '$lname',
	ssn = '$ssn',
	address1 = '$address1',
	address2 = '$address2',
	city = '$city',
	state = '$state',
	zip = '$zip',
	homePhone = '$hPhone1',
	fbPage = '$fb',
	twitter = '$twitter',
	linkedin = '$linkedin',
	userPaypal = '$paypal',
	fedtin = '$fedtin',
	statetin = '$statetin',
	threec = '$nonp',
	gender = '$gender'
	WHERE userinfoID = '$user' AND role = 'VP' AND salesPerson = '$userID' LIMIT 1";
	$result1 = mysqli_query($link, $query1)or die("MySQL ERROR on query 1: ".mysqli_error($link));
	
	$query2 = "UPDATE $table2 SET
	companyName = '$company',
	FName = '$fname',
	MName = '$mname',
	LName = '$lname',
	ssn = '$ssn',
	address1 = '$address1',
	address2 = '$address2',
	city = '$city',
	state = '$state',
	zip = '$zip',
	homePhone = '$hPhone1',
	fbPage = '$fb',
	twitter = '$twitter',
	linkedin = '$linkedin'
	
	
	WHERE loginid = '$user' AND role = 'VP' AND salesPerson = '$userID' LIMIT 1";
	$result2 = mysqli_query($link, $query2)or die("MySQL ERROR on query 2: ".mysqli_error($link));
	
	if($result1 && $result2){
			mysqli_query($link, "commit;");
			/*$query9 = "SELECT * FROM user_info WHERE email='$email'";
			$res4 = mysqli_query($link, $query9)or die ("couldn't execute query 9.".mysql_error());
			$row = mysqli_fetch_assoc($res4);
			$newUserID = $row['userInfoID'];
			
			$queryx = "UPDATE distributors SET loginid = '$newUserID ', distPicPath='$imagePath' WHERE email = '$email'";
			mysqli_query($link, $queryx)or die ("couldn't execute query x.".mysql_error());
			*/
		   /* if($vpPhoto != '')
		    $personalPicPath = process_image('uploaded_file',$user, $vpPhoto, $imageDirPath);
		    if($personalPicPath !=''){
			$query10 = "UPDATE $table1 SET picPath = '$personalPicPath' WHERE userInfoID = '$newUserID'";
			mysqli_query($link, $query10);
						}
		    
			echo "Your account has been successfuly created.\n\n";
			//newDistributorEmail($email,$FName,$LName,$cellPhone);
			 header( 'Location: list_user.php' );

		} 
		else
		{
                    mysqli_query($link, "rollback;");
		    echo "I'm sorry, there was a problem creating your account.";
		}

	}// end if
    
*/

    $query = "SELECT * FROM user_info WHERE userinfoID='$user'";
    $result = mysqli_query($link, $query)or die("MySQL ERROR on query A: ".mysqli_error($link));
    $row = mysqli_fetch_assoc($result);
    
    






/*$conn = mysql_connect("localhost","gogrea5_ryan","nb]]mFg2ZU.n");
mysql_select_db("gogrea5_gm2012",$conn);
if(count($_POST)>0) {
mysql_query("UPDATE users set userName='" . $_POST["userName"] . "', password='" . $_POST["password"] . "', firstName='" . $_POST["firstName"] . "', lastName='" . $_POST["lastName"] . "' WHERE userId='" . $_POST["userId"] . "'");
$message = "Record Modified Successfully";
}
$user = $_GET['user'];
$result = mysql_query("SELECT * FROM users_info WHERE userInfoID='" . $user . "'");
$row= mysql_fetch_array($result);*/
?>
<html>
<head>
<title>Edit User</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
<div id="container">
      <?php include '../header.inc.php' ; ?>
      <br><br>
      <?php include '../sidenav.php' ; ?>

      <div id="content">
<form class="graybackground" action="userEdit.php" method="POST" enctype="multipart/form-data" id="myForm" name="myForm" onsubmit="return(validate());">
				<!--<h3>--Option 1: Add One Business Associate --</h3>
					<div class="tablerow">
						<span id="hd_vp">Vice President:</span>
						<span id="hd_sc">Sales Coordinator:</span>
						<span id="hd_rp">Representive:</span>
						<span id="hd_gmfr">Fundraiser Account:</span>
						<span id="hd_fg">Group:</span>
						<span id="hd_fm">Member:</span>
						<span id="hd_bb">Business:</span>
					</div>--> <!-- end row -->
					
					<!--<div class="tablerow">
						<select>
							<option>Select VP Account</option>
							<option></option>
							<option></option>
							<option></option>
							<option></option>
						</select>
						<select>
							<option>Select SC Account</option>
							<option></option>
							<option></option>
							<option></option>
							<option></option>
						</select>
						<select>
							<option>Select RP Account</option>
							<option></option>
							<option></option>
							<option></option>
							<option></option>
						</select>
						<select>
							<option>Select FR Account</option>
							<option></option>
							<option></option>
							<option></option>
							<option></option>
						</select>
						<select>
							<option>Select Group</option>
							<option></option>
							<option></option>
							<option></option>
							<option></option>
						</select>
						<select>
							<option>Select Member</option>
							<option></option>
							<option></option>
							<option></option>
							<option></option>
						</select>
						<select name="">
							<option value="">Select Business</option>
							<option value=""></option>
							<option value=""></option>
							<option value=""></option>
						</select>
					</div>--> <!-- end row -->

				<div class="simpleTabs">
					<!--<ul class="">
						<li><a href="#">Information</a></li>
						<li><a href="#">Account Login</a></li>
						<li><a href="#">Profile Photo</a></li>
					</ul>-->
					
					<div class="interim-form">
						<div class="interim-header"><h2>Information</h2></div>
						
						<!--<span>Position Title:</span>
						<select name="">
							<option value="">Select Position Title</option>
							<option value="">-depends on business-</option>
							<option value=""></option>
							<option value=""></option>
							<option value=""></option>
						</select>-->
						
						<div class="tablerow"> <!-- titles -->
						    <span id="hd_cname">Company Name</span>  									
							<span id="hd_fname">First</span>
							<span id="hd_mname">Middle</span>
							<span id="hd_lname">Last</span>
							<!--<span id="hd_pname" title="Preferred First Name">Preferred</span>
							<span id="hd_title">Title</span>-->
						</div> <!-- end row -->
						<div class="tablerow"> <!-- inputs -->  
						         <input id="cname" type="text" name="cname" value="<?php echo $row['companyName'];?>">
							<input id="fname" type="text" name="fname" value="<?php echo $row['FName'];?>">
							<input id="mname" type="text" name="mname" value="<?php echo $row['MName'];?>">
							<input id="lname" type="text" name="lname" value="<?php echo $row['LName'];?>">
							<!--<input id="pname" type="text" name="pname">
							<select name="title">
								<option value="">---</option>
								<option value="Mr.">Mr.</option>
								<option value="Ms.">Ms.</option>
								<option value="Mrs.">Mrs.</option>
								<option value="Miss">Miss</option>
								<option value="Dr.">Dr.</option>
							</select>-->
						</div> <!-- end row -->
						
						<br>
						
						<table>
							<tr>
								<td id="td_1">
									<!--<div class="tablerow"> <!-- title -->
										<!--<input type="checkbox">Use Same Address As Business<br>
										<input type="checkbox">Use Alternate Address:
									</div> <!-- end row -->
									<div class="tablerow"> <!-- title -->
										<span id="hd_address1">Address 1</span>
									</div> <!-- end row -->
									<div class="tablerow"> <!-- input -->
										<input id="address1" type="text" name="address1" value="<?php echo $row['address1'];?>">
									</div> <!-- end row -->
									
									<div class="tablerow"> <!-- title -->
										<span id="hd_address2">Address 2</span>
									</div> <!-- end row -->
									<div class="tablerow"> <!-- input -->
										<input id="address2" type="text" name="address2" value="<?php echo $row['address2'];?>">
									</div> <!-- end row -->
													
									<div class="tablerow"> <!-- titles -->
										<span id="hd_city">City</span>
										<span id="hd_state">State</span>
										<span id="hd_zip">Zip</span>
									</div> <!-- end row -->
									<div class="tablerow"> <!-- inputs -->
										<input id="city" type="text" name="city" value="<?php echo $row['city'];?>">
										<select id="state" name="state">
											<option value="">--</option>
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
										<input id="zip" type="text" name="zip" value="<?php echo $row['zip'];?>">
									</div> <!-- end row -->
								</td>
									
								<td id="td_2">
									<!--<div class="tablerow"> <!-- titles -->
										<!--<span id="hd_mphone">Mobile Phone</span>
									</div> <!-- end row -->
									<!--<div class="tablerow"> <!-- inputs -->
										<!--<input id="mphone1" type="text" name="mphone"><!--<input id="mphone2" type="text" name=""><input id="mphone3" type="text" name="">-->
										<!--<select name="carrier">
											<option>Select Carrier</option>
											<option value="Verizon">Verizon</option>
											<option value="AT&T">AT&T</option>
											<option value="Sprint">Sprint</option>
											<option value="T-Mobile">T-Mobile</option>
											<option value="U.S. Cellular">U.S. Cellular</option>
											<option value="Boost Mobile">Boost Mobile</option>
											<option value="">Other</option>
										</select>
									</div> <!-- end row -->
									<!--<div class="tablerow">
										<span id="hd_hphone">Home Phone</span>
									</div> <!-- end row -->
									<div class="tablerow">
										<input id="hphone1" type="text" name="hphone1" value="<?php echo $row['homePhone'];?>"><!--<input id="hphone2" type="text" name="hphone2"><input id="hphone3" type="text" name="hphone3">
									</div> <!-- end row -->
									<div class="tablerow"> <!-- titles -->
										<span id="hd_wphone">Primary Phone</span>
										<span id="ext">Ext</span>
									</div> <!-- end row -->
									<div class="tablerow">
										<!--<input id="wphone1" type="text" name="wphone1"><input id="wphone2" type="text" name="wphone2"><input id="wphone3" type="text" name="">-->
										<input id="ext" type="text" name="ext">
									</div> <!-- end row -->
								</td>
							</tr>
						</table>
												
						<!--<div class="tablerow"> <!-- titles -->
							<!--<span id="hd_bday">Birthday</span>
							<span id="hd_gender">Gender</span>
						</div> <!-- end row -->

						<!--<div class="tablerow"> <!-- inputs -->
							<!--<select id="month" name="bmonth">
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
							<select id="day" name="bday">
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
							<select id="year" name="byear">
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
							<select id="gender">
								<option value="na">Gender</option>
								<option value="female">Female</option>
								<option value="male">Male</option>
							</select>
						</div> <!-- end row -->	
					</div> <!-- end simple tabs content -->
					
					
					
					<div class="interim-form"> <!-- payment tab -->
					<div class="interim-header"><h2>3 Simple Steps for Payment</h2></div>
					<h3>1. PayPal Information</h3>
					<p>Please enter your new or existing PayPal information. All commissions are paid next day into your PayPal account. If you prefer, we can set up your PayPal account for you.</p>
					<div class="tablerow"> <!-- title -->
						<span id="hd_ppemail">PayPal Email</span>
					</div> <!-- end row -->
					<div class="tablerow"> <!-- input -->
						<input id="ppemail" type="text" name="paypalemail" value="<?php echo $row['userPaypal'];?>">
					</div> <!-- end row -->
					
					<h3>2. Fund Distribution and Tax Information</h3>
					<p>One of the following numbers is required for distribution of funds and also for tax purposes.</p>
					<div class="tablerow"> <!-- titles -->
						<span id="hd_ssn">SSN</span>
						<span id="hd_ftin">Fed-TIN</span>
						<span id="hd_stin">State-TIN</span>
						<span id="hd_nonp">501(c)(3)</span>
					</div> <!-- end row -->
					<div class="tablerow"> <!-- inputs -->
						<input id="ssn1" type="text" name="ssn1" value="<?php echo $row['ssn'];?>"><!--<input id="ssn2" type="text" name="ssn2" value="<?php echo $row['ssn'];?>"><input id="ssn3" type="text" name="ssn3">-->
						<input id="ftin1" type="text" name="ftin1" value="<?php echo $row['fedtin'];?>"><!--<input id="ftin2" type="text" name="ftin2">-->
						<input id="stin1" type="text" name="stin1" value="<?php echo $row['statetin'];?>"><!--<input id="stin2" type="text" name="stin2">-->
						<input id="nonp1" type="text" name="nonp1" value="<?php echo $row['threec'];?>"><!--<input id="nonp2" type="text" name="nonp2">-->
					</div> <!-- end row -->
					
					<h3>3. 1099 Form</h3>
					<p>Explanation about 1099 Form <a href="https://turbotax.intuit.com/tax-tools/tax-tips/Self-Employment-Taxes/What-is-an-IRS-1099-Form-/INF14810.html">here</a>.<br>
					Go here to get your official copy of a 1099 form:  <a href="">http://www.irs.gov/Forms-&-Pubs</a></p>
					<br>
					<h3>Vice President Total Commission Override: 0.5%</h3>
				</div> <!-- end tab3 content (payment) -->
					
				<div class="interim-form"> <!-- social media tab4 -->
					<div class="interim-header"><h2>Social Media Connections</h2></div>
					<div class="tablerow"> 
						<span id="hd_fb" title="Facebook Name or Profile URL">Facebook</span>
						<input type="url" id="fb"  name="fb" value="<?php echo $row['fbPage'];?>">
					</div> <!-- end row -->
					<div class="tablerow"> 
						<span id="hd_tw" title="Twitter Username or Profile URL">Twitter</span>
						<input type="url" id="tw" name="twitter" value="<?php echo $row['twitter'];?>">
					</div> <!-- end row -->
					<div class="tablerow"> 
						<span id="hd_li" title="LinkedIn Username or Profile URL">LinkedIn</span>
						<input type="url" id="li" name="lindkedin" value="<?php echo $row['linkedin'];?>">
					</div> <!-- end row -->
					<!--<div class="tablerow"> 
						<span id="hd_pn" title="Pintrest Username or Profile URL">Pintrest</span>
						<input type="url" id="pn" name="printrest">
					</div>--> <!-- end row -->
					<!--<div class="tablerow">
						<span id="hd_gp" title="Google+ Username or Profile URL">Google+</span>
						<input type="url" id="gp" name="googleplus">
					</div>--> <!-- end row -->
				</div> <!-- end tab4 content (social media) -->
					
					<div class="interim-form"> <!-- profile pic tab3 -->
						<div class="interim-header"><h2>Profile Photo</h2></div>
						<div class="tablerow"> 
							<span id="">Upload Profile Photo:</span>
							<input type="file" id="" name="uploaded_file">
							<input type="submit" class="redbutton" value="Upload Photo">
							<br><br>
							<span id="">Preview Photo:</span>
							<img src="../../<?php echo $row['picPath'];?>" alt="uploaded profile photo">
						</div> <!-- end row -->
					</div> <!-- end tab3 content (profile pic) -->
				</div> <!-- end simple tabs -->
				
				<input type="submit" name="submit" class="redbutton" value="Save & Exit" onsubmit="return validate()">
				</div>
			</form>
			</div></div>

</body></html>