<?php
include '../includes/autoload.php';

if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "SC") {
	header('Location: ../index.php');
	exit;
}


$groupID = mysqli_prep($_GET["group"]);
$groupURL = urlencode($_GET["group"]);

$group = $_GET['group'];


?>

<!DOCTYPE html>
<head>
	<title>GreatMoods | Setup/Edit Website - Fundraising Contacts</title>
</head>
	
<body>
<div id="container">
	<?php include 'header.inc.php' ; ?>
      	<?php include 'sidenav.php' ; ?>
	
	<div id="content">
		
		<h1>View Contacts</h1>
	
		
		<!--START SHOW CURRENT CONTACTS SECTION-->
		
		<div>
			
			<?php
			
			// GET THE FUNDRAISER ACCOUNT'S NAME
			$fund_query = "SELECT * FROM Dealers WHERE loginid = '$group'";
			$fund_result = mysqli_query($link, $fund_query);
			confirm_query($fund_result);
			
			$fund_row = mysqli_fetch_assoc($fund_result);
			$fund_name = $fund_row['Dealer'] . " " . $fund_row['DealerDir'];
			
			?>
			
			<h3 class="red_text">Current <?php echo $fund_name; ?> Contacts</h3>
			
			<!--THIS DIV IS HERE TO SIMPLY ADD THE BACKGROUND COLOR & PADDING-->
			<div id="table_show_current_contacts">
			
			
			
			<!--THESE DIVS NOTIFY THE USER OF THE CUSTOMER UPDATE PROCESS IF IT TAKES TOO LONG TO UPDATE-->
			<div id="loadingMessage">Updating... Please wait...</div>
			<div id="loadingOver"></div>
			
			<!--THESE DIVS NOTIFY THE USER OF THE SENDING EMAIL PROCESS IF IT TAKES TOO LONG TO SEND-->
			<div id="loadingEmail">Sending e-mail... Please wait...</div>
			<div id="loadingEmailOver"></div>
			
			
			
			<table>
				<tr style="font-weight: bold;">
					<td><label for="first">First Name</label></td>
					<td><label for="last">Last Name</label></td>
					<td><label for="title">Position Title</label></td>
					<td><label for="email">E-mail Address</label></td>
					<td><label for="phone">Phone Number</label></td>
				</tr>
				
				<?php
				
				$contacts_query = "SELECT * FROM orgContacts WHERE fundraiserID = '$groupID'";
				$contacts_result = mysqli_query($link, $contacts_query);
				confirm_query($contacts_result);
				
				if ($contacts_result) {
					while ($row_Info = mysqli_fetch_assoc($contacts_result)) {
						
						// START FORM FOR TABLE [orgContacts] - THIS ALLOWS USERS TO UPDATE THEIR CONTACTS ON THIS PAGE
						
						echo '
						
						<form action="contacts_update.php" method="post" enctype="multipart/form-data"
						onsubmit="update_contactLoading();">
						
						<input type="hidden" name="group_info" value="' . htmlspecialchars($_GET["group"]) . '" />
						<input type="hidden" name="update_contact" value="' . htmlspecialchars($row_Info["orgContactID"]) . '" />
						
						<tr>
							<td><input type="text" name="update_first" value="' . htmlspecialchars($row_Info['orgFName']) . '" /></td>
							<td><input type="text" name="update_last" value="' . htmlspecialchars($row_Info['orgLName']) . '" /></td>
							<td><input type="text" name="update_title" value="' . htmlspecialchars($row_Info['Title']) . '" /></td>
							<td><input type="text" name="update_email" value="' . htmlspecialchars($row_Info['orgEmail']) . '" /></td>
							<td><input type="text" name="update_phone" value="' . htmlspecialchars($row_Info['orgPhone']) . '" /></td>
							
							<td><input type="submit" name="submit_update" value="Update" class="edit_contact redbutton" /></td>
						</form>';
						
						// END FORM FOR TABLE [orgContacts] - THIS ALLOWS USERS TO UPDATE THEIR CONTACTS ON THIS PAGE
						
						
						
						echo '
						<form action="contacts_delete.php" method="post" enctype="multipart/form-data">
							<input type="hidden" name="group_info" value="' . $groupURL . '" />
							<input type="hidden" name="delete_contact" value="' . htmlspecialchars($row_Info["orgContactID"]) . '" />
							
							<td><input type="submit" name="delete" value="Delete" class="edit_contact redbutton" /></td>
						</form>
						</tr>';
					}
				}
				
				?>
			
			</table>
			</div>
		</div>
		
		<!--END SHOW CURRENT CONTACTS SECTION-->
		
		
		
		<br>
		<p><a href="addContacts.php?group=<? echo $_GET['group'];?>"><input type="button" class="redbutton" value="Add Contacts" /></a></p>
		
		
		<br>
		<h3 class="red_text">Send E-mails</h3>
		
		<!--START EMAIL SECTION LEFT SIDE-->
		
		<div id="table_email_section_left_side">
			<form action="lisa_send_emails.php?group=<?php echo $groupURL; ?>" method="post" enctype="multipart/form-data"
			onsubmit="email_sending();">
				
				
				
				<!--START SEND TO: RECIPIENT-->
				<div>
					<select multiple="multiple" id="select" name="send_emails[]" style="width: 562px;">
						<?php
						$get_contactsEmails = "SELECT * FROM orgContacts WHERE fundraiserID = '$groupID' ORDER BY orgFName ASC";
						$contactsEmail_results = mysqli_query($link, $get_contactsEmails);
						confirm_query($contactsEmail_results);
						
						if ($contactsEmail_results) {
							while ($row_contactsEmails = mysqli_fetch_assoc($contactsEmail_results)) {
								$firstname = htmlspecialchars($row_contactsEmails["orgFName"]);
								$lastname = htmlspecialchars($row_contactsEmails["orgLName"]);
								$fullname = $firstname . " " . $lastname;
								
								$position = htmlspecialchars($row_contactsEmails["Title"]);
								$phone = htmlspecialchars($row_contactsEmails["orgPhone"]);
								$email = htmlspecialchars($row_contactsEmails["orgEmail"]);
								
								echo '<option value="'.$email.'">'.$fullname.' ('.$email.')</option>';
							}
						}
						?>
					</select>
				</div>
				<!--END SEND TO: RECIPIENT-->
				
				
				
				<br />
				
				
				
				<!--START E-MAIL MESSAGE SECTION-->
				
				<div class="subject_and_message sub_mes2">
			
					<table style="width: 100%;">
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
				</div>
				
				<!--END E-MAIL MESSAGE SECTION-->
				
				<br />
				
				
				
				<input type="submit" name="submit" class="redbutton" value="Send E-mail" />
			</form>
			
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