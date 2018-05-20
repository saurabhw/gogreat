<?php
session_start();
$q=$_GET["q"];
$loginuser = $_SESSION['userId'];
$con = mysqli_connect('localhost','amoodf5_drake','y+kXL?CH5kw9','amoodf5_gm2012');
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }

mysqli_select_db($con,"Dealers");
$sql = "SELECT * FROM Dealers WHERE Dealer = '".$q."'";

$result = mysqli_query($con,$sql);

	echo '<table id="gmfr_accts">
			<tr>
				<th class="checkbox" title="Select"><input type="checkbox" name="" value=""></th>
				<th class="fg" title="Fundraiser Group">Group</th>
				<th class="pfl" title="Primary Fundraiser Leader">Leader</th>
				<th class="pph" title="Primary Phone">Phone</th>
				<th class="email" title="Email Address">Email Address</th>
				<th class="sales" title="Total Sales">Total Sales</th>
				<th class="actions" title="Actions">Actions</th>
			</tr>';
			
		while($row = mysqli_fetch_array($result)) {
  			$site = $row['loginid'];
  			$rep = $row['setuppersonid'];
			$credSet = $row['userNameSet'];
			$queryz = "SELECT * FROM orgContacts WHERE fundraiserID='$site'";
        		$resultz = mysqli_query($con, $queryz)or die ("couldn't execute query contacts query.".mysql_error());
		
			echo '<tr class="even">
				<td class="checkbox"><input type="checkbox" name="" value=""></td>
				<td class="fg"><input id="type" name="" type="text" value="'.$row['DealerDir'].'" readonly="readonly" ></td>
				<td class="pfl"><input id="dhname" name="" type="text" value="'.$row['ContactName'].'" readonly="readonly" ></td>
				<td class="pph"><input id="dhphone" name="" type="text" value="'.$row['Phone'].'" readonly="readonly" ></td>
				<td class="email"><input id="dhemail" name="" type="text" value="'.$row['email'].'" readonly="readonly" ></td>
				<td class="sales"><input id="dhytd" name="" type="text" value="" readonly="readonly" ></td>
				<td class="actions">
					<a href="information.php?groupid='.$site.'"><input class="redbutton" type="button" value="Edit Acct" /></a>
					<a href="../../fundSite_z.php?group='.$site.'"><input class="redbutton" type="button" value="View Site" /></a>
					<a href="#"><input class="redbutton" type="button" value="Send Email" /></a>
					<a href="#"><input class="redbutton" type="button" value="$ Reports" /></a>
				</td>
			</tr>';
			$x++;
		}
	echo '</table>';	

mysqli_close($con);
?>