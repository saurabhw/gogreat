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
  
   $userID = $_SESSION['userId'];
   $query = "SELECT * FROM user_info WHERE userInfoID='$userID'";
   $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysqli_error($link));
   $row = mysqli_fetch_assoc($result);
   
   $pic = $row['picPath'];
  
	$group = $_GET['group'];
	$type = $_POST['RadioGroup1'];
	$fundtype = $_POST['fundtype'];
	$orgType = $_POST['fundSelect'];
	$loginuser = $_SESSION['userId'];
	
?>
<!DOCTYPE html>
<head>
	<title>Setup Group Information | Representative</title>
</head>

<body>

<?php include 'header.inc.php' ; ?>
<?php include 'sideLeftNav.php' ; ?>
<div class="container">
        <div class="row-fluid">
 <div class="page-header"> 
      <h2 align="center">Add New Fundraiser</h2>
</div>
 <div class="col-md-7 col-md-push-2" id="bizAssociate-col">
<br>
<div id="border">
<div style="margin-left:15px;">
      <h3>Step 2: Setup Fundraising Group Information</h3>
<hr style="border-color:#b8b8b8;">
      
      
      <form class="" action="addFundraiser.php" method="post" id="myForm" name="myForm" onsubmit="return atleast_onecheckbox(event)" enctype="multipart/form-data">
      		<div class="table">

        <?php
	switch($fundtype) {
		case "College":
		echo'<div class="interim-form"> 
			<div class="interim-header"><h3>Select College Groups to Setup</h3h3></div>
                                       <!--<form action="addClub.php" method="Post" name="" onsubmit="myFunction()">-->
			<input type="checkbox" name="all" onClick="toggle(this)"><lable> Select All Groups</label>
			<br><br>
			<div class="groupcolumns">
				<div class="groupsection shortbreak">
					<span id="">Clubs & Organizations</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="4-H"><lable> 4-H</label> <br>
						<input type="checkbox" name="clubs[]" value="Alumni Association"><lable> Alumni Association</label> <br>
						<input type="checkbox" name="clubs[]" value="Band"><lable> Band</label> <br>
						<input type="checkbox" name="clubs[]" value="BPA"><lable> BPA</label> <br>
						<input type="checkbox" name="clubs[]" value="Chess Club"><lable> Chess Club</label> <br>
						<input type="checkbox" name="clubs[]" value="Choir"><lable> Choir</label> <br>
						<input type="checkbox" name="clubs[]" value="Debate"><lable> Debate</label> <br>
						<input type="checkbox" name="clubs[]" value="DECA"><lable> DECA</label> <br>
						<input type="checkbox" name="clubs[]" value="Drumline"><lable> Drumline</label> <br>
						<input type="checkbox" name="clubs[]" value="FBLA"><lable> FBLA</label> <br>
						<input type="checkbox" name="clubs[]" value="FFA"><lable> FFA</label> <br>
						<input type="checkbox" name="clubs[]" value="Greeks"><lable> Greeks</label> <br>
						<input type="checkbox" name="clubs[]" value="Jazz Band"><lable> Jazz Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Key Club"><lable> Key Club</label> <br>
						<input type="checkbox" name="clubs[]" value="Language Club"><lable> Language Club</label> <br>
						<input type="checkbox" name="clubs[]" value="Math Club"><lable> Math Club</label> <br>
						<input type="checkbox" name="clubs[]" value="National Honor Society"><lable> National Honor Society</label> <br>
						<input type="checkbox" name="clubs[]" value="Orchestra"><lable> Orchestra</label> <br>
						<input type="checkbox" name="clubs[]" value="Robotics & Technology"><lable> Robotics & Technology</label> <br>
						<input type="checkbox" name="clubs[]" value="ROTC"><lable> ROTC</label> <br>
						<input type="checkbox" name="clubs[]" value="Science Club"><lable> Science Club</label> <br>
						<input type="checkbox" name="clubs[]" value="Scripture Study"><lable> Scripture Study</label> <br>
						<input type="checkbox" name="clubs[]" value="Student Council"><lable> Student Council</label> <br>
						<input type="checkbox" name="clubs[]" value="Theatre & Drama"><lable> Theatre & Drama</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"><br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				<br>
				<div class="groupsection shortbreak">
					<span id="">General</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Athletic Equipment"><lable> Athletic Equipment</label> <br>
						<input type="checkbox" name="clubs[]" value="Field Trips & Travel"><lable> Field Trips & Travel</label> <br>
						<input type="checkbox" name="clubs[]" value="Library & Technology"><lable> Library & Technology</label> <br>
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><lable> Projection, Audio, Video</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><lable> Tablets, Laptops & PCs</label> <br><br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				<div class="groupsection shortbreak">
					<span id="">Athletics</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="athletics[]" value="Archery"><lable> Archery</label> <br>
						<input type="checkbox" name="athletics[]" value="Badminton"><lable> Badminton</label> <br>
						<input type="checkbox" name="athletics[]" value="Baseball"><lable> Baseball</label> <br>
						<input type="checkbox" name="athletics[]" value="Basketball, Boys"><lable> Basketball, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Basketball, Girls"><lable> Basketball, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Bowling, Boys"><lable> Bowling, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Bowling, Girls"><lable> Bowling, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="CC Running, Boys"><lable> CC Running, Boys</label><br>
						<input type="checkbox" name="athletics[]" value="CC Running, Girls"><lable> CC Running, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="CC Skiing, Boys"><lable> CC Skiing, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="CC Skiing, Girls"><lable> CC Skiing, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Cheerleading"><lable> Cheerleading</label> <br>
						<input type="checkbox" name="athletics[]" value="Cycling"><lable> Cycling</label> <br>
						<input type="checkbox" name="athletics[]" value="Danceline"><lable> Danceline</label> <br>
						<input type="checkbox" name="athletics[]" value="Diving, Boys"><lable> Diving, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Diving, Girls"><lable> Diving, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Field Hockey"><lable> Field Hockey</label> <br>
						<input type="checkbox" name="athletics[]" value="Figure Skating"><lable> Figure Skating</label> <br>
						<input type="checkbox" name="athletics[]" value="Football"><lable> Football</label> <br>
						<input type="checkbox" name="athletics[]"value="Golf, Boys"><lable> Golf, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Golf, Girls"><lable> Golf, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Gymnastics, Boys"><lable> Gymnastics, Boys</label> <br>
						<input type="checkbox" name="athletics[]"value="Gymnastics, Girls"><lable> Gymnastics, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Ice Hockey"><lable> Ice Hockey, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Ice Hockey"><lable> Ice Hockey, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Lacrosse, Boys"><lable> Lacrosse, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Lacrosse, Girls"><lable> Lacrosse, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Mountaineering"><lable> Mountaineering</label> <br>
						<input type="checkbox" name="athletics[]" value="Power Lifting"><lable> Power Lifting</label> <br>
						<input type="checkbox" name="athletics[]" value="Racquetball"><lable> Racquetball</label> <br>
						<input type="checkbox" name="athletics[]" value="Rodeo"><lable> Rodeo</label> <br>
						<input type="checkbox" name="athletics[]" value="Rowing, Boys"><lable> Rowing, Boys</label> <br>
						<input type="checkbox" name="athletics[]"value="Rowing, Girls"><lable> Rowing, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Rugby, Boys"><lable> Rugby, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Rugby, Girls"><lable> Rugby, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Sailing"><lable> Sailing</label> <br>
						<input type="checkbox" name="athletics[]" value="Ski & Snowboard, Boys"><lable> Ski & Snowboard, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Ski & Snowboard, Girls"><lable> Ski & Snowboard, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Soccer, Boys"><lable> Soccer, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Soccer, Girls"><lable> Soccer, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Softball"><lable> Softball</label> <br>
						<input type="checkbox" name="athletics[]" value="Swimming, Boys"><lable> Swimming, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Swimming, Girls"><lable> Swimming, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Table Tennis"><lable> Table Tennis</label> <br>
						<input type="checkbox" name="athletics[]" value="Tennis, Boys"><lable> Tennis, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Tennis, Girls"><lable> Tennis, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Track & Field, Boys"><lable> Track & Field, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Track & Field, Girls"><lable> Track & Field, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Ultimate Frisbee, Boys"><lable> Ultimate Frisbee, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Ultimate Frisbee, Girls"><lable> Ultimate Frisbee, Girls</label> <br>
						<input type="checkbox" name="athletics[]"value="Volleyball, Boys"><lable> Volleyball, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Volleyball, Girls"><lable> Volleyball, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Water Polo"><lable> Water Polo</label> <br>
						<input type="checkbox" name="athletics[]" value="Wrestling"><lable> Wrestling</label> <br>
						
						<input type="hidden" name="orgtype" value="College">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "High School":
		echo'<div class="interim-form"> 
		<div class="interim-header"><h3>Select High School Groups to Setup</h3></div>

		<input type="checkbox" name="all" onClick="toggle(this)"><lable> Select All Groups</label>
		<br><br>
		<div class="groupcolumns">
			<div class="groupsection shortbreak">
				<span id="">Clubs & Organizations</span><br>
				<div class="checkboxes">
					<input type="checkbox" name="clubs[]" value="4-H"><lable> 4-H</label> <br>
					<input type="checkbox" name="clubs[]" value="Band"><lable> Band</label> <br>
					<input type="checkbox" name="clubs[]" value="Booster Club"><lable> Booster Club</label> <br>
					<input type="checkbox" name="clubs[]" value="BPA"><lable> BPA</label> <br>
					<input type="checkbox" name="clubs[]" value="Chess Club"><lable> Chess Club</label> <br>
					<input type="checkbox" name="clubs[]" value="Choir"><lable> Choir</label> <br>
					<input type="checkbox" name="clubs[]" value="Debate"><lable> Debate</label> <br>
					<input type="checkbox" name="clubs[]" value="DECA"><lable> DECA</label> <br>
					<input type="checkbox" name="clubs[]" value="FBLA"><lable> FBLA</label> <br>
					<input type="checkbox" name="clubs[]" value="FFA"><lable> FFA</label> <br>
					<input type="checkbox" name="clubs[]" value="Jazz Band"><lable> Jazz Band</label> <br>
					<input type="checkbox" name="clubs[]" value="JROTC"><lable> JROTC</label> <br>
					<input type="checkbox" name="clubs[]" value="Key Club"><lable> Key Club</label> <br>
					<input type="checkbox" name="clubs[]" value="Language Club"><lable> Language Club</label> <br>
					<input type="checkbox" name="clubs[]" value="Math Club"><lable> Math Club</label> <br>
					<input type="checkbox" name="clubs[]" value="National Honor Society"><lable> National Honor Society</label> <br>
					<input type="checkbox" name="clubs[]" value="Orchestra"><lable> Orchestra</label> <br>
					<input type="checkbox" name="clubs[]" value="PTA/PTO"><lable> PTA/PTO/PTC</label> <br>
					<input type="checkbox" name="clubs[]" value="Robotics & Technology"><lable> Robotics & Technology</label> <br>
					<input type="checkbox" name="clubs[]" value="Science Club"><lable> Science Club</label> <br>
					<input type="checkbox" name="clubs[]" value="Scripture Study"><lable> Scripture Study</label> <br>
					<input type="checkbox" name="clubs[]" value="Student Council"><lable> Student Council</label> <br>
					<input type="checkbox" name="clubs[]" value="Theatre & Drama"><lable> Theatre & Drama</label> <br>
					<input type="checkbox" name="clubs[]" value="Yearbook"><lable> Yearbook</label> <br>
					<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
				</div> <!-- end checkboxes -->
			</div> <!-- end groupsection -->
		<br>
				<div class="groupsection shortbreak">
					<span id="">General</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="General"><lable> General</label> <br>
						<input type="checkbox" name="clubs[]" value="Graduation"><lable> Graduation</label> <br>
						<input type="checkbox" name="clubs[]" value="Senior Class"><lable> Senior Class</label> <br>
						<input type="checkbox" name="clubs[]" value="Junior Class"><lable> Junior Class</label> <br>
						<input type="checkbox" name="clubs[]" value="Sophmore Class"><lable> Sophmore Class</label> <br>
						<input type="checkbox" name="clubs[]" value="Freshman Class"><lable> Freshman Class</label> <br>
						<input type="checkbox" name="clubs[]" value="Athletic Equipment"><lable> Athletic Equipment</label> <br>
						<input type="checkbox" name="clubs[]" value="Field Trips & Travel"><lable> Field Trips & Travel</label> <br>
						<input type="checkbox" name="clubs[]" value="Library & Technology"><lable> Library & Technology</label> <br>
						<input type="checkbox" name="clubs[]" value="Playground Equipment"><lable> Playground Equipment</label> <br>
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><lable> Projection, Audio, Video</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><lable> Tablets, Laptops & PCs</label> <br><br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				<div class="groupsection shortbreak">
					<span id="">Athletics</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="athletics[]" value="Archery"><lable> Archery</label> <br>
						<input type="checkbox" name="athletics[]" value="Badminton"><lable> Badminton</label> <br>
						<input type="checkbox" name="athletics[]" value="Baseball"><lable> Baseball</label> <br>
						<input type="checkbox" name="athletics[]" value="Basketball, Boys"><lable> Basketball, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Basketball, Girls"><lable> Basketball, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Bowling, Boys"><lable> Bowling, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Bowling, Girls"><lable> Bowling, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="CC Running, Boys"><lable> CC Running, Boys</label><br>
						<input type="checkbox" name="athletics[]" value="CC Running, Girls"><lable> CC Running, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="CC Skiing, Boys"><lable> CC Skiing, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="CC Skiing, Girls"><lable> CC Skiing, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Cheerleading"><lable> Cheerleading</label> <br>
						<input type="checkbox" name="athletics[]" value="Cycling"><lable> Cycling</label> <br>
						<input type="checkbox" name="athletics[]" value="Danceline"><lable> Danceline</label> <br>
						<input type="checkbox" name="athletics[]" value="Diving, Boys"><lable> Diving, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Diving, Girls"><lable> Diving, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Field Hockey"><lable> Field Hockey</label> <br>
						<input type="checkbox" name="athletics[]" value="Figure Skating"><lable> Figure Skating</label> <br>
						<input type="checkbox" name="athletics[]" value="Football"><lable> Football</label> <br>
						<input type="checkbox" name="athletics[]"value="Golf, Boys"><lable> Golf, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Golf, Girls"><lable> Golf, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Gymnastics, Boys"><lable> Gymnastics, Boys</label> <br>
						<input type="checkbox" name="athletics[]"value="Gymnastics, Girls"><lable> Gymnastics, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Ice Hockey"><lable> Ice Hockey, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Ice Hockey"><lable> Ice Hockey, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Lacrosse, Boys"><lable> Lacrosse, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Lacrosse, Girls"><lable> Lacrosse, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Mountaineering"><lable> Mountaineering</label> <br>
						<input type="checkbox" name="athletics[]" value="Power Lifting"><lable> Power Lifting</label> <br>
						<input type="checkbox" name="athletics[]" value="Racquetball"><lable> Racquetball</label> <br>
						<input type="checkbox" name="athletics[]" value="Rodeo"><lable> Rodeo</label> <br>
						<input type="checkbox" name="athletics[]" value="Rowing, Boys"><lable> Rowing, Boys</label> <br>
						<input type="checkbox" name="athletics[]"value="Rowing, Girls"><lable> Rowing, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Rugby, Boys"><lable> Rugby, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Rugby, Girls"><lable> Rugby, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Sailing"><lable> Sailing</label> <br>
						<input type="checkbox" name="athletics[]" value="Ski & Snowboard, Boys"><lable> Ski & Snowboard, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Ski & Snowboard, Girls"><lable> Ski & Snowboard, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Soccer, Boys"><lable> Soccer, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Soccer, Girls"><lable> Soccer, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Softball"><lable> Softball</label> <br>
						<input type="checkbox" name="athletics[]" value="Swimming, Boys"><lable> Swimming, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Swimming, Girls"><lable> Swimming, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Table Tennis"><lable> Table Tennis</label> <br>
						<input type="checkbox" name="athletics[]" value="Tennis, Boys"><lable> Tennis, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Tennis, Girls"><lable> Tennis, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Track & Field, Boys"><lable> Track & Field, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Track & Field, Girls"><lable> Track & Field, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Ultimate Frisbee, Boys"><lable> Ultimate Frisbee, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Ultimate Frisbee, Girls"><lable> Ultimate Frisbee, Girls</label> <br>
						<input type="checkbox" name="athletics[]"value="Volleyball, Boys"><lable> Volleyball, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Volleyball, Girls"><lable> Volleyball, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Water Polo"><lable> Water Polo</label> <br>
						<input type="checkbox" name="athletics[]" value="Wrestling"><lable> Wrestling</label> <br>
						<input type="hidden" name="orgtype" value="High School">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Middle School":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Select Middle School Groups to Setup</h3></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><lable> Select All Groups</label>

			<br><br>
			<div class="groupcolumns">
				<div class="groupsection shortbreak">
					<span>Clubs & Organizations:</span>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="4-H"><lable> 4-H</label> <br>
						<input type="checkbox" name="clubs[]" value="Band"><lable> Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Booster Club"><lable> Booster Club</label> <br>
						<input type="checkbox" name="clubs[]" value="BPA"><lable> BPA</label> <br>
						<input type="checkbox" name="clubs[]" value="Chess Club"><lable> Chess Club</label> <br>
						<input type="checkbox" name="clubs[]" value="Choir"><lable> Choir</label> <br>
						<input type="checkbox" name="clubs[]" value="Debate"><lable> Debate</label> <br>
						<input type="checkbox" name="clubs[]" value="FFA"><lable> FFA</label> <br>
						<input type="checkbox" name="clubs[]" value="Jazz Band"><lable> Jazz Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Language Club"><lable> Language Club</label> <br>
						<input type="checkbox" name="clubs[]" value="Math Club"><lable> Math Club</label> <br>
						<input type="checkbox" name="clubs[]" value="National Honor Society"><lable> National Honor Society</label> <br>
						<input type="checkbox" name="clubs[]" value="Orchestra"><lable> Orchestra</label> <br>
						<input type="checkbox" name="clubs[]" value="PTA/PTO/PTC"><lable> PTA/PTO/PTC</label> <br>
						<input type="checkbox" name="clubs[]" value="Band"><lable> Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Science Club"><lable> Science Club</label> <br>
						<input type="checkbox" name="clubs[]" value="Band"><lable> Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Scripture Study"><lable> Scripture Study</label> <br>
						<input type="checkbox" name="clubs[]" value="Student Council"><lable> Student Council</label> <br>
						<input type="checkbox" name="clubs[]" value="Theatre & Drama"><lable> Theatre & Drama</label> <br>
						<input type="checkbox" name="clubs[]" value="Yearbook"><lable> Yearbook</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				<br>
				<div class="groupsection shortbreak">
					<span id="">General</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="General"><lable> General</label> <br>
						<input type="checkbox" name="clubs[]" value="After-School Program"><lable> After-School Program</label> <br>
						<input type="checkbox" name="clubs[]" value="Athletic Equipment"><lable> Athletic Equipment</label> <br>
						<input type="checkbox" name="clubs[]" value="Field Trips & Travel"><lable> Field Trips & Travel</label> <br>
						<input type="checkbox" name="clubs[]" value="Library & Technology"><lable> Library & Technology</label> <br>
						<input type="checkbox" name="clubs[]" value="Playground Equipment"><lable> Playground Equipment</label> <br>
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><lable> Projection, Audio, Video</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><lable> Tablets, Laptops & PCs</label> <br>
						 <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				<div class="groupsection shortbreak">
					<span>Athletics:</span>
					<div class="checkboxes">
								<input type="checkbox" name="athletics[]" value="Archery"><lable> Archery</label> <br>
						<input type="checkbox" name="athletics[]" value="Badminton"><lable> Badminton</label> <br>
						<input type="checkbox" name="athletics[]" value="Baseball"><lable> Baseball</label> <br>
						<input type="checkbox" name="athletics[]" value="Basketball, Boys"><lable> Basketball, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Basketball, Girls"><lable> Basketball, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Bowling, Boys"><lable> Bowling, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Bowling, Girls"><lable> Bowling, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="CC Running, Boys"><lable> CC Running, Boys</label><br>
						<input type="checkbox" name="athletics[]" value="CC Running, Girls"><lable> CC Running, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="CC Skiing, Boys"><lable> CC Skiing, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="CC Skiing, Girls"><lable> CC Skiing, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Cheerleading"><lable> Cheerleading</label> <br>
						<input type="checkbox" name="athletics[]" value="Cycling"><lable> Cycling</label> <br>
						<input type="checkbox" name="athletics[]" value="Danceline"><lable> Danceline</label> <br>
						<input type="checkbox" name="athletics[]" value="Diving, Boys"><lable> Diving, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Diving, Girls"><lable> Diving, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Field Hockey"><lable> Field Hockey</label> <br>
						<input type="checkbox" name="athletics[]" value="Figure Skating"><lable> Figure Skating</label> <br>
						<input type="checkbox" name="athletics[]" value="Football"><lable> Football</label> <br>
						<input type="checkbox" name="athletics[]"value="Golf, Boys"><lable> Golf, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Golf, Girls"><lable> Golf, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Gymnastics, Boys"><lable> Gymnastics, Boys</label> <br>
						<input type="checkbox" name="athletics[]"value="Gymnastics, Girls"><lable> Gymnastics, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Ice Hockey"><lable> Ice Hockey, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Ice Hockey"><lable> Ice Hockey, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Lacrosse, Boys"><lable> Lacrosse, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Lacrosse, Girls"><lable> Lacrosse, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Mountaineering"><lable> Mountaineering</label> <br>
						<input type="checkbox" name="athletics[]" value="Power Lifting"><lable> Power Lifting</label> <br>
						<input type="checkbox" name="athletics[]" value="Racquetball"><lable> Racquetball</label> <br>
						<input type="checkbox" name="athletics[]" value="Rodeo"><lable> Rodeo</label> <br>
						<input type="checkbox" name="athletics[]" value="Rowing, Boys"><lable> Rowing, Boys</label> <br>
						<input type="checkbox" name="athletics[]"value="Rowing, Girls"><lable> Rowing, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Rugby, Boys"><lable> Rugby, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Rugby, Girls"><lable> Rugby, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Sailing"><lable> Sailing</label> <br>
						<input type="checkbox" name="athletics[]" value="Ski & Snowboard, Boys"><lable> Ski & Snowboard, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Ski & Snowboard, Girls"><lable> Ski & Snowboard, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Soccer, Boys"><lable> Soccer, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Soccer, Girls"><lable> Soccer, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Softball"><lable> Softball</label> <br>
						<input type="checkbox" name="athletics[]" value="Swimming, Boys"><lable> Swimming, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Swimming, Girls"><lable> Swimming, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Table Tennis"><lable> Table Tennis</label> <br>
						<input type="checkbox" name="athletics[]" value="Tennis, Boys"><lable> Tennis, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Tennis, Girls"><lable> Tennis, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Track & Field, Boys"><lable> Track & Field, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Track & Field, Girls"><lable> Track & Field, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Ultimate Frisbee, Boys"><lable> Ultimate Frisbee, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Ultimate Frisbee, Girls"><lable> Ultimate Frisbee, Girls</label> <br>
						<input type="checkbox" name="athletics[]"value="Volleyball, Boys"><lable> Volleyball, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Volleyball, Girls"><lable> Volleyball, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Water Polo"><lable> Water Polo</label> <br>
						<input type="checkbox" name="athletics[]" value="Wrestling"><lable> Wrestling</label> <br>
				<input type="hidden" name="orgtype" value="Middle School">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Elementary School":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Select Elementary School Groups to Setup</h3></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><lable> Select All</label>
			<br><br>
			<div class="groupcolumns">
				<div class="groupsection shortbreak">
					<span>Clubs & Organizations:</span>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="4-H"><lable> 4-H</label> <br>
						<input type="checkbox" name="clubs[]" value="Art Club"><lable> Art Club</label> <br>
						<input type="checkbox" name="clubs[]" value="Band"><lable> Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Booster Club"><lable> Booster Club</label> <br>
						<input type="checkbox" name="clubs[]" value="Carnival"><lable> Carnival</label> <br>
						<input type="checkbox" name="clubs[]" value="Choir"><lable> Choir</label> <br>
						<input type="checkbox" name="clubs[]" value="Math Club"><lable> Math Club</label> <br>
						<input type="checkbox" name="clubs[]" value="PTA/PTO/PTC"><lable> PTA/PTO/PTC</label> <br>
						<input type="checkbox" name="clubs[]" value="Science Club"><lable> Science Club</label> <br>
						<input type="checkbox" name="clubs[]" value="Theatre & Drama"><lable> Theatre & Drama</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> 
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				<br>
				<div class="groupsection longbreak">
					<span>General Needs:</span>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="General"><lable> General</label> <br>
						<input type="checkbox" name="clubs[]" value="After-School Program"><lable> After-School Program</label> <br>
						<input type="checkbox" name="clubs[]" value="Athletic Equipment"><lable> Athletic Equipment </label> <br>
						<input type="checkbox" name="clubs[]" value="Field Trips & Travel"><lable> Field Trips & Travel </label> <br>
						<input type="checkbox" name="clubs[]" value="Library & Technology"><lable> Library & Technology</label> <br>
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><lable> Projection, Audio, Video</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><lable> Tablets, Laptops & PCs</label><br> 
						<br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				<div class="groupsection shortbreak">		
					<span id="">Athletics</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="athletics[]" value="Baseball"><lable> Baseball</label> <br>
						<input type="checkbox" name="athletics[]" value="Basketball, Boys"><lable> Basketball, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Basketball, Girls"><lable> Basketball, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Biking"><lable> Biking</label> <br>
						<input type="checkbox" name="athletics[]" value="Football"><lable> Football</label> <br>
						<input type="checkbox" name="athletics[]" value="Gymnastics, Boys"><lable> Gymnastics, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Gymnastics, Girls"><lable> Gymnastics, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Ice Hockey, Boys"><lable> Ice Hockey, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Ice Hockey, Girls"><lable> Ice Hockey, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Lacrosse, Boys"><lable> Lacrosse, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Lacrosse, Girls"><lable> Lacrosse, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Soccer, Boys"><lable> Soccer, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Soccer, Girls"><lable> Soccer, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Softball"><lable> Softball</label> <br>
						<input type="checkbox" name="athletics[]" value="Swimming, Boys"><lable> Swimming, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Swimming, Girls"><lable> Swimming, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="T-Ball"><lable> T-Ball</label> <br>
						<input type="checkbox" name="athletics[]" value="Track & Field, Boys"><lable> Track & Field, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Track & Field, Girls"><lable> Track & Field, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Volleyball, Boys"><lable> Volleyball, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Volleyball, Girls"><lable> Volleyball, Girls</label> <br>
			<input type="hidden" name="orgtype" value="Elementary School">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Pre-School":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Select Pre-School Groups to Setup</h3></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><lable> Select All</label>
			<br><br>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Equipment & Supplies"><lable> Equipment & Supplies</label> <br>
						<input type="checkbox" name="clubs[]" value="Field Trips & Travel"><lable> Field Trips & Travel</label> <br>
						<input type="checkbox" name="clubs[]" value="Playground Equipment"><lable> Playground Equipment</label> <br>
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><lable> Projection, Audio, Video</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><lable> Tablets, Laptops & PCs</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br><input type="hidden" name="orgtype" value="Pre-School">
						<input type="hidden" name="grouptype" value="Pre-School">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;


		case "Home School":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Select Home School Groups to Setup</h3></div>

			
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><lable> Projection, Audio, Video</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br><input type="hidden" name="orgtype" value="Home School">
						<input type="hidden" name="grouptype" value="Home School">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Trade, Vocational & Tech":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Select Trade, Vocational & Tech Groups to Setup</h3></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><lable> Select All</label>
			<br><br>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Field Trips & Travel"><lable> Field Trips & Travel</label> <br>
						<input type="checkbox" name="clubs[]" value="General Equipment"><lable> General Equipment</label> <br>
						<input type="checkbox" name="clubs[]" value="Trade Supplies"><lable> Trade Supplies</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other">Enter Group Type <br><input type="hidden" name="orgtype" value="Trade, Vocational & Tech">
						<input type="hidden" name="grouptype" value="Trade, Vocational & Tech">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Camps":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Select Camp Groups to Setup</h3></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><lable> Select All</label>
			<br><br>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Bible Camps"><lable> Bible Camps</label> <br>
						<input type="checkbox" name="clubs[]" value="Dance Camps"><lable> Dance Camps</label> <br>
						<input type="checkbox" name="clubs[]" value="Education Camps"><lable> Education Camps</label> <br>
						<input type="checkbox" name="clubs[]" value="Family Camps"><lable> Family Camps</label> <br>
						<input type="checkbox" name="clubs[]" value="General Camps"><lable> General Camps</label> <br>
						<input type="checkbox" name="clubs[]" value="Music Camps"><lable> Music Camps</label> <br>
						<input type="checkbox" name="clubs[]" value="Scouting Camps"><lable> Scouting Camps</label> <br>
						<input type="checkbox" name="clubs[]" value="Sports Camps"><lable> Sports Camps</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth Camps"><lable> Youth Camps</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type <br><input type="hidden" name="orgtype" value="Camps">
						<input type="hidden" name="grouptype" value="Camps">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		
		
		case "Religious Organization":
           echo '<div class="interim-form"> 
           <div class="interim-header"><h3>Select Religious Organization to Setup</h3></div>
           
           <input type="checkbox" name="all" onClick="toggle(this)"><lable> Select All</label>
           <br><br>

		<div class="groupcolumns">
	            	<div class="groupsection">
	            		<div class="checkboxes">
					<input type="checkbox" name="clubs[]" value="Main Church Website"><lable> Main Church Website</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Camp"><lable> Bible Camp</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Study"><lable> Bible Study</label> <br>
						<input type="checkbox" name="clubs[]" value="Building Fund"><lable> Building Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Choir & Band"><lable> Choir & Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Christmas Giving Tree"><lable> Christmas Giving Tree</label> <br>
						<input type="checkbox" name="clubs[]" value="Faith Formation"><lable> Faith Formation</label> <br>
						<input type="checkbox" name="clubs[]" value="Festivals"><lable> Festivals</label> <br>
						<input type="checkbox" name="clubs[]" value="Men’s Ministry"><lable> Men’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Outreach Ministry"><lable> Outreach Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Parish Fund"><lable> Parish Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><lable> Projection, Audio, Video</label> <br>
						<input type="checkbox" name="clubs[]" value="Student Ministry"><lable> Student Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Sunday School"><lable> Sunday School</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><lable> Tablets, Laptops & PCs</label> <br>
						<input type="checkbox" name="clubs[]" value="Women’s Ministry"><lable> Women’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth’s Ministry"><lable> Youth’s Ministry</label> <br>
					<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
				</div> <!-- end checkboxes -->
			</div> <!-- end groupsection -->
	<br>
			<div class="groupsection">
				<span id="">Missionary Funds</span><br>
				<div class="checkboxes">
					<input type="checkbox" name="clubs[]" value="All Missions"><lable> All Missions</label> <br>
					<input type="checkbox" name="clubs[]" value="College Missions"><lable> College Missions</label> <br>
					<input type="checkbox" name="clubs[]" value="Overseas Missions"><lable> Overseas Missions</label> <br>
					<input type="checkbox" name="clubs[]" value="Youth & Teen"><lable> Youth & Teen</label>  <br>
				</div> <!-- end checkboxes -->
			</div> <!-- end groupsection -->
		</div> <!-- end groupcolumns -->
           </div> <!-- end interim-form -->';
           break;

           
           case "Faith Based Organization":
           echo '<div class="interim-form"> 
           <div class="interim-header"><h3>Select Faith Based Organization to Setup</h3></div>
           
           <input type="checkbox" name="all" onClick="toggle(this)"><lable> Select All</label>
           <br><br>

			<div class="groupcolumns">
	            	<div class="groupsection">
	            		<div class="checkboxes">
					<input type="checkbox" name="clubs[]" value="Main Church Website"><lable> Main Church Website</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Camp"><lable> Bible Camp</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Study"><lable> Bible Study</label> <br>
						<input type="checkbox" name="clubs[]" value="Building Fund"><lable> Building Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Choir & Band"><lable> Choir & Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Christmas Giving Tree"><lable> Christmas Giving Tree</label> <br>
						<input type="checkbox" name="clubs[]" value="Faith Formation"><lable> Faith Formation</label> <br>
						<input type="checkbox" name="clubs[]" value="Festivals"><lable> Festivals</label> <br>
						<input type="checkbox" name="clubs[]" value="Men’s Ministry"><lable> Men’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Outreach Ministry"><lable> Outreach Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Parish Fund"><lable> Parish Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><lable> Projection, Audio, Video</label> <br>
						<input type="checkbox" name="clubs[]" value="Student Ministry"><lable> Student Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Sunday School"><lable> Sunday School</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><lable> Tablets, Laptops & PCs</label> <br>
						<input type="checkbox" name="clubs[]" value="Women’s Ministry"><lable> Women’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth’s Ministry"><lable> Youth’s Ministry</label> <br>
					<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
				</div> <!-- end checkboxes -->
			</div> <!-- end groupsection -->
	<br>
			<div class="groupsection">
				<span id="">Missionary Funds</span><br>
				<div class="checkboxes">
					<input type="checkbox" name="clubs[]" value="All Missions"><lable> All Missions</label> <br>
					<input type="checkbox" name="clubs[]" value="College Missions"><lable> College Missions</label> <br>
					<input type="checkbox" name="clubs[]" value="Overseas Missions"><lable> Overseas Missions</label> <br>
					<input type="checkbox" name="clubs[]" value="Youth & Teen"><lable> Youth & Teen</label> <br>
				</div> <!-- end checkboxes -->
			</div> <!-- end groupsection -->
		</div> <!-- end groupcolumns -->
           </div> <!-- end interim-form -->';
           break;	
           
            case "Baptist":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Select Baptist Organization to Setup</h3></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><lable> Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Main Church Website"><lable> Main Church Website</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Camp"><lable> Bible Camp</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Study"><lable> Bible Study</label> <br>
						<input type="checkbox" name="clubs[]" value="Building Fund"><lable> Building Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Choir & Band"><lable> Choir & Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Christmas Giving Tree"><lable> Christmas Giving Tree</label> <br>
						<input type="checkbox" name="clubs[]" value="Faith Formation"><lable> Faith Formation</label> <br>
						<input type="checkbox" name="clubs[]" value="Festivals"><lable> Festivals</label> <br>
						<input type="checkbox" name="clubs[]" value="Men’s Ministry"><lable> Men’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Outreach Ministry"><lable> Outreach Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Parish Fund"><lable> Parish Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><lable> Projection, Audio, Video</label> <br>
						<input type="checkbox" name="clubs[]" value="Student Ministry"><lable> Student Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Sunday School"><lable> Sunday School</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><lable> Tablets, Laptops & PCs</label> <br>
						<input type="checkbox" name="clubs[]" value="Women’s Ministry"><lable> Women’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth’s Ministry"><lable> Youth’s Ministry</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br><input type="hidden" name="orgtype" value="Christian Faiths">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				<br>
				<div class="groupsection">
					<span id="">Missionary Funds</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="genral[]" value="All Missions"><lable> All Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="College Missions"><lable> College Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="Overseas Missions"><lable> Overseas Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth & Teen"><lable> Youth & Teen</label> <br><input type="hidden" name="orgtype" value="Christian Faiths">
						<input type="hidden" name="grouptype" value="Baptist">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Catholic":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Select Catholic Organization to Setup</h3></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><lable> Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Main Church Website"><lable> Main Church Website</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Camp"><lable> Bible Camp</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Study"><lable> Bible Study</label> <br>
						<input type="checkbox" name="clubs[]" value="Building Fund"><lable> Building Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Choir & Band"><lable> Choir & Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Christmas Giving Tree"><lable> Christmas Giving Tree</label> <br>
						<input type="checkbox" name="clubs[]" value="Faith Formation"><lable> Faith Formation</label> <br>
						<input type="checkbox" name="clubs[]" value="Festivals"><lable> Festivals</label> <br>
						<input type="checkbox" name="clubs[]" value="Men’s Ministry"><lable> Men’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Outreach Ministry"><lable> Outreach Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Parish Fund"><lable> Parish Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><lable> Projection, Audio, Video</label> <br>
						<input type="checkbox" name="clubs[]" value="Student Ministry"><lable> Student Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Sunday School"><lable> Sunday School</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><lable> Tablets, Laptops & PCs</label> <br>
						<input type="checkbox" name="clubs[]" value="Women’s Ministry"><lable> Women’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth’s Ministry"><lable> Youth’s Ministry</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				<br>
				<div class="groupsection">
					<span id="">Missionary Funds</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="All Missions"><lable> All Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="College Missions"><lable> College Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="Overseas Missions"><lable> Overseas Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth & Teen"><lable> Youth & Teen</label> <br><input type="hidden" name="orgtype" value="Christian Faiths">
						<input type="hidden" name="grouptype" value="Catholic">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Episcopal":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Select Episcopal Organization to Setup</h3></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><lable> Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Main Church Website"><lable> Main Church Website</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Camp"><lable> Bible Camp</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Study"><lable> Bible Study</label> <br>
						<input type="checkbox" name="clubs[]" value="Building Fund"><lable> Building Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Choir & Band"><lable> Choir & Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Christmas Giving Tree"><lable> Christmas Giving Tree</label> <br>
						<input type="checkbox" name="clubs[]" value="Faith Formation"><lable> Faith Formation</label> <br>
						<input type="checkbox" name="clubs[]" value="Festivals"><lable> Festivals</label> <br>
						<input type="checkbox" name="clubs[]" value="Men’s Ministry"><lable> Men’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Outreach Ministry"><lable> Outreach Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Parish Fund"><lable> Parish Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><lable> Projection, Audio, Video</label> <br>
						<input type="checkbox" name="clubs[]" value="Student Ministry"><lable> Student Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Sunday School"><lable> Sunday School</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><lable> Tablets, Laptops & PCs</label> <br>
						<input type="checkbox" name="clubs[]" value="Women’s Ministry"><lable> Women’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth’s Ministry"><lable> Youth’s Ministry</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				<br>
				<div class="groupsection">
					<span id="">Missionary Funds</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="All Missions"><lable> All Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="College Missions"><lable> College Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="Overseas Missions"><lable> Overseas Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth & Teen"><lable> Youth & Teen</label> <br><input type="hidden" name="orgtype" value="Christian Faiths">
						<input type="hidden" name="grouptype" value="Episcopal">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Lutheran":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Select Lutheran Organization to Setup</h3></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><lable> Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Main Church Website"><lable> Main Church Website</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Camp"><lable> Bible Camp</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Study"><lable> Bible Study</label> <br>
						<input type="checkbox" name="clubs[]" value="Building Fund"><lable> Building Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Choir & Band"><lable> Choir & Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Christmas Giving Tree"><lable> Christmas Giving Tree</label> <br>
						<input type="checkbox" name="clubs[]" value="Faith Formation"><lable> Faith Formation</label> <br>
						<input type="checkbox" name="clubs[]" value="Festivals"><lable> Festivals</label> <br>
						<input type="checkbox" name="clubs[]" value="Men’s Ministry"><lable> Men’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Outreach Ministry"><lable> Outreach Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Parish Fund"><lable> Parish Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><lable> Projection, Audio, Video</label> <br>
						<input type="checkbox" name="clubs[]" value="Student Ministry"><lable> Student Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Sunday School"><lable> Sunday School</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><lable> Tablets, Laptops & PCs</label> <br>
						<input type="checkbox" name="clubs[]" value="Women’s Ministry"><lable> Women’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth’s Ministry"><lable> Youth’s Ministry</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				<br>
				<div class="groupsection">
					<span id="">Missionary Funds</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="All Missions"><lable> All Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="College Missions"><lable> College Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="Overseas Missions"><lable> Overseas Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth & Teen"><lable> Youth & Teen</label> <br><input type="hidden" name="orgtype" value="Christian Faiths">
						<input type="hidden" name="grouptype" value="Lutheran">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Methodist":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Select Methodist Organization to Setup</h3></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><lable> Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Main Church Website"><lable> Main Church Website</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Camp"><lable> Bible Camp</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Study"><lable> Bible Study</label> <br>
						<input type="checkbox" name="clubs[]" value="Building Fund"><lable> Building Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Choir & Band"><lable> Choir & Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Christmas Giving Tree"><lable> Christmas Giving Tree</label> <br>
						<input type="checkbox" name="clubs[]" value="Faith Formation"><lable> Faith Formation</label> <br>
						<input type="checkbox" name="clubs[]" value="Festivals"><lable> Festivals</label> <br>
						<input type="checkbox" name="clubs[]" value="Men’s Ministry"><lable> Men’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Outreach Ministry"><lable> Outreach Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Parish Fund"><lable> Parish Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><lable> Projection, Audio, Video</label> <br>
						<input type="checkbox" name="clubs[]" value="Student Ministry"><lable> Student Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Sunday School"><lable> Sunday School</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><lable> Tablets, Laptops & PCs</label> <br>
						<input type="checkbox" name="clubs[]" value="Women’s Ministry"><lable> Women’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth’s Ministry"><lable> Youth’s Ministry</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				<br>
				<div class="groupsection">
					<span id="">Missionary Funds</span><br>
					<div class="checkboxes">						
						<input type="checkbox" name="clubs[]" value="All Missions"><lable> All Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="College Missions"><lable> College Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="Overseas Missions"><lable> Overseas Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth & Teen"><lable> Youth & Teen</label> <br><input type="hidden" name="orgtype" value="Christian Faiths">
						<input type="hidden" name="grouptype" value="Methodist">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Presbyterian":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Select Presbyterian Organization to Setup</h3></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><lable> Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Main Church Website"><lable> Main Church Website</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Camp"><lable> Bible Camp</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Study"><lable> Bible Study</label> <br>
						<input type="checkbox" name="clubs[]" value="Building Fund"><lable> Building Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Choir & Band"><lable> Choir & Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Christmas Giving Tree"><lable> Christmas Giving Tree</label> <br>
						<input type="checkbox" name="clubs[]" value="Faith Formation"><lable> Faith Formation</label> <br>
						<input type="checkbox" name="clubs[]" value="Festivals"><lable> Festivals</label> <br>
						<input type="checkbox" name="clubs[]" value="Men’s Ministry"><lable> Men’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Outreach Ministry"><lable> Outreach Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Parish Fund"><lable> Parish Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><lable> Projection, Audio, Video</label> <br>
						<input type="checkbox" name="clubs[]" value="Student Ministry"><lable> Student Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Sunday School"><lable> Sunday School</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><lable> Tablets, Laptops & PCs</label> <br>
						<input type="checkbox" name="clubs[]" value="Women’s Ministry"><lable> Women’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth’s Ministry"><lable> Youth’s Ministry</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br><input type="hidden" name="orgtype" value="Christian Faiths">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				<br>
				<div class="groupsection">
					<span id="">Missionary Funds</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="All Missions"><lable> All Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="College Missions"><lable> College Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="Overseas Missions"><lable> Overseas Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth & Teen"><lable> Youth & Teen</label> <br><input type="hidden" name="orgtype" value="Christian Faiths">
						<input type="hidden" name="grouptype" value="Presbyterian">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Orthodox":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Select Orthodox Organization to Setup</h3></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><lable> Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Main Church Website"><lable> Main Church Website</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Camp"><lable> Bible Camp</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Study"><lable> Bible Study</label> <br>
						<input type="checkbox" name="clubs[]" value="Building Fund"><lable> Building Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Choir & Band"><lable> Choir & Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Christmas Giving Tree"><lable> Christmas Giving Tree</label> <br>
						<input type="checkbox" name="clubs[]" value="Faith Formation"><lable> Faith Formation</label> <br>
						<input type="checkbox" name="clubs[]" value="Festivals"><lable> Festivals</label> <br>
						<input type="checkbox" name="clubs[]" value="Men’s Ministry"><lable> Men’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Outreach Ministry"><lable> Outreach Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Parish Fund"><lable> Parish Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><lable> Projection, Audio, Video</label> <br>
						<input type="checkbox" name="clubs[]" value="Student Ministry"><lable> Student Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Sunday School"><lable> Sunday School</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><lable> Tablets, Laptops & PCs</label> <br>
						<input type="checkbox" name="clubs[]" value="Women’s Ministry"><lable> Women’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth’s Ministry"><lable> Youth’s Ministry</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				<br>
				<div class="groupsection">
					<span id="">Missionary Funds</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="All Missions"><lable> All Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="College Missions"><lable> College Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="Overseas Missions"><lable> Overseas Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth & Teen"><lable> Youth & Teen</label> <br><input type="hidden" name="orgtype" value="Christian Faiths">
						<input type="hidden" name="grouptype" value="Orthodox">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
case "Reformed":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Select Reformed Organization to Setup</h3></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><lable> Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Main Church Website"><lable> Main Church Website</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Camp"><lable> Bible Camp</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Study"><lable> Bible Study</label> <br>
						<input type="checkbox" name="clubs[]" value="Building Fund"><lable> Building Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Choir & Band"><lable> Choir & Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Christmas Giving Tree"><lable> Christmas Giving Tree</label> <br>
						<input type="checkbox" name="clubs[]" value="Faith Formation"><lable> Faith Formation</label> <br>
						<input type="checkbox" name="clubs[]" value="Festivals"><lable> Festivals</label> <br>
						<input type="checkbox" name="clubs[]" value="Men’s Ministry"><lable> Men’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Outreach Ministry"><lable> Outreach Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Parish Fund"><lable> Parish Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><lable> Projection, Audio, Video</label> <br>
						<input type="checkbox" name="clubs[]" value="Student Ministry"><lable> Student Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Sunday School"><lable> Sunday School</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><lable> Tablets, Laptops & PCs</label> <br>
						<input type="checkbox" name="clubs[]" value="Women’s Ministry"><lable> Women’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth’s Ministry"><lable> Youth’s Ministry</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				<br>
				<div class="groupsection">
					<span id="">Missionary Funds</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="All Missions"><lable> All Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="College Missions"><lable> College Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="Overseas Missions"><lable> Overseas Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth & Teen"><lable> Youth & Teen</label> <br><input type="hidden" name="orgtype" value="Christian Faiths">
						<input type="hidden" name="grouptype" value="Spirit-Filled">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Spirit-Filled":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Select Spirit-Filled Organization to Setup</h3></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><lable> Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Main Church Website"><lable> Main Church Website</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Camp"><lable> Bible Camp</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Study"><lable> Bible Study</label> <br>
						<input type="checkbox" name="clubs[]" value="Building Fund"><lable> Building Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Choir & Band"><lable> Choir & Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Christmas Giving Tree"><lable> Christmas Giving Tree</label> <br>
						<input type="checkbox" name="clubs[]" value="Faith Formation"><lable> Faith Formation</label> <br>
						<input type="checkbox" name="clubs[]" value="Festivals"><lable> Festivals</label> <br>
						<input type="checkbox" name="clubs[]" value="Men’s Ministry"><lable> Men’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Outreach Ministry"><lable> Outreach Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Parish Fund"><lable> Parish Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><lable> Projection, Audio, Video</label> <br>
						<input type="checkbox" name="clubs[]" value="Student Ministry"><lable> Student Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Sunday School"><lable> Sunday School</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><lable> Tablets, Laptops & PCs</label> <br>
						<input type="checkbox" name="clubs[]" value="Women’s Ministry"><lable> Women’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth’s Ministry"><lable> Youth’s Ministry</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br><input type="hidden" name="orgtype" value="Christian Faiths">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				<br>
				<div class="groupsection">
					<span id="">Missionary Funds</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="All Missions"><lable> All Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="College Missions"><lable> College Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="Overseas Missions"><lable> Overseas Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth & Teen"><lable> Youth & Teen</label> <br><input type="hidden" name="orgtype" value="Christian Faiths">
						<input type="hidden" name="grouptype" value="Spirit-Filled">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Christian Other":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Select Christian Other Organization to Setup</h3></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><lable> Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Main Church Website"><lable> Main Church Website</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Camp"><lable> Bible Camp</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Study"><lable> Bible Study</label> <br>
						<input type="checkbox" name="clubs[]" value="Building Fund"><lable> Building Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Choir & Band"><lable> Choir & Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Christmas Giving Tree"><lable> Christmas Giving Tree</label> <br>
						<input type="checkbox" name="clubs[]" value="Faith Formation"><lable> Faith Formation</label> <br>
						<input type="checkbox" name="clubs[]" value="Festivals"><lable> Festivals</label> <br>
						<input type="checkbox" name="clubs[]" value="Men’s Ministry"><lable> Men’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Outreach Ministry"><lable> Outreach Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Parish Fund"><lable> Parish Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><lable> Projection, Audio, Video</label> <br>
						<input type="checkbox" name="clubs[]" value="Student Ministry"><lable> Student Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Sunday School"><lable> Sunday School</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><lable> Tablets, Laptops & PCs</label> <br>
						<input type="checkbox" name="clubs[]" value="Women’s Ministry"><lable> Women’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth’s Ministry"><lable> Youth’s Ministry</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				<br>
				<div class="groupsection">
					<span id="">Missionary Funds</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="All Missions"><lable> All Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="College Missions"><lable> College Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="Overseas Missions"><lable> Overseas Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth & Teen"><lable> Youth & Teen</label> <br><input type="hidden" name="orgtype" value="Christian Faiths">
						<input type="hidden" name="grouptype" value="Christian Other">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Jewish Conservative":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Select Jewish Conservative Organization to Setup</h3></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><lable> Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection2 shortbreak">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Main Synagogue Website"><lable> Main Synagogue Website</label> <br>
						<input type="checkbox" name="clubs[]" value="Jewish Summer Camp"><lable> Jewish Summer Camp</label> <br>
						<input type="checkbox" name="clubs[]" value="Hebrew Bible Study"><lable> Hebrew Bible Study</label> <br>
						<input type="checkbox" name="clubs[]" value="Building Fund"><lable> Building Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Choir & Band"><lable> Choir & Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Festivals"><lable> Festivals</label> <br>
						<input type="checkbox" name="clubs[]" value="Synagogue Fund"><lable> Synagogue Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><lable> Projection, Audio, Video</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><lable> Tablets, Laptops & PCs</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				<br>
				<div class="groupsection">
					<span id="">Mission Trips</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="All Missions"><lable> All Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="College Missions"><lable> College Missions</label> <br>
						<input type="checkbox" name="clubs[]"value="Israel Mission"><lable> Israel Mission</label> <br>
						<input type="checkbox" name="clubs[]" value="Overseas Missions"><lable> Overseas Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth & Teen"><lable> Youth & Teen</label> <br><input type="hidden" name="orgtype" value="Judaism">
						<input type="hidden" name="grouptype" value="Jewish Conservative">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Jewish Orthodox":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Select Jewish Orthodox Organization to Setup</h3></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><lable> Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection2 shortbreak">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Main Synagogue Website"><lable> Main Synagogue Website</label> <br>
						<input type="checkbox" name="clubs[]" value="Jewish Summer Camp"><lable> Jewish Summer Camp</label> <br>
						<input type="checkbox" name="clubs[]" value="Hebrew Bible Study"><lable> Hebrew Bible Study</label> <br>
						<input type="checkbox" name="clubs[]" value="Building Fund"><lable> Building Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Choir & Band"><lable> Choir & Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Festivals"><lable> Festivals</label> <br>
						<input type="checkbox" name="clubs[]" value="Synagogue Fund"><lable> Synagogue Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><lable> Projection, Audio, Video</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><lable> Tablets, Laptops & PCs</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				<br>
				<div class="groupsection">
					<span id="">Mission Trips</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="All Missions"><lable> All Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="College Missions"><lable> College Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="Israel Mission"><lable> Israel Mission</label> <br>
						<input type="checkbox" name="clubs[]" value="Overseas Missions"><lable> Overseas Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth & Teen"><lable> Youth & Teen</label> <br><input type="hidden" name="orgtype" value="Judaism">
						<input type="hidden" name="grouptype" value="Jewish Orthodox">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Jewish Reformed":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Select Jewish Reformed Organization to Setup</h3></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><lable> Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection2 shortbreak">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Main Synagogue Website"><lable> Main Synagogue Website</label> <br>
						<input type="checkbox" name="clubs[]" value="Jewish Summer Camp"><lable> Jewish Summer Camp</label> <br>
						<input type="checkbox" name="clubs[]" value="Hebrew Bible Study"><lable> Hebrew Bible Study</label> <br>
						<input type="checkbox" name="clubs[]" value="Building Fund"><lable> Building Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Choir & Band"><lable> Choir & Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Festivals"><lable> Festivals</label> <br>
						<input type="checkbox" name="clubs[]" value="Synagogue Fund"><lable> Synagogue Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><lable> Projection, Audio, Video</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><lable> Tablets, Laptops & PCs</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				<br>
				<div class="groupsection">
					<span id="">Mission Trips</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="All Missions"><lable> All Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="College Missions"><lable> College Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="Israel Mission"><lable> Israel Mission</label> <br>
						<input type="checkbox" name="clubs[]" value="Overseas Missions"><lable> Overseas Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth & Teen"><lable> Youth & Teen</label> <br><input type="hidden" name="orgtype" value="Judaism">
						<input type="hidden" name="grouptype" value="Jewish Reformed">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		
		
		case "Buddhism":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Select Buddhist Organization to Setup</h3></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><lable> Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Main Website"><lable> Main Website</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br><input type="hidden" name="orgtype" value="Other Faiths">
						<input type="hidden" name="grouptype" value="Buddhism">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		
		case "Hinduism":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Select Hindu Organization to Setup</h3></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><lable> Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Main Website"><lable> Main Website</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br><input type="hidden" name="orgtype" value="Other Faiths">
						<input type="hidden" name="grouptype" value="Hinduism">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		
		case "Islam":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Select Muslim Organization to Setup</h3></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><lable> Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Main Website"><lable> Main Website</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br><input type="hidden" name="orgtype" value="Other Faiths">
						<input type="hidden" name="grouptype" value="Islam">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		
		case "Other Faiths":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Select Other Faiths Organization to Setup</h3></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><lable> Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Main Website"><lable> Main Website</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br><input type="hidden" name="orgtype" value="Other Faiths">
						<input type="hidden" name="grouptype" value="Other Faiths">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		
		case "Local & National Organizations":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Select Local & National Organization to Setup</h3></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><lable> Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Jaycees"><lable> Jaycees</label> <br>
						<input type="checkbox" name="clubs[]" value="Junior League"><lable> Junior League</label> <br>
						<input type="checkbox" name="clubs[]" value="Kiwanis"><lable> Kiwanis</label> <br>
						<input type="checkbox" name="clubs[]" value="Knights of Columbus"><lable> Knights of Columbus</label> <br>
						<input type="checkbox" name="clubs[]" value="Lion&#39;s Club International (LCI)"><lable> Lion&#39;s Club International (LCI)</label> <br>
						<input type="checkbox" name="clubs[]" value="Masonic Service Association"><lable> Masonic Service Association</label> <br>
						<input type="checkbox" name="clubs[]" value="Optimist International"><lable> Optimist International</label> <br>
						<input type="checkbox" name="clubs[]" value="Rotary Club"><lable> Rotary Club</label> <br>
						<input type="checkbox" name="clubs[]" value="Shriners International"><lable> Shriners International</label> <br>
						<input type="checkbox" name="clubs[]" value="The American Legion"><lable> The American Legion</label> <br>
						<input type="checkbox" name="clubs[]" value="Veterans of Foreign Wars (VFW)"><lable> Veterans of Foreign Wars (VFW)</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br> <input type="hidden" name="orgtype" value="Local & National Organization">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Local & National Charities":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Select Local or National Charity to Setup</h3></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><lable> Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Alzheimer Foundation of America"><lable> Alzheimer Foundation of America (AFA)</label> <br>
						<input type="checkbox" name="clubs[]" value="American Cancer Society"><lable> American Cancer Society</label> <br>
						<input type="checkbox" name="clubs[]" value="American Diabetes Association"><lable> American Diabetes Association</label> <br>
						<input type="checkbox" name="clubs[]" value="American Heart Association"><lable> American Heart Association</label> <br>
						<input type="checkbox" name="clubs[]" value="American Red Cross"><lable> American Red Cross</label> <br>
						<input type="checkbox" name="clubs[]" value="Boys & Girls Clubs of America"><lable> Boys & Girls Clubs of America</label> <br>
						<input type="checkbox" name="clubs[]" value="Cancer Research Institute"><lable> Cancer Research Institute</label> <br>
						<input type="checkbox" name="clubs[]" value="Cerebral Palsy"><lable> Cerebral Palsy</label> <br>
						<input type="checkbox" name="clubs[]" value="Goodwill Industries International"><lable> Goodwill Industries International</label> <br>
						<input type="checkbox" name="clubs[]" value="Habitat for Humanity"><lable> Habitat for Humanity</label> <br>
						<input type="checkbox" name="clubs[]" value="Leukemia & Lymphoma Society"><lable> Leukemia & Lymphoma Society</label> <br>
						<input type="checkbox" name="clubs[]" value="Lymphoma Association"><lable> Lymphoma Association</label> <br>
						<input type="checkbox" name="clubs[]" value="Make-A-Wish Foundaion of America"><lable> Make-A-Wish Foundaion of America</label> <br>
						<input type="checkbox" name="clubs[]" value="March of Dimes"><lable> March of Dimes</label> <br>
						<input type="checkbox" name="clubs[]" value="Muscular Dystrophy Association (MDA)"><lable> Muscular Dystrophy Association (MDA)</label> <br>
						<input type="checkbox" name="clubs[]" value="Shriners International"><lable> Shriners International</label> <br>
						<input type="checkbox" name="clubs[]" value="Special Olympics"><lable> Special Olympics</label> <br>
						<input type="checkbox" name="clubs[]" value="St. Jude Childrens&#39;s Research Hospital"><lable> St. Jude Childrens&#39;s Research Hospital</label> <br>
						<input type="checkbox" name="clubs[]" value="Susan G. Komen"><lable> Susan G. Komen</label> <br>
						<input type="checkbox" name="clubs[]" value="The Salvation Army"><lable> The Salvation Army</label> <br>
						<input type="checkbox" name="clubs[]" value="The Simon Wiesenthal Foundation"><lable> The Simon Wiesenthal Foundation</label> <br>
						<input type="checkbox" name="clubs[]" value="United Way"><lable> United Way</label> <br>
						<input type="checkbox" name="clubs[]" value="Wounded Warrior Project"><lable> Wounded Warrior Project</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br><input type="hidden" name="orgtype" value="Local & National Organization">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Community Organization":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Select Community Organization to Setup</h3></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><lable> Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Animal Shelters"><lable> Animal Shelters<lable> </label> <br>
						<input type="checkbox" name="clubs[]" value="ASPCA"><lable> ASPCA</label> <br>
						<input type="checkbox" name="clubs[]" value="Community Food Bank"><lable> Community Food Bank</label> <br>
						<input type="checkbox" name="clubs[]" value="Fire Department"><lable> Fire Department</label> <br>
						<input type="checkbox" name="clubs[]" value="Local Food Shelves"><lable> Local Food Shelves</label> <br>
						<input type="checkbox" name="clubs[]" value="Local Homeless Shelters"><lable> Local Homeless Shelters</label> <br>
						<input type="checkbox" name="clubs[]" value="Local Womens Shelters"><lable> Local Women&#39;s Shelters</label> <br>
						<input type="checkbox" name="clubs[]" value="Police Department"><lable> Police Department</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Youth & Sports":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Select Youth & Sports to Setup</h3></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><lable> Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Athletic Associations"><lable> Athletic Associations</label> <br>
						<input type="checkbox" name="clubs[]" value="Big Brothers/Big Sisters of America"><lable> Big Brothers/Big Sisters of America</label> <br>
						<input type="checkbox" name="clubs[]" value="Boy Scouts"><lable> Boy Scouts</label> <br>
						<input type="checkbox" name="clubs[]" value="Girl Scouts"><lable> Girl Scouts</label> <br>
						<input type="checkbox" name="clubs[]" value="Summer Leagues"><lable> Summer Leagues</label> <br>
						<input type="checkbox" name="clubs[]" value="YMCA"><lable> YMCA</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Sports League":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Select Sports League to Setup</h3></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><lable> Select All</label>
			<br><br>
                                     <input type="hidden" name="grouptype" value="Sports League">
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Summer League"><lable> Summer League</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "General":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Select General Organization to Setup</h3></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><lable> Select All</label>
			<br><br>
<input type="hidden" name="grouptype" value="General">
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
					<input type="checkbox" name="clubs[]" value="Kiwanis">
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type<lable> General</label> <br><input type="hidden" name="orgtype" value="Local & National Organizations">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Kiwanis":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Kiwanis</h3></div>

			<input type="hidden" name="grouptype" value="Kiwanis">

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Kiwanis"><lable> Kiwanis</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						 <br><input type="hidden" name="orgtype" value="Local & National Organizations">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Jaycees":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Jaycees</h3></div>

			<input type="hidden" name="grouptype" value="Jaycees">

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Jaycees"><lable> Jaycees</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						 <br><input type="hidden" name="orgtype" value="Local & National Organizations">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Junior League":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Junior League </h3></div>

			 <input type="hidden" name="grouptype" value="Junior League">

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Junior League"><lable> Junior League</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						 <br><input type="hidden" name="orgtype" value="Local & National Organizations">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Knights of Columbus":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Knights of Columbus</h3></div>
                     <input type="hidden" name="grouptype" value="Knights of Columbus">
			
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Knights of Columbus"><lable> Knights of Columbus</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						<br><input type="hidden" name="orgtype" value="Local & National Organizations">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Lions Club International":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Lions Club International (LCI)</h3></div>
<input type="hidden" name="grouptype" value="Lions Club International">
			

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Lions Club International (LCI)"><lable> Lions Club International</label> <br> <input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type<br><input type="hidden" name="orgtype" value="Local & National Organizations">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Masonic Service Association":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Masonic Service Association</h3></div>
  
<input type="hidden" name="grouptype" value="Masonic Service Association">
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Masonic Service Association"><lable> Masonic Service Association</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						 <br><input type="hidden" name="orgtype" value="Local & National Organizations">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Optimist International":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Optimist International</h3></div>

			<input type="hidden" name="grouptype" value="Optimist International">

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Optimist International "><lable> Optimist International</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						<br><input type="hidden" name="orgtype" value="Local & National Organizations">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Rotary Club":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Rotary Club</h3></div>

      <input type="hidden" name="grouptype" value="Rotary Club">
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Rotary Club"><lable> Rotary Club</label> <br> <input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type<br><input type="hidden" name="orgtype" value="Local & National Organizations">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Shriners International":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Shriners International</h3></div>

		<input type="hidden" name="grouptype" value="Shriners International">

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Shriners International"><lable> Shriners International</label> <input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						 <br><input type="hidden" name="orgtype" value="Local & National Organizations">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "The American Legion":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>The American Legion</h3></div>
        <input type="hidden" name="grouptype" value="The American Legion">

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="The American Legion"><lable> The American Legion</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						 <br><input type="hidden" name="orgtype" value="Local & National Organizations">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Veterans of Foreign Wars":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Veterans of Foreign Wars (VFW)</h3></div>
                            <input type="hidden" name="grouptype" value="Veterans of Foreign Wars">

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Veterans of Foreign Wars "><lable> Veterans of Foreign Wars (VFW)</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						 <br><input type="hidden" name="orgtype" value="Local & National Organizations">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Alzheimer Foundation of America":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Alzheimer Foundation of America</h3></div>

		<input type="hidden" name="grouptype" value="Alzheimer Foundation of America">

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Alzheimer Foundation of America"><lable> Alzheimer Foundation of America</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						 <br><input type="hidden" name="orgtype" value="Local & National Charities">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "American Cancer Society":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>American Cancer Society</h3></div>


			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="American Cancer Society"><lable> American Cancer Society</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						<br><input type="hidden" name="orgtype" value="Local & National Charities"><input type="hidden" name="grouptype" value="American Cancer Society">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "American Diabetes Association":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>American Diabetes Association</h3></div>


			<div class="groupcolumns">
				<div class="groupsection">
			<div class="checkboxes">
<input type="checkbox" name="clubs[]" value="American Diabetes Association"><lable> American Diabetes Association</label> <br>
<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
	<input type="hidden" name="orgtype" value="Local & National Charities">
	<input type="hidden" name="grouptype" value="American Diabetes Association">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "American Heart Association":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>American Heart Association</h3></div>


			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="American Heart Association"><lable> American Heart Association</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						 <br><input type="hidden" name="orgtype" value="Local & National Charities">
				<input type="hidden" name="grouptype" value="American Heart Association">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "American Red Cross":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>American Red Cross</h3></div>

			
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="American Red Cross"><lable> American Red Cross</label><br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						
						<input type="hidden" name="orgtype" value="Local & National Charities"><input type="hidden" name="grouptype" value="American Red Cross">
				<input type="hidden" name="grouptype" value="American Red Cross">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Boys & Girls Club of America":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Boys & Girls Club of America</h3></div>

			

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Boys & Girls Club of America"><lable> Boys & Girls Club of America</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
	<input type="hidden" name="orgtype" value="Local & National Charities">
	<input type="hidden" name="grouptype" value="Boys & Girls Club of America">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Cancer Research Institute":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Cancer Research Institute</h3></div>

			

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Cancer Research Institute"><lable> Cancer Research Institute</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						 <br><input type="hidden" name="orgtype" value="Local & National Charities"><input type="hidden" name="grouptype" value="Cancer Research Institute">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Cerebral Palsy":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Cerebral Palsy</h3></div>

			
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Cerebral Palsy"><lable> Cerebral Palsy</label><br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						
						<input type="hidden" name="orgtype" value="Local & National Charities">
				<input type="hidden" name="grouptype" value="Cerebral Palsy">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		
		case "Goodwill Industries International":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Goodwill Industries International</h3></div>

		<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Goodwill Industries International"><lable> Goodwill Industries International</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						<br><input type="hidden" name="orgtype" value="Local & National Charities"><input type="hidden" name="grouptype" value="Goodwill Industries International">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Leukemia & Lymphoma Society":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Leukemia & Lymphoma Society</h3></div><div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Leukemia & Lymphoma Society"><lable> Leukemia & Lymphoma Society</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						 <br><input type="hidden" name="orgtype" value="Local & National Charities"><input type="hidden" name="grouptype" value="Leukemia & Lymphoma Society">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Habitat for Humanity":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Habitat for Humanity</h3></div>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Habitat for Humanity"><lable> Habitat for Humanity</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						 <br><input type="hidden" name="orgtype" value="Local & National Charities"><input type="hidden" name="grouptype" value="Habitat for Humanity">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Make-A-Wish Foundation of America":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Make-A-Wish Foundation of America</h3></div>

			

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Make-A-Wish Foundation of America"><lable> Make-A-Wish Foundation of America</label> 
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						<br><input type="hidden" name="orgtype" value="Local & National Charities"><input type="hidden" name="grouptype" value="Make-A-Wish Foundation of America">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "March of Dimes":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>March of Dimes</h3></div>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="March of Dimes"><lable> March of Dimes</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type <input type="hidden" name="orgtype" value="Local & National Charities">
						<input type="hidden" name="grouptype" value="March of Dimes">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Muscular Dystrophy Association":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Muscular Dystrophy Association</h3></div>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Muscular Dystrophy Association"><lable> Muscular Dystrophy Association</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						 <br><input type="hidden" name="orgtype" value="Local & National Charities"><input type="hidden" name="grouptype" value="Muscular Dystrophy Association">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Special Olympics":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Special Olympics</h3></div>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Special Olympics"><lable> Special Olympics</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						 <br><input type="hidden" name="orgtype" value="Local & National Charities"><input type="hidden" name="grouptype" value="Special Olympics">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "St. Jude Chidrens Research Hospital":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>St. Jude Chidrens Research Hospital</h3></div>

			
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="St. Jude Chidrens Research Hospital"><lable> St. Jude Chidrens Research Hospital</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						 <br><input type="hidden" name="orgtype" value="Local & National Charities"><input type="hidden" name="grouptype" value="St. Jude Chidrens Research Hospital">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "St. Jude Chidrens Research Hospital":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>St. Jude Chidrens Research Hospital</h3></div>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="St. Jude Chidrens Research Hospital"><lable> St. Jude Chidrens Research Hospital</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						 <br><input type="hidden" name="orgtype" value="Local & National Charities"><input type="hidden" name="grouptype" value="St. Jude Chidrens Research Hospital">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		
		case "Susan G. Komen":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Susan G. Komen</h3></div>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Susan G. Komen"><lable> Susan G. Komen</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						 <br><input type="hidden" name="orgtype" value="Local & National Charities"><input type="hidden" name="grouptype" value="Susan G. Komen">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Susan G. Komen":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Susan G. Komen</h3></div>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Susan G. Komen"><lable> Susan G. Komen</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						 <br><input type="hidden" name="orgtype" value="Local & National Charities"><input type="hidden" name="grouptype" value="Susan G. Komen">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "The Salvation Army":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>The Salvation Army</h3></div>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="The Salvation Army"><lable> The Salvation Army</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						 <br><input type="hidden" name="orgtype" value="Local & National Charities"><input type="hidden" name="grouptype" value="The Salvation Army">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "The Simon Wiesenthal Foundation":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>The Simon Wiesenthal Foundation</h3></div>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="The Simon Wiesenthal Foundation"><lable> The Simon Wiesenthal Foundation</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						 <br><input type="hidden" name="orgtype" value="Local & National Charities"><input type="hidden" name="grouptype" value="The Simon Wiesenthal Foundation">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "United Way":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>United Way</h3></div>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="United Way"><lable> United Way</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						 <br><input type="hidden" name="orgtype" value="Local & National Charities"><input type="hidden" name="grouptype" value="United Way">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Wounded Warrior Project":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Wounded Warrior Project</h3></div>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Wounded Warrior Project"><lable> Wounded Warrior Project</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						 <br><input type="hidden" name="orgtype" value="Local & National Charities"><input type="hidden" name="grouptype" value="Wounded Warrior Project">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Animal Shelters":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Animal Shelters</h3></div>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Animal Shelters"><lable> Animal Shelters</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						 <br><input type="hidden" name="orgtype" value="Community Organizations"><input type="hidden" name="grouptype" value="Animal Shelters">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "ASPCA":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>ASPCA</h3></div>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="ASPCA"><lable> ASPCA</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						 <br><input type="hidden" name="orgtype" value="Community Organizations"><input type="hidden" name="grouptype" value="ASPCA">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Community Food Bank":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Community Food Bank</h3></div>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Community Food Bank"><lable> Community Food Bank</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						 <br><input type="hidden" name="orgtype" value="Community Organizations"><input type="hidden" name="grouptype" value="Community Food Bank">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Fire Department":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Fire Deparment</h3></div>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Fire Department"><lable> Fire Department</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other">
						 <br><input type="hidden" name="orgtype" value="Community Organizations"><input type="hidden" name="grouptype" value="Fire Department">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Police Department":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Police Department</h3></div>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Police Deparment"><lable> Police Department</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other">
						 <br><input type="hidden" name="orgtype" value="Community Organizations"><input type="hidden" name="grouptype" value="Police Department">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Local Food Shelves":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Local Food Shelves</h3></div>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Local Food Shelves"><lable> Local Food Shelves</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other">
						 <br><input type="hidden" name="orgtype" value="Community Organizations"><input type="hidden" name="grouptype" value="Local Food Shelves">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Local Homeless Shelters":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Local Homeless Shelters</h3></div>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Local Homeless Shelters"><lable> Local Homeless Shelters</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other">
						 <br><input type="hidden" name="orgtype" value="Community Organizations"><input type="hidden" name="grouptype" value="Local Homeless Shelters">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Local Womens Shelters":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Local Womens Shelters</h3></div>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Local Womens Shelters"><lable> Local Womens Shelters</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other">
						 <br><input type="hidden" name="orgtype" value="Community Organizations"><input type="hidden" name="grouptype" value="Local Womens Shelters">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Athletic Associations":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Athletic Associations</h3></div>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Athletic Associations"><lable> Athletic Associations</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other">
						 <br><input type="hidden" name="orgtype" value="Youth & Sports">
						 <input type="hidden" name="grouptype" value="Athletic Associations">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Big Brother/Big Sisters of America":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Big Brother/Big Sisters of America</h3></div>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Big Brother/Big Sisters of America"><lable> Big Brother/Big Sisters of America</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other">
						 <br><input type="hidden" name="orgtype" value="Youth & Sports">
						 <input type="hidden" name="grouptype" value="Big Brother/Big Sisters of America">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Cub Scouts":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Cub Scouts</h3></div>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Cub Scouts"><lable> Cub Scouts</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						 <br><input type="hidden" name="orgtype" value="Youth & Sports">
						 <input type="hidden" name="grouptype" value="Cub Scouts">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Boy Scouts":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Boy Scouts</h3></div>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Boy Scouts"><lable> Boy Scouts</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						 <br><input type="hidden" name="orgtype" value="Youth & Sports">
						 <input type="hidden" name="grouptype" value="Boy Scouts">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Girl Scouts":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Girl Scouts</h3></div>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Girl Scouts"><lable> Girl Scouts</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other">
						 <br><input type="hidden" name="orgtype" value="Summer Leagues"><input type="hidden" name="grouptype" value="Girl Scouts">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Summer Leagues":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>Summer Leagues</h3></div>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Summer Leagues"><lable> Summer Leagues</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other">
						 <br><input type="hidden" name="orgtype" value="Summer Leagues">
						 <input type="hidden" name="grouptype" value="Summer Leagues">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "YMCA":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>YMCA</h3></div>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="YMCA"><lable> YMCA</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						 <br><input type="hidden" name="orgtype" value="Youth & Sports">
						 <input type="hidden" name="grouptype" value="YMCA">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "YWCA":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h3>YWCA</h3></div>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="YWCA"><lable> YWCA</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						 <br><input type="hidden" name="orgtype" value="Youth & Sports">
						 <input type="hidden" name="grouptype" value="YWCA">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
	}
?> 
</div>           
         <div class="interim-form">
			<div class="interim-header"><h3 style="margin-left:1px;">Contact Information</h3></div>
			<div class="row" style="margin-left:1px;">
				<span style="line-height:35px;" id="hd_frname"><?echo $fundtype;?>&nbsp;Name</span>
			</div> <!-- end row -->			
			<div class="row" style="margin-left:1px;">
				<input id="frname" type="text" name="frname" maxlength="40" required>
			</div> <!-- end row -->
		<!-- Physical Address -->
			<div class="row" style="margin-left:1px;">
			    <br>
			<span id="hd_address1">Address 1</span>
        			<span id="hd_address2">Address 2</span>
			</div> <!-- end row -->
			<div class="row" style="margin-left:1px;">
			    <br>
				<input id="address1" type="text" name="address1" maxlength="50" required>
        			<input id="address2" type="text" name="address2" maxlength="50">
			</div> <!-- end row -->
			
			<div class="row" style="margin-left:1px;">
			    <br>
				<span id="hd_city">City</span>
        			<span id="hd_state">State</span>
        			<span id="hd_zip">Zip</span>
			</div> <!-- end row -->
			<div class="row" style="margin-left:1px;">
				<input id="city" type="text" maxlength="30" name="city" required/>
        			<select id="state" name="state" required>
			                <option value="" selected="selected">--</option>
					<option value="AL">AL</option>
					<option value="AK">AK</option>
					<option value="AZ">AZ</option>
					<option value="AR">AR</option>
					<option value="CA">CA</option>
					<option value="CO">CO</option>
					<option value="CT">CT</option>
					<option value="DE">DE</option>
					<option value="FL">FL</option>
					<option value="GA">GA</option>
					<option value="HI">HI</option>
					<option value="ID">ID</option>
					<option value="IL">IL</option>
					<option value="IN">IN</option>
					<option value="IA">IA</option>
					<option value="KS">KS</option>
					<option value="KY">KY</option>
					<option value="LA">LA</option>
					<option value="ME">ME</option>
					<option value="MD">MD</option>
					<option value="MA">MA</option>
					<option value="MI">MI</option>
					<option value="MN">MN</option>
					<option value="MS">MS</option>
					<option value="MO">MO</option>
					<option value="MT">MT</option>
					<option value="NE">NE</option>
					<option value="NV">NV</option>
					<option value="NH">NH</option>
					<option value="NJ">NJ</option>
					<option value="NM">NM</option>
					<option value="NY">NY</option>
					<option value="NC">NC</option>
					<option value="ND">ND</option>
					<option value="OH">OH</option>
					<option value="OK">OK</option>
					<option value="OR">OR</option>
					<option value="PA">PA</option>
					<option value="RI">RI</option>
					<option value="SC">SC</option>
					<option value="SD">SD</option>
					<option value="TN">TN</option>
					<option value="TX">TX</option>
					<option value="UT">UT</option>
					<option value="VT">VT</option>
					<option value="VA">VA</option>
					<option value="WA">WA</option>
					<option value="WV">WV</option>
					<option value="WI">WI</option>
					<option value="WY">WY</option>
			        </select>
			        <input id="zip" name="zip" type="text" maxlength="5" required/>
					<!-- Physical Address End -->
			</div> <!-- end row -->
			<div class="row" style="margin-left:1px;">
				
        			<span style="line-height:35px;" id="hd_zip">Phone</span>
			</div> <!-- end row -->
			<div class="row" style="margin-left:1px;">
			<input type="text" name="phone" id="phone" value="" maxlength="14" />
			</div> <!-- end row -->
		</div> <!-- end interim-form -->
		<div class="interim-form">
			<div class="interim-header">
		<h3 style="margin-left:1px"><hr style="border-color:#b8b8b8;">Website</h3></div>
				<div class="row" style="margin-left:1px;">
					<span style="line-height:35px;" id="hd_url"><?php echo $fundtype; ?>'s<br>Existing Website URL</span>
				</div> <!-- end row -->
				<div class="row" style="margin-left:1px;">
					<input id="url" name="websiteURL" type="url" maxlength="250">&nbsp;&nbsp;include http://
				</div> <!-- end row -->
				
				<div class="row" style="margin-left:1px;">
					<span style="line-height:35px;" id="hd_banner"></span>
				</div> <!-- end row -->
				<div class="row" style="margin-left:5px;line-height:35px;">
				<h6><b>1.</b> <?echo $fundtype;?>'s Banner</h6>
					<input style="margin-left:1px;" id="AddOrgBannerPhoto" name="banner" type="file">
				</div> <!-- end row -->
				<div class="row" style="margin-left:1px;"> <!-- Leader bottom left pic -->
          		<!--<h6><b>2.</b> Main Fundraiser Leader Photo (optional)</h6>
          		<span style="line-height:35px;" id="">Upload Photo:</span><br>
          	        
          		<input id="" name="AddOrgLeaderPhoto" type="file">
          		<input id="" name="AddOrgLocationPhoto" type="file">
          		<br>
          		<br>
          		<input type="text" name="capt1" value="" placeholder="" > Caption Title
          		<br>
          		<br>
          		<input type="text" name="cap1" value="" placeholder="" > Caption-->
          	</div> <!-- end row -->
          	
          	<br>
          	
          	<div class="row" style="margin-left:1px;"> <!-- Member Leader bottom right pic -->
          		<!--<h6><b>3.</b> Student or Other Fundraiser Leader Photo (optional)</h6>
          		<span style="line-height:35px;" id="">Upload Photo:</span><br>
          	      
          		<input id="" name="AddOrgLocationPhoto" type="file">
          		<br>
          		<br>
          		<input type="text" name="capt2" value="" placeholder="" > Caption Title
          		<br>
          		<br>
          		<input type="text" name="cap2" value="" placeholder="" > Caption-->
          	</div> <!-- end row -->
          	
          	<br>
          	
          	<div class="row" style="margin-left:10px;"> <!-- Profile Pic in Left Nav -->
          		<!--<h6><b>4.</b> Location or General Photo (optional)</h6>
          		<span style="line-height:35px;" id="longtext">Upload Photo:</span><br>
          		
          		<input id="longtext" name="AddOrgGroupPhoto" type="file" title="Upload photo of the group/team fundraising">-->
          	</div> <!-- end row -->
          	
          	<br>
         
          	
          	<div class="row" style="margin-left:10px;"> <!-- Group/Collage in center of page -->
          	<!--<h6><b>5.</b>Fundraising Group Photo or Collage (optional)</h6>
          		<span style="line-height:35px;" id="longtext">Upload Photo:</span><br>
          	    	
          		<input id="longtext" name="collagePhoto" type="file" title="Upload new file to change current collage photo.">-->
          	</div>
		</div> <!-- end interim-form -->
	</div> <!-- end table -->
	<span style="line-height:35px;" id="error"></span>
        <input type="hidden" name="fundtype" value="<?php echo $fundtype; ?>" />
        <input type="hidden" name="setup_person" value="<?php echo $loginuser; ?>" />
        <input type="hidden" name="type" value="fundraiser" />
        <input type="hidden" name="validation"  id="validation" value="0" />
        <input style="margin-left:15px;" type="submit" name="submit" id="submit" class="redbutton" value="Create New Fundraiser" >
      </form>
      <br>
   </div>     
  </div>      
  </div> <!--end content-->
      <div class="clearfloat"></div>
    </div> <!--end container--> 
<br>
   <?php include 'footer.php' ; ?>

    
<script>
function validateGroupname(field)
{
	if (field == "") {return "No Group name was entered.\n"}
	return ""
}
function validateAddress1(field)
{
	if (field == "") {return "No Address1 was entered.\n"}
	return ""
}
function validateAddress2(field)
{
	if (field == "") {return "No Address2 was entered.\n"}
	return ""
}
function validateCity(field)
{
	if (field == "") {return "No city was entered.\n"}
	return ""
}
function validateState(field)
{
	if (field == "") {return "No state was selected.\n"}
	return ""
}
function validateZip(field)
{
	if (field == "") {return "No zip was entered.\n"}
	var zip = validateZipCode(field)
	if(!zip){return "Zip not entered correctly.\n"}
	return ""
}
function validateWebsiteURL(field)
{
	if (field == "") {return "No Website URL was entered.\n"}
	return ""
}
function validateClubs(field)
{
	if (field == "") {return "No clubs were chosen.\n"}
	return ""
}
function validateZipCode(elementValue){
    var zipCodePattern = /^\d{5}$|^\d{5}-\d{4}$/;
     return zipCodePattern.test(elementValue);
}

</script>
</body>
</html>
<?php
   ob_end_flush();
?>