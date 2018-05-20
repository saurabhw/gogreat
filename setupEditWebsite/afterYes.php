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
	<title> When They Say “Yes!” </title> 
</head>
	
<body>
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <?php include 'sideLeftNav.php' ; ?>
      
        
    <div id="content">
    <h1>When They Say “Yes!”</h1>
    <h3>Congratulations! Your client has just said “Yes!” to the GreatMoods Program!<br>Here's what you do now:</h3>

	<h5>First, you have to setup their group’s <a href="https://www.paypal.com/" title="Click to Visit PayPal to Sign Up">PayPal Account</a>.</h5>
      	<p> You should do this with your client (on the phone or in person). Two key pieces of information are needed: <br>
      	<ol>
      		<li>PayPal requires an email address to be setup. So, your client will have to choose between either using their own email address or creating
      		  a new email address. If they choose to create a new address we recommend using Outlook.com.<br>
      		<i>PayPal requires either a Tax I.D. number or a Social Security Number. So, you’ll need one or the other.</i></li>
      		<li>If you’ve never setup a PayPal account before, have no fear! The process is extremely straight forward and easy. If you need a step-by-step
      		 guide to help you better understand the process of setting up a PayPal account, go to the PayPal setup page.</li>
       </ol>
      		
               <h5>Next, you’ll need the names and email addresses of the members of the group you’ve just setup.</h5>
                 <p> You need this information in order to setup a fundraising page for each of said members. To do this you have two options.
                 <ol>
			<li>Get a list of each of the group member’s names and email addresses from the client. </li>
		  You’ll need this list to setup a fundraising website for each member. Once you have a list, you can either set everyone up yourself, or
		 email the list to your Sales Manager to do for you.</p>
   			<li>Ask the Client for one or two members within the group to setup each of their fellow members. </li>
   		</ol>
   		
   		<p>This could be a team captain or just someone who’s tech savvy enough to take care of everything. Ensure the client that the process doesn’t 
   		take very long. </p> 

   		 <p>If this is the option you decide to go with, get the contact information of the person(s) who’ll be setting everyone up (that way you’ll be
   		  able to answer any questions they may have). </p>
   		  
                  <h5>Lastly, and possibly most importantly, ask for 1 or 2 referrals to other organizations.</h5>
                 <p>This step will be vital to your success, especially if you’re someone with a limited network. To download Referral Forms to take with you, please visit the “<a href="printshop.php">Printshop Library</a>” page.</p>
                 <br></br>
                 
   		<h1>When They Say “Yes”: Recap</h1>
   		<h3>1) Set up the Website for the Prospects</h3>
   		<p>Once the prospect agrees to the GreatMoods program, make sure you set a date to have everything completed by.  You will then need to
   		 collect the prospect’s information in order to set up their PayPal account and fundraising website.  
		You can help them set up their member’s accounts, or they can do it themselves. 
			<ol>
				<li>Setup the group’s PayPal account.</li>
				<li>Create the group’s main fundraising website.</li>
				<li>Get the group members setup on the fundraising website.</li>
			</ol>
		</p>
		<h3>2) Ask for referrals </h3>
		<h3>3) Keep in touch </h3>
		<h5>Remember, once you get your prospect set up with their account, you are there to help them with their fundraising needs.  </h5>
   		
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