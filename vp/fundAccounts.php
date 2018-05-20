<?php
  include '../includes/autoload.php';
    if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "VP")
       {
            header('Location: ../index.php');
            exit;
       }
       if($_SESSION['freeze'] == "TRUE")
       {
          // echo "Account Frozen";
           header('Location: accountEdit.php');
       }
   
   $userID = $_SESSION['userId'];
   $query = "SELECT * FROM user_info WHERE userInfoID='$userID' ";
   $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysqli_error($link));
   $row = mysqli_fetch_assoc($result);
   $pic = $row['picPath'];
   
   $rep = $_GET['rep'];
   

?>
<!DOCTYPE html>
<head>
	<title>GreatMoods | VP</title>
</head>

<body>
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <?php include 'sidenav.php' ; ?>

      <div id="content">
          <h2 align="center">Fundraising Accounts</h2>
          <h3><?
           
           $sql11 = "SELECT * FROM user_info WHERE userInfoID = '$rep'";
           $result3 = mysqli_query($link, $sql11)or die ("couldn't execute query.".mysqli_error($link));
           $row3 = mysqli_fetch_assoc($result3);
           $fname = $row3['FName'];
           $lname = $row3['LName'];
           echo $fname.' '.$lname;
          ?></h3>
           <?
           
           $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
		   $per_page = 40;
		   $start_from = ($page-1) * $per_page; 
	       $pages_query = "SELECT COUNT('loginid') FROM Dealers where setuppersonid = '$rep' AND isMainGroup = 0";
		   $many = mysqli_query($link, $pages_query)or die ("couldn't execute  pages query.".mysqli_error($link)); 
		   $rowx = $many->fetch_row();
	       $pages = ceil($rowx[0] / $per_page);
           $sql = "SELECT * FROM Dealers WHERE setuppersonid = '$rep'AND isMainGroup = 0 ORDER BY Dealer ASC LIMIT $start_from, $per_page";
           $result2 = mysqli_query($link, $sql)or die ("couldn't execute query.".mysqli_error($link));
           echo '<table class="table table-bordered table-striped"><thead><tr>
           <th>Account Name</th>
           <th>Group</th>
           <th>City</th>
           <th>State</th>
           <th>Zip</th>
           <th>YTD Gross Sales</th>
           <th>Actions</th>
           </tr></thead>';
           while($row2 = mysqli_fetch_assoc($result2))
           {
             $groupSales = getGroupSales($row2['loginid']);
             echo '<tr><td>'.$row2['Dealer'].'</td><td>'.$row2['DealerDir'].'</td><td>'.$row2['City'].'</td><td>'.$row2['State'].'</td><td>'.$row2['Zip'].'</td><td>$'.$groupSales.'</td><td>
             <a href="editFundraiser.php?group='.$row2['loginid'].'"><input class="redbutton" type="button" value="Edit Acct" title="Edit Account"/></a>
            <!-- <a href="photos.php?group='.$row2['loginid'].'"><input class="redbutton" type="button" value="Photos" title="Photos"/></a>
             <a href="reasons.php?group='.$row2['loginid'].'"><input class="redbutton" type="button" value="Reasons" title="Reasons"/></a>
             <a href="goals.php?group='.$row2['loginid'].'"><input class="redbutton" type="button" value="Sales Goals" title="Goals"/></a>
                  <a href="../fundSite.php?group='.$row2['loginid'].'"><input class="redbutton" type="button" value="View Site" title="View Site"/></a>-->
		  <a href="editMembers.php?group='.$row2['loginid'].'"><input class="redbutton" type="button" value="View Members" title="View Member Accounts"/></a>
	          <!--<a href="viewReports2.php"><input class="redbutton" type="button" value="View Reports" title="View Reports"/></a>
	          <form method="post" action="deleteFundraiser.php">
	          <input type="hidden" name="clubid" value="'.$row2['loginid'].'">
	          <input type="hidden" name="repid" value="'.$rep.'">
	         <input class="redbutton" type="submit" name="submit" value="Delete" title="Delete"/>
	         </form>-->
	         </td> 
             </tr>';
           }
           echo '</table>';
           
           
					if($pages >= 1 && $page <= $pages){
						for($x = 1; $x <= $pages; $x++){
					echo'<ul class="pagination">
					<li><a href="?rep='.$rep.'&page='.$x.'
				">'.$x.'</a></li> 
				</ul> ';
						}
					}
				
				
           ?>

  </div> <!--end content -->
  
      <?php include 'footer.php' ; ?>   
</div> <!--end container-->

</body>
</html>

<?php
   ob_end_flush();
?>