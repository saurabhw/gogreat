<?php
  include '../includes/autoload.php';

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
	<title>Add New Fundraiser | Representative</title>
</head>

<body>
<div id="container">
      
      <?php include 'header.inc.php' ; ?>
      <?php include 'sideLeftNav.php' ; ?>
      
      <div id="content">
    <h1>Add New Fundraiser</h1>
          <h3>Step 1: Choose Organization Type</h3>
          
          <form name="fundraisingType" id="fundraisingType" method="post" action="information1.php" enctype="multipart/form-data">

          	<span id="ValidationError"></span>
          	<div id="graybackground">
          	        <span>Select Organization Type</span>
          	        
          	        <br>
          	        
          		<select name="orgid" onChange="fetch_select13(this.value);">
	          		<option value="">Select</option>
	          		<option value="Education">Education</option>
	          		<option value="Christian Faiths">Christian Faiths</option>
	          		<option value="Judaism">Judaism</option>
	          		<option value="Faiths">Other Faiths</option>
	          		<option value="Local & National Organizations">Local & National Organizations</option>
	          		<option value="Local & National Charities">Local & National Charities</option>
	          		<option value="Community Organizations">Community Organizations</option>
          		</select>
	          		
	          	<br><br>
	          		
			<div id="selection">
				<span>Organization Selections Will Display Here</span>
			</div> <!-- end radio group -->
			
			<br>
			
              </div> <!-- end graybackground -->
              <br>
        <input type="hidden" id="choice" name="choice" />
        <input type="submit" name="submit" class="redbutton" value="Step 2: Set Up Website" onclick="return ValidateRadios();" />
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