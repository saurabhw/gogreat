<?php
	include '../includes/autoload.php';
	if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "SC"){                                                                                                                                                  
		header('Location: ../index.php');
		exit;
    		}
	   if($_SESSION['freeze'] == "TRUE")
       {
          // echo "Account Frozen";
           header('Location: accountEdit.php');
       }
	    $group = trim($_GET['group']);
		$userID = $_SESSION['userId'];                                        
		$user_email = $_SESSION['email'];
		$table = "orgMembers";
	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
		$per_page = 20;
		$start_from = ($page-1) * $per_page; 
	$pages_query = "SELECT COUNT('orgMemberID') FROM orgMembers where fund_owner_id='$group' AND scID = '$userID'";
		$many = mysqli_query($link, $pages_query)or die ("couldn't execute  pages query.".mysqli_error($link)); 
		$rowx = $many->fetch_row();
		$pages = ceil($rowx[0] / $per_page);
	$query = "SELECT * FROM orgMembers WHERE fund_owner_id='$group' AND scID = '$userID' ORDER BY orgLName ASC LIMIT $start_from, $per_page";
		$result = mysqli_query($link, $query)or die ("couldn't execute query.".mysqli_error($link));
		//$row = mysqli_fetch_assoc($result);
		/*
		// $total_records = $row[0];
		// $total_pages = ceil($total_records / 20);
		*/

   $userID = $_SESSION['userId'];
   $query1 = "SELECT * FROM user_info WHERE userInfoID='$userID'";
   $result1 = mysqli_query($link, $query1)or die ("couldn't execute query 1.".mysqli_error($link));
   $row4 = mysqli_fetch_assoc($result1);
   $myPic = $row4['picPath'];

?>
<!DOCTYPE html>
<head>
<title>View Fundraiser Members</title>
</head>

<body>
<div id="container">
	<?php include 'header.inc.php' ; ?>
      <?php include 'sidenav.php' ; ?>
      
	<div id="content">
			
		<h2 align="center">Edit Members</h2>
		<?php
		$gQuery = "SELECT * FROM Dealers WHERE loginid='$group' ";
		$gResult = mysqli_query($link,$gQuery)or die ("couldn't execute g query.".mysqli_error($link));
		$gRow = mysqli_fetch_assoc($gResult);
		
		$groupName = $gRow['Dealer'].' '.$gRow['DealerDir'];
		echo "<h3>Current " .$groupName. " Members</h3>";
		?>

		         <!--<a href="editClub.php"><input id="" type="button" name="button" value="Choose New Account" /></a>-->
			
			<table id="fm_accts" class="table table-bordered table-striped">
			    <thead>
				<tr>
				        <th class="title">Title</th>
					<th class="fn">First</th>
					<th class="ln">Last</th>
					<th class="role">Position</th>
					<th class="email">Email</th>
					<th class="pph">Phone</th>
					<th class="check">Leader</th>
					<th class="sales">Total Sales</th>
					<th class="actions">Actions</th>
				</tr></thead>

					<? 
					
					while ($row = mysqli_fetch_assoc($result))
					{
						$site = $row['fundraiserID'];
						$credSet = $row['passSent'];
						$queryz = "SELECT * FROM orgContacts WHERE fundraiserid='$site'";
	                                        $resultz = mysqli_query($link, $queryz)or die ("couldn't execute query contacts query.".mysqli_error($link));
	   $member = $row['fundraiserID'];                                     
	   $queryS = "SELECT SUM(Amount) as total FROM IPNdata WHERE Rep='$member'"; 
           $resultS = mysqli_query($link, $queryS) or die(mysqli_error($link));
            // Print out result
           $rowS = mysqli_fetch_assoc($resultS);
	   $amount =  $rowS['total'];
						echo'<tr>
							<td class="title">'.$row['Title'].'</td>
							<td class="fn">'.$row['orgFName'].'</td>
							<td class="ln">'.$row['orgLName'].'</td>
							<td class="role">'.$row['orgRel'].'</td>
							<td class="email">'.$row['orgEmail'].'</td>
							<td class="pph">'.$row['orgPhone'].'</td>
							<td class="check" align="center">';
							if($row['isLeader'] == 1) {
							  echo '<img src="../images/chk2.png" alt="checkmark" /></td>';
							}
							else { 
							   echo '</td>';
							}
							echo'<td class="sales">$';
								if($amount == 0) {
								  echo "0.00";
								}
								else {
								   echo $amount;
								}
							echo'</td>
							
							<!--<input id="dhname" name="" type="text" value="" readonly>
							<input id="dhname" name="" type="text" value="" readonly>-->
							<!--<input id="dhytd" name="" type="text" value="" readonly>-->
							
							<td class="actions">
							<a href="memberEdit.php?group='.$row['fundraiserID'].'" target="_blank"><input class="redbutton" type="button" value="Edit Member" /></a>
						<!--	<a href="contacts.php?group='.$row['fundraiserID'].'"><input class="redbutton" type="button" value="View Contacts" /></a>
							<a href="addFriendFamily.php?set='.$group.'&group='.$row['fundraiserID'].'"><input class="redbutton" type="button" value="Add Friends & Family" /></a>
							<a href="addBusinessSupporter.php?set='.$group.'&group='.$row['fundraiserID'].'"><input class="redbutton" type="button" value="Add Business Supporter" /></a>
							<a href="addBusinessAssociate.php?set='.$group.'&group='.$row['fundraiserID'].'"><input class="redbutton" type="button" value="Add Business Associate" /></a>
							<a href="email.php?member='.$row['fundraiserID'].'"><input class="redbutton" type="button" value="Send Password" /></a>-->
							
							<a href="../membersite.php?group='.$site.'" target="_blank"><input class="redbutton" type="button" name="submit" value="View Site" /></a>';
							//if(mysqli_num_rows($resultz) > 0)
							if($credSet == 1)
							{
							      /*
								echo'<form method="post" action="custEmail.php">
									<input type="hidden" name="to" value="'.$row['email'].'" /> 
									<input type="hidden" name="from" value="'.$user_email.'" />
									<input type="hidden" name="clubidemail" value="'.$row['loginid'].'" />
									<!--<input class="redbutton" type="submit" name="submit1" value="Send Email" />-->
									</form>';
									*/
							}
							else{
								echo'&nbsp;';
							}    
							echo'<form method="post" action="deleteMember.php" style="display: inline;">
					<input type="hidden" name="clubid" value="'.$site.'" />
					<input type="hidden" name="pid" value="'.$group.'" />
								<input class="redbutton" type="submit" name="submit2" value="Delete" title="Delete Member">
								</form>
							</td>';
							echo'</tr>';		
								//$x++;
						}
					?>
					</table>			
				<?
					if($pages >= 1 && $page <= $pages){
						for($x = 1; $x <= $pages; $x++){
							echo'<ul class="pagination">
					<li><a href=?group='.$group.'&page='.$x.'>'.$x.'</a></li> 
				</ul>';
						}
					}
				?>
				
			<br>
                   
			
			
		</div> <!--end content-->
		
	</div> <!--end container-->
	<?php include 'footer.php' ; ?>
</body>
</html>