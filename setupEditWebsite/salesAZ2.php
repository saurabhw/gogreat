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
	<title> GreatMoods Representative Training Program Overview - A to Z </title>
</head>
	
<body>
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <?php include 'sideLeftNav.php' ; ?>
      
	<div id="content">
		<h1>Training Program Overview - A to Z</h1> 
		<h3>GreatMoods Representative </h3>     
	
		<p>Welcome! GreatMoods is completely committed to developing a long-term, successful relationship with you and your future fundraising customers, period. Achieving Success for your Goals is our Goal. Exciting, fun, challenging and rewarding are all words to describe your New Career with GreatMoods. </p>
		<p>Think about it, what you get to do, every day of the week, is help people accomplish their goals, dreams and missions within your Community and Region. Pretty neat, huh? </p>
		<p>Making a very good long-term financial living from our Online Fundraising Program is obviously another great benefit of GreatMoods. Online Fundraising is the future, door to door sales will soon be the past. Social networking is going through the roof with today’s smart phone, tablet and laptop generation.  </p>
		<p>The GreatMoods Free Online Fundraising Program is the solution that all the Schools, Churches and Community Organizations will love once you sign them up and get them started. Begin your future today by following our step by step fundraising success program!  </p>
		
		<h5>First Step:</h5>
		<p>To begin as a GreatMoods Representative, Review the “Program Features and Benefits” at <a href="http://www.greatmoods.com">www.GreatMoods.com</a></p>
		<ol>	
			<li>Start by clicking on and reviewing each left navigation button on the Homepage at <a href="http://www.greatmoods.com">www.GreatMoods.com</a>, to understand the primary features of the GreatMoods Fundraising Program.</li>
			<li>Review various selections in the Fundraising Examples (via the top red menu bar) to see what your Future Accounts will look like.</li>
			<li>To view the Fundraiser Account Setup Screens your Fundraising Account Leaders will use, select "3 Steps to Fundraising $uccess!". Step 1 illustrates the information that is setup or edited for the main fundraising account.  Step 2 then illustrates the setup or edit of Students or Members.</li>
			<li>Step 3 illustrates how easy it is for Students / Members to send out emails to Friends and Family Supporters which will then allow them to click on a link to view the Student / Member’s fundraising website.</li>
			<li>View and Use the Income Calculator to set Fundraising Goals.</li>
		</ol>
		
		<br>
		<h5>Second Step:</h5>
		<p> Read the other topics on the left menu bar you’re viewing:
		<ol>
			<li>Understand your Responsibilities to your Accounts, their Success makes your $uccess!</li>
			<li>Study your Prospective Account Opportunities.</li>
			<li>Define the Prospects in your Region who you would like to call on, using our Prospect Forms.</li>
			<li>Prioritize those Prospects into a top 10 to 20 list that you want to focus on first.<br>Click on one of the links to see an example of the High School Prospect List: 
			<a href="../forms/V16.0 High School Prospects List Form.doc" target="_blank" title="Click to download file">DOC</a> | 
			<a href="../forms/V16.0 High School Prospects List Form.pdf" target="_blank" title="Click to download file">PDF</a></li>
			<li>Send in that list to your GreatMoods Contact so we can create the Banners and you can start to research those Prospect Accounts for Contact Information, Pictures, Phone Numbers etc.</li>
			<li>Get those Prospect Accounts Website Banners setup (to use as a selling tool).</li>
		</ol>
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