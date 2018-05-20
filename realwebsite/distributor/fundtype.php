<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8" />
	<title>GreatMoods | Setup/Edit Website - Fundraising Type</title>
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
<?php include 'header.php' ; ?>
<?php include 'sidenav.php' ; ?>
<div id="contentMain858">
      <div class="nav2">
    <ul class="setupNav">
          <li> <<&nbsp;</li>
          <li id="current"><a href="fundtype.php" class="typenav">Fundraiser Type</a></li>
          <li>|</li>
          <li><a href="information.php" class="infonav">Information</a></li>
          <li><a href="information.php">&nbsp;>> </a></li>
        </ul>
  </div>
      <!--end nav2-->
      <div style="float: left; text-align: left;">
    <h2>Setup/Edit Website</h2>
  </div>
      <br />
<!--      <div style="margin: auto;">
-->    <h3>Fundraiser Type</h3>
    <p>To begin setting up your group's fundraiser, please select a fundraising type:</p>
    <div class="checkboxForm">
          <form name="fundraisingType" method="post" action="information.php" enctype="multipart/form-data">
        <p>
              <label>
            <input type="radio" name="RadioGroup1" value="HS" id="RadioGroup1_0">
            High School</label>
              <br>
              <label>
            <input type="radio" name="RadioGroup1" value="MS" id="RadioGroup1_1">
            Middle School</label>
              <br>
              <label>
            <input type="radio" name="RadioGroup1" value="ES" id="RadioGroup1_2">
            Elementary School</label>
              <br>
              <label>
            <input type="radio" name="RadioGroup1" value="RO" id="RadioGroup1_3">
            Religious Organizations</label>
              <br>
              <label>
            <input type="radio" name="RadioGroup1" value="CO" id="RadioGroup1_4">
            Community Organizations</label>
              <br>
              <label>
            <input type="radio" name="RadioGroup1" value="YS" id="RadioGroup1_5">
            Youth and Sports</label>
              <br>
              <label>
            <input type="radio" name="RadioGroup1" value="Charity" id="RadioGroup1_6">
            Local and National Charities</label>
              <br>
              <label>
            <input type="radio" name="RadioGroup1" value="Cause" id="RadioGroup1_7">
            Causes</label>
            </p>
        <input type="hidden" id="choice" name="choice" />
        <input type="submit" value="Set Up Website" />
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