<?php
session_start();

if (!isset($_SESSION['authenticated'])) {
	header('Location: ../index.php');
	exit;
}

require_once("../includes/connection.inc.php");
require_once("../includes/functions.php");
$link = connectTo();

$group = mysqli_prep($_GET['group']); // The key is from the URL "lisa_contacts.php?group=####"


	// mysqli_fetch_row - the results are in an array, keys are integers
	// mysqli_fetch_assoc - the results are in an associative array, keys are the column names
	// mysqli_fetch_array - the results are both, indexed by integer and column names

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Add Contacts | VP</title>
	
	<link href="../css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
	<link href="../css/headerSampleWebsiteStyles.css" rel="stylesheet" type="text/css" />
	<link href="../css/leftSidebarNav.css" rel="stylesheet" type="text/css" />
	<link href="../css/contacts_page.css" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" href="../images/favicon.ico">
	<link href="../jquery-ui-1.10.3/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
	
	<script src="../jquery-ui-1.10.3/jquery-1.9.1.js" type="text/javascript"></script>
	<script src="../jquery-ui-1.10.3/ui/jquery-ui.js" type="text/javascript"></script>
	

	<script type="text/javascript">
		function validate(form) {
			var pass1 = form['loginPass'].value;
			var pass2 = form['confirmPass'].value;
			if (pass1 == "" || pass1 == null) {
				alert("please enter a valid password");
				return false;
			}
			if (pass1 != pass2) {
				alert("passwords do not match");
				return false;
			}
			return true;
		}
		
		$(function() {
			$("#datepicker").datepicker();
		});
		 
		function validateAddNewContact() {
			var firstname = document.forms["addnewcontact"]["firstname"].value;
			if (firstname == null || firstname == "") {
				alert("First name must be filled in.");
				return false;
			}

			var lastname = document.forms["addnewcontact"]["lastname"].value;
			if (lastname == null || lastname == "") {
				alert("Last name must be filled in.");
				return false;
			}
	
			var email = document.forms["addnewcontact"]["email"].value;
			var at = email.indexOf("@");
			var dot = email.lastIndexOf(".");
			if (at < 1 || dot < at + 2 || dot + 2 >= email.length) {
				alert("Not a valid e-mail address.");
				return false;
			}
		}
		
		function update_customerLoading() {
			document.getElementById('loadingMessage').style.display = 'block';
			document.getElementById('loadingOver').style.display = 'block';
		}
	</script>
</head>
	
<body id="contacts">



<!--START CONTAINER-->

<div id="container">
	<?php include 'header.inc.php' ; ?>
	<?php include 'sidenav.php' ; ?>
	
	<!--START MAIN CONTENT-->
	
	<div id="mainContent">
	
		<h2>My Contacts</h2>
	
		
		<!--START SHOW CURRENT CUSTOMERS SECTION-->
		
		<div>
			<h3 class="red_text">View / Edit Current Contacts</h3>
			
			<!--THIS DIV IS HERE TO SIMPLY ADD THE BACKGROUND COLOR & PADDING-->
			<div id="table_show_current_contacts">
			
			
			
			<!--THESE DIVS NOTIFY THE USER OF THE CUSTOMER UPDATE PROCESS IF IT TAKES TOO LONG TO UPDATE-->
			<div id="loadingMessage">Updating... Please wait...</div>
			<div id="loadingOver"></div>
			
			
			
			
			
			<table>
				<tr style="font-weight: bold;">
					<td><label for="first">First Name</label></td>
					<td><label for="last">Last Name</label></td>
					<td><label for="relation">Relationship</label></td>
					<td><label for="email">E-mail</label></td>
					<td><label for="phone">Phone</label></td>
				</tr>
				
				<?php
				
				$customers_query = "SELECT * FROM orgCustomers WHERE fundMemberID = '$group'";
				$customers_result = mysqli_query($link, $customers_query);
				confirm_query($customers_result);
				
				if ($customers_result) {
					while ($row_Info = mysqli_fetch_assoc($customers_result)) {
						
						
						
						// START FORM FOR TABLE [orgCustomers] - THIS ALLOWS USERS TO UPDATE THEIR CONTACTS ON THIS PAGE
						
						echo '
						
						<form action="customer_update.php" method="post" enctype="multipart/form-data"
						onsubmit="update_customerLoading();">
						
						<input type="hidden" name="group_info" value="' . htmlspecialchars($_GET["group"]) . '" />
						<input type="hidden" name="update_customer" value="' . htmlspecialchars($row_Info["customerID"]) . '" />
						
						<tr>
							<td><input id="fname" type="text" name="update_first" value="' . htmlspecialchars($row_Info['first']) . '" style="width:70px;"/></td>
							<td><input id="lname" type="text" name="update_last" value="' . htmlspecialchars($row_Info['last']) . '" style="width:70px;"/></td>
							<td><input id="title" type="text" name="update_relationship" value="' . htmlspecialchars($row_Info['relationship']) . '" style="width:140px;"/></td>
							<td><input id="loginemail" type="text" name="update_email" value="' . htmlspecialchars($row_Info['email']) . '" style="width:170px;"/></td>
							<td>';
								if ($row_Info["mobile"] == NULL) {
									echo '<input type="text" name="update_work" value="' . htmlspecialchars($row_Info['workPhone']) . '" style="width:80px;"/>';
									if ($row_Info["ext"] != NULL) {
										echo ' x<input type="text" name="update_ext" value="' . htmlspecialchars($row_Info["ext"]) . '" style="width:30px;"/>';
									}
									else {}
								}
								else if ($row_Info["workPhone"] == NULL) {
									echo '<input type="text" name="update_home" value="' . htmlspecialchars($row_Info['homePhone']) . '" style="width:80px;"/>';
								}
								else {
									echo '<input type="text" name="update_mobile" value="' . htmlspecialchars($row_Info['mobile']) . '" style="width:80px;"/>';
								}
						echo '</td>
							
							<td><input type="submit" name="submit_update" value="Update" class="edit_contact" title="Apply Changes"/></td>
						</form>';
						
						// END FORM FOR TABLE [orgCustomers] - THIS ALLOWS USERS TO UPDATE THEIR CONTACTS ON THIS PAGE
						
						
						
						echo '
							<td>
								<form action="customer_delete.php?group=' . urlencode($_GET["group"]) . '" method="POST" enctype="multipart/form-data">
									<input type="hidden" name="customerID" value="' . htmlspecialchars($row_Info["customerID"]) . '" />
									<input type="submit" name="delete" value="X" class="edit_contact" title="Delete Contact"/>
								</form>
							</td>
						</tr>';
						
					}
				}
				
				?>
			
			</table>
			</div>
		</div>
		
		<!--END SHOW CURRENT CUSTOMERS SECTION-->
		
		
		
		<br />
		
		
		
		<!--START ADD NEW CUSTOMERS SECTION-->
		
		<div>
		
			<h3 class="red_text">Add New Contact</h3>
			<p>Please enter contact information. <span class="red_text">Required fields (*).</span></p>
			
			<div id="table_add_new_contacts"><!--THIS DIV IS HERE TO SIMPLY ADD THE BACKGROUND COLOR & PADDING-->
			<form action="customer_add.php" method="POST" name="addnewcontact" enctype="multipart/form-data" onsubmit="return validateAddNewContact()">
		
				<table>
				
					<!--START GROUP ONE-->
					
					<tr>
						<td>
							<table class="font135 margin-left-3">
								<tr>
									<td>First Name <span class="red_text">*</span></td>
									<td>Last Name <span class="red_text">*</span></td>
								</tr>
							</table>
						</td>
						<td>Common / Nickname</td>
						<td>Relationship</td>
						<td>Birthday</td>
						<td>Gender</td>
					</tr>
	
					<tr>
						<!-- NOTE: USE BRACKETS IN THE INPUT NAME IN ORDER TO POST MULTIPLE DATA
							 EX.: FIRSTNAME = LISA[0], REBECCA[1], CLEO[2], PETER[3] -->
						<td>
							<table class="margin-left-3">
								<tr>
									<td><input type="text" size="132" maxlength="30" name="firstname" style="width:92px;" value="" title="Example: Sam" /></td>
									<td><input type="text" size="132" maxlength="30" name="lastname" style="width:92px;" value="" title="Example: Martin"/></td>
								</tr>
							</table>
						</td>
						<td><input type="text" size="132" maxlength="30" name="nickname" style="width:100px;" value="" title="Example: Uncle Sam"/></td>
						<td><select name="update_relationship">
							<option value="Representative">Sales Coordinator</option>
						</select></td>
						<td>    <select name="DateOfBirth_Month">
							        <option>Month</option>
							        <option value="01">Jan</option>
							        <option value="02">Feb</option>
							        <option value="03">Mar</option>
							        <option value="04">Apr</option>
							        <option value="05">May</option>
							        <option value="06">June</option>
							        <option value="07">July</option>
							        <option value="08">Aug</option>
							        <option value="09">Sept</option>
							        <option value="10">Oct</option>
							        <option value="11">Nov</option>
							        <option value="12">Dec</option>
							    </select> 
							    <select name="DateOfBirth_Day">
							        <option>Day</option>
							        <option value="01">1</option>
							        <option value="02">2</option>
							        <option value="03">3</option>
							        <option value="04">4</option>
							        <option value="05">5</option>
							        <option value="06">6</option>
							        <option value="07">7</option>
							        <option value="08">8</option>
							        <option value="09">9</option>
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
							<select name="DateOfBirth_Year">
							    <option>Year</option>
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
							    <option value="1913">1913</option>
							    <option value="1912">1912</option>
							    <option value="1911">1911</option>
							    <option value="1910">1910</option>
							    <option value="1909">1909</option>
							    <option value="1908">1908</option>
							    <option value="1907">1907</option>
							    <option value="1906">1906</option>
							    <option value="1905">1905</option>
							    <option value="1904">1904</option>
							    <option value="1903">1903</option>
							    <option value="1902">1902</option>
							    <option value="1901">1901</option>
							    <option value="1900">1900</option>
							</select></td>
						<td>
							<label>
								<select name="gender" style="width:105px;">
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
							</label>
						</td>
					</tr>
				
					<!--END GROUP ONE-->
							
							
							
					<!--START GROUP TWO-->
					
					<tr>
						<td>Email Address <span class="red_text">*</span></td>
						<td>Mobile #</td>
						<td>Work #</td>
						<td>Ext.</td>
						<td>Home #</td>
					</tr>
					
					<tr>
						<td><input type="text" size="132" maxlength="100" name="email" style="width:200px;" value="" /></td>
						<td><input type="text" size="132" maxlength="12" name="mobile" style="width:100px;" /></td>
						<td><input type="text" size="132" maxlength="12" name="work" style="width:100px;" /></td>
						<td><input type="text" size="132" maxlength="5" name="ext" style="width:100px;" /></td>
						<td><input type="text" size="132" maxlength="12" name="home" style="width:100px;" /></td>
					</tr>
					
					<!--END GROUP TWO-->
					
					
					
					<!--START GROUP THREE-->
					
					<tr>
						<td>Street Address</td>
						<td>Apt / Suite</td>
						<td>City</td>
						<td>State</td>
						<td>Zip Code</td>
					</tr>
					
					<tr>
						<td><input type="text" size="132" maxlength="100" name="address" style="width:200px;" /></td>
						<td><input type="text" size="132" maxlength="10" name="apt" style="width:100px;" /></td>
						<td><input type="text" size="132" maxlength="50" name="city" style="width:100px;" /></td>
						<td><select>
							<option value="AL">Alabama</option>
							<option value="AK">Alaska</option>
							<option value="AZ">Arizona</option>
							<option value="AR">Arkansas</option>
							<option value="CA">California</option>
							<option value="CO">Colorado</option>
							<option value="CT">Connecticut</option>
							<option value="DE">Delaware</option>
							<option value="DC">District Of Columbia</option>
							<option value="FL">Florida</option>
							<option value="GA">Georgia</option>
							<option value="HI">Hawaii</option>
							<option value="ID">Idaho</option>
							<option value="IL">Illinois</option>
							<option value="IN">Indiana</option>
							<option value="IA">Iowa</option>
							<option value="KS">Kansas</option>
							<option value="KY">Kentucky</option>
							<option value="LA">Louisiana</option>
							<option value="ME">Maine</option>
							<option value="MD">Maryland</option>
							<option value="MA">Massachusetts</option>
							<option value="MI">Michigan</option>
							<option value="MN">Minnesota</option>
							<option value="MS">Mississippi</option>
							<option value="MO">Missouri</option>
							<option value="MT">Montana</option>
							<option value="NE">Nebraska</option>
							<option value="NV">Nevada</option>
							<option value="NH">New Hampshire</option>
							<option value="NJ">New Jersey</option>
							<option value="NM">New Mexico</option>
							<option value="NY">New York</option>
							<option value="NC">North Carolina</option>
							<option value="ND">North Dakota</option>
							<option value="OH">Ohio</option>
							<option value="OK">Oklahoma</option>
							<option value="OR">Oregon</option>
							<option value="PA">Pennsylvania</option>
							<option value="RI">Rhode Island</option>
							<option value="SC">South Carolina</option>
							<option value="SD">South Dakota</option>
							<option value="TN">Tennessee</option>
							<option value="TX">Texas</option>
							<option value="UT">Utah</option>
							<option value="VT">Vermont</option>
							<option value="VA">Virginia</option>
							<option value="WA">Washington</option>
							<option value="WV">West Virginia</option>
							<option value="WI">Wisconsin</option>
							<option value="WY">Wyoming</option>
						</select></td>
						<td><input type="text" size="132" maxlength="10" name="zip" style="width:100px;" /></td>
					</tr>
					
					<!--END GROUP THREE-->
					
					
					
					<!--THIS TABLE ROW USED FOR SPACING REASONS ONLY-->
					<tr><td>&nbsp;</td></tr>
					
				</table>
				
				<input type="hidden" name="group" value="<?php echo $group; ?>" />
				<input type="submit" name="submit" value="Save New Contact" />
		
			</form>
			</div>
		
		</div>
		
		<!--END ADD NEW CUSTOMERS SECTION-->
		
		
		
	</div>
	
	<!--END MAIN CONTENT-->
	
	
	
	<?php include '../includes/footer.php' ; ?>

</div>

<!--END CONTAINER-->

</body>
</html>

<?php
   ob_end_flush();
?>