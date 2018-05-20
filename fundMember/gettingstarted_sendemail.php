<?php
session_start();

?>

<!DOCTYPE HTML>
<head>
	<title>Sign Up & Start Today!</title>
</head>

<body>
<div id="container">
  	<?php include 'header.php' ; ?>
	<?php include 'memberSidebar.php' ; ?>
  
  <div id="content">
	<div id="column1">
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
						<td><textarea id="comment" name="comment" cols="50" row="20" wrap="hard" placeholder="I love your program! How do I find a rep in my area? I am located in Sunnyvale, TX." style="height:75px"></textarea></td>
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
		</div> <!-- end graybackground -->
		
		<br>
		
		<h3>Interested in Becoming a GreatMoods Fundraising Representative?</h3>
		<p>If you would like to apply to become a GreatMoods Fundraising Representative or would like to find out more, please send us your resume and cover letter to: <a href="mailto:rephr@greatmoods.com%20subject:Rep%20Interest%20From%20Getting%20Started%20Page" target="_blank">rephr@greatmoods.com</a></p>
	</div> <!--end column1-->
    
    <div id="column2">
	    <div><br>
	    	<img src="../images/rep-pages/churchchoir.png" width="404" height="270" alt="Church Choir">
		<img class="imgLeft" src="../images/rep-pages/dodgeball.png" width="198" height="166" alt="Stuents Playing Dodgeball">
		<img class="imgRight" src="../images/rep-pages/soccergirls.png" width="198" height="166" alt="High School Girls Soccer">
	    </div>
	    <div id="pcaption">GreatMoods offers fundraising opportunities for schools, religious organizations, community organizations and more. </div>
    </div> <!--end column2--> 
    
  </div>  <!--end content-->
  <?php include 'footer.php' ; ?>
</div> <!--end container-->

</body>
</html>
<?php
ob_end_flush();
?>