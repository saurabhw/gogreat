<?php
   include '../includes/autoload.php';
   $q = $_GET["q"];
   $loginuser = $_SESSION['userId'];
   /*
   $con = mysqli_connect('localhost','amoodf5_ryan','nb]]mFg2ZU.n','amoodf5_gm2012');
   if (!$con)
    {
         die('Could not connect: ' . mysqli_error($con));
     }

   mysqli_select_db($con,"Dealers");
   */
   $sql = "SELECT * FROM distributors WHERE loginid = '".$q."' AND setupID='$loginuser' AND role = 'RP'";

    $result = mysqli_query($link, $sql);


	echo '<table id="gms_accts" class="table table-bordered table-striped">
			<thead>
				
				<th class="fn" title="First Name">First</th>
				<th class="ln" title="Last Name">Last</th>
				<th class="pph" title="Primary Phone">Phone</th>
				<th class="email" title="Email Address">Email Address</th>
				<th class="role" title="Sales Role">Role</th>
				<th class="sales" title="Total  Sales">Total YTD Sales</th>
				<th class="actions" title="Actions">Actions</th>
			</thead>';
		
		while($row = mysqli_fetch_assoc($result)) {
                  $log_id = $row['loginid'];
		echo '<tr class="even">
				
				<td class="fn">'.$row['FName'].'</td>
				<td class="ln">'.$row['LName'].'</td>
				<td class="pph">'.$row['workPhone'].'</td>
				<td class="email">'.$row['email'].'</td>
				<td class="role"></td>
				<td class="sales">$'.getRepTotal($log_id).'</td>
				<td class="actions">
					<a href="editRep.php?rep='.$log_id.'" target="blank"><input class="redbutton" type="button" value="Edit Acct" /></a>
					<a href="viewAccounts.php?page=1&rep='.$log_id.'" target="blank"><input class="redbutton" type="button" value="View Accts" /></a>
					<!--<a href="rep/selectFundraiser.php?rep='.$log_id.'"><input class="redbutton" type="button" value="Add Accts" /></a>-->
					<a href="viewReports2.php"><input class="redbutton" type="button" value="$ Reports" /></a>
					
				</td>
			</tr>';
			}
	echo '</table>';
   
   $distributor = $q;
   $getRep = "SELECT * FROM distributors WHERE loginid = '$distributor' AND setupID = '$loginuser'";
   $repResult = mysqli_query($link, $getRep)or die ("couldn't execute rep query.".mysqli_error($link));
   $repRow = mysqli_fetch_assoc($repResult);
   $repFirst = $repRow['FName'];
   $repLast = $repRow['LName'];
   
   $table = "Dealers";
   /*
   $myQuery = "SELECT * FROM user_info 	WHERE userInfoID='$useID'";
   $myResult = mysqli_query($link, $myQuery)or die ("couldn't execute query.".mysql_error($link));
   $myRow = mysqli_fetch_assoc($myResult); 
   $myPic = $myRow['picPath'];
     
   
  $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
		$per_page = 50;
		$start_from = ($page-1) * $per_page; 
	$pages_query = "SELECT COUNT('loginid') FROM $table where setuppersonid='$distributor'";
		$many = mysqli_query($link, $pages_query)or die ("couldn't execute  pages query.".mysql_error($link)); 
		$rowx = $many->fetch_row();
		$pages = ceil($rowx[0] / $per_page);
	$query = "SELECT * FROM $table WHERE setuppersonid='$distributor'  ORDER BY Dealer";
		$result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error($link));
		$row = mysqli_fetch_assoc($result);
		
		 $total_records = $row[0];
		 $total_pages = ceil($total_records / 20);
	*/  /*	
   echo'
    <br />
    <div id="makeMeScrollable">  
      <table>
      <tr>
      <th>Account Name</th>
      <th>Club Type</th>
      <th>City</th>
      <th>State</th>
      <th>Zip</th>
      <th>Organization Type</th>
      <th>Number of Members</th>
      <th>Total YTD Sales</th>
      <th>Actions</th>
      </tr>';
      */
             while($row = mysqli_fetch_assoc($result))
       {
          //get sales data
          /*
          echo'<tr>
          <td>'.$row[Dealer].'</td>
          <td>'.$row[DealerDir].'</td>
          <td>'.$row[City].'</td>
          <td>'.$row[State].'</td>
          <td>'.$row[Zip].'</td>
          <td>'.$row[orgtype].'</td>';
          
          $dealer_id = $row['loginid'];
          $salesAmount = "SELECT SUM(Amount)as `total` FROM IPNdata WHERE Rep='$dealer_id'";
          $salesResult = mysqli_query($link, $salesAmount)
          or die ("couldn't execute sales query.".mysql_error($link));
          $salesRow = mysqli_fetch_assoc($salesResult);
          $groupTotal = $salesRow[total];
          
          $members = "SELECT * FROM orgMembers WHERE fund_owner_id = '$dealer_id'";
          $membersResult = mysqli_query($link, $members)
          or die ("couldn't execute members query.".mysql_error($link));
          $memberCount = mysqli_num_rows($membersResult);
          while($membersRow = mysqli_fetch_assoc($membersResult))
          {
             $member_row_id = $membersRow['fundraiserID'];
             $memberAmount = "SELECT SUM(Amount)as `membertotal` FROM IPNdata WHERE Rep='$member_row_id'";
             $memberAmountResult = mysqli_query($link, $memberAmount)
             or die ("couldn't execute members amount query.".mysql_error($link));
             $memberAmountRow = mysqli_fetch_assoc($memberAmountResult);
             $membersTotal = $memberAmountRow['membertotal'];
             $groupTotal = $groupTotal + $membersTotal;
             
          }
          
          echo'
           <td align="center">'.$memberCount.'</td>';
          if($groupTotal < 1)
          {
             echo'<td align="center">$0.00</td>';
          }
          else
          {
             echo' <td align="center">$'.$groupTotal.'</td>';
          }
          echo'<td>  
          <a href="../fundSite.php?group='.$dealer_id.'"><input class="redbutton" type="button" value="View Website" /></a>
          <a href="information.php?group='.$dealer_id.'"><input class="redbutton" type="button" value="Edit Acct" /></a>
					<a href="editMembers.php?group='.$dealer_id.'"><input class="redbutton" type="button" value="View Members" /></a>
					<a href="deleteFundraiser.php?group='.$dealer_id.'"><input class="redbutton" type="button" value="Delete Group" /></a>
					<!--<a href="#"><input class="redbutton" type="button" value="Send Email" /></a>-->
					<a href="viewReports.php"><input class="redbutton" type="button" value="$ Reports" /></a>
          </td>
          </tr></div>';
          */
       }

//mysqli_close($con);
?>