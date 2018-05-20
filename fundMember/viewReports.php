<?php
      session_start();

      if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "Member")
       {
            header('Location: ../index.php');
            exit;
       }
       
       require_once("../includes/connection.inc.php");
       include('../samplewebsites/imageFunctions.inc.php');
       $link = connectTo();
       $user = $_SESSION['userId'];
       $userName = $_SESSION['email'];
       $query1 = "SELECT * FROM Dealers WHERE email='$userName'";
       $result1 = mysqli_query($link, $query1)or die("MySQL ERROR query 1: ".mysqli_error($link));
       $row1 = mysqli_fetch_assoc($result1);
       $dealerID = $row1['loginid'];
       $group = $row1['setuppersonid']; 
       $myPic = $row1['contact_pic'];
       
?>
<!DOCTYPE html>
<head>
	<title>GreatMoods Member</title>
</head>

<body>
<div id="container">
      <?php include 'header.php' ; ?>
      <?php include 'memberSidebar.php' ; ?>

      <div id="content">
          <h1>Fundraiser Member Account Reports</h1>
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
				<span id="hd_ff">Friends & Family</span>
				<span id="hd_bb">Business Supporter</span>
				<span id="hd_ba">Business Associate</span>
				<span id="hd_cc">Customer & Client</span>
			</div> <!-- end row -->
			
			<div class="row">
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
				<th class="gp">Group</th>
				<th class="actual">Actual</th>
				<th class="goal">Goal</th>
				<!--<th class="diff">% -/+</th>
				<th class="items"># Items</th>
				<th class="whlsle">Avg Retail</th>-->
			</tr>
			<tr class="even">
				<td class="gp">Band</td>
				<td class="actual">$6,847.32</td>
				<td class="goal">$8,000</td>
				<!--<td class="diff">-14.41%</td>
				<td class="items">311</td>
				<td class="whlsle">$44.02</td>-->
			</tr>
			<tr class="odd">
				<td class="gp">Football</td>
				<td class="actual">$34,398.75</td>
				<td class="goal">$26,250</td>
				<!--<td class="diff">+31.04%</td>
				<td class="items">1500</td>
				<td class="whlsle">$44.93</td>-->
			</tr>
			<tr class="even">
				<td class="gp">Choir</td>
				<td class="actual">$7,035.00</td>
				<td class="goal">$7,000</td>
				<!--<td class="diff">+0.05%</td>
				<td class="items">300</td>
				<td class="whlsle">$46.45</td>-->
			</tr>
			<tr class="odd">
				<td class="gp">Baseball</td>
				<td class="actual">$4,000.00</td>
				<td class="goal">$3,750</td>
				<!--<td class="diff">+6.67%</td>
				<td class="items">100</td>
				<td class="whlsle">$50.00</td>-->
			</tr>
			<tr class="total">
				<td class="total" colspan="1">TOTALS:</td>
				<td class="actual" colspan="1">$52,281.07</td>
				<td class="goal" colspan="1">$45,000</td>
				<!--<td class="diff" colspan="1">---</td>
				<td class="items" colspan="1">2211</td>
				<td class="whlsle" colspan="1">$46.35</td>-->
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