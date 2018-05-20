<?php
session_start(); // session start
ob_start();
ini_set('display_errors', '0'); // errors reporting on
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
   if($_SESSION['freeze'] == "TRUE")
       {
          // echo "Account Frozen";
           header('Location: accountEdit.php');
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
   $myPic = $row['picPath'];

?>
<!DOCTYPE html>
<head>
	<title>GreatMoods | Add New Fundraiser</title>
</head>

<body>
      
      <?php include 'header.inc.php' ; ?>
      <?php include 'sideLeftNav.php' ; ?>
      
    <div class="container" id="getStartedContent" >
        <div class="row-fluid">
 <div class="page-header">
    <h2 align="center">Add New Fundraiser</h2>
</div>
 <div class=" col-md-7 col-md-push-2" id="bizAssociate-col">
<br>
<div id="border">
<div style="margin-left:15px;">
          <h3>Step 1: Choose Organization Type</h3>
	<hr style="border-color:#b8b8b8;">
          
          <form name="fundraisingType" id="fundraisingType" method="post" action="information2.php" enctype="multipart/form-data">
          	<span id="ValidationError"></span><br>
          	<div id="graybackground50">
          		<div class="typecolumns2">
				<div class="typesection colnobreak">
					<h7>Education</h7> <br><br>
		          		<input type="radio" name="fundtype" value="Elementary School"  onClick="fetch_select14(this.value);"><label>&nbsp;Elementary School</label> <br>
		          		<input type="radio" name="fundtype" value="Middle School" onClick="fetch_select14(this.value);"><label>&nbsp;Middle School</label> <br>
					<input type="radio" name="fundtype" value="High School"  onClick="fetch_select14(this.value);"><label>&nbsp;High School</label> <br>
					<input type="radio" name="fundtype" value="College"  onClick="fetch_select14(this.value);"><label>&nbsp;College</label> <br>
					<input type="radio" name="fundtype" value="Pre-School"  onClick="fetch_select14(this.value);"><label>&nbsp;Pre-School</label> <br>
					<input type="radio" name="fundtype" value="Home School" onClick="fetch_select14(this.value);"><label>&nbsp;Home School</label> <br>
					<input type="radio" name="fundtype" value="Trade, Vocational & Tech" onClick="fetch_select14(this.value);"><label>&nbsp;Trade, Vocational & Tech</label> <br>
					<input type="radio" name="fundtype" value="Camps" onClick="fetch_select14(this.value);"><label>&nbsp;Camps</label> <br><br>
				</div> <!-- end typesection-->
				
				<div class="typesection colnobreak">
					<h7><b></b>Organizations</b></h7><br><br>                      
					<input type="radio" name="t" value="Christian Faiths" onClick="fetch_select13(this.value);"><label>&nbsp;Christian Faiths</label> <br>
					<input type="radio" name="t" value="Judaism" onClick="fetch_select13(this.value);"><label>&nbsp;Judaism</label> <br>
					<input type="radio" name="t" value="Faiths" onClick="fetch_select13(this.value);"><label>&nbsp;Other Faiths</label> <br>
					<input type="radio" name="t" value="Local & National Organizations" onClick="fetch_select13(this.value);"><label>&nbsp;Local & National Organizations</label> <br>
					<input type="radio" name="t" value="Local & National Charities" onClick="fetch_select13(this.value);"> <label>Local & National Charities</label> <br>
					<input type="radio" name="t" value="Community Organizations" onClick="fetch_select13(this.value);"><label>&nbsp;Community Organizations</label> <br>
					<input type="radio" name="t" value="Youth & Sports"  onClick="fetch_select13(this.value);"><label>&nbsp;Youth & Sports</label> <br><br>
				</div>
			</div> <!-- end typecolumns2 -->
		</div> <!-- end graybackground50 -->
		
		<div id="whitebackground50">
			<div class="subsection" id="selection2">
		
			</div>
		</div> <!-- end whitebackground50 -->
		
				<!--<div class="typesection colnobreak">
					<h7>Christianity</h7><br><br>                      
					<input type="radio" name="fundtype" value="Baptist"><label>Baptist</label> <br>
					<input type="radio" name="fundtype" value="Catholic"><label>Catholic</label> <br>
					<input type="radio" name="fundtype" value="Episcopal"><label>Episcopal</label> <br>
					<input type="radio" name="fundtype" value="Lutheran"><label>Lutheran</label> <br>
					<input type="radio" name="fundtype" value="Methodist"><label>Methodist</label> <br>
					<input type="radio" name="fundtype" value="Presbyterian"><label>Presbyterian</label> <br>
					<input type="radio" name="fundtype" value="Orthodox"><label>Orthodox</label> <br>
					<input type="radio" name="fundtype" value="Reformed"><label>Reformed</label> <br>
					<input type="radio" name="fundtype" value="Spirit-Filled"><label>Spirit-Filled</label> <br>
					<input type="radio" name="fundtype" value="Christian Other"><label>Christian Other</label> <br>
				</div> --><!-- end typesection-->
				
				<!--<div class="typesection colbreak">
					<h7>Judaism</h7><br><br>                      
					<input type="radio" name="fundtype" value="Jewish Conservative"><label>Jewish Conservative</label> <br>
					<input type="radio" name="fundtype" value="Jewish Orthodox"><label>Jewish Orthodox</label> <br>
					<input type="radio" name="fundtype" value="Jewish Reformed"><label>Jewish Reformed</label> <br>
				</div>--> <!-- end typesection-->
				
				<!--<div class="groupsection">
					<h7>Other Faiths</h7><br><br>                      
					<input type="radio" name="fundtype" value="Buddhist"><label>Buddhist</label> <br>
					<input type="radio" name="fundtype" value="Hindu"><label>Hindu</label> <br>
					<input type="radio" name="fundtype" value="Muslim"><label>Muslim</label> <br>
					<input type="radio" name="fundtype" value="Other Faiths"><label>Other Faiths</label> <br>
				</div>--> <!-- end typesection-->
				
				<!--<div class="typesection colbreak">
					<h7>Organizations</h7> <br><br>
					
					<input type="radio" name="fundtype" value="Local & National Organization"><label>Local & National Organization</label> <br>
					<input type="radio" name="fundtype" value="Local & National Charity"><label>Local & National Charity</label> <br>
					<input type="radio" name="fundtype" value="Community Organization"><label>Community Organization</label> <br>
					<input type="radio" name="fundtype" value="Youth & Sports"><label>Youth & Sports</label> <br>
					<input type="radio" name="fundtype" value="Sports League"><label>Sports League</label> <br>
					<input type="radio" name="fundtype" value="General"><label>General</label> <br>
				</div> --><!-- end typesection-->
				
			
              <br><br>
	<div class="typesection colnobreak" style="clear:left;">

        <input type="hidden" id="choice" name="choice" />
        <input style="margin-top:25px;" type="submit" name="submit" class="redbutton" value="Step 2: Set Up Website" onclick="return ValidateRadios();" />
	</div>
      </form>
</div>
</div>
  </div> <!--end content-->
	    </div>
    </div> 
</div>
</div> <!--end container-->	
<br>
  
      <?php include 'footer.php' ; ?>
</body>
</html>
<!--<pre>-->
<?php if ($_POST && $mailSent){
	echo htmlentities($message, ENT_COMPAT, 'UTF-8')."\n";
	echo 'Headers: '.htmlentities($headers, ENT_COMPAT, 'UTF-8');
} ?>
<!--</pre>-->
<?php
   ob_end_flush();
?>