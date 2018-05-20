<?php
      include '../includes/autoload.php';
      if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "RP")
       {
            header('Location: ../index.php');
            exit;
       }
       
       //get user ID and database connection
       $userID = $_SESSION['userId'];
      
       $getGroup = $_GET['group'];

?>
<!DOCTYPE html>
<head>
	<title>GreatMoods | Representative</title>
</head>

<body>
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <?php include 'sideLeftNav.php' ; ?>

      <div id="content">
          <h1>Add Fundraiser Group</h1>
          <h3></h3>
		
	<div class="table">
	<form class="" action="addFundraiser2.php" method="post">
		<div class="tablerow">
			<span id="hd_gmfr2">Fundraiser Account:</span>
		</div> <!-- end row -->
			
		<div class="tablerow">
			<select class="role2">
				<option>Select FR Account</option>
				<?php 
				$getAccount = "SELECT DISTINCT Dealer, Zip FROM Dealers WHERE setuppersonid = '$repID' ORDER BY Dealer";
				$result = mysqli_query($link, $getAccount)
				or die("MySQL ERROR om query 1: ".mysqli_error($link));
				while($row = mysqli_fetch_assoc($result))
				{
				  $dealerName = $row['Dealer'];
				  echo '
				  <option value="'.$row[loginid].'">'.$dealerName.' Zip Code: '.$row[Zip].'</option>
				  ';
			        }
				?>
				
			</select>
		</div> <!-- end row -->
		
		<br>
		
		<div class="interim-form">
		<div class="interim-header"><h2>Select Group(s)</h2></div>
			<div class="groupcolumns">
				<h6>Education</h6>
				<div class="groupsection">
					<h7>Elementary School</h7><br>
					<span id="">Clubs & Organizations</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value=""><label>Select All Groups</label> <br>
						<input type="checkbox" name="clubs[]" value="After School Programs"><label>After School Programs</label> <br>
					           <input type="checkbox" name="clubs[]" value="Band"><label>Band</label> <br>
					           <input type="checkbox" name="clubs[]" value="Booster Club"><label>Booster Club</label> <br>
					           <input type="checkbox" name="clubs[]" value="School Carnival"><label>School Carnival</label> <br>
					           <input type="checkbox" name="clubs[]" value="Choir"><label>Choir</label> <br>
					           <input type="checkbox" name="clubs[]" value="Class Field Trip"><label>Class Field Trip</label> <br>
					           <input type="checkbox" name="clubs[]" value="Library"><label>Library</label> <br>
					           <input type="checkbox" name="clubs[]" value="PTA/PTO"><label>PTA/PTO</label> <br>
					           <input type="checkbox" name="clubs[]" value="School Counseling"><label>School Counseling</label> <br>
					           <input type="checkbox" name="clubs[]" value="Science Club"><label>Science Club</label> <br>
					           <input type="checkbox" name="clubs[]" value="Math Club"><label>Math Club</label> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
						
				<div class="groupsection">
					<span id="">General</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value=""><label>Select All Groups</label> <br>
						<input type="checkbox" name="clubs[]" value="General"><label>General</label> <br>
						<input type="checkbox" name="clubs[]" value="Graduation"><label>Graduation</label> <br>
						<input type="checkbox" name="clubs[]" value="After-School Program"><label>After-School Program</label> <br>
						<input type="checkbox" name="clubs[]" value="Athletic Equipment"><label>Athletic Equipment</label> <br>
						<input type="checkbox" name="clubs[]" value="Electronic Projection & A/V"><label>Electronic Projection & A/V</label> <br>
						<input type="checkbox" name="clubs[]" value="Field Trips & Travel"><label>Field Trips & Travel</label> <br>
						<input type="checkbox" name="clubs[]" value="Library & Technology"><label>Library & Technology</label> <br>
						<input type="checkbox" name="clubs[]" value="Playground Equipment"><label>Playground Equipment</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, PCs & Internet"><label>Tablets, PCs & Internet</label> 
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				
				<div class="groupsection">		
					<span id="">Athletics</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value=""><label>Select All Groups</label> <br>
						<input type="checkbox" name="clubs[]" value="Baseball"><label>Baseball</label> <br>
						<input type="checkbox" name="clubs[]" value="Basketball, Boys"><label>Basketball, Boys</label> <br>
						<input type="checkbox" name="clubs[]" value="Basketball, Girls"><label>Basketball, Girls</label> <br>
						<input type="checkbox" name="clubs[]" value="Biking"><label>Biking</label> <br>
						<input type="checkbox" name="clubs[]" value="Football"><label>Football</label> <br>
						<input type="checkbox" name="clubs[]" value="Gymnastics, Boys"><label>Gymnastics, Boys</label> <br>
						<input type="checkbox" name="clubs[]" value="Gymnastics, Girls"><label>Gymnastics, Girls</label> <br>
						<input type="checkbox" name="clubs[]" value="Ice Hockey, Boys"><label>Ice Hockey, Boys</label> <br>
						<input type="checkbox" name="clubs[]" value="Ice Hockey, Girls"><label>Ice Hockey, Girls</label> <br>
						<input type="checkbox" name="clubs[]" value="Lacrosse, Boys"><label>Lacrosse, Boys</label> <br>
						<input type="checkbox" name="clubs[]" value="Lacrosse, Girls"><label>Lacrosse, Girls</label> <br>
						<input type="checkbox" name="clubs[]" value="Soccer, Boys"><label>Soccer, Boys</label> <br>
						<input type="checkbox" name="clubs[]" value="Soccer, Girls"><label>Soccer, Girls</label> <br>
						<input type="checkbox" name="clubs[]" value="Softball"><label>Softball</label> <br>
						<input type="checkbox" name="clubs[]" value="Swimming, Boys"><label>Swimming, Boys</label> <br>
						<input type="checkbox" name="clubs[]" value="Swimming, Girls"><label>Swimming, Girls</label> <br>
						<input type="checkbox" name="clubs[]" value="T-Ball"><label>T-Ball</label> <br>
						<input type="checkbox" name="clubs[]" value="Track & Field, Boys"><label>Track & Field, Boys</label> <br>
						<input type="checkbox" name="clubs[]" value="Track & Field, Girls"><label>Track & Field, Girls</label> <br>
						<input type="checkbox" name="clubs[]" value="Volleyball, Boys"><label>Volleyball, Boys</label> <br>
						<input type="checkbox" name="clubs[]" value="Volleyball, Girls"><label>Volleyball, Girls</label> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				
				<div class="groupsection">
					<h7>Middle School</h7><br>
					<span id="">Clubs & Organizations</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value=""><label>Select All Groups</label> <br>
						<input type="checkbox" name="clubs[]" value="Band"><label>Band</label> <br>
					           <input type="checkbox" name="clubs[]" value="Book Club"><label>Book Club</label> <br>
					           <input type="checkbox" name="clubs[]" value="Booster Club"><label>Booster Club</label> <br>
					           <input type="checkbox" name="clubs[]" value="Chess Club"><label>Chess Club</label> <br>
					           <input type="checkbox" name="clubs[]" value="Choir"><label>Choir</label> <br>
					           <input type="checkbox" name="clubs[]" value="Class Trips"><label>Class Trips</label> <br>
					           <input type="checkbox" name="clubs[]" value="Debate"><label>Debate</label> <br>
					           <input type="checkbox" name="clubs[]" value="Library"><label>Library</label> <br>
					           <input type="checkbox" name="clubs[]" value="PTA/PTO"><label>PTA/PTO</label> <br>
					           <input type="checkbox" name="clubs[]" value="School Counseling"><label>School Counseling</label> <br>
					           <input type="checkbox" name="clubs[]" value="Science Club"><label>Science Club</label> <br>
					           <input type="checkbox" name="clubs[]" value="Math Club"><label>Math Club</label> <br>
					           <input type="checkbox" name="clubs[]" value="General Fundraiser"><label>General Fundraiser </label> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
						
				<div class="groupsection">
					<span id="">General</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value=""><label>Select All Groups</label> <br>
						<input type="checkbox" name="clubs[]" value="General"><label>General</label> <br>
						<input type="checkbox" name="clubs[]" value="Graduation"><label>Graduation</label> <br>
						<input type="checkbox" name="clubs[]" value="After-School Program"><label>After-School Program</label> <br>
						<input type="checkbox" name="clubs[]" value="Athletic Equipment"><label>Athletic Equipment</label> <br>
						<input type="checkbox" name="clubs[]" value="Electronic Projection & A/V"><label>Electronic Projection & A/V</label> <br>
						<input type="checkbox" name="clubs[]" value="Field Trips & Travel"><label>Field Trips & Travel</label> <br>
						<input type="checkbox" name="clubs[]" value="Library & Technology"><label>Library & Technology</label> <br>
						<input type="checkbox" name="clubs[]" value="Playground Equipment"><label>Playground Equipment</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, PCs & Internet"><label>Tablets, PCs & Internet</label> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				
				<div class="groupsection">
					<span id="">Athletics</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value=""><label>Select All Groups</label> <br>
						<input type="checkbox" name="clubs[]" value="Baseball"><label>Baseball</label> <br>
					           <input type="checkbox" name="clubs[]" value="Basketball"><label>Basketball</label> <br>
					           <input type="checkbox" name="clubs[]" value="Bowling"><label>Bowling</label> <br>
					           <input type="checkbox" name="clubs[]" value="Cheerleading"><label>Cheerleading</label> <br>
					           <input type="checkbox" name="clubs[]" value="Cross Country"><label>Cross Country</label> <br>
					           <input type="checkbox" name="clubs[]" value="Football"><label>Football</label> <br>
					           <input type="checkbox" name="clubs[]" value="Field Hockey"><label>Field Hockey</label> <br>
					           <input type="checkbox" name="clubs[]" value="Golf"><label>Golf</label> <br>
					           <input type="checkbox" name="clubs[]" value="Gymnastics"><label>Gymnastics</label> <br>
					           <input type="checkbox" name="clubs[]" value="Ice Hockey"><label>Ice Hockey</label> <br>
					           <input type="checkbox" name="clubs[]" value="Lacrosse"><label>Lacrosse</label> <br>
					           <input type="checkbox" name="clubs[]" value="Ski Club"><label>Ski Club</label> <br>
					           <input type="checkbox" name="clubs[]" value="Soccer"><label>Soccer</label> <br>
					           <input type="checkbox" name="clubs[]" value="Softball"><label>Softball</label> <br>
					           <input type="checkbox" name="clubs[]" value="Swimming"><label>Swimming</label> <br>
					           <input type="checkbox" name="clubs[]" value="Tennis"><label>Tennis</label> <br>
					           <input type="checkbox" name="clubs[]" value="Track & Field"><label>Track & Field</label> <br>
					           <input type="checkbox" name="clubs[]" value="Volleyball"><label>Volleyball</label> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
					
				<div class="groupsection">
					<h7>High School</h7><br>
					<span id="">Clubs & Organizations</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value=""><label>Select All Groups</label> <br>
						<input type="checkbox" name="clubs[]" value="4-H"><label>4-H</label> <br>
						<input type="checkbox" name="clubs[]" value="Band"><label>Band</label> <br>
						<input type="checkbox" name="clubs[]" value="Book Club"><label>Book Club</label> <br>
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
						<input type="checkbox" name="clubs[]" value="National Art HS"><label>National Art HS</label> <br> 
						<input type="checkbox" name="clubs[]" value="National Honor Society"><label>National Honor Society</label> <br>
						<input type="checkbox" name="clubs[]" value="Orchestra"><label>Orchestra</label> <br>
						<input type="checkbox" name="clubs[]" value="Prom Committee"><label>Prom Committe</label> <br>
						<input type="checkbox" name="clubs[]" value="PTA/PTO"><label>PTA/PTO/PTC</label> <br>
						<input type="checkbox" name="clubs[]" value="Science Club"><label>Science Club</label> <br>
						<input type="checkbox" name="clubs[]" value="Scripture Study"><label>Scripture Study</label> <br>
						<input type="checkbox" name="clubs[]" value="Student Council"><label>Student Council</label> <br>
						<input type="checkbox" name="clubs[]" value="Technology/Robotics"><label>Technology/Robotics</label> <br>
						<input type="checkbox" name="clubs[]" value="Theatre & Drama"><label>Theatre & Drama</label> <br>
						<input type="checkbox" name="clubs[]" value="Yearbook"><label>Yearbook</label> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
						
				<div class="groupsection">
					<span id="">General</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value=""><label>Select All Groups</label> <br>
						<input type="checkbox" name="clubs[]" value="General"><label>General</label> <br>
						<input type="checkbox" name="clubs[]" value="Graduation"><label>Graduation</label> <br>
						<input type="checkbox" name="clubs[]" value="Senior Class"><label>Senior Class</label> <br>
						<input type="checkbox" name="clubs[]" value="Junior Class"><label>Junior Class</label> <br>
						<input type="checkbox" name="clubs[]" value="Sophmore Class"><label>Sophmore Class</label> <br>
						<input type="checkbox" name="clubs[]" value="Freshman Class"><label>Freshman Class</label> <br>
						<input type="checkbox" name="clubs[]" value="After-School Program"><label>After-School Program</label> <br>
						<input type="checkbox" name="clubs[]" value="Athletic Equipment"><label>Athletic Equipment</label> <br>
						<input type="checkbox" name="clubs[]" value="Electronic Projection & A/V"><label>Electronic Projection & A/V</label> <br>
						<input type="checkbox" name="clubs[]" value="Field Trips & Travel"><label>Field Trips & Travel</label> <br>
						<input type="checkbox" name="clubs[]" value="Library & Technology"><label>Library & Technology</label> <br>
						<input type="checkbox" name="clubs[]" value="Playground Equipment"><label>Playground Equipment</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, PCs & Internet"><label>Tablets, PCs & Internet</label> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				
				<div class="groupsection">
					<span id="">Athletics</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value=""><label>Select All Groups</label> <br>
						<input type="checkbox" name="clubs[]" value="Archery"><label>Archery</label> <br>
						<input type="checkbox" name="clubs[]" value="Badminton"><label>Badminton</label> <br>
						<input type="checkbox" name="clubs[]" value="Baseball"><label>Baseball</label> <br>
						<input type="checkbox" name="clubs[]" value="Basketball, Boys"><label>Basketball, Boys</label> <br>
						<input type="checkbox" name="clubs[]" value="Basketball, Girls"><label>Basketball, Girls</label> <br>
						<input type="checkbox" name="clubs[]" value="Bowling, Boys"><label>Bowling, Boys</label> <br>
						<input type="checkbox" name="clubs[]" value="Bowling, Girls"><label>Bowling, Girls</label> <br>
						<input type="checkbox" name="clubs[]" value="Cheerleading"><label>Cheerleading</label> <br>
						<input type="checkbox" name="clubs[]" value="Cross Country Running, Boys"><label>Cross Country Running, Boys</label><br>
						<input type="checkbox" name="clubs[]" value="Cross Country Running, Girls"><label>Cross Country Running, Girls</label> <br>
						<input type="checkbox" name="clubs[]" value="Cross Country Skiing, Boys"><label>Cross Country Skiing, Boys</label> <br>
						<input type="checkbox" name="clubs[]" value="Cross Country Skiing, Girls"><label>Cross Country Skiing, Girls</label> <br>
						<input type="checkbox" name="clubs[]" value="Cycling"><label>Cycling</label> <br>
						<input type="checkbox" name="clubs[]" value="Danceline"><label>Danceline</label> <br>
						<input type="checkbox" name="clubs[]" value="Diving, Boys"><label>Diving, Boys</label> <br>
						<input type="checkbox" name="clubs[]" value="Diving, Girls"><label>Diving, Girls</label> <br>
						<input type="checkbox" name="clubs[]" value="Field Hockey"><label>Field Hockey</label> <br>
						<input type="checkbox" name="clubs[]" value="Figure Skating"><label>Figure Skating</label> <br>
						<input type="checkbox" name="clubs[]" value="Football"><label>Football</label> <br>
						<input type="checkbox" name="clubs[]" value="Golf, Boys"><label>Golf, Boys</label> <br>
						<input type="checkbox" name="clubs[]" value="Golf, Girls"><label>Golf, Girls</label> <br>
						<input type="checkbox" name="clubs[]" value="Gymnastics, Boys"><label>Gymnastics, Boys</label> <br>
						<input type="checkbox" name="clubs[]" value="Gymnastics, Girls"><label>Gymnastics, Girls</label> <br>
						<input type="checkbox" name="clubs[]" value="Ice Hockey"><label>Ice Hockey</label> <br>
						<input type="checkbox" name="clubs[]" value="Lacrosse, Boys"><label>Lacrosse, Boys</label> <br>
						<input type="checkbox" name="clubs[]" value="Lacrosse, Girls"><label>Lacrosse, Girls</label> <br>
						<input type="checkbox" name="clubs[]" value="Mountaineering"><label>Mountaineering</label> <br>
						<input type="checkbox" name="clubs[]" value="Power Lifting"><label>Power Lifting</label> <br>
						<input type="checkbox" name="clubs[]" value="Racquetball"><label>Racquetball</label> <br>
						<input type="checkbox" name="clubs[]" value="Rodeo"><label>Rodeo</label> <br>
						<input type="checkbox" name="clubs[]" value="Rowing, Boys"><label>Rowing, Boys</label> <br>
						<input type="checkbox" name="clubs[]" value="Rowing, Girls"><label>Rowing, Girls</label> <br>
						<input type="checkbox" name="clubs[]" value="Rugby, Boys"><label>Rugby, Boys</label> <br>
						<input type="checkbox" name="clubs[]" value="Rugby, Girls"><label>Rugby, Girls</label> <br>
						<input type="checkbox" name="clubs[]" value="Sailing"><label>Sailing</label> <br>
						<input type="checkbox" name="clubs[]" value="Ski & Snowboard, Boys"><label>Ski & Snowboard, Boys</label> <br>
						<input type="checkbox" name="clubs[]" value="Ski & Snowboard, Girls"><label>Ski & Snowboard, Girls</label> <br>
						<input type="checkbox" name="clubs[]" value="Soccer, Boys"><label>Soccer, Boys</label> <br>
						<input type="checkbox" name="clubs[]" value="Soccer, Girls"><label>Soccer, Girls</label> <br>
						<input type="checkbox" name="clubs[]" value="Softball"><label>Softball</label> <br>
						<input type="checkbox" name="clubs[]" value="Swimming, Boys"><label>Swimming, Boys</label> <br>
						<input type="checkbox" name="clubs[]" value="Swimming, Girls"><label>Swimming, Girls</label> <br>
						<input type="checkbox" name="clubs[]" value="Table Tennis"><label>Table Tennis</label> <br>
						<input type="checkbox" name="clubs[]" value="Tennis, Boys"><label>Tennis, Boys</label> <br>
						<input type="checkbox" name="clubs[]" value="Tennis, Girls"><label>Tennis, Girls</label> <br>
						<input type="checkbox" name="clubs[]" value="Track & Field, Boys"><label>Track & Field, Boys</label> <br>
						<input type="checkbox" name="clubs[]" value="Track & Field, Girls"><label>Track & Field, Girls</label> <br>
						<input type="checkbox" name="clubs[]" value="Ultimate Frisbee, Boys"><label>Ultimate Frisbee, Boys</label> <br>
						<input type="checkbox" name="clubs[]" value="Ultimate Frisbee, Girls"><label>Ultimate Frisbee, Girls</label> <br>
						<input type="checkbox" name="clubs[]" value="Volleyball, Boys"><label>Volleyball, Boys</label> <br>
						<input type="checkbox" name="clubs[]" value="Volleyball, Girls"><label>Volleyball, Girls</label> <br>
						<input type="checkbox" name="clubs[]" value="Water Polo"><label>Water Polo</label> <br>
						<input type="checkbox" name="clubs[]" value="Wrestling"><label>Wrestling</label> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				

				<div class="groupsection">
					<h7>College</h7><br>
					<span id="">Clubs & Organizations</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value=""><label>Select All Groups</label> <br>
						<input type="checkbox" name="clubs[]" value="4-H"><label>4-H</label> <br>
						<input type="checkbox" name="clubs[]" value="Alumni Association"><label>Alumni Association</label> <br>
						<input type="checkbox" name="clubs[]" value="Band"><label>Band</label> <br>
						<input type="checkbox" name="clubs[]" value="BPA">BPA<label></label> <br>
						<input type="checkbox" name="clubs[]" value="Chess Club"><label>Chess Club</label> <br>
						<input type="checkbox" name="clubs[]" value="Choir"><label>Choir</label> <br>
						<input type="checkbox" name="clubs[]" value="Debate"><label>Debate</label> <br>
						<input type="checkbox" name="clubs[]" value="DECA"><label>DECA</label> <br>
						<input type="checkbox" name="clubs[]" value="Drumline"><label>Drumline</label> <br>
						<input type="checkbox" name="clubs[]" value="FBLA"><label>FBLA</label> <br>
						<input type="checkbox" name="clubs[]" value="FFA"><label>FFA</label> <br>
						<input type="checkbox" name="clubs[]" value="Greeks"><label>Greeks</label> <br>
						<input type="checkbox" name="clubs[]" value="FFA"><label>FFA</label> <br>
						<input type="checkbox" name="clubs[]" value="Key Club"><label>Key Club</label> <br>
						<input type="checkbox" name="clubs[]" value="Language Club"><label>Language Club</label> <br>
						<input type="checkbox" name="clubs[]" value="Math Club"><label>Math Club</label> <br>
						<input type="checkbox" name="clubs[]" value="National Honor Society"><label>National Honor Society</label> <br>
						<input type="checkbox" name="clubs[]" value="Orchestra"><label>Orchestra</label> <br>
						<input type="checkbox" name="clubs[]" value="ROTC"><label>ROTC</label> <br>
						<input type="checkbox" name="clubs[]" value="Science Club"><label>Science Club</label> <br>
						<input type="checkbox" name="clubs[]" value="Scripture Study"><label>Scripture Study</label> <br>
						<input type="checkbox" name="clubs[]" value="Student Council"><label>Student Council</label> <br>
						<input type="checkbox" name="clubs[]" value="Technology/Robotics"><label>Technology/Robotics</label> <br>
						<input type="checkbox" name="clubs[]" value="Theatre & Drama"><label>Theatre & Drama</label> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				
				<div class="groupsection">
					<span id="">General</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value=""><label>Select All Groups</label> <br>
						<input type="checkbox" name="clubs[]" value="After-School Program"><label>After-School Program</label> <br>
						<input type="checkbox" name="clubs[]" value="Athletic Equipment"><label>Athletic Equipment</label> <br>
						<input type="checkbox" name="clubs[]" value="Electronic Projection & A/V"><label>Electronic Projection & A/V</label> <br>
						<input type="checkbox" name="clubs[]" value="Field Trips & Travel"><label>Field Trips & Travel</label> <br>
						<input type="checkbox" name="clubs[]" value="Library & Technology"><label>Library & Technology</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, PCs & Internet"><label>Tablets, PCs & Internet</label> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				
				<div class="groupsection">
					<span id="">Athletics</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value=""><label>Select All Groups</label> <br>
						<input type="checkbox" name="clubs[]" value="Archery"><label>Archery</label> <br>
						<input type="checkbox" name="clubs[]" value="Badminton"><label>Badminton</label> <br>
						<input type="checkbox" name="clubs[]" value="Baseball"><label>Baseball</label> <br>
						<input type="checkbox" name="clubs[]" value="Basketball, Boys"><label>Basketball, Boys</label> <br>
						<input type="checkbox" name="clubs[]" value="Basketball, Girls"><label>Basketball, Girls</label> <br>
						<input type="checkbox" name="clubs[]" value="Bowling, Boys"><label>Bowling, Boys</label> <br>
						<input type="checkbox" name="clubs[]" value="Bowling, Girls"><label>Bowling, Girls</label> <br>
						<input type="checkbox" name="clubs[]" value="Cheerleading"><label>Cheerleading</label> <br>
						<input type="checkbox" name="clubs[]" value="Cross Country Running, Boys"><label>Cross Country Running, Boys</label> <br>
						<input type="checkbox" name="clubs[]" value="Cross Country Running, Girls"><label>Cross Country Running, Girls</label> <br>
						<input type="checkbox" name="clubs[]" value="Cross Country Skiing, Boys"><label>Cross Country Skiing, Boys</label> <br>
						<input type="checkbox" name="clubs[]" value="Cross Country Skiing, Girls"><label>Cross Country Skiing, Girls</label> <br>
						<input type="checkbox" name="clubs[]" value="Cycling"><label>Cycling</label> <br>
						<input type="checkbox" name="clubs[]" value="Danceline"><label>Danceline</label> <br>
						<input type="checkbox" name="clubs[]" value="Diving, Boys"><label>Diving, Boys</label> <br>
						<input type="checkbox" name="clubs[]" value="Diving, Girls"><label>Diving, Girls</label> <br>
						<input type="checkbox" name="clubs[]" value="Field  Hockey"><label>Field  Hockey</label> <br>
						<input type="checkbox" name="clubs[]" value="Figure Skating"><label>Figure Skating</label> <br>
						<input type="checkbox" name="clubs[]" value="Football"><label>Football</label> <br>
						<input type="checkbox" name="clubs[]" value="Golf, Boys"><label>Golf, Boys</label> <br>
						<input type="checkbox" name="clubs[]" value="Golf, Girls"><label>Golf, Girls</label> <br>
						<input type="checkbox" name="clubs[]" value="Gymnastics, Boys"><label>Gymnastics, Boys</label> <br>
						<input type="checkbox" name="clubs[]" value="Gymnastics, Girls"><label>Gymnastics, Girls</label> <br>
						<input type="checkbox" name="clubs[]" value="Ice Hockey, Boys"><label>Ice Hockey, Boys</label> <br>
						<input type="checkbox" name="clubs[]" value="Ice Hockey, Girls"><label>Ice Hockey, Girls</label> <br>
						<input type="checkbox" name="clubs[]" value="Lacrosse, Boys"><label>Lacrosse, Boys</label> <br>
						<input type="checkbox" name="clubs[]" value="Lacrosse, Girls"><label>Lacrosse, Girls</label> <br>
						<input type="checkbox" name="clubs[]" value="Mountaineering"><label>Mountaineering</label> <br>
						<input type="checkbox" name="clubs[]" value="Power Lifting"><label>Power Lifting</label> <br>
						<input type="checkbox" name="clubs[]" value="Racquetball"><label>Racquetball</label> <br>
						<input type="checkbox" name="clubs[]" value="Rodeo"><label>Rodeo</label> <br>
						<input type="checkbox" name="clubs[]" value="Rowing, Boys"><label>Rowing, Boys</label> <br>
						<input type="checkbox" name="clubs[]" value="Rowing, Girls"><label>Rowing, Girls</label> <br>
						<input type="checkbox" name="clubs[]" value="Rugby, Boys"><label>Rugby, Boys</label> <br>
						<input type="checkbox" name="clubs[]" value="Rugby, Girls"><label>Rugby, Girls</label> <br>
						<input type="checkbox" name="clubs[]" value="Sailing"><label>Sailing</label> <br>
						<input type="checkbox" name="clubs[]" value="Ski & Snowboard, Boys"><label>Ski & Snowboard, Boys</label> <br>
						<input type="checkbox" name="clubs[]" value="Ski & Snowboard, Girls"><label>Ski & Snowboard, Girls</label> <br>
						<input type="checkbox" name="clubs[]" value="Soccer, Boys"><label>Soccer, Boys</label> <br>
						<input type="checkbox" name="clubs[]" value="Soccer, Girls"><label>Soccer, Girls</label> <br>
						<input type="checkbox" name="clubs[]" value="Softball"><label>Softball</label> <br>
						<input type="checkbox" name="clubs[]" value="Swimming, Boys"><label>Swimming, Boys</label> <br>
						<input type="checkbox" name="clubs[]" value="Swimming, Girls"><label>Swimming, Girls</label> <br>
						<input type="checkbox" name="clubs[]" value="Synchronized Swimming"><label>Synchronized Swimming</label> <br>
						<input type="checkbox" name="clubs[]" value="Table Tennis"><label>Table Tennis</label> <br>
						<input type="checkbox" name="clubs[]" value="Tennis, Boys"><label>Tennis, Boys</label> <br>
						<input type="checkbox" name="clubs[]" value="Tennis, Girls"><label>Tennis, Girls</label> <br>
						<input type="checkbox" name="clubs[]" value="Track & Field, Boys"><label>Track & Field, Boys</label> <br>
						<input type="checkbox" name="clubs[]" value="Track & Field, Girls"><label>Track & Field, Girls</label> <br>
						<input type="checkbox" name="clubs[]" value="Ultimate Frisbee, Boys"><label>Ultimate Frisbee, Boys</label> <br>
						<input type="checkbox" name="clubs[]" value="Ultimate Frisbee, Girls"><label>Ultimate Frisbee, Girls</label> <br>
						<input type="checkbox" name="clubs[]" value="Volleyball, Boys"><label>Volleyball, Boys</label> <br>
						<input type="checkbox" name="clubs[]" value="Volleyball, Girls"><label>Volleyball, Girls</label> <br>
						<input type="checkbox" name="clubs[]" value="Water Polo"><label>Water Polo</label> <br>
						<input type="checkbox" name="clubs[]" value="Wrestling"><label>Wrestling</label> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				
				<div class="groupsection">
					<h7>Trade, Vocational & Tech School</h7><br>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value=""><label>Select All Groups</label> <br>
						<input type="checkbox" name="clubs[]" value="Field Trips & Travel"><label>Field Trips & Travel</label> <br>
						<input type="checkbox" name="clubs[]" value="General Equipment"><label>General Equipment</label> <br>
						<input type="checkbox" name="clubs[]" value="Trade Supplies"><label>Trade Supplies</label> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				
				<div class="groupsection">
					<h7>Preschool</h7><br>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value=""><label>Select All Groups</label> <br>
						<input type="checkbox" name="clubs[]" value="Electronic Projection & A/V"><label>Electronic Projection & A/V</label> <br>
						<input type="checkbox" name="clubs[]" value="Equipment & Supplies"><label>Equipment & Supplies</label> <br>
						<input type="checkbox" name="clubs[]" value="Field Trips & Travel"><label>Field Trips & Travel</label> <br>
						<input type="checkbox" name="clubs[]" value="Playground Equipment"><label>Playground Equipment</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, PCs, & Internet"><label>Tablets, PCs, & Internet</label> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				
				<div class="groupsection">
					<h7>Home School</h7><br>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value=""><label>Select All Groups</label> <br>
						<input type="checkbox" name="clubs[]" value="Electronic Projection & A/V"><label>Electronic Projection & A/V</label> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				
				<div class="groupsection">
					<h7>Camp</h7><br>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value=""><label>Select All Groups</label> <br>
						<input type="checkbox" name="clubs[]" value="Bible Camps"><label>Bible Camps</label> <br>
						<input type="checkbox" name="clubs[]" value="Dance Camps"><label>Dance Camps</label> <br>
						<input type="checkbox" name="clubs[]" value="Education Camps"><label>Education Camps</label> <br>
						<input type="checkbox" name="clubs[]" value="Family Camps"><label>Family Camps</label> <br>
						<input type="checkbox" name="clubs[]" value="General Camps"><label>General Camps</label> <br>
						<input type="checkbox" name="clubs[]" value="Music Camps"><label>Music Camps</label> <br>
						<input type="checkbox" name="clubs[]" value="Scouting Camps"><label>Scouting Camps</label> <br>
						<input type="checkbox" name="clubs[]" value="Sports Camps"><label>Sports Camps</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth Camps"><label>Youth Camps</label> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				
				<br>
				
				<div class="groupsection">
					<h6>Organizations</h6>
					<h7>Faith Based Organizations</h7><br>
					<span id="">Christianity</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value=""><label>Select All Groups</label> <br>
						<input type="checkbox" name="clubs[]" value="Baptist"><label>Baptist</label> <br>
						<input type="checkbox" name="clubs[]" value="Catholic"><label>Catholic</label> <br>
						<input type="checkbox" name="clubs[]" value="Episcopal"><label>Episcopal</label> <br>
						<input type="checkbox" name="clubs[]" value="Lutheran"><label>Lutheran</label> <br>
						<input type="checkbox" name="clubs[]" value="Methodist"><label>Methodist</label> <br>
						<input type="checkbox" name="clubs[]" value="Mormon"><label>Mormon</label> <br>
						<input type="checkbox" name="clubs[]" value="Orthodox"><label>Orthodox</label> <br>
						<input type="checkbox" name="clubs[]" value="Presbyterian"><label>Presbyterian</label> <br>
						<input type="checkbox" name="clubs[]" value="Reformed"><label>Reformed</label> <br>
						<input type="checkbox" name="clubs[]" value="Spirit-Filled"><label>Spirit-Filled</label> <br>
						<input type="checkbox" name="clubs[]" value="Christian Other"><label>Christian Other</label> <br>
					</div> <!-- end checkboxes -->
					
					<span id="">Judaism</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value=""><label>Select All Groups</label> <br>
						<input type="checkbox" name="clubs[]" value="Jewish Conservative"><label>Jewish Conservative</label> <br>
						<input type="checkbox" name="clubs[]" value="Jewish Orthodox"><label>Jewish Orthodox</label> <br>
						<input type="checkbox" name="clubs[]" value="Jewish Reformed"><label>Jewish Reformed</label> <br>
					</div> <!-- end checkboxes -->
					
					<span id="">Other Faiths</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value=""><label>Select All Groups</label> <br>
						<input type="checkbox" name="clubs[]" value="Buddhist"><label>Buddhist</label> <br>
						<input type="checkbox" name="clubs[]" value="Hindu"><label>Hindu</label> <br>
						<input type="checkbox" name="clubs[]" value="Muslim"><label>Muslim</label> <br>
						<input type="checkbox" name="clubs[]" value="Other Faiths"><label>Other Faiths</label> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				
				<div class="groupsection">
					<h7>Local & National Organizations</h7><br>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value=""><label>Select All Groups</label> <br>
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
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				
				<div class="groupsection">
					<h7>Local & National Charities</h7><br>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value=""><label>Select All Groups</label> <br>
						<input type="checkbox" name="clubs[]" value="Alzheimer Foundation of American"><label>Alzheimer Foundation of American</label> <br>
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
						<input type="checkbox" name="clubs[]" value="Muscular Dytrophy Association (MDA)"><label>Muscular Dytrophy Association (MDA)</label> <br>
						<input type="checkbox" name="clubs[]" value="Shriners International"><label>Shriners International</label> <br>
						<input type="checkbox" name="clubs[]" value="Special Olympics"><label>Special Olympics</label> <br>
						<input type="checkbox" name="clubs[]" value="St. Jude Childrens&#39;s Research Hospital"><label>St. Jude Childrens&#39;s Research Hospital</label> <br>
						<input type="checkbox" name="clubs[]" value="Susan G. Komen"><label>Susan G. Komen</label> <br>
						<input type="checkbox" name="clubs[]" value="The Salvation Army"><label>The Salvation Army</label> <br>
						<input type="checkbox" name="clubs[]" value="The Simon Wiesenthal Foundation"><label>The Simon Wiesenthal Foundation</label> <br>
						<input type="checkbox" name="clubs[]" value="United Way"><label>United Way</label> <br>
						<input type="checkbox" name="clubs[]" value="Wounded Warrior Project"><label>Wounded Warrior Project</label> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				
				<div class="groupsection">
					<h7>Community Organizations</h7><br>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value=""><label>Select All Groups</label> <br>
						<input type="checkbox" name="clubs[]" value="Animal Shelters"><label>Animal Shelters<label></label> <br>
						<input type="checkbox" name="clubs[]" value="ASPCA"><label>ASPCA</label> <br>
						<input type="checkbox" name="clubs[]" value="Community Food Bank"><label>Community Food Bank</label> <br>
						<input type="checkbox" name="clubs[]" value="Fire Department"><label>Fire Department</label> <br>
						<input type="checkbox" name="clubs[]" value="Local Food Shelves"><label>Local Food Shelves</label> <br>
						<input type="checkbox" name="clubs[]" value="Local Homeless Shelters"><label>Local Homeless Shelters</label> <br>
						<input type="checkbox" name="clubs[]" value="Local Women&#39;s Shelters"><label>Local Women&#39;s Shelters</label> <br>
						<input type="checkbox" name="clubs[]" value="Police Department"><label>Police Department</label> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				
				<div class="groupsection">
					<h7>Youth & Sports</h7><br>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value=""><label>Select All Groups</label> <br>
						<input type="checkbox" name="clubs[]" value="Athletic Associations"><label>Athletic Associations</label> <br>
						<input type="checkbox" name="clubs[]" value="Big Brothers/Big Sisters of America"><label>Big Brothers/Big Sisters of America</label> <br>
						<input type="checkbox" name="clubs[]" value="Boy Scouts"><label>Boy Scouts</label> <br>
						<input type="checkbox" name="clubs[]" value="Girl Scouts"><label>Girl Scouts</label> <br>
						<input type="checkbox" name="clubs[]" value="YMCA"><label>YMCA</label> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				
				<div class="groupsection">
					<h7>Sports League</h7><br>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value=""><label>Select All Groups</label> <br>
						<input type="checkbox" name="clubs[]" value="Summer League"><label>Summer League</label> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				
				<br>
				
				<div class="groupsection">
					<h6>General</h6>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value=""><label>Select All Groups</label> <br>
						<input type="checkbox" name="clubs[]" value="General"><label>General</label> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->
		
		<div class="clear"></div>
		
		<br>
		
		<input type="hidden" name="gid" value="<?php echo $getGroup; ?>" />
		<input type="submit" class="redbutton" name="submit" value="Save & Exit">
		<!--<input type="submit" class="redbutton" value="Save & Add Another">-->
	</form>  
	</div> <!-- end table -->
  </div> <!--end content -->
  
      <?php include 'footer.php' ; ?>   
</div> <!--end container-->

</body>
</html>

<?php
   ob_end_flush();
?>