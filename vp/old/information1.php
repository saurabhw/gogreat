<?php
	session_start();

  if(!isset($_SESSION['authenticated']))
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
   
   $pic = $row['picPath'];
   
	$group = $_GET['group'];
	$type = $_POST['RadioGroup1'];
	$fundtype = $_POST['fundtype'];
	$loginuser = $_SESSION['userId'];
	
	$bob = 24503;
	
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
      
      <div class="table">
      <form class="" action="addFundraiser.php" method="post" id="myForm" name="myForm" onsubmit="return validate(this);" enctype="multipart/form-data">
      		<select name="scid" onChange="fetch_select2(this.value);" required>
      		<option>Select Sales Coordinator</option>
      		<option value="<?  echo $bob;?>">Set GreatMoods as Coordinator</option>
      		<?
      		$sql = "SELECT * FROM distributors WHERE vpID = '$userID' AND role = 'SC'";
		$result2 = mysqli_query($link, $sql)or die ("couldn't execute query distrubutors.".mysql_error());
	
		while($row2 = mysqli_fetch_assoc($result2))
		{
                   echo '<option value="'.$row2[loginid].'">'.$row2['FName'].' '.$row2[LName].'</option>';
	        }
	        ?>
      		</select>
      		<select name="rpid" id="rpid" required>
      		</select>
      		<br />
      		<br />
      		<div class="interim-form">
			<div class="interim-header"><h2>Contact Information</h2></div>
			<div class="tablerow">
				<span id="hd_frname"><?echo $fundtype;?>&nbsp;Name</span>
			</div> <!-- end row -->			
			<div class="tablerow">
				<input id="frname" type="text" name="frname" maxlength="40" required>
			</div> <!-- end row -->
			
			<div class="tablerow">
				<span id="hd_address1">Address 1</span>
        			<span id="hd_address2">Address 2</span>
			</div> <!-- end row -->
			<div class="tablerow">
				<input id="address1" type="text" name="address1" maxlength="50" required>
        			<input id="address2" type="text" name="address2" maxlength="50">
			</div> <!-- end row -->
			
			<div class="tablerow">
				<span id="hd_city">City</span>
        			<span id="hd_state">State</span>
        			<span id="hd_zip">Zip</span>
			</div> <!-- end row -->
			<div class="tablerow">
				<input id="city" type="text" maxlength="30" name="city" required/>
        			<select id="state" name="state">
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
			<div class="tablerow">
				
        			<span id="hd_zip">Phone</span>
			</div> <!-- end row -->
			<div class="tablerow">
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
					<span id="hd_banner"><?echo $fundtype;?>'s Banner</span>
				</div> <!-- end row -->
				<div class="row">
					<input id="AddOrgBannerPhoto" name="banner" type="file">
				</div> <!-- end row -->
		</div> <!-- end interim-form -->
	
		
	<!--<form class="photos" action="photos.php" method="POST" name="addPhotos" enctype="multipart/form-data" id="addPhotos" onSubmit="return validate(this);">
		<div class="interim-form">
			<div class="interim-header"><h2>Photos</h2></div>
				<div class="row">
					<label for="AddOrgLeaderPhoto"><b>Photo of Organization Leader(s):</b></label>
				        <br />
				        <input name="AddOrgLeaderPhoto" type="file" id="AddOrgLeaderPhoto" />
				       
				        <input name="RemoveOrgLeaderPhoto" type="checkbox" id="RemoveOrgLeaderPhoto" value="RemoveOrgLeaderPhoto">
				        <label for="RemoveOrgLeaderPhoto">Remove Current Photo</label> 
				        <input id="websiteURL" type="text" name="c1" value="<? echo $a1;?>" />Caption 1 Title
				        <br />
				        <input id="websiteURL" type="text" name="c1n" value="<? echo $a1n;?>"" />Caption 1 Name
				</div> <!-- end row -->
				
				<!--<div class="row">
					<label for="AddOrgContactPhoto"><b>Photo for Contact Information:</b></label>
				        <br />
				        <input name="AddOrgContactPhoto" type="file" id="AddOrgContactPhoto" />
				        <input name="RemoveOrgContactPhoto" type="checkbox" id="RemoveOrgContactPhoto" value="RemoveOrgContactPhoto">
				        <label for="RemoveOrgContactPhoto">Remove Current Photo</label>
				        <input type="text" name="c2" value="<? echo $a2;?>"" id="websiteURL" />Caption 2 Title
				        <br />
				        <input id="websiteURL" type="text" name="c2n" value="<? echo $a2n;?>"" />Caption 2 Name
				</div> <!-- end row -->
				
				<!--<div class="row">
					<label for="AddOrgLocationPhoto"><b>Photo of Student Leader:</b></label>
				        <br />
				        <input name="AddOrgLocationPhoto" type="file" id="AddOrgLocationPhoto" />
				        <input name="RemoveOrgLocationPhoto" type="checkbox" id="RemoveOrgLocationPhoto" value="RemoveOrgLocationPhoto">
				        <label for="RemoveOrgLocationPhoto">Remove Current Photo</label>
				        <input type="text" name="c3" value="<? echo $a3;?>"" id="websiteURL" />Caption 3 Title
				        <br />
				        <input id="websiteURL" type="text" name="c3n" value="<? echo $a3n;?>"" />Caption 3 Name 
				</div> <!-- end row -->
				
				<!--<div class="row">
					<label for="AddOrgGroupPhoto"><b>Photo of Group/Team:</b></label>
				        <br />
				        <input name="AddOrgGroupPhoto" type="file" id="AddOrgGroupPhoto" />
				        <input name="RemoveOrgGroupPhoto" type="checkbox" id="RemoveOrgGroupPhoto" value="RemoveOrgGroupPhoto">
				        <label for="RemoveOrgGroupPhoto">Remove Current Photo</label>
				        <input type="text" name="c4" value="<? echo $a4;?>"" id="websiteURL" />Caption 4 Title
				        <br />
				        <input id="websiteURL" type="text" name="c4n" value="<? echo $a4n;?>"" />Caption 4 Name
				</div> <!-- end row -->
				<!--<br>
				<input name="group" type="hidden" value="<?php echo $group; ?>">
			          <input name="submit" type="submit" class="redbutton" value="Save">
		</div>--> <!-- end interim-form -->
	<!--</form>-->

        <?php
	switch($fundtype) {
		case "College":
		echo'<div class="interim-form"> 
			<div class="interim-header"><h2>Select College Groups to Setup</h2></div>

			<span class="checkbox"><input type="checkbox" name="all" onClick="toggle(this)"><label>Select All Groups</label>
			<br><br>
			<div class="groupcolumns">
				<div class="groupsection colnobreak">
					<span id="">Clubs & Organizations</span><br>
					<div class="checkboxes">
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="4-H"><label>4-H</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Alumni Association"><label>Alumni Association</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Band"><label>Band</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="BPA"><label>BPA</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Chess Club"><label>Chess Club</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Choir"><label>Choir</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Debate"><label>Debate</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="DECA"><label>DECA</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Drumline"><label>Drumline</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="FBLA"><label>FBLA</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="FFA"><label>FFA</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Greeks"><label>Greeks</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Jazz Band"><label>Jazz Band</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Key Club"><label>Key Club</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Language Club"><label>Language Club</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Math Club"><label>Math Club</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="National Honor Society"><label>National Honor Society</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Orchestra"><label>Orchestra</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Robotics & Technology"><label>Robotics & Technology</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="ROTC"><label>ROTC</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Science Club"><label>Science Club</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Scripture Study"><label>Scripture Study</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Student Council"><label>Student Council</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Theatre & Drama"><label>Theatre & Drama</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Other"><input type="text" class="group" name="clubs[]" value="" placeholder="Other" title="Please type in the club"><br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection colbreak">
					<span id="">General</span><br>
					<div class="checkboxes">
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Athletic Equipment"><label>Athletic Equipment</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Field Trips & Travel"><label>Field Trips & Travel</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Library & Technology"><label>Library & Technology</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><label>Projection, Audio, Video</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><label>Tablets, Laptops & PCs</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Other"><input type="text" class="group" name="clubs[]" value="" placeholder="Other" title="Please type in the club"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				
				<br>
				
				<div class="groupsection">
					<span id="">Athletics</span><br>
					<div class="checkboxes">
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Archery"><label>Archery</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Badminton"><label>Badminton</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Baseball"><label>Baseball</label></span></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Basketball, Boys"><label>Basketball, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Basketball, Girls"><label>Basketball, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Bowling, Boys"><label>Bowling, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Bowling, Girls"><label>Bowling, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="CC Running, Boys"><label>CC Running, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="CC Running, Girls"><label>CC Running, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="CC Skiing, Boys"><label>CC Skiing, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="CC Skiing, Girls"><label>CC Skiing, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Cheerleading"><label>Cheerleading</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Cycling"><label>Cycling</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Danceline"><label>Danceline</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Diving, Boys"><label>Diving, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Diving, Girls"><label>Diving, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Field  Hockey"><label>Field  Hockey</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Figure Skating"><label>Figure Skating</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Football"><label>Football</label></span></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Golf, Boys"><label>Golf, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Golf, Girls"><label>Golf, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Gymnastics, Boys"><label>Gymnastics, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Gymnastics, Girls"><label>Gymnastics, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Ice Hockey, Boys"><label>Ice Hockey, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Ice Hockey, Girls"><label>Ice Hockey, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Lacrosse, Boys"><label>Lacrosse, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Lacrosse, Girls"><label>Lacrosse, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Mountaineering"><label>Mountaineering</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Power Lifting"><label>Power Lifting</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Racquetball"><label>Racquetball</label></span></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Rodeo"><label>Rodeo</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Rowing, Boys"><label>Rowing, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Rowing, Girls"><label>Rowing, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Rugby, Boys"><label>Rugby, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Rugby, Girls"><label>Rugby, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Sailing"><label>Sailing</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Ski & Snowboard, Boys"><label>Ski & Snowboard, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Ski & Snowboard, Girls"><label>Ski & Snowboard, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Soccer, Boys"><label>Soccer, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Soccer, Girls"><label>Soccer, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Softball"><label>Softball</label></span></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Swimming, Boys"><label>Swimming, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Swimming, Girls"><label>Swimming, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Synchronized Swimming"><label>Synchronized Swimming</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Table Tennis"><label>Table Tennis</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Tennis, Boys"><label>Tennis, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Tennis, Girls"><label>Tennis, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Track & Field, Boys"><label>Track & Field, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Track & Field, Girls"><label>Track & Field, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Ultimate Frisbee, Boys"><label>Ultimate Frisbee, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Ultimate Frisbee, Girls"><label>Ultimate Frisbee, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Volleyball, Boys"><label>Volleyball, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Volleyball, Girls"><label>Volleyball, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Water Polo"><label>Water Polo</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Wrestling"><label>Wrestling</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Other"><input type="text" class="group" name="clubs[]" value="" placeholder="Other" title="Please type in the club"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "High School":
		echo'<div class="interim-form"> 
		<div class="interim-header"><h2>Select High School Groups to Setup</h2></div>

		<span class="checkbox"><input type="checkbox" name="all" onClick="toggle(this)"><label>Select All Groups</label>
		<br><br>
		<div class="groupcolumns">
			<div class="groupsection colnobreak">
				<span id="">Clubs & Organizations</span><br>
				<div class="checkboxes">
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="4-H"><label>4-H</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Band"><label>Band</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Booster Club"><label>Booster Club</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="BPA"><label>BPA</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Chess Club"><label>Chess Club</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Choir"><label>Choir</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Debate"><label>Debate</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="DECA"><label>DECA</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="FBLA"><label>FBLA</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="FFA"><label>FFA</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Jazz Band"><label>Jazz Band</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="JROTC"><label>JROTC</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Key Club"><label>Key Club</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Language Club"><label>Language Club</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Math Club"><label>Math Club</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="National Honor Society"><label>National Honor Society</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Orchestra"><label>Orchestra</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="PTA/PTO"><label>PTA/PTO/PTC</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Robotics & Technology"><label>Robotics & Technology</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Science Club"><label>Science Club</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Scripture Study"><label>Scripture Study</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Student Council"><label>Student Council</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Theatre & Drama"><label>Theatre & Drama</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Yearbook"><label>Yearbook</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Other"><input type="text" class="group" name="clubs[]" value="" placeholder="Other" title="Please type in the club"> <br>
				</div> <!-- end checkboxes -->
			</div> <!-- end groupsection -->
		

				<div class="groupsection colbreak">
					<span id="">General</span><br>
					<div class="checkboxes">
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="General"><label>General</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Graduation"><label>Graduation</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Senior Class"><label>Senior Class</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Junior Class"><label>Junior Class</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Sophmore Class"><label>Sophmore Class</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Freshman Class"><label>Freshman Class</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Athletic Equipment"><label>Athletic Equipment</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Field Trips & Travel"><label>Field Trips & Travel</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Library & Technology"><label>Library & Technology</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Playground Equipment"><label>Playground Equipment</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><label>Projection, Audio, Video</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><label>Tablets, Laptops & PCs</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Other"><input type="text" class="group" name="clubs[]" value="" placeholder="Other" title="Please type in the club"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				
				<br>
				
				<div class="groupsection">
					<span id="">Athletics</span><br>
					<div class="checkboxes">
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Archery"><label>Archery</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Badminton"><label>Badminton</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Baseball"><label>Baseball</label></span></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Basketball, Boys"><label>Basketball, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Basketball, Girls"><label>Basketball, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Bowling, Boys"><label>Bowling, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Bowling, Girls"><label>Bowling, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="CC Running, Boys"><label>CC Running, Boys</label><br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="CC Running, Girls"><label>CC Running, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="CC Skiing, Boys"><label>CC Skiing, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="CC Skiing, Girls"><label>CC Skiing, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Cheerleading"><label>Cheerleading</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Cycling"><label>Cycling</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Danceline"><label>Danceline</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Diving, Boys"><label>Diving, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Diving, Girls"><label>Diving, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Field Hockey"><label>Field Hockey</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Figure Skating"><label>Figure Skating</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Football"><label>Football</label></span></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Golf, Boys"><label>Golf, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Golf, Girls"><label>Golf, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Gymnastics, Boys"><label>Gymnastics, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Gymnastics, Girls"><label>Gymnastics, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Ice Hockey"><label>Ice Hockey, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Ice Hockey"><label>Ice Hockey, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Lacrosse, Boys"><label>Lacrosse, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Lacrosse, Girls"><label>Lacrosse, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Mountaineering"><label>Mountaineering</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Power Lifting"><label>Power Lifting</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Racquetball"><label>Racquetball</label></span></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Rodeo"><label>Rodeo</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Rowing, Boys"><label>Rowing, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Rowing, Girls"><label>Rowing, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Rugby, Boys"><label>Rugby, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Rugby, Girls"><label>Rugby, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Sailing"><label>Sailing</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Ski & Snowboard, Boys"><label>Ski & Snowboard, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Ski & Snowboard, Girls"><label>Ski & Snowboard, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Soccer, Boys"><label>Soccer, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Soccer, Girls"><label>Soccer, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Softball"><label>Softball</label></span></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Swimming, Boys"><label>Swimming, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Swimming, Girls"><label>Swimming, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Table Tennis"><label>Table Tennis</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Tennis, Boys"><label>Tennis, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Tennis, Girls"><label>Tennis, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Track & Field, Boys"><label>Track & Field, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Track & Field, Girls"><label>Track & Field, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Ultimate Frisbee, Boys"><label>Ultimate Frisbee, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Ultimate Frisbee, Girls"><label>Ultimate Frisbee, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Volleyball, Boys"><label>Volleyball, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Volleyball, Girls"><label>Volleyball, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Water Polo"><label>Water Polo</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Wrestling"><label>Wrestling</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Other"><input type="text" class="group" name="clubs[]" value="" placeholder="Other" title="Please type in the club"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Middle School":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Middle School Groups to Setup</h2></div>

			<span class="checkbox"><input type="checkbox" name="all" onClick="toggle(this)"><label>Select All Groups</label>

			<br><br>
			<div class="groupcolumns">
				<div class="groupsection colnobreak">
					<span>Clubs & Organizations</span>
					<div class="checkboxes">
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="4-H"><label>4-H</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Band"><label>Band</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Booster Club"><label>Booster Club</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="BPA"><label>BPA</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Chess Club"><label>Chess Club</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Choir"><label>Choir</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Debate"><label>Debate</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="FFA"><label>FFA</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Jazz Band"><label>Jazz Band</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Language Club"><label>Language Club</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Math Club"><label>Math Club</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="National Honor Society"><label>National Honor Society</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Orchestra"><label>Orchestra</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="PTA/PTO/PTC"><label>PTA/PTO/PTC</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Band"><label>Band</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Science Club"><label>Science Club</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Band"><label>Band</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Scripture Study"><label>Scripture Study</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Student Council"><label>Student Council</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Theatre & Drama"><label>Theatre & Drama</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Yearbook"><label>Yearbook</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Other"><input type="text" class="group" name="clubs[]" value="" placeholder="Other" title="Please type in the club"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				
				<br>

				<div class="groupsection colbreak">
					<span>General</span><br>
					<div class="checkboxes">
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="General"><label>General</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="After-School Program"><label>After-School Program</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Athletic Equipment"><label>Athletic Equipment</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Field Trips & Travel"><label>Field Trips & Travel</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Library & Technology"><label>Library & Technology</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Playground Equipment"><label>Playground Equipment</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><label>Projection, Audio, Video</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><label>Tablets, Laptops & PCs</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Other"><input type="text" class="group" name="clubs[]" value="" placeholder="Other" title="Please type in the club"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
				
				<br>
				
				<div class="groupsection">
					<span>Athletics</span>
					<div class="checkboxes">
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Archery"><label>Archery</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Badminton"><label>Badminton</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Baseball"><label>Baseball</label></span></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Basketball, Boys"><label>Basketball, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Basketball, Girls"><label>Basketball, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Bowling"><label>Bowling</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="CC Running, Boys"><label>CC Running, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="CC Running, Girls"><label>CC Running, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="CC Skiing, Boys"><label>CC Skiing, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="CC Skiing, Girls"><label>CC Skiing, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Cheerleading"><label>Cheerleading</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Cycling"><label>Cycling</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Danceline"><label>Danceline</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Diving, Boys"><label>Diving, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Diving, Girls"><label>Diving, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Field Hockey"><label>Field Hockey</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Figure Skating"><label>Figure Skating</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Football"><label>Football</label></span></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Golf, Boys"><label>Golf, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Golf, Girls"><label>Golf, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Gymnastics, Boys"><label>Gymnastics, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Gymnastics, Girls"><label>Gymnastics, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Ice Hockey, Boys"><label>Ice Hockey, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Ice Hockey, Girls"><label>Ice Hockey, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Lacrosse, Boys"><label>Lacrosse, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Lacrosse, Girls"><label>Lacrosse, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Mountaineering"><label>Mountaineering</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Racquetball"><label>Racquetball</label></span></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Rodeo"><label>Rodeo</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Rowing"><label>Rowing</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Rugby, Boys"><label>Rugby, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Rugby, Girls"><label>Rugby, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Sailing"><label>Sailing</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Ski & Snowboard, Boys"><label>Ski & Snowboard, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Ski & Snowboard, Girls"><label>Ski & Snowboard, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Soccer, Boys"><label>Soccer, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Soccer, Girls"><label>Soccer, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Softball"><label>Softball</label></span></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Swimming, Boys"><label>Swimming, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Swimming, Girls"><label>Swimming, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Table Tennis"><label>Table Tennis</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Tennis, Boys"><label>Tennis, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Tennis, Girls"><label>Tennis, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Track & Field, Boys"><label>Track & Field, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Track & Field, Girls"><label>Track & Field, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Ultimate Frisbee, Boys"><label>Ultimate Frisbee, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Ultimate Frisbee, Girls"><label>Ultimate Frisbee, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Volleyball, Boys"><label>Volleyball, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Volleyball, Girls"><label>Volleyball, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Water Polo"><label>Water Polo</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Wrestling"><label>Wrestling</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Other"><input type="text" class="group" name="clubs[]" value="" placeholder="Other" title="Please type in the club"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Elementary School":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Elementary School Groups to Setup</h2></div>

			<span class="checkbox"><input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label></span>
			<br><br>
			<div class="groupcolumns">
				<div class="groupsection">
					<span>Clubs & Organizations</span>
					<div class="checkboxes">
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="4-H"><label>4-H</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Art Club"><label>Art Club</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Band"><label>Band</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Booster Club"><label>Booster Club</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Carnival"><label>Carnival</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Choir"><label>Choir</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Math Club"><label>Math Club</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="PTA/PTO/PTC"><label>PTA/PTO/PTC</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Science Club"><label>Science Club</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Theatre & Drama"><label>Theatre & Drama</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Other"><input type="text" class="group" name="clubs[]" value="" placeholder="Other" title="Please type in the club"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection colbreak">
					<span>General</span>
					<div class="checkboxes">
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="General"><label>General</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="After-School Program"><label>After-School Program</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Athletic Equipment"><label>Athletic Equipment </label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Field Trips & Travel"><label>Field Trips & Travel </label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Library & Technology"><label>Library & Technology</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><label>Projection, Audio, Video</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><label>Tablets, Laptops & PCs</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Other"><input type="text" class="group" name="clubs[]" value="" placeholder="Other" title="Please type in the club"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection colbreak">		
					<span>Athletics</span><br>
					<div class="checkboxes">
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Baseball"><label>Baseball</label></span></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Basketball, Boys"><label>Basketball, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Basketball, Girls"><label>Basketball, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Biking"><label>Biking</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Football"><label>Football</label></span></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Gymnastics, Boys"><label>Gymnastics, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Gymnastics, Girls"><label>Gymnastics, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Ice Hockey, Boys"><label>Ice Hockey, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Ice Hockey, Girls"><label>Ice Hockey, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Lacrosse, Boys"><label>Lacrosse, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Lacrosse, Girls"><label>Lacrosse, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Soccer, Boys"><label>Soccer, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Soccer, Girls"><label>Soccer, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Softball"><label>Softball</label></span></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Swimming, Boys"><label>Swimming, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Swimming, Girls"><label>Swimming, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="T-Ball"><label>T-ball</label></span></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Track & Field, Boys"><label>Track & Field, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Track & Field, Girls"><label>Track & Field, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Volleyball, Boys"><label>Volleyball, Boys</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Volleyball, Girls"><label>Volleyball, Girls</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Other"><input type="text" class="group" name="clubs[]" value="" placeholder="Other" title="Please type in the club"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Pre-School":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Pre-School Groups to Setup</h2></div>

			<span class="checkbox"><input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label></span>
			<br><br>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Equipment & Supplies"><label>Equipment & Supplies</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Field Trips & Travel"><label>Field Trips & Travel</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Playground Equipment"><label>Playground Equipment</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><label>Projection, Audio, Video</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><label>Tablets, Laptops & PCs</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Other"><input type="text" class="group" name="clubs[]" value="" placeholder="Other" title="Please type in the club"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Home School":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Home School Groups to Setup</h2></div>

			<span class="checkbox"><input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label></span>
			<br><br>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><label>Projection, Audio, Video</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Other"><input type="text" class="group" name="clubs[]" value="" placeholder="Other" title="Please type in the club"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Trade, Vocational & Tech":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Trade, Vocational & Tech Groups to Setup</h2></div>

			<span class="checkbox"><input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label></span>
			<br><br>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Field Trips & Travel"><label>Field Trips & Travel</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="General Equipment"><label>General Equipment</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Trade Supplies"><label>Trade Supplies</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Other"><input type="text" class="group" name="clubs[]" value="" placeholder="Other" title="Please type in the club"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Camps":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Camp Groups to Setup</h2></div>

			<span class="checkbox"><input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label></span>
			<br><br>
			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Bible Camps"><label>Bible Camps</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Dance Camps"><label>Dance Camps</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Education Camps"><label>Education Camps</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Family Camps"><label>Family Camps</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="General Camps"><label>General Camps</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Music Camps"><label>Music Camps</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Scouting Camps"><label>Scouting Camps</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Sports Camps"><label>Sports Camps</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Youth Camps"><label>Youth Camps</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Other"><input type="text" class="group" name="clubs[]" value="" placeholder="Other" title="Please type in the club"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		
		case "Religious Organization":
           echo '<div class="interim-form"> 
           <div class="interim-header"><h2>Select Religious Organization to Setup</h2></div>
           
           <span class="checkbox"><input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label></span>
           <br><br>

		<div class="groupcolumns">
	            	<div class="groupsection">
	            		<div class="checkboxes">
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Main Church Website"><label>Main Church Website</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Bible Camp"><label>Bible Camp</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Bible Study"><label>Bible Study</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Building Fund"><label>Building Fund</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Choir & Band"><label>Choir & Band</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Christmas Giving Tree"><label>Christmas Giving Tree</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Faith Formation"><label>Faith Formation</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Festivals"><label>Festivals</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Men’s Ministry"><label>Men’s Ministry</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Outreach Ministry"><label>Outreach Ministry</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Parish Fund"><label>Parish Fund</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><label>Projection, Audio, Video</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Student Ministry"><label>Student Ministry</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Sunday School"><label>Sunday School</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><label>Tablets, Laptops & PCs</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Women’s Ministry"><label>Women’s Ministry</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Youth’s Ministry"><label>Youth’s Ministry</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Other"><input type="text" class="group" name="clubs[]" value="" placeholder="Other" title="Please type in the club"> <br>
				</div> <!-- end checkboxes -->
			</div> <!-- end groupsection -->
	
			<div class="groupsection">
				<span id="">Missionary Funds</span><br>
				<div class="checkboxes">
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="All Missions"><label>All Missions</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="College Missions"><label>College Missions</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Overseas Missions"><label>Overseas Missions</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Youth & Teen"><label>Youth & Teen</label></span> <br>
				</div> <!-- end checkboxes -->
			</div> <!-- end groupsection -->
		</div> <!-- end groupcolumns -->
           </div> <!-- end interim-form -->';
           break;
           
           case "Faith Based Organization":
           echo '<div class="interim-form"> 
           <div class="interim-header"><h2>Select Faith Based Organization to Setup</h2></div>
           
           <span class="checkbox"><input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label></span>
           <br><br>

		<div class="groupcolumns">
	            	<div class="groupsection">
	            		<div class="checkboxes">
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Main Church Website"><label>Main Church Website</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Bible Camp"><label>Bible Camp</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Bible Study"><label>Bible Study</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Building Fund"><label>Building Fund</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Choir & Band"><label>Choir & Band</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Christmas Giving Tree"><label>Christmas Giving Tree</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Faith Formation"><label>Faith Formation</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Festivals"><label>Festivals</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Men’s Ministry"><label>Men’s Ministry</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Outreach Ministry"><label>Outreach Ministry</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Parish Fund"><label>Parish Fund</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><label>Projection, Audio, Video</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Student Ministry"><label>Student Ministry</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Sunday School"><label>Sunday School</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><label>Tablets, Laptops & PCs</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Women’s Ministry"><label>Women’s Ministry</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Youth’s Ministry"><label>Youth’s Ministry</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Other"><input type="text" class="group" name="clubs[]" value="" placeholder="Other" title="Please type in the club"> <br>
				</div> <!-- end checkboxes -->
			</div> <!-- end groupsection -->
	
			<div class="groupsection">
				<span id="">Missionary Funds</span><br>
				<div class="checkboxes">
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="All Missions"><label>All Missions</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="College Missions"><label>College Missions</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Overseas Missions"><label>Overseas Missions</label></span> <br>
					<span class="checkbox"><input type="checkbox" name="clubs[]" value="Youth & Teen"><label>Youth & Teen</label></span> <br>
				</div> <!-- end checkboxes -->
			</div> <!-- end groupsection -->
		</div> <!-- end groupcolumns -->
           </div> <!-- end interim-form -->';
           break;
           
           case "Baptist":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Baptist Organization to Setup</h2></div>

			<span class="checkbox"><input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label></span>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Main Church Website"><label>Main Church Website</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Bible Camp"><label>Bible Camp</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Bible Study"><label>Bible Study</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Building Fund"><label>Building Fund</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Choir & Band"><label>Choir & Band</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Christmas Giving Tree"><label>Christmas Giving Tree</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Faith Formation"><label>Faith Formation</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Festivals"><label>Festivals</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Men’s Ministry"><label>Men’s Ministry</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Outreach Ministry"><label>Outreach Ministry</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Parish Fund"><label>Parish Fund</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><label>Projection, Audio, Video</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Student Ministry"><label>Student Ministry</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Sunday School"><label>Sunday School</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><label>Tablets, Laptops & PCs</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Women’s Ministry"><label>Women’s Ministry</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Youth’s Ministry"><label>Youth’s Ministry</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Other"><input type="text" class="group" name="clubs[]" value="" placeholder="Other" title="Please type in the club"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection colbreak">
					<span>Missionary Funds</span><br>
					<div class="checkboxes">
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="All Missions"><label>All Missions</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="College Missions"><label>College Missions</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Overseas Missions"><label>Overseas Missions</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Youth & Teen"><label>Youth & Teen</label></span> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Catholic":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Catholic Organization to Setup</h2></div>

			<span class="checkbox"><input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label></span>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Main Church Website"><label>Main Church Website</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Bible Camp"><label>Bible Camp</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Bible Study"><label>Bible Study</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Building Fund"><label>Building Fund</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Choir & Band"><label>Choir & Band</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Christmas Giving Tree"><label>Christmas Giving Tree</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Faith Formation"><label>Faith Formation</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Festivals"><label>Festivals</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Men’s Ministry"><label>Men’s Ministry</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Outreach Ministry"><label>Outreach Ministry</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Parish Fund"><label>Parish Fund</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><label>Projection, Audio, Video</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Student Ministry"><label>Student Ministry</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Sunday School"><label>Sunday School</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><label>Tablets, Laptops & PCs</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Women’s Ministry"><label>Women’s Ministry</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Youth’s Ministry"><label>Youth’s Ministry</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Other"><input type="text" class="group" name="clubs[]" value="" placeholder="Other" title="Please type in the club"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection colbreak">
					<span>Missionary Funds</span><br>
					<div class="checkboxes">
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="All Missions"><label>All Missions</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="College Missions"><label>College Missions</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Overseas Missions"><label>Overseas Missions</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Youth & Teen"><label>Youth & Teen</label></span> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Episcopal":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Episcopal Organization to Setup</h2></div>

			<span class="checkbox"><input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label></span>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Main Church Website"><label>Main Church Website</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Bible Camp"><label>Bible Camp</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Bible Study"><label>Bible Study</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Building Fund"><label>Building Fund</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Choir & Band"><label>Choir & Band</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Christmas Giving Tree"><label>Christmas Giving Tree</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Faith Formation"><label>Faith Formation</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Festivals"><label>Festivals</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Men’s Ministry"><label>Men’s Ministry</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Outreach Ministry"><label>Outreach Ministry</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Parish Fund"><label>Parish Fund</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><label>Projection, Audio, Video</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Student Ministry"><label>Student Ministry</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Sunday School"><label>Sunday School</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><label>Tablets, Laptops & PCs</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Women’s Ministry"><label>Women’s Ministry</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Youth’s Ministry"><label>Youth’s Ministry</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Other"><input type="text" class="group" name="clubs[]" value="" placeholder="Other" title="Please type in the club"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection colbreak">
					<span>Missionary Funds</span><br>
					<div class="checkboxes">
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="All Missions"><label>All Missions</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="College Missions"><label>College Missions</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Overseas Missions"><label>Overseas Missions</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Youth & Teen"><label>Youth & Teen</label></span> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Lutheran":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Lutheran Organization to Setup</h2></div>

			<span class="checkbox"><input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label></span>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Main Church Website"><label>Main Church Website</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Bible Camp"><label>Bible Camp</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Bible Study"><label>Bible Study</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Building Fund"><label>Building Fund</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Choir & Band"><label>Choir & Band</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Christmas Giving Tree"><label>Christmas Giving Tree</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Faith Formation"><label>Faith Formation</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Festivals"><label>Festivals</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Men’s Ministry"><label>Men’s Ministry</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Outreach Ministry"><label>Outreach Ministry</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Parish Fund"><label>Parish Fund</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><label>Projection, Audio, Video</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Student Ministry"><label>Student Ministry</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Sunday School"><label>Sunday School</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><label>Tablets, Laptops & PCs</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Women’s Ministry"><label>Women’s Ministry</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Youth’s Ministry"><label>Youth’s Ministry</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Other"><input type="text" class="group" name="clubs[]" value="" placeholder="Other" title="Please type in the club"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection colbreak">
					<span>Missionary Funds</span><br>
					<div class="checkboxes">
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="All Missions"><label>All Missions</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="College Missions"><label>College Missions</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Overseas Missions"><label>Overseas Missions</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Youth & Teen"><label>Youth & Teen</label></span> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Methodist":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Methodist Organization to Setup</h2></div>

			<span class="checkbox"><input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label></span>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Main Church Website"><label>Main Church Website</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Bible Camp"><label>Bible Camp</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Bible Study"><label>Bible Study</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Building Fund"><label>Building Fund</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Choir & Band"><label>Choir & Band</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Christmas Giving Tree"><label>Christmas Giving Tree</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Faith Formation"><label>Faith Formation</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Festivals"><label>Festivals</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Men’s Ministry"><label>Men’s Ministry</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Outreach Ministry"><label>Outreach Ministry</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Parish Fund"><label>Parish Fund</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><label>Projection, Audio, Video</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Student Ministry"><label>Student Ministry</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Sunday School"><label>Sunday School</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><label>Tablets, Laptops & PCs</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Women’s Ministry"><label>Women’s Ministry</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Youth’s Ministry"><label>Youth’s Ministry</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Other"><input type="text" class="group" name="clubs[]" value="" placeholder="Other" title="Please type in the club"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection colbreak">
					<span>Missionary Funds</span><br>
					<div class="checkboxes">						
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="All Missions"><label>All Missions</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="College Missions"><label>College Missions</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Overseas Missions"><label>Overseas Missions</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Youth & Teen"><label>Youth & Teen</label></span> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Presbyterian":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Presbyterian Organization to Setup</h2></div>

			<span class="checkbox"><input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label></span>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Main Church Website"><label>Main Church Website</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Bible Camp"><label>Bible Camp</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Bible Study"><label>Bible Study</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Building Fund"><label>Building Fund</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Choir & Band"><label>Choir & Band</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Christmas Giving Tree"><label>Christmas Giving Tree</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Faith Formation"><label>Faith Formation</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Festivals"><label>Festivals</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Men’s Ministry"><label>Men’s Ministry</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Outreach Ministry"><label>Outreach Ministry</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Parish Fund"><label>Parish Fund</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><label>Projection, Audio, Video</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Student Ministry"><label>Student Ministry</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Sunday School"><label>Sunday School</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><label>Tablets, Laptops & PCs</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Women’s Ministry"><label>Women’s Ministry</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Youth’s Ministry"><label>Youth’s Ministry</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Other"><input type="text" class="group" name="clubs[]" value="" placeholder="Other" title="Please type in the club"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection colbreak">
					<span>Missionary Funds</span><br>
					<div class="checkboxes">
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="All Missions"><label>All Missions</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="College Missions"><label>College Missions</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Overseas Missions"><label>Overseas Missions</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Youth & Teen"><label>Youth & Teen</label></span> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Orthodox":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Orthodox Organization to Setup</h2></div>

			<span class="checkbox"><input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label></span>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Main Church Website"><label>Main Church Website</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Bible Camp"><label>Bible Camp</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Bible Study"><label>Bible Study</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Building Fund"><label>Building Fund</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Choir & Band"><label>Choir & Band</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Christmas Giving Tree"><label>Christmas Giving Tree</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Faith Formation"><label>Faith Formation</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Festivals"><label>Festivals</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Men’s Ministry"><label>Men’s Ministry</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Outreach Ministry"><label>Outreach Ministry</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Parish Fund"><label>Parish Fund</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><label>Projection, Audio, Video</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Student Ministry"><label>Student Ministry</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Sunday School"><label>Sunday School</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><label>Tablets, Laptops & PCs</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Women’s Ministry"><label>Women’s Ministry</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Youth’s Ministry"><label>Youth’s Ministry</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Other"><input type="text" class="group" name="clubs[]" value="" placeholder="Other" title="Please type in the club"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection colbreak">
					<span>Missionary Funds</span><br>
					<div class="checkboxes">
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="All Missions"><label>All Missions</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="College Missions"><label>College Missions</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Overseas Missions"><label>Overseas Missions</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Youth & Teen"><label>Youth & Teen</label></span> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Reformed":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Reformed Organization to Setup</h2></div>

			<span class="checkbox"><input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label></span>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Main Church Website"><label>Main Church Website</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Bible Camp"><label>Bible Camp</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Bible Study"><label>Bible Study</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Building Fund"><label>Building Fund</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Choir & Band"><label>Choir & Band</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Christmas Giving Tree"><label>Christmas Giving Tree</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Faith Formation"><label>Faith Formation</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Festivals"><label>Festivals</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Men’s Ministry"><label>Men’s Ministry</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Outreach Ministry"><label>Outreach Ministry</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Parish Fund"><label>Parish Fund</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><label>Projection, Audio, Video</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Student Ministry"><label>Student Ministry</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Sunday School"><label>Sunday School</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><label>Tablets, Laptops & PCs</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Women’s Ministry"><label>Women’s Ministry</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Youth’s Ministry"><label>Youth’s Ministry</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Other"><input type="text" class="group" name="clubs[]" value="" placeholder="Other" title="Please type in the club"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection colbreak">
					<span>Missionary Funds</span><br>
					<div class="checkboxes">
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="All Missions"><label>All Missions</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="College Missions"><label>College Missions</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Overseas Missions"><label>Overseas Missions</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Youth & Teen"><label>Youth & Teen</label></span> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Spirit-Filled":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Spirit-Filled Organization to Setup</h2></div>

			<span class="checkbox"><input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label></span>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Main Church Website"><label>Main Church Website</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Bible Camp"><label>Bible Camp</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Bible Study"><label>Bible Study</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Building Fund"><label>Building Fund</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Choir & Band"><label>Choir & Band</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Christmas Giving Tree"><label>Christmas Giving Tree</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Faith Formation"><label>Faith Formation</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Festivals"><label>Festivals</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Men’s Ministry"><label>Men’s Ministry</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Outreach Ministry"><label>Outreach Ministry</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Parish Fund"><label>Parish Fund</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><label>Projection, Audio, Video</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Student Ministry"><label>Student Ministry</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Sunday School"><label>Sunday School</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><label>Tablets, Laptops & PCs</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Women’s Ministry"><label>Women’s Ministry</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Youth’s Ministry"><label>Youth’s Ministry</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Other"><input type="text" class="group" name="clubs[]" value="" placeholder="Other" title="Please type in the club"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection colbreak">
					<span>Missionary Funds</span><br>
					<div class="checkboxes">
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="All Missions"><label>All Missions</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="College Missions"><label>College Missions</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Overseas Missions"><label>Overseas Missions</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Youth & Teen"><label>Youth & Teen</label></span> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Christian Other":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Christian Other Organization to Setup</h2></div>

			<span class="checkbox"><input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label></span>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Main Church Website"><label>Main Church Website</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Bible Camp"><label>Bible Camp</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Bible Study"><label>Bible Study</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Building Fund"><label>Building Fund</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Choir & Band"><label>Choir & Band</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Christmas Giving Tree"><label>Christmas Giving Tree</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Faith Formation"><label>Faith Formation</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Festivals"><label>Festivals</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Men’s Ministry"><label>Men’s Ministry</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Outreach Ministry"><label>Outreach Ministry</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Parish Fund"><label>Parish Fund</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><label>Projection, Audio, Video</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Student Ministry"><label>Student Ministry</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Sunday School"><label>Sunday School</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><label>Tablets, Laptops & PCs</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Women’s Ministry"><label>Women’s Ministry</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Youth’s Ministry"><label>Youth’s Ministry</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Other"><input type="text" class="group" name="clubs[]" value="" placeholder="Other" title="Please type in the club"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection colbreak">
					<span>Missionary Funds</span><br>
					<div class="checkboxes">
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="All Missions"><label>All Missions</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="College Missions"><label>College Missions</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Overseas Missions"><label>Overseas Missions</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Youth & Teen"><label>Youth & Teen</label></span> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Jewish Conservative":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Jewish Conservative Organization to Setup</h2></div>

			<span class="checkbox"><input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label></span>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Main Synagogue Website"><label>Main Synagogue Website</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Jewish Summer Camp"><label>Jewish Summer Camp</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Hebrew Bible Study"><label>Hebrew Bible Study</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Building Fund"><label>Building Fund</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Choir & Band"><label>Choir & Band</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Festivals"><label>Festivals</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Synagogue Fund"><label>Synagogue Fund</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><label>Projection, Audio, Video</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><label>Tablets, Laptops & PCs</label></span> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection colbreak">
					<span>Mission Trips</span><br>
					<div class="checkboxes">
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="All Missions"><label>All Missions</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="College Missions"><label>College Missions</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Israel Mission"><label>Israel Mission</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Overseas Missions"><label>Overseas Missions</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Youth & Teen"><label>Youth & Teen</label></span> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Jewish Orthodox":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Jewish Orthodox Organization to Setup</h2></div>

			<span class="checkbox"><input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label></span>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Main Synagogue Website"><label>Main Synagogue Website</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Jewish Summer Camp"><label>Jewish Summer Camp</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Hebrew Bible Study"><label>Hebrew Bible Study</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Building Fund"><label>Building Fund</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Choir & Band"><label>Choir & Band</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Festivals"><label>Festivals</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Synagogue Fund"><label>Synagogue Fund</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><label>Projection, Audio, Video</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><label>Tablets, Laptops & PCs</label></span> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection colbreak">
					<span>Mission Trips</span><br>
					<div class="checkboxes">
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="All Missions"><label>All Missions</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="College Missions"><label>College Missions</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Israel Mission"><label>Israel Mission</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Overseas Missions"><label>Overseas Missions</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Youth & Teen"><label>Youth & Teen</label></span> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Jewish Reformed":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Jewish Reformed Organization to Setup</h2></div>

			<span class="checkbox"><input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label></span>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Main Synagogue Website"><label>Main Synagogue Website</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Jewish Summer Camp"><label>Jewish Summer Camp</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Hebrew Bible Study"><label>Hebrew Bible Study</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Building Fund"><label>Building Fund</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Choir & Band"><label>Choir & Band</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Festivals"><label>Festivals</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Synagogue Fund"><label>Synagogue Fund</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Projection, Audio, Video"><label>Projection, Audio, Video</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Tablets, Laptops & PCs"><label>Tablets, Laptops & PCs</label></span> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->

				<div class="groupsection colbreak">
					<span>Mission Trips</span><br>
					<div class="checkboxes">
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="All Missions"><label>All Missions</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="College Missions"><label>College Missions</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Israel Mission"><label>Israel Mission</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Overseas Missions"><label>Overseas Missions</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Youth & Teen"><label>Youth & Teen</label></span> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		
		case "Buddhist":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Buddhist Organization to Setup</h2></div>

			<span class="checkbox"><input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label></span>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Main Website"><label>Main Website</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Other"><input type="text" class="group" name="clubs[]" value="" placeholder="Other" title="Please type in the club"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		
		case "Hindu":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Hindu Organization to Setup</h2></div>

			<span class="checkbox"><input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label></span>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Main Website"><label>Main Website</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Other"><input type="text" class="group" name="clubs[]" value="" placeholder="Other" title="Please type in the club"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		
		case "Muslim":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Muslim Organization to Setup</h2></div>

			<span class="checkbox"><input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label></span>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Main Website"><label>Main Website</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Other"><input type="text" class="group" name="clubs[]" value="" placeholder="Other" title="Please type in the club"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		
		case "Other Faiths":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Other Faiths Organization to Setup</h2></div>

			<span class="checkbox"><input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label></span>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Main Website"><label>Main Website</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Other"><input type="text" class="group" name="clubs[]" value="" placeholder="Other" title="Please type in the club"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
		
		case "Local & National Organization":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Local & National Organization to Setup</h2></div>

			<span class="checkbox"><input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label></span>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Jaycees"><label>Jaycees</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Junior League"><label>Junior League</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Kiwanis"><label>Kiwanis</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Knights of Columbus"><label>Knights of Columbus</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Lion&#39;s Club International (LCI)"><label>Lion&#39;s Club International (LCI)</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Masonic Service Association"><label>Masonic Service Association</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Optimist International"><label>Optimist International</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Rotary Club"><label>Rotary Club</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Shriners International"><label>Shriners International</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="The American Legion"><label>The American Legion</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Veterans of Foreign Wars (VFW)"><label>Veterans of Foreign Wars (VFW)</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Other"><input type="text" class="group" name="clubs[]" value="" placeholder="Other" title="Please type in the club"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Local & National Charity":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Local or National Charity to Setup</h2></div>

			<span class="checkbox"><input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label></span>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Alzheimer Foundation of America (AFA)"><label>Alzheimer Foundation of America (AFA)</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="American Cancer Society"><label>American Cancer Society</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="American Diabetes Association"><label>American Diabetes Association</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="American Heart Association"><label>American Heart Association</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="American Red Cross"><label>American Red Cross</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Boys & Girls Clubs of America"><label>Boys & Girls Clubs of America</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Cancer Research Institute"><label>Cancer Research Institute</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Cerebral Palsy"><label>Cerebral Palsy</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Goodwill Industries International"><label>Goodwill Industries International</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Habitat for Humanity"><label>Habitat for Humanity</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Leukemia & Lymphoma Society"><label>Leukemia & Lymphoma Society</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Lymphoma Association"><label>Lymphoma Association</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Make-A-Wish Foundaion of America"><label>Make-A-Wish Foundaion of America</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="March of Dimes"><label>March of Dimes</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Muscular Dystrophy Association (MDA)"><label>Muscular Dystrophy Association (MDA)</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Shriners International"><label>Shriners International</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Special Olympics"><label>Special Olympics</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="St. Jude Childrens&#39;s Research Hospital"><label>St. Jude Childrens&#39;s Research Hospital</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Susan G. Komen"><label>Susan G. Komen</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="The Salvation Army"><label>The Salvation Army</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="The Simon Wiesenthal Foundation"><label>The Simon Wiesenthal Foundation</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="United Way"><label>United Way</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Wounded Warrior Project"><label>Wounded Warrior Project</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Other"><input type="text" class="group" name="clubs[]" value="" placeholder="Other" title="Please type in the club"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Community Organization":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Community Organization to Setup</h2></div>

			<span class="checkbox"><input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label></span>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Animal Shelters"><label>Animal Shelters<label></label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="ASPCA"><label>ASPCA</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Community Food Bank"><label>Community Food Bank</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Fire Department"><label>Fire Department</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Local Food Shelves"><label>Local Food Shelves</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Local Homeless Shelters"><label>Local Homeless Shelters</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Local Women&#39;s Shelters"><label>Local Women&#39;s Shelters</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Police Department"><label>Police Department</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Other"><input type="text" class="group" name="clubs[]" value="" placeholder="Other" title="Please type in the club"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Youth & Sports":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Youth & Sports to Setup</h2></div>

			<span class="checkbox"><input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label></span>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Athletic Associations"><label>Athletic Associations</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Big Brothers/Big Sisters of America"><label>Big Brothers/Big Sisters of America</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Boy Scouts"><label>Boy Scouts</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Girl Scouts"><label>Girl Scouts</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Summer Leagues"><label>Summer Leagues</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="YMCA"><label>YMCA</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Other"><input type="text" class="group" name="clubs[]" value="" placeholder="Other" title="Please type in the club"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "Sports League":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select Sports League to Setup</h2></div>

			<span class="checkbox"><input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label></span>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Summer League"><label>Summer League</label></span> <br>
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="Other"><input type="text" class="group" name="clubs[]" value="" placeholder="Other" title="Please type in the club"> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;

		case "General":
		echo '<div class="interim-form"> 
			<div class="interim-header"><h2>Select General Organization to Setup</h2></div>

			<span class="checkbox"><input type="checkbox" name="all" onClick="toggle(this)"><label>Select All</label></span>
			<br><br>

			<div class="groupcolumns">
				<div class="groupsection">
					<div class="checkboxes">
						<span class="checkbox"><input type="checkbox" name="clubs[]" value="General"><label>General</label></span> <br>
					</div> <!-- end checkboxes -->
				</div> <!-- end groupsection -->
			</div> <!-- end groupcolumns -->
		</div> <!-- end interim-form -->';
		break;
	}
?>
              
         <br>
        <input type="hidden" name="fundtype" value="<?php echo $fundtype; ?>" />
        <input type="hidden" name="setup_person" value="<?php echo $loginuser; ?>" />
        <input type="hidden" name="type" value="fundraiser" />
        <input type="hidden" name="validation"  id="validation" value="0" />
        <input type="submit" name="submit" class="redbutton" value="Create New Fundraiser" onclick="CheckForm()">
      </form>
      <br>
        
        </div> <!-- end table -->
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