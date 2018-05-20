<?php
     session_start();
    if($_SESSION['role'] === "MemberLeader" || $_SESSION['role'] === "Member" || $_SESSION['role'] === "fundOwner" && isset($_SESSION['authenticated']))
       {
          //authenicated
       }
       else
       {
            echo $_SESSION['userId'];
           // header('Location: ../index.php');
           // exit;
       }

     require_once("../includes/connection.inc.php");  
     require_once("../includes/functions.php");
     include('../samplewebsites/imageFunctions.inc.php');     
     $link = connectTo();

     /*  $group = $_GET['group']; // The key is from the URL "lisa_contacts.php?group=####"
       $user = $_SESSION['userId'];
       $userName = $_SESSION['email'];
       $query1 = "SELECT * FROM Dealers WHERE email='$userName'";
       $result1 = mysqli_query($link, $query1)or die("MySQL ERROR query 1: ".mysqli_error($link));
       $row1 = mysqli_fetch_assoc($result1);
       $dealerID = $row1['loginid'];
       $group = $row1['setuppersonid']; 
       */
       
	  
       $group = $_GET['group']; // The key is from the URL "lisa_contacts.php?group=####"
       $userID = $_SESSION['userId'];
       $userEmail = $_SESSION['email'];
       $userName = $_SESSION['groupid'];
       $query1 = "SELECT * FROM Dealers WHERE loginid='$userName'";
       $result1 = mysqli_query($link, $query1)or die("MySQL ERROR query 1: ".mysqli_error($link));
       $row1 = mysqli_fetch_assoc($result1);
       $dealerID = $row1['loginid'];
       $group = $row1['setuppersonid']; 
       $repID = $row1['setuppersonid2'];
       $myPic = $row1['contact_pic'];
       $twit = $row1['twitter']; 
       $face = $row1['facebook']; 
       //$goal = $row1['goal2'];
       $so_far = getSoloSales($dealerID);
       $banner = $row1['banner_path'];
       
       //get parent info
       $getParent = "SELECT * FROM Dealers WHERE loginid = '$group'";
       $pResult = mysqli_query($link, $getParent)or die ("couldn't execute parent query.".mysql1_error($link));
       $pRow = mysqli_fetch_assoc($pResult);
       $goal = $pRow['goal2'];
       
       if(isset($_POST['submit']))
       { 
       
          $cname = mysqli_real_escape_string($link, $_POST['cname']);
          $address1 = mysqli_real_escape_string($link, $_POST['address1']);
          $address2 = mysqli_real_escape_string($link, $_POST['apt']);
          $city = mysqli_real_escape_string($link, $_POST['city']);
          $state = mysqli_real_escape_string($link, $_POST['state']);
          $fname = mysqli_real_escape_string($link, $_POST['fname']);
          $mname = mysqli_real_escape_string($link, $_POST['nickname']);
          $lname = mysqli_real_escape_string($link, $_POST['lname']);
          $email = mysqli_real_escape_string($link, $_POST['email']);
          $zip = mysqli_real_escape_string($link, $_POST['zip']);
          $phone = mysqli_real_escape_string($link, $_POST['phone']);
          $ext = mysqli_real_escape_string($link, $_POST['ext']);
          $title = mysqli_real_escape_string($link, $_POST['title']);
          $gd = mysqli_real_escape_string($link, $_POST['gender']);
          $type = "Friends Family";
          $conPhoto = $_FILES['uploaded_file']['tmp_name'];
	  $imageDirPath = $_SERVER['DOCUMENT_ROOT'].'/images/contacts/';
	  $conPicPath = "";
          
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
					$imagePath = "images/contacts/".$id."/".$cleanedPic;
				} else {
					$picDirectory = $baseDirPath;
					
					
					if (!is_dir($picDirectory.$id)){
						mkdir($picDirectory.$id);
						
					}
					$picDirectory = $picDirectory.$id."/";
					move_uploaded_file($tmpPic, $picDirectory . $cleanedPic);
					$upload_msg .= "$cleanedPic uploaded.<br />";
					$imagePath = "images/contacts/".$id."/".$cleanedPic;
					
					
				}// end third inner else
				return $imagePath;
			} // end first inner else
		      } // end else
	     }// end process_image
	     
	     
	     if($conPhoto != '')
	     {
		    $personalPicPath = process_image('uploaded_file',$dealerID, $conPhoto, $imageDirPath);   
	     }
          
          $query = "INSERT INTO orgCustomers (first, last, companyname, relationship, gender, email, workPhone, address, apt, city, state, zip, fundMemberID,fundGroupID, repID, image_path, title)VALUES('$fname', '$lname', '$cname', '$type', '$gd', '$email', '$phone', '$address1', '$address2', '$city','$state', '$zip', '$dealerID', '$group', '$repID', '$personalPicPath', '$title')";
          $result = mysqli_query($link, $query)or die("MySQL ERROR query 1: ".mysqli_error($link));
          
          $query2 = "INSERT INTO orgContacts(Title, orgFName, orgLName, orgEmail, orgPhone, fundraiserID, fund_owner_id, org_contact_created)VALUES('$cname', '$fname', '$lname', '$email', '$phone', '$dealerID', '$group', 'now()')";
          $result2 = mysqli_query($link, $query2)or die("MYSQL ERROR query 2: ".mysqli_error($link));
          if($result && $result2)
          {
            header( 'Location: contacts.php' );
          }
          
       }

?>

<!DOCTYPE html>
<head>
	<title>GreatMoods Member | Add Friend & Family</title>
</head>

<body>
<div id="container">
      <?php include 'header.php' ; ?>
      <?php include 'memberSidebar.php' ; ?>

      <div id="content">
          <h1>Add Friend & Family</h1>
          <h3></h3>
		
		<div class="table">	
			<form action="addFriendFamily.php" method="POST" name="myForm" id="myForm" enctype="multipart/form-data" onsubmit="return validate()">
				<!--<h3>--Option 1: Add One Friend or Family Supporter--</h3>-->

					<div class="simpleTabs">
						<!--<ul class="simpleTabsNavigation">
							<li><a href="#">Information</a></li>
							<li><a href="#">Account Login</a></li>
							<li><a href="#">Social Media</a></li>
							<li><a href="#">Profile Photo</a></li>
						</ul>-->
						
					<div class="interim-form">
							<div class="interim-header"><h2>Information</h2></div>
					
							<!--<span>Friend or Family Type: </span>
							<select name="title">
								<option value="">Select Type</option>
								<option value="Mom">Mom</option>
								<option value="Dad" selected>Dad</option>
								<option value="Brother">Brother</option>
								<option value="Sister">Sister</option>
								<option value="">--etc--</option>
							</select>-->
							
						<div class="tablerow"> <!-- titles -->									
							<span id="hd_fname">First</span>
							<span id="hd_lname">Last</span>
							<span id="hd_title">Title</span>
							<span id="hd_title">Gender</span>
							<!--<span id="hd_">Relationship</span>-->
						</div> <!-- end row -->
						<div class="tablerow"> <!-- inputs -->
							<input id="fname" type="text" name="fname">
							<!--<input id="mname" type="text" name="">-->
							<input id="lname" type="text" name="lname">
							<select name="title">
								<option value="title">---</option>
								<option value="Mr.">Mr.</option>
								<option value="Ms.">Ms.</option>
								<option value="Mrs.">Mrs.</option>
								<option value="Miss">Miss</option>
								<option value="Dr.">Dr.</option>
								<option value="Rev.">Rev.</option>
							</select>
							<select name="gender">
								<option value="">---</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
							<!--<select name="update_relationship">
								<option value="Mom">Mom</option>
								<option value="Dad">Dad</option>
								<option value="Brother">Brother</option>
								<option value="Sister">Sister</option>
								<option value="Aunt">Aunt</option>
								<option value="Uncle">Uncle</option>
								<option value="Grandma">Grandma</option>
								<option value="Grandpa">Grandpa</option>
								<option value="Niece">Niece</option>
								<option value="Nephew">Nephew</option>
								<option value="Cousin">Cousin</option>
								<option value="Friend">Friend</option>
								<option value="Neighbor">Neighbor</option>
								<option value="Business Contact">Business Contact</option>
								<option value="Organization Contact">Organization Contact</option>
								<option value="Club Contact">Club Contact</option>
								<option value="Religious Contact">Religious Contact</option>
							</select>-->
						</div> <!-- end row -->
							
						<table>
							<tr>
								<td id="td_1">
									<div class="tablerow"> <!-- title -->
										<span id="hd_address1">Address 1</span>
									</div> <!-- end row -->
									<div class="tablerow"> <!-- input -->
										<input id="address1" type="text" name="address1">
									</div> <!-- end row -->
									
									<div class="tablerow"> <!-- title -->
										<span id="hd_address2">Address 2</span>
									</div> <!-- end row -->
									<div class="tablerow"> <!-- input -->
										<input id="address2" type="text" name="apt">
									</div> <!-- end row -->
													
									<div class="tablerow"> <!-- titles -->
										<span id="hd_city">City</span>
										<span id="hd_state">State</span>
										<span id="hd_zip">Zip</span>
									</div> <!-- end row -->
									<div class="tablerow"> <!-- inputs -->
										<input id="city" type="text" name="city">
										<select id="state" name="state">
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
										<input id="zip" type="text" name="zip" maxlength="5">
									</div> <!-- end row -->
									
									<div class="tablerow"> <!-- titles -->
										<span id="hd_wphone">Primary Phone</span>
										<span id="hd_ext">Ext</span>
									</div> <!-- end row -->
									<div class="tablerow"> <!-- inputs -->
										<input id="phone" type="text" name="phone" maxlength="14"><!--<input id="wphone2" type="text" name=""><input id="wphone3" type="text" name="">-->
										<input id="ext" type="text" name="ext" maxlength="5">
									</div> <!-- end row -->
								</td>
							
								<td id="td_2">
									<!--<div class="tablerow"> <!-- titles -->
										<!--<span id="hd_mphone">Mobile Phone</span>
									</div> <!-- end row -->
									<!--<div class="tablerow"> <!-- inputs -->
										<!--<input id="mphone1" type="text" name="mobile"><input id="mphone2" type="text" name=""><input id="mphone3" type="text" name="">
										<select id="mcarrier" title="Needed To Receive Texts From Computer">
											<option>Select Carrier</option>
											<option>Verizon</option>
											<option>AT&T</option>
											<option>Sprint</option>
											<option>T-Mobile</option>
											<option>U.S. Cellular</option>
											<option>Other</option>
										</select>
									</div> <!-- end row -->
									<!--<div class="tablerow">
										<span id="hd_hphone">Home Phone</span>
									</div> <!-- end row -->
									<!--<div class="tablerow">
										<input id="hphone1" type="text" name="homephone"><input id="hphone2" type="text" name=""><input id="hphone3" type="text" name="">
									</div> <!-- end row -->
									
									
								</td>
							</tr>
						</table>
												
						<!--<div class="tablerow"> <!-- titles -->
							<!--<span id="hd_bday">Birthday</span>
							<span id="hd_gender">Gender</span>
						</div> <!-- end row -->
						<!--<div class="tablerow"> <!-- inputs -->
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
							<select id="gender">
								<option value="na">Gender</option>
								<option value="female">Female</option>
								<option value="male">Male</option>
							</select>
						</div> <!-- end row -->	
					</div> <!-- end tab 1 -->
						
					<div class="interim-form">
						<div class="interim-header"><h2>Contact Email</h2></div>
						<div id="row"> <!-- titles -->
							<span id="hd_loginemail">Email Address</span>
						</div> <!-- end row -->
						<div id="row"> <!-- inputs -->
							<input id="loginemail" type="text" name="email" value="">
						</div> <!-- end row -->
						
						<div id="row"> <!-- titles -->
						<!--<span id="hd_password">Password</span>
						<span id="hd_cpassword">Confirm Password</span>-->
						</div> <!-- end row -->
						<div id="row"> <!-- inputs -->
							<!--<input id="password" type="password" name="" value="">
							<input id="cpassword" type="password" name="" value="">-->
						</div> <!-- end row -->
					</div> <!-- end tab 2 -->
						
					<div class="interim-form">
						<div class="interim-header"><h2>Social Media Connections</h2></div>
						<div id="row"> 
							<span id="hd_fb">Facebook</span>
							<input id="fb" type="text" name="" value="" placeholder="www.facebook.com/user">
						</div> <!-- end row -->
						<br>
						<div id="row"> 
							<span id="hd_tw">Twitter</span>
							<input id="tw" type="text" name="" value="" placeholder="www.twitter.com/user">
						</div> <!-- end row -->
						<br>
						<div id="row"> 
							<span id="hd_li">LinkedIn</span>
							<input id="li" type="text" name="" value="" placeholder="www.linkedin.com/user">
						</div> <!-- end row -->
						<!--<div id="row"> 
							<span id="hd_pn">Pinterest</span>
							<input id="pn" type="text" name="" value="">
						</div> <!-- end row -->
						<!--<div id="row">
							<span id="hd_gp">Google+</span>
							<input id="gp" type="text" name="" value="">
						</div> <!-- end row -->
					</div> <!-- end tab 3 -->
					
					<!--<div class="interim-form">  profile pic tab4 
						<div class="interim-header"><h2>Contact Photo</h2></div>
						<div class="tablerow"> 
							
							<input type="file" id="" name="uploaded_file">
							<input type="submit" class="redbutton" value="Upload Photo">
							<br><br>
							
						</div> --><!-- end row -->
					</div> <!-- end tab4 content (profile pic) -->
				</div> <!-- end simple tabs -->
			
				<div class="tablerow">
					<input type="hidden" name="group" value="<?php echo $group; ?>" />
					<input type="submit" name="submit" class="redbutton" value="Save New Contact" />
					<!--<input type="submit" class="redbutton" value="Save & Exit">-->
				</div> <!-- end row -->
			</form>
			
			<br>
			
			<!--<form class="graybackground">
				<h3>--Option 2: Add Multiple Friends & Family--</h3>
				<h2>How To Add Multiple Friends & Family</h2><br>
				<ol>
					<li><a href="">Download</a> Our Friend & Family Setup Spreadsheet</li>
					<li>Input the Data for Each Friend & Family Account You want to Add</li>
					<li>Upload the Completed Spreadsheet...</li>
				</ol>
				<input type="file" name="">
				<input class="redbutton" type="submit" name="" value="Upload File">
			</form>-->
		</div> <!-- end table -->

  </div> <!--end content -->
  
      <?php include 'footer.php' ; ?>   
</div> <!--end container-->

</body>
</html>

<?php
   ob_end_flush();
?>