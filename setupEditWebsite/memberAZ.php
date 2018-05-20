<?
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
	<title>Members A to Z | GreatMoods</title>
</head>
	
<body>
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <?php include 'sideLeftNav.php' ; ?>
      
    <div id="content">
    <h1>Students or Members - A to Z </h1>
    
    <h3>Achieving Success for your Goal is our Goal... So Let’s Do It!!!</h3>

      		<h5>Student / Member Step by Step Fundraising Checklist:</h5>
      		<ol>
      		  <li> When working with students, tell them that Volunteering to be on the Fundraising Leaders Team will be a Great College Application Reference </li>
      		  <li>Help the Fundraising Leaders Setup their Main Website  </li>
      		  <li>Setup your Personalized Fundraising Website </li>
      		  <li>Setup your Friends and Family Supporters List and add local Businesses </li>
      		  <li>Add a link to your Twitter and Facebook Page connecting it to your Fundraising Website </li>
      		  <li>Start the Email Campaign Kickoff  </li>   
      	        </ol>
      	         
      		  <br>
      		  
      		<h5>Year Round Opportunity to Generate Funds </h5>
      		<ul class="bulletedlist">
      		  <li>Holidays </li>
      		  <li>Apparel Seasons</li>
      		</ul>		 
      		   
      		  <br>
      		  
      		<h5>The GreatMoods Mall Products and Gifts </h5>
      		<ul class="bulletedlist">
      		  <li>Products for every reason and season</li>
      		  <li>Something for everyone</li>
      		</ul>
      		 
      		  <br>
      		  
      		<h5>The Student Member Potential Prospects </h5>
      		<ul class="bulletedlist">
      		  <li>Friends & Family   </li>
      		  <li>Local Businesses   </li>
                  <li>Meetings and Events   </li>
                </ul>
      		 
      		  <br>
      		  
                <h5>Fundraising Tools </h5>
                <ul class="bulletedlist">
                  <li>Video Training   </li>
      		  <li>Tablet or Laptop Presentation   </li>
                  <li>Forms at Events   </li>
                  <li>Contact Cards   </li>
                </ul>

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