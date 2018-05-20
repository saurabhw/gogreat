<?php
include '../includes/autoload.php';
if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
?>

<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8" />
	<title>GreatMoods | Setup/Edit Website - Reasons for Fundraiser</title>
	<script type="text/javascript">
	function getSelectedValue() { 
	 var val = document.getElementById("fundraisingType").value;
	 //alert("You selected : " + val);
         document.getElementById("choice").value = val;
        } 
	</script>
	<link href="../css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
	<link href="../css/setupFormStyles.css" rel="stylesheet" type="text/css" />
	</head>
	<body id="type">
<div id="container">
      <?php include '../representative/header_homepage2.php' ; ?>
<?php include 'leftNavSetupEditWebsite.php' ; ?>
<div id="contentMain858">
      <div class="nav2">
    <ul class="setupNav">
        <li><a href="accountEdit.php" class="infonav">Edit My Account</a></li>
        <li>|</li>
        <li id="current"><a href="fundtype.php" class="infonav">Add New Fundraiser</a></li>
        <li>|</li>
        <li><a href="editacct.php" class="editnav">Edit Fundraiser Accounts</a></li>
        </ul>
  </div>
      <!--end nav2-->
      <div style="float: left; text-align: left;">
    <p style="font-size: 24px;">Setup/Edit Website</p>
  </div>
      <br />
      <div style="margin: auto;">
    <h3>Fundraising Type</h3>
    <p>To begin setting up your group's fundraiser, please select a fundraising type:</p>
    <div class="checkboxForm">
          <form name="fundraisingType" method="post" action="information1.php" enctype="multipart/form-data">
        <p>
              <label>
            <input type="radio" name="RadioGroup1" value="High School" id="RadioGroup1_0">
            High School</label>
              <br>
              <label>
            <input type="radio" name="RadioGroup1" value="Middle School" id="RadioGroup1_1">
            Middle School</label>
              <br>
              <label>
            <input type="radio" name="RadioGroup1" value="Elementary School" id="RadioGroup1_2">
            Elementary School</label>
              <br>
              <label>
            <input type="radio" name="RadioGroup1" value="Religious Organization" id="RadioGroup1_3">
            Religious Organizations</label>
              <br>
              <label>
            <input type="radio" name="RadioGroup1" value="Community Organization" id="RadioGroup1_4">
            Community Organizations</label>
              <br>
              <label>
            <input type="radio" name="RadioGroup1" value="Youth Sports" id="RadioGroup1_5">
            Youth and Sports</label>
              <br>
              <label>
            <input type="radio" name="RadioGroup1" value="Charity" id="RadioGroup1_6">
            Local and National Charities</label>
              <br>
              <label>
            <input type="radio" name="RadioGroup1" value="Causes" id="RadioGroup1_7">
            Causes</label>
              <br>
            </p>
        &nbsp;
        <input type="hidden" id="choice" name="choice" />
        <input type="submit" value="Set Up Website" name="submit" />
      </form>
            </div>
        <!--end checkboxForm-->
        


    <p class="clearfloat">&nbsp;</p>
    <div class="nav3">
          <ul class="setupNav">
        <li><a href="fundtype.php"><<&nbsp;Previous</a></li>
        <li>|</li>
        <li><a href="editacct.php">Next&nbsp;>></a></li>
      </ul>
          <p>&nbsp;</p>
        </div>
    <!--end nav3--> 
    
  </div>
      <!--end contentMain858-->
      <?php include '../includes/footer.php' ; ?>
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