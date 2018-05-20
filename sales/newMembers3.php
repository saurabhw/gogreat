<?php
    include '../includes/autoload.php';

  if(!isset($_SESSION['authenticated']))
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
   $query = "SELECT * FROM user_info WHERE userInfoID='$userID'";
   $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysqli_error($link));
   $row = mysqli_fetch_assoc($result);
   $myPic = $row['picPath'];
       
?>

<!DOCTYPE html>
<head>
	<title>Add New Members</title> 
<style>
#border{
background-color:#f8f8f8;
box-shadow: 0px 0px 15px #888888;
padding:15px 35px 40px 35px; 
}
</style>
</head>
	
<body>
      <?php include 'header.inc.php' ; ?>
      <?php include 'sidenav.php' ; ?>
    <div class="container" id="getStartedContent" >
        <div class="row-fluid">
	<div id="Single" class="tabcontent">

 <div class="page-header">
    <h2 align="center">Add Fundraiser Member</h2>
</div>
 <div class=" col-md-7 col-md-push-2" id="bizAssociate-col">
<br>
<div id="border"><br>
      <ul class="tab" style="margin-left:15px;line-height:25px;">
	  <li><a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'Single')" id="defaultOpen">Add Single Member</a></li>
	  <li><a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'Multiple')">Upload Multiple Members</a></li>
	</ul>

		<form class="" action="addFundMember.php" method="Post" id="myForm" name="myForm" onsubmit="return validate();" onsubmit="return checkForm(this);" enctype="multipart/form-data">
			<div class="table">
				<!--<h3 style="margin-left:15px;" style="margin-left:15px;">--Option 1: Add One Member--</h3>-->
				<div class="row" style="margin-left:15px;">
						<span style="line-height:35px;" id="hd_rp4">Representive:</span>
						<span style="line-height:35px;" id="hd_gmfr4">Fundraiser Account:</span>
						
					</div> <!-- end row -->
					
				<div class="row" style="margin-left:15px;">
					
			  <select class="role4" name="rpid" id="rpid" onChange="fetch_select6(this.value);" required>
			     <option value="">Select Representative</option>
			     <?
				      		$sql = "SELECT * FROM distributors WHERE setupID = '$userID' AND role = 'RP'";
						$result2 = mysqli_query($link, $sql)or die ("couldn't execute query distrubutors.".mysqli_error($link));
					
						while($row2 = mysqli_fetch_assoc($result2))
						{
				                   echo '<option value="'.$row2[loginid].'">'.$row2['FName'].' '.$row2[LName].'</option>';
					        }
					        ?>
				      		
			      		</select>
					<select class="role4" name="groupid" id="groupid" required>
						<option value="">Select Group</option>	
					</select>
							<!--<select class="role4" id="new_select" name="new_select">
							
						</select>-->
					</div> <!-- end row -->
				
				<div class="simpleTabs">
					<!--<ul class="simpleTabsNavigation">
						<li><a href="#">Information</a></li>
						<li><a href="#">Account Login</a></li>
						<li><a href="#">Social Media</a></li>
						<li><a href="#">Profile Photo</a></li>
					</ul>-->
					
					<div class="interim-form">
						<div class="interim-header"><br><hr style="border-color:#b8b8b8;margin-left:15px;"><h3 style="margin-left:15px;">Member Contact Information</h3></div> <!-- group based off selected value above -->
				
						<!--<span style="line-height:35px;">Member Title:</span>
						<select name="">
							<option value="">Select Member Title</option>
							<option value="">-depends on group-</option>
							<option value=""></option>
							<option value=""></option>
							<option value=""></option>
						</select>-->
						
						<div class="row" style="margin-left:15px;"> <!-- titles -->									
							<span style="line-height:35px;" id="hd_fname">First</span>
							<span style="line-height:35px;margin-left:129px;" id="hd_lname">Last</span>
							<span style="line-height:35px;margin-left:128px;" id="hd_title">Title</span>
							<span style="line-height:35px;margin-left:28px;" id="hd_gender">Gender</span>
						</div> <!-- end row -->
						<div class="row" style="margin-left:15px;"> <!-- inputs -->
							<input id="fname" type="text" name="fname" required>
							<!--<input id="mname" type="text" name="mname">-->
							<input id="lname" type="text" name="lname" required>
							<!--<input id="pname" type="text" name="">-->
							<select name="title">
								<option value="">---</option>
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
						</div> <!-- end row -->
					
						<table>
							<tr>
								<td id="td_1">
									<div class="row" style="margin-left:15px;"> <!-- title -->
										<span style="line-height:35px;" id="hd_address1">Address 1</span>
									</div> <!-- end row -->
									<div class="row" style="margin-left:15px;"> <!-- input -->
										<input id="address1" type="text" name="address1">
									</div> <!-- end row -->
									
									<div class="row" style="margin-left:15px;"> <!-- title -->
										<span style="line-height:35px;" id="hd_address2">Address 2</span>
									</div> <!-- end row -->
									<div class="row" style="margin-left:15px;"> <!-- input -->
										<input id="address2" type="text" name="address2">
									</div> <!-- end row -->
													
									<div class="row" style="margin-left:15px;"> <!-- titles -->
										<span style="line-height:35px;" id="hd_city">City</span>
										<span style="line-height:35px;margin-left:129px;" id="hd_state">State</span>
										<span style="line-height:35px;margin-left:17px;" id="hd_zip">Zip</span>
									</div> <!-- end row -->
									<div class="row" style="margin-left:15px;"> <!-- inputs -->
										<input id="city" type="text" name="city" >
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
										<input id="zip" type="text" name="zip" maxlength="5" >
									</div> <!-- end row -->
									<div class="row" style="margin-left:15px;"> <!-- titles -->
										<span style="line-height:35px;" id="hd_wphone">Primary Phone</span>
										<!--<span style="line-height:35px;" id="ext">Ext</span>-->
									</div> <!-- end row -->
									<div class="row" style="margin-left:15px;">
										<input id="phone" type="text" name="phone" maxlength="14"><!--<input id="wphone2" type="text" name=""><input id="wphone3" type="text" name="">-->
										<!--<input id="ext" type="text" name="ext" maxlength="5">-->
									</div> <!-- end row -->
									
								</td>
							
								<td id="td_2">
									<!--<div class="row" style="margin-left:15px;"> <!-- titles -->
										<!--<span style="line-height:35px;" id="hd_mphone">Mobile Phone</span>
									</div> <!-- end row -->
									<!--<div class="row" style="margin-left:15px;"> <!-- inputs -->
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
									<!--<div class="row" style="margin-left:15px;">
										<span style="line-height:35px;" id="hd_hphone">Home Phone</span>
									</div> <!-- end row -->
									<!--<div class="row" style="margin-left:15px;">
										<input id="hphone1" type="text" name=""><input id="hphone2" type="text" name=""><input id="hphone3" type="text" name="">
									</div> <!-- end row -->
								
								</td>
							</tr>
						</table>
										
						<!--<div class="row" style="margin-left:15px;"> <!-- titles -->
							<!--<span style="line-height:35px;" id="hd_bday">Birthday</span>
							<span style="line-height:35px;" id="hd_gender">Gender</span>
						</div> <!-- end row -->
						<!--<div class="row" style="margin-left:15px;"> <!-- inputs -->
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
					</div> <!-- end  -->
					
					<div class="interim-form">
						<div class="interim-header"><br><hr style="border-color:#b8b8b8;margin-left:15px;"><h3 style="margin-left:15px;">Account Login</h3></div>
						<div class="row" style="margin-left:15px;"> <!-- titles -->
							<span style="line-height:35px;" id="hd_loginemail">Email Address</span>
						</div> <!-- end row -->
						<div class="row" style="margin-left:15px;"> <!-- inputs -->
							<input id="email" type="email" name="email" value="" required>
						</div> <!-- end row -->
						
						<div class="row" style="margin-left:15px;"> <!-- titles -->
						<span style="line-height:30px;margin-top:-30px;" id="hd_password">Password</span>
						<span style="line-height:30px;margin-top:-30px;margin-left:92px;" id="hd_cpassword">Confirm Password</span>
						</div> <!-- end row -->
						<div class="row" style="margin-left:15px;"> <!-- inputs -->
							<input id="pass1" type="password" name="password" value="" required>
							<input id="pass2" type="password" name="cpassword" onkeyup="checkPass(); return false;" value="" required>
							<span style="line-height:35px;" id="error"></span>
						</div> <!-- end row -->
					</div> <!-- end  -->
					
					<div class="interim-form">
						<div class="interim-header"><br><hr style="border-color:#b8b8b8;margin-left:15px;"><h3 style="margin-left:15px;">Social Media Connections</h3></div>
						<div class="row" style="margin-left:15px;"> 
							<span style="line-height:35px;" id="hd_fb">Facebook</span>
							<input style="width:200px;" id="fb" type="text" name="fb" value="" placeholder="www.facebook.com">
						</div> <!-- end row -->
						<br>
						<div class="row" style="margin-left:15px;"> 
							<span style="line-height:35px;" id="hd_tw">Twitter</span>
							<input style="width:200px;" id="tw" type="text" name="tw" value="" placeholder="www.twitter.com">
						</div> <!-- end row -->
						<br>
						<div class="row" style="margin-left:15px;"> 
							<span style="line-height:35px;" id="hd_li">LinkedIn</span>
							<input style="width:200px;" id="li" type="text" name="li" value="" placeholder="www.linkedin.com">
						</div> <!-- end row -->
						<!--<div class="row"> 
							<span style="line-height:35px;" id="hd_pn">Pinterest</span>
							<input id="pn" type="text" name="" value="" placeholder="www.pinterest.com">
						</div> <!-- end row -->
						<!--<div class="row">
							<span style="line-height:35px;" id="hd_gp">Google+</span>
							<input id="gp" type="text" name="" value="" placeholder="plus.google.com">
						</div> <!-- end row -->
					</div> <!-- end  -->
					
					<div class="interim-form"> <!-- profile pic tab5 -->
						<div class="interim-header"><br><hr style="border-color:#b8b8b8;margin-left:15px;"><h3 style="margin-left:15px;">Profile Photo</h3></div>
						<div class="row" style="margin-left:15px;"> 
							<span style="line-height:35px;" id="">Upload Profile Photo:</span>
							<input type="file" id="" name="uploaded_file">
							
							
						</div> <!-- end row -->
					</div> <!-- end tab5 content (profile pic) -->
				</div> <!-- end simple tabs -->
			
				<div class="row" style="margin-left:15px;"><br><br>
					<input type="submit" name="submit" class="redbutton" value="Add New Member">
					
				</div> <!-- end row -->
			</div> <!-- end table -->
		</form>
		
		<br>

    </div>

    <div id="Multiple" class="tabcontent">
     	<h1>Upload Members</h1>
          <form name="import" method="post" action="uploadMembers.php" enctype="multipart/form-data">
          
          <h3 style="margin-left:15px;" style="margin-left:15px;">How To Add Multiple Members</h3>
				<ol>
					<li><a href="download.php">Download</a> Our Member Setup Spreadsheet</li>
					<li>Input the Data for Each Member You want to Add.</li>
					<li>Enter a 6 character password for each member.</li>
					<li>Select Fundraiser Account from Drop Down Menu (see below)</li>
					<li>Upload the Completed Spreadsheet (see below)</li>
				</ol>
          			
			<br>
			
			<p class="nospace">Label your spreadsheet columns from left to right as follows:</p>
		          <table>
		          	<tr>
			          <th>Title</th>
			          <th>First Name</th>
			          <th>Last Name</th>
			          <th>Phone Number</th>
			          <th>Email Address</th>
			          <th>Password</th>
			          </tr>
		          </table>
          
          		<br>
          		
          	<div class="table">
          		<div class="row" style="margin-left:15px;">
						<span style="line-height:35px;" id="hd_rp4">Representive:</span>
						<span style="line-height:35px;" id="hd_gmfr4">Fundraiser Account:</span>
						
					</div> <!-- end row -->
					
				<div class="row" style="margin-left:15px;">
					
			  <select class="role4" name="rpid2" id="rpid2" onChange="fetch_select17(this.value);" required>
			     <option value="">Select Representative</option>
			     <?
				      		$sql = "SELECT * FROM distributors WHERE setupID = '$userID' AND role = 'RP'";
						$result2 = mysqli_query($link, $sql)or die ("couldn't execute query distrubutors.".mysql_error());
					
						while($row2 = mysqli_fetch_assoc($result2))
						{
				                   echo '<option value="'.$row2[loginid].'">'.$row2['FName'].' '.$row2[LName].'</option>';
					        }
					        ?>
				      		
			      		</select>
					<select class="role4" name="groupid2" id="groupid2" required>
						<option value="">Select Group</option>	
					</select>
							<!--<select class="role4" id="new_select" name="new_select">
							
						</select>-->
					</div> <!-- end row -->
				
          	</div> <!-- end table -->
          	
          	<br>
          		
          	<span style="line-height:35px;">4. </span><input type="file" name="file" required>

        	<input type="submit" name="submit" value="Submit" class="redbutton">
	</form>


<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
          </div> <!--end content -->
 	    </div>
    </div> 
</div>
</div> <!--end container-->
<br>
	<?php include 'footer.php' ; ?>
</body>
</html>
<!--<pre>
<?php if ($_POST && $mailSent){
	echo htmlentities($message, ENT_COMPAT, 'UTF-8')."\n";
	echo 'Headers: '.htmlentities($headers, ENT_COMPAT, 'UTF-8');
} ?>
</pre>-->
<?php
   ob_end_flush();
?>