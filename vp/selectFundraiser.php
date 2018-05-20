<?php
  include '../includes/autoload.php';

  if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "VP")
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
   $query = "SELECT * FROM user_info WHERE userInfoID='$userID' and role='VP'";
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
	<title>Add New Fundraiser</title>
</head>

<body>
<div id="container">
      
      <?php include 'header.inc.php' ; ?>
      <?php include 'sidenav.php' ; ?>
      
      <div id="content">
    <h2 align="center">Add New Fundraiser</h2>
         &nbsp;&nbsp;&nbsp; <h3>Step 1: Choose Organization Type</h3>
          
          <div id="border">
          <form name="fundraisingType" id="fundraisingType" method="post" action="information2.php" enctype="multipart/form-data">
          	<span id="ValidationError"></span><br>
          	<div id="graybackground50">
          		<div class="typecolumns2">
				<div class="typesection colnobreak">
					<h7>Education</h7> <br><br>
		          		<input type="radio" name="fundtype" value="Elementary School"  onClick="fetch_select16(this.value);">&nbsp;<label>Elementary School</label> <br>
		          		<input type="radio" name="fundtype" value="Middle School" onClick="fetch_select16(this.value);">&nbsp;<label>Middle School</label> <br>
					<input type="radio" name="fundtype" value="High School"  onClick="fetch_select16(this.value);">&nbsp;<label>High School</label> <br>
					<input type="radio" name="fundtype" value="College"  onClick="fetch_select16(this.value);">&nbsp;<label>College</label> <br>
					<input type="radio" name="fundtype" value="Pre-School"  onClick="fetch_select16(this.value);">&nbsp;<label>Pre-School</label> <br>
					<input type="radio" name="fundtype" value="Home School" onClick="fetch_select16(this.value);">&nbsp;<label>Home School</label> <br>
					<input type="radio" name="fundtype" value="Trade, Vocational & Tech" onClick="fetch_select16(this.value);">&nbsp;<label>Trade, Vocational & Tech</label> <br>
					<input type="radio" name="fundtype" value="Camps" onClick="fetch_select16(this.value);">&nbsp;<label>Camps</label> <br>
				</div> <!-- end typesection-->
				
				<div class="typesection colnobreak">
					<h7>Organizations</h7><br><br>                      
					<input type="radio" name="t" value="Christian Faiths" onClick="fetch_select15(this.value);">&nbsp;<label>Christian Faiths</label> <br>
					<input type="radio" name="t" value="Judaism" onClick="fetch_select15(this.value);">&nbsp;<label>Judaism</label> <br>
					<input type="radio" name="t" value="Faiths" onClick="fetch_select15(this.value);">&nbsp;<label>Other Faiths</label> <br>
					<input type="radio" name="t" value="Local & National Organizations" onClick="fetch_select15(this.value);">&nbsp;<label>Local & National Organizations</label> <br>
					<input type="radio" name="t" value="Local & National Charities" onClick="fetch_select15(this.value);">&nbsp;<label>Local & National Charities</label> <br>
					<input type="radio" name="t" value="Community Organizations" onClick="fetch_select15(this.value);">&nbsp;<label>Community Organizations</label> <br>
					<input type="radio" name="t" value="Youth & Sports"  onClick="fetch_select15(this.value);">&nbsp;<label>Youth & Sports</label> <br>
					
				</div>
			</div> <!-- end typecolumns2 -->
		</div> <!-- end graybackground50 -->
		
		<div id="whitebackground50">
			<div class="subsection" id="selection">
		
			</div>
		</div> <!-- end whitebackground50 -->
		
				<!--<div class="typesection colnobreak">
					<h7>Christianity</h7><br><br>                      
					<input type="radio" name="fundtype" value="Baptist">&nbsp;<label>Baptist</label> <br>
					<input type="radio" name="fundtype" value="Catholic">&nbsp;<label>Catholic</label> <br>
					<input type="radio" name="fundtype" value="Episcopal">&nbsp;<label>Episcopal</label> <br>
					<input type="radio" name="fundtype" value="Lutheran">&nbsp;<label>Lutheran</label> <br>
					<input type="radio" name="fundtype" value="Methodist">&nbsp;<label>Methodist</label> <br>
					<input type="radio" name="fundtype" value="Presbyterian">&nbsp;<label>Presbyterian</label> <br>
					<input type="radio" name="fundtype" value="Orthodox">&nbsp;<label>Orthodox</label> <br>
					<input type="radio" name="fundtype" value="Reformed">&nbsp;<label>Reformed</label> <br>
					<input type="radio" name="fundtype" value="Spirit-Filled">&nbsp;<label>Spirit-Filled</label> <br>
					<input type="radio" name="fundtype" value="Christian Other">&nbsp;<label>Christian Other</label> <br>
				</div> --><!-- end typesection-->
				
				<!--<div class="typesection colbreak">
					<h7>Judaism</h7><br><br>                      
					<input type="radio" name="fundtype" value="Jewish Conservative">&nbsp;<label>Jewish Conservative</label> <br>
					<input type="radio" name="fundtype" value="Jewish Orthodox">&nbsp;<label>Jewish Orthodox</label> <br>
					<input type="radio" name="fundtype" value="Jewish Reformed">&nbsp;<label>Jewish Reformed</label> <br>
				</div>--> <!-- end typesection-->
				
				<!--<div class="groupsection">
					<h7>Other Faiths</h7><br><br>                      
					<input type="radio" name="fundtype" value="Buddhist">&nbsp;<label>Buddhist</label> <br>
					<input type="radio" name="fundtype" value="Hindu">&nbsp;<label>Hindu</label> <br>
					<input type="radio" name="fundtype" value="Muslim">&nbsp;<label>Muslim</label> <br>
					<input type="radio" name="fundtype" value="Other Faiths">&nbsp;<label>Other Faiths</label> <br>
				</div>--> <!-- end typesection-->
				
				<!--<div class="typesection colbreak">
					<h7>Organizations</h7> <br><br>
					
					<input type="radio" name="fundtype" value="Local & National Organization">&nbsp;<label>Local & National Organization</label> <br>
					<input type="radio" name="fundtype" value="Local & National Charity">&nbsp;<label>Local & National Charity</label> <br>
					<input type="radio" name="fundtype" value="Community Organization">&nbsp;<label>Community Organization</label> <br>
					<input type="radio" name="fundtype" value="Youth & Sports">&nbsp;<label>Youth & Sports</label> <br>
					<input type="radio" name="fundtype" value="Sports League">&nbsp;<label>Sports League</label> <br>
					<input type="radio" name="fundtype" value="General">&nbsp;<label>General</label> <br>
				</div> --><!-- end typesection-->
				
			
              <br><br>
        <input type="hidden" id="choice" name="choice" />
        <input type="submit" name="submit" class="redbutton" value="Step 2: Set Up Website" onclick="return ValidateRadios();" />
      </form>
      </div><!--end border-->
  </div> <!--end content-->
  
      <?php include 'footer.php' ; ?>
    </div> <!--end container-->
</body>
</html>

<?php
   ob_end_flush();
?>