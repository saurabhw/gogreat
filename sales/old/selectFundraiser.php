<?php
  
   session_start();
    if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "SC")
       {
            header('Location: ../index.php');
            exit;
       }
   include('../samplewebsites/imageFunctions.inc.php');
   include('../includes/connection.inc.php');
   $link = connectTo();
   $userID = $_SESSION['userId'];
   $query = "SELECT * FROM user_info WHERE userInfoID='$userID'";
   $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error());
   $row = mysqli_fetch_assoc($result);
   $myPic = $row['picPath'];

?>
<!DOCTYPE html>
<head>
	<title>Add New Fundraiser | Sales Coordinator</title>
</head>

<body>
<div id="container">
      
      <?php include 'header.inc.php' ; ?>
      <?php include 'sidenav.php' ; ?>
      
      <div id="content">
    <h1>Add New Fundraiser</h1>
          <h3>Step 1: Choose Fundraiser Type</h3>
          
          <form name="fundraisingType" method="post" action="information1.php" enctype="multipart/form-data">
          	<span id="ValidationError"></span><div id="graybackground">
          		<div class="groupcolumns">
          		
				<div class="groupsection colnobreak">
					<h7>Education</h7> <br><br>
		          		<input type="radio" name="fundtype" value="Elementary School"><label>Elementary School</label> <br>
		          		<input type="radio" name="fundtype" value="Middle School"><label>Middle School</label> <br>
					<input type="radio" name="fundtype" value="High School"><label>High School</label> <br>
					<input type="radio" name="fundtype" value="College"><label>College</label> <br>
					<input type="radio" name="fundtype" value="Pre-School"><label>Pre-School</label> <br>
					<input type="radio" name="fundtype" value="Home School"><label>Home School</label> <br>
					<input type="radio" name="fundtype" value="Trade, Vocational & Tech"><label>Trade, Vocational & Tech</label> <br>
					<input type="radio" name="fundtype" value="Camps"><label>Camps</label> <br>
				</div> <!-- end groupsection -->
				<div class="groupsection colnobreak">
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
				</div> <!-- end groupsection -->
				
				<div class="groupsection colbreak">
					<h7>Judaism</h7><br><br>                      
					<input type="radio" name="fundtype" value="Jewish Conservative"><label>Jewish Conservative</label> <br>
					<input type="radio" name="fundtype" value="Jewish Orthodox"><label>Jewish Orthodox</label> <br>
					<input type="radio" name="fundtype" value="Jewish Reformed"><label>Jewish Reformed</label> <br>
				</div> <!-- end groupsection -->
				
				<br>
				
				<div class="groupsection">
					<h7>Other Faiths</h7><br><br>                      
					<input type="radio" name="fundtype" value="Buddhist"><label>Buddhist</label> <br>
					<input type="radio" name="fundtype" value="Hindu"><label>Hindu</label> <br>
					<input type="radio" name="fundtype" value="Muslim"><label>Muslim</label> <br>
					<input type="radio" name="fundtype" value="Other Faiths"><label>Other Faiths</label> <br>
				</div> <!-- end groupsection -->
				
				<div class="groupsection colbreak">
					<h7>Organizations</h7> <br><br>
					
					<input type="radio" name="fundtype" value="Local & National Organization"><label>Local & National Organization</label> <br>
					<input type="radio" name="fundtype" value="Local & National Charity"><label>Local & National Charity</label> <br>
					<input type="radio" name="fundtype" value="Community Organization"><label>Community Organization</label> <br>
					<input type="radio" name="fundtype" value="Youth & Sports"><label>Youth & Sports</label> <br>
					<input type="radio" name="fundtype" value="Sports League"><label>Sports League</label> <br>
					<input type="radio" name="fundtype" value="General"><label>General</label> <br>
				</div> <!-- end groupsection -->
				
			</div> <!-- end groupcolumns -->
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