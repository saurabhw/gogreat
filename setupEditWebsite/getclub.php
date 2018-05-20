<?php
  session_start();
  $q = $_GET["q"];
  $z = $_GET["z"];
  $x = $_GET["x"];
  
  $loginuser = $_SESSION['userId'];

  include '../includes/connection.inc.php';
  include '../includes/functions.php';
  $link = connectTo();
   
  //$q = mysqli_real_escape_string($link, $q);
  //$q = htmlspecialchars($q, ENT_QUOTES);
  $j = str_replace("'","",$q);
  $r = addslashes($q);
  $m = stripslashes($q);
  
  $sql = "SELECT * FROM Dealers WHERE  sponsorid = '$x' AND Dealer = '$r' AND setuppersonid = '$loginuser' order by DealerDir asc";
  $result = mysqli_query($link,$sql)or  die('Could not get Dealer info: ' . mysqli_error($link));	
      
  $getGroup = "SELECT * FROM Dealers WHERE loginid = '$x' AND setuppersonid = '$loginuser' AND isMainGroup = 1 order by Dealer desc";
  $groupResult = mysqli_query($link, $getGroup) or  die('Could not get group info: ' . mysqli_error($link));
  $gRow = mysqli_fetch_assoc($groupResult);
  $groupCity = $gRow['City'];
  $groupState = $gRow['State'];
  $groupAddress = $gRow['Address1'];
  $lid = $gRow['loginid'];
  $gPhone = $gRow['Phone'];
  $d = $gRow['DealerDir'];

	echo '
	<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th class="faname">Selected Account Name</th>
			
			<th class="ph">Phone</th>
			<th class="add">Address</th>
			<th class="actions">Actions</th>
		</tr></thead>
		<tr>
			<td class="faname">'.$m.'</td>
			
			<td class="ph">'.$gPhone.'</td>
			<td class="add">'.$groupAddress.' '.$groupCity.', '.$groupState.' '.$z.'</td>
			<td class="actions"><a href="fundAcctEdit.php?group='.$x.'" target="blank"><input class="redbutton" type="button" value="Edit Acct" title="Edit Account Details"/></a></td>
		</tr> 
	</table>
	
	<!--<a href="addBanner.php?group='.$gID.'" ><input class="medredbutton" type="button" value="Add Banners" title="Add New Banner to Fundraiser Account"/></a>-->
	
	
	<table id="gmfr_accts" class="table table-bordered table-striped">
	<thead>
		<tr> 
			<th class="fg" title="Fundraiser Group">Group</th>
			<th class="pph" title="Primary Phone">Total Members</th>
			<th class="sales" title="Total Sales">Total Sales</th>
			<th class="actions" title="Actions">Actions</th>
		</tr></thead>';
	
		while($row = mysqli_fetch_assoc($result))
		  {
		        $site = $row['loginid'];
		        
			$credSet = $row['userNameSet'];
			$queryz = "SELECT * FROM orgContacts WHERE fundraiserid='$site'";
                        $resultz = mysqli_query($link, $queryz)or die ("couldn't execute query contacts query.".mysqli_error($link));
			echo'<tr>
				
				<!--<td><input id="dhgroup" name="" type="text" value="'.$row['Dealer'].'" readonly="readonly" ></td>-->
				<td class="fg">'.$row['DealerDir'].'</td>
				
				';
		$manyMembers = "SELECT * FROM orgMembers WHERE fund_owner_id = '$site'";
                $membersResult = mysqli_query($link, $manyMembers)or die ("couldn't execute query members.".mysqli_error($link));
		
		$many = mysqli_num_rows($membersResult);
		$many = $many * 1;
				
				echo '
				<td class="pfl">
				'.$many.'
				</td>
	<td class="sales">';
	$queryW = "SELECT SUM(Amount) AS total FROM IPNdata  WHERE Rep = '$site'";
	$resultW = mysqli_query($link, $queryW)or die ("couldn't execute query sales.".mysqil_error($link));
	$rowW = mysqli_fetch_assoc($resultW);
	$total = $rowW['total'];
	
	$getMembersW = "SELECT * FROM orgMembers WHERE fund_owner_id = '$site'";
	$memberResultW = mysqli_query($link, $getMembersW) or die ("couldn't execute query members W.".mysqli_error($link));

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
	<a href="editFundraiser.php?group='.$site.'" target="_blank"><input class="redbutton" type="button" value="Edit Acct" title="Edit Account Details"/></a>
	<a href="editMembers.php?group='.$site.'" target="blank"><input class="redbutton" type="button" value="Members" title="View/Edit Fundraiser Members"/></a>
	<!--<a href="photos.php?group='.$site.'" target="blank"><input class="redbutton" type="button" value="Photos" title="Photos"/></a>
	<a href="reasons.php?group='.$site.'" target="blank"><input class="redbutton" type="button" value="Reasons" title="Photos"/></a>
	<a href="goals.php?group='.$site.'" target="blank"><input class="redbutton" type="button" value="Goals" title="Photos"/></a>
	
	<a href="viewReports2.php" target="blank"><input class="redbutton" type="button" value="Sales" title="View/Edit Fundraiser Members"/></a>-->
	<a href="../fundSite.php?group='.$site.'" target="blank"><input class="redbutton" type="button" name="submit" value="View Site" title="View Fundraiser Website"/></a>
				
				<!--<a href="sendEmail.php?group='.$site.'"><input class="redbutton" type="button" name="submit" value="Send Email" title="Send email"/></a>-->';
				
					
				    
				echo'<!--<a href="user.php?group='.$site.'"><input class="redbutton" type="submit" name="submit2" value="Edit Login" title="Edit Username and Password"/></a>
					<form method="post" action="deleteFundraiser.php" style="display: inline;">
						<input type="hidden" name="clubid" value="'.$site.'" />
						<input class="redbutton" type="submit" name="submit2" value="Delete" title="Delete Group">
					</form>
					-->
				</td>';
				echo'</tr>';		
					$x++;
  		}
	echo "</table>";

?>