<?php
	include '../includes/autoload.php';

  if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "VP")
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
   $myPic = $row['picPath'];
   $bob = 24503;
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
<div id="container">
<?php include 'header.inc.php' ; ?>
<?php include 'sidenav.php' ; ?>

<div id="content">  
      <h1>Add New Fundraiser</h1>
      <h3>Step 2: Setup Fundraising Group Information</h3>
      
      
      <form class="" action="addFundraiser.php" method="post" id="myForm" name="myForm" onsubmit="return atleast_onecheckbox2(event)" enctype="multipart/form-data">
      <select class="role4" name="scid" onChange="fetch_select2(this.value);" required>
      		<option>Select Sales Coordinator</option>
      		<option value="<?  echo $bob;?>">GreatMoods Coordinator</option>
      		<?
      		$sql = "SELECT * FROM distributors WHERE vpID = '$userID' AND role = 'SC'";
		$result2 = mysqli_query($link, $sql)or die ("couldn't execute query distrubutors.".mysqli_error($link));
	
		while($row2 = mysqli_fetch_assoc($result2))
		{
                   echo '<option value="'.$row2[loginid].'">'.$row2['FName'].' '.$row2[LName].'</option>';
	        }
	        ?>
      	</select>
	<select class="role4" name="rpid" id="rpid" onChange="fetch_select8(this.value);" required>
		<option>Select</option>	
	</select>
      		<br>
      		<br>
      		<div class="table">

        <?php
	switch($fundtype) {
		case "College":
		echo'<div class="interim-form"> 
			<div class="interim-header"><h2>Select College Groups to Setup</h2></div>
                                       <form action="addClub.php" method="Post" name="" onsubmit="myFunction()">
			<input type="checkbox" name="all" onClick="toggle(this)"><label>Select All Groups</label>
			<br><br>
			<div class="groupcolumns">
				<div class="groupsection shortbreak">
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
						<input type="checkbox" name="clubs1[]" value="Theatre & Drama"><label>Theatre & Drama</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"><br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				
				<div class="groupsection shortbreak">
					<span id="">General</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Athletic Equipment"><label>Athletic Equipment</label> <br>
						<input type="checkbox" name="clubs[]" value="Field Trips & Travel"><label>Field Trips & Travel</label> <br>
						<input type="checkbox" name="clubs[]" value="Library & Technology"><label>Library & Technology</label> <br>
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><label>Projection, Audio, Video</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><label>Tablets, Laptops & PCs</label> <br>
						<input type="text" class="group" name="general1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				
				<div class="groupsection shortbreak">
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
						<input type="hidden" name="orgtype" value="College">
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
			<div class="groupsection shortbreak">
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
					<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
				</div> <!-- end checkboxes -->
			</div> <!-- end groupsection -->
		
				<div class="groupsection shortbreak">
					<span id="">General</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="General"><label>General</label> <br>
						<input type="checkbox" name="clubs[]" value="Graduation"><label>Graduation</label> <br>
						<input type="checkbox" name="clubs[]" value="Senior Class"><label>Senior Class</label> <br>
						<input type="checkbox" name="clubs[]" value="Junior Class"><label>Junior Class</label> <br>
						<input type="checkbox" name="clubs[]" value="Sophmore Class"><label>Sophmore Class</label> <br>
						<input type="checkbox" name="clubs[]" value="Freshman Class"><label>Freshman Class</label> <br>
						<input type="checkbox" name="clubs[]" value="Athletic Equipment"><label>Athletic Equipment</label> <br>
						<input type="checkbox" name="clubs[]" value="Field Trips & Travel"><label>Field Trips & Travel</label> <br>
						<input type="checkbox" name="clubs[]" value="Library & Technology"><label>Library & Technology</label> <br>
						<input type="checkbox" name="clubs[]" value="Playground Equipment"><label>Playground Equipment</label> <br>
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><label>Projection, Audio, Video</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><label>Tablets, Laptops & PCs</label> <br>
						<input type="text" class="group" name="general1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				
				<div class="groupsection shortbreak">
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
						<input type="text" class="group" name="athletics1" value="" placeholder="Please type in the club" title="Other"> <br><input type="hidden" name="orgtype" value="High School">
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
				<div class="groupsection shortbreak">
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
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				
				<div class="groupsection shortbreak">
					<span id="">General</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="General"><label>General</label> <br>
						<input type="checkbox" name="clubs[]" value="After-School Program"><label>After-School Program</label> <br>
						<input type="checkbox" name="clubs[]" value="Athletic Equipment"><label>Athletic Equipment</label> <br>
						<input type="checkbox" name="clubs[]" value="Field Trips & Travel"><label>Field Trips & Travel</label> <br>
						<input type="checkbox" name="clubs[]" value="Library & Technology"><label>Library & Technology</label> <br>
						<input type="checkbox" name="clubs[]" value="Playground Equipment"><label>Playground Equipment</label> <br>
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><label>Projection, Audio, Video</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><label>Tablets, Laptops & PCs</label> <br>
						<input type="text" class="group" name="general1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				
				<div class="groupsection shortbreak">
					<span>Athletics:</span>
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
				<input type="text" class="group" name="athletics1" value="" placeholder="Please type in the club" title="Other"> <br><input type="hidden" name="orgtype" value="Middle School">
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
				<div class="groupsection shortbreak">
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
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				
				<div class="groupsection longbreak">
					<span>General Needs:</span>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="General"><label>General</label> <br>
						<input type="checkbox" name="clubs[]" value="After-School Program"><label>After-School Program</label> <br>
						<input type="checkbox" name="clubs[]" value="Athletic Equipment"><label>Athletic Equipment </label> <br>
						<input type="checkbox" name="clubs[]" value="Field Trips & Travel"><label>Field Trips & Travel </label> <br>
						<input type="checkbox" name="clubs[]" value="Library & Technology"><label>Library & Technology</label> <br>
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><label>Projection, Audio, Video</label> <br>
						<input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><label>Tablets, Laptops & PCs</label> <br>
						<input type="text" class="group" name="general1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				
				<div class="groupsection shortbreak">		
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
			<input type="text" class="group" name="athletics1" value="" placeholder="Please type in the club" title="Other"> <br><input type="hidden" name="orgtype" value="Elementary School">
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
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br><input type="hidden" name="orgtype" value="Pre-School">
						<input type="hidden" name="grouptype" value="Pre-School">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;


		case "Home School":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Home School Groups to Setup</h2></div>

			
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><label>Projection, Audio, Video</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br><input type="hidden" name="orgtype" value="Home School">
						<input type="hidden" name="grouptype" value="Home School">
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
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other">Enter Group Type <br><input type="hidden" name="orgtype" value="Trade, Vocational & Tech">
						<input type="hidden" name="grouptype" value="Trade, Vocational & Tech">
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
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type <br><input type="hidden" name="orgtype" value="Camps">
						<input type="hidden" name="grouptype" value="Camps">
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
					<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
				</div> <!-- end checkboxes -->
			</div> <!-- end groupsection -->
	
			<div class="groupsection">
				<span id="">Missionary Funds</span><br>
				<div class="checkboxes">
					<input type="checkbox" name="clubs[]" value="All Missions"><label>All Missions</label> <br>
					<input type="checkbox" name="clubs[]" value="College Missions"><label>College Missions</label> <br>
					<input type="checkbox" name="clubs[]" value="Overseas Missions"><label>Overseas Missions</label> <br>
					<input type="checkbox" name="clubs[]" value="Youth & Teen"><label>Youth & Teen</label> <br><input type="text" class="group" name="general1" value="" placeholder="Please type in the club" title="Other"> <br>
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
					<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
				</div> <!-- end checkboxes -->
			</div> <!-- end groupsection -->
	
			<div class="groupsection">
				<span id="">Missionary Funds</span><br>
				<div class="checkboxes">
					<input type="checkbox" name="clubs[]" value="All Missions"><label>All Missions</label> <br>
					<input type="checkbox" name="clubs[]" value="College Missions"><label>College Missions</label> <br>
					<input type="checkbox" name="clubs[]" value="Overseas Missions"><label>Overseas Missions</label> <br>
					<input type="checkbox" name="clubs[]" value="Youth & Teen"><label>Youth & Teen</label> <br>
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
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br><input type="hidden" name="orgtype" value="Christian Faiths">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection">
					<span id="">Missionary Funds</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="genral[]" value="All Missions"><label>All Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="College Missions"><label>College Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="Overseas Missions"><label>Overseas Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth & Teen"><label>Youth & Teen</label> <br><input type="hidden" name="orgtype" value="Christian Faiths">
						<input type="hidden" name="grouptype" value="Baptist">
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
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				<div class="groupsection">
					<span id="">Missionary Funds</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="All Missions"><label>All Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="College Missions"><label>College Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="Overseas Missions"><label>Overseas Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth & Teen"><label>Youth & Teen</label> <br><input type="hidden" name="orgtype" value="Christian Faiths">
						<input type="hidden" name="grouptype" value="Catholic">
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
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection">
					<span id="">Missionary Funds</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="All Missions"><label>All Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="College Missions"><label>College Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="Overseas Missions"><label>Overseas Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth & Teen"><label>Youth & Teen</label> <br><input type="hidden" name="orgtype" value="Christian Faiths">
						<input type="hidden" name="grouptype" value="Episcopal">
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
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection">
					<span id="">Missionary Funds</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="All Missions"><label>All Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="College Missions"><label>College Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="Overseas Missions"><label>Overseas Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth & Teen"><label>Youth & Teen</label> <br><input type="hidden" name="orgtype" value="Christian Faiths">
						<input type="hidden" name="grouptype" value="Lutheran">
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
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection">
					<span id="">Missionary Funds</span><br>
					<div class="checkboxes">						
						<input type="checkbox" name="clubs[]" value="All Missions"><label>All Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="College Missions"><label>College Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="Overseas Missions"><label>Overseas Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth & Teen"><label>Youth & Teen</label> <br><input type="hidden" name="orgtype" value="Christian Faiths">
						<input type="hidden" name="grouptype" value="Methodist">
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
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br><input type="hidden" name="orgtype" value="Christian Faiths">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection">
					<span id="">Missionary Funds</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="All Missions"><label>All Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="College Missions"><label>College Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="Overseas Missions"><label>Overseas Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth & Teen"><label>Youth & Teen</label> <br><input type="hidden" name="orgtype" value="Christian Faiths">
						<input type="hidden" name="grouptype" value="Presbyterian">
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
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection">
					<span id="">Missionary Funds</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="All Missions"><label>All Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="College Missions"><label>College Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="Overseas Missions"><label>Overseas Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth & Teen"><label>Youth & Teen</label> <br><input type="hidden" name="orgtype" value="Christian Faiths">
						<input type="hidden" name="grouptype" value="Orthodox">
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
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection">
					<span id="">Missionary Funds</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="All Missions"><label>All Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="College Missions"><label>College Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="Overseas Missions"><label>Overseas Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth & Teen"><label>Youth & Teen</label> <br><input type="hidden" name="orgtype" value="Christian Faiths">
						<input type="hidden" name="grouptype" value="Spirit-Filled">
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
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br><input type="hidden" name="orgtype" value="Christian Faiths">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection">
					<span id="">Missionary Funds</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="All Missions"><label>All Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="College Missions"><label>College Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="Overseas Missions"><label>Overseas Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth & Teen"><label>Youth & Teen</label> <br><input type="hidden" name="orgtype" value="Christian Faiths">
						<input type="hidden" name="grouptype" value="Spirit-Filled">
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
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection">
					<span id="">Missionary Funds</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="All Missions"><label>All Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="College Missions"><label>College Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="Overseas Missions"><label>Overseas Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth & Teen"><label>Youth & Teen</label> <br><input type="hidden" name="orgtype" value="Christian Faiths">
						<input type="hidden" name="grouptype" value="Christian Other">
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
				<div class="groupsection2 shortbreak">
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
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				
				<div class="groupsection">
					<span id="">Mission Trips</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="All Missions"><label>All Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="College Missions"><label>College Missions</label> <br>
						<input type="checkbox" name="clubs[]"value="Israel Mission"><label>Israel Mission</label> <br>
						<input type="checkbox" name="clubs[]" value="Overseas Missions"><label>Overseas Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth & Teen"><label>Youth & Teen</label> <br><input type="hidden" name="orgtype" value="Judaism">
						<input type="hidden" name="grouptype" value="Jewish Conservative">
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
				<div class="groupsection2 shortbreak">
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
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				
				<div class="groupsection">
					<span id="">Mission Trips</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="All Missions"><label>All Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="College Missions"><label>College Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="Israel Mission"><label>Israel Mission</label> <br>
						<input type="checkbox" name="clubs[]" value="Overseas Missions"><label>Overseas Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth & Teen"><label>Youth & Teen</label> <br><input type="hidden" name="orgtype" value="Judaism">
						<input type="hidden" name="grouptype" value="Jewish Orthodox">
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
				<div class="groupsection2 shortbreak">
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
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				
				<div class="groupsection">
					<span id="">Mission Trips</span><br>
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="All Missions"><label>All Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="College Missions"><label>College Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="Israel Mission"><label>Israel Mission</label> <br>
						<input type="checkbox" name="clubs[]" value="Overseas Missions"><label>Overseas Missions</label> <br>
						<input type="checkbox" name="clubs[]" value="Youth & Teen"><label>Youth & Teen</label> <br><input type="hidden" name="orgtype" value="Judaism">
						<input type="hidden" name="grouptype" value="Jewish Reformed">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		
		
		case "Buddhism":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Buddhist Organization to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Main Website"><label>Main Website</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br><input type="hidden" name="orgtype" value="Other Faiths">
						<input type="hidden" name="grouptype" value="Buddhism">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		
		case "Hinduism":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Hindu Organization to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Main Website"><label>Main Website</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br><input type="hidden" name="orgtype" value="Other Faiths">
						<input type="hidden" name="grouptype" value="Hinduism">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		
		case "Islam":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Muslim Organization to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Main Website"><label>Main Website</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br><input type="hidden" name="orgtype" value="Other Faiths">
						<input type="hidden" name="grouptype" value="Islam">
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
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br><input type="hidden" name="orgtype" value="Other Faiths">
						<input type="hidden" name="grouptype" value="Other Faiths">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		
		case "Local & National Organizations":
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
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br> <input type="hidden" name="orgtype" value="Local & National Organization">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Local & National Charities":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Local or National Charity to Setup</h2></div>

			<input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Alzheimer Foundation of America"><label>Alzheimer Foundation of America (AFA)</label> <br>
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
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br><input type="hidden" name="orgtype" value="Local & National Organization">
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
						<input type="checkbox" name="clubs[]" value="Local Womens Shelters"><label>Local Women&#39;s Shelters</label> <br>
						<input type="checkbox" name="clubs[]" value="Police Department"><label>Police Department</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
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
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
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
                                     <input type="hidden" name="grouptype" value="Sports League">
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Summer League"><label>Summer League</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> <br>
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
<input type="hidden" name="grouptype" value="General">
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
					<input type="checkbox" name="clubs[]" value="Kiwanis">
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type<label>General</label> <br><input type="hidden" name="orgtype" value="Local & National Organizations">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Kiwanis":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Kiwanis</h2></div>

			<input type="hidden" name="grouptype" value="Kiwanis">

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Kiwanis"><label>Kiwanis</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						 <br><input type="hidden" name="orgtype" value="Local & National Organizations">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Jaycees":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Jaycees</h2></div>

			<input type="hidden" name="grouptype" value="Jaycees">

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Jaycees"><label>Jaycees</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						 <br><input type="hidden" name="orgtype" value="Local & National Organizations">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Junior League":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Junior League </h2></div>

			 <input type="hidden" name="grouptype" value="Junior League">

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Junior League"><label>Junior League</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						 <br><input type="hidden" name="orgtype" value="Local & National Organizations">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Knights of Columbus":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Knights of Columbus</h2></div>
                     <input type="hidden" name="grouptype" value="Knights of Columbus">
			
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Knights of Columbus"><label>Knights of Columbus</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						<br><input type="hidden" name="orgtype" value="Local & National Organizations">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Lions Club International":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Lions Club International (LCI)</h2></div>
<input type="hidden" name="grouptype" value="Lions Club International">
			

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Lions Club International (LCI)"><label>Lions Club International</label> <br> <input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type<br><input type="hidden" name="orgtype" value="Local & National Organizations">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Masonic Service Association":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Masonic Service Association</h2></div>
  
<input type="hidden" name="grouptype" value="Masonic Service Association">
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Masonic Service Association"><label>Masonic Service Association</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						 <br><input type="hidden" name="orgtype" value="Local & National Organizations">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Optimist International":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Optimist International</h2></div>

			<input type="hidden" name="grouptype" value="Optimist International">

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Optimist International "><label>Optimist International</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						<br><input type="hidden" name="orgtype" value="Local & National Organizations">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Rotary Club":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Rotary Club</h2></div>

      <input type="hidden" name="grouptype" value="Rotary Club">
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Rotary Club"><label>Rotary Club</label> <br> <input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type<br><input type="hidden" name="orgtype" value="Local & National Organizations">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Shriners International":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Shriners International</h2></div>

		<input type="hidden" name="grouptype" value="Shriners International">

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Shriners International"><label>Shriners International</label> <input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						 <br><input type="hidden" name="orgtype" value="Local & National Organizations">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "The American Legion":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>The American Legion</h2></div>
        <input type="hidden" name="grouptype" value="The American Legion">

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="The American Legion"><label>The American Legion</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						 <br><input type="hidden" name="orgtype" value="Local & National Organizations">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Veterans of Foreign Wars":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Veterans of Foreign Wars (VFW)</h2></div>
                            <input type="hidden" name="grouptype" value="Veterans of Foreign Wars">

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Veterans of Foreign Wars "><label>Veterans of Foreign Wars (VFW)</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						 <br><input type="hidden" name="orgtype" value="Local & National Organizations">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Alzheimer Foundation of America":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Alzheimer Foundation of America</h2></div>

		<input type="hidden" name="grouptype" value="Alzheimer Foundation of America">

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Alzheimer Foundation of America"><label>Alzheimer Foundation of America</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						 <br><input type="hidden" name="orgtype" value="Local & National Charities">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "American Cancer Society":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>American Cancer Society</h2></div>


			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="American Cancer Society"><label>American Cancer Society</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						<br><input type="hidden" name="orgtype" value="Local & National Charities"><input type="hidden" name="grouptype" value="American Cancer Society">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "American Diabetes Association":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>American Diabetes Association</h2></div>


			<div class="groupcolumns">
				<div class="groupsection">
			<div class="checkboxes">
<input type="checkbox" name="clubs[]" value="American Diabetes Association"><label>American Diabetes Association</label> <br>
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
			<div class="interim-header"><h2>American Heart Association</h2></div>


			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="American Heart Association"><label>American Heart Association</label> <br>
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
			<div class="interim-header"><h2>American Red Cross</h2></div>

			
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="American Red Cross"><label>American Red Cross</label><br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						
						<input type="hidden" name="orgtype" value="Local & National Charities"><input type="hidden" name="grouptype" value="American Red Cross">
				<input type="hidden" name="grouptype" value="American Red Cross">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Boys & Girls Club of America":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Boys & Girls Club of America</h2></div>

			

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Boys & Girls Club of America"><label>Boys & Girls Club of America</label> <br>
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
			<div class="interim-header"><h2>Cancer Research Institute</h2></div>

			

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Cancer Research Institute"><label>Cancer Research Institute</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						 <br><input type="hidden" name="orgtype" value="Local & National Charities"><input type="hidden" name="grouptype" value="Cancer Research Institute">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Cerebral Palsy":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Cerebral Palsy</h2></div>

			
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Cerebral Palsy"><label>Cerebral Palsy</label><br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						
						<input type="hidden" name="orgtype" value="Local & National Charities">
				<input type="hidden" name="grouptype" value="Cerebral Palsy">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		
		case "Goodwill Industries International":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Goodwill Industries International</h2></div>

		<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Goodwill Industries International"><label>Goodwill Industries International</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						<br><input type="hidden" name="orgtype" value="Local & National Charities"><input type="hidden" name="grouptype" value="Goodwill Industries International">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Leukemia & Lymphoma Society":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Leukemia & Lymphoma Society</h2></div><div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Leukemia & Lymphoma Society"><label>Leukemia & Lymphoma Society</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						 <br><input type="hidden" name="orgtype" value="Local & National Charities"><input type="hidden" name="grouptype" value="Leukemia & Lymphoma Society">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Habitat for Humanity":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Habitat for Humanity</h2></div>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Habitat for Humanity"><label>Habitat for Humanity</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						 <br><input type="hidden" name="orgtype" value="Local & National Charities"><input type="hidden" name="grouptype" value="Habitat for Humanity">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Make-A-Wish Foundation of America":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Make-A-Wish Foundation of America</h2></div>

			

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Make-A-Wish Foundation of America"><label>Make-A-Wish Foundation of America</label> 
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						<br><input type="hidden" name="orgtype" value="Local & National Charities"><input type="hidden" name="grouptype" value="Make-A-Wish Foundation of America">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "March of Dimes":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>March of Dimes</h2></div>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="March of Dimes"><label>March of Dimes</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type <input type="hidden" name="orgtype" value="Local & National Charities">
						<input type="hidden" name="grouptype" value="March of Dimes">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Muscular Dystrophy Association":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Muscular Dystrophy Association</h2></div>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Muscular Dystrophy Association"><label>Muscular Dystrophy Association</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						 <br><input type="hidden" name="orgtype" value="Local & National Charities"><input type="hidden" name="grouptype" value="Muscular Dystrophy Association">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Special Olympics":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Special Olympics</h2></div>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Special Olympics"><label>Special Olympics</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						 <br><input type="hidden" name="orgtype" value="Local & National Charities"><input type="hidden" name="grouptype" value="Special Olympics">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "St. Jude Chidrens Research Hospital":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>St. Jude Chidrens Research Hospital</h2></div>

			
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="St. Jude Chidrens Research Hospital"><label>St. Jude Chidrens Research Hospital</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						 <br><input type="hidden" name="orgtype" value="Local & National Charities"><input type="hidden" name="grouptype" value="St. Jude Chidrens Research Hospital">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "St. Jude Chidrens Research Hospital":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>St. Jude Chidrens Research Hospital</h2></div>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="St. Jude Chidrens Research Hospital"><label>St. Jude Chidrens Research Hospital</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						 <br><input type="hidden" name="orgtype" value="Local & National Charities"><input type="hidden" name="grouptype" value="St. Jude Chidrens Research Hospital">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		
		case "Susan G. Komen":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Susan G. Komen</h2></div>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Susan G. Komen"><label>Susan G. Komen</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						 <br><input type="hidden" name="orgtype" value="Local & National Charities"><input type="hidden" name="grouptype" value="Susan G. Komen">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Susan G. Komen":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Susan G. Komen</h2></div>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Susan G. Komen"><label>Susan G. Komen</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						 <br><input type="hidden" name="orgtype" value="Local & National Charities"><input type="hidden" name="grouptype" value="Susan G. Komen">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "The Salvation Army":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>The Salvation Army</h2></div>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="The Salvation Army"><label>The Salvation Army</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						 <br><input type="hidden" name="orgtype" value="Local & National Charities"><input type="hidden" name="grouptype" value="The Salvation Army">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "The Simon Wiesenthal Foundation":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>The Simon Wiesenthal Foundation</h2></div>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="The Simon Wiesenthal Foundation"><label>The Simon Wiesenthal Foundation</label> <br>
						<input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						 <br><input type="hidden" name="orgtype" value="Local & National Charities"><input type="hidden" name="grouptype" value="The Simon Wiesenthal Foundation">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "United Way":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>United Way</h2></div>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="United Way"><label>United Way</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						 <br><input type="hidden" name="orgtype" value="Local & National Charities"><input type="hidden" name="grouptype" value="United Way">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Wounded Warrior Project":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Wounded Warrior Project</h2></div>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Wounded Warrior Project"><label>Wounded Warrior Project</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						 <br><input type="hidden" name="orgtype" value="Local & National Charities"><input type="hidden" name="grouptype" value="Wounded Warrior Project">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Animal Shelters":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Animal Shelters</h2></div>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Animal Shelters"><label>Animal Shelters</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						 <br><input type="hidden" name="orgtype" value="Community Organizations"><input type="hidden" name="grouptype" value="Animal Shelters">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "ASPCA":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>ASPCA</h2></div>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="ASPCA"><label>ASPCA</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						 <br><input type="hidden" name="orgtype" value="Community Organizations"><input type="hidden" name="grouptype" value="ASPCA">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Community Food Bank":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Community Food Bank</h2></div>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Community Food Bank"><label>Community Food Bank</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						 <br><input type="hidden" name="orgtype" value="Community Organizations"><input type="hidden" name="grouptype" value="Community Food Bank">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Fire Department":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Fire Deparment</h2></div>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Fire Department"><label>Fire Department</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other">
						 <br><input type="hidden" name="orgtype" value="Community Organizations"><input type="hidden" name="grouptype" value="Fire Department">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Police Department":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Police Department</h2></div>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Police Deparment"><label>Police Department</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other">
						 <br><input type="hidden" name="orgtype" value="Community Organizations"><input type="hidden" name="grouptype" value="Police Department">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Local Food Shelves":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Local Food Shelves</h2></div>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Local Food Shelves"><label>Local Food Shelves</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other">
						 <br><input type="hidden" name="orgtype" value="Community Organizations"><input type="hidden" name="grouptype" value="Local Food Shelves">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Local Homeless Shelters":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Local Homeless Shelters</h2></div>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Local Homeless Shelters"><label>Local Homeless Shelters</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other">
						 <br><input type="hidden" name="orgtype" value="Community Organizations"><input type="hidden" name="grouptype" value="Local Homeless Shelters">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Local Womens Shelters":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Local Womens Shelters</h2></div>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Local Womens Shelters"><label>Local Womens Shelters</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other">
						 <br><input type="hidden" name="orgtype" value="Community Organizations"><input type="hidden" name="grouptype" value="Local Womens Shelters">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Athletic Associations":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Athletic Associations</h2></div>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Athletic Associations"><label>Athletic Associations</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other">
						 <br><input type="hidden" name="orgtype" value="Youth & Sports">
						 <input type="hidden" name="grouptype" value="Athletic Associations">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Big Brother/Big Sisters of America":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Big Brother/Big Sisters of America</h2></div>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Big Brother/Big Sisters of America"><label>Big Brother/Big Sisters of America</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other">
						 <br><input type="hidden" name="orgtype" value="Youth & Sports">
						 <input type="hidden" name="grouptype" value="Big Brother/Big Sisters of America">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Cub Scouts":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Cub Scouts</h2></div>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Cub Scouts"><label>Cub Scouts</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						 <br><input type="hidden" name="orgtype" value="Youth & Sports">
						 <input type="hidden" name="grouptype" value="Cub Scouts">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Boy Scouts":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Boy Scouts</h2></div>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Boy Scouts"><label>Boy Scouts</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group 
						 <br><input type="hidden" name="orgtype" value="Youth & Sports">
						 <input type="hidden" name="grouptype" value="Boy Scouts">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Girl Scouts":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Girl Scouts</h2></div>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Girl Scouts"><label>Girl Scouts</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other">
						 <br><input type="hidden" name="orgtype" value="Summer Leagues"><input type="hidden" name="grouptype" value="Girl Scouts">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "Summer Leagues":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Summer Leagues</h2></div>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="Summer Leagues"><label>Summer Leagues</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other">
						 <br><input type="hidden" name="orgtype" value="Summer Leagues">
						 <input type="hidden" name="grouptype" value="Summer Leagues">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "YMCA":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>YMCA</h2></div>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="YMCA"><label>YMCA</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						 <br><input type="hidden" name="orgtype" value="Youth & Sports">
						 <input type="hidden" name="grouptype" value="YMCA">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		case "YWCA":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>YWCA</h2></div>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<input type="checkbox" name="clubs[]" value="YWCA"><label>YWCA</label> <br><input type="text" class="group" id="clubs1" name="clubs1" value="" placeholder="Please type in the club" title="Other"> Enter Group Type
						 <br><input type="hidden" name="orgtype" value="Youth & Sports">
						 <input type="hidden" name="grouptype" value="YWCA">
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
	}
?>
              
         <br>
         <div class="interim-form">
			<div class="interim-header"><h2>Contact Information</h2></div>
			<div class="row">
				<span id="hd_frname"><?echo $fundtype;?>&nbsp;Name</span>
			</div> <!-- end row -->			
			<div class="row">
				<input id="frname" type="text" name="frname" maxlength="40" required>
			</div> <!-- end row -->
			
			<div class="row">
				<span id="hd_address1">Address 1</span>
        			<span id="hd_address2">Address 2</span>
			</div> <!-- end row -->
			<div class="row">
				<input id="address1" type="text" name="address1" maxlength="50" required>
        			<input id="address2" type="text" name="address2" maxlength="50">
			</div> <!-- end row -->
			
			<div class="row">
				<span id="hd_city">City</span>
        			<span id="hd_state">State</span>
        			<span id="hd_zip">Zip</span>
			</div> <!-- end row -->
			<div class="row">
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
			</div> <!-- end row -->
			<div class="row">
				
        			<span id="hd_zip">Phone</span>
			</div> <!-- end row -->
			<div class="row">
			<input type="text" name="phone" id="phone" value="" maxlength="14" />
			</div> <!-- end row -->
		</div> <!-- end interim-form -->
		
		<div class="interim-form">
			<div class="interim-header"><h2>Website</h2></div>
				<div class="row">
					<span id="hd_url"><?php echo $fundtype; ?>'s<br>Existing Website URL</span>
				</div> <!-- end row -->
				<div class="row">
					<input id="url" name="websiteURL" type="url" maxlength="250">include http://
				</div> <!-- end row -->
				
				<div class="row">
					<span id="hd_banner"></span>
				</div> <!-- end row -->
				<div class="row">
				<h6><b>1.</b> <?echo $fundtype;?>'s Banner</h6>
					<input id="AddOrgBannerPhoto" name="banner" type="file">
				</div> <!-- end row -->
				<div class="row"> <!-- Leader bottom left pic -->
          		<!--<h6><b>2.</b> Main Fundraiser Leader Photo (optional)</h6>
          		<span id="">Upload Photo:</span><br>
          	        
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
          	
          	<div class="row"> <!-- Member Leader bottom right pic -->
          		<!--<h6><b>3.</b> Student or Other Fundraiser Leader Photo (optional)</h6>
          		<span id="">Upload Photo:</span><br>
          	      
          		<input id="" name="AddOrgLocationPhoto" type="file">
          		<br>
          		<br>
          		<input type="text" name="capt2" value="" placeholder="" > Caption Title
          		<br>
          		<br>
          		<input type="text" name="cap2" value="" placeholder="" > Caption-->
          	</div> <!-- end row -->
          	
          	<br>
          	
          	<div class="row"> <!-- Profile Pic in Left Nav -->
          		<!--<h6><b>4.</b> Location or General Photo (optional)</h6>
          		<span id="longtext">Upload Photo:</span><br>
          		
          		<input id="longtext" name="AddOrgGroupPhoto" type="file" title="Upload photo of the group/team fundraising">
          	</div>--> <!-- end row -->
          	
          	<br>
         
          	
          	<div class="row"> <!-- Group/Collage in center of page -->
          	<!--<h6><b>5.</b>Fundraising Group Photo or Collage (optional)</h6>
          		<span id="longtext">Upload Photo:</span><br>
          	    	
          		<input id="longtext" name="collagePhoto" type="file" title="Upload new file to change current collage photo.">
          	</div>-->
		</div> <!-- end interim-form -->
	</div> <!-- end table -->
	
        <input type="hidden" name="fundtype" value="<?php echo $fundtype; ?>" />
        <input type="hidden" name="setup_person" value="<?php echo $loginuser; ?>" />
        <input type="hidden" name="type" value="fundraiser" />
        <input type="hidden" name="validation"  id="validation" value="0" />
        <input type="submit" name="submit" class="redbutton" value="Create New Fundraiser" >
      </form>
      <br>
        
        
  </div> <!--end content-->
  
      <div class="clearfloat"></div>
   <?php include '../includes/footer.php' ; ?>
    </div> <!--end container--> 
    
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