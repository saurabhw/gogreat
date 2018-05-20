<?php
session_start();

/*if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }*/

?>
<!DOCTYPE html>
<head>
	<meta charset="UTF-8" />
	<title>GreatMoods | Executive</title>
	<link rel="shortcut icon" href="../images/favicon.ico">
	
	<link href="../css/layout_styles.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="../css/addnew_form_styles.css" />
	<link rel="stylesheet" type="text/css" href="../css/simpletabs_styles.css" />
	
	<script type="text/javascript" src="../js/simpletabs_1.3.js"></script>
</head>

<body>
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <br><br>
      <?php include 'sidenav.php' ; ?>

      <div id="content">
          <h1>Add Business Supporter</h1>
          <h3></h3>
		
		<div class="table">	
			<form class="graybackground" action="" method="">
				<!--<h3>--Option 1: Add One Business Supporter--</h3>-->
					<div class="tablerow">
						<span id="hd_vp2">Vice President:</span>
						<span id="hd_sc2">Sales Coordinator:</span>
						<span id="hd_rp2">Representive:</span>
						<span id="hd_gmfr2">Fundraiser Account:</span>
						<span id="hd_fg2">Group:</span>
						<span id="hd_fm2">Member:</span>
					</div> <!-- end row -->
					
					<div class="tablerow">
						<select class="role2">
							<option>Select VP Account</option>
							<option></option>
							<option></option>
							<option></option>
							<option></option>
						</select>
						<select class="role2">
							<option>Select SC Account</option>
							<option></option>
							<option></option>
							<option></option>
							<option></option>
						</select>
						<select class="role2">
							<option>Select RP Account</option>
							<option></option>
							<option></option>
							<option></option>
							<option></option>
						</select>
						<select class="role2">
							<option>Select FR Account</option>
							<option></option>
							<option></option>
							<option></option>
							<option></option>
						</select>
						<select class="role2">
							<option>Select Group</option>
							<option></option>
							<option></option>
							<option></option>
							<option></option>
						</select>
						<select class="role2">
							<option>Select Member</option>
							<option></option>
							<option></option>
							<option></option>
							<option></option>
						</select>
					</div> <!-- end row -->
				
				<div class="simpleTabs">
					<!--<ul class="simpleTabsNavigation">
						<li><a href="#">Information</a></li>
						<li><a href="#">Primary Contact</a></li>
						<li><a href="#">Profile Photo</a></li>
					</ul>-->
					
					<div class="interim-form">
						<div class="interim-header"><h2>Business Contact Information</h2></div>
						<!--<div class="tablerow">
							<span>Business Supporter Type: </span>
							<select name="">
								<option value="">Select Type</option>
								<option value="">Bank</option>
								<option value="">Accounting</option>
								<option value="">Law Firm</option>
								<option value="">Local Co-Op</option>
								<option value="">Real Estate</option>
							</select>
						</div> <!-- end row -->
				
						<div class="tablerow"> <!-- titles -->
							<span id="hd_cname">Company Name</span>
						</div> <!-- end row -->
						<div class="tablerow"> <!-- inputs -->
							<input id="cname" type="text" name="" value="">
						</div> <!-- end row -->
						
						<div class="tablerow"> <!-- titles -->
							<span id="hd_address1">Address 1</span>
						</div> <!-- end row -->
						<div class="tablerow"> <!-- inputs -->
							<input id="address1" type="text" name="" value="">
						</div> <!-- end row -->
						
						<div class="tablerow">
							<span id="hd_address2">Address 2</span>
						</div> <!-- end row -->
						<div class="tablerow">
							<input id="address2" type="text" name="" value="">
						</div> <!-- end row -->
									
						<div class="tablerow"> <!-- titles -->
							<span id="hd_city">City</span>
							<span id="hd_state">State</span>
							<span id="hd_zip">Zip</span>
						</div> <!-- end row -->
						<div class="tablerow"> <!-- inputs -->
							<input id="city" type="text" name="" value="">
							<select id="state" name="State">
								<option value="" selected>--</option>
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
							<input id="zip" type="text" name="" value="">
						</div> <!-- end row -->			
					</div> <!-- end tab 1 -->
						
					<div class="interim-form">
						<div class="interim-header"><h2>Primary Contact</h2></div>
						<div class="tablerow">
							<span id="hd_fname">First</span>
							<span id="hd_mname">Middle</span>
							<span id="hd_lname">Last</span>
							<!--<span id="hd_pname" title="Preferred First Name">Preferred</span>
							<span id="hd_title">Title</span>-->
						</div>
						<div class="tablerow">
							<input id="fname" type="text" name="" value="">
							<input id="mname" type="text" name="" value=""> 
							<input id="lname" type="text" name="" value="">
							<!--<input id="pname" type="text" name="">
							<select name="">
								<option value="">---</option>
								<option value="">Mr.</option>
								<option value="">Ms.</option>
								<option value="">Mrs.</option>
								<option value="">Miss</option>
								<option value="">Dr.</option>
							</select>   -->                         
						</div> <!-- end row -->
						
							<table>
								<tr>
									<td id="td_1">
										<div class="tablerow">
											<span id="hd_loginemail">Email Address</span>
											<span id="hd_password">Password</span>
										</div> <!-- end row -->
										<div class="tablerow">
											<input id="loginemail" type="text" name="" value="">  
											<input id="password" type="text" name="" value="">                                
										</div> <!-- end row -->
									</td>

									<td id="td_2">
										<div class="tablerow">	
											<span id="hd_wphone">Work Phone</span>
											<span id="hd_ext">Ext</span>
										</div> <!-- end row -->	
										<div class="tablerow">
											<input id="wphone1" type="text" name="" value="">
											<!--<input id="wphone2" type="text" name="" value="">
											<input id="wphone3" type="text" name="" value="">-->
											<input id="ext" type="text" name="" value="">
										</div> <!-- end row -->	
									</td>
								</tr>
							</table>
					</div> <!-- end tab2 content (primary contact) -->
						
					<div class="interim-form"> <!-- profile pic tab3 -->
						<div class="interim-header"><h2>Profile Photo</h2></div>
						<div class="tablerow"> 
							<span id="">Upload Profile Photo:</span>
							<input type="file" id="" name="">
							<input type="submit" class="redbutton" value="Upload Photo">
							<br><br>
							<span id="">Preview Photo:</span>
							<img src="" alt="uploaded profile photo">
						</div> <!-- end row -->
					</div> <!-- end tab3 content (profile pic) -->
				</div> <!-- end simple tabs -->
							
				<input class="redbutton" type="submit" name="" value="Add New Business Supporter">
				<input class="redbutton" type="submit" name="" value="Save & Add Another Supporter">
			</form>

			<br>
			
			<!--<form class="graybackground">
				<h3>--Option 2: Add Multiple Business Supporters--</h3>
				<h2>How To Add Multiple Accounts</h2><br>
				<ol>
					<li><a href="">Download</a> Our Business Supporter Setup Spreadsheet</li>
					<li>Input the Data for Each Business Supporter Account you Want to Add</li>
					<li>Upload the Completed Spreadsheet Below...</li>
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