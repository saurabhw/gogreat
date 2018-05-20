<?php
     include '../includes/autoload.php';
     if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "SC")
       {
            header('Location: ../index.php');
            exit;
       }
     $userID = $_SESSION['userId'];
     
     $query = "SELECT * FROM user_info 	WHERE userInfoID='$userID'";
     $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error($link));
     $row = mysqli_fetch_assoc($result);
     $myPic = $row['picPath'];

?>
<!DOCTYPE html>
<head>
	<title>GreatMoods | Sales Coordinator</title>
</head>

<body>
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <?php include 'sidenav.php' ; ?>

      	<div id="content">
          	<h1>Program Overview</h1><br>
		<h3>Calculate Your Success</h3> 
		
		<p>Calculating the potential income you can earn is one of the most exciting parts of being a GreatMoods Sales Coordinator!</p>

		<button16 class="redbutton" title="Click to view. Click again to close.">Instructions</button16>
			
		<show16 class="hide">
			<br><br>
			<h5>Using our income calculator is easy and simple to use, follow these easy steps:</h5>
			<ol>
				<li><i>Number of My Reps:</i> </li>
				<li><i>Number of Accts per Rep:</i> Simply enter in the number of how many schools, churches, or organizations you plan to meet with to set up fundraisers.</li>
				<li><i>Number of Groups per Acct:</i> Complete the next box by estimating how many clubs, teams, or groups within the school/church/organization you plan to set up.</li>
				<li><i>Number of Members per Group:</i> Next enter in the average number of students in each club/team/group.</li>
				<li><i>Participating Percent of Members:</i> In the next box, fill in the realistic number of participating students you believe will partake in the fundraiser. (Please enter this as a whole number, do not use a decimal.)</li>
				<li><i>Items Sold Per Participant:</i> Then fill in the number of GreatMoods Mall products you believe each participant will sell. (2-5 is a conservative number to start).</li>
				<li><i>Fundraisers Per Year:</i> Fill in the amount of fundraisers you believe they will plan to participate in each year with GreatMoods.</li>
			</ol>
		</show16>
			
		<br><br>

		<h5>Sales Presumptions:</h5> <p>(Click to View Below Summary Calculator. Click Again to Close.)</p>		
		<ul class="buttonrow">
			<li><b>Education:</b></li>
			<li><button9 class="redbutton" title="Click to View. Click Again to Close.">4yr College/Univ.</button9></li>
			<li><button11 class="redbutton" title="Click to View. Click Again to Close.">Greeks</button11></li>
			<li><button10 class="redbutton" title="Click to View. Click Again to Close.">2yr College/Univ.</button10></li>
			<li><button1 class="redbutton" title="Click to View. Click Again to Close.">Lg High School</button1></li>
			<li><button2 class="redbutton" title="Click to View. Click Again to Close.">Avg High School</button2></li>
			<li><button3 class="redbutton" title="Click to View. Click Again to Close.">Lg Middle School</button3></li>
			<li><button4 class="redbutton" title="Click to View. Click Again to Close.">Avg Middle School</button4></li>
			<li><button5 class="redbutton" title="Click to View. Click Again to Close.">Elementary School</button5></li>
		</ul> <!-- end row -->

		<ul class="buttonrow">
			<li><b>Organizations:</b></li>
			<li><button6 class="redbutton" title="Click to View. Click Again to Close.">Lg Church</button6></li>
			<li><button7 class="redbutton" title="Click to View. Click Again to Close.">Avg Church</button7></li>
			<li><button8 class="redbutton" title="Click to View. Click Again to Close.">National Organization</button8></li>
			<li><button12 class="redbutton" title="Click to View. Click Again to Close.">Community Organization</button12></li>
			<li><button13 class="redbutton" title="Click to View. Click Again to Close.">Local & National Charities</button13></li>
			<li><button14 class="redbutton" title="Click to View. Click Again to Close.">Youth & Sports</button14></li>
			<li><button15 class="redbutton" title="Click to View. Click Again to Close.">Independent Causes</button15></li>
		</ul> <!-- end row -->
			
		<br>
		
		<h2>Summary Calculator</h2>	
	       	<table class="calculate_success_sc">
			<tr>
				<th class="category">Category</th>
				<th class="num">Number of My Reps</th>
		          	<th class="num">Number of Accts per Rep</th>
		          	<th class="num">Number of Groups per Acct</th>
		          	<th class="num">Number of Members per Group</th>
		          	<th class="percent">Participating Percent of Members</th>
		          	<th class="items">Items Sold Per Participant</th>
		          	<th class="price">Avg Wholesale Price</th>
		          	<th class="numfr">Fundraisers Per Year</th>
		          	<th class="commission">Percent Commission</th>
		          	<th class="subtotal">Sub-Total</th>
		        </tr>
	        	<tr>
	          		<td class="category">4yr Colleges/ Universities</td>
	          		<td class="num"><input type="number" id="" onchange=""></td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="percent"><input type="number" id="" onchange="">%</td>
			        <td class="items"><input type="number" id="" onchange=""></td>
			        <td class="price">$23.07</td>
			        <td class="numfr"><input type="number" id="" onchange=""></td>
			        <td class="commission">1%</td>
			        <td class="subtotal"><input type="number" id="" onchange=""></td>
			</tr>
			<tr>
	          		<td class="category">Greeks</td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="percent"><input type="number" id="" onchange="">%</td>
			        <td class="items"><input type="number" id="" onchange=""></td>
			        <td class="price">$23.07</td>
			        <td class="numfr"><input type="number" id="" onchange=""></td>
			        <td class="commission">1%</td>
			        <td class="subtotal"><input type="number" id="" onchange=""></td>	          
			</tr>
			<tr>
	          		<td class="category">2yr Colleges/ Universities</td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="percent"><input type="number" id="" onchange="">%</td>
			        <td class="items"><input type="number" id="" onchange=""></td>
			        <td class="price">$23.07</td>
			        <td class="numfr"><input type="number" id="" onchange=""></td>
			        <td class="commission">1%</td>
			        <td class="subtotal"><input type="number" id="" onchange=""></td>			          
			</tr>
			<tr>
	          		<td class="category">Large High Schools</td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="percent"><input type="number" id="" onchange="">%</td>
			        <td class="items"><input type="number" id="" onchange=""></td>
			        <td class="price">$23.07</td>
			        <td class="numfr"><input type="number" id="" onchange=""></td>
			        <td class="commission">1%</td>
			        <td class="subtotal"><input type="number" id="" onchange=""></td>			          
			</tr>
			<tr>
	          		<td class="category">Average High Schools</td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="percent"><input type="number" id="" onchange="">%</td>
			        <td class="items"><input type="number" id="" onchange=""></td>
			        <td class="price">$23.07</td>
			        <td class="numfr"><input type="number" id="" onchange=""></td>
			        <td class="commission">1%</td>
			        <td class="subtotal"><input type="number" id="" onchange=""></td>			          
			</tr>
			<tr>
	          		<td class="category">Large Middle Schools</td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="percent"><input type="number" id="" onchange="">%</td>
			        <td class="items"><input type="number" id="" onchange=""></td>
			        <td class="price">$23.07</td>
			        <td class="numfr"><input type="number" id="" onchange=""></td>
			        <td class="commission">1%</td>
			        <td class="subtotal"><input type="number" id="" onchange=""></td>			          
			</tr>
			<tr>
	          		<td class="category">Average Middle Schools</td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="percent"><input type="number" id="" onchange="">%</td>
			        <td class="items"><input type="number" id="" onchange=""></td>
			        <td class="price">$23.07</td>
			        <td class="numfr"><input type="number" id="" onchange=""></td>
			        <td class="commission">1%</td>
			        <td class="subtotal"><input type="number" id="" onchange=""></td>			          
			</tr>
			<tr>
	          		<td class="category">Elementary Schools</td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="percent"><input type="number" id="" onchange="">%</td>
			        <td class="items"><input type="number" id="" onchange=""></td>
			        <td class="price">$23.07</td>
			        <td class="numfr"><input type="number" id="" onchange=""></td>
			        <td class="commission">1%</td>
			        <td class="subtotal"><input type="number" id="" onchange=""></td>		          
			</tr>
			<tr>
	          		<td class="category">Large Churches</td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="percent"><input type="number" id="" onchange="">%</td>
			        <td class="items"><input type="number" id="" onchange=""></td>
			        <td class="price">$23.07</td>
			        <td class="numfr"><input type="number" id="" onchange=""></td>
			        <td class="commission">1%</td>
			        <td class="subtotal"><input type="number" id="" onchange=""></td>		          
			</tr>
			<tr>
	          		<td class="category">Average Churches</td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="percent"><input type="number" id="" onchange="">%</td>
			        <td class="items"><input type="number" id="" onchange=""></td>
			        <td class="price">$23.07</td>
			        <td class="numfr"><input type="number" id="" onchange=""></td>
			        <td class="commission">1%</td>
			        <td class="subtotal"><input type="number" id="" onchange=""></td>			          
			</tr>
			<tr>
	          		<td class="category">National Organizations</td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="percent"><input type="number" id="" onchange="">%</td>
			        <td class="items"><input type="number" id="" onchange=""></td>
			        <td class="price">$23.07</td>
			        <td class="numfr"><input type="number" id="" onchange=""></td>
			        <td class="commission">1%</td>
			        <td class="subtotal"><input type="number" id="" onchange=""></td>			          
			</tr>
			<tr>
	          		<td class="category">Community Organizations</td>
			       	<td class="num"><input type="number" id="" onchange=""></td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="percent"><input type="number" id="" onchange="">%</td>
			        <td class="items"><input type="number" id="" onchange=""></td>
			        <td class="price">$23.07</td>
			        <td class="numfr"><input type="number" id="" onchange=""></td>
			        <td class="commission">1%</td>
			        <td class="subtotal"><input type="number" id="" onchange=""></td>		          
			</tr>
			<tr>
	          		<td class="category">Local & National Charities</td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="percent"><input type="number" id="" onchange="">%</td>
			        <td class="items"><input type="number" id="" onchange=""></td>
			        <td class="price">$23.07</td>
			        <td class="numfr"><input type="number" id="" onchange=""></td>
			        <td class="commission">1%</td>
			        <td class="subtotal"><input type="number" id="" onchange=""></td>		          
			</tr>
			<tr>
	          		<td class="category">Youth & Sports</td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="percent"><input type="number" id="" onchange="">%</td>
			        <td class="items"><input type="number" id="" onchange=""></td>
			        <td class="price">$23.07</td>
			        <td class="numfr"><input type="number" id="" onchange=""></td>
			        <td class="commission">1%</td>
			        <td class="subtotal"><input type="number" id="" onchange=""></td>		          
			</tr>
			<tr>
	          		<td class="category">Independent Causes</td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="num"><input type="number" id="" onchange=""></td>
			        <td class="percent"><input type="number" id="" onchange="">%</td>
			        <td class="items"><input type="number" id="" onchange=""></td>
			        <td class="price">$23.07</td>
			        <td class="numfr"><input type="number" id="" onchange=""></td>
			        <td class="commission">1%</td>
			        <td class="subtotal"><input type="number" id="" onchange=""></td>			          
			</tr>
	        	<tr class="totalrow">
	         		<td colspan="7"></td>
	          		<td class="title" colspan="3">
	          			<button class="medredbutton" type="button" onclick="" title="Click to Calculate Your Total Commission">Calculate</button>
	          			Total Commission Override:</td>
	          		<td colspan="1" id=""><input type="text" id="" readonly></td>
	        	</tr>
		</table>
			
		<show1 class="hide">
			<h3>Large High School:</h3>
			<table class="calculate_success_sc">
				<tr>
					<th class="showhide">Show/Hide Data</th>
					<th class="groups">Clubs, Organizations & Athletics</th>
			          	<th class="">Number of Students</th>
			          	<th class="">Participating Percent of Students</th>
			          	<th class="">Items Sold Per Participant</th>
			          	<th class="">Avg. Wholesale Price</th>
			          	<th class="">Fundraisers Per Year</th>
			          	<th class="">Percent Commission</th>
			        </tr>
			        <?php include('../includes/calculate/hs-lg_clubs.php'); ?>
				<?php include('../includes/calculate/hs-lg_athletics.php'); ?>
		        	<tr class="totalrow">
		         		<td colspan="7"></td>
	          			<td class="title" colspan="3">
	          				<button class="medredbutton" type="button" onclick="" title="Click to Calculate Your Total Commission">Calculate</button>
	          				Total Commission Override:</td>
		          		<td colspan="1" id=""><input type="text" id="" readonly/></td>
		        	</tr>
			</table>
		</show1>
		
		<show2 class="hide">
			
			<h3>Average High School:</h3>
			<table class="calculate_success_sc">
				<tr>
					<th class="showhide">Show/Hide Data</th>
					<th class="groups">Clubs, Organizations & Athletics</th>
			          	<th class="">Number of Students</th>
			          	<th class="">Participating Percent of Students</th>
			          	<th class="">Items Sold Per Participant</th>
			          	<th class="">Avg. Wholesale Price</th>
			          	<th class="">Fundraisers Per Year</th>
			          	<th class="">Percent Commission</th>
			        </tr>
			        <?php include('../includes/calculate/hs-avg_clubs.php'); ?>
				<?php include('../includes/calculate/hs-avg_athletics.php'); ?>
		        	<tr class="totalrow">
		         		<td colspan="7"></td>
	          			<td class="title" colspan="3">
	          				<button class="medredbutton" type="button" onclick="" title="Click to Calculate Your Total Commission">Calculate</button>
	          				Total Commission Override:</td>
		          		<td colspan="1" id=""><input type="text" id="" readonly/></td>
		        	</tr>
			</table>
		</show2>
		
		<show3 class="hide">
			
			<h3>Large Middle School:</h3>
			<table class="calculate_success_sc">
				<tr>
					<th class="showhide">Show/Hide Data</th>
					<th class="groups">Clubs, Organizations & Athletics</th>
			          	<th class="">Number of Students</th>
			          	<th class="">Participating Percent of Students</th>
			          	<th class="">Items Sold Per Participant</th>
			          	<th class="">Avg. Wholesale Price</th>
			          	<th class="">Fundraisers Per Year</th>
			          	<th class="">Percent Commission</th>
			        </tr>
			        <?php include('../includes/calculate/ms-lg_clubs.php'); ?>
				<?php include('../includes/calculate/ms-lg_athletics.php'); ?>
		        	<tr class="totalrow">
		         		<td colspan="7"></td>
	          			<td class="title" colspan="3">
	          				<button class="medredbutton" type="button" onclick="" title="Click to Calculate Your Total Commission">Calculate</button>
	          				Total Commission Override:</td>
		          		<td colspan="1" id=""><input type="text" id="" readonly/></td>
		        	</tr>
			</table>
		</show3>
		
		<show4 class="hide">
			
			<h3>Average Middle School:</h3>
			<table class="calculate_success_sc">
				<tr>
					<th class="showhide">Show/Hide Data</th>
					<th class="groups">Clubs, Organizations & Athletics</th>
			          	<th class="">Number of Students</th>
			          	<th class="">Participating Percent of Students</th>
			          	<th class="">Items Sold Per Participant</th>
			          	<th class="">Avg. Wholesale Price</th>
			          	<th class="">Fundraisers Per Year</th>
			          	<th class="">Percent Commission</th>
			        </tr>
			        <?php include('../includes/calculate/ms-avg_clubs.php'); ?>
				<?php include('../includes/calculate/ms-avg_athletics.php'); ?>
		        	<tr class="totalrow">
		         		<td colspan="7"></td>
	          			<td class="title" colspan="3">
	          				<button class="medredbutton" type="button" onclick="" title="Click to Calculate Your Total Commission">Calculate</button>
	          				Total Commission Override:</td>
		          		<td colspan="1" id=""><input type="text" id="" readonly/></td>
		        	</tr>
			</table>
		</show4>
		
		<show5 class="hide">
			
			<h3>Elementary School:</h3>
			<table class="calculate_success_sc">
				<tr>
					<th class="showhide">Show/Hide Data</th>
					<th class="groups">Clubs, Organizations & Athletics</th>
			          	<th class="">Number of Students</th>
			          	<th class="">Participating Percent of Students</th>
			          	<th class="">Items Sold Per Participant</th>
			          	<th class="">Avg. Wholesale Price</th>
			          	<th class="">Fundraisers Per Year</th>
			          	<th class="">Percent Commission</th>
			        </tr>
			        <?php include('../includes/calculate/es_clubs.php'); ?>
				<?php include('../includes/calculate/es_athletics.php'); ?>
		        	<tr class="totalrow">
		         		<td colspan="7"></td>
	          			<td class="title" colspan="3">
	          				<button class="medredbutton" type="button" onclick="" title="Click to Calculate Your Total Commission">Calculate</button>
	          				Total Commission Override:</td>
		          		<td colspan="1" id=""><input type="text" id="" readonly/></td>
		        	</tr>
			</table>
		</show5>
		
		<show6 class="hide">
			
			<h3>Large Church:</h3>
			<table class="calculate_success_sc">
				<tr>
					<th class="showhide">Show/Hide Data</th>
					<th class="groups">Ministries</th>
			          	<th class="">Number of Members</th>
			          	<th class="">Participating Percent of Members</th>
			          	<th class="">Items Sold Per Participant</th>
			          	<th class="">Avg. Wholesale Price</th>
			          	<th class="">Fundraisers Per Year</th>
			          	<th class="">Percent Commission</th>
			        </tr>
			        <?php include('../includes/calculate/church-lg.php'); ?>
		        	<tr class="totalrow">
		         		<td colspan="7"></td>
	          			<td class="title" colspan="3">
	          				<button class="medredbutton" type="button" onclick="" title="Click to Calculate Your Total Commission">Calculate</button>
	          				Total Commission Override:</td>
		          		<td colspan="1" id=""><input type="text" id="" readonly/></td>
		        	</tr>
			</table>
		</show6>
		
		<show7 class="hide">
			
			<h3>Average Church:</h3>
			<table class="calculate_success_sc">
				<tr>
					<th class="showhide">Show/Hide Data</th>
					<th class="groups">Clubs, Organizations & Athletics</th>
			          	<th class="">Number of Members</th>
			          	<th class="">Participating Percent of Members</th>
			          	<th class="">Items Sold Per Participant</th>
			          	<th class="">Avg. Wholesale Price</th>
			          	<th class="">Fundraisers Per Year</th>
			          	<th class="">Percent Commission</th>
			        </tr>
			         <?php include('../includes/calculate/church-avg.php'); ?>
		        	<tr class="totalrow">
		         		<td colspan="7"></td>
	          			<td class="title" colspan="3">
	          				<button class="medredbutton" type="button" onclick="" title="Click to Calculate Your Total Commission">Calculate</button>
	          				Total Commission Override:</td>
		          		<td colspan="1" id=""><input type="text" id="" readonly/></td>
		        	</tr>
			</table>
		</show7>
		
		<show8 class="hide">
			
			<h3>Organization:</h3>
			<table class="calculate_success_sc">
				<tr>
					<th class="showhide">Show/Hide Data</th>
					<th class="groups">Clubs, Organizations & Athletics</th>
			          	<th class="">Number of Members</th>
			          	<th class="">Participating Percent of Members</th>
			          	<th class="">Items Sold Per Participant</th>
			          	<th class="">Avg. Wholesale Price</th>
			          	<th class="">Fundraisers Per Year</th>
			          	<th class="">Percent Commission</th>
			        </tr>
			        <?php include('../includes/calculate/hs-avg_clubs.php'); ?>
				<?php include('../includes/calculate/hs-avg_athletics.php'); ?>
		        	<tr class="totalrow">
		         		<td colspan="7"></td>
	          			<td class="title" colspan="3">
	          				<button class="medredbutton" type="button" onclick="" title="Click to Calculate Your Total Commission">Calculate</button>
	          				Total Commission Override:</td>
		          		<td colspan="1" id=""><input type="text" id="" readonly/></td>
		        	</tr>
			</table>
		</show8>
		
		<show9 class="hide">
			
			<h3>4yr College/University:</h3>
			<table class="calculate_success_sc">
				<tr>
					<th class="showhide">Show/Hide Data</th>
					<th class="groups">Clubs, Organizations & Athletics</th>
			          	<th class="">Number of Students</th>
			          	<th class="">Participating Percent of Students</th>
			          	<th class="">Items Sold Per Participant</th>
			          	<th class="">Avg. Wholesale Price</th>
			          	<th class="">Fundraisers Per Year</th>
			          	<th class="">Percent Commission</th>
			        </tr>
			        <?php include('../includes/calculate/college-4yr_clubs.php'); ?>
				<?php include('../includes/calculate/college-4yr_athletics.php'); ?>
		        	<tr class="totalrow">
		         		<td colspan="7"></td>
	          			<td class="title" colspan="3">
	          				<button class="medredbutton" type="button" onclick="" title="Click to Calculate Your Total Commission">Calculate</button>
	          				Total Commission Override:</td>
		          		<td colspan="1" id=""><input type="text" id="" readonly/></td>
		        	</tr>
			</table>
		</show9>
		
		<show10 class="hide">
			
			<h3>2yr College/University:</h3>
			<table class="calculate_success_sc">
				<tr>
					<th class="showhide">Show/Hide Data</th>
					<th class="groups">Clubs, Organizations & Athletics</th>
			          	<th class="">Number of Students</th>
			          	<th class="">Participating Percent of Students</th>
			          	<th class="">Items Sold Per Participant</th>
			          	<th class="">Avg. Wholesale Price</th>
			          	<th class="">Fundraisers Per Year</th>
			          	<th class="">Percent Commission</th>
			        </tr>
			        <?php include('../includes/calculate/college-2yr_clubs.php'); ?>
				<?php include('../includes/calculate/college-2yr_athletics.php'); ?>
		        	<tr class="totalrow">
		         		<td colspan="7"></td>
	          			<td class="title" colspan="3">
	          				<button class="medredbutton" type="button" onclick="" title="Click to Calculate Your Total Commission">Calculate</button>
	          				Total Commission Override:</td>
		          		<td colspan="1" id=""><input type="text" id="" readonly/></td>
		        	</tr>
			</table>
		</show10>
		
		<show11 class="hide">
			
			<h3>Greeks:</h3>
			<table class="calculate_success_sc">
				<tr>
					<th class="showhide">Show/Hide Data</th>
					<th class="groups">Organizations</th>
			          	<th class="">Number of Members</th>
			          	<th class="">Participating Percent of Members</th>
			          	<th class="">Items Sold Per Participant</th>
			          	<th class="">Avg. Wholesale Price</th>
			          	<th class="">Fundraisers Per Year</th>
			          	<th class="">Percent Commission</th>
			        </tr>
			        <?php include('../includes/calculate/college_greeks.php'); ?>
		        	<tr class="totalrow">
		         		<td colspan="7"></td>
	          			<td class="title" colspan="3">
	          				<button class="medredbutton" type="button" onclick="" title="Click to Calculate Your Total Commission">Calculate</button>
	          				Total Commission Override:</td>
		          		<td colspan="1" id=""><input type="text" id="" readonly/></td>
		        	</tr>
			</table>
		</show11>
		
		<show12 class="hide">
			
			<h3>:</h3>
			<table class="calculate_success_sc">
				<tr>
					<th class="showhide">Show/Hide Data</th>
					<th class="groups">Clubs, Organizations & Athletics</th>
			          	<th class="">Number of Members</th>
			          	<th class="">Participating Percent of Members</th>
			          	<th class="">Items Sold Per Participant</th>
			          	<th class="">Avg. Wholesale Price</th>
			          	<th class="">Fundraisers Per Year</th>
			          	<th class="">Percent Commission</th>
			        </tr>
			        <?php include('../includes/calculate/hs-avg_clubs.php'); ?>
				<?php include('../includes/calculate/hs-avg_athletics.php'); ?>
		        	<tr class="totalrow">
		         		<td colspan="7"></td>
	          			<td class="title" colspan="3">
	          				<button class="medredbutton" type="button" onclick="" title="Click to Calculate Your Total Commission">Calculate</button>
	          				Total Commission Override:</td>
		          		<td colspan="1" id=""><input type="text" id="" readonly/></td>
		        	</tr>
			</table>
		</show12>
			
		<div class="rtalign">
			<input type="submit" class="redbutton" value="Save Calculations">
		</div> <!-- end right align -->
		
		<br>

  </div> <!--end content -->
  
      <?php include 'footer.php' ; ?>   
</div> <!--end container-->

</body>
</html>

<?php
   ob_end_flush();
?>