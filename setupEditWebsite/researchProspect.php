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
  if($_SESSION['freeze'] == "TRUE")
       {
          // echo "Account Frozen";
           header('Location: accountEdit.php');
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
	<title> Researching Prospects </title>
</head>
	
<body>
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <?php include 'sideLeftNav.php' ; ?>
      
	<div id="content">
		<h1>Researching Your Prospects</h1>
		<h3>Gathering Organizational Information for your Prospect's Website and Presentation </h3>
	
		<h5>Know your Prospective Customer! Be Prepared when you offer our Great Long-Term Online Fundraising Solution!</h5>
		<p>Research your Prospective Customer Details:</p>
		
		<ul class="bulletedlist">
			<li>Account Name</li>
			<li>Account URL (so our Graphics Team can create the Banner at your Website)</li>
			<li>Contact Name/Title </li>
			<li>Phone Number </li>
			<li>Account Address </li> 
			<li>Detailed Fundraising Leaders Contact List with Phone Number and Email Addresses:
				<ul class="bulletedlist">
					<li>Sports Teams – Coaches, Team Captains or Student Leaders, Booster Parents, Athletic Directors</li>
					<li>Clubs – Director or Teacher, Student Leaders, Booster Parents</li>
					<li>Elementary & Middle School – Principals, PTA/PTO/PTC, Clubs and Sports</li>
					<li>Church – All Ministers, Choir, Ministry Leaders, Youth Minister, Scout Troop Leaders</li>
					<li>Organizations – Leaders and Officers</li>
				</ul>
			</li>
		</ul>
		
		<ul class="bulletedlist">
			<li>Research Pictures of the Group and its Leaders online. Find the Group's Twitter and/or Facebook Accounts if they have them, as well as Bing Images which is another great source of pictures. Many times these will have group and individual pictures complete with names.</li>
		</ul>
		
		<ul class="bulletedlist">
			<li>Fundraising Leader's Photos:
				<ul class="bulletedlist">
					<li>Coach, Assistant Coach, President, VP, etc.</li>
					<li>Student Leader Contacts (Captains, Presidents, VP’s, etc.)</li>
				</ul>
			</li>
			
			<ul class="bulletedlist">
				<li>Group's Photos</li>
				<li>See the Printshop Library folder for Photo Training on How to Copy, Paste, Re-size and Post a Photo</li>
			</ul>
		</ul>
		
		<!--  <p>The above is an overview of the "put in link to page"</p>   -->
		<p>Note: Use our Prospect Forms to help you detail out each Prospective Account's Information</p>
		
		<h5>When beginning the process of identifying and defining the prospects in your region, here are some of the very effective 
		tools to make that job easier. </h5>
		<p>In addition to the forms and documents we have provided for you to take notes on, the Internet will very likely 
		provide you with all the account information and content you will need to make a very effective website and presentation.</p>
		
		<h5>Research Tools</h5>
		<ul class="bulletedlist">
			<li>Bing, Google & Yahoo Search Engines </li>
			<li>Twitter, Facebook </li>
		</ul> 
		<p>Search by typing key general words in the search line and be sure to search the image area also </p>
		
		<h5>School Networking Opportunities </h5>
		<p> 60 Fundraising Opportunities exist in most High Schools alone, so why don’t you find an assistant at that School Account to help you
		setup the fundraisers? They know where everybody in the school is and they are there every day. </p>
		<ul class="bulletedlist">    
			<li>You could split the commission and setup more fundraisers, which makes you more money year in and year out.</li>
			<li>Find a Teacher, Athletic Director or even a Student looking for a way to pay for College.</li>
			<li>If you approach school accounts this way, you can set up more schools, potentially a lot faster. </li>	
		</ul>
		
		<br>
		<h5>Potential Key High School Sales Assistants: </h5>
		<ul class="bulletedlist">
			<li>  Athletic Directors, Coaches or Teachers </li> 
			<li>  Team Captains and Club Leaders </li>
			<li>  Student Leaders and Officers </li>
			<li> Why use students? 
				<ul class="bulletedlist">     
					<li>Great College Application Reference </li>
					<li>Great way to pay for College </li> 
					<li>They completely understand Social Networking & Online Ordering </li>
				</ul>
			</li>
		</ul>
		
		<br>
		<p>In summary, the advantage of recruiting a Teacher, Athletic Director, Coach or Student as a Sales Assistant, to setup the School and split
		the Commission, is that there is the potential for more Sales volume in a faster period. An Inside Person who is on location
		knows everyone and will be there for years. </p>
	
		<p>Have fun identifying all your long-term opportunities and remember that it’s a win win situation for both of you, because their Fundraising $uccess equals your $uccess!  </p>
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