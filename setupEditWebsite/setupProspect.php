<?php
 session_start(); // session start
 ob_start();
 ini_set('display_errors', '1'); // errors reporting on
 error_reporting(E_ALL); // all errors
 require_once('../includes/functions.php');
 require_once('../includes/connection.inc.php');
 require_once('../includes/imageFunctions.inc.php');
 $link = connectTo();

  if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "RP")
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
	<title> Setting Up your Prospects Website</title> 
</head>
	
<body>
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <?php include 'sideLeftNav.php' ; ?>

      
    <div id="content">
    <h1>Setting Up your Prospect's Website</h1>
    <h3>Pulling everything together for your presentation  </h3>
   
      <p>Once you’ve identified at least 10-20 Prospective Fundraising Accounts, you need to Email a replica of the Prospects List Document to your GreatMoods Contact, listing off each of the Prospective Fundraising Accounts (Name & Address) along with a link/URL to each organization’s individual website.  This document provides us with the basic information needed to create the Prospect’s Accounts Banner of their Website at your GreatMoods Representative Website, for you to use as a sales tool.</p>
      
      <p>For example, if you want to pursue a prospect within Henry Sibley High School. You would go to Henry Sibley High School’s website, copy the exact link of the website (aka the URL) and paste it in an email to your GreatMoods Contact.</p>
   	
   	<p> Example of what to send us:</p>

	<div id="column1">
            <p><b><u>School Name and Address</u></b><br>
            	Henry Sibley High School<br>
    	   	123 Main St.<br>
            	Mendota Heights, MN 54321 </p>
	</div> <!--end column1-->
	
      <div id="column2">
          <p><b><u>School URL</u></b><br>
          	http://www.sibley.isd197.org<br>
          	<br><br></p>
        </div> <!--end column2-->
   
	<br>
	
	<p>Again, the URL information you provide will allow our Graphics Team to be able to setup each Prospect’s Fundraising Website with a personalized banner. The Graphics Team will click on your Prospect Account's URL which will bring them to the specific website you what to setup, and they will copy and download the banner then resize it to fit our website and finally upload it to your Prospect's Website.  </p>
   	
   	<p>That Prospective Account will be set up for you at your GreatMoods Representative Website if you have not already created it yourself. We’re here to help you succeed, so setting up your Prospect websites will save you hours of time if you are struggling to do it yourself. As a Representative, it’s beneficial for you and everyone else that your time is spent on getting people to say “Yes!” to the program instead of spending hours in front of a computer setting up your various fundraisers if that’s not who you are.  </p>
   	
   	<p>Preparing Your Prospective Account's Website Presentation is Easy if you want to get going right away! Just log into your Representative Website and add the information you have collected to your New Account Website Setup Screens and Save it; done!	</p>
   	
   	<p>Sending an Email to the Prospective Account's Group’s Leaders with a link to their Website will be the first step in your Sales process. This will be very impressive to your Prospective Account when they see their own Fundraising Website ready to go. When meeting in person you can print out the Prospective Account's Website Homepage and add it to our Presentation Packet to leave behind with the Fundraising Leaders or you could just Email the Presentation Packet to them. </p>
   		
   	<h3> How to Setup Prospects and Accounts Yourself </h3>	
   	<h5> Setting up or Editing Prospects and Real Accounts at your Representative Website is Easy </h5>
   	<p>Getting your Fundraising Prospect or Account to say “Yes” and “Start” their Fundraising is your number #1 Priority, period. Calling, Setting up Appointments and sending Marketing Emails makes your Income Calculator Goals a Reality. </p>
	
	<p>Having said that, in your off hours or non productive work time, it is very easy to setup Prospects or Turn On and Start Fundraising Accounts you have closed, if you want to. Follow our tutorial to learn the process of doing the work yourself. </p>
 
 	<p> Remember, getting your Prospects or Accounts to say “Yes” and “Start” is your Number One Priority. That’s why we want to assist you in the beginning doing those things for you but…. if you want to get going & feel comfortable doing it yourself, we also don’t want to be slowing you down if you can do it for yourself. The more you do yourself, the more Income you are likely to achieve.  </p>
 
 	 <p> Step by Step Training:  </p>
 	 <ol>
        	<li>Login with the Username and Password given to you.</li>
         	<li>From the “Account Home” page, click on “Add Fundraiser Account”. </li>
         	<li>You're now at the “Add Fundraiser Account” page.  From here, choose what type of organization you wish to setup, such as “High School”, for example.  Then click “Set Up Website” to proceed. </li>
         	<li>Next, fill in the required fields.  Then, move to the box to the right and click “Select All Groups” to select all the different groups within the organization.  Scroll down and click “Create New Fundraiser” to continue. </li>
         	<li>After you've clicked “Create New Fundraiser”, you'll be taken back to your “Account Home” page.  From here you should be able to view your newly-created fundraiser(s). </li>
         </ol>

 		
	</div> 
    	
	
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