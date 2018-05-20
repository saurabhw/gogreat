<?php
   session_start();
    if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
   include('../samplewebsites/imageFunctions.inc.php');
   include('../includes/connection.inc.php');
   $link = connectTo();
   $userID = $_SESSION['userId'];
   $query = "SELECT * FROM user_info WHERE userInfoID='$userID' and role='VP'";
   $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error());
   $row = mysqli_fetch_assoc($result);
   $pic = $row['picPath'];
?>
<!DOCTYPE html>
<head>
	<title>GreatMoods | VP</title>
</head>

<body>
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <?php include 'sidenav.php' ; ?>

      <div id="content">
          <h1>Add Sales Coordinator</h1>
 
          <h3></h3>
		<div class="table">
		<form class="" action="scSetup.php" method="POST" enctype="multipart/form-data" id="myForm" name="myForm" onsubmit="return(validate());">
			
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
						<span id="hd_fname">First</span>
						<!--<span id="hd_mname">Middle</span>-->
						<span id="hd_lname">Last</span>
						<!--<span id="hd_pname" title="Preferred First Name">Preferred</span>-->
						<span id="hd_title">Title</span>
						<span id="hd_cname" title="If you’re a member of a Group/Company being a Sales Coordinator together, please enter that Company Name">Company</span>
					</div> <!-- end row -->
					<div class="row"> <!-- inputs -->
						<input id="fname" type="text" name="fname">
						<!--<input id="mname" type="text" name="mname">-->
						<input id="lname" type="text" name="lname">
						<!--<input id="pname" type="text" name="pname">-->
						<select name="title">
							<option value="" selected>---</option>
							<option value="Mr.">Mr.</option>
							<option value="Ms.">Ms.</option>
							<option value="Mrs.">Mrs.</option>
							<option value="Miss">Miss</option>
							<option value="Dr.">Dr.</option>
							<option value="">Rev.</option>
						</select>
						<input id="cname" type="text" name="cname">
					</div> <!-- end row -->
								
					<table>
						<tr>
							<td id="td_1">
								<div class="row"> <!-- title -->
									<span id="hd_address1">Address 1</span>
								</div> <!-- end row -->
								<div class="row"> <!-- input -->
									<input id="address1" type="text" name="address1">
								</div> <!-- end row -->
								
								<div class="row"> <!-- title -->
									<span id="hd_address2">Address 2</span>
								</div> <!-- end row -->
								<div class="row"> <!-- input -->
									<input id="address2" type="text" name="address2">
								</div> <!-- end row -->
												
								<div class="row"> <!-- titles -->
									<span id="hd_city">City</span>
									<span id="hd_state">State</span>
									<span id="hd_zip">Zip</span>
								</div> <!-- end row -->
								<div class="row"> <!-- inputs -->
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
									<input id="zip" type="text" name="zip">
								</div> <!-- end row -->
							</td>
						
							<td id="td_2">
								<!--<div class="row"> <!-- titles -->
									<!--<span id="hd_mphone">Mobile Phone</span>
								</div>--> <!-- end row -->
								<!--<div class="row">--> <!-- inputs -->
									<!--<input id="mphone1" type="text" name="mphone"><input id="mphone2" type="text" name=""><input id="mphone3" type="text" name="">
									<select id="mcarrier" title="Needed To Receive Texts From Computer">
										<option>Select Carrier</option>
										<option>Verizon</option>
										<option>AT&T</option>
										<option>Sprint</option>
										<option>T-Mobile</option>
										<option>U.S. Cellular</option>
										<option>Other</option>
									</select>
								</div>--> <!-- end row -->
								<!--<div class="row">
									<span id="hd_hphone">Home Phone</span>
								</div>--> <!-- end row -->
								<!--<div class="row">
									<input id="hphone1" type="text" name="hphone"><input id="hphone2" type="text" name=""><input id="hphone3" type="text" name="">
								</div>--> <!-- end row -->
								<div class="row"> <!-- titles -->
									<span id="hd_wphone">Primary Phone</span>
									<span id="ext">Ext</span>
								</div> <!-- end row -->
								<div class="row">
									<input id="wphone1" type="text" name="wphone"><!--<input id="wphone2" type="text" name=""><input id="wphone3" type="text" name="">--> 
									<input id="ext" type="text" name="ext"> 
								</div> <!-- end row -->
							</td>
						</tr>
					</table>
									
					<!--<div class="row">--> <!-- titles -->
						<!--<span id="hd_bday">Birthday</span>
						<span id="hd_gender">Gender</span>
					</div>--> <!-- end row -->
					<!--<div class="row">--> <!-- inputs -->
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
				</div> <!-- end tab1 content (information) -->
					
				<div class="interim-form"> <!-- account login tab -->
					<div class="interim-header"><h2>Create Your Account Login</h2></div>
					<div class="row"> <!-- title -->
						<span id="hd_loginemail">Email Address</span>
					</div> <!-- end row -->
					<div class="row"> <!-- input -->
						<input id="loginemail" type="text" name="email">
					</div> <!-- end row -->
					
					<div class="row"> <!-- titles -->
					<span id="hd_password">Password</span>
					<span id="hd_cpassword">Confirm Password</span>
					</div> <!-- end row -->
					<div class="row"> <!-- inputs -->
						<input id="password" type="password" name="password">
						<input id="cpassword" type="password" name="cpassword">
					</div> <!-- end row -->
				</div> <!-- end tab2 content (account login) -->
					
				<div class="interim-form"> <!-- payment tab -->
					<div class="interim-header"><h2>3 Simple Steps for Payment</h2></div>
					<h3>1. PayPal Information</h3>
					<p>Please enter your new or existing PayPal information. All commissions are paid next day into your PayPal account. If you prefer, we can set up your PayPal account for you.</p>
					<div class="row"> <!-- title -->
						<span id="hd_ppemail">PayPal Email</span>
					</div> <!-- end row -->
					<div class="row"> <!-- input -->
						<input id="paypalemail" type="email" name="paypalemail">
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
						<input id="ssn1" type="text" name="ssn1"><!--<input id="ssn2" type="text" name="ssn2"><input id="ssn3" type="text" name="ssn3">-->
						<input id="ftin1" type="text" name="ftin1"><!--<input id="ftin2" type="text" name="ftin2">-->
						<input id="stin1" type="text" name="stin1"><!--<input id="stin2" type="text" name="stin2">-->
						<input id="nonp1" type="text" name="nonp1"><!--<input id="nonp2" type="text" name="nonp2">-->
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
						<input type="url" id="fb"  name="fb">
					</div> <!-- end row -->
					<br>
					<div class="row"> 
						<span id="hd_tw" title="Twitter Username or Profile URL">Twitter</span>
						<input type="url" id="tw" name="twitter">
					</div> <!-- end row -->
					<br>
					<div class="row"> 
						<span id="hd_li" title="LinkedIn Username or Profile URL">LinkedIn</span>
						<input type="url" id="li" name="lindkedin">
					</div> <!-- end row -->
					<!--<div class="row"> 
						<span id="hd_pn" title="Pintrest Username or Profile URL">Pintrest</span>
						<input type="url" id="pn" name="printrest">
					</div>--> <!-- end row -->
					<!--<div class="row">
						<span id="hd_gp" title="Google+ Username or Profile URL">Google+</span>
						<input type="url" id="gp" name="googleplus">
					</div>--> <!-- end row -->
				</div> <!-- end tab4 content (social media) -->
				
				<div class="interim-form"> <!-- profile pic tab5 -->
					<div class="interim-header"><h2>Profile Photo</h2></div>
					<div class="row"> 
						<span id="">Upload Profile Photo:</span>
						<input type="file" id="" name="">
						<input type="submit" class="redbutton" value="Upload Photo">
						<br><br>
						<span id="">Preview Photo:</span>
						<img src="" alt="uploaded profile photo">
					</div> <!-- end row -->
				</div> <!-- end tab5 content (profile pic) -->
			</div> <!-- end simple tabs -->
		
			<input type="submit" name="submit" class="redbutton" value="Save & Exit">
			<input type="submit" name="submit" class="redbutton" value="Save & Add Another">
		</form>
	</div> <!-- end table -->
     	<br>

  </div> <!--end content -->
  
      <?php include 'footer.php' ; ?>   
</div> <!--end container-->

</body>
</html>

<?php
   ob_end_flush();
?>