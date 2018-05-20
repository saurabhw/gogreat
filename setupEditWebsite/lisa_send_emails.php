<?php
session_start();
if (!isset($_SESSION['authenticated'])) {
	header('Location: ../index.php');
	exit;
}
ob_start();

require_once("../includes/connection.inc.php");
require_once("../includes/functions.php");

$link = connectTo();

$groupID = mysqli_prep($_GET["group"]);
$groupURL = urlencode($_GET["group"]);

$rep_email = $_SESSION["email"]; // Retrieved when you login (username field has name="email").
$safe_rep_email = mysqli_prep($rep_email);



// START GETTING INFORMATION TO INSERT INTO emails_sent

// GET REP ID
$query = "SELECT * FROM user_info WHERE email = '$safe_rep_email'";
$result = mysqli_query($link, $query);
confirm_query($result);
$row = mysqli_fetch_assoc($result);
$rep_id = mysqli_prep($row["userInfoID"]); // rep id
$rep_fullname = $row["FName"] . " " . $row["LName"];
$rep_phone = $row["homePhone"];


// START GETTING GROUP NAME
$group_query = "SELECT * FROM Dealers WHERE loginid = '$groupID'";
$group_result = mysqli_query($link, $group_query);
confirm_query($group_result);
$group_row = mysqli_fetch_assoc($group_result);
$school = mysqli_prep($group_row["Dealer"]);
$club = mysqli_prep($group_row["DealerDir"]);
$groupName = $school . " " . $club; // group name
$groupUsername = $group_row["userName"]; // username
$groupPassword = $group_row["firstPass"]; // password

// END GETTING INFORMATION TO INSERT INTO emails_sent



$email = $_POST["send_emails"]; // Array of emails. Ex: $email[0] = lisa_aunt@greatmoods.com



$x = 0;

if (isset($_POST["submit"])) {
	while ($email[$x] != NULL) {
		// START QUERY TO GET INFORMATION FOR EACH E-MAIL
		
		$info_query = "SELECT * FROM orgContacts WHERE orgEmail = '$email[$x]'";
		$info_results = mysqli_query($link, $info_query);
		confirm_query($info_results);
		$info = mysqli_fetch_assoc($info_results);
		
		$recFirst	= mysqli_prep($info["orgFName"]);
		$recLast	= mysqli_prep($info["orgLName"]);
		$position	= mysqli_prep($info["Title"]);
		$phone		= mysqli_prep($info["orgPhone"]);
		
		// END QUERY TO GET INFORMATION FOR EACH E-MAIL
		
		$from = htmlspecialchars($rep_email);
		$headers = "From:" . $from;
	
		$recipient = htmlspecialchars($email[$x]);
		
		$subject = htmlspecialchars($_POST["subject"]);
		
		$message  = "Hi, " . htmlspecialchars($info["orgFName"]) . ",";
		$message .= "\n\n";
		$message .= "The " . htmlspecialchars($groupName) . " has their free fundraising website all ready to go!";
		$message .= "\n\n";
		$message .= htmlspecialchars($_POST["message"]);
		$message .= "\n\n";
		$message .= "Please click on the link below to view the fundraiser that your group will love.";
		$message .= "\n";
		$message .= "http://www.greatmoods.com/fundSite.php?group=" . $groupURL;
		$message .= "\n\n";
		$message .= "Here is your login information.";
		$message .= "\n";
		$message .= "Username: " . $groupUsername;
		$message .= "\n";
		$message .= "Password: " . $groupPassword;
		$message .= "\n\n";
		$message .= "Thank you.";
		$message .= "\n\n";
		$message .= htmlspecialchars($rep_fullname);
		$message .= "\n";
		$message .= htmlspecialchars($rep_phone);
		$message .= "\n";
		$message .= htmlspecialchars($rep_email);
	
		mail($recipient, $subject, $message, $headers);
		
		// IF AN E-MAIL IS SENT, INSERT DATA INTO emails_sent
		
		if (mail) {
			$groupSafe	= mysqli_prep($groupName);
			$sub		= mysqli_prep($_POST["subject"]);
			$mes		= mysqli_prep($_POST["message"]);
			
			$insert  = "INSERT INTO emails_sent (";
			$insert .= "senderID, groupName, recipientFirst, recipientLast, position, sentOn, ";
			$insert .= "subject, message, phone) ";
			$insert .= "VALUES (";
			$insert .= "'$rep_id', '$groupSafe', '$recFirst', '$recLast', '$position', now(), ";
			$insert .= "'$sub', '$mes', '$phone')";
			
			$insert_done = mysqli_query($link, $insert);
			confirm_query($insert_done);
		}
		
		$x++;
	}
	
	redirect_to("sendEmail.php?group=" . $groupURL);
}

// SEND DATE TO BE USED ON THIS PAGE OR A DIFFERENT PAGE
// $send_on = htmlspecialchars($_POST["send_on"]);

ob_end_flush();
?>