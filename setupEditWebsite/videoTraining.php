<?
   include '../includes/autoload.php';
   if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
       $userID = $_SESSION['userId'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Title | Representative</title> <!-- ***** Change Title to Match Navigation Title ***** -->
	<link href="../css/mainRecruitingStyles.css" rel="stylesheet" type="text/css">
	<link href="../css/setupFormStyles.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="../images/favicon.ico">
	
	<script type="text/javascript">
	function validate(form) {
		var pass1 = form['loginPass'].value;
		var pass2 = form['confirmPass'].value;
		if(pass1 == "" || pass1 == null) {
			alert("please enter a valid password");
			return false;
		}
		if(pass1 != pass2) {
			alert("passwords do not match");
			return false;
		}
		return true;
	}
	</script>
</head>
	
<body>
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <?php include 'sideLeftNav.php' ; ?>
      
    <div id="content">
    <h1>Title</h1>
    <h3>Subtitle</h3>

	<div id="column1">
      		<p></p>
      		<p></p>
   		<p></p>
	</div> <!--end column1-->
    
	<div id="column2">
	    <div>
	    	<img src="" width="404" height="270" alt="">
		<img class="imgLeft" src="" width="198" height="166" alt="">
		<img class="imgRight" src="" width="198" height="166" alt="">
	    </div>

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