<?php
session_start();

if (!isset($_SESSION['authenticated'])) {
	header('Location: ../index.php');
	exit;
}

       require_once("../includes/connection.inc.php");
       //require_once("../includes/functions.php");
       $link = connectTo();
       $user = $_SESSION['userId'];
       $userName = $_SESSION['email'];
       $query1 = "SELECT * FROM Dealers WHERE email='$userName'";
       $result1 = mysqli_query($link, $query1)or die("MySQL ERROR query 1: ".mysqli_error($link));
       $row1 = mysqli_fetch_assoc($result1);
       $dealerID = $row1['loginid'];
       $group = $row1['setuppersonid']; 
       $link = connectTo();
       $groupID = $dealerID;
       $groupURL = urlencode($_GET["group"]);

       $group = $_GET['group'];
       $email = $_SESSION['email'];


?>

<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<title>GreatMoods | Setup/Edit Website - Fundraising Contacts</title>
	
	<link href="../css/layout_styles.css" rel="stylesheet" type="text/css" />
	<link href="../css/form_styles.css" rel="stylesheet" type="text/css" />
	<link href="../css/header_styles.css" rel="stylesheet" type="text/css">
	<link href="../css/sidenav_styles.css" rel="stylesheet" type="text/css">
	<link href="../css/lisa_contacts_page.css" rel="stylesheet" type="text/css" />
	<link href="../jquery-ui-1.10.3/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
	<link href="../jquery-ui-1.10.3/ui/jquery.multiselect.css" media="screen" rel="stylesheet" type="text/css">
	
	<script src="../jquery-ui-1.10.3/jquery-1.9.1.js" type="text/javascript"></script>
	<script src="../jquery-ui-1.10.3/ui/jquery-ui.js" type="text/javascript"></script>
	<script src="../jquery-ui-1.10.3/ui/jquery.multiselect.js" type="text/javascript"></script>
	
	

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
		}
		
		function update_contactLoading() {
			document.getElementById('loadingMessage').style.display = 'block';
			document.getElementById('loadingOver').style.display = 'block';
		}
		
		$(document).ready(function(){
			$("#select").multiselect({
				noneSelectedText: "Select E-mail Address(es)"
			});
		});
		
		function change_input(strURL) {
			var req;
			if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
				req = new XMLHttpRequest();
			}
			else { // code for IE6, IE5
				req = new ActiveXObject("Microsoft.XMLHTTP");
			}
			req.onreadystatechange = function() {
				// When state is completed (4) and if HTTP status is "OK" (200).
				if (req.readyState==4 && req.status==200) {
					document.getElementById('message').value=req.responseText;
				}
			}
			req.open("GET", strURL, true);
			req.send(null);
		}
		
		function email_sending() {
			document.getElementById('loadingEmail').style.display = 'block';
			document.getElementById('loadingEmailOver').style.display = 'block';
		}
	</script>
</head>
	
<body>
<div id="container">
	<?php include 'header.php' ; ?>
	<?php include 'memberSidebar.php' ; ?>

	<div id="content">
		<h1>Send Emails</h1>
		<h3></h3>
		
		<!--START SHOW CURRENT CONTACTS SECTION-->
		
		<div>
			
			<?php
			
			// GET THE FUNDRAISER ACCOUNT'S NAME
			$fund_query = "SELECT * FROM Dealers WHERE userName = '$email'";
			$fund_result = mysqli_query($link, $fund_query);
			//confirm_query($fund_result);
			
			$fund_row = mysqli_fetch_assoc($fund_result);
			$fund_name = $fund_row['Dealer'] . " " . $fund_row['DealerDir'];
			$fund_id = $fund_row['loginid'];
			
			
			?>
			
			<h3 class="red_text">Current <?php echo $fund_name; ?> Contacts</h3>
			
			<!--THIS DIV IS HERE TO SIMPLY ADD THE BACKGROUND COLOR & PADDING-->
			<!--<div id="table_show_current_contacts">-->
			
			
			
			<!--THESE DIVS NOTIFY THE USER OF THE CUSTOMER UPDATE PROCESS IF IT TAKES TOO LONG TO UPDATE-->
			<!--<div id="loadingMessage">Updating... Please wait...</div>
			<div id="loadingOver"></div>-->
			
			<!--THESE DIVS NOTIFY THE USER OF THE SENDING EMAIL PROCESS IF IT TAKES TOO LONG TO SEND-->
			<div id="loadingEmail">Sending e-mail... Please wait...</div>
			<div id="loadingEmailOver"></div>
			
			
			
			<!--<table id="ff_accts">
				<tr>
					<th><label for="first">First Name</label></th>
					<th><label for="last">Last Name</label></th>
					<th><label for="title">Relationship</label></th>
					<th><label for="email">E-mail Address</label></th>
					<th><label for="phone">Phone Number</label></th>
				</tr>
				
				<?php
				
				$contacts_query = "SELECT * FROM orgCustomers WHERE fundMemberID = '$fund_id'";
				$contacts_result = mysqli_query($link, $contacts_query);
				//confirm_query($contacts_result);
				
				if ($contacts_result) {
					while ($row_Info = mysqli_fetch_assoc($contacts_result)) {
						
						// START FORM FOR TABLE [orgContacts] - THIS ALLOWS USERS TO UPDATE THEIR CONTACTS ON THIS PAGE
						
						echo '
						
						<form action="contacts_update.php" method="post" enctype="multipart/form-data"
						onsubmit="update_contactLoading();">
						
						<input type="hidden" name="group_info" value="' . $fund_id . '" />
						<input type="hidden" name="update_contact" value="' . $dealerID . '" />
						
						<tr>
							<td><input id="fname" type="text" name="update_first" value="' . $row_Info['first'] . '" /></td>
							<td><input id="lname" type="text" name="update_last" value="' . $row_Info['last'] . '" /></td>
							<td><input id="title" type="text" name="update_title" value="' . $row_Info['relationship'] . '" /></td>
							<td><input id="loginemail" type="text" name="update_email" value="' . $row_Info['email'] . '" /></td>
							<td><input id="phone" type="text" name="update_phone" value="' . $row_Info['homePhone'] . '" /></td>
							
							<td><input type="submit" name="submit_update" value="Update" class="edit_contact, redbutton" /></td>
						</form>';
						
						// END FORM FOR TABLE [orgContacts] - THIS ALLOWS USERS TO UPDATE THEIR CONTACTS ON THIS PAGE
						
						
						
						echo '
						<form action="contacts_delete.php" method="post" enctype="multipart/form-data">
							<input type="hidden" name="group_info" value="' . $groupURL . '" />
							<input type="hidden" name="delete_contact" value="' . htmlspecialchars($row_Info["orgContactID"]) . '" />
							
							<td><input type="submit" name="delete" value="Delete" class="edit_contact, redbutton" /></td>
						</form>
						</tr>';
					}
				}
				
				?>
			
			</table>
			</div>
		</div>-->
		
		<!--END SHOW CURRENT CONTACTS SECTION-->
		
		
		
		<!--<br>
		<p><a href="contacts.php?group=<? echo $dealerID;?>"><input type="button" class="redbutton" value="Add Contacts" /></a></p>-->
		

		
		<!--START EMAIL SECTION LEFT SIDE-->
		
		<div id="table_email_section_left_side">
			<form action="lisa_send_emails.php?group=<?php echo $groupURL; ?>" method="post" enctype="multipart/form-data"
			onsubmit="email_sending();">
				
				
				
				<!--START SEND TO: RECIPIENT-->
				<div>
					<select multiple="multiple" id="select" name="send_emails[]" style="width: 65%;">
						<?php
						$get_contactsEmails = "SELECT * FROM orgCustomers WHERE fundMemberID = '$dealerID' ORDER BY first ASC";
						$contactsEmail_results = mysqli_query($link, $get_contactsEmails);
						//confirm_query($contactsEmail_results);
						
						if ($contactsEmail_results) {
							while ($row_contactsEmails = mysqli_fetch_assoc($contactsEmail_results)) {
								$firstname = htmlspecialchars($row_contactsEmails["first"]);
								$lastname = htmlspecialchars($row_contactsEmails["last"]);
								$fullname = $firstname . " " . $lastname;
								
								$position = htmlspecialchars($row_contactsEmails["relationship"]);
								$phone = htmlspecialchars($row_contactsEmails["homePhone"]);
								$email = htmlspecialchars($row_contactsEmails["email"]);
								
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
								
								<textarea class="message_box_input message_box_firefox_only" id="message" name="message" rows="10" placeholder="Type any additional message here"></textarea>
								
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
					<td class="align_left">February 14, 2014</td>
					<td class="align_right">Valentine's Day</td>
				</tr>
				<tr>
					<td class="align_left">March 17, 2014</td>
					<td class="align_right">St. Patrick's Day</td>
				</tr>
				<tr>
					<td class="align_left">March 20, 2014</td>
					<td class="align_right">Spring Equinox</td>
				</tr>
				<tr>
					<td class="align_left">April 20, 2014</td>
					<td class="align_right">Easter Sunday</td>
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
					<td class="align_right">Summer Solstice</td>
				</tr>
				<tr>
					<td class="align_left">July 4, 2014</td>
					<td class="align_right">Independence Day</td>
				</tr>
				<tr>
					<td class="align_left">September 23, 2014</td>
					<td class="align_right">Fall/Autumn Equinox</td>
				</tr>
				<tr>
					<td class="align_left">October 31, 2014</td>
					<td class="align_right">Halloween</td>
				</tr>
				<tr>
					<td class="align_left">November 27, 2014</td>
					<td class="align_right">Thanksgiving Day</td>
				</tr>
				<tr>
					<td class="align_left">December 17, 2014</td>
					<td class="align_right">First Day of Hanukkah</td>
				</tr>
				<tr>
					<td class="align_left">December 21, 2014</td>
					<td class="align_right">Winter Solstice</td>
				</tr>
				<tr>
					<td class="align_left">December 24, 2014</td>
					<td class="align_right">Last Day of Hanukkah</td>
				</tr>
				<tr>
					<td class="align_left">December 25, 2014</td>
					<td class="align_right">Christmas Day</td>
				</tr>
				<tr>
					<td class="align_left">December 31, 2014</td>
					<td class="align_right">New Year's Eve</td>
				</tr>
			</table>
		
		</div>
		
		<!--END EMAIL SECTION RIGHT SIDE-->
		
		
		
	</div>
	
	<!--END MAIN CONTENT-->
	
	
	
	<?php include("footer.php"); ?>

</div>

<!--END CONTAINER-->

</body>
</html>

<?php ob_end_flush(); ?>