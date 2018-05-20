<?php
session_start(); // session start
ob_start();
ini_set('display_errors', '1'); // errors reporting on
error_reporting(E_ALL); // all errors
require_once('../includes/functions.php');
require_once('../includes/connection.inc.php');
require_once('../includes/imageFunctions.inc.php');
$link = connectTo();
   if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
  
   $userID = $_SESSION['userId'];
   $query = "SELECT * FROM user_info WHERE userInfoID='$userID'";
   $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysqli_error($link));
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
       
?>

<!DOCTYPE html>
<head>
	<title>Your Fundraising Presentation</title>
</head>
	
<body>
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <?php include 'sideLeftNav.php' ; ?>
	
      
    <div id="content">
    <h1> Your Fundraising Presentation</h1>
    <h3>In-Person or Over the Phone</h3>

	<div id>
      		<p>You’re just about ready to start setting up fundraisers, but before you do that, you should always make sure you have the various necessities needed for a call or appointment. Here’s what you’ll need to do:  </p>
      		
   		<h5>In-Person Appointment Presentation Checklist </h5>
   		
 	        
     		<ul class="bulletedlist">
		        <li>Have the sales Presentation Documents and Custom Website URL ready to show them. </li>
		        <li>Setup up the date, time and specific location in the building to meet. </li>
		        <li>Get Everyone you can at the appointment that are decision makers or potential Fundraising Leaders. </li>
		        <li>Introduce yourself to the prospects in a friendly way to develop a long-term relationship. </li>
		        <li>Ask the prospect about their current Fundraising status, if any, and discuss their Goals. </li>
		        <li>Get a sense of their Fundraising needs. </li>
		        <li>Explain the GreatMoods Fundraising Program and how it will address their needs. </li>
		        <li>When they say Yes, be sure to gather all of their necessary contact information, and ask them which specific groups they are interested in setting up and to gather a list of all their leader and member contacts with name, email, and phone numbers.  Also ask them the best place to gather their photos so you can customize their website with them.<br>Note: you can email them the “Leader & Member Contact Information” spreadsheet to be filled out easily.</li>
		        <li>Bring a hard copy of an example Fundraiser website. Just in case the person you’re presenting to doesn’t have internet access. This will be a series of 5 sheets of paper that you’ll have to print out and staple together. </li>
		        <li>Lastly, always bring the basics. A notebook, pen, business card (or a sheet of paper with your basic information on it). </li>
                </ul>
          

   		<p>* By the time you’re done with your appointment, you should leave behind the Presentation Packet you put together. That way the client has something to look back at once you’ve left. </p>
                <p>*  It’s up to you whether or not you leave the (The Example Fundraiser Packet) with your client. You can either take it or leave it. If they want it, leave it. If you feel it would be beneficial to leave it behind, leave it. </p>

   		<h5>Over the Phone Sales Presentation Appointments </h5>
   	  	<ul class="bulletedlist">
   	  	 	<li>Be in front of a computer, have the sales packet in front of you so you can walk them through the presentation. </li> 
   	  	 	<li>Introduce yourself to the prospect(s). </li>
   	  	 	<li>Ask the prospect about their current fundraising status, if any, and discuss their goals.  </li>
   	  	 	<li>Get a sense of their fundraising needs. </li>
   	  	 	<li>Explain the GreatMoods Fundraising Program and how it will address their needs.  </li> 
   		 	<li>When they say Yes, be sure to gather all of their necessary contact information, and ask them which specific groups they are interested in setting up and to gather a list of all their leader and member contacts with name, email, and phone numbers.  Also ask them the best place to gather their photos so you can customize their website with them.<br>Note: you can email them the “Leader & Member Contact Information” spreadsheet to be filled out easily.</li>
							
   		</ul> 
   		
	</div> <!--end column1-->
    
	      </div>  <!--end content-->
      
	<?php include 'footer.php' ; ?>
</div> <!--end container-->

</body>
</html>
<pre>
<?php if ($_POST && $mailSent){
	echo htmlentities($message, ENT_COMPAT, 'UTF-8')."\n";
	echo 'Headers: '.htmlentities($headers, ENT_COMPAT, 'UTF-8');
} ?>
</pre>
<?php
   ob_end_flush();
?>