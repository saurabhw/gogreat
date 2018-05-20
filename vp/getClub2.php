<?php
  session_start();
  $q = $_GET["q"];
  $z = $_GET["z"];
  $loginuser = $_SESSION['userId'];
  $con = mysqli_connect('localhost','amoodf5_ryan','nb]]mFg2ZU.n','amoodf5_gm2012');
  if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }
 include '../includes/connection.inc.php';
 include '../includes/functions.php';
 $link = connectTo();
    mysqli_select_db($con,"Dealers");
  //$q = mysqli_real_escape_string($link, $q);
  //$q = htmlspecialchars($q, ENT_QUOTES);
  $r = addslashes($q);
  $sql = "SELECT * FROM Dealers WHERE Dealer = '$r'  AND Zip = '$z'";
  $result = mysqli_query($con,$sql)or  die('Could not get Dealer info: ' . mysqli_error($con));	
      
  $getGroup = "SELECT * FROM Dealers WHERE Dealer = '$r' AND Zip = '$z'";
  $groupResult = mysqli_query($con, $getGroup) or  die('Could not get group info: ' . mysqli_error($con));
  $gRow = mysqli_fetch_assoc($groupResult);
  $groupCity = $gRow['City'];
  $groupState = $gRow['State'];
  $groupAddress = $gRow['Address1'];
  $gt = $gRow['orgtype'];
  $ct = $gRow['clubType'];

	echo '<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h3 style="display: inline;">'.$q.' '.$groupAddress.' '.$groupCity.' '.$groupState.' '.$z.' '.$groupType.'</h3><br><br>'; 
	
	if($gt == "Christian Faiths" || $gt == "Judaism" || $gt == "Other Faiths" || $gt == "Local & National Organizations" || $gt == "Local & National Charities" ||
	$gt == "Community Organizations" || $gt == "Youth & Sports")
	{
    	$gt = $ct;
	}
	else
	{
	  $gt = $gt;
	}
	 echo '<div id="border">';
	 switch($gt) {
                case "College":
		echo'<div class="interim-form"> 
			<div class="interim-header"><h2>Select College Groups to Setup</h2></div>
                                       <form action="addClub.php" method="Post" name="" onsubmit="myFunction()">
			<input type="checkbox" name="all" onClick="toggle(this)">&nbsp;<label>Select All Groups</label>
			<br><br>
			<div class="groupcolumns">
				<div class="groupsection">
					<span id="">Clubs & Organizations</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="4-H">&nbsp;<label>4-H</label> <br>
						<input type="checkbox" name="clubs[]" value="Alumni Association">&nbsp;<label>Alumni Association</label> <br>
						<input type="checkbox" name="clubs[]" value="Band">&nbsp;<label>Band</label> <br>
						<input type="checkbox" name="clubs[]" value="BPA">&nbsp;<label>BPA</label> <br>
						<input type="checkbox" name="clubs[]" value="Chess Club">&nbsp;<label>Chess Club</label> <br>
						<input type="checkbox" name="clubs[]" value="Choir">&nbsp;<label>Choir</label> <br>
						<input type="checkbox" name="clubs[]" value="Debate">&nbsp;<label>Debate</label> <br>
						<input type="checkbox" name="clubs[]" value="DECA">&nbsp;<label>DECA</label> <br>
						<input type="checkbox" name="clubs[]" value="Drumline">&nbsp;<label>Drumline</label> <br>
						<input type="checkbox" name="clubs[]" value="FBLA">&nbsp;<label>FBLA</label> <br>
						<input type="checkbox" name="clubs[]" value="FFA">&nbsp;<label>FFA</label> <br>
						<input type="checkbox" name="clubs[]" value="Greeks">&nbsp;<label>Greeks</label> <br>
						<input type="checkbox" name="clubs[]" value="Jazz Band">&nbsp;<label>Jazz Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Key Club">&nbsp;<label>Key Club</label> <br>
						<input type="checkbox" name="clubs[]" value="Language Club">&nbsp;<label>Language Club</label> <br>
						<input type="checkbox" name="clubs[]" value="Math Club">&nbsp;<label>Math Club</label> <br>
						<input type="checkbox" name="clubs[]" value="National Honor Society">&nbsp;<label>National Honor Society</label> <br>
						<input type="checkbox" name="clubs[]" value="Orchestra">&nbsp;<label>Orchestra</label> <br>
						<input type="checkbox" name="clubs[]" value="Robotics & Technology">&nbsp;<label>Robotics & Technology</label> <br>
						<input type="checkbox" name="clubs[]" value="ROTC">&nbsp;<label>ROTC</label> <br>
						<input type="checkbox" name="clubs[]" value="Science Club">&nbsp;<label>Science Club</label> <br>
						<input type="checkbox" name="clubs[]" value="Scripture Study">&nbsp;<label>Scripture Study</label> <br>
						<input type="checkbox" name="clubs[]" value="Student Council">&nbsp;<label>Student Council</label> <br>
						<input type="checkbox" name="clubs1[]" value="Theatre & Drama">&nbsp;<label>Theatre & Drama</label> <br><input type="text" class="group" name="clubs1" id="clubs1" value="" placeholder="Please type in the club" title="Other"><br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection">
					<span id="">General</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="general[]" value="Athletic Equipment">&nbsp;<label>Athletic Equipment</label> <br>
						<input type="checkbox" name="general[]" value="Field Trips & Travel">&nbsp;<label>Field Trips & Travel</label> <br>
						<input type="checkbox" name="general[]" value="Library & Technology">&nbsp;<label>Library & Technology</label> <br>
						<input type="checkbox" name="general[]" value="Projection, Audio, Video">&nbsp;<label>Projection, Audio, Video</label> <br>
						<input type="checkbox" name="general[]" value="Tablets, Laptops & PCs">&nbsp;<label>Tablets, Laptops & PCs</label> <br>
						<input type="text" class="group" name="general1" id="general1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				
				<br>
				
				<div class="groupsection2">
					<span id="">Athletics</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="athletics[]" value="Archery">&nbsp;<label>Archery</label> <br>
						<input type="checkbox" name="athletics[]" value="Badminton">&nbsp;<label>Badminton</label> <br>
						<input type="checkbox" name="athletics[]" value="Baseball">&nbsp;<label>Baseball</label> <br>
						<input type="checkbox" name="athletics[]" value="Basketball, Boys">&nbsp;<label>Basketball, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Basketball, Girls">&nbsp;<label>Basketball, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Bowling, Boys">&nbsp;<label>Bowling, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Bowling, Girls">&nbsp;<label>Bowling, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="CC Running, Boys">&nbsp;<label>CC Running, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="CC Running, Girls">&nbsp;<label>CC Running, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="CC Skiing, Boys">&nbsp;<label>CC Skiing, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="CC Skiing, Girls">&nbsp;<label>CC Skiing, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Cheerleading">&nbsp;<label>Cheerleading</label> <br>
						<input type="checkbox" name="athletics[]" value="Cycling">&nbsp;<label>Cycling</label> <br>
						<input type="checkbox" name="athletics[]" value="Danceline">&nbsp;<label>Danceline</label> <br>
						<input type="checkbox" name="athletics[]" value="Diving, Boys">&nbsp;<label>Diving, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Diving, Girls">&nbsp;<label>Diving, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Field  Hockey">&nbsp;<label>Field  Hockey</label> <br>
						<input type="checkbox" name="athletics[]" value="Figure Skating">&nbsp;<label>Figure Skating</label> <br>
						<input type="checkbox" name="athletics[]" value="Football">&nbsp;<label>Football</label> <br>
						<input type="checkbox" name="athletics[]" value="Golf, Boys">&nbsp;<label>Golf, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Golf, Girls">&nbsp;<label>Golf, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Gymnastics, Boys">&nbsp;<label>Gymnastics, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Gymnastics, Girls">&nbsp;<label>Gymnastics, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Ice Hockey, Boys">&nbsp;<label>Ice Hockey, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Ice Hockey, Girls">&nbsp;<label>Ice Hockey, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Lacrosse, Boys">&nbsp;<label>Lacrosse, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Lacrosse, Girls">&nbsp;<label>Lacrosse, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Mountaineering">&nbsp;<label>Mountaineering</label> <br>
						<input type="checkbox" name="athletics[]" value="Power Lifting">&nbsp;<label>Power Lifting</label> <br>
						<input type="checkbox" name="athletics[]" value="Racquetball">&nbsp;<label>Racquetball</label> <br>
						<input type="checkbox" name="athletics[]" value="Rodeo">&nbsp;<label>Rodeo</label> <br>
						<input type="checkbox" name="athletics[]" value="Rowing, Boys">&nbsp;<label>Rowing, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Rowing, Girls">&nbsp;<label>Rowing, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Rugby, Boys">&nbsp;<label>Rugby, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Rugby, Girls">&nbsp;<label>Rugby, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Sailing">&nbsp;<label>Sailing</label> <br>
						<input type="checkbox" name="athletics[]" value="Ski & Snowboard, Boys">&nbsp;<label>Ski & Snowboard, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Ski & Snowboard, Girls">&nbsp;<label>Ski & Snowboard, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Soccer, Boys">&nbsp;<label>Soccer, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Soccer, Girls">&nbsp;<label>Soccer, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Softball">&nbsp;<label>Softball</label> <br>
						<input type="checkbox" name="athletics[]" value="Swimming, Boys">&nbsp;<label>Swimming, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Swimming, Girls">&nbsp;<label>Swimming, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Synchronized Swimming">&nbsp;<label>Synchronized Swimming</label> <br>
						<input type="checkbox" name="athletics[]" value="Table Tennis">&nbsp;<label>Table Tennis</label> <br>
						<input type="checkbox" name="athletics[]" value="Tennis, Boys">&nbsp;<label>Tennis, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Tennis, Girls">&nbsp;<label>Tennis, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Track & Field, Boys">&nbsp;<label>Track & Field, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Track & Field, Girls">&nbsp;<label>Track & Field, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Ultimate Frisbee, Boys">&nbsp;<label>Ultimate Frisbee, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Ultimate Frisbee, Girls">&nbsp;<label>Ultimate Frisbee, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Volleyball, Boys">&nbsp;<label>Volleyball, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Volleyball, Girls">&nbsp;<label>Volleyball, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Water Polo">&nbsp;<label>Water Polo</label> <br>
						<input type="checkbox" name="athletics[]" value="Wrestling">&nbsp;<label>Wrestling</label> <br>
						<input type="text" class="group" name="athletics1" id="athletics1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "High School":
		echo'<div class="interim-form"> 
		<div class="interim-header"><h2>Select High School Groups to Setup</h2></div>

		<input type="checkbox" name="all" onClick="toggle(this)">&nbsp;<label>Select All Groups</label>
		<br><br>
		<div class="groupcolumns">
			<div class="groupsection">
				<span id="">Clubs & Organizations</span><br>
				<div class="checkboxes">
					<input type="checkbox" name="clubs[]" value="4-H">&nbsp;<label>4-H</label> <br>
					<input type="checkbox" name="clubs[]" value="Band">&nbsp;<label>Band</label> <br>
					<input type="checkbox" name="clubs[]" value="Booster Club">&nbsp;<label>Booster Club</label> <br>
					<input type="checkbox" name="clubs[]" value="BPA">&nbsp;<label>BPA</label> <br>
					<input type="checkbox" name="clubs[]" value="Chess Club">&nbsp;<label>Chess Club</label> <br>
					<input type="checkbox" name="clubs[]" value="Choir">&nbsp;<label>Choir</label> <br>
					<input type="checkbox" name="clubs[]" value="Debate">&nbsp;<label>Debate</label> <br>
					<input type="checkbox" name="clubs[]" value="DECA">&nbsp;<label>DECA</label> <br>
					<input type="checkbox" name="clubs[]" value="FBLA">&nbsp;<label>FBLA</label> <br>
					<input type="checkbox" name="clubs[]" value="FFA">&nbsp;<label>FFA</label> <br>
					<input type="checkbox" name="clubs[]" value="Jazz Band">&nbsp;<label>Jazz Band</label> <br>
					<input type="checkbox" name="clubs[]" value="JROTC">&nbsp;<label>JROTC</label> <br>
					<input type="checkbox" name="clubs[]" value="Key Club">&nbsp;<label>Key Club</label> <br>
					<input type="checkbox" name="clubs[]" value="Language Club">&nbsp;<label>Language Club</label> <br>
					<input type="checkbox" name="clubs[]" value="Math Club">&nbsp;<label>Math Club</label> <br>
					<input type="checkbox" name="clubs[]" value="National Honor Society">&nbsp;<label>National Honor Society</label> <br>
					<input type="checkbox" name="clubs[]" value="Orchestra">&nbsp;<label>Orchestra</label> <br>
					<input type="checkbox" name="clubs[]" value="PTA/PTO">&nbsp;<label>PTA/PTO/PTC</label> <br>
					<input type="checkbox" name="clubs[]" value="Robotics & Technology">&nbsp;<label>Robotics & Technology</label> <br>
					<input type="checkbox" name="clubs[]" value="Science Club">&nbsp;<label>Science Club</label> <br>
					<input type="checkbox" name="clubs[]" value="Scripture Study">&nbsp;<label>Scripture Study</label> <br>
					<input type="checkbox" name="clubs[]" value="Student Council">&nbsp;<label>Student Council</label> <br>
					<input type="checkbox" name="clubs[]" value="Theatre & Drama">&nbsp;<label>Theatre & Drama</label> <br>
					<input type="checkbox" name="clubs[]" value="Yearbook">&nbsp;<label>Yearbook</label> <br>
					<input type="text" class="group" name="clubs1" id="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
				</div> <!-- end checkboxes -->
			</div> <!-- end groupsection -->
		
				<br>
				
				<div class="groupsection">
					<span id="">General</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="general[]" value="General">&nbsp;<label>General</label> <br>
						<input type="checkbox" name="general[]" value="Graduation">&nbsp;<label>Graduation</label> <br>
						<input type="checkbox" name="general[]" value="Senior Class">&nbsp;<label>Senior Class</label> <br>
						<input type="checkbox" name="general[]" value="Junior Class">&nbsp;<label>Junior Class</label> <br>
						<input type="checkbox" name="general[]" value="Sophmore Class">&nbsp;<label>Sophmore Class</label> <br>
						<input type="checkbox" name="general[]" value="Freshman Class">&nbsp;<label>Freshman Class</label> <br>
						<input type="checkbox" name="general[]" value="Athletic Equipment">&nbsp;<label>Athletic Equipment</label> <br>
						<input type="checkbox" name="general[]" value="Field Trips & Travel">&nbsp;<label>Field Trips & Travel</label> <br>
						<input type="checkbox" name="general[]" value="Library & Technology">&nbsp;<label>Library & Technology</label> <br>
						<input type="checkbox" name="general[]" value="Playground Equipment">&nbsp;<label>Playground Equipment</label> <br>
						<input type="checkbox" name="general[]" value="Projection, Audio, Video">&nbsp;<label>Projection, Audio, Video</label> <br>
						<input type="checkbox" name="general[]" value="Tablets, Laptops & PCs">&nbsp;<label>Tablets, Laptops & PCs</label> <br>
						<input type="text" class="group" name="general1" id="general1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				
				<br>
				
				<div class="groupsection2">
					<span id="">Athletics</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="athletics[]" value="Archery">&nbsp;<label>Archery</label> <br>
						<input type="checkbox" name="athletics[]" value="Badminton">&nbsp;<label>Badminton</label> <br>
						<input type="checkbox" name="athletics[]" value="Baseball">&nbsp;<label>Baseball</label> <br>
						<input type="checkbox" name="athletics[]" value="Basketball, Boys">&nbsp;<label>Basketball, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Basketball, Girls">&nbsp;<label>Basketball, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Bowling, Boys">&nbsp;<label>Bowling, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Bowling, Girls">&nbsp;<label>Bowling, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="CC Running, Boys">&nbsp;<label>CC Running, Boys</label><br>
						<input type="checkbox" name="athletics[]" value="CC Running, Girls">&nbsp;<label>CC Running, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="CC Skiing, Boys">&nbsp;<label>CC Skiing, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="CC Skiing, Girls">&nbsp;<label>CC Skiing, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Cheerleading">&nbsp;<label>Cheerleading</label> <br>
						<input type="checkbox" name="athletics[]" value="Cycling">&nbsp;<label>Cycling</label> <br>
						<input type="checkbox" name="athletics[]" value="Danceline">&nbsp;<label>Danceline</label> <br>
						<input type="checkbox" name="athletics[]" value="Diving, Boys">&nbsp;<label>Diving, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Diving, Girls">&nbsp;<label>Diving, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Field Hockey">&nbsp;<label>Field Hockey</label> <br>
						<input type="checkbox" name="athletics[]" value="Figure Skating">&nbsp;<label>Figure Skating</label> <br>
						<input type="checkbox" name="athletics[]" value="Football">&nbsp;<label>Football</label> <br>
						<input type="checkbox" name="athletics[]"value="Golf, Boys">&nbsp;<label>Golf, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Golf, Girls">&nbsp;<label>Golf, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Gymnastics, Boys">&nbsp;<label>Gymnastics, Boys</label> <br>
						<input type="checkbox" name="athletics[]"value="Gymnastics, Girls">&nbsp;<label>Gymnastics, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Ice Hockey">&nbsp;<label>Ice Hockey, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Ice Hockey">&nbsp;<label>Ice Hockey, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Lacrosse, Boys">&nbsp;<label>Lacrosse, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Lacrosse, Girls">&nbsp;<label>Lacrosse, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Mountaineering">&nbsp;<label>Mountaineering</label> <br>
						<input type="checkbox" name="athletics[]" value="Power Lifting">&nbsp;<label>Power Lifting</label> <br>
						<input type="checkbox" name="athletics[]" value="Racquetball">&nbsp;<label>Racquetball</label> <br>
						<input type="checkbox" name="athletics[]" value="Rodeo">&nbsp;<label>Rodeo</label> <br>
						<input type="checkbox" name="athletics[]" value="Rowing, Boys">&nbsp;<label>Rowing, Boys</label> <br>
						<input type="checkbox" name="athletics[]"value="Rowing, Girls">&nbsp;<label>Rowing, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Rugby, Boys">&nbsp;<label>Rugby, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Rugby, Girls">&nbsp;<label>Rugby, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Sailing">&nbsp;<label>Sailing</label> <br>
						<input type="checkbox" name="athletics[]" value="Ski & Snowboard, Boys">&nbsp;<label>Ski & Snowboard, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Ski & Snowboard, Girls">&nbsp;<label>Ski & Snowboard, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Soccer, Boys">&nbsp;<label>Soccer, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Soccer, Girls">&nbsp;<label>Soccer, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Softball">&nbsp;<label>Softball</label> <br>
						<input type="checkbox" name="athletics[]" value="Swimming, Boys">&nbsp;<label>Swimming, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Swimming, Girls">&nbsp;<label>Swimming, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Table Tennis">&nbsp;<label>Table Tennis</label> <br>
						<input type="checkbox" name="athletics[]" value="Tennis, Boys">&nbsp;<label>Tennis, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Tennis, Girls">&nbsp;<label>Tennis, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Track & Field, Boys">&nbsp;<label>Track & Field, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Track & Field, Girls">&nbsp;<label>Track & Field, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Ultimate Frisbee, Boys">&nbsp;<label>Ultimate Frisbee, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Ultimate Frisbee, Girls">&nbsp;<label>Ultimate Frisbee, Girls</label> <br>
						<input type="checkbox" name="athletics[]"value="Volleyball, Boys">&nbsp;<label>Volleyball, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Volleyball, Girls">&nbsp;<label>Volleyball, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Water Polo">&nbsp;<label>Water Polo</label> <br>
						<input type="checkbox" name="athletics[]" value="Wrestling">&nbsp;<label>Wrestling</label> <br>
						<input type="text" class="group" name="athletics1" id="athletics1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Middle School":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Middle School Groups to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)">&nbsp;<label>Select All Groups</label>

			<br><br>
			<div class="groupcolumns">
				<div class="groupsection">
					<span>Clubs & Organizations:</span>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="4-H">&nbsp;<label>4-H</label> <br>
						<input type="checkbox" name="clubs[]" value="Band">&nbsp;<label>Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Booster Club">&nbsp;<label>Booster Club</label> <br>
						<input type="checkbox" name="clubs[]" value="BPA">&nbsp;<label>BPA</label> <br>
						<input type="checkbox" name="clubs[]" value="Chess Club">&nbsp;<label>Chess Club</label> <br>
						<input type="checkbox" name="clubs[]" value="Choir">&nbsp;<label>Choir</label> <br>
						<input type="checkbox" name="clubs[]" value="Debate">&nbsp;<label>Debate</label> <br>
						<input type="checkbox" name="clubs[]" value="FFA">&nbsp;<label>FFA</label> <br>
						<input type="checkbox" name="clubs[]" value="Jazz Band">&nbsp;<label>Jazz Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Language Club">&nbsp;<label>Language Club</label> <br>
						<input type="checkbox" name="clubs[]" value="Math Club">&nbsp;<label>Math Club</label> <br>
						<input type="checkbox" name="clubs[]" value="National Honor Society">&nbsp;<label>National Honor Society</label> <br>
						<input type="checkbox" name="clubs[]" value="Orchestra">&nbsp;<label>Orchestra</label> <br>
						<input type="checkbox" name="clubs[]" value="PTA/PTO/PTC">&nbsp;<label>PTA/PTO/PTC</label> <br>
						<input type="checkbox" name="clubs[]" value="Band">&nbsp;<label>Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Science Club">&nbsp;<label>Science Club</label> <br>
						<input type="checkbox" name="clubs[]" value="Band">&nbsp;<label>Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Scripture Study">&nbsp;<label>Scripture Study</label> <br>
						<input type="checkbox" name="clubs[]" value="Student Council">&nbsp;<label>Student Council</label> <br>
						<input type="checkbox" name="clubs[]" value="Theatre & Drama">&nbsp;<label>Theatre & Drama</label> <br>
						<input type="checkbox" name="clubs[]" value="Yearbook">&nbsp;<label>Yearbook</label> <br>
						<input type="text" class="group" name="clubs[]" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection">
					<span id="">General</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="general[]" value="General">&nbsp;<label>General</label> <br>
						<input type="checkbox" name="general[]" value="After-School Program">&nbsp;<label>After-School Program</label> <br>
						<input type="checkbox" name="general[]" value="Athletic Equipment">&nbsp;<label>Athletic Equipment</label> <br>
						<input type="checkbox" name="general[]" value="Field Trips & Travel">&nbsp;<label>Field Trips & Travel</label> <br>
						<input type="checkbox" name="general[]" value="Library & Technology">&nbsp;<label>Library & Technology</label> <br>
						<input type="checkbox" name="general[]" value="Playground Equipment">&nbsp;<label>Playground Equipment</label> <br>
						<input type="checkbox" name="general[]" value="Projection, Audio, Video">&nbsp;<label>Projection, Audio, Video</label> <br>
						<input type="checkbox" name="general[]" value="Tablets, Laptops & PCs">&nbsp;<label>Tablets, Laptops & PCs</label> <br>
						<input type="text" class="group" name="general" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				
				<br>
				
				<div class="groupsection2">
					<span>Athletics:</span>
					<div class="checkboxes">
						<input type="checkbox" name="athletics[]" value="Archery">&nbsp;<label>Archery</label> <br>
						<input type="checkbox" name="athletics[]" value="Badminton">&nbsp;<label>Badminton</label> <br>
						<input type="checkbox" name="athletics[]" value="Baseball">&nbsp;<label>Baseball</label> <br>
						<input type="checkbox" name="athletics[]" value="Basketball, Boys">&nbsp;<label>Basketball, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Basketball, Girls">&nbsp;<label>Basketball, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Bowling">&nbsp;<label>Bowling</label> <br>
						<input type="checkbox" name="athletics[]" value="CC Running, Boys">&nbsp;<label>CC Running, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="CC Running, Girls">&nbsp;<label>CC Running, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="CC Skiing, Boys">&nbsp;<label>CC Skiing, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="CC Skiing, Girls">&nbsp;<label>CC Skiing, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Cheerleading">&nbsp;<label>Cheerleading</label> <br>
						<input type="checkbox" name="athletics[]" value="Cycling">&nbsp;<label>Cycling</label> <br>
						<input type="checkbox" name="athletics[]" value="Danceline">&nbsp;<label>Danceline</label> <br>
						<input type="checkbox" name="athletics[]" value="Diving, Boys">&nbsp;<label>Diving, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Diving, Girls">&nbsp;<label>Diving, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Field Hockey">&nbsp;<label>Field Hockey</label> <br>
						<input type="checkbox" name="athletics[]" value="Figure Skating">&nbsp;<label>Figure Skating</label> <br>
						<input type="checkbox" name="athletics[]" value="Football">&nbsp;<label>Football</label> <br>
						<input type="checkbox" name="athletics[]" value="Golf, Boys">&nbsp;<label>Golf, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Golf, Girls">&nbsp;<label>Golf, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Gymnastics, Boys">&nbsp;<label>Gymnastics, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Gymnastics, Girls">&nbsp;<label>Gymnastics, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Ice Hockey, Boys">&nbsp;<label>Ice Hockey, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Ice Hockey, Girls">&nbsp;<label>Ice Hockey, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Lacrosse, Boys">&nbsp;<label>Lacrosse, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Lacrosse, Girls">&nbsp;<label>Lacrosse, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Mountaineering">&nbsp;<label>Mountaineering</label> <br>
						<input type="checkbox" name="athletics[]" value="Racquetball">&nbsp;<label>Racquetball</label> <br>
						<input type="checkbox" name="athletics[]" value="Rodeo">&nbsp;<label>Rodeo</label> <br>
						<input type="checkbox" name="athletics[]" value="Rowing">&nbsp;<label>Rowing</label> <br>
						<input type="checkbox" name="athletics[]" value="Rugby, Boys">&nbsp;<label>Rugby, Boys</label> <br>
						<input type="checkbox" name="athletics[]"value="Rugby, Girls">&nbsp;<label>Rugby, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Sailing">&nbsp;<label>Sailing</label> <br>
						<input type="checkbox" name="athletics[]" value="Ski & Snowboard, Boys">&nbsp;<label>Ski & Snowboard, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Ski & Snowboard, Girls">&nbsp;<label>Ski & Snowboard, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Soccer, Boys">&nbsp;<label>Soccer, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Soccer, Girls">&nbsp;<label>Soccer, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Softball">&nbsp;<label>Softball</label> <br>
						<input type="checkbox" name="athletics[]" value="Swimming, Boys">&nbsp;<label>Swimming, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Swimming, Girls">&nbsp;<label>Swimming, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Table Tennis">&nbsp;<label>Table Tennis</label> <br>
						<input type="checkbox" name="athletics[]" value="Tennis, Boys">&nbsp;<label>Tennis, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Tennis, Girls">&nbsp;<label>Tennis, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Track & Field, Boys">&nbsp;<label>Track & Field, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Track & Field, Girls">&nbsp;<label>Track & Field, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Ultimate Frisbee, Boys">&nbsp;<label>Ultimate Frisbee, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Ultimate Frisbee, Girls">&nbsp;<label>Ultimate Frisbee, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Volleyball, Boys">&nbsp;<label>Volleyball, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Volleyball, Girls">&nbsp;<label>Volleyball, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Water Polo">&nbsp;<label>Water Polo</label> <br>
						<input type="checkbox" name="athletics[]" value="Wrestling">&nbsp;<label>Wrestling</label> <br>
				<input type="text" class="group" name="athletics1" id="athletics1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Elementary School":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Elementary School Groups to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)">&nbsp;<label>Select All</label>
			<br><br>
			<div class="groupcolumns">
				<div class="groupsection">
					<span>Clubs & Organizations:</span>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="4-H">&nbsp;<label>4-H</label> <br>
						<input type="checkbox" name="clubs[]" value="Art Club">&nbsp;<label>Art Club</label> <br>
						<input type="checkbox" name="clubs[]" value="Band">&nbsp;<label>Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Booster Club">&nbsp;<label>Booster Club</label> <br>
						<input type="checkbox" name="clubs[]" value="Carnival">&nbsp;<label>Carnival</label> <br>
						<input type="checkbox" name="clubs[]" value="Choir">&nbsp;<label>Choir</label> <br>
						<input type="checkbox" name="clubs[]" value="Math Club">&nbsp;<label>Math Club</label> <br>
						<input type="checkbox" name="clubs[]" value="PTA/PTO/PTC">&nbsp;<label>PTA/PTO/PTC</label> <br>
						<input type="checkbox" name="clubs[]" value="Science Club">&nbsp;<label>Science Club</label> <br>
						<input type="checkbox" name="clubs[]" value="Theatre & Drama">&nbsp;<label>Theatre & Drama</label> <br>
						<input type="text" class="group" name="clubs[]" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection">
					<span>General Needs:</span>
					<div class="checkboxes">
						<input type="checkbox" name="general[]" value="General">&nbsp;<label>General</label> <br>
						<input type="checkbox" name="general[]" value="After-School Program">&nbsp;<label>After-School Program</label> <br>
						<input type="checkbox" name="general[]" value="Athletic Equipment">&nbsp;<label>Athletic Equipment </label> <br>
						<input type="checkbox" name="general[]" value="Field Trips & Travel">&nbsp;<label>Field Trips & Travel </label> <br>
						<input type="checkbox" name="general[]" value="Library & Technology">&nbsp;<label>Library & Technology</label> <br>
						<input type="checkbox" name="general[]" value="Projection, Audio, Video">&nbsp;<label>Projection, Audio, Video</label> <br>
						<input type="checkbox" name="general[]" value="Tablets, Laptops & PCs">&nbsp;<label>Tablets, Laptops & PCs</label> <br>
						<input type="text" class="group" name="clubs[]" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				
				<br><br>
				
				<div class="groupsection2">		
					<span id="">Athletics</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="athletics[]" value="Baseball">&nbsp;<label>Baseball</label> <br>
						<input type="checkbox" name="athletics[]" value="Basketball, Boys">&nbsp;<label>Basketball, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Basketball, Girls">&nbsp;<label>Basketball, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Biking">&nbsp;<label>Biking</label> <br>
						<input type="checkbox" name="athletics[]" value="Football">&nbsp;<label>Football</label> <br>
						<input type="checkbox" name="athletics[]" value="Gymnastics, Boys">&nbsp;<label>Gymnastics, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Gymnastics, Girls">&nbsp;<label>Gymnastics, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Ice Hockey, Boys">&nbsp;<label>Ice Hockey, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Ice Hockey, Girls">&nbsp;<label>Ice Hockey, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Lacrosse, Boys">&nbsp;<label>Lacrosse, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Lacrosse, Girls">&nbsp;<label>Lacrosse, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Soccer, Boys">&nbsp;<label>Soccer, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Soccer, Girls">&nbsp;<label>Soccer, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Softball">&nbsp;<label>Softball</label> <br>
						<input type="checkbox" name="athletics[]" value="Swimming, Boys">&nbsp;<label>Swimming, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Swimming, Girls">&nbsp;<label>Swimming, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="T-Ball">&nbsp;<label>T-Ball</label> <br>
						<input type="checkbox" name="athletics[]" value="Track & Field, Boys">&nbsp;<label>Track & Field, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Track & Field, Girls">&nbsp;<label>Track & Field, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Volleyball, Boys">&nbsp;<label>Volleyball, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Volleyball, Girls">&nbsp;<label>Volleyball, Girls</label> <br>
			<input type="text" class="group" name="athletics1" id="athletics1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Pre-School":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Pre-School Groups to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)">&nbsp;<label>Select All</label>
			<br><br>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Equipment & Supplies">&nbsp;<label>Equipment & Supplies</label> <br>
						<input type="checkbox" name="clubs[]" value="Field Trips & Travel">&nbsp;<label>Field Trips & Travel</label> <br>
						<input type="checkbox" name="clubs[]" value="Playground Equipment">&nbsp;<label>Playground Equipment</label> <br>
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video">&nbsp;<label>Projection, Audio, Video</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs">&nbsp;<label>Tablets, Laptops & PCs</label> <br>
						<input type="text" class="group" name="clubs1" id="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Home School":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Home School Groups to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)">&nbsp;<label>Select All</label>
			<br><br>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video">&nbsp;<label>Projection, Audio, Video</label> <br>
						<input type="text" class="group" name="clubs1" id="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Trade, Vocational & Tech":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Trade, Vocational & Tech Groups to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)">&nbsp;<label>Select All</label>
			<br><br>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Field Trips & Travel">&nbsp;<label>Field Trips & Travel</label> <br>
						<input type="checkbox" name="clubs[]" value="General Equipment">&nbsp;<label>General Equipment</label> <br>
						<input type="checkbox" name="clubs[]" value="Trade Supplies">&nbsp;<label>Trade Supplies</label> <br>
						<input type="text" class="group" name="clubs1" id="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Camps":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Camp Groups to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)">&nbsp;<label>Select All</label>
			<br><br>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Bible Camps">&nbsp;<label>Bible Camps</label> <br>
						<input type="checkbox" name="clubs[]" value="Dance Camps">&nbsp;<label>Dance Camps</label> <br>
						<input type="checkbox" name="clubs[]" value="Education Camps">&nbsp;<label>Education Camps</label> <br>
						<input type="checkbox" name="clubs[]" value="Family Camps">&nbsp;<label>Family Camps</label> <br>
						<input type="checkbox" name="clubs[]" value="General Camps">&nbsp;<label>General Camps</label> <br>
						<input type="checkbox" name="clubs[]" value="Music Camps">&nbsp;<label>Music Camps</label> <br>
						<input type="checkbox" name="clubs[]" value="Scouting Camps">&nbsp;<label>Scouting Camps</label> <br>
						<input type="checkbox" name="clubs[]" value="Sports Camps">&nbsp;<label>Sports Camps</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth Camps">&nbsp;<label>Youth Camps</label> <br>
						<input type="text" class="group" name="clubs1" id="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
         
		
		case "Religious Organization":
           echo '<div class="interim-form"> 
           <div class="interim-header"><h2>Select Religious Organization to Setup</h2></div>
           
           <input type="checkbox" name="all" onClick="toggle(this)">&nbsp;<label>Select All</label>
           <br><br>

		<div class="groupcolumns">
	            	<div class="groupsection">
	            		<div class="checkboxes">
					<input type="checkbox" name="clubs[]" value="Main Church Website">&nbsp;<label>Main Church Website</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Camp">&nbsp;<label>Bible Camp</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Study">&nbsp;<label>Bible Study</label> <br>
						<input type="checkbox" name="clubs[]" value="Building Fund">&nbsp;<label>Building Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Choir & Band">&nbsp;<label>Choir & Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Christmas Giving Tree">&nbsp;<label>Christmas Giving Tree</label> <br>
						<input type="checkbox" name="clubs[]" value="Faith Formation">&nbsp;<label>Faith Formation</label> <br>
						<input type="checkbox" name="clubs[]" value="Festivals">&nbsp;<label>Festivals</label> <br>
						<input type="checkbox" name="clubs[]" value="Men’s Ministry">&nbsp;<label>Men’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Outreach Ministry">&nbsp;<label>Outreach Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Parish Fund">&nbsp;<label>Parish Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video">&nbsp;<label>Projection, Audio, Video</label> <br>
						<input type="checkbox" name="clubs[]" value="Student Ministry">&nbsp;<label>Student Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Sunday School">&nbsp;<label>Sunday School</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs">&nbsp;<label>Tablets, Laptops & PCs</label> <br>
						<input type="checkbox" name="clubs[]" value="Women’s Ministry">&nbsp;<label>Women’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth’s Ministry">&nbsp;<label>Youth’s Ministry</label> <br>
					<input type="text" class="group" name="clubs1" id="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
				</div> <!-- end checkboxes -->
			</div> <!-- end groupsection -->
	
			<div class="groupsection">
				<span id="">Missionary Funds</span><br>
				<div class="checkboxes">
					<input type="checkbox" name="general[]" value="All Missions">&nbsp;<label>All Missions</label> <br>
					<input type="checkbox" name="general[]" value="College Missions">&nbsp;<label>College Missions</label> <br>
					<input type="checkbox" name="general[]" value="Overseas Missions">&nbsp;<label>Overseas Missions</label> <br>
					<input type="checkbox" name="general[]" value="Youth & Teen">&nbsp;<label>Youth & Teen</label> <br><input type="text" class="group" name="general1" id="general1" value="" placeholder="Please type in the club" title="Other"> <br>
				</div> <!-- end checkboxes -->
			</div> <!-- end groupsection -->
		</div> <!-- end groupcolumns -->
           </div> <!-- end interim-form -->';
           break;

	case "Faith Based Organization":
           echo '<div class="interim-form"> 
           <div class="interim-header"><h2>Select Faith Based Organization to Setup</h2></div>
           
           <input type="checkbox" name="all" onClick="toggle(this)">&nbsp;<label>Select All</label>
           <br><br>

			<div class="groupcolumns">
	            	<div class="groupsection">
	            		<div class="checkboxes">
					<input type="checkbox" name="clubs[]" value="Main Church Website">&nbsp;<label>Main Church Website</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Camp">&nbsp;<label>Bible Camp</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Study">&nbsp;<label>Bible Study</label> <br>
						<input type="checkbox" name="clubs[]" value="Building Fund">&nbsp;<label>Building Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Choir & Band">&nbsp;<label>Choir & Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Christmas Giving Tree">&nbsp;<label>Christmas Giving Tree</label> <br>
						<input type="checkbox" name="clubs[]" value="Faith Formation">&nbsp;<label>Faith Formation</label> <br>
						<input type="checkbox" name="clubs[]" value="Festivals">&nbsp;<label>Festivals</label> <br>
						<input type="checkbox" name="clubs[]" value="Men’s Ministry">&nbsp;<label>Men’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Outreach Ministry">&nbsp;<label>Outreach Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Parish Fund">&nbsp;<label>Parish Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video">&nbsp;<label>Projection, Audio, Video</label> <br>
						<input type="checkbox" name="clubs[]" value="Student Ministry">&nbsp;<label>Student Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Sunday School">&nbsp;<label>Sunday School</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs">&nbsp;<label>Tablets, Laptops & PCs</label> <br>
						<input type="checkbox" name="clubs[]" value="Women’s Ministry">&nbsp;<label>Women’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth’s Ministry">&nbsp;<label>Youth’s Ministry</label> <br>
					<input type="text" class="group" name="clubs1" id="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
				</div> <!-- end checkboxes -->
			</div> <!-- end groupsection -->
	
			<div class="groupsection">
				<span id="">Missionary Funds</span><br>
				<div class="checkboxes">
					<input type="checkbox" name="general[]" value="All Missions">&nbsp;<label>All Missions</label> <br>
					<input type="checkbox" name="general[]" value="College Missions">&nbsp;<label>College Missions</label> <br>
					<input type="checkbox" name="general[]" value="Overseas Missions">&nbsp;<label>Overseas Missions</label> <br>
					<input type="checkbox" name="general[]" value="Youth & Teen">&nbsp;<label>Youth & Teen</label> <br>
				</div> <!-- end checkboxes -->
			</div> <!-- end groupsection -->
		</div> <!-- end groupcolumns -->
           </div> <!-- end interim-form -->';
           break;	
	
	 
           case "Baptist":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Baptist Organization to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)">&nbsp;<label>Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Main Church Website">&nbsp;<label>Main Church Website</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Camp">&nbsp;<label>Bible Camp</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Study">&nbsp;<label>Bible Study</label> <br>
						<input type="checkbox" name="clubs[]" value="Building Fund">&nbsp;<label>Building Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Choir & Band">&nbsp;<label>Choir & Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Christmas Giving Tree">&nbsp;<label>Christmas Giving Tree</label> <br>
						<input type="checkbox" name="clubs[]" value="Faith Formation">&nbsp;<label>Faith Formation</label> <br>
						<input type="checkbox" name="clubs[]" value="Festivals">&nbsp;<label>Festivals</label> <br>
						<input type="checkbox" name="clubs[]" value="Men’s Ministry">&nbsp;<label>Men’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Outreach Ministry">&nbsp;<label>Outreach Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Parish Fund">&nbsp;<label>Parish Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video">&nbsp;<label>Projection, Audio, Video</label> <br>
						<input type="checkbox" name="clubs[]" value="Student Ministry">&nbsp;<label>Student Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Sunday School">&nbsp;<label>Sunday School</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs">&nbsp;<label>Tablets, Laptops & PCs</label> <br>
						<input type="checkbox" name="clubs[]" value="Women’s Ministry">&nbsp;<label>Women’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth’s Ministry">&nbsp;<label>Youth’s Ministry</label> <br>
						<input type="text" class="group" name="clubs[]" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection">
					<span id="">Missionary Funds</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="genral[]" value="All Missions">&nbsp;<label>All Missions</label> <br>
						<input type="checkbox" name="general[]" value="College Missions">&nbsp;<label>College Missions</label> <br>
						<input type="checkbox" name="general[]" value="Overseas Missions">&nbsp;<label>Overseas Missions</label> <br>
						<input type="checkbox" name="general[]" value="Youth & Teen">&nbsp;<label>Youth & Teen</label> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Catholic":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Catholic Organization to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)">&nbsp;<label>Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Main Church Website">&nbsp;<label>Main Church Website</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Camp">&nbsp;<label>Bible Camp</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Study">&nbsp;<label>Bible Study</label> <br>
						<input type="checkbox" name="clubs[]" value="Building Fund">&nbsp;<label>Building Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Choir & Band">&nbsp;<label>Choir & Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Christmas Giving Tree">&nbsp;<label>Christmas Giving Tree</label> <br>
						<input type="checkbox" name="clubs[]" value="Faith Formation">&nbsp;<label>Faith Formation</label> <br>
						<input type="checkbox" name="clubs[]" value="Festivals">&nbsp;<label>Festivals</label> <br>
						<input type="checkbox" name="clubs[]" value="Men’s Ministry">&nbsp;<label>Men’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Outreach Ministry">&nbsp;<label>Outreach Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Parish Fund">&nbsp;<label>Parish Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video">&nbsp;<label>Projection, Audio, Video</label> <br>
						<input type="checkbox" name="clubs[]" value="Student Ministry">&nbsp;<label>Student Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Sunday School">&nbsp;<label>Sunday School</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs">&nbsp;<label>Tablets, Laptops & PCs</label> <br>
						<input type="checkbox" name="clubs[]" value="Women’s Ministry">&nbsp;<label>Women’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth’s Ministry">&nbsp;<label>Youth’s Ministry</label> <br>
						<input type="text" class="group" name="clubs1" id="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection">
					<span id="">Missionary Funds</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="general[]" value="All Missions">&nbsp;<label>All Missions</label> <br>
						<input type="checkbox" name="general[]" value="College Missions">&nbsp;<label>College Missions</label> <br>
						<input type="checkbox" name="general[]" value="Overseas Missions">&nbsp;<label>Overseas Missions</label> <br>
						<input type="checkbox" name="general[]" value="Youth & Teen">&nbsp;<label>Youth & Teen</label> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Episcopal":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Episcopal Organization to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)">&nbsp;<label>Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Main Church Website">&nbsp;<label>Main Church Website</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Camp">&nbsp;<label>Bible Camp</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Study">&nbsp;<label>Bible Study</label> <br>
						<input type="checkbox" name="clubs[]" value="Building Fund">&nbsp;<label>Building Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Choir & Band">&nbsp;<label>Choir & Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Christmas Giving Tree">&nbsp;<label>Christmas Giving Tree</label> <br>
						<input type="checkbox" name="clubs[]" value="Faith Formation">&nbsp;<label>Faith Formation</label> <br>
						<input type="checkbox" name="clubs[]" value="Festivals">&nbsp;<label>Festivals</label> <br>
						<input type="checkbox" name="clubs[]" value="Men’s Ministry">&nbsp;<label>Men’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Outreach Ministry">&nbsp;<label>Outreach Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Parish Fund">&nbsp;<label>Parish Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video">&nbsp;<label>Projection, Audio, Video</label> <br>
						<input type="checkbox" name="clubs[]" value="Student Ministry">&nbsp;<label>Student Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Sunday School">&nbsp;<label>Sunday School</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs">&nbsp;<label>Tablets, Laptops & PCs</label> <br>
						<input type="checkbox" name="clubs[]" value="Women’s Ministry">&nbsp;<label>Women’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth’s Ministry">&nbsp;<label>Youth’s Ministry</label> <br>
						<input type="text" class="group" name="clubs1" id="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection">
					<span id="">Missionary Funds</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="general[]" value="All Missions">&nbsp;<label>All Missions</label> <br>
						<input type="checkbox" name="general[]" value="College Missions">&nbsp;<label>College Missions</label> <br>
						<input type="checkbox" name="general[]" value="Overseas Missions">&nbsp;<label>Overseas Missions</label> <br>
						<input type="checkbox" name="general[]" value="Youth & Teen">&nbsp;<label>Youth & Teen</label> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Lutheran":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Lutheran Organization to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)">&nbsp;<label>Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Main Church Website">&nbsp;<label>Main Church Website</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Camp">&nbsp;<label>Bible Camp</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Study">&nbsp;<label>Bible Study</label> <br>
						<input type="checkbox" name="clubs[]" value="Building Fund">&nbsp;<label>Building Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Choir & Band">&nbsp;<label>Choir & Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Christmas Giving Tree">&nbsp;<label>Christmas Giving Tree</label> <br>
						<input type="checkbox" name="clubs[]" value="Faith Formation">&nbsp;<label>Faith Formation</label> <br>
						<input type="checkbox" name="clubs[]" value="Festivals">&nbsp;<label>Festivals</label> <br>
						<input type="checkbox" name="clubs[]" value="Men’s Ministry">&nbsp;<label>Men’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Outreach Ministry">&nbsp;<label>Outreach Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Parish Fund">&nbsp;<label>Parish Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video">&nbsp;<label>Projection, Audio, Video</label> <br>
						<input type="checkbox" name="clubs[]" value="Student Ministry">&nbsp;<label>Student Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Sunday School">&nbsp;<label>Sunday School</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs">&nbsp;<label>Tablets, Laptops & PCs</label> <br>
						<input type="checkbox" name="clubs[]" value="Women’s Ministry">&nbsp;<label>Women’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth’s Ministry">&nbsp;<label>Youth’s Ministry</label> <br>
						<input type="text" class="group" name="clubs1" id="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection">
					<span id="">Missionary Funds</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="general[]" value="All Missions">&nbsp;<label>All Missions</label> <br>
						<input type="checkbox" name="general[]" value="College Missions">&nbsp;<label>College Missions</label> <br>
						<input type="checkbox" name="general[]" value="Overseas Missions">&nbsp;<label>Overseas Missions</label> <br>
						<input type="checkbox" name="general[]" value="Youth & Teen">&nbsp;<label>Youth & Teen</label> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Methodist":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Methodist Organization to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)">&nbsp;<label>Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Main Church Website">&nbsp;<label>Main Church Website</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Camp">&nbsp;<label>Bible Camp</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Study">&nbsp;<label>Bible Study</label> <br>
						<input type="checkbox" name="clubs[]" value="Building Fund">&nbsp;<label>Building Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Choir & Band">&nbsp;<label>Choir & Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Christmas Giving Tree">&nbsp;<label>Christmas Giving Tree</label> <br>
						<input type="checkbox" name="clubs[]" value="Faith Formation">&nbsp;<label>Faith Formation</label> <br>
						<input type="checkbox" name="clubs[]" value="Festivals">&nbsp;<label>Festivals</label> <br>
						<input type="checkbox" name="clubs[]" value="Men’s Ministry">&nbsp;<label>Men’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Outreach Ministry">&nbsp;<label>Outreach Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Parish Fund">&nbsp;<label>Parish Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video">&nbsp;<label>Projection, Audio, Video</label> <br>
						<input type="checkbox" name="clubs[]" value="Student Ministry">&nbsp;<label>Student Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Sunday School">&nbsp;<label>Sunday School</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs">&nbsp;<label>Tablets, Laptops & PCs</label> <br>
						<input type="checkbox" name="clubs[]" value="Women’s Ministry">&nbsp;<label>Women’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth’s Ministry">&nbsp;<label>Youth’s Ministry</label> <br>
						<input type="text" class="group" name="clubs[1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection">
					<span id="">Missionary Funds</span><br>
					<div class="checkboxes">						
						<input type="checkbox" name="general[]" value="All Missions">&nbsp;<label>All Missions</label> <br>
						<input type="checkbox" name="general[]" value="College Missions">&nbsp;<label>College Missions</label> <br>
						<input type="checkbox" name="general[]" value="Overseas Missions">&nbsp;<label>Overseas Missions</label> <br>
						<input type="checkbox" name="general[]" value="Youth & Teen">&nbsp;<label>Youth & Teen</label> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Presbyterian":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Presbyterian Organization to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)">&nbsp;<label>Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Main Church Website">&nbsp;<label>Main Church Website</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Camp">&nbsp;<label>Bible Camp</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Study">&nbsp;<label>Bible Study</label> <br>
						<input type="checkbox" name="clubs[]" value="Building Fund">&nbsp;<label>Building Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Choir & Band">&nbsp;<label>Choir & Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Christmas Giving Tree">&nbsp;<label>Christmas Giving Tree</label> <br>
						<input type="checkbox" name="clubs[]" value="Faith Formation">&nbsp;<label>Faith Formation</label> <br>
						<input type="checkbox" name="clubs[]" value="Festivals">&nbsp;<label>Festivals</label> <br>
						<input type="checkbox" name="clubs[]" value="Men’s Ministry">&nbsp;<label>Men’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Outreach Ministry">&nbsp;<label>Outreach Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Parish Fund">&nbsp;<label>Parish Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video">&nbsp;<label>Projection, Audio, Video</label> <br>
						<input type="checkbox" name="clubs[]" value="Student Ministry">&nbsp;<label>Student Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Sunday School">&nbsp;<label>Sunday School</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs">&nbsp;<label>Tablets, Laptops & PCs</label> <br>
						<input type="checkbox" name="clubs[]" value="Women’s Ministry">&nbsp;<label>Women’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth’s Ministry">&nbsp;<label>Youth’s Ministry</label> <br>
						<input type="text" class="group" name="clubs[]" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection">
					<span id="">Missionary Funds</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="general[]" value="All Missions">&nbsp;<label>All Missions</label> <br>
						<input type="checkbox" name="general[]" value="College Missions">&nbsp;<label>College Missions</label> <br>
						<input type="checkbox" name="general[]" value="Overseas Missions">&nbsp;<label>Overseas Missions</label> <br>
						<input type="checkbox" name="general[]" value="Youth & Teen">&nbsp;<label>Youth & Teen</label> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Orthodox":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Orthodox Organization to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)">&nbsp;<label>Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Main Church Website">&nbsp;<label>Main Church Website</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Camp">&nbsp;<label>Bible Camp</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Study">&nbsp;<label>Bible Study</label> <br>
						<input type="checkbox" name="clubs[]" value="Building Fund">&nbsp;<label>Building Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Choir & Band">&nbsp;<label>Choir & Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Christmas Giving Tree">&nbsp;<label>Christmas Giving Tree</label> <br>
						<input type="checkbox" name="clubs[]" value="Faith Formation">&nbsp;<label>Faith Formation</label> <br>
						<input type="checkbox" name="clubs[]" value="Festivals">&nbsp;<label>Festivals</label> <br>
						<input type="checkbox" name="clubs[]" value="Men’s Ministry">&nbsp;<label>Men’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Outreach Ministry">&nbsp;<label>Outreach Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Parish Fund">&nbsp;<label>Parish Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video">&nbsp;<label>Projection, Audio, Video</label> <br>
						<input type="checkbox" name="clubs[]" value="Student Ministry">&nbsp;<label>Student Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Sunday School">&nbsp;<label>Sunday School</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs">&nbsp;<label>Tablets, Laptops & PCs</label> <br>
						<input type="checkbox" name="clubs[]" value="Women’s Ministry">&nbsp;<label>Women’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth’s Ministry">&nbsp;<label>Youth’s Ministry</label> <br>
						<input type="text" class="group" name="clubs[]" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection">
					<span id="">Missionary Funds</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="general[]" value="All Missions">&nbsp;<label>All Missions</label> <br>
						<input type="checkbox" name="general[]" value="College Missions">&nbsp;<label>College Missions</label> <br>
						<input type="checkbox" name="general[]" value="Overseas Missions">&nbsp;<label>Overseas Missions</label> <br>
						<input type="checkbox" name="general[]" value="Youth & Teen">&nbsp;<label>Youth & Teen</label> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Reformed":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Reformed Organization to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)">&nbsp;<label>Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Main Church Website">&nbsp;<label>Main Church Website</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Camp">&nbsp;<label>Bible Camp</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Study">&nbsp;<label>Bible Study</label> <br>
						<input type="checkbox" name="clubs[]" value="Building Fund">&nbsp;<label>Building Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Choir & Band">&nbsp;<label>Choir & Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Christmas Giving Tree">&nbsp;<label>Christmas Giving Tree</label> <br>
						<input type="checkbox" name="clubs[]" value="Faith Formation">&nbsp;<label>Faith Formation</label> <br>
						<input type="checkbox" name="clubs[]" value="Festivals">&nbsp;<label>Festivals</label> <br>
						<input type="checkbox" name="clubs[]" value="Men’s Ministry">&nbsp;<label>Men’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Outreach Ministry">&nbsp;<label>Outreach Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Parish Fund">&nbsp;<label>Parish Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video">&nbsp;<label>Projection, Audio, Video</label> <br>
						<input type="checkbox" name="clubs[]" value="Student Ministry">&nbsp;<label>Student Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Sunday School">&nbsp;<label>Sunday School</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs">&nbsp;<label>Tablets, Laptops & PCs</label> <br>
						<input type="checkbox" name="clubs[]" value="Women’s Ministry">&nbsp;<label>Women’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth’s Ministry">&nbsp;<label>Youth’s Ministry</label> <br>
						<input type="text" class="group" name="clubs[]" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection">
					<span id="">Missionary Funds</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="general[]" value="All Missions">&nbsp;<label>All Missions</label> <br>
						<input type="checkbox" name="general[]" value="College Missions">&nbsp;<label>College Missions</label> <br>
						<input type="checkbox" name="general[]" value="Overseas Missions">&nbsp;<label>Overseas Missions</label> <br>
						<input type="checkbox" name="general[]" value="Youth & Teen">&nbsp;<label>Youth & Teen</label> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Spirit-Filled":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Spirit-Filled Organization to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)">&nbsp;<label>Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Main Church Website">&nbsp;<label>Main Church Website</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Camp">&nbsp;<label>Bible Camp</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Study">&nbsp;<label>Bible Study</label> <br>
						<input type="checkbox" name="clubs[]" value="Building Fund">&nbsp;<label>Building Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Choir & Band">&nbsp;<label>Choir & Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Christmas Giving Tree">&nbsp;<label>Christmas Giving Tree</label> <br>
						<input type="checkbox" name="clubs[]" value="Faith Formation">&nbsp;<label>Faith Formation</label> <br>
						<input type="checkbox" name="clubs[]" value="Festivals">&nbsp;<label>Festivals</label> <br>
						<input type="checkbox" name="clubs[]" value="Men’s Ministry">&nbsp;<label>Men’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Outreach Ministry">&nbsp;<label>Outreach Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Parish Fund">&nbsp;<label>Parish Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video">&nbsp;<label>Projection, Audio, Video</label> <br>
						<input type="checkbox" name="clubs[]" value="Student Ministry">&nbsp;<label>Student Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Sunday School">&nbsp;<label>Sunday School</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs">&nbsp;<label>Tablets, Laptops & PCs</label> <br>
						<input type="checkbox" name="clubs[]" value="Women’s Ministry">&nbsp;<label>Women’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth’s Ministry">&nbsp;<label>Youth’s Ministry</label> <br>
						<input type="text" class="group" name="clubs[]" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection">
					<span id="">Missionary Funds</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="general[]" value="All Missions">&nbsp;<label>All Missions</label> <br>
						<input type="checkbox" name="general[]" value="College Missions">&nbsp;<label>College Missions</label> <br>
						<input type="checkbox" name="general[]" value="Overseas Missions">&nbsp;<label>Overseas Missions</label> <br>
						<input type="checkbox" name="general[]" value="Youth & Teen">&nbsp;<label>Youth & Teen</label> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Christian Other":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Christian Other Organization to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)">&nbsp;<label>Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Main Church Website">&nbsp;<label>Main Church Website</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Camp">&nbsp;<label>Bible Camp</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Study">&nbsp;<label>Bible Study</label> <br>
						<input type="checkbox" name="clubs[]" value="Building Fund">&nbsp;<label>Building Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Choir & Band">&nbsp;<label>Choir & Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Christmas Giving Tree">&nbsp;<label>Christmas Giving Tree</label> <br>
						<input type="checkbox" name="clubs[]" value="Faith Formation">&nbsp;<label>Faith Formation</label> <br>
						<input type="checkbox" name="clubs[]" value="Festivals">&nbsp;<label>Festivals</label> <br>
						<input type="checkbox" name="clubs[]" value="Men’s Ministry">&nbsp;<label>Men’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Outreach Ministry">&nbsp;<label>Outreach Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Parish Fund">&nbsp;<label>Parish Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video">&nbsp;<label>Projection, Audio, Video</label> <br>
						<input type="checkbox" name="clubs[]" value="Student Ministry">&nbsp;<label>Student Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Sunday School">&nbsp;<label>Sunday School</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs">&nbsp;<label>Tablets, Laptops & PCs</label> <br>
						<input type="checkbox" name="clubs[]" value="Women’s Ministry">&nbsp;<label>Women’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth’s Ministry">&nbsp;<label>Youth’s Ministry</label> <br>
						<input type="text" class="group" name="clubs[]" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection">
					<span id="">Missionary Funds</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="general[]" value="All Missions">&nbsp;<label>All Missions</label> <br>
						<input type="checkbox" name="general[]" value="College Missions">&nbsp;<label>College Missions</label> <br>
						<input type="checkbox" name="general[]" value="Overseas Missions">&nbsp;<label>Overseas Missions</label> <br>
						<input type="checkbox" name="general[]" value="Youth & Teen">&nbsp;<label>Youth & Teen</label> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Jewish Conservative":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Jewish Conservative Organization to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)">&nbsp;<label>Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Main Synagogue Website">&nbsp;<label>Main Synagogue Website</label> <br>
						<input type="checkbox" name="clubs[]" value="Jewish Summer Camp">&nbsp;<label>Jewish Summer Camp</label> <br>
						<input type="checkbox" name="clubs[]" value="Hebrew Bible Study">&nbsp;<label>Hebrew Bible Study</label> <br>
						<input type="checkbox" name="clubs[]" value="Building Fund">&nbsp;<label>Building Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Choir & Band">&nbsp;<label>Choir & Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Festivals">&nbsp;<label>Festivals</label> <br>
						<input type="checkbox" name="clubs[]" value="Synagogue Fund">&nbsp;<label>Synagogue Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video">&nbsp;<label>Projection, Audio, Video</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs">&nbsp;<label>Tablets, Laptops & PCs</label> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection">
					<span id="">Mission Trips</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="general[]" value="All Missions">&nbsp;<label>All Missions</label> <br>
						<input type="checkbox" name="general[]" value="College Missions">&nbsp;<label>College Missions</label> <br>
						<input type="checkbox" name="general[]"value="Israel Mission">&nbsp;<label>Israel Mission</label> <br>
						<input type="checkbox" name="general[]" value="Overseas Missions">&nbsp;<label>Overseas Missions</label> <br>
						<input type="checkbox" name="general[]" value="Youth & Teen">&nbsp;<label>Youth & Teen</label> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Jewish Orthodox":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Jewish Orthodox Organization to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)">&nbsp;<label>Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Main Synagogue Website">&nbsp;<label>Main Synagogue Website</label> <br>
						<input type="checkbox" name="clubs[]" value="Jewish Summer Camp">&nbsp;<label>Jewish Summer Camp</label> <br>
						<input type="checkbox" name="clubs[]" value="Hebrew Bible Study">&nbsp;<label>Hebrew Bible Study</label> <br>
						<input type="checkbox" name="clubs[]" value="Building Fund">&nbsp;<label>Building Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Choir & Band">&nbsp;<label>Choir & Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Festivals">&nbsp;<label>Festivals</label> <br>
						<input type="checkbox" name="clubs[]" value="Synagogue Fund">&nbsp;<label>Synagogue Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video">&nbsp;<label>Projection, Audio, Video</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs">&nbsp;<label>Tablets, Laptops & PCs</label> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection">
					<span id="">Mission Trips</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="general[]" value="All Missions">&nbsp;<label>All Missions</label> <br>
						<input type="checkbox" name="general[]" value="College Missions">&nbsp;<label>College Missions</label> <br>
						<input type="checkbox" name="general[]" value="Israel Mission">&nbsp;<label>Israel Mission</label> <br>
						<input type="checkbox" name="general[]" value="Overseas Missions">&nbsp;<label>Overseas Missions</label> <br>
						<input type="checkbox" name="general[]" value="Youth & Teen">&nbsp;<label>Youth & Teen</label> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Jewish Reformed":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Jewish Reformed Organization to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)">&nbsp;<label>Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Main Synagogue Website">&nbsp;<label>Main Synagogue Website</label> <br>
						<input type="checkbox" name="clubs[]" value="Jewish Summer Camp">&nbsp;<label>Jewish Summer Camp</label> <br>
						<input type="checkbox" name="clubs[]" value="Hebrew Bible Study">&nbsp;<label>Hebrew Bible Study</label> <br>
						<input type="checkbox" name="clubs[]" value="Building Fund">&nbsp;<label>Building Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Choir & Band">&nbsp;<label>Choir & Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Festivals">&nbsp;<label>Festivals</label> <br>
						<input type="checkbox" name="clubs[]" value="Synagogue Fund">&nbsp;<label>Synagogue Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video">&nbsp;<label>Projection, Audio, Video</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs">&nbsp;<label>Tablets, Laptops & PCs</label> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection">
					<span id="">Mission Trips</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="general[]" value="All Missions">&nbsp;<label>All Missions</label> <br>
						<input type="checkbox" name="general[]" value="College Missions">&nbsp;<label>College Missions</label> <br>
						<input type="checkbox" name="general[]" value="Israel Mission">&nbsp;<label>Israel Mission</label> <br>
						<input type="checkbox" name="general[]" value="Overseas Missions">&nbsp;<label>Overseas Missions</label> <br>
						<input type="checkbox" name="general[]" value="Youth & Teen">&nbsp;<label>Youth & Teen</label> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		
		case "Buddhist":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Buddhist Organization to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)">&nbsp;<label>Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Main Website">&nbsp;<label>Main Website</label> <br>
						<input type="text" class="group" name="clubs1" id="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		
		case "Hindu":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Hindu Organization to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)">&nbsp;<label>Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Main Website">&nbsp;<label>Main Website</label> <br>
						<input type="text" class="group" name="clubs1" id="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		
		case "Muslim":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Muslim Organization to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)">&nbsp;<label>Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Main Website">&nbsp;<label>Main Website</label> <br>
						<input type="text" class="group" name="clubs1" id="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		
		case "Other Faiths":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Other Faiths Organization to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)">&nbsp;<label>Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Main Website">&nbsp;<label>Main Website</label> <br>
						<input type="text" class="group" name="clubs1" id="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		
		case "Local & National Organization":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Local & National Organization to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)">&nbsp;<label>Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Jaycees">&nbsp;<label>Jaycees</label> <br>
						<input type="checkbox" name="clubs[]" value="Junior League">&nbsp;<label>Junior League</label> <br>
						<input type="checkbox" name="clubs[]" value="Kiwanis">&nbsp;<label>Kiwanis</label> <br>
						<input type="checkbox" name="clubs[]" value="Knights of Columbus">&nbsp;<label>Knights of Columbus</label> <br>
						<input type="checkbox" name="clubs[]" value="Lion&#39;s Club International (LCI)">&nbsp;<label>Lion&#39;s Club International (LCI)</label> <br>
						<input type="checkbox" name="clubs[]" value="Masonic Service Association">&nbsp;<label>Masonic Service Association</label> <br>
						<input type="checkbox" name="clubs[]" value="Optimist International">&nbsp;<label>Optimist International</label> <br>
						<input type="checkbox" name="clubs[]" value="Rotary Club">&nbsp;<label>Rotary Club</label> <br>
						<input type="checkbox" name="clubs[]" value="Shriners International">&nbsp;<label>Shriners International</label> <br>
						<input type="checkbox" name="clubs[]" value="The American Legion">&nbsp;<label>The American Legion</label> <br>
						<input type="checkbox" name="clubs[]" value="Veterans of Foreign Wars (VFW)">&nbsp;<label>Veterans of Foreign Wars (VFW)</label> <br>
						<input type="text" class="group" name="clubs1" id="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Local & National Charity":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Local or National Charity to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)">&nbsp;<label>Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection2">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Alzheimer Foundation of America (AFA)">&nbsp;<label>Alzheimer Foundation of America (AFA)</label> <br>
						<input type="checkbox" name="clubs[]" value="American Cancer Society">&nbsp;<label>American Cancer Society</label> <br>
						<input type="checkbox" name="clubs[]" value="American Diabetes Association">&nbsp;<label>American Diabetes Association</label> <br>
						<input type="checkbox" name="clubs[]" value="American Heart Association">&nbsp;<label>American Heart Association</label> <br>
						<input type="checkbox" name="clubs[]" value="American Red Cross">&nbsp;<label>American Red Cross</label> <br>
						<input type="checkbox" name="clubs[]" value="Boys & Girls Clubs of America">&nbsp;<label>Boys & Girls Clubs of America</label> <br>
						<input type="checkbox" name="clubs[]" value="Cancer Research Institute">&nbsp;<label>Cancer Research Institute</label> <br>
						<input type="checkbox" name="clubs[]" value="Cerebral Palsy">&nbsp;<label>Cerebral Palsy</label> <br>
						<input type="checkbox" name="clubs[]" value="Goodwill Industries International">&nbsp;<label>Goodwill Industries International</label> <br>
						<input type="checkbox" name="clubs[]" value="Habitat for Humanity">&nbsp;<label>Habitat for Humanity</label> <br>
						<input type="checkbox" name="clubs[]" value="Leukemia & Lymphoma Society">&nbsp;<label>Leukemia & Lymphoma Society</label> <br>
						<input type="checkbox" name="clubs[]" value="Lymphoma Association">&nbsp;<label>Lymphoma Association</label> <br>
						<input type="checkbox" name="clubs[]" value="Make-A-Wish Foundaion of America">&nbsp;<label>Make-A-Wish Foundaion of America</label> <br>
						<input type="checkbox" name="clubs[]" value="March of Dimes">&nbsp;<label>March of Dimes</label> <br>
						<input type="checkbox" name="clubs[]" value="Muscular Dystrophy Association (MDA)">&nbsp;<label>Muscular Dystrophy Association (MDA)</label> <br>
						<input type="checkbox" name="clubs[]" value="Shriners International">&nbsp;<label>Shriners International</label> <br>
						<input type="checkbox" name="clubs[]" value="Special Olympics">&nbsp;<label>Special Olympics</label> <br>
						<input type="checkbox" name="clubs[]" value="St. Jude Childrens&#39;s Research Hospital">&nbsp;<label>St. Jude Childrens&#39;s Research Hospital</label> <br>
						<input type="checkbox" name="clubs[]" value="Susan G. Komen">&nbsp;<label>Susan G. Komen</label> <br>
						<input type="checkbox" name="clubs[]" value="The Salvation Army">&nbsp;<label>The Salvation Army</label> <br>
						<input type="checkbox" name="clubs[]" value="The Simon Wiesenthal Foundation">&nbsp;<label>The Simon Wiesenthal Foundation</label> <br>
						<input type="checkbox" name="clubs[]" value="United Way">&nbsp;<label>United Way</label> <br>
						<input type="checkbox" name="clubs[]" value="Wounded Warrior Project">&nbsp;<label>Wounded Warrior Project</label> <br>
						<input type="text" class="group" name="clubs1" id="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Community Organization":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Community Organization to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)">&nbsp;<label>Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Animal Shelters">&nbsp;<label>Animal Shelters&nbsp;<label></label> <br>
						<input type="checkbox" name="clubs[]" value="ASPCA">&nbsp;<label>ASPCA</label> <br>
						<input type="checkbox" name="clubs[]" value="Community Food Bank">&nbsp;<label>Community Food Bank</label> <br>
						<input type="checkbox" name="clubs[]" value="Fire Department">&nbsp;<label>Fire Department</label> <br>
						<input type="checkbox" name="clubs[]" value="Local Food Shelves">&nbsp;<label>Local Food Shelves</label> <br>
						<input type="checkbox" name="clubs[]" value="Local Homeless Shelters">&nbsp;<label>Local Homeless Shelters</label> <br>
						<input type="checkbox" name="clubs[]" value="Local Women&#39;s Shelters">&nbsp;<label>Local Women&#39;s Shelters</label> <br>
						<input type="checkbox" name="clubs[]" value="Police Department">&nbsp;<label>Police Department</label> <br>
						<input type="text" class="group" name="clubs1" id="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Youth & Sports":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Youth & Sports to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)">&nbsp;<label>Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Athletic Associations">&nbsp;<label>Athletic Associations</label> <br>
						<input type="checkbox" name="clubs[]" value="Big Brothers/Big Sisters of America">&nbsp;<label>Big Brothers/Big Sisters of America</label> <br>
						<input type="checkbox" name="clubs[]" value="Boy Scouts">&nbsp;<label>Boy Scouts</label> <br>
						<input type="checkbox" name="clubs[]" value="Girl Scouts">&nbsp;<label>Girl Scouts</label> <br>
						<input type="checkbox" name="clubs[]" value="Summer Leagues">&nbsp;<label>Summer Leagues</label> <br>
						<input type="checkbox" name="clubs[]" value="YMCA">&nbsp;<label>YMCA</label> <br>
						<input type="text" class="group" name="clubs1" id="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Sports League":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Sports League to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)">&nbsp;<label>Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Summer League">&nbsp;<label>Summer League</label> <br>
						<input type="text" class="group" name="clubs1" id="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "General":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select General Organization to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)">&nbsp;<label>Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs1" id="clubs1" value="General">&nbsp;<label>General</label> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
           	case "Goodwill":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Goodwill Organization to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)">&nbsp;<label>Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs1" id="clubs1" value="Goodwill">&nbsp;<label>General</label> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
           
         }//end switch

	echo '<br> <input type="submit" name="submit" class="redbutton" value="Add New Clubs" /></form>';
	echo '</div><!--end border-->';
	

mysqli_close($con);
?>