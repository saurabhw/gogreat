<?php
session_start();
if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../../index.php');
            exit;
       }
ob_start();
$loginuser = $_SESSION['userId'];
// if session variable not set, redirect to login page

?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8" />
	<title>GreatMoods | Add New Fundraiser</title>
	<script type="text/javascript">
	function getSelectedValue() { 
	 var val = document.getElementById("fundraisingType").value;
	 //alert("You selected : " + val);
         document.getElementById("choice").value = val;
        } 
	</script>
	<link href="../../css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
	<link href="../../css/setupFormStyles.css" rel="stylesheet" type="text/css" />
	</head>
	<body id="type">
<div id="container">
      
      <?php include 'header.inc.php' ; ?>
      <?php include 'sidenav.php' ; ?>
      
      <div id="contentMain858">
        
    <div style="margin: auto;">
    	<h1>Add New Fundraiser</h1>
          <h3>Choose Fundraising Type</h3>
       
        </div>
    <!--end distributor1-->
    
    <div class="checkboxForm" style="margin: auto;">
          <form name="fundraisingType" method="post" action="information1.php" enctype="multipart/form-data">
          
        <p>
              <label>
            <input type="radio" name="fundtype" value="High School">
            High School</label>
              <br>
              <label>
            <input type="radio" name="fundtype" value = "Middle School">
            Middle School</label>
              <br>
              <label>
            <input type="radio" name="fundtype" value="Elementary School">
            Elementary School</label>
              <br>
              <label>
            <input type="radio" name="fundtype" value="Religious Organizations">
            Religious Organizations</label>
              <br>
              <label>
            <input type="radio" name="fundtype" value="Community Organizations">
            Community Organizations</label>
              <br>
              <label>
            <input type="radio" name="fundtype" value="Youth and Sports">
            Youth and Sports</label>
              <br>
              <label>
            <input type="radio" name="fundtype" value="Local and National Charities">
            Local and National Charities</label>
              <br>
              <label>
            <input type="radio" name="fundtype" value="Causes">
            Causes</label>
              <br>
            </p>
        &nbsp;
        <input type="hidden" id="choice" name="choice" />
        <input type="submit" name="submit" value="Set Up Website" />
      </form>
            </div>
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