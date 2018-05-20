<?php
session_start();
if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../../index.php');
            exit;
       }
ob_start();
$loginuser = $_SESSION['userId'];
$rep = $_GET['rep'];
// if session variable not set, redirect to login page

?>
<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<title>Add New Fundraiser | Sales Coordinator</title>
<link href="../../css/layout_styles.css" rel="stylesheet" type="text/css" />
<link href="../../css/form_styles.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../../images/favicon.ico">

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
      <?php include 'sidenav.php' ; ?>
      
      <div id="content">
        
    <div style="margin: auto;">
    	<h1>Add New Fundraiser</h1>
          <h3>Choose Fundraising Type</h3>

          <form id="graybackground3" name="fundraisingType" method="post" action="information1.php" enctype="multipart/form-data">
              <span id="radio"><input type="radio" name="fundtype" value="High School">High School</span>
              <br>
              <span id="radio"><input type="radio" name="fundtype" value="Middle School">Middle School</span>
              <br>
              <span id="radio"><input type="radio" name="fundtype" value="Elementary School">Elementary School</span>
              <br>
              <span id="radio"><input type="radio" name="fundtype" value="Religious Organization">Religious Organization</span>
              <br>
              <span id="radio"><input type="radio" name="fundtype" value="Community Organization">Community Organization</span>
              <br>
              <span id="radio"><input type="radio" name="fundtype" value="Youth or Sport Organization">Youth or Sport Organization</span>
              <br>
              <span id="radio"><input type="radio" name="fundtype" value="Local or National Charity">Local or National Charity</span>
              <br>
              <span id="radio"><input type="radio" name="fundtype" value="Local or National Cause">Local or National Cause</span>
              <br>
        	<input type="hidden" id="choice" name="choice" />
        	<input type="hidden" id="choice" name="rep" value="<? echo $rep; ?>" />
        	<input type="submit" name="submit" value="Set Up Website" /> 
      </form>
  </div> <!--end content-->
  
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