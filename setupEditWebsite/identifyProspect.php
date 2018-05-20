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
	<title> Identifying Your Specific Prospect Opportunities </title> 
</head>
	
<body>
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <?php include 'sideLeftNav.php' ; ?>

    <div id="content">
    <h1>Identifying Your Specific Prospects </h1>
    <h3>Fundraising Account Opportunities in your Community or Region to Pursue Today! 
</h3>

      		<p>Let’s get started in identifying and setting up the specific Fundraising Accounts in your Region, that you would like to approach first with the GreatMoods Program. After studying from the Prospect Opportunities page and Example Website section of the GreatMoods website you should have a pretty good idea of whom your Prospects are, so now let’s start to target in on the specific Accounts you want to present to first in your Region.</p>
      		<p>Brainstorm some by either printing out one or all of the Prospect Forms below or create your own list to send to us. From the list you send us with the Account Name and Address, as well as the Accounts specific URL which we will create a real Website from; complete with the Prospective Accounts Banner posted at your own GreatMoods Representative Website.  </p>
      		
      <div id="column1">		
      		
   		<h5>Account List Research Prospect Forms:</h5>
   	<ul> <!-- If you're doing a list, remember to have those 'li' tags inside the 'ul' tag -->
   	   	<li>High School Prospects List Form &nbsp;&nbsp;  <br>   	   	
   	   		<a href="../forms/V16.0 High School Prospects List Form.doc" target="_blank" title="Click to download file">DOC</a> |
   	   		<a href="../forms/V16.0 High School Prospects List Form.pdf" target="_blank" title="Click to download file">PDF</a>
   	   	</li>
   	       <li>Middle School Prospects List Form &nbsp;&nbsp;  <br>
   	                <a href="../forms/V16.0 Middle School Prospects List Form.doc" target="_blank" title="Click to download file">DOC</a> |
   	   		<a href="../forms/V16.0 Middle School Prospects List Form.pdf" target="_blank" title="Click to download file">PDF</a>
   		</li>
   		<li>Elementary School Prospects List Form &nbsp;&nbsp;  <br>
   		        <a href="../forms/V16.0 Elementary School Prospects List Form.doc" target="_blank" title="Click to download file">DOC</a> | 
   	   		<a href="../forms/V16.0 Elementary School Prospects List Form.pdf" target="_blank" title="Click to download file">PDF</a>
                 </li>
   		<li>Church Prospects List Form &nbsp;&nbsp;  <br>
   		        <a href="../forms/V16.0 Religious or Church Prospects List Form.doc" target="_blank" title="Click to download file">DOC</a> | 
   	   		<a href="../forms/V16.0 Religious or Church Prospects List Form.pdf" target="_blank" title="Click to download file">PDF</a>
   		</li>
   		<li>Organization Prospects List Form &nbsp;&nbsp;  <br>
   		        <a href="../forms/V16.0 Organization Prospects List Form.doc" target="_blank" title="Click to download file">DOC</a> |
   	   		<a href="../forms/V16.0 Organization Prospects List Form.pdf" target="_blank" title="Click to download file">PDF</a>
	        </li>
	        <li>Community Organization Prospects List Form  &nbsp;&nbsp;  <br>
	                <a href="../forms/V16.0 Organization Prospects List Form.doc" target="_blank" title="Click to download file">DOC</a> | 
   	   		<a href="../forms/V16.0 Organization Prospects List Form.pdf" target="_blank" title="Click to download file">PDF</a>
	        </li>
	        <li>Youth & Sports Organization Prospects List Form  &nbsp;&nbsp;  <br>	        
	                <a href="../forms/V16.0 Organization Prospects List Form.doc" target="_blank" title="Click to download file">DOC</a> | 
   	   		<a href="../forms/V16.0 Organization Prospects List Form.pdf" target="_blank" title="Click to download file">PDF</a>
	        </li>
	        <li>Local & National Charities Prospects List Form  &nbsp;&nbsp;  <br>
	                <a href="../forms/V16.0 Organization Prospects List Form.doc" target="_blank" title="Click to download file">DOC</a> |  
   	   		<a href="../forms/V16.0 Organization Prospects List Form.pdf" target="_blank" title="Click to download file">PDF</a>
	        </li>
	        <li>Local Causes & Memorials Prospects List Form  &nbsp;&nbsp;  <br>	        
	                <a href="../forms/V16.0 Organization Prospects List Form.doc" target="_blank" title="Click to download file">DOC</a> |  
   	   		<a href="../forms/V16.0 Organization Prospects List Form.pdf" target="_blank" title="Click to download file">PDF</a>
                </li>  	
   	</ul>
   	   		   		      			
	     </div> <!--end column1-->
     
     <div id="column2">
        
	<h5>Account Appointment & Referral Forms: </h5>
	<ul>
	       <li>High School Appt, Setup & Notes Form &nbsp;&nbsp;   <br>    
	                <a href="../forms/V16.0 School Appointment Website Set-Up Notes and Referral Form.doc" target="_blank" title="Click to download file">DOC</a> | 
   	   		<a href="../forms/V16.0 School Appointment Website Set-Up Notes and Referral Form.pdf" target="_blank" title="Click to download file">PDF</a>
   		 </li>

	        <li>Middle School Appt, Setup & Notes Form &nbsp;&nbsp;  <br>
	 	        <a href="../forms/V16.0 School Appointment Website Set-Up Notes and Referral Form.doc" target="_blank" title="Click to download file">DOC</a> | 
   	   		<a href="../forms/V16.0 School Appointment Website Set-Up Notes and Referral Form.pdf" target="_blank" title="Click to download file">PDF</a>
   		 </li>

             <li>Elementary School Appt, Setup & Notes Form &nbsp;&nbsp; <br>
             	 	        <a href="../forms/V16.0 School Appointment Website Set-Up Notes and Referral Form.doc" target="_blank" title="Click to download file">DOC</a> | 
   	   		<a href="../forms/V16.0 School Appointment Website Set-Up Notes and Referral Form.pdf" target="_blank" title="Click to download file">PDF</a>
   		 </li>

	         <li>Church Appt, Setup & Notes Form &nbsp;&nbsp; <br>
	 	        <a href="../forms/V16.0 Church Contact Goal Website Setup Notes Form.doc" target="_blank" title="Click to download file">DOC</a> | 
   	   		<a href="../forms/V16.0 Church Contact Goal Website Setup Notes Form.pdf" target="_blank" title="Click to download file">PDF</a>
   		 </li>
   		 
	        <li>Organization Appt, Setup & Notes Form &nbsp; <br>
	 	        <a href="../forms/V16.0 Organization Contact Goal Website Setup Notes Form.doc" target="_blank" title="Click to download file">DOC</a> | 
   	   		<a href="../forms/V16.0 Organization Contact Goal Website Setup Notes Form.pdf" target="_blank" title="Click to download file">PDF</a>
   		 </li>
   		 
                 <li>Community Organization Appt, Setup & Notes Form &nbsp;
	 	        <a href="../forms/V16.0 Organization Contact Goal Website Setup Notes Form.doc" target="_blank" title="Click to download file">DOC</a> | 
   	   		<a href="../forms/V16.0 Organization Contact Goal Website Setup Notes Form.pdf" target="_blank" title="Click to download file">PDF</a>
   		 </li>
   		 
                 <li>Youth & Sports Organization Appt, Setup & Notes <br>
	 	        <a href="../forms/V16.0 Organization Contact Goal Website Setup Notes Form.doc" target="_blank" title="Click to download file">DOC</a> | 
   	   		<a href="../forms/V16.0 Organization Contact Goal Website Setup Notes Form.pdf" target="_blank" title="Click to download file">PDF</a>
   		 </li>
   		 
                 <li>Local & National Charities Appt, Setup & Notes Form <br>
	 	        <a href="../forms/V16.0 Organization Contact Goal Website Setup Notes Form.doc" target="_blank" title="Click to download file">DOC</a> | 
   	   		<a href="../forms/V16.0 Organization Contact Goal Website Setup Notes Form.pdf" target="_blank" title="Click to download file">PDF</a>
   		 </li>
   		 
   		 <li>Local Causes & Memorials Appt, Setup & Notes Form  <br>
	 	        <a href="../forms/V16.0 Organization Contact Goal Website Setup Notes Form.doc" target="_blank" title="Click to download file">DOC</a> | 
   	   		<a href="../forms/V16.0 Organization Contact Goal Website Setup Notes Form.pdf" target="_blank" title="Click to download file">PDF</a>
   		 </li>
	        <br>
	</div> <!--end column2-->
	</ul>
	<br></br>
	
	<p>From all the Prospects you have identified in your Region, narrow down your selection to 10 to 20 Accounts to begin with. These 10 to 20 Prospective Accounts will be the first Accounts you want to approach.  </p>
	<p>One High School Prospective Account on average has 50 to 60 Teams and Clubs (or Individual Prospects) in it and they are all located in one building, so that Account has a High Income Opportunity for you. In addition they are doing Fundraisers year round because of the different Sports Team and Social Events at a High School. Fall, Winter, Spring and Summer time have lots of opportunities for Club or Team Fundraisers. In addition most School Teams, Churches and Scouts have Summer Camps or Retreats making after the Holidays a great time to raise money for those Fundraising Opportunities.</p>
	<p>The Reason we point this out is to show that Winter and Spring time have tremendous earning potential in addition to the Fall time. The GreatMoods Mall has a wonderful selection of year round merchandise for every age, season or Fundraiser. </p>
	<p>If you already have Organizations or personal contacts in mind, feel free to start with those you already know and feel comfortable with.  GreatMoods is here to help you find leads in your Community if you are unsure where to start.  There are always plenty of Prospect leads around in your region.  </p>
	<p> </p>
	
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