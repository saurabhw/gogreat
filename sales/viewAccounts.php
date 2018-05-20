<?php

    session_start(); // session start
    ob_start();
    ini_set('display_errors', '1'); // errors reporting on
    error_reporting(E_ALL); // all errors
    require_once('../includes/functions.php');
    require_once('../includes/connection.inc.php');
    require_once('../includes/imageFunctions.inc.php');
    $link = connectTo();
    $userID = $_SESSION['userId'];
    $distributor = trim($_GET['rep']);
    if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "SC")
       {
            header('Location: ../index.php');
            exit;
       }
   if(!isset($_SESSION['authenticated'])){
    header('Location: ../index.php');
    exit;
    } 
    if($_SESSION['freeze'] == "TRUE")
       {
          // echo "Account Frozen";
           header('Location: accountEdit.php');
       }
        
    $check = editRepSC($userID, $distributor);
      if(!is_numeric($distributor) || $check == 1  )
        {
           header('Location: ../logout.php');  
        }	 
   
   $getRep = "SELECT * FROM distributors WHERE loginid = '$distributor' AND setupID = '$userID'";
   $repResult = mysqli_query($link, $getRep)or die ("couldn't execute rep query.".mysqli_error($link));
   $repRow = mysqli_fetch_assoc($repResult);
   $repFirst = $repRow['FName'];
   $repLast = $repRow['LName'];
   
   
  
   $table = "Dealers";
   
   $myQuery = "SELECT * FROM user_info 	WHERE userInfoID='$userID'";
   $myResult = mysqli_query($link, $myQuery)or die ("couldn't execute query.".mysqli_error($link));
   $myRow = mysqli_fetch_assoc($myResult); 
   $myPic = $myRow['picPath'];
       
   
  $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
		$per_page = 100;
		$start_from = ($page-1) * $per_page; 
	$pages_query = "SELECT COUNT('loginid') FROM $table where setuppersonid='$distributor' AND isMainGroup = 0";
		$many = mysqli_query($link, $pages_query)or die ("couldn't execute  pages query.".mysqli_error($link)); 
		$rowx = $many->fetch_row();
		$pages = ceil($rowx[0] / $per_page);
	$query = "SELECT * FROM $table WHERE setuppersonid='$distributor' AND isMainGroup = 0 ORDER BY Dealer LIMIT $start_from, $per_page";
		$result = mysqli_query($link, $query)or die ("couldn't execute query.".mysqli_error($link));
		$row = mysqli_fetch_assoc($result);
		
		 $total_records = mysqli_num_rows($result);
		 $total_pages = ceil($total_records / 100);
		

?>
<!DOCTYPE html>
	<head>
	<title>View Fundraising Accounts</title>
	</head>
	
<div id="container">
      
      <?php include 'header.inc.php' ; ?>
      <?php include 'sidenav.php' ; ?>  

      <div id="content">
	<h3>Viewing Accounts For <?php echo $repFirst.' '.$repLast;?></h3>
	
      <table class="table table-bordered table-striped">
          <thead>
      <tr>
      <th>Account Name</th>
      <th>Club Type</th>
      <th>City</th>
      <th>State</th>
      <th>Zip</th>
      <!--<th>Number of Members</th>-->
      <th>Total YTD Sales</th>
      <th>Actions</th>
      </tr></thead>
     <?php
       while($row = mysqli_fetch_assoc($result))
       {
          //get sales data
          
          echo'<tr>
          <td>'.$row['Dealer'].'</td>
          <td>'.$row['DealerDir'].'</td>
          <td>'.$row['City'].'</td>
          <td>'.$row['State'].'</td>
          <td>'.$row['Zip'].'</td>';
          
          $dealer_id = $row['loginid'];
          $salesAmount = "SELECT SUM(Amount)as `total` FROM IPNdata WHERE Rep='$dealer_id'";
          $salesResult = mysqli_query($link, $salesAmount)
          or die ("couldn't execute sales query.".mysql_error($link));
          $salesRow = mysqli_fetch_assoc($salesResult);
          $groupTotal = $salesRow['total'];
          
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
           <!--<td align="center">'.$memberCount.'</td>-->';
          if($groupTotal < 1)
          {
             echo'<td align="center">$0.00</td>';
          }
          else
          {
             echo' <td align="center">$'.$groupTotal.'</td>';
          }
          echo'<td>  
          	<a href="editFundraiser.php?group='.$dealer_id.'" target="_blank"><input class="redbutton" type="button" value="Edit Acct" /></a>
          	<a href="editMembers.php?page=1&group='.$dealer_id.'" target="_blank"><input class="redbutton" type="button" value="View Members" /></a>
          	<!--<a href="reasons.php?group='.$dealer_id.'"><input class="redbutton" type="button" value="Reasons" /></a>
         	<a href="photos.php?group='.$dealer_id.'"><input class="redbutton" type="button" value="Photos" /></a>
          	<a href="goals.php?group='.$dealer_id.'"><input class="redbutton" type="button" value="Goals" /></a>-->
          <!--	<a href="../fundSite.php?group='.$dealer_id.'" target="blank"><input class="redbutton" type="button" value="View Website" /></a>
		<a href="emails2.php"><input class="redbutton" type="button" value="Send Email" /></a>-->
	<!--	<a href="viewReports2.php"><input class="redbutton" type="button" value="$ Reports" /></a>
		<form class="link" method="post" action="deleteFundraiser.php" name="">
	  		<input type="hidden" value="'.$dealer_id.'" name="clubid">
	  		<input class="redbutton" type="submit" name="submit" value="Delete Group" />
	  	</form>-->
          </td>
          </tr>';
       }
     ?>
     </table>

    	
					<?
						if($pages >= 1 && $page <= $pages){
							for($x = 1; $x <= $pages; $x++){
							    $back = $x - 1;
							    $forward = $x + 1;
							echo'<ul class="pagination"><li><a href="">Back</a><a href="?page='.$x.'&rep='.$distributor.'">'.$x.'</a><a href="">Forward</a></li></ul>';
							}
						}
					?>
            </div>
    <p>&nbsp;</p>
    
    

  </div> <!-- end content -->
  
      <?php include 'footer.php' ; ?>
    </div> <!--end container-->

</body>
</html>

<?php
   ob_end_flush();
?>