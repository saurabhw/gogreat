<?php
   
   include '../includes/autoload.php';
   if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
   
   $userID = $_SESSION['userId'];
   $myQuery = "SELECT * FROM user_info 	WHERE userInfoID='$userID'";
   $myResult = mysqli_query($link, $myQuery)or die ("couldn't execute query.".mysql_error($link));
   $myRow = mysqli_fetch_assoc($myResult); 
   $myPic = $myRow['picPath'];
       

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
          <h1>Sales Coordinator Account Reports</h1>
          <h3></h3>
          
	  <form>
		<div id="table">
			<div class="row">
				<select id="actions">
					<option value="">-Actions-</option>
					<option value="">Print Report</option>
					<option value="">Export Report</option>
				</select>
				
				<b>Sort By: </b> 
				<select id="">
					<option value="">View All</option>
					<option value="">A-Z First</option>
					<option value="">A-Z Last</option>
					<option value="">$ High to Low</option>
					<option value="">$ Low to High</option>
				</select>
				
				<!--<b>Show Results By: </b> 
				<span id="buttons">
					<input type="button" class="medredbutton" value="Week">
					<input type="button" class="medredbutton" value="Month">
					<input type="button" class="medredbutton" value="Year">
				</span>
				
				<span>From: <input type="text" class="date" value="dd/mm/yy"> 
				To: <input type="text" class="date" value="dd/mm/yy"></span>-->
			</div> <!-- end row -->
			
			<div id="labels" class="row">
				<span id="hd_rp">Representative</span>
				<span id="hd_gmfr">Fundraiser Account</span>
				<span id="hd_fl">Fundraiser Leader</span>
				<span id="hd_fm">Fundraiser Member</span>
				<span id="hd_ff">Friends & Family</span>
				<span id="hd_bb">Business Supporter</span>
				<span id="hd_ba">Business Associate</span>
				<span id="hd_cc">Customer & Client</span>
			</div> <!-- end row -->
			
			<div class="row">
				<select class="role">
					<option>Select</option>
					<option>All Representatives</option>
					<option>Name</option>
					<option>Name</option>
					<option>Name</option>
					<option>Name</option>
					<option>Name</option>
				</select>
				<select class="role">
					<option>Select</option>
					<option>All Fundraiser Accounts</option>
					<option>Name</option>
					<option>Name</option>
					<option>Name</option>
					<option>Name</option>
					<option>Name</option>
				</select>
				<select class="role">
					<option>Select</option>
					<option>All Fundraiser Leaders</option>
					<option>Name</option>
					<option>Name</option>
					<option>Name</option>
					<option>Name</option>
					<option>Name</option>
				</select>
				<select class="role">
					<option>Select</option>
					<option>All Fundraiser Members</option>
					<option>Name</option>
					<option>Name</option>
					<option>Name</option>
					<option>Name</option>
					<option>Name</option>
				</select>
				<select class="role">
					<option>Select</option>
					<option>All Friends & Family</option>
					<option>Name</option>
					<option>Name</option>
					<option>Name</option>
					<option>Name</option>
					<option>Name</option>
				</select>
				<select class="role">
					<option>Select</option>
					<option>All Business Supporters</option>
					<option>Name</option>
					<option>Name</option>
					<option>Name</option>
					<option>Name</option>
					<option>Name</option>
				</select>
				<select class="role">
					<option>Select</option>
					<option>All Business Associates</option>
					<option>Name</option>
					<option>Name</option>
					<option>Name</option>
					<option>Name</option>
					<option>Name</option>
				</select>
				<select class="role">
					<option>Select</option>
					<option>All Customers & Clients</option>
					<option>Name</option>
					<option>Name</option>
					<option>Name</option>
					<option>Name</option>
					<option>Name</option>
				</select>
			</div> <!-- end row -->
		</div> <!-- end table -->
		
		<!-- This alphabet should allow for sorting the data -->
		<table id="alphabet">
			<tr>
				<td>A</td>
				<td>B</td>
				<td>C</td>
				<td>D</td>
				<td>E</td>
				<td>F</td>
				<td>G</td>
				<td>H</td>
				<td>I</td>
				<td>J</td>
				<td>K</td>
				<td>L</td>
				<td>M</td>
				<td>N</td>
				<td>O</td>
				<td>P</td>
				<td>Q</td>
				<td>R</td>
				<td>S</td>
				<td>T</td>
				<td>U</td>
				<td>V</td>
				<td>W</td>
				<td>X</td>
				<td>Y</td>
				<td>Z</td>
			</tr>
		</table>
		
		<table class="goalreport">
			<tr>
				<th class="rp">Representative</th>
				<th class="fr">Fundraiser Acct</th>
				<th class="gp">Group</th>
				<th class="actual">Actual</th>
				<th class="goal">Goal</th>
				<!--<th class="diff">% -/+</th>
				<th class="items"># Items</th>
				<th class="whlsle">Avg Whlsle</th>-->
			</tr>
			<tr class="even">
				<td class="rp">Amanda Warren</td>
				<td class="fr">Lincoln High School</td>
				<td class="gp">Band</td>
				<td class="actual">$6,847.32</td>
				<td class="goal">$8,000</td>
				<!--<td class="diff">-14.41%</td>
				<td class="items">311</td>
				<td class="whlsle">$22.02</td>-->
			</tr>
			<tr class="odd">
				<td class="rp">Amanda Warren</td>
				<td class="fr">Lincoln High School</td>
				<td class="gp">Football</td>
				<td class="actual">$34,398.75</td>
				<td class="goal">$26,250</td>
				<!--<td class="diff">+31.04%</td>
				<td class="items">1500</td>
				<td class="whlsle">$22.93</td>-->
			</tr>
			<tr class="even">
				<td class="rp">Amanda Warren</td>
				<td class="fr">Lincoln High School</td>
				<td class="gp">Choir</td>
				<td class="actual">$7,035.00</td>
				<td class="goal">$7,000</td>
				<!--<td class="diff">+0.05%</td>
				<td class="items">300</td>
				<td class="whlsle">$23.45</td>-->
			</tr>
			<tr class="odd">
				<td class="rp">Amanda Warren</td>
				<td class="fr">Lincoln High School</td>
				<td class="gp">Baseball</td>
				<td class="actual">$4,000.00</td>
				<td class="goal">$3,750</td>
				<!--<td class="diff">+6.67%</td>
				<td class="items">100</td>
				<td class="whlsle">$25.00</td>-->
			</tr>
			<tr class="total">
				<td class="total" colspan="3">TOTALS:</td>
				<td class="actual" colspan="1">$52,281.07</td>
				<td class="goal" colspan="1">$45,000</td>
				<!--<td class="diff" colspan="1">---</td>
				<td class="items" colspan="1">2211</td>
				<td class="whlsle" colspan="1">$23.35</td>-->
			</tr>
		</table>
	</form>

  </div> <!--end content -->
  
      <?php include 'footer.php' ; ?>   
</div> <!--end container-->

</body>
</html>

<?php
   ob_end_flush();
?>