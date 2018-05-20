<?php /* Smarty version Smarty-3.1.14, created on 2014-10-06 00:57:39
         compiled from "/home/gogrea5/public_html/dir/modules/greatmoodslogin/controllers/front/display_gms_vp_setup_gmfr_v3.tpl" */ ?>
<?php /*%%SmartyHeaderCode:210462078054322143168dd6-23610771%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '55409186e0c28673ecb6b3592856d91a90f746de' => 
    array (
      0 => '/home/gogrea5/public_html/dir/modules/greatmoodslogin/controllers/front/display_gms_vp_setup_gmfr_v3.tpl',
      1 => 1412570159,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '210462078054322143168dd6-23610771',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5432214318cd82_14554703',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5432214318cd82_14554703')) {function content_5432214318cd82_14554703($_smarty_tpl) {?><html>
	<head>
	</head>
	
	<body>
					
			
			
			
			<h1>Fundraiser Account Setup</h1>
					
			<div id="table" class="graybackground">
				<form id="graybackground" onSubmit="return isValid_gmfr('graybackground');" action="../../Validate.php" method="POST">
					<select id="category" name="">
						<option selected="">Select Organization</option>
						<option value="">All Categories</option>
						<option value="">Educational Organizations</option>
						<option value="">Religious Organizations</option>
						<option value="">Community Organizations</option>
						<option value="">Youth &amp; Sports Organizations</option>
						<option value="">Local &amp; National Charities</option>
						<option value="">National Organizations</option>
						<option value="">Individual Charity</option>
						<option value="">Other</option>
					</select>
					<select id="type" name="">
						<option selected="">Select Category</option>
						<option value="">All Educational Types</option>
						<option value="">4yr College</option>
						<option value="">2yr College</option>
						<option value="">High School</option>
						<option value="">Middle School</option>
						<option value="">Elementary School</option>
						<option value="">Home School</option>
						<option value="">Preschool School</option>
						<option value="">Other</option>
					</select>
                    			<select id="subtype" name="">
							<option selected="">Select Sub-Category</option>
							<option value="">All Sub-Types</option>
							<option value="">Public</option>
							<option value="">Private</option>
							<option value="">Christian</option>
							<option value="">Charter</option>
					</select>
					
					<h2>Contact Information</h2>
					<div id="row"> <!-- titles -->
						<span id="hd_frname"> Name</span>
of						<span id="hd_group">Group(s)</span>
					</div> <!-- end row -->
					<div id="row"> <!-- inputs -->
						<input id="frname" type="text" name="" value="">
						<select id="group" name="">
							<option selected="">Select Fundraising Group(s)</option>
							<option value="">All Groups</option>
							<option>--Clubs &amp; Organizations--</option>
							<option value="">Art Club</option>
							<option value="">Band</option>
							<option value="">BPA</option>
							<option value="">Book Club </option>
							<option value="">Booster Club</option>
							<option value="">Chess Club</option>
							<option value="">Choir</option>
							<option value="">Class Trips</option>
							<option value="">Debate</option>
							<option value="">DECA</option>
							<option value="">Drumline</option>
							<option value="">Eco/Environmental/Science Club</option>
							<option value="">FBLA</option>
							<option value="">French Club</option>
							<option value="">Gay-Straight Alliance/GLBT</option>
							<option value="">German Club</option>
							<option value="">Jazz Band</option>
							<option value="">Key Club</option>
							<option value="">Language Club</option>
							<option value="">Library</option>
							<option value="">Math Club</option>
							<option value="">Mock Trial</option>
							<option value="">National Art Honor Society</option>
							<option value="">National Honor Society</option>
							<option value="">Newspaper</option>
							<option value="">Orchestra</option>
							<option value="">Peer Counseling</option>
							<option value="">Prom Committee</option>
							<option value="">PTA/PTO</option>
							<option value="">Quiz Bowl/Knowledge Bowl</option>
							<option value="">SADD (Student Against Drunk Drivers)</option>
							<option value="">Scholars Bowl </option>
							<option value="">Scholarship Counseling </option>
							<option value="">School Counseling </option>
							<option value="">School Trips</option>
							<option value="">Student Council</option>
							<option value="">Technology/Robotics Club</option>
							<option value="">Theatre</option>
							<option value="">Yearbook News Broadcasting</option>
							<option>--Athletics--</option>
							<option value="">Alpine Skiing</option>
							<option value="">Archery Club</option>
							<option value="">Badminton</option>
							<option value="">Baseball</option>
							<option value="">Basketball, Boys</option>
							<option value="">Basketball, Girls</option>
							<option value="">Bowling </option>
							<option value="">Cheerleading</option>
							<option value="">Cross Country, Boys</option>
							<option value="">Cross Country, Girls</option>
							<option value="">Cross Country Ski, Boys</option>
							<option value="">Cross Country Ski, Girls</option>
							<option value="">Cycling Club</option>
							<option value="">Danceline </option>
							<option value="">Equestrian</option>
							<option value="">Field Hockey </option>
							<option value="">Figure Skating</option>
							<option value="">Football </option>
							<option value="">Golf, Boys</option>
							<option value="">Golf, Girls</option>
							<option value="">Gymnastics</option>
							<option value="">Ice Hockey, Boys</option>
							<option value="">Ice Hockey, Girls</option>
							<option value="">Intramurals</option>
							<option value="">Lacrosse, Boys</option>
							<option value="">Lacrosse, Girls</option>
							<option value="">Mountain Biking</option>
							<option value="">Mountaineering Club</option>
							<option value="">Nordic Skiing</option>
							<option value="">Power Lifting</option>
							<option value="">Racquetball</option>
							<option value="">Rodeo</option>
							<option value="">Rowing</option>
							<option value="">Rugby Club</option>
							<option value="">Sailing</option>
							<option value="">Ski/Snowboard Club, Boys</option>
							<option value="">Ski/Snowboard Club, Girls</option>
							<option value="">Soccer, Boys</option>
							<option value="">Soccer, Girls</option>
							<option value="">Softball</option>
							<option value="">Swimming and Diving, Boys</option>
							<option value="">Swimming and Diving, Girls</option>
							<option value="">Table Tennis</option>
							<option value="">Tennis, Boys</option>
							<option value="">Tennis, Girls</option>
							<option value="">Track &amp; Field, Boys</option>
							<option value="">Track &amp; Field, Girls</option>
							<option value="">Ultimate Frisbee</option>
							<option value="">Volleyball</option>
							<option value="">Water Polo</option>
							<option value="">Wrestling</option>
							<option value="">Yacht Club</option>
							<option value="">Other</option>
						</select>
					</div> <!-- end row -->

					<div id="row"> <!-- titles -->
						<span id="hd_address1">Address 1</span>
						<span id="hd_wphone">Work Phone</span>
						<span id="ext">Ext</span>
						
					</div> <!-- end row -->
					<div id="row"> <!-- inputs -->
						<input id="address1" type="text" name="" value="">
						<input id="wphone1" type="text" name=""><input id="wphone2" type="text" name=""><input id="wphone3" type="text" name="">
						<input id="ext" type="text" name="">
					</div> <!-- end row -->
                    <div id="row">
                    	<span id="hd_address2">Address 2</span>
                    </div><!-- end row -->
                    <div id="row">
                    	<input id="address2" type="text" name="" value="">
                    </div><!-- end row -->
					
					<div id="row"> <!-- titles -->
						<span id="hd_city">City</span>
						<span id="hd_state">State</span>
						<span id="hd_zip1">Zip</span>
					</div> <!-- end row -->
					<div id="row"> <!-- inputs -->
						<input id="city" type="text" name="" value="">
						<select id="state" name="State">
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
						<input id="zip" type="text" name="" value="">
					</div> <!-- end row -->
				
					<h2>Social Media Connections</h2>
					<div id="row"> 
						<span id="hd_fb">Facebook</span>
						<input id="fb" type="text" name="" value="">
					</div> <!-- end row -->
					<div id="row"> 
						<span id="hd_tw">Twitter</span>
						<input id="tw" type="text" name="" value="">
					</div> <!-- end row -->
					<div id="row"> 
						<span id="hd_li">LinkedIn</span>
						<input id="li" type="text" name="" value="">
					</div> <!-- end row -->
					<div id="row"> 
						<span id="hd_pn">Pinterest</span>
						<input id="pn" type="text" name="" value="">
					</div> <!-- end row -->
					<div id="row">
						<span id="hd_gp">Google+</span>
						<input id="gp" type="text" name="" value="">
					</div> <!-- end row -->
					
					<h2>Website Banner</h2>
					<div id="row14"> 
						<span id="hd_url">Existing Website URL</span>
						<input id="url" type="text" name="">
					</div> <!-- end row14 -->
					<div id="row15"> 
						<span id="hd_banner">Upload Banner</span>
						<input id="banner" type="file" name="file">
					</div> <!-- end row15 -->
					<br>
					<span>Explanation about Referrals here.</span>
					<a href="http://gogreatmoods.com/repository/gms_vp_referral.html"><input class="button" type="button" name="" value="Add Referral"></a>
					
					<br>
					<h3>--or--</h3>
					<h2>Add Multiple Accounts</h2>
					<ol>
						<li><a href="">Download</a> Our Fundraiser Setup Spreadsheet</li>
						<li>Input the Data for Each Fundraiser Account you Want to Add</li>
						<li>Upload the Completed Spreadsheet Below...</li>
					</ol>
					<input type="file" name="">
					<div><input type="submit" value="Register" id="submit_form_gms_vp_setup_gmfr"></input></div>
			</form> 
           		 
				  </div> <!-- end table --> 
					
			
	</body>
</html><?php }} ?>