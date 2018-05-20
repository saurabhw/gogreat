<?php
session_start();

/*if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }*/

?>
<!DOCTYPE html>
<head>
	<meta charset="UTF-8" />
	<title>GreatMoods | Admin</title>
	<link rel="shortcut icon" href="../images/favicon.ico">
	
	<link href="../css/layout_styles.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="../css/addnew_form_styles.css" />
	<link rel="stylesheet" type="text/css" href="../css/simpletabs_styles.css" />
	
	<script type="text/javascript" src="../js/simpletabs_1.3.js"></script>
</head>

<body>
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <br><br>
      <?php include 'sidenav.php' ; ?>

      <div id="content">
          <h1>Add Fundraiser Group</h1>
          <h3></h3>
		
	
		<div class="table">
			<form class="" action="" method="">
				<div class="tablerow">
						<span id="hd_vp2">Vice President:</span>
						<span id="hd_sc2">Sales Coordinator:</span>
						<span id="hd_rp2">Representative:</span>
						<span id="hd_gmfr2">Fundraiser Account:</span>
					</div> <!-- end row -->
					
				<div class="tablerow">
					<select class="role2">
						<option>Select VP Account</option>
						<option></option>
						<option></option>
						<option></option>
						<option></option>
					</select>
					<select class="role2">
						<option>Select SC Account</option>
						<option></option>
						<option></option>
						<option></option>
						<option></option>
					</select>
					<select class="role2">
						<option>Select RP Account</option>
						<option></option>
						<option></option>
						<option></option>
						<option></option>
					</select>
					<select class="role2">
						<option>Select FR Account</option>
						<option></option>
						<option></option>
						<option></option>
						<option></option>
					</select>
				</div> <!-- end row -->
				
				<br>
				
			<div class="interim-form">
				<div class="tablerow">
					<div class="interim-header"><h2>Select Group(s)</h2></div>
					<div class="groupcolumns">
						<h6>Education</h6>
						<div class="groupsection">
							<h7>Elementary School</h7><br>
							<span id="">Clubs & Organizations</span><br>
							<div class="checkboxes">
								<input type="checkbox" name="" value=""><label>Select All Groups</label> <br>
								<input type="checkbox" name="" value=""><label>4-H</label> <br>
								<input type="checkbox" name="" value=""><label>Art Club</label> <br>
								<input type="checkbox" name="" value=""><label>Band</label> <br>
								<input type="checkbox" name="" value=""><label>Booster Club</label> <br>
								<input type="checkbox" name="" value=""><label>Carnival</label> <br>
								<input type="checkbox" name="" value=""><label>Choir</label> <br>
								<input type="checkbox" name="" value=""><label>Math Club</label> <br>
								<input type="checkbox" name="" value=""><label>PTA/PTO/PTC</label> <br>
								<input type="checkbox" name="" value=""><label>Science Club</label> <br>
								<input type="checkbox" name="" value=""><label>Technology/Robotics</label> <br>
								<input type="checkbox" name="" value=""><label>Thetre & Drama</label> <br>
							</div> <!-- end checkboxes -->
						</div> <!-- end groupsection -->
								
						<div class="groupsection">
							<span id="">General</span><br>
							<div class="checkboxes">
								<input type="checkbox" name="" value=""><label>Select All Groups</label> <br>
								<input type="checkbox" name="" value=""><label>General</label> <br>
								<input type="checkbox" name="" value=""><label>Graduation</label> <br>
								<input type="checkbox" name="" value=""><label>After-School Program</label> <br>
								<input type="checkbox" name="" value=""><label>Athletic Equipment</label> <br>
								<input type="checkbox" name="" value=""><label>Electronic Projection & A/V</label> <br>
								<input type="checkbox" name="" value=""><label>Field Trips & Travel</label> <br>
								<input type="checkbox" name="" value=""><label>Library & Technology</label> <br>
								<input type="checkbox" name="" value=""><label>Playground Equipment</label> <br>
								<input type="checkbox" name="" value=""><label>Tablets,PCs & Internet</label> <br>
							</div> <!-- end checkboxes -->
						</div> <!-- end groupsection -->
						
						<div class="groupsection">		
							<span id="">Athletics</span><br>
							<div class="checkboxes">
								<input type="checkbox" name="" value=""><label>Select All Groups</label> <br>
								<input type="checkbox" name="" value=""><label>Baseball</label> <br>
								<input type="checkbox" name="" value=""><label>Basketball, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Basketball, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>Biking</label> <br>
								<input type="checkbox" name="" value=""><label>Football</label> <br>
								<input type="checkbox" name="" value=""><label>Gymnastics, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Gymnastics, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>Ice Hockey, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Ice Hockey, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>Lacrosse, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Lacrosse, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>Soccer, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Soccer, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>Softball</label> <br>
								<input type="checkbox" name="" value=""><label>Swimming, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Swimming, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>T-Ball</label> <br>
								<input type="checkbox" name="" value=""><label>Track & Filed, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Track & Field, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>Volleyball, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Volleyball, Girls</label> <br>
							</div> <!-- end checkboxes -->
						</div> <!-- end groupsection -->
						
						<div class="groupsection">
							<h7>Middle School</h7><br>
							<span id="">Clubs & Organizations</span><br>
							<div class="checkboxes">
								<input type="checkbox" name="" value=""><label>Select All Groups</label> <br>
								<input type="checkbox" name="" value=""><label>4-H</label> <br>
								<input type="checkbox" name="" value=""><label>Band</label> <br>
								<input type="checkbox" name="" value=""><label>Booster Club</label> <br>
								<input type="checkbox" name="" value=""><label>BPA</label> <br>
								<input type="checkbox" name="" value=""><label>Chess Club</label> <br>
								<input type="checkbox" name="" value=""><label>Choir</label> <br>
								<input type="checkbox" name="" value=""><label>Debate</label> <br>
								<input type="checkbox" name="" value=""><label>FFA</label> <br>
								<input type="checkbox" name="" value=""><label>Jazz Band</label> <br>
								<input type="checkbox" name="" value=""><label>Language Club</label> <br>
								<input type="checkbox" name="" value=""><label>Math Club</label> <br>
								<input type="checkbox" name="" value=""><label>National Honor Society</label> <br>
								<input type="checkbox" name="" value=""><label>Orchestra</label> <br>
								<input type="checkbox" name="" value=""><label>PTA/PTO/PTC</label> <br>
								<input type="checkbox" name="" value=""><label>Science Club</label> <br>
								<input type="checkbox" name="" value=""><label>Scripture Study</label> <br>
								<input type="checkbox" name="" value=""><label>Student Study</label> <br>
								<input type="checkbox" name="" value=""><label>Student Council</label> <br>
								<input type="checkbox" name="" value=""><label>Technology/Robotics Club</label> <br>
								<input type="checkbox" name="" value=""><label>Theatre & Drama</label> <br>
								<input type="checkbox" name="" value=""><label>Yearbook</label> <br>
							</div> <!-- end checkboxes -->
						</div> <!-- end groupsection -->
								
						<div class="groupsection">
							<span id="">General</span><br>
							<div class="checkboxes">
								<input type="checkbox" name="" value=""><label>Select All Groups</label> <br>
								<input type="checkbox" name="" value=""><label>General</label> <br>
								<input type="checkbox" name="" value=""><label>Graduation</label> <br>
								<input type="checkbox" name="" value=""><label>After-School Program</label> <br>
								<input type="checkbox" name="" value=""><label>Athletic Equipment</label> <br>
								<input type="checkbox" name="" value=""><label>Electronic Projection & A/V</label> <br>
								<input type="checkbox" name="" value=""><label>Field Trips & Travel</label> <br>
								<input type="checkbox" name="" value=""><label>Library & Technology</label> <br>
								<input type="checkbox" name="" value=""><label>Playground Equipment</label> <br>
								<input type="checkbox" name="" value=""><label>Tablets,PCs & Internet</label> <br>
							</div> <!-- end checkboxes -->
						</div> <!-- end groupsection -->
						
						<div class="groupsection">
							<span id="">Athletics</span><br>
							<div class="checkboxes">
								<input type="checkbox" name="" value=""><label>Select All Groups</label> <br>
								<input type="checkbox" name="" value=""><label>Archery</label> <br>
								<input type="checkbox" name="" value=""><label>Badminton</label> <br>
								<input type="checkbox" name="" value=""><label>Baseball</label> <br>
								<input type="checkbox" name="" value=""><label>Basketball, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Basketball, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>Bowling</label> <br>
								<input type="checkbox" name="" value=""><label>cheerleading</label> <br>
								<input type="checkbox" name="" value=""><label>Cross Country Running, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Cross Country Running, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>Cross Country Skiing, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Cross Country Skiing, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>Cycling</label> <br>
								<input type="checkbox" name="" value=""><label>Danceline</label> <br>
								<input type="checkbox" name="" value=""><label>Diving, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Diving, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>Field Hockey</label> <br>
								<input type="checkbox" name="" value=""><label>Figure Skating</label> <br>
								<input type="checkbox" name="" value=""><label>Football</label> <br>
								<input type="checkbox" name="" value=""><label>Golf, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Golf, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>Gymnastics, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Gymnastics, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>Ice Hockey, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Ice Hockey, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>Lacrosse, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Lacrosse, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>Mountaineering</label> <br>
								<input type="checkbox" name="" value=""><label>Racquet</label> <br>
								<input type="checkbox" name="" value=""><label>Rodeo</label> <br>
								<input type="checkbox" name="" value=""><label>Rowing</label> <br>
								<input type="checkbox" name="" value=""><label>Rugby, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Rugby, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>Sailing</label> <br>
								<input type="checkbox" name="" value=""><label>Ski & Snowboard, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Ski & Snowboard, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>Soccer, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Soccer, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>Softball</label> <br>
								<input type="checkbox" name="" value=""><label>Swimming, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Swimming, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>Table Tennis</label> <br>
								<input type="checkbox" name="" value=""><label>Tennis, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Track & Field, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Track & Filed, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>Ultimate Frisbee, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Ultimate Frisbee, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>Volleyball, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Volleyball, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>Water Polo</label> <br>
								<input type="checkbox" name="" value=""><label>Wrestling</label> <br>
							</div> <!-- end checkboxes -->
						</div> <!-- end groupsection -->
							
						<div class="groupsection">
							<h7>High School</h7><br>
							<span id="">Clubs & Organizations</span><br>
							<div class="checkboxes">
								<input type="checkbox" name="" value=""><label>Select All Groups</label> <br>
								<input type="checkbox" name="" value=""><label>4-H</label> <br>
								<input type="checkbox" name="" value=""><label>Band</label> <br>
								<input type="checkbox" name="" value=""><label>Booster Club</label> <br>
								<input type="checkbox" name="" value=""><label>BPA</label> <br>
								<input type="checkbox" name="" value=""><label>Chess Club</label> <br>
								<input type="checkbox" name="" value=""><label>Choir</label> <br>
								<input type="checkbox" name="" value=""><label>Debate</label> <br>
								<input type="checkbox" name="" value=""><label>DECA</label> <br>
								<input type="checkbox" name="" value=""><label>FBLA</label> <br>
								<input type="checkbox" name="" value=""><label>FFA</label> <br>
								<input type="checkbox" name="" value=""><label>Jazz Band</label> <br>
								<input type="checkbox" name="" value=""><label>JROTC</label> <br>
								<input type="checkbox" name="" value=""><label>Key Club</label> <br>
								<input type="checkbox" name="" value=""><label>Language Club</label> <br>
								<input type="checkbox" name="" value=""><label>Math Club</label> <br>
								<input type="checkbox" name="" value=""><label>National Honor Society</label> <br>
								<input type="checkbox" name="" value=""><label>Orchestra</label> <br>
								<input type="checkbox" name="" value=""><label>Prom Committe</label> <br>
								<input type="checkbox" name="" value=""><label>PTA/PTO/PTC</label> <br>
								<input type="checkbox" name="" value=""><label>Science Club</label> <br>
								<input type="checkbox" name="" value=""><label>Scripture Study</label> <br>
								<input type="checkbox" name="" value=""><label>Student Council</label> <br>
								<input type="checkbox" name="" value=""><label>Technology/Robotics</label> <br>
								<input type="checkbox" name="" value=""><label>Theatre & Drama</label> <br>
								<input type="checkbox" name="" value=""><label>Yearbook</label> <br>
							</div> <!-- end checkboxes -->
						</div> <!-- end groupsection -->
								
						<div class="groupsection">
							<span id="">General</span><br>
							<div class="checkboxes">
								<input type="checkbox" name="" value=""><label>Select All Groups</label> <br>
								<input type="checkbox" name="" value=""><label>General</label> <br>
								<input type="checkbox" name="" value=""><label>Graduation</label> <br>
								<input type="checkbox" name="" value=""><label>Senior Class</label> <br>
								<input type="checkbox" name="" value=""><label>Junior Class</label> <br>
								<input type="checkbox" name="" value=""><label>Sophmore Class</label> <br>
								<input type="checkbox" name="" value=""><label>Freshman Class</label> <br>
								<input type="checkbox" name="" value=""><label>After-School Program</label> <br>
								<input type="checkbox" name="" value=""><label>Athletic Equipment</label> <br>
								<input type="checkbox" name="" value=""><label>Electronic Projection & A/V</label> <br>
								<input type="checkbox" name="" value=""><label>Field Trips & Travel</label> <br>
								<input type="checkbox" name="" value=""><label>Library & Technology</label> <br>
								<input type="checkbox" name="" value=""><label>Playground Equipment</label> <br>
								<input type="checkbox" name="" value=""><label>Tablets, PCs & Internet</label> <br>
							</div> <!-- end checkboxes -->
						</div> <!-- end groupsection -->
						
						<div class="groupsection">
							<span id="">Athletics</span><br>
							<div class="checkboxes">
								<input type="checkbox" name="" value=""><label>Select All Groups</label> <br>
								<input type="checkbox" name="" value=""><label>Archery</label> <br>
								<input type="checkbox" name="" value=""><label>Badminton</label> <br>
								<input type="checkbox" name="" value=""><label>Basketball, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Basketball, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>Bowling, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Bowling, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>Cheerleading</label> <br>
								<input type="checkbox" name="" value=""><label>Cross Country Running, Boys</label><br>
								<input type="checkbox" name="" value=""><label>Cross Country Running, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>Cross Country Skiing, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Cross Country Skiing, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>Cycling</label> <br>
								<input type="checkbox" name="" value=""><label>Danceline</label> <br>
								<input type="checkbox" name="" value=""><label>Diving, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Diving, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>Field Hockey</label> <br>
								<input type="checkbox" name="" value=""><label>Figure Skating</label> <br>
								<input type="checkbox" name="" value=""><label>Football</label> <br>
								<input type="checkbox" name="" value=""><label>Golf, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Golf, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>Gymnastics, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Gymnastics, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>Ice Hockey, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Lacrosse, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Lacrosse, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>Mountaineering</label> <br>
								<input type="checkbox" name="" value=""><label>Power Lifting</label> <br>
								<input type="checkbox" name="" value=""><label>Racquetball</label> <br>
								<input type="checkbox" name="" value=""><label>Rodeo</label> <br>
								<input type="checkbox" name="" value=""><label>Rowing, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Rowing, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>Rugby, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Rugby, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>Sailing</label> <br>
								<input type="checkbox" name="" value=""><label>Ski & Snowboard, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Ski & Snowboard, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>Soccer, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Soccer, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>Softball</label> <br>
								<input type="checkbox" name="" value=""><label>Swimming, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Swimming, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>Table Tennis</label> <br>
								<input type="checkbox" name="" value=""><label>Tennis, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Tennis, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>Track & Field, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Track & Field, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>Ultimate Frisbee, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Ultimate Frisbee, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>Volleyball, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Volleyball, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>Water Polo</label> <br>
								<input type="checkbox" name="" value=""><label>Wrestling</label> <br>
							</div> <!-- end checkboxes -->
						</div> <!-- end groupsection -->
						

						<div class="groupsection">
							<h7>College</h7><br>
							<span id="">Clubs & Organizations</span><br>
							<div class="checkboxes">
								<input type="checkbox" name="" value=""><label>Select All Groups</label> <br>
								<input type="checkbox" name="" value=""><label>4-H</label> <br>
								<input type="checkbox" name="" value=""><label>Alumni Association</label> <br>
								<input type="checkbox" name="" value=""><label>Band</label> <br>
								<input type="checkbox" name="" value="">BPA<label></label> <br>
								<input type="checkbox" name="" value=""><label>Chess Club</label> <br>
								<input type="checkbox" name="" value=""><label>Choir</label> <br>
								<input type="checkbox" name="" value=""><label>Debate</label> <br>
								<input type="checkbox" name="" value=""><label>DECA</label> <br>
								<input type="checkbox" name="" value=""><label>Drumline</label> <br>
								<input type="checkbox" name="" value=""><label>FBLA</label> <br>
								<input type="checkbox" name="" value=""><label>FFA</label> <br>
								<input type="checkbox" name="" value=""><label>Greeks</label> <br>
								<input type="checkbox" name="" value=""><label>Jazz Band</label> <br>
								<input type="checkbox" name="" value=""><label>Key Club</label> <br>
								<input type="checkbox" name="" value=""><label>Language Club</label> <br>
								<input type="checkbox" name="" value=""><label>Math Club</label> <br>
								<input type="checkbox" name="" value=""><label>National Honor Society</label> <br>
								<input type="checkbox" name="" value=""><label>Orchestra</label> <br>
								<input type="checkbox" name="" value=""><label>ROTC</label> <br>
								<input type="checkbox" name="" value=""><label>Science Club</label> <br>
								<input type="checkbox" name="" value=""><label>Scripture Study</label> <br>
								<input type="checkbox" name="" value=""><label>Student Council</label> <br>
								<input type="checkbox" name="" value=""><label>Technology/Robotics</label> <br>
								<input type="checkbox" name="" value=""><label>Theatre & Drama</label> <br>
							</div> <!-- end checkboxes -->
						</div> <!-- end groupsection -->
						
						<div class="groupsection">
							<span id="">General</span><br>
							<div class="checkboxes">
								<input type="checkbox" name="" value=""><label>Select All Groups</label> <br>
								<input type="checkbox" name="" value=""><label>After-School Program</label> <br>
								<input type="checkbox" name="" value=""><label>Athletic Equipment</label> <br>
								<input type="checkbox" name="" value=""><label>Electronic Projection & A/V</label> <br>
								<input type="checkbox" name="" value=""><label>Field Trips & Travel</label> <br>
								<input type="checkbox" name="" value=""><label>Library & Technology</label> <br>
								<input type="checkbox" name="" value=""><label>Tablets, PCs & Internet</label> <br>
							</div> <!-- end checkboxes -->
						</div> <!-- end groupsection -->
						
						<div class="groupsection">
							<span id="">Athletics</span><br>
							<div class="checkboxes">
								<input type="checkbox" name="" value=""><label>Select All Groups</label> <br>
								<input type="checkbox" name="" value=""><label>Archery</label> <br>
								<input type="checkbox" name="" value=""><label>Badminton</label> <br>
								<input type="checkbox" name="" value=""><label>Baseball</label> <br>
								<input type="checkbox" name="" value=""><label>Basketball, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Basketball, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>Bowling, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Bowling, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>Cheerleading</label> <br>
								<input type="checkbox" name="" value=""><label>Cross Country Running, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Cross Country Running, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>Cross Country Skiing, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Cross Country Skiing, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>Cycling</label> <br>
								<input type="checkbox" name="" value=""><label>Danceline</label> <br>
								<input type="checkbox" name="" value=""><label>Diving, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Diving, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>Field  Hockey</label> <br>
								<input type="checkbox" name="" value=""><label>Figure Skating</label> <br>
								<input type="checkbox" name="" value=""><label>Football</label> <br>
								<input type="checkbox" name="" value=""><label>Golf, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Golf, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>Gymnastics, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Gymnastics, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>Ice Hockey, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Ice Hockey, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>Lacrosse, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Lacrosse, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>Mountaineering</label> <br>
								<input type="checkbox" name="" value=""><label>Power Lifting</label> <br>
								<input type="checkbox" name="" value=""><label>Racquetball</label> <br>
								<input type="checkbox" name="" value=""><label>Rodeo</label> <br>
								<input type="checkbox" name="" value=""><label>Rowing, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Rowing, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>Rugby, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Rugby, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>Sailing</label> <br>
								<input type="checkbox" name="" value=""><label>Ski & Snowboard, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Ski & Snowboard, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>Soccer, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Soccer, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>Softball</label> <br>
								<input type="checkbox" name="" value=""><label>Swimming, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Swimming, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>Symchronized Swimming</label> <br>
								<input type="checkbox" name="" value=""><label>Table Tennis</label> <br>
								<input type="checkbox" name="" value=""><label>Tennis, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Tennis, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>Track & Field, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Track & Field, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>Ultimate Frisbee, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Ultimate Frisbee, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>Volleyball, Boys</label> <br>
								<input type="checkbox" name="" value=""><label>Volleyball, Girls</label> <br>
								<input type="checkbox" name="" value=""><label>Water Polo</label> <br>
								<input type="checkbox" name="" value=""><label>Wrestling</label> <br>
							</div> <!-- end checkboxes -->
						</div> <!-- end groupsection -->
						
						<div class="groupsection">
							<h7>Trade, Vocational & Tech School</h7><br>
							<div class="checkboxes">
								<input type="checkbox" name="" value=""><label>Select All Groups</label> <br>
								<input type="checkbox" name="" value=""><label>Field Trips & Travel</label> <br>
								<input type="checkbox" name="" value=""><label>General Equipment</label> <br>
								<input type="checkbox" name="" value=""><label>Trade Supplies</label> <br>
							</div> <!-- end checkboxes -->
						</div> <!-- end groupsection -->
						
						<div class="groupsection">
							<h7>Preschool</h7><br>
							<div class="checkboxes">
								<input type="checkbox" name="" value=""><label>Select All Groups</label> <br>
								<input type="checkbox" name="" value=""><label>Electronic Projection & A/V</label> <br>
								<input type="checkbox" name="" value=""><label>Equipment & Supplies</label> <br>
								<input type="checkbox" name="" value=""><label>Field Trips & Travel</label> <br>
								<input type="checkbox" name="" value=""><label>Playground Equipment</label> <br>
								<input type="checkbox" name="" value=""><label>Tablets, PCs, & Internet</label> <br>
							</div> <!-- end checkboxes -->
						</div> <!-- end groupsection -->
						
						<div class="groupsection">
							<h7>Home School</h7><br>
							<div class="checkboxes">
								<input type="checkbox" name="" value=""><label>Select All Groups</label> <br>
								<input type="checkbox" name="" value=""><label>Electronic Projection & A/V</label> <br>
							</div> <!-- end checkboxes -->
						</div> <!-- end groupsection -->
						
						<div class="groupsection">
							<h7>Camp</h7><br>
							<div class="checkboxes">
								<input type="checkbox" name="" value=""><label>Select All Groups</label> <br>
								<input type="checkbox" name="" value=""><label>Bible Camps</label> <br>
								<input type="checkbox" name="" value=""><label>Dance Camps</label> <br>
								<input type="checkbox" name="" value=""><label>Education Camps</label> <br>
								<input type="checkbox" name="" value=""><label>Family Camps</label> <br>
								<input type="checkbox" name="" value=""><label>General Camps</label> <br>
								<input type="checkbox" name="" value=""><label>Music Camps</label> <br>
								<input type="checkbox" name="" value=""><label>Scouting Camps</label> <br>
								<input type="checkbox" name="" value=""><label>Sports Camps</label> <br>
								<input type="checkbox" name="" value=""><label>Youth Camps</label> <br>
							</div> <!-- end checkboxes -->
						</div> <!-- end groupsection -->
						
						<br>
						
						<div class="groupsection">
							<h6>Organizations</h6>
							<h7>Faith Based Organizations</h7><br>
							<span id="">Christianity</span><br>
							<div class="checkboxes">
								<input type="checkbox" name="" value=""><label>Select All Groups</label> <br>
								<input type="checkbox" name="" value=""><label>Baptist</label> <br>
								<input type="checkbox" name="" value=""><label>Catholic</label> <br>
								<input type="checkbox" name="" value=""><label>Christian Other</label> <br>
								<input type="checkbox" name="" value=""><label>Episcopal</label> <br>
								<input type="checkbox" name="" value=""><label>Lutheran</label> <br>
								<input type="checkbox" name="" value=""><label>Methodist</label> <br>
								<input type="checkbox" name="" value=""><label>Mormon</label> <br>
								<input type="checkbox" name="" value=""><label>Orthodox</label> <br>
								<input type="checkbox" name="" value=""><label>Presbyterian</label> <br>
								<input type="checkbox" name="" value=""><label>Reformed</label> <br>
								<input type="checkbox" name="" value=""><label>Spirit-Filled</label> <br>
							</div> <!-- end checkboxes -->
							
							<span id="">Judaism</span><br>
							<div class="checkboxes">
								<input type="checkbox" name="" value=""><label>Select All Groups</label> <br>
								<input type="checkbox" name="" value=""><label>Jewish Conservative</label> <br>
								<input type="checkbox" name="" value=""><label>Jewish Orthodox</label> <br>
								<input type="checkbox" name="" value=""><label>Jewish Reformed</label> <br>
							</div> <!-- end checkboxes -->
							
							<span id="">Other Faiths</span><br>
							<div class="checkboxes">
								<input type="checkbox" name="" value=""><label>Select All Groups</label> <br>
								<input type="checkbox" name="" value=""><label>Buddhist</label> <br>
								<input type="checkbox" name="" value=""><label>Hindu</label> <br>
								<input type="checkbox" name="" value=""><label>Muslim</label> <br>
								<input type="checkbox" name="" value=""><label>Other Faiths</label> <br>
							</div> <!-- end checkboxes -->
						</div> <!-- end groupsection -->
						
						<div class="groupsection">
							<h7>Local & National Organizations</h7><br>
							<div class="checkboxes">
								<input type="checkbox" name="" value=""><label>Select All Groups</label> <br>
								<input type="checkbox" name="" value=""><label>Jaycees</label> <br>
								<input type="checkbox" name="" value=""><label>Junior League</label> <br>
								<input type="checkbox" name="" value=""><label>Kiwanis</label> <br>
								<input type="checkbox" name="" value=""><label>Knights of Columbus</label> <br>
								<input type="checkbox" name="" value=""><label>Lions Club International (LCI)</label> <br>
								<input type="checkbox" name="" value=""><label>Masonic Service Association</label> <br>
								<input type="checkbox" name="" value=""><label>Optimist International</label> <br>
								<input type="checkbox" name="" value=""><label>Rotary Club</label> <br>
								<input type="checkbox" name="" value=""><label>Shriners International</label> <br>
								<input type="checkbox" name="" value=""><label>The American Legion</label> <br>
								<input type="checkbox" name="" value=""><label>Veterans of Foreign Wars (VFW)</label> <br>
							</div> <!-- end checkboxes -->
						</div> <!-- end groupsection -->
						
						<div class="groupsection">
							<h7>Local & National Charities</h7><br>
							<div class="checkboxes">
								<input type="checkbox" name="" value=""><label>Select All Groups</label> <br>
								<input type="checkbox" name="" value=""><label>Alzheimer Foundation of American</label> <br>
								<input type="checkbox" name="" value=""><label>American Cancer Society</label> <br>
								<input type="checkbox" name="" value=""><label>American Diabetes Association</label> <br>
								<input type="checkbox" name="" value=""><label>American Heart Association</label> <br>
								<input type="checkbox" name="" value=""><label>American Red Cross</label> <br>
								<input type="checkbox" name="" value=""><label>Boys & Girls Clubs of America</label> <br>
								<input type="checkbox" name="" value=""><label>Cancer Research Institute</label> <br>
								<input type="checkbox" name="" value=""><label>Cerebral Palsy</label> <br>
								<input type="checkbox" name="" value=""><label>Goodwill Industries International</label> <br>
								<input type="checkbox" name="" value=""><label>Habitat for Humanity</label> <br>
								<input type="checkbox" name="" value=""><label>Leukemia & Lymphoma Society</label> <br>
								<input type="checkbox" name="" value=""><label>Lymphoma Association</label> <br>
								<input type="checkbox" name="" value=""><label>Make-A-Wish Foundaion of America</label> <br>
								<input type="checkbox" name="" value=""><label>March of Dimes</label> <br>
								<input type="checkbox" name="" value=""><label>Muscular Dytrophy Association (MDA)</label> <br>
								<input type="checkbox" name="" value=""><label>Shriners International</label> <br>
								<input type="checkbox" name="" value=""><label>Special Olympics</label> <br>
								<input type="checkbox" name="" value=""><label>St. Jude Childrens's Research Hospital</label> <br>
								<input type="checkbox" name="" value=""><label>Susan G. Komen</label> <br>
								<input type="checkbox" name="" value=""><label>The Salvation Army</label> <br>
								<input type="checkbox" name="" value=""><label>The Simon Wiesenthal Foundation</label> <br>
								<input type="checkbox" name="" value=""><label>United Way</label> <br>
								<input type="checkbox" name="" value=""><label>Wounded Warrior Project</label> <br>
							</div> <!-- end checkboxes -->
						</div> <!-- end groupsection -->
						
						<div class="groupsection">
							<h7>Community Organizations</h7><br>
							<div class="checkboxes">
								<input type="checkbox" name="" value=""><label>Select All Groups</label> <br>
								<input type="checkbox" name="" value="">Animal Shelters<label></label> <br>
								<input type="checkbox" name="" value=""><label>ASPCA</label> <br>
								<input type="checkbox" name="" value=""><label>Community Food Bank</label> <br>
								<input type="checkbox" name="" value=""><label>Fire Department</label> <br>
								<input type="checkbox" name="" value=""><label>Local Food Shelves</label> <br>
								<input type="checkbox" name="" value=""><label>Local Homeless Shelters</label> <br>
								<input type="checkbox" name="" value=""><label>Local Women's Shelters</label> <br>
								<input type="checkbox" name="" value=""><label>Police Department</label> <br>
							</div> <!-- end checkboxes -->
						</div> <!-- end groupsection -->
						
						<div class="groupsection">
							<h7>Youth & Sports</h7><br>
							<div class="checkboxes">
								<input type="checkbox" name="" value=""><label>Select All Groups</label> <br>
								<input type="checkbox" name="" value=""><label>Athletic Associations</label> <br>
								<input type="checkbox" name="" value=""><label>Big Brothers/Big Sisters of America</label> <br>
								<input type="checkbox" name="" value=""><label>Boy Scouts</label> <br>
								<input type="checkbox" name="" value=""><label>Girl Scouts</label> <br>
								<input type="checkbox" name="" value=""><label>Summer Leagues</label> <br>
								<input type="checkbox" name="" value=""><label>YMCA</label> <br>
							</div> <!-- end checkboxes -->
						</div> <!-- end groupsection -->
						
						<div class="groupsection">
							<h7>Sports League</h7><br>
							<div class="checkboxes">
								<input type="checkbox" name="" value=""><label>Select All Groups</label> <br>
								<input type="checkbox" name="" value=""><label>Summer Leagues</label> <br>
							</div> <!-- end checkboxes -->
						</div> <!-- end groupsection -->
						
						<br>
						
						<div class="groupsection">
							<h6>General</h6>
							<div class="checkboxes">
								<input type="checkbox" name="" value=""><label>Select All Groups</label> <br>
								<input type="checkbox" name="" value=""><label></label> <br>
								<input type="checkbox" name="" value=""><label></label> <br>
							</div> <!-- end checkboxes -->
						</div> <!-- end groupsection -->
					</div> <!-- end groupcolumns -->
				</div> <!-- end interim-form -->
				
				<div class="clear"></div>
				
				<br>
				
				<input type="submit" class="redbutton" value="Save & Exit">
				<input type="submit" class="redbutton" value="Save & Add Another">
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