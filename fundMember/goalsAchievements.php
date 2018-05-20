<?php
      session_start();

      if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
       
       require_once("../includes/connection.inc.php");
       include('../samplewebsites/imageFunctions.inc.php');
       include("../includes/functions.php");
       $link = connectTo();
       $user = $_SESSION['userId'];
       $userName = $_SESSION['email'];
       $groupID = $_SESSION['groupid'];
       $query1 = "SELECT * FROM Dealers WHERE loginid='$groupID'";
       $result1 = mysqli_query($link, $query1)or die("MySQL ERROR query 1: ".mysqli_error($link));
       $row1 = mysqli_fetch_assoc($result1);
       $dealerID = $row1['loginid'];
       $group = $row1['setuppersonid']; 
       $myPic = $row1['contact_pic'];
       $goal = $row1['goal2'];
       $so_far = getSoloSales($dealerID);
       $myBanner = $row1['banner_path']; 
       

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
          <h1>Goals & Achievements</h1>
          <h3>Calculate Your Success - Number of Items to Sell to Reach My Goal</h3>
          
		<button class="redbutton">Calculator By Month</button>
		<button1 class="redbutton">Calculator By Season</button1>
		<button2 class="redbutton">Calculator By Event</button2>

	<br><br>
	
	<show>
	<h5>Calculator by Month</h5>
	<table class="calculate_success">
		<tr class="titles">
			<th class="frtype">Fundraising Month</th>
	          	<th class="funds">Funds to Raise ($)</th>
	          	<th class="percent">Percent Funds</th>
	          	<th class="price">Avg. Retail Price</th>
	          	<th class="items">Items to Sell</th>
	        </tr>
        	<tr class="inputs">
		        <td class="frtype">January</td>
		        <td class="funds"><label class="currency">$</label><input type="number" id="" onchange=""></td>
		        <td class="percent">35%</td>
		        <td class="price">$34.95</td> 
		        <td class="items"><input type="number" id="" onchange="" readonly></td>
		</tr>
		<tr class="inputs">
		        <td class="frtype">February</td>
		        <td class="funds"><label class="currency">$</label><input type="number" id="" onchange=""></td>
		        <td class="percent">35%</td>
		        <td class="price">$34.95</td> 
		        <td class="items"><input type="number" id="" onchange="" readonly></td>
		</tr>
		<tr class="inputs">
		        <td class="frtype">March</td>
		        <td class="funds"><label class="currency">$</label><input type="number" id="" onchange=""></td>
		        <td class="percent">35%</td>
		        <td class="price">$34.95</td> 
		        <td class="items"><input type="number" id="" onchange="" readonly></td>
		</tr>
		<tr class="inputs">
		        <td class="frtype">April</td>
		        <td class="funds"><label class="currency">$</label><input type="number" id="" onchange=""></td>
		        <td class="percent">35%</td>
		        <td class="price">$34.95</td> 
		        <td class="items"><input type="number" id="" onchange="" readonly></td>
		</tr>
		<tr class="inputs">
		        <td class="frtype">May</td>
		        <td class="funds"><label class="currency">$</label><input type="number" id="" onchange=""></td>
		        <td class="percent">35%</td>
		        <td class="price">$34.95</td> 
		        <td class="items"><input type="number" id="" onchange="" readonly></td>
		</tr>
		<tr class="inputs">
		        <td class="frtype">June</td>
		        <td class="funds"><label class="currency">$</label><input type="number" id="" onchange=""></td>
		        <td class="percent">35%</td>
		        <td class="price">$34.95</td> 
		        <td class="items"><input type="number" id="" onchange="" readonly></td>
		</tr>
		<tr class="inputs">
		        <td class="frtype">July</td>
		        <td class="funds"><label class="currency">$</label><input type="number" id="" onchange=""></td>
		        <td class="percent">35%</td>
		        <td class="price">$34.95</td> 
		        <td class="items"><input type="number" id="" onchange="" readonly></td>
		</tr>
		<tr class="inputs">
		        <td class="frtype">August</td>
		        <td class="funds"><label class="currency">$</label><input type="number" id="" onchange=""></td>
		        <td class="percent">35%</td>
		        <td class="price">$34.95</td> 
		        <td class="items"><input type="number" id="" onchange="" readonly></td>
		</tr>
		<tr class="inputs">
		        <td class="frtype">September</td>
		        <td class="funds"><label class="currency">$</label><input type="number" id="" onchange=""></td>
		        <td class="percent">35%</td>
		        <td class="price">$34.95</td> 
		        <td class="items"><input type="number" id="" onchange="" readonly></td>
		</tr>
		<tr class="inputs">
		        <td class="frtype">October</td>
		        <td class="funds"><label class="currency">$</label><input type="number" id="" onchange=""></td>
		        <td class="percent">35%</td>
		        <td class="price">$34.95</td> 
		        <td class="items"><input type="number" id="" onchange="" readonly></td>
		</tr>
		<tr class="inputs">
		        <td class="frtype">November</td>
		        <td class="funds"><label class="currency">$</label><input type="number" id="" onchange=""></td>
		        <td class="percent">35%</td>
		        <td class="price">$34.95</td> 
		        <td class="items"><input type="number" id="" onchange="" readonly></td>
		</tr>
		<tr class="inputs">
		        <td class="frtype">December</td>
		        <td class="funds"><label class="currency">$</label><input type="number" id="" onchange=""></td>
		        <td class="percent">35%</td>
		        <td class="price">$34.95</td> 
		        <td class="items"><input type="number" id="" onchange="" readonly></td>
		</tr>
        	<tr class="totalrow">
        		<td colspan="3"></td>
          		<td class="rtalign" colspan="1">
          			<button class="medredbutton" type="button" onclick="" title="Click to Calculate Your Total">Calculate</button>
          			<label>Total Items to Sell:</label>
          		</td>
          		<td colspan="1" class="items"><input id="" type="number" onchange="" readonly></td>
        	</tr>
	</table>
	<div class="rtalign"><input type="submit" class="redbutton" value="Save Month Calculator"></div>
	</show>
	
	<show1 class="hide">
	<br>
	<h5>Calculator by Season</h5>
	<table class="calculate_success">
		<tr class="titles">
			<th class="frtype">Fundraising Season</th>
	          	<th class="funds">Funds to Raise ($)</th>
	          	<th class="percent">Percent Funds</th>
	          	<th class="price">Avg. Retail Price</th>
	          	<th class="items">Items to Sell</th>
	        </tr>
        	<tr class="inputs">
		        <td class="frtype">Back To School (Aug - Sep)</td>
		        <td class="funds"><label class="currency">$</label><input type="number" id="" onchange=""></td>
		        <td class="percent">35%</td>
		        <td class="price">$34.95</td> 
		        <td class="items"><input type="text" id="" onchange="" readonly/></td>
		</tr>
		<tr class="inputs">
		        <td class="frtype">Holidays (Oct - Dec)</td>
		        <td class="funds"><label class="currency">$</label><input type="number" id="" onchange=""></td>
		        <td class="percent">35%</td>
		        <td class="price">$34.95</td> 
		        <td class="items"><input type="text" id="" onchange="" readonly/></td>
		</tr>
		<tr class="inputs">
		        <td class="frtype">Valentine's Day / Winter (Jan - Mar)</td>
		        <td class="funds"><label class="currency">$</label><input type="number" id="" onchange=""></td>
		        <td class="percent">35%</td>
		        <td class="price">$34.95</td> 
		        <td class="items"><input type="text" id="" onchange="" readonly/></td>
		</tr>
		<tr class="inputs">
		        <td class="frtype">Spring Into Summer (Apr - Jul)</td>
		        <td class="funds"><label class="currency">$</label><input type="number" id="" onchange=""></td>
		        <td class="percent">35%</td>
		        <td class="price">$34.95</td> 
		        <td class="items"><input type="text" id="" onchange="" readonly/></td>
		</tr>
        	<tr class="totalrow">
        		<td colspan="3"></td>
          		<td class="rtalign" colspan="1">
          			<button class="medredbutton" type="button" onclick="" title="Click to Calculate Your Total">Calculate</button>
          			<label>Total Items to Sell:</label>
          		</td>
          		<td colspan="1" class="items"><input id="" type="number" onchange="" readonly></td>
        	</tr>
	</table>
	<div class="rtalign"><input type="submit" class="redbutton" value="Save Season Calculator"></div>
	</show1>
	
	<show2 class="hide">
	<br>
	<h5>Calculator by Event</h5>
	<form>
		<span>Fundraiser Event Name:</span>
		<input type="text" class="" value="">
		<input type="submit" class="redbutton" value="Add Event">
	</form>
	
	<table class="calculate_success">
		<tr class="titles">
			<th class="frtype">Fundraising Event</th>
	          	<th class="funds">Funds to Raise ($)</th>
	          	<th class="percent">Percent Funds</th>
	          	<th class="price">Avg. Retail Price</th>
	          	<th class="items">Items to Sell</th>
	        </tr>
        	<tr class="inputs">
		        <td class="frtype">Event Name</td>
		        <td class="funds"><label class="currency">$</label><input id="" type="number" onchange=""></td>
		        <td class="percent">35%</td>
		        <td class="price">$34.95</td> 
		        <td class="items"><input id="" type="number" onchange="" readonly></td>
		</tr>
		<tr class="inputs">
		        <td class="frtype">Event Name</td>
		        <td class="funds"><label class="currency">$</label><input id="" type="number" onchange=""></td>
		        <td class="percent">35%</td>
		        <td class="price">$34.95</td> 
		        <td class="items"><input id="" type="number" onchange="" readonly></td>
		</tr>
		<tr class="inputs">
		        <td class="frtype">Event Name</td>
		        <td class="funds"><label class="currency">$</label><input id="" type="number" onchange=""></td>
		        <td class="percent">35%</td>
		        <td class="price">$34.95</td> 
		        <td class="items"><input id="" type="number" onchange="" readonly></td>
		</tr>
		<tr class="inputs">
		        <td class="frtype">Event Name</td>
		        <td class="funds"><label class="currency">$</label><input id="" type="number" onchange=""></td>
		        <td class="percent">35%</td>
		        <td class="price">$34.95</td> 
		        <td class="items"><input id="" type="number" onchange="" readonly></td>
		</tr>
        	<tr class="totalrow">
        		<td colspan="3"></td>
          		<td colspan="1" class="rtalign">
          			<button class="medredbutton" type="button" onclick="" title="Click to Calculate Your Total">Calculate</button>
          			<label>Total Items to Sell:</label>
          		</td>
          		<td colspan="1" class="items"><input id="" type="number" onchange="" readonly></td>
        	</tr>
	</table>
	<div class="rtalign"><input type="submit" class="redbutton" value="Save Event Calculator"></div>
	</show2>
	
	<br>


  </div> <!--end content -->
  
      <?php include 'footer.php' ; ?>   
</div> <!--end container-->

</body>
</html>

<?php
   ob_end_flush();
?>