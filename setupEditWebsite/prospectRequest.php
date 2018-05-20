<?php
include '../includes/autoload.php';
if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }

$userID = $_SESSION['userId'];
// if session variable not set, redirect to login page

?>
<!DOCTYPE html>
<head>
	<meta charset="UTF-8" />
	<title>Add New Fundraiser | Representative</title>
	<link href="../css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
	<link href="../css/form_styles.css" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" href="../images/favicon.ico">
	
	<script type="text/javascript">
	function getSelectedValue() { 
	 var val = document.getElementById("fundraisingType").value;
	 //alert("You selected : " + val);
         document.getElementById("choice").value = val;
        } 
	</script>
</head>

<body>
<div id="container">
      
      <?php include 'header.inc.php' ; ?>
      <?php include 'sideLeftNav.php' ; ?>
      
<div id="contentMain858">
        
    	<h1>Add New Fundraiser</h1>
	<h3>Let's Setup Your Prospective Accounts Today!</h3>
	<p>Please send us all your Prospects in a document (.doc) or spreadsheet (.xls) with the following information:</p>
	<div id="table">
		<div id="row">
			<span id="group">Fundraiser Prospect:</span>
			<span id="url">Fundraiser Prospect's URL:</span>
			<span id="city">Fundraiser City:</span>
			<span id="state">Fundraiser State:</span>
		</div> <!-- end row -->
		<div id="row">
			<span id="group" title="Example Name">Lincoln High School</span>
			<span id="url" title="Example URL">http://lhs.lps.org/</span>
			<span id="city" title="Example City">Lincoln</span>
			<span id="state" title="Example State">Nebraska</span>
		</div> <!-- end row -->
	</div> <!-- end table -->
	
	<div id="column1">
		<br>
		<p>Email your file to <b>Peter</b> (peter@greatmoods.com) or <b>Charlie</b> (charlie@greatmoods.com) and within a couple days those prospective accounts will be all setup and viewable online at your <a href="editClub.php" title="Account Home">Representative Account</a>.</p>
		<p>You can download one of our templates below:</p>
			<div id="download"> <!-- DOC Download -->
				<a href="../forms/prospect_template_Jan2014.doc" target="_blank" title="Click to download file" download>
				<img src="../images/icons/doc_download_icon.png" width="80" height="80" alt="doc download icon" /></a><p>Prospect Template</p>
		        </div>
		        
	   		<div id="download"> <!-- XLS Download -->
				<a href="../forms/prospect_template_Jan2014.xls" target="_blank" title="Click to download file" download>
				<img src="../images/icons/xls_download_icon.png" width="80" height="80" alt="doc download icon" /></a><p>Prospect Template</p>
		        </div>
	</div> <!-- end column1 -->
	
	<div id="column2">
	 	<div><br>
	    	<img src="../../images/rep-pages/choir1.png" width="404" height="270" alt="High School Choir">
		<img class="imgLeft" src="../../images/rep-pages/youngboy1.png" width="198" height="166" alt="Young Elementary Boy">
		<img class="imgRight" src="../../images/rep-pages/church2.png" width="198" height="166" alt="Lady with Father">
	    	</div>
    	</div> <!-- end column2 -->
</div> <!-- end contentMain858 -->
    <p>&nbsp;</p>
    
    

  </div>
      <!--end contentMain858-->
      <?php include 'footer.php' ; ?>
    </div>
<!--end container-->

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