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
	<title>GreatMoods | Executive</title>
</head>

<body>
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <?php include 'sidenav.php' ; ?>

      <div id="content">
          <h1>Send Emails</h1>
          <h3>Send Pre-Written Emails to All Contacts</h3>
          <p>**Which dropdowns appear depends on the selection of previous ones. Obviously not all of these would be showing at once.**</p>
          
          <form id="sendemail" class="graybackground" method="post" action="">
          	<div class="table">
          		<div class="row">
          			<label class="emailtitle" for="sendto">Send To [All Options]:</label>
          			<br>
          			<select id="" name="" onchange="">
		          		<option value="" select>Select Account</option>
		          		<option value="">All Sales People</option>
		          		<option value="">All Vice Presidents</option>
		          		<option value="">All Sales Coordinators</option>
		          		<option value="">All Representatives</option>
		          		<option value="">All Fundraiser Accounts</option>
		          		<option value="">All Fundraiser Leaders</option>
		          		<option value="">All Fundraiser Members</option>
		          		<option value="">Select Fundraiser Sub-Types</option>
		          		<option value="">Select Specific Accounts</option>
		          	</select>
		          	
		          	<br><br>
		          	
		          	<!-- the following dropdowns would appear if 'Select Fundraiser Sub-Types' is selected -->
		          	<select id="" name="" onchange="">
		          		<option value="">Select Fundraiser Sub-Type</option>
		          		<option value="">Education Fundraisers</option>
		          		<option value="">Christian Fundraisers</option>
		          		<option value="">Jewish Fundraisers</option>
		          		<option value="">Other Faith Fundraisers</option>
		          		<option value="">Organization Fundraisers</option>
		          	</select>
		          	
		          	<br><br>
		          		
		          		<!-- this would appear if 'Education Fundraisers' is selected -->
			          	<select id="" name="" onchange="">
			          		<option value="">Select Education Fundraiser Sub-Type</option>
			          		<option value="">All Elementary School Fundraisers</option>
			          		<option value="">All Middle School Fundraisers</option>
			          		<option value="">All High School Fundraisers</option>
			          		<option value="">All College Fundraisers</option>
			          		<option value="">All Pre-School Fundraisers</option>
			          		<option value="">All Home School Fundraisers</option>
			          		<option value="">All Trade, Vocational & Tech Fundraisers</option>
			          		<option value="">All Camp Fundraisers</option>
			          		<option value="">Select Specific Groups</option>
			          	</select>
			          		<!-- this would appear after a broad 'Sub-Type' is selected -->
				          	<select id="" name="" onchange="">
				          		<option value="">Select [Sub-Type] Contacts</option>
				          		<option value="">All [Sub-Type] Contacts</option>
				          		<option value="">All [Sub-Type] Leaders</option>
				          		<option value="">All [Sub-Type] Members</option>
				          	</select>
					        <br>
			          		<!-- this would appear if 'Select Specific Groups' is selected -->
			          		<select id="" name="" onchange="">
				          		<option value="">Select ______ Fundraiser Group</option>
				          		<option value="">All Groups (Includes Other)</option>
				          		<option value="">All Clubs & Organizations</option>
				          		<option value="">All Athletics</option>
				          		<option value="">Populate Specific Groups Below</option>
				          		<option value="">Such As 'All Bands'</option>
				          		<option value="">Or 'All Football Teams'</option>
				          	</select>
				          		<!-- this would appear after a group is selected -->
					          	<select id="" name="" onchange="">
					          		<option value="">Select [Group] Contacts</option>
					          		<option value="">All [Group] Contacts</option>
					          		<option value="">All [Group] Leaders</option>
					          		<option value="">All [Group] Members</option>
					          	</select>
				         
				         <br><br>
				         
				        <!-- this would appear if 'Christian Fundraisers' is selected -->
			          	<select id="" name="" onchange="">
			          		<option value="">Select Christian Fundraiser Sub-Type</option>
			          		<option value="">All Baptist Fundraisers</option>
			          		<option value="">All Catholic Fundraisers</option>
			          		<option value="">All Episcopal Fundraisers</option>
			          		<option value="">All Lutheran Fundraisers</option>
			          		<option value="">All Methodist Fundraisers</option>
			          		<option value="">All Presbyterian Fundraisers</option>
			          		<option value="">All Orthodox Fundraisers</option>
			          		<option value="">All Reformed Fundraisers</option>
			          		<option value="">All Spirit-Filled Fundraisers</option>
			          		<option value="">All Christian Other Fundraisers</option>
			          		<option value="">Select Specific Groups</option>
			          	</select>
			          		<!-- this would appear after a broad 'Sub-Type' is selected -->
				          	<select id="" name="" onchange="">
				          		<option value="">Select [Sub-Type] Contacts</option>
				          		<option value="">All [Sub-Type] Contacts</option>
				          		<option value="">All [Sub-Type] Leaders</option>
				          		<option value="">All [Sub-Type] Members</option>
				          	</select>
			          		<br>
			          		<!-- this would appear if 'Select Specific Groups' is selected -->
			          		<select id="" name="" onchange="">
				          		<option value="">Select ______ Fundraiser Group</option>
				          		<option value="">All Groups (Includes Other)</option>
				          		<option value="">Populate Specific Groups Below</option>
				          		<option value="">Such As 'All Bible Camps'</option>
				          	</select>
				          		<!-- this would appear after a group is selected -->
					          	<select id="" name="" onchange="">
					          		<option value="">Select [Group] Contacts</option>
					          		<option value="">All [Group] Contacts</option>
					          		<option value="">All [Group] Leaders</option>
					          		<option value="">All [Group] Members</option>
					          	</select>
			          	
			          	<br><br>
			          	
			          	<!-- this would appear if 'Jewish Fundraisers' is selected -->
			          	<select id="" name="" onchange="">
			          		<option value="">Select Jewish Fundraiser Sub-Type</option>
			          		<option value="">All Jewish Conservative Fundraisers</option>
			          		<option value="">All Jewish Orthodox Fundraisers</option>
			          		<option value="">All Jewish Reformed Fundraisers</option>
			          		<option value="">Select Specific Groups</option>
			          	</select>
			          		<!-- this would appear after a broad 'Sub-Type' is selected -->
				          	<select id="" name="" onchange="">
				          		<option value="">Select [Sub-Type] Contacts</option>
				          		<option value="">All [Sub-Type] Contacts</option>
				          		<option value="">All [Sub-Type] Leaders</option>
				          		<option value="">All [Sub-Type] Members</option>
				          	</select>
			          		<br>
			          		<!-- this would appear if 'Select Specific Groups' is selected -->
			          		<select id="" name="" onchange="">
				          		<option value="">Select ______ Fundraiser Group</option>
				          		<option value="">All Groups (Includes Other)</option>
				          		<option value="">Populate Specific Groups Below</option>
				          		<option value="">Such As 'All Building Fund Groups'</option>
				          	</select>
					          	<!-- this would appear after a group is selected -->
					          	<select id="" name="" onchange="">
					          		<option value="">Select [Group] Contacts</option>
					          		<option value="">All [Group] Contacts</option>
					          		<option value="">All [Group] Leaders</option>
					          		<option value="">All [Group] Members</option>
					          	</select>
			          	
			          	<br><br>
			          	
			          	<!-- this would appear if 'Other Faith Fundraisers' is selected -->
			          	<select id="" name="" onchange="">
			          		<option value="">Select Other Faith Fundraiser Sub-Type</option>
			          		<option value="">All Buddhist Fundraisers</option>
			          		<option value="">All Hindu Fundraisers</option>
			          		<option value="">All Muslim Fundraisers</option>
			          		<option value="">All Other Faith Fundraisers</option>
			          		<option value="">Select Specific Groups</option>
			          	</select>
			          		<!-- this would appear after a broad 'Sub-Type' is selected -->
				          	<select id="" name="" onchange="">
				          		<option value="">Select [Sub-Type] Contacts</option>
				          		<option value="">All [Sub-Type] Contacts</option>
				          		<option value="">All [Sub-Type] Leaders</option>
				          		<option value="">All [Sub-Type] Members</option>
				          	</select>
			          		<br>
			          		<!-- this would appear if 'Select Specific Groups' is selected -->
			          		<select id="" name="" onchange="">
				          		<option value="">Select ______ Fundraiser Group</option>
				          		<option value="">All Groups (Includes Other)</option>
				          		<option value="">All Main Website Groups</option>
				          	</select>
				          		<!-- this would appear after a group is selected -->
					          	<select id="" name="" onchange="">
					          		<option value="">Select [Group] Contacts</option>
					          		<option value="">All [Group] Contacts</option>
					          		<option value="">All [Group] Leaders</option>
					          		<option value="">All [Group] Members</option>
					          	</select>
			          	
			          	<br><br>
			          	
			          	<!-- this would appear if 'Organization Fundraisers' is selected -->
			          	<select id="" name="" onchange="">
			          		<option value="">Select Organization Fundraiser Sub-Type</option>
			          		<option value="">All Local & National Organization Fundraisers</option>
			          		<option value="">All Local & National Charity Fundraisers</option>
			          		<option value="">All Community Organization Fundraisers</option>
			          		<option value="">All Youth & Sports Fundraisers</option>
			          		<option value="">All Sports League Fundraisers</option>
			          		<option value="">All General Fundraisers</option>
			          		<option value="">Select Specific Groups</option>
			          	</select>
			          		<!-- this would appear after a broad 'Sub-Type' is selected -->
				          	<select id="" name="" onchange="">
				          		<option value="">Select [Sub-Type] Contacts</option>
				          		<option value="">All [Sub-Type] Contacts</option>
				          		<option value="">All [Sub-Type] Leaders</option>
				          		<option value="">All [Sub-Type] Members</option>
				          	</select>
			          		<br>
			          		<!-- this would appear if 'Select Specific Groups' is selected -->
			          		<select id="" name="" onchange="">
				          		<option value="">Select ______ Fundraiser Group</option>
				          		<option value="">All Groups (Includes Other)</option>
				          		<option value="">Populate Specific Groups Below</option>
				          		<option value="">Such As 'All Kiwanis Groups'</option>
				          	</select>
				          		<!-- this would appear after a group is selected -->
					          	<select id="" name="" onchange="">
					          		<option value="">Select [Group] Contacts</option>
					          		<option value="">All [Group] Contacts</option>
					          		<option value="">All [Group] Leaders</option>
					          		<option value="">All [Group] Members</option>
					          	</select>

		          	<br><br>
		          	
		          	<!-- the following dropdowns would appear if Select Specific Accounts is selected -->
		          	<label class="emailtitle" for="sendto">Send To [Specific Options]:</label>
		          	<br>
		          	<select id="" name="" onchange="">
		          		<option value="">Select Vice President</option>
		          		<option value="">Name 1</option>
		          		<option value="">Name 2</option>
		          	</select>
		          	<select id="" name="" onchange="">
		          		<option value="">Select Sales Coordinator</option>
		          		<option value="">No Sales Coordinator</option>
		          		<option value="">Name 1</option>
		          	</select>
		          	<select id="" name="" onchange="">
		          		<option value="">Select Representative</option>
		          		<option value="">Name 1</option>
		          		<option value="">Name 2</option>
		          	</select>
		          	
		          	<select id="" name="" onchange="">
		          		<option value="">Select Fundraiser Type</option>
		          		<option value="">All Fundraiser Accounts</option> <!-- This selection would be for all accts under the specific sales people selected -->
		          		<option value="">All Education Fundraisers</option>
		          		<option value="">All Christian Fundraisers</option>
		          		<option value="">All Jewish Fundraisers</option>
		          		<option value="">All Other Faith Fundraisers</option>
		          		<option value="">All Organization Fundraisers</option>
		          		<option value="">Select Specific Accounts</option>
		          	</select>
		          	
		          	<br><br>
		          	
			          	<select id="" name="" onchange="">
			          		<option value="">Select Education Fundraiser Type</option>
			          		<option value="">All Education Fundraisers</option>
			          		<option value="">Select Specific Groups</option>
			          	</select>
			          		<select id="" name="" onchange="">
				          		<option value="">Select Fundraiser Group</option>
				          		<option value="">All [Sub-Groups] (like athletics)</option>
				          		<option value="">Populate all groups</option>
				          	</select>
			          			<select id="" name="" onchange="">
					          		<option value="">Select [Group] Contacts</option>
					          		<option value="">All [Group] Contacts</option>
					          		<option value="">All [Group] Leaders</option>
					          		<option value="">All [Group] Members</option>
					          		<option value="">Select Specific Leaders</option>
					          		<option value="">Select Specific Members</option>
					          	</select>
					          		<select id="" name="" onchange="">
					          		<option value="">Select [Group] Leaders</option>
					          		<option value="">Name 1</option>
					          		<option value="">Name 2</option>
					          	</select>
					          	</select>
					          		<select id="" name="" onchange="">
					          		<option value="">Select [Group] Members</option>
					          		<option value="">Name 1</option>
					          		<option value="">Name 2</option>
					          	</select>
		          		<br><br>
		          		
					<select id="" name="" onchange="">
			          		<option value="">Select Christian Fundraiser Type</option>
			          		<option value="">All Christian Fundraisers</option>
			          		<option value="">Select Specific Accounts</option>
			          	</select>
			          		<select id="" name="" onchange="">
				          		<option value="">Select Fundraiser Group</option>
				          		<option value="">All [Sub-Groups]</option>
				          		<option value="">Populate all groups</option>
				          	</select>
			          			<select id="" name="" onchange="">
					          		<option value="">Select [Group] Contacts</option>
					          		<option value="">All [Group] Contacts</option>
					          		<option value="">All [Group] Leaders</option>
					          		<option value="">All [Group] Members</option>
					          		<option value="">Select Specific Leaders</option>
					          		<option value="">Select Specific Members</option>
					          	</select>
					          		<select id="" name="" onchange="">
					          		<option value="">Select [Group] Leaders</option>
					          		<option value="">Name 1</option>
					          		<option value="">Name 2</option>
					          	</select>
					          	</select>
					          		<select id="" name="" onchange="">
					          		<option value="">Select [Group] Members</option>
					          		<option value="">Name 1</option>
					          		<option value="">Name 2</option>
					          	</select>
			          	
		          		<br><br>
		          		
			          	<select id="" name="" onchange="">
			          		<option value="">Select Jewish Fundraiser Type</option>
			          		<option value="">All Jewish Fundraisers</option>
			          		<option value="">Select Specific Accounts</option>
			          	</select>
			          		<select id="" name="" onchange="">
				          		<option value="">Select Fundraiser Group</option>
				          		<option value="">All [Sub-Groups]</option>
				          		<option value="">Populate all groups</option>
				          	</select>
			          			<select id="" name="" onchange="">
					          		<option value="">Select [Group] Contacts</option>
					          		<option value="">All [Group] Contacts</option>
					          		<option value="">All [Group] Leaders</option>
					          		<option value="">All [Group] Members</option>
					          		<option value="">Select Specific Leaders</option>
					          		<option value="">Select Specific Members</option>
					          	</select>
					          		<select id="" name="" onchange="">
					          		<option value="">Select [Group] Leaders</option>
					          		<option value="">Name 1</option>
					          		<option value="">Name 2</option>
					          	</select>
					          	</select>
					          		<select id="" name="" onchange="">
					          		<option value="">Select [Group] Members</option>
					          		<option value="">Name 1</option>
					          		<option value="">Name 2</option>
					          	</select>
			          	
		          		<br><br>
		          		
			          	<select id="" name="" onchange="">
			          		<option value="">Select Other Faith Fundraiser Type</option>
			          		<option value="">All Other Faith Fundraisers</option>
			          		<option value="">Select Specific Accounts</option>
			          	</select>
			          		<select id="" name="" onchange="">
				          		<option value="">Select Fundraiser Group</option>
				          		<option value="">All [Sub-Groups]</option>
				          		<option value="">Populate all groups</option>
				          	</select>
			          			<select id="" name="" onchange="">
					          		<option value="">Select [Group] Contacts</option>
					          		<option value="">All [Group] Contacts</option>
					          		<option value="">All [Group] Leaders</option>
					          		<option value="">All [Group] Members</option>
					          		<option value="">Select Specific Leaders</option>
					          		<option value="">Select Specific Members</option>
					          	</select>
					          		<select id="" name="" onchange="">
					          		<option value="">Select [Group] Leaders</option>
					          		<option value="">Name 1</option>
					          		<option value="">Name 2</option>
					          	</select>
					          	</select>
					          		<select id="" name="" onchange="">
					          		<option value="">Select [Group] Members</option>
					          		<option value="">Name 1</option>
					          		<option value="">Name 2</option>
					          	</select>
			          	
		          		<br><br>
		          		
			          	<select id="" name="" onchange="">
			          		<option value="">Select Organization Fundraiser Type</option>
			          		<option value="">All Organization Fundraisers</option>
			          		<option value="">Select Specific Accounts</option>
			          	</select>
			          		<select id="" name="" onchange="">
				          		<option value="">Select Fundraiser Group</option>
				          		<option value="">All [Sub-Groups]</option>
				          		<option value="">Populate all groups</option>
				          	</select>
			          			<select id="" name="" onchange="">
					          		<option value="">Select [Group] Contacts</option>
					          		<option value="">All [Group] Contacts</option>
					          		<option value="">All [Group] Leaders</option>
					          		<option value="">All [Group] Members</option>
					          		<option value="">Select Specific Leaders</option>
					          		<option value="">Select Specific Members</option>
					          	</select>
					          		<select id="" name="" onchange="">
					          		<option value="">Select [Group] Leaders</option>
					          		<option value="">Name 1</option>
					          		<option value="">Name 2</option>
					          	</select>
					          	</select>
					          		<select id="" name="" onchange="">
					          		<option value="">Select [Group] Members</option>
					          		<option value="">Name 1</option>
					          		<option value="">Name 2</option>
					          	</select>
		        </div> <!-- end row -->
          		
          		<br>
          		
          		<div class="row">
          			<!-- options based on 'send to' selections -->
          			<label class="emailtitle" for="emailtype">Select Pre-Written Email</label>
          			<br>
		          	<select id="" name="" onchange="">
		          		<option value="">Select Email Type</option>
		          		<option value=""></option>
		          		<option value=""></option>
		          	</select>
          		</div> <!-- end row -->
          		
          		<br>
          		
          		<div class="row">
          			<label class="emailtitle" for="subject">Subject</label>
          			<br>
          			<input type="text" class="emailsubject" name="" value="">
          		</div> <!-- end row -->
          		
          		<br>
          		
          		<div class="row">
          			<label class="emailtitle" for="message">Message</label> 
          			<br>
          			<textarea name="message" class="emailmessage" rows="10"></textarea>
          		</div> <!-- end row -->
          		
          		<br>
          		
          		<!-- datetime-local type not supported by FF or Safari - need solution still -->
          		<div class="row"> 
          			<label class="emailtitle" for="senddate">Send Date & Time: </label> <input type="datetime-local" id="senddate" name="" class="" value="">
          			<input type="hidden" id="" name=""  value="">
          			<input type="submit" id="submit" class="redbutton" value="Send Email">
          		</div> <!-- end row -->
          	</div> <!-- end table -->
          </form>
          <br>
  </div> <!--end content -->
  
      <?php include 'footer.php' ; ?>   
</div> <!--end container-->

</body>
</html>

<?php
   ob_end_flush();
?>