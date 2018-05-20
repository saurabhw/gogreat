<?php
session_start();

if (!isset($_SESSION['authenticated'])) {
	header('Location: ../index.php');
	exit;
}

require_once("../includes/connection.inc.php");
require_once("../includes/functions.php");

$link = connectTo();
$groupID = mysqli_prep($_GET["group"]);
$groupURL = urlencode($_GET["group"]);
  $userID = $_SESSION['userId'];
   $query = "SELECT * FROM user_info WHERE userInfoID='$userID'";
   $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error());
   $row = mysqli_fetch_assoc($result);
   $pic = $row['picPath'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>GreatMoods | Setup/Edit Website - Fundraising Contacts</title>
	
	<link href="../css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
	<link href="../css/setupFormStyles.css" rel="stylesheet" type="text/css" />
	<link href="../css/headerSampleWebsiteStyles.css" rel="stylesheet" type="text/css">
	<link href="../css/leftSidebarNav.css" rel="stylesheet" type="text/css">
	<link href="../css/lisa_contacts_page.css" rel="stylesheet" type="text/css" />
	<link href="../jquery-ui-1.10.3/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
	<link href="../jquery-ui-1.10.3/ui/jquery.multiselect.css" media="screen" rel="stylesheet" type="text/css">
	
	<script src="../jquery-ui-1.10.3/jquery-1.9.1.js" type="text/javascript"></script>
	<script src="../jquery-ui-1.10.3/ui/jquery-ui.js" type="text/javascript"></script>
	<script src="../jquery-ui-1.10.3/ui/jquery.multiselect.js" type="text/javascript"></script>
	<script src="../js/functions.js" type="text/javascript"></script>
</head>
	
<body id="contacts">



<!--START CONTAINER-->

<div id="container">
	<?php
	
	include("header.inc.php");
	include("sideLeftNav.php");
	
	?>
	
	
	
	<!--START MAIN CONTENT-->
	
	<div id="mainContent">
	
	
	
		<!--THESE DIVS NOTIFY THE USER OF THE CUSTOMER UPDATE PROCESS IF IT TAKES TOO LONG TO UPDATE-->
		<div id="loadingMessage">Updating... Please wait...</div>
		<div id="loadingOver"></div>
		
		<!--THESE DIVS NOTIFY THE USER OF THE SENDING EMAIL PROCESS IF IT TAKES TOO LONG TO SEND-->
		<div id="loadingEmail">Sending e-mail... Please wait...</div>
		<div id="loadingEmailOver"></div>
		
		
		
		<h2>View Contacts</h2>
		
		
		
		<!--START SHOW CURRENT CONTACTS SECTION-->
		<div>
			<h3 class="red_text">Current Contacts</h3>
			
			<!--THIS DIV IS HERE TO SIMPLY ADD THE BACKGROUND COLOR & PADDING-->
			<div id="table_show_current_contacts">
				<table>
					<tr style="font-weight: bold;">
						<td><label for="first">First Name</label></td>
						<td><label for="last">Last Name</label></td>
						<td><label for="title">Position Title</label></td>
						<td><label for="email">E-mail Address</label></td>
						<td><label for="phone">Phone Number</label></td>
					</tr>
					
					<!--START DATABASE QUERIES TO GET FUNDRAISING CONTACTS-->
					<?php
						$repEmail = $_SESSION["email"]; // Retrieved when you login (username field has name="email").
						
						// GET THE REP'S USER INFO ID
						$query = "SELECT * FROM user_info WHERE email = '$repEmail'";
						$result = mysqli_query($link, $query);
						confirm_query($result);
						$row = mysqli_fetch_assoc($result);
						$userInfoID = $row["userInfoID"]; // rep's ID
						
						// USE THE USER INFO ID TO GET THE REP'S GROUPS: SCHOOL NAME, GROUP TYPE, AND GROUP LOGINID
						$query_setup = "SELECT * FROM Dealers WHERE setuppersonid = '$userInfoID'";
						$result_setup = mysqli_query($link, $query_setup);
						confirm_query($result_setup);
						
						// START GETTING GROUP INFORMATION
						
						if ($result_setup) {
							while ($row_setup = mysqli_fetch_assoc($result_setup)) {
								$select_school = $row_setup["Dealer"]; // get category school name
								$select_club_sports = $row_setup["DealerDir"]; // get group club/sports
								$loginid = $row_setup["loginid"]; // used to get contacts/members/customers
								
								// GET CONTACTS USING THE GROUP LOGINID
								$query_contacts = "SELECT * FROM orgCustomers WHERE fundGroupID = '$loginid' ORDER BY first ASC";
								$result_contacts = mysqli_query($link, $query_contacts);
								confirm_query($result_contacts);
								
								// START VIEW AND EDIT CONTACTS
								
								if ($result_contacts) {
									while ($row_contacts = mysqli_fetch_assoc($result_contacts)) {
										$contacts_ID	= htmlspecialchars($row_contacts["orgContactID"]);
										$contacts_Group = htmlspecialchars($row_contacts["fundraiserID"]);
										$contacts_FName = htmlspecialchars($row_contacts["orgFName"]);
										$contacts_LName = htmlspecialchars($row_contacts["orgLName"]);
										$contacts_Title = htmlspecialchars($row_contacts["Title"]);
										$contacts_Email = htmlspecialchars($row_contacts["orgEmail"]);
										$contacts_Phone = htmlspecialchars($row_contacts["orgPhone"]);
										
										// START FORM FOR[orgContacts] - THIS ALLOWS REPS TO UPDATE THEIR FUNDRAISING CONTACTS
										
										echo '
											<form action="contacts_update.php" method="post" enctype="multipart/form-data"
											onsubmit="update_contactLoading();">
						
											<input type="hidden" name="update_contact" value="' . $contacts_ID . '" />
											<input type="hidden" name="group_info" value="' . $contacts_Group . '" />
											
										<tr>
											<td><input type="text" name="update_first" value="' . $contacts_FName . '" /></td>
											<td><input type="text" name="update_last" value="' . $contacts_LName . '" /></td>
											<td><input type="text" name="update_title" value="' . $contacts_Title . '" /></td>
											<td><input type="text" name="update_email" value="' . $contacts_Email . '" /></td>
											<td><input type="text" name="update_phone" value="' . $contacts_Phone . '" /></td>
											
											<td><input type="submit" name="submit_update" value="Update" class="edit_contact" /></td>
											</form>';
											
										// END FORM FOR [orgContacts] - THIS ALLOWS REPS TO UPDATE THEIR FUNDRAISING CONTACTS
										
										// START FORM FOR [orgContacts] - THIS ALLOWS REPS TO DELETE THEIR FUNDRAISING CONTACTS
										
										echo '
											<form action="contacts_delete.php" method="post" enctype="multipart/form-data">
											<input type="hidden" name="group_info" value="' . $contacts_Group . '" />
											<input type="hidden" name="delete_contact" value="' . $contacts_ID . '" />
											
											<td><input type="submit" name="delete" value="Delete" class="edit_contact" /></td>
											</form>
										</tr>';
										
										// END FORM FOR [orgContacts] - THIS ALLOWS REPS TO DELETE THEIR FUNDRAISING CONTACTS
									}
								}
								
								// END VIEW AND EDIT CONTACTS
								
								/*
								// GET MEMBERS USING THE GROUP LOGINID
								$query_members = "SELECT * FROM orgMembers WHERE fund_owner_id = '$loginid'";
								$result_members = mysqli_query($link, $query_members);
								confirm_query($result_members);
					
								if ($result_members) {
									while ($row_members = mysqli_fetch_assoc($result_members)) {
										$members_FName = $row_members["orgFName"];
										$members_LName = $row_members["orgLName"];
										$members_Title = $row_members["Title"];
										$members_Email = $row_members["orgEmail"];
										$members_Phone = $row_members["orgPhone"];
							
										echo $members_FName . "<br />";
									}
								}
					
								// GET CUSTOMERS USING THE GROUP LOGINID
								$query_cust = "SELECT * FROM orgCustomers WHERE fundGroupID = '$loginid'";
								$result_cust = mysqli_query($link, $query_cust);
								confirm_query($result_cust);
					
								if ($result_cust) {
									while ($row_cust = mysqli_fetch_assoc($result_cust)) {
										$customers_FName = $row_cust["first"];
										$customers_LName = $row_cust["last"];
										$customers_Rel	 = $row_cust["relationship"];
										$customers_Email = $row_cust["email"];
										$customers_Phone = $row_cust["workPhone"];
							
										echo $customers_FName . "<br />";
									}
								}
								*/
								
							}
						}
						
						// END GETTING GROUP INFORMATION
					?>
					<!--END DATABASE QUERIES TO GET FUNDRAISING CONTACTS-->
					
				</table>
			</div>
		</div>
		<!--END SHOW CURRENT CONTACTS SECTION-->
		
		
		
		<br />
		
		
		
		<!--START EMAIL SECTION LEFT SIDE-->
		
		<h3 class="red_text" style="padding-bottom: 0px;">Select or Create E-mails</h3>
		<button id="websiteEmailButton" class="font75 selectCreateEmailButtons">- Send Website Information</button>
		<button id="selectEmailsButton" class="font75 selectCreateEmailButtons">+ Select E-mails to Send</button>
		<button id="createEmailsButton" class="font75 selectCreateEmailButtons">+ Create Your Own E-mail</button>
		<p style="font-size: 3px;">&nbsp;</p>
		
		<div id="table_email_section_left_side">
			
			
				
			<!--START WEBSITE INFORMATION BUTTON-->
				
			<div id="website_email">
			
				<form id="send_emails" action="lisa_send_emails.php" method="post" enctype="multipart/form-data"
				onsubmit="return (validateSelected() && email_sending())">
				
					<table style="margin-left: -3px;">
						<tr>
							<td class="selectFont">
								<select id="select_category" name="select_category[]" multiple="multiple" style="width: 276px;">
									<option>All High Schools</option>
									<option>All Middle Schools</option>
									<option>All Elementary Schools</option>
									<option>All Religious Organizations</option>
									<option>All Youth &amp; Sports</option>
									<option>All Local &amp; National Causes</option>
									<?php
									if ($select_school != NULL) {
										echo '<option>' . $select_school . '</option>';
									}
									?>
								</select>
							</td>
							<td class="selectFont">
								<select id="select_group" name="select_group[]" multiple="multiple" style="width: 276px;">
									<option>All Groups</option>
									<option>All Clubs &amp; Organizations</option>
									<option>All Athletics</option>
									<option>General</option>
									<?php
									$query_clubTeam = "SELECT * FROM clubsTeams ORDER BY clubTeam ASC";
									$result_clubTeam = mysqli_query($link, $query_clubTeam);
									confirm_query($result_clubTeam);
									
									while ($row_clubTeam = mysqli_fetch_assoc($result_clubTeam)) {
										echo '<option>' . $row_clubTeam["clubTeam"] . '</option>';
									}
									?>
								</select>
							</td>
						</tr>
						<tr>
							<td class="selectFont">
								<select id="select_contact" name="select_contact" multiple="multiple" style="width: 276px;">
									<option>All Contacts</option>
									<option>Fundraising Leaders</option>
									<option>Members</option>
									<option>Consumers</option>
								</select>
							</td>
							<td class="selectFont">
								<select id="select_greeting" name="select_greeting" multiple="multiple" style="width: 276px;">
									<option>New Fundraising Opportunity</option>
									<option>Kickoff Announcement</option>
									<option>3 Easy Steps Setup</option>
									<option>Getting Started</option>
									<option>2-Week Reminder</option>
									<option>Mid-Fundraiser Reminder</option>
									<option>2 Weeks Left Reminder</option>
									<option>Back to School</option>
									<option>Fall/Autumn</option>
									<option>Thanksgiving</option>
									<option>Christmas</option>
									<option>Hannukah</option>
									<option>Valentine's Day</option>
									<option>Easter</option>
									<option>Mother's Day</option>
									<option>Graduation</option>
									<option>Father's Day</option>
									<option>Summer</option>
								</select>
							</td>
						</tr>
					</table>
					
					<br />
					
					<table class="subject_and_message sub_mes2">
						<tr>
							<td class="subject_message_line">Subject:</td>
							<td class="message_box"><input style="width:98%;" class="message_box_input" type="text" name="subject" value="Fundraising Website Enclosed" /></td>
						</tr>
						<tr>
							<td class="subject_message_line message_align_top">Message:</td>
							<td class="message_box">
								<p style="padding-top: 4px;">Hi, <strong>[recipient's first name will automatically be inserted here]</strong>,</p>
								<p>The <strong>[organization name will automatically be inserted here]</strong> has their free fundraising website all ready to go!</p>
								
								<textarea class="message_box_input message_box_firefox_only" id="message" name="message" rows="10">Type any additional message here, or make sure to delete everything from this field.</textarea>
								
								<p>
									Please click on the link below to view the fundraiser that your group will love.<br />
									<strong>[Fundraising website link will automatically be inserted here]</strong>
								</p>
								<p>
									Here is your login information.<br />
									Username: <strong>[organization's username will automatically be inserted here]</strong><br />
									Password: <strong>[organization's password will automatically be inserted here]</strong>
								</p>
								<p>Thank you.</p>
								<p>
									<strong>[Your full name will automatically be inserted here]</strong><br />
									<strong>[Your contact number will automatically be inserted here]</strong><br />
									<strong>[Your contact e-mail will automatically be inserted here]</strong>
								</p>
							</td>
						</tr>
					</table>
					
					<br />
					
					<input type="submit" name="submit" value="Send E-mail" />
				</form>
			</div>
			
			<!--END WEBSITE INFORMATION BUTTON-->
				
				
				
				<!--START CATEGORIES-->
				<div id="multiple_email">
					<table style="margin-left: -3px;">
						<tr>
							<td class="selectFont">
								<select id="select_category" name="select_category[]" multiple="multiple" style="width: 276px;">
									<option>All High Schools</option>
									<option>All Middle Schools</option>
									<option>All Elementary Schools</option>
									<option>All Religious Organizations</option>
									<option>All Youth &amp; Sports</option>
									<option>All Local &amp; National Causes</option>
									<?php
									if ($select_school != NULL) {
										echo '<option>' . $select_school . '</option>';
									}
									?>
								</select>
							</td>
							<td class="selectFont">
								<select id="select_group" name="select_group[]" multiple="multiple" style="width: 276px;">
									<option>All Groups</option>
									<option>All Clubs &amp; Organizations</option>
									<option>All Athletics</option>
									<option>General</option>
									<?php
									$query_clubTeam = "SELECT * FROM clubsTeams ORDER BY clubTeam ASC";
									$result_clubTeam = mysqli_query($link, $query_clubTeam);
									confirm_query($result_clubTeam);
									
									while ($row_clubTeam = mysqli_fetch_assoc($result_clubTeam)) {
										echo '<option>' . $row_clubTeam["clubTeam"] . '</option>';
									}
									?>
								</select>
							</td>
						</tr>
						<tr>
							<td class="selectFont">
								<select id="select_contact" name="select_contact" multiple="multiple" style="width: 276px;">
									<option>All Contacts</option>
									<option>Fundraising Leaders</option>
									<option>Members</option>
									<option>Consumers</option>
								</select>
							</td>
							<td class="selectFont">
								<select id="select_greeting" name="select_greeting" multiple="multiple" style="width: 276px;">
									<option>New Fundraising Opportunity</option>
									<option>Kickoff Announcement</option>
									<option>3 Easy Steps Setup</option>
									<option>Getting Started</option>
									<option>2-Week Reminder</option>
									<option>Mid-Fundraiser Reminder</option>
									<option>2 Weeks Left Reminder</option>
									<option>Back to School</option>
									<option>Fall/Autumn</option>
									<option>Thanksgiving</option>
									<option>Christmas</option>
									<option>Hannukah</option>
									<option>Valentine's Day</option>
									<option>Easter</option>
									<option>Mother's Day</option>
									<option>Graduation</option>
									<option>Father's Day</option>
									<option>Summer</option>
								</select>
							</td>
						</tr>
					</table>
				
					
				</div>
				<!--END CATEGORIES-->
				
				
				
				<!--START SEND TO: RECIPIENT-->
				<div id="personal_email">
					<select multiple="multiple" id="select" name="send_emails[]" style="width: 562px;">
						<?php
						// USE THE USER INFO ID TO GET THE REP'S GROUPS: SCHOOL NAME, GROUP TYPE, AND GROUP LOGINID
						$query_setupPerson = "SELECT * FROM Dealers WHERE setuppersonid = '$userInfoID'";
						$result_setupPerson = mysqli_query($link, $query_setupPerson);
						confirm_query($result_setupPerson);
						
						if ($result_setupPerson) {
							while ($row_setupPerson = mysqli_fetch_assoc($result_setupPerson)) {
								$groupLoginid = $row_setupPerson["loginid"]; // used to get contacts/members/customers
								
								// GET CONTACTS USING THE GROUP LOGINID
								$query_orgContacts = "SELECT * FROM orgContacts WHERE fundraiserID = '$groupLoginid' ORDER BY orgFName ASC";
								$result_orgContacts = mysqli_query($link, $query_orgContacts);
								confirm_query($result_orgContacts);
								
								// START VIEW AND EDIT CONTACTS
								
								if ($result_orgContacts) {
									while ($row_orgContacts = mysqli_fetch_assoc($result_orgContacts)) {
										$orgContacts_FName = htmlspecialchars($row_orgContacts["orgFName"]);
										$orgContacts_LName = htmlspecialchars($row_orgContacts["orgLName"]);
										$orgContacts_fullname = $orgContacts_FName . " " . $orgContacts_LName;
										
										$orgContacts_Email = htmlspecialchars($row_orgContacts["orgEmail"]);
										
										echo '<option value="'.$orgContacts_Email.'">'.$orgContacts_fullname.' ('.$orgContacts_Email.')</option>';
									}
								}
							}
						}
						?>
					</select>
				</div>
				<!--END SEND TO: RECIPIENT-->
				
			
		</div>
		
		<!--END EMAIL SECTION LEFT SIDE-->
		
		
		
		<!--START EMAIL SECTION RIGHT SIDE-->
		
		<div id="table_email_section_right_side">
			<p class="font75 bold" style="text-align: center;">Upcoming Fundraising Opportunities</p>
			
			<table class="cursorDefault">
				<tr>
					<td class="align_left">September 22, 2013</td>
					<td class="align_right">Fall/Autumn</td>
				</tr>
				<tr>
					<td class="align_left">October 31, 2013</td>
					<td class="align_right">Halloween</td>
				</tr>
				<tr>
					<td class="align_left">November 28, 2013</td>
					<td class="align_right">Thanksgiving</td>
				</tr>
				<tr>
					<td class="align_left">November 28, 2013</td>
					<td class="align_right">Hanukkah</td>
				</tr>
				<tr>
					<td class="align_left">December 21, 2013</td>
					<td class="align_right">Winter</td>
				</tr>
				<tr>
					<td class="align_left">December 25, 2013</td>
					<td class="align_right">Christmas</td>
				</tr>
				<tr>
					<td class="align_left">February 14, 2014</td>
					<td class="align_right">Valentine's Day</td>
				</tr>
				<tr>
					<td class="align_left">March 20, 2014</td>
					<td class="align_right">Spring</td>
				</tr>
				<tr>
					<td class="align_left">April 20, 2014</td>
					<td class="align_right">Easter</td>
				</tr>
				<tr>
					<td class="align_left">May 11, 2014</td>
					<td class="align_right">Mother's Day</td>
				</tr>
				<tr>
					<td class="align_left">June 15, 2014</td>
					<td class="align_right">Father's Day</td>
				</tr>
				<tr>
					<td class="align_left">June 21, 2014</td>
					<td class="align_right">Summer</td>
				</tr>
			</table>
		
		</div>
		
		<!--END EMAIL SECTION RIGHT SIDE-->
		
		
		
	</div>
	
	<!--END MAIN CONTENT-->
	
	
	
	<?php include("../includes/footer.php"); ?>

</div>

<!--END CONTAINER-->

</body>
</html>

<?php ob_end_flush(); ?>