<?php
   session_start();
   if(($_SESSION['role'] == 'MemberLeader' || $_SESSION['role'] == 'Member') && isset($_SESSION['authenticated']))
       {
          //authenicated
       }
       else
       {
            header('Location: ../index.php');
            exit;
       }
   include '../includes/connection.inc.php';
   include("../includes/functions.php");
   $link = connectTo();
   if(isset($_POST['submit'])){
	   //$groupName = mysqli_real_escape_string($link, $groupName);
	   $t = mysqli_real_escape_string($link, $_POST['title']);
	   $f = mysqli_real_escape_string($link, $_POST['fname']);
	   $l = mysqli_real_escape_string($link, $_POST['lname']);
	   $e = mysqli_real_escape_string($link, $_POST['email']);
	   $p = mysqli_real_escape_string($link, $_POST['phone']);
	   $ad1 = mysqli_real_escape_string($link, $_POST['address1']);
	   $ad2 = mysqli_real_escape_string($link, $_POST['address2']);
	   $city = mysqli_real_escape_string($link, $_POST['city']);
	   $state = mysqli_real_escape_string($link, $_POST['state']);
	   $zip = mysqli_real_escape_string($link, $_POST['zip']);
	   $fb = mysqli_real_escape_string($link, $_POST['fb']);
	   $tw = mysqli_real_escape_string($link, $_POST['tw']);
	   $cn = mysqli_real_escape_string($link, $_POST['cn']);
	   $rel = mysqli_real_escape_string($link, $_POST['rel']);
	   $ext = mysqli_real_escape_string($link, $_POST['ext']);
	   $gen = mysqli_real_escape_string($link, $_POST['gender']);
	   
	   $who = mysqli_real_escape_string($link, $_POST['who']);
	   $xgroup = mysqli_real_escape_string($link, $_POST['gp']);
	   $query2 = "UPDATE orgContacts SET
  				Title = '$t',
  				orgFName = '$f',
  				orgLName = '$l',
  				orgEmail = '$e',
  				orgPhone = '$p'
  				WHERE orgContactID = '$who'";
  	$result2 = mysqli_query($link, $query2)or die("MySQL ERROR: ".mysqli_error($link)); 
  	$query3 = "UPDATE orgCustomers SET
  				first = '$f',
  				last = '$l',
  				companyname = '$cn',
  				relationship = '$rel',
  				gender = '$gen',
  				email = '$e',
  				workPhone = '$p',
  				ext = '$ext',
  				address = '$ad1',
  				apt = '$ad2',
  				city = '$city',
  				state = '$state',
  				zip = '$zip',
  				image_path = '$p',
  				title = '$t'
  				WHERE customerID = '$who'";
  	$result3 = mysqli_query($link, $query3)or die("MySQL ERROR: ".mysqli_error($link)); 
  	if($result2&& $result3){
  	   
  	    $redirect = "Location:contacts.php?group=$xgroup";
  	    header("$redirect");
  	}
  	}
// Get fundraiser name
   $who = $_GET['con'];
   
   $groupID = $_SESSION['groupid'];
   $cs = "SELECT * FROM orgCustomers WHERE fundMemberID = '$groupID' AND customerID = '$who'";
   $cs_result = mysqli_query($link, $cs) or die(mysqli_error($link));
   if($cs_result){
    $row = mysqli_fetch_assoc($cs_result);
    $title = $row['title'];
    $fn = $row['first'];
    $ln = $row['last'];
    $em = $row['email'];
    $ad1 = $row['address'];
    $ad2 = $row['apt'];
    $cty = $row['city'];
    $st = $row['state'];
    $zp = $row['zip'];
    $phn = $row['workPhone'];
    $ex = $row['ext'];
    $gender = $row['gender'];
    $rel = $row['relationship'];
    $cn = $row['companyname'];

    $query1 = "SELECT * FROM Dealers WHERE loginid='$groupID'";
       $result1 = mysqli_query($link, $query1)or die("MySQL ERROR query 1: ".mysqli_error($link));
       $row1 = mysqli_fetch_assoc($result1);
       $dealerID = $row1['loginid'];
       $group = $row1['setuppersonid']; 
       $myPic = $row1['contact_pic'];
       $goal = $row1['goal2'];
       $so_far = getSoloSales($dealerID);
       $banner = $row1['banner_path'];
       
       
       $userID = $_SESSION['userId'];
       $userEmail = $_SESSION['email'];
    
} 
?>
<!DOCTYPE html>
<head>
	<title>GreatMoods | Setup/Edit Website - Fundraising Contacts</title>
</head>

<body>
<div id="container">
	<?php include 'header.php' ; ?>
        <?php include 'memberSidebar.php' ; ?>

      	<div id="content">
    
    <h1>Edit Fundraiser Contact</h1>
    <h3></h3>
    
     <form method="post" action="editContact.php" enctype="multipart/form-data">
     	<div class="table">
     		<div class="simpleTabs">
		<!--<ul class="simpleTabsNavigation">
			<li><a href="#">Information</a></li>
			<li><a href="#">Account Login</a></li>
			<li><a href="#">Social Media</a></li>
			<li><a href="#">Profile Photo</a></li>
		</ul>-->
		
		<div class="interim-form">
			<div class="interim-header"><h2>Contact Information</h2></div>
			<div class="row">
				<!--<span>[Group] Leader Type: </span>--> <!-- [Group] = same as the selected group above -->
				<!--<select name="title[]">
					<option value="" selected>Select Leader</option>
					<option value="">-depends on group-</option>
					<option value=""></option>
					<option value=""></option>
					<option value=""></option>
					<option value="">Other/Custom (Specify)</option>--> <!-- If Other/Custom is selected, then display input field below -->
				<!--</select>
				<span>Other/Custom:</span>
				<input id="fltype" type="text" name="" value="<? echo $title;?>">-->
			</div> <!-- end row -->
			
			
			<div class="row"> <!-- title -->
							<span id="hd_cname">Company Name</span>
						</div> <!-- end row -->
						<div class="row"> <!-- input -->
							<input id="cn" type="text" name="cn" value="<? echo $cn;?>">
						</div> 
			<div class="row"> <!-- titles -->		
			      						
				<span id="hd_fname">First</span>
				<span id="hd_lname">Last</span>
				<span id="hd_title">Title</span>
				<span id="hd_gender">Gender</span>
			</div> <!-- end row -->
			<div class="row"> <!-- inputs -->
				<input id="fname" type="text" name="fname" value="<? echo $fn;?>" required>
				<input id="lname" type="text" name="lname" value="<? echo $ln;?>" required>
				<input id="title" type="text" name="title" value="<? echo $title; ?>">
				<select id="gender" name="gender">
				<option value="<?php echo $gender; ?>" selected><?php echo $gender; ?></option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
				</select>
			</div> <!-- end row -->
		
			<table>
				<tr>
					<td id="td_1">
						<div class="row"> <!-- title -->
							<span id="hd_rel">Relationship</span>
						</div> <!-- end row -->
						<div class="row"> <!-- input -->
							<input id="rel" type="text" name="rel" value="<? echo $rel;?>" required>
						</div> <!-- end row -->
						
						<div class="row"> <!-- title -->
							<span id="hd_address1">Address 1</span>
						</div> <!-- end row -->
						<div class="row"> <!-- input -->
							<input id="address1" type="text" name="address1" value="<? echo $ad1;?>" >
						</div> <!-- end row -->
						
						<div class="row"> <!-- title -->
							<span id="hd_address2">Address 2</span>
						</div> <!-- end row -->
						<div class="row"> <!-- input -->
							<input id="address2" type="text" name="address2" value="<? echo $ad2;?>">
						</div> <!-- end row -->
										
						<div class="row"> <!-- titles -->
							<span id="hd_city">City</span>
							<span id="hd_state">State</span>
							<span id="hd_zip">Zip</span>
						</div> <!-- end row -->
						<div class="row"> <!-- inputs -->
							<input id="city" type="text" name="city" value="<? echo $cty;?>" >
							<select id="state" name="state">
								<option value="<?php echo $st;?>"><?php echo $st;?></option>
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
							<input id="zip" type="text" name="zip" maxlength="5" value="<? echo $zp;?>">
						</div> <!-- end row -->
						<div class="row"> <!-- titles -->
							<span id="hd_wphone">Primary Phone</span>
							<span id="hd_ext">Ext</span>
						</div> <!-- end row -->
						<div class="row">
			<input id="phone" type="text" name="phone" value="<? echo $phn;?>">
			<input id="ext" type="text" name="ext" value="<? echo $ex;?>" maxlength="5" >
						</div> <!-- end row -->
					</td>
					
				
					<td id="td_2">
						<!--<div class="row"> <!-- titles -->
							<!--<span id="hd_mphone">Mobile Phone</span>
						</div> <!-- end row -->
						<!--<div class="row"> <!-- inputs -->
							<!--<input id="mphone1" type="text" name=""><input id="mphone2" type="text" name=""><input id="mphone3" type="text" name="">
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
						<!--<div class="row">
							<span id="hd_hphone">Home Phone</span>
						</div> <!-- end row -->
						<!--<div class="row">
							<input id="hphone1" type="text" name=""><input id="hphone2" type="text" name=""><input id="hphone3" type="text" name="">
						</div> <!-- end row --></td>
				</tr>
			</table>
							
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
				<input id="email" type="email" name="email" value="<? echo $em;?>" required>
			</div> <!-- end row -->
			
			<div id="row"> <!-- titles -->
			
			</div> <!-- end row -->
			<div id="row"> <!-- inputs -->
			
			</div> <!-- end row -->
		</div> <!-- end tab 2 -->
		
		 <!--<div class="interim-form"> profile pic tab4
			<div class="interim-header"><h2>Contact Photo</h2></div>
			<div class="row"> 
				<span id="">Upload Profile Photo:</span>
				<input type="file" id="" name="">
				<input type="submit" class="redbutton" value="Upload Photo">
				<br><br>
			</div>  --><!-- end row -->
		<!-- </div> end tab4 content (profile pic) -->
	</div> <!-- end simple tabs -->
     	
     	<br>
	
	<div class="row">
		<input type="hidden" name="who" value="<? echo $who;?>" />
		<input type="hidden" name="gp" value="<? echo $gp;?>" />
		<input type="submit" name="submit" class="redbutton" value="Save" />
	</div> <!-- end row -->
        </div> <!-- end table -->
        </form>
        
        <br>
        
          </div> <!--end content-->
          
      <?php include '../includes/footer.php' ; ?>
    </div> <!--end container-->

</body>
<?php
   ob_end_flush();
?>