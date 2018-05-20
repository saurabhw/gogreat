<?php
      session_start();
      ob_start();
      define("SITE_ROOT",$_SERVER["DOCUMENT_ROOT"].'/salesTest/');
      include("includes/connection.inc.php");
      $link = connectTo();
      $groupID = $_GET['group'];
      $table = "sample_websites";
      $query = "SELECT * FROM $table WHERE samplewebID = $groupID";
      $result = mysqli_query($link, $query) or die(mysqli_error());
      $row_count = mysqli_num_rows($result);
      if($row_count == '0'){
        echo "<br />Sample Website Not Found.<br />";
      }else{
         $row = mysqli_fetch_assoc($result);
         $club_name = $row['sampleName'];
         $club = $row['club'];
         $goal = $row['goal'];
         $so_far = $goal*.2;
         $banner_path = $row['bannerPath'];
         $position = $row['samplePosition'];
         $leader = $row['sampleFname'].' '.$row['sampleLname'];
         $phone = $row['samplePhone'];
         $group_email = $row['sampleGroupEmail'];
         $contact_photo = $row['contact_group_photo'];
         $group_photo = $row['groupPhoto'];
         $leader_photo = $row['group_leader'];
         $student_photo = $row['student_leaders'];
         $reasons = $row['sampleReasons'];
         $student_leader_name = $row['student_leader'];
         $student_name = $row['student_name'];
         if($row['sampleTitle']==''){
           $title = $club;
         }else{
           $title = $row['sampleTitle'];
         }   
      }
?>

<!DOCTYPE html>
<head>
<title>Getting Started | Calculate Your Success</title>
</head>

<body>
<div id="container">
<?php include 'includes/header_sample.php'; ?>
<?php include 'navigation/leftnavSampleGettingStarted.php'; ?>

 <div id="contentSample">
	<h1>Calculate Your $uccess</h1>
	<h3>Find Out How Much You Can Raise by Using Our Fundraising Calculator</h3>
	
	<div id="column1b">
		<h5>The calculator is simple to use:</h5>
		<ul class="bulletedlist">
			<li>Enter the number of Students or Members in your School or Organization</li>
			<li>Enter the percentage of Students or Members you believe will participate, ie: 33 (same as 33% or .33)</li>
			<li>Enter the average number of Products and Gifts each of your Students or Members will sell for each fundraiser</li>
			<li>Multiplied by $35 (The average Retail Price of each Product Purchased)</li>
			<li>Enter the number of fundraisers per year<br>(Most people do 3 or 4 fundraisers a year with our program. Generally it begins in midsummer for the Winter holidays (Thanksgiving & Christmas) and continues after the first of the year for Valentine's Day, Easter, Mother's Day, Graduation and Father's Day)</li>
			<li>Each Club, Team or Organization then receives 35% of each Product of Gift sold</li>
		</ul>
	</div> <!--end column1b-->
	
	<div id="column2b">
		<img src="../images/rep-pages/calculatorimage.png" width="404" height="270" alt="Women Writing Calculations">
	</div> <!--end column2b-->
	
	<div id="tableWrapper">
		<h3 class="tableHeader">Try Our Calculator!</h3>
		<table class="calculatorTable" width="100%" border="0" cellspacing="0" cellpadding="3" summary="Calculator for a school fundraiser showing math and total earnings">
			<tr>
				<th class="calcCategoryHead">Your Fundraiser</th>
				<th>Number of<br>Students/Members</th>
				<th scope="col">&nbsp;</th>
				<th>Percentage of<br>Students/Members<br>Participating</th>
				<th scope="col">&nbsp;</th>
				<th>Products & Gifts<br>Sold Per<br>Student/Member</th>
				<th scope="col">&nbsp;</th>
				<th>$35 Avg.<br>Retail Price</th>
				<th scope="col">&nbsp;</th>
				<th>Fundraisers<br>Per Year</th>
				<th scope="col">&nbsp;</th>
				<th>Percent to<br>Your Fundraiser</th>
				<th scope="col">&nbsp;</th>
				<th>Total<br>Amount Raised</th>
			</tr>
	
			<tr>
				<td class="fl">Your Fundraiser<br/>
				</td>
				<!--<td><input type="text" id='Enum' name"" size="4" onchange='calculateSchool("E")'/></td>
				<td>x</td>
				<td><input type="text" id='Efund' name"" size="4" onchange='calculateSchool("E")'/></td>
				<td>x</td>-->
				<td><input type="text" id='Epeople' name"" size="4" onchange='calculateSchool("E")'/></td>
				<td>x</td>
				<td><input type="text" id='Epercent' name"" size="4" onchange='calculateSchool("E")'/></td>
				<td>x</td>
				<td><input type="text" id='Ebaskets' name"" size="4" onchange='calculateSchool("E")'/></td>
				<td>x</td>
				<td id='Eprice'>$35.00</td>
				<td>x</td>
				<td><input type="text" id='EnumPerYear' name"" size="3" onchange='calculateSchool("E")'/></td>
				<td>x</td>
				<td id='commission2'>35%</td>
				<td>=</td>
				<td id='Etotal'></td>
			</tr>
			
			<tr class="extrapadding">
				<td colspan="12" class="fl"></td>
				<td colspan="1" class ="fl"><button type="button" class="medredbutton" onclick="calculateSchool('LH')">Calculate</button></td>
				<td id='schoolTotal'></td>
			</tr>
		</table>
	</div>    <!--end tableWrapper-->
  </div>  <!--end content-->

  <?php include 'footer.php' ; ?>
</div> <!--end container-->
</body>
</html>
<?php
   ob_end_flush();
?>