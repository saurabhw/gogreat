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
  $sql = "SELECT * FROM Dealers WHERE Dealer = '$q'  AND Zip = '$z'";
  $result = mysqli_query($con,$sql)or  die('Could not get Dealer info: ' . mysqli_error($con));	
      
  $getGroup = "SELECT * FROM Dealers WHERE Dealer = '$q' AND Zip = '$z'";
  $groupResult = mysqli_query($con, $getGroup) or  die('Could not get group info: ' . mysqli_error($con));
  $gRow = mysqli_fetch_assoc($groupResult);
  $groupCity = $gRow['City'];
  $groupState = $gRow['State'];
  $groupAddress = $gRow['Address1'];
  $groupType = $gRow['orgtype'];

	echo '<br><h3 style="display: inline;">'.$q.' '.$groupAddress.' '.$groupCity.' '.$groupState.' '.$z.'</h3><br><br>'; 
	
	//echo $groupType;
	
	 switch($groupType) {
                case "College":
		echo'<div class="interim-form"> 
			<div class="interim-header"><h2>Select College Groups to Setup</h2></div>
                                       <form action="addClub.php" method="Post" name="" onsubmit="myFunction()">
			<input type="checkbox" name="all" onClick="toggle(this)"><label>Select All Groups</label>
			<br><br>
			<div class="groupcolumns">
				<div class="groupsection">
					<span id="">Clubs & Organizations</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="4-H"><label>4-H</label> <br>
						<input type="checkbox" name="clubs[]" value="Alumni Association"><label>Alumni Association</label> <br>
						<input type="checkbox" name="clubs[]" value="Band"><label>Band</label> <br>
						<input type="checkbox" name="clubs[]" value="BPA"><label>BPA</label> <br>
						<input type="checkbox" name="clubs[]" value="Chess Club"><label>Chess Club</label> <br>
						<input type="checkbox" name="clubs[]" value="Choir"><label>Choir</label> <br>
						<input type="checkbox" name="clubs[]" value="Debate"><label>Debate</label> <br>
						<input type="checkbox" name="clubs[]" value="DECA"><label>DECA</label> <br>
						<input type="checkbox" name="clubs[]" value="Drumline"><label>Drumline</label> <br>
						<input type="checkbox" name="clubs[]" value="FBLA"><label>FBLA</label> <br>
						<input type="checkbox" name="clubs[]" value="FFA"><label>FFA</label> <br>
						<input type="checkbox" name="clubs[]" value="Greeks"><label>Greeks</label> <br>
						<input type="checkbox" name="clubs[]" value="Jazz Band"><label>Jazz Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Key Club"><label>Key Club</label> <br>
						<input type="checkbox" name="clubs[]" value="Language Club"><label>Language Club</label> <br>
						<input type="checkbox" name="clubs[]" value="Math Club"><label>Math Club</label> <br>
						<input type="checkbox" name="clubs[]" value="National Honor Society"><label>National Honor Society</label> <br>
						<input type="checkbox" name="clubs[]" value="Orchestra"><label>Orchestra</label> <br>
						<input type="checkbox" name="clubs[]" value="Robotics & Technology"><label>Robotics & Technology</label> <br>
						<input type="checkbox" name="clubs[]" value="ROTC"><label>ROTC</label> <br>
						<input type="checkbox" name="clubs[]" value="Science Club"><label>Science Club</label> <br>
						<input type="checkbox" name="clubs[]" value="Scripture Study"><label>Scripture Study</label> <br>
						<input type="checkbox" name="clubs[]" value="Student Council"><label>Student Council</label> <br>
						<input type="checkbox" name="clubs1[]" value="Theatre & Drama"><label>Theatre & Drama</label> <br><input type="text" class="group" name="clubs1" value="" placeholder="Please type in the club" title="Other"><br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection">
					<span id="">General</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="general[]" value="Athletic Equipment"><label>Athletic Equipment</label> <br>
						<input type="checkbox" name="general[]" value="Field Trips & Travel"><label>Field Trips & Travel</label> <br>
						<input type="checkbox" name="general[]" value="Library & Technology"><label>Library & Technology</label> <br>
						<input type="checkbox" name="general[]" value="Projection, Audio, Video"><label>Projection, Audio, Video</label> <br>
						<input type="checkbox" name="general[]" value="Tablets, Laptops & PCs"><label>Tablets, Laptops & PCs</label> <br>
						<input type="text" class="group" name="genral1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				
				<br>
				
				<div class="groupsection2">
					<span id="">Athletics</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="athletics[]" value="Archery"><label>Archery</label> <br>
						<input type="checkbox" name="athletics[]" value="Badminton"><label>Badminton</label> <br>
						<input type="checkbox" name="athletics[]" value="Baseball"><label>Baseball</label> <br>
						<input type="checkbox" name="athletics[]" value="Basketball, Boys"><label>Basketball, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Basketball, Girls"><label>Basketball, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Bowling, Boys"><label>Bowling, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Bowling, Girls"><label>Bowling, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="CC Running, Boys"><label>CC Running, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="CC Running, Girls"><label>CC Running, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="CC Skiing, Boys"><label>CC Skiing, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="CC Skiing, Girls"><label>CC Skiing, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Cheerleading"><label>Cheerleading</label> <br>
						<input type="checkbox" name="athletics[]" value="Cycling"><label>Cycling</label> <br>
						<input type="checkbox" name="athletics[]" value="Danceline"><label>Danceline</label> <br>
						<input type="checkbox" name="athletics[]" value="Diving, Boys"><label>Diving, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Diving, Girls"><label>Diving, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Field  Hockey"><label>Field  Hockey</label> <br>
						<input type="checkbox" name="athletics[]" value="Figure Skating"><label>Figure Skating</label> <br>
						<input type="checkbox" name="athletics[]" value="Football"><label>Football</label> <br>
						<input type="checkbox" name="athletics[]" value="Golf, Boys"><label>Golf, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Golf, Girls"><label>Golf, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Gymnastics, Boys"><label>Gymnastics, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Gymnastics, Girls"><label>Gymnastics, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Ice Hockey, Boys"><label>Ice Hockey, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Ice Hockey, Girls"><label>Ice Hockey, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Lacrosse, Boys"><label>Lacrosse, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Lacrosse, Girls"><label>Lacrosse, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Mountaineering"><label>Mountaineering</label> <br>
						<input type="checkbox" name="athletics[]" value="Power Lifting"><label>Power Lifting</label> <br>
						<input type="checkbox" name="athletics[]" value="Racquetball"><label>Racquetball</label> <br>
						<input type="checkbox" name="athletics[]" value="Rodeo"><label>Rodeo</label> <br>
						<input type="checkbox" name="athletics[]" value="Rowing, Boys"><label>Rowing, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Rowing, Girls"><label>Rowing, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Rugby, Boys"><label>Rugby, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Rugby, Girls"><label>Rugby, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Sailing"><label>Sailing</label> <br>
						<input type="checkbox" name="athletics[]" value="Ski & Snowboard, Boys"><label>Ski & Snowboard, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Ski & Snowboard, Girls"><label>Ski & Snowboard, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Soccer, Boys"><label>Soccer, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Soccer, Girls"><label>Soccer, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Softball"><label>Softball</label> <br>
						<input type="checkbox" name="athletics[]" value="Swimming, Boys"><label>Swimming, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Swimming, Girls"><label>Swimming, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Synchronized Swimming"><label>Synchronized Swimming</label> <br>
						<input type="checkbox" name="athletics[]" value="Table Tennis"><label>Table Tennis</label> <br>
						<input type="checkbox" name="athletics[]" value="Tennis, Boys"><label>Tennis, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Tennis, Girls"><label>Tennis, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Track & Field, Boys"><label>Track & Field, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Track & Field, Girls"><label>Track & Field, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Ultimate Frisbee, Boys"><label>Ultimate Frisbee, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Ultimate Frisbee, Girls"><label>Ultimate Frisbee, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Volleyball, Boys"><label>Volleyball, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Volleyball, Girls"><label>Volleyball, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Water Polo"><label>Water Polo</label> <br>
						<input type="checkbox" name="athletics[]" value="Wrestling"><label>Wrestling</label> <br>
						<input type="text" class="group" name="athletics1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "High School":
		echo'<div class="interim-form"> 
		<div class="interim-header"><h2>Select High School Groups to Setup</h2></div>

		<input type="checkbox" name="all" onClick="toggle(this)"><label>Select All Groups</label>
		<br><br>
		<div class="groupcolumns">
			<div class="groupsection">
				<span id="">Clubs & Organizations</span><br>
				<div class="checkboxes">
					<input type="checkbox" name="clubs[]" value="4-H"><label>4-H</label> <br>
					<input type="checkbox" name="clubs[]" value="Band"><label>Band</label> <br>
					<input type="checkbox" name="clubs[]" value="Booster Club"><label>Booster Club</label> <br>
					<input type="checkbox" name="clubs[]" value="BPA"><label>BPA</label> <br>
					<input type="checkbox" name="clubs[]" value="Chess Club"><label>Chess Club</label> <br>
					<input type="checkbox" name="clubs[]" value="Choir"><label>Choir</label> <br>
					<input type="checkbox" name="clubs[]" value="Debate"><label>Debate</label> <br>
					<input type="checkbox" name="clubs[]" value="DECA"><label>DECA</label> <br>
					<input type="checkbox" name="clubs[]" value="FBLA"><label>FBLA</label> <br>
					<input type="checkbox" name="clubs[]" value="FFA"><label>FFA</label> <br>
					<input type="checkbox" name="clubs[]" value="Jazz Band"><label>Jazz Band</label> <br>
					<input type="checkbox" name="clubs[]" value="JROTC"><label>JROTC</label> <br>
					<input type="checkbox" name="clubs[]" value="Key Club"><label>Key Club</label> <br>
					<input type="checkbox" name="clubs[]" value="Language Club"><label>Language Club</label> <br>
					<input type="checkbox" name="clubs[]" value="Math Club"><label>Math Club</label> <br>
					<input type="checkbox" name="clubs[]" value="National Honor Society"><label>National Honor Society</label> <br>
					<input type="checkbox" name="clubs[]" value="Orchestra"><label>Orchestra</label> <br>
					<input type="checkbox" name="clubs[]" value="PTA/PTO"><label>PTA/PTO/PTC</label> <br>
					<input type="checkbox" name="clubs[]" value="Robotics & Technology"><label>Robotics & Technology</label> <br>
					<input type="checkbox" name="clubs[]" value="Science Club"><label>Science Club</label> <br>
					<input type="checkbox" name="clubs[]" value="Scripture Study"><label>Scripture Study</label> <br>
					<input type="checkbox" name="clubs[]" value="Student Council"><label>Student Council</label> <br>
					<input type="checkbox" name="clubs[]" value="Theatre & Drama"><label>Theatre & Drama</label> <br>
					<input type="checkbox" name="clubs[]" value="Yearbook"><label>Yearbook</label> <br>
					<input type="text" class="group" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
				</div> <!-- end checkboxes -->
			</div> <!-- end groupsection -->
		
				<br>
				
				<div class="groupsection">
					<span id="">General</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="general[]" value="General"><label>General</label> <br>
						<input type="checkbox" name="general[]" value="Graduation"><label>Graduation</label> <br>
						<input type="checkbox" name="general[]" value="Senior Class"><label>Senior Class</label> <br>
						<input type="checkbox" name="general[]" value="Junior Class"><label>Junior Class</label> <br>
						<input type="checkbox" name="general[]" value="Sophmore Class"><label>Sophmore Class</label> <br>
						<input type="checkbox" name="general[]" value="Freshman Class"><label>Freshman Class</label> <br>
						<input type="checkbox" name="general[]" value="Athletic Equipment"><label>Athletic Equipment</label> <br>
						<input type="checkbox" name="general[]" value="Field Trips & Travel"><label>Field Trips & Travel</label> <br>
						<input type="checkbox" name="general[]" value="Library & Technology"><label>Library & Technology</label> <br>
						<input type="checkbox" name="general[]" value="Playground Equipment"><label>Playground Equipment</label> <br>
						<input type="checkbox" name="general[]" value="Projection, Audio, Video"><label>Projection, Audio, Video</label> <br>
						<input type="checkbox" name="general[]" value="Tablets, Laptops & PCs"><label>Tablets, Laptops & PCs</label> <br>
						<input type="text" class="group" name="general1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				
				<br>
				
				<div class="groupsection2">
					<span id="">Athletics</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="athletics[]" value="Archery"><label>Archery</label> <br>
						<input type="checkbox" name="athletics[]" value="Badminton"><label>Badminton</label> <br>
						<input type="checkbox" name="athletics[]" value="Baseball"><label>Baseball</label> <br>
						<input type="checkbox" name="athletics[]" value="Basketball, Boys"><label>Basketball, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Basketball, Girls"><label>Basketball, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Bowling, Boys"><label>Bowling, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Bowling, Girls"><label>Bowling, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="CC Running, Boys"><label>CC Running, Boys</label><br>
						<input type="checkbox" name="athletics[]" value="CC Running, Girls"><label>CC Running, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="CC Skiing, Boys"><label>CC Skiing, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="CC Skiing, Girls"><label>CC Skiing, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Cheerleading"><label>Cheerleading</label> <br>
						<input type="checkbox" name="athletics[]" value="Cycling"><label>Cycling</label> <br>
						<input type="checkbox" name="athletics[]" value="Danceline"><label>Danceline</label> <br>
						<input type="checkbox" name="athletics[]" value="Diving, Boys"><label>Diving, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Diving, Girls"><label>Diving, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Field Hockey"><label>Field Hockey</label> <br>
						<input type="checkbox" name="athletics[]" value="Figure Skating"><label>Figure Skating</label> <br>
						<input type="checkbox" name="athletics[]" value="Football"><label>Football</label> <br>
						<input type="checkbox" name="athletics[]"value="Golf, Boys"><label>Golf, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Golf, Girls"><label>Golf, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Gymnastics, Boys"><label>Gymnastics, Boys</label> <br>
						<input type="checkbox" name="athletics[]"value="Gymnastics, Girls"><label>Gymnastics, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Ice Hockey"><label>Ice Hockey, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Ice Hockey"><label>Ice Hockey, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Lacrosse, Boys"><label>Lacrosse, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Lacrosse, Girls"><label>Lacrosse, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Mountaineering"><label>Mountaineering</label> <br>
						<input type="checkbox" name="athletics[]" value="Power Lifting"><label>Power Lifting</label> <br>
						<input type="checkbox" name="athletics[]" value="Racquetball"><label>Racquetball</label> <br>
						<input type="checkbox" name="athletics[]" value="Rodeo"><label>Rodeo</label> <br>
						<input type="checkbox" name="athletics[]" value="Rowing, Boys"><label>Rowing, Boys</label> <br>
						<input type="checkbox" name="athletics[]"value="Rowing, Girls"><label>Rowing, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Rugby, Boys"><label>Rugby, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Rugby, Girls"><label>Rugby, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Sailing"><label>Sailing</label> <br>
						<input type="checkbox" name="athletics[]" value="Ski & Snowboard, Boys"><label>Ski & Snowboard, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Ski & Snowboard, Girls"><label>Ski & Snowboard, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Soccer, Boys"><label>Soccer, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Soccer, Girls"><label>Soccer, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Softball"><label>Softball</label> <br>
						<input type="checkbox" name="athletics[]" value="Swimming, Boys"><label>Swimming, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Swimming, Girls"><label>Swimming, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Table Tennis"><label>Table Tennis</label> <br>
						<input type="checkbox" name="athletics[]" value="Tennis, Boys"><label>Tennis, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Tennis, Girls"><label>Tennis, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Track & Field, Boys"><label>Track & Field, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Track & Field, Girls"><label>Track & Field, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Ultimate Frisbee, Boys"><label>Ultimate Frisbee, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Ultimate Frisbee, Girls"><label>Ultimate Frisbee, Girls</label> <br>
						<input type="checkbox" name="athletics[]"value="Volleyball, Boys"><label>Volleyball, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Volleyball, Girls"><label>Volleyball, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Water Polo"><label>Water Polo</label> <br>
						<input type="checkbox" name="athletics[]" value="Wrestling"><label>Wrestling</label> <br>
						<input type="text" class="group" name="athletics1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Middle School":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Middle School Groups to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><label>Select All Groups</label>

			<br><br>
			<div class="groupcolumns">
				<div class="groupsection">
					<span>Clubs & Organizations:</span>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="4-H"><label>4-H</label> <br>
						<input type="checkbox" name="clubs[]" value="Band"><label>Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Booster Club"><label>Booster Club</label> <br>
						<input type="checkbox" name="clubs[]" value="BPA"><label>BPA</label> <br>
						<input type="checkbox" name="clubs[]" value="Chess Club"><label>Chess Club</label> <br>
						<input type="checkbox" name="clubs[]" value="Choir"><label>Choir</label> <br>
						<input type="checkbox" name="clubs[]" value="Debate"><label>Debate</label> <br>
						<input type="checkbox" name="clubs[]" value="FFA"><label>FFA</label> <br>
						<input type="checkbox" name="clubs[]" value="Jazz Band"><label>Jazz Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Language Club"><label>Language Club</label> <br>
						<input type="checkbox" name="clubs[]" value="Math Club"><label>Math Club</label> <br>
						<input type="checkbox" name="clubs[]" value="National Honor Society"><label>National Honor Society</label> <br>
						<input type="checkbox" name="clubs[]" value="Orchestra"><label>Orchestra</label> <br>
						<input type="checkbox" name="clubs[]" value="PTA/PTO/PTC"><label>PTA/PTO/PTC</label> <br>
						<input type="checkbox" name="clubs[]" value="Band"><label>Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Science Club"><label>Science Club</label> <br>
						<input type="checkbox" name="clubs[]" value="Band"><label>Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Scripture Study"><label>Scripture Study</label> <br>
						<input type="checkbox" name="clubs[]" value="Student Council"><label>Student Council</label> <br>
						<input type="checkbox" name="clubs[]" value="Theatre & Drama"><label>Theatre & Drama</label> <br>
						<input type="checkbox" name="clubs[]" value="Yearbook"><label>Yearbook</label> <br>
						<input type="text" class="group" name="clubs[]" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection">
					<span id="">General</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="general[]" value="General"><label>General</label> <br>
						<input type="checkbox" name="general[]" value="After-School Program"><label>After-School Program</label> <br>
						<input type="checkbox" name="general[]" value="Athletic Equipment"><label>Athletic Equipment</label> <br>
						<input type="checkbox" name="general[]" value="Field Trips & Travel"><label>Field Trips & Travel</label> <br>
						<input type="checkbox" name="general[]" value="Library & Technology"><label>Library & Technology</label> <br>
						<input type="checkbox" name="general[]" value="Playground Equipment"><label>Playground Equipment</label> <br>
						<input type="checkbox" name="general[]" value="Projection, Audio, Video"><label>Projection, Audio, Video</label> <br>
						<input type="checkbox" name="general[]" value="Tablets, Laptops & PCs"><label>Tablets, Laptops & PCs</label> <br>
						<input type="text" class="group" name="general" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				
				<br>
				
				<div class="groupsection2">
					<span>Athletics:</span>
					<div class="checkboxes">
						<input type="checkbox" name="athletics[]" value="Archery"><label>Archery</label> <br>
						<input type="checkbox" name="athletics[]" value="Badminton"><label>Badminton</label> <br>
						<input type="checkbox" name="athletics[]" value="Baseball"><label>Baseball</label> <br>
						<input type="checkbox" name="athletics[]" value="Basketball, Boys"><label>Basketball, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Basketball, Girls"><label>Basketball, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Bowling"><label>Bowling</label> <br>
						<input type="checkbox" name="athletics[]" value="CC Running, Boys"><label>CC Running, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="CC Running, Girls"><label>CC Running, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="CC Skiing, Boys"><label>CC Skiing, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="CC Skiing, Girls"><label>CC Skiing, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Cheerleading"><label>Cheerleading</label> <br>
						<input type="checkbox" name="athletics[]" value="Cycling"><label>Cycling</label> <br>
						<input type="checkbox" name="athletics[]" value="Danceline"><label>Danceline</label> <br>
						<input type="checkbox" name="athletics[]" value="Diving, Boys"><label>Diving, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Diving, Girls"><label>Diving, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Field Hockey"><label>Field Hockey</label> <br>
						<input type="checkbox" name="athletics[]" value="Figure Skating"><label>Figure Skating</label> <br>
						<input type="checkbox" name="athletics[]" value="Football"><label>Football</label> <br>
						<input type="checkbox" name="athletics[]" value="Golf, Boys"><label>Golf, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Golf, Girls"><label>Golf, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Gymnastics, Boys"><label>Gymnastics, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Gymnastics, Girls"><label>Gymnastics, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Ice Hockey, Boys"><label>Ice Hockey, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Ice Hockey, Girls"><label>Ice Hockey, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Lacrosse, Boys"><label>Lacrosse, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Lacrosse, Girls"><label>Lacrosse, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Mountaineering"><label>Mountaineering</label> <br>
						<input type="checkbox" name="athletics[]" value="Racquetball"><label>Racquetball</label> <br>
						<input type="checkbox" name="athletics[]" value="Rodeo"><label>Rodeo</label> <br>
						<input type="checkbox" name="athletics[]" value="Rowing"><label>Rowing</label> <br>
						<input type="checkbox" name="athletics[]" value="Rugby, Boys"><label>Rugby, Boys</label> <br>
						<input type="checkbox" name="athletics[]"value="Rugby, Girls"><label>Rugby, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Sailing"><label>Sailing</label> <br>
						<input type="checkbox" name="athletics[]" value="Ski & Snowboard, Boys"><label>Ski & Snowboard, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Ski & Snowboard, Girls"><label>Ski & Snowboard, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Soccer, Boys"><label>Soccer, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Soccer, Girls"><label>Soccer, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Softball"><label>Softball</label> <br>
						<input type="checkbox" name="athletics[]" value="Swimming, Boys"><label>Swimming, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Swimming, Girls"><label>Swimming, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Table Tennis"><label>Table Tennis</label> <br>
						<input type="checkbox" name="athletics[]" value="Tennis, Boys"><label>Tennis, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Tennis, Girls"><label>Tennis, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Track & Field, Boys"><label>Track & Field, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Track & Field, Girls"><label>Track & Field, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Ultimate Frisbee, Boys"><label>Ultimate Frisbee, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Ultimate Frisbee, Girls"><label>Ultimate Frisbee, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Volleyball, Boys"><label>Volleyball, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Volleyball, Girls"><label>Volleyball, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Water Polo"><label>Water Polo</label> <br>
						<input type="checkbox" name="athletics[]" value="Wrestling"><label>Wrestling</label> <br>
				<input type="text" class="group" name="athletics1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Elementary School":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Elementary School Groups to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label>
			<br><br>
			<div class="groupcolumns">
				<div class="groupsection">
					<span>Clubs & Organizations:</span>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="4-H"><label>4-H</label> <br>
						<input type="checkbox" name="clubs[]" value="Art Club"><label>Art Club</label> <br>
						<input type="checkbox" name="clubs[]" value="Band"><label>Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Booster Club"><label>Booster Club</label> <br>
						<input type="checkbox" name="clubs[]" value="Carnival"><label>Carnival</label> <br>
						<input type="checkbox" name="clubs[]" value="Choir"><label>Choir</label> <br>
						<input type="checkbox" name="clubs[]" value="Math Club"><label>Math Club</label> <br>
						<input type="checkbox" name="clubs[]" value="PTA/PTO/PTC"><label>PTA/PTO/PTC</label> <br>
						<input type="checkbox" name="clubs[]" value="Science Club"><label>Science Club</label> <br>
						<input type="checkbox" name="clubs[]" value="Theatre & Drama"><label>Theatre & Drama</label> <br>
						<input type="text" class="group" name="clubs[]" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection">
					<span>General Needs:</span>
					<div class="checkboxes">
						<input type="checkbox" name="general[]" value="General"><label>General</label> <br>
						<input type="checkbox" name="general[]" value="After-School Program"><label>After-School Program</label> <br>
						<input type="checkbox" name="general[]" value="Athletic Equipment"><label>Athletic Equipment </label> <br>
						<input type="checkbox" name="general[]" value="Field Trips & Travel"><label>Field Trips & Travel </label> <br>
						<input type="checkbox" name="general[]" value="Library & Technology"><label>Library & Technology</label> <br>
						<input type="checkbox" name="general[]" value="Projection, Audio, Video"><label>Projection, Audio, Video</label> <br>
						<input type="checkbox" name="general[]" value="Tablets, Laptops & PCs"><label>Tablets, Laptops & PCs</label> <br>
						<input type="text" class="group" name="clubs[]" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				
				<br><br>
				
				<div class="groupsection2">		
					<span id="">Athletics</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="athletics[]" value="Baseball"><label>Baseball</label> <br>
						<input type="checkbox" name="athletics[]" value="Basketball, Boys"><label>Basketball, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Basketball, Girls"><label>Basketball, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Biking"><label>Biking</label> <br>
						<input type="checkbox" name="athletics[]" value="Football"><label>Football</label> <br>
						<input type="checkbox" name="athletics[]" value="Gymnastics, Boys"><label>Gymnastics, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Gymnastics, Girls"><label>Gymnastics, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Ice Hockey, Boys"><label>Ice Hockey, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Ice Hockey, Girls"><label>Ice Hockey, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Lacrosse, Boys"><label>Lacrosse, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Lacrosse, Girls"><label>Lacrosse, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Soccer, Boys"><label>Soccer, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Soccer, Girls"><label>Soccer, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Softball"><label>Softball</label> <br>
						<input type="checkbox" name="athletics[]" value="Swimming, Boys"><label>Swimming, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Swimming, Girls"><label>Swimming, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="T-Ball"><label>T-Ball</label> <br>
						<input type="checkbox" name="athletics[]" value="Track & Field, Boys"><label>Track & Field, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Track & Field, Girls"><label>Track & Field, Girls</label> <br>
						<input type="checkbox" name="athletics[]" value="Volleyball, Boys"><label>Volleyball, Boys</label> <br>
						<input type="checkbox" name="athletics[]" value="Volleyball, Girls"><label>Volleyball, Girls</label> <br>
			<input type="text" class="group" name="athletics1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Pre-School":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Pre-School Groups to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label>
			<br><br>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Equipment & Supplies"><label>Equipment & Supplies</label> <br>
						<input type="checkbox" name="clubs[]" value="Field Trips & Travel"><label>Field Trips & Travel</label> <br>
						<input type="checkbox" name="clubs[]" value="Playground Equipment"><label>Playground Equipment</label> <br>
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><label>Projection, Audio, Video</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><label>Tablets, Laptops & PCs</label> <br>
						<input type="text" class="group" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Home School":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Home School Groups to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label>
			<br><br>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><label>Projection, Audio, Video</label> <br>
						<input type="text" class="group" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Trade, Vocational & Tech":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Trade, Vocational & Tech Groups to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label>
			<br><br>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Field Trips & Travel"><label>Field Trips & Travel</label> <br>
						<input type="checkbox" name="clubs[]" value="General Equipment"><label>General Equipment</label> <br>
						<input type="checkbox" name="clubs[]" value="Trade Supplies"><label>Trade Supplies</label> <br>
						<input type="text" class="group" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Camps":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Camp Groups to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label>
			<br><br>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Bible Camps"><label>Bible Camps</label> <br>
						<input type="checkbox" name="clubs[]" value="Dance Camps"><label>Dance Camps</label> <br>
						<input type="checkbox" name="clubs[]" value="Education Camps"><label>Education Camps</label> <br>
						<input type="checkbox" name="clubs[]" value="Family Camps"><label>Family Camps</label> <br>
						<input type="checkbox" name="clubs[]" value="General Camps"><label>General Camps</label> <br>
						<input type="checkbox" name="clubs[]" value="Music Camps"><label>Music Camps</label> <br>
						<input type="checkbox" name="clubs[]" value="Scouting Camps"><label>Scouting Camps</label> <br>
						<input type="checkbox" name="clubs[]" value="Sports Camps"><label>Sports Camps</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth Camps"><label>Youth Camps</label> <br>
						<input type="text" class="group" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
         
		
		case "Religious Organization":
           echo '<div class="interim-form"> 
           <div class="interim-header"><h2>Select Religious Organization to Setup</h2></div>
           
           <input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label>
           <br><br>

		<div class="groupcolumns">
	            	<div class="groupsection">
	            		<div class="checkboxes">
					<input type="checkbox" name="clubs[]" value="Main Church Website"><label>Main Church Website</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Camp"><label>Bible Camp</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Study"><label>Bible Study</label> <br>
						<input type="checkbox" name="clubs[]" value="Building Fund"><label>Building Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Choir & Band"><label>Choir & Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Christmas Giving Tree"><label>Christmas Giving Tree</label> <br>
						<input type="checkbox" name="clubs[]" value="Faith Formation"><label>Faith Formation</label> <br>
						<input type="checkbox" name="clubs[]" value="Festivals"><label>Festivals</label> <br>
						<input type="checkbox" name="clubs[]" value="Men’s Ministry"><label>Men’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Outreach Ministry"><label>Outreach Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Parish Fund"><label>Parish Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><label>Projection, Audio, Video</label> <br>
						<input type="checkbox" name="clubs[]" value="Student Ministry"><label>Student Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Sunday School"><label>Sunday School</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><label>Tablets, Laptops & PCs</label> <br>
						<input type="checkbox" name="clubs[]" value="Women’s Ministry"><label>Women’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth’s Ministry"><label>Youth’s Ministry</label> <br>
					<input type="text" class="group" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
				</div> <!-- end checkboxes -->
			</div> <!-- end groupsection -->
	
			<div class="groupsection">
				<span id="">Missionary Funds</span><br>
				<div class="checkboxes">
					<input type="checkbox" name="general[]" value="All Missions"><label>All Missions</label> <br>
					<input type="checkbox" name="general[]" value="College Missions"><label>College Missions</label> <br>
					<input type="checkbox" name="general[]" value="Overseas Missions"><label>Overseas Missions</label> <br>
					<input type="checkbox" name="general[]" value="Youth & Teen"><label>Youth & Teen</label> <br><input type="text" class="group" name="general1" value="" placeholder="Please type in the club" title="Other"> <br>
				</div> <!-- end checkboxes -->
			</div> <!-- end groupsection -->
		</div> <!-- end groupcolumns -->
           </div> <!-- end interim-form -->';
           break;

	case "Faith Based Organization":
           echo '<div class="interim-form"> 
           <div class="interim-header"><h2>Select Faith Based Organization to Setup</h2></div>
           
           <input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label>
           <br><br>

			<div class="groupcolumns">
	            	<div class="groupsection">
	            		<div class="checkboxes">
					<input type="checkbox" name="clubs[]" value="Main Church Website"><label>Main Church Website</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Camp"><label>Bible Camp</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Study"><label>Bible Study</label> <br>
						<input type="checkbox" name="clubs[]" value="Building Fund"><label>Building Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Choir & Band"><label>Choir & Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Christmas Giving Tree"><label>Christmas Giving Tree</label> <br>
						<input type="checkbox" name="clubs[]" value="Faith Formation"><label>Faith Formation</label> <br>
						<input type="checkbox" name="clubs[]" value="Festivals"><label>Festivals</label> <br>
						<input type="checkbox" name="clubs[]" value="Men’s Ministry"><label>Men’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Outreach Ministry"><label>Outreach Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Parish Fund"><label>Parish Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><label>Projection, Audio, Video</label> <br>
						<input type="checkbox" name="clubs[]" value="Student Ministry"><label>Student Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Sunday School"><label>Sunday School</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><label>Tablets, Laptops & PCs</label> <br>
						<input type="checkbox" name="clubs[]" value="Women’s Ministry"><label>Women’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth’s Ministry"><label>Youth’s Ministry</label> <br>
					<input type="text" class="group" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
				</div> <!-- end checkboxes -->
			</div> <!-- end groupsection -->
	
			<div class="groupsection">
				<span id="">Missionary Funds</span><br>
				<div class="checkboxes">
					<input type="checkbox" name="general[]" value="All Missions"><label>All Missions</label> <br>
					<input type="checkbox" name="general[]" value="College Missions"><label>College Missions</label> <br>
					<input type="checkbox" name="general[]" value="Overseas Missions"><label>Overseas Missions</label> <br>
					<input type="checkbox" name="general[]" value="Youth & Teen"><label>Youth & Teen</label> <br>
				</div> <!-- end checkboxes -->
			</div> <!-- end groupsection -->
		</div> <!-- end groupcolumns -->
           </div> <!-- end interim-form -->';
           break;	
	
	 
           case "Baptist":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Baptist Organization to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Main Church Website"><label>Main Church Website</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Camp"><label>Bible Camp</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Study"><label>Bible Study</label> <br>
						<input type="checkbox" name="clubs[]" value="Building Fund"><label>Building Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Choir & Band"><label>Choir & Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Christmas Giving Tree"><label>Christmas Giving Tree</label> <br>
						<input type="checkbox" name="clubs[]" value="Faith Formation"><label>Faith Formation</label> <br>
						<input type="checkbox" name="clubs[]" value="Festivals"><label>Festivals</label> <br>
						<input type="checkbox" name="clubs[]" value="Men’s Ministry"><label>Men’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Outreach Ministry"><label>Outreach Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Parish Fund"><label>Parish Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><label>Projection, Audio, Video</label> <br>
						<input type="checkbox" name="clubs[]" value="Student Ministry"><label>Student Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Sunday School"><label>Sunday School</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><label>Tablets, Laptops & PCs</label> <br>
						<input type="checkbox" name="clubs[]" value="Women’s Ministry"><label>Women’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth’s Ministry"><label>Youth’s Ministry</label> <br>
						<input type="text" class="group" name="clubs[]" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection">
					<span id="">Missionary Funds</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="genral[]" value="All Missions"><label>All Missions</label> <br>
						<input type="checkbox" name="general[]" value="College Missions"><label>College Missions</label> <br>
						<input type="checkbox" name="general[]" value="Overseas Missions"><label>Overseas Missions</label> <br>
						<input type="checkbox" name="general[]" value="Youth & Teen"><label>Youth & Teen</label> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Catholic":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Catholic Organization to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Main Church Website"><label>Main Church Website</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Camp"><label>Bible Camp</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Study"><label>Bible Study</label> <br>
						<input type="checkbox" name="clubs[]" value="Building Fund"><label>Building Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Choir & Band"><label>Choir & Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Christmas Giving Tree"><label>Christmas Giving Tree</label> <br>
						<input type="checkbox" name="clubs[]" value="Faith Formation"><label>Faith Formation</label> <br>
						<input type="checkbox" name="clubs[]" value="Festivals"><label>Festivals</label> <br>
						<input type="checkbox" name="clubs[]" value="Men’s Ministry"><label>Men’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Outreach Ministry"><label>Outreach Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Parish Fund"><label>Parish Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><label>Projection, Audio, Video</label> <br>
						<input type="checkbox" name="clubs[]" value="Student Ministry"><label>Student Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Sunday School"><label>Sunday School</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><label>Tablets, Laptops & PCs</label> <br>
						<input type="checkbox" name="clubs[]" value="Women’s Ministry"><label>Women’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth’s Ministry"><label>Youth’s Ministry</label> <br>
						<input type="text" class="group" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection">
					<span id="">Missionary Funds</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="general[]" value="All Missions"><label>All Missions</label> <br>
						<input type="checkbox" name="general[]" value="College Missions"><label>College Missions</label> <br>
						<input type="checkbox" name="general[]" value="Overseas Missions"><label>Overseas Missions</label> <br>
						<input type="checkbox" name="general[]" value="Youth & Teen"><label>Youth & Teen</label> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Episcopal":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Episcopal Organization to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Main Church Website"><label>Main Church Website</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Camp"><label>Bible Camp</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Study"><label>Bible Study</label> <br>
						<input type="checkbox" name="clubs[]" value="Building Fund"><label>Building Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Choir & Band"><label>Choir & Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Christmas Giving Tree"><label>Christmas Giving Tree</label> <br>
						<input type="checkbox" name="clubs[]" value="Faith Formation"><label>Faith Formation</label> <br>
						<input type="checkbox" name="clubs[]" value="Festivals"><label>Festivals</label> <br>
						<input type="checkbox" name="clubs[]" value="Men’s Ministry"><label>Men’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Outreach Ministry"><label>Outreach Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Parish Fund"><label>Parish Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><label>Projection, Audio, Video</label> <br>
						<input type="checkbox" name="clubs[]" value="Student Ministry"><label>Student Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Sunday School"><label>Sunday School</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><label>Tablets, Laptops & PCs</label> <br>
						<input type="checkbox" name="clubs[]" value="Women’s Ministry"><label>Women’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth’s Ministry"><label>Youth’s Ministry</label> <br>
						<input type="text" class="group" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection">
					<span id="">Missionary Funds</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="general[]" value="All Missions"><label>All Missions</label> <br>
						<input type="checkbox" name="general[]" value="College Missions"><label>College Missions</label> <br>
						<input type="checkbox" name="general[]" value="Overseas Missions"><label>Overseas Missions</label> <br>
						<input type="checkbox" name="general[]" value="Youth & Teen"><label>Youth & Teen</label> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Lutheran":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Lutheran Organization to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Main Church Website"><label>Main Church Website</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Camp"><label>Bible Camp</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Study"><label>Bible Study</label> <br>
						<input type="checkbox" name="clubs[]" value="Building Fund"><label>Building Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Choir & Band"><label>Choir & Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Christmas Giving Tree"><label>Christmas Giving Tree</label> <br>
						<input type="checkbox" name="clubs[]" value="Faith Formation"><label>Faith Formation</label> <br>
						<input type="checkbox" name="clubs[]" value="Festivals"><label>Festivals</label> <br>
						<input type="checkbox" name="clubs[]" value="Men’s Ministry"><label>Men’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Outreach Ministry"><label>Outreach Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Parish Fund"><label>Parish Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><label>Projection, Audio, Video</label> <br>
						<input type="checkbox" name="clubs[]" value="Student Ministry"><label>Student Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Sunday School"><label>Sunday School</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><label>Tablets, Laptops & PCs</label> <br>
						<input type="checkbox" name="clubs[]" value="Women’s Ministry"><label>Women’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth’s Ministry"><label>Youth’s Ministry</label> <br>
						<input type="text" class="group" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection">
					<span id="">Missionary Funds</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="general[]" value="All Missions"><label>All Missions</label> <br>
						<input type="checkbox" name="general[]" value="College Missions"><label>College Missions</label> <br>
						<input type="checkbox" name="general[]" value="Overseas Missions"><label>Overseas Missions</label> <br>
						<input type="checkbox" name="general[]" value="Youth & Teen"><label>Youth & Teen</label> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Methodist":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Methodist Organization to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Main Church Website"><label>Main Church Website</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Camp"><label>Bible Camp</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Study"><label>Bible Study</label> <br>
						<input type="checkbox" name="clubs[]" value="Building Fund"><label>Building Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Choir & Band"><label>Choir & Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Christmas Giving Tree"><label>Christmas Giving Tree</label> <br>
						<input type="checkbox" name="clubs[]" value="Faith Formation"><label>Faith Formation</label> <br>
						<input type="checkbox" name="clubs[]" value="Festivals"><label>Festivals</label> <br>
						<input type="checkbox" name="clubs[]" value="Men’s Ministry"><label>Men’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Outreach Ministry"><label>Outreach Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Parish Fund"><label>Parish Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><label>Projection, Audio, Video</label> <br>
						<input type="checkbox" name="clubs[]" value="Student Ministry"><label>Student Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Sunday School"><label>Sunday School</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><label>Tablets, Laptops & PCs</label> <br>
						<input type="checkbox" name="clubs[]" value="Women’s Ministry"><label>Women’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth’s Ministry"><label>Youth’s Ministry</label> <br>
						<input type="text" class="group" name="clubs[1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection">
					<span id="">Missionary Funds</span><br>
					<div class="checkboxes">						
						<input type="checkbox" name="general[]" value="All Missions"><label>All Missions</label> <br>
						<input type="checkbox" name="general[]" value="College Missions"><label>College Missions</label> <br>
						<input type="checkbox" name="general[]" value="Overseas Missions"><label>Overseas Missions</label> <br>
						<input type="checkbox" name="general[]" value="Youth & Teen"><label>Youth & Teen</label> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Presbyterian":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Presbyterian Organization to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Main Church Website"><label>Main Church Website</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Camp"><label>Bible Camp</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Study"><label>Bible Study</label> <br>
						<input type="checkbox" name="clubs[]" value="Building Fund"><label>Building Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Choir & Band"><label>Choir & Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Christmas Giving Tree"><label>Christmas Giving Tree</label> <br>
						<input type="checkbox" name="clubs[]" value="Faith Formation"><label>Faith Formation</label> <br>
						<input type="checkbox" name="clubs[]" value="Festivals"><label>Festivals</label> <br>
						<input type="checkbox" name="clubs[]" value="Men’s Ministry"><label>Men’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Outreach Ministry"><label>Outreach Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Parish Fund"><label>Parish Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><label>Projection, Audio, Video</label> <br>
						<input type="checkbox" name="clubs[]" value="Student Ministry"><label>Student Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Sunday School"><label>Sunday School</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><label>Tablets, Laptops & PCs</label> <br>
						<input type="checkbox" name="clubs[]" value="Women’s Ministry"><label>Women’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth’s Ministry"><label>Youth’s Ministry</label> <br>
						<input type="text" class="group" name="clubs[]" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection">
					<span id="">Missionary Funds</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="general[]" value="All Missions"><label>All Missions</label> <br>
						<input type="checkbox" name="general[]" value="College Missions"><label>College Missions</label> <br>
						<input type="checkbox" name="general[]" value="Overseas Missions"><label>Overseas Missions</label> <br>
						<input type="checkbox" name="general[]" value="Youth & Teen"><label>Youth & Teen</label> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Orthodox":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Orthodox Organization to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Main Church Website"><label>Main Church Website</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Camp"><label>Bible Camp</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Study"><label>Bible Study</label> <br>
						<input type="checkbox" name="clubs[]" value="Building Fund"><label>Building Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Choir & Band"><label>Choir & Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Christmas Giving Tree"><label>Christmas Giving Tree</label> <br>
						<input type="checkbox" name="clubs[]" value="Faith Formation"><label>Faith Formation</label> <br>
						<input type="checkbox" name="clubs[]" value="Festivals"><label>Festivals</label> <br>
						<input type="checkbox" name="clubs[]" value="Men’s Ministry"><label>Men’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Outreach Ministry"><label>Outreach Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Parish Fund"><label>Parish Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><label>Projection, Audio, Video</label> <br>
						<input type="checkbox" name="clubs[]" value="Student Ministry"><label>Student Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Sunday School"><label>Sunday School</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><label>Tablets, Laptops & PCs</label> <br>
						<input type="checkbox" name="clubs[]" value="Women’s Ministry"><label>Women’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth’s Ministry"><label>Youth’s Ministry</label> <br>
						<input type="text" class="group" name="clubs[]" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection">
					<span id="">Missionary Funds</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="general[]" value="All Missions"><label>All Missions</label> <br>
						<input type="checkbox" name="general[]" value="College Missions"><label>College Missions</label> <br>
						<input type="checkbox" name="general[]" value="Overseas Missions"><label>Overseas Missions</label> <br>
						<input type="checkbox" name="general[]" value="Youth & Teen"><label>Youth & Teen</label> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Reformed":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Reformed Organization to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Main Church Website"><label>Main Church Website</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Camp"><label>Bible Camp</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Study"><label>Bible Study</label> <br>
						<input type="checkbox" name="clubs[]" value="Building Fund"><label>Building Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Choir & Band"><label>Choir & Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Christmas Giving Tree"><label>Christmas Giving Tree</label> <br>
						<input type="checkbox" name="clubs[]" value="Faith Formation"><label>Faith Formation</label> <br>
						<input type="checkbox" name="clubs[]" value="Festivals"><label>Festivals</label> <br>
						<input type="checkbox" name="clubs[]" value="Men’s Ministry"><label>Men’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Outreach Ministry"><label>Outreach Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Parish Fund"><label>Parish Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><label>Projection, Audio, Video</label> <br>
						<input type="checkbox" name="clubs[]" value="Student Ministry"><label>Student Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Sunday School"><label>Sunday School</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><label>Tablets, Laptops & PCs</label> <br>
						<input type="checkbox" name="clubs[]" value="Women’s Ministry"><label>Women’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth’s Ministry"><label>Youth’s Ministry</label> <br>
						<input type="text" class="group" name="clubs[]" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection">
					<span id="">Missionary Funds</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="general[]" value="All Missions"><label>All Missions</label> <br>
						<input type="checkbox" name="general[]" value="College Missions"><label>College Missions</label> <br>
						<input type="checkbox" name="general[]" value="Overseas Missions"><label>Overseas Missions</label> <br>
						<input type="checkbox" name="general[]" value="Youth & Teen"><label>Youth & Teen</label> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Spirit-Filled":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Spirit-Filled Organization to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Main Church Website"><label>Main Church Website</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Camp"><label>Bible Camp</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Study"><label>Bible Study</label> <br>
						<input type="checkbox" name="clubs[]" value="Building Fund"><label>Building Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Choir & Band"><label>Choir & Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Christmas Giving Tree"><label>Christmas Giving Tree</label> <br>
						<input type="checkbox" name="clubs[]" value="Faith Formation"><label>Faith Formation</label> <br>
						<input type="checkbox" name="clubs[]" value="Festivals"><label>Festivals</label> <br>
						<input type="checkbox" name="clubs[]" value="Men’s Ministry"><label>Men’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Outreach Ministry"><label>Outreach Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Parish Fund"><label>Parish Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><label>Projection, Audio, Video</label> <br>
						<input type="checkbox" name="clubs[]" value="Student Ministry"><label>Student Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Sunday School"><label>Sunday School</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><label>Tablets, Laptops & PCs</label> <br>
						<input type="checkbox" name="clubs[]" value="Women’s Ministry"><label>Women’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth’s Ministry"><label>Youth’s Ministry</label> <br>
						<input type="text" class="group" name="clubs[]" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection">
					<span id="">Missionary Funds</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="general[]" value="All Missions"><label>All Missions</label> <br>
						<input type="checkbox" name="general[]" value="College Missions"><label>College Missions</label> <br>
						<input type="checkbox" name="general[]" value="Overseas Missions"><label>Overseas Missions</label> <br>
						<input type="checkbox" name="general[]" value="Youth & Teen"><label>Youth & Teen</label> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Christian Other":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Christian Other Organization to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Main Church Website"><label>Main Church Website</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Camp"><label>Bible Camp</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Study"><label>Bible Study</label> <br>
						<input type="checkbox" name="clubs[]" value="Building Fund"><label>Building Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Choir & Band"><label>Choir & Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Christmas Giving Tree"><label>Christmas Giving Tree</label> <br>
						<input type="checkbox" name="clubs[]" value="Faith Formation"><label>Faith Formation</label> <br>
						<input type="checkbox" name="clubs[]" value="Festivals"><label>Festivals</label> <br>
						<input type="checkbox" name="clubs[]" value="Men’s Ministry"><label>Men’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Outreach Ministry"><label>Outreach Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Parish Fund"><label>Parish Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><label>Projection, Audio, Video</label> <br>
						<input type="checkbox" name="clubs[]" value="Student Ministry"><label>Student Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Sunday School"><label>Sunday School</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><label>Tablets, Laptops & PCs</label> <br>
						<input type="checkbox" name="clubs[]" value="Women’s Ministry"><label>Women’s Ministry</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth’s Ministry"><label>Youth’s Ministry</label> <br>
						<input type="text" class="group" name="clubs[]" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection">
					<span id="">Missionary Funds</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="general[]" value="All Missions"><label>All Missions</label> <br>
						<input type="checkbox" name="general[]" value="College Missions"><label>College Missions</label> <br>
						<input type="checkbox" name="general[]" value="Overseas Missions"><label>Overseas Missions</label> <br>
						<input type="checkbox" name="general[]" value="Youth & Teen"><label>Youth & Teen</label> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Jewish Conservative":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Jewish Conservative Organization to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Main Synagogue Website"><label>Main Synagogue Website</label> <br>
						<input type="checkbox" name="clubs[]" value="Jewish Summer Camp"><label>Jewish Summer Camp</label> <br>
						<input type="checkbox" name="clubs[]" value="Hebrew Bible Study"><label>Hebrew Bible Study</label> <br>
						<input type="checkbox" name="clubs[]" value="Building Fund"><label>Building Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Choir & Band"><label>Choir & Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Festivals"><label>Festivals</label> <br>
						<input type="checkbox" name="clubs[]" value="Synagogue Fund"><label>Synagogue Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><label>Projection, Audio, Video</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><label>Tablets, Laptops & PCs</label> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection">
					<span id="">Mission Trips</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="general[]" value="All Missions"><label>All Missions</label> <br>
						<input type="checkbox" name="general[]" value="College Missions"><label>College Missions</label> <br>
						<input type="checkbox" name="general[]"value="Israel Mission"><label>Israel Mission</label> <br>
						<input type="checkbox" name="general[]" value="Overseas Missions"><label>Overseas Missions</label> <br>
						<input type="checkbox" name="general[]" value="Youth & Teen"><label>Youth & Teen</label> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Jewish Orthodox":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Jewish Orthodox Organization to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Main Synagogue Website"><label>Main Synagogue Website</label> <br>
						<input type="checkbox" name="clubs[]" value="Jewish Summer Camp"><label>Jewish Summer Camp</label> <br>
						<input type="checkbox" name="clubs[]" value="Hebrew Bible Study"><label>Hebrew Bible Study</label> <br>
						<input type="checkbox" name="clubs[]" value="Building Fund"><label>Building Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Choir & Band"><label>Choir & Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Festivals"><label>Festivals</label> <br>
						<input type="checkbox" name="clubs[]" value="Synagogue Fund"><label>Synagogue Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><label>Projection, Audio, Video</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><label>Tablets, Laptops & PCs</label> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection">
					<span id="">Mission Trips</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="general[]" value="All Missions"><label>All Missions</label> <br>
						<input type="checkbox" name="general[]" value="College Missions"><label>College Missions</label> <br>
						<input type="checkbox" name="general[]" value="Israel Mission"><label>Israel Mission</label> <br>
						<input type="checkbox" name="general[]" value="Overseas Missions"><label>Overseas Missions</label> <br>
						<input type="checkbox" name="general[]" value="Youth & Teen"><label>Youth & Teen</label> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Jewish Reformed":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Jewish Reformed Organization to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Main Synagogue Website"><label>Main Synagogue Website</label> <br>
						<input type="checkbox" name="clubs[]" value="Jewish Summer Camp"><label>Jewish Summer Camp</label> <br>
						<input type="checkbox" name="clubs[]" value="Hebrew Bible Study"><label>Hebrew Bible Study</label> <br>
						<input type="checkbox" name="clubs[]" value="Building Fund"><label>Building Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Choir & Band"><label>Choir & Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Festivals"><label>Festivals</label> <br>
						<input type="checkbox" name="clubs[]" value="Synagogue Fund"><label>Synagogue Fund</label> <br>
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><label>Projection, Audio, Video</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><label>Tablets, Laptops & PCs</label> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection">
					<span id="">Mission Trips</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="general[]" value="All Missions"><label>All Missions</label> <br>
						<input type="checkbox" name="general[]" value="College Missions"><label>College Missions</label> <br>
						<input type="checkbox" name="general[]" value="Israel Mission"><label>Israel Mission</label> <br>
						<input type="checkbox" name="general[]" value="Overseas Missions"><label>Overseas Missions</label> <br>
						<input type="checkbox" name="general[]" value="Youth & Teen"><label>Youth & Teen</label> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		
		case "Buddhist":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Buddhist Organization to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Main Website"><label>Main Website</label> <br>
						<input type="text" class="group" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		
		case "Hindu":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Hindu Organization to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Main Website"><label>Main Website</label> <br>
						<input type="text" class="group" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		
		case "Muslim":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Muslim Organization to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Main Website"><label>Main Website</label> <br>
						<input type="text" class="group" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		
		case "Other Faiths":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Other Faiths Organization to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Main Website"><label>Main Website</label> <br>
						<input type="text" class="group" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		
		case "Local & National Organization":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Local & National Organization to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Jaycees"><label>Jaycees</label> <br>
						<input type="checkbox" name="clubs[]" value="Junior League"><label>Junior League</label> <br>
						<input type="checkbox" name="clubs[]" value="Kiwanis"><label>Kiwanis</label> <br>
						<input type="checkbox" name="clubs[]" value="Knights of Columbus"><label>Knights of Columbus</label> <br>
						<input type="checkbox" name="clubs[]" value="Lion&#39;s Club International (LCI)"><label>Lion&#39;s Club International (LCI)</label> <br>
						<input type="checkbox" name="clubs[]" value="Masonic Service Association"><label>Masonic Service Association</label> <br>
						<input type="checkbox" name="clubs[]" value="Optimist International"><label>Optimist International</label> <br>
						<input type="checkbox" name="clubs[]" value="Rotary Club"><label>Rotary Club</label> <br>
						<input type="checkbox" name="clubs[]" value="Shriners International"><label>Shriners International</label> <br>
						<input type="checkbox" name="clubs[]" value="The American Legion"><label>The American Legion</label> <br>
						<input type="checkbox" name="clubs[]" value="Veterans of Foreign Wars (VFW)"><label>Veterans of Foreign Wars (VFW)</label> <br>
						<input type="text" class="group" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Local & National Charity":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Local or National Charity to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection2">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Alzheimer Foundation of America (AFA)"><label>Alzheimer Foundation of America (AFA)</label> <br>
						<input type="checkbox" name="clubs[]" value="American Cancer Society"><label>American Cancer Society</label> <br>
						<input type="checkbox" name="clubs[]" value="American Diabetes Association"><label>American Diabetes Association</label> <br>
						<input type="checkbox" name="clubs[]" value="American Heart Association"><label>American Heart Association</label> <br>
						<input type="checkbox" name="clubs[]" value="American Red Cross"><label>American Red Cross</label> <br>
						<input type="checkbox" name="clubs[]" value="Boys & Girls Clubs of America"><label>Boys & Girls Clubs of America</label> <br>
						<input type="checkbox" name="clubs[]" value="Cancer Research Institute"><label>Cancer Research Institute</label> <br>
						<input type="checkbox" name="clubs[]" value="Cerebral Palsy"><label>Cerebral Palsy</label> <br>
						<input type="checkbox" name="clubs[]" value="Goodwill Industries International"><label>Goodwill Industries International</label> <br>
						<input type="checkbox" name="clubs[]" value="Habitat for Humanity"><label>Habitat for Humanity</label> <br>
						<input type="checkbox" name="clubs[]" value="Leukemia & Lymphoma Society"><label>Leukemia & Lymphoma Society</label> <br>
						<input type="checkbox" name="clubs[]" value="Lymphoma Association"><label>Lymphoma Association</label> <br>
						<input type="checkbox" name="clubs[]" value="Make-A-Wish Foundaion of America"><label>Make-A-Wish Foundaion of America</label> <br>
						<input type="checkbox" name="clubs[]" value="March of Dimes"><label>March of Dimes</label> <br>
						<input type="checkbox" name="clubs[]" value="Muscular Dystrophy Association (MDA)"><label>Muscular Dystrophy Association (MDA)</label> <br>
						<input type="checkbox" name="clubs[]" value="Shriners International"><label>Shriners International</label> <br>
						<input type="checkbox" name="clubs[]" value="Special Olympics"><label>Special Olympics</label> <br>
						<input type="checkbox" name="clubs[]" value="St. Jude Childrens&#39;s Research Hospital"><label>St. Jude Childrens&#39;s Research Hospital</label> <br>
						<input type="checkbox" name="clubs[]" value="Susan G. Komen"><label>Susan G. Komen</label> <br>
						<input type="checkbox" name="clubs[]" value="The Salvation Army"><label>The Salvation Army</label> <br>
						<input type="checkbox" name="clubs[]" value="The Simon Wiesenthal Foundation"><label>The Simon Wiesenthal Foundation</label> <br>
						<input type="checkbox" name="clubs[]" value="United Way"><label>United Way</label> <br>
						<input type="checkbox" name="clubs[]" value="Wounded Warrior Project"><label>Wounded Warrior Project</label> <br>
						<input type="text" class="group" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Community Organization":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Community Organization to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Animal Shelters"><label>Animal Shelters<label></label> <br>
						<input type="checkbox" name="clubs[]" value="ASPCA"><label>ASPCA</label> <br>
						<input type="checkbox" name="clubs[]" value="Community Food Bank"><label>Community Food Bank</label> <br>
						<input type="checkbox" name="clubs[]" value="Fire Department"><label>Fire Department</label> <br>
						<input type="checkbox" name="clubs[]" value="Local Food Shelves"><label>Local Food Shelves</label> <br>
						<input type="checkbox" name="clubs[]" value="Local Homeless Shelters"><label>Local Homeless Shelters</label> <br>
						<input type="checkbox" name="clubs[]" value="Local Women&#39;s Shelters"><label>Local Women&#39;s Shelters</label> <br>
						<input type="checkbox" name="clubs[]" value="Police Department"><label>Police Department</label> <br>
						<input type="text" class="group" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Youth & Sports":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Youth & Sports to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Athletic Associations"><label>Athletic Associations</label> <br>
						<input type="checkbox" name="clubs[]" value="Big Brothers/Big Sisters of America"><label>Big Brothers/Big Sisters of America</label> <br>
						<input type="checkbox" name="clubs[]" value="Boy Scouts"><label>Boy Scouts</label> <br>
						<input type="checkbox" name="clubs[]" value="Girl Scouts"><label>Girl Scouts</label> <br>
						<input type="checkbox" name="clubs[]" value="Summer Leagues"><label>Summer Leagues</label> <br>
						<input type="checkbox" name="clubs[]" value="YMCA"><label>YMCA</label> <br>
						<input type="text" class="group" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Sports League":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Sports League to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Summer League"><label>Summer League</label> <br>
						<input type="text" class="group" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "General":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select General Organization to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs1" value="General"><label>General</label> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
           
           
         }//end switch
	
	echo '<br> <input type="submit" name="submit" class="redbutton" value="Add New Clubs" />';
		
	

mysqli_close($con);
?>