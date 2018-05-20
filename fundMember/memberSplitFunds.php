<?php
      session_start();

      if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "Member")
       {
            header('Location: ../index.php');
            exit;
       }
       
       include '../includes/connection.inc.php';
       include('../samplewebsites/imageFunctions.inc.php');
       $link = connectTo();
?>

<!DOCTYPE html>
<head>
	<title>GreatMoods | Member</title>
</head>

<body>
<div id="container">
      <?php include 'header.php' ; ?>
      <?php include 'memberSidebar.php' ; ?>

      <div id="content">
          	<h1>Split Funds</h1>
          	<h3></h3>
		
		<div id="table">
			<form action="">
				<div id="graybackground2">
					<h5>Select Fundraising Account/Group You Are Sharing:</h5>
					<div id="row"> <!-- titles -->
						<select id="category" name="">
							<option value="">Select Category</option>
							<option value="">Educational Organizations</option>
							<option value="">Faith Based Organizations</option>
							<option value="">Community Organizations</option>
							<option value="">Youth & Sports Organizations</option>
							<option value="">Local & National Charities</option>
							<option value="">National Organizations</option>
						</select>
						<select id="type" name="">
							<option>Select Account</option>
							<option>--depends on category--</option>
							<option>ex: Lincoln High School</option>
						</select>
						<select id="group" name="">
							<option>Select Group</option>
							<option>--depends on account--</option>
							<option>ex: Football</option>
						</select>
					</div> <!-- end row -->
					
					<br>
					
					<h3>Selected Account Details:</h3>
					<div id="row">
						<span id="hd_frname">High School Name</span>
						<span id="hd_group">Group</span>
						<span id="hd_city">City</span>
						<span id="hd_state">State</span>
						<span id="hd_zip">Zip</span>
					</div> <!-- end row -->
					<div id="row">
						<input id="frname" type="text" name="" value="Lincoln High School" readonly>
						<input id="group" type="text" name="" value="Football" readonly>
						<input id="city" type="text" name="" value="Smallville" readonly>
						<input id="state" type="text" name="" value="FL" readonly>
						<input id="zip" type="text" name="" value="12345" readonly>
					</div> <!-- end row -->
					<div id="row">
						
					</div> <!-- end row -->
					<div id="row">
						
					</div> <!-- end row -->
				</div> <!-- end graybackground2 -->
			
				<br>

				<div id="graybackground">
					<h5>Split Funds With:</h5>
					<div id="row">
						<select name="">
							<option>FM Accounts</option>
							<option>FM Name</option>
							<option>FM Name</option>
							<option>FM Name</option>
						</select>
						<input type="button" class="redbutton" value="Add Another Account" title="More than one account can share this commission.">
					</div> <!-- end row -->
					
					<br>
					
					<h3>Selected Account(s) Details:</h3>
					<div id="row"> <!-- titles -->
						<span id="hd_fname">First</span>
						<span id="hd_lname">Last</span>
					</div> <!-- end row -->
					<div id="row"> <!-- inputs -->
						<input id="fname" type="text" name="" value="Melanie" readonly>
						<input id="lname" type="text" name="" value="Johansen" readonly>
						<input class="commission" type="number" min="0.01" max="35.00" step="0.01" value="15.00">%
					</div> <!-- end row -->
					
					<br>
					<p><i>This portion needs to be defined more - who would/can a FM actually split their commission with? Another FM account? A different account level?</i></p>
				</div> <!-- end graybackground -->
					
				<br>
				
				<div id="graybackground">	
					<div id="row"> <!-- titles -->
						<span class="hd_myfund"><h2>My Funds = </h2></span>
						<input class="commission" type="number" min="0.01" max="35.00" step="0.01" value="20.00">%
					</div> <!-- end row -->
				</div> <!-- end graybackground -->
				
				<br>
					
				<div id="redbackground">	
					<div id="row"> <!-- inputs -->
						<span class="hd_totalfund"><h2>Total Funds = </h2></span>
						<input id="totalcomm" type="text" value="35.00" readonly>%
					</div> <!-- end row -->
				</div> <!-- end graybackground -->
				<br>								
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