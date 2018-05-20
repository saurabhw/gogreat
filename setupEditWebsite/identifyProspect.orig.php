<?php
   include '../includes/autoload.php';
   if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../repSignup.php');
            exit;
       }
       ob_start();
?>


<!DOCTYPE html>
<head>
	<meta charset="UTF-8" />
	<title> Identifying Your Specific Prospect Opportunities </title> 
	<link href="../css/mainRecruitingStyles.css" rel="stylesheet" type="text/css">
	<link href="../css/setupFormStyles.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="../images/favicon.ico">
</head>
	
<body>
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <?php include 'sideLeftNav.php' ; ?>

    <div id="content">
    <h1>Identifying Your Specific Prospects </h1>
    <h3>Fundraising Account Opportunities in your Community or Region to Pursue Today! 
</h3>

	<div id>
      		<p>Let’s get started in identifying and setting up the specific Fundraising Accounts in your Region, that you would like to approach first with the GreatMoods Program. After studying from the Prospect Opportunities page and Example Website section of the GreatMoods website you should have a pretty good idea of whom your Prospects are, so now let’s start to target in on the specific Accounts you want to present to first in your Region.</p>
      		<p>Brainstorm some by either printing out one or all of the Prospect Forms below or create your own list to send to us. From the list you send us with the Account Name and Address, as well as the Accounts specific URL which we will create a real Website from; complete with the Prospective Accounts Banner posted at your own GreatMoods Representative Website.  </p>
      		
      <div id="column1">		
      		
   		<p>Account List Research Prospect Forms:</p>
   		<p>High School List Prospect Form</p>
   		<p>Middle School List Prospect Form</p>
   		<p>Elementary School List Prospect Form</p>
   		<p>Church Prospect List Form </p>
   		<p>Organizational Prospect List Form </p>
	        <p>Community Organizations </p>
	        <p>Youth and Sports Organizations  </p>
	        <p>Local and National Charities </p>
	        <p>Local Causes and Memorials</p>   	
   		
   		   		      			
	     </div> <!--end column1-->
     
     <div id="column2">
	<p>Account Information Prospect Forms: </p>
	<p>High School Account Information Form </p>
	<p>Middle School Account Information Form </p>
	<p>Elementary School Account Information Form </p>
	<p>Church Account Information Form</p>
	<p>Organizational Account Information Form</p>
	<p>Organizational Account Information Form</p>
	<p>Organizational Account Information Form</p>
	<p>Organizational Account Information Form</p>
	<p>Organizational Account Information Form</p>

	</div> <!--end column2-->
	<br></br>
	
	<div id>
	<p>From all the Prospects you have identified in your Region, narrow down your selection to 10 to 20 Accounts to begin with. These 10 to 20 Prospective Accounts will be the first Accounts you want to approach.  </p>
	<p>One High School Prospective Account on average has 50 to 60 Teams and Clubs (or Individual Prospects) in it and they are all located in one building so that Account has a High Income Opportunity for you. In addition they are doing Fundraisers year round because of the different Sports Team and Social Events at a High School. Fall, Winter, Spring and Summer time have lots of opportunities for Club or Team Fundraisers. In addition most School Teams, Churches and Scouts for example all have Summer Camps or Retreats making it a great time to raise money for those Fundraising Opportunities.</p>
	<p>The Reason we point this out, the Winter and Spring time have tremendous earning potential in addition to the Fall time. The GreatMoods Mall has a wonderful selection of year round merchandise for every age, season or Fundraiser. </p>
	<p>If you already have Organizations or personal contacts in mind, feel free to start with those you already know and feel comfortable with.  GreatMoods is here to help you find leads in your Community if you are unsure where to start.  There are always plenty of Prospect leads around in your region.  </p>
	<p> </p>
	
	<div id="download"> <!-- DOC Download -->
	<a href="../forms/V16.0 High School Prospects List Form.doc" target="_blank" title="Click to download file" download>
	<img src="../images/icons/doc_download_icon.png" width="50" height="50" alt="doc download icon" /></a><p>High School Prospects List</p>
        </div>
	
        <div id="download"> <!-- DOC Download -->
	<a href="../forms/V16.0 Middle School Prospects List Form.doc" target="_blank" title="Click to download file" download>
	<img src="../images/icons/doc_download_icon.png" width="50" height="50" alt="doc download icon" /></a><p>Middle School Prospects List</p>
        </div>
	
        <div id="download"> <!-- DOC Download -->
	<a href="../forms/V16.0 Elementary School Prospects List Form.doc" target="_blank" title="Click to download file" download>
	<img src="../images/icons/doc_download_icon.png" width="50" height="50" alt="doc download icon" /></a><p>Elementary School Prospects List</p>
         </div>
	
 	 <div id="download"> <!-- DOC Download -->
	  <a href="../forms/V15.0 Religious or Church Prospects List Form.doc" target="_blank" title="Click to download file" download>
	  <img src="../images/icons/doc_download_icon.png" width="50" height="50" alt="doc download icon" /></a><p>Church Prospects List </p>
          </div>
   	  <div id="download"> <!-- DOC Download -->
	  <a href="../forms/V15.0 Organization Prospects List Form.doc" target="_blank" title="Click to download file" download>
	  <img src="../images/icons/doc_download_icon.png" width="50" height="50" alt="doc download icon" /></a><p>Organization Prospects List </p>
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