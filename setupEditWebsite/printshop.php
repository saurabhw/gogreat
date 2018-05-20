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
	<title>Printshop | Representative</title>
</head>
	
<body>
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <?php include 'sideLeftNav.php' ; ?>
      
    <div id="content">
    <h1>Printshop</h1>
    <h3>Forms to Download and/or Print</h3>

	<div id >
      	   <h5>Account List Research Prospect Forms:</h5>
      	   
      	      <ul>
   	   	<li>
   	   	    High School Prospects List Form &nbsp; <a href="../forms/V16.0 High School Prospects List Form.doc" target="_blank" title="Click to Download File">DOC</a> | 
    	   	   <a href="../forms/V16.0 High School Prospects List Form.pdf" target="_blank" title="Click to download file">PDF</a>
   	   	</li>
   	   	<li>
   	   	    Middle School Prospects List Form &nbsp; <a href="../forms/V16.0 Middle School Prospects List Form.doc" target="_blank" title="Click to Download File">DOC</a> |
   	           <a href="../forms/V16.0 Middle School Prospects List Form.pdf" target="_blank" title="Click to download file">PDF</a>
               </li>
   	        <li>
     	            Elementary School Prospects List Form &nbsp; <a href="../forms/V16.0 Elementary School Prospects List Form.doc" target="_blank" title="Click to Download File">DOC</a> |
   	           <a href="../forms/V16.0 Elementary School Prospects List Form.pdf" target="_blank" title="Click to download file">PDF</a>
               </li>
               <li>
     	            School Fundraising Leaders Notes &nbsp; <a href="../forms/V16.0 School Fundraising Leaders Team Notes List Form.doc" target="_blank" title="Click to Download File">DOC</a> |
   	           <a href="../forms/V16.0 School Fundraising Leaders Team Notes List Form.pdf" target="_blank" title="Click to download file">PDF</a>
               </li>
               <li>
     	           Church Prospects List Form &nbsp; <a href="../forms/V16.0 Religious or Church Prospects List Form.doc" target="_blank" title="Click to Download File">DOC</a> |
   	           <a href="../forms/V16.0 Religious or Church Prospects List Form.pdf" target="_blank" title="Click to download file">PDF</a>
               </li>
               <li>
     	            Organization Prospects List Form &nbsp; <a href="../forms/V16.0 Organization Prospects List Form.doc" target="_blank" title="Click to Download File">DOC</a> |
   	           <a href="../forms/V16.0 Organization Prospects List Form.pdf" target="_blank" title="Click to download file">PDF</a>
               </li>
                        
              </ul>   
                <br>
              
            <h5>Appointment, Website Set-Up, Notes and Referral Forms:</h5>
               <ul> 
               <li>
     	            School Appointment & Referral Form &nbsp; <a href="../forms/V16.0 School Appointment Website Set-Up Notes and Referral Form.doc" target="_blank" title="Click to Download File">DOC</a> |
   	           <a href="../forms/V16.0 School Appointment Website Set-Up Notes and Referral Form.pdf" target="_blank" title="Click to download file">PDF</a>
               </li>
                <li>
     	            Church Appointment & Referral Form &nbsp; <a href="../forms/V16.0 Church Contact Goal Website Setup Notes Form.doc" target="_blank" title="Click to Download File">DOC</a> |
   	           <a href="../forms/V16.0 Church Contact Goal Website Setup Notes Form.pdf" target="_blank" title="Click to download file">PDF</a>
               </li>
                <li>
     	            Organization Appointment & Referral Form &nbsp; <a href="../forms/V16.0 Organization Contact Goal Website Setup Notes Form.doc" target="_blank" title="Click to Download File">DOC</a> |
   	           <a href="../forms/V16.0 Organization Contact Goal Website Setup Notes Form.pdf" target="_blank" title="Click to download file">PDF</a>
               </li>


   	       </ul>
   	       <br>
   	       
   	       
   	     <h5>Sales Rep Checklists:</h5>
   	       	<ul>
   	       		<li>Representative Daily Fundraiser Sales and Call Report &nbsp; <a href="../forms/V17.0 Representative Daily Sales and Call Report Form.doc" target="_blank" title="Click to Download File">DOC</a> | <a href="../forms/V17.0 Representative Daily Sales and Call Report Form.pdf" target="_blank" title="Click to download file">PDF</a></li>
   			<li>Referral Form &nbsp; <a href="../forms/V16.0 Referral Form.doc" target="_blank" title="Click to Download File">DOC</a> | <a href="../forms/V16.0 Referral Form.pdf" target="_blank" title="Click to download file">PDF</a></li>
                	<li>30 Day Fundraising Form &nbsp; <a href="../forms/V17.0 Representative 30 Daily Fundraising Form.doc" target="_blank" title="Click to Download File">DOC</a> | <a href="../forms/V17.0 Representative 30 Daily Fundraising Form.pdf" target="_blank" title="Click to download file">PDF</a></li>
   		</ul>
   		
   		<br>
   		
   		<h5>Fundraising Account Forms:</h5>
   	       		<ul>
   		 		<li>Leader & Member Contact Information Spreadsheet &nbsp; <a href="../forms/Leader & Member Contact Information.xlsx" target="_blank" title="Click to Download File">Spreadsheet</a></li>
   		 		<li>Student/Member Leave Behind Form &nbsp; <a href="../forms/v17.0 Student Member Fundraising Leave Behind Form.doc" target="_blank" title="Click to Download File">DOC</a> | <a href="../forms/v17.0 Student Member Fundraising Leave Behind Form.pdf" target="_blank" title="Click to download file">PDF</a></li>
   		 		<li>Friends, Family or Business Contact Names &nbsp;  <a href="../forms/V17.0 Friends, Family or Business Contact Names Form.doc" target="_blank" title="Click to Download File">DOC</a> | <a href="../forms/V17.0 Friends, Family or Business Contact Names Form.pdf" target="_blank" title="Click to download file">PDF</a></li>
              		</ul>
              
              <br> 
                
   	     <h5>Presentations:</h5>
   	       		<ul>
   	       			<li>GreatMoods Program Overview &nbsp; <a href="../forms/greatmoods_overview_presentation.doc" target="_blank" title="Click to Download File">DOC</a> | <a href="../forms/greatmoods_overview_presentation.pdf" target="_blank" title="Click to Download File">PDF</a></li>
                 		<li>Prospect Presentation Script &nbsp; <a href="../forms/The Fundraising Prospect Presentation.doc">DOC</a> | <a href="../forms/The Fundraising Prospect Presentation.pdf" target="_blank" title="Click to download file">PDF</a></li>
   			</ul>
   			
   		<br>
   		
   		<h5>Getting Started Representative Signup:</h5>
   			<ul>
   				<li>Official copy of a <a href="http://www.irs.gov/uac/about-form-1099misc" target="_blank">1099 Form</a></li>
   				<li>Explanation about 1099 Form <a href="http://turbotax.intuit.com/tax-tools/tax-tips/Self-Employment-Taxes/What-is-an-IRS-1099-Form-/INF14810.html">here</a></li>
   				<li>GreatMoods Representative Agreement &nbsp; <a href="../forms/Welcome to Great Moods- Rep Agreement 2.0 Generic.doc" target="_blank" title="Click to download file">DOC</a> | PDF</li>
   				<li><a href="http://www.paypal.com/home" title="Click to Visit PayPal to Sign Up">Setup a PayPal Account</a></li>
   			</ul>
	</div> <!--end column1-->
    
	<div id="column2">
	    <!--<div>
	    	<img src="" width="404" height="270" alt="">
		<img class="imgLeft" src="" width="198" height="166" alt="">
		<img class="imgRight" src="" width="198" height="166" alt="">
	    </div>-->

	</div>    <!--end column2--> 
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