<?php
  session_start();
  $q = $_GET["q"];
  $z = $_GET["z"];
  $loginuser = $_SESSION['userId'];
  $con = mysqli_connect('localhost','amoodf5_ryan','nb]]mFg2ZU.n','amoodf5_gm2012');
  if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }
 include '../includes/connection.inc.php';
 include '../includes/functions.php';
 $link = connectTo();
    mysqli_select_db($con,"Dealers");
  //$q = mysqli_real_escape_string($link, $q);
  //$q = htmlspecialchars($q, ENT_QUOTES);
  $r = addslashes($q);
  $sql = "SELECT * FROM Dealers WHERE Dealer = '$q'  AND Zip = '$z' AND setuppersonid = '$loginuser'";
  $result = mysqli_query($con,$sql)or  die('Could not get Dealer info: ' . mysqli_error($con));	
      
  $getGroup = "SELECT * FROM Dealers WHERE Dealer = '$q' AND Zip = '$z' AND setuppersonid = '$loginuser'";
  $groupResult = mysqli_query($con, $getGroup) or  die('Could not get group info: ' . mysqli_error($con));
  $gRow = mysqli_fetch_assoc($groupResult);
  $groupCity = $gRow['City'];
  $groupState = $gRow['State'];
  $groupAddress = $gRow['Address1'];

	echo '
	<div>
	<h5 style="display: inline;">'.$q.' '.$groupAddress.' '.$groupCity.' '.$groupState.' '.$z.'</h5> 
	
	
	<!--<a href="addBanner.php?group='.$gID.'" ><input class="medredbutton" type="button" value="Add Banners" title="Add New Banner to Fundraiser Account"/></a>-->
	</div>
	
	<table id="gmfr_accts" class="nodisplayboxes">
	
		<tr> 
			<th class="fg" title="Fundraiser Group">Group</th>
			<th class="pph" title="Primary Phone">Total Members</th>
			<th class="sales" title="Total Sales">Total Sales</th>
			<th class="actions" title="Actions">Actions</th>
		</tr>';
	
		while($row = mysqli_fetch_assoc($result))
		  {
		        $site = $row['loginid'];
		        
			$credSet = $row['userNameSet'];
			$queryz = "SELECT * FROM orgContacts WHERE fundraiserid='$site'";
                        $resultz = mysqli_query($link, $queryz)or die ("couldn't execute query contacts query.".mysql_error());
			echo'<tr class="even">
				
				<!--<td><input id="dhgroup" name="" type="text" value="'.$row['Dealer'].'" readonly="readonly" ></td>-->
				<td class="fg"><input id="type" name="" type="text" value="'.$row['DealerDir'].'" readonly="readonly" ></td>
				
				';
		$manyMembers = "SELECT * FROM orgMembers WHERE fund_owner_id = '$site'";
     $membersResult = mysqli_query($link, $manyMembers)or die ("couldn't execute query members.".mysql_error());
		
		$many = mysqli_num_rows($membersResult);
				
				echo '
				<td class="pfl">
				'.$many.'
				</td>
	<td class="sales">';
	$queryW = "SELECT SUM(Amount) AS total FROM IPNdata  WHERE Rep = '$site'";
	$resultW = mysqli_query($link, $queryW)or die ("couldn't execute query sales.".mysql_error());
	$rowW = mysqli_fetch_assoc($resultW);
	$total = $rowW['total'];
	
	$getMembersW = "SELECT * FROM orgMembers WHERE fund_owner_id = '$site'";
	$memberResultW = mysqli_query($link, $getMembersW) or die ("couldn't execute query members W.".mysql_error());

	while($row2W = mysqli_fetch_assoc($memberResultW))
	{
	   $memberIDQ = $row2W['fundraiserID'];
	   $membersSalesQ = "SELECT SUM(Amount) as mt FROM IPNdata  WHERE Rep = '$memberIDQ'";
	   $memberSalesResultQ = mysqli_query($link, $membersSalesQ) 
	   or die ("couldn't execute query members Q.".mysql_error());
	   
	  $salesRowQ = mysqli_fetch_assoc($memberSalesResultQ);
	   
	      $memberTotal = $salesRowQ['mt'];
	      $total = $total + $memberTotal;
	   
	   
	}
	if($total > 0)
	{
	  echo '$'.$total; 
	}
	else
	{
	  echo "$0.00";
	}
	
	
        echo' </td>
         
        
	<td class="actions">
	<a href="information.php?group='.$site.'"><input class="redbutton" type="button" value="Edit Acct" title="Edit Account Details"/></a>
	<a href="editMembers.php?group='.$site.'"><input class="redbutton" type="button" value="Members" title="View/Edit Fundraiser Members"/></a>
	<a href="photos.php?group='.$site.'"><input class="redbutton" type="button" value="Photos" title="Photos"/></a>
	<a href="reasons.php?group='.$site.'"><input class="redbutton" type="button" value="Reasons" title="Photos"/></a>
	<a href="goals.php?group='.$site.'"><input class="redbutton" type="button" value="Goals" title="Photos"/></a>
	
	<a href="viewReports2.php"><input class="redbutton" type="button" value="Sales" title="View/Edit Fundraiser Members"/></a>
	<a href="../fundSite.php?group='.$site.'"><input class="redbutton" type="button" name="submit" value="View Site" title="View Fundraiser Website"/></a>
				
				<!--<a href="sendEmail.php?group='.$site.'"><input class="redbutton" type="button" name="submit" value="Send Email" title="Send email"/></a>-->';
				
					
				    
				echo'<!--<a href="user.php?group='.$site.'"><input class="redbutton" type="submit" name="submit2" value="Edit Login" title="Edit Username and Password"/></a>-->
					<form method="post" action="deleteFundraiser.php" style="display: inline;">
						<input type="hidden" name="clubid" value="'.$site.'" />
						<input class="redbutton" type="submit" name="submit2" value="Delete" title="Delete Group">
					</form>
					
				</td>';
				echo'</tr>';		
					$x++;
  		}
	echo "</table>";

mysqli_close($con);
?>