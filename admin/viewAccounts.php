<?php
     session_start();
    /* if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "Executive")
       {
            header('Location: ../../index.php');
            exit;
       }
       */
       ob_start();
	include "connectTo.php";
	
	$id = $_SESSION['userId'];
	$link = connectTo();
	
	$table1 = "user_info";
	$table2 = "users";
	$table3 = "distributors";

?>
<!DOCTYPE html>
<head>
	<meta charset="UTF-8" />
	<title>GreatMoods | Admin</title>
	<link rel="stylesheet" type="text/css" href="../css/mainRecruitingStyles.css" />
	<link rel="stylesheet" type="text/css" href="../css/all_styles.css" />
	<link rel="stylesheet" type="text/css" href="../css/contacts_styles.css" />
	<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/base/jquery-ui.css" />
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>    
 	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
	
</head>

<body>
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <br><br>
      <?php include 'sidenav.php' ; ?>

      <div id="content">
          <h1>View Team & Accounts</h1>
          <h3></h3>
            <div id="grid_array"></div> <!-- not sure if the page contents need to be inside this div or not, so I am leaving it at the top for now -->
            
            <form>
		<div id="table">
			<div class="row">
				<div id="acctselect">
				Select VP
					<select class="acctlist" name="vpid" onchange="fetch_select(this.value);">
					<option>Select VP Account</option>
					<?php
					$query = "Select * FROM distributors  WHERE setupID='$id' and role='VP'";
                                        $result = mysqli_query($link, $query)or die("MySQL ERROR om query 2: ".mysqli_error($link));
                                        
                          
                                        while($row = mysqli_fetch_assoc($result))
                                        {
					   echo '<option value="'.$row['loginid'].'">'.$row[FName].' '.$row[LName].' '.$row[loginid].'</option>';
					}
					?>
				</select>
				<select id="new_select"  name="scid" onchange="fetch_select2(this.value);">
				        <option>Select Sales Coordinator</option>
					</select>
					<select id="new_select2"  name="rpid" onchange="fetch_select3(this.value);">
					<option>Select Representative</option>
					</select>
					<select id="new_select3"  name="fundid" onchange="fetch_select4(this.value);">
					<option>Select Fundraiser Account</option>
					</select>
					<select id="new_select4"  name="memdid" onchange="">
					<option>Select Member</option>
					</select>
					

				</div> <!-- end acct select -->
			</div> <!-- end row -->
		</div> <!-- end table -->
		
		<!-- This alphabet should allow for sorting the data -->
		<!--<table id="alphabet">
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
		</table>-->
		
		<table id="gms_accts">
			<tr>
				<!--<th class="checkbox" title="Select"><input type="checkbox" name="" value=""></th>-->
				<th class="fn" title="First Name">First</th>
				<th class="ln" title="Last Name">Last</th>
				<th class="pph" title="Primary Phone">Phone</th>
				<th class="email" title="Email Address">Email Address</th>
				<th class="role" title="Sales Role">Role</th>
				<th class="actions" title="Actions">Actions</th>
			</tr>
			<!--<tr class="even">
				<td class="checkbox"><input type="checkbox" name="" value=""></td>
				<td class="fn">Mary</td>
				<td class="ln">Reardon</td>
				<td class="pph">123-123-1234</td>
				<td class="email">mary.reardon@email.com</td>
				<td class="role">Representative</td>
				<td class="actions">
					<a href="#"><input class="redbutton" type="button" value="Edit Acct" /></a>
					<a href="#"><input class="redbutton" type="button" value="View Accts" /></a>
					<a href="#"><input class="redbutton" type="button" value="Add Accts" /></a>
					<a href="#"><input class="redbutton" type="button" value="Send Email" /></a>
					<a href="viewReports.php"><input class="redbutton" type="button" value="$ Reports" /></a>
				</td>
			</tr>
			<tr class="odd">
				<td class="checkbox"><input type="checkbox" name="" value=""></td>
				<td class="fn">Gary</td>
				<td class="ln">Lantz</td>
				<td class="pph">123-123-1234</td>
				<td class="email">gary.lantz@email.com</td>
				<td class="role">Sales Coordinator</td>
				<td class="actions">
					<a href="#"><input class="redbutton" type="button" value="Edit Acct" /></a>
					<a href="#"><input class="redbutton" type="button" value="View Accts" /></a>
					<a href="#"><input class="redbutton" type="button" value="Add Accts" /></a>
					<a href="#"><input class="redbutton" type="button" value="Send Email" /></a>
					<a href="viewReports.php"><input class="redbutton" type="button" value="$ Reports" /></a>
					
				</td>
			</tr>
			<tr class="even">
				<td class="checkbox"><input type="checkbox" name="" value=""></td>
				<td class="fn">Fred</td>
				<td class="ln">Briggs</td>
				<td class="pph">123-123-1234</td>
				<td class="email">fred.briggs@email.com</td>
				<td class="role">Sales Coordinator</td>
				<td class="actions">
					<a href="#"><input class="redbutton" type="button" value="Edit Acct" /></a>
					<a href="#"><input class="redbutton" type="button" value="View Accts" /></a>
					<a href="#"><input class="redbutton" type="button" value="Add Accts" /></a>
					<a href="#"><input class="redbutton" type="button" value="Send Email" /></a>
					<a href="viewReports.php"><input class="redbutton" type="button" value="$ Reports" /></a>
					
				</td>
			</tr>
			<tr class="odd">
				<td class="checkbox"><input type="checkbox" name="" value=""></td>
				<td class="fn">Marsha</td>
				<td class="ln">Fisher</td>
				<td class="pph">123-123-1234</td>
				<td class="email">marsha.fisher@email.com</td>
				<td class="role">Vice President</td>
				<td class="actions">
					<a href="#"><input class="redbutton" type="button" value="Edit Acct" /></a>
					<a href="#"><input class="redbutton" type="button" value="View Accts" /></a>
					<a href="#"><input class="redbutton" type="button" value="Add Accts" /></a>
					<a href="#"><input class="redbutton" type="button" value="Send Email" /></a>
					<a href="viewReports.php"><input class="redbutton" type="button" value="$ Reports" /></a>
					
				</td>
			</tr>
			<tr class="even">
				<td class="checkbox"><input type="checkbox" name="" value=""></td>
				<td class="fn">John</td>
				<td class="ln">Humphrey</td>
				<td class="pph">123-123-1234</td>
				<td class="email">john.humphrey@email.com</td>
				<td class="role">Representative</td>
				<td class="actions">
					<a href="#"><input class="redbutton" type="button" value="Edit Acct" /></a>
					<a href="#"><input class="redbutton" type="button" value="View Accts" /></a>
					<a href="#"><input class="redbutton" type="button" value="Add Accts" /></a>
					<a href="#"><input class="redbutton" type="button" value="Send Email" /></a>
					<a href="viewReports.php"><input class="redbutton" type="button" value="$ Reports" /></a>
					
				</td>
			</tr>
			<tr class="odd">
				<td class="checkbox"><input type="checkbox" name="" value=""></td>
				<td class="fn">David</td>
				<td class="ln">Rosatti</td>
				<td class="pph">123-123-1234</td>
				<td class="email">david.rosatti@email.com</td>
				<td class="role">Representative</td>
				<td class="actions">
					<a href="#"><input class="redbutton" type="button" value="Edit Acct" /></a>
					<a href="#"><input class="redbutton" type="button" value="View Accts" /></a>
					<a href="#"><input class="redbutton" type="button" value="Add Accts" /></a>
					<a href="#"><input class="redbutton" type="button" value="Send Email" /></a>
					<a href="viewReports.php"><input class="redbutton" type="button" value="$ Reports" /></a>
					
				</td>
			</tr>
			<tr class="even">
				<td class="checkbox"><input type="checkbox" name="" value=""></td>
				<td class="fn">Amanda</td>
				<td class="ln">Warren</td>
				<td class="pph">123-123-1234</td>
				<td class="email">amanda.warren@email.com</td>
				<td class="role">Representative</td>
				<td class="actions">
					<a href="#"><input class="redbutton" type="button" value="Edit Acct" /></a>
					<a href="#"><input class="redbutton" type="button" value="View Accts" /></a>
					<a href="#"><input class="redbutton" type="button" value="Add Accts" /></a>
					<a href="#"><input class="redbutton" type="button" value="Send Email" /></a>
					<a href="viewReports.php"><input class="redbutton" type="button" value="$ Reports" /></a>
					
				</td>
			</tr>
			<tr class="odd">
				<td class="checkbox"><input type="checkbox" name="" value=""></td>
				<td class="fn">Kelly</td>
				<td class="ln">Edwards</td>
				<td class="pph">123-123-1234</td>
				<td class="email">kelly.edwards@email.com</td>
				<td class="role">Representative</td>
				<td class="actions">
					<a href="#"><input class="redbutton" type="button" value="Edit Acct" /></a>
					<a href="#"><input class="redbutton" type="button" value="View Accts" /></a>
					<a href="#"><input class="redbutton" type="button" value="Add Accts" /></a>
					<a href="#"><input class="redbutton" type="button" value="Send Email" /></a>
					<a href="viewReports.php"><input class="redbutton" type="button" value="$ Reports" /></a>
					
				</td>
			</tr>
			<tr class="even">
				<td class="checkbox"><input type="checkbox" name="" value=""></td>
				<td class="fn">Jim</td>
				<td class="ln">Whitley</td>
				<td class="pph">123-123-1234</td>
				<td class="email">jim.whitley@email.com</td>
				<td class="role">Representative</td>
				<td class="actions">
					<a href="#"><input class="redbutton" type="button" value="Edit Acct" /></a>
					<a href="#"><input class="redbutton" type="button" value="View Accts" /></a>
					<a href="#"><input class="redbutton" type="button" value="Add Accts" /></a>
					<a href="#"><input class="redbutton" type="button" value="Send Email" /></a>
					<a href="viewReports.php"><input class="redbutton" type="button" value="$ Reports" /></a>
					
				</td>
			</tr>-->
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