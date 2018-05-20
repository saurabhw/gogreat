<?php
      session_start();
      ob_start();
      define("SITE_ROOT",$_SERVER["DOCUMENT_ROOT"].'/salesTest/');
      include("../includes/connection.inc.php");
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

	<?php include 'header.inc.php'; ?>
  	<?php include 'leftnavSampleGettingStarted.php'; ?>

 <div id="contentSample">
 	<div id="column1b">
		<h1>Getting Started</h1>
		<h3>Sign Up and Start Today!</h3>
	
		<p>Getting started is easy! Drop us an e-mail and let us know who you are: Your name, where you’re located, phone number, email address.</p>
      		<p>Achieving Success for your Goals is our Goal, 24/7/365 days a year! The GreatMoods team will do whatever we can to help support you in accomplishing your mission.</p>
	
		<div id="graybackground">
		
			<form action="contactEmail.php" method="post" enctype="multipart/form-data">
				<table id="contactus">
					<tr>
						<td><label class="right">Name</label></td>
						<td><input id="frname" type="text" name="name" value="" placeholder="Contact Name"></td>
					</tr>
					<tr>
						<td><label class="right">Email</label></td>
						<td><input id="loginemail" type="text" name="email" value="" placeholder="contact@email.com"></td>
					</tr>
					<tr>
						<td><label class="right">Comments<br>or Questions</label></td>
						<td><textarea id="comment" name="comment" cols="50" row="30" wrap="hard" placeholder="I love your program! How do I get started as a rep in my area? I am located in Sunnyvale, TX. You can contact me at 123-456-7890."></textarea></td>
					</tr>
					<tr>
						<td></td>
						<td>
							<input id="mailbutton" type="submit" name="submit" class="redbutton" value="Send Email" />
							<input id="mailbutton" type="reset" class="redbutton" value="Clear Text">
						</td>
					</tr>
					
				</table>
			</form>
		</div>
		
		<br>
		
		<h3>Interested in Becoming a GreatMoods Fundraising Representative?</h3>
		<p>If you would like to apply to become a GreatMoods Fundraising Representative or would like to find out more, please send us your resume and cover letter to: <a href="mailto:rephr@greatmoods.com%20subject:Rep%20Interest%20From%20Getting%20Started%20Page" target="_blank">rephr@greatmoods.com</a></p>
	</div> <!--end column1b -->
	
	<div id="column2b">
		<br>
		<img src="../images/rep-pages/churchchoir.png" width="404" height="270" alt="Church Choir">
		<img class="imgLeft" src="../images/rep-pages/dodgeball.png" width="198" height="166" alt="Stuents Playing Dodgeball">
		<img class="imgRight" src="../images/rep-pages/soccergirls.png" width="198" height="166" alt="High School Girls Soccer">
		<div id="pcaption">GreatMoods offers fundraising opportunities for schools, religious organizations, community organizations and more. </div>
	</div> <!--end column2b--> 
  </div>  <!--end content-->

  <?php include 'footer.php' ; ?>
</div> <!--end container-->
</body>
</html>
<?php
   ob_end_flush();
?>