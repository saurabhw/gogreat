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
          <h1>Add Fundraiser Account</h1>
          <h3></h3>
		
		<div class="table">
			<form class="graybackground" action="" method="POST">
			<!--<h3>--Option 1: Add One Account--</h3>-->
				<div class="tablerow">
						<span id="hd_vp2">Vice President:</span>
						<span id="hd_sc2">Sales Coordinator:</span>
						<span id="hd_rp2">Representative:</span>
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
					</div> <!-- end row -->
			
				<div class="simpleTabs">
					<!--<ul class="simpleTabsNavigation">
						<li><a href="#">Information</a></li>
						<li><a href="#">Banner</a></li>
						<li><a href="#">Social Media</a></li>
					</ul>-->
					
					<div class="interim-form">
						<div class="tablerow">
							<div class="interim-header"><h2>Specify Account Type</h2></div>
							<select id="category" name="category">
								<option selected>Select Organization</option>
								<option value="All Categories">All Categories</option>
								<option value="Educational Organizations">Educational Organizations</option>
								<option value="Faith Groups">Faith Groups</option>
								<option value="Community Organizations">Community Organizations</option>
								<option value="Youth & Sports Organizations">Youth & Sports Organizations</option>
								<option value="Local & National Charities">Local & National Charities</option>
								<option value="National Organizations">National Organizations</option>
								<option value="Individual Charity">Individual Charity</option>
								<option value="Other">Other</option>
							</select>
							<select id="type" name="type">
								<option selected>Select Category</option>
								<option value="All Educational Types">All Educational Types</option>
								<option value="4yr College">4yr College</option>
								<option value="2yr College">2yr College</option>
								<option value="High School">High School</option>
								<option value="Middle School">Middle School</option>
								<option value="Elementary School">Elementary School</option>
								<option value="Home School">Home School</option>
								<option value="Preschool School">Preschool School</option>
								<option value="Other">Other</option>
							</select>
							<select id="subtype" name="subtype">
								<option selected>Select Sub-Category</option>
								<option value="All Sub-Types">All Sub-Types</option>
								<option value="Public" >Public</option>
								<option value="Private">Private</option>
								<option value="Christian">Christian</option>
								<option value="Charter">Charter</option>
							</select>
						</div> <!-- end row -->
						
						<br>
						
						<div class="interim-header"><h2>Contact Information</h2></div> <!-- Category is based off selected value above -->
						<div class="tablerow"> <!-- titles -->
							<span id="hd_frname">Name</span> 
						</div> <!-- end row -->
						<div class="tablerow"> <!-- inputs -->
							<input id="frname" type="text" name="frname" value="">
							
						</div> <!-- end row -->

						<div class="tablerow"> <!-- titles -->
							<span id="hd_address1">Address 1</span>
							<span id="hd_wphone">Work Phone</span>
							<span id="ext">Ext</span>
							
						</div> <!-- end row -->
						<div class="tablerow"> <!-- inputs -->
							<input id="address1" type="text" name="address1" value="">
							<input id="wphone1" type="text" name="wphone1"><!--<input id="wphone2" type="text" name="wphone2"><input id="wphone3" type="text" name="wphone3">-->
							<input id="ext" type="text" name="ext">
						</div> <!-- end row -->
								<div class="tablerow">
										<span id="hd_address2">Address 2</span>
								</div><!-- end row -->
								<div class="tablerow">
									<input id="address2" type="text" name="address2" value="">
								</div><!-- end row -->
						
						<div class="tablerow"> <!-- titles -->
							<span id="hd_city">City</span>
							<span id="hd_state" >State</span>
							<span id="hd_zip1">Zip</span>
						</div> <!-- end row -->
						<div class="tablerow"> <!-- inputs -->
							<input id="city" type="text" name="city" value="">
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
							<input id="zip" type="text" name="zip" value="">
						</div> <!-- end row -->
					</div> <!-- end tab 1 -->
					
					<div class="interim-form">
						<div class="interim-header"><h2>Website Banner</h2></div> <!-- this part will be replaced with banner creator -->
						<div id="tablerow"> 
							<span id="hd_url">Existing Website URL</span>
							<input id="url" type="text" name="url">
						</div> <!-- end row -->
						<div id="tablerow"> 
							<span id="hd_banner">Upload Banner</span>
							<input id="banner" type="file" name="file">
						</div> <!-- end row -->
					</div> <!-- end tab 2 -->
					
					<div class="interim-form">
						<div class="interim-header"><h2>Add Fundraiser Group(s)</h2></div>
						<div class="groupcolumn1">
							<h7>Education</h7><br>
							<h8>Elementary School</h8><br>
							<span id="">Clubs & Organizations</span><br>
							<div class="checkboxes">
								<input type="checkbox" name="" value=""><label>Select All Groups</label> <br>
								<input type="checkbox" name="" value=""><label></label> <br>
								<input type="checkbox" name="" value=""><label></label> <br>

							</div> <!-- end checkboxes -->
							<span id="">General</span><br>
							<div class="checkboxes">
								<input type="checkbox" name="" value=""><label>Select All Groups</label> <br>
								<input type="checkbox" name="" value=""><label></label> <br>
								<input type="checkbox" name="" value=""><label></label> <br>

							</div> <!-- end checkboxes -->
							<span id="">Athletics</span><br>
							<div class="checkboxes">
								<input type="checkbox" name="" value=""><label>Select All Groups</label> <br>
								<input type="checkbox" name="" value=""><label></label> <br>
								<input type="checkbox" name="" value=""><label></label> <br>

							</div> <!-- end checkboxes -->
							
							<h8>High School</h8><br>
							<span id="">Clubs & Organizations</span><br>
							<div class="checkboxes">
								<input type="checkbox" name="" value=""><label>Select All Groups</label> <br>
								<input type="checkbox" name="" value=""><label></label> <br>
								<input type="checkbox" name="" value=""><label></label> <br>

							</div> <!-- end checkboxes -->
							<span id="">General</span><br>
							<div class="checkboxes">
								<input type="checkbox" name="" value=""><label>Select All Groups</label> <br>
								<input type="checkbox" name="" value=""><label></label> <br>
								<input type="checkbox" name="" value=""><label></label> <br>

							</div> <!-- end checkboxes -->
							<span id="">Athletics</span><br>
							<div class="checkboxes">
								<input type="checkbox" name="" value=""><label>Select All Groups</label> <br>
								<input type="checkbox" name="" value=""><label></label> <br>
								<input type="checkbox" name="" value=""><label></label> <br>

							</div> <!-- end checkboxes -->
							
							<h8>College</h8><br>
							<span id="">Clubs & Organizations</span><br>
							<div class="checkboxes">
								<input type="checkbox" name="" value=""><label>Select All Groups</label> <br>
								<input type="checkbox" name="" value=""><label></label> <br>
								<input type="checkbox" name="" value=""><label></label> <br>

							</div> <!-- end checkboxes -->
							<span id="">General</span><br>
							<div class="checkboxes">
								<input type="checkbox" name="" value=""><label>Select All Groups</label> <br>
								<input type="checkbox" name="" value=""><label></label> <br>
								<input type="checkbox" name="" value=""><label></label> <br>

							</div> <!-- end checkboxes -->
							<span id="">Athletics</span><br>
							<div class="checkboxes">
								<input type="checkbox" name="" value=""><label>Select All Groups</label> <br>
								<input type="checkbox" name="" value=""><label></label> <br>
								<input type="checkbox" name="" value=""><label></label> <br>

							</div> <!-- end checkboxes -->
							
							<h8>Trade, Vocational & Tech School</h8><br>
							<div class="checkboxes">
								<input type="checkbox" name="" value=""><label>Select All Groups</label> <br>
								<input type="checkbox" name="" value=""><label></label> <br>
								<input type="checkbox" name="" value=""><label></label> <br>

							</div> <!-- end checkboxes -->
							
							<h8>Preschool</h8><br>
							<div class="checkboxes">
								<input type="checkbox" name="" value=""><label>Select All Groups</label> <br>
								<input type="checkbox" name="" value=""><label></label> <br>
								<input type="checkbox" name="" value=""><label></label> <br>

							</div> <!-- end checkboxes -->
							
							<h8>Home School</h8><br>
							<div class="checkboxes">
								<input type="checkbox" name="" value=""><label>Select All Groups</label> <br>
								<input type="checkbox" name="" value=""><label></label> <br>
								<input type="checkbox" name="" value=""><label></label> <br>

							</div> <!-- end checkboxes -->
							
							<h8>Camp</h8><br>
							<div class="checkboxes">
								<input type="checkbox" name="" value=""><label>Select All Groups</label> <br>
								<input type="checkbox" name="" value=""><label></label> <br>
								<input type="checkbox" name="" value=""><label></label> <br>

							</div> <!-- end checkboxes -->
						</div> <!-- end tablecolumn -->
						
						<div class="groupcolumn2">
							<h7>Organizations</h7><br>
							<h8>Faith Based Organizations</h8><br>
							<span id="">Christianity</span><br>
							<div class="checkboxes">
								<input type="checkbox" name="" value=""><label>Select All Groups</label> <br>
								<input type="checkbox" name="" value=""><label></label> <br>
								<input type="checkbox" name="" value=""><label></label> <br>

							</div> <!-- end checkboxes -->
							<span id="">Judaism</span><br>
							<div class="checkboxes">
								<input type="checkbox" name="" value=""><label>Select All Groups</label> <br>
								<input type="checkbox" name="" value=""><label></label> <br>
								<input type="checkbox" name="" value=""><label></label> <br>

							</div> <!-- end checkboxes -->
							<span id="">Other Faiths</span><br>
							<div class="checkboxes">
								<input type="checkbox" name="" value=""><label>Select All Groups</label> <br>
								<input type="checkbox" name="" value=""><label></label> <br>
								<input type="checkbox" name="" value=""><label></label> <br>

							</div> <!-- end checkboxes -->
							
							<h8>Local & National Organizations</h8><br>
							<div class="checkboxes">
								<input type="checkbox" name="" value=""><label>Select All Groups</label> <br>
								<input type="checkbox" name="" value=""><label></label> <br>
								<input type="checkbox" name="" value=""><label></label> <br>

							</div> <!-- end checkboxes -->
							
							<h8>Local & National Charities</h8><br>
							<div class="checkboxes">
								<input type="checkbox" name="" value=""><label>Select All Groups</label> <br>
								<input type="checkbox" name="" value=""><label></label> <br>
								<input type="checkbox" name="" value=""><label></label> <br>

							</div> <!-- end checkboxes -->
							
							<h8>Community Organizations</h8><br>
							<div class="checkboxes">
								<input type="checkbox" name="" value=""><label>Select All Groups</label> <br>
								<input type="checkbox" name="" value=""><label></label> <br>
								<input type="checkbox" name="" value=""><label></label> <br>

							</div> <!-- end checkboxes -->
							
							<h8>Youth & Sports</h8><br>
							<div class="checkboxes">
								<input type="checkbox" name="" value=""><label>Select All Groups</label> <br>
								<input type="checkbox" name="" value=""><label></label> <br>
								<input type="checkbox" name="" value=""><label></label> <br>

							</div> <!-- end checkboxes -->
							
							<h8>Sports League</h8><br>
							<div class="checkboxes">
								<input type="checkbox" name="" value=""><label>Select All Groups</label> <br>
								<input type="checkbox" name="" value=""><label></label> <br>
								<input type="checkbox" name="" value=""><label></label> <br>

							</div> <!-- end checkboxes -->
						</div> <!-- end tablecolumn -->
						
						<div class="groupcolumn3">
							<h7>General</h7><br>
							<div class="checkboxes">
								<input type="checkbox" name="" value=""><label>Select All Groups</label> <br>
								<input type="checkbox" name="" value=""><label></label> <br>
								<input type="checkbox" name="" value=""><label></label> <br>

							</div> <!-- end checkboxes -->
						</div> <!-- end tablecolumn -->
						<div class="clear"></div>
					</div> <!-- end tab -->
					
					<div class="interim-form">
						<div class="interim-header"><h2>Social Media Connections</h2></div>
						<div class="tablerow"> 
							<span id="hd_fb">Facebook</span>
							<input id="fb" type="text" name="fb" value="www.facebook.com">
						</div> <!-- end row -->
						<div class="tablerow"> 
							<span id="hd_tw">Twitter</span>
							<input id="tw" type="text" name="tw" value="www.twitter.com">
						</div> <!-- end row -->
						<div class="tablerow"> 
							<span id="hd_li">LinkedIn</span>
							<input id="li" type="text" name="li" value="www.linkedin.com">
						</div> <!-- end row -->
						<!--<div class="tablerow"> 
							<span id="hd_pn">Pinterest</span>
							<input id="pn" type="text" name="pn" value="www.pinterest.com">
						</div>--> <!-- end row -->
						<!--<div class="tablerow">
							<span id="hd_gp">Google+</span>
							<input id="gp" type="text" name="gp" value="plus.google.com">
						</div>--> <!-- end row -->
					</div> <!-- end tab 3 -->
				</div> <!-- end simple tabs -->
			
				<div class="tablerow">
					<input type="submit" name="submit" class="redbutton" value="Save & Exit">
					<input type="submit" name="submit" class="redbutton" value="Save & Add Another">
					<!--<input type="submit" name="submit" class="redbutton" value="Save Account & Add Fundraising Group">-->
				</div> <!-- end row -->
			</form>

			<!--<br>
			
			<form id="graybackground">
				<h3>--Option 2: Add Multiple Accounts--</h3>
				<h2>How To Add Multiple Accounts</h2><br>
				<ol>
					<li><a href="">Download</a> Our Fundraiser Setup Spreadsheet</li>
					<li>Input the Data for Each Fundraiser Account You want to Add</li>
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