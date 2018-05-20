<?php
	include '../includes/autoload.php';
	
	if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "RP")
       {
            header('Location: ../index.php');
            exit;
       }
	
	$groupid = $_GET["group"];
        $userID = $_SESSION['userId'];
	$table = "Dealers";        	
?>

<!DOCTYPE html>
<head>
	<title>GreatMoods Representative Split Commission</title>
</head>

<body>
<div id="container">
      	<?php include 'header.inc.php' ; ?>
	<?php include 'sideLeftNav.php' ; ?>
      
	<div id="content">
		<h1>Split Commission</h1>
		<h3></h3>
		
		<div id="table">
			<form action="">
				<div id="graybackground2">
					<h5>Select Fundraising Account/Group You Are Sharing:</h5>
					<div class="row"> <!-- titles -->
						<select id="category" name="">
							<option value="">Select Category</option>
							<option value="">All Categories</option>
							<option value="">Sales People</option>
							<option value="">Educational Organizations</option>
							<option value="">Religious Organizations</option>
							<option value="">Community Organizations</option>
							<option value="">Youth & Sports Organizations</option>
							<option value="">Local & National Charities</option>
							<option value="">National Organizations</option>
							<option value="">Other</option>
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
					<div class="row">
						<span id="hd_frname">High School Name</span>
						<span id="hd_group">Group</span>
						<span id="hd_city">City</span>
						<span id="hd_state">State</span>
						<span id="hd_zip">Zip</span>
					</div> <!-- end row -->
					<div class="row">
						<input id="frname" type="text" name="" value="Lincoln High School" readonly>
						<input id="group" type="text" name="" value="Football" readonly>
						<input id="city" type="text" name="" value="Smallville" readonly>
						<input id="state" type="text" name="" value="FL" readonly>
						<input id="zip" type="text" name="" value="12345" readonly>
					</div> <!-- end row -->
				</div> <!-- end graybackground2 -->
			
				<br>

				<div id="graybackground">
					<h5>Split Commission With:</h5>
					<div class="row">
						<select name="">
							<option>RP Accounts</option>
							<option>RP Name</option>
							<option>RP Name</option>
							<option>RP Name</option>
						</select>
						<input type="button" class="redbutton" value="Add Another Account" title="More than one account can share this commission.">
					</div> <!-- end row -->
					
					<br>
					<h3>Selected Account(s) Details:</h3>
					<div class="row"> <!-- titles -->
						<span id="hd_fname">First</span>
						<span id="hd_lname">Last</span>
					</div> <!-- end row -->
					<div class="row"> <!-- inputs -->
						<input id="fname" type="text" name="" value="Melanie" readonly>
						<input id="lname" type="text" name="" value="Johansen" readonly>
						<input class="commission" type="number" min="0.01" max="6.00" step="0.01" value="3.00">%
					</div> <!-- end row -->
					
					<br>
					<p><i>This portion needs to be defined more - who would/can a RP actually split their commission with? Another RP account? A different account level?</i></p>
				</div> <!-- end graybackground -->
					
				<br>
				
				<div id="graybackground">	
					<div class="row"> <!-- titles -->
						<span class="hd_mycomm"><h2>My Commission = </h2></span>
						<input class="commission" type="number" min="0.01" max="6.00" step="0.01" value="3.00">%
					</div> <!-- end row -->
				</div> <!-- end graybackground -->
				
				<br>
					
				<div id="redbackground">	
					<div class="row"> <!-- inputs -->
						<span class="hd_totalcomm"><h2>Total Commission = </h2></span>
						<input id="totalcomm" type="text" value="6.00" readonly>%
					</div> <!-- end row -->
				</div> <!-- end graybackground -->								
			</form>
		</div> <!-- end table -->

	</div> <!--end content-->
    
<?php include '../includes/footer.php' ; ?>
</div> <!--end container-->

</body>

<pre>
<?php if ($_POST && $mailSent){
	echo htmlentities($message, ENT_COMPAT, 'UTF-8')."\n";
	echo 'Headers: '.htmlentities($headers, ENT_COMPAT, 'UTF-8');
} ?>
</pre>
<?php
   ob_end_flush();
?>