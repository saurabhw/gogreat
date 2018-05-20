<?php
  
      session_start();
      ob_start();
      define("SITE_ROOT",$_SERVER["DOCUMENT_ROOT"].'/salesTest/');
      require_once("../includes/connection.inc.php");
       include('../samplewebsites/imageFunctions.inc.php');
       include("../includes/functions.php");
       $link = connectTo();
       $user = $_SESSION['userId'];
       $userName = $_SESSION['email'];
       if(isset($_SESSION['authenticated']))
       {
            $groupID = $_SESSION['groupid'];
       }
       else
       {
            $groupID = $_GET['group'];
       }
       
       //$groupID = $_SESSION['groupid'];
       $query1 = "SELECT * FROM Dealers WHERE loginid='$groupID'";
       $result1 = mysqli_query($link, $query1)or die("MySQL ERROR query 1: ".mysqli_error($link));
       $row1 = mysqli_fetch_assoc($result1);
       $dealerID = $row1['loginid'];
       $group = $row1['setuppersonid']; 
       $club_type = $row1['DealerDir']; 
       $myPic = $row1['contact_pic'];
       $twit = $row1['twitter']; 
       $face = $row1['facebook']; 
       $goal = $row1['goal2'];
       $myBanner = $row1['banner_path'];
       $so_far = getSoloSales($groupID);
      
       $banner = $row1['banner_path'];
     
     
      $query3 = "SELECT * FROM orgMembers WHERE fundraiserID ='$groupID'";
      $result3 = mysqli_query($link, $query3) or die(mysqli_error());
      $row3 = mysqli_fetch_assoc($result3);
      $fn = $row3['orgFName'];
      $ln = $row3['orgLName'];
?>

<!DOCTYPE html>
<head>
<title>GreatMoods | Getting Started</title>
</head>

<body>
<div id="container">
<?php include 'header.php'; ?>
	<?php 
	 if(isset($_SESSION['authenticated']))
	 { 
	    include 'memberSidebar.php'; 
	 }
	 else
	 {
	     include 'memberSidebar2.php';
	 }
	
	?>

 <div id="contentSample">
 	<div id="column1b">
		<h1>Getting Started</h1>
		<h3>Sign Up and Start Today!</h3>
	
		<p>Getting started is easy! Drop us an e-mail and let us know who you are: Your Organization name, where you’re located, contact name, number, email address and what you or your Organization would like to do.</p>
		<p>Achieving Success for your Goals is our Goal, 24/7/365 days a year! The GreatMoods team will do whatever we can to help support you and your organization in accomplishing your mission.</p>
	
		<div id="graybackground">
		
			<form action="contactEmail.php" method="post" enctype="multipart/form-data">
				<table id="contactus">
					<tr>
						<td><label class="right">Name</label></td>
						<td><input id="frname" type="text" name="name" value="" placeholder="Organization or Contact Name"></td>
					</tr>
					<tr>
						<td><label class="right">Email</label></td>
						<td><input id="loginemail" type="text" name="email" value="" placeholder="primarycontact@email.com"></td>
					</tr>
					<tr>
						<td><label class="right">Comments<br>or Questions</label></td>
						<td><textarea id="comment" name="comment" cols="50" row="20" wrap="hard" placeholder="I love your program! How do I find a rep in my area? I am located in Sunnyvale, TX." style="height:75px;"></textarea></td>
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