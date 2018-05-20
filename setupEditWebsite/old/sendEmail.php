<?php
   session_start();

   if (!isset($_SESSION['authenticated'])) {
	header('Location: ../index.php');
	exit;
   }

  require_once("../includes/connection.inc.php");
  require_once("../includes/functions.php");

   $link = connectTo();
   $userID = $_SESSION['userId'];
   $query = "SELECT * FROM user_info WHERE userInfoID='$userID' and role='Representative'";
   $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error());
   $row = mysqli_fetch_assoc($result);
   $cn = $row['companyName'];
   $fn = $row['FName'];
   $mn = $row['MName'];
   $ln = $row['LName'];
   $sn = $row['ssn'];
   $a1 = $row['address1'];
   $a2 = $row['address2'];
   $ct = $row['city'];
   $st = $row['state'];
   $zp = $row['zip'];
   $email = $row['email'];
   $hp = $row['homePhone'];
   $cp = $row['cellPhone'];
   $fb = $row['fbPage'];
   $tw = $row['twitter'];
   $li = $row['linkedin'];
   $pp = $row['userPaypal'];
   $pic = $row['picPath'];
   $ftxin = $row['fedtin'];
   $stxin = $row['statetin'];
   $nonp = $row['threec'];
   $pic = $row['picPath'];
$link = connectTo();
$groupID = mysqli_prep($_GET["group"]);
$groupURL = urlencode($_GET["group"]);

$groupSet = $_GET['set'];
?>

<!DOCTYPE html>
<head>
	<title>Send Email | Representative</title>
</head>
	
<body>

<!--START CONTAINER-->
<div id="container">
	<?php
		include("header.inc.php");
		include("sideLeftNav.php");
	?>
	
	<!--START MAIN CONTENT-->
	<div id="content">
		
		<!--<h2>View Contacts</h2>-->

		<!--START SHOW CURRENT CONTACTS SECTION-->
		<!--<div>
			
			<?php
			
			// GET THE FUNDRAISER ACCOUNT'S NAME
			$fund_query = "SELECT * FROM Dealers WHERE loginid = '$group'";
			$fund_result = mysqli_query($link, $fund_query);
			confirm_query($fund_result);
			
			$fund_row = mysqli_fetch_assoc($fund_result);
			$fund_name = $fund_row['Dealer'] . " " . $fund_row['DealerDir'];
			
			?>
			
			<h3 class="red_text">Current <?php echo $fund_name; ?> Contacts</h3>-->
			
			<!--THIS DIV IS HERE TO SIMPLY ADD THE BACKGROUND COLOR & PADDING-->
			<!--<div id="table_show_current_contacts">-->
			
			<!--THESE DIVS NOTIFY THE USER OF THE CUSTOMER UPDATE PROCESS IF IT TAKES TOO LONG TO UPDATE-->
			<!--<div id="loadingMessage">Updating... Please wait...</div>
			<div id="loadingOver"></div>-->
			
			<!--THESE DIVS NOTIFY THE USER OF THE SENDING EMAIL PROCESS IF IT TAKES TOO LONG TO SEND-->
			<div id="loadingEmail">Sending e-mail... Please wait...</div>
			<div id="loadingEmailOver"></div>
			
			<!--<table>
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
							
							<td><input type="submit" name="submit_update" value="Update" class="edit_contact" /></td>
						</form>';
						
						// END FORM FOR TABLE [orgContacts] - THIS ALLOWS USERS TO UPDATE THEIR CONTACTS ON THIS PAGE
						
						
						
						echo '
						<form action="contacts_delete.php" method="post" enctype="multipart/form-data">
							<input type="hidden" name="group_info" value="' . $groupURL . '" />
							<input type="hidden" name="delete_contact" value="' . htmlspecialchars($row_Info["orgContactID"]) . '" />
							
							<td><input type="submit" name="delete" value="Delete" class="edit_contact" /></td>
						</form>
						</tr>';
					}
				}
				
				?>
			
			</table>
			</div>
		</div>-->
		
		<!--END SHOW CURRENT CONTACTS SECTION-->
		
		
		
		<!--<br />
		<p><a href="addContacts.php?group=<? echo $_GET['group'];?>"><input type="button" value="Add Contacts" /></a></p>-->
		
		
		
		<h1>Send E-mails</h1>
		<h3></h3>
		
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
			<h5>Upcoming Fundraising Opportunities</h5>
			
			<table class="">
				<tr>
					<td class="align_right">July 4, 2016</td>
					<td class="align_left">Independence Day</td>
				</tr>
				<tr>
					<td class="align_right">September 22, 2016</td>
					<td class="align_left">Fall/Autumn Equinox</td>
				</tr>
				<tr>
					<td class="align_right">October 31, 2016</td>
					<td class="align_left">Halloween</td>
				</tr>
				<tr>
					<td class="align_right">November 24, 2016</td>
					<td class="align_left">Thanksgiving Day</td>
				</tr>
				<tr>
					<td class="align_right">December 21, 2016</td>
					<td class="align_left">Winter Solstice</td>
				</tr>
				<tr>
					<td class="align_right">December 25, 2016</td>
					<td class="align_left">First Day of Hanukkah</td>
				</tr>
				<tr>
					<td class="align_right">December 25, 2016</td>
					<td class="align_left">Christmas Day</td>
				</tr>
				<tr>
					<td class="align_right">December 31, 2016</td>
					<td class="align_left">New Year's Eve</td>
				</tr>
				
				<tr>
					<td class="align_right"></td>
					<td class="align_left"></td>
				</tr>
				
				<tr>
					<td class="align_right">January 1, 2017</td>
					<td class="align_left">Last Day of Hanukkah</td>
				</tr>
				<tr>
					<td class="align_right">February 14, 2017</td>
					<td class="align_left">Valentine's Day</td>
				</tr>
				<tr>
					<td class="align_right">March 17, 2017</td>
					<td class="align_left">St. Patrick's Day</td>
				</tr>
				<tr>
					<td class="align_right">March 20, 2017</td>
					<td class="align_left">Spring Equinox</td>
				</tr>
				<tr>
					<td class="align_right">April 16, 2017</td>
					<td class="align_left">Easter Sunday</td>
				</tr>
				<tr>
					<td class="align_right">May 14, 2017</td>
					<td class="align_left">Mother's Day</td>
				</tr>
				<tr>
					<td class="align_right">June 18, 2017</td>
					<td class="align_left">Father's Day</td>
				</tr>
				<tr>
					<td class="align_right">June 21, 2017</td>
					<td class="align_left">Summer Solstice</td>
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